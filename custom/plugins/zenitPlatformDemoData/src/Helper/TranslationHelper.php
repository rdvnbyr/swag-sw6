<?php declare(strict_types=1);

namespace zenit\PlatformDemoData\Helper;

use Doctrine\DBAL\Connection;
use Shopware\Core\Defaults;
use Shopware\Core\Framework\Log\Package;

#[Package('services-settings')]
class TranslationHelper
{
    // Which language to use if no translation for the wanted language is available
    private const DEFAULT_TRANSLATION_LANGUAGE = 'en-GB';

    public function __construct(private readonly Connection $connection)
    {
    }

    /**
     * @param array<string, mixed> $translations
     *
     * @return array<string, mixed>
     */
    public function adjustTranslations(array $translations): array
    {
        $systemLanguageCode = $this->getSystemLanguageCode();

        if (!isset($translations[$systemLanguageCode])) {
            $translations[$systemLanguageCode] = $translations['de-DE'];
        }

        return $this->clearUnavailableTranslations($translations);
    }

    public function getLanguageId(string $languageCode): ?string
    {
        $localeId = $this->getLocaleId($languageCode);

        if ($localeId === null) {
            return null;
        }

        $result = $this->connection->fetchOne(
            '
                SELECT LOWER(HEX(id))
                FROM language
                WHERE locale_id = UNHEX(:localeId)
            ',
            ['localeId' => $localeId]
        );

        if ($result === false) {
            return null;
        }

        return $result;
    }

    public function getSystemLanguageCode(): string
    {
        $systemLanguageLocaleId = $this->connection->fetchOne(
            '
                SELECT LOWER(HEX(locale_id))
                FROM language
                WHERE id = UNHEX(:systemLanguageId)
            ',
            ['systemLanguageId' => Defaults::LANGUAGE_SYSTEM]
        );

        if ($systemLanguageLocaleId === false) {
            throw new \RuntimeException('Could not find the localeID of the SystemLanguage!');
        }

        $systemLanguageCode = $this->connection->fetchOne(
            '
                SELECT code
                FROM locale
                WHERE id = UNHEX(:systemLanguageLocaleId)
            ',
            ['systemLanguageLocaleId' => $systemLanguageLocaleId]
        );

        if ($systemLanguageCode === false) {
            throw new \RuntimeException('The locale of the SystemLanguage could not be found');
        }

        return $systemLanguageCode;
    }

    /**
     * @param array<string, mixed> $translations
     *
     * @return array<string, mixed>
     */
    private function clearUnavailableTranslations(array $translations): array
    {
        $availableCodes = [];
        foreach ($translations as $code => $value) {
            $languageId = $this->getLanguageId($code);
            if ($languageId) {
                $availableCodes[$code] = $value;
            }
        }

        return $availableCodes;
    }

    private function getLocaleId(string $languageCode): ?string
    {
        $result = $this->connection->fetchOne(
            '
                SELECT LOWER(HEX(id))
                FROM locale
                WHERE code = :languageCode
            ',
            ['languageCode' => $languageCode]
        );

        if ($result === false) {
            return null;
        }

        return (string) $result;
    }
}
