<?php

namespace Sendcloud\Shipping\Core\BusinessLogic\Buffer\Tasks;

use Sendcloud\Shipping\Core\BusinessLogic\Buffer\Interfaces\OrderBufferEventServiceInterface;
use Sendcloud\Shipping\Core\BusinessLogic\Buffer\Services\OrderBufferEventService;
use Sendcloud\Shipping\Core\BusinessLogic\Sync\BaseSyncTask;
use Sendcloud\Shipping\Core\Infrastructure\ServiceRegister;
use Sendcloud\Shipping\Core\Infrastructure\Utility\TimeProvider;

/**
 * Class OrderBufferCleanupTask
 * @package Sendcloud\Shipping\Core\BusinessLogic\Buffer\Tasks
 */
class OrderBufferCleanupTask extends BaseSyncTask
{
    /**
     * @var OrderBufferEventServiceInterface
     */
    private $orderBufferEventService;
    /**
     * @var TimeProvider
     */
    private $timeProvider;

    /**
     * @inheritDoc
     */
    public function execute()
    {
        $timeBefore = $this->getTimeProvider()->getCurrentLocalTime();
        $retentionPeriod = $this->getConfigService()->getOrderBufferRetentionPeriod();
        $timeBefore->modify("-{$retentionPeriod} second");
        $deleteBatchSize = 1000;
        $deletedCount = $deleteBatchSize;

        while ($deletedCount >= $deleteBatchSize) {
            $deletedCount = $this->getOrderBufferEventService()->deleteOlderEvents(
                $timeBefore->getTimestamp(),
                $deleteBatchSize
            );
            $this->reportAlive();
            $this->getTimeProvider()->sleep(1);
        }        $this->reportProgress(100);
    }

    /**
     * @return OrderBufferEventService
     */
    protected function getOrderBufferEventService()
    {
        if (!$this->orderBufferEventService) {
            /** @var OrderBufferEventService $orderBufferEventService */
            $this->orderBufferEventService = ServiceRegister::getService(OrderBufferEventServiceInterface::CLASS_NAME);
        }

        return $this->orderBufferEventService;
    }

    /**
     * @return TimeProvider
     */
    protected function getTimeProvider()
    {
        if (!$this->timeProvider) {
            /** @var TimeProvider $queueStorage */
            $this->timeProvider = ServiceRegister::getService(TimeProvider::CLASS_NAME);
        }

        return $this->timeProvider;
    }
}
