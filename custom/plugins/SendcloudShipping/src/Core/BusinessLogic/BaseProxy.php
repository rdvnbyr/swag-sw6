<?php

namespace Sendcloud\Shipping\Core\BusinessLogic;

use Sendcloud\Shipping\Core\BusinessLogic\DTO\Http\HttpRequest;
use Sendcloud\Shipping\Core\BusinessLogic\Interfaces\Configuration;
use Sendcloud\Shipping\Core\BusinessLogic\Interfaces\ExceptionLogProxyInterface;
use Sendcloud\Shipping\Core\BusinessLogic\Services\ExceptionLogBuilderService;
use Sendcloud\Shipping\Core\Infrastructure\Interfaces\Required\HttpClient;
use Sendcloud\Shipping\Core\Infrastructure\Logger\Logger;
use Sendcloud\Shipping\Core\Infrastructure\ServiceRegister;
use Sendcloud\Shipping\Core\Infrastructure\Utility\Exceptions\FieldErrorException;
use Sendcloud\Shipping\Core\Infrastructure\Utility\Exceptions\HttpAuthenticationException;
use Sendcloud\Shipping\Core\Infrastructure\Utility\Exceptions\HttpCommunicationException;
use Sendcloud\Shipping\Core\Infrastructure\Utility\Exceptions\HttpRequestException;
use Sendcloud\Shipping\Core\Infrastructure\Utility\Exceptions\TooManyRequestsException;
use Sendcloud\Shipping\Core\Infrastructure\Utility\HttpResponse;

/**
 * Class BaseProxy
 * @package Sendcloud\Shipping\Core\BusinessLogic
 */
abstract class BaseProxy
{
    const HTTP_STATUS_CODE_BAD_REQUEST = 400;
    const HTTP_STATUS_CODE_UNAUTHORIZED = 401;
    const HTTP_STATUS_CODE_FORBIDDEN = 403;
    const HTTP_STATUS_CODE_NOT_SUCCESSFUL_FOR_DEFINED_BATCH_SIZE = 413;
    const HTTP_STATUS_CODE_TOO_MANY_REQUESTS = 429;

    /**
     * @var Configuration
     */
    protected $configService;
    /**
     * @var HttpClient
     */
    protected $client;
    /**
     * @var ProxyTransformer
     */
    protected $transformer;
    /**
     * @var ExceptionLogProxyInterface
     */
    protected $exceptionLogProxy;

    /**
     * @return string
     */
    abstract protected function getApiVersion();

    /**
     * Call http client
     *
     * @param HttpRequest $httpRequest
     *
     * @return HttpResponse
     *
     * @throws HttpAuthenticationException
     * @throws HttpCommunicationException
     * @throws HttpRequestException
     */
    public function call(HttpRequest $httpRequest)
    {
        $this->checkSendcloudCredentials();

        $bodyStringToSend = '';
        if (in_array(strtoupper($httpRequest->getMethod()), array('POST', 'PUT'))) {
            $bodyStringToSend = json_encode($httpRequest->getBody());
        }

        $url = $this->getBaseUrl() . $this->getApiVersion() . '/' . ltrim($httpRequest->getUrl(), '/');
        $response = $this->getClient()->request($httpRequest->getMethod(), $url, $httpRequest->getHeaders(), $bodyStringToSend);
        try {
            $this->validateResponse($response, $httpRequest);
        } catch (FieldErrorException $e) {
            $this->handleFieldErrorException($e);
        } catch (TooManyRequestsException $e) {
            $this->handleTooManyRequestsException($e);
        }

        return $response;
    }

    /**
     * Validate response
     *
     * @param HttpResponse $response
     * @param HttpRequest|null $request
     *
     * @throws HttpAuthenticationException
     * @throws HttpRequestException
     * @throws TooManyRequestsException
     * @throws FieldErrorException
     */
    protected function validateResponse(HttpResponse $response, HttpRequest $request = null)
    {
        if (!$response->isSuccessful()) {
            $httpCode = $response->getStatus();
            $message = $response->getBody();

            Logger::logWarning($message);
            if ($httpCode === self::HTTP_STATUS_CODE_UNAUTHORIZED
                || $httpCode === self::HTTP_STATUS_CODE_FORBIDDEN
            ) {
                throw new HttpAuthenticationException($message, $httpCode);
            }

            if ($this->isFieldError($response)) {
                throw new FieldErrorException('Could not synchronize order. Reason: ' . $message, $response->getStatus(), $request, $response);
            }

            if ($httpCode === self::HTTP_STATUS_CODE_TOO_MANY_REQUESTS) {
                throw new TooManyRequestsException('Too many requests error. ' . $message, $response->getStatus(), $request, $response);
            }

            throw new HttpRequestException($message, $httpCode, null, $response);
        }
    }

