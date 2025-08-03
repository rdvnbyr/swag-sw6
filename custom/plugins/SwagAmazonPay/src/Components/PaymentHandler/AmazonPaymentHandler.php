<?php

declare(strict_types=1);

namespace Swag\AmazonPay\Components\PaymentHandler;

use AmazonPayApiSdkExtension\Struct\ChargeAmount;
use AmazonPayApiSdkExtension\Struct\PaymentDetails;
use Exception;
use Psr\Log\LoggerInterface;
use Shopware\Core\Checkout\Order\Aggregate\OrderTransaction\OrderTransactionEntity;
use Shopware\Core\Checkout\Order\Aggregate\OrderTransaction\OrderTransactionStateHandler;
use Shopware\Core\Checkout\Payment\Cart\PaymentHandler\AbstractPaymentHandler;
use Shopware\Core\Checkout\Payment\Cart\PaymentHandler\PaymentHandlerType;
use Shopware\Core\Checkout\Payment\Cart\PaymentTransactionStruct;
use Shopware\Core\Checkout\Payment\PaymentException;
use Shopware\Core\Framework\Api\Context\SalesChannelApiSource;
use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepository;
use Shopware\Core\Framework\Struct\Struct;
use Swag\AmazonPay\Components\Client\ClientProviderInterface;
use Swag\AmazonPay\Components\Client\Hydrator\Request\CreateCheckoutSession\CreateCheckoutSessionHydrator;
use Swag\AmazonPay\Components\Client\Hydrator\Request\UpdateCheckoutSession\UpdateCheckoutSessionHydratorInterface;
use Swag\AmazonPay\Components\Client\Service\Exception\ChargePaymentException;
use Swag\AmazonPay\Components\Client\Validation\Exception\PaymentDeclinedException;
use Swag\AmazonPay\Components\Client\Validation\Exception\ResponseValidationException;
use Swag\AmazonPay\Components\Client\Validation\ResponseValidatorInterface;
use Swag\AmazonPay\Components\Transaction\TransactionService;
use Swag\AmazonPay\Core\AmazonPay\SalesChannel\AmazonPayRoute;
use Swag\AmazonPay\DataAbstractionLayer\Entity\AmazonPayTransaction\AmazonPayTransactionEntity;
use Swag\AmazonPay\Installer\CustomFieldsInstaller;
use Swag\AmazonPay\Storefront\Controller\AmazonPurePaymentMethodController;
use Swag\AmazonPay\SwagAmazonPay;
use Swag\AmazonPay\Util\Helper\AmazonPayPaymentMethodHelperInterface;
use Swag\AmazonPay\Util\Util;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Routing\RouterInterface;

class AmazonPaymentHandler extends AbstractPaymentHandler
{
    public const REQUEST_PARAMETER_AMAZON_PAY_INITIALIZE_PURE_PAYMENT_URL = 'amazonPayInitializePurePaymentUrl';

    public function __construct(
        readonly private ClientProviderInterface                $clientProvider,
        readonly private UpdateCheckoutSessionHydratorInterface $updateCheckoutSessionHydrator,
        readonly ?RequestStack                                  $requestStack,
        readonly private ResponseValidatorInterface             $paymentProcessResponseValidator,
        readonly private ResponseValidatorInterface             $paymentFinalizeResponseValidator,
        readonly private EntityRepository                       $transactionRepository,
        readonly private TransactionService                     $transactionService,
        readonly private LoggerInterface                        $logger,
        readonly private OrderTransactionStateHandler           $orderTransactionStateHandler,
        readonly private RouterInterface                        $router
    )
    {
    }

