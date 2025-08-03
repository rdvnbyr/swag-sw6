<?php

namespace Sendcloud\Shipping\Core\BusinessLogic\Services;

use Sendcloud\Shipping\Core\BusinessLogic\DTO\SendcloudExceptionLogs\ExceptionLog;
use Sendcloud\Shipping\Core\BusinessLogic\DTO\SendcloudExceptionLogs\ExceptionLogRequest;
use Sendcloud\Shipping\Core\BusinessLogic\DTO\SendcloudExceptionLogs\ExceptionLogResponse;
use Sendcloud\Shipping\Core\Infrastructure\Utility\Exceptions\FieldErrorException;
use Sendcloud\Shipping\Core\Infrastructure\Utility\Exceptions\TooManyRequestsException;
use Exception;

/**
 * Class ConnectService
 * @package Sendcloud\Shipping\Core\BusinessLogic\Services
 */
class ExceptionLogBuilderService
{
    /**
     * @param TooManyRequestsException $exception
     * @param string $baseUrl
     * @param string $formattedUrl
     *
     * @return ExceptionLog
     */
    public static function createExceptionLogObject(Exception $exception, $baseUrl, $formattedUrl)
    {
        $exceptionType = $exception->getHttpResponse()->getStatus() === 429 ? TooManyRequestsException::CLASS_NAME : FieldErrorException::CLASS_NAME;

        return new ExceptionLog(
            $exception->getMessage(),
            $exceptionType,
            $exception->getHttpRequest()->getMethod(),
            $exception->getHttpResponse()->getStatus(),
            new ExceptionLogRequest($exception->getHttpRequest()->getHeaders(), json_encode($exception->getHttpRequest()->getBody())),
            new ExceptionLogResponse($exception->getHttpResponse()->getHeaders(), json_encode($exception->getHttpResponse()->getBody())),
            $baseUrl,
            $formattedUrl,
            date('c', time()));
    }
}
