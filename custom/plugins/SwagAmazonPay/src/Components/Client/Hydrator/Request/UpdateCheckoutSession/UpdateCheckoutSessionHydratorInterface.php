<?php

declare(strict_types=1);

namespace Swag\AmazonPay\Components\Client\Hydrator\Request\UpdateCheckoutSession;

use Shopware\Core\Checkout\Order\Aggregate\OrderTransaction\OrderTransactionEntity;
use Shopware\Core\Checkout\Order\OrderEntity;
use Shopware\Core\Framework\Context;
use Shopware\Core\System\Currency\CurrencyEntity;

interface UpdateCheckoutSessionHydratorInterface
{
    public const PAYMENT_INTENT_CONFIRM = 'Confirm';
    public const PAYMENT_INTENT_AUTHORIZE = 'Authorize';

    /**
     * Hydrates an update request for the CheckoutSession. Use the data to notify
     */
    public function hydrate(
        OrderTransactionEntity $orderTransaction,
        OrderEntity $order,
        string $returnUrl,
        Context $context,
        string $paymentIntent = self::PAYMENT_INTENT_AUTHORIZE,
        string $noteToBuyer = ''
    ): array;
}
