<?php

namespace Sendcloud\Shipping\Core\BusinessLogic\Buffer\Interfaces;

use Sendcloud\Shipping\Core\BusinessLogic\Buffer\Entities\OrderBufferEvent;

/**
 * Class OrderBufferEventRepositoryInterface
 * @package Sendcloud\Shipping\Core\BusinessLogic\Buffer\Interfaces
 */
interface OrderBufferEventRepositoryInterface
{
    const CLASS_NAME = __CLASS__;

    /**
     * Returns all newly created order IDs which have to be synchronized.
     *
     * @return array
     */
    public function getCreatedOrderEvents();

    /**
     * Returns event from database for orderId.
     *
     * @param string $orderId
     *
     * @return array
     */
    public function getNewEventsByOrderId($orderId);

    /**
     * Update status of forwarded events to 'processed'.
     *
     * @param array $eventIds
     *
     * @return void
     */
    public function updateStatusToProcessed($eventIds);

    /**
     * Saves new order event in the database.
     *
     * @param OrderBufferEvent $event
     *
     * @return void
     */
    public function saveOrderEvent(OrderBufferEvent $event);

    /**
     * Deletes order events which are processed and older than provided time.
     *
     * @param $olderByTime
     *
     * @return array
     */
    public function getOlderEvents($olderByTime);

    /**
     * Deletes order events which are processed and older than provided time.
     *
     * @param int $olderByTime
     * @param int $batchSize
     *
     * @return int - Number of deleted events
     */
    public function deleteOlderEvents($olderByTime, $batchSize);
}
