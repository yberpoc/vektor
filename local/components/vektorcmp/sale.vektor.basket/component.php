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
        $arFields["PREVIEW_PICTURE"] = $img;
        $arFields["PRICE"] = $product["PRICE"];
        $arFields["EL_BASKET_ID"] = $product["ID"];
        $arFields["QUANTITY"] = $product["QUANTITY"];

        $arBasket[] = $arFields;
    }
    $arResultItems[] = $product;
}

// <получение данных корзины со свойствами товаров из инфоблока>
$arBasketProps = array();
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
		"ID",
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

while ($arItems = $dbBasketItems->Fetch()) {
	if (strlen($arItems["CALLBACK_FUNC"]) > 0)
	{
		CSaleBasket::UpdatePrice($arItems["PRODUCT_ID"]);
		$arItems = CSaleBasket::GetByID($arItems["ID"]);
	}
	$arFilter = array("IBLOCK_ID"=>5, "ID"=>$arItems['PRODUCT_ID'], "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
	$arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM", "PREVIEW_PICTURE", "PREVIEW_TEXT", "DETAIL_PAGE_URL");
	$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
	while ($ob = $res->GetNextElement())
	{
		$arFields = $ob->GetFields();
		$img = CFile::GetPath($arFields["PREVIEW_PICTURE"]);
		$arFields["PREVIEW_PICTURE"] = $img;
		$arFields["PRICE"] = $arItems["PRICE"];
		$arFields["EL_BASKET_ID"] = $arItems["ID"];
		$arFields["QUANTITY"] = $arItems["QUANTITY"];

		$arBasketProps[] = $arFields;
	}
	$arResultItems[] = $arItems;
}
echo '<pre>';
print_r($_REQUEST["ID"]);
echo '</pre>';

$count = $_REQUEST["quantity"];
$ID = $_REQUEST["ID"];
<<<<<<< HEAD
if ($_GET["method"] == 'addQuantity') {
    $arFields = array("QUANTITY" => ++$count);
    CSaleBasket::Update($ID, $arFields);
    header('Location: index.php');
}
if ($_GET["method"] == 'deleteQuantity') {
    $arFields = array("QUANTITY" => --$count);
    CSaleBasket::Update($ID, $arFields);
    header('Location: index.php');
}
if ($_GET["method"] == 'delete') {
    CSaleBasket::Delete($ID);
    header('Location: index.php');
=======
switch ($_GET["method"]) {
	case 'addQuantity':
		$arFields = array("QUANTITY" => ++$count);
		CSaleBasket::Update($ID, $arFields);
		header('Location: /basket/index.php');
		break;
	case 'delQuantity':
		$arFields = array("QUANTITY" => --$count);
		CSaleBasket::Update($ID, $arFields);
		header('Location: /basket/index.php');
		break;
	case 'deleteProduct':
		CSaleBasket::Delete($ID);
		header('Location: /basket/index.php');
		break;
>>>>>>> a217285b1da4b38643c1fe3fdd6e287a9c6b7d8c
}



// <данные введённые пользователем>
$person = $_REQUEST['person'];
$company = $_REQUEST['company_name'];
$phone = $_REQUEST['phone'];
$email = $_REQUEST['email'];
// </данные введённые пользователем>



$arResult = array(
<<<<<<< HEAD
    "ITEMS" => $arBasket,
    "ERROR" => "",
=======
	"ITEMS" => $arBasketProps,
	"ERROR" => "",
>>>>>>> a217285b1da4b38643c1fe3fdd6e287a9c6b7d8c
);


if ($USER->IsAuthorized()) {
	$userID = $USER->GetID();
} else {
	$arUser = getUserIDByEmail($email); // получение ID пользователя по email
	if (empty($arUser)){
		$userID = createUser($person, $email, $company); // создание пользователя
	} else {
		$userID = $arUser["ID"];
	}
}
if (isset($userID)) {
<<<<<<< HEAD
    setOrder($userID, $person, $company, $phone, $email); // отправка заказа
=======
	setOrder($userID, $person, $company, $phone, $email, $task, $comment, $agreement); // отправка заказа
>>>>>>> a217285b1da4b38643c1fe3fdd6e287a9c6b7d8c
} else {
	echo 'ошибка';
}

// <функция для отправки заказа>
<<<<<<< HEAD
function setOrder($userID, $person, $company, $phone, $email){
    if (isset($person) && isset($company) && isset($email)){
        $order = Order::create(SITE_ID, $userID);
        $order->setPersonTypeId(2);
        header('Location: /basket/index.php');

        // Создаёт корзину с товаром
        $basket = Bitrix\Sale\Basket::loadItemsForFUser(Bitrix\Sale\Fuser::getId(), Bitrix\Main\Context::getCurrent()->getSite());
        $order->setBasket($basket);

        $propertyCollection = $order->getPropertyCollection();
        header('Location: /basket/index.php');

        $propertyCollection->getItemByOrderPropertyId(12)->setValue($person);
        $propertyCollection->getItemByOrderPropertyId(13)->setValue($email);
        $propertyCollection->getItemByOrderPropertyId(14)->setValue($phone);
        $propertyCollection->getItemByOrderPropertyId(8)->setValue($company);
        //$propertyCollection->getItemByOrderPropertyId(22)->setValue($task);

        $order->doFinalAction(true);
        $result = $order->save();
        $orderId = $order->getId();
        header('Location: /basket/index.php');
    }
=======
function setOrder($userID, $person, $company, $phone, $email, $task, $comment, $agreement){
	if (isset($person) && isset($company) && isset($email)){
		$order = Order::create(SITE_ID, $userID);
		$order->setPersonTypeId(2);

		// Создаёт корзину с товаром
		$basket = Bitrix\Sale\Basket::loadItemsForFUser(Bitrix\Sale\Fuser::getId(), Bitrix\Main\Context::getCurrent()->getSite());
		$order->setBasket($basket);

		if ($comment) {
			$order->setField('USER_DESCRIPTION', $comment); // Устанавливаем поля комментария покупателя
		}

		$propertyCollection = $order->getPropertyCollection();

		$propertyCollection->getItemByOrderPropertyId(12)->setValue($person);
		$propertyCollection->getItemByOrderPropertyId(13)->setValue($email);
		$propertyCollection->getItemByOrderPropertyId(14)->setValue($phone);
		$propertyCollection->getItemByOrderPropertyId(8)->setValue($company);
		//$propertyCollection->getItemByOrderPropertyId(22)->setValue($task);

		$order->doFinalAction(true);
		$result = $order->save();
		$orderId = $order->getId();
		header('Location: /basket/successful.php');
	}
>>>>>>> a217285b1da4b38643c1fe3fdd6e287a9c6b7d8c
}
// </функция для отправки заказа>

// <функция создания пользователя>
function createUser($person, $email, $company) {
	$user = new CUser;
	$arFieldsUser = Array(
		"LOGIN" => $person,
		"NAME" => $person,
		"EMAIL" => $email,
		"PASSWORD" => "123456",
		"CONFIRM_PASSWORD"  => "123456",
		"WORK_COMPANY" => $company,
	);
	return $user->Add($arFieldsUser);
}
// </функция создания пользователя>

// <функция получения ID пользователя по email>
function getUserIDByEmail($email) {
	$filter = Array("EMAIL" => $email);
	$rsUser = CUser::GetList(($by="id"), ($order="desc"), $filter);
	return $rsUser->Fetch();
}
// </функция получения ID пользователя по email>

$this->includeComponentTemplate();

