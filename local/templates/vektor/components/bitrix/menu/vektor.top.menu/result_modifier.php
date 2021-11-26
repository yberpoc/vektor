<?php
//\Bitrix\Main\Loader::IncludeModule('iblock');
//
//$arFilter = ["IBLOCK_ID" => 5];
//$arOrder = ["LEFT_MARGIN" => "ASC"];
//$arSelect = [
//    "ID",
//    "DEPTH_LEVEL",
//    "NAME",
//    "UF_IMG__SVG"
//];
//
//$resSections = \CIBlockSection::GetList($arOrder, $arFilter, false, $arSelect);
//
//while($arSection = $resSections->GetNext())
//{
//    $arResult["SECTIONS"][] = array(
//        "ID" => $arSection["ID"],
//        "PICTURE" => $arSection["UF_IMG__SVG"],
//        "DEPTH_LEVEL" => $arSection["DEPTH_LEVEL"],
//        "~NAME" => $arSection["~NAME"],
//        "~SECTION_PAGE_URL" => $arSection["~SECTION_PAGE_URL"],
//    );
//    $arResult["ELEMENT_LINKS"][$arSection["ID"]] = array();
//}
//echo '<pre>';
//print_r($arResult);
//echo '</pre>';