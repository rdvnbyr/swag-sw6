<?php declare(strict_types=1);

namespace zenit\PlatformDemoData\Helper;

use Doctrine\DBAL\Connection;
use Shopware\Core\Content\Media\File\FileSaver;
use Shopware\Core\Content\Media\File\MediaFile;
use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepository;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Filter\EqualsFilter;

class DemoImageHelper
{
    /**
     * DemoDataFolder constructor.
     */
    public function __construct(private readonly EntityRepository $mediaRepository, private readonly FileSaver $fileSaver, private readonly DemoDataFolderHelper $demoDataFolder, private readonly Connection $connection)
    {
    }

    /**
     * Method to create the image.
     */
    public function createImage(Context $context, mixed $id): void
    {
        if (!$this->imageExists($context, $id)) {
            $this->demoDataFolder->createFolder($context);

            $this->mediaRepository->create([
                [
                    'id' => $id,
                    'mediaFolderId' => $this->demoDataFolder::FOLDER_ID,
                ],
            ], $context);

            $file = \glob(__DIR__ . '/../Resources/media/' . $id . '/*.*')[0];
            if ($file === false) {
                return;
            }

            $this->fileSaver->persistFileToMedia(
                new MediaFile(
                    $file,
                    \mime_content_type($file) ?: 'application/octet-stream',
                    \pathinfo($file, \PATHINFO_EXTENSION),
                    \filesize($file) ?: 0
                ),
                \pathinfo($file, \PATHINFO_FILENAME),
                \basename(\dirname($file)),
                $context
            );
        }
    }

    /**
     * Method to delete the image.
     */
    public function deleteImage(Context $context, mixed $id): void
    {
        if ($this->imageExists($context, $id) && !$this->isImageUsed($id)) {
            try {
                $this->mediaRepository->delete([
                    [
                        'id' => $id,
                    ],
                ], $context);
            } catch (\Exception) {
                // delete might fail if the media is assigned as a thumbnail for e.g.
            }
        }

        if (!$this->demoDataFolder->hasFolderChildren($context)) {
            $this->demoDataFolder->deleteFolder($context);
        }
    }

    /**
     * Method that returns the MediaUrl.
     */
    public function getImageUrl(Context $context, string $id): string
    {
        $criteria = new Criteria();
        $criteria->addFilter(new EqualsFilter('id', $id));

        $elements = $this->mediaRepository->search($criteria, $context)->getElements();

        if ($elements) {
            return $elements[$id]->get('url');
        }

        return '';
    }

    /**
     * Method to check if image is existing.
     */
    private function imageExists(Context $context, string $id): bool
    {
        $criteria = new Criteria();
        $criteria->addFilter(new EqualsFilter('id', $id));

        return $this->mediaRepository->search($criteria, $context)->getTotal() !== 0;
    }

    /**
     * Method to check if image is in use.
     */
    private function isImageUsed(string $id): bool
    {
        $sql = 'SELECT * FROM `cms_slot_translation` WHERE `config` LIKE \'%' . $id . '%\'';
        if ($this->connection->fetchOne($sql)) {
            return true;
        }

        $sql = 'SELECT * FROM `cms_section` WHERE `background_media_id` = UNHEX(\'' . $id . '\') ';
        if ($this->connection->fetchOne($sql)) {
            return true;
        }

        $sql = 'SELECT * FROM `cms_block` WHERE `background_media_id` = UNHEX(\'' . $id . '\')';
        if ($this->connection->fetchOne($sql)) {
            return true;
        }

        return false;
    }
}
