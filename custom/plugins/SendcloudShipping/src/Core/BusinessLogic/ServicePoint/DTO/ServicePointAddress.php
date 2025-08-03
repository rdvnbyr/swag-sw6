<?php

namespace Sendcloud\Shipping\Core\BusinessLogic\ServicePoint\DTO;

class ServicePointAddress
{
    /**
     * @var string
     */
    private $country;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $postalCode;

    /**
     * @var string
     */
    private $carrier;

    /**
     * @param string $country
     * @param string $city
     * @param string $postalCode
     * @param string $carrier
     */
    public function __construct($country, $city, $postalCode, $carrier)
    {
        $this->country = $country;
        $this->city = $city;
        $this->postalCode = $postalCode;
        $this->carrier = $carrier;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @return string
     */
    public function getCarrier()
    {
        return $this->carrier;
    }
}
