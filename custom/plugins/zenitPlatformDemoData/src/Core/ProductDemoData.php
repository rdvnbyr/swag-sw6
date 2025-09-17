<?php declare(strict_types=1);

namespace zenit\PlatformDemoData\Core;

use Doctrine\DBAL\Connection;
use Shopware\Core\Content\Product\Aggregate\ProductVisibility\ProductVisibilityDefinition;
use Shopware\Core\Defaults;
use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepository;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Filter\EqualsFilter;
use Shopware\Core\Framework\Log\Package;
use Shopware\Core\Framework\Uuid\Uuid;
use zenit\PlatformDemoData\Helper\DemoImageHelper;
use zenit\PlatformDemoData\Helper\TranslationHelper;

#[Package('services-settings')]
class ProductDemoData
{
    private const LOREM_IPSUM = 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.';
    private const MANUFACTURER_ID = '44f727466fc0476cadbb9d00cbae8cd2';
    private const MANUFACTURER_NAME = 'Zenit Design';
    private const IMAGE_ID = 'a6c48253efe9433496808a37d6fb2712';

    public static array $productIds = [
        '8ba3f59d6df14454bd7c00a40231ecec',
        'c2a69c1ba02c4330aa9366023514c656',
        '97caa725c7ba473e8f5abc94f0a39399',
        '84e3524779604868a1ac154bb1522b4c',
        'a7a4e220890a4cbf9203f9054dbacc4e',
        '90e8f53b9ffe4d908bb3550e82acdde0',
        '37ba2721316b408b8ef1a10b53155734',
    ];

    private readonly TranslationHelper $translationHelper;

    private array $products = [];

    /**
     * DemoDataFolder constructor.
     */
    public function __construct(private readonly Connection $connection, private readonly EntityRepository $productRepository, private readonly EntityRepository $salesChannelRepository, private readonly DemoImageHelper $demoImageHelper)
    {
        $this->translationHelper = new TranslationHelper($this->connection);
    }

    /**
     * Method to imports the products.
     */
    public function import(Context $context): void
    {
        $existingProducts = $this->existingProducts($context);

        $this->demoImageHelper->createImage($context, self::IMAGE_ID);

        foreach ($this->getPayload($existingProducts, 'onImport', $context) as $entry) {
            $this->productRepository->create([$entry], $context);
        }
    }

    /**
     * Method to delete the products.
     */
    public function delete(Context $context): void
    {
        foreach ($this->getPayload($this->existingProducts($context), 'onDelete', $context) as $entry) {
            try {
                $this->productRepository->delete([['id' => $entry['id']]], $context);
            } catch (\Exception) {
                // nothing cause product is in use
            }
        }

        $this->demoImageHelper->deleteImage($context, self::IMAGE_ID);
    }

    /**
     * Method to check for already existing products.
     */
    private function existingProducts(Context $context): array
    {
        $existingProducts = [];

        foreach (self::$productIds as $id) {
            $criteria = new Criteria();
            $criteria->addFilter(new EqualsFilter('id', $id));
            if ($this->productRepository->search($criteria, $context)->getTotal() !== 0) {
                $existingProducts[] = $id;
            }
        }

        return $existingProducts;
    }

