<?php declare(strict_types=1);

namespace zenit\PlatformDemoData\Core\CmsProvider;

use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\Uuid\Uuid;
use zenit\PlatformDemoData\Core\AbstractCmsDemoData;

/**
 * @extends AbstractCmsDemoData
 *
 */
class ProductCmsDemoData extends AbstractCmsDemoData
{
    /**
     * Method that returns the Layout Ids
     *
     * @return array
     *
     */
    public static array $cmsPageIds = [
        'a4dfab87946c4e189e2d617655bab75a',
        '957f86c651a445f6a92844fbfb5d949e',
        'f8ba484a45df4c798d64fb3e47547f1f',
        '6daa129a65414b1281a2befe430f90ad',
        '358c76da79ac491b9ff9fa8634f1e89c'
    ];

    /**
     * Method that returns the data of the layout
     *
     * @param String $data
     * @param Context $context
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
        $this->demoImageHelper->createImage($context, self::$previewImages['product']);
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
        $this->demoImageHelper->deleteImage($context, self::$previewImages['product']);
    }

    private function productLayout1(Context $context): array {
        return [
            [
                'id' => self::$cmsPageIds[0],
                'type' => 'product_detail',
                'locked' => 0,
                'previewMediaId' => self::$previewImages['product'],
                'name' => $this->translationHelper->adjustTranslations([
                    'de-DE' => 'Galerie und Buybox - Zenit Produktlayout',
                    'en-GB' => 'Image gallery and buy box - Zenit product layout',
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
                                'type' => 'zen-gallery-heading-buybox',
                                'locked' => 0,
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "20px",
                                'marginBottom' => "20px",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'image-gallery',
                                        'slot' => 'left',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"zoom": {"value": true, "source": "static"}, "speed": {"value": 300, "source": "static"}, "autoSlide": {"value": false, "source": "static"}, "minHeight": {"value": "430px", "source": "static"}, "fullScreen": {"value": true, "source": "static"}, "displayMode": {"value": "contain", "source": "static"}, "sliderItems": {"value": "product.media", "source": "mapped"}, "verticalAlign": {"value": null, "source": "static"}, "navigationDots": {"value": "inside", "source": "static"}, "autoplayTimeout": {"value": 5000, "source": "static"}, "galleryPosition": {"value": "left", "source": "static"}, "navigationArrows": {"value": "inside", "source": "static"}, "magnifierOverGallery": {"value": false, "source": "static"}, "keepAspectRatioOnZoom": {"value": true, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'product-name',
                                        'slot' => 'right-top-left',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": "product.name", "source": "mapped"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'manufacturer-logo',
                                        'slot' => 'right-top-right',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": null, "source": "static"}, "media": {"value": "product.manufacturer.media", "source": "mapped"}, "newTab": {"value": true, "source": "static"}, "minHeight": {"value": null, "source": "static"}, "displayMode": {"value": "standard", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'buy-box',
                                        'slot' => 'right-bottom',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"product": {"value": null, "source": "static"}, "alignment": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ]
                                ]
                            ],
                            [
                                'position' => 1,
                                'type' => 'product-description-reviews',
                                'locked' => 0,
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "20px",
                                'marginBottom' => "20px",
                                'marginLeft' => "0",
                                'marginRight' => "0",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'product-description-reviews',
                                        'slot' => 'content',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"product": {"value": null, "source": "static"}, "alignment": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ]
                                ]
                            ],
                            [
                                'position' => 2,
                                'type' => 'cross-selling',
                                'locked' => 0,
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "0",
                                'marginBottom' => "0",
                                'marginLeft' => "0",
                                'marginRight' => "0",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'cross-selling',
                                        'slot' => 'content',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"product": {"value": null, "source": "static"}, "boxLayout": {"value": "standard", "source": "static"}, "elMinWidth": {"value": "300px", "source": "static"}, "displayMode": {"value": "standard", "source": "static"}}', true)
                                            ]
                                        ])
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ];
    }

    private function productLayout2(Context $context): array {
        return [
            [
                'id' => self::$cmsPageIds[1],
                'type' => 'product_detail',
                'locked' => 0,
                'previewMediaId' => self::$previewImages['product'],
                'name' => $this->translationHelper->adjustTranslations([
                    'de-DE' => 'Galerie und Buybox mit Produktname & Hersteller-Logo - Zenit Produktlayout',
                    'en-GB' => 'Image gallery and buy box with product name & manufacturer logo - Zenit product layout',
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
                                'type' => 'zen-gallery-heading-description-buybox',
                                'locked' => 0,
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "40px",
                                'marginBottom' => "20px",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'image-gallery',
                                        'slot' => 'left',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"zoom": {"value": true, "source": "static"}, "speed": {"value": 300, "source": "static"}, "autoSlide": {"value": false, "source": "static"}, "minHeight": {"value": "430px", "source": "static"}, "fullScreen": {"value": true, "source": "static"}, "displayMode": {"value": "contain", "source": "static"}, "sliderItems": {"value": "product.media", "source": "mapped"}, "verticalAlign": {"value": null, "source": "static"}, "navigationDots": {"value": "inside", "source": "static"}, "autoplayTimeout": {"value": 5000, "source": "static"}, "galleryPosition": {"value": "left", "source": "static"}, "navigationArrows": {"value": "inside", "source": "static"}, "magnifierOverGallery": {"value": false, "source": "static"}, "keepAspectRatioOnZoom": {"value": true, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'product-name',
                                        'slot' => 'right-top-left',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": "product.name", "source": "mapped"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'manufacturer-logo',
                                        'slot' => 'right-top-right',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": null, "source": "static"}, "media": {"value": "product.manufacturer.media", "source": "mapped"}, "newTab": {"value": true, "source": "static"}, "minHeight": {"value": null, "source": "static"}, "displayMode": {"value": "standard", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'buy-box',
                                        'slot' => 'right-center',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"product": {"value": null, "source": "static"}, "alignment": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ]
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
                                'position' => 0,
                                'type' => 'product-description-reviews',
                                'locked' => 0,
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "20px",
                                'marginBottom' => "20px",
                                'marginLeft' => "0",
                                'marginRight' => "0",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'product-description-reviews',
                                        'slot' => 'content',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"product": {"value": null, "source": "static"}, "alignment": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ]
                                ]
                            ],
                            [
                                'position' => 1,
                                'type' => 'cross-selling',
                                'locked' => 0,
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "60px",
                                'marginBottom' => "40px",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'cross-selling',
                                        'slot' => 'content',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"product": {"value": null, "source": "static"}, "boxLayout": {"value": "standard", "source": "static"}, "elMinWidth": {"value": "300px", "source": "static"}, "displayMode": {"value": "standard", "source": "static"}}', true)
                                            ]
                                        ])
                                    ]
                                ]
                            ],
                        ]
                    ]
                ]
            ]
        ];
    }

    private function productLayout3(Context $context): array {
        return [
            [
                'id' => self::$cmsPageIds[2],
                'type' => 'product_detail',
                'locked' => 0,
                'previewMediaId' => self::$previewImages['product'],
                'name' => $this->translationHelper->adjustTranslations([
                    'de-DE' => 'Galerie und Buybox mit Beschreibung - Zenit Produktlayout',
                    'en-GB' => 'Image gallery and buy box with description - Zenit product layout',
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
                                'type' => 'product-heading',
                                'locked' => 0,
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "40px",
                                'marginBottom' => "20px",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'product-name',
                                        'slot' => 'left',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": "product.name", "source": "mapped"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'manufacturer-logo',
                                        'slot' => 'right',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": null, "source": "static"}, "media": {"value": "product.manufacturer.media", "source": "mapped"}, "newTab": {"value": true, "source": "static"}, "minHeight": {"value": null, "source": "static"}, "displayMode": {"value": "standard", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ]
                                ]
                            ],
                            [
                                'position' => 0,
                                'type' => 'zen-gallery-description-buybox',
                                'locked' => 1,
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "20px",
                                'marginBottom' => "20px",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'product-description-reviews',
                                        'slot' => 'right-bottom',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"product": {"value": null, "source": "static"}, "alignment": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'buy-box',
                                        'slot' => 'right-top',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"product": {"value": null, "source": "static"}, "alignment": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'image-gallery',
                                        'slot' => 'left',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"zoom": {"value": true, "source": "static"}, "speed": {"value": 300, "source": "static"}, "autoSlide": {"value": false, "source": "static"}, "minHeight": {"value": "430px", "source": "static"}, "fullScreen": {"value": true, "source": "static"}, "displayMode": {"value": "contain", "source": "static"}, "sliderItems": {"value": "product.media", "source": "mapped"}, "verticalAlign": {"value": null, "source": "static"}, "navigationDots": {"value": "inside", "source": "static"}, "autoplayTimeout": {"value": 5000, "source": "static"}, "galleryPosition": {"value": "left", "source": "static"}, "navigationArrows": {"value": "inside", "source": "static"}, "magnifierOverGallery": {"value": false, "source": "static"}, "keepAspectRatioOnZoom": {"value": true, "source": "static"}}', true)
                                            ]
                                        ])
                                    ]
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
                                'type' => 'cross-selling',
                                'locked' => 0,
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "60px",
                                'marginBottom' => "40px",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'cross-selling',
                                        'slot' => 'content',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"product": {"value": null, "source": "static"}, "boxLayout": {"value": "standard", "source": "static"}, "elMinWidth": {"value": "300px", "source": "static"}, "displayMode": {"value": "standard", "source": "static"}}', true)
                                            ]
                                        ])
                                    ]
                                ]
                            ],
                        ]
                    ]
                ]
            ]
        ];
    }

    private function productLayout4(Context $context): array {
        return [
            [
                'id' => self::$cmsPageIds[3],
                'type' => 'product_detail',
                'locked' => 0,
                'previewMediaId' => self::$previewImages['product'],
                'name' => $this->translationHelper->adjustTranslations([
                    'de-DE' => 'Galerie und Buybox mit Produktname & Hersteller-Logo & Beschreibung - Zenit Produktlayout',
                    'en-GB' => 'Image gallery and buy box with product name & manufacturer logo & description - Zenit product layout',
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
                                'type' => 'zen-gallery-heading-description-buybox',
                                'locked' => 0,
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "40px",
                                'marginBottom' => "20px",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'image-gallery',
                                        'slot' => 'left',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"zoom": {"value": true, "source": "static"}, "speed": {"value": 300, "source": "static"}, "autoSlide": {"value": false, "source": "static"}, "minHeight": {"value": "430px", "source": "static"}, "fullScreen": {"value": true, "source": "static"}, "displayMode": {"value": "contain", "source": "static"}, "sliderItems": {"value": "product.media", "source": "mapped"}, "verticalAlign": {"value": null, "source": "static"}, "navigationDots": {"value": "inside", "source": "static"}, "autoplayTimeout": {"value": 5000, "source": "static"}, "galleryPosition": {"value": "left", "source": "static"}, "navigationArrows": {"value": "inside", "source": "static"}, "magnifierOverGallery": {"value": false, "source": "static"}, "keepAspectRatioOnZoom": {"value": true, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'product-name',
                                        'slot' => 'right-top-left',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": "product.name", "source": "mapped"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'manufacturer-logo',
                                        'slot' => 'right-top-right',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": null, "source": "static"}, "media": {"value": "product.manufacturer.media", "source": "mapped"}, "newTab": {"value": true, "source": "static"}, "minHeight": {"value": null, "source": "static"}, "displayMode": {"value": "standard", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'buy-box',
                                        'slot' => 'right-center',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"product": {"value": null, "source": "static"}, "alignment": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'product-description-reviews',
                                        'slot' => 'right-bottom',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"product": {"value": null, "source": "static"}, "alignment": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ]
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
                                'type' => 'cross-selling',
                                'locked' => 0,
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "60px",
                                'marginBottom' => "40px",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'cross-selling',
                                        'slot' => 'content',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"product": {"value": null, "source": "static"}, "boxLayout": {"value": "standard", "source": "static"}, "elMinWidth": {"value": "300px", "source": "static"}, "displayMode": {"value": "standard", "source": "static"}}', true)
                                            ]
                                        ])
                                    ]
                                ]
                            ],
                        ]
                    ]
                ]
            ]
        ];
    }

    private function productLayout5(Context $context): array {
        return [
            [
                'id' => self::$cmsPageIds[4],
                'type' => 'product_detail',
                'locked' => 0,
                'previewMediaId' => self::$previewImages['product'],
                'name' => $this->translationHelper->adjustTranslations([
                    'de-DE' => 'Galerie mit Beschreibung und Buybox mit Produktname & Hersteller-Logo - Zenit Produktlayout',
                    'en-GB' => 'Image gallery with description and buy box with product name & manufacturer logo - Zenit product layout',
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
                                'type' => 'zen-gallery-description-heading-buybox',
                                'locked' => 0,
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "20px",
                                'marginBottom' => "20px",
                                'marginLeft' => "20px",
                                'marginRight' => "20px",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'image-gallery',
                                        'slot' => 'left',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"zoom": {"value": true, "source": "static"}, "speed": {"value": 300, "source": "static"}, "autoSlide": {"value": false, "source": "static"}, "minHeight": {"value": "430px", "source": "static"}, "fullScreen": {"value": true, "source": "static"}, "displayMode": {"value": "contain", "source": "static"}, "sliderItems": {"value": "product.media", "source": "mapped"}, "verticalAlign": {"value": null, "source": "static"}, "navigationDots": {"value": "inside", "source": "static"}, "autoplayTimeout": {"value": 5000, "source": "static"}, "galleryPosition": {"value": "left", "source": "static"}, "navigationArrows": {"value": "inside", "source": "static"}, "magnifierOverGallery": {"value": false, "source": "static"}, "keepAspectRatioOnZoom": {"value": true, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'product-name',
                                        'slot' => 'right-top-left',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": "product.name", "source": "mapped"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'manufacturer-logo',
                                        'slot' => 'right-top-right',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": null, "source": "static"}, "media": {"value": "product.manufacturer.media", "source": "mapped"}, "newTab": {"value": true, "source": "static"}, "minHeight": {"value": null, "source": "static"}, "displayMode": {"value": "standard", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'buy-box',
                                        'slot' => 'right-center',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"product": {"value": null, "source": "static"}, "alignment": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'product-description-reviews',
                                        'slot' => 'left-bottom',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"product": {"value": null, "source": "static"}, "alignment": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ]
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
                                'type' => 'cross-selling',
                                'locked' => 0,
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "60px",
                                'marginBottom' => "40px",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'cross-selling',
                                        'slot' => 'content',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"product": {"value": null, "source": "static"}, "boxLayout": {"value": "standard", "source": "static"}, "elMinWidth": {"value": "300px", "source": "static"}, "displayMode": {"value": "standard", "source": "static"}}', true)
                                            ]
                                        ])
                                    ]
                                ]
                            ],
                        ]
                    ]
                ]
            ]
        ];
    }
}