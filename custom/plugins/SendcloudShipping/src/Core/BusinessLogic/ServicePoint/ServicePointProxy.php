<?php

namespace Sendcloud\Shipping\Core\BusinessLogic\ServicePoint;

use Sendcloud\Shipping\Core\BusinessLogic\BaseProxy;
use Sendcloud\Shipping\Core\BusinessLogic\DTO\Http\HttpRequest;
use Sendcloud\Shipping\Core\BusinessLogic\ServicePoint\DTO\ServicePointAddress;
use Sendcloud\Shipping\Core\Infrastructure\Utility\Exceptions\HttpAuthenticationException;
use Sendcloud\Shipping\Core\Infrastructure\Utility\Exceptions\HttpCommunicationException;
use Sendcloud\Shipping\Core\Infrastructure\Utility\Exceptions\HttpRequestException;

class ServicePointProxy extends BaseProxy
{
    const API_VERSION = 'v2';

    /**
     * @param ServicePointAddress $address
     *
     * @return int
     *
     * @throws HttpAuthenticationException
     * @throws HttpCommunicationException
     * @throws HttpRequestException
     */
    public function countServicePointsByAddress($address)
    {
        $request = new HttpRequest(
            $this->buildUrl('service-points', $address),
            'GET'
        );

        $request->setHeaders($this->getHeaders());

        $response = $this->call($request);
        $body = $this->decodeResponseBodyToArray($response);

        return count($body);
    }

    /**
     * @return string
     */
    protected function getApiVersion()
    {
        return self::API_VERSION;
    }

    /**
     * @return string
     */
    protected function getBaseUrl()
    {
        return rtrim($this->configService->getBaseServicePointApiUrl(), '/') . '/api/' ;
    }

    /**
     * @param $url
     * @param $address
     *
     * @return string
     */
    private function buildUrl($url, $address)
    {
        $queryParams = http_build_query(array(
            'country' => $address->getCountry(),
            'postalCode' => $address->getPostalCode(),
            'city' => $address->getCity(),
            'carrier' => $address->getCarrier()
        ));

        return $url . '?' . $queryParams;
    }

    /**
     *
     * @param $response
     *
     * @return array
     */
    private function decodeResponseBodyToArray($response)
    {
        $result = json_decode($response->getBody(), true);

        return !empty($result) ? $result : array();
    }
}
