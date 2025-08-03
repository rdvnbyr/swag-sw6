<?php

namespace Sendcloud\Shipping\Core\BusinessLogic\DTO\V3\Response;

class OrderResponse
{
    /**
     * @var string
     */
    private $id;
    /**
     * @var Error[]
     */
    private $errors;

    /**
     * @param string $id
     * @param Error[] $errors
     */
    public function __construct($id, array $errors)
    {
        $this->id = $id;
        $this->errors = $errors;
    }

    /**
     * @return string
     */
    public function getExternalOrderId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setExternalOrderId($id)
    {
        $this->id = $id;
    }

    /**
     * @return Error[]
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @param Error[] $errors
     */
    public function setErrors($errors)
    {
        $this->errors = $errors;
    }
}
