<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

global $APPLICATION;

$aMenuLinksExt = $APPLICATION->IncludeComponent("vektorcmp:menu.sections.catalog", "", array(
    "IS_SEF" => "Y",
    "SEF_BASE_URL" => "",
    "SECTION_PAGE_URL" => "#SECTION_ID#/",
    "DETAIL_PAGE_URL" => "#SECTION_ID#/#ELEMENT_ID#",
    "IBLOCK_TYPE" => "products",
    "IBLOCK_ID" => "5",
    "DEPTH_LEVEL" => "2",
    "CACHE_TYPE" => "A",
    "CACHE_TIME" => "36000000"
),
    false
);

$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);
