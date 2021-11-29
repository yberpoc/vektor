<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 * @var string $templateFolder
 */

$this->setFrameMode(true);
$this->addExternalCss('/bitrix/css/main/bootstrap.css');

$templateLibrary = array('popup', 'fx');
$currencyList = '';

if (!empty($arResult['CURRENCIES']))
{
	$templateLibrary[] = 'currency';
	$currencyList = CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true);
}

$templateData = array(
	'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
	'TEMPLATE_LIBRARY' => $templateLibrary,
	'CURRENCIES' => $currencyList,
	'ITEM' => array(
		'ID' => $arResult['ID'],
		'IBLOCK_ID' => $arResult['IBLOCK_ID'],
		'OFFERS_SELECTED' => $arResult['OFFERS_SELECTED'],
		'JS_OFFERS' => $arResult['JS_OFFERS']
	)
);
unset($currencyList, $templateLibrary);

$mainId = $this->GetEditAreaId($arResult['ID']);
$itemIds = array(
	'ID' => $mainId,
	'DISCOUNT_PERCENT_ID' => $mainId.'_dsc_pict',
	'STICKER_ID' => $mainId.'_sticker',
	'BIG_SLIDER_ID' => $mainId.'_big_slider',
	'BIG_IMG_CONT_ID' => $mainId.'_bigimg_cont',
	'SLIDER_CONT_ID' => $mainId.'_slider_cont',
	'OLD_PRICE_ID' => $mainId.'_old_price',
	'PRICE_ID' => $mainId.'_price',
	'DESCRIPTION_ID' => $mainId.'_description',
	'DISCOUNT_PRICE_ID' => $mainId.'_price_discount',
	'PRICE_TOTAL' => $mainId.'_price_total',
	'SLIDER_CONT_OF_ID' => $mainId.'_slider_cont_',
	'QUANTITY_ID' => $mainId.'_quantity',
	'QUANTITY_DOWN_ID' => $mainId.'_quant_down',
	'QUANTITY_UP_ID' => $mainId.'_quant_up',
	'QUANTITY_MEASURE' => $mainId.'_quant_measure',
	'QUANTITY_LIMIT' => $mainId.'_quant_limit',
	'BUY_LINK' => $mainId.'_buy_link',
	'ADD_BASKET_LINK' => $mainId.'_add_basket_link',
	'BASKET_ACTIONS_ID' => $mainId.'_basket_actions',
	'NOT_AVAILABLE_MESS' => $mainId.'_not_avail',
	'COMPARE_LINK' => $mainId.'_compare_link',
	'TREE_ID' => $mainId.'_skudiv',
	'DISPLAY_PROP_DIV' => $mainId.'_sku_prop',
	'DISPLAY_MAIN_PROP_DIV' => $mainId.'_main_sku_prop',
	'OFFER_GROUP' => $mainId.'_set_group_',
	'BASKET_PROP_DIV' => $mainId.'_basket_prop',
	'SUBSCRIBE_LINK' => $mainId.'_subscribe',
	'TABS_ID' => $mainId.'_tabs',
	'TAB_CONTAINERS_ID' => $mainId.'_tab_containers',
	'SMALL_CARD_PANEL_ID' => $mainId.'_small_card_panel',
	'TABS_PANEL_ID' => $mainId.'_tabs_panel'
);
$obName = $templateData['JS_OBJ'] = 'ob'.preg_replace('/[^a-zA-Z0-9_]/', 'x', $mainId);
$name = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE'])
	? $arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE']
	: $arResult['NAME'];
$title = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_TITLE'])
	? $arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_TITLE']
	: $arResult['NAME'];
$alt = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_ALT'])
	? $arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_ALT']
	: $arResult['NAME'];

$haveOffers = !empty($arResult['OFFERS']);
if ($haveOffers)
{
	$actualItem = $arResult['OFFERS'][$arResult['OFFERS_SELECTED']] ?? reset($arResult['OFFERS']);
	$showSliderControls = false;

	foreach ($arResult['OFFERS'] as $offer)
	{
		if ($offer['MORE_PHOTO_COUNT'] > 1)
		{
			$showSliderControls = true;
			break;
		}
	}
}
else
{
	$actualItem = $arResult;
	$showSliderControls = $arResult['MORE_PHOTO_COUNT'] > 1;
}

$skuProps = array();
$price = $actualItem['ITEM_PRICES'][$actualItem['ITEM_PRICE_SELECTED']];
$measureRatio = $actualItem['ITEM_MEASURE_RATIOS'][$actualItem['ITEM_MEASURE_RATIO_SELECTED']]['RATIO'];
$showDiscount = $price['PERCENT'] > 0;

if ($arParams['SHOW_SKU_DESCRIPTION'] === 'Y')
{
	$skuDescription = false;
	foreach ($arResult['OFFERS'] as $offer)
	{
		if ($offer['DETAIL_TEXT'] != '' || $offer['PREVIEW_TEXT'] != '')
		{
			$skuDescription = true;
			break;
		}
	}
	$showDescription = $skuDescription || !empty($arResult['PREVIEW_TEXT']) || !empty($arResult['DETAIL_TEXT']);
}
else
{
	$showDescription = !empty($arResult['PREVIEW_TEXT']) || !empty($arResult['DETAIL_TEXT']);
}

$showBuyBtn = in_array('BUY', $arParams['ADD_TO_BASKET_ACTION']);
$buyButtonClassName = in_array('BUY', $arParams['ADD_TO_BASKET_ACTION_PRIMARY']) ? 'btn-default' : 'btn-link';
$showAddBtn = in_array('ADD', $arParams['ADD_TO_BASKET_ACTION']);
$showButtonClassName = in_array('ADD', $arParams['ADD_TO_BASKET_ACTION_PRIMARY']) ? 'btn-default' : 'btn-link';
$showSubscribe = $arParams['PRODUCT_SUBSCRIPTION'] === 'Y' && ($arResult['PRODUCT']['SUBSCRIBE'] === 'Y' || $haveOffers);

$arParams['MESS_BTN_BUY'] = $arParams['MESS_BTN_BUY'] ?: Loc::getMessage('CT_BCE_CATALOG_BUY');
$arParams['MESS_BTN_ADD_TO_BASKET'] = $arParams['MESS_BTN_ADD_TO_BASKET'] ?: Loc::getMessage('CT_BCE_CATALOG_ADD');
$arParams['MESS_NOT_AVAILABLE'] = $arParams['MESS_NOT_AVAILABLE'] ?: Loc::getMessage('CT_BCE_CATALOG_NOT_AVAILABLE');
$arParams['MESS_BTN_COMPARE'] = $arParams['MESS_BTN_COMPARE'] ?: Loc::getMessage('CT_BCE_CATALOG_COMPARE');
$arParams['MESS_PRICE_RANGES_TITLE'] = $arParams['MESS_PRICE_RANGES_TITLE'] ?: Loc::getMessage('CT_BCE_CATALOG_PRICE_RANGES_TITLE');
$arParams['MESS_DESCRIPTION_TAB'] = $arParams['MESS_DESCRIPTION_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_DESCRIPTION_TAB');
$arParams['MESS_PROPERTIES_TAB'] = $arParams['MESS_PROPERTIES_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_PROPERTIES_TAB');
$arParams['MESS_COMMENTS_TAB'] = $arParams['MESS_COMMENTS_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_COMMENTS_TAB');
$arParams['MESS_SHOW_MAX_QUANTITY'] = $arParams['MESS_SHOW_MAX_QUANTITY'] ?: Loc::getMessage('CT_BCE_CATALOG_SHOW_MAX_QUANTITY');
$arParams['MESS_RELATIVE_QUANTITY_MANY'] = $arParams['MESS_RELATIVE_QUANTITY_MANY'] ?: Loc::getMessage('CT_BCE_CATALOG_RELATIVE_QUANTITY_MANY');
$arParams['MESS_RELATIVE_QUANTITY_FEW'] = $arParams['MESS_RELATIVE_QUANTITY_FEW'] ?: Loc::getMessage('CT_BCE_CATALOG_RELATIVE_QUANTITY_FEW');

$positionClassMap = array(
	'left' => 'product-item-label-left',
	'center' => 'product-item-label-center',
	'right' => 'product-item-label-right',
	'bottom' => 'product-item-label-bottom',
	'middle' => 'product-item-label-middle',
	'top' => 'product-item-label-top'
);

