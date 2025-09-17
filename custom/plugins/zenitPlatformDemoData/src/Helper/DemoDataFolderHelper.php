<?php declare(strict_types=1);

namespace zenit\PlatformDemoData\Helper;

use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepository;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Filter\EqualsFilter;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Filter\OrFilter;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Filter\MultiFilter;
use Shopware\Core\Framework\Uuid\Uuid;

class DemoDataFolderHelper
{
    public const FOLDER_ID = '73f5c3539c224eb5a1921274bd237103';

    public const FOLDER_CONFIG_ID = 'f9f8eba246604c7393d98549ca4afa74';

    /**
     * DemoDataFolderHelper constructor.
     */
    public function __construct(
        private readonly EntityRepository $mediaFolderRepository,
        private readonly EntityRepository $mediaFolderConfigurationRepository,
        private readonly EntityRepository $mediaThumbnailSizeRepository,
        private readonly EntityRepository $mediaFolderConfigurationMediaThumbnailSizeRepository
    )
    {
    }

    /**
     * Method to create the folder.
     */
    public function createFolder(Context $context): void
    {
        // folder configuration
        $sizes = [
            ['width' => 400, 'height' => 400],
            ['width' => 800, 'height' => 800],
            ['width' => 1920, 'height' => 1920],
        ];

        $orFilter = new OrFilter(array_map(fn($s) => new MultiFilter('AND', [
            new EqualsFilter('width', $s['width']),
            new EqualsFilter('height', $s['height']),
        ]), $sizes));

        $criteria = new Criteria();
        $criteria->addFilter($orFilter);

        $existing = $this->mediaThumbnailSizeRepository->search($criteria, $context);

        $existingMap = [];
        foreach ($existing as $e) {
            $key = $e->get('width') . 'x' . $e->get('height');
            $existingMap[$key] = $e->getId();
        }

        $upserts = [];
        foreach ($sizes as $s) {
            $key = "{$s['width']}x{$s['height']}";
            if (!isset($existingMap[$key])) {
                $id = Uuid::randomHex();
                $existingMap[$key] = $id;
                $upserts[] = array_merge(['id' => $id], $s);
            }
        }
        if ($upserts) {
            $this->mediaThumbnailSizeRepository->upsert($upserts, $context);
        }

        $this->mediaFolderConfigurationRepository->upsert([
            [
                'id' => self::FOLDER_CONFIG_ID,
                'createThumbnails' => true,
                'keepAspectRatio' => true,
                'thumbnailQuality' => 80,
            ]
        ], $context);

        $criteria = new Criteria([self::FOLDER_CONFIG_ID]);
        $criteria->addAssociation('mediaThumbnailSizes');

        $config = $this->mediaFolderConfigurationRepository->search($criteria, $context)->first();

        $existingRelationIds = [];
        if ($config && $config->get('mediaThumbnailSizes')) {
            foreach ($config->get('mediaThumbnailSizes') as $rel) {
                $existingRelationIds[] = $rel->getId();
            }
        }

        $relations = array_filter(array_map(fn($id) => [
            'mediaFolderConfigurationId' => self::FOLDER_CONFIG_ID,
            'mediaThumbnailSizeId' => $id,
        ], array_values($existingMap)), fn($rel) => !in_array($rel['mediaThumbnailSizeId'], $existingRelationIds));


        if (!$this->isFolderExisting($context)) {
            $this->mediaFolderRepository->upsert([
                [
                    'id' => self::FOLDER_ID,
                    'name' => 'Zenit demodata',
                    'configurationId' => self::FOLDER_CONFIG_ID,
                    'useParentConfiguration' => false,
                ]
            ], $context);
        } else {
            $this->mediaFolderRepository->upsert([
                [
                    'id' => self::FOLDER_ID,
                    'configurationId' => self::FOLDER_CONFIG_ID,
                    'useParentConfiguration' => false,
                ]
            ], $context);
        }

        if (!empty($relations)) {
            $this->mediaFolderConfigurationMediaThumbnailSizeRepository->upsert($relations, $context);
        }
    }

    /**
     * Method to delete the folder.
     */
    public function deleteFolder(Context $context): void
    {
        $this->mediaFolderRepository->delete([
            [
                'id' => self::FOLDER_ID,
            ],
        ], $context);
    }

    public function hasFolderChildren(Context $context): bool
    {
        $criteria = new Criteria();
        $criteria->addFilter(new EqualsFilter('id', self::FOLDER_ID));
        $criteria->addAssociation('media');

        $folder = $this->mediaFolderRepository->search($criteria, $context);
        $folderElements = $folder->getElements();

        if ($folderElements) {
            return !empty($folderElements[self::FOLDER_ID]->getMedia()->getElements());
        }

        return false;
    }

    private function isFolderExisting(Context $context): bool
    {
        $criteria = new Criteria();
        $criteria->addFilter(new EqualsFilter('id', self::FOLDER_ID));

        return $this->mediaFolderRepository->search($criteria, $context)->getTotal() !== 0;
    }
}
