<?php

namespace Sendcloud\Shipping\Core\BusinessLogic\Interfaces;

/**
 * Interface OrderProxyInterface
 * @package Sendcloud\Shipping\Core\BusinessLogic\Interfaces
 */
interface OrderProxyInterface
{
    /**
     * @param array $orderDTOs
     *
     * @return void
     */
    public function ordersMassUpdate(array $orderDTOs);
}
