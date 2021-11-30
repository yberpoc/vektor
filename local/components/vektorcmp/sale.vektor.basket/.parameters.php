<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

$arComponentParameters = array(
    "PARAMETERS" => array(
        // BASE
        "PATH_TO_BASKET" => array(
            "NAME" => GetMessage("SBBL_PATH_TO_BASKET"),
            "TYPE" => "STRING",
            "DEFAULT" => '={SITE_DIR."basket/"}',
            "PARENT" => "BASE",
        ),
        "HIDE_ON_BASKET_PAGES" => array(
            "NAME" => GetMessage("SBBL_HIDE_ON_BASKET_PAGES"),
            "TYPE" => "CHECKBOX",
            "DEFAULT" => "Y"
        ),
        "SHOW_NUM_PRODUCTS" => array(
            "NAME" => GetMessage("SBBL_SHOW_NUM_PRODUCTS"),
            "TYPE" => "CHECKBOX",
            "DEFAULT" => "Y",
            "PARENT" => "BASE",
        ),
        "SHOW_TOTAL_PRICE" => array(
            "NAME" => GetMessage("SBBL_SHOW_TOTAL_PRICE"),
            "TYPE" => "CHECKBOX",
            "DEFAULT" => "Y",
            "PARENT" => "BASE",
        ),
        "SHOW_EMPTY_VALUES" => array(
            "NAME" => GetMessage("SBBL_SHOW_EMPTY_VALUES"),
            "TYPE" => "CHECKBOX",
            "DEFAULT" => "Y",
            "PARENT" => "BASE",
        ),
        // LIST
        "SHOW_PRODUCTS" => array(
            "NAME" => GetMessage("SBBL_SHOW_PRODUCTS"),
            "TYPE" => "CHECKBOX",
            "DEFAULT" => "N",
            "REFRESH" => "Y",
            "PARENT" => "LIST",
        ),
    )
);

// LIST
if($arCurrentValues["SHOW_PRODUCTS"] == "Y")
{
    $arComponentParameters["PARAMETERS"] += array(
        "SHOW_IMAGE" => array(
            "NAME" => GetMessage('SBBL_SHOW_IMAGE'),
            "TYPE" => "CHECKBOX",
            "DEFAULT" => "Y",
            "PARENT" => "LIST",
        ),
        "SHOW_PRICE" => array(
            "NAME" => GetMessage('SBBL_SHOW_PRICE'),
            "TYPE" => "CHECKBOX",
            "DEFAULT" => "Y",
            "PARENT" => "LIST",
        ),
        "SHOW_SUMMARY" => array(
            "NAME" => GetMessage('SBBL_SHOW_SUMMARY'),
            "TYPE" => "CHECKBOX",
            "DEFAULT" => "Y",
            "PARENT" => "LIST",
        ),
    );
}

if (isset($arCurrentValues['SHOW_IMAGE']) && $arCurrentValues['SHOW_IMAGE'] == 'Y')
{
    $arComponentParameters["PARAMETERS"] += [
        "MAX_IMAGE_SIZE" => [
            "NAME" => GetMessage("SBBL_MAX_IMAGE_SIZE"),
            "TYPE" => "STRING",
            "DEFAULT" => "50",
            "PARENT" => "VISUAL",
        ]
    ];
}