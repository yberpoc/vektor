<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
echo 123;
$APPLICATION->IncludeComponent("bitrix:form.result.view", "", $arParams, $component);
?>