<?php

namespace Sendcloud\Shipping\Core\BusinessLogic\Buffer\Handlers;

use Sendcloud\Shipping\Core\BusinessLogic\Interfaces;
use Sendcloud\Shipping\Core\BusinessLogic\Buffer\Interfaces\OrderBufferEventServiceInterface;
use Sendcloud\Shipping\Core\BusinessLogic\Buffer\Services\OrderBufferEventService;
use Sendcloud\Shipping\Core\BusinessLogic\Sync\OrderSyncTask;
use Sendcloud\Shipping\Core\Infrastructure\Interfaces\Required\Configuration;
use Sendcloud\Shipping\Core\Infrastructure\ServiceRegister;
use Sendcloud\Shipping\Core\Infrastructure\TaskExecution\Exceptions\QueueStorageUnavailableException;
use Sendcloud\Shipping\Core\Infrastructure\TaskExecution\Queue;
use Sendcloud\Shipping\Core\Infrastructure\TaskExecution\Task;

/**
 * Class OrderBufferEventTickHandler.
 *
 * @package Sendcloud\Shipping\Core\BusinessLogic\Buffer\Handlers
 */
class OrderBufferEventTickHandler
{
    /**
     * @var Queue
     */
    private $queue;
    /**
     * @var Configuration
     */
    private $configService;
    /**
     * @var OrderBufferEventServiceInterface
     */
    private $orderBufferEventService;

    /**
     * Queues OrderSyncTask for created orders.
     *
     * @throws QueueStorageUnavailableException
     */
    public function handle()
    {
        if (!$this->getConfigurationService()->isOrderBufferEnabled() ||
            $this->getConfigurationService()->getLastOrderBufferExecutionTime() + $this->getConfigurationService()->getOrderBufferExecutionInterval() > time()) {
            return;
        }

        $events = $this->getOrderBufferEventService()->getCreatedOrderEvents();
        if (empty($events)) {
            return;
        }

        $orderIds = array_unique(array_map(function ($event) { return $event->getOrderId(); }, $events));
        $eventIds = array_map(function ($event) { return $event->getId(); }, $events);
        $this->enqueueTask($this->getConfigurationService()->getQueueName(), $this->getOrderSyncTask($orderIds));
        $this->updateEventsStatus($eventIds);
        $this->getConfigurationService()->setLastOrderBufferExecutionTime(time());
    }

    /**
     * Returns an instance of OrderSync task
     *
     * @param $orderIds
     *
     * @return OrderSyncTask
     */
    private function getOrderSyncTask($orderIds)
    {
        return new OrderSyncTask($orderIds);
    }

    /**
     * Enqueues given task
     *
     * @param string $queueName
     * @param Task $task
     *
     * @throws QueueStorageUnavailableException
     */
    private function enqueueTask($queueName, Task $task)
    {
        $this->getQueueService()->enqueue($queueName, $task);
    }

    /**
     * Updates status to processed for forwarded event entries.
     *
     * @param $eventIds
     *
     * @return void
     */
    private function updateEventsStatus($eventIds)
    {
        $this->getOrderBufferEventService()->updateEventsStatuses($eventIds);
    }

    /**
     * @return OrderBufferEventService
     */
    private function getOrderBufferEventService()
    {
        if (!$this->orderBufferEventService) {
            $this->orderBufferEventService = ServiceRegister::getService(OrderBufferEventServiceInterface::CLASS_NAME);
        }

        return $this->orderBufferEventService;
    }

    /**
     * @return Queue
     */
    private function getQueueService()
    {
        if (!$this->queue) {
            $this->queue = ServiceRegister::getService(Queue::CLASS_NAME);
        }

        return $this->queue;
    }

    /**
     * @return Interfaces\Configuration
     */
    private function getConfigurationService()
    {
        if (!$this->configService) {
            $this->configService = ServiceRegister::getService(Configuration::CLASS_NAME);
        }

        return $this->configService;
    }
}
