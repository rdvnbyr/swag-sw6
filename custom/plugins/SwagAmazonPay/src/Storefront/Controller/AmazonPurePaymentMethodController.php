<?php declare(strict_types=1);

namespace Swag\AmazonPay\Storefront\Controller;

use Psr\Log\LoggerInterface;
use Shopware\Core\Checkout\Order\Aggregate\OrderTransaction\OrderTransactionEntity;
use Shopware\Core\Checkout\Order\Aggregate\OrderTransaction\OrderTransactionStateHandler;
use Shopware\Core\Checkout\Payment\Cart\PaymentHandler\AbstractPaymentHandler;
use Shopware\Core\Checkout\Payment\Cart\PaymentTransactionStruct;
use Shopware\Core\Checkout\Payment\PaymentException;
use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepository;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Filter\EqualsFilter;
use Shopware\Core\Framework\Uuid\Uuid;
use Shopware\Core\System\SalesChannel\SalesChannelContext;
use Shopware\Storefront\Controller\StorefrontController;
use Swag\AmazonPay\Components\Config\Validation\Exception\ConfigValidationException;
use Swag\AmazonPay\Installer\PaymentMethodInstaller;
use Swag\AmazonPay\Storefront\Page\Extension\AmazonPurePaymentExtension;
use Swag\AmazonPay\Storefront\Page\Extension\ExtensionService;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\RouterInterface;

#[Route(defaults: ['_routeScope' => ['storefront']])]
class AmazonPurePaymentMethodController extends StorefrontController
{
    public const AMAZON_CHECKOUT_SESSION_ID_PARAMETER_KEY = 'amazonCheckoutSessionId';


    public function __construct(
        private readonly ExtensionService             $extensionService,
        private readonly EntityRepository             $orderTransactionRepository,
        private readonly AbstractPaymentHandler       $amazonPaymentHandler,
        private readonly RouterInterface              $router,
        private readonly OrderTransactionStateHandler $transactionStateHandler,
        private readonly LoggerInterface              $logger
    )
    {
    }

    /**
     * Renders a temporary page which immediately starts the Amazon Pay flow.
     */
    #[Route(path: 'checkout/amazon-pay-init-checkout/{orderTransactionId}', name: 'frontend.checkout.amazon_pay_init_checkout', methods: ['GET'])]
    public function initCheckout(string $orderTransactionId, Request $request, SalesChannelContext $salesChannelContext): Response
    {
        if (!Uuid::isValid($orderTransactionId)) {
            throw PaymentException::invalidTransaction($orderTransactionId);
        }

        $criteria = new Criteria([$orderTransactionId]);
        $criteria->addAssociation('order');
        $criteria->setLimit(1);
        $criteria->addFilter(
            new EqualsFilter('paymentMethodId', PaymentMethodInstaller::AMAZON_PAYMENT_ID)
        );

        /** @var OrderTransactionEntity|null $orderTransaction */
        $orderTransaction = $this->orderTransactionRepository->search($criteria, $salesChannelContext->getContext())->first();
        if ($orderTransaction === null) {
            throw PaymentException::invalidTransaction($orderTransactionId);
        }

        try {
            $amazonPurePaymentExtension = $this->extensionService->getPurePaymentExtension(
                $salesChannelContext,
                $orderTransaction,
                $request->isSecure()
            );
        } catch (ConfigValidationException) {
            return $this->failPayment($orderTransaction, $salesChannelContext->getContext());
        }

        if ($amazonPurePaymentExtension === null) {
            return $this->failPayment($orderTransaction, $salesChannelContext->getContext());
        }

        return $this->renderStorefront(
            '@SwagAmazonPay/storefront/page/checkout/pure-payment-redirect/index.html.twig',
            [
                AmazonPurePaymentExtension::EXTENSION_NAME => $amazonPurePaymentExtension,
            ]
        );
    }

    #[Route(path: 'payment/amazon-pay/finalize/{orderTransactionId}', name: 'payment.amazon.finalize.transaction', methods: ['GET'])]
    public function finalizeTransaction(string $orderTransactionId, Request $request, SalesChannelContext $salesChannelContext): RedirectResponse
    {
        $criteria = new Criteria([$orderTransactionId]);
        $criteria->setLimit(1);
        $criteria->addAssociation('order');

        /** @var OrderTransactionEntity|null $orderTransaction */
        $orderTransaction = $this->orderTransactionRepository->search($criteria, $salesChannelContext->getContext())->first();
        if ($orderTransaction === null) {
            throw PaymentException::invalidTransaction($orderTransactionId);
        }

        $order = $orderTransaction->getOrder();
        if ($order === null) {
            throw PaymentException::invalidTransaction($orderTransactionId);
        }

        $transactionStruct = new PaymentTransactionStruct(
            $orderTransactionId
        );

        $context = $salesChannelContext->getContext();
        $orderId = $order->getId();

        try {
            $this->amazonPaymentHandler->finalize(
                $request,
                $transactionStruct,
                $context
            );
        } catch (PaymentException $e) {
            return $this->redirectToAfterOrderPaymentProcess(
                $orderTransactionId,
                $e,
                $context,
                $orderId
            );
        }

        return new RedirectResponse($this->router->generate('frontend.checkout.finish.page', [
            'orderId' => $orderId,
        ]));
    }

    private function failPayment(OrderTransactionEntity $orderTransaction, Context $context): RedirectResponse
    {
        $this->logger->error('A checkout for a pure payment method could not be initialized.', [$orderTransaction]);

        $orderId = $orderTransaction->getOrderId();
        $paymentProcessException = PaymentException::asyncProcessInterrupted($orderTransaction->getId(), 'A checkout for a pure payment method could not be initialized');

        return $this->redirectToAfterOrderPaymentProcess(
            $orderTransaction->getId(),
            $paymentProcessException,
            $context,
            $orderId
        );
    }

    private function redirectToAfterOrderPaymentProcess(string $orderTransactionId, PaymentException $paymentProcessException, Context $context, string $orderId): RedirectResponse
    {
        $errorUrl = $this->router->generate('frontend.account.edit-order.page', ['orderId' => $orderId]);

        if ($paymentProcessException->getErrorCode() === PaymentException::PAYMENT_CUSTOMER_CANCELED_EXTERNAL) {
            $this->transactionStateHandler->cancel(
                $orderTransactionId,
                $context
            );
            $urlQuery = \parse_url($errorUrl, \PHP_URL_QUERY) ? '&' : '?';

            return new RedirectResponse(\sprintf('%s%serror-code=%s', $errorUrl, $urlQuery, $paymentProcessException->getErrorCode()));
        }


        $this->logger->error(
            'An error occurred during finalizing async payment',
            ['orderTransactionId' => $orderTransactionId, 'exceptionMessage' => $paymentProcessException->getMessage()]
        );

        $this->transactionStateHandler->fail(
            $orderTransactionId,
            $context
        );
        $urlQuery = \parse_url($errorUrl, \PHP_URL_QUERY) ? '&' : '?';

        return new RedirectResponse(\sprintf('%s%serror-code=%s', $errorUrl, $urlQuery, $paymentProcessException->getErrorCode()));
    }
}
