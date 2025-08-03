<?php

namespace Sendcloud\Shipping\Entity\OrderEventBuffer;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Exception;
use Sendcloud\Shipping\Core\BusinessLogic\Buffer\Entities\OrderBufferEvent;
use Sendcloud\Shipping\Core\BusinessLogic\Buffer\Interfaces\OrderBufferEventRepositoryInterface;
use Sendcloud\Shipping\Core\BusinessLogic\Buffer\Services\OrderBufferEventService;

/**
 * Class OrderEventBufferRepository
 * @package Sendcloud\Shipping\Entity\OrderEventBuffer
 */
class OrderEventBufferRepository implements OrderBufferEventRepositoryInterface
{
    const TABLE_NAME = 'sendcloud_order_buffer';
    /**
     * @var Connection
     */
    private $connection;

    /**
     * @param Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @inheritDoc
     */
    public function getCreatedOrderEvents(): array
    {
        $tableName = self::TABLE_NAME;
        $status = OrderBufferEvent::NEW_EVENT;
        $event = OrderBufferEventService::ORDER_CREATED_EVENT;
        $sql = "SELECT * FROM `{$tableName}` WHERE status = '{$status}' AND event = '{$event}'";

        try {
            $events = $this->connection->executeQuery($sql)->fetchAllAssociative();

            return $this->mapData($events);
        } catch (Exception $e) {
            return [];
        }
    }

    /**
     * @inheritDoc
     */
    public function getNewEventsByOrderId($orderId): ?array
    {
        $tableName = self::TABLE_NAME;
        $status = OrderBufferEvent::NEW_EVENT;
        $sql = "SELECT * FROM `{$tableName}` WHERE orderId = '{$orderId}' AND status = '{$status}'";

        try {
            $eventData = $this->connection->executeQuery($sql)->fetchAllAssociative();

            return $this->mapData($eventData);
        } catch (Exception $e) {
            return null;
        }
    }

    /**
     * @inheritDoc
     */
    public function updateStatusToProcessed($eventIds): void
    {
        $tableName = self::TABLE_NAME;
        $status = OrderBufferEvent::PROCESSED_EVENT;
        $eventIds = implode(',', $eventIds);
        $sql = "UPDATE `{$tableName}` SET status = '{$status}' WHERE id in ({$eventIds})";
        $this->connection->executeQuery($sql);
    }

    /**
     * @inheritDoc
     */
    public function saveOrderEvent(OrderBufferEvent $event): void
    {
        $this->connection->insert(self::TABLE_NAME, $event->toArray());
    }

    /**
     * @inheritDoc
     */
    public function getOlderEvents($olderByTime): array
    {
        $tableName = self::TABLE_NAME;
        $status = OrderBufferEvent::PROCESSED_EVENT;
        $sql = "SELECT * FROM `{$tableName}` WHERE timestamp < {$olderByTime} AND status = '{$status}'";

        try {
            $eventData = $this->connection->executeQuery($sql)->fetchAllAssociative();

            return $this->mapData($eventData);
        } catch (Exception $e) {
            return [];
        }
    }

    /**
     * @inheritDoc
     */
    public function deleteOlderEvents($olderByTime, $batchSize): int
    {
        $table = self::TABLE_NAME;
        return $this->connection->executeQuery(
            "DELETE FROM `{$table}` WHERE timestamp < {$olderByTime} LIMIT {$batchSize}"
        )->rowCount();
    }

    /**
     * @param array $events
     *
     * @return array
     */
    private function mapData(array $events): array
    {
        $mappedEvents = [];
        foreach ($events as $event) {
            $mappedEvents[] = OrderBufferEvent::fromArray($event);
        }

        return $mappedEvents;
    }
}
