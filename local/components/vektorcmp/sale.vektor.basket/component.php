<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
global $USER;
use Bitrix\Main\Context,
    Bitrix\Currency\CurrencyManager,
    Bitrix\Sale\Order,
    Bitrix\Sale\Basket,
    Bitrix\Sale\Delivery,
    Bitrix\Sale\PaySystem;
CModule::IncludeModule("sale");
CModule::IncludeModule("catalog");
CModule::IncludeModule("iblock");

// получение данных корзины со свойствами товаров из инфоблока
$arBasketItems = array();

$dbBasketItems = CSaleBasket::GetList(
    array(
        "NAME" => "ASC",
        "ID" => "ASC"
    ),
    array(
        "FUSER_ID" => CSaleBasket::GetBasketUserID(),
        "LID" => SITE_ID,
        "ORDER_ID" => "NULL"
    ),
    false,
    false,
    array(
        'ID',
        'PRODUCT_ID',
        'NAME',
        'PRICE',
        'BASE_PRICE',
        'QUANTITY',
        'DETAIL_PAGE_URL',
        'CALLBACK_FUNC',
    )
);

while ($arItems = $dbBasketItems->Fetch()) {
    if (strlen($arItems["CALLBACK_FUNC"]) > 0)
    {
        CSaleBasket::UpdatePrice($arItems["PRODUCT_ID"]);
        $arItems = CSaleBasket::GetByID($arItems["ID"]);
    }

    $res = CIBlockElement::GetList(
        array(),
        array(
            'IBLOCK_ID' => 5,
            'ID' => $arItems['PRODUCT_ID'],
            'ACTIVE_DATE' => 'Y',
            'ACTIVE' => 'Y'
        ),
        false,
        false,
        array(
            'ID',
            'NAME',
            'PREVIEW_PICTURE',
            'DETAIL_PAGE_URL'
        )
    );

    while ($ob = $res->GetNextElement()) {
        $arFields = $ob->GetFields();

        if($arFields['PREVIEW_PICTURE']){
            $img = CFile::GetPath($arFields['PREVIEW_PICTURE']);

            $arFields['PREVIEW_PICTURE'] = $img;
        } else {
            $arFields['PREVIEW_PICTURE'] = '/local/components/vitacmp/vita.small.basket/images/no_photo.png';
        }

        $arFields['PRICE'] = $arItems['PRICE'];
        $arFields['QUANTITY'] = $arItems['QUANTITY'];

        $arBasketItems[] = $arFields;
    }
    $arItems['PREVIEW_PICTURE'] = $arFields['PREVIEW_PICTURE'];

    $arResultItems[] = $arItems;
}

$totalPrice = 0;
foreach($arResultItems as $price){
    $totalPrice += $price['PRICE'] * $price['QUANTITY'];
}

$arResult['ITEMS'] = $arResultItems;
$arResult['COUNT'] = count($arResult['ITEMS']);
$arResult['TOTAL_PRICE'] = $totalPrice;
$this->includeComponentTemplate();
?>