<?php

namespace Sendcloud\Shipping\Core\BusinessLogic\ProxyV3;

use Sendcloud\Shipping\Core\BusinessLogic\BaseProxy;
use Sendcloud\Shipping\Core\BusinessLogic\DTO\Http\HttpRequest;
use Sendcloud\Shipping\Core\BusinessLogic\Interfaces\OrderProxyInterface;
use Sendcloud\Shipping\Core\Infrastructure\Logger\Logger;
use Sendcloud\Shipping\Core\Infrastructure\Utility\Exceptions\HttpAuthenticationException;
use Sendcloud\Shipping\Core\Infrastructure\Utility\Exceptions\HttpBatchSizeTooBigException;
use Sendcloud\Shipping\Core\Infrastructure\Utility\Exceptions\HttpCommunicationException;
use Sendcloud\Shipping\Core\Infrastructure\Utility\Exceptions\HttpRequestException;
use Sendcloud\Shipping\Core\Infrastructure\Utility\HttpResponse;

/**
 * Class OrderProxy
 * @package Sendcloud\Shipping\Core\BusinessLogic\ProxyV3
 */
class OrderProxy extends BaseProxy implements OrderProxyInterface
{
    const CLASS_NAME = __CLASS__;
    const API_VERSION = 'v3';

    /**
     * Makes orders upsert call to SendCloud
     *
     * @param array $orderDTOs
     *
     * @return void
     *
     * @throws HttpAuthenticationException
     * @throws HttpBatchSizeTooBigException
     * @throws HttpCommunicationException
     * @throws HttpRequestException
     */
    public function ordersMassUpdate(array $orderDTOs)
    {
        $orders = $this->getTransformer()->transformOrders($orderDTOs);

        try {
            $httpRequest = new HttpRequest('orders', 'POST', $orders, $this->getHeaders());
            $this->call($httpRequest);
        } catch (HttpRequestException $exception) {
            $batchSize = count($orderDTOs);
            $this->checkMassUpdateBatchSizeValidity($exception, $batchSize);

            throw $exception;
        }
    }

    /**
     * Cancel order by external ID
     *
     * @param $externalOrderId
     *
     * @return void
     *
     * @throws HttpAuthenticationException
     * @throws HttpCommunicationException
     * @throws HttpRequestException
     */
    public function cancelOrderById($externalOrderId)
    {
        $orderId = $this->getOrderIdByNumber($externalOrderId);

        $httpRequest = new HttpRequest('orders/' . $orderId, 'DELETE', array(), $this->getHeaders());
        $this->call($httpRequest);
    }

    /**
     * @return string
     */
    protected function getApiVersion()
    {
        return self::API_VERSION;
    }

    /**
     * Returns json decoded response body.
     *
     * @return array Response body decoded as json decode.
     */
    protected function decodeResponseBodyToArray(HttpResponse $response)
    {
        $result = json_decode($response->getBody(), true);

        return !empty($result) ? $result : array();
    }

    /**
     * @param HttpRequestException $ex
     * @param int $batchSize
     *
     * @throws HttpBatchSizeTooBigException
     */
    private function checkMassUpdateBatchSizeValidity($ex, $batchSize)
    {
        if ($ex->getCode() === self::HTTP_STATUS_CODE_NOT_SUCCESSFUL_FOR_DEFINED_BATCH_SIZE) {
            Logger::logWarning('Upsert of orders not done for batch size ' . $batchSize . '.');

            throw new HttpBatchSizeTooBigException('Batch size ' . $batchSize . ' too big for upsert');
        }
    }

    /**
     * Returns order ID by order number
     *
     * @param $orderNumber
     *
     * @return string
     *
     * @throws HttpAuthenticationException
     * @throws HttpCommunicationException
     * @throws HttpRequestException
     */
    private function getOrderIdByNumber($orderNumber)
    {
        $orderNumberParameter = 'order_number=' . $orderNumber;

        $httpRequest = new HttpRequest('orders?' . $orderNumberParameter , 'GET', array(), $this->getHeaders());
        $response = $this->call($httpRequest);

        $arrResponse = $this->decodeResponseBodyToArray($response);

        return !empty($arrResponse) && !empty($arrResponse['data']) ? $arrResponse['data'][0]['id'] : '';
    }
}
