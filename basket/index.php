<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Корзина");?>
    <?$APPLICATION->IncludeComponent(
    "vektorcmp:sale.vektor.basket",
    ".default",
    Array(
    "HIDE_ON_BASKET_PAGES" => "Y",
    "DETAIL_URL" => "/catalog/#SECTION_CODE_PATH#/#ELEMENT_CODE#/",
    "PATH_TO_BASKET" => SITE_DIR."basket/",
    "SHOW_EMPTY_VALUES" => "Y",
    "SHOW_NUM_PRODUCTS" => "Y",
    "SHOW_PRODUCTS" => "N",
    "SHOW_TOTAL_PRICE" => "Y"
    )
    );?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>