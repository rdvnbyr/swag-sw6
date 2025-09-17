<?php declare(strict_types=1);

namespace zenit\PlatformDemoData\Core\CmsProvider;

use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\Uuid\Uuid;
use zenit\PlatformDemoData\Core\AbstractCmsDemoData;

/**
 * @extends AbstractCmsDemoData
 *
 */
class AtmosCmsDemoData extends AbstractCmsDemoData
{
    /**
     * Method that returns the Layout Ids
     *
     * @return array
     *
     */
    public static array $cmsPageIds = [
        'd6c2a36cc08d4b5aaf526fa6c773f357',
        '059091996f3f4ebf98ce465dd58182d7',
        '9f9cbd8089c44cfb98b8774dacb5fced',
        '679dfebed86642acbb5a13973a46e5d5',
    ];

    /**
     * Method that returns the Image Ids
     *
     * @return array
     *
     */
    public static array $cmsImageIds = [
        'c1177cf89e1f418a8044c7e3b3c420b2',
        '7b2ce76d3ce44d18a69f1e045704e917',
        '2d10b374db2143d6947ba9ee0e12a568',
        '87535ec30e764c028f197343e404cea7',
        '0cea58317eb8436b90396c31c3bfae21',
        'c5dae666cc8b4dffaa6e7e333adae043',
        '471f8c75cacb42448909f55d1e3fd62f',
        '6fd3f03b5f5c4889a4302b86fa347f6c',
        '1ecc1bf4175e4b0bae99f7457cfc1474',
        'a52e415db5604cc486793ab9724369e8',
        '92b5a107e3e24a05b78de771f8a31e41',
        '5faa1340c9b84a52af9b283f94726b3f',
        'acedad621740403387963788144acc1a',
        'db7c35e1d50940a282ac45f93b6f4174',
        '99645f79c8bd460589f39d08e818dfcc',
        'dc9491aa84a84f03908643ee9edd2c5f',
        '38db46bdba94494eb852c5e253b473e3',
        '80197f621173467e81ba3a5406b1f4f7',
        'd47d0ddd3b4449dc9726b3e3edfaa5a1',
        '84b1b25c14534134bcf228ffcbddf1c8',
        '40d697b5bd9a47a087b6e6c7102b6248',
        '5e59b522857647d6b05dc816aeba8ee3',
        '7922303a2fda476ea156e9e5f3a82f47',
        '5a507e768450441cadd175b92b1fdcc6',
        '864559bb7aef4ccbbb52cd91f9128732',
        '8b69d55793734caaa4c70591a6d76f95',
        'f01d4643720b43ca8d881607f6585e01',
        'c382a1830ffb4b3abe6907346e2ac535',
        '0e95692cbc7a45d3a7205593aa6b03c8',
        '79d65d28bf9c4c45b8416eb2fd0a24c3',
        '90699c71a9e4411c8720f49b993395ea',
        '5d95240221a24e129b84019df71ebeb1',
        '8b13be5147014efc8e3e2c027aaf67c2',
        '83c0b15df39e4d50bb9281400c57977e',
        'fc00c5d158f54d47bb972f9838499e46',
        'cec7f12ac4f34fda93cc3589efe166a8',
        'a4c1cba3161b4fad9137da7cc803786e',
        '93d7dac3284a4088a46359afd7f3ed89',
        '14e1960e026842409532026322dac36e',
        '39e9b0bcfdd4436190f9cbfd2e894227',
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
        foreach (array_merge(self::$cmsImageIds, [self::$previewImages['atmos']]) as $imageId) {
            $this->demoImageHelper->createImage($context, $imageId);
        }
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
        foreach (array_merge(self::$cmsImageIds, [self::$previewImages['atmos']]) as $imageId) {
            $this->demoImageHelper->deleteImage($context, $imageId);
        }
    }

