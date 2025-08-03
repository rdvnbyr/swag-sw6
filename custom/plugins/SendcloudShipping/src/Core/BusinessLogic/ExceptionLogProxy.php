<?php

namespace Sendcloud\Shipping\Core\BusinessLogic;

use Sendcloud\Shipping\Core\BusinessLogic\DTO\Http\HttpRequest;
use Sendcloud\Shipping\Core\BusinessLogic\Interfaces\ExceptionLogProxyInterface;
use Sendcloud\Shipping\Core\Infrastructure\Logger\Logger;

/**
 * Class ExceptionLogV2
 * @package Sendcloud\Shipping\Core\BusinessLogic
 */
class ExceptionLogProxy extends BaseProxy implements ExceptionLogProxyInterface
{
    const API_VERSION = 'v2';

    /**
     * @param $exceptionLog
     *
     * @return void
     */
    public function sendExceptionLog($exceptionLog)
    {
        try {
            $integrationId = $this->getConfigService()->getIntegrationId();
            $payload = $this->getTransformer()->transformExceptionLog($exceptionLog);
            $httpRequest = new HttpRequest("/integrations/$integrationId/logs", "POST", $payload, $this->getHeaders());

            $this->call($httpRequest);
        } catch (\Exception $exception) {
            Logger::logError('Error while logging exception message to Sendcloud: ' . $exception->getMessage());
        }
    }

    /**
     * @return string
     */
    protected function getApiVersion()
    {
        return self::API_VERSION;
    }
}
