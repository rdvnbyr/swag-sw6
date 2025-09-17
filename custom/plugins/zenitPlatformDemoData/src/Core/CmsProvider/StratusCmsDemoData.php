<?php declare(strict_types=1);

namespace zenit\PlatformDemoData\Core\CmsProvider;

use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\Uuid\Uuid;
use zenit\PlatformDemoData\Core\AbstractCmsDemoData;

/**
 * @extends AbstractCmsDemoData
 *
 */
class StratusCmsDemoData extends AbstractCmsDemoData
{
    /**
     * Method that returns the Layout Ids
     *
     * @return array
     *
     */
    public static array $cmsPageIds = [
        'bd3f0d59a32443ddba5073db93d13187',
        '3ce1fdfa201f4167abaa8be951df2db6',
        'a2b60a96ad0a4534a5df794f1e5b5cd9',
        '2772db95dc6b41b8a7891f090030a036',
    ];

    /**
     * Method that returns the Image Ids
     *
     * @return array
     *
     */
    public static array $cmsImageIds = [
        '99f6345c1bb345008bcadb3d084400c0',
        'd87c0be7963049888caaea93703ef86f',
        '16e4a3aebc08474ca598b3e6051f0a2d',
        'c8acc14fd4f84e3fa21a34e008fab2bf',
        '706a3001205541edb6c730653779d099',
        'b27037f173a740b09fbc4e3d8595a3ef',
        'acc6f176eee74303a8492850e1cd907d',
        '6ca37aded5704b90874c6b61aa87ffa5',
        '7b3cee6a4cc946cb9857856b84124ba2',
        '5ef2d75221ac461f9eb7c496627bc354',
        '73fd67aaa27c47b280aa163b3f67be93',
        '03eea897b6fa457ebe7373999ec40bac',
        'b4f2df7bc2d640e188522009289bfbf2',
        'cbd611683ec841d787b46231d404fc22',
        '5ea6862f151944fd84b39f1f5f6fd980',
        '2f5a8de49f7e420c9b8a00d1f40d5236',
        '004baa96998a435eb39cd574f2c45630',
        '248dde1aec264589b7efe2db06bc6243',
        'd35f4ce2787548ac94b79d68b4165caa',
        'fdb42579acb641da9f174b1275790807',
        'd31e0753c8ec43008c37c9c5dbcc3964',
        '4d5682188d4f41539669192237866051',
        'b061d97be48a49939309556a58f5d530',
        'd0f43f17d10143c281d382cb63d06083',
        '3916ae0af1de4c1699e0c6e9fabaf6f3',
        'fd8e1c4751874ae2a495a24984a6a7be',
        'e48980b0201c424dbfa36da1bf9a7733',
        '0c7e1b85005146989fbd99cc6dd84572',
        '60f4b562a1c0427090ef49120b491d71',
        '8186f364ffad477f9434531291ad08e1',
        '68d14607b3774cec810e63d6456ee369',
        '2528ca25f06a43cca3c0aa93b8ec06c4',
        '927023a788ae47d0a59b842921930981',
        '10bb3eda6e474a2b818fe69bbd2f11eb',
        '2d764631a97d434aaba2bb5283e05be1',
        'ce28c503711543dabc45e71895840ab2',
        '38c84c6409404a4db1062b04083ce41f',
        '3ef5c3e781954b0c9329c82bd9003573',
        'b35d40dc33cd46eebc58c5ce15b5a594',
        'eb9880c761344932991a7a80e32d7d96',
        '80a4816a08c144479639f6b4afb95841',
        'b5b58d1b751d49f7a556b18db07c3ae2',
        'dcda85a0337942dea1aa56771cb71260',
        '52605244ebf94b4fb97945ab1d28ac38',
        '0bc2e46feb204f87b0641bf1dc88084f',
        '9f6eddec3735418f8a3899d9c5410d53',
        '57e5faca2d464efa9e3f556a006249fe',
        '7be934a266bc446c9cb6ed81ef76ebf9',
        '4c2185de0d61406f8e8ec580f5722c26',
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
        foreach (array_merge(self::$cmsImageIds, [self::$previewImages['stratus']]) as $imageId) {
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
        foreach (array_merge(self::$cmsImageIds, [self::$previewImages['stratus']]) as $imageId) {
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
                'previewMediaId' => self::$previewImages['stratus'],
                'name' => $this->translationHelper->adjustTranslations([
                    'de-DE' => 'Startseite Stratus - Set 1',
                    'en-GB' => 'Homepage Stratus - Set 1',
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
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "0",
                                'marginBottom' => "80px",
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
                                                'config' => json_decode('{"axis": {"value": "horizontal", "source": "static"}, "loop": {"value": false, "source": "static"}, "mode": {"value": "carousel", "source": "static"}, "items": {"value": 1, "source": "static"}, "speed": {"value": 500, "source": "static"}, "gutter": {"value": 0, "source": "static"}, "rewind": {"value": true, "source": "static"}, "autoplay": {"value": true, "source": "static"}, "minHeight": {"value": "55vh", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "sliderItems": {"value": [{"url": "#demo-link", "text": {"value": "<h1>Theme Stratus<br><small>Vorlage 1</small></h1>", "source": "static"}, "color": "#3d3d3d", "newTab": false, "mediaId": "' . self::$cmsImageIds[0] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[0] . '", "animation": "zoom", "animationIn": "flip-in-hor-bottom", "textMargins": false, "overlayColor": "#000000", "textMaxWidth": "600px", "textMinWidth": null, "textPaddings": false, "headlineScale": false, "textMarginTop": "20px", "overlayOpacity": "50%", "textMarginLeft": "5%", "textPaddingTop": "8px", "backgroundColor": "", "textMarginRight": "5%", "textPaddingLeft": "16px", "textBorderRadius": true, "textMarginBottom": "20px", "textPaddingRight": "16px", "customItemClasses": null, "textPaddingBottom": "8px", "verticalTextAlign": "center", "horizontalTextAlign": "flex-start", "textBorderRadiusTopLeft": "3px", "textBorderRadiusTopRight": "3px", "textBorderRadiusBottomLeft": "3px", "textBorderRadiusBottomRight": "3px"}, {"url": "#demo-link", "text": {"value": "<h2 class=\\"h1\\">Theme Stratus<br><small>Vorlage 1</small></h2>", "source": "static"}, "color": "#ffffff", "newTab": false, "mediaId": "' . self::$cmsImageIds[1] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[1] . '", "animation": "parallax-mousemove", "animationIn": "slide-in-left", "textMargins": false, "overlayColor": "#000000", "textMaxWidth": "600px", "textMinWidth": null, "textPaddings": false, "textMarginTop": "20px", "overlayOpacity": "50%", "textMarginLeft": "5%", "textPaddingTop": "8px", "backgroundColor": "transparent", "textMarginRight": "5%", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "20px", "textPaddingRight": "16px", "customItemClasses": null, "textPaddingBottom": "8px", "verticalTextAlign": "center", "horizontalTextAlign": "flex-start", "textBorderRadiusTopLeft": "3px", "textBorderRadiusTopRight": "3px", "textBorderRadiusBottomLeft": "3px", "textBorderRadiusBottomRight": "3px"}, {"url": "#demo-link", "text": {"value": "<h2 class=\\"h1\\">Theme Stratus<br><small>Vorlage 1</small></h2>", "source": "static"}, "color": "#3d3d3d", "newTab": false, "mediaId": "' . self::$cmsImageIds[2] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[2] . '", "animation": "zoom", "animationIn": "slide-in-right", "textMargins": false, "overlayColor": "#000000", "textMaxWidth": "600px", "textMinWidth": null, "textPaddings": false, "textMarginTop": "20px", "overlayOpacity": "50%", "textMarginLeft": "5%", "textPaddingTop": "8px", "backgroundColor": "transparent", "textMarginRight": "5%", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "20px", "textPaddingRight": "16px", "customItemClasses": null, "textPaddingBottom": "8px", "verticalTextAlign": "center", "horizontalTextAlign": "flex-start", "textBorderRadiusTopLeft": "3px", "textBorderRadiusTopRight": "3px", "textBorderRadiusBottomLeft": "3px", "textBorderRadiusBottomRight": "3px"}, {"url": "#demo-link", "text": {"value": "<h2 class=\\"h1\\">Theme Stratus<br><small>Vorlage 1</small></h2>", "source": "static"}, "color": "#ffffff", "newTab": false, "mediaId": "' . self::$cmsImageIds[3] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[3] . '", "animation": "kenburns-top-right", "animationIn": "fade-in", "textMargins": false, "overlayColor": "#000000", "textMaxWidth": "600px", "textMinWidth": null, "textPaddings": false, "textMarginTop": "20px", "overlayOpacity": "50%", "textMarginLeft": "5%", "textPaddingTop": "8px", "backgroundColor": "transparent", "textMarginRight": "5%", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "20px", "textPaddingRight": "16px", "customItemClasses": null, "textPaddingBottom": "8px", "verticalTextAlign": "center", "horizontalTextAlign": "flex-start", "textBorderRadiusTopLeft": "3px", "textBorderRadiusTopRight": "3px", "textBorderRadiusBottomLeft": "3px", "textBorderRadiusBottomRight": "3px"}], "source": "static"}, "customClasses": {"value": null, "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "navigationDots": {"value": "inside", "source": "static"}, "autoplayTimeout": {"value": 5000, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "navigationArrows": {"value": "inside", "source": "static"}, "autoplayHoverPause": {"value": true, "source": "static"}, "elementBorderRadius": {"value": false, "source": "static"}, "elementBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "elementBorderRadiusTopRight": {"value": "6px", "source": "static"}, "elementBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "elementBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"axis": {"value": "horizontal", "source": "static"}, "loop": {"value": false, "source": "static"}, "mode": {"value": "carousel", "source": "static"}, "items": {"value": 1, "source": "static"}, "speed": {"value": 500, "source": "static"}, "gutter": {"value": 0, "source": "static"}, "rewind": {"value": true, "source": "static"}, "autoplay": {"value": true, "source": "static"}, "minHeight": {"value": "55vh", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "sliderItems": {"value": [{"url": "#demo-link", "text": {"value": "<h1>Theme Stratus<br><small>Vorlage 1</small></h1>", "source": "static"}, "color": "#3d3d3d", "newTab": false, "mediaId": "' . self::$cmsImageIds[0] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[0] . '", "animation": "zoom", "animationIn": "flip-in-hor-bottom", "textMargins": false, "overlayColor": "#000000", "textMaxWidth": "600px", "textMinWidth": null, "textPaddings": false, "textMarginTop": "20px", "overlayOpacity": "50%", "textMarginLeft": "5%", "textPaddingTop": "8px", "backgroundColor": "", "textMarginRight": "5%", "textPaddingLeft": "16px", "textBorderRadius": true, "textMarginBottom": "20px", "textPaddingRight": "16px", "customItemClasses": null, "textPaddingBottom": "8px", "verticalTextAlign": "center", "horizontalTextAlign": "flex-start", "textBorderRadiusTopLeft": "3px", "textBorderRadiusTopRight": "3px", "textBorderRadiusBottomLeft": "3px", "textBorderRadiusBottomRight": "3px"}, {"url": "#demo-link", "text": {"value": "<h2 class=\\"h1\\">Theme Stratus<br><small>Vorlage 1</small></h2>", "source": "static"}, "color": "#ffffff", "newTab": false, "mediaId": "' . self::$cmsImageIds[1] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[1] . '", "animation": "parallax-mousemove", "animationIn": "slide-in-left", "textMargins": false, "overlayColor": "#000000", "textMaxWidth": "600px", "textMinWidth": null, "textPaddings": false, "textMarginTop": "20px", "overlayOpacity": "50%", "textMarginLeft": "5%", "textPaddingTop": "8px", "backgroundColor": "transparent", "textMarginRight": "5%", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "20px", "textPaddingRight": "16px", "customItemClasses": null, "textPaddingBottom": "8px", "verticalTextAlign": "center", "horizontalTextAlign": "flex-start", "textBorderRadiusTopLeft": "3px", "textBorderRadiusTopRight": "3px", "textBorderRadiusBottomLeft": "3px", "textBorderRadiusBottomRight": "3px"}, {"url": "#demo-link", "text": {"value": "<h2 class=\\"h1\\">Theme Stratus<br><small>Vorlage 1</small></h2>", "source": "static"}, "color": "#3d3d3d", "newTab": false, "mediaId": "' . self::$cmsImageIds[2] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[2] . '", "animation": "zoom", "animationIn": "slide-in-right", "textMargins": false, "overlayColor": "#000000", "textMaxWidth": "600px", "textMinWidth": null, "textPaddings": false, "textMarginTop": "20px", "overlayOpacity": "50%", "textMarginLeft": "5%", "textPaddingTop": "8px", "backgroundColor": "transparent", "textMarginRight": "5%", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "20px", "textPaddingRight": "16px", "customItemClasses": null, "textPaddingBottom": "8px", "verticalTextAlign": "center", "horizontalTextAlign": "flex-start", "textBorderRadiusTopLeft": "3px", "textBorderRadiusTopRight": "3px", "textBorderRadiusBottomLeft": "3px", "textBorderRadiusBottomRight": "3px"}, {"url": "#demo-link", "text": {"value": "<h2 class=\\"h1\\">Theme Stratus<br><small>Vorlage 1</small></h2>", "source": "static"}, "color": "#ffffff", "newTab": false, "mediaId": "' . self::$cmsImageIds[3] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[3] . '", "animation": "kenburns-top-right", "animationIn": "fade-in", "textMargins": false, "overlayColor": "#000000", "textMaxWidth": "600px", "textMinWidth": null, "textPaddings": false, "textMarginTop": "20px", "overlayOpacity": "50%", "textMarginLeft": "5%", "textPaddingTop": "8px", "backgroundColor": "transparent", "textMarginRight": "5%", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "20px", "textPaddingRight": "16px", "customItemClasses": null, "textPaddingBottom": "8px", "verticalTextAlign": "center", "horizontalTextAlign": "flex-start", "textBorderRadiusTopLeft": "3px", "textBorderRadiusTopRight": "3px", "textBorderRadiusBottomLeft": "3px", "textBorderRadiusBottomRight": "3px"}], "source": "static"}, "customClasses": {"value": null, "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "navigationDots": {"value": "inside", "source": "static"}, "autoplayTimeout": {"value": 5000, "source": "static"}, "navigationArrows": {"value": "inside", "source": "static"}, "autoplayHoverPause": {"value": true, "source": "static"}, "elementBorderRadius": {"value": false, "source": "static"}, "elementBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "elementBorderRadiusTopRight": {"value": "6px", "source": "static"}, "elementBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "elementBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
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
                                'type' => 'zen-grid-4-4-4',
                                'locked' => 0,
                                'cssClass' => 'zen-animate slide-in-blurred-bottom',
                                'customFields' => ['zenit_grid_gap' => '0'],
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "0",
                                'marginBottom' => "0",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'zen-teaser',
                                        'slot' => 'col1',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "Jetzt ansehen", "source": "static"}, "color": {"value": "#ffffff", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[4] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "16px", "source": "static"}, "minHeight": {"value": "480px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "none", "source": "static"}, "fontFamily": {"value": "headline", "source": "static"}, "fontWeight": {"value": "400", "source": "static"}, "imageHover": {"value": "none", "source": "static"}, "animationIn": {"value": "slide-in-blurred-bottom", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "textMargins": {"value": true, "source": "static"}, "animationOut": {"value": "slide-out-bottom", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "300px", "source": "static"}, "textMinWidth": {"value": "100%", "source": "static"}, "textPaddings": {"value": true, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "0", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "0", "source": "static"}, "textPaddingTop": {"value": "16px", "source": "static"}, "backgroundColor": {"value": "#00000033", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "0", "source": "static"}, "textPaddingLeft": {"value": "16px", "source": "static"}, "textBorderRadius": {"value": false, "source": "static"}, "textMarginBottom": {"value": "0", "source": "static"}, "textPaddingRight": {"value": "16px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "textPaddingBottom": {"value": "16px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": "center", "source": "static"}, "horizontalTextAlign": {"value": "center", "source": "static"}, "horizontalImageAlign": {"value": "center", "source": "static"}, "textBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "textBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'zen-teaser',
                                        'slot' => 'col2',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "Lampen ansehen", "source": "static"}, "color": {"value": "#ffffff", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[5] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": true, "source": "static"}, "fontSize": {"value": "16px", "source": "static"}, "minHeight": {"value": "480px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "none", "source": "static"}, "fontFamily": {"value": "headline", "source": "static"}, "fontWeight": {"value": "400", "source": "static"}, "imageHover": {"value": "none", "source": "static"}, "animationIn": {"value": "fade-in-top", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "flip-out-hor-bottom", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "300px", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": false, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "overlayOpacity": {"value": "20%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "8px", "source": "static"}, "backgroundColor": {"value": "#00000033", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "16px", "source": "static"}, "textBorderRadius": {"value": false, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "16px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "textPaddingBottom": {"value": "8px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": "center", "source": "static"}, "horizontalTextAlign": {"value": "center", "source": "static"}, "horizontalImageAlign": {"value": "center", "source": "static"}, "textBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "textBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'zen-teaser',
                                        'slot' => 'col3',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "Lampen ansehen", "source": "static"}, "color": {"value": "#ffffff", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[6] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": true, "source": "static"}, "fontSize": {"value": "16px", "source": "static"}, "minHeight": {"value": "480px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "none", "source": "static"}, "fontFamily": {"value": "headline", "source": "static"}, "fontWeight": {"value": "400", "source": "static"}, "imageHover": {"value": "none", "source": "static"}, "animationIn": {"value": "slide-in-right", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "slide-out-right", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "300px", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": false, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "overlayOpacity": {"value": "20%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "8px", "source": "static"}, "backgroundColor": {"value": "#00000033", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "16px", "source": "static"}, "textBorderRadius": {"value": false, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "16px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "textPaddingBottom": {"value": "8px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": "center", "source": "static"}, "horizontalTextAlign": {"value": "center", "source": "static"}, "horizontalImageAlign": {"value": "center", "source": "static"}, "textBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "textBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
                                            ]
                                        ])
                                    ]
                                ]
                            ],
                            [
                                'position' => 1,
                                'type' => 'zen-grid-4-4-4',
                                'locked' => 0,
                                'cssClass' => 'zen-animate slide-in-blurred-bottom',
                                'customFields' => ['zenit_grid_gap' => '0'],
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "0",
                                'marginBottom' => "0",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'zen-teaser',
                                        'slot' => 'col1',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "Lampen ansehen", "source": "static"}, "color": {"value": "#292929", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[7] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": true, "source": "static"}, "fontSize": {"value": "16px", "source": "static"}, "minHeight": {"value": "480px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "none", "source": "static"}, "fontFamily": {"value": "headline", "source": "static"}, "fontWeight": {"value": "400", "source": "static"}, "imageHover": {"value": "none", "source": "static"}, "animationIn": {"value": "slide-in-left", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "slide-out-left", "source": "static"}, "overlayColor": {"value": "#9ca6ba", "source": "static"}, "textMaxWidth": {"value": "300px", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": false, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "overlayOpacity": {"value": "10%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "8px", "source": "static"}, "backgroundColor": {"value": "#9ca6ba1a", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "16px", "source": "static"}, "textBorderRadius": {"value": false, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "16px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "textPaddingBottom": {"value": "8px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": "center", "source": "static"}, "horizontalTextAlign": {"value": "center", "source": "static"}, "horizontalImageAlign": {"value": "center", "source": "static"}, "textBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "textBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'zen-teaser',
                                        'slot' => 'col2',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "Lampen ansehen", "source": "static"}, "color": {"value": "#292929", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[8] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": true, "source": "static"}, "fontSize": {"value": "16px", "source": "static"}, "minHeight": {"value": "480px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "none", "source": "static"}, "fontFamily": {"value": "headline", "source": "static"}, "fontWeight": {"value": "400", "source": "static"}, "imageHover": {"value": "none", "source": "static"}, "animationIn": {"value": "slide-in-bottom", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "slide-out-top", "source": "static"}, "overlayColor": {"value": "#9ca6ba", "source": "static"}, "textMaxWidth": {"value": "300px", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": false, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "overlayOpacity": {"value": "10%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "8px", "source": "static"}, "backgroundColor": {"value": "#9ca6ba1a", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "16px", "source": "static"}, "textBorderRadius": {"value": false, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "16px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "textPaddingBottom": {"value": "8px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": null, "source": "static"}, "horizontalTextAlign": {"value": "center", "source": "static"}, "horizontalImageAlign": {"value": null, "source": "static"}, "textBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "textBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'zen-teaser',
                                        'slot' => 'col3',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "Jetzt ansehen", "source": "static"}, "color": {"value": "#292929", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[9] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "16px", "source": "static"}, "minHeight": {"value": "480px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "none", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "400", "source": "static"}, "imageHover": {"value": "none", "source": "static"}, "animationIn": {"value": "slide-in-blurred-bottom", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "textMargins": {"value": true, "source": "static"}, "animationOut": {"value": "slide-out-blurred-bottom", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "", "source": "static"}, "textMinWidth": {"value": "100%", "source": "static"}, "textPaddings": {"value": true, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "0", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "0", "source": "static"}, "textPaddingTop": {"value": "16px", "source": "static"}, "backgroundColor": {"value": "#9ca6ba1a", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "0", "source": "static"}, "textPaddingLeft": {"value": "16px", "source": "static"}, "textBorderRadius": {"value": false, "source": "static"}, "textMarginBottom": {"value": "0", "source": "static"}, "textPaddingRight": {"value": "16px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "textPaddingBottom": {"value": "16px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": "center", "source": "static"}, "horizontalTextAlign": {"value": "center", "source": "static"}, "horizontalImageAlign": {"value": "center", "source": "static"}, "textBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "textBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
                                            ]
                                        ])
                                    ]
                                ]
                            ],
                            [
                                'position' => 2,
                                'type' => 'product-slider',
                                'locked' => 0,
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
                                                'config' => json_decode('{"title": {"value": "Topseller", "source": "static"}, "border": {"value": false, "source": "static"}, "rotate": {"value": true, "source": "static"}, "products": {"value": ' . $this->limitedProducts(7) . ', "source": "static"}, "boxLayout": {"value": "minimal", "source": "static"}, "elMinWidth": {"value": "300px", "source": "static"}, "navigation": {"value": true, "source": "static"}, "displayMode": {"value": "contain", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "productStreamLimit": {"value": 10, "source": "static"}, "productStreamSorting": {"value": "name:ASC", "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"title": {"value": "Topseller", "source": "static"}, "border": {"value": false, "source": "static"}, "rotate": {"value": true, "source": "static"}, "products": {"value": ' . $this->limitedProducts(7) . ', "source": "static"}, "boxLayout": {"value": "minimal", "source": "static"}, "elMinWidth": {"value": "300px", "source": "static"}, "navigation": {"value": true, "source": "static"}, "displayMode": {"value": "contain", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "productStreamLimit": {"value": 10, "source": "static"}, "productStreamSorting": {"value": "name:ASC", "source": "static"}}', true)
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
                        'sizingMode' => 'boxed',
                        'type' => 'default',
                        'blocks' => [
                            [
                                'position' => 0,
                                'type' => 'image-text-cover',
                                'locked' => 0,
                                'cssClass' => 'zen-animate fade-in-top',
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "40px",
                                'marginBottom' => "40px",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'zen-teaser',
                                        'slot' => 'left',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "/demo-1/Shop/Moebel-Deko/Lampen/", "source": "static"}, "text": {"value": "Lampen entdecken", "source": "static"}, "color": {"value": "#FFFFFF", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[10] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": true, "source": "static"}, "fontSize": {"value": "16px", "source": "static"}, "minHeight": {"value": "480px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "show-arrow", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "600", "source": "static"}, "imageHover": {"value": "zoom", "source": "static"}, "animationIn": {"value": "none", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "none", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "300px", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": true, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "overlayOpacity": {"value": "20%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "16px", "source": "static"}, "backgroundColor": {"value": "#C67E38", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "32px", "source": "static"}, "textBorderRadius": {"value": false, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "32px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "textPaddingBottom": {"value": "16px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": null, "source": "static"}, "horizontalTextAlign": {"value": "flex-end", "source": "static"}, "horizontalImageAlign": {"value": null, "source": "static"}, "textBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "textBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url": {"value": "/demo-1/Shop/Moebel-Deko/Lampen/", "source": "static"}, "text": {"value": "Lampen entdecken", "source": "static"}, "color": {"value": "#FFFFFF", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[10] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": true, "source": "static"}, "fontSize": {"value": "16px", "source": "static"}, "minHeight": {"value": "480px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "show-arrow", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "600", "source": "static"}, "imageHover": {"value": "zoom", "source": "static"}, "animationIn": {"value": "none", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "none", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "300px", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": true, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "overlayOpacity": {"value": "20%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "16px", "source": "static"}, "backgroundColor": {"value": "#C67E38", "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "32px", "source": "static"}, "textBorderRadius": {"value": false, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "32px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "textPaddingBottom": {"value": "16px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": null, "source": "static"}, "horizontalTextAlign": {"value": "flex-end", "source": "static"}, "textBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "textBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
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
                                                'config' => json_decode('{"title": {"value": "", "source": "static"}, "border": {"value": false, "source": "static"}, "rotate": {"value": false, "source": "static"}, "products": {"value": ' . $this->limitedProducts(7) . ', "source": "static"}, "boxLayout": {"value": "image", "source": "static"}, "elMinWidth": {"value": "250px", "source": "static"}, "navigation": {"value": true, "source": "static"}, "displayMode": {"value": "contain", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}, "productStreamLimit": {"value": 10, "source": "static"}, "productStreamSorting": {"value": "name:ASC", "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"title": {"value": "", "source": "static"}, "border": {"value": false, "source": "static"}, "rotate": {"value": false, "source": "static"}, "products": {"value": ' . $this->limitedProducts(7) . ', "source": "static"}, "boxLayout": {"value": "image", "source": "static"}, "elMinWidth": {"value": "250px", "source": "static"}, "navigation": {"value": true, "source": "static"}, "displayMode": {"value": "contain", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}, "productStreamLimit": {"value": 10, "source": "static"}, "productStreamSorting": {"value": "name:ASC", "source": "static"}}', true)
                                            ]
                                        ])
                                    ]
                                ]
                            ],
                            [
                                'position' => 1,
                                'type' => 'image-text-cover',
                                'locked' => 0,
                                'cssClass' => 'zen-animate fade-in-top',
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "40px",
                                'marginBottom' => "40px",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'zen-teaser',
                                        'slot' => 'right',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "/demo-1/Shop/Moebel-Deko/Garten/", "source": "static"}, "text": {"value": "Designer-Lampen", "source": "static"}, "color": {"value": "#ffffff", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[11] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": true, "source": "static"}, "fontSize": {"value": "16px", "source": "static"}, "minHeight": {"value": "480px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "show-arrow", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "600", "source": "static"}, "imageHover": {"value": "zoom", "source": "static"}, "animationIn": {"value": "none", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "none", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "300px", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": true, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "overlayOpacity": {"value": "20%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "16px", "source": "static"}, "backgroundColor": {"value": "#3f2319", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "32px", "source": "static"}, "textBorderRadius": {"value": false, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "32px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "textPaddingBottom": {"value": "16px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": null, "source": "static"}, "horizontalTextAlign": {"value": "flex-start", "source": "static"}, "horizontalImageAlign": {"value": null, "source": "static"}, "textBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "textBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url": {"value": "/demo-1/Shop/Moebel-Deko/Garten/", "source": "static"}, "text": {"value": "Designer-Lampen", "source": "static"}, "color": {"value": "#ffffff", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[11] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": true, "source": "static"}, "fontSize": {"value": "16px", "source": "static"}, "minHeight": {"value": "480px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "show-arrow", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "600", "source": "static"}, "imageHover": {"value": "zoom", "source": "static"}, "animationIn": {"value": "none", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "none", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "300px", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": true, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "overlayOpacity": {"value": "20%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "16px", "source": "static"}, "backgroundColor": {"value": "#3f2319", "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "32px", "source": "static"}, "textBorderRadius": {"value": false, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "32px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "textPaddingBottom": {"value": "16px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": null, "source": "static"}, "horizontalTextAlign": {"value": "flex-start", "source": "static"}, "textBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "textBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'product-slider',
                                        'slot' => 'left',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"title": {"value": "", "source": "static"}, "border": {"value": false, "source": "static"}, "rotate": {"value": false, "source": "static"}, "products": {"value": ' . $this->limitedProducts(7) . ', "source": "static"}, "boxLayout": {"value": "image", "source": "static"}, "elMinWidth": {"value": "250px", "source": "static"}, "navigation": {"value": true, "source": "static"}, "displayMode": {"value": "contain", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}, "productStreamLimit": {"value": 10, "source": "static"}, "productStreamSorting": {"value": "name:ASC", "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"title": {"value": "", "source": "static"}, "border": {"value": false, "source": "static"}, "rotate": {"value": false, "source": "static"}, "products": {"value": ' . $this->limitedProducts(7) . ', "source": "static"}, "boxLayout": {"value": "image", "source": "static"}, "elMinWidth": {"value": "250px", "source": "static"}, "navigation": {"value": true, "source": "static"}, "displayMode": {"value": "contain", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}, "productStreamLimit": {"value": 10, "source": "static"}, "productStreamSorting": {"value": "name:ASC", "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                ]
                            ],
                            [
                                'position' => 2,
                                'type' => 'image-text-cover',
                                'locked' => 0,
                                'cssClass' => 'zen-animate fade-in-top',
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "40px",
                                'marginBottom' => "80px",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'zen-teaser',
                                        'slot' => 'left',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "Dekorative Lampen", "source": "static"}, "color": {"value": "#FFFFFF", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[12] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "16px", "source": "static"}, "minHeight": {"value": "480px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "show-arrow", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "600", "source": "static"}, "imageHover": {"value": "zoom", "source": "static"}, "animationIn": {"value": "none", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "none", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "300px", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": true, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "16px", "source": "static"}, "backgroundColor": {"value": "#69230F", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "32px", "source": "static"}, "textBorderRadius": {"value": false, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "32px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "textPaddingBottom": {"value": "16px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": null, "source": "static"}, "horizontalTextAlign": {"value": "flex-end", "source": "static"}, "horizontalImageAlign": {"value": null, "source": "static"}, "textBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "textBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "Dekorative Lampen", "source": "static"}, "color": {"value": "#FFFFFF", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[12] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "16px", "source": "static"}, "minHeight": {"value": "480px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "show-arrow", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "600", "source": "static"}, "imageHover": {"value": "zoom", "source": "static"}, "animationIn": {"value": "none", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "none", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "300px", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": true, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "16px", "source": "static"}, "backgroundColor": {"value": "#69230F", "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "32px", "source": "static"}, "textBorderRadius": {"value": false, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "32px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "textPaddingBottom": {"value": "16px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": null, "source": "static"}, "horizontalTextAlign": {"value": "flex-end", "source": "static"}, "textBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "textBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
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
                                                'config' => json_decode('{"title": {"value": "", "source": "static"}, "border": {"value": false, "source": "static"}, "rotate": {"value": false, "source": "static"}, "products": {"value": ' . $this->limitedProducts(7) . ', "source": "static"}, "boxLayout": {"value": "image", "source": "static"}, "elMinWidth": {"value": "250px", "source": "static"}, "navigation": {"value": true, "source": "static"}, "displayMode": {"value": "contain", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}, "productStreamLimit": {"value": 10, "source": "static"}, "productStreamSorting": {"value": "name:ASC", "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"title": {"value": "", "source": "static"}, "border": {"value": false, "source": "static"}, "rotate": {"value": false, "source": "static"}, "products": {"value": ' . $this->limitedProducts(7) . ', "source": "static"}, "boxLayout": {"value": "image", "source": "static"}, "elMinWidth": {"value": "250px", "source": "static"}, "navigation": {"value": true, "source": "static"}, "displayMode": {"value": "contain", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}, "productStreamLimit": {"value": 10, "source": "static"}, "productStreamSorting": {"value": "name:ASC", "source": "static"}}', true)
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
                        'type' => 'default',
                        'blocks' => [
                            [
                                'position' => 0,
                                'type' => 'image-text-gallery',
                                'locked' => 0,
                                'cssClass' => 'zen-animate fade-in-top',
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "40px",
                                'marginBottom' => "40px",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'image',
                                        'slot' => 'left-image',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[13] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "416px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[13] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "416px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
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
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[14] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "416px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[14] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "416px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
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
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[15] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "416px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[15] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "416px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'text',
                                        'slot' => 'left-text',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": "<h2 style=\"text-align: left;\">Lorem Ipsum dolor</h2>\n                        <p style=\"text-align: left;\">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, \n                        sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, \n                        sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content": {"value": "<h2 style=\"text-align: left;\">Lorem Ipsum dolor</h2>\n                        <p style=\"text-align: left;\">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, \n                        sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, \n                        sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
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
                                                'config' => json_decode('{"content": {"value": "<h2 style=\"text-align: left;\">Lorem Ipsum dolor</h2>\n                        <p style=\"text-align: left;\">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, \n                        sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, \n                        sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content": {"value": "<h2 style=\"text-align: left;\">Lorem Ipsum dolor</h2>\n                        <p style=\"text-align: left;\">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, \n                        sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, \n                        sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
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
                                                'config' => json_decode('{"content": {"value": "<h2 style=\"text-align: left;\">Lorem Ipsum dolor</h2>\n                        <p style=\"text-align: left;\">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, \n                        sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, \n                        sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content": {"value": "<h2 style=\"text-align: left;\">Lorem Ipsum dolor</h2>\n                        <p style=\"text-align: left;\">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, \n                        sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, \n                        sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ]
                                ]
                            ]
                        ]
                    ],
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
                'previewMediaId' => self::$previewImages['stratus'],
                'name' => $this->translationHelper->adjustTranslations([
                    'de-DE' => 'Startseite Stratus - Set 2',
                    'en-GB' => 'Homepage Stratus - Set 2',
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
                                'cssClass' => 'zen-animate fade-in-bottom',
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
                                                'config' => json_decode('{"axis": {"value": "vertical", "source": "static"}, "loop": {"value": false, "source": "static"}, "mode": {"value": "carousel", "source": "static"}, "items": {"value": 1, "source": "static"}, "speed": {"value": 500, "source": "static"}, "gutter": {"value": 0, "source": "static"}, "rewind": {"value": true, "source": "static"}, "autoplay": {"value": true, "source": "static"}, "minHeight": {"value": "553px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "sliderItems": {"value": [{"url": "#demo-link", "text": {"value": "<div><img alt=\\"Stratus Slider Text\\" style=\\"max-width:60%;\\" src=\\"' . self::$cmsImageIds[26] . '\\"></div>\\n<h1 class=\\"fs-6\\">Vorlage 2 - jetzt entdecken</h1>\\n", "source": "static"}, "color": "#ffffff", "newTab": false, "mediaId": "' . self::$cmsImageIds[16] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[16] . '", "animation": "parallax-mousemove", "codeEditor": true, "animationIn": "puff-in-center", "textMargins": false, "overlayColor": "#000000", "textMaxWidth": "600px", "textMinWidth": null, "textPaddings": false, "textMarginTop": "20px", "overlayOpacity": "50%", "textMarginLeft": "5%", "textPaddingTop": "8px", "backgroundColor": "transparent", "textMarginRight": "5%", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "20px", "textPaddingRight": "16px", "customItemClasses": null, "textPaddingBottom": "8px", "verticalTextAlign": "center", "horizontalTextAlign": "flex-start", "textBorderRadiusTopLeft": "3px", "textBorderRadiusTopRight": "3px", "textBorderRadiusBottomLeft": "3px", "textBorderRadiusBottomRight": "3px"}, {"url": "#demo-link", "text": {"value": "<div><img alt=\\"Stratus Slider Text\\" src=\\"' . self::$cmsImageIds[26] . '\\" style=\\"max-width:60%;\\"></div>\\n<h2 class=\\"fs-6\\">Vorlage 2 - jetzt entdecken</h2>", "source": "static"}, "color": "#ffffff", "newTab": false, "mediaId": "' . self::$cmsImageIds[17] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[17] . '", "animation": "parallax-mousemove", "codeEditor": true, "animationIn": "puff-in-center", "textMargins": false, "overlayColor": "#000000", "textMaxWidth": "600px", "textMinWidth": null, "textPaddings": false, "textMarginTop": "20px", "overlayOpacity": "50%", "textMarginLeft": "5%", "textPaddingTop": "8px", "backgroundColor": "transparent", "textMarginRight": "5%", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "20px", "textPaddingRight": "16px", "customItemClasses": null, "textPaddingBottom": "8px", "verticalTextAlign": "center", "horizontalTextAlign": "flex-start", "textBorderRadiusTopLeft": "3px", "textBorderRadiusTopRight": "3px", "textBorderRadiusBottomLeft": "3px", "textBorderRadiusBottomRight": "3px"}, {"url": "#demo-link", "text": {"value": "<div><img alt=\\"Stratus Slider Text\\" src=\\"' . self::$cmsImageIds[26] . '\\" style=\\"max-width:60%;\\"></div>\\n<h2 class=\\"fs-6\\">Vorlage 2 - jetzt entdecken</h2>", "source": "static"}, "color": "#ffffff", "newTab": false, "mediaId": "' . self::$cmsImageIds[18] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[18] . '", "animation": "parallax-mousemove", "codeEditor": true, "animationIn": "puff-in-center", "textMargins": false, "overlayColor": "#000000", "textMaxWidth": "600px", "textMinWidth": null, "textPaddings": false, "textMarginTop": "20px", "overlayOpacity": "50%", "textMarginLeft": "5%", "textPaddingTop": "8px", "backgroundColor": "transparent", "textMarginRight": "5%", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "20px", "textPaddingRight": "16px", "customItemClasses": null, "textPaddingBottom": "8px", "verticalTextAlign": "center", "horizontalTextAlign": "flex-start", "textBorderRadiusTopLeft": "3px", "textBorderRadiusTopRight": "3px", "textBorderRadiusBottomLeft": "3px", "textBorderRadiusBottomRight": "3px"}], "source": "static"}, "customClasses": {"value": null, "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "navigationDots": {"value": "inside", "source": "static"}, "autoplayTimeout": {"value": 5000, "source": "static"}, "navigationArrows": {"value": "inside", "source": "static"}, "autoplayHoverPause": {"value": true, "source": "static"}, "elementBorderRadius": {"value": false, "source": "static"}, "elementBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "elementBorderRadiusTopRight": {"value": "6px", "source": "static"}, "elementBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "elementBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                ]
                            ],
                            [
                                'position' => 1,
                                'type' => 'image-text-gallery',
                                'locked' => 0,
                                'cssClass' => 'zen-animate fade-in-bottom',
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "80px",
                                'marginBottom' => "80px",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'image',
                                        'slot' => 'left-image',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[19] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "240px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
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
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[20] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "240px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
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
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[21] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "240px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'text',
                                        'slot' => 'left-text',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": "<h2 style=\"text-align: left;\">Lorem Ipsum dolor</h2>\n                        <p style=\"text-align: left;\"><span style=\"letter-spacing: 0px;\">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, \n                        sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, \n                        sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</span><br></p><p style=\"text-align: left;\"><a class=\"btn btn-secondary\" href=\"#demo-link\" target=\"_self\">weiterlesen</a><br></p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
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
                                                'config' => json_decode('{"content": {"value": "<h2 style=\"text-align: left;\">Lorem Ipsum dolor</h2>\n                        <p style=\"text-align: left;\"><span style=\"letter-spacing: 0px;\">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, \n                        sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, \n                        sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</span><br></p><p style=\"text-align: left;\"><a class=\"btn btn-secondary\" href=\"#demo-link\" target=\"_self\">weiterlesen</a><br></p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
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
                                                'config' => json_decode('{"content": {"value": "<h2 style=\"text-align: left;\">Lorem Ipsum dolor</h2>\n                        <p style=\"text-align: left;\"><span style=\"letter-spacing: 0px;\">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, \n                        sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, \n                        sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</span><br></p><p style=\"text-align: left;\"><a target=\"_self\" href=\"#demo-link\" class=\"btn btn-secondary\">weiterlesen</a><br></p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
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
                                'cssClass' => 'zen-animate fade-in-bottom',
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
                                                'config' => json_decode('{"title": {"value": "Topseller", "source": "static"}, "border": {"value": false, "source": "static"}, "rotate": {"value": false, "source": "static"}, "products": {"value": ' . $this->limitedProducts(7) . ', "source": "static"}, "boxLayout": {"value": "standard", "source": "static"}, "elMinWidth": {"value": "300px", "source": "static"}, "navigation": {"value": true, "source": "static"}, "displayMode": {"value": "standard", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "productStreamLimit": {"value": 10, "source": "static"}, "productStreamSorting": {"value": "name:ASC", "source": "static"}}', true)
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
                                'type' => 'text-on-image',
                                'locked' => 0,
                                'cssClass' => 'img-darken-25 zen-animate fade-in-bottom',
                                'backgroundMediaId' => self::$cmsImageIds[22],
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "200px",
                                'marginBottom' => "200px",
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
                                                'config' => json_decode('{"content": {"value": "<h2 style=\"text-align: center; font-size: 100px; font-weight: 800;\"><font color=\"#ffffff\">#nopainnogain</font></h2>", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}}', true)
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
                        'sizingMode' => 'boxed',
                        'backgroundColor' => '#232323',
                        'type' => 'default',
                        'blocks' => [
                            [
                                'position' => 0,
                                'type' => 'text-hero',
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
                                                'config' => json_decode('{"content": {"value": "<h2 style=\"text-align: center;\"><font color=\"#ffffff\">Lorem Ipsum dolor sit amet</font></h2>\n                        <hr>\n                        <p style=\"text-align: center;\"><font color=\"#ffffff\">Lorem ipsum dolor sit amet, consetetur sadipscing elitr</font></p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ]
                                ]
                            ],
                            [
                                'position' => 1,
                                'type' => 'image-text-bubble',
                                'locked' => 0,
                                'cssClass' => 'zen-animate fade-in-bottom',
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "80px",
                                'marginBottom' => "80px",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'image',
                                        'slot' => 'left-image',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[23] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "300px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
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
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[24] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "300px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
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
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[25] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "300px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'text',
                                        'slot' => 'left-text',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": "<div style=\"text-align: center;\"><a target=\"_self\" href=\"#demo-link\" class=\"btn btn-primary\">Running</a><br></div>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
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
                                                'config' => json_decode('{"content": {"value": "<div style=\"text-align: center;\"><a target=\"_self\" href=\"#demo-link\" class=\"btn btn-primary\">Sneaker</a></div>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
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
                                                'config' => json_decode('{"content": {"value": "<div style=\"text-align: center;\"><a target=\"_self\" href=\"#demo-link\" class=\"btn btn-primary\">Skateschuhe</a><br></div>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
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
                'previewMediaId' => self::$previewImages['stratus'],
                'name' => $this->translationHelper->adjustTranslations([
                    'de-DE' => 'Startseite Stratus - Set 3',
                    'en-GB' => 'Homepage Stratus - Set 3',
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
                                                'config' => json_decode('{"axis": {"value": "horizontal", "source": "static"}, "loop": {"value": false, "source": "static"}, "mode": {"value": "carousel", "source": "static"}, "items": {"value": 1, "source": "static"}, "speed": {"value": 500, "source": "static"}, "gutter": {"value": 0, "source": "static"}, "rewind": {"value": true, "source": "static"}, "autoplay": {"value": true, "source": "static"}, "minHeight": {"value": "60vh", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "sliderItems": {"value": [{"url": "#demo-link", "text": {"value": "<div><img style=\\"max-width:75%;\\" alt=\\"\\\\Stratus Slider Text\\" src=\\"' . self::$cmsImageIds[37] . '\\"></div>\\n<h1 class=\\"h4\\">Vorlage 3 - jetzt entdecken</h1>\\n", "source": "static"}, "color": "#ffffff", "newTab": false, "mediaId": "' . self::$cmsImageIds[27] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[27] . '", "animation": "kenburns-top-right", "codeEditor": true, "animationIn": "slide-in-bck-center", "textMargins": false, "overlayColor": "#000000", "textMaxWidth": "600px", "textMinWidth": null, "textPaddings": false, "textMarginTop": "20px", "overlayOpacity": "50%", "textMarginLeft": "5%", "textPaddingTop": "8px", "backgroundColor": "transparent", "textMarginRight": "5%", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "20px", "textPaddingRight": "16px", "customItemClasses": null, "textPaddingBottom": "8px", "verticalTextAlign": "center", "horizontalTextAlign": "flex-start", "textBorderRadiusTopLeft": "3px", "textBorderRadiusTopRight": "3px", "textBorderRadiusBottomLeft": "3px", "textBorderRadiusBottomRight": "3px"}, {"url": "#demo-link", "text": {"value": "<div><img style=\\"max-width:75%;\\" alt=\\"\\\\Stratus Slider Text\\" src=\\"' . self::$cmsImageIds[37] . '\\"></div>\\n<h2 class=\\"h4\\">Vorlage 3 - jetzt entdecken</h2>\\n", "source": "static"}, "color": "#9e8377", "newTab": false, "mediaId": "' . self::$cmsImageIds[28] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[28] . '", "animation": "kenburns-top-right", "codeEditor": true, "animationIn": "slide-in-bck-center", "textMargins": false, "overlayColor": "#000000", "textMaxWidth": "600px", "textMinWidth": null, "textPaddings": false, "textMarginTop": "20px", "overlayOpacity": "50%", "textMarginLeft": "5%", "textPaddingTop": "8px", "backgroundColor": "transparent", "textMarginRight": "5%", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "20px", "textPaddingRight": "16px", "customItemClasses": null, "textPaddingBottom": "8px", "verticalTextAlign": "center", "horizontalTextAlign": "flex-start", "textBorderRadiusTopLeft": "3px", "textBorderRadiusTopRight": "3px", "textBorderRadiusBottomLeft": "3px", "textBorderRadiusBottomRight": "3px"}, {"url": "#demo-link", "text": {"value": "<div><img style=\\"max-width:75%;\\" alt=\\"\\\\Stratus Slider Text\\" src=\\"' . self::$cmsImageIds[37] . '\\"></div>\\n<h2 class=\\"h4\\">Vorlage 3 - jetzt entdecken</h2>", "source": "static"}, "color": "#9e8377", "newTab": false, "mediaId": "' . self::$cmsImageIds[29] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[29] . '", "animation": "kenburns-top-right", "codeEditor": true, "animationIn": "slide-in-bck-center", "textMargins": false, "overlayColor": "#000000", "textMaxWidth": "600px", "textMinWidth": null, "textPaddings": false, "textMarginTop": "20px", "overlayOpacity": "50%", "textMarginLeft": "5%", "textPaddingTop": "8px", "backgroundColor": "transparent", "textMarginRight": "5%", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "20px", "textPaddingRight": "16px", "customItemClasses": null, "textPaddingBottom": "8px", "verticalTextAlign": "center", "horizontalTextAlign": "flex-start", "textBorderRadiusTopLeft": "3px", "textBorderRadiusTopRight": "3px", "textBorderRadiusBottomLeft": "3px", "textBorderRadiusBottomRight": "3px"}], "source": "static"}, "customClasses": {"value": null, "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "navigationDots": {"value": null, "source": "static"}, "autoplayTimeout": {"value": 5000, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "navigationArrows": {"value": "inside", "source": "static"}, "autoplayHoverPause": {"value": true, "source": "static"}, "elementBorderRadius": {"value": false, "source": "static"}, "elementBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "elementBorderRadiusTopRight": {"value": "6px", "source": "static"}, "elementBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "elementBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"axis": {"value": "horizontal", "source": "static"}, "loop": {"value": false, "source": "static"}, "mode": {"value": "carousel", "source": "static"}, "items": {"value": 1, "source": "static"}, "speed": {"value": 500, "source": "static"}, "gutter": {"value": 0, "source": "static"}, "rewind": {"value": true, "source": "static"}, "autoplay": {"value": true, "source": "static"}, "minHeight": {"value": "60vh", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "sliderItems": {"value": [{"url": "#demo-link", "text": {"value": "<div><img style=\\"max-width:75%;\\" alt=\\"\\\\Stratus Slider Text\\" src=\\"' . self::$cmsImageIds[37] . '\\"></div>\\n<h1 class=\\"h4\\">Vorlage 3 - jetzt entdecken</h1>\\n", "source": "static"}, "color": "#ffffff", "newTab": false, "mediaId": "' . self::$cmsImageIds[27] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[27] . '", "animation": "kenburns-top-right", "codeEditor": true, "animationIn": "slide-in-bck-center", "textMargins": false, "overlayColor": "#000000", "textMaxWidth": "600px", "textMinWidth": null, "textPaddings": false, "textMarginTop": "20px", "overlayOpacity": "50%", "textMarginLeft": "5%", "textPaddingTop": "8px", "backgroundColor": "transparent", "textMarginRight": "5%", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "20px", "textPaddingRight": "16px", "customItemClasses": null, "textPaddingBottom": "8px", "verticalTextAlign": "center", "horizontalTextAlign": "flex-start", "textBorderRadiusTopLeft": "3px", "textBorderRadiusTopRight": "3px", "textBorderRadiusBottomLeft": "3px", "textBorderRadiusBottomRight": "3px"}, {"url": "#demo-link", "text": {"value": "<div><img style=\\"max-width:75%;\\" alt=\\"\\\\Stratus Slider Text\\" src=\\"' . self::$cmsImageIds[37] . '\\"></div>\\n<h2 class=\\"h4\\">Vorlage 3 - jetzt entdecken</h2>\\n", "source": "static"}, "color": "#9e8377", "newTab": false, "mediaId": "' . self::$cmsImageIds[28] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[28] . '", "animation": "kenburns-top-right", "codeEditor": true, "animationIn": "slide-in-bck-center", "textMargins": false, "overlayColor": "#000000", "textMaxWidth": "600px", "textMinWidth": null, "textPaddings": false, "textMarginTop": "20px", "overlayOpacity": "50%", "textMarginLeft": "5%", "textPaddingTop": "8px", "backgroundColor": "transparent", "textMarginRight": "5%", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "20px", "textPaddingRight": "16px", "customItemClasses": null, "textPaddingBottom": "8px", "verticalTextAlign": "center", "horizontalTextAlign": "flex-start", "textBorderRadiusTopLeft": "3px", "textBorderRadiusTopRight": "3px", "textBorderRadiusBottomLeft": "3px", "textBorderRadiusBottomRight": "3px"}, {"url": "#demo-link", "text": {"value": "<div><img style=\\"max-width:75%;\\" alt=\\"\\\\Stratus Slider Text\\" src=\\"' . self::$cmsImageIds[37] . '\\"></div>\\n<h2 class=\\"h4\\">Vorlage 3 - jetzt entdecken</h2>", "source": "static"}, "color": "#9e8377", "newTab": false, "mediaId": "' . self::$cmsImageIds[29] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[29] . '", "animation": "kenburns-top-right", "codeEditor": true, "animationIn": "slide-in-bck-center", "textMargins": false, "overlayColor": "#000000", "textMaxWidth": "600px", "textMinWidth": null, "textPaddings": false, "textMarginTop": "20px", "overlayOpacity": "50%", "textMarginLeft": "5%", "textPaddingTop": "8px", "backgroundColor": "transparent", "textMarginRight": "5%", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "20px", "textPaddingRight": "16px", "customItemClasses": null, "textPaddingBottom": "8px", "verticalTextAlign": "center", "horizontalTextAlign": "flex-start", "textBorderRadiusTopLeft": "3px", "textBorderRadiusTopRight": "3px", "textBorderRadiusBottomLeft": "3px", "textBorderRadiusBottomRight": "3px"}], "source": "static"}, "customClasses": {"value": null, "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "navigationDots": {"value": null, "source": "static"}, "autoplayTimeout": {"value": 5000, "source": "static"}, "navigationArrows": {"value": "inside", "source": "static"}, "autoplayHoverPause": {"value": true, "source": "static"}, "elementBorderRadius": {"value": false, "source": "static"}, "elementBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "elementBorderRadiusTopRight": {"value": "6px", "source": "static"}, "elementBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "elementBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
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
                                'type' => 'text-teaser',
                                'locked' => 0,
                                'cssClass' => 'zen-animate slide-in-blurred-bottom',
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "100px",
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
                                                'config' => json_decode('{"content": {"value": "<h2 style=\"text-align: center; font-size: 60px;\">TOP STORIES</h2><br>\n                        <p style=\"text-align: center;\"><i>Our best Fashion Stories</i></p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content": {"value": "<h2 style=\"text-align: center; font-size: 60px;\">TOP STORIES</h2><br>\n                        <p style=\"text-align: center;\"><i>Our best Fashion Stories</i></p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                ]
                            ],
                            [
                                'position' => 1,
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
                                        'type' => 'image',
                                        'slot' => 'left-image',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[30] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "300px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[30] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "300px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
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
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[31] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "300px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[31] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "300px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
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
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[32] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "300px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[32] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "300px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'text',
                                        'slot' => 'left-text',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": "<div style=\"text-align: center;\"><a target=\"_self\" href=\"/demo-3/Shop/Fashion/Stories/Outdoor/\" class=\"btn btn-outline-secondary\">Outdoor</a><br></div>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content": {"value": "<div style=\"text-align: center;\"><a target=\"_self\" href=\"/demo-3/Shop/Fashion/Stories/Outdoor/\" class=\"btn btn-outline-secondary\">Outdoor</a><br></div>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
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
                                                'config' => json_decode('{"content": {"value": "<div style=\"text-align: center;\"><a target=\"_self\" href=\"/demo-3/Shop/Fashion/Stories/Everyday/\" class=\"btn btn-outline-secondary\">Everyday</a></div>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content": {"value": "<div style=\"text-align: center;\"><a target=\"_self\" href=\"/demo-3/Shop/Fashion/Stories/Everyday/\" class=\"btn btn-outline-secondary\">Everyday</a></div>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
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
                                                'config' => json_decode('{"content": {"value": "<div style=\"text-align: center;\"><a target=\"_self\" href=\"/demo-3/Shop/Fashion/Stories/Wedding/\" class=\"btn btn-outline-secondary\">Wedding</a><br></div>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content": {"value": "<div style=\"text-align: center;\"><a target=\"_self\" href=\"/demo-3/Shop/Fashion/Stories/Wedding/\" class=\"btn btn-outline-secondary\">Wedding</a><br></div>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ]
                                ]
                            ],
                            [
                                'position' => 2,
                                'type' => 'product-slider',
                                'locked' => 0,
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "80px",
                                'marginBottom' => "80px",
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
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"title": {"value": "Topseller", "source": "static"}, "border": {"value": false, "source": "static"}, "rotate": {"value": false, "source": "static"}, "products": {"value": ' . $this->limitedProducts(7) . ', "source": "static"}, "boxLayout": {"value": "minimal", "source": "static"}, "elMinWidth": {"value": "300px", "source": "static"}, "navigation": {"value": true, "source": "static"}, "displayMode": {"value": "contain", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "productStreamLimit": {"value": 10, "source": "static"}, "productStreamSorting": {"value": "name:ASC", "source": "static"}}', true)
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
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "0",
                                'marginBottom' => "0",
                                'marginLeft' => "0",
                                'marginRight' => "0",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'zen-text-banner',
                                        'slot' => 'content',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": null, "source": "static"}, "text": {"value": "<h2 style=\"text-align:center;\">KOSTENLOSER VERSAND WELTWEIT</h2>\n<hr style=\"text-align:center;\">\n<p style=\"text-align:center;\"><b>AB EINEM WARENWERT VON 100€</b></p>", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[33] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": true, "source": "static"}, "minHeight": {"value": "40vh", "source": "static"}, "textColor": {"value": "#ffffff", "source": "static"}, "textScale": {"value": true, "source": "static"}, "imageHover": {"value": "none", "source": "static"}, "animationIn": {"value": "none", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "animationOut": {"value": "none", "source": "static"}, "overlayColor": {"value": "#424242", "source": "static"}, "customClasses": {"value": null, "source": "static"}, "headlineScale": {"value": true, "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "contentMargins": {"value": false, "source": "static"}, "overlayOpacity": {"value": "80%", "source": "static"}, "backgroundColor": {"value": "transparent", "source": "static"}, "contentMaxWidth": {"value": "800px", "source": "static"}, "contentMinWidth": {"value": null, "source": "static"}, "contentPaddings": {"value": false, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "contentMarginTop": {"value": "20px", "source": "static"}, "contentMarginLeft": {"value": "20px", "source": "static"}, "contentPaddingTop": {"value": "8px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "contentMarginRight": {"value": "20px", "source": "static"}, "contentPaddingLeft": {"value": "16px", "source": "static"}, "verticalImageAlign": {"value": "center", "source": "static"}, "contentBorderRadius": {"value": false, "source": "static"}, "contentMarginBottom": {"value": "20px", "source": "static"}, "contentPaddingRight": {"value": "16px", "source": "static"}, "contentPaddingBottom": {"value": "8px", "source": "static"}, "horizontalImageAlign": {"value": "center", "source": "static"}, "verticalContentAlign": {"value": "center", "source": "static"}, "horizontalContentAlign": {"value": "center", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "contentBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "contentBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}, "contentBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "contentBorderRadiusBottomRight": {"value": "2px", "source": "static"}}', true)
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
                                'type' => 'product-three-column',
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
                                        'type' => 'product-box',
                                        'slot' => 'left',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"product": {"value": "' . $this->randomProduct() . '", "source": "static"}, "boxLayout": {"value": "minimal", "source": "static"}, "displayMode": {"value": "contain", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"product": {"value": "' . $this->randomProduct() . '", "source": "static"}, "boxLayout": {"value": "minimal", "source": "static"}, "displayMode": {"value": "contain", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
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
                                                'config' => json_decode('{"product": {"value": "' . $this->randomProduct() . '", "source": "static"}, "boxLayout": {"value": "minimal", "source": "static"}, "displayMode": {"value": "contain", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"product": {"value": "' . $this->randomProduct() . '", "source": "static"}, "boxLayout": {"value": "minimal", "source": "static"}, "displayMode": {"value": "contain", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
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
                                                'config' => json_decode('{"product": {"value": "' . $this->randomProduct() . '", "source": "static"}, "boxLayout": {"value": "minimal", "source": "static"}, "displayMode": {"value": "contain", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"product": {"value": "' . $this->randomProduct() . '", "source": "static"}, "boxLayout": {"value": "minimal", "source": "static"}, "displayMode": {"value": "contain", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
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
                                'cssClass' => 'zen-animate fade-in-fwd',
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "80px",
                                'marginBottom' => "80px",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'image',
                                        'slot' => 'left-image',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[34] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[34] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
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
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[35] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[35] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
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
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[36] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[36] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'text',
                                        'slot' => 'left-text',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": "<h2 style=\"text-align: center;\">Lorem Ipsum dolor</h2>\n                        <p style=\"text-align: center;\">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, \n                        sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, \n                        sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
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
                                            ],
                                            'en-GB' => [
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
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content": {"value": "<h2 style=\"text-align: center;\">Lorem Ipsum dolor</h2>\n                        <p style=\"text-align: center;\">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, \n                        sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, \n                        sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
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

    private function home4(Context $context): array
    {
        return [
            [
                'id' => self::$cmsPageIds[3],
                'type' => 'landingpage',
                'locked' => 0,
                'previewMediaId' => self::$previewImages['stratus'],
                'name' => $this->translationHelper->adjustTranslations([
                    'de-DE' => 'Startseite Stratus - Set 4',
                    'en-GB' => 'Homepage Stratus - Set 4',
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
                                                'config' => json_decode('{"axis": {"value": "horizontal", "source": "static"}, "loop": {"value": false, "source": "static"}, "mode": {"value": "gallery", "source": "static"}, "items": {"value": 1, "source": "static"}, "speed": {"value": 500, "source": "static"}, "gutter": {"value": 0, "source": "static"}, "rewind": {"value": true, "source": "static"}, "autoplay": {"value": false, "source": "static"}, "minHeight": {"value": "60vh", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "sliderItems": {"value": [{"url": "#demo-link", "text": {"value": "<h1 class=\"h2\"><strong>Theme<br></strong><strong style=\"letter-spacing: 0px;\">Stratus</strong></h1>\n<h2 class=\"h5\">Vorlage 4</h2>\n<a href=\"#demo-link\">- Jetzt testen -</a>\n", "source": "static"}, "color": "#676f5d", "newTab": false, "mediaId": "' . self::$cmsImageIds[38] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[38] . '", "animation": "kenburns-bottom-left", "textScale": true, "animationIn": "fade-in-top", "textMargins": false, "overlayColor": "#000000", "textMaxWidth": "600px", "textMinWidth": null, "textPaddings": false, "headlineScale": true, "textMarginTop": "20px", "overlayOpacity": "50%", "textMarginLeft": "5%", "textPaddingTop": "8px", "backgroundColor": "transparent", "textMarginRight": "5%", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "20px", "textPaddingRight": "16px", "customItemClasses": null, "textPaddingBottom": "8px", "verticalTextAlign": "center", "horizontalTextAlign": "flex-start", "textBorderRadiusTopLeft": "3px", "textBorderRadiusTopRight": "3px", "textBorderRadiusBottomLeft": "3px", "textBorderRadiusBottomRight": "3px"}, {"url": "#demo-link", "text": {"value": "<h2><strong>Theme<br /></strong><strong style=\"letter-spacing:0px;\">Stratus</strong></h2>\n<h2 class=\"h5\">Vorlage 4</h2>\n<a href=\"#demo-link\">- Jetzt testen -</a>\n", "source": "static"}, "color": "#676f5d", "newTab": false, "mediaId": "' . self::$cmsImageIds[39] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[39] . '", "animation": "kenburns-top-right", "textScale": true, "animationIn": "fade-in-top", "textMargins": false, "overlayColor": "#000000", "textMaxWidth": "600px", "textMinWidth": null, "textPaddings": false, "headlineScale": true, "textMarginTop": "20px", "overlayOpacity": "50%", "textMarginLeft": "5%", "textPaddingTop": "8px", "backgroundColor": "transparent", "textMarginRight": "5%", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "20px", "textPaddingRight": "16px", "customItemClasses": null, "textPaddingBottom": "8px", "verticalTextAlign": "center", "horizontalTextAlign": "flex-start", "textBorderRadiusTopLeft": "3px", "textBorderRadiusTopRight": "3px", "textBorderRadiusBottomLeft": "3px", "textBorderRadiusBottomRight": "3px"}, {"url": "#demo-link", "text": {"value": "<h2><strong>Theme<br /></strong><strong style=\"letter-spacing:0px;\">Stratus</strong></h2 class=\"h5\">\n<h5>Vorlage 4</h5>\n<a href=\"#demo-link\">- Jetzt testen -</a>", "source": "static"}, "color": "#c59936", "newTab": false, "mediaId": "' . self::$cmsImageIds[40] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[40] . '", "animation": "kenburns-bottom-left", "textScale": true, "animationIn": "fade-in-top", "textMargins": false, "overlayColor": "#000000", "textMaxWidth": "600px", "textMinWidth": null, "textPaddings": false, "headlineScale": true, "textMarginTop": "20px", "overlayOpacity": "50%", "textMarginLeft": "5%", "textPaddingTop": "8px", "backgroundColor": "transparent", "textMarginRight": "5%", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "20px", "textPaddingRight": "16px", "customItemClasses": null, "textPaddingBottom": "8px", "verticalTextAlign": "center", "horizontalTextAlign": "flex-start", "textBorderRadiusTopLeft": "3px", "textBorderRadiusTopRight": "3px", "textBorderRadiusBottomLeft": "3px", "textBorderRadiusBottomRight": "3px"}], "source": "static"}, "customClasses": {"value": null, "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "navigationDots": {"value": null, "source": "static"}, "autoplayTimeout": {"value": 5000, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "navigationArrows": {"value": "inside", "source": "static"}, "autoplayHoverPause": {"value": true, "source": "static"}, "elementBorderRadius": {"value": false, "source": "static"}, "elementBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "elementBorderRadiusTopRight": {"value": "6px", "source": "static"}, "elementBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "elementBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"axis": {"value": "horizontal", "source": "static"}, "loop": {"value": false, "source": "static"}, "mode": {"value": "gallery", "source": "static"}, "items": {"value": 1, "source": "static"}, "speed": {"value": 500, "source": "static"}, "gutter": {"value": 0, "source": "static"}, "rewind": {"value": true, "source": "static"}, "autoplay": {"value": false, "source": "static"}, "minHeight": {"value": "60vh", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "sliderItems": {"value": [{"url": "#demo-link", "text": {"value": "<h1 class=\"h2\"><strong>Theme<br /></strong><strong style=\"letter-spacing:0px;\">Stratus</strong></h1>\n<h2 class=\"h5\">Vorlage 4</h2>\n<a href=\"#demo-link\">- Jetzt testen -</a>", "source": "static"}, "color": "#676f5d", "newTab": false, "mediaId": "' . self::$cmsImageIds[38] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[38] . '", "animation": "kenburns-bottom-left", "textScale": true, "animationIn": "fade-in-top", "textMargins": false, "overlayColor": "#000000", "textMaxWidth": "600px", "textMinWidth": null, "textPaddings": false, "headlineScale": true, "textMarginTop": "20px", "overlayOpacity": "50%", "textMarginLeft": "5%", "textPaddingTop": "8px", "backgroundColor": "transparent", "textMarginRight": "5%", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "20px", "textPaddingRight": "16px", "customItemClasses": null, "textPaddingBottom": "8px", "verticalTextAlign": "center", "horizontalTextAlign": "flex-start", "textBorderRadiusTopLeft": "3px", "textBorderRadiusTopRight": "3px", "textBorderRadiusBottomLeft": "3px", "textBorderRadiusBottomRight": "3px"}, {"url": "#demo-link", "text": {"value": "<h2><strong>Theme<br /></strong><strong style=\"letter-spacing:0px;\">Stratus</strong></h2>\n<h2 class=\"h5\">Vorlage 4</h2>\n<a href=\"#demo-link\">- Jetzt testen -</a>", "source": "static"}, "color": "#676f5d", "newTab": false, "mediaId": "' . self::$cmsImageIds[39] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[39] . '", "animation": "kenburns-top-right", "textScale": true, "animationIn": "fade-in-top", "textMargins": false, "overlayColor": "#000000", "textMaxWidth": "600px", "textMinWidth": null, "textPaddings": false, "headlineScale": true, "textMarginTop": "20px", "overlayOpacity": "50%", "textMarginLeft": "5%", "textPaddingTop": "8px", "backgroundColor": "transparent", "textMarginRight": "5%", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "20px", "textPaddingRight": "16px", "customItemClasses": null, "textPaddingBottom": "8px", "verticalTextAlign": "center", "horizontalTextAlign": "flex-start", "textBorderRadiusTopLeft": "3px", "textBorderRadiusTopRight": "3px", "textBorderRadiusBottomLeft": "3px", "textBorderRadiusBottomRight": "3px"}, {"url": "#demo-link", "text": {"value": "<h2><strong>Theme<br /></strong><strong style=\"letter-spacing:0px;\">Stratus</strong></h2 class=\"h5\">\n<h5>Vorlage 4</h5>\n<a href=\"#demo-link\">- Jetzt testen -</a>", "source": "static"}, "color": "#c59936", "newTab": false, "mediaId": "' . self::$cmsImageIds[40] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[40] . '", "animation": "kenburns-bottom-left", "textScale": true, "animationIn": "fade-in-top", "textMargins": false, "overlayColor": "#000000", "textMaxWidth": "600px", "textMinWidth": null, "textPaddings": false, "headlineScale": true, "textMarginTop": "20px", "overlayOpacity": "50%", "textMarginLeft": "5%", "textPaddingTop": "8px", "backgroundColor": "transparent", "textMarginRight": "5%", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "20px", "textPaddingRight": "16px", "customItemClasses": null, "textPaddingBottom": "8px", "verticalTextAlign": "center", "horizontalTextAlign": "flex-start", "textBorderRadiusTopLeft": "3px", "textBorderRadiusTopRight": "3px", "textBorderRadiusBottomLeft": "3px", "textBorderRadiusBottomRight": "3px"}], "source": "static"}, "customClasses": {"value": null, "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "navigationDots": {"value": null, "source": "static"}, "autoplayTimeout": {"value": 5000, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "navigationArrows": {"value": "inside", "source": "static"}, "autoplayHoverPause": {"value": true, "source": "static"}, "elementBorderRadius": {"value": false, "source": "static"}, "elementBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "elementBorderRadiusTopRight": {"value": "6px", "source": "static"}, "elementBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "elementBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
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
                                'type' => 'zen-layout-simple-teaser',
                                'locked' => 0,
                                'cssClass' => 'zen-animate fade-in-bottom',
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "40px",
                                'marginBottom' => "40px",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'zen-teaser',
                                        'slot' => 'left-top',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "Lorem ipsum dolor", "source": "static"}, "color": {"value": "#333333", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[41] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "16px", "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "distance-arrow", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "400", "source": "static"}, "imageHover": {"value": "none", "source": "static"}, "animationIn": {"value": "none", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "none", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "300px", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": false, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "8px", "source": "static"}, "backgroundColor": {"value": "#ffffff", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "16px", "source": "static"}, "textBorderRadius": {"value": false, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "16px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "textPaddingBottom": {"value": "8px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": null, "source": "static"}, "horizontalTextAlign": {"value": "flex-start", "source": "static"}, "horizontalImageAlign": {"value": null, "source": "static"}, "textBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "textBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "Lorem ipsum dolor", "source": "static"}, "color": {"value": "#333333", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[41] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "16px", "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "distance-arrow", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "400", "source": "static"}, "imageHover": {"value": "none", "source": "static"}, "animationIn": {"value": "none", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "none", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "300px", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": false, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "8px", "source": "static"}, "backgroundColor": {"value": "#ffffff", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "16px", "source": "static"}, "textBorderRadius": {"value": false, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "16px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "textPaddingBottom": {"value": "8px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": null, "source": "static"}, "horizontalTextAlign": {"value": "flex-start", "source": "static"}, "horizontalImageAlign": {"value": null, "source": "static"}, "textBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "textBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
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
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "Lorem ipsum dolor", "source": "static"}, "color": {"value": "#333333", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[42] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "16px", "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "distance-arrow", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "400", "source": "static"}, "imageHover": {"value": "none", "source": "static"}, "animationIn": {"value": "none", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "none", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "300px", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": false, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "8px", "source": "static"}, "backgroundColor": {"value": "#ffffff", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "16px", "source": "static"}, "textBorderRadius": {"value": false, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "16px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "textPaddingBottom": {"value": "8px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": null, "source": "static"}, "horizontalTextAlign": {"value": "flex-start", "source": "static"}, "horizontalImageAlign": {"value": null, "source": "static"}, "textBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "textBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "Lorem ipsum dolor", "source": "static"}, "color": {"value": "#333333", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[42] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "16px", "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "distance-arrow", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "400", "source": "static"}, "imageHover": {"value": "none", "source": "static"}, "animationIn": {"value": "none", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "none", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "300px", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": false, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "8px", "source": "static"}, "backgroundColor": {"value": "#ffffff", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "16px", "source": "static"}, "textBorderRadius": {"value": false, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "16px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "textPaddingBottom": {"value": "8px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": null, "source": "static"}, "horizontalTextAlign": {"value": "flex-start", "source": "static"}, "horizontalImageAlign": {"value": null, "source": "static"}, "textBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "textBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
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
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "Lorem ipsum dolor", "source": "static"}, "color": {"value": "#333333", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[43] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "16px", "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "distance-arrow", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "400", "source": "static"}, "imageHover": {"value": "none", "source": "static"}, "animationIn": {"value": "none", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "none", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "300px", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": false, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "8px", "source": "static"}, "backgroundColor": {"value": "#ffffff", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "16px", "source": "static"}, "textBorderRadius": {"value": false, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "16px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "textPaddingBottom": {"value": "8px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": null, "source": "static"}, "horizontalTextAlign": {"value": "flex-start", "source": "static"}, "horizontalImageAlign": {"value": null, "source": "static"}, "textBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "textBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "Lorem ipsum dolor", "source": "static"}, "color": {"value": "#333333", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[43] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "16px", "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "distance-arrow", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "400", "source": "static"}, "imageHover": {"value": "none", "source": "static"}, "animationIn": {"value": "none", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "none", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "300px", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": false, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "8px", "source": "static"}, "backgroundColor": {"value": "#ffffff", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "16px", "source": "static"}, "textBorderRadius": {"value": false, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "16px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "textPaddingBottom": {"value": "8px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": null, "source": "static"}, "horizontalTextAlign": {"value": "flex-start", "source": "static"}, "horizontalImageAlign": {"value": null, "source": "static"}, "textBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "textBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
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
                        'backgroundColor' => '#fefefe',
                        'type' => 'default',
                        'blocks' => [
                            [
                                'position' => 0,
                                'type' => 'image-text-cover',
                                'locked' => 0,
                                'cssClass' => 'zen-animate fade-in-top',
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "NULL",
                                'marginBottom' => "NULL",
                                'marginLeft' => "0",
                                'marginRight' => "80px",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'zen-teaser',
                                        'slot' => 'left',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "Deko-Trends entecken", "source": "static"}, "color": {"value": "#bab4ab", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[44] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": true, "source": "static"}, "fontSize": {"value": "24px", "source": "static"}, "minHeight": {"value": "800px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "none", "source": "static"}, "fontFamily": {"value": "headline", "source": "static"}, "fontWeight": {"value": "600", "source": "static"}, "imageHover": {"value": "none", "source": "static"}, "animationIn": {"value": "fade-in", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "fade-out", "source": "static"}, "overlayColor": {"value": "#f2efeb", "source": "static"}, "textMaxWidth": {"value": "300px", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": false, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "8px", "source": "static"}, "backgroundColor": {"value": "", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "16px", "source": "static"}, "textBorderRadius": {"value": false, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "16px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "textPaddingBottom": {"value": "8px", "source": "static"}, "verticalTextAlign": {"value": "center", "source": "static"}, "verticalImageAlign": {"value": null, "source": "static"}, "horizontalTextAlign": {"value": "center", "source": "static"}, "horizontalImageAlign": {"value": null, "source": "static"}, "textBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "textBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "Deko-Trends entecken", "source": "static"}, "color": {"value": "#bab4ab", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[44] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": true, "source": "static"}, "fontSize": {"value": "24px", "source": "static"}, "minHeight": {"value": "800px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "none", "source": "static"}, "fontFamily": {"value": "headline", "source": "static"}, "fontWeight": {"value": "600", "source": "static"}, "imageHover": {"value": "none", "source": "static"}, "animationIn": {"value": "fade-in", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "fade-out", "source": "static"}, "overlayColor": {"value": "#f2efeb", "source": "static"}, "textMaxWidth": {"value": "300px", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": false, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "8px", "source": "static"}, "backgroundColor": {"value": "", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "16px", "source": "static"}, "textBorderRadius": {"value": false, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "16px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "textPaddingBottom": {"value": "8px", "source": "static"}, "verticalTextAlign": {"value": "center", "source": "static"}, "verticalImageAlign": {"value": null, "source": "static"}, "horizontalTextAlign": {"value": "center", "source": "static"}, "horizontalImageAlign": {"value": null, "source": "static"}, "textBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "textBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
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
                                                'config' => json_decode('{"content": {"value": "<p style=\"letter-spacing: 2px;\">LIVING STORIES</p>\n<h2 style=\"font-weight: 300; line-height: 1; font-size: 60px;\">New Deco Trend - <br>Minimal Deco</h2>\n<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr,&nbsp;<span style=\"letter-spacing: 0px;\">sed diam nonumy eirmod <br>empor invidunt ut labore et dolore&nbsp;magna aliquyam erat, sed diam voluptua. <br>At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren...</span></p>\n<p><a class=\"btn btn-outline-secondary\" href=\"#demo-link\">mehr erfahren</a></p>\n", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content": {"value": "<p style=\"letter-spacing: 2px;\">LIVING STORIES</p>\n<h2 style=\"font-weight: 300; line-height: 1; font-size: 60px;\">New Deco Trend - <br>Minimal Deco</h2>\n<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr,&nbsp;<span style=\"letter-spacing: 0px;\">sed diam nonumy eirmod <br>empor invidunt ut labore et dolore&nbsp;magna aliquyam erat, sed diam voluptua. <br>At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren...</span></p>\n<p><a class=\"btn btn-outline-secondary\" href=\"#demo-link\">mehr erfahren</a></p>\n", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}}', true)
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
                        'type' => 'default',
                        'blocks' => [
                            [
                                'position' => 0,
                                'type' => 'image-text-cover',
                                'locked' => 0,
                                'cssClass' => 'zen-animate fade-in-bottom',
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "NULL",
                                'marginBottom' => "NULL",
                                'marginLeft' => "80px",
                                'marginRight' => "0px",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'zen-teaser',
                                        'slot' => 'right',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "Deko-trends entdecken", "source": "static"}, "color": {"value": "#ffffff", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[45] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": true, "source": "static"}, "fontSize": {"value": "24px", "source": "static"}, "minHeight": {"value": "800px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "none", "source": "static"}, "fontFamily": {"value": "headline", "source": "static"}, "fontWeight": {"value": "400", "source": "static"}, "imageHover": {"value": "none", "source": "static"}, "animationIn": {"value": "fade-in", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "fade-out", "source": "static"}, "overlayColor": {"value": "#ebb72a", "source": "static"}, "textMaxWidth": {"value": "300px", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": false, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "8px", "source": "static"}, "backgroundColor": {"value": "", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "16px", "source": "static"}, "textBorderRadius": {"value": false, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "16px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "textPaddingBottom": {"value": "8px", "source": "static"}, "verticalTextAlign": {"value": "center", "source": "static"}, "verticalImageAlign": {"value": null, "source": "static"}, "horizontalTextAlign": {"value": "center", "source": "static"}, "horizontalImageAlign": {"value": null, "source": "static"}, "textBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "textBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "Deko-trends entdecken", "source": "static"}, "color": {"value": "#ffffff", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[45] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": true, "source": "static"}, "fontSize": {"value": "24px", "source": "static"}, "minHeight": {"value": "800px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "none", "source": "static"}, "fontFamily": {"value": "headline", "source": "static"}, "fontWeight": {"value": "400", "source": "static"}, "imageHover": {"value": "none", "source": "static"}, "animationIn": {"value": "fade-in", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "fade-out", "source": "static"}, "overlayColor": {"value": "#ebb72a", "source": "static"}, "textMaxWidth": {"value": "300px", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": false, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "8px", "source": "static"}, "backgroundColor": {"value": "", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "16px", "source": "static"}, "textBorderRadius": {"value": false, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "16px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "textPaddingBottom": {"value": "8px", "source": "static"}, "verticalTextAlign": {"value": "center", "source": "static"}, "verticalImageAlign": {"value": null, "source": "static"}, "horizontalTextAlign": {"value": "center", "source": "static"}, "horizontalImageAlign": {"value": null, "source": "static"}, "textBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "textBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'text',
                                        'slot' => 'left',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": "<p style=\"letter-spacing: 2px;\">LIVING STORIES</p>\n<h2 style=\"font-weight: 300; line-height: 1; font-size: 60px;\">New Deco Trend - <br>Minimal Deco</h2>\n<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod<br>tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero <br>eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren...</p>\n<p><a class=\"btn btn-outline-secondary\" href=\"#demo-link\">mehr erfahren</a></p>\n", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content": {"value": "<p style=\"letter-spacing: 2px;\">LIVING STORIES</p>\n<h2 style=\"font-weight: 300; line-height: 1; font-size: 60px;\">New Deco Trend - <br>Minimal Deco</h2>\n<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod<br>tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero <br>eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren...</p>\n<p><a class=\"btn btn-outline-secondary\" href=\"#demo-link\">mehr erfahren</a></p>\n", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}}', true)
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
                                                'config' => json_decode('{"content": {"value": "<p style=\"text-align: center; letter-spacing: 2px;\">BEST LIVING DEALS</p>\n<h2 style=\"text-align: center; font-weight: 300; font-size: 60px;\">Recent Arrivals</h2>\n<br>\n<p style=\"text-align: center;\">\n    Lorem ipsum dolor sit amet, consetetur sadipscing elitr.\n</p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content": {"value": "<p style=\"text-align: center; letter-spacing: 2px;\">BEST LIVING DEALS</p>\n<h2 style=\"text-align: center; font-weight: 300; font-size: 60px;\">Recent Arrivals</h2>\n<br>\n<p style=\"text-align: center;\">\n    Lorem ipsum dolor sit amet, consetetur sadipscing elitr.\n</p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                ]
                            ],
                            [
                                'position' => 1,
                                'type' => 'product-three-column',
                                'locked' => 0,
                                'cssClass' => 'zen-animate fade-in-bottom',
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "40px",
                                'marginBottom' => "40px",
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
                                            ],
                                            'en-GB' => [
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
                                            ],
                                            'en-GB' => [
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
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"product": {"value": "' . $this->randomProduct() . '", "source": "static"}, "boxLayout": {"value": "image", "source": "static"}, "displayMode": {"value": "contain", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ]
                                ]
                            ],
                            [
                                'position' => 2,
                                'type' => 'text-teaser',
                                'locked' => 0,
                                'cssClass' => 'zen-animate fade-in-bottom',
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "20px",
                                'marginBottom' => "40px",
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
                                                'config' => json_decode('{"content": {"value": "<p style=\"text-align: center;\"><a class=\"btn btn-lg btn-outline-primary\" href=\"#demo-link\" target=\"_self\">Show more</a><br></p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content": {"value": "<p style=\"text-align: center;\"><a class=\"btn btn-lg btn-outline-primary\" href=\"#demo-link\" target=\"_self\">Show more</a><br></p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
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
                                                'config' => json_decode('{"content": {"value": "<p style=\"text-align: center; letter-spacing: 2px;\">LOREM LIVING IPSUM</p>\n<h2 style=\"text-align: center; font-weight: 300; font-size: 60px;\">Living Inspiration</h2>\n<br>\n<p style=\"text-align: center;\">\n    Lorem ipsum dolor sit amet, consetetur sadipscing elitr.\n</p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content": {"value": "<p style=\"text-align: center; letter-spacing: 2px;\">LOREM LIVING IPSUM</p>\n<h2 style=\"text-align: center; font-weight: 300; font-size: 60px;\">Living Inspiration</h2>\n<br>\n<p style=\"text-align: center;\">\n    Lorem ipsum dolor sit amet, consetetur sadipscing elitr.\n</p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ]
                                ]
                            ],
                            [
                                'position' => 1,
                                'type' => 'image-highlight-row',
                                'locked' => 0,
                                'cssClass' => 'zen-animate fade-in-bottom',
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "40px",
                                'marginBottom' => "40px",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'image',
                                        'slot' => 'left',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[46] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[46] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'image',
                                        'slot' => 'center',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[47] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[47] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
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
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[48] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[48] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
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