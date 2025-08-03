<?php

namespace Sendcloud\Shipping\Core\BusinessLogic\DTO\V3;

class Price extends AbstractDTO
{
    /**
     * @var float
     */
    private $value;
    /**
     * @var string
     */
    private $currency;

    /**
     * @param float $value
     * @param string $currency
     */
    public function __construct($value, $currency)
    {
        $this->value = $value;
        $this->currency = $currency;
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
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    public function toArray()
    {
        return array(
            'value' => round($this->getValue(), 2),
            'currency' => $this->getCurrency()
        );
    }
}