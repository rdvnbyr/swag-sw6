<?php

namespace Sendcloud\Shipping\Core\BusinessLogic\DTO\V3;

/**
 * Class CustomsDetails
 * @package Sendcloud\Shipping\Core\BusinessLogic\DTO\v3
 */
class CustomsDetails extends AbstractDTO
{
    /**
     * @var string
     */
    private $invoiceNumber;
    /**
     * @var string
     */
    private $shipmentType;

    /**
     * @param string $invoiceNumber
     * @param string $shipmentType
     */
    public function __construct($invoiceNumber, $shipmentType)
    {
        $this->invoiceNumber = $invoiceNumber;
        $this->shipmentType = $shipmentType;
    }

    /**
     * @return string
     */
    public function getInvoiceNumber()
    {
        return $this->invoiceNumber;
    }

    /**
     * @param string $invoiceNumber
     */
    public function setInvoiceNumber($invoiceNumber)
    {
        $this->invoiceNumber = $invoiceNumber;
    }

    /**
     * @return string
     */
    public function getShipmentType()
    {
        return $this->shipmentType;
    }

    /**
     * @param string $shipmentType
     */
    public function setShipmentType($shipmentType)
    {
        $this->shipmentType = $shipmentType;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $array = array(
            'commercial_invoice_number' => $this->getInvoiceNumber(),
            'shipment_type' => $this->getShipmentType()
        );

        return array_filter($array, function ($value) {
            return !empty($value);
        });
    }
}
