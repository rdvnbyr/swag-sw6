<?php

declare(strict_types=1);

namespace Swag\AmazonPay\Components\Client\Hydrator\Request\UpdateCheckoutSession;

use Shopware\Core\Checkout\Order\Aggregate\OrderTransaction\OrderTransactionEntity;
use Shopware\Core\Checkout\Order\OrderEntity;
use Shopware\Core\Framework\Context;
use Swag\AmazonPay\Components\Client\Hydrator\Request\CreateCheckoutSession\CreateCheckoutSessionHydrator;
use Swag\AmazonPay\Components\Config\ConfigServiceInterface;
use Swag\AmazonPay\Installer\CustomFieldsInstaller;
use Swag\AmazonPay\Util\Config\VersionProviderInterface;
use Swag\AmazonPay\Util\Helper\AmazonPayPaymentMethodHelperInterface;
use Swag\AmazonPay\Util\Util;

class UpdateCheckoutSessionHydrator implements UpdateCheckoutSessionHydratorInterface
{
    public const MERCHANT_STORE_NAME_MAX_CHARACTERS = 50;

    private ConfigServiceInterface $configService;

    private VersionProviderInterface $versionProvider;

    public function __construct(
        ConfigServiceInterface $configService,
        VersionProviderInterface $versionProvider
    ) {
        $this->configService = $configService;
        $this->versionProvider = $versionProvider;
    }

    /**
     * {@inheritdoc}
     */
    public function hydrate(
        OrderTransactionEntity $orderTransaction,
        OrderEntity $order,
        string $returnUrl,
        Context $context,
        string $paymentIntent = UpdateCheckoutSessionHydratorInterface::PAYMENT_INTENT_AUTHORIZE,
        string $noteToBuyer = ''
    ): array {
        $salesChannelId = $order->getSalesChannelId();
        $customFields = (array) $orderTransaction->getCustomFields();

        $checkoutId = $customFields[CustomFieldsInstaller::CUSTOM_FIELD_NAME_CHECKOUT_ID] ?? '';
        $versions = $this->versionProvider->getVersions($context);

        $pluginConfig = $this->configService->getPluginConfig($salesChannelId);


        return [
            'webCheckoutDetails' => [
                'checkoutResultReturnUrl' => \sprintf(
                    '%s&amazonPayCheckoutId=%s',
                    $returnUrl,
                    $checkoutId
                ),
                'checkoutCancelUrl' => \sprintf(
                    '%s&%s',
                    $returnUrl,
                    CreateCheckoutSessionHydrator::CUSTOMER_CANCELLED_PARAMETER
                ),
            ],
            'paymentDetails' => [
                'paymentIntent' => $paymentIntent,
                'canHandlePendingAuthorization' => $pluginConfig->canHandlePendingAuth(),
                'chargeAmount' => [
                    'amount' => Util::round(
                        $order->getAmountTotal(),
                        AmazonPayPaymentMethodHelperInterface::DEFAULT_DECIMAL_PRECISION
                    ),
                    'currencyCode' => $order->getCurrency()->getIsoCode(),
                ],
            ],
            'merchantMetadata' => [
                'merchantReferenceId' => $order->getOrderNumber(),
                'merchantStoreName' => \mb_substr((string) $this->configService->getSystemConfig('core.basicInformation.shopName', $salesChannelId), 0, self::MERCHANT_STORE_NAME_MAX_CHARACTERS),
                'noteToBuyer' => $noteToBuyer,
                'customInformation' => \sprintf('Created by shopware AG, Shopware %s, %s', $versions['shopware'], $versions['plugin']),
            ],
            'platformId' => ConfigServiceInterface::PLATFORM_ID,
        ];
    }
}
