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
echo '<pre>';
print_r($_REQUEST["ID"]);
echo '</pre>';

$count = $_REQUEST["quantity"];
$ID = $_REQUEST["ID"];

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
}



// <данные введённые пользователем>
$person = $_REQUEST['person'];
$company = $_REQUEST['company_name'];
$phone = $_REQUEST['phone'];
$email = $_REQUEST['email'];
// </данные введённые пользователем>



$arResult = array(
	"ITEMS" => $arBasket,
	"ERROR" => "",
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
	setOrder($userID, $person, $company, $phone, $email); // отправка заказа
} else {
	echo 'ошибка';
}

// <функция для отправки заказа>

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