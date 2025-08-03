<?php

namespace Sendcloud\Shipping\Core\BusinessLogic\Buffer\Handlers;

use Sendcloud\Shipping\Core\BusinessLogic\Interfaces\Configuration;
use Sendcloud\Shipping\Core\BusinessLogic\Buffer\Interfaces\OrderBufferEventServiceInterface;
use Sendcloud\Shipping\Core\BusinessLogic\Buffer\Services\OrderBufferEventService;
use Sendcloud\Shipping\Core\BusinessLogic\Buffer\Tasks\OrderBufferCleanupTask;
use Sendcloud\Shipping\Core\Infrastructure\Interfaces\Required\Configuration as InfrastructureConfiguration;
use Sendcloud\Shipping\Core\Infrastructure\Logger\Logger;
use Sendcloud\Shipping\Core\Infrastructure\ServiceRegister;
use Sendcloud\Shipping\Core\Infrastructure\TaskExecution\Exceptions\QueueStorageUnavailableException;
use Sendcloud\Shipping\Core\Infrastructure\TaskExecution\Queue;

/**
 * Class OrderBufferCleanupTickHandler.
 *
 * @package Sendcloud\Shipping\Core\BusinessLogic\Buffer\Handlers
 */
class OrderBufferCleanupTickHandler
{
    /**
     * Queues OrderBufferCleanupTask.
     */
    public function handle()
    {
        /** @var Configuration $configService */
        $configService = ServiceRegister::getService(InfrastructureConfiguration::CLASS_NAME);
        if ($configService->getLastOrderBufferCleanupTime() + $configService->getOrderBufferCleanupThreshold() > time()) {
            return;
        }

        $olderByTime = $configService->getOrderBufferRetentionPeriod();
        /** @var OrderBufferEventService $orderBufferEventService */
        $orderBufferEventService = ServiceRegister::getService(OrderBufferEventServiceInterface::CLASS_NAME);
        $oldEvents = $orderBufferEventService->getOlderEvents(time() - $olderByTime);

        if (empty($oldEvents)) {
            return;
        }

        /** @var Queue $queueService */
        $queueService = ServiceRegister::getService(Queue::CLASS_NAME);
        $task = new OrderBufferCleanupTask();
        try {
            $queueService->enqueue($configService->getOrderBufferCleanupQueueName(), $task);
        } catch (QueueStorageUnavailableException $ex) {
            Logger::logError(
                'Failed to enqueue task ' . $task->getType(),
                'Core',
                array(
                    'ExceptionMessage' => $ex->getMessage(),
                    'ExceptionTrace' => $ex->getTraceAsString()
                )
            );
        }
        $configService->setLastOrderBufferCleanupTime(time());
    }
}
