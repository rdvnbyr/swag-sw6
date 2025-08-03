<?php

namespace Sendcloud\Shipping\Core\BusinessLogic\DTO\V3;

/**
 * Class PaymentDetails
 * @package Sendcloud\Shipping\Core\BusinessLogic\DTO\v3
 */
class PaymentDetails extends AbstractDTO
{
    /**
     * @var Price
     */
    private $totalPrice;
    /**
     * @var Price
     */
    private $subTotalPrice;
    /**
     * @var Price
     */
    private $estimatedShippingPrice;
    /**
     * @var Price
     */
    private $estimatedTaxPrice;
    /**
     * @var Status
     */
    private $status;

    /**
     * @param Price $totalPrice
     * @param Price $subTotalPrice
     * @param Price $estimatedShippingPrice
     * @param Price $estimatedTaxPrice
     * @param Status $status
     */
    public function __construct(Price $totalPrice, Price $subTotalPrice, Price $estimatedShippingPrice,
                                Price $estimatedTaxPrice, Status $status)
    {
        $this->totalPrice = $totalPrice;
        $this->subTotalPrice = $subTotalPrice;
        $this->estimatedShippingPrice = $estimatedShippingPrice;
        $this->estimatedTaxPrice = $estimatedTaxPrice;
        $this->status = $status;
    }

    /**
     * @return Price
     */
    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    /**
     * @param Price $totalPrice
     */
    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;
    }

    /**
     * @return Price
     */
    public function getSubTotalPrice()
    {
        return $this->subTotalPrice;
    }

    /**
     * @param Price $subTotalPrice
     */
    public function setSubTotalPrice($subTotalPrice)
    {
        $this->subTotalPrice = $subTotalPrice;
    }

    /**
     * @return Price
     */
    public function getEstimatedShippingPrice()
    {
        return $this->estimatedShippingPrice;
    }

    /**
     * @param Price $estimatedShippingPrice
     */
    public function setEstimatedShippingPrice($estimatedShippingPrice)
    {
        $this->estimatedShippingPrice = $estimatedShippingPrice;
    }

    /**
     * @return Price
     */
    public function getEstimatedTaxPrice()
    {
        return $this->estimatedTaxPrice;
    }

    /**
     * @param Price $estimatedTaxPrice
     */
    public function setEstimatedTaxPrice($estimatedTaxPrice)
    {
        $this->estimatedTaxPrice = $estimatedTaxPrice;
    }

    /**
     * @return Status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param Status $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return array(
            'total_price' => $this->getTotalPrice() ? $this->getTotalPrice()->toArray() : array(),
            'subtotal_price' => $this->getSubTotalPrice() ? $this->getSubTotalPrice()->toArray() : array(),
            'estimated_shipping_price' => $this->getEstimatedShippingPrice() ? $this->getEstimatedShippingPrice()->toArray() : array(),
            'estimated_tax_price' => $this->getEstimatedTaxPrice() ? $this->getEstimatedTaxPrice()->toArray() : array(),
            'status' => $this->getStatus() ? $this->getStatus()->toArray() : array()
        );
    }
}
