<?php

namespace Sendcloud\Shipping\Core\BusinessLogic\DTO;

/**
 * Class DiscountGrantedDTO
 * @package Sendcloud\Shipping\Core\BusinessLogic\DTO
 */
class DiscountGrantedDTO
{
    /**
     * @var int
     */
    private $value;
    /**
     * @var string
     */
    private $currency;

    /**
     * @param int $value
     * @param string $currency
     */
    public function __construct($value, $currency)
    {
        $this->value = $value;
        $this->currency = $currency;
    }

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return array(
            'value' => $this->getValue(),
            'currency' => $this->getCurrency(),
        );
    }
}
