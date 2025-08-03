<?php

namespace Sendcloud\Shipping\Core\BusinessLogic\DTO\V3;

/**
 * Class AbstractDTO
 * @package Sendcloud\Shipping\Core\BusinessLogic\DTO\v3
 */
abstract class AbstractDTO
{
    /**
     * @return array
     */
    abstract public function toArray();

    /**
     * @return array
     */
    public function toBatch($batchData)
    {
        $result = array();
        foreach ($batchData as $data) {
            $result[] = $data->toArray();
        }

        return $result;
    }
}
