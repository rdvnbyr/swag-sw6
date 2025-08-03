<?php

namespace Sendcloud\Shipping\Core\BusinessLogic\Buffer\Services;

use Sendcloud\Shipping\Core\BusinessLogic\Buffer\Entities\OrderBufferEvent;
use Sendcloud\Shipping\Core\BusinessLogic\Buffer\Interfaces\OrderBufferEventRepositoryInterface;
use Sendcloud\Shipping\Core\BusinessLogic\Buffer\Interfaces\OrderBufferEventServiceInterface;

/**
 * Class OrderBufferEventService
 * @package Sendcloud\Shipping\Core\BusinessLogic\Buffer\Services
 */
class OrderBufferEventService implements OrderBufferEventServiceInterface
{
    const ORDER_CREATED_EVENT = 'order-created';

    /**
     * @var OrderBufferEventRepositoryInterface
     */
    private $orderBufferEventRepository;

    /**
     * @param OrderBufferEventRepositoryInterface $orderBufferEventRepository
     */
    public function __construct(OrderBufferEventRepositoryInterface $orderBufferEventRepository)
    {
        $this->orderBufferEventRepository = $orderBufferEventRepository;
    }

    /**
     * @inheritDoc
     */
    public function createOrderEvent($orderId, $eventType)
    {
        $eventData = array(
            'orderId' => $orderId,
            'event' => $eventType,
            'timestamp' => time(),
            'status' => OrderBufferEvent::NEW_EVENT
        );

        $this->orderBufferEventRepository->saveOrderEvent(OrderBufferEvent::fromArray($eventData));
    }

    /**
     * @inheritDoc
     */
    public function getCreatedOrderEvents()
    {
        return $this->orderBufferEventRepository->getCreatedOrderEvents();
    }

    /**
     * @inheritDoc
     */
    public function getNewEventsByOrderId($orderId)
    {
        return $this->orderBufferEventRepository->getNewEventsByOrderId($orderId);
    }

    /**
     * @inheritDoc
     */
    public function updateEventsStatuses($eventIds)
    {
        $this->orderBufferEventRepository->updateStatusToProcessed($eventIds);
    }

    /**
     * @inheritDoc
     */
    public function getOlderEvents($olderByTime)
    {
        return $this->orderBufferEventRepository->getOlderEvents($olderByTime);
    }

    /**
     * @inheritDoc
     */
    public function deleteOlderEvents($olderByTime, $batchSize = 1000)
    {
        return $this->orderBufferEventRepository->deleteOlderEvents($olderByTime, $batchSize);
    }
}
