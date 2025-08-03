<?php

namespace Sendcloud\Shipping\Core\BusinessLogic\DTO\V3;

/**
 * Class ShippingDetails
 * @package Sendcloud\Shipping\Core\BusinessLogic\DTO\v3
 */
class ShippingDetails extends AbstractDTO
{
    /**
     * @var Measurement
     */
    private $measurement;
    /**
     * @var string
     */
    private $deliveryIndicator;

    /**
     * @param Measurement $measurement
     * @param $deliveryIndicator
     */
    public function __construct(Measurement $measurement, $deliveryIndicator)
    {
        $this->measurement = $measurement;
        $this->deliveryIndicator = $deliveryIndicator;
    }

    /**
     * @return Measurement
     */
    public function getMeasurement()
    {
        return $this->measurement;
    }

    /**
     * @param Measurement $measurement
     */
    public function setMeasurement($measurement)
    {
        $this->measurement = $measurement;
    }

    /**
     * @return string
     */
    public function getDeliveryIndicator()
    {
        return $this->deliveryIndicator;
    }

    /**
     * @param string $deliveryIndicator
     */
    public function setDeliveryIndicator($deliveryIndicator)
    {
        $this->deliveryIndicator = $deliveryIndicator;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return array(
            'measurement' => $this->getMeasurement() ? $this->getMeasurement()->toArray() : array(),
            'delivery_indicator' => $this->getDeliveryIndicator()
        );
    }
}
