<?php

namespace Sendcloud\Shipping\Core\BusinessLogic\Buffer\Interfaces;

/**
 * Class OrderBufferEventServiceInterface
 *
 * @package Sendcloud\Shipping\Core\BusinessLogic\Buffer\Interfaces
 */
interface OrderBufferEventServiceInterface
{
    const CLASS_NAME = __CLASS__;

    /**
     * Create new order event.
     *
     * @param int $orderId
     * @param string $eventType
     *
     * @return void
     */
    public function createOrderEvent($orderId, $eventType);

    /**
     * Retrieves IDs of orders which were updated after the last task execution.
     *
     * @return array
     */
    public function getCreatedOrderEvents();

    /**
     * Retrieves order buffer event for forwarded order ID.
     *
     * @param string $orderId
     *
     * @return array
     */
    public function getNewEventsByOrderId($orderId);

    /**
     * Updates status to processed for forwarded event entries.
     *
     * @param $eventIds
     *
     * @return void
     */
    public function updateEventsStatuses($eventIds);

    /**
     * Get events in status processed older than provided time.
     *
     * @param int $olderByTime
     *
     * @return array
     */
    public function getOlderEvents($olderByTime);

    /**
     * Delete events in status processed older than provided time.
     *
     * @param int $olderByTime
     * @param int $batchSize
     *
     * @return int
     */
    public function deleteOlderEvents($olderByTime, $batchSize = 1000);
}
