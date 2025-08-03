<?php

namespace Sendcloud\Shipping\Core\BusinessLogic\Sync;

use Sendcloud\Shipping\Core\BusinessLogic\DTO\ShipmentDTO;
use Sendcloud\Shipping\Core\BusinessLogic\DTO\ShipmentResponseDTO;
use Sendcloud\Shipping\Core\BusinessLogic\Entity\Order;
use Sendcloud\Shipping\Core\BusinessLogic\Exceptions\OrdersGetException;
use Sendcloud\Shipping\Core\Infrastructure\Logger\Logger;
use Sendcloud\Shipping\Core\Infrastructure\Utility\Exceptions\HttpBatchSizeTooBigException;
use Sendcloud\Shipping\Core\Infrastructure\Utility\Exceptions\HttpUnhandledException;

/**
 * Class OrderSyncTask
 * @package Sendcloud\Shipping\Core\BusinessLogic\Sync
 */
class OrderSyncTask extends BaseSyncTask
{
    const INITIAL_PROGRESS_PERCENT = 5;

    /**
     * @var array
     */
    protected $stateData;

    /**
     * OrderSyncTask constructor.
     * @param array $orderIds
     */
    public function __construct($orderIds)
    {
        $this->stateData = array(
            'batchSize' => $this->getConfigService()->getDefaultBatchSize(),
            'allOrdersIdsForSync' => $orderIds,
            'numberOfOrdersForSync' => count($orderIds),
            'currentSyncProgress' => self::INITIAL_PROGRESS_PERCENT,
        );
    }

    /**
     * String representation of object
     * @link https://php.net/manual/en/serializable.serialize.php
     * @return string the string representation of the object or null
     * @since 5.1.0
     */
    public function serialize()
    {
        return serialize($this->stateData);
    }

    /**
     * Constructs the object
     *
     * @param string $serialized
     */
    public function unserialize($serialized)
    {
        $this->stateData = unserialize($serialized);
    }

    /**
     * @inheritDoc
     */
    public function __serialize()
    {
        return array(
            'stateData' => $this->stateData
        );
    }

    /**
     * @inheritDoc
     */
    public function __unserialize(array $data)
    {
        $this->stateData = $data['stateData'];
    }

    /**
     * Runs task logic
     */
    public function execute()
    {
        $this->reportProgress($this->stateData['currentSyncProgress']);
        $this->reportProgressWhenNoOrderIds();

        while (count($this->stateData['allOrdersIdsForSync']) > 0) {
            $batchIds = $this->getBatchOrdersIds();
            $ordersPerBatch = $this->getBatchOrdersFromSourceSystem($batchIds);

            $batchIdCount = count($batchIds);
            $providedOrdersCount = count($ordersPerBatch);
            if ($batchIdCount > $providedOrdersCount) {
                Logger::logWarning("Requested [$batchIdCount] orders from integration; retrieved [$providedOrdersCount].");
            }

            $this->reportAlive();
            $orderDTOs = $this->makeOrderDTOs($ordersPerBatch);
            try {
                $this->getMassUpdateResultAndLogFailedOrders($orderDTOs);

                // Inform service that batch sync is finished
                $this->getOrderService()->orderSyncCompleted($batchIds);

                // If mass update is successful orders in batch should be removed
                // from the orders for sending. State of task is updated.
                $this->removeFinishedBatchOrdersFromOrdersForSync();

                // If upload is successful progress should be reported for that batch.
                $this->reportProgressForBatch();
            } catch (HttpBatchSizeTooBigException $e) {
                // If HttpBatchSizeTooBigException happens process should be continued with smaller calculated batch.
                $this->reconfigure();
            }
        }

        $this->reportProgress(100);
    }

    /**
     * Reduces batch size
     *
     * @throws HttpUnhandledException
     */
    public function reconfigure()
    {
        if ($this->stateData['batchSize'] >= 100) {
            $this->stateData['batchSize'] -= 50;
        } else {
            if ($this->stateData['batchSize'] > 10 && $this->stateData['batchSize'] < 100) {
                $this->stateData['batchSize'] -= 10;
            } else {
                if ($this->stateData['batchSize'] > 1 && $this->stateData['batchSize'] <= 10) {
                    --$this->stateData['batchSize'];
                } else {
                    throw new HttpUnhandledException('Batch size can not be smaller than 1');
                }
            }
        }

        $this->getConfigService()->setDefaultBatchSize($this->stateData['batchSize']);
    }

    /**
     * Check if task can be reconfigured
     *
     * @return bool
     */
    public function canBeReconfigured()
    {
        return $this->stateData['batchSize'] > 1;
    }

