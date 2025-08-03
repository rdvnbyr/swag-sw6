<?php

namespace Sendcloud\Shipping\Core\BusinessLogic\Entity\V3;

use Sendcloud\Shipping\Core\BusinessLogic\DTO\V3\AbstractDTO;
use Sendcloud\Shipping\Core\BusinessLogic\DTO\V3\BillingAddress;
use Sendcloud\Shipping\Core\BusinessLogic\DTO\V3\CustomerDetails;
use Sendcloud\Shipping\Core\BusinessLogic\DTO\V3\CustomsDetails;
use Sendcloud\Shipping\Core\BusinessLogic\DTO\V3\OrderDetails;
use Sendcloud\Shipping\Core\BusinessLogic\DTO\V3\PaymentDetails;
use Sendcloud\Shipping\Core\BusinessLogic\DTO\V3\ServicePointDetails;
use Sendcloud\Shipping\Core\BusinessLogic\DTO\V3\ShippingAddress;
use Sendcloud\Shipping\Core\BusinessLogic\DTO\V3\ShippingDetails;
use Sendcloud\Shipping\Core\BusinessLogic\Entity\Order as OrderV2;
use Sendcloud\Shipping\Core\BusinessLogic\Entity\OrderItem as OrderItemV2;

/**
 * Class Order
 * @package Sendcloud\Shipping\Core\BusinessLogic\Entity\v3
 */
class Order extends AbstractDTO
{
    /**
     * @var string
     */
    private $id;
    /**
     * @var string
     */
    private $orderNumber;
    /**
     * @var OrderDetails
     */
    private $orderDetails;
    /**
     * @var PaymentDetails
     */
    private $paymentDetails;
    /**
     * @var CustomerDetails|null
     */
    private $customerDetails;
    /**
     * @var CustomsDetails
     */
    private $customsDetails;
    /**
     * @var ShippingAddress
     */
    private $shippingAddress;
    /**
     * @var ShippingDetails
     */
    private $shippingDetails;
    /**
     * @var BillingAddress
     */
    private $billingAddress;
    /**
     * @var ServicePointDetails|null
     */
    private $servicePointDetails;

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
    public function getOrderNumber()
    {
        return $this->orderNumber;
    }

    /**
     * @param string $orderNumber
     */
    public function setOrderNumber($orderNumber)
    {
        $this->orderNumber = $orderNumber;
    }

    /**
     * @return OrderDetails
     */
    public function getOrderDetails()
    {
        return $this->orderDetails;
    }

    /**
     * @param OrderDetails $orderDetails
     */
    public function setOrderDetails($orderDetails)
    {
        $this->orderDetails = $orderDetails;
    }

    /**
     * @return PaymentDetails
     */
    public function getPaymentDetails()
    {
        return $this->paymentDetails;
    }

    /**
     * @param PaymentDetails $paymentDetails
     */
    public function setPaymentDetails($paymentDetails)
    {
        $this->paymentDetails = $paymentDetails;
    }

    /**
     * @return CustomerDetails
     */
    public function getCustomerDetails()
    {
        return $this->customerDetails;
    }

    /**
     * @param CustomerDetails $customerDetails
     */
    public function setCustomerDetails($customerDetails)
    {
        $this->customerDetails = $customerDetails;
    }

    /**
     * @return CustomsDetails|null
     */
    public function getCustomsDetails()
    {
        return $this->customsDetails;
    }

    /**
     * @param CustomsDetails|null $customsDetails
     */
    public function setCustomsDetails($customsDetails)
    {
        $this->customsDetails = $customsDetails;
    }

    /**
     * @return ShippingAddress
     */
    public function getShippingAddress()
    {
        return $this->shippingAddress;
    }

    /**
     * @param ShippingAddress $shippingAddress
     */
    public function setShippingAddress($shippingAddress)
    {
        $this->shippingAddress = $shippingAddress;
    }

    /**
     * @return BillingAddress
     */
    public function getBillingAddress()
    {
        return $this->billingAddress;
    }

    /**
     * @param BillingAddress $billingAddress
     *
     * @return void
     */
    public function setBillingAddress($billingAddress)
    {
        $this->billingAddress = $billingAddress;
    }

    /**
     * @return ShippingDetails
     */
    public function getShippingDetails()
    {
        return $this->shippingDetails;
    }

    /**
     * @param ShippingDetails $shippingDetails
     */
    public function setShippingDetails($shippingDetails)
    {
        $this->shippingDetails = $shippingDetails;
    }

    /**
     * @return ServicePointDetails|null
     */
    public function getServicePointDetails()
    {
        return $this->servicePointDetails;
    }