    public function pay(
        Request                  $request,
        PaymentTransactionStruct $transaction,
        Context                  $context,
        ?Struct                  $validateStruct
    ): RedirectResponse
    {
        $orderTransactionId = $transaction->getOrderTransactionId();
        $this->logger->debug('AmazonPaymentHandler::pay() called with transactionId: ' . $orderTransactionId);

        if (method_exists($this->orderTransactionStateHandler, 'processUnconfirmed')) {
            try {
                $this->orderTransactionStateHandler->processUnconfirmed($orderTransactionId, $context);
            } catch (Exception $e) {
                $this->logger->warning('AmazonPaymentHandler::pay() processUnconfirmed failed: ' . $e->getMessage());
            }
        }

        if (!$request->get('amazonPayCheckoutId')) {
            if ($context->getSource() instanceof SalesChannelApiSource) {
                $redirectUrl = $request->get(static::REQUEST_PARAMETER_AMAZON_PAY_INITIALIZE_PURE_PAYMENT_URL);
                if (!empty($redirectUrl)) {
                    $redirectUrl .= (!str_contains($redirectUrl, '?') ? '?' : '&') . AmazonPayRoute::REQUEST_PARAMETER_ORDER_TRANSACTION_ID . '=' . $orderTransactionId;

                    return new RedirectResponse($redirectUrl);
                }
            }
            $this->logger->debug('AmazonPaymentHandler::pay() switching to pure payment method handler for transactionId: ' . $orderTransactionId);

            return $this->getPurePaymentRedirect($orderTransactionId);
        }

        $orderTransaction = $this->transactionService->getOrderTransaction($transaction->getOrderTransactionId(), $context);
        $amazonPayCheckoutSessionId = $request->get('amazonPayCheckoutId');
        $this->logger->debug('AmazonPaymentHandler::pay() validate address for transactionId: ' . $orderTransactionId);
        try {
            $this->validateAddress($amazonPayCheckoutSessionId, $orderTransaction, $context);
        } catch (Exception $e) {
            $this->logger->warning('AmazonPaymentHandler::pay() address not valid for transactionId ' . $orderTransactionId . ': ' . $e->getMessage());
            return $this->getPurePaymentRedirect($orderTransactionId);
        }
        $this->logger->debug('AmazonPaymentHandler::pay() address validated for transactionId: ' . $orderTransactionId);

        $this->setTransactionCustomFields(
            $orderTransaction,
            $amazonPayCheckoutSessionId,
            null,
            null,
            $context
        );
        $order = $this->transactionService->getOrderFromOrderTransaction($orderTransaction, $context, true);
        $updatedSessionData = $this->updateCheckoutSessionHydrator->hydrate(
            $orderTransaction,
            $order,
            $transaction->getReturnUrl(),
            $context
        );

        try {
            $client = $this->clientProvider->getClient($orderTransaction->getOrder()->getSalesChannelId());
            $checkoutSession = $client->updateCheckoutSession(
                $amazonPayCheckoutSessionId,
                $updatedSessionData,
                $this->clientProvider->getHeaders()
            );

            $this->paymentProcessResponseValidator->validateResponse($checkoutSession);

            if ($request->getSession()) {
                // Remove the "on hold" checkout session id from the session.
                if ($request->getSession()->has(SwagAmazonPay::CHECKOUT_SESSION_KEY)) {
                    $request->getSession()->remove(SwagAmazonPay::CHECKOUT_SESSION_KEY);
                }
            }
            $this->logger->debug('AmazonPaymentHandler::pay() redirecting to: ' . $checkoutSession->getWebCheckoutDetails()->getAmazonPayRedirectUrl());

            return new RedirectResponse($checkoutSession->getWebCheckoutDetails()->getAmazonPayRedirectUrl());
        } catch (ResponseValidationException|Exception $exception) {
            $this->logPaymentProcessingError('Could not process payment:', $exception, [
                'checkoutSessionResponse' => $checkoutSession ?? ['not obtained'],
                'amazonPayCheckoutId' => $amazonPayCheckoutSessionId,
            ]);

            throw PaymentException::asyncProcessInterrupted($orderTransactionId, $exception->getMessage());
        }
    }

