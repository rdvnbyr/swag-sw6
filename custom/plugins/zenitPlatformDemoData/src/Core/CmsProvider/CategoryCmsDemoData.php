<?php declare(strict_types=1);

namespace zenit\PlatformDemoData\Core\CmsProvider;

use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\Uuid\Uuid;
use zenit\PlatformDemoData\Core\AbstractCmsDemoData;

/**
 * @extends AbstractCmsDemoData
 *
 */
class CategoryCmsDemoData extends AbstractCmsDemoData
{
    /**
     * Method that returns the Layout Ids
     *
     * @return array
     *
     */
    public static array $cmsPageIds = [
        '1be7bb2f5eb646259fdcaafb77b329cb',
        'eeedf4d3389042f6b149a51437b620b6',
        'b8d2e9a405bd4281b32e4df620ae0261',
        '89f50f8c8a6c4bb5ae50ff1820534faf',
    ];

    /**
     * Method that returns the data of the layout
     *
     * @param String $data
     * @return array
     *
     */
    public function getData(Context $context, String $data): array {
        return $this->$data($context);
    }

    /**
     * Method that creates the layout
     *
     * @param Context $context
     * @param array $data
     *
     */
    public function create(Context $context, array $data): void {
        $this->demoImageHelper->createImage($context, self::$previewImages['category']);
        $this->finalizeCreate($context, $data);
    }

    /**
     * Method that deletes the layout
     *
     * @param Context $context
     * @param String $id
     *
     */
    public function delete(Context $context, String $id): void {
        $this->finalizeDelete($context, $id);
        $this->demoImageHelper->deleteImage($context, self::$previewImages['category']);
    }

