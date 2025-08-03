<?php

namespace Sendcloud\Shipping\Core\BusinessLogic\DTO\V3;

/**
 * Class Dimension
 * @package Sendcloud\Shipping\Core\BusinessLogic\DTO\v3
 */
class Dimension extends AbstractDTO
{
    /**
     * @var float
     */
    private $length;
    /**
     * @var float
     */
    private $width;
    /**
     * @var float
     */
    private $height;
    /**
     * @var string
     */
    private $unit;

    /**
     * @param float $length
     * @param float $width
     * @param float $height
     * @param string $unit
     */
    public function __construct($length, $width, $height, $unit)
    {
        $this->length = $length;
        $this->width = $width;
        $this->height = $height;
        $this->unit = $unit;
    }

    /**
     * @return float
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @param float $length
     */
    public function setLength($length)
    {
        $this->length = $length;
    }

    /**
     * @return float
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param float $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * @return float
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param float $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
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
            'length' => $this->getLength(),
            'width' => $this->getWidth(),
            'height' => $this->getHeight(),
            'unit' => $this->getUnit()
        );
    }
}