$discountPositionClass = 'product-item-label-big';
if ($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y' && !empty($arParams['DISCOUNT_PERCENT_POSITION']))
{
	foreach (explode('-', $arParams['DISCOUNT_PERCENT_POSITION']) as $pos)
	{
		$discountPositionClass .= isset($positionClassMap[$pos]) ? ' '.$positionClassMap[$pos] : '';
	}
}

$labelPositionClass = 'product-item-label-big';
if (!empty($arParams['LABEL_PROP_POSITION']))
{
	foreach (explode('-', $arParams['LABEL_PROP_POSITION']) as $pos)
	{
		$labelPositionClass .= isset($positionClassMap[$pos]) ? ' '.$positionClassMap[$pos] : '';
	}
}
?>
<section class="product-card" id="<?=$itemIds['ID']?>">

    <?//echo '<pre>'; print_r($arResult["PROPERTIES"]["DETAIL_FILES"]); echo '</pre>';?>

    <div class="product-card__top container">
        <div class="product-card__left">
            <div class="swiper-container product-card-thumbs">
                <button class="product-card-thumbs__arrow product-card-thumbs__next">
                    <svg width="16" height="9" viewBox="0 0 16 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.999023 8L7.99902 1L14.999 8" stroke="#9CA7B8" stroke-width="1.8" stroke-linecap="round"
                              stroke-linejoin="round" />
                    </svg>
                </button>
                <div class="swiper-wrapper">
                    <?foreach ($arResult["PROPERTIES"]["DETAIL_SMALL_IMG"]["VALUE"] as $arProps):?>
                        <?$smallImgPath = CFile::GetPath($arProps);?>
                        <div class="swiper-slide product-card-thumbs__item" style="background-image: url(<?=$smallImgPath?>);"></div>
<!--                    <div class="swiper-slide product-card-thumbs__item product-card-thumbs__item_video" style="background-image: url(./img/thumb-3.jpg);"></div>-->
                    <?endforeach?>
                </div>
                <button class="product-card-thumbs__arrow product-card-thumbs__prev">
                    <svg width="16" height="9" viewBox="0 0 16 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.999023 8L7.99902 1L14.999 8" stroke="#9CA7B8" stroke-width="1.8" stroke-linecap="round"
                              stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
            <div class="swiper-container product-card-slider">
                <div class="swiper-wrapper">
                    <?foreach ($arResult["PROPERTIES"]["DETAIL_BIG_IMG"]["VALUE"] as $arProps):?>
                        <?$bigImgPath = CFile::GetPath($arProps);?>
                        <?//echo '<pre>'; print_r($arProps); echo '</pre>';?>
                        <div class="swiper-slide product-card-slider__item" data-popup="gallery-popup" data-popup-slider="gallery">

                            <?if ($arResult["PROPERTIES"]["NOVELTY"]["VALUE_XML_ID"][0] == 'TRUE'):?>
                                <div class="tags product-card-slider__tags">
                                    <span class="tags__item">новинка</span>
                                    <span class="tags__item tags__item_sale">-20%</span>
                                </div>
                            <?endif;?>

                            <?if ($arProps == 'видео'):?>
                                <iframe class="product-card-slider__video" width="1000" height="600"
                                        src="https://www.youtube.com/embed/xdkMyMx3oZw?enablejsapi=1" frameborder="0"
                                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                            <?endif;?>

                            <div class="product-card-slider__img" style="background-image: url(<?=$bigImgPath?>);"></div>

                        </div>
                        <?endforeach;?>
                </div>
            </div>
            <a href="" download class="product-card__download">
                Скачать каталог
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                            d="M19 13V17C19 17.5304 18.7893 18.0391 18.4142 18.4142C18.0391 18.7893 17.5304 19 17 19H3C2.46957 19 1.96086 18.7893 1.58579 18.4142C1.21071 18.0391 1 17.5304 1 17V13M5 8L10 13M10 13L15 8M10 13V1"
                            stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>
            <div class="product-card-slider__nav navigation">
                <button class="navigation__prev navigation__arrow product-card-slider__prev">
                    <svg width="22" height="17" viewBox="0 0 22 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                                d="M12.7137 2.11913C12.3203 1.73052 12.3184 1.09596 12.7094 0.704945C13.0987 0.315615 13.73 0.315615 14.1193 0.704946L22.0001 8.58579L14.1193 16.4665C13.73 16.8559 13.0988 16.8559 12.7094 16.4665C12.3184 16.0755 12.3204 15.441 12.7138 15.0524L18.2477 9.58579H1C0.447715 9.58579 0 9.13807 0 8.58579C0 8.0335 0.447716 7.58579 1 7.58579H18.2477L12.7137 2.11913Z"
                                fill="#025BFF" />
                    </svg>
                </button>
                <button class="navigation__next navigation__arrow product-card-slider__next">
                    <svg width="22" height="17" viewBox="0 0 22 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                                d="M12.7137 2.11913C12.3203 1.73052 12.3184 1.09596 12.7094 0.704945C13.0987 0.315615 13.73 0.315615 14.1193 0.704946L22.0001 8.58579L14.1193 16.4665C13.73 16.8559 13.0988 16.8559 12.7094 16.4665C12.3184 16.0755 12.3204 15.441 12.7138 15.0524L18.2477 9.58579H1C0.447715 9.58579 0 9.13807 0 8.58579C0 8.0335 0.447716 7.58579 1 7.58579H18.2477L12.7137 2.11913Z"
                                fill="#025BFF" />
                    </svg>
                </button>
            </div>
        </div>
        <div class="product-card__right">
            <h1 class="product-card__title"><?=$name?></h1>
            <div class="specific-icons specific-icons_top">
                <svg class="specific-icons__item" width="46" height="46" viewBox="0 0 46 46" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <rect x="1" y="1" width="44" height="44" stroke="#025BFF" stroke-width="2" />
                    <path
                            d="M9.94336 17.0293H6.64453V15.6641H9.94336V17.0293ZM12.9551 14.9844H13.8574C14.2871 14.9844 14.6055 14.877 14.8125 14.6621C15.0195 14.4473 15.123 14.1621 15.123 13.8066C15.123 13.4629 15.0195 13.1953 14.8125 13.0039C14.6094 12.8125 14.3281 12.7168 13.9688 12.7168C13.6445 12.7168 13.373 12.8066 13.1543 12.9863C12.9355 13.1621 12.8262 13.3926 12.8262 13.6777H11.1328C11.1328 13.2324 11.252 12.834 11.4902 12.4824C11.7324 12.127 12.0684 11.8496 12.498 11.6504C12.9316 11.4512 13.4082 11.3516 13.9277 11.3516C14.8301 11.3516 15.5371 11.5684 16.0488 12.002C16.5605 12.4316 16.8164 13.0254 16.8164 13.7832C16.8164 14.1738 16.6973 14.5332 16.459 14.8613C16.2207 15.1895 15.9082 15.4414 15.5215 15.6172C16.002 15.7891 16.3594 16.0469 16.5938 16.3906C16.832 16.7344 16.9512 17.1406 16.9512 17.6094C16.9512 18.3672 16.6738 18.9746 16.1191 19.4316C15.5684 19.8887 14.8379 20.1172 13.9277 20.1172C13.0762 20.1172 12.3789 19.8926 11.8359 19.4434C11.2969 18.9941 11.0273 18.4004 11.0273 17.6621H12.7207C12.7207 17.9824 12.8398 18.2441 13.0781 18.4473C13.3203 18.6504 13.6172 18.752 13.9688 18.752C14.3711 18.752 14.6855 18.6465 14.9121 18.4355C15.1426 18.2207 15.2578 17.9375 15.2578 17.5859C15.2578 16.7344 14.7891 16.3086 13.8516 16.3086H12.9551V14.9844ZM23.8652 16.4727C23.8652 17.6523 23.6211 18.5547 23.1328 19.1797C22.6445 19.8047 21.9297 20.1172 20.9883 20.1172C20.0586 20.1172 19.3477 19.8105 18.8555 19.1973C18.3633 18.584 18.1113 17.7051 18.0996 16.5605V14.9902C18.0996 13.7988 18.3457 12.8945 18.8379 12.2773C19.334 11.6602 20.0469 11.3516 20.9766 11.3516C21.9062 11.3516 22.6172 11.6582 23.1094 12.2715C23.6016 12.8809 23.8535 13.7578 23.8652 14.9023V16.4727ZM22.1719 14.75C22.1719 14.043 22.0742 13.5293 21.8789 13.209C21.6875 12.8848 21.3867 12.7227 20.9766 12.7227C20.5781 12.7227 20.2832 12.877 20.0918 13.1855C19.9043 13.4902 19.8047 13.9688 19.793 14.6211V16.6953C19.793 17.3906 19.8867 17.9082 20.0742 18.248C20.2656 18.584 20.5703 18.752 20.9883 18.752C21.4023 18.752 21.7012 18.5898 21.8848 18.2656C22.0684 17.9414 22.1641 17.4453 22.1719 16.7773V14.75ZM10.0664 29.2246H12.1816V30.7539H10.0664V33.1445H8.45508V30.7539H6.33398V29.2246H8.45508V26.9336H10.0664V29.2246ZM13.3828 29.8047L13.875 25.4688H18.6562V26.8809H15.2637L15.0527 28.7148C15.4551 28.5 15.8828 28.3926 16.3359 28.3926C17.1484 28.3926 17.7852 28.6445 18.2461 29.1484C18.707 29.6523 18.9375 30.3574 18.9375 31.2637C18.9375 31.8145 18.8203 32.3086 18.5859 32.7461C18.3555 33.1797 18.0234 33.5176 17.5898 33.7598C17.1562 33.998 16.6445 34.1172 16.0547 34.1172C15.5391 34.1172 15.0605 34.0137 14.6191 33.8066C14.1777 33.5957 13.8281 33.3008 13.5703 32.9219C13.3164 32.543 13.1816 32.1113 13.166 31.627H14.8418C14.877 31.9824 15 32.2598 15.2109 32.459C15.4258 32.6543 15.7051 32.752 16.0488 32.752C16.4316 32.752 16.7266 32.6152 16.9336 32.3418C17.1406 32.0645 17.2441 31.6738 17.2441 31.1699C17.2441 30.6855 17.125 30.3145 16.8867 30.0566C16.6484 29.7988 16.3105 29.6699 15.873 29.6699C15.4707 29.6699 15.1445 29.7754 14.8945 29.9863L14.7305 30.1387L13.3828 29.8047ZM25.7637 30.4727C25.7637 31.6523 25.5195 32.5547 25.0312 33.1797C24.543 33.8047 23.8281 34.1172 22.8867 34.1172C21.957 34.1172 21.2461 33.8105 20.7539 33.1973C20.2617 32.584 20.0098 31.7051 19.998 30.5605V28.9902C19.998 27.7988 20.2441 26.8945 20.7363 26.2773C21.2324 25.6602 21.9453 25.3516 22.875 25.3516C23.8047 25.3516 24.5156 25.6582 25.0078 26.2715C25.5 26.8809 25.752 27.7578 25.7637 28.9023V30.4727ZM24.0703 28.75C24.0703 28.043 23.9727 27.5293 23.7773 27.209C23.5859 26.8848 23.2852 26.7227 22.875 26.7227C22.4766 26.7227 22.1816 26.877 21.9902 27.1855C21.8027 27.4902 21.7031 27.9688 21.6914 28.6211V30.6953C21.6914 31.3906 21.7852 31.9082 21.9727 32.248C22.1641 32.584 22.4688 32.752 22.8867 32.752C23.3008 32.752 23.5996 32.5898 23.7832 32.2656C23.9668 31.9414 24.0625 31.4453 24.0703 30.7773V28.75Z"
                            fill="#2874FF" />
                    <path
                            d="M37 25.76V14.5C37 13.837 36.7366 13.2011 36.2678 12.7322C35.7989 12.2634 35.163 12 34.5 12C33.837 12 33.2011 12.2634 32.7322 12.7322C32.2634 13.2011 32 13.837 32 14.5V25.76C31.1973 26.2963 30.5883 27.0766 30.2631 27.9856C29.9378 28.8946 29.9135 29.8841 30.1938 30.8079C30.474 31.7317 31.0439 32.541 31.8193 33.1161C32.5948 33.6912 33.5346 34.0017 34.5 34.0017C35.4654 34.0017 36.4052 33.6912 37.1807 33.1161C37.9561 32.541 38.526 31.7317 38.8062 30.8079C39.0865 29.8841 39.0622 28.8946 38.7369 27.9856C38.4117 27.0766 37.8027 26.2963 37 25.76Z"
                            stroke="#025BFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <svg class="specific-icons__item" width="46" height="46" viewBox="0 0 46 46" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <rect x="1" y="1" width="44" height="44" stroke="#025BFF" stroke-width="2" />
                    <path
                            d="M23.0002 26.6668C24.4729 26.6668 25.6668 25.4729 25.6668 24.0002C25.6668 22.5274 24.4729 21.3335 23.0002 21.3335C21.5274 21.3335 20.3335 22.5274 20.3335 24.0002C20.3335 25.4729 21.5274 26.6668 23.0002 26.6668Z"
                            stroke="#025BFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                            d="M28.6533 18.3466C29.3971 19.0896 29.9871 19.9719 30.3897 20.9431C30.7923 21.9142 30.9995 22.9553 30.9995 24.0066C30.9995 25.0579 30.7923 26.0989 30.3897 27.0701C29.9871 28.0413 29.3971 28.9236 28.6533 29.6666M17.3466 29.6532C16.6028 28.9103 16.0127 28.028 15.6101 27.0568C15.2075 26.0856 15.0003 25.0446 15.0003 23.9932C15.0003 22.9419 15.2075 21.9009 15.6101 20.9297C16.0127 19.9585 16.6028 19.0762 17.3466 18.3332M32.4266 14.5732C34.9262 17.0736 36.3304 20.4644 36.3304 23.9999C36.3304 27.5354 34.9262 30.9262 32.4266 33.4266M13.5733 33.4266C11.0736 30.9262 9.66943 27.5354 9.66943 23.9999C9.66943 20.4644 11.0736 17.0736 13.5733 14.5732"
                            stroke="#025BFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <svg class="specific-icons__item" width="46" height="46" viewBox="0 0 46 46" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <rect x="1" y="1" width="44" height="44" stroke="#025BFF" stroke-width="2"></rect>
                    <path
                            d="M12.2383 13.6602L12.291 14.3691C12.7402 13.8184 13.3477 13.543 14.1133 13.543C14.9297 13.543 15.4902 13.8652 15.7949 14.5098C16.2402 13.8652 16.875 13.543 17.6992 13.543C18.3867 13.543 18.8984 13.7441 19.2344 14.1465C19.5703 14.5449 19.7383 15.1465 19.7383 15.9512V20H18.0391V15.957C18.0391 15.5977 17.9688 15.3359 17.8281 15.1719C17.6875 15.0039 17.4395 14.9199 17.084 14.9199C16.5762 14.9199 16.2246 15.1621 16.0293 15.6465L16.0352 20H14.3418V15.9629C14.3418 15.5957 14.2695 15.3301 14.125 15.166C13.9805 15.002 13.7344 14.9199 13.3867 14.9199C12.9062 14.9199 12.5586 15.1191 12.3438 15.5176V20H10.6504V13.6602H12.2383ZM24.7188 20C24.6406 19.8477 24.584 19.6582 24.5488 19.4316C24.1387 19.8887 23.6055 20.1172 22.9492 20.1172C22.3281 20.1172 21.8125 19.9375 21.4023 19.5781C20.9961 19.2188 20.793 18.7656 20.793 18.2188C20.793 17.5469 21.041 17.0312 21.5371 16.6719C22.0371 16.3125 22.7578 16.1309 23.6992 16.127H24.4785V15.7637C24.4785 15.4707 24.4023 15.2363 24.25 15.0605C24.1016 14.8848 23.8652 14.7969 23.541 14.7969C23.2559 14.7969 23.0312 14.8652 22.8672 15.002C22.707 15.1387 22.627 15.3262 22.627 15.5645H20.9336C20.9336 15.1973 21.0469 14.8574 21.2734 14.5449C21.5 14.2324 21.8203 13.9883 22.2344 13.8125C22.6484 13.6328 23.1133 13.543 23.6289 13.543C24.4102 13.543 25.0293 13.7402 25.4863 14.1348C25.9473 14.5254 26.1777 15.0762 26.1777 15.7871V18.5352C26.1816 19.1367 26.2656 19.5918 26.4297 19.9004V20H24.7188ZM23.3184 18.8223C23.5684 18.8223 23.7988 18.7676 24.0098 18.6582C24.2207 18.5449 24.377 18.3945 24.4785 18.207V17.1172H23.8457C22.998 17.1172 22.5469 17.4102 22.4922 17.9961L22.4863 18.0957C22.4863 18.3066 22.5605 18.4805 22.709 18.6172C22.8574 18.7539 23.0605 18.8223 23.3184 18.8223ZM29.8926 15.5527L30.959 13.6602H32.7695L30.9648 16.7656L32.8457 20H31.0293L29.8984 18.0078L28.7734 20H26.9512L28.832 16.7656L27.0332 13.6602H28.8496L29.8926 15.5527ZM15.4756 34H13.5V26.3848L11.1416 27.1162V25.5098L15.2637 24.0332H15.4756V34ZM25.415 29.8848C25.415 31.2611 25.1302 32.3138 24.5605 33.043C23.9909 33.7721 23.1569 34.1367 22.0586 34.1367C20.974 34.1367 20.1445 33.779 19.5703 33.0635C18.9961 32.348 18.7021 31.3226 18.6885 29.9873V28.1553C18.6885 26.7653 18.9756 25.7103 19.5498 24.9902C20.1286 24.2702 20.9603 23.9102 22.0449 23.9102C23.1296 23.9102 23.959 24.2679 24.5332 24.9834C25.1074 25.6943 25.4014 26.7174 25.415 28.0527V29.8848ZM23.4395 27.875C23.4395 27.0501 23.3255 26.4508 23.0977 26.0771C22.8743 25.6989 22.5234 25.5098 22.0449 25.5098C21.5801 25.5098 21.236 25.6898 21.0127 26.0498C20.7939 26.4053 20.6777 26.9635 20.6641 27.7246V30.1445C20.6641 30.9557 20.7734 31.5596 20.9922 31.9561C21.2155 32.348 21.571 32.5439 22.0586 32.5439C22.5417 32.5439 22.8903 32.3548 23.1045 31.9766C23.3187 31.5983 23.4303 31.0195 23.4395 30.2402V27.875ZM32.9756 28.1895H30.6035V34H28.6211V28.1895H26.29V26.6035H32.9756V28.1895Z"
                            fill="#2874FF"></path>
                </svg>
            </div>
            <p><?=$arResult["DETAIL_TEXT"]?></p>
            <a href="" class="product-card__detail">Подробнее</a>
            <div class="product-card__buttons">
                <button data-popup="form-popup" class="button button_red product-card__get-price" data-popup="form-popup">Запросить цену</button>
                <a href="" download class="product-card__download">
                    Опросный лист
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                                d="M19 13V17C19 17.5304 18.7893 18.0391 18.4142 18.4142C18.0391 18.7893 17.5304 19 17 19H3C2.46957 19 1.96086 18.7893 1.58579 18.4142C1.21071 18.0391 1 17.5304 1 17V13M5 8L10 13M10 13L15 8M10 13V1"
                                stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            </div>
            <div class="product-card__advantages">
                <ul class="product-card__list">
                    <li class="product-card__adv">От 40 кг до 5 тонн</li>
                    <li class="product-card__adv">Простая установка</li>
                    <li class="product-card__adv">48 часов работы от аккумулятора</li>
                    <li class="product-card__adv">Компактность и высокая мобильность</li>
                    <li class="product-card__adv">Малая высота платформы - 27мм !</li>
                    <li class="product-card__adv">Малая высота платформы - 27мм !</li>
                </ul>
                <a href="" class="product-card__more">Больше преимуществ весов уралвес</a>
            </div>
        </div>
    </div>

    <div class="tabs swiper-container product-card__tabs">
        <div class="swiper-wrapper tabs__wrapper">
            <div class="swiper-slide tabs-item tabs-item_active" data-tab-group="card" data-tab="1">
                <div class="tabs-item__icon">
                    <svg width="18" height="22" viewBox="0 0 18 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                                d="M13 3H15C15.5304 3 16.0391 3.21071 16.4142 3.58579C16.7893 3.96086 17 4.46957 17 5V19C17 19.5304 16.7893 20.0391 16.4142 20.4142C16.0391 20.7893 15.5304 21 15 21H3C2.46957 21 1.96086 20.7893 1.58579 20.4142C1.21071 20.0391 1 19.5304 1 19V5C1 4.46957 1.21071 3.96086 1.58579 3.58579C1.96086 3.21071 2.46957 3 3 3H5M6 1H12C12.5523 1 13 1.44772 13 2V4C13 4.55228 12.5523 5 12 5H6C5.44772 5 5 4.55228 5 4V2C5 1.44772 5.44772 1 6 1Z"
                                stroke="#A9BAD8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <span class="tabs-item__name">Описание</span>
            </div>
            <div class="swiper-slide tabs-item" data-tab-group="card" data-tab="2">
                <div class="tabs-item__icon">
                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                                d="M12.7013 5.30364C12.5181 5.49057 12.4155 5.74189 12.4155 6.00364C12.4155 6.26539 12.5181 6.51671 12.7013 6.70364L14.3013 8.30364C14.4882 8.48687 14.7396 8.5895 15.0013 8.5895C15.2631 8.5895 15.5144 8.48687 15.7013 8.30364L19.4713 4.53364C19.9742 5.64483 20.1264 6.88288 19.9078 8.08279C19.6892 9.2827 19.11 10.3875 18.2476 11.2499C17.3852 12.1124 16.2804 12.6915 15.0805 12.9101C13.8806 13.1287 12.6425 12.9765 11.5313 12.4736L4.62132 19.3836C4.2235 19.7815 3.68393 20.005 3.12132 20.005C2.55871 20.005 2.01914 19.7815 1.62132 19.3836C1.2235 18.9858 1 18.4462 1 17.8836C1 17.321 1.2235 16.7815 1.62132 16.3836L8.53132 9.47364C8.02848 8.36245 7.87624 7.12441 8.09486 5.9245C8.31349 4.72459 8.89261 3.6198 9.75504 2.75736C10.6175 1.89493 11.7223 1.31581 12.9222 1.09718C14.1221 0.878558 15.3601 1.03081 16.4713 1.53364L12.7113 5.29364L12.7013 5.30364Z"
                                stroke="#A9BAD8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <span class="tabs-item__name">Технические характеристики</span>
            </div>
            <div class="swiper-slide tabs-item" data-tab-group="card" data-tab="3">
                <div class="tabs-item__icon">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                                d="M19 13V17C19 17.5304 18.7893 18.0391 18.4142 18.4142C18.0391 18.7893 17.5304 19 17 19H3C2.46957 19 1.96086 18.7893 1.58579 18.4142C1.21071 18.0391 1 17.5304 1 17V13M5 8L10 13M10 13L15 8M10 13V1"
                                stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <span class="tabs-item__name">Документация, ПО и сертификаты</span>
            </div>
            <div class="swiper-slide tabs-item" data-tab-group="card" data-tab="4">
                <div class="tabs-item__icon">
                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                                d="M6 21H3C2.46957 21 1.96086 20.7893 1.58579 20.4142C1.21071 20.0391 1 19.5304 1 19V12C1 11.4696 1.21071 10.9609 1.58579 10.5858C1.96086 10.2107 2.46957 10 3 10H6M13 8V4C13 3.20435 12.6839 2.44129 12.1213 1.87868C11.5587 1.31607 10.7956 1 10 1L6 10V21H17.28C17.7623 21.0055 18.2304 20.8364 18.5979 20.524C18.9654 20.2116 19.2077 19.7769 19.28 19.3L20.66 10.3C20.7035 10.0134 20.6842 9.72068 20.6033 9.44225C20.5225 9.16382 20.3821 8.90629 20.1919 8.68751C20.0016 8.46873 19.7661 8.29393 19.5016 8.17522C19.2371 8.0565 18.9499 7.99672 18.66 8H13Z"
                                stroke="#151616" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <span class="tabs-item__name">Примеры внедрения</span>
            </div>
            <div class="swiper-slide tabs-item" data-tab-group="card" data-tab="5">
                <div class="tabs-item__icon">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                                d="M19 13C19 13.5304 18.7893 14.0391 18.4142 14.4142C18.0391 14.7893 17.5304 15 17 15H5L1 19V3C1 2.46957 1.21071 1.96086 1.58579 1.58579C1.96086 1.21071 2.46957 1 3 1H17C17.5304 1 18.0391 1.21071 18.4142 1.58579C18.7893 1.96086 19 2.46957 19 3V13Z"
                                stroke="#A9BAD8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <span class="tabs-item__name">Отзывы</span>
            </div>
            <div class="swiper-slide tabs-item" data-tab-group="card" data-tab="6">
                <div class="tabs-item__icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                                d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z"
                                stroke="#A9BAD8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                                d="M19.4 15C19.2669 15.3016 19.2272 15.6362 19.286 15.9606C19.3448 16.285 19.4995 16.5843 19.73 16.82L19.79 16.88C19.976 17.0657 20.1235 17.2863 20.2241 17.5291C20.3248 17.7719 20.3766 18.0322 20.3766 18.295C20.3766 18.5578 20.3248 18.8181 20.2241 19.0609C20.1235 19.3037 19.976 19.5243 19.79 19.71C19.6043 19.896 19.3837 20.0435 19.1409 20.1441C18.8981 20.2448 18.6378 20.2966 18.375 20.2966C18.1122 20.2966 17.8519 20.2448 17.6091 20.1441C17.3663 20.0435 17.1457 19.896 16.96 19.71L16.9 19.65C16.6643 19.4195 16.365 19.2648 16.0406 19.206C15.7162 19.1472 15.3816 19.1869 15.08 19.32C14.7842 19.4468 14.532 19.6572 14.3543 19.9255C14.1766 20.1938 14.0813 20.5082 14.08 20.83V21C14.08 21.5304 13.8693 22.0391 13.4942 22.4142C13.1191 22.7893 12.6104 23 12.08 23C11.5496 23 11.0409 22.7893 10.6658 22.4142C10.2907 22.0391 10.08 21.5304 10.08 21V20.91C10.0723 20.579 9.96512 20.258 9.77251 19.9887C9.5799 19.7194 9.31074 19.5143 9 19.4C8.69838 19.2669 8.36381 19.2272 8.03941 19.286C7.71502 19.3448 7.41568 19.4995 7.18 19.73L7.12 19.79C6.93425 19.976 6.71368 20.1235 6.47088 20.2241C6.22808 20.3248 5.96783 20.3766 5.705 20.3766C5.44217 20.3766 5.18192 20.3248 4.93912 20.2241C4.69632 20.1235 4.47575 19.976 4.29 19.79C4.10405 19.6043 3.95653 19.3837 3.85588 19.1409C3.75523 18.8981 3.70343 18.6378 3.70343 18.375C3.70343 18.1122 3.75523 17.8519 3.85588 17.6091C3.95653 17.3663 4.10405 17.1457 4.29 16.96L4.35 16.9C4.58054 16.6643 4.73519 16.365 4.794 16.0406C4.85282 15.7162 4.81312 15.3816 4.68 15.08C4.55324 14.7842 4.34276 14.532 4.07447 14.3543C3.80618 14.1766 3.49179 14.0813 3.17 14.08H3C2.46957 14.08 1.96086 13.8693 1.58579 13.4942C1.21071 13.1191 1 12.6104 1 12.08C1 11.5496 1.21071 11.0409 1.58579 10.6658C1.96086 10.2907 2.46957 10.08 3 10.08H3.09C3.42099 10.0723 3.742 9.96512 4.0113 9.77251C4.28059 9.5799 4.48572 9.31074 4.6 9C4.73312 8.69838 4.77282 8.36381 4.714 8.03941C4.65519 7.71502 4.50054 7.41568 4.27 7.18L4.21 7.12C4.02405 6.93425 3.87653 6.71368 3.77588 6.47088C3.67523 6.22808 3.62343 5.96783 3.62343 5.705C3.62343 5.44217 3.67523 5.18192 3.77588 4.93912C3.87653 4.69632 4.02405 4.47575 4.21 4.29C4.39575 4.10405 4.61632 3.95653 4.85912 3.85588C5.10192 3.75523 5.36217 3.70343 5.625 3.70343C5.88783 3.70343 6.14808 3.75523 6.39088 3.85588C6.63368 3.95653 6.85425 4.10405 7.04 4.29L7.1 4.35C7.33568 4.58054 7.63502 4.73519 7.95941 4.794C8.28381 4.85282 8.61838 4.81312 8.92 4.68H9C9.29577 4.55324 9.54802 4.34276 9.72569 4.07447C9.90337 3.80618 9.99872 3.49179 10 3.17V3C10 2.46957 10.2107 1.96086 10.5858 1.58579C10.9609 1.21071 11.4696 1 12 1C12.5304 1 13.0391 1.21071 13.4142 1.58579C13.7893 1.96086 14 2.46957 14 3V3.09C14.0013 3.41179 14.0966 3.72618 14.2743 3.99447C14.452 4.26276 14.7042 4.47324 15 4.6C15.3016 4.73312 15.6362 4.77282 15.9606 4.714C16.285 4.65519 16.5843 4.50054 16.82 4.27L16.88 4.21C17.0657 4.02405 17.2863 3.87653 17.5291 3.77588C17.7719 3.67523 18.0322 3.62343 18.295 3.62343C18.5578 3.62343 18.8181 3.67523 19.0609 3.77588C19.3037 3.87653 19.5243 4.02405 19.71 4.21C19.896 4.39575 20.0435 4.61632 20.1441 4.85912C20.2448 5.10192 20.2966 5.36217 20.2966 5.625C20.2966 5.88783 20.2448 6.14808 20.1441 6.39088C20.0435 6.63368 19.896 6.85425 19.71 7.04L19.65 7.1C19.4195 7.33568 19.2648 7.63502 19.206 7.95941C19.1472 8.28381 19.1869 8.61838 19.32 8.92V9C19.4468 9.29577 19.6572 9.54802 19.9255 9.72569C20.1938 9.90337 20.5082 9.99872 20.83 10H21C21.5304 10 22.0391 10.2107 22.4142 10.5858C22.7893 10.9609 23 11.4696 23 12C23 12.5304 22.7893 13.0391 22.4142 13.4142C22.0391 13.7893 21.5304 14 21 14H20.91C20.5882 14.0013 20.2738 14.0966 20.0055 14.2743C19.7372 14.452 19.5268 14.7042 19.4 15Z"
                                stroke="#A9BAD8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <span class="tabs-item__name">Конфигуратор и заказ</span>
            </div>
        </div>
        <div class="tabs-nav">
            <button class="tabs-nav__arrow tabs-nav__prev">
                <svg width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                            d="M12.6712 2.12161C12.2978 1.72794 12.3059 1.10843 12.6896 0.724748C13.0871 0.327272 13.7338 0.334889 14.1218 0.741615L22.0001 9L14.1218 17.2584C13.7338 17.6651 13.0871 17.6727 12.6896 17.2753C12.3059 16.8916 12.2978 16.2721 12.6712 15.8784L18.2477 10H1C0.447715 10 0 9.55229 0 9C0 8.44771 0.447716 8 1 8H18.2477L12.6712 2.12161Z"
                            fill="#025BFF" />
                </svg>
            </button>
            <button class="tabs-nav__arrow tabs-nav__next">
                <svg width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                            d="M12.6712 2.12161C12.2978 1.72794 12.3059 1.10843 12.6896 0.724748C13.0871 0.327272 13.7338 0.334889 14.1218 0.741615L22.0001 9L14.1218 17.2584C13.7338 17.6651 13.0871 17.6727 12.6896 17.2753C12.3059 16.8916 12.2978 16.2721 12.6712 15.8784L18.2477 10H1C0.447715 10 0 9.55229 0 9C0 8.44771 0.447716 8 1 8H18.2477L12.6712 2.12161Z"
                            fill="#025BFF" />
                </svg>
            </button>
        </div>
    </div>

    <div class="product-card__bottom">
        <div class="container product-card__bottom-container">
            <div class="product-card__content inner__content">
                <div class="tabs__content tabs__content_active" data-tab-group="card" data-tab="1">
                    <section class="specific">
                        <div class="specific__text">
                            <h3>Описание весового терминала КСК10</h3>
                            <?=$arResult["PROPERTIES"]["DETAIL_DESCRIPTION"]["VALUE"]["TEXT"]?>
                        </div>
                        <div class="specific__text-with-img">
                            <img src="./img/card/termo.png" alt="">
                            <div>
                                <ul>
                                    <li>Базовая модель</li>
                                    <li>Минимальное количество элементов в конструкции</li>
                                    <li>Низкая стоимость изделия</li>
                                </ul>
                            </div>
                        </div>
                        <div class="specific__table">
                            <h3>ТРИД ТП201-D/L.(тип штуцера)-(НСХ)-(И/Н)-А,В,С</h3>
                            <div class="specific__table-wrap">
                                <table>
                                    <tr>
                                        <td><b>D-диаметр</b></td>
                                        <td><b>L-длина</b></td>
                                        <td><b>Тип штуцера</b></td>
                                        <td><b>НСХ</b></td>
                                        <td><b>И/Н</b></td>
                                        <td><b>Материал чехла</b></td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>250-800</td>
                                        <td>-</td>
                                        <td rowspan="0">ТХА (К), ТХК (L), ТЖК (J)</td>
                                        <td rowspan="0">И - изолированный рабочий спай,<br> Н-неизлированный рабочий спай</td>
                                        <td rowspan="0">А - сталь 12х18Н10Т,<br> В - сталь 10х23Н18,<br> С - сталь ХНх45Ю (для D 10,20)
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>250-800</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>250-800</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>250-800</td>
                                        <td>-</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="specific-complect">
                            <h3>ПРЕИМУЩЕСТВА ТЕРМИНАЛОВ УРАЛВЕС</h3>
                            <div class="specific-complect__items">
                                <div class="specific-complect__item">
                                    <div class="specific-complect__wrap">
                                        <img src="./img/card/complect-1.jpg" alt="" class="specific-complect__img">
                                    </div>
                                    <span class="specific-complect__text">Прибор КСК10 (ИСВ)</span>
                                </div>
                                <div class="specific-complect__item">
                                    <div class="specific-complect__wrap">
                                        <img src="./img/card/complect-2.jpg" alt="" class="specific-complect__img">
                                    </div>
                                    <span class="specific-complect__text">Комплект монтажных элементов</span>
                                </div>
                                <div class="specific-complect__item">
                                    <div class="specific-complect__wrap">
                                        <img src="./img/card/complect-3.jpg" alt="" class="specific-complect__img">
                                    </div>
                                    <span class="specific-complect__text">Руководство по эксплуатации</span>
                                </div>
                            </div>
                        </div>
                        <div
                                class="simple-slider simple-slider_white specific__simple-slider simple-slider__container swiper-container">
                            <h2 class="simple-slider__title">ПРЕИМУЩЕСТВА ПОДКЛАДНЫХ АВТОМОБИЛЬНЫХ ВЕСОВ</h2>
                            <div class="swiper-wrapper">
                                <div class="swiper-slide simple-slider-slide">
                                    <img src="./img/gear.svg" alt="" class="simple-slider-slide__img">
                                    <span class="simple-slider-slide__title">Малая высота платформы - 27мм !</span>
                                    <p class="simple-slider-slide__desc">Обеспечивает удобство заезда автомобиля на весы.</p>
                                </div>
                                <div class="swiper-slide simple-slider-slide">
                                    <img src="./img/gear.svg" alt="" class="simple-slider-slide__img">
                                    <span class="simple-slider-slide__title">Контроль осевых нагрузок </span>
                                    <p class="simple-slider-slide__desc">Весы могут использоваться для контроля осевых нагрузок
                                        автотранспортных средств на постах весового контроля (ПВК).</p>
                                </div>
                                <div class="swiper-slide simple-slider-slide">
                                    <img src="./img/gear.svg" alt="" class="simple-slider-slide__img">
                                    <span class="simple-slider-slide__title">100% защита от штрафа за перегруз транспортного
												средства</span>
                                    <p class="simple-slider-slide__desc">Штраф за перегруз автомобиля составляет до 500 000 рублей.
                                    </p>
                                </div>
                                <div class="swiper-slide simple-slider-slide">
                                    <img src="./img/gear.svg" alt="" class="simple-slider-slide__img">
                                    <span class="simple-slider-slide__title">Малая высота платформы - 27мм !</span>
                                    <p class="simple-slider-slide__desc">Обеспечивает удобство заезда автомобиля на весы.</p>
                                </div>
                            </div>
                            <div class="simple-slider__bottom">
                                <div class="simple-slider__pagination pagination"></div>
                                <div class="simple-slider__nav navigation">
                                    <button class="navigation__prev navigation__arrow simple-slider__prev">
                                        <svg width="22" height="17" viewBox="0 0 22 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                    d="M12.7137 2.11913C12.3203 1.73052 12.3184 1.09596 12.7094 0.704945C13.0987 0.315615 13.73 0.315615 14.1193 0.704946L22.0001 8.58579L14.1193 16.4665C13.73 16.8559 13.0988 16.8559 12.7094 16.4665C12.3184 16.0755 12.3204 15.441 12.7138 15.0524L18.2477 9.58579H1C0.447715 9.58579 0 9.13807 0 8.58579C0 8.0335 0.447716 7.58579 1 7.58579H18.2477L12.7137 2.11913Z"
                                                    fill="#025BFF" />
                                        </svg>
                                    </button>
                                    <button class="navigation__next navigation__arrow simple-slider__next">
                                        <svg width="22" height="17" viewBox="0 0 22 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                    d="M12.7137 2.11913C12.3203 1.73052 12.3184 1.09596 12.7094 0.704945C13.0987 0.315615 13.73 0.315615 14.1193 0.704946L22.0001 8.58579L14.1193 16.4665C13.73 16.8559 13.0988 16.8559 12.7094 16.4665C12.3184 16.0755 12.3204 15.441 12.7138 15.0524L18.2477 9.58579H1C0.447715 9.58579 0 9.13807 0 8.58579C0 8.0335 0.447716 7.58579 1 7.58579H18.2477L12.7137 2.11913Z"
                                                    fill="#025BFF" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="product-card__buttons product-card__buttons_fixed">
                            <button data-popup="form-popup" class="button button_red product-card__get-price" data-popup="form-popup">Запросить
                                цену</button>
                            <a href="" download class="product-card__download">
                                Опросный лист
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                            d="M19 13V17C19 17.5304 18.7893 18.0391 18.4142 18.4142C18.0391 18.7893 17.5304 19 17 19H3C2.46957 19 1.96086 18.7893 1.58579 18.4142C1.21071 18.0391 1 17.5304 1 17V13M5 8L10 13M10 13L15 8M10 13V1"
                                            stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                    </section>
                </div>
                <div class="tabs__content" data-tab-group="card" data-tab="2">
                    <section class="technical">
                        <div class="specific__table specific__table_small technical__table">
                            <h3>ХАРАКТЕРИСТИКИ ПОДКЛАНЫХ ВЕСОВ МВСК-5-А (0,55 х 0,75 х 2 шт.)</h3>
                            <div class="specific__table-wrap">
                                <table>
                                    <?
                                    $arValue["VALUE"] = $arResult["PROPERTIES"]["DETAIL_SPECIFICATION"]["VALUE"];
                                    $arDescription["DESCRIPTION"] = $arResult["PROPERTIES"]["DETAIL_SPECIFICATION"]["DESCRIPTION"];
                                    $arSpecification = array(
                                            "VALUE" => $arValue,
                                            "DESCRIPTION" => $arDescription
                                    );
                                    ?>

                                    <?foreach ($arSpecification as $value):?>
                                        <?foreach ($value as $key => $items):?>
                                            <tr>
                                                <?foreach ($value["VALUE"] as $spec):?>
                                                    <td><?=$spec?></td>
                                                <?endforeach;?>
                                                <?foreach ($value["DESCRIPTION"] as $desc):?>
                                                    <td><?=$desc?></td>
                                                <?endforeach;?>
                                            </tr>
                                        <?endforeach;?>
                                    <?endforeach;?>

                                </table>
                            </div>
                        </div>
                        <p>Автомобильные весы МВСК-П зарегистрированы в Государственном реестре средств измерений РФ под №
                            75629-19 и имеют сертификат об утверждении типа средств измерений OC.C.28.007.A № 74513. Автомобильные
                            весы МВСК-П зарегистрированы в Реестре государственной системы обеспечения единства измерений
                            Республики Казахстан за № KZ.02.03.03029-2009/39623-08, сертификат № 5574.</p>
                        <div class="specific__text-with-img">
                            <img src="./img/card/tech.jpg" alt="">
                            <div>
                                <p>Мы предлагаем широкий модельный ряд, подбор оптимального решения, официальную гарантию, сервис и
                                    минимальные сроки доставки.</p>
                            </div>
                        </div>
                        <div class="product-card__buttons product-card__buttons_fixed">
                            <button data-popup="form-popup" class="button button_red product-card__get-price" data-popup="form-popup">Запросить
                                цену</button>
                            <a href="" download class="product-card__download">
                                Опросный лист
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                            d="M19 13V17C19 17.5304 18.7893 18.0391 18.4142 18.4142C18.0391 18.7893 17.5304 19 17 19H3C2.46957 19 1.96086 18.7893 1.58579 18.4142C1.21071 18.0391 1 17.5304 1 17V13M5 8L10 13M10 13L15 8M10 13V1"
                                            stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                    </section>
                </div>
                <div class="tabs__content" data-tab-group="card" data-tab="3">
                    <section class="documents">
                        <div class="documents-slider">
                            <p>Автомобильные весы МВСК-П зарегистрированы в Государственном реестре средств измерений РФ под №
                                75629-19 и имеют сертификат об утверждении типа средств измерений OC.C.28.007.A № 74513.</p>
                            <div class="documents-slider__container swiper-container">
                                <div class="swiper-wrapper documents-slider__wrapper">
                                    <?foreach ($arResult["PROPERTIES"]["DETAIL_CERTIFICATE"]["VALUE"] as $arFiles) :?>
                                        <? $img = CFile::GetPath($arFiles);?>
                                        <div class="swiper-slide documents-slider__item">
                                            <div class="documents-slider__img-wrap" data-popup="popup-photo" data-popup-img="./img/card/doc-1.jpg">
                                                <img class="documents-slider__img" src="<?=$img?>" alt="">
                                            </div>
                                        </div>
                                    <?endforeach;?>
                                </div>
                            </div>
                            <div class="documents-slider__bottom">
                                <div class="documents-slider__pagination pagination"></div>
                                <div class="documents-slider__nav">
                                    <button class="documents-slider__arrow documents-slider__prev">
                                        <svg width="22" height="17" viewBox="0 0 22 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                    d="M12.7137 2.11913C12.3203 1.73052 12.3184 1.09596 12.7094 0.704945C13.0987 0.315615 13.73 0.315615 14.1193 0.704946L22.0001 8.58579L14.1193 16.4665C13.73 16.8559 13.0988 16.8559 12.7094 16.4665C12.3184 16.0755 12.3204 15.441 12.7138 15.0524L18.2477 9.58579H1C0.447715 9.58579 0 9.13807 0 8.58579C0 8.0335 0.447716 7.58579 1 7.58579H18.2477L12.7137 2.11913Z"
                                                    fill="#025BFF" />
                                        </svg>
                                    </button>
                                    <button class="documents-slider__arrow documents-slider__next">
                                        <svg width="22" height="17" viewBox="0 0 22 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                    d="M12.7137 2.11913C12.3203 1.73052 12.3184 1.09596 12.7094 0.704945C13.0987 0.315615 13.73 0.315615 14.1193 0.704946L22.0001 8.58579L14.1193 16.4665C13.73 16.8559 13.0988 16.8559 12.7094 16.4665C12.3184 16.0755 12.3204 15.441 12.7138 15.0524L18.2477 9.58579H1C0.447715 9.58579 0 9.13807 0 8.58579C0 8.0335 0.447716 7.58579 1 7.58579H18.2477L12.7137 2.11913Z"
                                                    fill="#025BFF" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="documents-files">
                            <h3>Скачать файлы</h3>
                            <ul class="documents-files__list">
                                <?foreach ($arResult["PROPERTIES"]["DETAIL_FILES"]["VALUE"] as $arFiles):?>
                                    <?$newArFiles = CFile::GetFileArray($arFiles);?>
                                    <?
                                    $path = " ";
                                    if ($newArFiles["CONTENT_TYPE"] == "application/pdf"){
                                        $path = SITE_TEMPLATE_PATH . "/img/card/pdf.svg";
                                    } elseif ($newArFiles["CONTENT_TYPE"] == "application/x-zip-compressed"){
                                        $path = SITE_TEMPLATE_PATH . "/img/card/zip.svg";
                                    } elseif ($newArFiles["CONTENT_TYPE"] == "application/msword"){
                                        $path = SITE_TEMPLATE_PATH . "/img/card/doc.svg";
                                    } elseif ($newArFiles["CONTENT_TYPE"] == "application/vnd.ms-excel"){
                                        $path = SITE_TEMPLATE_PATH . "/img/card/xls.svg";
                                    }
                                    ?>
                                    <?//echo '<pre>'; print_r($newArFiles); echo '</pre>'?>
                                    <li class="documents-files__item">
                                        <a href="" class="documents-files__link">
                                            <img src="<?=$path?>" alt="" class="documents-files__img">
                                            <span class="documents-files__name"><?=$newArFiles["ORIGINAL_NAME"]?></span>
                                            <svg class="documents-files__icon" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                        d="M19 13V17C19 17.5304 18.7893 18.0391 18.4142 18.4142C18.0391 18.7893 17.5304 19 17 19H3C2.46957 19 1.96086 18.7893 1.58579 18.4142C1.21071 18.0391 1 17.5304 1 17V13M5 8L10 13M10 13L15 8M10 13V1"
                                                        stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </a>
                                    </li>
                                <?endforeach;?>
                            </ul>
                        </div>
                        <div class="product-card__buttons product-card__buttons_fixed">
                            <button data-popup="form-popup" class="button button_red product-card__get-price" data-popup="form-popup">Запросить
                                цену</button>
                            <a href="" download class="product-card__download">
                                Опросный лист
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                            d="M19 13V17C19 17.5304 18.7893 18.0391 18.4142 18.4142C18.0391 18.7893 17.5304 19 17 19H3C2.46957 19 1.96086 18.7893 1.58579 18.4142C1.21071 18.0391 1 17.5304 1 17V13M5 8L10 13M10 13L15 8M10 13V1"
                                            stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                    </section>
                </div>
                <div class="tabs__content" data-tab-group="card" data-tab="4">
                    <div class="product-card__inner-slider">
                        <h3>Примеры внедрения</h3>
                        <section class="slider slider_main-top slider_small">
                            <div class="slider__container">
                                <div class="slider__inner">
                                    <div class="slider__text">
                                        <div class="slider__nav">
                                            <div class="slider__pagination slider__pagination_main-top banner-pagination"></div>
                                            <div class="slider__arrows">
                                                <div class="slider__prev slider__prev_main-top slider__arrow">
                                                    <svg width="22" height="18" viewBox="0 0 22 18" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                                d="M9.32879 16.0499C9.70223 16.4436 9.69407 17.0631 9.31038 17.4468C8.91291 17.8442 8.26616 17.8366 7.87816 17.4299L-0.000122857 9.17151L7.87816 0.913123C8.26616 0.506398 8.91291 0.49878 9.31038 0.896257C9.69407 1.27994 9.70223 1.89945 9.32879 2.29311L3.7523 8.17151L21 8.17151C21.5523 8.17151 22 8.61922 22 9.17151C22 9.72379 21.5523 10.1715 21 10.1715L3.7523 10.1715L9.32879 16.0499Z"
                                                                fill="#00318A" />
                                                    </svg>
                                                </div>
                                                <div class="slider__next slider__next_main-top slider__arrow">
                                                    <svg width="22" height="18" viewBox="0 0 22 18" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                                d="M12.6712 2.12161C12.2978 1.72794 12.3059 1.10843 12.6896 0.724748C13.0871 0.327272 13.7338 0.334889 14.1218 0.741615L22.0001 9L14.1218 17.2584C13.7338 17.6651 13.0871 17.6727 12.6896 17.2753C12.3059 16.8916 12.2978 16.2721 12.6712 15.8784L18.2477 10H1C0.447715 10 0 9.55229 0 9C0 8.44771 0.447716 8 1 8H18.2477L12.6712 2.12161Z"
                                                                fill="#00318A" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide slider__item slider__item_text">
                                                <div class="slider__text-inner">
                                                    <div class="slider__item-top">
                                                        <img src="./img/card/slider-logo.png" alt="" class="slider__logo">
                                                        <div class="slider__quantity">
                                                            <span class="slider__number slider__number_big">01/</span>
                                                            <sup class="slider__number slider__number_small">03</sup>
                                                        </div>
                                                    </div>
                                                    <span class="slider__name">ОАО "Фирма РЖД"</span>
                                                    <div class="slider__desc">
                                                        <p>
                                                            Мы поставили для взвешивания автотранспорта при выгрузке вагонов с солодом. Они удобны
                                                            в обращении, мобильны в установке. Так как разгрузка солода производится периодически,
                                                            то имеется возможность убрать их, чтобы через них не проезжал автомобильный транспорт,
                                                            который не требует взвешивания. Станок Advercut K6100 доставляется полностью собранным
                                                            и готовым к работе. Совместными усилиями станок перемещается к месту установки</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slider__image">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide slider__item slider__item_image">
                                                <div class="slider__image-outer">
                                                    <div class="slider__image-block" style="background-image: url(img/card/tech.jpg)">
                                                        <a href="" class="slider__image-link" data-popup="popup-photo"
                                                           data-popup-img="./img/slider-image.jpg"></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="product-card__buttons product-card__buttons_fixed">
                        <button data-popup="form-popup" class="button button_red product-card__get-price" data-popup="form-popup">Запросить
                            цену</button>
                        <a href="" download class="product-card__download">
                            Опросный лист
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M19 13V17C19 17.5304 18.7893 18.0391 18.4142 18.4142C18.0391 18.7893 17.5304 19 17 19H3C2.46957 19 1.96086 18.7893 1.58579 18.4142C1.21071 18.0391 1 17.5304 1 17V13M5 8L10 13M10 13L15 8M10 13V1"
                                        stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="tabs__content" data-tab-group="card" data-tab="5">
                    <div class="slider-reviews slider-reviews_gray inner__slider-reviews product-card__slider-reviews">
                        <div class="slider-reviews__slider swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide slider-reviews__item">
                                    <div class="slider-reviews__left">
                                        <span class="slider-reviews__count">01/<sup>5</sup></span>
                                        <span class="slider-reviews__category">Видеообзоры и отзывы</span>
                                        <span class="slider-reviews__title">Подкладные автомобильные весы УРАЛВЕС</span>
                                        <span class="slider-reviews__post">Генеральный директор Ефремов А.А.</span>
                                        <p>Видеообзор подкладных весов, краткое описание видео...</p>
                                    </div>
                                    <div class="slider-reviews__right slider-reviews__right_img">
                                        <div class="slider-reviews__preview" style="background-image: url(./img/reviews-img.jpg);"
                                             data-popup="slider-reviews-popup" data-popup-img="./img/reviews-img.jpg"></div>
                                    </div>
                                </div>
                                <div class="swiper-slide slider-reviews__item">
                                    <div class="slider-reviews__left">
                                        <span class="slider-reviews__count">02/<sup>5</sup></span>
                                        <span class="slider-reviews__category">Видеообзоры и отзывы</span>
                                        <span class="slider-reviews__title">Подкладные автомобильные весы УРАЛВЕС</span>
                                        <p>Видеообзор подкладных весов, краткое описание видео...</p>
                                    </div>
                                    <div class="slider-reviews__right slider-reviews__right_video">
                                        <div class="slider-reviews__preview" data-popup="slider-reviews-popup"
                                             style="background-image: url(./img/reviews-preview.jpg);"
                                             data-popup-video="https://www.youtube.com/embed/iMS4AxL8StI"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="slider-reviews__pagination"></div>
                            <div class="slider-reviews__nav">
                                <button class="slider-reviews__prev slider-reviews__button">
                                    <svg width="22" height="17" viewBox="0 0 22 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                                d="M9.28625 15.0523C9.67965 15.4409 9.68159 16.0754 9.29058 16.4664C8.90125 16.8558 8.27002 16.8558 7.88069 16.4664L-0.000122821 8.5856L7.88069 0.704845C8.27002 0.315519 8.90125 0.315519 9.29057 0.704847C9.68159 1.09586 9.67965 1.73042 9.28624 2.11904L3.7523 7.5856L21 7.5856C21.5523 7.5856 22 8.03331 22 8.5856C22 9.13788 21.5523 9.5856 21 9.5856L3.7523 9.5856L9.28625 15.0523Z"
                                                fill="#025BFF" />
                                    </svg>
                                </button>
                                <button class="slider-reviews__next slider-reviews__button">
                                    <svg width="22" height="17" viewBox="0 0 22 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                                d="M9.28625 15.0523C9.67965 15.4409 9.68159 16.0754 9.29058 16.4664C8.90125 16.8558 8.27002 16.8558 7.88069 16.4664L-0.000122821 8.5856L7.88069 0.704845C8.27002 0.315519 8.90125 0.315519 9.29057 0.704847C9.68159 1.09586 9.67965 1.73042 9.28624 2.11904L3.7523 7.5856L21 7.5856C21.5523 7.5856 22 8.03331 22 8.5856C22 9.13788 21.5523 9.5856 21 9.5856L3.7523 9.5856L9.28625 15.0523Z"
                                                fill="#025BFF" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="product-card__reviews">
                        <div class="simple-slider-slide simple-slider-slide_white">
                            <span class="simple-slider-slide__title">ТОО "Фирма "Арасан"</span>
                            <span class="simple-slider-slide__post">Генеральный директор Ефремов А.А.</span>
                            <p>Мы приобрели для взвешивания автотранспорта при выгрузке вагонов с солодом. Они удобны в обращении,
                                мобильны в установке. Так как разгрузка солода производится периодически, то имеется возможность
                                убрать их, чтобы через них не проезжал автомобильный транспорт, который не требует взвешивания.</p>
                        </div>
                        <div class="simple-slider-slide simple-slider-slide_white">
                            <span class="simple-slider-slide__title">ТОО "Фирма "Арасан"</span>
                            <span class="simple-slider-slide__post">Генеральный директор Ефремов А.А.</span>
                            <p>Мы приобрели для взвешивания автотранспорта при выгрузке вагонов с солодом. Они удобны в обращении,
                                мобильны в установке. Так как разгрузка солода производится периодически, то имеется возможность
                                убрать их, чтобы через них не проезжал автомобильный транспорт, который не требует взвешивания.</p>
                        </div>
                        <div class="simple-slider-slide simple-slider-slide_white">
                            <span class="simple-slider-slide__title">ТОО "Фирма "Арасан"</span>
                            <span class="simple-slider-slide__post">Генеральный директор Ефремов А.А.</span>
                            <p>Мы приобрели для взвешивания автотранспорта при выгрузке вагонов с солодом. Они удобны в обращении,
                                мобильны в установке. Так как разгрузка солода производится периодически, то имеется возможность
                                убрать их, чтобы через них не проезжал автомобильный транспорт, который не требует взвешивания.</p>
                        </div>
                    </div>
                    <div class="product-card__buttons product-card__buttons_fixed">
                        <button data-popup="form-popup" class="button button_red product-card__get-price" data-popup="form-popup">Запросить
                            цену</button>
                        <a href="" download class="product-card__download">
                            Опросный лист
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M19 13V17C19 17.5304 18.7893 18.0391 18.4142 18.4142C18.0391 18.7893 17.5304 19 17 19H3C2.46957 19 1.96086 18.7893 1.58579 18.4142C1.21071 18.0391 1 17.5304 1 17V13M5 8L10 13M10 13L15 8M10 13V1"
                                        stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="tabs__content" data-tab-group="card" data-tab="6">
                    <form action="" class="configurator-form">
                        <div class="configurator-form__title">Выберите интересующие вас параметры, и заполните заявку. Мы
                            рассчитаем вам цену</div>
                        <div class="configurator-form__row">
                            <div class="configurator-form__row-title">1. Выберите размеры:</div>

                            <label class="filter-check filter__item-check">
                                <input name="radio1" type="radio" value="1">
                                <div class="filter-check__text">0,55х0,75</div>
                            </label>
                            <label class="filter-check filter__item-check">
                                <input name="radio1" type="radio">
                                <div class="filter-check__text" value="1">0,72х0,45</div>
                            </label>
                        </div>

                        <div class="configurator-form__row">
                            <div class="configurator-form__row-title">2. Минимальная нагрузка от (т):</div>

                            <label class="filter-check filter__item-check">
                                <input name="radio2" type="radio" value="1">
                                <div class="filter-check__text">5</div>
                            </label>
                            <label class="filter-check filter__item-check">
                                <input name="radio2" type="radio">
                                <div class="filter-check__text" value="1">10</div>
                            </label>
                            <label class="filter-check filter__item-check">
                                <input name="radio2" type="radio">
                                <div class="filter-check__text" value="1">15</div>
                            </label>
                            <label class="filter-check filter__item-check">
                                <input name="radio2" type="radio">
                                <div class="filter-check__text" value="1">20</div>
                            </label>
                        </div>

                        <div class="configurator-form__row">
                            <div class="configurator-form__row-title">3. Максимальная нагрузка от (т):</div>

                            <label class="filter-check filter__item-check">
                                <input name="radio3" type="radio" value="1">
                                <div class="filter-check__text">5</div>
                            </label>
                            <label class="filter-check filter__item-check">
                                <input name="radio3" type="radio">
                                <div class="filter-check__text" value="1">10</div>
                            </label>
                            <label class="filter-check filter__item-check">
                                <input name="radio3" type="radio">
                                <div class="filter-check__text" value="1">15</div>
                            </label>
                            <label class="filter-check filter__item-check">
                                <input name="radio3" type="radio">
                                <div class="filter-check__text" value="1">20</div>
                            </label>
                        </div>

                        <div class="configurator-form__row">
                            <div class="configurator-form__row-title">4. Длина грузовой платформы, m</div>

                            <label class="filter-check filter__item-check">
                                <input name="radio4" type="checkbox" value="1">
                                <div class="filter-check__text">5</div>
                            </label>
                            <label class="filter-check filter__item-check">
                                <input name="checkbox4" type="checkbox">
                                <div class="filter-check__text" value="1">10</div>
                            </label>
                            <label class="filter-check filter__item-check">
                                <input name="checkbox4" type="checkbox">
                                <div class="filter-check__text" value="1">15</div>
                            </label>
                            <label class="filter-check filter__item-check">
                                <input name="checkbox4" type="checkbox">
                                <div class="filter-check__text" value="1">20</div>
                            </label>

                            <label class="filter-check filter__item-check">
                                <input name="radio4" type="checkbox" value="1">
                                <div class="filter-check__text">5</div>
                            </label>
                            <label class="filter-check filter__item-check">
                                <input name="checkbox4" type="checkbox">
                                <div class="filter-check__text" value="1">10</div>
                            </label>
                            <label class="filter-check filter__item-check">
                                <input name="checkbox4" type="checkbox">
                                <div class="filter-check__text" value="1">15</div>
                            </label>
                            <label class="filter-check filter__item-check">
                                <input name="checkbox4" type="checkbox">
                                <div class="filter-check__text" value="1">20</div>
                            </label>
                        </div>

                        <div class="configurator-form__bottom">
                            <button type="submit"
                                    class="configurator-form__button button button_red product-card__get-price" data-popup="form-popup">Запросить цену</button>
                            <a href="javascript:void(0);" class="configurator-form__button button button_blue button_transparent" id="<?=$itemIds['ADD_BASKET_LINK']?>">
                                <?=$arParams['MESS_BTN_ADD_TO_BASKET']?>
                            </a>
                        </div>
                    </form>

                </div>
                <div data-content="aside-slider" class="product-card__aside-slider"></div>
            </div>
            <aside class="product-card__sidebar inner__sidebar">
                <div data-content="aside-slider">
                    <div class="aside-slider aside-slider_dark">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide aside-slider-slide">
                                <span class="aside-slider-slide__title">Техническая поддержка</span>
                                <div class="aside-slider-slide__content">
                                    <div class="aside-slider-slide__img-wrapper">
                                        <div class="aside-slider-slide__img" style="background-image: url(./img/aside-1.jpg);"></div>
                                    </div>
                                    <div class="aside-slider-slide__top">
                                        <span class="aside-slider-slide__name">Павел бычков</span>
                                        <span class="aside-slider-slide__desc">Начальник отдела поддержки клиентов</span>
                                    </div>
                                    <div class="aside-slider-slide__bottom">
                                        <div class="aside-slider-slide__wrapper">
                                            <div class="aside-slider-slide__left">
                                                <a href="tel:+73422565924" class="aside-slider-slide__phone">+7 (342) 256 59 24</a>
                                                <span class="aside-slider-slide__schedule">Пн-Пт: с 9.00 до 18.00</span>
                                            </div>
                                            <div class="aside-slider-slide__right">
                                                <a href="" class="aside-slider-slide__call">
                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                                d="M17.7059 5.86536L12.8405 5.86536M12.8405 5.86536V1M12.8405 5.86536L17.7059 1.00012M18.1054 13.8782V16.4585C18.1064 16.698 18.0573 16.9351 17.9614 17.1546C17.8654 17.3741 17.7247 17.5711 17.5482 17.733C17.3717 17.895 17.1633 18.0182 16.9364 18.095C16.7094 18.1717 16.469 18.2002 16.2304 18.1787C13.5838 17.8911 11.0416 16.9867 8.80793 15.5382C6.72982 14.2177 4.96795 12.4558 3.64744 10.3777C2.19388 8.13392 1.2893 5.5793 1.00698 2.92078C0.985488 2.68294 1.01375 2.44323 1.08998 2.21691C1.1662 1.99059 1.28872 1.78263 1.44972 1.60625C1.61073 1.42988 1.80669 1.28896 2.02514 1.19247C2.24359 1.09598 2.47974 1.04603 2.71855 1.0458H5.29879C5.7162 1.0417 6.12085 1.1895 6.43734 1.46168C6.75382 1.73386 6.96054 2.11183 7.01896 2.52515C7.12787 3.35088 7.32984 4.16165 7.62102 4.94198C7.73674 5.24982 7.76178 5.58439 7.69318 5.90603C7.62459 6.22767 7.46523 6.52291 7.23398 6.75675L6.14168 7.84906C7.36605 10.0023 9.14892 11.7852 11.3022 13.0096L12.3945 11.9173C12.6283 11.686 12.9236 11.5266 13.2452 11.458C13.5668 11.3895 13.9014 11.4145 14.2093 11.5302C14.9896 11.8214 15.8003 12.0234 16.6261 12.1323C17.0439 12.1912 17.4254 12.4017 17.6982 12.7236C17.971 13.0455 18.1159 13.4564 18.1054 13.8782Z"
                                                                stroke="#025BFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                        <button class="button button_rounded button_blue aside-slider-slide__button">Задать
                                            вопрос</button>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide aside-slider-slide">
                                <span class="aside-slider-slide__title">Техническая поддержка</span>
                                <div class="aside-slider-slide__content">
                                    <div class="aside-slider-slide__img-wrapper">
                                        <div class="aside-slider-slide__img" style="background-image: url(./img/aside-1.jpg);"></div>
                                    </div>
                                    <div class="aside-slider-slide__top">
                                        <span class="aside-slider-slide__name">Павел бычков</span>
                                        <span class="aside-slider-slide__desc">Начальник отдела поддержки клиентов</span>
                                    </div>
                                    <div class="aside-slider-slide__bottom">
                                        <div class="aside-slider-slide__wrapper">
                                            <div class="aside-slider-slide__left">
                                                <a href="tel:+73422565924" class="aside-slider-slide__phone">+7 (342) 256 59 24</a>
                                                <span class="aside-slider-slide__schedule">Пн-Пт: с 9.00 до 18.00</span>
                                            </div>
                                            <div class="aside-slider-slide__right">
                                                <a href="" class="aside-slider-slide__call">
                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                                d="M17.7059 5.86536L12.8405 5.86536M12.8405 5.86536V1M12.8405 5.86536L17.7059 1.00012M18.1054 13.8782V16.4585C18.1064 16.698 18.0573 16.9351 17.9614 17.1546C17.8654 17.3741 17.7247 17.5711 17.5482 17.733C17.3717 17.895 17.1633 18.0182 16.9364 18.095C16.7094 18.1717 16.469 18.2002 16.2304 18.1787C13.5838 17.8911 11.0416 16.9867 8.80793 15.5382C6.72982 14.2177 4.96795 12.4558 3.64744 10.3777C2.19388 8.13392 1.2893 5.5793 1.00698 2.92078C0.985488 2.68294 1.01375 2.44323 1.08998 2.21691C1.1662 1.99059 1.28872 1.78263 1.44972 1.60625C1.61073 1.42988 1.80669 1.28896 2.02514 1.19247C2.24359 1.09598 2.47974 1.04603 2.71855 1.0458H5.29879C5.7162 1.0417 6.12085 1.1895 6.43734 1.46168C6.75382 1.73386 6.96054 2.11183 7.01896 2.52515C7.12787 3.35088 7.32984 4.16165 7.62102 4.94198C7.73674 5.24982 7.76178 5.58439 7.69318 5.90603C7.62459 6.22767 7.46523 6.52291 7.23398 6.75675L6.14168 7.84906C7.36605 10.0023 9.14892 11.7852 11.3022 13.0096L12.3945 11.9173C12.6283 11.686 12.9236 11.5266 13.2452 11.458C13.5668 11.3895 13.9014 11.4145 14.2093 11.5302C14.9896 11.8214 15.8003 12.0234 16.6261 12.1323C17.0439 12.1912 17.4254 12.4017 17.6982 12.7236C17.971 13.0455 18.1159 13.4564 18.1054 13.8782Z"
                                                                stroke="#025BFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                        <button class="button button_rounded button_blue aside-slider-slide__button">Задать
                                            вопрос</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="aside-slider__pagination pagination"></div>
                    </div>
                </div>
            </aside>
        </div>
        <div class="product-card__back-text back-text">
					<span class="back-text__big-letter">
						Н
					</span>
            Надежность
        </div>
    </div>

	<meta itemprop="name" content="<?=$name?>" />
	<meta itemprop="category" content="<?=$arResult['CATEGORY_PATH']?>" />
	<?php
	if ($haveOffers)
	{
		foreach ($arResult['JS_OFFERS'] as $offer)
		{
			$currentOffersList = array();

			if (!empty($offer['TREE']) && is_array($offer['TREE']))
			{
				foreach ($offer['TREE'] as $propName => $skuId)
				{
					$propId = (int)mb_substr($propName, 5);

					foreach ($skuProps as $prop)
					{
						if ($prop['ID'] == $propId)
						{
							foreach ($prop['VALUES'] as $propId => $propValue)
							{
								if ($propId == $skuId)
								{
									$currentOffersList[] = $propValue['NAME'];
									break;
								}
							}
						}
					}
				}
			}

			$offerPrice = $offer['ITEM_PRICES'][$offer['ITEM_PRICE_SELECTED']];
			?>
			<span itemprop="offers" itemscope itemtype="http://schema.org/Offer">
				<meta itemprop="sku" content="<?=htmlspecialcharsbx(implode('/', $currentOffersList))?>" />
				<meta itemprop="price" content="<?=$offerPrice['RATIO_PRICE']?>" />
				<meta itemprop="priceCurrency" content="<?=$offerPrice['CURRENCY']?>" />
				<link itemprop="availability" href="http://schema.org/<?=($offer['CAN_BUY'] ? 'InStock' : 'OutOfStock')?>" />
			</span>
			<?php
		}

		unset($offerPrice, $currentOffersList);
	}
	else
	{
		?>
		<span itemprop="offers" itemscope itemtype="http://schema.org/Offer">
			<meta itemprop="price" content="<?=$price['RATIO_PRICE']?>" />
			<meta itemprop="priceCurrency" content="<?=$price['CURRENCY']?>" />
			<link itemprop="availability" href="http://schema.org/<?=($actualItem['CAN_BUY'] ? 'InStock' : 'OutOfStock')?>" />
		</span>
		<?php
	}
	?>
</section >
<?php
if ($haveOffers)
{
	$offerIds = array();
	$offerCodes = array();

	$useRatio = $arParams['USE_RATIO_IN_RANGES'] === 'Y';

	foreach ($arResult['JS_OFFERS'] as $ind => &$jsOffer)
	{
		$offerIds[] = (int)$jsOffer['ID'];
		$offerCodes[] = $jsOffer['CODE'];

		$fullOffer = $arResult['OFFERS'][$ind];
		$measureName = $fullOffer['ITEM_MEASURE']['TITLE'];

		$strAllProps = '';
		$strMainProps = '';
		$strPriceRangesRatio = '';
		$strPriceRanges = '';

		if ($arResult['SHOW_OFFERS_PROPS'])
		{
			if (!empty($jsOffer['DISPLAY_PROPERTIES']))
			{
				foreach ($jsOffer['DISPLAY_PROPERTIES'] as $property)
				{
					$current = '<dt>'.$property['NAME'].'</dt><dd>'.(
						is_array($property['VALUE'])
							? implode(' / ', $property['VALUE'])
							: $property['VALUE']
						).'</dd>';
					$strAllProps .= $current;

					if (isset($arParams['MAIN_BLOCK_OFFERS_PROPERTY_CODE'][$property['CODE']]))
					{
						$strMainProps .= $current;
					}
				}

				unset($current);
			}
		}

		if ($arParams['USE_PRICE_COUNT'] && count($jsOffer['ITEM_QUANTITY_RANGES']) > 1)
		{
			$strPriceRangesRatio = '('.Loc::getMessage(
					'CT_BCE_CATALOG_RATIO_PRICE',
					array('#RATIO#' => ($useRatio
							? $fullOffer['ITEM_MEASURE_RATIOS'][$fullOffer['ITEM_MEASURE_RATIO_SELECTED']]['RATIO']
							: '1'
						).' '.$measureName)
				).')';

			foreach ($jsOffer['ITEM_QUANTITY_RANGES'] as $range)
			{
				if ($range['HASH'] !== 'ZERO-INF')
				{
					$itemPrice = false;

					foreach ($jsOffer['ITEM_PRICES'] as $itemPrice)
					{
						if ($itemPrice['QUANTITY_HASH'] === $range['HASH'])
						{
							break;
						}
					}

					if ($itemPrice)
					{
						$strPriceRanges .= '<dt>'.Loc::getMessage(
								'CT_BCE_CATALOG_RANGE_FROM',
								array('#FROM#' => $range['SORT_FROM'].' '.$measureName)
							).' ';

						if (is_infinite($range['SORT_TO']))
						{
							$strPriceRanges .= Loc::getMessage('CT_BCE_CATALOG_RANGE_MORE');
						}
						else
						{
							$strPriceRanges .= Loc::getMessage(
								'CT_BCE_CATALOG_RANGE_TO',
								array('#TO#' => $range['SORT_TO'].' '.$measureName)
							);
						}

						$strPriceRanges .= '</dt><dd>'.($useRatio ? $itemPrice['PRINT_RATIO_PRICE'] : $itemPrice['PRINT_PRICE']).'</dd>';
					}
				}
			}

			unset($range, $itemPrice);
		}

		$jsOffer['DISPLAY_PROPERTIES'] = $strAllProps;
		$jsOffer['DISPLAY_PROPERTIES_MAIN_BLOCK'] = $strMainProps;
		$jsOffer['PRICE_RANGES_RATIO_HTML'] = $strPriceRangesRatio;
		$jsOffer['PRICE_RANGES_HTML'] = $strPriceRanges;
	}

	$templateData['OFFER_IDS'] = $offerIds;
	$templateData['OFFER_CODES'] = $offerCodes;
	unset($jsOffer, $strAllProps, $strMainProps, $strPriceRanges, $strPriceRangesRatio, $useRatio);

	$jsParams = array(
		'CONFIG' => array(
			'USE_CATALOG' => $arResult['CATALOG'],
			'SHOW_QUANTITY' => $arParams['USE_PRODUCT_QUANTITY'],
			'SHOW_PRICE' => true,
			'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'] === 'Y',
			'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'] === 'Y',
			'USE_PRICE_COUNT' => $arParams['USE_PRICE_COUNT'],
			'DISPLAY_COMPARE' => $arParams['DISPLAY_COMPARE'],
			'SHOW_SKU_PROPS' => $arResult['SHOW_OFFERS_PROPS'],
			'OFFER_GROUP' => $arResult['OFFER_GROUP'],
			'MAIN_PICTURE_MODE' => $arParams['DETAIL_PICTURE_MODE'],
			'ADD_TO_BASKET_ACTION' => $arParams['ADD_TO_BASKET_ACTION'],
			'SHOW_CLOSE_POPUP' => $arParams['SHOW_CLOSE_POPUP'] === 'Y',
			'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
			'RELATIVE_QUANTITY_FACTOR' => $arParams['RELATIVE_QUANTITY_FACTOR'],
			'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
			'USE_STICKERS' => true,
			'USE_SUBSCRIBE' => $showSubscribe,
			'SHOW_SLIDER' => $arParams['SHOW_SLIDER'],
			'SLIDER_INTERVAL' => $arParams['SLIDER_INTERVAL'],
			'ALT' => $alt,
			'TITLE' => $title,
			'MAGNIFIER_ZOOM_PERCENT' => 200,
			'USE_ENHANCED_ECOMMERCE' => $arParams['USE_ENHANCED_ECOMMERCE'],
			'DATA_LAYER_NAME' => $arParams['DATA_LAYER_NAME'],
			'BRAND_PROPERTY' => !empty($arResult['DISPLAY_PROPERTIES'][$arParams['BRAND_PROPERTY']])
				? $arResult['DISPLAY_PROPERTIES'][$arParams['BRAND_PROPERTY']]['DISPLAY_VALUE']
				: null,
			'SHOW_SKU_DESCRIPTION' => $arParams['SHOW_SKU_DESCRIPTION'],
			'DISPLAY_PREVIEW_TEXT_MODE' => $arParams['DISPLAY_PREVIEW_TEXT_MODE']
		),
		'PRODUCT_TYPE' => $arResult['PRODUCT']['TYPE'],
		'VISUAL' => $itemIds,
		'DEFAULT_PICTURE' => array(
			'PREVIEW_PICTURE' => $arResult['DEFAULT_PICTURE'],
			'DETAIL_PICTURE' => $arResult['DEFAULT_PICTURE']
		),
		'PRODUCT' => array(
			'ID' => $arResult['ID'],
			'ACTIVE' => $arResult['ACTIVE'],
			'NAME' => $arResult['~NAME'],
			'CATEGORY' => $arResult['CATEGORY_PATH'],
			'DETAIL_TEXT' => $arResult['DETAIL_TEXT'],
			'DETAIL_TEXT_TYPE' => $arResult['DETAIL_TEXT_TYPE'],
			'PREVIEW_TEXT' => $arResult['PREVIEW_TEXT'],
			'PREVIEW_TEXT_TYPE' => $arResult['PREVIEW_TEXT_TYPE']
		),
		'BASKET' => array(
			'QUANTITY' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
			'BASKET_URL' => $arParams['BASKET_URL'],
			'SKU_PROPS' => $arResult['OFFERS_PROP_CODES'],
			'ADD_URL_TEMPLATE' => $arResult['~ADD_URL_TEMPLATE'],
			'BUY_URL_TEMPLATE' => $arResult['~BUY_URL_TEMPLATE']
		),
		'OFFERS' => $arResult['JS_OFFERS'],
		'OFFER_SELECTED' => $arResult['OFFERS_SELECTED'],
		'TREE_PROPS' => $skuProps
	);
}
else
{
	$emptyProductProperties = empty($arResult['PRODUCT_PROPERTIES']);
	if ($arParams['ADD_PROPERTIES_TO_BASKET'] === 'Y' && !$emptyProductProperties)
	{
		?>
		<div id="<?=$itemIds['BASKET_PROP_DIV']?>" style="display: none;">
			<?php
			if (!empty($arResult['PRODUCT_PROPERTIES_FILL']))
			{
				foreach ($arResult['PRODUCT_PROPERTIES_FILL'] as $propId => $propInfo)
				{
					?>
					<input type="hidden" name="<?=$arParams['PRODUCT_PROPS_VARIABLE']?>[<?=$propId?>]" value="<?=htmlspecialcharsbx($propInfo['ID'])?>">
					<?php
					unset($arResult['PRODUCT_PROPERTIES'][$propId]);
				}
			}

			$emptyProductProperties = empty($arResult['PRODUCT_PROPERTIES']);
			if (!$emptyProductProperties)
			{
				?>
				<table>
					<?php
					foreach ($arResult['PRODUCT_PROPERTIES'] as $propId => $propInfo)
					{
						?>
						<tr>
							<td><?=$arResult['PROPERTIES'][$propId]['NAME']?></td>
							<td>
								<?php
								if (
									$arResult['PROPERTIES'][$propId]['PROPERTY_TYPE'] === 'L'
									&& $arResult['PROPERTIES'][$propId]['LIST_TYPE'] === 'C'
								)
								{
									foreach ($propInfo['VALUES'] as $valueId => $value)
									{
										?>
										<label>
											<input type="radio" name="<?=$arParams['PRODUCT_PROPS_VARIABLE']?>[<?=$propId?>]"
												value="<?=$valueId?>" <?=($valueId == $propInfo['SELECTED'] ? '"checked"' : '')?>>
											<?=$value?>
										</label>
										<br>
										<?php
									}
								}
								else
								{
									?>
									<select name="<?=$arParams['PRODUCT_PROPS_VARIABLE']?>[<?=$propId?>]">
										<?php
										foreach ($propInfo['VALUES'] as $valueId => $value)
										{
											?>
											<option value="<?=$valueId?>" <?=($valueId == $propInfo['SELECTED'] ? '"selected"' : '')?>>
												<?=$value?>
											</option>
											<?php
										}
										?>
									</select>
									<?php
								}
								?>
							</td>
						</tr>
						<?php
					}
					?>
				</table>
				<?php
			}
			?>
		</div>
		<?php
	}

	$jsParams = array(
		'CONFIG' => array(
			'USE_CATALOG' => $arResult['CATALOG'],
			'SHOW_QUANTITY' => $arParams['USE_PRODUCT_QUANTITY'],
			'SHOW_PRICE' => !empty($arResult['ITEM_PRICES']),
			'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'] === 'Y',
			'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'] === 'Y',
			'USE_PRICE_COUNT' => $arParams['USE_PRICE_COUNT'],
			'DISPLAY_COMPARE' => $arParams['DISPLAY_COMPARE'],
			'MAIN_PICTURE_MODE' => $arParams['DETAIL_PICTURE_MODE'],
			'ADD_TO_BASKET_ACTION' => $arParams['ADD_TO_BASKET_ACTION'],
			'SHOW_CLOSE_POPUP' => $arParams['SHOW_CLOSE_POPUP'] === 'Y',
			'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
			'RELATIVE_QUANTITY_FACTOR' => $arParams['RELATIVE_QUANTITY_FACTOR'],
			'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
			'USE_STICKERS' => true,
			'USE_SUBSCRIBE' => $showSubscribe,
			'SHOW_SLIDER' => $arParams['SHOW_SLIDER'],
			'SLIDER_INTERVAL' => $arParams['SLIDER_INTERVAL'],
			'ALT' => $alt,
			'TITLE' => $title,
			'MAGNIFIER_ZOOM_PERCENT' => 200,
			'USE_ENHANCED_ECOMMERCE' => $arParams['USE_ENHANCED_ECOMMERCE'],
			'DATA_LAYER_NAME' => $arParams['DATA_LAYER_NAME'],
			'BRAND_PROPERTY' => !empty($arResult['DISPLAY_PROPERTIES'][$arParams['BRAND_PROPERTY']])
				? $arResult['DISPLAY_PROPERTIES'][$arParams['BRAND_PROPERTY']]['DISPLAY_VALUE']
				: null
		),
		'VISUAL' => $itemIds,
		'PRODUCT_TYPE' => $arResult['PRODUCT']['TYPE'],
		'PRODUCT' => array(
			'ID' => $arResult['ID'],
			'ACTIVE' => $arResult['ACTIVE'],
			'PICT' => reset($arResult['MORE_PHOTO']),
			'NAME' => $arResult['~NAME'],
			'SUBSCRIPTION' => true,
			'ITEM_PRICE_MODE' => $arResult['ITEM_PRICE_MODE'],
			'ITEM_PRICES' => $arResult['ITEM_PRICES'],
			'ITEM_PRICE_SELECTED' => $arResult['ITEM_PRICE_SELECTED'],
			'ITEM_QUANTITY_RANGES' => $arResult['ITEM_QUANTITY_RANGES'],
			'ITEM_QUANTITY_RANGE_SELECTED' => $arResult['ITEM_QUANTITY_RANGE_SELECTED'],
			'ITEM_MEASURE_RATIOS' => $arResult['ITEM_MEASURE_RATIOS'],
			'ITEM_MEASURE_RATIO_SELECTED' => $arResult['ITEM_MEASURE_RATIO_SELECTED'],
			'SLIDER_COUNT' => $arResult['MORE_PHOTO_COUNT'],
			'SLIDER' => $arResult['MORE_PHOTO'],
			'CAN_BUY' => $arResult['CAN_BUY'],
			'CHECK_QUANTITY' => $arResult['CHECK_QUANTITY'],
			'QUANTITY_FLOAT' => is_float($arResult['ITEM_MEASURE_RATIOS'][$arResult['ITEM_MEASURE_RATIO_SELECTED']]['RATIO']),
			'MAX_QUANTITY' => $arResult['PRODUCT']['QUANTITY'],
			'STEP_QUANTITY' => $arResult['ITEM_MEASURE_RATIOS'][$arResult['ITEM_MEASURE_RATIO_SELECTED']]['RATIO'],
			'CATEGORY' => $arResult['CATEGORY_PATH']
		),
		'BASKET' => array(
			'ADD_PROPS' => $arParams['ADD_PROPERTIES_TO_BASKET'] === 'Y',
			'QUANTITY' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
			'PROPS' => $arParams['PRODUCT_PROPS_VARIABLE'],
			'EMPTY_PROPS' => $emptyProductProperties,
			'BASKET_URL' => $arParams['BASKET_URL'],
			'ADD_URL_TEMPLATE' => $arResult['~ADD_URL_TEMPLATE'],
			'BUY_URL_TEMPLATE' => $arResult['~BUY_URL_TEMPLATE']
		)
	);
	unset($emptyProductProperties);
}

