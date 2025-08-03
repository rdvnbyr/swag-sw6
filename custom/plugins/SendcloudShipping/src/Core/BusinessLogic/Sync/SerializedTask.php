<?php

namespace Sendcloud\Shipping\Core\BusinessLogic\Sync;

use Sendcloud\Shipping\Core\BusinessLogic\Serializer\Serializer;
use Sendcloud\Shipping\Core\Infrastructure\TaskExecution\Task;

/**
 * Class SerializedTask
 * @package Sendcloud\Shipping\Core\BusinessLogic\Sync
 */
abstract class SerializedTask extends Task
{
    /**
     * @return string
     */
    public function serialize()
    {
        return Serializer::serialize($this->toArray());
    }

    /**
     * Constructs the object
     *
     * @param string $serialized
     */
    public function unserialize($serialized)
    {
        $data = Serializer::unserialize($serialized);
        $this->fromArray($data);
    }

    /**
     * @return array
     */
    public function __serialize()
    {
        return Serializer::__serializeData($this->toAssocArray());
    }

    /**
     * Constructs the object
     *
     * @param array $data
     *
     * @return void
     */
    public function __unserialize(array $data)
    {
        $data = Serializer::__unserializeData($data);
        $this->fromAssocArray($data);
    }

    /**
     * Convert object to array
     *
     * @return array
     */
    abstract protected function toArray();

    /**
     * Convert object to associative array
     *
     * @return array
     */
    abstract protected function toAssocArray();

    /**
     * Set object properties from array
     *
     * @param array $data
     */
    abstract protected function fromArray(array $data);

    /**
     * Set object properties from associative array
     *
     * @param array $data
     */
    abstract protected function fromAssocArray(array $data);
}