    public function finalize(
        Request                  $request,
        PaymentTransactionStruct $transaction,
        Context                  $context
    ): void
    {
        $orderTransactionId = $transaction->getOrderTransactionId();
        if ($request->query->has(CreateCheckoutSessionHydrator::CUSTOMER_CANCELLED_PARAMETER) && $request->query->getBoolean(CreateCheckoutSessionHydrator::CUSTOMER_CANCELLED_PARAMETER)) {
            throw PaymentException::customerCanceled($orderTransactionId, '');
        }
        $orderTransaction = $this->transactionService->getOrderTransaction($orderTransactionId, $context);
        // Initially fetch the checkoutSessionId from the custom fields
        $transactionCustomFields = $orderTransaction->getCustomFields();
        if (isset($transactionCustomFields[CustomFieldsInstaller::CUSTOM_FIELD_NAME_CHECKOUT_ID])) {
            $amazonPayCheckoutSessionId = $transactionCustomFields[CustomFieldsInstaller::CUSTOM_FIELD_NAME_CHECKOUT_ID];
        }

        // If the finalize request contains a checkoutSessionId use this one instead. (Used for after order pure payment flow)
        if ($request->query->has(AmazonPurePaymentMethodController::AMAZON_CHECKOUT_SESSION_ID_PARAMETER_KEY)) {
            $amazonPayCheckoutSessionId = $request->query->get(AmazonPurePaymentMethodController::AMAZON_CHECKOUT_SESSION_ID_PARAMETER_KEY);
        }

        // Store API
        if ($request->request->has(AmazonPayRoute::REQUEST_PARAMETER_AMAZON_CHECKOUT_SESSION_ID)) {
            $amazonPayCheckoutSessionId = $request->request->get(AmazonPayRoute::REQUEST_PARAMETER_AMAZON_CHECKOUT_SESSION_ID);
        }

        // Finally check that a checkoutSessionId was obtained in any way
        if (empty($amazonPayCheckoutSessionId)) {
            $this->logPaymentProcessingError('Could not finalize payment: No checkout session id found.', new Exception());
            throw PaymentException::asyncFinalizeInterrupted($orderTransactionId, 'Could not determine the Amazon Pay Checkout Session.');
        }

        $salesChannelId = $orderTransaction->getOrder()->getSalesChannelId();
        $order = $this->transactionService->getOrderFromOrderTransaction($orderTransaction, $context, true);
        try {
            $this->logger->debug('AmazonPaymentHandler::finalize() called with checkoutSessionId: ' . $amazonPayCheckoutSessionId);
            $client = $this->clientProvider->getClient($salesChannelId);
            $chargeAmount = (new ChargeAmount([
                'amount' => Util::round(
                    $order->getAmountTotal(),
                    AmazonPayPaymentMethodHelperInterface::DEFAULT_DECIMAL_PRECISION
                ),
                'currencyCode' => $order->getCurrency()->getIsoCode(),
            ]));

            $paymentDetails = (new PaymentDetails())->setChargeAmount($chargeAmount);

            $checkoutSession = $client->completeCheckoutSession(
                $amazonPayCheckoutSessionId,
                $paymentDetails,
                $this->clientProvider->getHeaders()
            );

            try {
                $this->orderTransactionStateHandler->reopen($orderTransactionId, $context);
            } catch (Exception $e) {
                $this->logger->warning('AmazonPaymentHandler::finalize() reopen failed: ' . $e->getMessage());
            }

            $this->paymentFinalizeResponseValidator->validateResponse($checkoutSession);

            /** @var string|null $chargeId */
            $chargeId = $checkoutSession->getChargeId() ?? null;
            $chargePermissionId = $checkoutSession->getChargePermissionId() ?? null;

            $this->setTransactionCustomFields(
                $orderTransaction,
                $amazonPayCheckoutSessionId,
                $chargeId,
                $chargePermissionId,
                $context
            );

            if (!$chargeId) {
                return;
            }
            $chargePermission = $client->getChargePermission($chargePermissionId);
            $this->transactionService->persistAmazonPayTransaction($chargePermission, $context, $orderTransaction);
            $chargePermissionEntity = $this->transactionService->getAmazonPayTransactionEntity(
                $chargePermissionId,
                AmazonPayTransactionEntity::TRANSACTION_TYPE_CHARGE_PERMISSION,
                $context,
                true,
                $salesChannelId
            );
            $charge = $client->getCharge($chargeId);
            $this->transactionService->updateCharge($charge, $context, $orderTransaction, $chargePermissionEntity);
        } catch (ResponseValidationException|PaymentDeclinedException $exception) {
            $this->logPaymentProcessingError('Payment has been declined:', $exception, [
                'checkoutSessionResponse' => $checkoutSessionResponse ?? ['not obtained'],
                'amazonPayCheckoutId' => $amazonPayCheckoutSessionId,
            ]);

            $this->setTransactionCustomFieldsOnError(
                $orderTransaction,
                $amazonPayCheckoutSessionId,
                $checkoutSession['reasonCode'] ?? 'Unknown',
                $checkoutSession['message'] ?? 'An unknown error occurred',
                $context
            );

            throw PaymentException::asyncFinalizeInterrupted($orderTransactionId, $exception->getMessage());
        } catch (ChargePaymentException $exception) {
            $this->logPaymentProcessingError('Could not charge payment:', $exception, [
                'checkoutSessionResponse' => $checkoutSessionResponse ?? ['not obtained'],
                'amazonPayCheckoutId' => $amazonPayCheckoutSessionId,
            ]);
        } catch (Exception $exception) {
            $this->logPaymentProcessingError('Could not finalize payment:', $exception, [
                'checkoutSessionResponse' => $checkoutSessionResponse ?? ['not obtained'],
                'amazonPayCheckoutId' => $amazonPayCheckoutSessionId,
            ]);

            throw PaymentException::asyncFinalizeInterrupted($orderTransactionId, $exception->getMessage());
        }

        // Reset the AmazonPay related errors
        $this->setTransactionCustomFieldsOnError(
            $orderTransaction,
            $amazonPayCheckoutSessionId,
            null,
            null,
            $context
        );
    }