    private function categoryLayout(Context $context): array {
        return [
            [
                'id' => self::$cmsPageIds[0],
                'type' => 'product_list',
                'locked' => 0,
                'previewMediaId' => self::$previewImages['category'],
                'name' => $this->translationHelper->adjustTranslations([
                    'de-DE' => 'ohne Sidebar - Zenit Standard Kategorielayout',
                    'en-GB' => 'no sidebar - Zenit default category layout',
                ]),
                'sections' => [
                    [
                        'id' => Uuid::randomHex(),
                        'position' => 1,
                        'sizingMode' => 'boxed',
                        'type' => 'default',
                        'blocks' => [
                            [
                                'position' => 0,
                                'type' => 'text',
                                'locked' => 0,
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "40px",
                                'marginBottom' => "40px",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'text',
                                        'slot' => 'content',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": "<h2>Kategorie Listing ohne Sidebar</h2><div>Über die Erlebniswelten-Layouts (CMS) lassen sich Listings mit und ohne Sidebar erstellen. Dabei können über die Sektionen auch Bereiche ohne Sidebar folgen. In der Sidebar lassen sich neben den Unterkategorien und den Filtern auch andere Elemente platzieren. Die Filter lassen sich auch oberhalb des Listings vollflächig darstellen. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</div>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content": {"value": "<h2>Category listing without sidebar</h2>\n                <p>Listings with and without a sidebar can be created using the shopping experience layouts (CMS). In addition to the subcategories and filters, other elements can also be placed in the sidebar. The filters can also be displayed over the entire area above the listing. Areas without a sidebar can also follow via the sections. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, \n                sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, \n                sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. \n                Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. \n                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, \n                sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. \n                At vero eos et accusam et justo duo dolores et ea rebum. \n                Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                ]
                            ]
                        ]
                    ],
                    [
                        'id' => Uuid::randomHex(),
                        'position' => 2,
                        'sizingMode' => 'boxed',
                        'type' => 'default',
                        'blocks' => [
                            [
                                'position' => 0,
                                'type' => 'sidebar-filter',
                                'locked' => 0,
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "20px",
                                'marginBottom' => "20px",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'sidebar-filter',
                                        'slot' => 'content',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('', true)
                                            ]
                                        ])
                                    ],
                                ]
                            ],
                            [
                                'position' => 1,
                                'type' => 'product-listing',
                                'name' => 'Category listing',
                                'locked' => 0,
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "40px",
                                'marginBottom' => "40px",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'product-listing',
                                        'slot' => 'content',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"filters": {"value": "manufacturer-filter,rating-filter,price-filter,shipping-free-filter,property-filter", "source": "static"}, "boxLayout": {"value": "minimal", "source": "static"}, "showSorting": {"value": true, "source": "static"}, "defaultSorting": {"value": "", "source": "static"}, "useCustomSorting": {"value": false, "source": "static"}, "availableSortings": {"value": [], "source": "static"}, "propertyWhitelist": {"value": [], "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"filters": {"value": "manufacturer-filter,rating-filter,price-filter,shipping-free-filter,property-filter", "source": "static"}, "boxLayout": {"value": "minimal", "source": "static"}, "showSorting": {"value": true, "source": "static"}, "defaultSorting": {"value": "", "source": "static"}, "useCustomSorting": {"value": false, "source": "static"}, "availableSortings": {"value": [], "source": "static"}, "propertyWhitelist": {"value": [], "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                ]
                            ],
                            [
                                'position' => 2,
                                'type' => 'text',
                                'locked' => 0,
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "40px",
                                'marginBottom' => "40px",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'text',
                                        'slot' => 'content',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": "<h2>Kategorienbeschreibung unter dem Listing</h2>\n                <p>Mit Hilfe der CMS Kategorie Layouts der Erlebniswelten können Kategoriebeschreibungen auch unter das Listing gesetzt werden. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, \n                sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, \n                sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. \n                Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. \n                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, \n                sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. \n                At vero eos et accusam et justo duo dolores et ea rebum. \n                Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content": {"value": "<h2>Category description under the listing</h2>\n                <p>With the help of the CMS category layouts of the shopping experience module, category descriptions can also be placed under the listing. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, \n                sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, \n                sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. \n                Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. \n                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, \n                sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. \n                At vero eos et accusam et justo duo dolores et ea rebum. \n                Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ];
    }

    private function categoryLayoutSidebar(Context $context): array {
        return [
            [
                'id' => self::$cmsPageIds[1],
                'type' => 'product_list',
                'locked' => 0,
                'previewMediaId' => self::$previewImages['category'],
                'name' => $this->translationHelper->adjustTranslations([
                    'de-DE' => 'mit Sidebar - Zenit Standard Kategorielayout',
                    'en-GB' => 'with sidebar - Zenit default category layout',
                ]),
                'sections' => [
                    [
                        'id' => Uuid::randomHex(),
                        'position' => 1,
                        'sizingMode' => 'boxed',
                        'type' => 'default',
                        'blocks' => [
                            [
                                'position' => 0,
                                'type' => 'text',
                                'locked' => 0,
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "40px",
                                'marginBottom' => "40px",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'text',
                                        'slot' => 'content',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": "<h2>Kategorie Listing mit Sidebar</h2><div>Über die Erlebniswelten-Layouts (CMS) lassen sich Listings mit und ohne Sidebar erstellen. Dabei können über die Sektionen auch Bereiche ohne Sidebar folgen. In der Sidebar lassen sich neben den Unterkategorien und den Filtern auch andere Elemente platzieren. Die Filter lassen sich auch oberhalb des Listings vollflächig darstellen. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</div>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content": {"value": "<h2>Categoy listing withour sidebar</h2>\n                <p>Listings with and without a sidebar can be created using the shopping experience layouts (CMS). In addition to the subcategories and filters, other elements can also be placed in the sidebar. The filters can also be displayed over the entire area above the listing. Areas without a sidebar can also follow via the sections. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, \n                sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, \n                sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. \n                Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. \n                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, \n                sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. \n                At vero eos et accusam et justo duo dolores et ea rebum. \n                Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                ]
                            ]
                        ]
                    ],
                    [
                        'id' => Uuid::randomHex(),
                        'position' => 2,
                        'sizingMode' => 'boxed',
                        'type' => 'sidebar',
                        'blocks' => [
                            [
                                'position' => 1,
                                'type' => 'product-listing',
                                'name' => 'Category listing',
                                'locked' => 0,
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "40px",
                                'marginBottom' => "40px",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'product-listing',
                                        'slot' => 'content',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"filters": {"value": "manufacturer-filter,rating-filter,price-filter,shipping-free-filter,property-filter", "source": "static"}, "boxLayout": {"value": "minimal", "source": "static"}, "showSorting": {"value": true, "source": "static"}, "defaultSorting": {"value": "", "source": "static"}, "useCustomSorting": {"value": false, "source": "static"}, "availableSortings": {"value": [], "source": "static"}, "propertyWhitelist": {"value": [], "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"filters": {"value": "manufacturer-filter,rating-filter,price-filter,shipping-free-filter,property-filter", "source": "static"}, "boxLayout": {"value": "minimal", "source": "static"}, "showSorting": {"value": true, "source": "static"}, "defaultSorting": {"value": "", "source": "static"}, "useCustomSorting": {"value": false, "source": "static"}, "availableSortings": {"value": [], "source": "static"}, "propertyWhitelist": {"value": [], "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                ]
                            ],
                            [
                                'position' => 2,
                                'sectionPosition' => 'sidebar',
                                'type' => 'category-navigation',
                                'locked' => 0,
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "40px",
                                'marginBottom' => "",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'category-navigation',
                                        'slot' => 'content',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('', true)
                                            ]
                                        ])
                                    ],
                                ]
                            ],
                            [
                                'position' => 3,
                                'sectionPosition' => 'sidebar',
                                'type' => 'sidebar-filter',
                                'locked' => 0,
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "40px",
                                'marginBottom' => "40px",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'sidebar-filter',
                                        'slot' => 'content',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('', true)
                                            ]
                                        ])
                                    ],
                                ]
                            ],
                            [
                                'position' => 4,
                                'sectionPosition' => 'sidebar',
                                'type' => 'text-hero',
                                'locked' => 0,
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "40px",
                                'marginBottom' => "20px",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'text',
                                        'slot' => 'content',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": "<h2 style=\"text-align: center;\">Text in Sidebar</h2>\n                        <hr>\n                        <p style=\"text-align: center;\">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, \n                        sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, \n                        sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.&nbsp;</p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content": {"value": "<h2 style=\"text-align: center;\">Text in Sidebar</h2>\n                        <hr>\n                        <p style=\"text-align: center;\">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, \n                        sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, \n                        sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.&nbsp;</p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                ]
                            ],
                            [
                                'position' => 5,
                                'sectionPosition' => 'sidebar',
                                'type' => 'text',
                                'locked' => 0,
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "20px",
                                'marginBottom' => "40px",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'product-box',
                                        'slot' => 'content',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"product": {"value": "' . json_decode($this->limitedProducts(1))[0] . '", "source": "static"}, "boxLayout": {"value": "minimal", "source": "static"}, "displayMode": {"value": "standard", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"product": {"value": "' . json_decode($this->limitedProducts(1))[0] . '", "source": "static"}, "boxLayout": {"value": "minimal", "source": "static"}, "displayMode": {"value": "standard", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                ]
                            ],
                        ]
                    ],
                    [
                        'id' => Uuid::randomHex(),
                        'position' => 2,
                        'sizingMode' => 'boxed',
                        'type' => 'default',
                        'blocks' => [
                            [
                                'position' => 1,
                                'type' => 'text',
                                'locked' => 0,
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "40px",
                                'marginBottom' => "40px",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'text',
                                        'slot' => 'content',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": "<h2 style=\"text-align: center;\">Text in Sidebar</h2>\n                        <hr>\n                        <p style=\"text-align: center;\">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, \n                        sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, \n                        sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.&nbsp;</p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content": {"value": "<h2 style=\"text-align: center;\">Text in Sidebar</h2>\n                        <hr>\n                        <p style=\"text-align: center;\">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, \n                        sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, \n                        sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.&nbsp;</p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ];
    }

    private function categoryLayoutHeader(Context $context): array {
        return [
            [
                'id' => self::$cmsPageIds[2],
                'type' => 'product_list',
                'locked' => 0,
                'previewMediaId' => self::$previewImages['category'],
                'name' => $this->translationHelper->adjustTranslations([
                    'de-DE' => 'ohne Sidebar - Zenit Header Kategorielayout',
                    'en-GB' => 'no sidebar - Zenit header category layout',
                ]),
                'sections' => [
                    [
                        'id' => Uuid::randomHex(),
                        'position' => 1,
                        'sizingMode' => 'boxed',
                        'type' => 'default',
                        'blocks' => [
                            [
                                'position' => 1,
                                'type' => 'text',
                                'locked' => 0,
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "80px",
                                'marginBottom' => "40px",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'text',
                                        'slot' => 'content',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": "<h1 style=\"text-align: center;\">Headline der Kategorie</h1><div style=\"text-align: center;\">Über die Theme-Konfiguration kannst Du das Bild einer Kategorie in die erste Sektion einer Erlebniswelt setzen. Erfahre in unserer&nbsp;<a href=\"https://docs.zenit.design\" target=\"_blank\">Dokumentation</a>&nbsp;mehr über die Funktionen des Themes. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</div>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content": {"value": "<h1 style=\"text-align: center;\">Headline der Kategorie</h1><div style=\"text-align: center;\">Über die Theme-Konfiguration kannst Du das Bild einer Kategorie in die erste Sektion einer Erlebniswelt setzen. Erfahre in unserer&nbsp;<a target=\"_blank\" href=\"https://docs.zenit.design\">Dokumentation</a>&nbsp;mehr über die Funktionen des Themes. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</div>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                ]
                            ],
                            [
                                'position' => 2,
                                'type' => 'zen-breadcrumb',
                                'locked' => 0,
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "20px",
                                'marginBottom' => "20px",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'zen-breadcrumb',
                                        'slot' => 'content',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"horizontalAlign": {"value": "flex-end", "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"horizontalAlign": {"value": "flex-end", "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                ]
                            ],
                        ]
                    ],
                    [
                        'id' => Uuid::randomHex(),
                        'position' => 2,
                        'sizingMode' => 'boxed',
                        'type' => 'default',
                        'blocks' => [
                            [
                                'position' => 1,
                                'type' => 'sidebar-filter',
                                'locked' => 0,
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "40px",
                                'marginBottom' => "20px",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'sidebar-filter',
                                        'slot' => 'content',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('', true)
                                            ]
                                        ])
                                    ],
                                ]
                            ],
                            [
                                'position' => 2,
                                'type' => 'product-listing',
                                'locked' => 0,
                                'name' => 'Category listing',
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "20px",
                                'marginBottom' => "20px",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'product-listing',
                                        'slot' => 'content',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"filters": {"value": "manufacturer-filter,rating-filter,price-filter,shipping-free-filter,property-filter", "source": "static"}, "boxLayout": {"value": "minimal", "source": "static"}, "showSorting": {"value": true, "source": "static"}, "defaultSorting": {"value": "", "source": "static"}, "useCustomSorting": {"value": false, "source": "static"}, "availableSortings": {"value": [], "source": "static"}, "propertyWhitelist": {"value": [], "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"filters": {"value": "manufacturer-filter,rating-filter,price-filter,shipping-free-filter,property-filter", "source": "static"}, "boxLayout": {"value": "minimal", "source": "static"}, "showSorting": {"value": true, "source": "static"}, "defaultSorting": {"value": "", "source": "static"}, "useCustomSorting": {"value": false, "source": "static"}, "availableSortings": {"value": [], "source": "static"}, "propertyWhitelist": {"value": [], "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                ]
                            ],
                        ]
                    ]
                ]
            ]
        ];
    }

    private function categoryLayoutHeaderSidebar(Context $context): array {
        return [
            [
                'id' => self::$cmsPageIds[3],
                'type' => 'product_list',
                'locked' => 0,
                'previewMediaId' => self::$previewImages['category'],
                'name' => $this->translationHelper->adjustTranslations([
                    'de-DE' => 'mit Sidebar - Zenit Header Kategorielayout',
                    'en-GB' => 'with sidebar - Zenit header category layout',
                ]),
                'sections' => [
                    [
                        'id' => Uuid::randomHex(),
                        'position' => 1,
                        'sizingMode' => 'boxed',
                        'type' => 'default',
                        'blocks' => [
                            [
                                'position' => 1,
                                'type' => 'text',
                                'locked' => 0,
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "80px",
                                'marginBottom' => "40px",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'text',
                                        'slot' => 'content',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": "<h1 style=\"text-align: center;\">Headline der Kategorie</h1><div style=\"text-align: center;\">Über die Theme-Konfiguration kannst Du das Bild einer Kategorie in die erste Sektion einer Erlebniswelt setzen. Erfahre in unserer&nbsp;<a href=\"https://docs.zenit.design\" target=\"_blank\">Dokumentation</a>&nbsp;mehr über die Funktionen des Themes. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</div>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content": {"value": "<h1 style=\"text-align: center;\">Headline der Kategorie</h1><div style=\"text-align: center;\">Über die Theme-Konfiguration kannst Du das Bild einer Kategorie in die erste Sektion einer Erlebniswelt setzen. Erfahre in unserer&nbsp;<a target=\"_blank\" href=\"https://docs.zenit.design\"><font color=\"#ffffff\">Dokumentation</font></a>&nbsp;mehr über die Funktionen des Themes. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</div>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                ]
                            ],
                            [
                                'position' => 2,
                                'type' => 'zen-breadcrumb',
                                'locked' => 0,
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "20px",
                                'marginBottom' => "20px",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'zen-breadcrumb',
                                        'slot' => 'content',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"horizontalAlign": {"value": "flex-end", "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"horizontalAlign": {"value": "flex-end", "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                ]
                            ]
                        ]
                    ],
                    [
                        'id' => Uuid::randomHex(),
                        'position' => 2,
                        'type' => 'sidebar',
                        'sizingMode' => 'boxed',
                        'blocks' => [
                            [
                                'position' => 1,
                                'type' => 'category-navigation',
                                'sectionPosition' => 'sidebar',
                                'locked' => 0,
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "40px",
                                'marginBottom' => "40px",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'category-navigation',
                                        'slot' => 'content',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('', true)
                                            ]
                                        ])
                                    ],
                                ]
                            ],
                            [
                                'position' => 2,
                                'type' => 'sidebar-filter',
                                'sectionPosition' => 'sidebar',
                                'locked' => 0,
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "40px",
                                'marginBottom' => "20px",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'sidebar-filter',
                                        'slot' => 'content',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('', true)
                                            ]
                                        ])
                                    ],
                                ]
                            ],
                            [
                                'position' => 3,
                                'type' => 'product-listing',
                                'locked' => 0,
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "40px",
                                'marginBottom' => "40px",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'product-listing',
                                        'slot' => 'content',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"filters": {"value": "manufacturer-filter,rating-filter,price-filter,shipping-free-filter,property-filter", "source": "static"}, "boxLayout": {"value": "minimal", "source": "static"}, "showSorting": {"value": true, "source": "static"}, "defaultSorting": {"value": "", "source": "static"}, "useCustomSorting": {"value": false, "source": "static"}, "availableSortings": {"value": [], "source": "static"}, "propertyWhitelist": {"value": [], "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"filters": {"value": "manufacturer-filter,rating-filter,price-filter,shipping-free-filter,property-filter", "source": "static"}, "boxLayout": {"value": "minimal", "source": "static"}, "showSorting": {"value": true, "source": "static"}, "defaultSorting": {"value": "", "source": "static"}, "useCustomSorting": {"value": false, "source": "static"}, "availableSortings": {"value": [], "source": "static"}, "propertyWhitelist": {"value": [], "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                ]
                            ],
                        ]
                    ]
                ]
            ]
        ];
    }
}