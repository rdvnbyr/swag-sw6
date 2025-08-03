<?php

namespace Sendcloud\Shipping\Core\BusinessLogic\DTO\V3;

/**
 * Class Weight
 * @package Sendcloud\Shipping\Core\BusinessLogic\DTO\v3
 */
class Weight extends AbstractDTO
{
    /**
     * @var float
     */
    private $value;
    /**
     * @var string
     */
    private $unit;

    /**
     * @param float $value
     * @param string $unit
     */
    public function __construct($value, $unit)
    {
        $this->value = $value;
        $this->unit = $unit;
    }

    /**
     * @return float
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param float $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * @param string $unit
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return array(
            'value' => $this->getValue(),
            'unit' => $this->getUnit()
        );
    }
}
