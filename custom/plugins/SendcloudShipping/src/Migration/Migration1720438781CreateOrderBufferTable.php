<?php declare(strict_types=1);

namespace Sendcloud\Shipping\Migration;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Exception;
use Shopware\Core\Framework\Migration\MigrationStep;

/**
 * Class Migration1720438781CreateOrderBufferTable
 *
 * @package Sendcloud\Shipping\Migration
 */
class Migration1720438781CreateOrderBufferTable extends MigrationStep
{
    public const ORDER_BUFFER_TABLE = 'sendcloud_order_buffer';

    /**
     * @inheritDoc
     * @return int
     */
    public function getCreationTimestamp(): int
    {
        return 1720438781;
    }

    /**
     * @param Connection $connection
     *
     * @return void
     */
    public function update(Connection $connection): void
    {
        $sql = 'CREATE TABLE IF NOT EXISTS `' . self::ORDER_BUFFER_TABLE . '` (
            `id` BIGINT unsigned NOT NULL AUTO_INCREMENT,
            `event` VARCHAR(255) NOT NULL,
            `status` enum("new", "processed"),
            `orderId` VARCHAR(255) NOT NULL,
            `timestamp` bigint unsigned NOT NULL,
            PRIMARY KEY (`id`)
        ) 
        ENGINE = InnoDB
        DEFAULT CHARSET = utf8
        COLLATE = utf8_general_ci;';

        $connection->executeStatement($sql);
    }

    /**
     * @param Connection $connection
     *
     * @return void
     */
    public function updateDestructive(Connection $connection): void
    {
        $sql = 'DROP TABLE IF EXISTS `' . self::ORDER_BUFFER_TABLE . '`';
        $connection->executeStatement($sql);
    }
}
