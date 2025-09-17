<?php declare(strict_types=1);

namespace zenit\PlatformDemoData\Core;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepository;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Filter\EqualsFilter;
use zenit\PlatformDemoData\Helper\DemoImageHelper;
use zenit\PlatformDemoData\Helper\TranslationHelper;

abstract class AbstractCmsDemoData
{
    public static array $previewImages = [
        'gravity' => 'a2b3bd15ca4a4fb196eab5ac671df44c',
        'horizon' => '23c3b82c1bc642eb9b862a48ef4660f7',
        'atmos' => '084c5fcd8970451a9d62e3a9d85ffdd2',
        'stratus' => '4f64f253c7ca44149e211377b914f380',
        'sphere' => 'a9004c242ec34049a94038aff4803063',
        'category' => '8dc0f56e44ba4ed28cb1de27f80583ad',
        'product' => '9b8fbedcb8534053a848864e6c50efb2',
    ];

    protected TranslationHelper $translationHelper;

    private readonly Connection $connection;

    /**
     * AbstractCmsDemoData constructor.
     */
    public function __construct(private readonly EntityRepository $cmsPageRepository, protected DemoImageHelper $demoImageHelper, private readonly ProductDemoData $productDemoData, Connection $connection)
    {
        $this->translationHelper = new TranslationHelper($connection);
        $this->connection = $connection;
    }

    /**
     * Method that returns the data of the layout.
     */
    abstract public function getData(Context $context, string $data): array;

    /**
     * Method that calls the protected create function.
     */
    abstract public function create(Context $context, array $data): void;

    /**
     * Method that calls the protected delete function.
     */
    abstract public function delete(Context $context, string $id): void;

    /**
     * Method that creates the layout.
     */
    protected function finalizeCreate(Context $context, array $data): void
    {
        if (!$this->cmsPageExists($context, $data[0]['id'])) {
            $this->cmsPageRepository->create($data, $context);
        }

        $sql = 'UPDATE `cms_page` SET `locked` = 1 WHERE `id` = UNHEX(\'' . $data[0]['id'] . '\')';
        $this->connection->executeQuery($sql);
    }

    /**
     * Method that deletes the layout.
     */
    protected function finalizeDelete(Context $context, string $id): void
    {
        if ($this->cmsPageExists($context, $id)) {
            $sql = 'UPDATE `cms_page` SET `locked` = 0 WHERE `id` = UNHEX(\'' . $id . '\')';
            $this->connection->executeQuery($sql);

            $this->cmsPageRepository->delete([['id' => $id]], $context);
        }
    }

    /**
     * Method that returns the productIds for jsonStrings.
     */
    protected function limitedProducts(int $limit): string
    {
        $limitedProducts = [];
        $loops = 0;

        foreach ($this->productDemoData::$productIds as $productId) {
            if ($loops === $limit) {
                break;
            }

            $limitedProducts[] = $productId;
            ++$loops;
        }

        return json_encode($limitedProducts);
    }

    /**
     * Method that returns a random demoproduct.
     */
    protected function randomProduct(): string
    {
        $products = [];

        foreach ($this->productDemoData::$productIds as $productId) {
            $products[] = $productId;
        }

        return $products[array_rand($products)];
    }

    private function cmsPageExists(Context $context, string $id): bool
    {
        $criteria = new Criteria();
        $criteria->addFilter(new EqualsFilter('id', $id));

        return $this->cmsPageRepository->search($criteria, $context)->getTotal() !== 0;
    }
}
