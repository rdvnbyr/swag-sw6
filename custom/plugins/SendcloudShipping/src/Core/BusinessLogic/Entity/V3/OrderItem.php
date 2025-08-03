<?php

namespace Sendcloud\Shipping\Core\BusinessLogic\Entity\V3;

use Sendcloud\Shipping\Core\BusinessLogic\DTO\V3\AbstractDTO;
use Sendcloud\Shipping\Core\BusinessLogic\DTO\V3\Measurement;
use Sendcloud\Shipping\Core\BusinessLogic\DTO\V3\Price;

/**
 * Class OrderItem
 * @package Sendcloud\Shipping\Core\BusinessLogic\Entity\v3
 */
class OrderItem extends AbstractDTO
{
    /**
     * @var string
     */
    private $id;
    /**
     * @var string
     */
    private $productId;
    /**
     * @var string
     */
    private $variantId;
    /**
     * @var string
     */
    private $imageUrl;
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $description;
    /**
     * @var int
     */
    private $quantity;
    /**
     * @var string
     */
    private $sku;
    /**
     * @var string
     */
    private $hsCode;
    /**
     * @var string
     */
    private $countryOfOrigin;
    /**
     * @var array
     */
    private $properties;
    /**
     * @var Price
     */
    private $unitPrice;
    /**
     * @var Price
     */
    private $totalPrice;
    /**
     * @var Measurement
     */
    private $measurement;
    /**
     * @var string
     */
    private $midCode;
    /**
     * @var string
     */
    private $ean;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param string $productId
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;
    }

    /**
     * @return string
     */
    public function getVariantId()
    {
        return $this->variantId;
    }

    /**
     * @param string $variantId
     */
    public function setVariantId($variantId)
    {
        $this->variantId = $variantId;
    }

    /**
     * @return string
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    /**
     * @param string $imageUrl
     */
    public function setImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return string
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * @param string $sku
     */
    public function setSku($sku)
    {
        $this->sku = $sku;
    }

    /**
     * @return string
     */
    public function getHsCode()
    {
        return $this->hsCode;
    }

    /**
     * @param string $hsCode
     */
    public function setHsCode($hsCode)
    {
        $this->hsCode = $hsCode;
    }

    /**
     * @return string
     */
    public function getCountryOfOrigin()
    {
        return $this->countryOfOrigin;
    }

    /**
     * @param string $countryOfOrigin
     */
    public function setCountryOfOrigin($countryOfOrigin)
    {
        $this->countryOfOrigin = $countryOfOrigin;
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
     * @return Price
     */
    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    /**
     * @param Price $unitPrice
     */
    public function setUnitPrice($unitPrice)
    {
        $this->unitPrice = $unitPrice;
    }

    /**
     * @return array
     */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * @param array $properties
     */
    public function setProperties($properties)
    {
        $this->properties = $properties;
    }

    /**
     * @return string
     */
    public function getMidCode()
    {
        return $this->midCode;
    }

    /**
     * @param string $midCode
     */
    public function setMidCode($midCode)
    {
        $this->midCode = $midCode;
    }

    /**
     * @return string
     */
    public function getEan()
    {
        return $this->ean;
    }

    /**
     * @param string $ean
     */
    public function setEan($ean)
    {
        $this->ean = $ean;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return array(
            'item_id' => $this->getId(),
            'product_id' => $this->getProductId(),
            'variant_id' => $this->getVariantId(),
            'image_url' => $this->getImageUrl(),
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'quantity' => $this->getQuantity(),
            'sku' => $this->getSku(),
            'hs_code' => $this->getHsCode(),
            'country_of_origin' => $this->getCountryOfOrigin(),
            'properties' => (object)$this->getProperties(),
            'unit_price' => $this->getUnitPrice() ? $this->getUnitPrice()->toArray() : array(),
            'total_price' => $this->getTotalPrice() ? $this->getTotalPrice()->toArray() : array(),
            'measurement' => $this->getMeasurement() ? $this->getMeasurement()->toArray() : array(),
            'mid_code' => $this->getMidCode(),
            'ean' => $this->getEan()
        );
    }
}
