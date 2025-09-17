<?php declare(strict_types=1);

namespace zenit\PlatformDemoData\Core\CmsProvider;

use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\Uuid\Uuid;
use zenit\PlatformDemoData\Core\AbstractCmsDemoData;

/**
 * @extends AbstractCmsDemoData
 *
 */
class SphereCmsDemoData extends AbstractCmsDemoData
{
    /**
     * Method that returns the Layout Ids
     *
     * @return array
     *
     */
    public static array $cmsPageIds = [
        '016f02f41c2447c7b50043befa90025a',
        '6d844b4ba6b24575867453a8c4a7f2db',
    ];

    /**
     * Method that returns the Image Ids
     *
     * @return array
     *
     */
    public static array $cmsImageIds = [
        '36ae8053d0144fd5ac06c0971d4c85e1',
        '7336a5afa821436fbf95e94878aa4402',
        '684dc06787d04ac6bd61c88e503c2e77',
        '90d098b5cc6f451689dd3b2b7ba09abf',
        'bb2108fdf651452abd679b90ef127f6f',
        '8c348d797ee84c3ebee841b61ff42e54',
        'a67c1f60f99e4a97b77f80ea59ab1951',
        'bbb11e1c45504b9eab0798b6632b43d2',
        '04c7aefe9e2f496d8ace15ed25140959',
        'e7f378a8f35b48deab48cfc28595344d',
        'cf87d2cc4b894594a66acb7b880fc473',
        '17517faf121d42978c775602e7193cb6',
        'b0d58bde454b406286aa6808cc4a8881',
        '837f810fa03e4e01b57c0f29cb9ffdf4',
        '6e33ffe14d5d42ffaf2f569ac1afbbd4',
        '12489627c818422eae4b7485e0c3a8f4',
        '95fb68e618e541599d00838b5a7829d3',
        'e4d388f32ae242af8f6c1b2a74af0433',
        '2c2b8c2e9f834de28c1579c824a80c55',
        '7aff35d1fa5346b8af7a2b0e8a567fe2',
        '1da3f1b3ca4245adb1f108d3c92f73f3',
        '316fa3ae84a84a498c0be26837cce1ed',
        'cdcc3912a4cb4e95acbb875db3d31a5d',
        '14972a685f304a8da646a48e7662f7f5',
        '0dd7692c85a344829db663bdb6b749cf',
        '40dfe4905b6a43c6803f8020122583b2',
        'a2f2d36d6e404f6cbffa6dd9099a53e8',
        '32c4fc74c7d044bcaccdc934a0c1c5e8',
        'af4bbf117793470ab918190bb764a777',
        '7502036193174bb3ac96f731cc1f73bc',
        '2d411c2c63184f2680802c4bbb04f586',
        'ef8ed2ede6c44775a85ecec6363ad496',
        '7a3fbd220dce49a580630bea155fb0e1',
        'c95355dbb6cd448f931770c65a609e2a',
        'bea50c1a73b64aefbf3b38c6f0c4fbf1',
        '8000cb6182064147bd69ee658d3b1b1a',
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
        foreach (array_merge(self::$cmsImageIds, [self::$previewImages['sphere']]) as $imageId) {
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
        foreach (array_merge(self::$cmsImageIds, [self::$previewImages['sphere']]) as $imageId) {
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
                'previewMediaId' => self::$previewImages['sphere'],
                'name' => $this->translationHelper->adjustTranslations([
                    'de-DE' => 'Startseite Sphere - Set 1',
                    'en-GB' => 'Homepage Sphere - Set 1',
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
                                'visibility' => ['mobile' => false, 'tablet' => true, 'desktop' => true],
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
                                                'config' => json_decode('{"axis":{"value":"vertical","source":"static"},"loop":{"value":false,"source":"static"},"mode":{"value":"carousel","source":"static"},"items":{"value":1,"source":"static"},"speed":{"value":800,"source":"static"},"gutter":{"value":0,"source":"static"},"rewind":{"value":true,"source":"static"},"itemsLG":{"value":1,"source":"static"},"itemsMD":{"value":1,"source":"static"},"itemsSM":{"value":1,"source":"static"},"itemsXL":{"value":1,"source":"static"},"itemsXS":{"value":1,"source":"static"},"autoplay":{"value":true,"source":"static"},"minHeight":{"value":"80vh","source":"static"},"displayMode":{"value":"cover","source":"static"},"sliderItems":{"value":[{"url":"#demo-link","text":{"value":"<span style=\"font-weight:600;\" align=\"left\" class=\"h2\">Jede Sekunde <br><span style=\"background-color:#474747;color:#fff; display:inline-block; margin-top:10px; padding: 10px 5px;\">z\u00e4hlt.<\/span><\/span><br>\n<p class=\"d-inline-block my-3\" style=\"line-height: 1.2; opacity: 0.65;\">Unser Sortiment bietet eine vielzahl an Uhren, <br>von klassisch bis hoch modern.<\/p>\n<br><a style=\"color:#856b40\" href=\"#demo-link\">\u2014 Jetzt entdecken!<\/a><br>","source":"static"},"color":"#474747","newTab":false,"mediaId": "' . self::$cmsImageIds[1] . '","overlay":false,"fileName":"zenitplatformhorizon\/static\/img\/cms\/preview_two_large.jpg","mediaUrl":"'. self::$cmsImageIds[1] .'","animation":"kenburns-bottom-left","textScale":true,"codeEditor":true,"animationIn":"slide-in-bottom","textMargins":true,"overlayColor":"#000000","textMaxWidth":"800px","textMinWidth":null,"textPaddings":false,"headlineScale":true,"textMarginTop":"20px","backgroundBlur":"0px","overlayOpacity":"50%","textMarginLeft":"14%","textPaddingTop":"8px","backgroundColor":"transparent","textMarginRight":"10%","textPaddingLeft":"16px","textBorderRadius":false,"textMarginBottom":"20px","textPaddingRight":"16px","customItemClasses":null,"imageBorderRadius":false,"textPaddingBottom":"8px","verticalTextAlign":"center","verticalImageAlign":"center","horizontalTextAlign":"flex-start","horizontalImageAlign":"center","textBorderRadiusTopLeft":"3px","imageBorderRadiusTopLeft":"6px","textBorderRadiusTopRight":"3px","imageBorderRadiusTopRight":"6px","textBorderRadiusBottomLeft":"3px","imageBorderRadiusBottomLeft":"6px","textBorderRadiusBottomRight":"3px","imageBorderRadiusBottomRight":"6px"},{"url":"#demo-link","text":{"value":"<h1 class=\"h2\" align=\"left\" style=\"font-weight:600;\">Zeit f\u00fcr <br><span style=\"background-color:#474747;color:#fff; display:inline-block; margin-top:10px; padding: 10px 5px;\">Eleganz.<\/span><\/h1>\n<p style=\"line-height: 1.2; opacity: 0.65;\" class=\"d-inline-block my-3\">Erg\u00e4nze deinen Look mit einer zeitlosen, modernen Uhr aus unseren hochwertig verarbeiteten Produkten.<\/p>\n<br><a href=\"#demo-link\" style=\"color:#856b40\">\u2014 Jetzt entdecken!<\/a><br>","source":"static"},"color":"#474747","newTab":false,"mediaId":"' . self::$cmsImageIds[2] . '","overlay":false,"mediaUrl":"' . self::$cmsImageIds[2] . '","animation":"kenburns-top-right","textScale":true,"codeEditor":true,"animationIn":"slide-in-bottom","textMargins":true,"overlayColor":"#000000","textMaxWidth":"600px","textMinWidth":null,"textPaddings":false,"headlineScale":true,"textMarginTop":"20px","backgroundBlur":"0px","overlayOpacity":"50%","textMarginLeft":"14%","textPaddingTop":"8px","backgroundColor":"transparent","textMarginRight":"10%","textPaddingLeft":"16px","textBorderRadius":false,"textMarginBottom":"20px","textPaddingRight":"16px","customItemClasses":null,"imageBorderRadius":false,"textPaddingBottom":"8px","verticalTextAlign":"center","verticalImageAlign":"center","horizontalTextAlign":"flex-start","horizontalImageAlign":"right","textBorderRadiusTopLeft":"3px","imageBorderRadiusTopLeft":"6px","textBorderRadiusTopRight":"3px","imageBorderRadiusTopRight":"6px","textBorderRadiusBottomLeft":"3px","imageBorderRadiusBottomLeft":"6px","textBorderRadiusBottomRight":"3px","imageBorderRadiusBottomRight":"6px"},{"url":"#demo-link","text":{"value":"<span style=\"font-weight:600;\" align=\"left\" class=\"h2\">Pr\u00e4zision in <br><span style=\"background-color:#474747;color:#fff; display:inline-block; margin-top:10px; padding: 10px 5px;\">jedem Tick.<\/span><\/span>\n<p class=\"d-inline-block my-3\" style=\"line-height: 1.2; opacity: 0.65;\" class=\"d-inline-block\">Entdecke unsere zahlreichen hochwertigen Uhren und Accessoires.<\/p>\n<br><a style=\"color:#856b40\" href=\"#demo-link\">\u2014 Jetzt entdecken!<\/a><br>","source":"static"},"color":"#474747","newTab":false,"mediaId":"' . self::$cmsImageIds[3] . '","overlay":false,"mediaUrl":"' . self::$cmsImageIds[3] . '","animation":"kenburns-top-right","textScale":true,"codeEditor":true,"animationIn":"slide-in-bottom","textMargins":true,"overlayColor":"#000000","textMaxWidth":"600px","textMinWidth":null,"textPaddings":false,"headlineScale":true,"textMarginTop":"20px","backgroundBlur":"0px","overlayOpacity":"50%","textMarginLeft":"14%","textPaddingTop":"8px","backgroundColor":"transparent","textMarginRight":"10%","textPaddingLeft":"16px","textBorderRadius":false,"textMarginBottom":"20px","textPaddingRight":"16px","customItemClasses":null,"imageBorderRadius":false,"textPaddingBottom":"8px","verticalTextAlign":"center","verticalImageAlign":"center","horizontalTextAlign":"flex-start","horizontalImageAlign":"center","textBorderRadiusTopLeft":"3px","imageBorderRadiusTopLeft":"6px","textBorderRadiusTopRight":"3px","imageBorderRadiusTopRight":"6px","textBorderRadiusBottomLeft":"3px","imageBorderRadiusBottomLeft":"6px","textBorderRadiusBottomRight":"3px","imageBorderRadiusBottomRight":"6px"}],"source":"static"},"customClasses":{"value":null,"source":"static"},"multipleItems":{"value":false,"source":"static"},"verticalAlign":{"value":null,"source":"static"},"navigationDots":{"value":"inside","source":"static"},"autoplayTimeout":{"value":5000,"source":"static"},"horizontalAlign":{"value":null,"source":"static"},"navigationArrows":{"value":"inside","source":"static"},"autoplayHoverPause":{"value":false,"source":"static"},"elementBorderRadius":{"value":false,"source":"static"},"elementBorderRadiusTopLeft":{"value":"6px","source":"static"},"elementBorderRadiusTopRight":{"value":"6px","source":"static"},"elementBorderRadiusBottomLeft":{"value":"6px","source":"static"},"elementBorderRadiusBottomRight":{"value":"6px","source":"static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"axis":{"value":"vertical","source":"static"},"loop":{"value":false,"source":"static"},"mode":{"value":"carousel","source":"static"},"items":{"value":1,"source":"static"},"speed":{"value":800,"source":"static"},"gutter":{"value":0,"source":"static"},"rewind":{"value":true,"source":"static"},"itemsLG":{"value":1,"source":"static"},"itemsMD":{"value":1,"source":"static"},"itemsSM":{"value":1,"source":"static"},"itemsXL":{"value":1,"source":"static"},"itemsXS":{"value":1,"source":"static"},"autoplay":{"value":true,"source":"static"},"minHeight":{"value":"80vh","source":"static"},"displayMode":{"value":"cover","source":"static"},"sliderItems":{"value":[{"url":"#demo-link","text":{"value":"<h1 style=\"font-weight:600;\" align=\"left\" class=\"h2\">Every second <br><span style=\"background-color:#474747;color:#fff; display:inline-block; margin-top:10px; padding: 10px 5px;\">counts.<\/span><\/h1>\n<p class=\"d-inline-block my-3\" style=\"line-height: 1.2; opacity: 0.65;\">Our collection offers a wide range of timeless watches, <br>from classic to high-precision.<\/p>\n<br><a style=\"color:#856b40\" href=\"#demo-link\">\u2014 Explore now!<\/a><br>","source":"static"},"color":"#474747","newTab":false,"mediaId": "' . self::$cmsImageIds[1] . '","overlay":false,"fileName":"zenitplatformhorizon\/static\/img\/cms\/preview_two_large.jpg","mediaUrl":"'. self::$cmsImageIds[1] .'","animation":"kenburns-top-right","textScale":true,"codeEditor":true,"animationIn":"slide-in-bottom","textMargins":true,"overlayColor":"#000000","textMaxWidth":"800px","textMinWidth":null,"textPaddings":false,"headlineScale":true,"textMarginTop":"20px","backgroundBlur":"0px","overlayOpacity":"50%","textMarginLeft":"14%","textPaddingTop":"8px","backgroundColor":"transparent","textMarginRight":"10%","textPaddingLeft":"16px","textBorderRadius":false,"textMarginBottom":"20px","textPaddingRight":"16px","customItemClasses":null,"imageBorderRadius":false,"textPaddingBottom":"8px","verticalTextAlign":"center","verticalImageAlign":"center","horizontalTextAlign":"flex-start","horizontalImageAlign":"center","textBorderRadiusTopLeft":"3px","imageBorderRadiusTopLeft":"6px","textBorderRadiusTopRight":"3px","imageBorderRadiusTopRight":"6px","textBorderRadiusBottomLeft":"3px","imageBorderRadiusBottomLeft":"6px","textBorderRadiusBottomRight":"3px","imageBorderRadiusBottomRight":"6px"},{"url":"#demo-link","text":{"value":"<h1 class=\"h2\" align=\"left\" style=\"font-weight:600;\">Elevate your <br><span style=\"background-color:#474747;color:#fff; display:inline-block; margin-top:10px; padding: 10px 5px;\">elegance.<\/span><\/h1>\n<p style=\"line-height: 1.2; opacity: 0.65;\" class=\"d-inline-block my-3\">Enhance your look with a timeless watch from our professionally created collection.<\/p>\n<br><a href=\"#demo-link\" style=\"color:#856b40\">\u2014 Explore now!<\/a><br>","source":"static"},"color":"#474747","newTab":false,"mediaId":"' . self::$cmsImageIds[2] . '","overlay":false,"mediaUrl":"' . self::$cmsImageIds[2] . '","animation":"kenburns-top-right","textScale":true,"codeEditor":true,"animationIn":"slide-in-bottom","textMargins":true,"overlayColor":"#000000","textMaxWidth":"600px","textMinWidth":null,"textPaddings":false,"headlineScale":true,"textMarginTop":"20px","backgroundBlur":"0px","overlayOpacity":"50%","textMarginLeft":"14%","textPaddingTop":"8px","backgroundColor":"transparent","textMarginRight":"10%","textPaddingLeft":"16px","textBorderRadius":false,"textMarginBottom":"20px","textPaddingRight":"16px","customItemClasses":null,"imageBorderRadius":false,"textPaddingBottom":"8px","verticalTextAlign":"center","verticalImageAlign":"center","horizontalTextAlign":"flex-start","horizontalImageAlign":"right","textBorderRadiusTopLeft":"3px","imageBorderRadiusTopLeft":"6px","textBorderRadiusTopRight":"3px","imageBorderRadiusTopRight":"6px","textBorderRadiusBottomLeft":"3px","imageBorderRadiusBottomLeft":"6px","textBorderRadiusBottomRight":"3px","imageBorderRadiusBottomRight":"6px"},{"url":"#demo-link","text":{"value":"<span style=\"font-weight:600;\" align=\"left\" class=\"h2\">Precision in <br><span style=\"background-color:#474747;color:#fff; display:inline-block; margin-top:10px; padding: 10px 5px;\">every tick.<\/span><\/span>\n<p class=\"d-inline-block my-3\" style=\"line-height: 1.2; opacity: 0.65;\" class=\"d-inline-block\">Discover our exquisite range of timeless and precision watches.<\/p>\n<br><a style=\"color:#856b40\" href=\"#demo-link\">\u2014 Explore now!<\/a><br>","source":"static"},"color":"#474747","newTab":false,"mediaId":"' . self::$cmsImageIds[3] . '","overlay":false,"mediaUrl":"' . self::$cmsImageIds[3] . '","animation":"kenburns-top-right","textScale":true,"codeEditor":true,"animationIn":"slide-in-bottom","textMargins":true,"overlayColor":"#000000","textMaxWidth":"600px","textMinWidth":null,"textPaddings":false,"headlineScale":true,"textMarginTop":"20px","backgroundBlur":"0px","overlayOpacity":"50%","textMarginLeft":"14%","textPaddingTop":"8px","backgroundColor":"transparent","textMarginRight":"10%","textPaddingLeft":"16px","textBorderRadius":false,"textMarginBottom":"20px","textPaddingRight":"16px","customItemClasses":null,"imageBorderRadius":false,"textPaddingBottom":"8px","verticalTextAlign":"center","verticalImageAlign":"center","horizontalTextAlign":"flex-start","horizontalImageAlign":"center","textBorderRadiusTopLeft":"3px","imageBorderRadiusTopLeft":"6px","textBorderRadiusTopRight":"3px","imageBorderRadiusTopRight":"6px","textBorderRadiusBottomLeft":"3px","imageBorderRadiusBottomLeft":"6px","textBorderRadiusBottomRight":"3px","imageBorderRadiusBottomRight":"6px"}],"source":"static"},"customClasses":{"value":null,"source":"static"},"multipleItems":{"value":false,"source":"static"},"verticalAlign":{"value":null,"source":"static"},"navigationDots":{"value":"inside","source":"static"},"autoplayTimeout":{"value":5000,"source":"static"},"horizontalAlign":{"value":null,"source":"static"},"navigationArrows":{"value":"inside","source":"static"},"autoplayHoverPause":{"value":false,"source":"static"},"elementBorderRadius":{"value":false,"source":"static"},"elementBorderRadiusTopLeft":{"value":"6px","source":"static"},"elementBorderRadiusTopRight":{"value":"6px","source":"static"},"elementBorderRadiusBottomLeft":{"value":"6px","source":"static"},"elementBorderRadiusBottomRight":{"value":"6px","source":"static"}}', true)
                                            ]
                                        ])
                                    ],
                                ]
                            ],
                            [
                                'position' => 1,
                                'type' => 'zen-image-slider',
                                'locked' => 0,
                                'backgroundMediaMode' => 'cover',
                                'visibility' => ['mobile' => true, 'tablet' => false, 'desktop' => false],
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
                                                'config' => json_decode('{"axis":{"value":"vertical","source":"static"},"loop":{"value":false,"source":"static"},"mode":{"value":"carousel","source":"static"},"items":{"value":1,"source":"static"},"speed":{"value":800,"source":"static"},"gutter":{"value":0,"source":"static"},"rewind":{"value":true,"source":"static"},"itemsLG":{"value":1,"source":"static"},"itemsMD":{"value":1,"source":"static"},"itemsSM":{"value":1,"source":"static"},"itemsXL":{"value":1,"source":"static"},"itemsXS":{"value":1,"source":"static"},"autoplay":{"value":true,"source":"static"},"minHeight":{"value":"80vh","source":"static"},"displayMode":{"value":"cover","source":"static"},"sliderItems":{"value":[{"url":null,"text":{"value":"<span style=\"font-weight:600;\" align=\"left\" class=\"h2\">Jede Sekunde <br><span style=\"background-color:#474747;color:#fff; display:inline-block; margin-top:10px; padding: 10px 5px;\">z\u00e4hlt.<\/span><\/span>\n<p class=\"d-inline-block my-3\" style=\"line-height: 1.2; opacity: 0.65;\">Unser Sortiment bietet eine vielzahl an Uhren, <br>von klassisch bis hoch modern.<\/p>\n<br><a style=\"color:#856b40\" href=\"#demo-link\">\u2014 Jetzt entdecken!<\/a><br>","source":"static"},"color":"#474747","newTab":false,"mediaId":"' . self::$cmsImageIds[4] . '","overlay":false,"fileName":"zenitplatformhorizon\/static\/img\/cms\/preview_two_large.jpg","mediaUrl":"' . self::$cmsImageIds[4] . '","animation":"kenburns-top-right","textScale":true,"codeEditor":true,"animationIn":"slide-in-bottom","textMargins":false,"overlayColor":"#000000","textMaxWidth":"600px","textMinWidth":null,"textPaddings":false,"headlineScale":true,"textMarginTop":"20px","backgroundBlur":"0px","overlayOpacity":"50%","textMarginLeft":"10%","textPaddingTop":"8px","backgroundColor":"transparent","textMarginRight":"10%","textPaddingLeft":"16px","textBorderRadius":false,"textMarginBottom":"20px","textPaddingRight":"16px","customItemClasses":null,"imageBorderRadius":false,"textPaddingBottom":"8px","verticalTextAlign":"flex-start","verticalImageAlign":"center","horizontalTextAlign":"flex-start","horizontalImageAlign":"center","textBorderRadiusTopLeft":"3px","imageBorderRadiusTopLeft":"6px","textBorderRadiusTopRight":"3px","imageBorderRadiusTopRight":"6px","textBorderRadiusBottomLeft":"3px","imageBorderRadiusBottomLeft":"6px","textBorderRadiusBottomRight":"3px","imageBorderRadiusBottomRight":"6px"},{"url":"#demo-link","text":{"value":"<h1 class=\"h2\" align=\"left\" style=\"font-weight:600;\">Zeit f\u00fcr <br><span style=\"background-color:#474747;color:#fff; display:inline-block; margin-top:10px; padding: 10px 5px;\">Eleganz.<\/span><\/h1>\n<p style=\"line-height: 1.2; opacity: 0.65;\" class=\"d-inline-block my-3\">Erg\u00e4nze deinen Look mit einer zeitlosen, modernen Uhr aus unseren hochwertig verarbeiteten Produkten.<\/p>\n<br><a href=\"#demo-link\" style=\"color:#856b40\">\u2014 Jetzt entdecken!<\/a><br>","source":"static"},"color":"#474747","newTab":false,"mediaId":"' . self::$cmsImageIds[5] . '","overlay":false,"mediaUrl":"' . self::$cmsImageIds[4] . '","animation":"kenburns-top-right","textScale":true,"codeEditor":true,"animationIn":"slide-in-bottom","textMargins":false,"overlayColor":"","textMaxWidth":"600px","textMinWidth":null,"textPaddings":false,"headlineScale":true,"textMarginTop":"20px","backgroundBlur":"0px","overlayOpacity":"","textMarginLeft":"10%","textPaddingTop":"8px","backgroundColor":"transparent","textMarginRight":"10%","textPaddingLeft":"16px","textBorderRadius":false,"textMarginBottom":"20px","textPaddingRight":"16px","customItemClasses":null,"imageBorderRadius":false,"textPaddingBottom":"8px","verticalTextAlign":"center","verticalImageAlign":"center","horizontalTextAlign":"flex-start","horizontalImageAlign":"center","textBorderRadiusTopLeft":"3px","imageBorderRadiusTopLeft":"6px","textBorderRadiusTopRight":"3px","imageBorderRadiusTopRight":"6px","textBorderRadiusBottomLeft":"3px","imageBorderRadiusBottomLeft":"6px","textBorderRadiusBottomRight":"3px","imageBorderRadiusBottomRight":"6px"},{"url":"#demo-link","text":{"value":"<span style=\"font-weight:600;\" align=\"left\" class=\"h2\">Pr\u00e4zision in <br><span style=\"background-color:#474747;color:#fff; display:inline-block; margin-top:10px; padding: 10px 5px;\">jedem Tick.<\/span><\/span>\n<p class=\"d-inline-block my-3\" style=\"line-height: 1.2; opacity: 0.65;\" class=\"d-inline-block\">Entdecke unsere zahlreichen hochwertigen Uhren und Accessoires.<\/p>\n<br><a style=\"color:#856b40\" href=\"#demo-link\">\u2014 Jetzt entdecken!<\/a><br>","source":"static"},"color":"#474747","newTab":false,"mediaId":"' . self::$cmsImageIds[6] . '","overlay":false,"mediaUrl":"' . self::$cmsImageIds[6] . '","animation":"kenburns-top-right","textScale":true,"codeEditor":true,"animationIn":"slide-in-bottom","textMargins":false,"overlayColor":"#000000","textMaxWidth":"600px","textMinWidth":null,"textPaddings":false,"headlineScale":true,"textMarginTop":"20px","backgroundBlur":"0px","overlayOpacity":"50%","textMarginLeft":"10%","textPaddingTop":"8px","backgroundColor":"transparent","textMarginRight":"10%","textPaddingLeft":"16px","textBorderRadius":false,"textMarginBottom":"20px","textPaddingRight":"16px","customItemClasses":null,"imageBorderRadius":false,"textPaddingBottom":"8px","verticalTextAlign":"flex-start","verticalImageAlign":"center","horizontalTextAlign":"flex-start","horizontalImageAlign":"center","textBorderRadiusTopLeft":"3px","imageBorderRadiusTopLeft":"6px","textBorderRadiusTopRight":"3px","imageBorderRadiusTopRight":"6px","textBorderRadiusBottomLeft":"3px","imageBorderRadiusBottomLeft":"6px","textBorderRadiusBottomRight":"3px","imageBorderRadiusBottomRight":"6px"}],"source":"static"},"customClasses":{"value":null,"source":"static"},"multipleItems":{"value":false,"source":"static"},"verticalAlign":{"value":null,"source":"static"},"navigationDots":{"value":"inside","source":"static"},"autoplayTimeout":{"value":5000,"source":"static"},"horizontalAlign":{"value":null,"source":"static"},"navigationArrows":{"value":"inside","source":"static"},"autoplayHoverPause":{"value":false,"source":"static"},"elementBorderRadius":{"value":false,"source":"static"},"elementBorderRadiusTopLeft":{"value":"6px","source":"static"},"elementBorderRadiusTopRight":{"value":"6px","source":"static"},"elementBorderRadiusBottomLeft":{"value":"6px","source":"static"},"elementBorderRadiusBottomRight":{"value":"6px","source":"static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"axis":{"value":"vertical","source":"static"},"loop":{"value":false,"source":"static"},"mode":{"value":"carousel","source":"static"},"items":{"value":1,"source":"static"},"speed":{"value":800,"source":"static"},"gutter":{"value":0,"source":"static"},"rewind":{"value":true,"source":"static"},"itemsLG":{"value":1,"source":"static"},"itemsMD":{"value":1,"source":"static"},"itemsSM":{"value":1,"source":"static"},"itemsXL":{"value":1,"source":"static"},"itemsXS":{"value":1,"source":"static"},"autoplay":{"value":true,"source":"static"},"minHeight":{"value":"80vh","source":"static"},"displayMode":{"value":"cover","source":"static"},"sliderItems":{"value":[{"url":"#demo-link","text":{"value":"<h1 class=\"h2\" align=\"left\" style=\"font-weight:600;\">Every second <br><span style=\"background-color:#474747;color:#fff; display:inline-block; margin-top:10px; padding: 10px 5px;\">counts.<\/span><\/h1>\n<p style=\"line-height: 1.2; opacity: 0.65;\" class=\"d-inline-block my-3\">Our collection offers a wide range of timeless watches, <br>from classic to high-precision.<\/p>\n<br><a href=\"#demo-link\" style=\"color:#856b40\">\u2014 Explore now!<\/a><br>","source":"static"},"color":"#474747","newTab":false,"mediaId":"' . self::$cmsImageIds[4] . '","overlay":false,"mediaUrl":"' . self::$cmsImageIds[4] . '","animation":"kenburns-top-right","textScale":true,"codeEditor":true,"animationIn":"slide-in-bottom","textMargins":false,"overlayColor":"#000000","textMaxWidth":"800px","textMinWidth":null,"textPaddings":false,"headlineScale":true,"textMarginTop":"20px","backgroundBlur":"0px","overlayOpacity":"50%","textMarginLeft":"10%","textPaddingTop":"8px","backgroundColor":"transparent","textMarginRight":"10%","textPaddingLeft":"16px","textBorderRadius":false,"textMarginBottom":"20px","textPaddingRight":"16px","customItemClasses":null,"imageBorderRadius":false,"textPaddingBottom":"8px","verticalTextAlign":"flex-start","verticalImageAlign":"center","horizontalTextAlign":"flex-start","horizontalImageAlign":"center","textBorderRadiusTopLeft":"3px","imageBorderRadiusTopLeft":"6px","textBorderRadiusTopRight":"3px","imageBorderRadiusTopRight":"6px","textBorderRadiusBottomLeft":"3px","imageBorderRadiusBottomLeft":"6px","textBorderRadiusBottomRight":"3px","imageBorderRadiusBottomRight":"6px"},{"url":"#demo-link","text":{"value":"<h1 class=\"h2\" align=\"left\" style=\"font-weight:600;\">Elevate your <br><span style=\"background-color:#474747;color:#fff; display:inline-block; margin-top:10px; padding: 10px 5px;\">elegance.<\/span><\/h1>\n<p style=\"line-height: 1.2; opacity: 0.65;\" class=\"d-inline-block my-3\">Enhance your look with a timeless watch from our professionally created collection.<\/p>\n<br><a href=\"#demo-link\" style=\"color:#856b40\">\u2014 Explore now!<\/a><br>","source":"static"},"color":"#474747","newTab":false,"mediaId":"' . self::$cmsImageIds[5] . '","overlay":false,"mediaUrl":"' . self::$cmsImageIds[5] . '","animation":"kenburns-top-right","textScale":true,"codeEditor":true,"animationIn":"slide-in-bottom","textMargins":false,"overlayColor":"#000000","textMaxWidth":"800px","textMinWidth":null,"textPaddings":false,"headlineScale":true,"textMarginTop":"20px","backgroundBlur":"0px","overlayOpacity":"50%","textMarginLeft":"10%","textPaddingTop":"8px","backgroundColor":"transparent","textMarginRight":"10%","textPaddingLeft":"16px","textBorderRadius":false,"textMarginBottom":"20px","textPaddingRight":"16px","customItemClasses":null,"imageBorderRadius":false,"textPaddingBottom":"8px","verticalTextAlign":"center","verticalImageAlign":"center","horizontalTextAlign":"flex-start","horizontalImageAlign":"center","textBorderRadiusTopLeft":"3px","imageBorderRadiusTopLeft":"6px","textBorderRadiusTopRight":"3px","imageBorderRadiusTopRight":"6px","textBorderRadiusBottomLeft":"3px","imageBorderRadiusBottomLeft":"6px","textBorderRadiusBottomRight":"3px","imageBorderRadiusBottomRight":"6px"},{"url":"#demo-link","text":{"value":"<h1 style=\"font-weight:600;\" align=\"left\" class=\"h2\">Elevate your <br><span style=\"background-color:#474747;color:#fff; display:inline-block; margin-top:10px; padding: 10px 5px;\">Elegance.<\/span><\/h1>\n<p class=\"d-inline-block my-3\" style=\"line-height: 1.2; opacity: 0.65;\" class=\"d-inline-block\">Enhance your look with a timeless watch from our professionally created collection.<\/p>\n<br><a style=\"color:#856b40\" href=\"#demo-link\">\u2014 Explore now!<\/a><br>","source":"static"},"color":"#474747","newTab":false,"mediaId":"' . self::$cmsImageIds[6] . '","overlay":false,"mediaUrl":"' . self::$cmsImageIds[6] . '","animation":"kenburns-top-right","textScale":true,"codeEditor":true,"animationIn":"slide-in-bottom","textMargins":false,"overlayColor":"#000000","textMaxWidth":"800px","textMinWidth":null,"textPaddings":false,"headlineScale":true,"textMarginTop":"20px","backgroundBlur":"0px","overlayOpacity":"50%","textMarginLeft":"10%","textPaddingTop":"8px","backgroundColor":"transparent","textMarginRight":"10%","textPaddingLeft":"16px","textBorderRadius":false,"textMarginBottom":"20px","textPaddingRight":"16px","customItemClasses":null,"imageBorderRadius":false,"textPaddingBottom":"8px","verticalTextAlign":"flex-start","verticalImageAlign":"center","horizontalTextAlign":"flex-start","horizontalImageAlign":"center","textBorderRadiusTopLeft":"3px","imageBorderRadiusTopLeft":"6px","textBorderRadiusTopRight":"3px","imageBorderRadiusTopRight":"6px","textBorderRadiusBottomLeft":"3px","imageBorderRadiusBottomLeft":"6px","textBorderRadiusBottomRight":"3px","imageBorderRadiusBottomRight":"6px"}],"source":"static"},"customClasses":{"value":null,"source":"static"},"multipleItems":{"value":false,"source":"static"},"verticalAlign":{"value":null,"source":"static"},"navigationDots":{"value":"inside","source":"static"},"autoplayTimeout":{"value":5000,"source":"static"},"horizontalAlign":{"value":null,"source":"static"},"navigationArrows":{"value":"inside","source":"static"},"autoplayHoverPause":{"value":false,"source":"static"},"elementBorderRadius":{"value":false,"source":"static"},"elementBorderRadiusTopLeft":{"value":"6px","source":"static"},"elementBorderRadiusTopRight":{"value":"6px","source":"static"},"elementBorderRadiusBottomLeft":{"value":"6px","source":"static"},"elementBorderRadiusBottomRight":{"value":"6px","source":"static"}}', true)
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
                        'sizingMode' => 'full_width',
                        'type' => 'default',
                        'backgroundColor' => '#fff',
                        'backgroundMediaId' => self::$cmsImageIds[0],
                        'backgroundMediaMode' => 'cover',
                        'blocks' => [
                            [
                                'position' => 0,
                                'type' => 'text',
                                'locked' => 0,
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "80px",
                                'marginBottom' => "20px",
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
                                                'config' => json_decode('{"content":{"value":"<p style=\"text-align: center; letter-spacing: 2px;\">ZEIT F\u00dcR ETWAS NEUES<br><\/p>\n<h2 style=\"text-align: center; font-size: 46px;\">Neuste Produkte<\/h2>\n<br>\n","source":"static"},"verticalAlign":{"value":null,"source":"static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content":{"value":"<p style=\"text-align: center; letter-spacing: 2px;\">TIME FOR SOMETHING NEW<br><\/p>\n<h2 style=\"text-align: center; font-size: 46px;\">Newest Collection<\/h2>\n<br>\n","source":"static"},"verticalAlign":{"value":null,"source":"static"}}', true)
                                            ]
                                        ])
                                    ],
                                ]
                            ],
                            [
                                'position' => 1,
                                'type' => 'product-slider',
                                'locked' => 0,
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "20px",
                                'marginBottom' => "20px",
                                'marginLeft' => "20px",
                                'marginRight' => "20px",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'product-slider',
                                        'slot' => 'productSlider',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"title":{"value":"","source":"static"},"border":{"value":false,"source":"static"},"rotate":{"value":true,"source":"static"},"products":{"value":' . $this->limitedProducts(7) . ',"source":"static"},"boxLayout":{"value":"minimal","source":"static"},"elMinWidth":{"value":"300px","source":"static"},"navigation":{"value":true,"source":"static"},"displayMode":{"value":"standard","source":"static"},"verticalAlign":{"value":null,"source":"static"},"productStreamLimit":{"value":10,"source":"static"},"productStreamSorting":{"value":"name:ASC","source":"static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"title":{"value":"","source":"static"},"border":{"value":false,"source":"static"},"rotate":{"value":true,"source":"static"},"products":{"value":' . $this->limitedProducts(7) . ',"source":"static"},"boxLayout":{"value":"minimal","source":"static"},"elMinWidth":{"value":"300px","source":"static"},"navigation":{"value":true,"source":"static"},"displayMode":{"value":"standard","source":"static"},"verticalAlign":{"value":null,"source":"static"},"productStreamLimit":{"value":10,"source":"static"},"productStreamSorting":{"value":"name:ASC","source":"static"}}', true)
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
                                                'config' => json_decode('{"content":{"value":"<p style=\"text-align: center;\"><a class=\"btn btn-lg btn-outline-secondary\" href=\"#demo-link\" target=\"_self\">Mehr entdecken<\/a><br><\/p>","source":"static"},"verticalAlign":{"value":null,"source":"static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content":{"value":"<p style=\"text-align: center;\"><a target=\"_self\" href=\"#demo-link\" class=\"btn btn-lg btn-outline-secondary\">Show more<\/a><br><\/p>","source":"static"},"verticalAlign":{"value":null,"source":"static"}}', true)
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
                                                'config' => json_decode('{"url":{"value":null,"source":"static"},"text":{"value":"<h3 style=\"text-align: center; font-weight: 500; display: inline-block; margin-right: 20vw\" class=\"h1\">MODERN UND <span style=\"color:#fff; background-color:#474747; padding: 5px 10px; display: inline-block\">ZEITLOS<\/span><\/h3>","source":"static"},"media":{"value":"' . self::$cmsImageIds[7] . '","source":"static"},"newTab":{"value":false,"source":"static"},"overlay":{"value":false,"source":"static"},"minHeight":{"value":"75vh","source":"static"},"textColor":{"value":"#474747","source":"static"},"textScale":{"value":false,"source":"static"},"codeEditor":{"value":false,"source":"static"},"imageHover":{"value":"none","source":"static"},"animationIn":{"value":"none","source":"static"},"displayMode":{"value":"cover","source":"static"},"animationOut":{"value":"none","source":"static"},"overlayColor":{"value":"#000000","source":"static"},"customClasses":{"value":null,"source":"static"},"headlineScale":{"value":true,"source":"static"},"verticalAlign":{"value":null,"source":"static"},"backgroundBlur":{"value":"0px","source":"static"},"contentMargins":{"value":false,"source":"static"},"overlayOpacity":{"value":"50%","source":"static"},"backgroundColor":{"value":"transparent","source":"static"},"contentMaxWidth":{"value":"clamp(1000px, 50%, 3000px)","source":"static"},"contentMinWidth":{"value":null,"source":"static"},"contentPaddings":{"value":false,"source":"static"},"horizontalAlign":{"value":null,"source":"static"},"contentMarginTop":{"value":"20px","source":"static"},"contentMarginLeft":{"value":"20px","source":"static"},"contentPaddingTop":{"value":"8px","source":"static"},"imageBorderRadius":{"value":false,"source":"static"},"contentMarginRight":{"value":"20px","source":"static"},"contentPaddingLeft":{"value":"16px","source":"static"},"verticalImageAlign":{"value":"center","source":"static"},"contentBorderRadius":{"value":false,"source":"static"},"contentMarginBottom":{"value":"20px","source":"static"},"contentPaddingRight":{"value":"16px","source":"static"},"contentPaddingBottom":{"value":"8px","source":"static"},"horizontalImageAlign":{"value":"left","source":"static"},"verticalContentAlign":{"value":"center","source":"static"},"horizontalContentAlign":{"value":"flex-end","source":"static"},"imageBorderRadiusTopLeft":{"value":"6px","source":"static"},"imageBorderRadiusTopRight":{"value":"6px","source":"static"},"contentBorderRadiusTopLeft":{"value":"2px","source":"static"},"contentBorderRadiusTopRight":{"value":"2px","source":"static"},"imageBorderRadiusBottomLeft":{"value":"6px","source":"static"},"imageBorderRadiusBottomRight":{"value":"6px","source":"static"},"contentBorderRadiusBottomLeft":{"value":"2px","source":"static"},"contentBorderRadiusBottomRight":{"value":"2px","source":"static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url":{"value":null,"source":"static"},"text":{"value":"<h3 style=\"text-align: center; font-weight: 500; display: inline-block; margin-right: 20vw;\" class=\"h1\">MODERN AND <span style=\"color:#fff; background-color:#474747; padding: 5px 10px; display: inline-block\">TIMELESS<\/span><\/h3>","source":"static"},"media":{"value":"' . self::$cmsImageIds[7] . '","source":"static"},"newTab":{"value":false,"source":"static"},"overlay":{"value":false,"source":"static"},"minHeight":{"value":"75vh","source":"static"},"textColor":{"value":"#474747","source":"static"},"textScale":{"value":false,"source":"static"},"codeEditor":{"value":false,"source":"static"},"imageHover":{"value":"none","source":"static"},"animationIn":{"value":"none","source":"static"},"displayMode":{"value":"cover","source":"static"},"animationOut":{"value":"none","source":"static"},"overlayColor":{"value":"#000000","source":"static"},"customClasses":{"value":null,"source":"static"},"headlineScale":{"value":true,"source":"static"},"verticalAlign":{"value":null,"source":"static"},"backgroundBlur":{"value":"0px","source":"static"},"contentMargins":{"value":false,"source":"static"},"overlayOpacity":{"value":"50%","source":"static"},"backgroundColor":{"value":"transparent","source":"static"},"contentMaxWidth":{"value":"clamp(1000px, 50%, 3000px)","source":"static"},"contentMinWidth":{"value":null,"source":"static"},"contentPaddings":{"value":false,"source":"static"},"horizontalAlign":{"value":null,"source":"static"},"contentMarginTop":{"value":"20px","source":"static"},"contentMarginLeft":{"value":"20px","source":"static"},"contentPaddingTop":{"value":"8px","source":"static"},"imageBorderRadius":{"value":false,"source":"static"},"contentMarginRight":{"value":"20px","source":"static"},"contentPaddingLeft":{"value":"16px","source":"static"},"verticalImageAlign":{"value":"center","source":"static"},"contentBorderRadius":{"value":false,"source":"static"},"contentMarginBottom":{"value":"20px","source":"static"},"contentPaddingRight":{"value":"16px","source":"static"},"contentPaddingBottom":{"value":"8px","source":"static"},"horizontalImageAlign":{"value":"left","source":"static"},"verticalContentAlign":{"value":"center","source":"static"},"horizontalContentAlign":{"value":"flex-end","source":"static"},"imageBorderRadiusTopLeft":{"value":"6px","source":"static"},"imageBorderRadiusTopRight":{"value":"6px","source":"static"},"contentBorderRadiusTopLeft":{"value":"2px","source":"static"},"contentBorderRadiusTopRight":{"value":"2px","source":"static"},"imageBorderRadiusBottomLeft":{"value":"6px","source":"static"},"imageBorderRadiusBottomRight":{"value":"6px","source":"static"},"contentBorderRadiusBottomLeft":{"value":"2px","source":"static"},"contentBorderRadiusBottomRight":{"value":"2px","source":"static"}}', true)
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
                        'backgroundMediaId' => self::$cmsImageIds[0],
                        'backgroundMediaMode' => 'cover',
                        'blocks' => [
                            [
                                'position' => 0,
                                'type' => 'text',
                                'locked' => 0,
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "80px",
                                'marginBottom' => "20px",
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
                                                'config' => json_decode('{"content":{"value":"<p style=\"text-align: center; letter-spacing: 2px;\">ZEITLOSE DESIGNS UND MEHR<br><\/p>\n<h2 style=\"text-align: center; font-size: 46px;\">Entdecke unsere professionellen Designs<br><\/h2>\n<br>","source":"static"},"verticalAlign":{"value":null,"source":"static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"content":{"value":"<p style=\"text-align: center; letter-spacing: 2px;\">TIMELESS DESIGNS AND MORE<br><\/p>\n<h2 style=\"text-align: center; font-size: 46px;\">Explore our Professional Designs<br><\/h2>\n<br>","source":"static"},"verticalAlign":{"value":null,"source":"static"}}', true)
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
                        'backgroundMediaId' => self::$cmsImageIds[0],
                        'backgroundMediaMode' => 'cover',
                        'blocks' => [
                            [
                                'position' => 0,
                                'type' => 'zen-teaser-grid-6-6',
                                'locked' => 0,
                                'backgroundMediaMode' => 'cover',
                                'backgroundColor' => '#fff',
                                'marginTop' => "20px",
                                'marginBottom' => "10px",
                                'marginLeft' => "20px",
                                'marginRight' => "20px",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'zen-teaser',
                                        'slot' => 'col1',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url":{"value":"#demo-link","source":"static"},"text":{"value":"HERREN","source":"static"},"color":{"value":"#fff","source":"static"},"media":{"value":"' . self::$cmsImageIds[8] . '","source":"static"},"newTab":{"value":false,"source":"static"},"overlay":{"value":false,"source":"static"},"fontSize":{"value":"24px","source":"static"},"minHeight":{"value":"400px","source":"static"},"textAlign":{"value":"center","source":"static"},"textHover":{"value":"none","source":"static"},"fontFamily":{"value":"base","source":"static"},"fontWeight":{"value":"400","source":"static"},"imageHover":{"value":"zoom","source":"static"},"animationIn":{"value":"none","source":"static"},"displayMode":{"value":"cover","source":"static"},"textMargins":{"value":false,"source":"static"},"animationOut":{"value":"none","source":"static"},"overlayColor":{"value":"#000000","source":"static"},"textMaxWidth":{"value":"300px","source":"static"},"textMinWidth":{"value":null,"source":"static"},"textPaddings":{"value":false,"source":"static"},"customClasses":{"value":"border","source":"static"},"textMarginTop":{"value":"20px","source":"static"},"verticalAlign":{"value":null,"source":"static"},"backgroundBlur":{"value":"0px","source":"static"},"overlayOpacity":{"value":"50%","source":"static"},"textMarginLeft":{"value":"20px","source":"static"},"textPaddingTop":{"value":"8px","source":"static"},"backgroundColor":{"value":"#474747","source":"static"},"horizontalAlign":{"value":null,"source":"static"},"textMarginRight":{"value":"20px","source":"static"},"textPaddingLeft":{"value":"16px","source":"static"},"textBorderRadius":{"value":false,"source":"static"},"textMarginBottom":{"value":"20px","source":"static"},"textPaddingRight":{"value":"16px","source":"static"},"imageBorderRadius":{"value":false,"source":"static"},"textPaddingBottom":{"value":"8px","source":"static"},"verticalTextAlign":{"value":"flex-end","source":"static"},"verticalImageAlign":{"value":"center","source":"static"},"horizontalTextAlign":{"value":"flex-start","source":"static"},"horizontalImageAlign":{"value":"center","source":"static"},"textBorderRadiusTopLeft":{"value":"2px","source":"static"},"imageBorderRadiusTopLeft":{"value":"6px","source":"static"},"textBorderRadiusTopRight":{"value":"2px","source":"static"},"imageBorderRadiusTopRight":{"value":"6px","source":"static"},"textBorderRadiusBottomLeft":{"value":"2px","source":"static"},"imageBorderRadiusBottomLeft":{"value":"6px","source":"static"},"textBorderRadiusBottomRight":{"value":"2px","source":"static"},"imageBorderRadiusBottomRight":{"value":"6px","source":"static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url":{"value":"#demo-link","source":"static"},"text":{"value":"MEN","source":"static"},"color":{"value":"#fff","source":"static"},"media":{"value":"' . self::$cmsImageIds[8] . '","source":"static"},"newTab":{"value":false,"source":"static"},"overlay":{"value":false,"source":"static"},"fontSize":{"value":"24px","source":"static"},"minHeight":{"value":"400px","source":"static"},"textAlign":{"value":"center","source":"static"},"textHover":{"value":"none","source":"static"},"fontFamily":{"value":"base","source":"static"},"fontWeight":{"value":"400","source":"static"},"imageHover":{"value":"zoom","source":"static"},"animationIn":{"value":"none","source":"static"},"displayMode":{"value":"cover","source":"static"},"textMargins":{"value":false,"source":"static"},"animationOut":{"value":"none","source":"static"},"overlayColor":{"value":"#000000","source":"static"},"textMaxWidth":{"value":"300px","source":"static"},"textMinWidth":{"value":null,"source":"static"},"textPaddings":{"value":false,"source":"static"},"customClasses":{"value":"border","source":"static"},"textMarginTop":{"value":"20px","source":"static"},"verticalAlign":{"value":null,"source":"static"},"backgroundBlur":{"value":"0px","source":"static"},"overlayOpacity":{"value":"50%","source":"static"},"textMarginLeft":{"value":"20px","source":"static"},"textPaddingTop":{"value":"8px","source":"static"},"backgroundColor":{"value":"#474747","source":"static"},"horizontalAlign":{"value":null,"source":"static"},"textMarginRight":{"value":"20px","source":"static"},"textPaddingLeft":{"value":"16px","source":"static"},"textBorderRadius":{"value":false,"source":"static"},"textMarginBottom":{"value":"20px","source":"static"},"textPaddingRight":{"value":"16px","source":"static"},"imageBorderRadius":{"value":false,"source":"static"},"textPaddingBottom":{"value":"8px","source":"static"},"verticalTextAlign":{"value":"flex-end","source":"static"},"verticalImageAlign":{"value":"center","source":"static"},"horizontalTextAlign":{"value":"flex-start","source":"static"},"horizontalImageAlign":{"value":"center","source":"static"},"textBorderRadiusTopLeft":{"value":"2px","source":"static"},"imageBorderRadiusTopLeft":{"value":"6px","source":"static"},"textBorderRadiusTopRight":{"value":"2px","source":"static"},"imageBorderRadiusTopRight":{"value":"6px","source":"static"},"textBorderRadiusBottomLeft":{"value":"2px","source":"static"},"imageBorderRadiusBottomLeft":{"value":"6px","source":"static"},"textBorderRadiusBottomRight":{"value":"2px","source":"static"},"imageBorderRadiusBottomRight":{"value":"6px","source":"static"}}', true)
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
                                                'config' => json_decode('{"url":{"value":"#demo-link","source":"static"},"text":{"value":"DAMEN","source":"static"},"color":{"value":"#fff","source":"static"},"media":{"value":"' . self::$cmsImageIds[9] . '","source":"static"},"newTab":{"value":false,"source":"static"},"overlay":{"value":false,"source":"static"},"fontSize":{"value":"24px","source":"static"},"minHeight":{"value":"400px","source":"static"},"textAlign":{"value":"center","source":"static"},"textHover":{"value":"none","source":"static"},"fontFamily":{"value":"base","source":"static"},"fontWeight":{"value":"400","source":"static"},"imageHover":{"value":"zoom","source":"static"},"animationIn":{"value":"none","source":"static"},"displayMode":{"value":"cover","source":"static"},"textMargins":{"value":false,"source":"static"},"animationOut":{"value":"none","source":"static"},"overlayColor":{"value":"#000000","source":"static"},"textMaxWidth":{"value":"300px","source":"static"},"textMinWidth":{"value":null,"source":"static"},"textPaddings":{"value":false,"source":"static"},"customClasses":{"value":"border","source":"static"},"textMarginTop":{"value":"20px","source":"static"},"verticalAlign":{"value":null,"source":"static"},"backgroundBlur":{"value":"0px","source":"static"},"overlayOpacity":{"value":"50%","source":"static"},"textMarginLeft":{"value":"20px","source":"static"},"textPaddingTop":{"value":"8px","source":"static"},"backgroundColor":{"value":"#474747","source":"static"},"horizontalAlign":{"value":null,"source":"static"},"textMarginRight":{"value":"20px","source":"static"},"textPaddingLeft":{"value":"16px","source":"static"},"textBorderRadius":{"value":false,"source":"static"},"textMarginBottom":{"value":"20px","source":"static"},"textPaddingRight":{"value":"16px","source":"static"},"imageBorderRadius":{"value":false,"source":"static"},"textPaddingBottom":{"value":"8px","source":"static"},"verticalTextAlign":{"value":"flex-end","source":"static"},"verticalImageAlign":{"value":"center","source":"static"},"horizontalTextAlign":{"value":"flex-start","source":"static"},"horizontalImageAlign":{"value":"right","source":"static"},"textBorderRadiusTopLeft":{"value":"2px","source":"static"},"imageBorderRadiusTopLeft":{"value":"6px","source":"static"},"textBorderRadiusTopRight":{"value":"2px","source":"static"},"imageBorderRadiusTopRight":{"value":"6px","source":"static"},"textBorderRadiusBottomLeft":{"value":"2px","source":"static"},"imageBorderRadiusBottomLeft":{"value":"6px","source":"static"},"textBorderRadiusBottomRight":{"value":"2px","source":"static"},"imageBorderRadiusBottomRight":{"value":"6px","source":"static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url":{"value":"#demo-link","source":"static"},"text":{"value":"WOMEN","source":"static"},"color":{"value":"#fff","source":"static"},"media":{"value":"' . self::$cmsImageIds[9] . '","source":"static"},"newTab":{"value":false,"source":"static"},"overlay":{"value":false,"source":"static"},"fontSize":{"value":"24px","source":"static"},"minHeight":{"value":"400px","source":"static"},"textAlign":{"value":"center","source":"static"},"textHover":{"value":"none","source":"static"},"fontFamily":{"value":"base","source":"static"},"fontWeight":{"value":"400","source":"static"},"imageHover":{"value":"zoom","source":"static"},"animationIn":{"value":"none","source":"static"},"displayMode":{"value":"cover","source":"static"},"textMargins":{"value":false,"source":"static"},"animationOut":{"value":"none","source":"static"},"overlayColor":{"value":"#000000","source":"static"},"textMaxWidth":{"value":"300px","source":"static"},"textMinWidth":{"value":null,"source":"static"},"textPaddings":{"value":false,"source":"static"},"customClasses":{"value":"border","source":"static"},"textMarginTop":{"value":"20px","source":"static"},"verticalAlign":{"value":null,"source":"static"},"backgroundBlur":{"value":"0px","source":"static"},"overlayOpacity":{"value":"50%","source":"static"},"textMarginLeft":{"value":"20px","source":"static"},"textPaddingTop":{"value":"8px","source":"static"},"backgroundColor":{"value":"#474747","source":"static"},"horizontalAlign":{"value":null,"source":"static"},"textMarginRight":{"value":"20px","source":"static"},"textPaddingLeft":{"value":"16px","source":"static"},"textBorderRadius":{"value":false,"source":"static"},"textMarginBottom":{"value":"20px","source":"static"},"textPaddingRight":{"value":"16px","source":"static"},"imageBorderRadius":{"value":false,"source":"static"},"textPaddingBottom":{"value":"8px","source":"static"},"verticalTextAlign":{"value":"flex-end","source":"static"},"verticalImageAlign":{"value":"center","source":"static"},"horizontalTextAlign":{"value":"flex-start","source":"static"},"horizontalImageAlign":{"value":"right","source":"static"},"textBorderRadiusTopLeft":{"value":"2px","source":"static"},"imageBorderRadiusTopLeft":{"value":"6px","source":"static"},"textBorderRadiusTopRight":{"value":"2px","source":"static"},"imageBorderRadiusTopRight":{"value":"6px","source":"static"},"textBorderRadiusBottomLeft":{"value":"2px","source":"static"},"imageBorderRadiusBottomLeft":{"value":"6px","source":"static"},"textBorderRadiusBottomRight":{"value":"2px","source":"static"},"imageBorderRadiusBottomRight":{"value":"6px","source":"static"}}', true)
                                            ]
                                        ])
                                    ]
                                ]
                            ],
                            [
                                'position' => 1,
                                'type' => 'zen-teaser-grid-12',
                                'locked' => 0,
                                'backgroundMediaMode' => 'cover',
                                'backgroundColor' => '#fff',
                                'marginTop' => "10px",
                                'marginBottom' => "20px",
                                'marginLeft' => "20px",
                                'marginRight' => "20px",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'zen-teaser',
                                        'slot' => 'col1',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url":{"value":"#demo-link","source":"static"},"text":{"value":"ARMB\u00c4NDER","source":"static"},"color":{"value":"#fff","source":"static"},"media":{"value":"' . self::$cmsImageIds[10] . '","source":"static"},"newTab":{"value":false,"source":"static"},"overlay":{"value":false,"source":"static"},"fontSize":{"value":"24px","source":"static"},"minHeight":{"value":"400px","source":"static"},"textAlign":{"value":"center","source":"static"},"textHover":{"value":"none","source":"static"},"fontFamily":{"value":"base","source":"static"},"fontWeight":{"value":"400","source":"static"},"imageHover":{"value":"zoom","source":"static"},"animationIn":{"value":"none","source":"static"},"displayMode":{"value":"cover","source":"static"},"textMargins":{"value":false,"source":"static"},"animationOut":{"value":"none","source":"static"},"overlayColor":{"value":"#000000","source":"static"},"textMaxWidth":{"value":"300px","source":"static"},"textMinWidth":{"value":null,"source":"static"},"textPaddings":{"value":false,"source":"static"},"customClasses":{"value":"border","source":"static"},"textMarginTop":{"value":"20px","source":"static"},"verticalAlign":{"value":null,"source":"static"},"backgroundBlur":{"value":"0px","source":"static"},"overlayOpacity":{"value":"50%","source":"static"},"textMarginLeft":{"value":"20px","source":"static"},"textPaddingTop":{"value":"8px","source":"static"},"backgroundColor":{"value":"#474747","source":"static"},"horizontalAlign":{"value":null,"source":"static"},"textMarginRight":{"value":"20px","source":"static"},"textPaddingLeft":{"value":"16px","source":"static"},"textBorderRadius":{"value":false,"source":"static"},"textMarginBottom":{"value":"20px","source":"static"},"textPaddingRight":{"value":"16px","source":"static"},"imageBorderRadius":{"value":false,"source":"static"},"textPaddingBottom":{"value":"8px","source":"static"},"verticalTextAlign":{"value":"flex-end","source":"static"},"verticalImageAlign":{"value":"center","source":"static"},"horizontalTextAlign":{"value":"flex-start","source":"static"},"horizontalImageAlign":{"value":"center","source":"static"},"textBorderRadiusTopLeft":{"value":"2px","source":"static"},"imageBorderRadiusTopLeft":{"value":"6px","source":"static"},"textBorderRadiusTopRight":{"value":"2px","source":"static"},"imageBorderRadiusTopRight":{"value":"6px","source":"static"},"textBorderRadiusBottomLeft":{"value":"2px","source":"static"},"imageBorderRadiusBottomLeft":{"value":"6px","source":"static"},"textBorderRadiusBottomRight":{"value":"2px","source":"static"},"imageBorderRadiusBottomRight":{"value":"6px","source":"static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url":{"value":"#demo-link","source":"static"},"text":{"value":"BRACELETS","source":"static"},"color":{"value":"#fff","source":"static"},"media":{"value":"' . self::$cmsImageIds[10] . '","source":"static"},"newTab":{"value":false,"source":"static"},"overlay":{"value":false,"source":"static"},"fontSize":{"value":"24px","source":"static"},"minHeight":{"value":"400px","source":"static"},"textAlign":{"value":"center","source":"static"},"textHover":{"value":"none","source":"static"},"fontFamily":{"value":"base","source":"static"},"fontWeight":{"value":"400","source":"static"},"imageHover":{"value":"zoom","source":"static"},"animationIn":{"value":"none","source":"static"},"displayMode":{"value":"cover","source":"static"},"textMargins":{"value":false,"source":"static"},"animationOut":{"value":"none","source":"static"},"overlayColor":{"value":"#000000","source":"static"},"textMaxWidth":{"value":"300px","source":"static"},"textMinWidth":{"value":null,"source":"static"},"textPaddings":{"value":false,"source":"static"},"customClasses":{"value":"border","source":"static"},"textMarginTop":{"value":"20px","source":"static"},"verticalAlign":{"value":null,"source":"static"},"backgroundBlur":{"value":"0px","source":"static"},"overlayOpacity":{"value":"50%","source":"static"},"textMarginLeft":{"value":"20px","source":"static"},"textPaddingTop":{"value":"8px","source":"static"},"backgroundColor":{"value":"#474747","source":"static"},"horizontalAlign":{"value":null,"source":"static"},"textMarginRight":{"value":"20px","source":"static"},"textPaddingLeft":{"value":"16px","source":"static"},"textBorderRadius":{"value":false,"source":"static"},"textMarginBottom":{"value":"20px","source":"static"},"textPaddingRight":{"value":"16px","source":"static"},"imageBorderRadius":{"value":false,"source":"static"},"textPaddingBottom":{"value":"8px","source":"static"},"verticalTextAlign":{"value":"flex-end","source":"static"},"verticalImageAlign":{"value":"center","source":"static"},"horizontalTextAlign":{"value":"flex-start","source":"static"},"horizontalImageAlign":{"value":"center","source":"static"},"textBorderRadiusTopLeft":{"value":"2px","source":"static"},"imageBorderRadiusTopLeft":{"value":"6px","source":"static"},"textBorderRadiusTopRight":{"value":"2px","source":"static"},"imageBorderRadiusTopRight":{"value":"6px","source":"static"},"textBorderRadiusBottomLeft":{"value":"2px","source":"static"},"imageBorderRadiusBottomLeft":{"value":"6px","source":"static"},"textBorderRadiusBottomRight":{"value":"2px","source":"static"},"imageBorderRadiusBottomRight":{"value":"6px","source":"static"}}', true)
                                            ]
                                        ])
                                    ],
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
                                'type' => 'image-two-column',
                                'locked' => 0,
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "40px",
                                'marginBottom' => "20px",
                                'marginLeft' => "20px",
                                'marginRight' => "20px",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'product-slider',
                                        'slot' => 'left',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"title":{"value":"","source":"static"},"border":{"value":false,"source":"static"},"rotate":{"value":false,"source":"static"},"products":{"value":' . $this->limitedProducts(7) . ',"source":"static"},"boxLayout":{"value":"minimal","source":"static"},"elMinWidth":{"value":"300px","source":"static"},"navigation":{"value":true,"source":"static"},"displayMode":{"value":"standard","source":"static"},"verticalAlign":{"value":"center","source":"static"},"productStreamLimit":{"value":10,"source":"static"},"productStreamSorting":{"value":"name:ASC","source":"static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"title":{"value":"","source":"static"},"border":{"value":false,"source":"static"},"rotate":{"value":false,"source":"static"},"products":{"value":' . $this->limitedProducts(7) . ',"source":"static"},"boxLayout":{"value":"minimal","source":"static"},"elMinWidth":{"value":"300px","source":"static"},"navigation":{"value":true,"source":"static"},"displayMode":{"value":"standard","source":"static"},"verticalAlign":{"value":"center","source":"static"},"productStreamLimit":{"value":10,"source":"static"},"productStreamSorting":{"value":"name:ASC","source":"static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'zen-text-banner',
                                        'slot' => 'right',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url":{"value":null,"source":"static"},"text":{"value":"<h3 class=\"h4\">Jetzt vorbestellen!<\/h3>\nSPHERE UHREN<br>\n<br><a class=\"d-inline-block mt-2\" style=\"color:#C4966E\" href=\"#demo-link\">\u2014 Entdecke mehr!<\/a>","source":"static"},"media":{"value":"' . self::$cmsImageIds[11] . '","source":"static"},"newTab":{"value":false,"source":"static"},"overlay":{"value":false,"source":"static"},"minHeight":{"value":"472px","source":"static"},"textColor":{"value":"#474747","source":"static"},"textScale":{"value":true,"source":"static"},"codeEditor":{"value":false,"source":"static"},"imageHover":{"value":"none","source":"static"},"animationIn":{"value":"none","source":"static"},"displayMode":{"value":"cover","source":"static"},"animationOut":{"value":"none","source":"static"},"overlayColor":{"value":"#000000","source":"static"},"customClasses":{"value":"border","source":"static"},"headlineScale":{"value":true,"source":"static"},"verticalAlign":{"value":null,"source":"static"},"backgroundBlur":{"value":"0px","source":"static"},"contentMargins":{"value":false,"source":"static"},"overlayOpacity":{"value":"50%","source":"static"},"backgroundColor":{"value":"transparent","source":"static"},"contentMaxWidth":{"value":"480px","source":"static"},"contentMinWidth":{"value":null,"source":"static"},"contentPaddings":{"value":false,"source":"static"},"horizontalAlign":{"value":null,"source":"static"},"contentMarginTop":{"value":"20px","source":"static"},"contentMarginLeft":{"value":"20px","source":"static"},"contentPaddingTop":{"value":"8px","source":"static"},"imageBorderRadius":{"value":false,"source":"static"},"contentMarginRight":{"value":"20px","source":"static"},"contentPaddingLeft":{"value":"16px","source":"static"},"verticalImageAlign":{"value":"center","source":"static"},"contentBorderRadius":{"value":false,"source":"static"},"contentMarginBottom":{"value":"20px","source":"static"},"contentPaddingRight":{"value":"16px","source":"static"},"contentPaddingBottom":{"value":"8px","source":"static"},"horizontalImageAlign":{"value":"center","source":"static"},"verticalContentAlign":{"value":"flex-start","source":"static"},"horizontalContentAlign":{"value":"flex-start","source":"static"},"imageBorderRadiusTopLeft":{"value":"6px","source":"static"},"imageBorderRadiusTopRight":{"value":"6px","source":"static"},"contentBorderRadiusTopLeft":{"value":"2px","source":"static"},"contentBorderRadiusTopRight":{"value":"2px","source":"static"},"imageBorderRadiusBottomLeft":{"value":"6px","source":"static"},"imageBorderRadiusBottomRight":{"value":"6px","source":"static"},"contentBorderRadiusBottomLeft":{"value":"2px","source":"static"},"contentBorderRadiusBottomRight":{"value":"2px","source":"static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url":{"value":null,"source":"static"},"text":{"value":"<h3 class=\"h4\">Preorder now!<\/h3>SPHERE WATCHES<br>\n<br><a href=\"#demo-link\" style=\"color:#C4966E\" class=\"d-inline-block mt-2\">\u2014 Discover more!<\/a>","source":"static"},"media":{"value":"' . self::$cmsImageIds[11] . '","source":"static"},"newTab":{"value":false,"source":"static"},"overlay":{"value":false,"source":"static"},"minHeight":{"value":"372px","source":"static"},"textColor":{"value":"#474747","source":"static"},"textScale":{"value":true,"source":"static"},"codeEditor":{"value":false,"source":"static"},"imageHover":{"value":"none","source":"static"},"animationIn":{"value":"none","source":"static"},"displayMode":{"value":"cover","source":"static"},"animationOut":{"value":"none","source":"static"},"overlayColor":{"value":"#000000","source":"static"},"customClasses":{"value":"border","source":"static"},"headlineScale":{"value":true,"source":"static"},"verticalAlign":{"value":null,"source":"static"},"backgroundBlur":{"value":"0px","source":"static"},"contentMargins":{"value":false,"source":"static"},"overlayOpacity":{"value":"50%","source":"static"},"backgroundColor":{"value":"transparent","source":"static"},"contentMaxWidth":{"value":"480px","source":"static"},"contentMinWidth":{"value":null,"source":"static"},"contentPaddings":{"value":false,"source":"static"},"horizontalAlign":{"value":null,"source":"static"},"contentMarginTop":{"value":"20px","source":"static"},"contentMarginLeft":{"value":"20px","source":"static"},"contentPaddingTop":{"value":"8px","source":"static"},"imageBorderRadius":{"value":false,"source":"static"},"contentMarginRight":{"value":"20px","source":"static"},"contentPaddingLeft":{"value":"16px","source":"static"},"verticalImageAlign":{"value":"center","source":"static"},"contentBorderRadius":{"value":false,"source":"static"},"contentMarginBottom":{"value":"20px","source":"static"},"contentPaddingRight":{"value":"16px","source":"static"},"contentPaddingBottom":{"value":"8px","source":"static"},"horizontalImageAlign":{"value":"center","source":"static"},"verticalContentAlign":{"value":"flex-start","source":"static"},"horizontalContentAlign":{"value":"flex-start","source":"static"},"imageBorderRadiusTopLeft":{"value":"6px","source":"static"},"imageBorderRadiusTopRight":{"value":"6px","source":"static"},"contentBorderRadiusTopLeft":{"value":"2px","source":"static"},"contentBorderRadiusTopRight":{"value":"2px","source":"static"},"imageBorderRadiusBottomLeft":{"value":"6px","source":"static"},"imageBorderRadiusBottomRight":{"value":"6px","source":"static"},"contentBorderRadiusBottomLeft":{"value":"2px","source":"static"},"contentBorderRadiusBottomRight":{"value":"2px","source":"static"}}', true)
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
                        'sizingMode' => 'boxed',
                        'type' => 'default',
                        'blocks' => [
                            [
                                'position' => 0,
                                'type' => 'image-two-column',
                                'locked' => 0,
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "20px",
                                'marginBottom' => "40px",
                                'marginLeft' => "20px",
                                'marginRight' => "20px",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'zen-text-banner',
                                        'slot' => 'left',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url":{"value":null,"source":"static"},"text":{"value":"<h3 class=\"h4\">Jetzt vorbestellen!<\/h3>\nSPHERE UHREN<br>\n<br><a class=\"d-inline-block mt-2\" style=\"color:#C4966E\" href=\"#demo-link\">\u2014 Entdecke mehr!<\/a>","source":"static"},"media":{"value":"' . self::$cmsImageIds[12] . '","source":"static"},"newTab":{"value":false,"source":"static"},"overlay":{"value":false,"source":"static"},"minHeight":{"value":"472px","source":"static"},"textColor":{"value":"#474747","source":"static"},"textScale":{"value":true,"source":"static"},"codeEditor":{"value":false,"source":"static"},"imageHover":{"value":"none","source":"static"},"animationIn":{"value":"none","source":"static"},"displayMode":{"value":"cover","source":"static"},"animationOut":{"value":"none","source":"static"},"overlayColor":{"value":"#000000","source":"static"},"customClasses":{"value":"border","source":"static"},"headlineScale":{"value":true,"source":"static"},"verticalAlign":{"value":null,"source":"static"},"backgroundBlur":{"value":"0px","source":"static"},"contentMargins":{"value":false,"source":"static"},"overlayOpacity":{"value":"50%","source":"static"},"backgroundColor":{"value":"transparent","source":"static"},"contentMaxWidth":{"value":"480px","source":"static"},"contentMinWidth":{"value":null,"source":"static"},"contentPaddings":{"value":false,"source":"static"},"horizontalAlign":{"value":null,"source":"static"},"contentMarginTop":{"value":"20px","source":"static"},"contentMarginLeft":{"value":"20px","source":"static"},"contentPaddingTop":{"value":"8px","source":"static"},"imageBorderRadius":{"value":false,"source":"static"},"contentMarginRight":{"value":"20px","source":"static"},"contentPaddingLeft":{"value":"16px","source":"static"},"verticalImageAlign":{"value":"center","source":"static"},"contentBorderRadius":{"value":false,"source":"static"},"contentMarginBottom":{"value":"20px","source":"static"},"contentPaddingRight":{"value":"16px","source":"static"},"contentPaddingBottom":{"value":"8px","source":"static"},"horizontalImageAlign":{"value":"right","source":"static"},"verticalContentAlign":{"value":"flex-start","source":"static"},"horizontalContentAlign":{"value":"flex-start","source":"static"},"imageBorderRadiusTopLeft":{"value":"6px","source":"static"},"imageBorderRadiusTopRight":{"value":"6px","source":"static"},"contentBorderRadiusTopLeft":{"value":"2px","source":"static"},"contentBorderRadiusTopRight":{"value":"2px","source":"static"},"imageBorderRadiusBottomLeft":{"value":"6px","source":"static"},"imageBorderRadiusBottomRight":{"value":"6px","source":"static"},"contentBorderRadiusBottomLeft":{"value":"2px","source":"static"},"contentBorderRadiusBottomRight":{"value":"2px","source":"static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"url":{"value":null,"source":"static"},"text":{"value":"<h3 class=\"h4\">Preorder now!<\/h3>SPHERE WATCHES<br>\n<br><a href=\"#demo-link\" style=\"color:#C4966E\" class=\"d-inline-block mt-2\">\u2014 Discover more!<\/a>","source":"static"},"media":{"value":"' . self::$cmsImageIds[12] . '","source":"static"},"newTab":{"value":false,"source":"static"},"overlay":{"value":false,"source":"static"},"minHeight":{"value":"372px","source":"static"},"textColor":{"value":"#474747","source":"static"},"textScale":{"value":true,"source":"static"},"codeEditor":{"value":false,"source":"static"},"imageHover":{"value":"none","source":"static"},"animationIn":{"value":"none","source":"static"},"displayMode":{"value":"cover","source":"static"},"animationOut":{"value":"none","source":"static"},"overlayColor":{"value":"#000000","source":"static"},"customClasses":{"value":"border","source":"static"},"headlineScale":{"value":true,"source":"static"},"verticalAlign":{"value":null,"source":"static"},"backgroundBlur":{"value":"0px","source":"static"},"contentMargins":{"value":false,"source":"static"},"overlayOpacity":{"value":"50%","source":"static"},"backgroundColor":{"value":"transparent","source":"static"},"contentMaxWidth":{"value":"480px","source":"static"},"contentMinWidth":{"value":null,"source":"static"},"contentPaddings":{"value":false,"source":"static"},"horizontalAlign":{"value":null,"source":"static"},"contentMarginTop":{"value":"20px","source":"static"},"contentMarginLeft":{"value":"20px","source":"static"},"contentPaddingTop":{"value":"8px","source":"static"},"imageBorderRadius":{"value":false,"source":"static"},"contentMarginRight":{"value":"20px","source":"static"},"contentPaddingLeft":{"value":"16px","source":"static"},"verticalImageAlign":{"value":"center","source":"static"},"contentBorderRadius":{"value":false,"source":"static"},"contentMarginBottom":{"value":"20px","source":"static"},"contentPaddingRight":{"value":"16px","source":"static"},"contentPaddingBottom":{"value":"8px","source":"static"},"horizontalImageAlign":{"value":"right","source":"static"},"verticalContentAlign":{"value":"flex-start","source":"static"},"horizontalContentAlign":{"value":"flex-start","source":"static"},"imageBorderRadiusTopLeft":{"value":"6px","source":"static"},"imageBorderRadiusTopRight":{"value":"6px","source":"static"},"contentBorderRadiusTopLeft":{"value":"2px","source":"static"},"contentBorderRadiusTopRight":{"value":"2px","source":"static"},"imageBorderRadiusBottomLeft":{"value":"6px","source":"static"},"imageBorderRadiusBottomRight":{"value":"6px","source":"static"},"contentBorderRadiusBottomLeft":{"value":"2px","source":"static"},"contentBorderRadiusBottomRight":{"value":"2px","source":"static"}}', true)
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
                                                'config' => json_decode('{"title":{"value":"","source":"static"},"border":{"value":false,"source":"static"},"rotate":{"value":false,"source":"static"},"products":{"value":' . $this->limitedProducts(7) . ',"source":"static"},"boxLayout":{"value":"minimal","source":"static"},"elMinWidth":{"value":"300px","source":"static"},"navigation":{"value":true,"source":"static"},"displayMode":{"value":"standard","source":"static"},"verticalAlign":{"value":"center","source":"static"},"productStreamLimit":{"value":10,"source":"static"},"productStreamSorting":{"value":"name:ASC","source":"static"}}', true)
                                            ],
                                            'en-GB' => [
                                                'config' => json_decode('{"title":{"value":"","source":"static"},"border":{"value":false,"source":"static"},"rotate":{"value":false,"source":"static"},"products":{"value":' . $this->limitedProducts(7) . ',"source":"static"},"boxLayout":{"value":"minimal","source":"static"},"elMinWidth":{"value":"300px","source":"static"},"navigation":{"value":true,"source":"static"},"displayMode":{"value":"standard","source":"static"},"verticalAlign":{"value":"center","source":"static"},"productStreamLimit":{"value":10,"source":"static"},"productStreamSorting":{"value":"name:ASC","source":"static"}}', true)
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

    private function home2(Context $context): array
    {
        return [
            [
                'id' => self::$cmsPageIds[1],
                'type' => 'landingpage',
                'locked' => 0,
                'previewMediaId' => self::$previewImages['sphere'],
                'name' => $this->translationHelper->adjustTranslations([
                    'de-DE' => 'Startseite Sphere - Set 2',
                    'en-GB' => 'Homepage Sphere - Set 2',
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
                                'type' => 'zen-layout-simple-8-4-reversed',
                                'locked' => 0,
                                'cssClass' => 'zen-animate slide-in-blurred-bottom zindex-fix',
                                'customFields' => ["zenit_grid_gap" => "36px"],
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "36px",
                                'marginBottom' => "20px",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'zen-search-banner',
                                        'slot' => 'left',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"media": {"value": "' . self::$cmsImageIds[35] . '", "source": "static"}, "overlay": {"value": false, "source": "static"}, "minHeight": {"value": "40vh", "source": "static"}, "textAfter": {"value": "Did not find what you are looking for? <a href=\"#demo-link\" style=\"text-decoration-color: #fff\" target=\"_self\" rel=\"noreferrer noopener\"><font color=\"#ffffff\">Get in touch</font></a>", "source": "static"}, "textColor": {"value": "#ffffff", "source": "static"}, "imageHover": {"value": "zoom", "source": "static"}, "textBefore": {"value": "<h1 class=\"h2\">What are you looking for?</h1>\n<h2 style=\"font-size: 0.875rem\">Search over 20,000 products.</h2>", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "searchColor": {"value": "#0e0e0f", "source": "static"}, "searchLarge": {"value": true, "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "customClasses": {"value": "", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "backgroundBlur": {"value": "0px", "source": "static"}, "contentMargins": {"value": false, "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textAfterScale": {"value": false, "source": "static"}, "backgroundColor": {"value": "transparent", "source": "static"}, "contentMaxWidth": {"value": "600px", "source": "static"}, "contentMinWidth": {"value": null, "source": "static"}, "contentPaddings": {"value": true, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "textBeforeScale": {"value": true, "source": "static"}, "contentMarginTop": {"value": "20px", "source": "static"}, "hideHeaderSearch": {"value": true, "source": "static"}, "searchFocusColor": {"value": "#ffffff", "source": "static"}, "contentMarginLeft": {"value": "20px", "source": "static"}, "contentPaddingTop": {"value": "36px", "source": "static"}, "customSearchField": {"value": true, "source": "static"}, "imageBorderRadius": {"value": true, "source": "static"}, "searchBorderColor": {"value": "#ffffff", "source": "static"}, "contentMarginRight": {"value": "20px", "source": "static"}, "contentPaddingLeft": {"value": "40px", "source": "static"}, "headlineAfterScale": {"value": false, "source": "static"}, "verticalImageAlign": {"value": "top", "source": "static"}, "contentBorderRadius": {"value": false, "source": "static"}, "contentMarginBottom": {"value": "20px", "source": "static"}, "contentPaddingRight": {"value": "40px", "source": "static"}, "headlineBeforeScale": {"value": true, "source": "static"}, "contentPaddingBottom": {"value": "36px", "source": "static"}, "horizontalImageAlign": {"value": "center", "source": "static"}, "verticalContentAlign": {"value": "flex-end", "source": "static"}, "searchBackgroundColor": {"value": "#ffffff", "source": "static"}, "horizontalContentAlign": {"value": "flex-start", "source": "static"}, "searchFocusBorderColor": {"value": "#0e0e0f", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "40px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "40px", "source": "static"}, "contentBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "searchFocusBackgroundColor": {"value": "#0e0e0f", "source": "static"}, "contentBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "40px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "40px", "source": "static"}, "contentBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "contentBorderRadiusBottomRight": {"value": "2px", "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'zen-text-banner',
                                        'slot' => 'right-top',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "<h2>Fashion</h2><div>in <b>% SALE</b></div>", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[13] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "minHeight": {"value": "25vh", "source": "static"}, "textColor": {"value": "#ffffff", "source": "static"}, "textScale": {"value": false, "source": "static"}, "imageHover": {"value": "zoom", "source": "static"}, "animationIn": {"value": "none", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "animationOut": {"value": "none", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "customClasses": {"value": null, "source": "static"}, "headlineScale": {"value": false, "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "backgroundBlur": {"value": "0px", "source": "static"}, "contentMargins": {"value": false, "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "backgroundColor": {"value": "transparent", "source": "static"}, "contentMaxWidth": {"value": "480px", "source": "static"}, "contentMinWidth": {"value": null, "source": "static"}, "contentPaddings": {"value": false, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "contentMarginTop": {"value": "20px", "source": "static"}, "contentMarginLeft": {"value": "20px", "source": "static"}, "contentPaddingTop": {"value": "8px", "source": "static"}, "imageBorderRadius": {"value": true, "source": "static"}, "contentMarginRight": {"value": "20px", "source": "static"}, "contentPaddingLeft": {"value": "16px", "source": "static"}, "verticalImageAlign": {"value": "center", "source": "static"}, "contentBorderRadius": {"value": false, "source": "static"}, "contentMarginBottom": {"value": "20px", "source": "static"}, "contentPaddingRight": {"value": "16px", "source": "static"}, "contentPaddingBottom": {"value": "8px", "source": "static"}, "horizontalImageAlign": {"value": "center", "source": "static"}, "verticalContentAlign": {"value": "flex-start", "source": "static"}, "horizontalContentAlign": {"value": "flex-start", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "40px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "40px", "source": "static"}, "contentBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "contentBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "40px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "40px", "source": "static"}, "contentBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "contentBorderRadiusBottomRight": {"value": "2px", "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'zen-text-banner',
                                        'slot' => 'right-bottom',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": null, "source": "static"}, "text": {"value": "<h2>Gifts</h2><div>for the <b>loved ones</b></div>", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[14] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "minHeight": {"value": "25vh", "source": "static"}, "textColor": {"value": "#ffffff", "source": "static"}, "textScale": {"value": false, "source": "static"}, "imageHover": {"value": "zoom", "source": "static"}, "animationIn": {"value": "none", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "animationOut": {"value": "none", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "customClasses": {"value": null, "source": "static"}, "headlineScale": {"value": false, "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "backgroundBlur": {"value": "0px", "source": "static"}, "contentMargins": {"value": false, "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "backgroundColor": {"value": "transparent", "source": "static"}, "contentMaxWidth": {"value": "480px", "source": "static"}, "contentMinWidth": {"value": null, "source": "static"}, "contentPaddings": {"value": false, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "contentMarginTop": {"value": "20px", "source": "static"}, "contentMarginLeft": {"value": "20px", "source": "static"}, "contentPaddingTop": {"value": "8px", "source": "static"}, "imageBorderRadius": {"value": true, "source": "static"}, "contentMarginRight": {"value": "20px", "source": "static"}, "contentPaddingLeft": {"value": "16px", "source": "static"}, "verticalImageAlign": {"value": "center", "source": "static"}, "contentBorderRadius": {"value": false, "source": "static"}, "contentMarginBottom": {"value": "20px", "source": "static"}, "contentPaddingRight": {"value": "16px", "source": "static"}, "contentPaddingBottom": {"value": "8px", "source": "static"}, "horizontalImageAlign": {"value": "center", "source": "static"}, "verticalContentAlign": {"value": "flex-start", "source": "static"}, "horizontalContentAlign": {"value": "flex-start", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "40px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "40px", "source": "static"}, "contentBorderRadiusTopLeft": {"value": "2px", "source": "static"}, "contentBorderRadiusTopRight": {"value": "2px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "40px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "40px", "source": "static"}, "contentBorderRadiusBottomLeft": {"value": "2px", "source": "static"}, "contentBorderRadiusBottomRight": {"value": "2px", "source": "static"}}', true)
                                            ]
                                        ])
                                    ]
                                ]
                            ],
                            [
                                'position' => 1,
                                'type' => 'zen-image-slider',
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
                                        'type' => 'zen-image-slider',
                                        'slot' => 'imageSlider',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"axis": {"value": "horizontal", "source": "static"}, "loop": {"value": false, "source": "static"}, "mode": {"value": "carousel", "source": "static"}, "items": {"value": 12, "source": "static"}, "speed": {"value": 500, "source": "static"}, "gutter": {"value": 0, "source": "static"}, "rewind": {"value": true, "source": "static"}, "itemsLG": {"value": 8, "source": "static"}, "itemsMD": {"value": 6, "source": "static"}, "itemsSM": {"value": 4, "source": "static"}, "itemsXL": {"value": 10, "source": "static"}, "itemsXS": {"value": 3, "source": "static"}, "autoplay": {"value": false, "source": "static"}, "minHeight": {"value": "100px", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "sliderItems": {"value": [{"url": "/demo-2/Shop/Elektronik/", "text": {"value": "<div class=\"text-center\">\n    <svg viewBox=\"0 0 512 512\" height=\"48\" width=\"48\" class=\"mb-2 ionicon\" xmlns=\"http://www.w3.org/2000/svg\"><path stroke-width=\"32\" stroke-miterlimit=\"10\" stroke=\"currentColor\" fill=\"none\" d=\"M467.51 248.83c-18.4-83.18-45.69-136.24-89.43-149.17A91.5 91.5 0 00352 96c-26.89 0-48.11 16-96 16s-69.15-16-96-16a99.09 99.09 0 00-27.2 3.66C89 112.59 61.94 165.7 43.33 248.83c-19 84.91-15.56 152 21.58 164.88 26 9 49.25-9.61 71.27-37 25-31.2 55.79-40.8 119.82-40.8s93.62 9.6 118.66 40.8c22 27.41 46.11 45.79 71.42 37.16 41.02-14.01 40.44-79.13 21.43-165.04z\"></path><circle r=\"20\" cy=\"224\" cx=\"292\"></circle><path d=\"M336 288a20 20 0 1120-19.95A20 20 0 01336 288z\"></path><circle r=\"20\" cy=\"180\" cx=\"336\"></circle><circle r=\"20\" cy=\"224\" cx=\"380\"></circle><path d=\"M160 176v96M208 224h-96\" stroke-width=\"32\" stroke-linejoin=\"round\" stroke-linecap=\"round\" stroke=\"currentColor\" fill=\"none\"></path></svg>\n    Gaming\n</div>\n", "source": "static"}, "color": "var(--zen-text-color)", "newTab": false, "mediaId": "' . self::$cmsImageIds[15] . '", "overlay": false, "mediaUrl": "' . self::$cmsImageIds[15] . '", "animation": "none", "textScale": false, "codeEditor": true, "animationIn": "none", "textMargins": false, "overlayColor": "#000000", "textMaxWidth": "600px", "textMinWidth": null, "textPaddings": false, "headlineScale": false, "textMarginTop": "20px", "overlayOpacity": "50%", "textMarginLeft": "10%", "textPaddingTop": "8px", "backgroundColor": "transparent", "textMarginRight": "10%", "textPaddingLeft": "16px", "textBorderRadius": false, "textMarginBottom": "20px", "textPaddingRight": "16px", "customItemClasses": null, "imageBorderRadius": false, "textPaddingBottom": "8px", "verticalTextAlign": "center", "verticalImageAlign": "center", "horizontalTextAlign": "center", "horizontalImageAlign": "center", "textBorderRadiusTopLeft": "3px", "imageBorderRadiusTopLeft": "6px", "textBorderRadiusTopRight": "3px", "imageBorderRadiusTopRight": "6px", "textBorderRadiusBottomLeft": "3px", "imageBorderRadiusBottomLeft": "6px", "textBorderRadiusBottomRight": "3px", "imageBorderRadiusBottomRight": "6px"}], "source": "static"}, "customClasses": {"value": null, "source": "static"}, "multipleItems": {"value": true, "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "navigationDots": {"value": null, "source": "static"}, "autoplayTimeout": {"value": 5000, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "navigationArrows": {"value": "inside", "source": "static"}, "autoplayHoverPause": {"value": true, "source": "static"}, "elementBorderRadius": {"value": false, "source": "static"}, "elementBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "elementBorderRadiusTopRight": {"value": "6px", "source": "static"}, "elementBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "elementBorderRadiusBottomRight": {"value": "6px", "source": "static"}}', true)                                            ]
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
                                'type' => 'text-teaser',
                                'locked' => 0,
                                'cssClass' => 'zen-animate slide-in-blurred-bottom',
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "100px",
                                'marginBottom' => "20px",
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
                                                'config' => json_decode('{"content": {"value": "<h2 style=\"text-align:center;\">Featured Collection</h2>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                ]
                            ],
                            [
                                'position' => 1,
                                'type' => 'zen-grid-24-24-24-24-24',
                                'locked' => 0,
                                'cssClass' => 'zen-animate slide-in-blurred-bottom',
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "20px",
                                'marginBottom' => "40px",
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
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "Decorations", "source": "static"}, "color": {"value": "#333333", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[16] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "16px", "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "show-arrow", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "500", "source": "static"}, "imageHover": {"value": "zoom", "source": "static"}, "animationIn": {"value": "none", "source": "static"}, "displayMode": {"value": "stretch", "source": "static"}, "textMargins": {"value": true, "source": "static"}, "animationOut": {"value": "none", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "", "source": "static"}, "textMinWidth": {"value": "100%", "source": "static"}, "textPaddings": {"value": true, "source": "static"}, "customClasses": {"value": "cms-element-shadow-smooth-lg", "source": "static"}, "textMarginTop": {"value": "0", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}, "backgroundBlur": {"value": "10px", "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "0", "source": "static"}, "textPaddingTop": {"value": "20px", "source": "static"}, "backgroundColor": {"value": "#ffffff1a", "source": "static"}, "horizontalAlign": {"value": "center", "source": "static"}, "textMarginRight": {"value": "0", "source": "static"}, "textPaddingLeft": {"value": "20px", "source": "static"}, "textBorderRadius": {"value": true, "source": "static"}, "textMarginBottom": {"value": "0", "source": "static"}, "textPaddingRight": {"value": "20px", "source": "static"}, "imageBorderRadius": {"value": true, "source": "static"}, "textPaddingBottom": {"value": "20px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": "center", "source": "static"}, "horizontalTextAlign": {"value": "center", "source": "static"}, "horizontalImageAlign": {"value": "center", "source": "static"}, "textBorderRadiusTopLeft": {"value": "0", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "30px", "source": "static"}, "textBorderRadiusTopRight": {"value": "0", "source": "static"}, "imageBorderRadiusTopRight": {"value": "30px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "30px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "30px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "30px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "30px", "source": "static"}}', true)
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
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "Gaming", "source": "static"}, "color": {"value": "#333333", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[17] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": true, "source": "static"}, "fontSize": {"value": "16px", "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "show-arrow", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "500", "source": "static"}, "imageHover": {"value": "zoom", "source": "static"}, "animationIn": {"value": "none", "source": "static"}, "displayMode": {"value": "stretch", "source": "static"}, "textMargins": {"value": true, "source": "static"}, "animationOut": {"value": "none", "source": "static"}, "overlayColor": {"value": "#afafaf", "source": "static"}, "textMaxWidth": {"value": "", "source": "static"}, "textMinWidth": {"value": "100%", "source": "static"}, "textPaddings": {"value": true, "source": "static"}, "customClasses": {"value": "cms-element-shadow-smooth-lg", "source": "static"}, "textMarginTop": {"value": "0", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}, "backgroundBlur": {"value": "10px", "source": "static"}, "overlayOpacity": {"value": "10%", "source": "static"}, "textMarginLeft": {"value": "0", "source": "static"}, "textPaddingTop": {"value": "20px", "source": "static"}, "backgroundColor": {"value": "#ffffff00", "source": "static"}, "horizontalAlign": {"value": "center", "source": "static"}, "textMarginRight": {"value": "0", "source": "static"}, "textPaddingLeft": {"value": "20px", "source": "static"}, "textBorderRadius": {"value": true, "source": "static"}, "textMarginBottom": {"value": "0", "source": "static"}, "textPaddingRight": {"value": "20px", "source": "static"}, "imageBorderRadius": {"value": true, "source": "static"}, "textPaddingBottom": {"value": "20px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": "center", "source": "static"}, "horizontalTextAlign": {"value": "center", "source": "static"}, "horizontalImageAlign": {"value": "center", "source": "static"}, "textBorderRadiusTopLeft": {"value": "0", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "30px", "source": "static"}, "textBorderRadiusTopRight": {"value": "0", "source": "static"}, "imageBorderRadiusTopRight": {"value": "30px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "30px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "30px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "30px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "30px", "source": "static"}}', true)
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
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "Sports Fashion", "source": "static"}, "color": {"value": "#ffffff", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[18] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "16px", "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "show-arrow", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "500", "source": "static"}, "imageHover": {"value": "zoom", "source": "static"}, "animationIn": {"value": "none", "source": "static"}, "displayMode": {"value": "stretch", "source": "static"}, "textMargins": {"value": true, "source": "static"}, "animationOut": {"value": "none", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "", "source": "static"}, "textMinWidth": {"value": "100%", "source": "static"}, "textPaddings": {"value": true, "source": "static"}, "customClasses": {"value": "cms-element-shadow-smooth-lg", "source": "static"}, "textMarginTop": {"value": "0", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}, "backgroundBlur": {"value": "10px", "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "0", "source": "static"}, "textPaddingTop": {"value": "20px", "source": "static"}, "backgroundColor": {"value": "#ffffff00", "source": "static"}, "horizontalAlign": {"value": "center", "source": "static"}, "textMarginRight": {"value": "0", "source": "static"}, "textPaddingLeft": {"value": "20px", "source": "static"}, "textBorderRadius": {"value": true, "source": "static"}, "textMarginBottom": {"value": "0", "source": "static"}, "textPaddingRight": {"value": "20px", "source": "static"}, "imageBorderRadius": {"value": true, "source": "static"}, "textPaddingBottom": {"value": "20px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": "center", "source": "static"}, "horizontalTextAlign": {"value": "center", "source": "static"}, "horizontalImageAlign": {"value": "center", "source": "static"}, "textBorderRadiusTopLeft": {"value": "0", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "30px", "source": "static"}, "textBorderRadiusTopRight": {"value": "0", "source": "static"}, "imageBorderRadiusTopRight": {"value": "30px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "30px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "30px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "30px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "30px", "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'zen-teaser',
                                        'slot' => 'col4',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "Drones", "source": "static"}, "color": {"value": "#ffffff", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[19] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "16px", "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "show-arrow", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "500", "source": "static"}, "imageHover": {"value": "zoom", "source": "static"}, "animationIn": {"value": "none", "source": "static"}, "displayMode": {"value": "stretch", "source": "static"}, "textMargins": {"value": true, "source": "static"}, "animationOut": {"value": "none", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "", "source": "static"}, "textMinWidth": {"value": "100%", "source": "static"}, "textPaddings": {"value": true, "source": "static"}, "customClasses": {"value": "cms-element-shadow-smooth-lg", "source": "static"}, "textMarginTop": {"value": "0", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}, "backgroundBlur": {"value": "10px", "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "0", "source": "static"}, "textPaddingTop": {"value": "20px", "source": "static"}, "backgroundColor": {"value": "#ffffff00", "source": "static"}, "horizontalAlign": {"value": "center", "source": "static"}, "textMarginRight": {"value": "0", "source": "static"}, "textPaddingLeft": {"value": "20px", "source": "static"}, "textBorderRadius": {"value": true, "source": "static"}, "textMarginBottom": {"value": "0", "source": "static"}, "textPaddingRight": {"value": "20px", "source": "static"}, "imageBorderRadius": {"value": true, "source": "static"}, "textPaddingBottom": {"value": "20px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": "center", "source": "static"}, "horizontalTextAlign": {"value": "flex-start", "source": "static"}, "horizontalImageAlign": {"value": "center", "source": "static"}, "textBorderRadiusTopLeft": {"value": "0", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "30px", "source": "static"}, "textBorderRadiusTopRight": {"value": "0", "source": "static"}, "imageBorderRadiusTopRight": {"value": "30px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "30px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "30px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "30px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "30px", "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'zen-teaser',
                                        'slot' => 'col5',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "Food & Health", "source": "static"}, "color": {"value": "#333333", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[20] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": true, "source": "static"}, "fontSize": {"value": "16px", "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "show-arrow", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "500", "source": "static"}, "imageHover": {"value": "zoom", "source": "static"}, "animationIn": {"value": "none", "source": "static"}, "displayMode": {"value": "stretch", "source": "static"}, "textMargins": {"value": true, "source": "static"}, "animationOut": {"value": "none", "source": "static"}, "overlayColor": {"value": "#c4c8cd", "source": "static"}, "textMaxWidth": {"value": "", "source": "static"}, "textMinWidth": {"value": "100%", "source": "static"}, "textPaddings": {"value": true, "source": "static"}, "customClasses": {"value": "cms-element-shadow-smooth-lg", "source": "static"}, "textMarginTop": {"value": "0", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}, "backgroundBlur": {"value": "10px", "source": "static"}, "overlayOpacity": {"value": "10%", "source": "static"}, "textMarginLeft": {"value": "0", "source": "static"}, "textPaddingTop": {"value": "20px", "source": "static"}, "backgroundColor": {"value": "#ffffff00", "source": "static"}, "horizontalAlign": {"value": "center", "source": "static"}, "textMarginRight": {"value": "0", "source": "static"}, "textPaddingLeft": {"value": "20px", "source": "static"}, "textBorderRadius": {"value": true, "source": "static"}, "textMarginBottom": {"value": "0", "source": "static"}, "textPaddingRight": {"value": "20px", "source": "static"}, "imageBorderRadius": {"value": true, "source": "static"}, "textPaddingBottom": {"value": "20px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": "center", "source": "static"}, "horizontalTextAlign": {"value": "center", "source": "static"}, "horizontalImageAlign": {"value": "center", "source": "static"}, "textBorderRadiusTopLeft": {"value": "0", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "30px", "source": "static"}, "textBorderRadiusTopRight": {"value": "0", "source": "static"}, "imageBorderRadiusTopRight": {"value": "30px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "30px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "30px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "30px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "30px", "source": "static"}}', true)
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
                                                'config' => json_decode('{"content": {"value": "<h2 style=\"text-align:center;\">Featured Products</h2>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
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
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "20px",
                                'marginBottom' => "100px",
                                'marginLeft' => "20px",
                                'marginRight' => "20px",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'product-slider',
                                        'slot' => 'productSlider',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"title": {"value": "", "source": "static"}, "border": {"value": false, "source": "static"}, "rotate": {"value": false, "source": "static"}, "products": {"value": ' . $this->limitedProducts(7) . ', "source": "static"}, "boxLayout": {"value": "minimal", "source": "static"}, "elMinWidth": {"value": "300px", "source": "static"}, "navigation": {"value": true, "source": "static"}, "displayMode": {"value": "standard", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}, "productStreamLimit": {"value": 20, "source": "static"}, "productStreamSorting": {"value": "createdAt:DESC", "source": "static"}}', true)
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
                        'backgroundColor' => '#0e0e0f',
                        'type' => 'default',
                        'blocks' => [
                            [
                                'position' => 0,
                                'type' => 'zen-layout-simple-4-8-reversed',
                                'locked' => 0,
                                'cssClass' => 'zen-animate slide-in-blurred-bottom',
                                'customFields' => ["zenit_grid_gap" => "20px"],
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "150px",
                                'marginBottom' => "150px",
                                'marginLeft' => "auto",
                                'marginRight' => "auto",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'text',
                                        'slot' => 'left',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"content": {"value": "<h2 class=\"display-6 fw-semibold\"><font color=\"#ffffff\">Become a customer and benefit from great advantages!</font></h2>\n                <p><font color=\"#ffffff\">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, \n                sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, \n                sed diam voluptua.</font></p><br />\n                <a href=\"/demo-2/account/login\" class=\"btn btn-secondary\">Become a customer</a>  \n                <a href=\"/demo-2/account/login\" class=\"btn btn-light\">Login</a>", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'image',
                                        'slot' => 'right-top',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": null, "source": "static"}, "media": {"value": "' . self::$cmsImageIds[21] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "displayMode": {"value": "standard", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}, "horizontalAlign": {"value": "center", "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'zen-features',
                                        'slot' => 'right-bottom',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"feature1": {"value": "Discount prices", "source": "static"}, "feature2": {"value": "Priority shipping", "source": "static"}, "feature3": {"value": "Free returns", "source": "static"}, "feature4": {"value": "", "source": "static"}, "fontSize": {"value": "20px", "source": "static"}, "iconSize": {"value": "36px", "source": "static"}, "alignment": {"value": "center", "source": "static"}, "iconColor": {"value": "var(--zen-color-brand-secondary)", "source": "static"}, "textColor": {"value": "#ffffff", "source": "static"}, "appearance": {"value": "iconsLeft", "source": "static"}, "fontFamily": {"value": "headline", "source": "static"}, "fontWeight": {"value": "600", "source": "static"}, "feature1Icon": {"value": "heart", "source": "static"}, "feature2Icon": {"value": "rocket", "source": "static"}, "feature3Icon": {"value": "arrow-360-left", "source": "static"}, "feature4Icon": {"value": "checkmark", "source": "static"}, "textAlignment": {"value": "center", "source": "static"}, "customClasses": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ]
                                ]
                            ],
                            [
                                'position' => 1,
                                'type' => 'zen-grid-2-2-2-2-2-2',
                                'locked' => 0,
                                'cssClass' => 'zen-animate slide-in-blurred-bottom',
                                'customFields' => ["zenit_grid_gap" => "20px"],
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "10px",
                                'marginBottom' => "10px",
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
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "Fashion", "source": "static"}, "color": {"value": "#ffffff", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[22] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "16px", "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "show-arrow", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "500", "source": "static"}, "imageHover": {"value": "zoom", "source": "static"}, "animationIn": {"value": "none", "source": "static"}, "displayMode": {"value": "stretch", "source": "static"}, "textMargins": {"value": true, "source": "static"}, "animationOut": {"value": "none", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "", "source": "static"}, "textMinWidth": {"value": "100%", "source": "static"}, "textPaddings": {"value": true, "source": "static"}, "customClasses": {"value": "", "source": "static"}, "textMarginTop": {"value": "0", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}, "backgroundBlur": {"value": "10px", "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "0", "source": "static"}, "textPaddingTop": {"value": "20px", "source": "static"}, "backgroundColor": {"value": "#ffffff00", "source": "static"}, "horizontalAlign": {"value": "center", "source": "static"}, "textMarginRight": {"value": "0", "source": "static"}, "textPaddingLeft": {"value": "20px", "source": "static"}, "textBorderRadius": {"value": true, "source": "static"}, "textMarginBottom": {"value": "0", "source": "static"}, "textPaddingRight": {"value": "20px", "source": "static"}, "imageBorderRadius": {"value": true, "source": "static"}, "textPaddingBottom": {"value": "20px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": "center", "source": "static"}, "horizontalTextAlign": {"value": "center", "source": "static"}, "horizontalImageAlign": {"value": "center", "source": "static"}, "textBorderRadiusTopLeft": {"value": "0", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "30px", "source": "static"}, "textBorderRadiusTopRight": {"value": "0", "source": "static"}, "imageBorderRadiusTopRight": {"value": "30px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "30px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "30px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "30px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "30px", "source": "static"}}', true)
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
                                                'config' => json_decode('{"url": {"value": null, "source": "static"}, "text": {"value": "Lamps & Lights", "source": "static"}, "color": {"value": "#ffffff", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[23] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "16px", "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "show-arrow", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "500", "source": "static"}, "imageHover": {"value": "zoom", "source": "static"}, "animationIn": {"value": "none", "source": "static"}, "displayMode": {"value": "stretch", "source": "static"}, "textMargins": {"value": true, "source": "static"}, "animationOut": {"value": "none", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "", "source": "static"}, "textMinWidth": {"value": "100%", "source": "static"}, "textPaddings": {"value": true, "source": "static"}, "customClasses": {"value": "", "source": "static"}, "textMarginTop": {"value": "0", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}, "backgroundBlur": {"value": "10px", "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "0", "source": "static"}, "textPaddingTop": {"value": "20px", "source": "static"}, "backgroundColor": {"value": "#ffffff00", "source": "static"}, "horizontalAlign": {"value": "center", "source": "static"}, "textMarginRight": {"value": "0", "source": "static"}, "textPaddingLeft": {"value": "20px", "source": "static"}, "textBorderRadius": {"value": true, "source": "static"}, "textMarginBottom": {"value": "0", "source": "static"}, "textPaddingRight": {"value": "20px", "source": "static"}, "imageBorderRadius": {"value": true, "source": "static"}, "textPaddingBottom": {"value": "20px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": "center", "source": "static"}, "horizontalTextAlign": {"value": "center", "source": "static"}, "horizontalImageAlign": {"value": "center", "source": "static"}, "textBorderRadiusTopLeft": {"value": "0", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "30px", "source": "static"}, "textBorderRadiusTopRight": {"value": "0", "source": "static"}, "imageBorderRadiusTopRight": {"value": "30px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "30px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "30px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "30px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "30px", "source": "static"}}', true)
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
                                                'config' => json_decode('{"url": {"value": null, "source": "static"}, "text": {"value": "Snowboard & Ski", "source": "static"}, "color": {"value": "#ffffff", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[24] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "16px", "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "show-arrow", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "500", "source": "static"}, "imageHover": {"value": "zoom", "source": "static"}, "animationIn": {"value": "none", "source": "static"}, "displayMode": {"value": "stretch", "source": "static"}, "textMargins": {"value": true, "source": "static"}, "animationOut": {"value": "none", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "", "source": "static"}, "textMinWidth": {"value": "100%", "source": "static"}, "textPaddings": {"value": true, "source": "static"}, "customClasses": {"value": "", "source": "static"}, "textMarginTop": {"value": "0", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}, "backgroundBlur": {"value": "10px", "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "0", "source": "static"}, "textPaddingTop": {"value": "20px", "source": "static"}, "backgroundColor": {"value": "#ffffff00", "source": "static"}, "horizontalAlign": {"value": "center", "source": "static"}, "textMarginRight": {"value": "0", "source": "static"}, "textPaddingLeft": {"value": "20px", "source": "static"}, "textBorderRadius": {"value": true, "source": "static"}, "textMarginBottom": {"value": "0", "source": "static"}, "textPaddingRight": {"value": "20px", "source": "static"}, "imageBorderRadius": {"value": true, "source": "static"}, "textPaddingBottom": {"value": "20px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": "center", "source": "static"}, "horizontalTextAlign": {"value": "center", "source": "static"}, "horizontalImageAlign": {"value": "center", "source": "static"}, "textBorderRadiusTopLeft": {"value": "0", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "30px", "source": "static"}, "textBorderRadiusTopRight": {"value": "0", "source": "static"}, "imageBorderRadiusTopRight": {"value": "30px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "30px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "30px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "30px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "30px", "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'zen-teaser',
                                        'slot' => 'col4',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "Sports", "source": "static"}, "color": {"value": "#ffffff", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[25] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "16px", "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "show-arrow", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "500", "source": "static"}, "imageHover": {"value": "zoom", "source": "static"}, "animationIn": {"value": "none", "source": "static"}, "displayMode": {"value": "stretch", "source": "static"}, "textMargins": {"value": true, "source": "static"}, "animationOut": {"value": "none", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "", "source": "static"}, "textMinWidth": {"value": "100%", "source": "static"}, "textPaddings": {"value": true, "source": "static"}, "customClasses": {"value": "", "source": "static"}, "textMarginTop": {"value": "0", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}, "backgroundBlur": {"value": "10px", "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "0", "source": "static"}, "textPaddingTop": {"value": "20px", "source": "static"}, "backgroundColor": {"value": "#ffffff00", "source": "static"}, "horizontalAlign": {"value": "center", "source": "static"}, "textMarginRight": {"value": "0", "source": "static"}, "textPaddingLeft": {"value": "20px", "source": "static"}, "textBorderRadius": {"value": true, "source": "static"}, "textMarginBottom": {"value": "0", "source": "static"}, "textPaddingRight": {"value": "20px", "source": "static"}, "imageBorderRadius": {"value": true, "source": "static"}, "textPaddingBottom": {"value": "20px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": "center", "source": "static"}, "horizontalTextAlign": {"value": "center", "source": "static"}, "horizontalImageAlign": {"value": "center", "source": "static"}, "textBorderRadiusTopLeft": {"value": "0", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "30px", "source": "static"}, "textBorderRadiusTopRight": {"value": "0", "source": "static"}, "imageBorderRadiusTopRight": {"value": "30px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "30px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "30px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "30px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "30px", "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'zen-teaser',
                                        'slot' => 'col5',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "Speakers", "source": "static"}, "color": {"value": "#ffffff", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[26] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "16px", "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "show-arrow", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "500", "source": "static"}, "imageHover": {"value": "zoom", "source": "static"}, "animationIn": {"value": "none", "source": "static"}, "displayMode": {"value": "stretch", "source": "static"}, "textMargins": {"value": true, "source": "static"}, "animationOut": {"value": "none", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "", "source": "static"}, "textMinWidth": {"value": "100%", "source": "static"}, "textPaddings": {"value": true, "source": "static"}, "customClasses": {"value": "", "source": "static"}, "textMarginTop": {"value": "0", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}, "backgroundBlur": {"value": "10px", "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "0", "source": "static"}, "textPaddingTop": {"value": "20px", "source": "static"}, "backgroundColor": {"value": "#ffffff00", "source": "static"}, "horizontalAlign": {"value": "center", "source": "static"}, "textMarginRight": {"value": "0", "source": "static"}, "textPaddingLeft": {"value": "20px", "source": "static"}, "textBorderRadius": {"value": true, "source": "static"}, "textMarginBottom": {"value": "0", "source": "static"}, "textPaddingRight": {"value": "20px", "source": "static"}, "imageBorderRadius": {"value": true, "source": "static"}, "textPaddingBottom": {"value": "20px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": "center", "source": "static"}, "horizontalTextAlign": {"value": "center", "source": "static"}, "horizontalImageAlign": {"value": "center", "source": "static"}, "textBorderRadiusTopLeft": {"value": "0", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "30px", "source": "static"}, "textBorderRadiusTopRight": {"value": "0", "source": "static"}, "imageBorderRadiusTopRight": {"value": "30px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "30px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "30px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "30px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "30px", "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'zen-teaser',
                                        'slot' => 'col6',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "Shoes", "source": "static"}, "color": {"value": "#ffffff", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[27] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "16px", "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "show-arrow", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "500", "source": "static"}, "imageHover": {"value": "zoom", "source": "static"}, "animationIn": {"value": "none", "source": "static"}, "displayMode": {"value": "stretch", "source": "static"}, "textMargins": {"value": true, "source": "static"}, "animationOut": {"value": "none", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "", "source": "static"}, "textMinWidth": {"value": "100%", "source": "static"}, "textPaddings": {"value": true, "source": "static"}, "customClasses": {"value": "", "source": "static"}, "textMarginTop": {"value": "0", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}, "backgroundBlur": {"value": "10px", "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "0", "source": "static"}, "textPaddingTop": {"value": "20px", "source": "static"}, "backgroundColor": {"value": "#ffffff00", "source": "static"}, "horizontalAlign": {"value": "center", "source": "static"}, "textMarginRight": {"value": "0", "source": "static"}, "textPaddingLeft": {"value": "20px", "source": "static"}, "textBorderRadius": {"value": true, "source": "static"}, "textMarginBottom": {"value": "0", "source": "static"}, "textPaddingRight": {"value": "20px", "source": "static"}, "imageBorderRadius": {"value": true, "source": "static"}, "textPaddingBottom": {"value": "20px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": "center", "source": "static"}, "horizontalTextAlign": {"value": "center", "source": "static"}, "horizontalImageAlign": {"value": "center", "source": "static"}, "textBorderRadiusTopLeft": {"value": "0", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "30px", "source": "static"}, "textBorderRadiusTopRight": {"value": "0", "source": "static"}, "imageBorderRadiusTopRight": {"value": "30px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "30px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "30px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "30px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "30px", "source": "static"}}', true)
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
                                'customFields' => ["zenit_grid_gap" => "20px"],
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "10px",
                                'marginBottom' => "10px",
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
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "Fashion Trends", "source": "static"}, "color": {"value": "#ffffff", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[28] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "16px", "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "show-arrow", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "500", "source": "static"}, "imageHover": {"value": "zoom", "source": "static"}, "animationIn": {"value": "none", "source": "static"}, "displayMode": {"value": "stretch", "source": "static"}, "textMargins": {"value": true, "source": "static"}, "animationOut": {"value": "none", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "", "source": "static"}, "textMinWidth": {"value": "100%", "source": "static"}, "textPaddings": {"value": true, "source": "static"}, "customClasses": {"value": "", "source": "static"}, "textMarginTop": {"value": "0", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}, "backgroundBlur": {"value": "10px", "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "0", "source": "static"}, "textPaddingTop": {"value": "20px", "source": "static"}, "backgroundColor": {"value": "#0000001a", "source": "static"}, "horizontalAlign": {"value": "center", "source": "static"}, "textMarginRight": {"value": "0", "source": "static"}, "textPaddingLeft": {"value": "20px", "source": "static"}, "textBorderRadius": {"value": true, "source": "static"}, "textMarginBottom": {"value": "0", "source": "static"}, "textPaddingRight": {"value": "20px", "source": "static"}, "imageBorderRadius": {"value": true, "source": "static"}, "textPaddingBottom": {"value": "20px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": "center", "source": "static"}, "horizontalTextAlign": {"value": "center", "source": "static"}, "horizontalImageAlign": {"value": "center", "source": "static"}, "textBorderRadiusTopLeft": {"value": "0", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "30px", "source": "static"}, "textBorderRadiusTopRight": {"value": "0", "source": "static"}, "imageBorderRadiusTopRight": {"value": "30px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "30px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "30px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "30px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "30px", "source": "static"}}', true)
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
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "Wine & Drinks", "source": "static"}, "color": {"value": "#ffffff", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[29] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "16px", "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "show-arrow", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "500", "source": "static"}, "imageHover": {"value": "zoom", "source": "static"}, "animationIn": {"value": "none", "source": "static"}, "displayMode": {"value": "stretch", "source": "static"}, "textMargins": {"value": true, "source": "static"}, "animationOut": {"value": "none", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "", "source": "static"}, "textMinWidth": {"value": "100%", "source": "static"}, "textPaddings": {"value": true, "source": "static"}, "customClasses": {"value": "", "source": "static"}, "textMarginTop": {"value": "0", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}, "backgroundBlur": {"value": "10px", "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "0", "source": "static"}, "textPaddingTop": {"value": "20px", "source": "static"}, "backgroundColor": {"value": "#ffffff00", "source": "static"}, "horizontalAlign": {"value": "center", "source": "static"}, "textMarginRight": {"value": "0", "source": "static"}, "textPaddingLeft": {"value": "20px", "source": "static"}, "textBorderRadius": {"value": true, "source": "static"}, "textMarginBottom": {"value": "0", "source": "static"}, "textPaddingRight": {"value": "20px", "source": "static"}, "imageBorderRadius": {"value": true, "source": "static"}, "textPaddingBottom": {"value": "20px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": "center", "source": "static"}, "horizontalTextAlign": {"value": "center", "source": "static"}, "horizontalImageAlign": {"value": "center", "source": "static"}, "textBorderRadiusTopLeft": {"value": "0", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "30px", "source": "static"}, "textBorderRadiusTopRight": {"value": "0", "source": "static"}, "imageBorderRadiusTopRight": {"value": "30px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "30px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "30px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "30px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "30px", "source": "static"}}', true)
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
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "Food", "source": "static"}, "color": {"value": "#ffffff", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[30] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "16px", "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "show-arrow", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "500", "source": "static"}, "imageHover": {"value": "zoom", "source": "static"}, "animationIn": {"value": "none", "source": "static"}, "displayMode": {"value": "stretch", "source": "static"}, "textMargins": {"value": true, "source": "static"}, "animationOut": {"value": "none", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "0", "source": "static"}, "textMinWidth": {"value": "100%", "source": "static"}, "textPaddings": {"value": true, "source": "static"}, "customClasses": {"value": "", "source": "static"}, "textMarginTop": {"value": "0", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}, "backgroundBlur": {"value": "10px", "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "0", "source": "static"}, "textPaddingTop": {"value": "20px", "source": "static"}, "backgroundColor": {"value": "#ffffff00", "source": "static"}, "horizontalAlign": {"value": "center", "source": "static"}, "textMarginRight": {"value": "0", "source": "static"}, "textPaddingLeft": {"value": "20px", "source": "static"}, "textBorderRadius": {"value": true, "source": "static"}, "textMarginBottom": {"value": "0", "source": "static"}, "textPaddingRight": {"value": "20px", "source": "static"}, "imageBorderRadius": {"value": true, "source": "static"}, "textPaddingBottom": {"value": "20px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": "center", "source": "static"}, "horizontalTextAlign": {"value": "center", "source": "static"}, "horizontalImageAlign": {"value": "center", "source": "static"}, "textBorderRadiusTopLeft": {"value": "0", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "30px", "source": "static"}, "textBorderRadiusTopRight": {"value": "0", "source": "static"}, "imageBorderRadiusTopRight": {"value": "30px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "30px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "30px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "30px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "30px", "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'zen-teaser',
                                        'slot' => 'col4',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": null, "source": "static"}, "text": {"value": "Sports Fashion", "source": "static"}, "color": {"value": "#ffffff", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[31] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "16px", "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "show-arrow", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "500", "source": "static"}, "imageHover": {"value": "zoom", "source": "static"}, "animationIn": {"value": "none", "source": "static"}, "displayMode": {"value": "stretch", "source": "static"}, "textMargins": {"value": true, "source": "static"}, "animationOut": {"value": "none", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "", "source": "static"}, "textMinWidth": {"value": "100%", "source": "static"}, "textPaddings": {"value": true, "source": "static"}, "customClasses": {"value": "", "source": "static"}, "textMarginTop": {"value": "0", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}, "backgroundBlur": {"value": "10px", "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "0", "source": "static"}, "textPaddingTop": {"value": "20px", "source": "static"}, "backgroundColor": {"value": "#ffffff00", "source": "static"}, "horizontalAlign": {"value": "center", "source": "static"}, "textMarginRight": {"value": "0", "source": "static"}, "textPaddingLeft": {"value": "20px", "source": "static"}, "textBorderRadius": {"value": true, "source": "static"}, "textMarginBottom": {"value": "0", "source": "static"}, "textPaddingRight": {"value": "20px", "source": "static"}, "imageBorderRadius": {"value": true, "source": "static"}, "textPaddingBottom": {"value": "20px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": "center", "source": "static"}, "horizontalTextAlign": {"value": "center", "source": "static"}, "horizontalImageAlign": {"value": "center", "source": "static"}, "textBorderRadiusTopLeft": {"value": "0", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "30px", "source": "static"}, "textBorderRadiusTopRight": {"value": "0", "source": "static"}, "imageBorderRadiusTopRight": {"value": "30px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "30px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "30px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "30px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "30px", "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'zen-teaser',
                                        'slot' => 'col5',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "Home & Living", "source": "static"}, "color": {"value": "#ffffff", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[32] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "16px", "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "show-arrow", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "500", "source": "static"}, "imageHover": {"value": "zoom", "source": "static"}, "animationIn": {"value": "none", "source": "static"}, "displayMode": {"value": "stretch", "source": "static"}, "textMargins": {"value": true, "source": "static"}, "animationOut": {"value": "none", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "", "source": "static"}, "textMinWidth": {"value": "100%", "source": "static"}, "textPaddings": {"value": true, "source": "static"}, "customClasses": {"value": "", "source": "static"}, "textMarginTop": {"value": "0", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}, "backgroundBlur": {"value": "10px", "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "0", "source": "static"}, "textPaddingTop": {"value": "20px", "source": "static"}, "backgroundColor": {"value": "#ffffff00", "source": "static"}, "horizontalAlign": {"value": "center", "source": "static"}, "textMarginRight": {"value": "0", "source": "static"}, "textPaddingLeft": {"value": "20px", "source": "static"}, "textBorderRadius": {"value": true, "source": "static"}, "textMarginBottom": {"value": "0", "source": "static"}, "textPaddingRight": {"value": "20px", "source": "static"}, "imageBorderRadius": {"value": true, "source": "static"}, "textPaddingBottom": {"value": "20px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": "center", "source": "static"}, "horizontalTextAlign": {"value": "center", "source": "static"}, "horizontalImageAlign": {"value": "center", "source": "static"}, "textBorderRadiusTopLeft": {"value": "0", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "30px", "source": "static"}, "textBorderRadiusTopRight": {"value": "0", "source": "static"}, "imageBorderRadiusTopRight": {"value": "30px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "30px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "30px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "30px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "30px", "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'zen-teaser',
                                        'slot' => 'col6',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"url": {"value": "#demo-link", "source": "static"}, "text": {"value": "Smartwatches", "source": "static"}, "color": {"value": "#ffffff", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[33] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "fontSize": {"value": "16px", "source": "static"}, "minHeight": {"value": "340px", "source": "static"}, "textAlign": {"value": "center", "source": "static"}, "textHover": {"value": "show-arrow", "source": "static"}, "fontFamily": {"value": "base", "source": "static"}, "fontWeight": {"value": "500", "source": "static"}, "imageHover": {"value": "zoom", "source": "static"}, "animationIn": {"value": "none", "source": "static"}, "displayMode": {"value": "stretch", "source": "static"}, "textMargins": {"value": true, "source": "static"}, "animationOut": {"value": "none", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "textMaxWidth": {"value": "", "source": "static"}, "textMinWidth": {"value": "100%", "source": "static"}, "textPaddings": {"value": true, "source": "static"}, "customClasses": {"value": "", "source": "static"}, "textMarginTop": {"value": "0", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}, "backgroundBlur": {"value": "10px", "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "textMarginLeft": {"value": "0", "source": "static"}, "textPaddingTop": {"value": "20px", "source": "static"}, "backgroundColor": {"value": "#ffffff00", "source": "static"}, "horizontalAlign": {"value": "center", "source": "static"}, "textMarginRight": {"value": "0", "source": "static"}, "textPaddingLeft": {"value": "20px", "source": "static"}, "textBorderRadius": {"value": true, "source": "static"}, "textMarginBottom": {"value": "0", "source": "static"}, "textPaddingRight": {"value": "20px", "source": "static"}, "imageBorderRadius": {"value": true, "source": "static"}, "textPaddingBottom": {"value": "20px", "source": "static"}, "verticalTextAlign": {"value": "flex-end", "source": "static"}, "verticalImageAlign": {"value": "center", "source": "static"}, "horizontalTextAlign": {"value": "center", "source": "static"}, "horizontalImageAlign": {"value": "center", "source": "static"}, "textBorderRadiusTopLeft": {"value": "0", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "30px", "source": "static"}, "textBorderRadiusTopRight": {"value": "0", "source": "static"}, "imageBorderRadiusTopRight": {"value": "30px", "source": "static"}, "textBorderRadiusBottomLeft": {"value": "30px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "30px", "source": "static"}, "textBorderRadiusBottomRight": {"value": "30px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "30px", "source": "static"}}', true)
                                            ]
                                        ])
                                    ]
                                ]
                            ],
                            [
                                'position' => 3,
                                'type' => 'text-teaser',
                                'locked' => 0,
                                'cssClass' => 'zen-animate slide-in-blurred-bottom',
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
                                                'config' => json_decode('{"content": {"value": "<div style=\"text-align:center;\"><a class=\"btn btn-light\" href=\"#demo-link\">Display all featured</a></div>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
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
                        'backgroundColor' => '#efedeb',
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
                                                'config' => json_decode('{"content": {"value": "<h2 style=\"text-align:center;\">% Sale</h2>", "source": "static"}, "verticalAlign": {"value": null, "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                ]
                            ],
                            [
                                'position' => 1,
                                'type' => 'product-slider',
                                'locked' => 0,
                                'cssClass' => 'zen-animate slide-in-blurred-bottom',
                                'backgroundMediaMode' => 'cover',
                                'marginTop' => "20px",
                                'marginBottom' => "100px",
                                'marginLeft' => "20px",
                                'marginRight' => "20px",
                                'slots' => [
                                    [
                                        'id' => Uuid::randomHex(),
                                        'type' => 'product-slider',
                                        'slot' => 'productSlider',
                                        'locked' => 0,
                                        'translations' => $this->translationHelper->adjustTranslations([
                                            'de-DE' => [
                                                'config' => json_decode('{"title": {"value": "", "source": "static"}, "border": {"value": false, "source": "static"}, "rotate": {"value": false, "source": "static"}, "products": {"value": ' . $this->limitedProducts(7) . ', "source": "static"}, "boxLayout": {"value": "minimal", "source": "static"}, "elMinWidth": {"value": "300px", "source": "static"}, "navigation": {"value": true, "source": "static"}, "displayMode": {"value": "standard", "source": "static"}, "verticalAlign": {"value": "center", "source": "static"}, "productStreamLimit": {"value": 20, "source": "static"}, "productStreamSorting": {"value": "name:DESC", "source": "static"}}', true)
                                            ]
                                        ])
                                    ],
                                ]
                            ]
                        ]
                    ],
                    [
                        'id' => Uuid::randomHex(),
                        'position' => 6,
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
                                                'config' => json_decode('{"url": {"value": null, "source": "static"}, "text": {"value": "<h3 class=\"h4\" style=\"text-align:center;\">\n    <font color=\"#0e0e0e\">Stay inspired with Zenit Design Themes</font>\n</h3><div><font color=\"#0e0e0e\"><br /></font></div>\n<h4 class=\"fs-6\" style=\"text-align:center;\">\n    <font color=\"#0e0e0e\">Lorem ipsum dolor sit amet, consetetur sadipscing elitr,\n        sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,\n        sed diam voluptua.</font>\n</h4><p style=\"text-align:center;\"><font color=\"#0e0e0e\"><br /></font></p>\n<div style=\"text-align:center;\">\n    <a href=\"https://themedocs.zenit.design/\" class=\"btn btn-primary\" target=\"_blank\" rel=\"noreferrer noopener\">Go to documentation</a>\n    <a href=\"https://store.shopware.com/detail/index/sArticle/518777\" class=\"btn btn-outline-primary\" target=\"_blank\" rel=\"noreferrer noopener\">Buy Theme</a>\n</div>", "source": "static"}, "media": {"value": "' . self::$cmsImageIds[34] . '", "source": "static"}, "newTab": {"value": false, "source": "static"}, "overlay": {"value": false, "source": "static"}, "minHeight": {"value": "80vh", "source": "static"}, "textColor": {"value": "#ffffff", "source": "static"}, "textScale": {"value": true, "source": "static"}, "imageHover": {"value": "none", "source": "static"}, "animationIn": {"value": "none", "source": "static"}, "displayMode": {"value": "cover", "source": "static"}, "animationOut": {"value": "none", "source": "static"}, "overlayColor": {"value": "#000000", "source": "static"}, "customClasses": {"value": null, "source": "static"}, "headlineScale": {"value": true, "source": "static"}, "verticalAlign": {"value": null, "source": "static"}, "backgroundBlur": {"value": "4px", "source": "static"}, "contentMargins": {"value": true, "source": "static"}, "overlayOpacity": {"value": "50%", "source": "static"}, "backgroundColor": {"value": "transparent", "source": "static"}, "contentMaxWidth": {"value": "680px", "source": "static"}, "contentMinWidth": {"value": null, "source": "static"}, "contentPaddings": {"value": true, "source": "static"}, "horizontalAlign": {"value": null, "source": "static"}, "contentMarginTop": {"value": "100px", "source": "static"}, "contentMarginLeft": {"value": "20px", "source": "static"}, "contentPaddingTop": {"value": "36px", "source": "static"}, "imageBorderRadius": {"value": false, "source": "static"}, "contentMarginRight": {"value": "20px", "source": "static"}, "contentPaddingLeft": {"value": "40px", "source": "static"}, "verticalImageAlign": {"value": "top", "source": "static"}, "contentBorderRadius": {"value": true, "source": "static"}, "contentMarginBottom": {"value": "20px", "source": "static"}, "contentPaddingRight": {"value": "40px", "source": "static"}, "contentPaddingBottom": {"value": "36px", "source": "static"}, "horizontalImageAlign": {"value": "center", "source": "static"}, "verticalContentAlign": {"value": "flex-start", "source": "static"}, "horizontalContentAlign": {"value": "center", "source": "static"}, "imageBorderRadiusTopLeft": {"value": "6px", "source": "static"}, "imageBorderRadiusTopRight": {"value": "6px", "source": "static"}, "contentBorderRadiusTopLeft": {"value": "40px", "source": "static"}, "contentBorderRadiusTopRight": {"value": "40px", "source": "static"}, "imageBorderRadiusBottomLeft": {"value": "6px", "source": "static"}, "imageBorderRadiusBottomRight": {"value": "6px", "source": "static"}, "contentBorderRadiusBottomLeft": {"value": "40px", "source": "static"}, "contentBorderRadiusBottomRight": {"value": "40px", "source": "static"}}', true)
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
}