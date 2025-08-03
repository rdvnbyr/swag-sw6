<?php

namespace Sendcloud\Shipping\Core\BusinessLogic\DTO\V3;

/**
 * Class BillingAddress
 * @package Sendcloud\Shipping\Core\BusinessLogic\DTO\v3
 */
class BillingAddress extends AbstractDTO
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $company;
    /**
     * @var string
     */
    private $toState;
    /**
     * @var string
     */
    private $address1;
    /**
     * @var string
     */
    private $houseNumber;
    /**
     * @var string
     */
    private $address2;
    /**
     * @var string
     */
    private $postalCode;
    /**
     * @var string
     */
    private $city;
    /**
     * @var string
     */
    private $countryCode;
    /**
     * @var string
     */
    private $email;
    /**
     * @var string
     */
    private $phone;

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
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param string $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }

    /**
     * @return string
     */
    public function getAddress1()
    {
        return $this->address1;
    }

    /**
     * @param string $address1
     */
    public function setAddress1($address1)
    {
        $this->address1 = $address1;
    }

    /**
     * @return string
     */
    public function getHouseNumber()
    {
        return $this->houseNumber;
    }

    /**
     * @param string $houseNumber
     */
    public function setHouseNumber($houseNumber)
    {
        $this->houseNumber = $houseNumber;
    }

    /**
     * @return string
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * @param string $address2
     */
    public function setAddress2($address2)
    {
        $this->address2 = $address2;
    }

    /**
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @param string $postalCode
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * @param string $countryCode
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getToState()
    {
        return $this->toState;
    }

    /**
     * @param string $toState
     */
    public function setToState($toState)
    {
        $this->toState = $toState;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return array(
            'name' => $this->getName(),
            'address_line_1' => $this->getAddress1(),
            'house_number' => $this->getHouseNumber(),
            'address_line_2' => $this->getAddress2(),
            'postal_code' => $this->getPostalCode(),
            'city' => $this->getCity(),
            'country_code' => $this->getCountryCode(),
            'email' => $this->getEmail(),
            'phone_number' => $this->getPhone(),
            'state_province_code' => $this->getToState()
        );
    }
}
