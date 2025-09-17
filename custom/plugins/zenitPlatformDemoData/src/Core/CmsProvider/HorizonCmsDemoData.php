<?php declare(strict_types=1);

namespace zenit\PlatformDemoData\Core\CmsProvider;

use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\Uuid\Uuid;
use zenit\PlatformDemoData\Core\AbstractCmsDemoData;

/**
 * @extends AbstractCmsDemoData
 *
 */
class HorizonCmsDemoData extends AbstractCmsDemoData
{
    /**
     * Method that returns the Layout Ids
     *
     * @return array
     *
     */
    public static array $cmsPageIds = [
        'f2c1b193c10b4e2aa9bde9e35b5f7b9c',
        '6794b45e67e240559a978b6f4c1599c0',
        '5963b37d595f48918432540638ee71ad',
    ];

    /**
     * Method that returns the Image Ids
     *
     * @return array
     *
     */
    public static array $cmsImageIds = [
        'ce1b0cd98ecc48238c75a9a704361687',
        'dd1a4db9dbc94135998c2f5dc78eb98f',
        'b3f0ee94cbee4e63971aaa2f4d96dd92',
        '43b504f10a07453491566b18b32e67bd',
        '437cac5fff1842d2a9423dafd5690eab',
        'ba9a95ce68fa4871b918f17b2e174a2d',
        '22364b8f671e46779a742e85b2abb1b5',
        'ae985e52fdc64dbab59c54cf7650f4eb',
        'adee20f91d104f049078184daab4aa3c',
        'e7eec8905a124432a8b25767a0f8a687',
        '3ff2584370af41faa55825b0feddb946',
        '74f549d669394eefbef1d466bb43ae94',
        'acdfeb9fa42f480db13e194b413fb464',
        '8f0b7f1da84a4799a898775745550479',
        '0ff58774fea14abf9fa135eba4d2287e',
        'e034b92fc0c04931b20b8e30e6b9468e',
        'f5303a14f77e4f97929516cfdc7d27f2',
        '7b445eb6bca342f9ab38ce1a9f8433fe',
        '8e2f6f2405a74869bfe3793217c4a003',
        '52dc6892f448433e89543adf7b9a051f',
        '1909b2fd3725458a8a9f084e4dd6761d',
        '85ad8a2d02d146e9aae8073968c47f03',
        '48a70acdb68243758dcd78c2bbbd8b43',
        '47db38f4d86643f09dfe9257fc7ed917',
        'c3d2bbe9e5b9497e94d76877313dc237',
        'f380942aa1814dbd821761d95f7e1a03',
        '42cd49256a8e4799ae4869a1eaae0d56',
        '0af4c6eebda14fc4b29abc4502b3cc73',
        '1e20e07d3a9444d7a1c7622de2931019',
        'ac158648e3b34f8a9659728e0d06b773',
        '780231d87f084297945a12039eb24aca',
        'a9e596ba8e2641fe8d20719952002792',
        '711400f63ccb43279cecb550312ea0ce',
        'df6cae034a3f406aa35f154453267463',
        'b6267e3fd64b4005aeced2975eb8b38f',
        'f87f9c89b4ed4d16861632ba452b6f45',
        'e7d0796b04e247d69451b5da69dbb31e',
        '504709d796164d3d8f05ea3c9145b59f',
        'cc3541d1b8ac4e089e306145ddb1edd0',
        '356fee72fc254d97957a4e884e885363',
        '86563c73af574a9d8eb6ee3e6f0343a5',
        '9cc3b005d4104dd89c90c493ebf7393e',
        'e509f5ff314c4699958e0672478067b8',
        '8dc6cc261e474cb9909de91339355212',
        '6ea02353105047cfac3f310369fa9ced',
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
        foreach (array_merge(self::$cmsImageIds, [self::$previewImages['horizon']]) as $imageId) {
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
        foreach (array_merge(self::$cmsImageIds, [self::$previewImages['horizon']]) as $imageId) {
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
                'previewMediaId' => self::$previewImages['horizon'],
                'name' => $this->translationHelper->adjustTranslations([
                    'de-DE' => 'Startseite Horizon - Set 1',
                    'en-GB' => 'Homepage Horizon - Set 1',
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
                                'cssClass' => 'zen-animate fade-in-top',
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
                                                'config' => json_decode('{"axis": {"value": "vertical", "source": "static"}, "loop": {"value": false, "source": "static"}, "mode": {"value": "carousel", "source": "static"}, "items": {"value": 1, "source": "static"}, "speed": {"value": 500, "source": "static"}, "gutter": {"value": 0, "source": "static"}, "rewind": {"value": true, "source": "static"}, "autoplay": {"value": true, "source": "static"}, "minHeight": {"value": "300px", "source": "static"}, "displayMode": {"value": "standard", "source": "static"}, "sliderItems": {"value": [{"url": "#demo-link", "text": {"value": "<h1 class=\"h2\" style=\"text-align:left;\">Theme Horizon<br />Minimal Design Demo</h1>\n<div class=\"h6\" style=\"text-align:left;letter-spacing:2px;\">⎯ EXPLORE</div>", "source": "static"}, "color": "#000000", "newTab": false, "mediaId": "' . self::$cmsImageIds[0] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[0] . '", "animation": "parallax-mousemove", "textScale": true, "animationIn": "slide-in-blurred-bottom", "textMargins": false, "overlayColor": "#000000", "textMaxWidth": "800px", "textMinWidth": null, "textPaddings": false, "headlineScale": true, "textMarginTop": "20px", "overlayOpacity": "50%", "textMarginLeft": "5%", "textPaddingTop": "8px", "backgroundColor": "transparent", "textMarginRight": "5%", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "20px", "textPaddingRight": "16px", "customItemClasses": null, "textPaddingBottom": "8px", "verticalTextAlign": "center", "horizontalTextAlign": "flex-start", "textBorderRadiusTopLeft": "3px", "textBorderRadiusTopRight": "3px", "textBorderRadiusBottomLeft": "3px", "textBorderRadiusBottomRight": "3px"}, {"url": "#demo-link", "text": {"value": "<h2>Theme Horizon<br />Minimal Design Demo</h2>\n<div class=\"h6\" style=\"letter-spacing:2px;\">⎯ EXPLORE</div>", "source": "static"}, "color": "#000000", "newTab": false, "mediaId": "' . self::$cmsImageIds[1] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[1] . '", "animation": "parallax-mousemove", "textScale": true, "animationIn": "slide-in-left", "textMargins": false, "overlayColor": "#000000", "textMaxWidth": "600px", "textMinWidth": null, "textPaddings": false, "headlineScale": true, "textMarginTop": "20px", "overlayOpacity": "50%", "textMarginLeft": "5%", "textPaddingTop": "8px", "backgroundColor": "transparent", "textMarginRight": "5%", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "20px", "textPaddingRight": "16px", "customItemClasses": null, "textPaddingBottom": "8px", "verticalTextAlign": "center", "horizontalTextAlign": "flex-start", "textBorderRadiusTopLeft": "3px", "textBorderRadiusTopRight": "3px", "textBorderRadiusBottomLeft": "3px", "textBorderRadiusBottomRight": "3px"}, {"url": "#demo-link", "text": {"value": "<h2 style=\"text-align:right;\">Theme Horizon<br />Minimal Design Demo</h2>\n<div class=\"h6\" style=\"text-align:right;letter-spacing:2px;\">⎯ EXPLORE</div>", "source": "static"}, "color": "#000000", "newTab": false, "mediaId": "' . self::$cmsImageIds[2] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[2] . '", "animation": "parallax-mousemove", "textScale": true, "animationIn": "slide-in-right", "textMargins": false, "overlayColor": "#000000", "textMaxWidth": "600px", "textMinWidth": null, "textPaddings": false, "headlineScale": true, "textMarginTop": "20px", "overlayOpacity": "50%", "textMarginLeft": "5%", "textPaddingTop": "8px", "backgroundColor": "transparent", "textMarginRight": "5%", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "20px", "textPaddingRight": "16px", "customItemClasses": null, "textPaddingBottom": "8px", "verticalTextAlign": "center", "horizontalTextAlign": "flex-end", "textBorderRadiusTopLeft": "3px", "textBorderRadiusTopRight": "3px", "textBorderRadiusBottomLeft": "3px", "textBorderRadiusBottomRight": "3px"}], "source": "static"}, "customClasses": {"value": null, "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "navigationDots": {"value": "inside", "source": "static"}, "autoplayTimeout": {"value": 5000, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "navigationArrows": {"value": "inside", "source": "static"}, "autoplayHoverPause": {"value": true, "source": "static"}, "elementBorderRadius": {"value": false, "source": "static"}, "elementBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "elementBorderRadiusTopRight": {"value": "6px", "source": "static"}, "elementBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "elementBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"axis": {"value": "vertical", "source": "static"}, "loop": {"value": false, "source": "static"}, "mode": {"value": "carousel", "source": "static"}, "items": {"value": 1, "source": "static"}, "speed": {"value": 500, "source": "static"}, "gutter": {"value": 0, "source": "static"}, "rewind": {"value": true, "source": "static"}, "autoplay": {"value": true, "source": "static"}, "minHeight": {"value": "300px", "source": "static"}, "displayMode": {"value": "standard", "source": "static"}, "sliderItems": {"value": [{"url": "#demo-link", "text": {"value": "<h1 class=\"h2\" style=\"text-align:left;\">Theme Horizon<br />Minimal Design Demo</h1>\n<div class=\"h6\" style=\"text-align:left;letter-spacing:2px;\">⎯ EXPLORE</div>", "source": "static"}, "color": "#000000", "newTab": false, "mediaId": "' . self::$cmsImageIds[0] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[0] . '", "animation": "parallax-mousemove", "textScale": true, "animationIn": "slide-in-blurred-bottom", "textMargins": false, "overlayColor": "#000000", "textMaxWidth": "800px", "textMinWidth": null, "textPaddings": false, "headlineScale": true, "textMarginTop": "20px", "overlayOpacity": "50%", "textMarginLeft": "5%", "textPaddingTop": "8px", "backgroundColor": "transparent", "textMarginRight": "5%", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "20px", "textPaddingRight": "16px", "customItemClasses": null, "textPaddingBottom": "8px", "verticalTextAlign": "center", "horizontalTextAlign": "flex-start", "textBorderRadiusTopLeft": "3px", "textBorderRadiusTopRight": "3px", "textBorderRadiusBottomLeft": "3px", "textBorderRadiusBottomRight": "3px"}, {"url": "#demo-link", "text": {"value": "<h2 style=\"text-align:left;\">Theme Horizon<br />Minimal Design Demo</h2>\n<div class=\"h6\" style=\"text-align:left;letter-spacing:2px;\">⎯ EXPLORE</div>", "source": "static"}, "color": "#000000", "newTab": false, "mediaId": "' . self::$cmsImageIds[1] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[1] . '", "animation": "parallax-mousemove", "textScale": true, "animationIn": "slide-in-left", "textMargins": false, "overlayColor": "#000000", "textMaxWidth": "600px", "textMinWidth": null, "textPaddings": false, "headlineScale": true, "textMarginTop": "20px", "overlayOpacity": "50%", "textMarginLeft": "5%", "textPaddingTop": "8px", "backgroundColor": "transparent", "textMarginRight": "5%", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "20px", "textPaddingRight": "16px", "customItemClasses": null, "textPaddingBottom": "8px", "verticalTextAlign": "center", "horizontalTextAlign": "flex-start", "textBorderRadiusTopLeft": "3px", "textBorderRadiusTopRight": "3px", "textBorderRadiusBottomLeft": "3px", "textBorderRadiusBottomRight": "3px"}, {"url": "#demo-link", "text": {"value": "<h2 style=\"text-align:right;\">Theme Horizon<br />Minimal Design Demo</h2>\n<div class=\"h6\" style=\"text-align:right;letter-spacing:2px;\">⎯ EXPLORE</div>", "source": "static"}, "color": "#000000", "newTab": false, "mediaId": "' . self::$cmsImageIds[2] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[2] . '", "animation": "parallax-mousemove", "textScale": true, "animationIn": "slide-in-right", "textMargins": false, "overlayColor": "#000000", "textMaxWidth": "600px", "textMinWidth": null, "textPaddings": false, "headlineScale": true, "textMarginTop": "20px", "overlayOpacity": "50%", "textMarginLeft": "5%", "textPaddingTop": "8px", "backgroundColor": "transparent", "textMarginRight": "5%", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "20px", "textPaddingRight": "16px", "customItemClasses": null, "textPaddingBottom": "8px", "verticalTextAlign": "center", "horizontalTextAlign": "flex-end", "textBorderRadiusTopLeft": "3px", "textBorderRadiusTopRight": "3px", "textBorderRadiusBottomLeft": "3px", "textBorderRadiusBottomRight": "3px"}], "source": "static"}, "customClasses": {"value": null, "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "navigationDots": {"value": "inside", "source": "static"}, "autoplayTimeout": {"value": 5000, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "navigationArrows": {"value": "inside", "source": "static"}, "autoplayHoverPause": {"value": true, "source": "static"}, "elementBorderRadius": {"value": false, "source": "static"}, "elementBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "elementBorderRadiusTopRight": {"value": "6px", "source": "static"}, "elementBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "elementBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                ]
                            ],
                            [
                                'position' => 1,
                                'type' => 'image-three-column',
                                'locked' => 0,
                                'cssClass' => 'zen-animate fade-in-top',
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "40px",
                                'marginBottom' => "20px",
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
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "Stühle & Sessel", "source": "static"}, "color": {"value": "#333333", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[3] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "45px", "source": "static"}, "minHeight": {"value": "600px", "source": "static"}, "textAlign": {"value": "left", "source": "static"}, "textHover": {"value": "none", "source": "static"}, "fontFamily": {"value": "headline", "source": "static"}, "fontWeight": {"value": "800", "source": "static"}, "imageHover": {"value": "none", "source": "static"}, "animationIn": {"value": "slide-out-left", "source": "static"}, "displayMode": {"value": "stretch", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "slide-in-left", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "300px", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": false, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "8px", "source": "static"}, "backgroundColor": {"value": "", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "16px", "source": "static"}, "textBorderRadius": {"value": false, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "16px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "textPaddingBottom": {"value": "8px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": null, "source": "static"}, "horizontalTextAlign": {"value": "flex-start", "source": "static"}, "horizontalImageAlign": {"value": null, "source": "static"}, "textBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "textBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "Stühle & Sessel", "source": "static"}, "color": {"value": "#333333", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[3] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "45px", "source": "static"}, "minHeight": {"value": "600px", "source": "static"}, "textAlign": {"value": "left", "source": "static"}, "textHover": {"value": "none", "source": "static"}, "fontFamily": {"value": "headline", "source": "static"}, "fontWeight": {"value": "800", "source": "static"}, "imageHover": {"value": "none", "source": "static"}, "animationIn": {"value": "slide-out-left", "source": "static"}, "displayMode": {"value": "stretch", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "slide-in-left", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "300px", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": false, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "8px", "source": "static"}, "backgroundColor": {"value": "", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "16px", "source": "static"}, "textBorderRadius": {"value": false, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "16px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "textPaddingBottom": {"value": "8px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": null, "source": "static"}, "horizontalTextAlign": {"value": "flex-start", "source": "static"}, "horizontalImageAlign": {"value": null, "source": "static"}, "textBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "textBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
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
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "Designer Lampen", "source": "static"}, "color": {"value": "#000000", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[4] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "46px", "source": "static"}, "minHeight": {"value": "600px", "source": "static"}, "textAlign": {"value": "left", "source": "static"}, "textHover": {"value": "none", "source": "static"}, "fontFamily": {"value": "headline", "source": "static"}, "fontWeight": {"value": "800", "source": "static"}, "imageHover": {"value": "none", "source": "static"}, "animationIn": {"value": "slide-out-left", "source": "static"}, "displayMode": {"value": "stretch", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "slide-in-left", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "300px", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": false, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "8px", "source": "static"}, "backgroundColor": {"value": "", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "16px", "source": "static"}, "textBorderRadius": {"value": false, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "16px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "textPaddingBottom": {"value": "8px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": null, "source": "static"}, "horizontalTextAlign": {"value": "flex-start", "source": "static"}, "horizontalImageAlign": {"value": null, "source": "static"}, "textBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "textBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "Designer Lampen", "source": "static"}, "color": {"value": "#000000", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[4] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "46px", "source": "static"}, "minHeight": {"value": "600px", "source": "static"}, "textAlign": {"value": "left", "source": "static"}, "textHover": {"value": "none", "source": "static"}, "fontFamily": {"value": "headline", "source": "static"}, "fontWeight": {"value": "800", "source": "static"}, "imageHover": {"value": "none", "source": "static"}, "animationIn": {"value": "slide-out-left", "source": "static"}, "displayMode": {"value": "stretch", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "slide-in-left", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "300px", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": false, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "8px", "source": "static"}, "backgroundColor": {"value": "", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "16px", "source": "static"}, "textBorderRadius": {"value": false, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "16px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "textPaddingBottom": {"value": "8px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": null, "source": "static"}, "horizontalTextAlign": {"value": "flex-start", "source": "static"}, "horizontalImageAlign": {"value": null, "source": "static"}, "textBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "textBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
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
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "Dekoration", "source": "static"}, "color": {"value": "#000000", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[5] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "46px", "source": "static"}, "minHeight": {"value": "600px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "none", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "800", "source": "static"}, "imageHover": {"value": "none", "source": "static"}, "animationIn": {"value": "slide-out-left", "source": "static"}, "displayMode": {"value": "stretch", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "slide-in-left", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "300px", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": false, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "8px", "source": "static"}, "backgroundColor": {"value": "", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "16px", "source": "static"}, "textBorderRadius": {"value": false, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "16px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "textPaddingBottom": {"value": "8px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": null, "source": "static"}, "horizontalTextAlign": {"value": "flex-start", "source": "static"}, "horizontalImageAlign": {"value": null, "source": "static"}, "textBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "textBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "Dekoration", "source": "static"}, "color": {"value": "#000000", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[5] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "46px", "source": "static"}, "minHeight": {"value": "600px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "none", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "800", "source": "static"}, "imageHover": {"value": "none", "source": "static"}, "animationIn": {"value": "slide-out-left", "source": "static"}, "displayMode": {"value": "stretch", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "slide-in-left", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "300px", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": false, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "8px", "source": "static"}, "backgroundColor": {"value": "", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "16px", "source": "static"}, "textBorderRadius": {"value": false, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "16px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "textPaddingBottom": {"value": "8px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": null, "source": "static"}, "horizontalTextAlign": {"value": "flex-start", "source": "static"}, "horizontalImageAlign": {"value": null, "source": "static"}, "textBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "textBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
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
                                'type' => 'text-hero',
                                'locked' => 0,
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "80px",
                                'marginBottom' => "20px",
                                'marginLeft' => "0",
                                'marginRight' => "0",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'text',
                                        'slot' => 'content',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": "<p style=\"text-align: center; letter-spacing: 2px;\">New In</p>\n<h2 style=\"text-align: center; font-size: 60px;\">Recent Arrivals</h2>\n<br>\n<p style=\"text-align: center;\">\n    Lorem ipsum dolor sit amet, consetetur sadipscing elitr.\n</p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content": {"value": "<p style=\"text-align: center; letter-spacing: 2px;\">New In</p>\n<h2 style=\"text-align: center; font-size: 60px;\">Recent Arrivals</h2>\n<br>\n<p style=\"text-align: center;\">\n    Lorem ipsum dolor sit amet, consetetur sadipscing elitr.\n</p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
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
                                'marginTop' => "40px",
                                'marginBottom' => "40px",
                                'marginLeft' => "0",
                                'marginRight' => "0",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'product-slider',
                                        'slot' => 'productSlider',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"title": {"value": "", "source": "static"}, "border": {"value": false, "source": "static"}, "rotate": {"value": false, "source": "static"}, "products": {"value": ' . $this->limitedProducts(7) . ', "source": "static"}, "boxLayout": {"value": "minimal", "source": "static"}, "elMinWidth": {"value": "300px", "source": "static"}, "navigation": {"value": true, "source": "static"}, "displayMode": {"value": "contain", "source": "static"}, "verticalAlign": {"value": "flex-start", "source": "static"}, "productStreamLimit": {"value": 10, "source": "static"}, "productStreamSorting": {"value": "name:ASC", "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"title": {"value": "", "source": "static"}, "border": {"value": false, "source": "static"}, "rotate": {"value": false, "source": "static"}, "products": {"value": ' . $this->limitedProducts(7) . ', "source": "static"}, "boxLayout": {"value": "minimal", "source": "static"}, "elMinWidth": {"value": "300px", "source": "static"}, "navigation": {"value": true, "source": "static"}, "displayMode": {"value": "contain", "source": "static"}, "verticalAlign": {"value": "flex-start", "source": "static"}, "productStreamLimit": {"value": 10, "source": "static"}, "productStreamSorting": {"value": "name:ASC", "source": "static"}}', true)
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
                                'type' => 'image-text-cover',
                                'locked' => 0,
                                'cssClass' => 'zen-animate flip-in-hor-bottom',
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "0",
                                'marginBottom' => "0",
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
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "Lorem ipsum dolor", "source": "static"}, "color": {"value": "#333333", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[6] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "16px", "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "distance-arrow", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "400", "source": "static"}, "imageHover": {"value": "none", "source": "static"}, "animationIn": {"value": "none", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "none", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "300px", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": false, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "8px", "source": "static"}, "backgroundColor": {"value": "#ffffff", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "16px", "source": "static"}, "textBorderRadius": {"value": false, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "16px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "textPaddingBottom": {"value": "8px", "source": "static"}, "verticalTextAlign": {"value": "center", "source": "static"}, "verticalImageAlign": {"value": null, "source": "static"}, "horizontalTextAlign": {"value": "center", "source": "static"}, "horizontalImageAlign": {"value": null, "source": "static"}, "textBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "textBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "Lorem ipsum dolor", "source": "static"}, "color": {"value": "#333333", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[6] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "16px", "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "distance-arrow", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "400", "source": "static"}, "imageHover": {"value": "none", "source": "static"}, "animationIn": {"value": "none", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "none", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "300px", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": false, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "8px", "source": "static"}, "backgroundColor": {"value": "#ffffff", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "16px", "source": "static"}, "textBorderRadius": {"value": false, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "16px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "textPaddingBottom": {"value": "8px", "source": "static"}, "verticalTextAlign": {"value": "center", "source": "static"}, "verticalImageAlign": {"value": null, "source": "static"}, "horizontalTextAlign": {"value": "center", "source": "static"}, "horizontalImageAlign": {"value": null, "source": "static"}, "textBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "textBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
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
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "Lorem ipsum dolor", "source": "static"}, "color": {"value": "#333333", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[7] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "16px", "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "distance-arrow", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "400", "source": "static"}, "imageHover": {"value": "none", "source": "static"}, "animationIn": {"value": "none", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "none", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "300px", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": false, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "8px", "source": "static"}, "backgroundColor": {"value": "#ffffff", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "16px", "source": "static"}, "textBorderRadius": {"value": false, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "16px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "textPaddingBottom": {"value": "8px", "source": "static"}, "verticalTextAlign": {"value": "center", "source": "static"}, "verticalImageAlign": {"value": null, "source": "static"}, "horizontalTextAlign": {"value": "center", "source": "static"}, "horizontalImageAlign": {"value": null, "source": "static"}, "textBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "textBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "Lorem ipsum dolor", "source": "static"}, "color": {"value": "#333333", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[7] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "16px", "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "distance-arrow", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "400", "source": "static"}, "imageHover": {"value": "none", "source": "static"}, "animationIn": {"value": "none", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "none", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "300px", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": false, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "8px", "source": "static"}, "backgroundColor": {"value": "#ffffff", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "16px", "source": "static"}, "textBorderRadius": {"value": false, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "16px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "textPaddingBottom": {"value": "8px", "source": "static"}, "verticalTextAlign": {"value": "center", "source": "static"}, "verticalImageAlign": {"value": null, "source": "static"}, "horizontalTextAlign": {"value": "center", "source": "static"}, "horizontalImageAlign": {"value": null, "source": "static"}, "textBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "textBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                ],
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
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "80px",
                                'marginBottom' => "20px",
                                'marginLeft' => "0",
                                'marginRight' => "0",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'text',
                                        'slot' => 'content',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": "<p style=\"text-align: center; letter-spacing: 2px;\">Inspiration</p>\n<h2 style=\"text-align: center; font-size: 60px;\">Rooms</h2>\n<br>\n<p style=\"text-align: center;\">\n    Lorem ipsum dolor sit amet, consetetur sadipscing elitr.\n</p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content": {"value": "<p style=\"text-align: center; letter-spacing: 2px;\">Inspiration</p>\n<h2 style=\"text-align: center; font-size: 60px;\">Rooms</h2>\n<br>\n<p style=\"text-align: center;\">\n    Lorem ipsum dolor sit amet, consetetur sadipscing elitr.\n</p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                ]
                            ],
                            [
                                'position' => 1,
                                'type' => 'image-text-row',
                                'locked' => 0,
                                'cssClass' => 'zen-animate fade-in-top',
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "20px",
                                'marginBottom' => "100px",
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
                                                'config' => json_decode('{"url": {"value": null, "source": "static"}, "media": {"value": "' . self::$cmsImageIds[8] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "640px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url": {"value": null, "source": "static"}, "media": {"value": "' . self::$cmsImageIds[8] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "640px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
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
                                                'config' => json_decode('{"url": {"value": null, "source": "static"}, "media": {"value": "' . self::$cmsImageIds[9] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "640px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url": {"value": null, "source": "static"}, "media": {"value": "' . self::$cmsImageIds[9] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "640px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
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
                                                'config' => json_decode('{"url": {"value": null, "source": "static"}, "media": {"value": "' . self::$cmsImageIds[10] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "640px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url": {"value": null, "source": "static"}, "media": {"value": "' . self::$cmsImageIds[10] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "640px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
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
                                                'config' => json_decode('{"content": {"value": "<h2><b>Living Room</b></h2>\n<a href=\"#demo-link\">⸺ read more</a>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content": {"value": "<h2><b>Living Room</b></h2>\n<a href=\"#demo-link\">⸺ read more</a>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
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
                                                'config' => json_decode('{"content": {"value": "<h2><b>Dressing Room</b></h2>\n<a href=\"#demo-link\">⸺ read more</a>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content": {"value": "<h2><b>Dressing Room</b></h2>\n<a href=\"#demo-link\">⸺ read more</a>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
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
                                                'config' => json_decode('{"content": {"value": "<h2><b>Dining Room</b></h2>\n<a href=\"#demo-link\">⸺ read more</a>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content": {"value": "<h2><b>Dining Room</b></h2>\n<a href=\"#demo-link\">⸺ read more</a>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
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
                'previewMediaId' => self::$previewImages['horizon'],
                'name' => $this->translationHelper->adjustTranslations([
                    'de-DE' => 'Startseite Horizon - Set 2',
                    'en-GB' => 'Homepage Horizon - Set 2',
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
                                                'config' => json_decode('{"axis": {"value": "horizontal", "source": "static"}, "loop": {"value": false, "source": "static"}, "mode": {"value": "carousel", "source": "static"}, "items": {"value": 2, "source": "static"}, "speed": {"value": 500, "source": "static"}, "gutter": {"value": 0, "source": "static"}, "rewind": {"value": true, "source": "static"}, "itemsLG": {"value": 0, "source": "static"}, "itemsMD": {"value": 0, "source": "static"}, "itemsSM": {"value": 1, "source": "static"}, "itemsXL": {"value": 0, "source": "static"}, "itemsXS": {"value": 1, "source": "static"}, "autoplay": {"value": true, "source": "static"}, "minHeight": {"value": "300px", "source": "static"}, "displayMode": {"value": "standard", "source": "static"}, "sliderItems": {"value": [{"url": null, "text": {"value": "<h1 class=\"h3\">Create your natural beautiful online shop</h1>\n<p style=\"max-width:460px;\">With Theme Horizon Demo 2 you can create your individual beautiful online shop with just a few clicks.</p>\n<a target=\"_blank\" href=\"https://themes-sw6.zenit.design/\" class=\"btn btn-buy\" rel=\"noreferrer noopener\">Jetzt kostenlos testen</a>", "source": "static"}, "color": "#244143", "newTab": false, "mediaId": "' . self::$cmsImageIds[11] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[11] . '", "animation": "none", "textScale": true, "animationIn": "slide-in-left", "textMargins": false, "overlayColor": "#000000", "textMaxWidth": "680px", "textMinWidth": null, "textPaddings": false, "headlineScale": true, "textMarginTop": "20px", "overlayOpacity": "50%", "textMarginLeft": "10%", "textPaddingTop": "8px", "backgroundColor": "transparent", "textMarginRight": "10%", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "20px", "textPaddingRight": "16px", "customItemClasses": null, "textPaddingBottom": "8px", "verticalTextAlign": "center", "horizontalTextAlign": "flex-start", "textBorderRadiusTopLeft": "3px", "textBorderRadiusTopRight": "3px", "textBorderRadiusBottomLeft": "3px", "textBorderRadiusBottomRight": "3px"}, {"url": null, "text": {"value": null, "source": "static"}, "color": "#ffffff", "newTab": false, "mediaId": "' . self::$cmsImageIds[12] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[12] . '", "animation": "none", "animationIn": "none", "textMargins": false, "overlayColor": "#000000", "textMaxWidth": "600px", "textMinWidth": null, "textPaddings": false, "textMarginTop": "20px", "overlayOpacity": "50%", "textMarginLeft": "10%", "textPaddingTop": "8px", "backgroundColor": "transparent", "textMarginRight": "10%", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "20px", "textPaddingRight": "16px", "customItemClasses": null, "textPaddingBottom": "8px", "verticalTextAlign": "center", "horizontalTextAlign": "flex-start", "textBorderRadiusTopLeft": "3px", "textBorderRadiusTopRight": "3px", "textBorderRadiusBottomLeft": "3px", "textBorderRadiusBottomRight": "3px"}, {"url": null, "text": {"value": "<h3>Theme HORIZON Demo 2</h3>\n<p style=\"max-width:460px;\">With Theme Horizon Demo 2 you can create your individual beautiful online shop with just a few clicks.</p>\n<a target=\"_blank\" href=\"https://themes-sw6.zenit.design/\" class=\"btn btn-buy\" rel=\"noreferrer noopener\">Jetzt kostenlos testen</a>", "source": "static"}, "color": "#244143", "newTab": false, "mediaId": "' . self::$cmsImageIds[13] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[13] . '", "animation": "none", "textScale": true, "animationIn": "slide-in-right", "textMargins": false, "overlayColor": "#000000", "textMaxWidth": "680px", "textMinWidth": null, "textPaddings": false, "headlineScale": true, "textMarginTop": "20px", "overlayOpacity": "50%", "textMarginLeft": "10%", "textPaddingTop": "8px", "backgroundColor": "transparent", "textMarginRight": "10%", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "20px", "textPaddingRight": "16px", "customItemClasses": null, "textPaddingBottom": "8px", "verticalTextAlign": "center", "horizontalTextAlign": "flex-start", "textBorderRadiusTopLeft": "3px", "textBorderRadiusTopRight": "3px", "textBorderRadiusBottomLeft": "3px", "textBorderRadiusBottomRight": "3px"}, {"url": null, "text": {"value": null, "source": "static"}, "color": "#ffffff", "newTab": false, "mediaId": "' . self::$cmsImageIds[14] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[14] . '", "animation": "none", "animationIn": "none", "textMargins": false, "overlayColor": "#000000", "textMaxWidth": "600px", "textMinWidth": null, "textPaddings": false, "textMarginTop": "20px", "overlayOpacity": "50%", "textMarginLeft": "10%", "textPaddingTop": "8px", "backgroundColor": "transparent", "textMarginRight": "10%", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "20px", "textPaddingRight": "16px", "customItemClasses": null, "textPaddingBottom": "8px", "verticalTextAlign": "center", "horizontalTextAlign": "flex-start", "textBorderRadiusTopLeft": "3px", "textBorderRadiusTopRight": "3px", "textBorderRadiusBottomLeft": "3px", "textBorderRadiusBottomRight": "3px"}], "source": "static"}, "customClasses": {"value": null, "source": "static"}, "multipleItems": {"value": false, "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "navigationDots": {"value": null, "source": "static"}, "autoplayTimeout": {"value": 5000, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "navigationArrows": {"value": "inside", "source": "static"}, "autoplayHoverPause": {"value": false, "source": "static"}, "elementBorderRadius": {"value": false, "source": "static"}, "elementBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "elementBorderRadiusTopRight": {"value": "6px", "source": "static"}, "elementBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "elementBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"axis": {"value": "horizontal", "source": "static"}, "loop": {"value": false, "source": "static"}, "mode": {"value": "carousel", "source": "static"}, "items": {"value": 2, "source": "static"}, "speed": {"value": 500, "source": "static"}, "gutter": {"value": 0, "source": "static"}, "rewind": {"value": true, "source": "static"}, "autoplay": {"value": true, "source": "static"}, "minHeight": {"value": "300px", "source": "static"}, "displayMode": {"value": "standard", "source": "static"}, "sliderItems": {"value": [{"url": null, "text": {"value": "<h1 class=\"h3\">Create your natural beautiful online shop</h>\n<p style=\"max-width:460px;\">With Theme Horizon Demo 2 you can create your individual beautiful online shop with just a few clicks.</p>\n<a rel=\"noreferrer noopener\" class=\"btn btn-buy\" href=\"https://themes-sw6.zenit.design/?lang=en\" target=\"_blank\">Free trial</a>", "source": "static"}, "color": "#244143", "newTab": false, "mediaId": "' . self::$cmsImageIds[11] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[12] . '", "animation": "none", "textScale": true, "animationIn": "slide-in-left", "textMargins": false, "overlayColor": "#000000", "textMaxWidth": "680px", "textMinWidth": null, "textPaddings": false, "headlineScale": true, "textMarginTop": "20px", "overlayOpacity": "50%", "textMarginLeft": "10%", "textPaddingTop": "8px", "backgroundColor": "transparent", "textMarginRight": "10%", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "20px", "textPaddingRight": "16px", "customItemClasses": null, "textPaddingBottom": "8px", "verticalTextAlign": "center", "horizontalTextAlign": "flex-start", "textBorderRadiusTopLeft": "3px", "textBorderRadiusTopRight": "3px", "textBorderRadiusBottomLeft": "3px", "textBorderRadiusBottomRight": "3px"}, {"url": null, "text": {"value": null, "source": "static"}, "color": "#ffffff", "newTab": false, "mediaId": "' . self::$cmsImageIds[12] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[12] . '", "animation": "none", "animationIn": "none", "textMargins": false, "overlayColor": "#000000", "textMaxWidth": "600px", "textMinWidth": null, "textPaddings": false, "textMarginTop": "20px", "overlayOpacity": "50%", "textMarginLeft": "10%", "textPaddingTop": "8px", "backgroundColor": "transparent", "textMarginRight": "10%", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "20px", "textPaddingRight": "16px", "customItemClasses": null, "textPaddingBottom": "8px", "verticalTextAlign": "center", "horizontalTextAlign": "flex-start", "textBorderRadiusTopLeft": "3px", "textBorderRadiusTopRight": "3px", "textBorderRadiusBottomLeft": "3px", "textBorderRadiusBottomRight": "3px"}, {"url": null, "text": {"value": "<h3>Theme HORIZON Demo 2</h3>\n<p style=\"max-width:460px;\">With Theme Horizon Demo 2 you can create your individual beautiful online shop with just a few clicks.</p>\n<a target=\"_blank\" href=\"https://themes-sw6.zenit.design/?lang=en\" class=\"btn btn-buy\" rel=\"noreferrer noopener\">Free trial</a>", "source": "static"}, "color": "#244143", "newTab": false, "mediaId": "' . self::$cmsImageIds[13] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[13] . '", "animation": "none", "textScale": true, "animationIn": "slide-in-right", "textMargins": false, "overlayColor": "#000000", "textMaxWidth": "680px", "textMinWidth": null, "textPaddings": false, "headlineScale": true, "textMarginTop": "20px", "overlayOpacity": "50%", "textMarginLeft": "10%", "textPaddingTop": "8px", "backgroundColor": "transparent", "textMarginRight": "10%", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "20px", "textPaddingRight": "16px", "customItemClasses": null, "textPaddingBottom": "8px", "verticalTextAlign": "center", "horizontalTextAlign": "flex-start", "textBorderRadiusTopLeft": "3px", "textBorderRadiusTopRight": "3px", "textBorderRadiusBottomLeft": "3px", "textBorderRadiusBottomRight": "3px"}, {"url": null, "text": {"value": null, "source": "static"}, "color": "#ffffff", "newTab": false, "mediaId": "' . self::$cmsImageIds[14] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[14] . '", "animation": "none", "animationIn": "none", "textMargins": false, "overlayColor": "#000000", "textMaxWidth": "600px", "textMinWidth": null, "textPaddings": false, "textMarginTop": "20px", "overlayOpacity": "50%", "textMarginLeft": "10%", "textPaddingTop": "8px", "backgroundColor": "transparent", "textMarginRight": "10%", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "20px", "textPaddingRight": "16px", "customItemClasses": null, "textPaddingBottom": "8px", "verticalTextAlign": "center", "horizontalTextAlign": "flex-start", "textBorderRadiusTopLeft": "3px", "textBorderRadiusTopRight": "3px", "textBorderRadiusBottomLeft": "3px", "textBorderRadiusBottomRight": "3px"}], "source": "static"}, "customClasses": {"value": null, "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "navigationDots": {"value": null, "source": "static"}, "autoplayTimeout": {"value": 5000, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "navigationArrows": {"value": "inside", "source": "static"}, "autoplayHoverPause": {"value": false, "source": "static"}, "elementBorderRadius": {"value": false, "source": "static"}, "elementBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "elementBorderRadiusTopRight": {"value": "6px", "source": "static"}, "elementBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "elementBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
                                            ]
                                        ])
                                    ]
                                ]
                            ],
                            [
                                'position' => 1,
                                'type' => 'zen-grid-3-6-3',
                                'locked' => 0,
                                'backgroundColor' => '#f1d2b6',
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "150px",
                                'marginBottom' => "150px",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'text',
                                        'slot' => 'col1',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": null, "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content": {"value": null, "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'text',
                                        'slot' => 'col2',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": "<div style=\"text-align: center;\"><font color=\"#981f0f\">Lorem ipsum dolor</font></div><h3 style=\"text-align: center;\" class=\"display-4 font-weight-bold\"><font color=\"#981f0f\">Organic &amp; Natural Body Oil that makes you a true beauty!</font></h3><div style=\"text-align: center;\"><a class=\"btn btn-secondary\" href=\"#demo-link\">Shop Now</a></div>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content": {"value": "<div style=\"text-align: center;\"><font color=\"#981f0f\">Lorel ipsum dolor</font></div><h3 style=\"text-align: center;\" class=\"display-4 font-weight-bold\"><font color=\"#981f0f\">Organic &amp; Natural Body Oil that makes you a true beauty!</font></h3><div style=\"text-align: center;\"><a class=\"btn btn-secondary\" href=\"#demo-link\">Shop Now</a></div>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'text',
                                        'slot' => 'col3',
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
                                'position' => 2,
                                'type' => 'image-three-column',
                                'locked' => 0,
                                'cssClass' => 'zen-animate slide-in-blurred-bottom',
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "40px",
                                'marginBottom' => "100px",
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
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "Cosmetics", "source": "static"}, "color": {"value": "#344854", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[15] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "36px", "source": "static"}, "minHeight": {"value": "600px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "none", "source": "static"}, "fontFamily": {"value": "headline", "source": "static"}, "fontWeight": {"value": "600", "source": "static"}, "imageHover": {"value": "zoom", "source": "static"}, "animationIn": {"value": "slide-in-blurred-bottom", "source": "static"}, "displayMode": {"value": "stretch", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "slide-out-blurred-bottom", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "300px", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": false, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "backgroundBlur": {"value": "0px", "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "8px", "source": "static"}, "backgroundColor": {"value": "", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "16px", "source": "static"}, "textBorderRadius": {"value": false, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "16px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "textPaddingBottom": {"value": "8px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": null, "source": "static"}, "horizontalTextAlign": {"value": "center", "source": "static"}, "horizontalImageAlign": {"value": null, "source": "static"}, "textBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "textBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "Chairs & Armchairs", "source": "static"}, "color": {"value": "#333333", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[15] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "45px", "source": "static"}, "minHeight": {"value": "600px", "source": "static"}, "textAlign": {"value": "left", "source": "static"}, "textHover": {"value": "none", "source": "static"}, "fontFamily": {"value": "headline", "source": "static"}, "fontWeight": {"value": "800", "source": "static"}, "imageHover": {"value": "none", "source": "static"}, "animationIn": {"value": "slide-out-left", "source": "static"}, "displayMode": {"value": "stretch", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "slide-in-left", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "300px", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": false, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "8px", "source": "static"}, "backgroundColor": {"value": "", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "16px", "source": "static"}, "textBorderRadius": {"value": false, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "16px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "textPaddingBottom": {"value": "8px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": null, "source": "static"}, "horizontalTextAlign": {"value": "flex-start", "source": "static"}, "horizontalImageAlign": {"value": null, "source": "static"}, "textBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "textBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
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
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "Body Oils", "source": "static"}, "color": {"value": "#344854", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[16] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "36px", "source": "static"}, "minHeight": {"value": "600px", "source": "static"}, "textAlign": {"value": "left", "source": "static"}, "textHover": {"value": "none", "source": "static"}, "fontFamily": {"value": "headline", "source": "static"}, "fontWeight": {"value": "600", "source": "static"}, "imageHover": {"value": "zoom", "source": "static"}, "animationIn": {"value": "slide-in-blurred-bottom", "source": "static"}, "displayMode": {"value": "stretch", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "slide-out-blurred-bottom", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "300px", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": false, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "backgroundBlur": {"value": "0px", "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "8px", "source": "static"}, "backgroundColor": {"value": "", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "16px", "source": "static"}, "textBorderRadius": {"value": false, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "16px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "textPaddingBottom": {"value": "8px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": null, "source": "static"}, "horizontalTextAlign": {"value": "center", "source": "static"}, "horizontalImageAlign": {"value": null, "source": "static"}, "textBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "textBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "Designer lamps", "source": "static"}, "color": {"value": "#000000", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[16] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "46px", "source": "static"}, "minHeight": {"value": "600px", "source": "static"}, "textAlign": {"value": "left", "source": "static"}, "textHover": {"value": "none", "source": "static"}, "fontFamily": {"value": "headline", "source": "static"}, "fontWeight": {"value": "800", "source": "static"}, "imageHover": {"value": "none", "source": "static"}, "animationIn": {"value": "slide-out-left", "source": "static"}, "displayMode": {"value": "stretch", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "slide-in-left", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "300px", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": false, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "8px", "source": "static"}, "backgroundColor": {"value": "", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "16px", "source": "static"}, "textBorderRadius": {"value": false, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "16px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "textPaddingBottom": {"value": "8px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": null, "source": "static"}, "horizontalTextAlign": {"value": "flex-start", "source": "static"}, "horizontalImageAlign": {"value": null, "source": "static"}, "textBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "textBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
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
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "Serum", "source": "static"}, "color": {"value": "#344854", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[17] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "36px", "source": "static"}, "minHeight": {"value": "600px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "none", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "600", "source": "static"}, "imageHover": {"value": "zoom", "source": "static"}, "animationIn": {"value": "slide-in-blurred-bottom", "source": "static"}, "displayMode": {"value": "stretch", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "slide-out-blurred-bottom", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "300px", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": false, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "backgroundBlur": {"value": "0px", "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "8px", "source": "static"}, "backgroundColor": {"value": "", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "16px", "source": "static"}, "textBorderRadius": {"value": false, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "16px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "textPaddingBottom": {"value": "8px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": null, "source": "static"}, "horizontalTextAlign": {"value": "center", "source": "static"}, "horizontalImageAlign": {"value": null, "source": "static"}, "textBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "textBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "Decoration", "source": "static"}, "color": {"value": "#000000", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[17] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "46px", "source": "static"}, "minHeight": {"value": "600px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "none", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "800", "source": "static"}, "imageHover": {"value": "none", "source": "static"}, "animationIn": {"value": "slide-out-left", "source": "static"}, "displayMode": {"value": "stretch", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "slide-in-left", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "300px", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": false, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "8px", "source": "static"}, "backgroundColor": {"value": "", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "16px", "source": "static"}, "textBorderRadius": {"value": false, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "16px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "textPaddingBottom": {"value": "8px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": null, "source": "static"}, "horizontalTextAlign": {"value": "flex-start", "source": "static"}, "horizontalImageAlign": {"value": null, "source": "static"}, "textBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "textBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
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
                                'type' => 'text-hero',
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
                                                'config' => json_decode('{"content": {"value": "<h2 style=\"text-align: center; font-size: 36px;\">Top sellers</h2>\n<p style=\"text-align: center;\">\n    Lorem ipsum dolor sit amet.\n</p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content": {"value": "<p style=\"text-align: center; letter-spacing: 2px;\">New In</p>\n<h2 style=\"text-align: center; font-size: 60px;\">Recent Arrivals</h2>\n<br>\n<p style=\"text-align: center;\">\n    Lorem ipsum dolor sit amet, consetetur sadipscing elitr.\n</p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
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
                                                'config' => json_decode('{"title": {"value": "", "source": "static"}, "border": {"value": false, "source": "static"}, "rotate": {"value": false, "source": "static"}, "products": {"value": ' . $this->limitedProducts(7) . ', "source": "static"}, "boxLayout": {"value": "minimal", "source": "static"}, "elMinWidth": {"value": "300px", "source": "static"}, "navigation": {"value": true, "source": "static"}, "displayMode": {"value": "contain", "source": "static"}, "verticalAlign": {"value": "flex-start", "source": "static"}, "productStreamLimit": {"value": 10, "source": "static"}, "productStreamSorting": {"value": "name:ASC", "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"title": {"value": "", "source": "static"}, "border": {"value": false, "source": "static"}, "rotate": {"value": false, "source": "static"}, "products": {"value": ' . $this->limitedProducts(7) . ', "source": "static"}, "boxLayout": {"value": "minimal", "source": "static"}, "elMinWidth": {"value": "300px", "source": "static"}, "navigation": {"value": true, "source": "static"}, "displayMode": {"value": "contain", "source": "static"}, "verticalAlign": {"value": "flex-start", "source": "static"}, "productStreamLimit": {"value": 10, "source": "static"}, "productStreamSorting": {"value": "name:ASC", "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                ]
                            ],
                            [
                                'position' => 2,
                                'type' => 'text-teaser',
                                'locked' => 0,
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "5px",
                                'marginBottom' => "100px",
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
                                                'config' => json_decode('{"content": {"value": "<div style=\"text-align: center;\"><a class=\"btn btn-buy\" href=\"#demo-link\">Alle ansehen</a></div>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content": {"value": "<div style=\"text-align: center;\"><a class=\"btn btn-buy\" href=\"#demo-link\">View all</a></div>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
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
                                'type' => 'zen-teaser-grid-12',
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
                                        'type' => 'zen-teaser',
                                        'slot' => 'col-1',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "https://store.shopware.com/themes-templates/?p=1&o=2&n=21&c=1033&shopwareVersion=6&s=410", "source": "static"}, "text": {"value": "Teste unsere Themes 30 Tage kostenlos - unverbindlich und in vollem Umfang", "source": "static"}, "color": {"value": "#981f0f", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[18] . '", "source": "static"}, "newTab": {"value": true, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "46px", "source": "static"}, "minHeight": {"value": "770px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "none", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "600", "source": "static"}, "imageHover": {"value": "zoom", "source": "static"}, "animationIn": {"value": "none", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "none", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "750px", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": true, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "backgroundBlur": {"value": "0px", "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "0px", "source": "static"}, "backgroundColor": {"value": "transparent", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "16px", "source": "static"}, "textBorderRadius": {"value": false, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "16px", "source": "static"}, "imageBorderRadius": {"value": true, "source": "static"}, "textPaddingBottom": {"value": "100px", "source": "static"}, "verticalTextAlign": {"value": "center", "source": "static"}, "verticalImageAlign": {"value": null, "source": "static"}, "horizontalTextAlign": {"value": "center", "source": "static"}, "horizontalImageAlign": {"value": null, "source": "static"}, "textBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "20px", "source": "static"}, "textBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "20px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "20px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "20px", "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url": {"value": "https://store.shopware.com/themes-templates/?p=1&o=2&n=21&c=1033&shopwareVersion=6&s=410", "source": "static"}, "text": {"value": "Test our themes for 30 days free of charge - without obligation and in full", "source": "static"}, "color": {"value": "#981f0f", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[18] . '", "source": "static"}, "newTab": {"value": true, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "46px", "source": "static"}, "minHeight": {"value": "770px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "none", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "600", "source": "static"}, "imageHover": {"value": "zoom", "source": "static"}, "animationIn": {"value": "none", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "none", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "750px", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": true, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "0px", "source": "static"}, "backgroundColor": {"value": "transparent", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "16px", "source": "static"}, "textBorderRadius": {"value": false, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "16px", "source": "static"}, "imageBorderRadius": {"value": true, "source": "static"}, "textPaddingBottom": {"value": "100px", "source": "static"}, "verticalTextAlign": {"value": "center", "source": "static"}, "verticalImageAlign": {"value": null, "source": "static"}, "horizontalTextAlign": {"value": "center", "source": "static"}, "horizontalImageAlign": {"value": null, "source": "static"}, "textBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "20px", "source": "static"}, "textBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "20px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "20px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "20px", "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                ]
                            ],
                            [
                                'position' => 1,
                                'type' => 'zen-grid-3-6-3',
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
                                        'type' => 'text',
                                        'slot' => 'col-1',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": null, "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content": {"value": null, "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'text',
                                        'slot' => 'col-2',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": "<p class=\"lead text-center\" style=\"font-size: 24px\">\"Millions of combinations, meaning you create a totally unique online shop exactly the way you want it.\"</p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content": {"value": "<p class=\"lead text-center\" style=\"font-size: 24px\">\"Millions of combinations, meaning you create a totally unique online shop exactly the way you want it.\"</p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'text',
                                        'slot' => 'col-3',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": "", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content": {"value": "", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ]
                                ]
                            ],
                            [
                                'position' => 2,
                                'type' => 'zen-grid-2-2-2-2-2-2',
                                'locked' => 0,
                                'cssClass' => 'zen-animate slide-in-blurred-bottom',
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "20px",
                                'marginBottom' => "20px",
                                'marginLeft' => "100px",
                                'marginRight' => "100px",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'image',
                                        'slot' => 'col1',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "https://themes-sw6.zenit.design/", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[19] . '", "source": "static"}, "newTab": {"value": true, "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "displayMode": {"value": "stretch", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url": {"value": "https://themes-sw6.zenit.design/", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[19] . '", "source": "static"}, "newTab": {"value": true, "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "displayMode": {"value": "stretch", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'image',
                                        'slot' => 'col2',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "https://store.shopware.com/detail/index/sArticle/518777", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[20] . '", "source": "static"}, "newTab": {"value": true, "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "displayMode": {"value": "stretch", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url": {"value": "https://store.shopware.com/detail/index/sArticle/518777", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[20] . '", "source": "static"}, "newTab": {"value": true, "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "displayMode": {"value": "stretch", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'image',
                                        'slot' => 'col3',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "https://store.shopware.com/detail/index/sArticle/166169", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[21] . '", "source": "static"}, "newTab": {"value": true, "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "displayMode": {"value": "stretch", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url": {"value": "https://store.shopware.com/detail/index/sArticle/166169", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[21] . '", "source": "static"}, "newTab": {"value": true, "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "displayMode": {"value": "stretch", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'image',
                                        'slot' => 'col4',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "https://store.shopware.com/detail/index/sArticle/518776", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[22] . '", "source": "static"}, "newTab": {"value": true, "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "displayMode": {"value": "stretch", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url": {"value": "https://store.shopware.com/detail/index/sArticle/518776", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[22] . '", "source": "static"}, "newTab": {"value": true, "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "displayMode": {"value": "stretch", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'image',
                                        'slot' => 'col5',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "https://store.shopware.com/detail/index/sArticle/518701", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[23] . '", "source": "static"}, "newTab": {"value": true, "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "displayMode": {"value": "stretch", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url": {"value": "https://store.shopware.com/detail/index/sArticle/518701", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[23] . '", "source": "static"}, "newTab": {"value": true, "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "displayMode": {"value": "stretch", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'image',
                                        'slot' => 'col6',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "https://store.shopware.com/detail/index/sArticle/518702", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[24] . '", "source": "static"}, "newTab": {"value": true, "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "displayMode": {"value": "stretch", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url": {"value": "https://store.shopware.com/detail/index/sArticle/518702", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[24] . '", "source": "static"}, "newTab": {"value": true, "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "displayMode": {"value": "stretch", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
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
                        'type' => 'default',
                        'blocks' => [
                            [
                                'position' => 0,
                                'type' => 'text-hero',
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
                                                'config' => json_decode('{"content": {"value": "<h2 style=\"text-align: center; font-size: 36px;\">Recent Arrivals</h2>\n<p style=\"text-align: center;\">\n    Lorem ipsum dolor sit amet.\n</p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content": {"value": "<p style=\"text-align: center; letter-spacing: 2px;\">New In</p>\n<h2 style=\"text-align: center; font-size: 60px;\">Recent Arrivals</h2>\n<br>\n<p style=\"text-align: center;\">\n    Lorem ipsum dolor sit amet, consetetur sadipscing elitr.\n</p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
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
                                                'config' => json_decode('{"title": {"value": "", "source": "static"}, "border": {"value": false, "source": "static"}, "rotate": {"value": false, "source": "static"}, "products": {"value": ' . $this->limitedProducts(7) . ', "source": "static"}, "boxLayout": {"value": "minimal", "source": "static"}, "elMinWidth": {"value": "300px", "source": "static"}, "navigation": {"value": true, "source": "static"}, "displayMode": {"value": "contain", "source": "static"}, "verticalAlign": {"value": "flex-start", "source": "static"}, "productStreamLimit": {"value": 10, "source": "static"}, "productStreamSorting": {"value": "name:ASC", "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"title": {"value": "", "source": "static"}, "border": {"value": false, "source": "static"}, "rotate": {"value": false, "source": "static"}, "products": {"value": ' . $this->limitedProducts(7) . ', "source": "static"}, "boxLayout": {"value": "minimal", "source": "static"}, "elMinWidth": {"value": "300px", "source": "static"}, "navigation": {"value": true, "source": "static"}, "displayMode": {"value": "contain", "source": "static"}, "verticalAlign": {"value": "flex-start", "source": "static"}, "productStreamLimit": {"value": 10, "source": "static"}, "productStreamSorting": {"value": "name:ASC", "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                ]
                            ],
                            [
                                'position' => 2,
                                'type' => 'text-teaser',
                                'locked' => 0,
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "5px",
                                'marginBottom' => "100px",
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
                                                'config' => json_decode('{"content": {"value": "<div style=\"text-align: center;\"><a href=\"#demo-link\" class=\"btn btn-buy\">Alle ansehen</a></div>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content": {"value": "<div style=\"text-align: center;\"><a href=\"#demo-link\" class=\"btn btn-buy\">View all</a></div>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
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
                                'type' => 'zen-grid-8-4',
                                'locked' => 0,
                                'cssClass' => 'zen-animate slide-in-blurred-bottom zen-cms-g-5',
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "100px",
                                'marginBottom' => "100px",
                                'marginLeft' => "100px",
                                'marginRight' => "100px",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'image',
                                        'slot' => 'col1',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": null, "source": "static"}, "media": {"value": "' . self::$cmsImageIds[25] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "displayMode": {"value": "standard", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url": {"value": null, "source": "static"}, "media": {"value": "' . self::$cmsImageIds[25] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "displayMode": {"value": "standard", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'text',
                                        'slot' => 'col2',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": "<p class=\"lead text-center\" style=\"font-size: 24px\">\"Millions of combinations, meaning you create a totally unique online shop exactly the way you want it.\"</p>", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content": {"value": "<p class=\"lead text-center\" style=\"font-size: 24px\">\"Millions of combinations, meaning you create a totally unique online shop exactly the way you want it.\"</p>", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}}', true)
                                            ]
                                        ])
                                    ]
                                ]
                            ],
                            [
                                'position' => 1,
                                'type' => 'zen-features',
                                'locked' => 0,
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "20px",
                                'marginBottom' => "20px",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'zen-features',
                                        'slot' => 'content',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"feature1": {"value": "Free Shipping <small> From 1€ minimum order value</small>", "source": "static"}, "feature2": {"value": "Free returnals <small>Don’t love it? Send it back, on us.</small>", "source": "static"}, "feature3": {"value": "Safe shopping <small> Trusted Shopping with SSL/TLS.</small>", "source": "static"}, "feature4": {"value": "", "source": "static"}, "fontSize": {"value": "20px", "source": "static"}, "iconSize": {"value": "22px", "source": "static"}, "alignment": {"value": "start", "source": "static"}, "iconColor": {"value": "#333333", "source": "static"}, "textColor": {"value": "#333333", "source": "static"}, "appearance": {"value": "iconsLeft", "source": "static"}, "fontFamily": {"value": "headline", "source": "static"}, "fontWeight": {"value": "600", "source": "static"}, "feature1Icon": {"value": "package-closed", "source": "static"}, "feature2Icon": {"value": "history", "source": "static"}, "feature3Icon": {"value": "shield", "source": "static"}, "feature4Icon": {"value": "checkmark", "source": "static"}, "textAlignment": {"value": "start", "source": "static"}, "customClasses": {"value": null, "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"feature1": {"value": "Free Shipping <small> From 1€ minimum order value</small>", "source": "static"}, "feature2": {"value": "Free returnals <small>Don’t love it? Send it back, on us.</small>", "source": "static"}, "feature3": {"value": "Safe shopping <small> Trusted Shopping with SSL/TLS.</small>", "source": "static"}, "feature4": {"value": "", "source": "static"}, "fontSize": {"value": "20px", "source": "static"}, "iconSize": {"value": "22px", "source": "static"}, "alignment": {"value": "start", "source": "static"}, "iconColor": {"value": "#333333", "source": "static"}, "textColor": {"value": "#333333", "source": "static"}, "appearance": {"value": "iconsLeft", "source": "static"}, "fontFamily": {"value": "headline", "source": "static"}, "fontWeight": {"value": "600", "source": "static"}, "feature1Icon": {"value": "package-closed", "source": "static"}, "feature2Icon": {"value": "history", "source": "static"}, "feature3Icon": {"value": "shield", "source": "static"}, "feature4Icon": {"value": "checkmark", "source": "static"}, "textAlignment": {"value": "start", "source": "static"}, "customClasses": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                ]
                            ]
                        ]
                    ],
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
                'previewMediaId' => self::$previewImages['horizon'],
                'name' => $this->translationHelper->adjustTranslations([
                    'de-DE' => 'Startseite Horizon - Set 3',
                    'en-GB' => 'Homepage Horizon - Set 3',
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
                                'customFields' => [],
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
                                                'config' => json_decode('{"axis": {"value": "horizontal", "source": "static"}, "loop": {"value": true, "source": "static"}, "mode": {"value": "carousel", "source": "static"}, "items": {"value": 1, "source": "static"}, "speed": {"value": 500, "source": "static"}, "gutter": {"value": 16, "source": "static"}, "rewind": {"value": false, "source": "static"}, "itemsLG": {"value": 1, "source": "static"}, "itemsMD": {"value": 1, "source": "static"}, "itemsSM": {"value": 1, "source": "static"}, "itemsXL": {"value": 1, "source": "static"}, "itemsXS": {"value": 1, "source": "static"}, "autoplay": {"value": false, "source": "static"}, "minHeight": {"value": "max(40vw, 360px)", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "edgePadding": {"value": true, "source": "static"}, "sliderItems": {"value": [{"url": "#demo-link", "text": {"value": "<div class=\"row align-items-center\">\n    <div class=\"col\">\n        <div class=\"h1\">-15%</div>\n    </div>\n    <div class=\"col\" style=\"border-left: 1px solid #ffffff;\">\n        <h1 class=\"h6\" style=\"line-height: 1;\">Für unsere<br>Liebsten</h1>\n    </div>\n    <div class=\"col-12 d-none d-md-block\">\n        <div style=\"text-align: center;\">\n            <button type=\"button\" class=\"btn btn-lg bg-white\">Jetzt sparen</button>\n        </div>\n    </div>\n</div>", "source": "static"}, "color": "#ffffff", "newTab": false, "mediaId": "' . self::$cmsImageIds[26] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[26] . '", "animation": "none", "textScale": true, "codeEditor": true, "animationIn": "none", "textMargins": false, "overlayColor": "#000000", "textMaxWidth": "600px", "textMinWidth": null, "textPaddings": true, "headlineScale": true, "textMarginTop": "20px", "backgroundBlur": "0px", "overlayOpacity": "50%", "textMarginLeft": "10%", "textPaddingTop": "0", "backgroundColor": "transparent", "textMarginRight": "10%", "textPaddingLeft": "0", "textBorderRadius": false, "textMarginBottom": "20px", "textPaddingRight": "0", "customItemClasses": null, "imageBorderRadius": true, "textPaddingBottom": "0", "verticalTextAlign": "center", "verticalImageAlign": "center", "horizontalTextAlign": "flex-start", "horizontalImageAlign": "center", "textBorderRadiusTopLeft": "3px", "imageBorderRadiusTopLeft": "24px", "textBorderRadiusTopRight": "3px", "imageBorderRadiusTopRight": "24px", "textBorderRadiusBottomLeft": "3px", "imageBorderRadiusBottomLeft": "24px", "textBorderRadiusBottomRight": "3px", "imageBorderRadiusBottomRight": "24px"}, {"url": "#demo-link", "text": {"value": "<div class=\"h1\">Babys<br>erstes Spielzeug</div>\n<button type=\"button\" class=\"btn btn-lg bg-white\">Jetzt entdecken</button>", "source": "static"}, "color": "#ffffff", "newTab": false, "mediaId": "' . self::$cmsImageIds[27] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[27] . '", "animation": "none", "textScale": false, "codeEditor": true, "animationIn": "none", "textMargins": true, "overlayColor": "#000000", "textMaxWidth": "400px", "textMinWidth": null, "textPaddings": true, "headlineScale": false, "textMarginTop": "20px", "backgroundBlur": "5px", "overlayOpacity": "50%", "textMarginLeft": "10%", "textPaddingTop": "16px", "backgroundColor": "transparent", "textMarginRight": "10%", "textPaddingLeft": "16px", "textBorderRadius": true, "textMarginBottom": "20px", "textPaddingRight": "16px", "customItemClasses": null, "imageBorderRadius": true, "textPaddingBottom": "16px", "verticalTextAlign": "center", "verticalImageAlign": "center", "horizontalTextAlign": "flex-end", "horizontalImageAlign": "left", "textBorderRadiusTopLeft": "16px", "imageBorderRadiusTopLeft": "24px", "textBorderRadiusTopRight": "16px", "imageBorderRadiusTopRight": "24px", "textBorderRadiusBottomLeft": "16px", "imageBorderRadiusBottomLeft": "24px", "textBorderRadiusBottomRight": "16px", "imageBorderRadiusBottomRight": "24px"}, {"url": "#demo-link", "text": {"value": "<div class=\"h1\">Babys erstes Geschirrset aus Silikon!</div>\n<button type=\"button\" class=\"btn btn-lg bg-white\">Jetzt entdecken</button>", "source": "static"}, "color": "#ffffff", "newTab": false, "mediaId": "' . self::$cmsImageIds[28] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[28] . '", "animation": "none", "textScale": false, "codeEditor": true, "animationIn": "none", "textMargins": true, "overlayColor": "#000000", "textMaxWidth": "460px", "textMinWidth": null, "textPaddings": true, "headlineScale": false, "textMarginTop": "20px", "backgroundBlur": "5px", "overlayOpacity": "50%", "textMarginLeft": "10%", "textPaddingTop": "16px", "backgroundColor": "transparent", "textMarginRight": "10%", "textPaddingLeft": "16px", "textBorderRadius": true, "textMarginBottom": "20px", "textPaddingRight": "16px", "customItemClasses": null, "imageBorderRadius": true, "textPaddingBottom": "16px", "verticalTextAlign": "center", "verticalImageAlign": "center", "horizontalTextAlign": "flex-end", "horizontalImageAlign": "left", "textBorderRadiusTopLeft": "16px", "imageBorderRadiusTopLeft": "24px", "textBorderRadiusTopRight": "16px", "imageBorderRadiusTopRight": "24px", "textBorderRadiusBottomLeft": "16px", "imageBorderRadiusBottomLeft": "24px", "textBorderRadiusBottomRight": "16px", "imageBorderRadiusBottomRight": "24px"}, {"url": "#demo-link", "text": {"value": "<div style=\"text-align: center;\" class=\"h1\">Ungiftiges Holzspielzeug</div>\n<div style=\"text-align: center;\"><button type=\"button\" class=\"btn btn-lg bg-white\">Jetzt entdecken</button></div>", "source": "static"}, "color": "#ffffff", "newTab": false, "mediaId": "' . self::$cmsImageIds[29] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[29] . '", "animation": "none", "textScale": false, "codeEditor": true, "animationIn": "none", "textMargins": true, "overlayColor": "#000000", "textMaxWidth": "", "textMinWidth": null, "textPaddings": false, "headlineScale": false, "textMarginTop": "10%", "backgroundBlur": "0px", "overlayOpacity": "50%", "textMarginLeft": "5%", "textPaddingTop": "8px", "backgroundColor": "transparent", "textMarginRight": "5%", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "20px", "textPaddingRight": "16px", "customItemClasses": null, "imageBorderRadius": true, "textPaddingBottom": "8px", "verticalTextAlign": "flex-start", "verticalImageAlign": "center", "horizontalTextAlign": "center", "horizontalImageAlign": "center", "textBorderRadiusTopLeft": "3px", "imageBorderRadiusTopLeft": "24px", "textBorderRadiusTopRight": "3px", "imageBorderRadiusTopRight": "24px", "textBorderRadiusBottomLeft": "3px", "imageBorderRadiusBottomLeft": "24px", "textBorderRadiusBottomRight": "3px", "imageBorderRadiusBottomRight": "24px"}], "source": "static"}, "customClasses": {"value": null, "source": "static"}, "edgePaddingLG": {"value": 150, "source": "static"}, "edgePaddingMD": {"value": 100, "source": "static"}, "edgePaddingSM": {"value": 50, "source": "static"}, "edgePaddingXL": {"value": 200, "source": "static"}, "edgePaddingXS": {"value": 50, "source": "static"}, "multipleItems": {"value": false, "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "edgePaddingXXL": {"value": 250, "source": "static"}, "navigationDots": {"value": "outside", "source": "static"}, "autoplayTimeout": {"value": 5000, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "navigationArrows": {"value": "inside", "source": "static"}, "autoplayHoverPause": {"value": true, "source": "static"}, "elementBorderRadius": {"value": false, "source": "static"}, "elementBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "elementBorderRadiusTopRight": {"value": "6px", "source": "static"}, "elementBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "elementBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)                                                        ],
                                            'en-GB' => [
                                                'config' => json_decode('{"axis": {"value": "horizontal", "source": "static"}, "loop": {"value": true, "source": "static"}, "mode": {"value": "carousel", "source": "static"}, "items": {"value": 1, "source": "static"}, "speed": {"value": 500, "source": "static"}, "gutter": {"value": 16, "source": "static"}, "rewind": {"value": false, "source": "static"}, "itemsLG": {"value": 1, "source": "static"}, "itemsMD": {"value": 1, "source": "static"}, "itemsSM": {"value": 1, "source": "static"}, "itemsXL": {"value": 1, "source": "static"}, "itemsXS": {"value": 1, "source": "static"}, "autoplay": {"value": false, "source": "static"}, "minHeight": {"value": "max(40vw, 360px)", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "edgePadding": {"value": true, "source": "static"}, "sliderItems": {"value": [{"url": "#demo-link", "text": {"value": "<div class=\"row align-items-center\">\n    <div class=\"col\">\n        <div class=\"h1\">-15%</div>\n    </div>\n    <div class=\"col\" style=\"border-left: 1px solid #ffffff;\">\n        <h1 class=\"h5\" style=\"line-height: 1;\">For the<br>beloved<br>ones</h1>\n    </div>\n    <div class=\"col-12 d-none d-md-block\">\n        <div style=\"text-align: center;\">\n            <button type=\"button\" class=\"btn btn-lg bg-white\">Get it now</button>\n        </div>\n    </div>\n</div>", "source": "static"}, "color": "#ffffff", "newTab": false, "mediaId": "' . self::$cmsImageIds[26] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[26] . '", "animation": "none", "textScale": true, "codeEditor": true, "animationIn": "none", "textMargins": false, "overlayColor": "#000000", "textMaxWidth": "600px", "textMinWidth": null, "textPaddings": true, "headlineScale": true, "textMarginTop": "20px", "backgroundBlur": "0px", "overlayOpacity": "50%", "textMarginLeft": "10%", "textPaddingTop": "0", "backgroundColor": "transparent", "textMarginRight": "10%", "textPaddingLeft": "0", "textBorderRadius": false, "textMarginBottom": "20px", "textPaddingRight": "0", "customItemClasses": null, "imageBorderRadius": true, "textPaddingBottom": "0", "verticalTextAlign": "center", "verticalImageAlign": "center", "horizontalTextAlign": "flex-start", "horizontalImageAlign": "center", "textBorderRadiusTopLeft": "3px", "imageBorderRadiusTopLeft": "24px", "textBorderRadiusTopRight": "3px", "imageBorderRadiusTopRight": "24px", "textBorderRadiusBottomLeft": "3px", "imageBorderRadiusBottomLeft": "24px", "textBorderRadiusBottomRight": "3px", "imageBorderRadiusBottomRight": "24px"}, {"url": "#demo-link", "text": {"value": "<div class=\"h1\">Baby\'s<br>first toys</div>\n<button type=\"button\" class=\"btn btn-lg bg-white\">Discover now</button>", "source": "static"}, "color": "#ffffff", "newTab": false, "mediaId": "' . self::$cmsImageIds[27] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[27] . '", "animation": "none", "textScale": false, "codeEditor": true, "animationIn": "none", "textMargins": true, "overlayColor": "#000000", "textMaxWidth": "460px", "textMinWidth": null, "textPaddings": true, "headlineScale": false, "textMarginTop": "20px", "backgroundBlur": "5px", "overlayOpacity": "50%", "textMarginLeft": "10%", "textPaddingTop": "16px", "backgroundColor": "transparent", "textMarginRight": "10%", "textPaddingLeft": "16px", "textBorderRadius": true, "textMarginBottom": "20px", "textPaddingRight": "16px", "customItemClasses": null, "imageBorderRadius": true, "textPaddingBottom": "16px", "verticalTextAlign": "center", "verticalImageAlign": "center", "horizontalTextAlign": "flex-end", "horizontalImageAlign": "left", "textBorderRadiusTopLeft": "16px", "imageBorderRadiusTopLeft": "24px", "textBorderRadiusTopRight": "16px", "imageBorderRadiusTopRight": "24px", "textBorderRadiusBottomLeft": "16px", "imageBorderRadiusBottomLeft": "24px", "textBorderRadiusBottomRight": "16px", "imageBorderRadiusBottomRight": "24px"}, {"url": "#demo-link", "text": {"value": "<div class=\"h1\">First baby accessories for dinner!</div>\n<button type=\"button\" class=\"btn btn-lg bg-white\">Discover now</button>", "source": "static"}, "color": "#ffffff", "newTab": false, "mediaId": "' . self::$cmsImageIds[28] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[28] . '", "animation": "none", "textScale": false, "codeEditor": true, "animationIn": "none", "textMargins": true, "overlayColor": "#000000", "textMaxWidth": "460px", "textMinWidth": null, "textPaddings": true, "headlineScale": false, "textMarginTop": "20px", "backgroundBlur": "5px", "overlayOpacity": "50%", "textMarginLeft": "10%", "textPaddingTop": "16px", "backgroundColor": "transparent", "textMarginRight": "10%", "textPaddingLeft": "16px", "textBorderRadius": true, "textMarginBottom": "20px", "textPaddingRight": "16px", "customItemClasses": null, "imageBorderRadius": true, "textPaddingBottom": "16px", "verticalTextAlign": "center", "verticalImageAlign": "center", "horizontalTextAlign": "flex-end", "horizontalImageAlign": "left", "textBorderRadiusTopLeft": "16px", "imageBorderRadiusTopLeft": "24px", "textBorderRadiusTopRight": "16px", "imageBorderRadiusTopRight": "24px", "textBorderRadiusBottomLeft": "16px", "imageBorderRadiusBottomLeft": "24px", "textBorderRadiusBottomRight": "16px", "imageBorderRadiusBottomRight": "24px"}, {"url": "#demo-link", "text": {"value": "<div style=\"text-align: center;\" class=\"h1\">Non-toxic wooden toys</div>\n<div style=\"text-align: center;\"><button type=\"button\" class=\"btn btn-lg bg-white\">Discover now</button></div>", "source": "static"}, "color": "#ffffff", "newTab": false, "mediaId": "' . self::$cmsImageIds[29] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[29] . '", "animation": "none", "textScale": false, "codeEditor": true, "animationIn": "none", "textMargins": true, "overlayColor": "#000000", "textMaxWidth": "", "textMinWidth": null, "textPaddings": false, "headlineScale": false, "textMarginTop": "10%", "backgroundBlur": "0px", "overlayOpacity": "50%", "textMarginLeft": "5%", "textPaddingTop": "8px", "backgroundColor": "transparent", "textMarginRight": "5%", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "20px", "textPaddingRight": "16px", "customItemClasses": null, "imageBorderRadius": true, "textPaddingBottom": "8px", "verticalTextAlign": "flex-start", "verticalImageAlign": "center", "horizontalTextAlign": "center", "horizontalImageAlign": "center", "textBorderRadiusTopLeft": "3px", "imageBorderRadiusTopLeft": "24px", "textBorderRadiusTopRight": "3px", "imageBorderRadiusTopRight": "24px", "textBorderRadiusBottomLeft": "3px", "imageBorderRadiusBottomLeft": "24px", "textBorderRadiusBottomRight": "3px", "imageBorderRadiusBottomRight": "24px"}], "source": "static"}, "customClasses": {"value": null, "source": "static"}, "edgePaddingLG": {"value": 150, "source": "static"}, "edgePaddingMD": {"value": 100, "source": "static"}, "edgePaddingSM": {"value": 50, "source": "static"}, "edgePaddingXL": {"value": 200, "source": "static"}, "edgePaddingXS": {"value": 50, "source": "static"}, "multipleItems": {"value": false, "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "edgePaddingXXL": {"value": 250, "source": "static"}, "navigationDots": {"value": "outside", "source": "static"}, "autoplayTimeout": {"value": 5000, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "navigationArrows": {"value": "inside", "source": "static"}, "autoplayHoverPause": {"value": true, "source": "static"}, "elementBorderRadius": {"value": false, "source": "static"}, "elementBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "elementBorderRadiusTopRight": {"value": "6px", "source": "static"}, "elementBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "elementBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
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
                                'type' => 'zen-grid-9-3',
                                'locked' => 0,
                                'cssClass' => 'zen-animate slide-in-blurred-bottom ',
                                'customFields' => ["zenit_grid_gap" => "0"],
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "6vh",
                                'marginBottom' => "0",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'text',
                                        'slot' => 'col1',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": "<h2>Aktuell im Trend</h2>", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}}', true)                                                        ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content": {"value": "<h2>Currently trending</h2>", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                    'id' => Uuid::randomHex(),
                                    'type' => 'text',
                                    'slot' => 'col2',
                                    'locked' => 0,
                                    'translations' => $this->translationHelper->adjustTranslations([
                                        'de-DE' => [
                                            'config' => json_decode('{"content": {"value": "<div class=\"d-none d-md-block\" style=\"text-align: right;\"><a class=\"btn btn-link\" href=\"#demo-link\">Alle Produkte</a></div>", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}}', true)                                                        ],
                                        'en-GB' => [
                                            'config' => json_decode('{"content": {"value": "<div class=\"d-none d-md-block\" style=\"text-align: right;\"><a class=\"btn btn-link\" href=\"#demo-link\">Shop all products</a></div>", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}}', true)
                                        ]
                                    ])
                                ]
                                ]
                            ],
                            [
                                'position' => 1,
                                'type' => 'product-slider',
                                'locked' => 0,
                                'cssClass' => 'zen-animate slide-in-blurred-bottom',
                                'customFields' => [],
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "20px",
                                'marginBottom' => "8vh",
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
                                                'config' => json_decode('{"title": {"value": "", "source": "static"}, "border": {"value": false, "source": "static"}, "rotate": {"value": false, "source": "static"}, "products": {"value": ' . $this->limitedProducts(7) . ', "source": "static"}, "boxLayout": {"value": "minimal", "source": "static"}, "elMinWidth": {"value": "280px", "source": "static"}, "navigation": {"value": true, "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "productStreamLimit": {"value": 10, "source": "static"}, "productStreamSorting": {"value": "random", "source": "static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"title": {"value": "", "source": "static"}, "border": {"value": false, "source": "static"}, "rotate": {"value": false, "source": "static"}, "products": {"value": ' . $this->limitedProducts(7) . ', "source": "static"}, "boxLayout": {"value": "minimal", "source": "static"}, "elMinWidth": {"value": "280px", "source": "static"}, "navigation": {"value": true, "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "productStreamLimit": {"value": 10, "source": "static"}, "productStreamSorting": {"value": "random", "source": "static"}}', true)
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
                        'backgroundColor' => '#F9ECD3',
                        'type' => 'default',
                        'blocks' => [
                            [
                                'position' => 0,
                                'type' => 'zen-grid-3-9',
                                'locked' => 0,
                                'cssClass' => 'zen-animate slide-in-blurred-bottom',
                                'customFields' => [],
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "10vh",
                                'marginBottom' => "10vh",
                                'marginLeft' => "var(--zen-layout-offset-left)",
                                'marginRight' => "var(--zen-layout-container-spacing-right-down-md)",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'text',
                                        'slot' => 'col1',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": "<div><font color=\"#522604\">Entdecken</font></div>\n<h2 class=\"h1\"><font color=\"#522604\">Einkaufen nach Aktivität des Kindes</font></h2>\n<p class=\"lead\"><font color=\"#522604\">Ein Tag am Strand, die erste Geburtstagsparty, der erste Schnee... Es gibt so viel zu entdecken. Jetzt auf Entdeckungsreise gehen!</font></p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)                                                        ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content": {"value": "<div><font color=\"#522604\">Discover</font></div>\n<h2 class=\"h1\"><font color=\"#522604\">Shop according to your childs activity</font></h2>\n<p class=\"lead\"><font color=\"#522604\">A day at the beach, the first birthday party, the first snow... There is so much to discover. Explore now!</font></p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'zen-image-slider',
                                        'slot' => 'col2',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"axis": {"value": "horizontal", "source": "static"}, "loop": {"value": false, "source": "static"}, "mode": {"value": "carousel", "source": "static"}, "items": {"value": 2.5, "source": "static"}, "speed": {"value": 500, "source": "static"}, "gutter": {"value": 16, "source": "static"}, "rewind": {"value": true, "source": "static"}, "itemsLG": {"value": 1.5, "source": "static"}, "itemsMD": {"value": 1.5, "source": "static"}, "itemsSM": {"value": 1, "source": "static"}, "itemsXL": {"value": 2.25, "source": "static"}, "itemsXS": {"value": 1, "source": "static"}, "autoplay": {"value": false, "source": "static"}, "minHeight": {"value": "460px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "edgePadding": {"value": false, "source": "static"}, "sliderItems": {"value": [{"url": "#demo-link", "text": {"value": "<div class=\"row\">\n    <div class=\"col\">\n        <h4 class=\"mb-0\">\n            Babys erstes Essen<br>\n            <small class=\"fw-light\">Teller, Lätzchen & Co</small>\n        </h4>\n    </div>\n    <div class=\"col-auto align-content-center\">\n        <button type=\"button\" class=\"btn\">\n            <span class=\"icon icon-x icon-sm\">\n                <svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\"><defs><path d=\"m20.5858 13-4.293 4.2929c-.3904.3905-.3904 1.0237 0 1.4142.3906.3905 1.0238.3905 1.4143 0l6-6c.3905-.3905.3905-1.0237 0-1.4142l-6-6c-.3905-.3905-1.0237-.3905-1.4142 0-.3905.3905-.3905 1.0237 0 1.4142L20.5858 11H1c-.5523 0-1 .4477-1 1s.4477 1 1 1h19.5858z\" id=\"icons-default-arrow-right\" /></defs><use xlink:href=\"#icons-default-arrow-right\" fill=\"var(--zen-text-color)\" fill-rule=\"evenodd\" /></svg>\n            </span>\n        </button>\n    </div>\n</div>", "source": "static"}, "color": "var(--zen-text-color)", "newTab": false, "mediaId": "' . self::$cmsImageIds[30] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[30] . '", "animation": "zoom", "textScale": false, "codeEditor": true, "animationIn": "none", "textMargins": true, "overlayColor": "#000000", "textMaxWidth": "100%", "textMinWidth": "100%", "textPaddings": true, "headlineScale": false, "textMarginTop": "0", "backgroundBlur": "0px", "overlayOpacity": "50%", "textMarginLeft": "0", "textPaddingTop": "16px", "backgroundColor": "#ffffff", "textMarginRight": "0", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "0", "textPaddingRight": "16px", "customItemClasses": null, "imageBorderRadius": true, "textPaddingBottom": "16px", "verticalTextAlign": "flex-end", "verticalImageAlign": "center", "horizontalTextAlign": "center", "horizontalImageAlign": "center", "textBorderRadiusTopLeft": "3px", "imageBorderRadiusTopLeft": "24px", "textBorderRadiusTopRight": "3px", "imageBorderRadiusTopRight": "24px", "textBorderRadiusBottomLeft": "3px", "imageBorderRadiusBottomLeft": "24px", "textBorderRadiusBottomRight": "3px", "imageBorderRadiusBottomRight": "24px"}, {"url": "#demo-link", "text": {"value": "<div class=\"row\">\n    <div class=\"col\">\n        <h4 class=\"mb-0\">\n            Babies erstes Spielzeug<br>\n            <small class=\"fw-light\">altersgerecht spielen</small>\n        </h4>\n    </div>\n    <div class=\"col-auto align-content-center\">\n        <button type=\"button\" class=\"btn\">\n            <span class=\"icon icon-x icon-sm\">\n                <svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\"><defs><path d=\"m20.5858 13-4.293 4.2929c-.3904.3905-.3904 1.0237 0 1.4142.3906.3905 1.0238.3905 1.4143 0l6-6c.3905-.3905.3905-1.0237 0-1.4142l-6-6c-.3905-.3905-1.0237-.3905-1.4142 0-.3905.3905-.3905 1.0237 0 1.4142L20.5858 11H1c-.5523 0-1 .4477-1 1s.4477 1 1 1h19.5858z\" id=\"icons-default-arrow-right\" /></defs><use xlink:href=\"#icons-default-arrow-right\" fill=\"var(--zen-text-color)\" fill-rule=\"evenodd\" /></svg>\n            </span>\n        </button>\n    </div>\n</div>", "source": "static"}, "color": "var(--zen-text-color)", "newTab": false, "mediaId": "' . self::$cmsImageIds[31] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[31] . '", "animation": "zoom", "textScale": false, "codeEditor": true, "animationIn": "none", "textMargins": true, "overlayColor": "#000000", "textMaxWidth": "100%", "textMinWidth": "100%", "textPaddings": true, "headlineScale": false, "textMarginTop": "0", "backgroundBlur": "0px", "overlayOpacity": "50%", "textMarginLeft": "0", "textPaddingTop": "16px", "backgroundColor": "#ffffff", "textMarginRight": "0", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "0", "textPaddingRight": "16px", "customItemClasses": null, "imageBorderRadius": true, "textPaddingBottom": "16px", "verticalTextAlign": "flex-end", "verticalImageAlign": "center", "horizontalTextAlign": "center", "horizontalImageAlign": "center", "textBorderRadiusTopLeft": "3px", "imageBorderRadiusTopLeft": "24px", "textBorderRadiusTopRight": "3px", "imageBorderRadiusTopRight": "24px", "textBorderRadiusBottomLeft": "3px", "imageBorderRadiusBottomLeft": "24px", "textBorderRadiusBottomRight": "3px", "imageBorderRadiusBottomRight": "24px"}, {"url": "#demo-link", "text": {"value": "<div class=\"row\">\n    <div class=\"col\">\n        <h4 class=\"mb-0\">\n            Ein Tag am Strand<br>\n            <small class=\"fw-light\">Strand Outfits & Spielzeug</small>\n        </h4>\n    </div>\n    <div class=\"col-auto align-content-center\">\n        <button class=\"btn\" type=\"button\">\n            <span class=\"icon icon-x icon-sm\">\n                <svg viewBox=\"0 0 24 24\" height=\"24\" width=\"24\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" xmlns=\"http://www.w3.org/2000/svg\"><defs><path id=\"icons-default-arrow-right\" d=\"m20.5858 13-4.293 4.2929c-.3904.3905-.3904 1.0237 0 1.4142.3906.3905 1.0238.3905 1.4143 0l6-6c.3905-.3905.3905-1.0237 0-1.4142l-6-6c-.3905-.3905-1.0237-.3905-1.4142 0-.3905.3905-.3905 1.0237 0 1.4142L20.5858 11H1c-.5523 0-1 .4477-1 1s.4477 1 1 1h19.5858z\"></path></defs></svg>\n            </span>\n        </button>\n    </div>\n</div>", "source": "static"}, "color": "var(--zen-text-color)", "newTab": false, "mediaId": "' . self::$cmsImageIds[32] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[32] . '", "animation": "zoom", "textScale": false, "codeEditor": true, "animationIn": "none", "textMargins": true, "overlayColor": "#000000", "textMaxWidth": "100%", "textMinWidth": "100%", "textPaddings": true, "headlineScale": false, "textMarginTop": "0", "backgroundBlur": "0px", "overlayOpacity": "50%", "textMarginLeft": "0", "textPaddingTop": "16px", "backgroundColor": "#ffffff", "textMarginRight": "0", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "0", "textPaddingRight": "16px", "customItemClasses": null, "imageBorderRadius": true, "textPaddingBottom": "16px", "verticalTextAlign": "flex-end", "verticalImageAlign": "center", "horizontalTextAlign": "center", "horizontalImageAlign": "center", "textBorderRadiusTopLeft": "3px", "imageBorderRadiusTopLeft": "24px", "textBorderRadiusTopRight": "3px", "imageBorderRadiusTopRight": "24px", "textBorderRadiusBottomLeft": "3px", "imageBorderRadiusBottomLeft": "24px", "textBorderRadiusBottomRight": "3px", "imageBorderRadiusBottomRight": "24px"}, {"url": "#demo-link", "text": {"value": "<div class=\"row\">\n    <div class=\"col\">\n        <h4 class=\"mb-0\">\n            Geburtstag für Kleinkinder<br>\n            <small class=\"fw-light\">Mach mit bei der Party</small>\n        </h4>\n    </div>\n    <div class=\"col-auto align-content-center\">\n        <button type=\"button\" class=\"btn\">\n            <span class=\"icon icon-x icon-sm\">\n                <svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\"><defs><path d=\"m20.5858 13-4.293 4.2929c-.3904.3905-.3904 1.0237 0 1.4142.3906.3905 1.0238.3905 1.4143 0l6-6c.3905-.3905.3905-1.0237 0-1.4142l-6-6c-.3905-.3905-1.0237-.3905-1.4142 0-.3905.3905-.3905 1.0237 0 1.4142L20.5858 11H1c-.5523 0-1 .4477-1 1s.4477 1 1 1h19.5858z\" id=\"icons-default-arrow-right\" /></defs><use xlink:href=\"#icons-default-arrow-right\" fill=\"var(--zen-text-color)\" fill-rule=\"evenodd\" /></svg>\n            </span>\n        </button>\n    </div>\n</div>", "source": "static"}, "color": "var(--zen-text-color)", "newTab": false, "mediaId": "' . self::$cmsImageIds[33] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[33] . '", "animation": "zoom", "textScale": false, "codeEditor": true, "animationIn": "none", "textMargins": true, "overlayColor": "#000000", "textMaxWidth": "100%", "textMinWidth": "100%", "textPaddings": true, "headlineScale": false, "textMarginTop": "0", "backgroundBlur": "0px", "overlayOpacity": "50%", "textMarginLeft": "0", "textPaddingTop": "16px", "backgroundColor": "#ffffff", "textMarginRight": "0", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "0", "textPaddingRight": "16px", "customItemClasses": null, "imageBorderRadius": true, "textPaddingBottom": "16px", "verticalTextAlign": "flex-end", "verticalImageAlign": "center", "horizontalTextAlign": "center", "horizontalImageAlign": "center", "textBorderRadiusTopLeft": "3px", "imageBorderRadiusTopLeft": "24px", "textBorderRadiusTopRight": "3px", "imageBorderRadiusTopRight": "24px", "textBorderRadiusBottomLeft": "3px", "imageBorderRadiusBottomLeft": "24px", "textBorderRadiusBottomRight": "3px", "imageBorderRadiusBottomRight": "24px"}], "source": "static"}, "customClasses": {"value": null, "source": "static"}, "edgePaddingLG": {"value": 0, "source": "static"}, "edgePaddingMD": {"value": 0, "source": "static"}, "edgePaddingSM": {"value": 0, "source": "static"}, "edgePaddingXL": {"value": 0, "source": "static"}, "edgePaddingXS": {"value": 0, "source": "static"}, "multipleItems": {"value": true, "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "edgePaddingXXL": {"value": 0, "source": "static"}, "navigationDots": {"value": null, "source": "static"}, "autoplayTimeout": {"value": 5000, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "navigationArrows": {"value": "inside", "source": "static"}, "autoplayHoverPause": {"value": true, "source": "static"}, "elementBorderRadius": {"value": false, "source": "static"}, "elementBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "elementBorderRadiusTopRight": {"value": "6px", "source": "static"}, "elementBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "elementBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)                                                        ],
                                            'en-GB' => [
                                                'config' => json_decode('{"axis": {"value": "horizontal", "source": "static"}, "loop": {"value": false, "source": "static"}, "mode": {"value": "carousel", "source": "static"}, "items": {"value": 2.5, "source": "static"}, "speed": {"value": 500, "source": "static"}, "gutter": {"value": 16, "source": "static"}, "rewind": {"value": true, "source": "static"}, "itemsLG": {"value": 1.5, "source": "static"}, "itemsMD": {"value": 1.5, "source": "static"}, "itemsSM": {"value": 1, "source": "static"}, "itemsXL": {"value": 2.25, "source": "static"}, "itemsXS": {"value": 1, "source": "static"}, "autoplay": {"value": false, "source": "static"}, "minHeight": {"value": "460px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "edgePadding": {"value": false, "source": "static"}, "sliderItems": {"value": [{"url": "#demo-link", "text": {"value": "<div class=\"row\">\n    <div class=\"col\">\n        <h4 class=\"mb-0\">\n            Baby\'s first feeding<br>\n            <small class=\"fw-light\">Plates, bibs and co</small>\n        </h4>\n    </div>\n    <div class=\"col-auto align-content-center\">\n        <button type=\"button\" class=\"btn\">\n            <span class=\"icon icon-x icon-sm\">\n                <svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\"><defs><path d=\"m20.5858 13-4.293 4.2929c-.3904.3905-.3904 1.0237 0 1.4142.3906.3905 1.0238.3905 1.4143 0l6-6c.3905-.3905.3905-1.0237 0-1.4142l-6-6c-.3905-.3905-1.0237-.3905-1.4142 0-.3905.3905-.3905 1.0237 0 1.4142L20.5858 11H1c-.5523 0-1 .4477-1 1s.4477 1 1 1h19.5858z\" id=\"icons-default-arrow-right\" /></defs><use xlink:href=\"#icons-default-arrow-right\" fill=\"var(--zen-text-color)\" fill-rule=\"evenodd\" /></svg>\n            </span>\n        </button>\n    </div>\n</div>", "source": "static"}, "color": "var(--zen-text-color)", "newTab": false, "mediaId": "' . self::$cmsImageIds[30] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[30] . '", "animation": "zoom", "textScale": false, "codeEditor": true, "animationIn": "none", "textMargins": true, "overlayColor": "#000000", "textMaxWidth": "100%", "textMinWidth": "100%", "textPaddings": true, "headlineScale": false, "textMarginTop": "0", "backgroundBlur": "0px", "overlayOpacity": "50%", "textMarginLeft": "0", "textPaddingTop": "16px", "backgroundColor": "#ffffff", "textMarginRight": "0", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "0", "textPaddingRight": "16px", "customItemClasses": null, "imageBorderRadius": true, "textPaddingBottom": "16px", "verticalTextAlign": "flex-end", "verticalImageAlign": "center", "horizontalTextAlign": "center", "horizontalImageAlign": "center", "textBorderRadiusTopLeft": "3px", "imageBorderRadiusTopLeft": "24px", "textBorderRadiusTopRight": "3px", "imageBorderRadiusTopRight": "24px", "textBorderRadiusBottomLeft": "3px", "imageBorderRadiusBottomLeft": "24px", "textBorderRadiusBottomRight": "3px", "imageBorderRadiusBottomRight": "24px"}, {"url": "#demo-link", "text": {"value": "<div class=\"row\">\n    <div class=\"col\">\n        <h4 class=\"mb-0\">\n            A day at the beach<br>\n            <small class=\"fw-light\">Beach outfits & toys</small>\n        </h4>\n    </div>\n    <div class=\"col-auto align-content-center\">\n        <button class=\"btn\" type=\"button\">\n            <span class=\"icon icon-x icon-sm\">\n                <svg viewBox=\"0 0 24 24\" height=\"24\" width=\"24\" xmlns:xlink=\"http://www.w3.org/2000/svg\" xmlns=\"http://www.w3.org/2000/svg\"><defs><path id=\"icons-default-arrow-right\" d=\"m20.5858 13-4.293 4.2929c-.3904.3905-.3904 1.0237 0 1.4142.3906.3905 1.0238.3905 1.4143 0l6-6c.3905-.3905.3905-1.0237 0-1.4142l-6-6c-.3905-.3905-1.0237-.3905-1.4142 0-.3905.3905-.3905 1.0237 0 1.4142L20.5858 11H1c-.5523 0-1 .4477-1 1s.4477 1 1 1h19.5858z\"></path></defs></svg>\n            </span>\n        </button>\n    </div>\n</div>", "source": "static"}, "color": "var(--zen-text-color)", "newTab": false, "mediaId": "' . self::$cmsImageIds[31] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[31] . '", "animation": "zoom", "textScale": false, "codeEditor": true, "animationIn": "none", "textMargins": true, "overlayColor": "#000000", "textMaxWidth": "100%", "textMinWidth": "100%", "textPaddings": true, "headlineScale": false, "textMarginTop": "0", "backgroundBlur": "0px", "overlayOpacity": "50%", "textMarginLeft": "0", "textPaddingTop": "16px", "backgroundColor": "#ffffff", "textMarginRight": "0", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "0", "textPaddingRight": "16px", "customItemClasses": null, "imageBorderRadius": true, "textPaddingBottom": "16px", "verticalTextAlign": "flex-end", "verticalImageAlign": "center", "horizontalTextAlign": "center", "horizontalImageAlign": "center", "textBorderRadiusTopLeft": "3px", "imageBorderRadiusTopLeft": "24px", "textBorderRadiusTopRight": "3px", "imageBorderRadiusTopRight": "24px", "textBorderRadiusBottomLeft": "3px", "imageBorderRadiusBottomLeft": "24px", "textBorderRadiusBottomRight": "3px", "imageBorderRadiusBottomRight": "24px"}, {"url": "#demo-link", "text": {"value": "<div class=\"row\">\n    <div class=\"col\">\n        <h4 class=\"mb-0\">\n            Baby\'s first toys<br>\n            <small class=\"fw-light\">play age-appropriately</small>\n        </h4>\n    </div>\n    <div class=\"col-auto align-content-center\">\n        <button type=\"button\" class=\"btn\">\n            <span class=\"icon icon-x icon-sm\">\n                <svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\"><defs><path d=\"m20.5858 13-4.293 4.2929c-.3904.3905-.3904 1.0237 0 1.4142.3906.3905 1.0238.3905 1.4143 0l6-6c.3905-.3905.3905-1.0237 0-1.4142l-6-6c-.3905-.3905-1.0237-.3905-1.4142 0-.3905.3905-.3905 1.0237 0 1.4142L20.5858 11H1c-.5523 0-1 .4477-1 1s.4477 1 1 1h19.5858z\" id=\"icons-default-arrow-right\" /></defs><use xlink:href=\"#icons-default-arrow-right\" fill=\"var(--zen-text-color)\" fill-rule=\"evenodd\" /></svg>\n            </span>\n        </button>\n    </div>\n</div>", "source": "static"}, "color": "var(--zen-text-color)", "newTab": false, "mediaId": "' . self::$cmsImageIds[32] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[32] . '", "animation": "zoom", "textScale": false, "codeEditor": true, "animationIn": "none", "textMargins": true, "overlayColor": "#000000", "textMaxWidth": "100%", "textMinWidth": "100%", "textPaddings": true, "headlineScale": false, "textMarginTop": "0", "backgroundBlur": "0px", "overlayOpacity": "50%", "textMarginLeft": "0", "textPaddingTop": "16px", "backgroundColor": "#ffffff", "textMarginRight": "0", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "0", "textPaddingRight": "16px", "customItemClasses": null, "imageBorderRadius": true, "textPaddingBottom": "16px", "verticalTextAlign": "flex-end", "verticalImageAlign": "center", "horizontalTextAlign": "center", "horizontalImageAlign": "center", "textBorderRadiusTopLeft": "3px", "imageBorderRadiusTopLeft": "24px", "textBorderRadiusTopRight": "3px", "imageBorderRadiusTopRight": "24px", "textBorderRadiusBottomLeft": "3px", "imageBorderRadiusBottomLeft": "24px", "textBorderRadiusBottomRight": "3px", "imageBorderRadiusBottomRight": "24px"}, {"url": "#demo-link", "text": {"value": "<div class=\"row\">\n    <div class=\"col\">\n        <h4 class=\"mb-0\">\n            Toddlers birthday<br>\n            <small class=\"fw-light\">Join the party</small>\n        </h4>\n    </div>\n    <div class=\"col-auto align-content-center\">\n        <button type=\"button\" class=\"btn\">\n            <span class=\"icon icon-x icon-sm\">\n                <svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\"><defs><path d=\"m20.5858 13-4.293 4.2929c-.3904.3905-.3904 1.0237 0 1.4142.3906.3905 1.0238.3905 1.4143 0l6-6c.3905-.3905.3905-1.0237 0-1.4142l-6-6c-.3905-.3905-1.0237-.3905-1.4142 0-.3905.3905-.3905 1.0237 0 1.4142L20.5858 11H1c-.5523 0-1 .4477-1 1s.4477 1 1 1h19.5858z\" id=\"icons-default-arrow-right\" /></defs><use xlink:href=\"#icons-default-arrow-right\" fill=\"var(--zen-text-color)\" fill-rule=\"evenodd\" /></svg>\n            </span>\n        </button>\n    </div>\n</div>", "source": "static"}, "color": "var(--zen-text-color)", "newTab": false, "mediaId": "' . self::$cmsImageIds[33] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[33] . '", "animation": "zoom", "textScale": false, "codeEditor": true, "animationIn": "none", "textMargins": true, "overlayColor": "#000000", "textMaxWidth": "100%", "textMinWidth": "100%", "textPaddings": true, "headlineScale": false, "textMarginTop": "0", "backgroundBlur": "0px", "overlayOpacity": "50%", "textMarginLeft": "0", "textPaddingTop": "16px", "backgroundColor": "#ffffff", "textMarginRight": "0", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "0", "textPaddingRight": "16px", "customItemClasses": null, "imageBorderRadius": true, "textPaddingBottom": "16px", "verticalTextAlign": "flex-end", "verticalImageAlign": "center", "horizontalTextAlign": "center", "horizontalImageAlign": "center", "textBorderRadiusTopLeft": "3px", "imageBorderRadiusTopLeft": "24px", "textBorderRadiusTopRight": "3px", "imageBorderRadiusTopRight": "24px", "textBorderRadiusBottomLeft": "3px", "imageBorderRadiusBottomLeft": "24px", "textBorderRadiusBottomRight": "3px", "imageBorderRadiusBottomRight": "24px"}], "source": "static"}, "customClasses": {"value": null, "source": "static"}, "edgePaddingLG": {"value": 0, "source": "static"}, "edgePaddingMD": {"value": 0, "source": "static"}, "edgePaddingSM": {"value": 0, "source": "static"}, "edgePaddingXL": {"value": 0, "source": "static"}, "edgePaddingXS": {"value": 0, "source": "static"}, "multipleItems": {"value": true, "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "edgePaddingXXL": {"value": 0, "source": "static"}, "navigationDots": {"value": null, "source": "static"}, "autoplayTimeout": {"value": 5000, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "navigationArrows": {"value": "inside", "source": "static"}, "autoplayHoverPause": {"value": true, "source": "static"}, "elementBorderRadius": {"value": false, "source": "static"}, "elementBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "elementBorderRadiusTopRight": {"value": "6px", "source": "static"}, "elementBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "elementBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
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
                        'type' => 'default',
                        'blocks' => [
                            [
                                'position' => 0,
                                'type' => 'text-teaser',
                                'locked' => 0,
                                'cssClass' => 'zen-animate slide-in-blurred-bottom',
                                'customFields' => [],
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "8vh",
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
                                                'config' => json_decode('{"content": {"value": "<h2 style=\"text-align: center;\">Stay inspired</h2>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)                                                        ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content": {"value": "<h2 style=\"text-align: center;\">Stay inspired</h2>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ]
                                ]
                            ],
                            [
                                'position' => 1,
                                'type' => 'zen-grid-4-4-4-el-2',
                                'locked' => 0,
                                'cssClass' => 'zen-animate slide-in-blurred-bottom',
                                'customFields' => ["zenit_grid_gap" => "16px"],
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "0",
                                'marginBottom' => "8vh",
                                'marginLeft' => "8vw",
                                'marginRight' => "8vw",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'zen-teaser',
                                        'slot' => 'col1row1',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "mehr", "source": "static"}, "color": {"value": "var(--zen-text-color)", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[34] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "14px", "source": "static"}, "minHeight": {"value": "520px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "show-arrow", "source": "static"}, "fontFamily": {"value": "headline", "source": "static"}, "fontWeight": {"value": "600", "source": "static"}, "imageHover": {"value": "zoom", "source": "static"}, "animationIn": {"value": "slide-in-right", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "slide-out-right", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": false, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "backgroundBlur": {"value": "0px", "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "8px", "source": "static"}, "backgroundColor": {"value": "#ffffff", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "16px", "source": "static"}, "textBorderRadius": {"value": true, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "16px", "source": "static"}, "imageBorderRadius": {"value": true, "source": "static"}, "textPaddingBottom": {"value": "8px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": "center", "source": "static"}, "horizontalTextAlign": {"value": "flex-end", "source": "static"}, "horizontalImageAlign": {"value": "center", "source": "static"}, "textBorderRadiusTopLeft": {"value": "24px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "24px", "source": "static"}, "textBorderRadiusTopRight": {"value": "24px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "24px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "24px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "24px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "24px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "24px", "source": "static"}}', true)                                                        ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "more", "source": "static"}, "color": {"value": "var(--zen-text-color)", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[34] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "14px", "source": "static"}, "minHeight": {"value": "520px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "show-arrow", "source": "static"}, "fontFamily": {"value": "headline", "source": "static"}, "fontWeight": {"value": "600", "source": "static"}, "imageHover": {"value": "zoom", "source": "static"}, "animationIn": {"value": "slide-in-right", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "slide-out-right", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": false, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "backgroundBlur": {"value": "0px", "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "8px", "source": "static"}, "backgroundColor": {"value": "#ffffff", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "16px", "source": "static"}, "textBorderRadius": {"value": true, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "16px", "source": "static"}, "imageBorderRadius": {"value": true, "source": "static"}, "textPaddingBottom": {"value": "8px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": "center", "source": "static"}, "horizontalTextAlign": {"value": "flex-end", "source": "static"}, "horizontalImageAlign": {"value": "center", "source": "static"}, "textBorderRadiusTopLeft": {"value": "24px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "24px", "source": "static"}, "textBorderRadiusTopRight": {"value": "24px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "24px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "24px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "24px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "24px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "24px", "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'text',
                                        'slot' => 'col1row2',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": "<small>GUIDE</small><br>\n<a href=\"#demo-link\"><h3>Babys erste Nahrung - Der komplette Leitfaden zur Einführung fester Nahrung</h3></a>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)                                                        ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content": {"value": "<small>GUIDE</small><br>\n<a href=\"#demo-link\"><h3>Baby’s First Food - The Complete Guide to Starting Solids</h3></a>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'zen-teaser',
                                        'slot' => 'col2row1',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "mehr", "source": "static"}, "color": {"value": "var(--zen-text-color)", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[35] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "14px", "source": "static"}, "minHeight": {"value": "520px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "show-arrow", "source": "static"}, "fontFamily": {"value": "headline", "source": "static"}, "fontWeight": {"value": "600", "source": "static"}, "imageHover": {"value": "zoom", "source": "static"}, "animationIn": {"value": "slide-in-right", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "slide-out-right", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": false, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "backgroundBlur": {"value": "0px", "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "8px", "source": "static"}, "backgroundColor": {"value": "#ffffff", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "16px", "source": "static"}, "textBorderRadius": {"value": true, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "16px", "source": "static"}, "imageBorderRadius": {"value": true, "source": "static"}, "textPaddingBottom": {"value": "8px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": "center", "source": "static"}, "horizontalTextAlign": {"value": "flex-end", "source": "static"}, "horizontalImageAlign": {"value": "center", "source": "static"}, "textBorderRadiusTopLeft": {"value": "24px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "24px", "source": "static"}, "textBorderRadiusTopRight": {"value": "24px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "24px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "24px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "24px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "24px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "24px", "source": "static"}}', true)                                                        ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "more", "source": "static"}, "color": {"value": "var(--zen-text-color)", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[35] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "14px", "source": "static"}, "minHeight": {"value": "520px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "show-arrow", "source": "static"}, "fontFamily": {"value": "headline", "source": "static"}, "fontWeight": {"value": "600", "source": "static"}, "imageHover": {"value": "zoom", "source": "static"}, "animationIn": {"value": "slide-in-right", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "slide-out-right", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": false, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "backgroundBlur": {"value": "0px", "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "8px", "source": "static"}, "backgroundColor": {"value": "#ffffff", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "16px", "source": "static"}, "textBorderRadius": {"value": true, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "16px", "source": "static"}, "imageBorderRadius": {"value": true, "source": "static"}, "textPaddingBottom": {"value": "8px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": "center", "source": "static"}, "horizontalTextAlign": {"value": "flex-end", "source": "static"}, "horizontalImageAlign": {"value": "center", "source": "static"}, "textBorderRadiusTopLeft": {"value": "24px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "24px", "source": "static"}, "textBorderRadiusTopRight": {"value": "24px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "24px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "24px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "24px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "24px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "24px", "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'text',
                                        'slot' => 'col2row2',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": "<small>INSPIRATION</small><br>\n<a href=\"#demo-link\"><h3>Unterstützen Sie das Spiel Ihrer Kinder mit unseren kreativen Ideen</h3></a>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)                                                        ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content": {"value": "<small>INSPIRATION</small><br>\n<a href=\"#demo-link\"><h3>Support your childrens play with creative ideas from us</h3></a>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'zen-teaser',
                                        'slot' => 'col3row1',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "mehr", "source": "static"}, "color": {"value": "var(--zen-text-color)", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[36] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "14px", "source": "static"}, "minHeight": {"value": "520px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "show-arrow", "source": "static"}, "fontFamily": {"value": "headline", "source": "static"}, "fontWeight": {"value": "600", "source": "static"}, "imageHover": {"value": "zoom", "source": "static"}, "animationIn": {"value": "slide-in-right", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "slide-out-right", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": false, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "backgroundBlur": {"value": "0px", "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "8px", "source": "static"}, "backgroundColor": {"value": "#ffffff", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "16px", "source": "static"}, "textBorderRadius": {"value": true, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "16px", "source": "static"}, "imageBorderRadius": {"value": true, "source": "static"}, "textPaddingBottom": {"value": "8px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": "center", "source": "static"}, "horizontalTextAlign": {"value": "flex-end", "source": "static"}, "horizontalImageAlign": {"value": "center", "source": "static"}, "textBorderRadiusTopLeft": {"value": "24px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "24px", "source": "static"}, "textBorderRadiusTopRight": {"value": "24px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "24px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "24px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "24px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "24px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "24px", "source": "static"}}', true)                                                        ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "more", "source": "static"}, "color": {"value": "var(--zen-text-color)", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[36] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "14px", "source": "static"}, "minHeight": {"value": "520px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "show-arrow", "source": "static"}, "fontFamily": {"value": "headline", "source": "static"}, "fontWeight": {"value": "600", "source": "static"}, "imageHover": {"value": "zoom", "source": "static"}, "animationIn": {"value": "slide-in-right", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "textMargins": {"value": false, "source": "static"}, "animationOut": {"value": "slide-out-right", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "", "source": "static"}, "textMinWidth": {"value": null, "source": "static"}, "textPaddings": {"value": false, "source": "static"}, "customClasses": {"value": null, "source": "static"}, "textMarginTop": {"value": "20px", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "backgroundBlur": {"value": "0px", "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "20px", "source": "static"}, "textPaddingTop": {"value": "8px", "source": "static"}, "backgroundColor": {"value": "#ffffff", "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textMarginRight": {"value": "20px", "source": "static"}, "textPaddingLeft": {"value": "16px", "source": "static"}, "textBorderRadius": {"value": true, "source": "static"}, "textMarginBottom": {"value": "20px", "source": "static"}, "textPaddingRight": {"value": "16px", "source": "static"}, "imageBorderRadius": {"value": true, "source": "static"}, "textPaddingBottom": {"value": "8px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": "center", "source": "static"}, "horizontalTextAlign": {"value": "flex-end", "source": "static"}, "horizontalImageAlign": {"value": "center", "source": "static"}, "textBorderRadiusTopLeft": {"value": "24px", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "24px", "source": "static"}, "textBorderRadiusTopRight": {"value": "24px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "24px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "24px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "24px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "24px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "24px", "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'text',
                                        'slot' => 'col3row2',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": "<small>GUIDE</small><br>\n<a href=\"#demo-link\"><h3>Wie Sie Ihr Kleinkind zum Schlafen bringen (und wie nicht)</h3></a>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)                                                        ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content": {"value": "<small>GUIDE</small><br>\n<a href=\"#demo-link\"><h3>How to get your toddler to sleep (and how not to)</h3></a>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
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
                        'backgroundColor' => '#fdf5f3',
                        'type' => 'default',
                        'blocks' => [
                            [
                                'position' => 0,
                                'type' => 'zen-features',
                                'locked' => 0,
                                'cssClass' => 'zen-animate slide-in-blurred-bottom',
                                'customFields' => [],
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "40px",
                                'marginBottom' => "40px",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'zen-features',
                                        'slot' => 'content',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"feature1": {"value": "<div class=\"lh-1\">Schnelle Lieferung<small><div style=\"font-weight: lighter;\">Lieferung in maximal 24 Stunden!</div></small></div>", "source": "static"}, "feature2": {"value": "<div class=\"lh-1\">Sicher bezahlen<small><div style=\"font-weight: lighter;\">Visa, Mastercard, PayPal ...</div></small></div>", "source": "static"}, "feature3": {"value": "<div class=\"lh-1\">Kostenlose Retoure<small><div style=\"font-weight: lighter;\">15 Tagen kostenloser Rückversand</div></small></div>", "source": "static"}, "feature4": {"value": "<div class=\"lh-1\">Help Center<small><div style=\"font-weight: lighter;\">Support rund um die Uhr</div></small></div>", "source": "static"}, "fontSize": {"value": "18px", "source": "static"}, "iconSize": {"value": "32px", "source": "static"}, "alignment": {"value": "start", "source": "static"}, "iconColor": {"value": "var(--zen-color-brand-primary)", "source": "static"}, "textColor": {"value": "var(--zen-text-color)", "source": "static"}, "appearance": {"value": "iconsLeft", "source": "static"}, "fontFamily": {"value": "headline", "source": "static"}, "fontWeight": {"value": "600", "source": "static"}, "feature1Icon": {"value": "package-closed", "source": "static"}, "feature2Icon": {"value": "money-card", "source": "static"}, "feature3Icon": {"value": "arrow-360-left", "source": "static"}, "feature4Icon": {"value": "speech-bubble", "source": "static"}, "textAlignment": {"value": "start", "source": "static"}, "customClasses": {"value": null, "source": "static"}}', true)                                                        ],
                                            'en-GB' => [
                                                'config' => json_decode('{"feature1": {"value": "<div class=\"lh-1\">Fast Delivery<small><div style=\"font-weight: lighter;\">Deliver in 24 hours max!</div></small></div>", "source": "static"}, "feature2": {"value": "<div class=\"lh-1\">Safer payment<small><div style=\"font-weight: lighter;\">Visa, Mastercard, PayPal ...</div></small></div>", "source": "static"}, "feature3": {"value": "<div class=\"lh-1\">Free Returns<small><div style=\"font-weight: lighter;\">Free returns within 15 days</div></small></div>", "source": "static"}, "feature4": {"value": "<div class=\"lh-1\">Help Center<small><div style=\"font-weight: lighter;\">Dedicated 24/7 support</div></small></div>", "source": "static"}, "fontSize": {"value": "18px", "source": "static"}, "iconSize": {"value": "32px", "source": "static"}, "alignment": {"value": "start", "source": "static"}, "iconColor": {"value": "var(--zen-color-brand-primary)", "source": "static"}, "textColor": {"value": "var(--zen-text-color)", "source": "static"}, "appearance": {"value": "iconsLeft", "source": "static"}, "fontFamily": {"value": "headline", "source": "static"}, "fontWeight": {"value": "600", "source": "static"}, "feature1Icon": {"value": "package-closed", "source": "static"}, "feature2Icon": {"value": "money-card", "source": "static"}, "feature3Icon": {"value": "arrow-360-left", "source": "static"}, "feature4Icon": {"value": "speech-bubble", "source": "static"}, "textAlignment": {"value": "start", "source": "static"}, "customClasses": {"value": null, "source": "static"}}', true)
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
                                'cssClass' => 'zen-animate slide-in-blurred-bottom',
                                'customFields' => [],
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "8vh",
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
                                                'config' => json_decode('{"content": {"value": "<h2>Kinderzimmer & Babyzimmereinrichtung</h2>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)                                                        ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content": {"value": "<h2>Nursery room &amp; Baby room interior</h2>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ]
                                ]
                            ]
                        ]
                    ],
                    [
                        'id' => Uuid::randomHex(),
                        'position' => 7,
                        'sizingMode' => 'full_width',
                        'type' => 'default',
                        'blocks' => [
                            [
                                'position' => 0,
                                'type' => 'zen-image-slider',
                                'locked' => 0,
                                'cssClass' => 'zen-animate slide-in-blurred-bottom',
                                'customFields' => [],
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "0",
                                'marginBottom' => "8vh",
                                'marginLeft' => "var(--zen-layout-offset-left)",
                                'marginRight' => "0",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'zen-image-slider',
                                        'slot' => 'imageSlider',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"axis": {"value": "horizontal", "source": "static"}, "loop": {"value": false, "source": "static"}, "mode": {"value": "carousel", "source": "static"}, "items": {"value": 1.25, "source": "static"}, "speed": {"value": 500, "source": "static"}, "gutter": {"value": 16, "source": "static"}, "rewind": {"value": true, "source": "static"}, "itemsLG": {"value": 1.25, "source": "static"}, "itemsMD": {"value": 1.25, "source": "static"}, "itemsSM": {"value": 1.25, "source": "static"}, "itemsXL": {"value": 1.25, "source": "static"}, "itemsXS": {"value": 1.25, "source": "static"}, "autoplay": {"value": false, "source": "static"}, "minHeight": {"value": "60vh", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "edgePadding": {"value": false, "source": "static"}, "sliderItems": {"value": [{"url": "#demo-link", "text": {"value": "<h4>Serie: Scandi-style</h4>", "source": "static"}, "color": "#ffffff", "newTab": false, "mediaId": "' . self::$cmsImageIds[37] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[37] . '", "animation": "zoom", "textScale": false, "animationIn": "none", "textMargins": true, "overlayColor": "#000000", "textMaxWidth": "", "textMinWidth": null, "textPaddings": false, "headlineScale": true, "textMarginTop": "50px", "backgroundBlur": "0px", "overlayOpacity": "50%", "textMarginLeft": "50px", "textPaddingTop": "8px", "backgroundColor": "transparent", "textMarginRight": "50px", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "50px", "textPaddingRight": "16px", "customItemClasses": null, "imageBorderRadius": true, "textPaddingBottom": "8px", "verticalTextAlign": "flex-end", "verticalImageAlign": "center", "horizontalTextAlign": "flex-start", "horizontalImageAlign": "center", "textBorderRadiusTopLeft": "3px", "imageBorderRadiusTopLeft": "24px", "textBorderRadiusTopRight": "3px", "imageBorderRadiusTopRight": "24px", "textBorderRadiusBottomLeft": "3px", "imageBorderRadiusBottomLeft": "24px", "textBorderRadiusBottomRight": "3px", "imageBorderRadiusBottomRight": "24px"}, {"url": "#demo-link", "text": {"value": "<h4>Serie: Minimalistisch</h4>", "source": "static"}, "color": "#ffffff", "newTab": false, "mediaId": "' . self::$cmsImageIds[38] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[38] . '", "animation": "zoom", "textScale": false, "animationIn": "none", "textMargins": true, "overlayColor": "#000000", "textMaxWidth": "", "textMinWidth": null, "textPaddings": false, "headlineScale": true, "textMarginTop": "50px", "backgroundBlur": "0px", "overlayOpacity": "50%", "textMarginLeft": "50px", "textPaddingTop": "8px", "backgroundColor": "transparent", "textMarginRight": "50px", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "50px", "textPaddingRight": "16px", "customItemClasses": null, "imageBorderRadius": true, "textPaddingBottom": "8px", "verticalTextAlign": "flex-end", "verticalImageAlign": "center", "horizontalTextAlign": "flex-start", "horizontalImageAlign": "center", "textBorderRadiusTopLeft": "3px", "imageBorderRadiusTopLeft": "24px", "textBorderRadiusTopRight": "3px", "imageBorderRadiusTopRight": "24px", "textBorderRadiusBottomLeft": "3px", "imageBorderRadiusBottomLeft": "24px", "textBorderRadiusBottomRight": "3px", "imageBorderRadiusBottomRight": "24px"}, {"url": "#demo-link", "text": {"value": "<h4>Serie: Wolkennest</h4>", "source": "static"}, "color": "#ffffff", "newTab": false, "mediaId": "' . self::$cmsImageIds[39] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[39] . '", "animation": "zoom", "textScale": false, "animationIn": "none", "textMargins": true, "overlayColor": "#000000", "textMaxWidth": "", "textMinWidth": null, "textPaddings": false, "headlineScale": true, "textMarginTop": "50px", "backgroundBlur": "0px", "overlayOpacity": "50%", "textMarginLeft": "50px", "textPaddingTop": "8px", "backgroundColor": "transparent", "textMarginRight": "50px", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "50px", "textPaddingRight": "16px", "customItemClasses": null, "imageBorderRadius": true, "textPaddingBottom": "8px", "verticalTextAlign": "flex-end", "verticalImageAlign": "center", "horizontalTextAlign": "flex-start", "horizontalImageAlign": "center", "textBorderRadiusTopLeft": "3px", "imageBorderRadiusTopLeft": "24px", "textBorderRadiusTopRight": "3px", "imageBorderRadiusTopRight": "24px", "textBorderRadiusBottomLeft": "3px", "imageBorderRadiusBottomLeft": "24px", "textBorderRadiusBottomRight": "3px", "imageBorderRadiusBottomRight": "24px"}, {"url": "#demo-link", "text": {"value": "<h4>Serie: Modern</h4>", "source": "static"}, "color": "#ffffff", "newTab": false, "mediaId": "' . self::$cmsImageIds[40] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[40] . '", "animation": "zoom", "textScale": false, "animationIn": "none", "textMargins": true, "overlayColor": "#000000", "textMaxWidth": "", "textMinWidth": null, "textPaddings": false, "headlineScale": true, "textMarginTop": "50px", "backgroundBlur": "0px", "overlayOpacity": "50%", "textMarginLeft": "50px", "textPaddingTop": "8px", "backgroundColor": "transparent", "textMarginRight": "50px", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "50px", "textPaddingRight": "16px", "customItemClasses": null, "imageBorderRadius": true, "textPaddingBottom": "8px", "verticalTextAlign": "flex-end", "verticalImageAlign": "center", "horizontalTextAlign": "flex-start", "horizontalImageAlign": "center", "textBorderRadiusTopLeft": "3px", "imageBorderRadiusTopLeft": "24px", "textBorderRadiusTopRight": "3px", "imageBorderRadiusTopRight": "24px", "textBorderRadiusBottomLeft": "3px", "imageBorderRadiusBottomLeft": "24px", "textBorderRadiusBottomRight": "3px", "imageBorderRadiusBottomRight": "24px"}], "source": "static"}, "customClasses": {"value": null, "source": "static"}, "edgePaddingLG": {"value": 0, "source": "static"}, "edgePaddingMD": {"value": 0, "source": "static"}, "edgePaddingSM": {"value": 0, "source": "static"}, "edgePaddingXL": {"value": 0, "source": "static"}, "edgePaddingXS": {"value": 0, "source": "static"}, "multipleItems": {"value": true, "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "edgePaddingXXL": {"value": 0, "source": "static"}, "navigationDots": {"value": null, "source": "static"}, "autoplayTimeout": {"value": 5000, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "navigationArrows": {"value": "inside", "source": "static"}, "autoplayHoverPause": {"value": true, "source": "static"}, "elementBorderRadius": {"value": false, "source": "static"}, "elementBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "elementBorderRadiusTopRight": {"value": "6px", "source": "static"}, "elementBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "elementBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true) ],
                                            'en-GB' => [
                                                'config' => json_decode('{"axis": {"value": "horizontal", "source": "static"}, "loop": {"value": false, "source": "static"}, "mode": {"value": "carousel", "source": "static"}, "items": {"value": 1.25, "source": "static"}, "speed": {"value": 500, "source": "static"}, "gutter": {"value": 16, "source": "static"}, "rewind": {"value": true, "source": "static"}, "itemsLG": {"value": 1.25, "source": "static"}, "itemsMD": {"value": 1.25, "source": "static"}, "itemsSM": {"value": 1.25, "source": "static"}, "itemsXL": {"value": 1.25, "source": "static"}, "itemsXS": {"value": 1.25, "source": "static"}, "autoplay": {"value": false, "source": "static"}, "minHeight": {"value": "60vh", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "edgePadding": {"value": false, "source": "static"}, "sliderItems": {"value": [{"url": "#demo-link", "text": {"value": "<h4>Series: Scandi-style</h4>", "source": "static"}, "color": "#ffffff", "newTab": false, "mediaId": "' . self::$cmsImageIds[37] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[37] . '", "animation": "zoom", "textScale": false, "animationIn": "none", "textMargins": true, "overlayColor": "#000000", "textMaxWidth": "", "textMinWidth": null, "textPaddings": false, "headlineScale": true, "textMarginTop": "50px", "backgroundBlur": "0px", "overlayOpacity": "50%", "textMarginLeft": "50px", "textPaddingTop": "8px", "backgroundColor": "transparent", "textMarginRight": "50px", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "50px", "textPaddingRight": "16px", "customItemClasses": null, "imageBorderRadius": true, "textPaddingBottom": "8px", "verticalTextAlign": "flex-end", "verticalImageAlign": "center", "horizontalTextAlign": "flex-start", "horizontalImageAlign": "center", "textBorderRadiusTopLeft": "3px", "imageBorderRadiusTopLeft": "24px", "textBorderRadiusTopRight": "3px", "imageBorderRadiusTopRight": "24px", "textBorderRadiusBottomLeft": "3px", "imageBorderRadiusBottomLeft": "24px", "textBorderRadiusBottomRight": "3px", "imageBorderRadiusBottomRight": "24px"}, {"url": "#demo-link", "text": {"value": "<h4>Series: Minimalistic</h4>", "source": "static"}, "color": "#ffffff", "newTab": false, "mediaId": "' . self::$cmsImageIds[38] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[38] . '", "animation": "zoom", "textScale": false, "animationIn": "none", "textMargins": true, "overlayColor": "#000000", "textMaxWidth": "", "textMinWidth": null, "textPaddings": false, "headlineScale": true, "textMarginTop": "50px", "backgroundBlur": "0px", "overlayOpacity": "50%", "textMarginLeft": "50px", "textPaddingTop": "8px", "backgroundColor": "transparent", "textMarginRight": "50px", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "50px", "textPaddingRight": "16px", "customItemClasses": null, "imageBorderRadius": true, "textPaddingBottom": "8px", "verticalTextAlign": "flex-end", "verticalImageAlign": "center", "horizontalTextAlign": "flex-start", "horizontalImageAlign": "center", "textBorderRadiusTopLeft": "3px", "imageBorderRadiusTopLeft": "24px", "textBorderRadiusTopRight": "3px", "imageBorderRadiusTopRight": "24px", "textBorderRadiusBottomLeft": "3px", "imageBorderRadiusBottomLeft": "24px", "textBorderRadiusBottomRight": "3px", "imageBorderRadiusBottomRight": "24px"}, {"url": "#demo-link", "text": {"value": "<h4>Series: Cloud nest</h4>", "source": "static"}, "color": "#ffffff", "newTab": false, "mediaId": "' . self::$cmsImageIds[39] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[39] . '", "animation": "zoom", "textScale": false, "animationIn": "none", "textMargins": true, "overlayColor": "#000000", "textMaxWidth": "", "textMinWidth": null, "textPaddings": false, "headlineScale": true, "textMarginTop": "50px", "backgroundBlur": "0px", "overlayOpacity": "50%", "textMarginLeft": "50px", "textPaddingTop": "8px", "backgroundColor": "transparent", "textMarginRight": "50px", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "50px", "textPaddingRight": "16px", "customItemClasses": null, "imageBorderRadius": true, "textPaddingBottom": "8px", "verticalTextAlign": "flex-end", "verticalImageAlign": "center", "horizontalTextAlign": "flex-start", "horizontalImageAlign": "center", "textBorderRadiusTopLeft": "3px", "imageBorderRadiusTopLeft": "24px", "textBorderRadiusTopRight": "3px", "imageBorderRadiusTopRight": "24px", "textBorderRadiusBottomLeft": "3px", "imageBorderRadiusBottomLeft": "24px", "textBorderRadiusBottomRight": "3px", "imageBorderRadiusBottomRight": "24px"}, {"url": "#demo-link", "text": {"value": "<h4>Series: Modern</h4>", "source": "static"}, "color": "#ffffff", "newTab": false, "mediaId": "' . self::$cmsImageIds[40] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[40] . '", "animation": "zoom", "textScale": false, "animationIn": "none", "textMargins": true, "overlayColor": "#000000", "textMaxWidth": "", "textMinWidth": null, "textPaddings": false, "headlineScale": true, "textMarginTop": "50px", "backgroundBlur": "0px", "overlayOpacity": "50%", "textMarginLeft": "50px", "textPaddingTop": "8px", "backgroundColor": "transparent", "textMarginRight": "50px", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "50px", "textPaddingRight": "16px", "customItemClasses": null, "imageBorderRadius": true, "textPaddingBottom": "8px", "verticalTextAlign": "flex-end", "verticalImageAlign": "center", "horizontalTextAlign": "flex-start", "horizontalImageAlign": "center", "textBorderRadiusTopLeft": "3px", "imageBorderRadiusTopLeft": "24px", "textBorderRadiusTopRight": "3px", "imageBorderRadiusTopRight": "24px", "textBorderRadiusBottomLeft": "3px", "imageBorderRadiusBottomLeft": "24px", "textBorderRadiusBottomRight": "3px", "imageBorderRadiusBottomRight": "24px"}], "source": "static"}, "customClasses": {"value": null, "source": "static"}, "edgePaddingLG": {"value": 0, "source": "static"}, "edgePaddingMD": {"value": 0, "source": "static"}, "edgePaddingSM": {"value": 0, "source": "static"}, "edgePaddingXL": {"value": 0, "source": "static"}, "edgePaddingXS": {"value": 0, "source": "static"}, "multipleItems": {"value": true, "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "edgePaddingXXL": {"value": 0, "source": "static"}, "navigationDots": {"value": null, "source": "static"}, "autoplayTimeout": {"value": 5000, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "navigationArrows": {"value": "inside", "source": "static"}, "autoplayHoverPause": {"value": true, "source": "static"}, "elementBorderRadius": {"value": false, "source": "static"}, "elementBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "elementBorderRadiusTopRight": {"value": "6px", "source": "static"}, "elementBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "elementBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
                                            ]
                                        ])
                                    ]
                                ]
                            ]
                        ]
                    ],
                    [
                        'id' => Uuid::randomHex(),
                        'position' => 8,
                        'backgroundColor' => '#F9C4A7',
                        'sizingMode' => 'full_width',
                        'type' => 'default',
                        'blocks' => [
                            [
                                'position' => 0,
                                'type' => 'zen-grid-3-9',
                                'locked' => 0,
                                'cssClass' => 'zen-animate slide-in-blurred-bottom',
                                'customFields' => [],
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "10vh",
                                'marginBottom' => "10vh",
                                'marginLeft' => "var(--zen-layout-offset-left)",
                                'marginRight' => "var(--zen-layout-container-spacing-right-down-md)",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'text',
                                        'slot' => 'col1',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": "<div><font color=\"#612505\">Inspiration</font></div>\n<h2><font color=\"#612505\">Kindermode</font></h2>\n<p class=\"lead\"><font color=\"#612505\">Ob für den Alltag oder besondere Anlässe, wir bieten hochwertige Kinderbekleidung. Sie zeichnet sich durch hohen Tragekomfort und eine bequeme Passform aus.</font></p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)                                                        ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content": {"value": "<div><font color=\"#612505\">Inspiration</font></div>\n<h2><font color=\"#612505\">Kids fashion</font></h2>\n<p class=\"lead\"><font color=\"#612505\">Whether for everyday wear or special occasions, we offer high-quality children\'s clothing. It is characterized by high wearing comfort and a comfortable fit.</font></p>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'zen-image-slider',
                                        'slot' => 'col2',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"axis": {"value": "horizontal", "source": "static"}, "loop": {"value": false, "source": "static"}, "mode": {"value": "carousel", "source": "static"}, "items": {"value": 2.5, "source": "static"}, "speed": {"value": 500, "source": "static"}, "gutter": {"value": 16, "source": "static"}, "rewind": {"value": true, "source": "static"}, "itemsLG": {"value": 1.5, "source": "static"}, "itemsMD": {"value": 1.5, "source": "static"}, "itemsSM": {"value": 1, "source": "static"}, "itemsXL": {"value": 2.25, "source": "static"}, "itemsXS": {"value": 1, "source": "static"}, "autoplay": {"value": false, "source": "static"}, "minHeight": {"value": "460px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "edgePadding": {"value": false, "source": "static"}, "sliderItems": {"value": [{"url": "#demo-link", "text": {"value": "<div class=\"row>\n    <div class=\"col\">\n        <h4 class=\"mb-0\">\n            15% Rabatt<br>\n            <small class=\"fw-light\">Für die Liebsten</small>\n        </h4>\n    </div>\n    <div class=\"col-auto align-content-center\">\n        <button type=\"button\" class=\"btn\">\n            <span class=\"icon icon-x icon-sm\">\n                <svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\"><defs><path d=\"m20.5858 13-4.293 4.2929c-.3904.3905-.3904 1.0237 0 1.4142.3906.3905 1.0238.3905 1.4143 0l6-6c.3905-.3905.3905-1.0237 0-1.4142l-6-6c-.3905-.3905-1.0237-.3905-1.4142 0-.3905.3905-.3905 1.0237 0 1.4142L20.5858 11H1c-.5523 0-1 .4477-1 1s.4477 1 1 1h19.5858z\" id=\"icons-default-arrow-right\" /></defs><use xlink:href=\"#icons-default-arrow-right\" fill=\"var(--zen-text-color)\" fill-rule=\"evenodd\" /></svg>\n            </span>\n        </button>\n    </div>\n</div>", "source": "static"}, "color": "var(--zen-text-color)", "newTab": false, "mediaId": "' . self::$cmsImageIds[41] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[41] . '", "animation": "zoom", "textScale": false, "codeEditor": true, "animationIn": "none", "textMargins": true, "overlayColor": "#000000", "textMaxWidth": "100%", "textMinWidth": "100%", "textPaddings": true, "headlineScale": false, "textMarginTop": "0", "backgroundBlur": "0px", "overlayOpacity": "50%", "textMarginLeft": "0", "textPaddingTop": "16px", "backgroundColor": "#ffffff", "textMarginRight": "0", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "0", "textPaddingRight": "16px", "customItemClasses": null, "imageBorderRadius": true, "textPaddingBottom": "16px", "verticalTextAlign": "flex-end", "verticalImageAlign": "center", "horizontalTextAlign": "center", "horizontalImageAlign": "center", "textBorderRadiusTopLeft": "3px", "imageBorderRadiusTopLeft": "24px", "textBorderRadiusTopRight": "3px", "imageBorderRadiusTopRight": "24px", "textBorderRadiusBottomLeft": "3px", "imageBorderRadiusBottomLeft": "24px", "textBorderRadiusBottomRight": "3px", "imageBorderRadiusBottomRight": "24px"}, {"url": "#demo-link", "text": {"value": "<div class=\"row\">\n    <div class=\"col\">\n        <h4 class=\"mb-0\">\n            Baby Bodies<br>\n            <small class=\"fw-light\">Größe 48-74</small>\n        </h4>\n    </div>\n    <div class=\"col-auto align-content-center\">\n        <button type=\"button\" class=\"btn\">\n            <span class=\"icon icon-x icon-sm\">\n                <svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\"><defs><path d=\"m20.5858 13-4.293 4.2929c-.3904.3905-.3904 1.0237 0 1.4142.3906.3905 1.0238.3905 1.4143 0l6-6c.3905-.3905.3905-1.0237 0-1.4142l-6-6c-.3905-.3905-1.0237-.3905-1.4142 0-.3905.3905-.3905 1.0237 0 1.4142L20.5858 11H1c-.5523 0-1 .4477-1 1s.4477 1 1 1h19.5858z\" id=\"icons-default-arrow-right\" /></defs><use xlink:href=\"#icons-default-arrow-right\" fill=\"var(--zen-text-color)\" fill-rule=\"evenodd\" /></svg>\n            </span>\n        </button>\n    </div>\n</div>", "source": "static"}, "color": "var(--zen-text-color)", "newTab": false, "mediaId": "' . self::$cmsImageIds[42] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[42] . '", "animation": "zoom", "textScale": false, "codeEditor": true, "animationIn": "none", "textMargins": true, "overlayColor": "#000000", "textMaxWidth": "100%", "textMinWidth": "100%", "textPaddings": true, "headlineScale": false, "textMarginTop": "0", "backgroundBlur": "0px", "overlayOpacity": "50%", "textMarginLeft": "0", "textPaddingTop": "16px", "backgroundColor": "#ffffff", "textMarginRight": "0", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "0", "textPaddingRight": "16px", "customItemClasses": null, "imageBorderRadius": true, "textPaddingBottom": "16px", "verticalTextAlign": "flex-end", "verticalImageAlign": "center", "horizontalTextAlign": "center", "horizontalImageAlign": "center", "textBorderRadiusTopLeft": "3px", "imageBorderRadiusTopLeft": "24px", "textBorderRadiusTopRight": "3px", "imageBorderRadiusTopRight": "24px", "textBorderRadiusBottomLeft": "3px", "imageBorderRadiusBottomLeft": "24px", "textBorderRadiusBottomRight": "3px", "imageBorderRadiusBottomRight": "24px"}, {"url": "#demo-link", "text": {"value": "<div class=\"row\">\n    <div class=\"col\">\n        <h4 class=\"mb-0\">\n            Passend zum Herbst<br>\n            <small class=\"fw-light\">Jacken Pullover & Co</small>\n        </h4>\n    </div>\n    <div class=\"col-auto align-content-center\">\n        <button type=\"button\" class=\"btn\">\n            <span class=\"icon icon-x icon-sm\">\n                <svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\"><defs><path d=\"m20.5858 13-4.293 4.2929c-.3904.3905-.3904 1.0237 0 1.4142.3906.3905 1.0238.3905 1.4143 0l6-6c.3905-.3905.3905-1.0237 0-1.4142l-6-6c-.3905-.3905-1.0237-.3905-1.4142 0-.3905.3905-.3905 1.0237 0 1.4142L20.5858 11H1c-.5523 0-1 .4477-1 1s.4477 1 1 1h19.5858z\" id=\"icons-default-arrow-right\" /></defs><use xlink:href=\"#icons-default-arrow-right\" fill=\"var(--zen-text-color)\" fill-rule=\"evenodd\" /></svg>\n            </span>\n        </button>\n    </div>\n</div>", "source": "static"}, "color": "var(--zen-text-color)", "newTab": false, "mediaId": "' . self::$cmsImageIds[43] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[43] . '", "animation": "zoom", "textScale": false, "codeEditor": true, "animationIn": "none", "textMargins": true, "overlayColor": "#000000", "textMaxWidth": "100%", "textMinWidth": "100%", "textPaddings": true, "headlineScale": false, "textMarginTop": "0", "backgroundBlur": "0px", "overlayOpacity": "50%", "textMarginLeft": "0", "textPaddingTop": "16px", "backgroundColor": "#ffffff", "textMarginRight": "0", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "0", "textPaddingRight": "16px", "customItemClasses": null, "imageBorderRadius": true, "textPaddingBottom": "16px", "verticalTextAlign": "flex-end", "verticalImageAlign": "center", "horizontalTextAlign": "center", "horizontalImageAlign": "center", "textBorderRadiusTopLeft": "3px", "imageBorderRadiusTopLeft": "24px", "textBorderRadiusTopRight": "3px", "imageBorderRadiusTopRight": "24px", "textBorderRadiusBottomLeft": "3px", "imageBorderRadiusBottomLeft": "24px", "textBorderRadiusBottomRight": "3px", "imageBorderRadiusBottomRight": "24px"}, {"url": "#demo-link", "text": {"value": "<div class=\"row\">\n    <div class=\"col\">\n        <h4 class=\"mb-0\">\n            Strandbekleidung<br>\n            <small class=\"fw-light\">Alles für den Urlaub</small>\n        </h4>\n    </div>\n    <div class=\"col-auto align-content-center\">\n        <button type=\"button\" class=\"btn\">\n            <span class=\"icon icon-x icon-sm\">\n                <svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\"><defs><path d=\"m20.5858 13-4.293 4.2929c-.3904.3905-.3904 1.0237 0 1.4142.3906.3905 1.0238.3905 1.4143 0l6-6c.3905-.3905.3905-1.0237 0-1.4142l-6-6c-.3905-.3905-1.0237-.3905-1.4142 0-.3905.3905-.3905 1.0237 0 1.4142L20.5858 11H1c-.5523 0-1 .4477-1 1s.4477 1 1 1h19.5858z\" id=\"icons-default-arrow-right\" /></defs><use xlink:href=\"#icons-default-arrow-right\" fill=\"var(--zen-text-color)\" fill-rule=\"evenodd\" /></svg>\n            </span>\n        </button>\n    </div>\n</div>", "source": "static"}, "color": "var(--zen-text-color)", "newTab": false, "mediaId": "' . self::$cmsImageIds[32] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[32] . '", "animation": "zoom", "textScale": false, "codeEditor": true, "animationIn": "none", "textMargins": true, "overlayColor": "#000000", "textMaxWidth": "100%", "textMinWidth": "100%", "textPaddings": true, "headlineScale": false, "textMarginTop": "0", "backgroundBlur": "0px", "overlayOpacity": "50%", "textMarginLeft": "0", "textPaddingTop": "16px", "backgroundColor": "#ffffff", "textMarginRight": "0", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "0", "textPaddingRight": "16px", "customItemClasses": null, "imageBorderRadius": true, "textPaddingBottom": "16px", "verticalTextAlign": "flex-end", "verticalImageAlign": "center", "horizontalTextAlign": "center", "horizontalImageAlign": "center", "textBorderRadiusTopLeft": "3px", "imageBorderRadiusTopLeft": "24px", "textBorderRadiusTopRight": "3px", "imageBorderRadiusTopRight": "24px", "textBorderRadiusBottomLeft": "3px", "imageBorderRadiusBottomLeft": "24px", "textBorderRadiusBottomRight": "3px", "imageBorderRadiusBottomRight": "24px"}], "source": "static"}, "customClasses": {"value": null, "source": "static"}, "edgePaddingLG": {"value": 0, "source": "static"}, "edgePaddingMD": {"value": 0, "source": "static"}, "edgePaddingSM": {"value": 0, "source": "static"}, "edgePaddingXL": {"value": 0, "source": "static"}, "edgePaddingXS": {"value": 0, "source": "static"}, "multipleItems": {"value": true, "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "edgePaddingXXL": {"value": 0, "source": "static"}, "navigationDots": {"value": null, "source": "static"}, "autoplayTimeout": {"value": 5000, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "navigationArrows": {"value": "inside", "source": "static"}, "autoplayHoverPause": {"value": true, "source": "static"}, "elementBorderRadius": {"value": false, "source": "static"}, "elementBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "elementBorderRadiusTopRight": {"value": "6px", "source": "static"}, "elementBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "elementBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true) ],
                                            'en-GB' => [
                                                'config' => json_decode('{"axis": {"value": "horizontal", "source": "static"}, "loop": {"value": false, "source": "static"}, "mode": {"value": "carousel", "source": "static"}, "items": {"value": 2.5, "source": "static"}, "speed": {"value": 500, "source": "static"}, "gutter": {"value": 16, "source": "static"}, "rewind": {"value": true, "source": "static"}, "itemsLG": {"value": 1.5, "source": "static"}, "itemsMD": {"value": 1.5, "source": "static"}, "itemsSM": {"value": 1, "source": "static"}, "itemsXL": {"value": 2.25, "source": "static"}, "itemsXS": {"value": 1, "source": "static"}, "autoplay": {"value": false, "source": "static"}, "minHeight": {"value": "460px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "edgePadding": {"value": false, "source": "static"}, "sliderItems": {"value": [{"url": "#demo-link", "text": {"value": "<div class=\"row\">\n    <div class=\"col\">\n        <h4 class=\"mb-0\">\n            15% discount<br>\n            <small class=\"fw-light\">For the beloved ones</small>\n        </h4>\n    </div>\n    <div class=\"col-auto align-content-center\">\n        <button type=\"button\" class=\"btn\">\n            <span class=\"icon icon-x icon-sm\">\n                <svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\"><defs><path d=\"m20.5858 13-4.293 4.2929c-.3904.3905-.3904 1.0237 0 1.4142.3906.3905 1.0238.3905 1.4143 0l6-6c.3905-.3905.3905-1.0237 0-1.4142l-6-6c-.3905-.3905-1.0237-.3905-1.4142 0-.3905.3905-.3905 1.0237 0 1.4142L20.5858 11H1c-.5523 0-1 .4477-1 1s.4477 1 1 1h19.5858z\" id=\"icons-default-arrow-right\" /></defs><use xlink:href=\"#icons-default-arrow-right\" fill=\"var(--zen-text-color)\" fill-rule=\"evenodd\" /></svg>\n            </span>\n        </button>\n    </div>\n</div>", "source": "static"}, "color": "var(--zen-text-color)", "newTab": false, "mediaId": "' . self::$cmsImageIds[41] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[41] . '", "animation": "zoom", "textScale": false, "codeEditor": true, "animationIn": "none", "textMargins": true, "overlayColor": "#000000", "textMaxWidth": "100%", "textMinWidth": "100%", "textPaddings": true, "headlineScale": false, "textMarginTop": "0", "backgroundBlur": "0px", "overlayOpacity": "50%", "textMarginLeft": "0", "textPaddingTop": "16px", "backgroundColor": "#ffffff", "textMarginRight": "0", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "0", "textPaddingRight": "16px", "customItemClasses": null, "imageBorderRadius": true, "textPaddingBottom": "16px", "verticalTextAlign": "flex-end", "verticalImageAlign": "center", "horizontalTextAlign": "center", "horizontalImageAlign": "center", "textBorderRadiusTopLeft": "3px", "imageBorderRadiusTopLeft": "24px", "textBorderRadiusTopRight": "3px", "imageBorderRadiusTopRight": "24px", "textBorderRadiusBottomLeft": "3px", "imageBorderRadiusBottomLeft": "24px", "textBorderRadiusBottomRight": "3px", "imageBorderRadiusBottomRight": "24px"}, {"url": "#demo-link", "text": {"value": "<div class=\"row\">\n    <div class=\"col\">\n        <h4 class=\"mb-0\">\n            Baby Bodies<br>\n            <small class=\"fw-light\">Size 48-74</small>\n        </h4>\n    </div>\n    <div class=\"col-auto align-content-center\">\n        <button type=\"button\" class=\"btn\">\n            <span class=\"icon icon-x icon-sm\">\n                <svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\"><defs><path d=\"m20.5858 13-4.293 4.2929c-.3904.3905-.3904 1.0237 0 1.4142.3906.3905 1.0238.3905 1.4143 0l6-6c.3905-.3905.3905-1.0237 0-1.4142l-6-6c-.3905-.3905-1.0237-.3905-1.4142 0-.3905.3905-.3905 1.0237 0 1.4142L20.5858 11H1c-.5523 0-1 .4477-1 1s.4477 1 1 1h19.5858z\" id=\"icons-default-arrow-right\" /></defs><use xlink:href=\"#icons-default-arrow-right\" fill=\"var(--zen-text-color)\" fill-rule=\"evenodd\" /></svg>\n            </span>\n        </button>\n    </div>\n</div>", "source": "static"}, "color": "var(--zen-text-color)", "newTab": false, "mediaId": "' . self::$cmsImageIds[42] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[42] . '", "animation": "zoom", "textScale": false, "codeEditor": true, "animationIn": "none", "textMargins": true, "overlayColor": "#000000", "textMaxWidth": "100%", "textMinWidth": "100%", "textPaddings": true, "headlineScale": false, "textMarginTop": "0", "backgroundBlur": "0px", "overlayOpacity": "50%", "textMarginLeft": "0", "textPaddingTop": "16px", "backgroundColor": "#ffffff", "textMarginRight": "0", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "0", "textPaddingRight": "16px", "customItemClasses": null, "imageBorderRadius": true, "textPaddingBottom": "16px", "verticalTextAlign": "flex-end", "verticalImageAlign": "center", "horizontalTextAlign": "center", "horizontalImageAlign": "center", "textBorderRadiusTopLeft": "3px", "imageBorderRadiusTopLeft": "24px", "textBorderRadiusTopRight": "3px", "imageBorderRadiusTopRight": "24px", "textBorderRadiusBottomLeft": "3px", "imageBorderRadiusBottomLeft": "24px", "textBorderRadiusBottomRight": "3px", "imageBorderRadiusBottomRight": "24px"}, {"url": "#demo-link", "text": {"value": "<div class=\"row\">\n    <div class=\"col\">\n        <h4 class=\"mb-0\">\n            Autumn fit<br>\n            <small class=\"fw-light\">Jackets sweaters & Co</small>\n        </h4>\n    </div>\n    <div class=\"col-auto align-content-center\">\n        <button type=\"button\" class=\"btn\">\n            <span class=\"icon icon-x icon-sm\">\n                <svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\"><defs><path d=\"m20.5858 13-4.293 4.2929c-.3904.3905-.3904 1.0237 0 1.4142.3906.3905 1.0238.3905 1.4143 0l6-6c.3905-.3905.3905-1.0237 0-1.4142l-6-6c-.3905-.3905-1.0237-.3905-1.4142 0-.3905.3905-.3905 1.0237 0 1.4142L20.5858 11H1c-.5523 0-1 .4477-1 1s.4477 1 1 1h19.5858z\" id=\"icons-default-arrow-right\" /></defs><use xlink:href=\"#icons-default-arrow-right\" fill=\"var(--zen-text-color)\" fill-rule=\"evenodd\" /></svg>\n            </span>\n        </button>\n    </div>\n</div>", "source": "static"}, "color": "var(--zen-text-color)", "newTab": false, "mediaId": "' . self::$cmsImageIds[43] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[43] . '", "animation": "zoom", "textScale": false, "codeEditor": true, "animationIn": "none", "textMargins": true, "overlayColor": "#000000", "textMaxWidth": "100%", "textMinWidth": "100%", "textPaddings": true, "headlineScale": false, "textMarginTop": "0", "backgroundBlur": "0px", "overlayOpacity": "50%", "textMarginLeft": "0", "textPaddingTop": "16px", "backgroundColor": "#ffffff", "textMarginRight": "0", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "0", "textPaddingRight": "16px", "customItemClasses": null, "imageBorderRadius": true, "textPaddingBottom": "16px", "verticalTextAlign": "flex-end", "verticalImageAlign": "center", "horizontalTextAlign": "center", "horizontalImageAlign": "center", "textBorderRadiusTopLeft": "3px", "imageBorderRadiusTopLeft": "24px", "textBorderRadiusTopRight": "3px", "imageBorderRadiusTopRight": "24px", "textBorderRadiusBottomLeft": "3px", "imageBorderRadiusBottomLeft": "24px", "textBorderRadiusBottomRight": "3px", "imageBorderRadiusBottomRight": "24px"}, {"url": "#demo-link", "text": {"value": "<div class=\"row\">\n    <div class=\"col\">\n        <h4 class=\"mb-0\">\n            Beachwear<br>\n            <small class=\"fw-light\">Everything for your vacation</small>\n        </h4>\n    </div>\n    <div class=\"col-auto align-content-center\">\n        <button type=\"button\" class=\"btn\">\n            <span class=\"icon icon-x icon-sm\">\n                <svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\"><defs><path d=\"m20.5858 13-4.293 4.2929c-.3904.3905-.3904 1.0237 0 1.4142.3906.3905 1.0238.3905 1.4143 0l6-6c.3905-.3905.3905-1.0237 0-1.4142l-6-6c-.3905-.3905-1.0237-.3905-1.4142 0-.3905.3905-.3905 1.0237 0 1.4142L20.5858 11H1c-.5523 0-1 .4477-1 1s.4477 1 1 1h19.5858z\" id=\"icons-default-arrow-right\" /></defs><use xlink:href=\"#icons-default-arrow-right\" fill=\"var(--zen-text-color)\" fill-rule=\"evenodd\" /></svg>\n            </span>\n        </button>\n    </div>\n</div>", "source": "static"}, "color": "var(--zen-text-color)", "newTab": false, "mediaId": "' . self::$cmsImageIds[32] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[32] . '", "animation": "zoom", "textScale": false, "codeEditor": true, "animationIn": "none", "textMargins": true, "overlayColor": "#000000", "textMaxWidth": "100%", "textMinWidth": "100%", "textPaddings": true, "headlineScale": false, "textMarginTop": "0", "backgroundBlur": "0px", "overlayOpacity": "50%", "textMarginLeft": "0", "textPaddingTop": "16px", "backgroundColor": "#ffffff", "textMarginRight": "0", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "0", "textPaddingRight": "16px", "customItemClasses": null, "imageBorderRadius": true, "textPaddingBottom": "16px", "verticalTextAlign": "flex-end", "verticalImageAlign": "center", "horizontalTextAlign": "center", "horizontalImageAlign": "center", "textBorderRadiusTopLeft": "3px", "imageBorderRadiusTopLeft": "24px", "textBorderRadiusTopRight": "3px", "imageBorderRadiusTopRight": "24px", "textBorderRadiusBottomLeft": "3px", "imageBorderRadiusBottomLeft": "24px", "textBorderRadiusBottomRight": "3px", "imageBorderRadiusBottomRight": "24px"}], "source": "static"}, "customClasses": {"value": null, "source": "static"}, "edgePaddingLG": {"value": 0, "source": "static"}, "edgePaddingMD": {"value": 0, "source": "static"}, "edgePaddingSM": {"value": 0, "source": "static"}, "edgePaddingXL": {"value": 0, "source": "static"}, "edgePaddingXS": {"value": 0, "source": "static"}, "multipleItems": {"value": true, "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "edgePaddingXXL": {"value": 0, "source": "static"}, "navigationDots": {"value": null, "source": "static"}, "autoplayTimeout": {"value": 5000, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "navigationArrows": {"value": "inside", "source": "static"}, "autoplayHoverPause": {"value": true, "source": "static"}, "elementBorderRadius": {"value": false, "source": "static"}, "elementBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "elementBorderRadiusTopRight": {"value": "6px", "source": "static"}, "elementBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "elementBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)
                                            ]
                                        ])
                                    ]
                                ]
                            ]
                        ]
                    ],
                    [
                        'id' => Uuid::randomHex(),
                        'position' => 9,
                        'sizingMode' => 'boxed',
                        'type' => 'default',
                        'blocks' => [
                            [
                                'position' => 0,
                                'type' => 'zen-grid-9-3',
                                'locked' => 0,
                                'cssClass' => 'zen-animate slide-in-blurred-bottom',
                                'customFields' => ["zenit_grid_gap" => "0"],
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "8vh",
                                'marginBottom' => "0",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'text',
                                        'slot' => 'col1',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": "<h2>Neu eingetroffen</h2>", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}}', true)                                                        ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content": {"value": "<h2>New in</h2>", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'text',
                                        'slot' => 'col2',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": "<div class=\"d-none d-md-block\" style=\"text-align: right;\"><a href=\"#demo-link\" class=\"btn btn-link\">Alle Produkte</a></div>", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}}', true)                                                        ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content": {"value": "<div class=\"d-none d-md-block\" style=\"text-align: right;\"><a href=\"#demo-link\" class=\"btn btn-link\">Shop all products</a></div>", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}}', true)
                                            ]
                                        ])
                                    ]
                                ]
                            ],
                            [
                                'position' => 1,
                                'type' => 'product-slider',
                                'locked' => 0,
                                'cssClass' => 'zen-animate slide-in-blurred-bottom',
                                'customFields' => [],
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "20px",
                                'marginBottom' => "8vh",
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
                                                'config' => json_decode('{"title": {"value": "", "source": "static"}, "border": {"value": false, "source": "static"}, "rotate": {"value": false, "source": "static"}, "products": {"value": ' . $this->limitedProducts(7) . ', "source": "static"}, "boxLayout": {"value": "minimal", "source": "static"}, "elMinWidth": {"value": "280px", "source": "static"}, "navigation": {"value": true, "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "productStreamLimit": {"value": 10, "source": "static"}, "productStreamSorting": {"value": "random", "source": "static"}}', true)                                                        ],
                                            'en-GB' => [
                                                'config' => json_decode('{"title": {"value": "", "source": "static"}, "border": {"value": false, "source": "static"}, "rotate": {"value": false, "source": "static"}, "products": {"value": ' . $this->limitedProducts(7) . ', "source": "static"}, "boxLayout": {"value": "minimal", "source": "static"}, "elMinWidth": {"value": "280px", "source": "static"}, "navigation": {"value": true, "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "productStreamLimit": {"value": 10, "source": "static"}, "productStreamSorting": {"value": "random", "source": "static"}}', true)
                                            ]
                                        ])
                                    ]
                                ]
                            ]
                        ]
                    ],
                    [
                        'id' => Uuid::randomHex(),
                        'position' => 10,
                        'sizingMode' => 'boxed',
                        'type' => 'default',
                        'blocks' => [
                            [
                                'position' => 0,
                                'type' => 'zen-grid-6-6',
                                'locked' => 0,
                                'cssClass' => 'zen-animate slide-in-blurred-bottom',
                                'customFields' => ["zenit_grid_gap" => "16px"],
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "0",
                                'marginBottom' => "8vh",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'zen-search-banner',
                                        'slot' => 'col1',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"media": {"value": "' . self::$cmsImageIds[44] . '", "source": "static"}, "overlay": {"value": true, "source": "static"}, "minHeight": {"value": "100%", "source": "static"}, "textAfter": {"value": "<font color=\"#881d00\">Suchvorschläge:</font> <a href=\"/search?search=Holzspielzeug\"><span style=\"text-decoration: underline; color: #881d00;\">Holzspielzeug</span></a> | <a href=\"/search?search=Babylätzchen\"><span style=\"text-decoration: underline; color: #881d00;\">Babylätzchen</span></a> | <a href=\"/search?search=Baby-Body\"><span style=\"text-decoration: underline; color: #881d00;\">Baby-Body</span></a> | <a href=\"/search?search=Silikonlätzchen\"><span style=\"text-decoration: underline; color: #881d00;\">Silikonlätzchen</span></a>", "source": "static"}, "textColor": {"value": "var(--zen-text-color)", "source": "static"}, "imageHover": {"value": "none", "source": "static"}, "textBefore": {"value": "<h2><font color=\"#881d00\">Wonach suchst Du?</font></h2>", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "searchColor": {"value": "#333333", "source": "static"}, "searchLarge": {"value": false, "source": "static"}, "overlayColor": {"value": "#FFA188", "source": "static"}, "customClasses": {"value": null, "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "backgroundBlur": {"value": "0px", "source": "static"}, "contentMargins": {"value": true, "source": "static"}, "overlayOpacity": {"value": "100%", "source": "static"}, "textAfterScale": {"value": false, "source": "static"}, "backgroundColor": {"value": "transparent", "source": "static"}, "contentMaxWidth": {"value": "", "source": "static"}, "contentMinWidth": {"value": null, "source": "static"}, "contentPaddings": {"value": true, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textBeforeScale": {"value": false, "source": "static"}, "contentMarginTop": {"value": "0", "source": "static"}, "hideHeaderSearch": {"value": false, "source": "static"}, "searchFocusColor": {"value": "#333333", "source": "static"}, "contentMarginLeft": {"value": "0", "source": "static"}, "contentPaddingTop": {"value": "3vh", "source": "static"}, "customSearchField": {"value": false, "source": "static"}, "imageBorderRadius": {"value": true, "source": "static"}, "searchBorderColor": {"value": "#ffffff", "source": "static"}, "contentMarginRight": {"value": "0", "source": "static"}, "contentPaddingLeft": {"value": "3vh", "source": "static"}, "headlineAfterScale": {"value": false, "source": "static"}, "verticalImageAlign": {"value": "center", "source": "static"}, "contentBorderRadius": {"value": false, "source": "static"}, "contentMarginBottom": {"value": "0", "source": "static"}, "contentPaddingRight": {"value": "3vh", "source": "static"}, "headlineBeforeScale": {"value": false, "source": "static"}, "textAfterCodeEditor": {"value": true, "source": "static"}, "contentPaddingBottom": {"value": "3vh", "source": "static"}, "horizontalImageAlign": {"value": "center", "source": "static"}, "textBeforeCodeEditor": {"value": false, "source": "static"}, "verticalContentAlign": {"value": "center", "source": "static"}, "searchBackgroundColor": {"value": "#ffffff", "source": "static"}, "horizontalContentAlign": {"value": "center", "source": "static"}, "searchFocusBorderColor": {"value": "#ededed", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "24px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "24px", "source": "static"}, "contentBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "searchFocusBackgroundColor": {"value": "#ededed", "source": "static"}, "contentBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "24px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "24px", "source": "static"}, "contentBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "contentBorderRadiusBottomRight": {"value": "2px", "source": "static"}}', true)                                                        ],
                                            'en-GB' => [
                                                'config' => json_decode('{"media": {"value": "' . self::$cmsImageIds[44] . '", "source": "static"}, "overlay": {"value": true, "source": "static"}, "minHeight": {"value": "100%", "source": "static"}, "textAfter": {"value": "<font color=\"#881d00\">Quicksearch:</font> <a href=\"/search?search=wooden-toys\"><span style=\"text-decoration: underline; color: #881d00;\">wooden toys</span></a> | <a href=\"/search?search=baby-bibs\"><span style=\"text-decoration: underline; color: #881d00;\">baby bibs</span></a> | <a href=\"/search?search=baby-body\"><span style=\"text-decoration: underline; color: #881d00;\">baby-body</span></a> | <a href=\"/search?search=silicone-bibs\"><span style=\"text-decoration: underline; color: #881d00;\">silicone bibs</span></a>", "source": "static"}, "textColor": {"value": "var(--zen-text-color)", "source": "static"}, "imageHover": {"value": "none", "source": "static"}, "textBefore": {"value": "<h2><font color=\"#881d00\">What are you searching for?</font></h2>", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "searchColor": {"value": "#333333", "source": "static"}, "searchLarge": {"value": false, "source": "static"}, "overlayColor": {"value": "#FFA188", "source": "static"}, "customClasses": {"value": null, "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "backgroundBlur": {"value": "0px", "source": "static"}, "contentMargins": {"value": true, "source": "static"}, "overlayOpacity": {"value": "100%", "source": "static"}, "textAfterScale": {"value": false, "source": "static"}, "backgroundColor": {"value": "transparent", "source": "static"}, "contentMaxWidth": {"value": "", "source": "static"}, "contentMinWidth": {"value": null, "source": "static"}, "contentPaddings": {"value": true, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textBeforeScale": {"value": false, "source": "static"}, "contentMarginTop": {"value": "0", "source": "static"}, "hideHeaderSearch": {"value": false, "source": "static"}, "searchFocusColor": {"value": "#333333", "source": "static"}, "contentMarginLeft": {"value": "0", "source": "static"}, "contentPaddingTop": {"value": "3vh", "source": "static"}, "customSearchField": {"value": false, "source": "static"}, "imageBorderRadius": {"value": true, "source": "static"}, "searchBorderColor": {"value": "#ffffff", "source": "static"}, "contentMarginRight": {"value": "0", "source": "static"}, "contentPaddingLeft": {"value": "3vh", "source": "static"}, "headlineAfterScale": {"value": false, "source": "static"}, "verticalImageAlign": {"value": "center", "source": "static"}, "contentBorderRadius": {"value": false, "source": "static"}, "contentMarginBottom": {"value": "0", "source": "static"}, "contentPaddingRight": {"value": "3vh", "source": "static"}, "headlineBeforeScale": {"value": false, "source": "static"}, "textAfterCodeEditor": {"value": true, "source": "static"}, "contentPaddingBottom": {"value": "3vh", "source": "static"}, "horizontalImageAlign": {"value": "center", "source": "static"}, "textBeforeCodeEditor": {"value": false, "source": "static"}, "verticalContentAlign": {"value": "center", "source": "static"}, "searchBackgroundColor": {"value": "#ffffff", "source": "static"}, "horizontalContentAlign": {"value": "center", "source": "static"}, "searchFocusBorderColor": {"value": "#ededed", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "24px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "24px", "source": "static"}, "contentBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "searchFocusBackgroundColor": {"value": "#ededed", "source": "static"}, "contentBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "24px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "24px", "source": "static"}, "contentBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "contentBorderRadiusBottomRight": {"value": "2px", "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'zen-code',
                                        'slot' => 'col2',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"contentJS": {"value": "", "source": "static"}, "contentCSS": {"value": "/* Write your own CSS */\n.block-support {\n    border: 1px solid var(--zen-border-color);\n    border-radius: 24px;\n    padding: 3vh;\n    height: 100%;\n    display: flex;\n    flex-direction: column;\n    justify-content: center;\n}\n\n.support-icons {\n    display: flex;\n    gap: 5vw;\n    padding: 0;\n    align-items: center;\n    justify-content: center;\n    flex-wrap: wrap;\n}\n\n.support-icons li {\n    list-style: none;\n    display: flex;\n    align-items: center;\n    justify-content: center;\n    flex-direction: column;\n    text-align: center;\n}\n\n.support-icons .icon {\n    width: 80px;\n    height: 80px;\n    display: flex;\n    align-items: center;\n    justify-content: center;\n    border-radius: 50%;\n    background: var(--zen-border-color);\n    padding: 26px;\n    margin-bottom: 10px;\n}\n\n.support-icons svg {\n    top: 0;\n}\n\n.support-icons a {\n    color: var(--zen-text-color);\n}", "source": "static"}, "contentHTML": {"value": "<div class=\"block-support\">\n    <div class=\"block-support-inner\">\n        <h3 class=\"h2\">Brauchst Du Hilfe?</h3>\n        <p class=\"lead\">Zögere nicht uns zu fragen - unsere Experten helfen Dir gerne bei der Auswahl der richtigen Produkte.</p>\n        <br>\n        <ul class=\"support-icons\">\n            <li>\n                <a href=\"#demo-link\" target=\"_blank\" aria-label=\"Kontaktiere uns\" title=\"Kontaktiere uns\">\n            \t    {% sw_icon \'headset\'%}\n            \t    <span class=\"text\">Anrufen</span>\n            \t</a>\n            </li>\n            <li>\n                <a href=\"#demo-link\" target=\"_blank\" aria-label=\"Kontaktiere uns\" title=\"Kontaktiere uns\">\n                \t{% sw_icon \'paperplane\'%}\n                \t<span class=\"text\">E-mail</span>\n            \t</a>\n            </li>\n            <li>\n                <a href=\"#demo-link\" target=\"_blank\" aria-label=\"Kontaktiere uns\" title=\"Kontaktiere uns\">\n                \t{% sw_icon \'speech-bubble\'%}\n                \t<span class=\"text\">Online-Chat</span>\n            \t</a>\n            </li>\n        </ul>\n    </div>\n</div>", "source": "static"}, "contentJSTruncateLength": {"value": 510, "source": "static"}, "contentCSSTruncateLength": {"value": 510, "source": "static"}, "contentHTMLTruncateLength": {"value": 510, "source": "static"}}', true)                                                        ],
                                            'en-GB' => [
                                                'config' => json_decode('{"contentJS": {"value": "", "source": "static"}, "contentCSS": {"value": "/* Write your own CSS */\n.block-support {\n    border: 1px solid var(--zen-border-color);\n    border-radius: 24px;\n    padding: 3vh;\n    height: 100%;\n    display: flex;\n    flex-direction: column;\n    justify-content: center;\n}\n\n.support-icons {\n    display: flex;\n    gap: 5vw;\n    padding: 0;\n    align-items: center;\n    justify-content: center;\n    flex-wrap: wrap;\n}\n\n.support-icons li {\n    list-style: none;\n    display: flex;\n    align-items: center;\n    justify-content: center;\n    flex-direction: column;\n    text-align: center;\n}\n\n.support-icons .icon {\n    width: 80px;\n    height: 80px;\n    display: flex;\n    align-items: center;\n    justify-content: center;\n    border-radius: 50%;\n    background: var(--zen-border-color);\n    padding: 26px;\n    margin-bottom: 10px;\n}\n\n.support-icons svg {\n    top: 0;\n}\n\n.support-icons a {\n    color: var(--zen-text-color);\n}", "source": "static"}, "contentHTML": {"value": "<div class=\"block-support\">\n    <div class=\"block-support-inner\">\n        <h3 class=\"h2\">You Need Help?</h3>\n        <p class=\"lead\">Do not hesitate to ask, our specialists will help you choose the right products.</p>\n        <br>\n        <ul class=\"support-icons\">\n            <li>\n                <a href=\"#demo-link\" target=\"_blank\" aria-label=\"Contact us\" title=\"Contact us\">\n                    {% sw_icon \'headset\'%}\n                    <span class=\"text\">Call Us</span>\n                </a>\n            </li>\n            <li>\n                <a href=\"#demo-link\" target=\"_blank\" aria-label=\"Contact us\" title=\"Contact us\">\n                    {% sw_icon \'paperplane\'%}\n                    <span class=\"text\">E-mail</span>\n                </a>\n            </li>\n            <li>\n                <a href=\"#demo-link\" target=\"_blank\" aria-label=\"Contact us\" title=\"Contact us\">\n                    {% sw_icon \'speech-bubble\'%}\n                    <span class=\"text\">Chat online</span>\n                </a>\n            </li>\n        </ul>\n    </div>\n</div>", "source": "static"}, "contentJSTruncateLength": {"value": 510, "source": "static"}, "contentCSSTruncateLength": {"value": 510, "source": "static"}, "contentHTMLTruncateLength": {"value": 510, "source": "static"}}', true)
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