<?php

namespace Sendcloud\Shipping\Core\BusinessLogic\Serializer;

/**
 * Class NativeSerializer
 * @package Sendcloud\Shipping\Core\BusinessLogic\Serializer
 */
class NativeSerializer extends Serializer
{
    /**
     * Serializes data.
     *
     * @param mixed $data Data to be serialized.
     *
     * @return string String representation of the serialized data.
     */
    protected function doSerialize($data)
    {
        return serialize($data);
    }

    /**
     * Unserializes data.
     *
     * @param string $serialized Serialized data.
     *
     * @return mixed Unserialized data.
     */
    protected function doUnserialize($serialized)
    {
        try {
            $unserialized = unserialize($serialized);
        } catch (\Exception $e) {
            return null;
        }

        return $unserialized;
    }

    /**
     * Serializes data. This method is added as compatibility with PHP versions >= 8.1
     *
     * @param array $data
     *
     * @return array
     */
    protected function __doSerialize($data)
    {
        return $data;
    }

    /**
     * Retrieves unserialized data. This method is added as compatibility with PHP versions >= 8.1
     *
     * @param array $data
     *
     * @return array
     */
    protected function __doUnserialize($data)
    {
        return $data;
    }
}
