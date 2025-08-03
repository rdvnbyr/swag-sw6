<?php

namespace Sendcloud\Shipping\Core\Infrastructure\Utility\Exceptions;

use Sendcloud\Shipping\Core\BusinessLogic\DTO\Http\HttpRequest;
use Sendcloud\Shipping\Core\Infrastructure\Utility\HttpResponse;

/**
 * Class FieldErrorException
 * @package Sendcloud\Shipping\Core\Infrastructure\Utility\Exceptions
 */
class FieldErrorException extends \Exception
{
    const CLASS_NAME = 'FieldErrorException';

    /**
     * @var HttpRequest
     */
    private $httpRequest;
    /**
     * @var HttpResponse
     */
    private $httpResponse;

    public function __construct($message = '', $code = 0, $httpRequest = null, $httpResponse = null, $previous = null)
    {
        $this->httpRequest = $httpRequest;
        $this->httpResponse = $httpResponse;

        parent::__construct($message, $code, $previous);
    }

    /**
     * @return HttpRequest|null
     */
    public function getHttpRequest()
    {
        return $this->httpRequest;
    }

    /**
     * @return HttpResponse|null
     */
    public function getHttpResponse()
    {
        return $this->httpResponse;
    }
}