    /**
     * Method that returns the taxId.
     */
    private function getTaxId(): string
    {
        $result = $this->connection->fetchOne('
            SELECT LOWER(HEX(COALESCE(
                (SELECT `id` FROM `tax` WHERE tax_rate = "19.00" LIMIT 1),
	            (SELECT `id` FROM `tax`  LIMIT 1)
            )))
        ');

        if (!$result) {
            throw new \RuntimeException('No tax found, please make sure that basic data is available by running the migrations.');
        }

        return (string) $result;
    }

    /**
     * Method that returns all storefrontIds.
     */
    private function getStorefrontSalesChannelIds(Context $context): array
    {
        $saleChannels = $this->salesChannelRepository->search(new Criteria(), $context);

        return array_keys($saleChannels->getEntities()->getElements());
    }

    /**
     * Method that returns the visibilities.
     */
    private function getVisibilities(Context $context): array
    {
        $visibilities = [];

        foreach ($this->getStorefrontSalesChannelIds($context) as $salesChannelId) {
            $visibilities[] = [
                'id' => Uuid::randomHex(),
                'salesChannelId' => $salesChannelId,
                'visibility' => ProductVisibilityDefinition::VISIBILITY_ALL,
            ];
        }

        return $visibilities;
    }

    /**
     * Method that returns the visibilities.
     *
     * @param Context $context
     */
    private function getCrosssellingProducts(string $currentId): array
    {
        $productIds = self::$productIds;
        $currentIdIndex = array_search($currentId, $productIds, true);
        unset($productIds[$currentIdIndex]);

        return $productIds;
    }

    /**
     * Method that returns the payload which contains the productoptions.
     */
    private function getPayload(array $existingProducts, string $mode, Context $context): array
    {
        $productMethods = [
            self::$productIds[0] => 'pushProductOne',
            self::$productIds[1] => 'pushProductTwo',
            self::$productIds[2] => 'pushProductThree',
            self::$productIds[3] => 'pushProductFour',
            self::$productIds[4] => 'pushProductFive',
            self::$productIds[5] => 'pushProductSix',
            self::$productIds[6] => 'pushProductSeven',
        ];

        foreach ($productMethods as $productId => $pushProduct) {
            $productExists = \in_array($productId, $existingProducts, true);

            if (($mode === 'onImport' && !$productExists) || ($mode === 'onDelete' && $productExists)) {
                $this->{$pushProduct}($context);
            }
        }

        return $this->products;
    }

    /**
     * Method that pushes a product to the private 'products' variable with all it options.
     */
    private function pushProductOne(Context $context): void
    {
        $this->products[] = [
            'id' => self::$productIds[0],
            'productNumber' => 'ZENDEMO10001',
            'active' => true,
            'taxId' => $this->getTaxId(),
            'stock' => 10,
            'purchaseUnit' => 1.0,
            'referenceUnit' => 1.0,
            'shippingFree' => false,
            'purchasePrice' => 50,
            'weight' => 45.0,
            'width' => 590.0,
            'height' => 600.0,
            'length' => 840.0,
            'releaseDate' => new \DateTimeImmutable(),
            'displayInListing' => true,
            'name' => $this->translationHelper->adjustTranslations([
                'de-DE' => 'Zenit Beispielprodukt',
                'en-GB' => 'Zenit Example Product',
            ]),
            'description' => $this->translationHelper->adjustTranslations([
                'de-DE' => self::LOREM_IPSUM,
                'en-GB' => self::LOREM_IPSUM,
            ]),
            'metaDescription' => $this->translationHelper->adjustTranslations([
                'de-DE' => 'Dies ist die Kurzbeschreibung eines Artikels, welche durch das Theme optional im oberen Bereich der Detailseite angezeigt werden kann. Die optionale Kurzbeschreibung definiert sich anhand der Meta-Beschreibung aus den Artikelstammdaten.',
                'en-GB' => 'This is the short description of an article, which can be optionally displayed at the top of the detail page through the theme. The optional short description is defined based on the meta-description from the article master data.',
            ]),
            'manufacturer' => [
                'id' => self::MANUFACTURER_ID,
                'name' => $this->translationHelper->adjustTranslations([
                    'de-DE' => self::MANUFACTURER_NAME,
                    'en-GB' => self::MANUFACTURER_NAME,
                ]),
            ],
            'media' => [
                [
                    'id' => '5e1acc7757fe4fbea6c02222ba0a46f1',
                    'position' => 1,
                    'mediaId' => 'a6c48253efe9433496808a37d6fb2712',
                ],
            ],
            'coverId' => '5e1acc7757fe4fbea6c02222ba0a46f1',
            'price' => [[
                'net' => 798.3199999999999,
                'gross' => 950,
                'linked' => true,
                'currencyId' => Defaults::CURRENCY,
            ]],
            'visibilities' => $this->getVisibilities($context),
        ];
    }

    /**
     * Method that pushes a product to the private 'products' variable with all it options.
     */
    private function pushProductTwo(Context $context): void
    {
        $this->products[] = [
            'id' => self::$productIds[1],
            'productNumber' => 'ZENDEMO10002',
            'active' => true,
            'taxId' => $this->getTaxId(),
            'stock' => 35,
            'purchaseUnit' => 1.0,
            'referenceUnit' => 1.0,
            'shippingFree' => false,
            'purchasePrice' => 50,
            'weight' => 45.0,
            'width' => 590.0,
            'height' => 600.0,
            'length' => 840.0,
            'releaseDate' => new \DateTimeImmutable(),
            'displayInListing' => true,
            'name' => $this->translationHelper->adjustTranslations([
                'de-DE' => 'Zenit Beispielprodukt 2',
                'en-GB' => 'Zenit Example Product 2',
            ]),
            'description' => $this->translationHelper->adjustTranslations([
                'de-DE' => self::LOREM_IPSUM,
                'en-GB' => self::LOREM_IPSUM,
            ]),
            'metaDescription' => $this->translationHelper->adjustTranslations([
                'de-DE' => 'Dies ist die Kurzbeschreibung eines Artikels, welche durch das Theme optional im oberen Bereich der Detailseite angezeigt werden kann. Die optionale Kurzbeschreibung definiert sich anhand der Meta-Beschreibung aus den Artikelstammdaten.',
                'en-GB' => 'This is the short description of an article, which can be optionally displayed at the top of the detail page through the theme. The optional short description is defined based on the meta-description from the article master data.',
            ]),
            'manufacturer' => [
                'id' => self::MANUFACTURER_ID,
                'name' => $this->translationHelper->adjustTranslations([
                    'de-DE' => self::MANUFACTURER_NAME,
                    'en-GB' => self::MANUFACTURER_NAME,
                ]),
            ],
            'media' => [
                [
                    'id' => '5f49f373f6cd44a99e30e50634ae24d5',
                    'position' => 1,
                    'mediaId' => 'a6c48253efe9433496808a37d6fb2712',
                ],
            ],
            'coverId' => '5f49f373f6cd44a99e30e50634ae24d5',
            'price' => [[
                'net' => 126.05,
                'gross' => 150,
                'linked' => true,
                'currencyId' => Defaults::CURRENCY,
            ]],
            'visibilities' => $this->getVisibilities($context),
        ];
    }

    /**
     * Method that pushes a product to the private 'products' variable with all it options.
     */
    private function pushProductThree(Context $context): void
    {
        $this->products[] = [
            'id' => self::$productIds[2],
            'productNumber' => 'ZENDEMO10003',
            'active' => true,
            'taxId' => $this->getTaxId(),
            'stock' => 35,
            'purchaseUnit' => 1.0,
            'referenceUnit' => 1.0,
            'shippingFree' => false,
            'purchasePrice' => 50,
            'weight' => 45.0,
            'width' => 590.0,
            'height' => 600.0,
            'length' => 840.0,
            'releaseDate' => new \DateTimeImmutable(),
            'displayInListing' => true,
            'name' => $this->translationHelper->adjustTranslations([
                'de-DE' => 'Zenit Beispielprodukt 3',
                'en-GB' => 'Zenit Example Product 3',
            ]),
            'description' => $this->translationHelper->adjustTranslations([
                'de-DE' => self::LOREM_IPSUM,
                'en-GB' => self::LOREM_IPSUM,
            ]),
            'metaDescription' => $this->translationHelper->adjustTranslations([
                'de-DE' => 'Dies ist die Kurzbeschreibung eines Artikels, welche durch das Theme optional im oberen Bereich der Detailseite angezeigt werden kann. Die optionale Kurzbeschreibung definiert sich anhand der Meta-Beschreibung aus den Artikelstammdaten.',
                'en-GB' => 'This is the short description of an article, which can be optionally displayed at the top of the detail page through the theme. The optional short description is defined based on the meta-description from the article master data.',
            ]),
            'manufacturer' => [
                'id' => self::MANUFACTURER_ID,
                'name' => $this->translationHelper->adjustTranslations([
                    'de-DE' => self::MANUFACTURER_NAME,
                    'en-GB' => self::MANUFACTURER_NAME,
                ]),
            ],
            'media' => [
                [
                    'id' => '1cac2b3b77024f1fb58d1a0271cfbe1d',
                    'position' => 1,
                    'mediaId' => 'a6c48253efe9433496808a37d6fb2712',
                ],
            ],
            'coverId' => '1cac2b3b77024f1fb58d1a0271cfbe1d',
            'price' => [[
                'net' => 58.82,
                'gross' => 70,
                'linked' => true,
                'currencyId' => Defaults::CURRENCY,
            ]],
            'visibilities' => $this->getVisibilities($context),
        ];
    }

    private function pushProductFour(Context $context): void
    {
        $this->products[] = [
            'id' => self::$productIds[3],
            'productNumber' => 'ZENDEMO10004',
            'active' => true,
            'taxId' => $this->getTaxId(),
            'stock' => 8,
            'purchaseUnit' => 1.0,
            'referenceUnit' => 1.0,
            'shippingFree' => false,
            'purchasePrice' => 25,
            'weight' => 45.0,
            'width' => 200.0,
            'height' => 100.0,
            'length' => 200.0,
            'releaseDate' => new \DateTimeImmutable(),
            'displayInListing' => true,
            'name' => $this->translationHelper->adjustTranslations([
                'de-DE' => 'Zenit Beispielprodukt 4',
                'en-GB' => 'Zenit Example Product 4',
            ]),
            'description' => $this->translationHelper->adjustTranslations([
                'de-DE' => self::LOREM_IPSUM,
                'en-GB' => self::LOREM_IPSUM,
            ]),
            'metaDescription' => $this->translationHelper->adjustTranslations([
                'de-DE' => 'Dies ist die Kurzbeschreibung eines Artikels, welche durch das Theme optional im oberen Bereich der Detailseite angezeigt werden kann. Die optionale Kurzbeschreibung definiert sich anhand der Meta-Beschreibung aus den Artikelstammdaten.',
                'en-GB' => 'This is the short description of an article, which can be optionally displayed at the top of the detail page through the theme. The optional short description is defined based on the meta-description from the article master data.',
            ]),
            'manufacturer' => [
                'id' => self::MANUFACTURER_ID,
                'name' => $this->translationHelper->adjustTranslations([
                    'de-DE' => self::MANUFACTURER_NAME,
                    'en-GB' => self::MANUFACTURER_NAME,
                ]),
            ],
            'media' => [
                [
                    'id' => '82d4b869605e437db94d698ff7829d3e',
                    'position' => 1,
                    'mediaId' => 'a6c48253efe9433496808a37d6fb2712',
                ],
            ],
            'coverId' => '82d4b869605e437db94d698ff7829d3e',
            'price' => [[
                'net' => 29.41,
                'gross' => 35,
                'linked' => true,
                'currencyId' => Defaults::CURRENCY,
            ]],
            'visibilities' => $this->getVisibilities($context),
        ];
    }

    private function pushProductFive(Context $context): void
    {
        $this->products[] = [
            'id' => self::$productIds[4],
            'productNumber' => 'ZENDEMO10005',
            'active' => true,
            'taxId' => $this->getTaxId(),
            'stock' => 32,
            'purchaseUnit' => 1.0,
            'referenceUnit' => 1.0,
            'shippingFree' => false,
            'purchasePrice' => 5,
            'weight' => 5.0,
            'width' => 20.0,
            'height' => 100.0,
            'length' => 100.0,
            'releaseDate' => new \DateTimeImmutable(),
            'displayInListing' => true,
            'name' => $this->translationHelper->adjustTranslations([
                'de-DE' => 'Zenit Beispielprodukt 5',
                'en-GB' => 'Zenit Example Product 5',
            ]),
            'description' => $this->translationHelper->adjustTranslations([
                'de-DE' => self::LOREM_IPSUM,
                'en-GB' => self::LOREM_IPSUM,
            ]),
            'metaDescription' => $this->translationHelper->adjustTranslations([
                'de-DE' => 'Dies ist die Kurzbeschreibung eines Artikels, welche durch das Theme optional im oberen Bereich der Detailseite angezeigt werden kann. Die optionale Kurzbeschreibung definiert sich anhand der Meta-Beschreibung aus den Artikelstammdaten.',
                'en-GB' => 'This is the short description of an article, which can be optionally displayed at the top of the detail page through the theme. The optional short description is defined based on the meta-description from the article master data.',
            ]),
            'manufacturer' => [
                'id' => self::MANUFACTURER_ID,
                'name' => $this->translationHelper->adjustTranslations([
                    'de-DE' => self::MANUFACTURER_NAME,
                    'en-GB' => self::MANUFACTURER_NAME,
                ]),
            ],
            'media' => [
                [
                    'id' => '346dabcc4e6e4becb717a26371daf312',
                    'position' => 1,
                    'mediaId' => 'a6c48253efe9433496808a37d6fb2712',
                ],
            ],
            'coverId' => '346dabcc4e6e4becb717a26371daf312',
            'price' => [[
                'net' => 10.08,
                'gross' => 12,
                'linked' => true,
                'currencyId' => Defaults::CURRENCY,
            ]],
            'visibilities' => $this->getVisibilities($context),
        ];
    }

    private function pushProductSix(Context $context): void
    {
        $this->products[] = [
            'id' => self::$productIds[5],
            'productNumber' => 'ZENDEMO10006',
            'active' => true,
            'taxId' => $this->getTaxId(),
            'stock' => 2,
            'purchaseUnit' => 1.0,
            'referenceUnit' => 1.0,
            'shippingFree' => false,
            'purchasePrice' => 200,
            'weight' => 15.0,
            'width' => 200.0,
            'height' => 100.0,
            'length' => 300.0,
            'releaseDate' => new \DateTimeImmutable(),
            'displayInListing' => true,
            'name' => $this->translationHelper->adjustTranslations([
                'de-DE' => 'Zenit Beispielprodukt 6',
                'en-GB' => 'Zenit Example Product 6',
            ]),
            'description' => $this->translationHelper->adjustTranslations([
                'de-DE' => self::LOREM_IPSUM,
                'en-GB' => self::LOREM_IPSUM,
            ]),
            'metaDescription' => $this->translationHelper->adjustTranslations([
                'de-DE' => 'Dies ist die Kurzbeschreibung eines Artikels, welche durch das Theme optional im oberen Bereich der Detailseite angezeigt werden kann. Die optionale Kurzbeschreibung definiert sich anhand der Meta-Beschreibung aus den Artikelstammdaten.',
                'en-GB' => 'This is the short description of an article, which can be optionally displayed at the top of the detail page through the theme. The optional short description is defined based on the meta-description from the article master data.',
            ]),
            'manufacturer' => [
                'id' => self::MANUFACTURER_ID,
                'name' => $this->translationHelper->adjustTranslations([
                    'de-DE' => self::MANUFACTURER_NAME,
                    'en-GB' => self::MANUFACTURER_NAME,
                ]),
            ],
            'media' => [
                [
                    'id' => 'ad343c4acae545559913858cce578935',
                    'position' => 1,
                    'mediaId' => 'a6c48253efe9433496808a37d6fb2712',
                ],
            ],
            'coverId' => 'ad343c4acae545559913858cce578935',
            'price' => [[
                'net' => 21.01,
                'gross' => 25,
                'linked' => true,
                'currencyId' => Defaults::CURRENCY,
            ]],
            'visibilities' => $this->getVisibilities($context),
        ];
    }

    private function pushProductSeven(Context $context): void
    {
        $this->products[] = [
            'id' => self::$productIds[6],
            'productNumber' => 'ZENDEMO10007',
            'active' => true,
            'taxId' => $this->getTaxId(),
            'stock' => 10,
            'purchaseUnit' => 1.0,
            'referenceUnit' => 1.0,
            'shippingFree' => false,
            'purchasePrice' => 20,
            'weight' => 10.0,
            'width' => 20.0,
            'height' => 10.0,
            'length' => 30.0,
            'releaseDate' => new \DateTimeImmutable(),
            'displayInListing' => true,
            'name' => $this->translationHelper->adjustTranslations([
                'de-DE' => 'Zenit Beispielprodukt 7',
                'en-GB' => 'Zenit Example Product 7',
            ]),
            'description' => $this->translationHelper->adjustTranslations([
                'de-DE' => self::LOREM_IPSUM,
                'en-GB' => self::LOREM_IPSUM,
            ]),
            'metaDescription' => $this->translationHelper->adjustTranslations([
                'de-DE' => 'Dies ist die Kurzbeschreibung eines Artikels, welche durch das Theme optional im oberen Bereich der Detailseite angezeigt werden kann. Die optionale Kurzbeschreibung definiert sich anhand der Meta-Beschreibung aus den Artikelstammdaten.',
                'en-GB' => 'This is the short description of an article, which can be optionally displayed at the top of the detail page through the theme. The optional short description is defined based on the meta-description from the article master data.',
            ]),
            'manufacturer' => [
                'id' => self::MANUFACTURER_ID,
                'name' => $this->translationHelper->adjustTranslations([
                    'de-DE' => self::MANUFACTURER_NAME,
                    'en-GB' => self::MANUFACTURER_NAME,
                ]),
            ],
            'media' => [
                [
                    'id' => '1c91d87ad79e46c1a4cbeda25b1cd2d6',
                    'position' => 1,
                    'mediaId' => 'a6c48253efe9433496808a37d6fb2712',
                ],
            ],
            'coverId' => '1c91d87ad79e46c1a4cbeda25b1cd2d6',
            'price' => [[
                'net' => 84.03,
                'gross' => 100,
                'linked' => true,
                'currencyId' => Defaults::CURRENCY,
            ]],
            'visibilities' => $this->getVisibilities($context),
        ];
    }
}