if ($arParams['DISPLAY_COMPARE'])
{
	$jsParams['COMPARE'] = array(
		'COMPARE_URL_TEMPLATE' => $arResult['~COMPARE_URL_TEMPLATE'],
		'COMPARE_DELETE_URL_TEMPLATE' => $arResult['~COMPARE_DELETE_URL_TEMPLATE'],
		'COMPARE_PATH' => $arParams['COMPARE_PATH']
	);
}
?>
<script>
	BX.message({
		ECONOMY_INFO_MESSAGE: '<?=GetMessageJS('CT_BCE_CATALOG_ECONOMY_INFO2')?>',
		TITLE_ERROR: '<?=GetMessageJS('CT_BCE_CATALOG_TITLE_ERROR')?>',
		TITLE_BASKET_PROPS: '<?=GetMessageJS('CT_BCE_CATALOG_TITLE_BASKET_PROPS')?>',
		BASKET_UNKNOWN_ERROR: '<?=GetMessageJS('CT_BCE_CATALOG_BASKET_UNKNOWN_ERROR')?>',
		BTN_SEND_PROPS: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_SEND_PROPS')?>',
		BTN_MESSAGE_BASKET_REDIRECT: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_BASKET_REDIRECT')?>',
		BTN_MESSAGE_CLOSE: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_CLOSE')?>',
		BTN_MESSAGE_CLOSE_POPUP: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_CLOSE_POPUP')?>',
		TITLE_SUCCESSFUL: '<?=GetMessageJS('CT_BCE_CATALOG_ADD_TO_BASKET_OK')?>',
		COMPARE_MESSAGE_OK: '<?=GetMessageJS('CT_BCE_CATALOG_MESS_COMPARE_OK')?>',
		COMPARE_UNKNOWN_ERROR: '<?=GetMessageJS('CT_BCE_CATALOG_MESS_COMPARE_UNKNOWN_ERROR')?>',
		COMPARE_TITLE: '<?=GetMessageJS('CT_BCE_CATALOG_MESS_COMPARE_TITLE')?>',
		BTN_MESSAGE_COMPARE_REDIRECT: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_COMPARE_REDIRECT')?>',
		PRODUCT_GIFT_LABEL: '<?=GetMessageJS('CT_BCE_CATALOG_PRODUCT_GIFT_LABEL')?>',
		PRICE_TOTAL_PREFIX: '<?=GetMessageJS('CT_BCE_CATALOG_MESS_PRICE_TOTAL_PREFIX')?>',
		RELATIVE_QUANTITY_MANY: '<?=CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_MANY'])?>',
		RELATIVE_QUANTITY_FEW: '<?=CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_FEW'])?>',
		SITE_ID: '<?=CUtil::JSEscape($component->getSiteId())?>'
	});

	var <?=$obName?> = new JCCatalogElement(<?=CUtil::PhpToJSObject($jsParams, false, true)?>);
</script>
<?php
unset($actualItem, $itemIds, $jsParams);
