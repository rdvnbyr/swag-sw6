<?php

namespace Sendcloud\Shipping\Core\BusinessLogic\Buffer\Entities;

/**
 * Class OrderBufferEvent
 * @package Sendcloud\Shipping\Core\BusinessLogic\Buffer\Entities
 */
class OrderBufferEvent
{
    const NEW_EVENT = 'new';
    const PROCESSED_EVENT = 'processed';

    /**
     * @var int
     */
    private $id;
    /**
     * created, deleted
     * @var string
     */
    private $event;
    /**
     * @var string
     */
    private $orderId;
    /**
     * @var int
     */
    private $timestamp;
    /**
     * new, processed
     * @var string
     */
    private $status;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * @param string $event
     */
    public function setEvent($event)
    {
        $this->event = $event;
    }

    /**
     * @return string
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * @param int $orderId
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
    }

    /**
     * @return int
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @param int $timestamp
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return array(
            'id' => $this->id,
            'event' => $this->event,
            'status' => $this->status,
            'orderId' => $this->orderId,
            'timestamp' => $this->timestamp,
        );
    }

    /**
     * @return OrderBufferEvent
     */
    public static function fromArray(array $data)
    {
        $entity = new self();
        $entity->setId(array_key_exists('id', $data) ? $data['id'] : null);
        $entity->setEvent($data['event']);
        $entity->setStatus($data['status']);
        $entity->setOrderId($data['orderId']);
        $entity->setTimestamp($data['timestamp']);

        return $entity;
    }
}