    /**
     * Returns headers together with authorization entry
     *
     * @param string $publicKey
     * @param string $secretKey
     *
     * @return array
     */
    protected function getHeaders($publicKey = '', $secretKey = '')
    {
        $publicKey = $publicKey === '' ? $this->getConfigService()->getPublicKey() : $publicKey;
        $secretKey = $secretKey === '' ? $this->getConfigService()->getSecretKey() : $secretKey;

        return array(
            'accept' => 'Accept: application/json',
            'content' => 'Content-Type: application/json',
            'token' => 'Authorization: Basic ' . base64_encode("$publicKey:$secretKey"),
        );
    }

    /**
     * Checks if public and secret keys exist
     *
     * @throws HttpCommunicationException
     */
    protected function checkSendcloudCredentials()
    {
        $publicKey = $this->configService->getPublicKey();
        $secretKey = $this->configService->getSecretKey();

        if (empty($publicKey) || empty($secretKey)) {
            $errorMessage = 'Missing credentials. Public and secret keys are not set in Configuration service.';
            Logger::logWarning($errorMessage);
            throw new HttpCommunicationException($errorMessage);
        }
    }

    /**
     * Checks if response body contains field errors
     *
     * @param HttpResponse $response
     *
     * @return bool
     */
    protected function isFieldError(HttpResponse $response)
    {
        return $response->getStatus() === self::HTTP_STATUS_CODE_BAD_REQUEST
            && strpos($response->getBody(), 'detail')
            && strpos($response->getBody(), 'pointer')
            && strpos($response->getBody(), 'data/attributes');
    }

    /**
     * This check should prevent entering infinite loop in case when sendExceptionLog proxy call fails
     *
     * @param string $endpoint
     *
     * @return bool
     */
    protected function isSendLogEndpoint($endpoint)
    {
        $integrationId = $this->configService->getIntegrationId();
        $endpoint = ltrim(rtrim($endpoint, '/'), '/');

        return $endpoint === "integrations/$integrationId/logs";
    }

    /**
     * Returns SendCloud base url
     *
     * @return string
     */
    protected function getBaseUrl()
    {
        return $this->configService->getBaseApiUrl() . 'api/';
    }

    /**
     * @param string $endpoint
     *
     * @return string
     */
    protected function getFormattedUrl($endpoint)
    {
        return $this->getBaseUrl() . $this->getApiVersion() . '/' .ltrim($endpoint, '/');
    }

    /**
     * @return Configuration
     */
    protected function getConfigService()
    {
        if ($this->configService === null) {
            $this->configService = ServiceRegister::getService(Configuration::CLASS_NAME);
        }

        return $this->configService;
    }

    /**
     * @return HttpClient
     */
    protected function getClient()
    {
        if ($this->client === null) {
            $this->client = ServiceRegister::getService(HttpClient::CLASS_NAME);
        }

        return $this->client;
    }

    /**
     * @return ProxyTransformer
     */
    protected function getTransformer()
    {
        if ($this->transformer === null) {
            $this->transformer = ServiceRegister::getService(ProxyTransformer::CLASS_NAME);
        }

        return $this->transformer;
    }

    /**
     * @return ExceptionLogProxyInterface
     */
    protected function getExceptionLogProxy()
    {
        if ($this->exceptionLogProxy === null) {
            $this->exceptionLogProxy = ServiceRegister::getService(ExceptionLogProxyInterface::CLASS_NAME);
        }

        return $this->exceptionLogProxy;
    }

    /**
     * @param TooManyRequestsException $exception
     *
     * @return void
     */
    private function handleTooManyRequestsException(TooManyRequestsException $exception)
    {
        if (!$this->isSendLogEndpoint($exception->getHttpRequest()->getUrl())) {
            $this->getExceptionLogProxy()->sendExceptionLog(
                ExceptionLogBuilderService::createExceptionLogObject(
                    $exception,
                    $this->getBaseUrl(),
                    $this->getFormattedUrl($exception->getHttpRequest()->getUrl())
                )
            );
        }
    }

    /**
     * @param FieldErrorException $exception
     *
     * @return void
     */
    private function handleFieldErrorException(FieldErrorException $exception)
    {
        if (!$this->isSendLogEndpoint($exception->getHttpRequest()->getUrl())) {
            $this->getExceptionLogProxy()->sendExceptionLog(
                ExceptionLogBuilderService::createExceptionLogObject(
                    $exception,
                    $this->getBaseUrl(),
                    $this->getFormattedUrl($exception->getHttpRequest()->getUrl())
                )
            );
        }
    }
}
