<?php declare(strict_types=1);

namespace zenit\PlatformDemoData\Controller;

use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\Log\Package;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use zenit\PlatformDemoData\Core\CmsProvider\AtmosCmsDemoData;
use zenit\PlatformDemoData\Core\CmsProvider\CategoryCmsDemoData;
use zenit\PlatformDemoData\Core\CmsProvider\GravityCmsDemoData;
use zenit\PlatformDemoData\Core\CmsProvider\HorizonCmsDemoData;
use zenit\PlatformDemoData\Core\CmsProvider\ProductCmsDemoData;
use zenit\PlatformDemoData\Core\CmsProvider\SphereCmsDemoData;
use zenit\PlatformDemoData\Core\CmsProvider\StratusCmsDemoData;
use zenit\PlatformDemoData\Core\ProductDemoData;

#[\Symfony\Component\Routing\Attribute\Route(defaults: ['_routeScope' => ['api']])]
#[Package('administration')]
class DemoDataController
{
    /**
     * DemoDataController constructor.
     */
    public function __construct(private readonly ProductDemoData $productDemoData, private readonly GravityCmsDemoData $gravityCmsDemoData, private readonly HorizonCmsDemoData $horizonCmsDemoData, private readonly SphereCmsDemoData $sphereCmsDemoData, private readonly AtmosCmsDemoData $atmosCmsDemoData, private readonly StratusCmsDemoData $stratusCmsDemoData, private readonly CategoryCmsDemoData $categoryCmsDemoData, private readonly ProductCmsDemoData $productCmsDemoData)
    {
    }

    #[\Symfony\Component\Routing\Attribute\Route(path: '/api/zen/demodata/install', name: 'api.zen.demodata.install', methods: ['POST'])]
    public function demoDataInstall(Request $request): JsonResponse
    {
        $context = Context::createDefaultContext();
        $selectedDemoData = $request->get('demo');
        $isHomeLayoutSelected = $request->get('homeLayout');
        $selectedProductLayouts = [
            'productLayout1' => $request->get('productLayout1'),
            'productLayout2' => $request->get('productLayout2'),
            'productLayout3' => $request->get('productLayout3'),
            'productLayout4' => $request->get('productLayout4'),
            'productLayout5' => $request->get('productLayout5')
        ];
        $selectedCategoryLayouts = [
            'categoryLayout' => $request->get('categoryLayout'),
            'categoryLayoutSidebar' => $request->get('categoryLayoutSidebar'),
            'categoryLayoutHeader' => $request->get('categoryLayoutHeader'),
            'categoryLayoutHeaderSidebar' => $request->get('categoryLayoutHeaderSidebar'),
        ];
        $isProductsSelected = $request->get('products');

        $demo = explode('-', (string) $selectedDemoData)[0];
        $demoVariant = explode('-', (string) $selectedDemoData)[1];

        if ($isHomeLayoutSelected) {
            $this->homeLayoutHandler($demo, 'create', $context, $demoVariant);
        }

        foreach ($selectedProductLayouts as $layout => $selected) {
            if ($selected) {
                $this->productLayoutHandler($layout, 'create', $context);
            }
        }

        foreach ($selectedCategoryLayouts as $layout => $selected) {
            if ($selected) {
                $this->categoryLayoutHandler($layout, 'create', $context);
            }
        }

        if ($isProductsSelected) {
            $this->productDemoData->import($context);
        }

        return new JsonResponse([]);
    }

    #[\Symfony\Component\Routing\Attribute\Route(path: '/api/zen/demodata/remove', name: 'api.zen.demodata.remove', methods: ['POST'])]
    public function demoDataRemove(Request $request): JsonResponse
    {
        $context = Context::createDefaultContext();
        $selectedDemoData = $request->get('demo');
        $isHomeLayoutSelected = $request->get('homeLayout');

        $selectedProductLayouts = [
            'productLayout1' => $request->get('productLayout1'),
            'productLayout2' => $request->get('productLayout2'),
            'productLayout3' => $request->get('productLayout3'),
            'productLayout4' => $request->get('productLayout4'),
            'productLayout5' => $request->get('productLayout5')
        ];

        $selectedCategoryLayouts = [
            'categoryLayout' => $request->get('categoryLayout'),
            'categoryLayoutSidebar' => $request->get('categoryLayoutSidebar'),
            'categoryLayoutHeader' => $request->get('categoryLayoutHeader'),
            'categoryLayoutHeaderSidebar' => $request->get('categoryLayoutHeaderSidebar'),
        ];

        $isProductsSelected = $request->get('products');

        $demo = explode('-', (string) $selectedDemoData)[0];
        $demoVariant = explode('-', (string) $selectedDemoData)[1];

        if ($isHomeLayoutSelected) {
            $this->homeLayoutHandler($demo, 'delete', $context, $demoVariant);
        }

        foreach ($selectedCategoryLayouts as $layout => $selected) {
            if ($selected) {
                $this->categoryLayoutHandler($layout, 'delete', $context);
            }
        }

        foreach ($selectedProductLayouts as $layout => $selected) {
            if ($selected) {
                $this->productLayoutHandler($layout, 'delete', $context);
            }
        }

        if ($isProductsSelected) {
            $this->productDemoData->delete($context);
        }

        return new JsonResponse([]);
    }

    /**
     * Method that handles the homeLayout creating/deleting.
     */
    private function homeLayoutHandler(string $demo, string $mode, Context $context, string $demoVariant): void
    {
        if ($mode === 'create') {
            $this->{$demo . 'CmsDemoData'}->{$mode}(
                $context,
                $this->{$demo . 'CmsDemoData'}->getData($context, 'home' . $demoVariant)
            );
        } elseif ($mode === 'delete') {
            $this->{$demo . 'CmsDemoData'}->{$mode}(
                $context,
                $this->{$demo . 'CmsDemoData'}->getData($context, 'home' . $demoVariant)[0]['id']
            );
        }
    }

    /**
     * Method that handles the productLayout creating/deleting.
     */
    private function productLayoutHandler(string $productType, string $mode, Context $context): void
    {
        if ($mode === 'create') {
            $this->productCmsDemoData->{$mode}($context, $this->productCmsDemoData->getData($context, $productType));
        } elseif ($mode === 'delete') {
            $this->productCmsDemoData->{$mode}($context, $this->productCmsDemoData->getData($context, $productType)[0]['id']);
        }
    }

    /**
     * Method that handles the categoryLayout creating/deleting.
     */
    private function categoryLayoutHandler(string $categoryType, string $mode, Context $context): void
    {
        if ($mode === 'create') {
            $this->categoryCmsDemoData->{$mode}($context, $this->categoryCmsDemoData->getData($context, $categoryType));
        } elseif ($mode === 'delete') {
            $this->categoryCmsDemoData->{$mode}($context, $this->categoryCmsDemoData->getData($context, $categoryType)[0]['id']);
        }
    }
}
