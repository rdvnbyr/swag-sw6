<?php

namespace Sendcloud\Shipping\Core\BusinessLogic\DTO\V3;

/**
 * Class Status
 * @package Sendcloud\Shipping\Core\BusinessLogic\DTO\v3
 */
class Status extends AbstractDTO
{
    /**
     * @var string
     */
    private $code;
    /**
     * @var string
     */
    private $message;

    /**
     * @param string $code
     * @param string $message
     */
    public function __construct($code, $message)
    {
        $this->code = $code;
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return array(
            'code' => $this->getCode(),
            'message' => $this->getMessage()
        );
    }
}