    /**
     * @param ServicePointDetails|null $servicePointDetails
     */
    public function setServicePointDetails($servicePointDetails)
    {
        $this->servicePointDetails = $servicePointDetails;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return array(
            'order_id' => $this->getId(),
            'order_number' => $this->getOrderNumber(),
            'order_details' => $this->getOrderDetails() ? $this->getOrderDetails()->toArray() : array(),
            'payment_details' => $this->getPaymentDetails() ? $this->getPaymentDetails()->toArray() : array(),
            'customs_details' => $this->getCustomsDetails() ? $this->getCustomsDetails()->toArray() : null,
            'customer_details' => $this->getCustomerDetails() ? $this->getCustomerDetails()->toArray() : array(),
            'shipping_address' => $this->getShippingAddress() ? $this->getShippingAddress()->toArray() : array(),
            'billing_address' => $this->getBillingAddress() ? $this->getBillingAddress()->toArray() : array(),
            'shipping_details' => $this->getShippingDetails() ? $this->getShippingDetails()->toArray() : array(),
            'service_point_details' => $this->getServicePointDetails() ? $this->getServicePointDetails()->toArray() : null
        );
    }

    /**
     * Maps V3 order entity to V2 order
     *
     * @return OrderV2
     */
    public function toV2()
    {
        $orderV2 = new OrderV2();

        $orderV2->setId($this->id);
        $orderV2->setNumber($this->orderNumber);

        if ($shipping = $this->getShippingAddress()) {
            $orderV2->setAddress($shipping->getAddress1());
            $orderV2->setAddress2($shipping->getAddress2());
            $orderV2->setHouseNumber($shipping->getHouseNumber());
            $orderV2->setCity($shipping->getCity());
            $orderV2->setPostalCode($shipping->getPostalCode());
            $orderV2->setCountryCode($shipping->getCountryCode());
            $orderV2->setCompanyName($shipping->getCompany());
            $orderV2->setToState($shipping->getToState());
        }

        if ($shippingDetails = $this->getShippingDetails()) {
            if ($measurement = $shippingDetails->getMeasurement()) {
                if ($measurement->getWeight()) {
                    $orderV2->setWeight($measurement->getWeight()->getValue());
                }
                if ($measurement->getDimension()) {
                    $orderV2->setLength($measurement->getDimension()->getLength());
                    $orderV2->setWidth($measurement->getDimension()->getWidth());
                    $orderV2->setHeight($measurement->getDimension()->getHeight());
                }
            }

            $orderV2->setCheckoutShippingName($shippingDetails->getDeliveryIndicator());
        }

        if ($paymentDetails = $this->getPaymentDetails()) {
            if ($paymentDetails->getTotalPrice()) {
                $orderV2->setTotalValue($paymentDetails->getTotalPrice()->getValue());
                $orderV2->setCurrency($paymentDetails->getTotalPrice()->getCurrency());
            }
            if ($paymentDetails->getStatus()) {
                $orderV2->setPaymentStatusId($paymentDetails->getStatus()->getCode());
                $orderV2->setPaymentStatusName($paymentDetails->getStatus()->getMessage());
            }
        }

        if ($customer = $this->getCustomerDetails()) {
            $orderV2->setEmail($customer->getEmail());
            $orderV2->setCustomerName($customer->getName());
            $orderV2->setTelephone($customer->getPhone());
        }

        if ($orderDetails = $this->getOrderDetails()) {
            $orderV2->setItems($this->toV2OrderItems($orderDetails->getOrderItems()));
            if ($orderDetails->getOrderStatus()) {
                $orderV2->setStatusId($orderDetails->getOrderStatus()->getCode());
                $orderV2->setStatusName($orderDetails->getOrderStatus()->getMessage());
            }
            $orderV2->setCreatedAt($orderDetails->getCreatedAt());
            $orderV2->setUpdatedAt($orderDetails->getUpdatedAt());
        }

        if ($customs = $this->getCustomsDetails()) {
            $orderV2->setCustomsInvoiceNr($customs->getInvoiceNumber());
            $orderV2->setCustomsShipmentType($customs->getShipmentType());
        }

        if ($servicePoint = $this->getServicePointDetails()) {
            $orderV2->setToServicePoint($servicePoint->getId());
            $orderV2->setToPostNumber($servicePoint->getPostNumber());
        }

        return $orderV2;
    }

    /**
     * Maps V3 order items to V2 order items
     *
     * @param OrderItem[] $orderItems
     *
     * @return OrderItemV2[]
     */
    private function toV2OrderItems(array $orderItems)
    {
        $items = [];

        foreach ($orderItems as $orderItem) {
            $itemV2 = new OrderItemV2();
            $itemV2->setProductId($orderItem->getProductId());
            $itemV2->setSku($orderItem->getSku());
            $itemV2->setQuantity($orderItem->getQuantity());
            $itemV2->setDescription($orderItem->getDescription());
            if ($orderItem->getTotalPrice()) {
                $itemV2->setValue($orderItem->getTotalPrice()->getValue());
            }
            if ($orderItem->getMeasurement() && $weight = $orderItem->getMeasurement()->getWeight()) {
                $itemV2->setWeight($weight->getValue());
            }
            $itemV2->setHsCode($orderItem->getHsCode());
            $itemV2->setOriginCountry($orderItem->getCountryOfOrigin());
            $itemV2->setProperties($orderItem->getProperties());

            $items[] = $itemV2;
        }

        return $items;
    }
}
