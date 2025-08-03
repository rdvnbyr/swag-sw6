<?php

namespace Sendcloud\Shipping\Core\BusinessLogic\DTO\V3;

use Sendcloud\Shipping\Core\BusinessLogic\Entity\V3\OrderItem;
use Sendcloud\Shipping\Core\BusinessLogic\ProxyTransformer;

/**
 * Class OrderDetails
 * @package Sendcloud\Shipping\Core\BusinessLogic\DTO\v3
 */
class OrderDetails extends AbstractDTO
{
    /**
     * @var Integration
     */
    private $integration;
    /**
     * @var Status
     */
    private $orderStatus;
    /**
     * @var \DateTime
     */
    private $createdAt;
    /**
     * @var \DateTime
     */
    private $updatedAt;
    /**
     * @var OrderItem[]
     */
    private $orderItems;
    /**
     * @var string
     */
    private $notes;

    /**
     * @param Integration $integration
     * @param Status $orderStatus
     * @param \DateTime $createdAt
     * @param \DateTime $updatedAt
     * @param OrderItem[] $orderItems
     * @param string $notes
     */
    public function __construct(Integration $integration, Status $orderStatus, \DateTime $createdAt, \DateTime $updatedAt, array $orderItems, $notes)
    {
        $this->integration = $integration;
        $this->orderStatus = $orderStatus;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->orderItems = $orderItems;
        $this->notes = $notes;
    }

    /**
     * @return Integration
     */
    public function getIntegration()
    {
        return $this->integration;
    }

    /**
     * @param Integration $integration
     */
    public function setIntegration($integration)
    {
        $this->integration = $integration;
    }

    /**
     * @return Status
     */
    public function getOrderStatus()
    {
        return $this->orderStatus;
    }

    /**
     * @param Status $orderStatus
     */
    public function setOrderStatus($orderStatus)
    {
        $this->orderStatus = $orderStatus;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return OrderItem[]
     */
    public function getOrderItems()
    {
        return $this->orderItems;
    }

    /**
     * @param OrderItem[] $orderItems
     */
    public function setOrderItems($orderItems)
    {
        $this->orderItems = $orderItems;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param string $notes
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return array(
            'integration' => $this->getIntegration() ? $this->getIntegration()->toArray() : array(),
            'status' => $this->getOrderStatus() ? $this->getOrderStatus()->toArray() : array(),
            'order_created_at' => $this->getCreatedAt() ?
                $this->getCreatedAt()->format(ProxyTransformer::DATE_FORMAT) : '0000-00-00T00:00:00.000000+00:00',
            'order_updated_at' => $this->getUpdatedAt() ?
                $this->getUpdatedAt()->format(ProxyTransformer::DATE_FORMAT) : '0000-00-00T00:00:00.000000+00:00',
            'order_items' => $this->toBatch($this->getOrderItems()),
            'notes' => $this->getNotes()
        );
    }
}
