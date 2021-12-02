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


$arBasket = array();
$products_in_cart = CSaleBasket::GetList(
    array(), // сортировка
    array(
        'FUSER_ID' => CSaleBasket::GetBasketUserID(),
        'LID' => SITE_ID,
        'ORDER_ID' => NULL
    ),
    false, // группировать
    false, // постраничная навигация
    array(
        "ID",
        "NAME",
        "CALLBACK_FUNC",
        "MODULE",
        "PRODUCT_ID",
        "QUANTITY",
        "DELAY",
        "CAN_BUY",
        "PRICE",
        "ORDER_PRICE",
        "BASE_PRICE",
        "WEIGHT"
    )
);
while ($product = $products_in_cart->Fetch()) {
    $arFilter = array("IBLOCK_ID"=>5, "ID"=>$product['PRODUCT_ID'], "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
    $arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM", "PREVIEW_PICTURE", "PREVIEW_TEXT", "DETAIL_PAGE_URL");
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
    while ($ob = $res->GetNextElement())
    {
        $arFields = $ob->GetFields();
        $img = CFile::GetPath($arFields["PREVIEW_PICTURE"]);
        $arFields["ID"] = $product['PRODUCT_ID'];
        $arFields["PREVIEW_PICTURE"] = $img;
        $arFields["PRICE"] = $product["PRICE"];
        $arFields["EL_BASKET_ID"] = $product["ID"];
        $arFields["QUANTITY"] = $product["QUANTITY"];

        $arBasket[] = $arFields;
    }
    $arResultItems[] = $product;
}

$count = $_REQUEST["quantity"];
$ID = $_REQUEST["ID"];

if ($_GET["method"] == 'addQuantity') {
    $arFields = array("QUANTITY" => $count + 1);
    CSaleBasket::Update($ID, $arFields);
    header('Location: /');
}
if ($_GET["method"] == 'deleteQuantity') {
    $arFields = array("QUANTITY" => $count - 1);
    CSaleBasket::Update($ID, $arFields);
    header('Location: /');
}
if ($_GET["method"] == 'delete') {
    CSaleBasket::Delete($ID);
    header('Location: /');
}



$arResult = array(
    "ITEMS" => $arBasket,
    "ERROR" => "",
);


// Допустим некоторые поля приходит в запросе
if (isset($_POST["sub"])) {
    $productId = $arFields["ID"];
    $phone = $_REQUEST["phone"];
    $name = $_REQUEST["name"];
    $email = $_REQUEST["email"];
    $company_name = $_REQUEST["company_name"];

    $siteId = Context::getCurrent()->getSite();
    $currencyCode = CurrencyManager::getBaseCurrency();

    // Создаёт новый заказ
    $order = Order::create($siteId, $USER->isAuthorized() ? $USER->GetID() : 539);
    $order->setPersonTypeId(1);
    $order->setField('CURRENCY', $currencyCode);


    $propertyCollection = $order->getPropertyCollection();

    $propertyCollection->getItemByOrderPropertyId(1)->setValue($name);
    $propertyCollection->getItemByOrderPropertyId(3)->setValue($email);
    $propertyCollection->getItemByOrderPropertyId(2)->setValue($phone);
    $propertyCollection->getItemByOrderPropertyId(4)->setValue($company_name);


    // Создаём корзину с одним товаром
    $basket = Basket::create($siteId);
    $item = $basket->createItem('catalog', $productId);
    $item->setFields(array(
        'QUANTITY' => 1,
        'CURRENCY' => $currencyCode,
        'LID' => $siteId,
        'PRODUCT_PROVIDER_CLASS' => '\CCatalogProductProvider',
    ));
    $order->setBasket($basket);

    // Создаём одну отгрузку и устанавливаем способ доставки - "Без доставки" (он служебный)
    $shipmentCollection = $order->getShipmentCollection();
    $shipment = $shipmentCollection->createItem();
    $service = Delivery\Services\Manager::getById(Delivery\Services\EmptyDeliveryService::getEmptyDeliveryServiceId());
    $shipment->setFields(array(
        'DELIVERY_ID' => $service['ID'],
        'DELIVERY_NAME' => $service['NAME'],
    ));
    $shipmentItemCollection = $shipment->getShipmentItemCollection();
    $shipmentItem = $shipmentItemCollection->createItem($item);
    $shipmentItem->setQuantity($item->getQuantity());

    // Устанавливаем свойства
    $propertyCollection = $order->getPropertyCollection();
    $phoneProp = $propertyCollection->getPhone();
    $phoneProp->setValue($phone);
    $emailProp = $propertyCollection->getPhone();
    $phoneProp->setValue($email);
    $nameProp = $propertyCollection->getPayerName();
    $nameProp->setValue($name);
    $companyProp = $propertyCollection->getPayerName();
    $nameProp->setValue($company_name);

    // Сохраняем
    $order->doFinalAction(true);
    $result = $order->save();
    $orderId = $order->getId();
    header('Location: /basket/order_submit.php');


}
$this->includeComponentTemplate();
