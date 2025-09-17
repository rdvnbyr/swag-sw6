<?php declare(strict_types=1);

namespace zenit\PlatformDemoData;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Log\Package;
use Shopware\Core\Framework\Plugin;
use Shopware\Core\Framework\Plugin\Context\UninstallContext;
use zenit\PlatformDemoData\Core\AbstractCmsDemoData;
use zenit\PlatformDemoData\Core\CmsProvider\AtmosCmsDemoData;
use zenit\PlatformDemoData\Core\CmsProvider\CategoryCmsDemoData;
use zenit\PlatformDemoData\Core\CmsProvider\GravityCmsDemoData;
use zenit\PlatformDemoData\Core\CmsProvider\HorizonCmsDemoData;
use zenit\PlatformDemoData\Core\CmsProvider\ProductCmsDemoData;
use zenit\PlatformDemoData\Core\CmsProvider\SphereCmsDemoData;
use zenit\PlatformDemoData\Core\CmsProvider\StratusCmsDemoData;
use zenit\PlatformDemoData\Core\ProductDemoData;
use zenit\PlatformDemoData\Helper\DemoDataFolderHelper;

#[Package('services-settings')]
class zenitPlatformDemoData extends Plugin
{
    public function uninstall(UninstallContext $uninstallContext): void
    {
        parent::uninstall($uninstallContext);

        if (!$uninstallContext->keepUserData()) {
            $context = $uninstallContext->getContext();
            $productRepository = $this->container->get('product.repository');
            $cmsPageRepository = $this->container->get('cms_page.repository');
            $mediaRepository = $this->container->get('media.repository');
            $mediaFolderRepository = $this->container->get('media_folder.repository');
            $connection = $this->container->get(Connection::class);

            $productIds = ProductDemoData::$productIds;
            $cmsPageIds = array_merge(
                CategoryCmsDemoData::$cmsPageIds,
                ProductCmsDemoData::$cmsPageIds,
                HorizonCmsDemoData::$cmsPageIds,
                GravityCmsDemoData::$cmsPageIds,
                SphereCmsDemoData::$cmsPageIds,
                AtmosCmsDemoData::$cmsPageIds,
                StratusCmsDemoData::$cmsPageIds
            );
            $cmsImageIds = array_merge(
                AbstractCmsDemoData::$previewImages,
                HorizonCmsDemoData::$cmsImageIds,
                GravityCmsDemoData::$cmsImageIds,
                SphereCmsDemoData::$cmsImageIds,
                AtmosCmsDemoData::$cmsImageIds,
                StratusCmsDemoData::$cmsImageIds
            );

            foreach ($productIds as $productId) {
                $productRepository->delete([['id' => $productId]], $context);
            }

            foreach ($cmsPageIds as $cmsPageId) {
                $sql = 'UPDATE `cms_page` SET `locked` = 0 WHERE `id` = UNHEX(\'' . $cmsPageId . '\')';
                $connection->executeQuery($sql);

                $cmsPageRepository->delete([['id' => $cmsPageId]], $context);
            }

            $deleteFolder = true;

            foreach ($cmsImageIds as $cmsImageId) {
                if (!$this->isImageUsed($connection, $cmsImageId)) {
                    try {
                        $mediaRepository->delete([
                            [
                                'id' => $cmsImageId,
                            ],
                        ], $context);
                    } catch (\Exception) {
                        // delete might fail if the media is assigned as a thumbnail for e.g.
                        $deleteFolder = false;
                    }
                }
            }

            if ($deleteFolder) {
                $mediaFolderRepository->delete([['id' => DemoDataFolderHelper::FOLDER_ID]], $context);
            }
        }
    }

    private function isImageUsed(Connection $connection, string $id): bool
    {
        $sql = 'SELECT * FROM `cms_slot_translation` WHERE `config` LIKE \'%' . $id . '%\'';
        if ($connection->fetchOne($sql)) {
            return true;
        }

        $sql = 'SELECT * FROM `cms_section` WHERE `background_media_id` = UNHEX(\'' . $id . '\') ';
        if ($connection->fetchOne($sql)) {
            return true;
        }

        $sql = 'SELECT * FROM `cms_block` WHERE `background_media_id` = UNHEX(\'' . $id . '\')';
        if ($connection->fetchOne($sql)) {
            return true;
        }

        return false;
    }
}
