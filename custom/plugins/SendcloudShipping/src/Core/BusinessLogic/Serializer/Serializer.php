<?php

namespace Sendcloud\Shipping\Core\BusinessLogic\Serializer;

use Sendcloud\Shipping\Core\Infrastructure\ServiceRegister;

/**
 * Class Serializer
 * @package Sendcloud\Shipping\Core\BusinessLogic\Serializer
 */
abstract class Serializer
{
    /**
     * string CLASS_NAME Class name identifier.
     */
    const CLASS_NAME = __CLASS__;

    /**
     * Serializes data.
     *
     * @param mixed $data Data to be serialized.
     *
     * @return string String representation of the serialized data.
     */
    public static function serialize($data)
    {
        /** @var \Logeecom\Infrastructure\Serializer\Serializer $instace */
        $instance = ServiceRegister::getService(self::CLASS_NAME);

        return $instance->doSerialize($data);
    }

    /**
     * Unserializes data.
     *
     * @param string $serialized Serialized data.
     *
     * @return mixed Unserialized data.
     */
    public static function unserialize($serialized)
    {
        /** @var Serializer $instace */
        $instance = ServiceRegister::getService(self::CLASS_NAME);

        return $instance->doUnserialize($serialized);
    }

    /**
     * Serializes data. This method is added as compatibility with PHP versions >= 8.1
     *
     * @param array $data
     *
     * @return array
     */
    public static function __serializeData($data)
    {
        /** @var Serializer $instace */
        $instance = ServiceRegister::getService(self::CLASS_NAME);

        return $instance->__doSerialize($data);
    }

    /**
     * Unserializes data. This method is added as compatibility with PHP versions >= 8.1
     *
     * @param array $data
     *
     * @return array
     */
    public static function __unserializeData($data)
    {
        /** @var Serializer $instace */
        $instance = ServiceRegister::getService(self::CLASS_NAME);

        return $instance->__doUnserialize($data);
    }

    /**
     * Serializes data.
     *
     * @param mixed $data Data to be serialized.
     *
     * @return string String representation of the serialized data.
     */
    abstract protected function doSerialize($data);

    /**
     * Unserializes data.
     *
     * @param string $serialized Serialized data.
     *
     * @return mixed Unserialized data.
     */
    abstract protected function doUnserialize($serialized);

    /**
     * Serializes data. This method is added as compatibility with PHP versions >= 8.1
     *
     * @param array $data (assoc array).
     *
     * @return array
     */
    abstract protected function __doSerialize($data);

    /**
     * Unserializes data. This method is added as compatibility with PHP versions >= 8.1
     *
     * @param array $data
     *
     * @return array Unserialized data.
     */
    abstract protected function __doUnserialize($data);
}