    private function home1(Context $context): array
    {
        return [
            [
                'id' => self::$cmsPageIds[0],
                'type' => 'landingpage',
                'locked' => 0,
                'previewMediaId' => self::$previewImages['atmos'],
                'name' => $this->translationHelper->adjustTranslations([
                    'de-DE' => 'Startseite Atmos - Set 1',
                    'en-GB' => 'Homepage Atmos - Set 1',
                ]),
                'sections' => [
                    [
                        'id' => Uuid::randomHex(),
                        'position' => 1,
                        'sizingMode' => 'full_width',
                        'backgroundMediaId' => self::$cmsImageIds[0],
                        'backgroundMediaMode' => 'cover',
                        'type' => 'default',
                        'blocks' => [
                            [
                                'position' => 0,
                                'type' => 'text-teaser-section',
                                'locked' => 0,
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "200px",
                                'marginBottom' => "100px",
                                'marginLeft' => "",
                                'marginRight' => "",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'text',
                                        'slot' => 'left',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": "<p style=\"text-align: center; letter-spacing: 2px;\"><font color=\"#333333\">BEST FASHION TRENDS</font></p>\n<h2 style=\"text-align: center; font-weight: 300; font-size: 60px;\"><font color=\"#333333\">Hippie Revivals</font></h2>\n<font color=\"#333333\"><br>\n</font><p style=\"text-align: center;\"><font color=\"#333333\">\n    Lorem ipsum dolor sit amet, consetetur sadipscing elitr.\n</font></p>\n<div style=\"text-align: center;\"><a class=\"btn btn-outline-secondary\" href=\"#demo-link\">Mehr erfahren</a><br></div>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content": {"value": "<p style=\"text-align: center; letter-spacing: 2px;\"><font color=\"#333333\">BEST FASHION TRENDS</font></p>\n<h2 style=\"text-align: center; font-weight: 300; font-size: 60px;\"><font color=\"#333333\">Hippie Revivals</font></h2>\n<font color=\"#333333\"><br>\n</font><p style=\"text-align: center;\"><font color=\"#333333\">\n    Lorem ipsum dolor sit amet, consetetur sadipscing elitr.\n</font></p>\n<div style=\"text-align: center;\"><a class=\"btn btn-outline-secondary\" href=\"#demo-link\">Mehr erfahren</a><br></div>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'text',
                                        'slot' => 'right',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": null, "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content": {"value": null, "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ]
                                ]
                            ],
                            [
                                'position' => 1,
                                'type' => 'image-text-cover',
                                'locked' => 0,
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "100px",
                                'marginBottom' => "100px",
                                'marginLeft' => "",
                                'marginRight' => "",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'product-slider',
                                        'slot' => 'left',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"title": {"value": "", "source": "static"}, "border": {"value": false, "source": "static"}, "rotate": {"value": false, "source": "static"}, "products": {"value": ' . $this->limitedProducts(7) . ', "source": "static"}, "boxLayout": {"value": "minimal", "source": "static"}, "elMinWidth": {"value": "240px", "source": "static"}, "navigation": {"value": true, "source": "static"}, "displayMode": {"value": "contain", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "productStreamLimit": {"value": 10, "source": "static"}, "productStreamSorting": {"value": "name:ASC", "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"title": {"value": "", "source": "static"}, "border": {"value": false, "source": "static"}, "rotate": {"value": false, "source": "static"}, "products": {"value": ' . $this->limitedProducts(7) . ', "source": "static"}, "boxLayout": {"value": "minimal", "source": "static"}, "elMinWidth": {"value": "240px", "source": "static"}, "navigation": {"value": true, "source": "static"}, "displayMode": {"value": "contain", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "productStreamLimit": {"value": 10, "source": "static"}, "productStreamSorting": {"value": "name:ASC", "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'text',
                                        'slot' => 'right',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": null, "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content": {"value": null, "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
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
                                'type' => 'image-simple-grid',
                                'locked' => 0,
                                'cssClass' => 'zen-animate fade-in-bottom',
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "40px",
                                'marginBottom' => "40px",
                                'marginLeft' => "",
                                'marginRight' => "",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'image',
                                        'slot' => 'left-top',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "/Shop/Fashion/Stories/Wedding/", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[1] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url": {"value": "/Shop/Fashion/Stories/Wedding/", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[1] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'image',
                                        'slot' => 'left-bottom',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "/Shop/Fashion/Stories/Everyday/", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[2] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url": {"value": "/Shop/Fashion/Stories/Everyday/", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[2] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'image',
                                        'slot' => 'right',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "/Shop/Fashion/Trends/", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[3] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "720px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url": {"value": "/Shop/Fashion/Trends/", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[3] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "720px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ]
                                ]
                            ]
                        ]
                    ],
                    [
                        'id' => Uuid::randomHex(),
                        'position' => 3,
                        'sizingMode' => 'full_width',
                        'backgroundColor' => '#faf3ec',
                        'type' => 'default',
                        'blocks' => [
                            [
                                'position' => 0,
                                'type' => 'image-text-cover',
                                'locked' => 0,
                                'cssClass' => 'zen-animate fade-in-bottom',
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "",
                                'marginBottom' => "",
                                'marginLeft' => "0",
                                'marginRight' => "0",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'zen-teaser',
                                        'slot' => 'left',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "/Shop/Fashion/Stories/", "source": "static"}, "text": {"value": "Lorem ipsum dolor", "source": "static"}, "color": {"value": "#ffffff", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[4] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": true, "source": "static"}, "fontSize": {"value": "18px", "source": "static"}, "minHeight": {"value": "800px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "show-arrow", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "400", "source": "static"}, "imageHover": {"value": "zoom", "source": "static"}, "animationIn": {"value": "slide-in-blurred-bottom", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "fade-out", "source": "static"}, "overlayColor": {"value": "#e4bf9a", "source": "static"}, "textMaxWidth": {"value": "300px", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": true, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "overlayOpacity": {"value": "80%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "24px", "source": "static"}, "backgroundColor": {"value": "#e4bf9acc", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "30px", "source": "static"}, "textBorderRadius": {"value": false, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "30px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "textPaddingBottom": {"value": "24px", "source": "static"}, "verticalTextAlign": {"value": "center", "source": "static"}, "verticalImageAlign": {"value": null, "source": "static"}, "horizontalTextAlign": {"value": "center", "source": "static"}, "horizontalImageAlign": {"value": null, "source": "static"}, "textBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "textBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url": {"value": "/Shop/Fashion/Stories/", "source": "static"}, "text": {"value": "Lorem ipsum dolor", "source": "static"}, "color": {"value": "#ffffff", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[4] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": true, "source": "static"}, "fontSize": {"value": "18px", "source": "static"}, "minHeight": {"value": "800px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "show-arrow", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "400", "source": "static"}, "imageHover": {"value": "zoom", "source": "static"}, "animationIn": {"value": "slide-in-blurred-bottom", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "fade-out", "source": "static"}, "overlayColor": {"value": "#e4bf9a", "source": "static"}, "textMaxWidth": {"value": "300px", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": true, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "overlayOpacity": {"value": "80%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "24px", "source": "static"}, "backgroundColor": {"value": "#e4bf9acc", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "30px", "source": "static"}, "textBorderRadius": {"value": false, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "30px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "textPaddingBottom": {"value": "24px", "source": "static"}, "verticalTextAlign": {"value": "center", "source": "static"}, "verticalImageAlign": {"value": null, "source": "static"}, "horizontalTextAlign": {"value": "center", "source": "static"}, "horizontalImageAlign": {"value": null, "source": "static"}, "textBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "textBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'text',
                                        'slot' => 'right',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": "<div style=\"padding: 80px;\">\n<p style=\"letter-spacing: 2px;\">FASHION STORIES</p>\n<h2 style=\"font-weight: 300; line-height: 1; font-size: 60px;\">New Fashion Trend - <br>Hippie Revivals</h2>\n<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren...</p>\n<p><a class=\"btn btn-outline-secondary\" href=\"/Shop/Fashion/Stories/\">mehr erfahren</a></p>\n</div>\n", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content": {"value": "<div style=\"padding: 80px;\">\n<p style=\"letter-spacing: 2px;\">FASHION STORIES</p>\n<h2 style=\"font-weight: 300; line-height: 1; font-size: 60px;\">New Fashion Trend - <br>Hippie Revivals</h2>\n<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren...</p>\n<p><a class=\"btn btn-outline-secondary\" href=\"/Shop/Fashion/Stories/\">mehr erfahren</a></p>\n</div>\n", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}}', true)
                                            ]
                                        ])
                                    ]
                                ]
                            ]
                        ]
                    ],
                    [
                        'id' => Uuid::randomHex(),
                        'position' => 4,
                        'sizingMode' => 'full_width',
                        'backgroundColor' => '#f0d8ce',
                        'type' => 'default',
                        'blocks' => [
                            [
                                'position' => 0,
                                'type' => 'image-text-cover',
                                'locked' => 0,
                                'cssClass' => 'zen-animate fade-in-bottom p-5 py-md-0 pe-md-0',
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "",
                                'marginBottom' => "",
                                'marginLeft' => "0",
                                'marginRight' => "0",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'product-slider',
                                        'slot' => 'left',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"title": {"value": "Women", "source": "static"}, "border": {"value": false, "source": "static"}, "rotate": {"value": true, "source": "static"}, "products": {"value": ' . $this->limitedProducts(7) . ', "source": "static"}, "boxLayout": {"value": "minimal", "source": "static"}, "elMinWidth": {"value": "240px", "source": "static"}, "navigation": {"value": true, "source": "static"}, "displayMode": {"value": "standard", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}, "productStreamLimit": {"value": 10, "source": "static"}, "productStreamSorting": {"value": "name:ASC", "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"title": {"value": "Women", "source": "static"}, "border": {"value": false, "source": "static"}, "rotate": {"value": true, "source": "static"}, "products": {"value": ' . $this->limitedProducts(7) . ', "source": "static"}, "boxLayout": {"value": "minimal", "source": "static"}, "elMinWidth": {"value": "240px", "source": "static"}, "navigation": {"value": true, "source": "static"}, "displayMode": {"value": "standard", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}, "productStreamLimit": {"value": 10, "source": "static"}, "productStreamSorting": {"value": "name:ASC", "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'zen-teaser',
                                        'slot' => 'right',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "/Shop/Fashion/Damen/", "source": "static"}, "text": {"value": "Damenbekleidung", "source": "static"}, "color": {"value": "#ffffff", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[5] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": true, "source": "static"}, "fontSize": {"value": "18px", "source": "static"}, "minHeight": {"value": "800px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "show-arrow", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "400", "source": "static"}, "imageHover": {"value": "zoom", "source": "static"}, "animationIn": {"value": "slide-in-blurred-bottom", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "fade-out", "source": "static"}, "overlayColor": {"value": "#c5a9aa", "source": "static"}, "textMaxWidth": {"value": "300px", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": true, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "overlayOpacity": {"value": "80%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "24px", "source": "static"}, "backgroundColor": {"value": "#c5a9aacc", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "30px", "source": "static"}, "textBorderRadius": {"value": false, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "30px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "textPaddingBottom": {"value": "24px", "source": "static"}, "verticalTextAlign": {"value": "center", "source": "static"}, "verticalImageAlign": {"value": null, "source": "static"}, "horizontalTextAlign": {"value": "center", "source": "static"}, "horizontalImageAlign": {"value": null, "source": "static"}, "textBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "textBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url": {"value": "/Shop/Fashion/Damen/", "source": "static"}, "text": {"value": "Damenbekleidung", "source": "static"}, "color": {"value": "#ffffff", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[5] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": true, "source": "static"}, "fontSize": {"value": "18px", "source": "static"}, "minHeight": {"value": "800px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "show-arrow", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "400", "source": "static"}, "imageHover": {"value": "zoom", "source": "static"}, "animationIn": {"value": "slide-in-blurred-bottom", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "fade-out", "source": "static"}, "overlayColor": {"value": "#c5a9aa", "source": "static"}, "textMaxWidth": {"value": "300px", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": true, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "overlayOpacity": {"value": "80%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "24px", "source": "static"}, "backgroundColor": {"value": "#c5a9aacc", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "30px", "source": "static"}, "textBorderRadius": {"value": false, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "30px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "textPaddingBottom": {"value": "24px", "source": "static"}, "verticalTextAlign": {"value": "center", "source": "static"}, "verticalImageAlign": {"value": null, "source": "static"}, "horizontalTextAlign": {"value": "center", "source": "static"}, "horizontalImageAlign": {"value": null, "source": "static"}, "textBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "textBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
                                            ]
                                        ])
                                    ]
                                ]
                            ]
                        ]
                    ],
                    [
                        'id' => Uuid::randomHex(),
                        'position' => 5,
                        'sizingMode' => 'full_width',
                        'backgroundColor' => '#d0d8db',
                        'type' => 'default',
                        'blocks' => [
                            [
                                'position' => 0,
                                'type' => 'image-text-cover',
                                'locked' => 0,
                                'cssClass' => 'zen-animate fade-in-bottom p-5 py-md-0 ps-md-0',
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "",
                                'marginBottom' => "",
                                'marginLeft' => "0",
                                'marginRight' => "0",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'zen-teaser',
                                        'slot' => 'left',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "/Shop/Fashion/Herren/", "source": "static"}, "text": {"value": "Herrenbekleidung", "source": "static"}, "color": {"value": "#ffffff", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[6] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": true, "source": "static"}, "fontSize": {"value": "18px", "source": "static"}, "minHeight": {"value": "800px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "show-arrow", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "500", "source": "static"}, "imageHover": {"value": "zoom", "source": "static"}, "animationIn": {"value": "puff-in-center", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "fade-out", "source": "static"}, "overlayColor": {"value": "#648690", "source": "static"}, "textMaxWidth": {"value": "300px", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": true, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "overlayOpacity": {"value": "80%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "24px", "source": "static"}, "backgroundColor": {"value": "#648690cc", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "30px", "source": "static"}, "textBorderRadius": {"value": false, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "30px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "textPaddingBottom": {"value": "24px", "source": "static"}, "verticalTextAlign": {"value": "center", "source": "static"}, "verticalImageAlign": {"value": null, "source": "static"}, "horizontalTextAlign": {"value": "center", "source": "static"}, "horizontalImageAlign": {"value": null, "source": "static"}, "textBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "textBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url": {"value": "/Shop/Fashion/Herren/", "source": "static"}, "text": {"value": "Herrenbekleidung", "source": "static"}, "color": {"value": "#ffffff", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[6] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": true, "source": "static"}, "fontSize": {"value": "18px", "source": "static"}, "minHeight": {"value": "800px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "show-arrow", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "500", "source": "static"}, "imageHover": {"value": "zoom", "source": "static"}, "animationIn": {"value": "puff-in-center", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "fade-out", "source": "static"}, "overlayColor": {"value": "#648690", "source": "static"}, "textMaxWidth": {"value": "300px", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": true, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "overlayOpacity": {"value": "80%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "24px", "source": "static"}, "backgroundColor": {"value": "#648690cc", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "30px", "source": "static"}, "textBorderRadius": {"value": false, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "30px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "textPaddingBottom": {"value": "24px", "source": "static"}, "verticalTextAlign": {"value": "center", "source": "static"}, "verticalImageAlign": {"value": null, "source": "static"}, "horizontalTextAlign": {"value": "center", "source": "static"}, "horizontalImageAlign": {"value": null, "source": "static"}, "textBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "textBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'product-slider',
                                        'slot' => 'right',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"title": {"value": "Men", "source": "static"}, "border": {"value": false, "source": "static"}, "rotate": {"value": false, "source": "static"}, "products": {"value": ' . $this->limitedProducts(7) . ', "source": "static"}, "boxLayout": {"value": "minimal", "source": "static"}, "elMinWidth": {"value": "240px", "source": "static"}, "navigation": {"value": true, "source": "static"}, "displayMode": {"value": "standard", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}, "productStreamLimit": {"value": 10, "source": "static"}, "productStreamSorting": {"value": "name:ASC", "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"title": {"value": "Men", "source": "static"}, "border": {"value": false, "source": "static"}, "rotate": {"value": false, "source": "static"}, "products": {"value": ' . $this->limitedProducts(7) . ', "source": "static"}, "boxLayout": {"value": "minimal", "source": "static"}, "elMinWidth": {"value": "240px", "source": "static"}, "navigation": {"value": true, "source": "static"}, "displayMode": {"value": "standard", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}, "productStreamLimit": {"value": 10, "source": "static"}, "productStreamSorting": {"value": "name:ASC", "source": "static"}}', true)
                                            ]
                                        ])
                                    ]
                                ]
                            ]
                        ]
                    ],
                    [
                        'id' => Uuid::randomHex(),
                        'position' => 6,
                        'sizingMode' => 'boxed',
                        'type' => 'default',
                        'blocks' => [
                            [
                                'position' => 0,
                                'type' => 'text-teaser',
                                'locked' => 0,
                                'cssClass' => 'zen-animate fade-in-bottom',
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "80px",
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
                                                'config' => json_decode('{"content": {"value": "<p style=\"text-align: center; letter-spacing: 2px;\">BEST FASHION DEALS</p>\n<h2 style=\"text-align: center; font-weight: 300; font-size: 60px;\">Recent Arrivals</h2>\n<br>\n<p style=\"text-align: center;\">\n    Lorem ipsum dolor sit amet, consetetur sadipscing elitr.\n</p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content": {"value": "<p style=\"text-align: center; letter-spacing: 2px;\">BEST FASHION DEALS</p>\n<h2 style=\"text-align: center; font-weight: 300; font-size: 60px;\">Recent Arrivals</h2>\n<br>\n<p style=\"text-align: center;\">\n    Lorem ipsum dolor sit amet, consetetur sadipscing elitr.\n</p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                ]
                            ],
                            [
                                'position' => 1,
                                'type' => 'product-three-column',
                                'locked' => 0,
                                'cssClass' => 'zen-animate fade-in-bottom zen-cms-gy-5',
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "40px",
                                'marginBottom' => "40px",
                                'marginLeft' => "",
                                'marginRight' => "",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'product-box',
                                        'slot' => 'left',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"product": {"value": "' . $this->randomProduct() . '", "source": "static"}, "boxLayout": {"value": "minimal", "source": "static"}, "displayMode": {"value": "standard", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"product": {"value": "' . $this->randomProduct() . '", "source": "static"}, "boxLayout": {"value": "minimal", "source": "static"}, "displayMode": {"value": "standard", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'product-box',
                                        'slot' => 'center',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"product": {"value": "' . $this->randomProduct() . '", "source": "static"}, "boxLayout": {"value": "minimal", "source": "static"}, "displayMode": {"value": "standard", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"product": {"value": "' . $this->randomProduct() . '", "source": "static"}, "boxLayout": {"value": "minimal", "source": "static"}, "displayMode": {"value": "standard", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'product-box',
                                        'slot' => 'right',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"product": {"value": "' . $this->randomProduct() . '", "source": "static"}, "boxLayout": {"value": "minimal", "source": "static"}, "displayMode": {"value": "standard", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"product": {"value": "' . $this->randomProduct() . '", "source": "static"}, "boxLayout": {"value": "minimal", "source": "static"}, "displayMode": {"value": "standard", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ]
                                ]
                            ],
                            [
                                'position' => 2,
                                'type' => 'product-three-column',
                                'locked' => 0,
                                'cssClass' => 'zen-animate fade-in-bottom zen-cms-gy-5',
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "40px",
                                'marginBottom' => "40px",
                                'marginLeft' => "",
                                'marginRight' => "",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'product-box',
                                        'slot' => 'left',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"product": {"value": "' . $this->randomProduct() . '", "source": "static"}, "boxLayout": {"value": "minimal", "source": "static"}, "displayMode": {"value": "standard", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"product": {"value": "' . $this->randomProduct() . '", "source": "static"}, "boxLayout": {"value": "minimal", "source": "static"}, "displayMode": {"value": "standard", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'product-box',
                                        'slot' => 'center',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"product": {"value": "' . $this->randomProduct() . '", "source": "static"}, "boxLayout": {"value": "minimal", "source": "static"}, "displayMode": {"value": "standard", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"product": {"value": "' . $this->randomProduct() . '", "source": "static"}, "boxLayout": {"value": "minimal", "source": "static"}, "displayMode": {"value": "standard", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'product-box',
                                        'slot' => 'right',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"product": {"value": "' . $this->randomProduct() . '", "source": "static"}, "boxLayout": {"value": "minimal", "source": "static"}, "displayMode": {"value": "standard", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"product": {"value": "' . $this->randomProduct() . '", "source": "static"}, "boxLayout": {"value": "minimal", "source": "static"}, "displayMode": {"value": "standard", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ]
                                ]
                            ],
                            [
                                'position' => 3,
                                'type' => 'text-teaser',
                                'locked' => 0,
                                'cssClass' => 'zen-animate fade-in-bottom',
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "20px",
                                'marginBottom' => "100px",
                                'marginLeft' => "20px",
                                'marginRight' => "20px",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'text',
                                        'slot' => 'content',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": "<p style=\"text-align: center;\"><a class=\"btn btn-lg btn-outline-primary\" href=\"/Shop/Fashion/Trends/\" target=\"_self\">Show more</a><br></p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content": {"value": "<p style=\"text-align: center;\"><a class=\"btn btn-lg btn-outline-primary\" href=\"/Shop/Fashion/Trends/\" target=\"_self\">Show more</a><br></p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
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

    private function home2(Context $context): array
    {
        return [
            [
                'id' => self::$cmsPageIds[1],
                'type' => 'landingpage',
                'locked' => 0,
                'previewMediaId' => self::$previewImages['atmos'],
                'name' => $this->translationHelper->adjustTranslations([
                    'de-DE' => 'Startseite Atmos - Set 2',
                    'en-GB' => 'Homepage Atmos - Set 2',
                ]),
                'sections' => [
                    [
                        'id' => Uuid::randomHex(),
                        'position' => 1,
                        'sizingMode' => 'full_width',
                        'type' => 'default',
                        'blocks' => [
                            [
                                'position' => 0,
                                'type' => 'zen-image-slider',
                                'locked' => 0,
                                'cssClass' => 'zen-animate slide-in-blurred-bottom',
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "0",
                                'marginBottom' => "0",
                                'marginLeft' => "0",
                                'marginRight' => "0",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'zen-image-slider',
                                        'slot' => 'imageSlider',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"axis":{"value":"horizontal","source":"static"},"mode":{"value":"carousel","source":"static"},"items":{"value":1,"source":"static"},"speed":{"value":500,"source":"static"},"gutter":{"value":0,"source":"static"},"autoplay":{"value":false,"source":"static"},"minHeight":{"value":"937px","source":"static"},"displayMode":{"value":"standard","source":"static"},"sliderItems":{"value":[{"url":"#demo-link","text":{"value":"<p style=\\"text-align: center; letter-spacing: 2px;color:#e87d00;\\">RESPONSIVE PREMIUM</p>\n<h1 style=\\"line-height: 1;\\" class=\\"display-4\\"><div style=\\"text-align: center;\\"><span style=\\"font-weight: 300; letter-spacing: 0px;\\">THEME ATMOS</span></div><div style=\\"text-align: center;\\"><span style=\\"font-weight: 300; letter-spacing: 0px;\\">SET 2</span></div></h1>\n","source":"static"},"color":"#333333","newTab":false,"mediaId":"' . self::$cmsImageIds[7] . '","overlay":false,"mediaUrl":"' . self::$cmsImageIds[7] . '","animation":"parallax-mousemove","animationIn":"slide-in-left","textMargins":false,"overlayColor":"#000000","textMaxWidth":"600px","textMinWidth":null,"textPaddings":false,"textMarginTop":"20px","overlayOpacity":"50%","textMarginLeft":"5%","textPaddingTop":"8px","backgroundColor":"transparent","textMarginRight":"5%","textPaddingLeft":"16px","textBorderRadius":false,"textMarginBottom":"20px","textPaddingRight":"16px","customItemClasses":null,"textPaddingBottom":"8px","verticalTextAlign":"center","horizontalTextAlign":"flex-start","textBorderRadiusTopLeft":"3px","textBorderRadiusTopRight":"3px","textBorderRadiusBottomLeft":"3px","textBorderRadiusBottomRight":"3px"},{"url":"#demo-link","text":{"value":"<p style=\\"text-align: center; letter-spacing: 2px;color:#e87d00;\\">RESPONSIVE PREMIUM</p>\n<h2 class=\\"display-4\\" style=\\"line-height: 1;\\"><div style=\\"text-align: center;\\"><span style=\\"font-weight: 300; letter-spacing: 0px;\\">THEME ATMOS</span></div><div style=\\"text-align: center;\\"><span style=\\"font-weight: 300; letter-spacing: 0px;\\">SET 2</span></div></h2>","source":"static"},"color":"#ffffff","newTab":false,"mediaId":"' . self::$cmsImageIds[8] . '","overlay":false,"mediaUrl":"' . self::$cmsImageIds[8] . '","animation":"parallax-mousemove","animationIn":"slide-in-left","textMargins":false,"overlayColor":"#000000","textMaxWidth":"600px","textMinWidth":null,"textPaddings":false,"textMarginTop":"20px","overlayOpacity":"50%","textMarginLeft":"5%","textPaddingTop":"8px","backgroundColor":"transparent","textMarginRight":"5%","textPaddingLeft":"16px","textBorderRadius":false,"textMarginBottom":"20px","textPaddingRight":"16px","customItemClasses":null,"textPaddingBottom":"8px","verticalTextAlign":"center","horizontalTextAlign":"flex-start","textBorderRadiusTopLeft":"3px","textBorderRadiusTopRight":"3px","textBorderRadiusBottomLeft":"3px","textBorderRadiusBottomRight":"3px"},{"url":"#demo-link","text":{"value":"<p style=\\"text-align: center; letter-spacing: 2px;color:#e87d00;\\">RESPONSIVE PREMIUM</p>\n<h2 class=\\"display-4\\" style=\\"line-height: 1;\\"><div style=\\"text-align: center;\\"><span style=\\"font-weight: 300; letter-spacing: 0px;\\">THEME ATMOS</span></div><div style=\\"text-align: center;\\"><span style=\\"font-weight: 300; letter-spacing: 0px;\\">SET 2</span></div></h2>","source":"static"},"color":"#333333","newTab":false,"mediaId":"' . self::$cmsImageIds[9] . '","overlay":false,"mediaUrl":"' . self::$cmsImageIds[9] . '","animation":"parallax-mousemove","animationIn":"slide-in-left","textMargins":false,"overlayColor":"#000000","textMaxWidth":"600px","textMinWidth":null,"textPaddings":false,"textMarginTop":"20px","overlayOpacity":"50%","textMarginLeft":"5%","textPaddingTop":"8px","backgroundColor":"transparent","textMarginRight":"5%","textPaddingLeft":"16px","textBorderRadius":false,"textMarginBottom":"20px","textPaddingRight":"16px","customItemClasses":null,"textPaddingBottom":"8px","verticalTextAlign":"center","horizontalTextAlign":"flex-start","textBorderRadiusTopLeft":"3px","textBorderRadiusTopRight":"3px","textBorderRadiusBottomLeft":"3px","textBorderRadiusBottomRight":"3px"}],"source":"static"},"customClasses":{"value":null,"source":"static"},"verticalAlign":{"value":null,"source":"static"},"navigationDots":{"value":"inside","source":"static"},"autoplayTimeout":{"value":5000,"source":"static"},"navigationArrows":{"value":"inside","source":"static"},"autoplayHoverPause":{"value":true,"source":"static"},"elementBorderRadius":{"value":false,"source":"static"},"elementBorderRadiusTopLeft":{"value":"6px","source":"static"},"elementBorderRadiusTopRight":{"value":"6px","source":"static"},"elementBorderRadiusBottomLeft":{"value":"6px","source":"static"},"elementBorderRadiusBottomRight":{"value":"6px","source":"static"}}', true)
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
                                'type' => 'product-slider',
                                'locked' => 0,
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "20px",
                                'marginBottom' => "20px",
                                'marginLeft' => "",
                                'marginRight' => "",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'product-slider',
                                        'slot' => 'productSlider',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"title": {"value": "Topseller", "source": "static"}, "border": {"value": false, "source": "static"}, "rotate": {"value": false, "source": "static"}, "products": {"value": ' . $this->limitedProducts(7) . ', "source": "static"}, "boxLayout": {"value": "image", "source": "static"}, "elMinWidth": {"value": "300px", "source": "static"}, "navigation": {"value": true, "source": "static"}, "displayMode": {"value": "contain", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "productStreamLimit": {"value": 10, "source": "static"}, "productStreamSorting": {"value": "name:ASC", "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                ]
                            ]
                        ]
                    ],
                    [
                        'id' => Uuid::randomHex(),
                        'position' => 3,
                        'sizingMode' => 'full_width',
                        'type' => 'default',
                        'blocks' => [
                            [
                                'position' => 0,
                                'type' => 'zen-text-banner',
                                'locked' => 0,
                                'cssClass' => '',
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "20px",
                                'marginBottom' => "20xp",
                                'marginLeft' => "",
                                'marginRight' => "",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'zen-text-banner',
                                        'slot' => 'content',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": null, "source": "static"}, "text": {"value": "<h2 style=\"text-align: center;font-size: 5vw\">YOUR WINE STORE</h2>", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[10] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "minHeight": {"value": "50vh", "source": "static"}, "textColor": {"value": "#ffffff", "source": "static"}, "textScale": {"value": false, "source": "static"}, "codeEditor": {"value": false, "source": "static"}, "imageHover": {"value": "none", "source": "static"}, "animationIn": {"value": "none", "source": "static"}, "displayMode": {"value": "standard", "source": "static"}, "lazyLoading": {"value": "inherit", "source": "static"}, "animationOut": {"value": "none", "source": "static"}, "isDecorative": {"value": false, "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "customClasses": {"value": null, "source": "static"}, "headlineScale": {"value": true, "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "backgroundBlur": {"value": "0px", "source": "static"}, "contentMargins": {"value": false, "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "backgroundColor": {"value": "transparent", "source": "static"}, "contentMaxWidth": {"value": "", "source": "static"}, "contentMinWidth": {"value": null, "source": "static"}, "contentPaddings": {"value": false, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "contentMarginTop": {"value": "20px", "source": "static"}, "contentMarginLeft": {"value": "20px", "source": "static"}, "contentPaddingTop": {"value": "8px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "contentMarginRight": {"value": "20px", "source": "static"}, "contentPaddingLeft": {"value": "16px", "source": "static"}, "verticalImageAlign": {"value": "center", "source": "static"}, "contentBorderRadius": {"value": false, "source": "static"}, "contentMarginBottom": {"value": "20px", "source": "static"}, "contentPaddingRight": {"value": "16px", "source": "static"}, "contentPaddingBottom": {"value": "8px", "source": "static"}, "horizontalImageAlign": {"value": "center", "source": "static"}, "verticalContentAlign": {"value": "center", "source": "static"}, "horizontalContentAlign": {"value": "center", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "contentBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "contentBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}, "contentBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "contentBorderRadiusBottomRight": {"value": "2px", "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url": {"value": null, "source": "static"}, "text": {"value": "<h2 style=\"text-align: center;font-size: 5vw\">YOUR WINE STORE</h2>", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[10] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "minHeight": {"value": "50vh", "source": "static"}, "textColor": {"value": "#ffffff", "source": "static"}, "textScale": {"value": false, "source": "static"}, "codeEditor": {"value": false, "source": "static"}, "imageHover": {"value": "none", "source": "static"}, "animationIn": {"value": "none", "source": "static"}, "displayMode": {"value": "standard", "source": "static"}, "lazyLoading": {"value": "inherit", "source": "static"}, "animationOut": {"value": "none", "source": "static"}, "isDecorative": {"value": false, "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "customClasses": {"value": null, "source": "static"}, "headlineScale": {"value": true, "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "backgroundBlur": {"value": "0px", "source": "static"}, "contentMargins": {"value": false, "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "backgroundColor": {"value": "transparent", "source": "static"}, "contentMaxWidth": {"value": "", "source": "static"}, "contentMinWidth": {"value": null, "source": "static"}, "contentPaddings": {"value": false, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "contentMarginTop": {"value": "20px", "source": "static"}, "contentMarginLeft": {"value": "20px", "source": "static"}, "contentPaddingTop": {"value": "8px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "contentMarginRight": {"value": "20px", "source": "static"}, "contentPaddingLeft": {"value": "16px", "source": "static"}, "verticalImageAlign": {"value": "center", "source": "static"}, "contentBorderRadius": {"value": false, "source": "static"}, "contentMarginBottom": {"value": "20px", "source": "static"}, "contentPaddingRight": {"value": "16px", "source": "static"}, "contentPaddingBottom": {"value": "8px", "source": "static"}, "horizontalImageAlign": {"value": "center", "source": "static"}, "verticalContentAlign": {"value": "center", "source": "static"}, "horizontalContentAlign": {"value": "center", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "contentBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "contentBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}, "contentBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "contentBorderRadiusBottomRight": {"value": "2px", "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                ]
                            ]
                        ]
                    ],
                    [
                        'id' => Uuid::randomHex(),
                        'position' => 4,
                        'sizingMode' => 'boxed',
                        'type' => 'default',
                        'blocks' => [
                            [
                                'position' => 0,
                                'type' => 'text-hero',
                                'locked' => 0,
                                'cssClass' => 'mx-auto mw-75 zen-animate slide-in-blurred-bottom',
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "100px",
                                'marginBottom' => "100px",
                                'marginLeft' => "",
                                'marginRight' => "",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'text',
                                        'slot' => 'content',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": "<h2 style=\"text-align: center; font-size: 36px;\">KOSTENLOSER VERSAND WELTWEIT</h2>\n<hr style=\"text-align: center;\">\n<p style=\"text-align: center;\">AB EINEM <b><font color=\"#a55a01\">WARENWERT</font></b> VON <b><font color=\"#a55a01\">100€</font></b></p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                ]
                            ],
                            [
                                'position' => 1,
                                'type' => 'image-text-bubble',
                                'locked' => 0,
                                'cssClass' => 'zen-animate slide-in-blurred-bottom',
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "80px",
                                'marginBottom' => "80px",
                                'marginLeft' => "",
                                'marginRight' => "",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'text',
                                        'slot' => 'left-text',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": "<div style=\"text-align: center;\"><a target=\"_self\" href=\"/demo-2/Shop/Essen-Trinken/Trinken/Rosewein/\" class=\"btn btn-outline-secondary\">Roséwein</a><br></div>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'text',
                                        'slot' => 'center-text',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": "<div style=\"text-align: center;\"><a target=\"_self\" href=\"/demo-2/Shop/Essen-Trinken/Trinken/Weisswein/\" class=\"btn btn-outline-secondary\">Weißwein</a></div>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'text',
                                        'slot' => 'right-text',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": "<div style=\"text-align: center;\"><a target=\"_self\" href=\"/demo-2/Shop/Essen-Trinken/Trinken/Rotwein/\" class=\"btn btn-outline-secondary\">Rotwein</a><br></div>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'image',
                                        'slot' => 'left-image',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "/demo-2/Shop/Essen-Trinken/Trinken/Rosewein/", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[11] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "300px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'image',
                                        'slot' => 'center-image',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "/demo-2/Shop/Essen-Trinken/Trinken/Weisswein/", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[12] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "300px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'image',
                                        'slot' => 'right-image',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "/demo-2/Shop/Essen-Trinken/Trinken/Rotwein/", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[13] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "300px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ]
                                ]
                            ],
                            [
                                'position' => 2,
                                'type' => 'text-teaser',
                                'locked' => 0,
                                'cssClass' => 'zen-animate slide-in-blurred-bottom',
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "100px ",
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
                                                'config' => json_decode('{"content": {"value": "<h2 style=\"text-align: center; font-size: 60px;\">UNSERE TOP WEINE</h2><br>\n                        <p style=\"text-align: center;\"><i>aus aller Welt</i></p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                ]
                            ],
                            [
                                'position' => 3,
                                'type' => 'product-three-column',
                                'locked' => 0,
                                'cssClass' => 'zen-animate slide-in-blurred-bottom',
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "20px",
                                'marginBottom' => "20px",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'product-box',
                                        'slot' => 'left',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"product": {"value": "' . $this->randomProduct() . '", "source": "static"}, "boxLayout": {"value": "image", "source": "static"}, "displayMode": {"value": "contain", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'product-box',
                                        'slot' => 'center',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"product": {"value": "' . $this->randomProduct() . '", "source": "static"}, "boxLayout": {"value": "image", "source": "static"}, "displayMode": {"value": "contain", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'product-box',
                                        'slot' => 'right',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"product": {"value": "' . $this->randomProduct() . '", "source": "static"}, "boxLayout": {"value": "image", "source": "static"}, "displayMode": {"value": "contain", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ]
                                ]
                            ]
                        ]
                    ],
                    [
                        'id' => Uuid::randomHex(),
                        'position' => 5,
                        'sizingMode' => 'boxed',
                        'type' => 'default',
                        'blocks' => [
                            [
                                'position' => 0,
                                'type' => 'image-text-gallery',
                                'locked' => 0,
                                'cssClass' => 'zen-animate slide-in-blurred-bottom',
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "80px",
                                'marginBottom' => "80px",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'text',
                                        'slot' => 'left-text',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": "<h2 style=\"text-align: center;\">Lorem Ipsum dolor</h2>\n                        <p style=\"text-align: center;\">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, \n                        sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, \n                        sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'text',
                                        'slot' => 'center-text',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": "<h2 style=\"text-align: center;\">Lorem Ipsum dolor</h2>\n                        <p style=\"text-align: center;\">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, \n                        sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, \n                        sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'text',
                                        'slot' => 'right-text',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": "<h2 style=\"text-align: center;\">Lorem Ipsum dolor</h2>\n                        <p style=\"text-align: center;\">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, \n                        sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, \n                        sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'image',
                                        'slot' => 'left-image',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[14] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'image',
                                        'slot' => 'center-image',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[15] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'image',
                                        'slot' => 'right-image',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[16] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
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

    private function home3(Context $context): array
    {
        return [
            [
                'id' => self::$cmsPageIds[2],
                'type' => 'landingpage',
                'locked' => 0,
                'previewMediaId' => self::$previewImages['atmos'],
                'name' => $this->translationHelper->adjustTranslations([
                    'de-DE' => 'Startseite Atmos - Set 3',
                    'en-GB' => 'Homepage Atmos - Set 3',
                ]),
                'sections' => [
                    [
                        'id' => Uuid::randomHex(),
                        'position' => 1,
                        'sizingMode' => 'full_width',
                        'type' => 'default',
                        'blocks' => [
                            [
                                'position' => 0,
                                'type' => 'zen-image-slider',
                                'locked' => 0,
                                'cssClass' => 'zen-animate fade-in-fwd',
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "0",
                                'marginBottom' => "0",
                                'marginLeft' => "0",
                                'marginRight' => "0",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'zen-image-slider',
                                        'slot' => 'imageSlider',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"axis":{"value":"horizontal","source":"static"},"loop":{"value":false,"source":"static"},"mode":{"value":"carousel","source":"static"},"items":{"value":1,"source":"static"},"speed":{"value":500,"source":"static"},"gutter":{"value":0,"source":"static"},"rewind":{"value":true,"source":"static"},"autoplay":{"value":false,"source":"static"},"minHeight":{"value":"75vh","source":"static"},"displayMode":{"value":"cover","source":"static"},"sliderItems":{"value":[{"url":"","text":{"value":"<div style=\\"text-align:center;\\">\n    <h1 class=\\"h2\\">RESPONSIVE <span style=\\"color:#e54924;\\">THEME</span> ATMOS<br />VORLAGE 3\n    </h1>\n    <a target=\\"_blank\\" href=\\"https://store.shopware.com/zenit89631739820/theme-atmos-pro-responsive-dark-light-template.html\\" class=\\"btn btn-outline-light\\" rel=\\"noreferrer noopener\\">KAUFEN</a> \n    <a target=\\"_blank\\" href=\\"https://store.shopware.com/zenit89631739820/theme-atmos-pro-responsive-dark-light-template.html\\" class=\\"btn btn-primary\\" rel=\\"noreferrer noopener\\">JETZT TESTEN</a>\n</div>","source":"static"},"color":"#ffffff","newTab":false,"mediaId":"' . self::$cmsImageIds[27] . '","overlay":true,"mediaUrl":"' . self::$cmsImageIds[27] . '","animation":"kenburns-top-right","codeEditor":false,"animationIn":"puff-in-center","textMargins":false,"overlayColor":"#333333","textMaxWidth":"1000px","textMinWidth":null,"textPaddings":false,"headlineScale":true,"textMarginTop":"20px","overlayOpacity":"50%","textMarginLeft":"5%","textPaddingTop":"8px","backgroundColor":"transparent","textMarginRight":"5%","textPaddingLeft":"16px","textBorderRadius":false,"textMarginBottom":"20px","textPaddingRight":"16px","customItemClasses":null,"textPaddingBottom":"8px","verticalTextAlign":"center","horizontalTextAlign":"center","textBorderRadiusTopLeft":"3px","textBorderRadiusTopRight":"3px","textBorderRadiusBottomLeft":"3px","textBorderRadiusBottomRight":"3px"},{"url":"","text":{"value":"<div style=\\"text-align:center;\\">\n    <h2>RESPONSIVE <span style=\\"color:#333333;\\">THEME</span> ATMOS<br />VORLAGE 3\n    </h2>\n    <a target=\\"_blank\\" href=\\"https://store.shopware.com/zenit89631739820/theme-atmos-pro-responsive-dark-light-template.html\\" class=\\"btn btn-outline-light\\" rel=\\"noreferrer noopener\\">KAUFEN</a> \n    <a target=\\"_blank\\" href=\\"https://store.shopware.com/zenit89631739820/theme-atmos-pro-responsive-dark-light-template.html\\" class=\\"btn btn-secondary\\" rel=\\"noreferrer noopener\\">JETZT TESTEN</a>\n</div>","source":"static"},"color":"#ffffff","newTab":false,"mediaId":"' . self::$cmsImageIds[28] . '","overlay":true,"mediaUrl":"' . self::$cmsImageIds[28] . '","animation":"kenburns-top-right","animationIn":"puff-in-center","textMargins":false,"overlayColor":"#e54924","textMaxWidth":"1000px","textMinWidth":null,"textPaddings":false,"headlineScale":true,"textMarginTop":"20px","overlayOpacity":"80%","textMarginLeft":"5%","textPaddingTop":"8px","backgroundColor":"transparent","textMarginRight":"5%","textPaddingLeft":"16px","textBorderRadius":false,"textMarginBottom":"20px","textPaddingRight":"16px","customItemClasses":null,"textPaddingBottom":"8px","verticalTextAlign":"center","horizontalTextAlign":"center","textBorderRadiusTopLeft":"3px","textBorderRadiusTopRight":"3px","textBorderRadiusBottomLeft":"3px","textBorderRadiusBottomRight":"3px"},{"url":"","text":{"value":"<div style=\\"text-align:center;\\">\n    <h2>RESPONSIVE <span style=\\"color:#e54924;\\">THEME</span> ATMOS<br />VORLAGE 3\n    </h2>\n    <a target=\\"_blank\\" href=\\"https://store.shopware.com/zenit89631739820/theme-atmos-pro-responsive-dark-light-template.html\\" class=\\"btn btn-outline-light\\" rel=\\"noreferrer noopener\\">KAUFEN</a>\n    <a target=\\"_blank\\" href=\\"https://store.shopware.com/zenit89631739820/theme-atmos-pro-responsive-dark-light-template.html\\" class=\\"btn btn-primary\\" rel=\\"noreferrer noopener\\">JETZT TESTEN</a>\n</div>","source":"static"},"color":"#ffffff","newTab":false,"mediaId":"' . self::$cmsImageIds[29] . '","overlay":true,"mediaUrl":"' . self::$cmsImageIds[29] . '","animation":"kenburns-top-right","animationIn":"puff-in-center","textMargins":false,"overlayColor":"#000000","textMaxWidth":"1000px","textMinWidth":null,"textPaddings":false,"headlineScale":true,"textMarginTop":"20px","overlayOpacity":"50%","textMarginLeft":"5%","textPaddingTop":"8px","backgroundColor":"transparent","textMarginRight":"5%","textPaddingLeft":"16px","textBorderRadius":false,"textMarginBottom":"20px","textPaddingRight":"16px","customItemClasses":null,"textPaddingBottom":"8px","verticalTextAlign":"center","horizontalTextAlign":"center","textBorderRadiusTopLeft":"3px","textBorderRadiusTopRight":"3px","textBorderRadiusBottomLeft":"3px","textBorderRadiusBottomRight":"3px"}],"source":"static"},"customClasses":{"value":null,"source":"static"},"verticalAlign":{"value":null,"source":"static"},"navigationDots":{"value":null,"source":"static"},"autoplayTimeout":{"value":5000,"source":"static"},"horizontalAlign":{"value":null,"source":"static"},"navigationArrows":{"value":"inside","source":"static"},"autoplayHoverPause":{"value":true,"source":"static"},"elementBorderRadius":{"value":false,"source":"static"},"elementBorderRadiusTopLeft":{"value":"6px","source":"static"},"elementBorderRadiusTopRight":{"value":"6px","source":"static"},"elementBorderRadiusBottomLeft":{"value":"6px","source":"static"},"elementBorderRadiusBottomRight":{"value":"6px","source":"static"}}', true)
                                            ]
                                        ])
                                    ],
                                ]
                            ],
                            [
                                'position' => 1,
                                'type' => 'image-three-cover',
                                'locked' => 0,
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "",
                                'marginBottom' => "",
                                'marginLeft' => "",
                                'marginRight' => "",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'zen-teaser',
                                        'slot' => 'left',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "/demo-3/Shop/Sports/Fitnessgeraete/", "source": "static"}, "text": {"value": "Sportgeräte", "source": "static"}, "color": {"value": "#ffffff", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[30] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "16px", "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "none", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "700", "source": "static"}, "imageHover": {"value": "zoom", "source": "static"}, "animationIn": {"value": "none", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "none", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "300px", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": true, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "8px", "source": "static"}, "backgroundColor": {"value": "#333333bf", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "16px", "source": "static"}, "textBorderRadius": {"value": true, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "16px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "textPaddingBottom": {"value": "8px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": null, "source": "static"}, "horizontalTextAlign": {"value": "center", "source": "static"}, "horizontalImageAlign": {"value": null, "source": "static"}, "textBorderRadiusTopLeft": {"value": "20px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "textBorderRadiusTopRight": {"value": "20px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "20px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "20px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'zen-teaser',
                                        'slot' => 'center',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "/demo-3/Shop/Sports/Damen/", "source": "static"}, "text": {"value": "Sportbekleidung", "source": "static"}, "color": {"value": "#ffffff", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[31] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "16px", "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "none", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "700", "source": "static"}, "imageHover": {"value": "zoom", "source": "static"}, "animationIn": {"value": "none", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "none", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "300px", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": false, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "8px", "source": "static"}, "backgroundColor": {"value": "#e54b24bf", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "16px", "source": "static"}, "textBorderRadius": {"value": true, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "16px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "textPaddingBottom": {"value": "8px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": null, "source": "static"}, "horizontalTextAlign": {"value": "center", "source": "static"}, "horizontalImageAlign": {"value": null, "source": "static"}, "textBorderRadiusTopLeft": {"value": "20px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "textBorderRadiusTopRight": {"value": "20px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "20px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "20px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'zen-teaser',
                                        'slot' => 'right',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "/demo-3/Shop/Sports/Fitnessgeraete/Zubehoer/", "source": "static"}, "text": {"value": "Zubehör", "source": "static"}, "color": {"value": "#ffffff", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[32] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "16px", "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "none", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "700", "source": "static"}, "imageHover": {"value": "zoom", "source": "static"}, "animationIn": {"value": "none", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "none", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "300px", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": false, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "8px", "source": "static"}, "backgroundColor": {"value": "#333333bf", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "16px", "source": "static"}, "textBorderRadius": {"value": true, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "16px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "textPaddingBottom": {"value": "8px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": null, "source": "static"}, "horizontalTextAlign": {"value": "center", "source": "static"}, "horizontalImageAlign": {"value": null, "source": "static"}, "textBorderRadiusTopLeft": {"value": "20px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "textBorderRadiusTopRight": {"value": "20px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "20px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "20px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
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
                                'type' => 'product-slider',
                                'locked' => 0,
                                'cssClass' => 'zen-animate fade-in-fwd',
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "40px",
                                'marginBottom' => "40px",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'product-slider',
                                        'slot' => 'productSlider',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"title": {"value": "Topseller", "source": "static"}, "border": {"value": false, "source": "static"}, "rotate": {"value": false, "source": "static"}, "products": {"value": ' . $this->limitedProducts(7) . ', "source": "static"}, "boxLayout": {"value": "minimal", "source": "static"}, "elMinWidth": {"value": "300px", "source": "static"}, "navigation": {"value": true, "source": "static"}, "displayMode": {"value": "contain", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "productStreamLimit": {"value": 10, "source": "static"}, "productStreamSorting": {"value": "name:ASC", "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                ]
                            ],
                            [
                                'position' => 1,
                                'type' => 'text-hero',
                                'locked' => 0,
                                'cssClass' => 'zen-animate fade-in-fwd',
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "20px",
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
                                                'config' => json_decode('{"content": {"value": "<h2 style=\"text-align: center;\">Lorem Ipsum dolor sit amet</h2>\n                        <hr>\n                        <p style=\"text-align: center;\">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, \n                        sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, \n                        sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. \n                        Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                ]
                            ],
                            [
                                'position' => 2,
                                'type' => 'image-text-bubble',
                                'locked' => 0,
                                'cssClass' => 'zen-animate fade-in-fwd',
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "80px",
                                'marginBottom' => "80px",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'text',
                                        'slot' => 'left-text',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": "<div style=\"text-align: center;\"><a target=\"_self\" href=\"/demo-3/Shop/Sports/Fitnessgeraete/Zubehoer/\" class=\"btn btn-secondary\">Zubehör</a><br></div>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'text',
                                        'slot' => 'center-text',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": "<div style=\"text-align: center;\"><a target=\"_self\" href=\"/demo-3/Shop/Sports/Damen/\" class=\"btn btn-secondary\">Damen</a></div>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'text',
                                        'slot' => 'right-text',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": "<div style=\"text-align: center;\"><a target=\"_self\" href=\"/demo-3/Shop/Sports/Herren/\" class=\"btn btn-secondary\">Herren</a><br></div>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'image',
                                        'slot' => 'left-image',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "/demo-3/Shop/Sports/Fitnessgeraete/Zubehoer/", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[33] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "300px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'image',
                                        'slot' => 'center-image',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "/demo-3/Shop/Sports/Damen/", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[34] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "300px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'image',
                                        'slot' => 'right-image',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "/demo-3/Shop/Sports/Herren/", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[35] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "300px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ]
                                ]
                            ]
                        ]
                    ],
                    [
                        'id' => Uuid::randomHex(),
                        'position' => 3,
                        'sizingMode' => 'full_width',
                        'type' => 'default',
                        'blocks' => [
                            [
                                'position' => 0,
                                'type' => 'text-on-image',
                                'locked' => 0,
                                'cssClass' => 'text-on-image',
                                'backgroundMediaId' =>  self::$cmsImageIds[36],
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "300px",
                                'marginBottom' => "300px",
                                'marginLeft' => "20px",
                                'marginRight' => "20px",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'text',
                                        'slot' => 'content',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": "<h2 style=\"text-align: center; font-size: 100px; font-weight: 800;\">#staystrong</h2>", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                ]
                            ]
                        ]
                    ],
                    [
                        'id' => Uuid::randomHex(),
                        'position' => 4,
                        'sizingMode' => 'boxed',
                        'type' => 'default',
                        'blocks' => [
                            [
                                'position' => 0,
                                'type' => 'image-text-gallery',
                                'locked' => 0,
                                'cssClass' => 'zen-animate fade-in-fwd',
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "80px",
                                'marginBottom' => "80px",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'text',
                                        'slot' => 'left-text',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": "<h2 style=\"text-align: center;\">Lorem Ipsum dolor</h2>\n                        <p style=\"text-align: center;\">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, \n                        sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, \n                        sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'text',
                                        'slot' => 'center-text',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": "<h2 style=\"text-align: center;\">Lorem Ipsum dolor</h2>\n                        <p style=\"text-align: center;\">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, \n                        sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, \n                        sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'text',
                                        'slot' => 'right-text',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": "<h2 style=\"text-align: center;\">Lorem Ipsum dolor</h2>\n                        <p style=\"text-align: center;\">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, \n                        sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, \n                        sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'image',
                                        'slot' => 'left-image',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[37] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'image',
                                        'slot' => 'center-image',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[38] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'image',
                                        'slot' => 'right-image',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[39] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
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

    private function home4(Context $context): array
    {
        return [
            [
                'id' => self::$cmsPageIds[3],
                'type' => 'landingpage',
                'locked' => 0,
                'previewMediaId' => self::$previewImages['atmos'],
                'name' => $this->translationHelper->adjustTranslations([
                    'de-DE' => 'Startseite Atmos - Set 4',
                    'en-GB' => 'Homepage Atmos - Set 4',
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
                                'type' => 'zen-image-slider',
                                'locked' => 0,
                                'cssClass' => 'zen-animate fade-in-top',
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "0",
                                'marginBottom' => "0",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'zen-image-slider',
                                        'slot' => 'imageSlider',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"axis":{"value":"horizontal","source":"static"},"loop":{"value":false,"source":"static"},"mode":{"value":"carousel","source":"static"},"items":{"value":1,"source":"static"},"speed":{"value":500,"source":"static"},"gutter":{"value":0,"source":"static"},"rewind":{"value":true,"source":"static"},"itemsLG":{"value":1,"source":"static"},"itemsMD":{"value":1,"source":"static"},"itemsSM":{"value":1,"source":"static"},"itemsXL":{"value":1,"source":"static"},"itemsXS":{"value":1,"source":"static"},"autoplay":{"value":false,"source":"static"},"minHeight":{"value":"50vh","source":"static"},"displayMode":{"value":"cover","source":"static"},"edgePadding":{"value":false,"source":"static"},"sliderItems":{"value":[{"url":"https://store.shopware.com/en/zenit89631739820/atmos-pro-responsive-premium-theme.html","text":{"value":"<div class=\"lead\">Atmos Set 4</div>\n<h4>Handcrafted<br> Design</h4>\n<a href=\"#demo-link\" class=\"btn btn-primary\">Shop now</a>","source":"static"},"color":"var(--ze-text-color)","newTab":false,"mediaId":"' . self::$cmsImageIds[17] . '","overlay":false,"mediaUrl":"https://stratus.zenit.design/media/47/c1/2a/1650368062/atmos-demo-4-slider-1.jpg","animation":"kenburns-bottom-left","animationIn":"slide-in-bottom","textMargins":true,"overlayColor":"#000000","textMaxWidth":"600px","textMinWidth":null,"textPaddings":false,"headlineScale":true,"textMarginTop":"20px","overlayOpacity":"50%","textMarginLeft":"10%","textPaddingTop":"8px","backgroundColor":"transparent","textMarginRight":"5%","textPaddingLeft":"16px","textBorderRadius":false,"textMarginBottom":"20px","textPaddingRight":"16px","customItemClasses":null,"textPaddingBottom":"8px","verticalTextAlign":"center","horizontalTextAlign":"flex-start","textBorderRadiusTopLeft":"3px","textBorderRadiusTopRight":"3px","textBorderRadiusBottomLeft":"3px","textBorderRadiusBottomRight":"3px"},{"url":"https://store.shopware.com/en/zenit89631739820/atmos-pro-responsive-premium-theme.html","text":{"value":"<div class=\"lead\">Atmos Set 4</div>\n<h4>Handcrafted<br> Design</h4>\n<a href=\"#demo-link\" class=\"btn btn-primary\">Shop now</a>","source":"static"},"color":"var(--ze-text-color)","newTab":false,"mediaId":"' . self::$cmsImageIds[18] . '","overlay":false,"mediaUrl":"https://stratus.zenit.design/media/77/ea/bb/1650368062/atmos-demo-4-slider-2.jpg","animation":"kenburns-top-right","animationIn":"slide-in-bottom","textMargins":true,"overlayColor":"#000000","textMaxWidth":"600px","textMinWidth":null,"textPaddings":false,"headlineScale":true,"textMarginTop":"20px","overlayOpacity":"50%","textMarginLeft":"10%","textPaddingTop":"8px","backgroundColor":"transparent","textMarginRight":"5%","textPaddingLeft":"16px","textBorderRadius":false,"textMarginBottom":"20px","textPaddingRight":"16px","customItemClasses":null,"textPaddingBottom":"8px","verticalTextAlign":"center","horizontalTextAlign":"flex-start","textBorderRadiusTopLeft":"3px","textBorderRadiusTopRight":"3px","textBorderRadiusBottomLeft":"3px","textBorderRadiusBottomRight":"3px"},{"url":"https://store.shopware.com/en/zenit89631739820/atmos-pro-responsive-premium-theme.html","text":{"value":"<div class=\"lead\">Atmos Set 4</div>\n<h4>Handcrafted<br> Design</h4>\n<a href=\"#demo-link\" class=\"btn btn-primary\">Shop now</a>","source":"static"},"color":"var(--ze-text-color)","newTab":false,"mediaId":"' . self::$cmsImageIds[19] . '","overlay":false,"mediaUrl":"https://stratus.zenit.design/media/84/32/15/1650368062/atmos-demo-4-slider-3.jpg","animation":"zoom","animationIn":"slide-in-bottom","textMargins":true,"overlayColor":"#000000","textMaxWidth":"600px","textMinWidth":null,"textPaddings":false,"headlineScale":true,"textMarginTop":"20px","overlayOpacity":"50%","textMarginLeft":"10%","textPaddingTop":"8px","backgroundColor":"transparent","textMarginRight":"5%","textPaddingLeft":"16px","textBorderRadius":false,"textMarginBottom":"20px","textPaddingRight":"16px","customItemClasses":null,"textPaddingBottom":"8px","verticalTextAlign":"center","horizontalTextAlign":"flex-end","textBorderRadiusTopLeft":"3px","textBorderRadiusTopRight":"3px","textBorderRadiusBottomLeft":"3px","textBorderRadiusBottomRight":"3px"}],"source":"static"},"customClasses":{"value":null,"source":"static"},"edgePaddingLG":{"value":0,"source":"static"},"edgePaddingMD":{"value":0,"source":"static"},"edgePaddingSM":{"value":0,"source":"static"},"edgePaddingXL":{"value":0,"source":"static"},"edgePaddingXS":{"value":0,"source":"static"},"multipleItems":{"value":false,"source":"static"},"verticalAlign":{"value":null,"source":"static"},"edgePaddingXXL":{"value":0,"source":"static"},"navigationDots":{"value":"inside","source":"static"},"autoplayTimeout":{"value":5000,"source":"static"},"horizontalAlign":{"value":null,"source":"static"},"navigationArrows":{"value":"inside","source":"static"},"autoplayHoverPause":{"value":true,"source":"static"},"elementBorderRadius":{"value":false,"source":"static"},"elementBorderRadiusTopLeft":{"value":"6px","source":"static"},"elementBorderRadiusTopRight":{"value":"6px","source":"static"},"elementBorderRadiusBottomLeft":{"value":"6px","source":"static"},"elementBorderRadiusBottomRight":{"value":"6px","source":"static"}}', true)
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
                                'type' => 'zen-features',
                                'locked' => 0,
                                'cssClass' => 'zen-animate fade-in-top',
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "",
                                'marginBottom' => "4vh",
                                'marginLeft' => "",
                                'marginRight' => "",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'zen-features',
                                        'slot' => 'content',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"feature1": {"value": "Handcrafted Designs", "source": "static"}, "feature2": {"value": "30 Tage Kostenlos testen", "source": "static"}, "feature3": {"value": "Höchste Kompatibilität", "source": "static"}, "feature4": {"value": "Viele Demos verfügbar", "source": "static"}, "fontSize": {"value": "16px", "source": "static"}, "iconSize": {"value": "28px", "source": "static"}, "alignment": {"value": "center", "source": "static"}, "iconColor": {"value": "var(--zen-text-color)", "source": "static"}, "textColor": {"value": "var(--zen-text-color)", "source": "static"}, "appearance": {"value": "iconsTop", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "400", "source": "static"}, "feature1Icon": {"value": "sparkles", "source": "static"}, "feature2Icon": {"value": "history", "source": "static"}, "feature3Icon": {"value": "code", "source": "static"}, "feature4Icon": {"value": "variants", "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textAlignment": {"value": "center", "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"feature1": {"value": "Handcrafted Designs", "source": "static"}, "feature2": {"value": "30-day free trial", "source": "static"}, "feature3": {"value": "Highest compatibility", "source": "static"}, "feature4": {"value": "Many demos available", "source": "static"}, "fontSize": {"value": "16px", "source": "static"}, "iconSize": {"value": "28px", "source": "static"}, "alignment": {"value": "center", "source": "static"}, "iconColor": {"value": "var(--zen-text-color)", "source": "static"}, "textColor": {"value": "var(--zen-text-color)", "source": "static"}, "appearance": {"value": "iconsTop", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "400", "source": "static"}, "feature1Icon": {"value": "sparkles", "source": "static"}, "feature2Icon": {"value": "history", "source": "static"}, "feature3Icon": {"value": "code", "source": "static"}, "feature4Icon": {"value": "variants", "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textAlignment": {"value": "center", "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                ]
                            ],
                            [
                                'position' => 1,
                                'type' => 'product-slider',
                                'locked' => 0,
                                'cssClass' => 'zen-animate fade-in-top',
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "20px",
                                'marginBottom' => "20px",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'product-slider',
                                        'slot' => 'productSlider',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"speed": {"value": 300, "source": "static"}, "title": {"value": "Topseller", "source": "static"}, "border": {"value": false, "source": "static"}, "rotate": {"value": false, "source": "static"}, "products": {"value": ' . $this->limitedProducts(7) . ', "source": "static"}, "boxLayout": {"value": "standard", "source": "static"}, "elMinWidth": {"value": "300px", "source": "static"}, "displayMode": {"value": "standard", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "autoplayTimeout": {"value": 5000, "source": "static"}, "navigationArrows": {"value": "outside", "source": "static"}, "productStreamLimit": {"value": 10, "source": "static"}, "productStreamSorting": {"value": "name:ASC", "source": "static"}}', true)
                                            ],
                                        ])
                                    ],
                                ]
                            ]
                        ]
                    ],
                    [
                        'id' => Uuid::randomHex(),
                        'position' => 3,
                        'sizingMode' => 'boxed',
                        'type' => 'default',
                        'blocks' => [
                            [
                                'position' => 0,
                                'type' => 'zen-layout-simple-teaser',
                                'locked' => 0,
                                'cssClass' => 'zen-animate fade-in-top',
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "20px",
                                'marginBottom' => "20px",
                                'marginLeft' => "",
                                'marginRight' => "",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'zen-teaser',
                                        'slot' => 'left-top',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "Polstermöbel", "source": "static"}, "color": {"value": "var(--zen-text-color)", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[20] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "16px", "source": "static"}, "minHeight": {"value": "360px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "show-arrow", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "400", "source": "static"}, "imageHover": {"value": "zoom", "source": "static"}, "animationIn": {"value": "none", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "lazyLoading": {"value": "inherit", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "none", "source": "static"}, "isDecorative": {"value": false, "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "300px", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": false, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "backgroundBlur": {"value": "0px", "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "8px", "source": "static"}, "backgroundColor": {"value": "#ffffff", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "16px", "source": "static"}, "textBorderRadius": {"value": false, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "16px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "textPaddingBottom": {"value": "8px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": "center", "source": "static"}, "horizontalTextAlign": {"value": "center", "source": "static"}, "horizontalImageAlign": {"value": "center", "source": "static"}, "textBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "textBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "Upholstery", "source": "static"}, "color": {"value": "var(--zen-text-color)", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[20] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "16px", "source": "static"}, "minHeight": {"value": "360px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "show-arrow", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "400", "source": "static"}, "imageHover": {"value": "zoom", "source": "static"}, "animationIn": {"value": "none", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "lazyLoading": {"value": "inherit", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "none", "source": "static"}, "isDecorative": {"value": false, "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "300px", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": false, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "backgroundBlur": {"value": "0px", "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "8px", "source": "static"}, "backgroundColor": {"value": "#ffffff", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "16px", "source": "static"}, "textBorderRadius": {"value": false, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "16px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "textPaddingBottom": {"value": "8px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": "center", "source": "static"}, "horizontalTextAlign": {"value": "center", "source": "static"}, "horizontalImageAlign": {"value": "center", "source": "static"}, "textBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "textBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'zen-teaser',
                                        'slot' => 'left-bottom',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "Beistelltische", "source": "static"}, "color": {"value": "var(--zen-text-color)", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[21] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "16px", "source": "static"}, "minHeight": {"value": "460px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "show-arrow", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "400", "source": "static"}, "imageHover": {"value": "zoom", "source": "static"}, "animationIn": {"value": "none", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "lazyLoading": {"value": "inherit", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "none", "source": "static"}, "isDecorative": {"value": false, "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "300px", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": false, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "backgroundBlur": {"value": "0px", "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "8px", "source": "static"}, "backgroundColor": {"value": "#ffffff", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "16px", "source": "static"}, "textBorderRadius": {"value": false, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "16px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "textPaddingBottom": {"value": "8px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": "center", "source": "static"}, "horizontalTextAlign": {"value": "center", "source": "static"}, "horizontalImageAlign": {"value": "center", "source": "static"}, "textBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "textBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "Side tables", "source": "static"}, "color": {"value": "var(--zen-text-color)", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[21] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "16px", "source": "static"}, "minHeight": {"value": "460px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "show-arrow", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "400", "source": "static"}, "imageHover": {"value": "zoom", "source": "static"}, "animationIn": {"value": "none", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "lazyLoading": {"value": "inherit", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "none", "source": "static"}, "isDecorative": {"value": false, "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "300px", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": false, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "backgroundBlur": {"value": "0px", "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "8px", "source": "static"}, "backgroundColor": {"value": "#ffffff", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "16px", "source": "static"}, "textBorderRadius": {"value": false, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "16px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "textPaddingBottom": {"value": "8px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": "center", "source": "static"}, "horizontalTextAlign": {"value": "center", "source": "static"}, "horizontalImageAlign": {"value": "center", "source": "static"}, "textBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "textBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'zen-teaser',
                                        'slot' => 'right',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "Lampen", "source": "static"}, "color": {"value": "var(--zen-text-color)", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[22] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "16px", "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "show-arrow", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "400", "source": "static"}, "imageHover": {"value": "zoom", "source": "static"}, "animationIn": {"value": "none", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "lazyLoading": {"value": "inherit", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "none", "source": "static"}, "isDecorative": {"value": false, "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "300px", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": false, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "backgroundBlur": {"value": "0px", "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "8px", "source": "static"}, "backgroundColor": {"value": "#ffffff", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "16px", "source": "static"}, "textBorderRadius": {"value": false, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "16px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "textPaddingBottom": {"value": "8px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": "center", "source": "static"}, "horizontalTextAlign": {"value": "center", "source": "static"}, "horizontalImageAlign": {"value": "center", "source": "static"}, "textBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "textBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "Lamps", "source": "static"}, "color": {"value": "var(--zen-text-color)", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[22] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "16px", "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "show-arrow", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "400", "source": "static"}, "imageHover": {"value": "zoom", "source": "static"}, "animationIn": {"value": "none", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "lazyLoading": {"value": "inherit", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "none", "source": "static"}, "isDecorative": {"value": false, "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "300px", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": false, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "backgroundBlur": {"value": "0px", "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "8px", "source": "static"}, "backgroundColor": {"value": "#ffffff", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "16px", "source": "static"}, "textBorderRadius": {"value": false, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "16px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "textPaddingBottom": {"value": "8px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": "center", "source": "static"}, "horizontalTextAlign": {"value": "center", "source": "static"}, "horizontalImageAlign": {"value": "center", "source": "static"}, "textBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "textBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
                                            ]
                                        ])
                                    ]
                                ]
                            ],
                            [
                                'position' => 1,
                                'type' => 'zen-teaser-grid-12',
                                'locked' => 0,
                                'cssClass' => 'zen-animate fade-in-top',
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "20px",
                                'marginBottom' => "20px",
                                'marginLeft' => "",
                                'marginRight' => "",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'zen-teaser',
                                        'slot' => 'col-1',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "Tische", "source": "static"}, "color": {"value": "var(--zen-text-color)", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[23] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "16px", "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "show-arrow", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "400", "source": "static"}, "imageHover": {"value": "none", "source": "static"}, "animationIn": {"value": "none", "source": "static"}, "displayMode": {"value": "standard", "source": "static"}, "lazyLoading": {"value": "inherit", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "none", "source": "static"}, "isDecorative": {"value": false, "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "300px", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": false, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "backgroundBlur": {"value": "0px", "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "8px", "source": "static"}, "backgroundColor": {"value": "#ffffff", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "16px", "source": "static"}, "textBorderRadius": {"value": false, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "16px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "textPaddingBottom": {"value": "8px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": "center", "source": "static"}, "horizontalTextAlign": {"value": "center", "source": "static"}, "horizontalImageAlign": {"value": "center", "source": "static"}, "textBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "textBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "Tables", "source": "static"}, "color": {"value": "var(--zen-text-color)", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[23] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "16px", "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "show-arrow", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "400", "source": "static"}, "imageHover": {"value": "none", "source": "static"}, "animationIn": {"value": "none", "source": "static"}, "displayMode": {"value": "standard", "source": "static"}, "lazyLoading": {"value": "inherit", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "none", "source": "static"}, "isDecorative": {"value": false, "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "300px", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": false, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "backgroundBlur": {"value": "0px", "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "8px", "source": "static"}, "backgroundColor": {"value": "#ffffff", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "16px", "source": "static"}, "textBorderRadius": {"value": false, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "16px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "textPaddingBottom": {"value": "8px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": "center", "source": "static"}, "horizontalTextAlign": {"value": "center", "source": "static"}, "horizontalImageAlign": {"value": "center", "source": "static"}, "textBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "textBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
                                            ]
                                        ])
                                    ]
                                ]
                            ],
                            [
                                'position' => 2,
                                'type' => 'product-slider',
                                'locked' => 0,
                                'cssClass' => 'zen-animate fade-in-top',
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "20px",
                                'marginBottom' => "20px",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'product-slider',
                                        'slot' => 'productSlider',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"speed": {"value": 300, "source": "static"}, "title": {"value": "New Arrivals", "source": "static"}, "border": {"value": false, "source": "static"}, "rotate": {"value": false, "source": "static"}, "products": {"value": ' . $this->limitedProducts(7) . ', "source": "static"}, "boxLayout": {"value": "standard", "source": "static"}, "elMinWidth": {"value": "300px", "source": "static"}, "displayMode": {"value": "standard", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "autoplayTimeout": {"value": 5000, "source": "static"}, "navigationArrows": {"value": "outside", "source": "static"}, "productStreamLimit": {"value": 10, "source": "static"}, "productStreamSorting": {"value": "name:ASC", "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"speed": {"value": 300, "source": "static"}, "title": {"value": "New Arrivals", "source": "static"}, "border": {"value": false, "source": "static"}, "rotate": {"value": false, "source": "static"}, "products": {"value": ' . $this->limitedProducts(7) . ', "source": "static"}, "boxLayout": {"value": "standard", "source": "static"}, "elMinWidth": {"value": "300px", "source": "static"}, "displayMode": {"value": "standard", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "autoplayTimeout": {"value": 5000, "source": "static"}, "navigationArrows": {"value": "outside", "source": "static"}, "productStreamLimit": {"value": 10, "source": "static"}, "productStreamSorting": {"value": "name:ASC", "source": "static"}}', true)
                                            ]
                                        ])
                                    ]
                                ]
                            ],
                            [
                                'position' => 3,
                                'type' => 'image-text-gallery',
                                'locked' => 0,
                                'cssClass' => 'zen-animate fade-in-top',
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "20px",
                                'marginBottom' => "40px",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'text',
                                        'slot' => 'left-text',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": "<h2>Entdecke die Vielfalt von hunderten Holzsorten</h2>\n                        <p>Erfahre, warum Eiche für ihre Robustheit geschätzt wird, wie das exotische Mahagoni Eleganz verleiht und welche anderen Holzarten für Möbelbau und Inneneinrichtung ideal sind. Entdecke ihre einzigartigen Eigenschaften und lass dich inspirieren, wie du sie in deinem Zuhause nutzen kannst.</p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content": {"value": "<h2>Explore the diversity of hundreds of wood types</h2>\n                        <p>Discover why oak is valued for its robustness, how exotic mahogany adds elegance, and which other wood types are ideal for furniture making and interior design. Explore their unique properties and get inspired on how to incorporate them into your home.</p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'text',
                                        'slot' => 'right-text',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": "<h2>Raumgestaltung leicht gemacht: Tipps für jeden Wohnbereich</h2>\n                        <p>Von der Auswahl der richtigen Farbpalette bis zur optimalen Möbelanordnung - finde Inspirationen, um deine Räume funktionaler und ästhetisch ansprechender zu gestalten.</p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content": {"value": "<h2>Interior Design Made Easy: Tips for Every Living Space</h2>\n                        <p>From selecting the right color palette to arranging furniture optimally, find inspirations to make your spaces more functional and aesthetically pleasing.</p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'text',
                                        'slot' => 'center-text',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": "<h2>Gestalte dein Esszimmer: Ideen für Stil und Funktionalität</h2>\n                        <p>Erfahre, wie du dein Esszimmer zu einem einladenden und funktionalen Raum gestalten kannst. Von eleganten Tischarrangements bis hin zu praktischen Aufbewahrungslösungen - entdecke Tipps und Inspirationen.</p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content": {"value": "<h2>Design Your Dining Room: Ideas for Style and Functionality</h2>\n                        <p>Discover how to transform your dining room into an inviting and functional space. From elegant table arrangements to practical storage solutions, explore tips and inspiration to enhance your dining experience.</p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'image',
                                        'slot' => 'left-image',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[24] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "280px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "isDecorative": {"value": false, "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[24] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "280px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "isDecorative": {"value": false, "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'image',
                                        'slot' => 'center-image',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[25] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "280px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "isDecorative": {"value": false, "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[25] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "280px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "isDecorative": {"value": false, "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'image',
                                        'slot' => 'right-image',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[26] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "280px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "isDecorative": {"value": false, "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[26] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "280px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "isDecorative": {"value": false, "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
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
}