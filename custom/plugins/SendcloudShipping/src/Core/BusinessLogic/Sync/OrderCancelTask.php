<?php

namespace Sendcloud\Shipping\Core\BusinessLogic\Sync;

use Sendcloud\Shipping\Core\Infrastructure\Logger\Logger;
use Sendcloud\Shipping\Core\Infrastructure\Utility\Exceptions\HttpAuthenticationException;
use Sendcloud\Shipping\Core\Infrastructure\Utility\Exceptions\HttpCommunicationException;
use Sendcloud\Shipping\Core\Infrastructure\Utility\Exceptions\HttpRequestException;

/**
 * Class OrderCancelTask
 * @package Sendcloud\Shipping\Core\BusinessLogic\Sync
 */
class OrderCancelTask extends BaseSyncTask
{

    /**
     * @var string Order id
     */
    protected $orderId;

    /**
     * @var string|null Order number
     */
    protected $shipmentId;

    /**
     * OrderCancelTask constructor.
     *
     * @param string $orderId
     * @param string $shipmentId
     */
    public function __construct($orderId, $shipmentId = null)
    {
        $this->orderId = $orderId;
        $this->shipmentId = $shipmentId;
    }

    /**
     * String representation of object
     * @link https://php.net/manual/en/serializable.serialize.php
     * @return string the string representation of the object or null
     * @since 5.1.0
     */
    public function serialize()
    {
        return serialize(array($this->orderId, $this->shipmentId));
    }

    /**
     * Constructs the object
     *
     * @param string $serialized
     */
    public function unserialize($serialized)
    {
        list($this->orderId, $this->shipmentId) = unserialize($serialized);
    }

    /**
     * @inheritDoc
     */
    public function __serialize()
    {
        return array(
            'orderId' => $this->orderId,
            'shipmentId' => $this->shipmentId
        );
    }

    /**
     * @inheritDoc
     */
    public function __unserialize(array $data)
    {
        $this->orderId = $data['orderId'];
        $this->shipmentId = $data['shipmentId'];
    }

    /**
     * Runs task logic
     */
    public function execute()
    {
        $this->cancelOrder();
        $this->reportProgress(75);

        if ($order = $this->getOrderService()->getOrderById($this->orderId)) {
            $order->setSendCloudStatus('Deleted');
            $this->getOrderService()->updateOrderStatus($order);
        }

        $this->reportProgress(100);
    }

    /**
     * @return void
     *
     * @throws HttpAuthenticationException
     * @throws HttpCommunicationException
     * @throws HttpRequestException
     */
    protected function cancelOrder()
    {
        $this->getProxy()->cancelOrderById($this->orderId, $this->shipmentId);
    }
}
