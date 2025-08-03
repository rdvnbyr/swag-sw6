<?php

namespace Sendcloud\Shipping\Core\BusinessLogic\Interfaces;

/**
 * Interface ExceptionLogProxyInterface
 * @package Sendcloud\Shipping\Core\BusinessLogic\Interfaces
 */
interface ExceptionLogProxyInterface
{
    const CLASS_NAME = __CLASS__;

    /**
     * @param $exceptionLog
     *
     * @return void
     */
    public function sendExceptionLog($exceptionLog);
}