    /**
     * @param array $orderDTOs
     *
     * @return void
     *
     * @throws HttpBatchSizeTooBigException
     * @throws \Sendcloud\Shipping\Core\Infrastructure\Utility\Exceptions\HttpAuthenticationException
     * @throws \Sendcloud\Shipping\Core\Infrastructure\Utility\Exceptions\HttpCommunicationException
     * @throws \Sendcloud\Shipping\Core\Infrastructure\Utility\Exceptions\HttpRequestException
     */
    protected function getMassUpdateResultAndLogFailedOrders(array $orderDTOs)
    {
        $results = $this->getProxy()->ordersMassUpdate($orderDTOs);
        $this->logFailedOrders($results);
    }

    /**
     * Report progress when there are no orders for sync
     */
    protected function reportProgressWhenNoOrderIds()
    {
        if (count($this->stateData['allOrdersIdsForSync']) === 0) {
            $this->stateData['currentSyncProgress'] = 100;
            $this->reportProgress($this->stateData['currentSyncProgress']);
        }
    }

    /**
     * @return array
     */
    protected function getBatchOrdersIds()
    {
        return array_slice($this->stateData['allOrdersIdsForSync'], 0, $this->stateData['batchSize']);
    }

    /**
     * Gets orders for provided batch.
     *
     * @param array $batchIDs Order IDs for current batch
     *
     * @return array
     * @throws OrdersGetException
     */
    protected function getBatchOrdersFromSourceSystem($batchIDs)
    {
        return $this->getOrderService()->getOrders($batchIDs);
    }

    /**
     * Create array of OrderDTos
     *
     * @param array $orders
     *
     * @return array
     */
    protected function makeOrderDTOs($orders)
    {
        $orderDTOs = array();

        /** @var Order $order */
        foreach ($orders as &$order) {
            $orderDTOs[] = new ShipmentDTO($order);
        }

        return $orderDTOs;
    }

    /**
     * Remove finished batch orders
     */
    protected function removeFinishedBatchOrdersFromOrdersForSync()
    {
        $this->stateData['allOrdersIdsForSync'] = array_slice(
            $this->stateData['allOrdersIdsForSync'],
            $this->stateData['batchSize']
        );
    }

    /**
     * Report progress for batch
     */
    protected function reportProgressForBatch()
    {
        $numberSynchronizedOrders =
            $this->stateData['numberOfOrdersForSync'] - count($this->stateData['allOrdersIdsForSync']);

        $progressStep = $numberSynchronizedOrders *
            (100 - self::INITIAL_PROGRESS_PERCENT) / $this->stateData['numberOfOrdersForSync'];

        $this->stateData['currentSyncProgress'] = self::INITIAL_PROGRESS_PERCENT + $progressStep;

        $this->reportProgress($this->stateData['currentSyncProgress']);
    }

    /**
     * Logging of all failed order messages
     *
     * @param ShipmentResponseDTO[] $shipmentResponses
     */
    protected function logFailedOrders(array $shipmentResponses)
    {
        $orderService = $this->getOrderService();
        foreach ($shipmentResponses as $shipmentResponse) {
            $externalOrderId = $shipmentResponse->getExternalOrderId();

            if ($shipmentResponse->getStatus() === 'error') {
                $this->logFieldMessages($shipmentResponse->getErrors(), $externalOrderId);

                if (!$order = $orderService->getOrderById($externalOrderId)) {
                    continue;
                }

                // update Sendcloud status on order
                if ($order->getToServicePoint()) {
                    $order->setSendCloudStatus('[ERROR] ' . $this->getFirstError($shipmentResponse->getErrors()));
                    $orderService->updateOrderStatus($order);
                }
            }
        }
    }

    /**
     * Recursive method to iterate through field messages
     *
     * @param array $errors
     * @param string $orderId
     * @param string $prefix
     */
    protected function logFieldMessages(array $errors, $orderId, $prefix = null)
    {
        foreach ($errors as $field => $messages) {
            $field = $prefix ? "$prefix -> $field" : $field;
            if (isset($messages[0])) {
                if (is_array($messages[0])) {
                    foreach ($messages as $message) {
                        $this->logFieldMessages($message, $orderId, $field);
                    }
                } else {
                    $this->logMessages($messages, $orderId, $field);
                }
            } else {
                $this->logFieldMessages($messages, $orderId, $field);
            }
        }
    }

    /**
     * Logs final messages
     *
     * @param array $messages
     * @param string $orderId
     * @param string $field
     */
    private function logMessages(array $messages, $orderId, $field)
    {
        foreach ($messages as $message) {
            Logger::logWarning("Order[$orderId], field '$field': $message", 'Integration');
        }
    }

    /**
     * Return first error message.
     *
     * @param array $errors
     * @param string $prefix
     *
     * @return string
     */
    private function getFirstError(array $errors, $prefix = null)
    {
        foreach ($errors as $field => $messages) {
            $field = $prefix ? "{$prefix}[$field]" : $field;
            if (isset($messages[0])) {
                return "$field: {$messages[0]}";
            } else {
                return $this->getFirstError($messages, $field);
            }
        }

        return '';
    }
}
