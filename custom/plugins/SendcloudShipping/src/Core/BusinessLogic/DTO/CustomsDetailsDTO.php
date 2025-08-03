<?php

namespace Sendcloud\Shipping\Core\BusinessLogic\DTO;

class CustomsDetailsDTO
{
    /**
     * @var string|null
     */
    private $customsInvoiceNumber;

    /**
     * @var string|null
     */
    private $customsShipmentType;

    /**
     * @var string|null
     */
    private $exportType;

    /**
     * @var DiscountGrantedDTO|null
     */
    private $discountGranted;

    /**
     * @var FreightCostDTO|null
     */
    private $freightCosts;

    /**
     * @return string|null
     */
    public function getCustomsInvoiceNumber()
    {
        return $this->customsInvoiceNumber;
    }

    /**
     * @param string|null $customsInvoiceNumber
     */
    public function setCustomsInvoiceNumber($customsInvoiceNumber)
    {
        $this->customsInvoiceNumber = $customsInvoiceNumber;
    }

    /**
     * @return string|null
     */
    public function getCustomsShipmentType()
    {
        return $this->customsShipmentType;
    }

    /**
     * @param string|null $customsShipmentType
     */
    public function setCustomsShipmentType($customsShipmentType)
    {
        $this->customsShipmentType = $customsShipmentType;
    }

    /**
     * @return string|null
     */
    public function getExportType()
    {
        return $this->exportType;
    }

    /**
     * @param string|null $exportType
     */
    public function setExportType($exportType)
    {
        $this->exportType = $exportType;
    }

    /**
     * @return DiscountGrantedDTO|null
     */
    public function getDiscountGranted()
    {
        return $this->discountGranted;
    }

    /**
     * @param DiscountGrantedDTO|null $discountGranted
     */
    public function setDiscountGranted($discountGranted)
    {
        $this->discountGranted = $discountGranted;
    }

    /**
     * @return FreightCostDTO|null
     */
    public function getFreightCosts()
    {
        return $this->freightCosts;
    }

    /**
     * @param FreightCostDTO|null $freightCosts
     */
    public function setFreightCosts($freightCosts)
    {
        $this->freightCosts = $freightCosts;
    }
}