    /**
     * Sets the Amazon Pay specific custom fields to a transaction.
     */
    private function setTransactionCustomFields(OrderTransactionEntity $orderTransaction, string $checkoutSessionId, ?string $chargeId, ?string $chargePermissionId, Context $context): void
    {
        $customFields = [
            CustomFieldsInstaller::CUSTOM_FIELD_NAME_CHECKOUT_ID => $checkoutSessionId,
            CustomFieldsInstaller::CUSTOM_FIELD_NAME_CHARGE_ID => $chargeId,
            CustomFieldsInstaller::CUSTOM_FIELD_NAME_CHARGE_PERMISSION_ID => $chargePermissionId,
        ];

        $existingCustomFields = $orderTransaction->getCustomFields() ?? [];

        // In case that the cache kicks in update the current struct either to avoid any misbehavior when working with custom fields in later steps.
        $orderTransaction->setCustomFields(
            \array_merge($existingCustomFields, $customFields)
        );

        $this->transactionRepository->upsert([
            [
                'id' => $orderTransaction->getId(),
                'customFields' => $customFields,
            ],
        ], $context);
    }

    /**
     * Sets the Amazon Pay specific custom fields to a transaction on process error.
     */
    private function setTransactionCustomFieldsOnError(
        OrderTransactionEntity $orderTransactionEntity,
        string                 $checkoutSessionId,
        ?string                $reasonCode,
        ?string                $reasonDescription,
        Context                $context,
    ): void
    {
        $customFields = [
            CustomFieldsInstaller::CUSTOM_FIELD_NAME_CHECKOUT_ID => $checkoutSessionId,
            CustomFieldsInstaller::CUSTOM_FIELD_NAME_ERROR_REASON_CODE => $reasonCode,
            CustomFieldsInstaller::CUSTOM_FIELD_NAME_ERROR_REASON_DESCRIPTION => $reasonDescription,
        ];

        $existingCustomFields = $orderTransactionEntity->getCustomFields() ?? [];

        // To avoid any misbehavior when working with custom fields in later steps.
        $orderTransactionEntity->setCustomFields(
            \array_merge($existingCustomFields, $customFields)
        );

        $this->transactionRepository->upsert([
            [
                'id' => $orderTransactionEntity->getId(),
                'customFields' => $customFields,
            ],
        ], $context);
    }

    private function logPaymentProcessingError(string $message, Exception $exception, array $arguments = []): void
    {
        $this->logger->error(\sprintf($message . ' %s', $exception->getMessage()), $arguments);
    }

    /**
     * @throws Exception
     */
    private function validateAddress(mixed $amazonPayCheckoutSessionId, OrderTransactionEntity $orderTransaction, Context $context): void
    {
        $order = $this->transactionService->getOrderFromOrderTransaction($orderTransaction, $context);
        $deliveries = $order->getDeliveries();
        if (empty($deliveries) || empty($deliveries->first())) {
            $this->logger->warning('No delivery found for order: ' . $order->getId());
            return;
        }
        $delivery = $deliveries->first();
        $orderShippingAddress = $delivery->getShippingOrderAddress();

        $checkoutSession = $this->clientProvider->getClient($order->getSalesChannelId())->getCheckoutSession($amazonPayCheckoutSessionId);
        $address = $checkoutSession->getShippingAddress();
        if ($address->getCountryCode() !== $orderShippingAddress->getCountry()->getIso()) {
            throw new Exception('Checkout shipping address country code does not match');
        }
        if ($address->getPostalCode() !== $orderShippingAddress->getZipcode()) {
            throw new Exception('Checkout shipping address postal code does not match');
        }
        if ($address->getCity() !== $orderShippingAddress->getCity()) {
            throw new Exception('Checkout shipping address city does not match');
        }
        $addressLinesCombined = $address->getAddressLine1() . $address->getAddressLine2() . $address->getAddressLine3();
        if (stripos($addressLinesCombined, $orderShippingAddress->getStreet()) === false) {
            throw new Exception('Checkout shipping address street does not match');
        }
    }

    public function supports(PaymentHandlerType $type, string $paymentMethodId, Context $context): bool
    {
        return false;
    }

    public function getPurePaymentRedirect(
        string $orderTransactionId
    ): RedirectResponse
    {
        return new RedirectResponse(
            $this->router->generate(
                'frontend.checkout.amazon_pay_init_checkout',
                [
                    'orderTransactionId' => $orderTransactionId,
                ]
            )
        );
    }
}
