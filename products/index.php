<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Продукция");
?>
<?$APPLICATION->IncludeComponent(
	"bitrix:catalog",
	"maria-catalog",
	array(
		"ACTION_VARIABLE" => "action",
		"ADD_ELEMENT_CHAIN" => "N",
		"ADD_PICT_PROP" => "-",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"BASKET_URL" => "/personal/basket.php",
		"BIG_DATA_RCM_TYPE" => "similar",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COMMON_ADD_TO_BASKET_ACTION" => "ADD",
		"COMMON_SHOW_CLOSE_POPUP" => "Y",
		"COMPARE_ELEMENT_SORT_FIELD" => "sort",
		"COMPARE_ELEMENT_SORT_ORDER" => "asc",
		"COMPARE_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"COMPARE_NAME" => "CATALOG_COMPARE_LIST",
		"COMPARE_POSITION_FIXED" => "N",
		"COMPATIBLE_MODE" => "Y",
		"CONVERT_CURRENCY" => "Y",
		"CURRENCY_ID" => "RUB",
		"DETAIL_ADD_DETAIL_TO_SLIDER" => "Y",
		"DETAIL_ADD_TO_BASKET_ACTION" => array(
			0 => "ADD",
		),
		"DETAIL_ADD_TO_BASKET_ACTION_PRIMARY" => array(
			0 => "ADD",
		),
		"DETAIL_BACKGROUND_IMAGE" => "-",
		"DETAIL_BRAND_USE" => "N",
		"DETAIL_BROWSER_TITLE" => "-",
		"DETAIL_CHECK_SECTION_ID_VARIABLE" => "N",
		"DETAIL_DETAIL_PICTURE_MODE" => array(
			0 => "POPUP",
		),
		"DETAIL_DISPLAY_NAME" => "Y",
		"DETAIL_DISPLAY_PREVIEW_TEXT_MODE" => "S",
		"DETAIL_IMAGE_RESOLUTION" => "16by9",
		"DETAIL_MAIN_BLOCK_PROPERTY_CODE" => array(
		),
		"DETAIL_META_DESCRIPTION" => "-",
		"DETAIL_META_KEYWORDS" => "-",
		"DETAIL_PRODUCT_INFO_BLOCK_ORDER" => "sku,props",
		"DETAIL_PRODUCT_PAY_BLOCK_ORDER" => "rating,price,priceRanges,quantityLimit,quantity,buttons",
		"DETAIL_SET_CANONICAL_URL" => "N",
		"DETAIL_SET_VIEWED_IN_COMPONENT" => "N",
		"DETAIL_SHOW_POPULAR" => "Y",
		"DETAIL_SHOW_SLIDER" => "N",
		"DETAIL_SHOW_VIEWED" => "Y",
		"DETAIL_STRICT_SECTION_CHECK" => "N",
		"DETAIL_USE_COMMENTS" => "N",
		"DETAIL_USE_VOTE_RATING" => "N",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"DISCOUNT_PERCENT_POSITION" => "top-right",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_ELEMENT_SELECT_BOX" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_ORDER2" => "desc",
		"FILTER_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_HIDE_ON_MOBILE" => "N",
		"FILTER_NAME" => "",
		"FILTER_PRICE_CODE" => array(
		),
		"FILTER_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_VIEW_MODE" => "HORIZONTAL",
		"GIFTS_DETAIL_BLOCK_TITLE" => "Выберите один из подарков",
		"GIFTS_DETAIL_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_DETAIL_PAGE_ELEMENT_COUNT" => "4",
		"GIFTS_DETAIL_TEXT_LABEL_GIFT" => "Подарок",
		"GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE" => "Выберите один из товаров, чтобы получить подарок",
		"GIFTS_MAIN_PRODUCT_DETAIL_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT" => "4",
		"GIFTS_MESS_BTN_BUY" => "Выбрать",
		"GIFTS_SECTION_LIST_BLOCK_TITLE" => "Подарки к товарам этого раздела",
		"GIFTS_SECTION_LIST_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_SECTION_LIST_PAGE_ELEMENT_COUNT" => "4",
		"GIFTS_SECTION_LIST_TEXT_LABEL_GIFT" => "Подарок",
		"GIFTS_SHOW_DISCOUNT_PERCENT" => "Y",
		"GIFTS_SHOW_IMAGE" => "Y",
		"GIFTS_SHOW_NAME" => "Y",
		"GIFTS_SHOW_OLD_PRICE" => "Y",
		"HIDE_NOT_AVAILABLE" => "N",
		"HIDE_NOT_AVAILABLE_OFFERS" => "N",
		"IBLOCK_ID" => "5",
		"IBLOCK_TYPE" => "catalog",
		"INCLUDE_SUBSECTIONS" => "N",
		"INSTANT_RELOAD" => "N",
		"LABEL_PROP" => array(
		),
		"LAZY_LOAD" => "N",
		"LINE_ELEMENT_COUNT" => "3",
		"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
		"LINK_IBLOCK_ID" => "",
		"LINK_IBLOCK_TYPE" => "",
		"LINK_PROPERTY_SID" => "",
		"LIST_BROWSER_TITLE" => "-",
		"LIST_ENLARGE_PRODUCT" => "STRICT",
		"LIST_META_DESCRIPTION" => "-",
		"LIST_META_KEYWORDS" => "-",
		"LIST_PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
		"LIST_PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
		"LIST_SHOW_SLIDER" => "N",
		"LIST_SLIDER_INTERVAL" => "3000",
		"LIST_SLIDER_PROGRESS" => "N",
		"LOAD_ON_SCROLL" => "N",
		"MESSAGE_404" => "",
		"MESS_BTN_ADD_TO_BASKET" => "Добавить в заказ",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_COMPARE" => "Сравнение",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_BTN_LAZY_LOAD" => "Показать ещё",
		"MESS_BTN_SUBSCRIBE" => "Подписаться",
		"MESS_COMMENTS_TAB" => "Отзывы",
		"MESS_DESCRIPTION_TAB" => "Описание",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"MESS_PRICE_RANGES_TITLE" => "Цены",
		"MESS_PROPERTIES_TAB" => "Технические характеристики",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "pagenavigation",
		"PAGER_TITLE" => "Товары",
		"PAGE_ELEMENT_COUNT" => "9",
		"PARTIAL_PRODUCT_PROPERTIES" => "Y",
		"PRICE_CODE" => array(
			0 => "BASE",
		),
		"PRICE_VAT_INCLUDE" => "Y",
		"PRICE_VAT_SHOW_VALUE" => "N",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PRODUCT_SUBSCRIPTION" => "N",
		"SEARCH_CHECK_DATES" => "Y",
		"SEARCH_NO_WORD_LOGIC" => "Y",
		"SEARCH_PAGE_RESULT_COUNT" => "50",
		"SEARCH_RESTART" => "N",
		"SEARCH_USE_LANGUAGE_GUESS" => "Y",
		"SEARCH_USE_SEARCH_RESULT_ORDER" => "N",
		"SECTIONS_HIDE_SECTION_NAME" => "N",
		"SECTIONS_SHOW_PARENT_NAME" => "Y",
		"SECTIONS_VIEW_MODE" => "LIST",
		"SECTION_ADD_TO_BASKET_ACTION" => "ADD",
		"SECTION_BACKGROUND_IMAGE" => "-",
		"SECTION_COUNT_ELEMENTS" => "N",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SECTION_TOP_DEPTH" => "1",
		"SEF_FOLDER" => "/products/",
		"SEF_MODE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SHOW_DEACTIVATED" => "N",
		"SHOW_DISCOUNT_PERCENT" => "Y",
		"SHOW_MAX_QUANTITY" => "N",
		"SHOW_OLD_PRICE" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"SHOW_SKU_DESCRIPTION" => "N",
		"SHOW_TOP_ELEMENTS" => "N",
		"SIDEBAR_DETAIL_POSITION" => "right",
		"SIDEBAR_DETAIL_SHOW" => "N",
		"SIDEBAR_PATH" => "",
		"SIDEBAR_SECTION_POSITION" => "right",
		"SIDEBAR_SECTION_SHOW" => "N",
		"TEMPLATE_THEME" => "blue",
		"TOP_ADD_TO_BASKET_ACTION" => "ADD",
		"TOP_ELEMENT_COUNT" => "9",
		"TOP_ELEMENT_SORT_FIELD" => "sort",
		"TOP_ELEMENT_SORT_FIELD2" => "id",
		"TOP_ELEMENT_SORT_ORDER" => "asc",
		"TOP_ELEMENT_SORT_ORDER2" => "desc",
		"TOP_ENLARGE_PRODUCT" => "STRICT",
		"TOP_LINE_ELEMENT_COUNT" => "3",
		"TOP_PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
		"TOP_PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
		"TOP_SHOW_SLIDER" => "Y",
		"TOP_SLIDER_INTERVAL" => "3000",
		"TOP_SLIDER_PROGRESS" => "N",
		"TOP_VIEW_MODE" => "SECTION",
		"USER_CONSENT" => "N",
		"USER_CONSENT_ID" => "0",
		"USER_CONSENT_IS_CHECKED" => "Y",
		"USER_CONSENT_IS_LOADED" => "N",
		"USE_BIG_DATA" => "Y",
		"USE_COMMON_SETTINGS_BASKET_POPUP" => "N",
		"USE_COMPARE" => "Y",
		"USE_ELEMENT_COUNTER" => "Y",
		"USE_ENHANCED_ECOMMERCE" => "N",
		"USE_FILTER" => "Y",
		"USE_GIFTS_DETAIL" => "N",
		"USE_GIFTS_MAIN_PR_SECTION_LIST" => "N",
		"USE_GIFTS_SECTION" => "N",
		"USE_MAIN_ELEMENT_SECTION" => "Y",
		"USE_PRICE_COUNT" => "N",
		"USE_PRODUCT_QUANTITY" => "N",
		"USE_REVIEW" => "N",
		"USE_SALE_BESTSELLERS" => "N",
		"USE_STORE" => "N",
		"COMPONENT_TEMPLATE" => "maria-catalog",
		"SEF_URL_TEMPLATES" => array(
			"sections" => "",
			"section" => "#SECTION_CODE_PATH#/",
			"element" => "#SECTION_CODE_PATH#/#ELEMENT_CODE#/",
			"compare" => "compare.php?action=#ACTION_CODE#",
			"smart_filter" => "#SECTION_CODE_PATH#/filter/#SMART_FILTER_PATH#/apply/",
		),
		"VARIABLE_ALIASES" => array(
			"compare" => array(
				"ACTION_CODE" => "action",
			),
		)
	),
	false
);?>
<!-- NEWS -->
<div class="news">
    <div class="tab">
        <div class="tab__item tab__item_active">
            <h2>Новости</h2>
        </div>
        <button class="tab__button">
            <div class="tab__switch"></div>
        </button>
        <div class="tab__item">
            <h2>Акции и спецпредложения</h2>
        </div>
    </div>
	<?$APPLICATION->IncludeComponent(
		"bitrix:news.list",
		"index_news",
		array(
			"ACTIVE_DATE_FORMAT" => "d.m.Y",
			"ADD_SECTIONS_CHAIN" => "N",
			"AJAX_MODE" => "N",
			"AJAX_OPTION_ADDITIONAL" => "",
			"AJAX_OPTION_HISTORY" => "N",
			"AJAX_OPTION_JUMP" => "N",
			"AJAX_OPTION_STYLE" => "Y",
			"CACHE_FILTER" => "N",
			"CACHE_GROUPS" => "Y",
			"CACHE_TIME" => "36000000",
			"CACHE_TYPE" => "A",
			"CHECK_DATES" => "Y",
			"DETAIL_URL" => "",
			"DISPLAY_BOTTOM_PAGER" => "Y",
			"DISPLAY_DATE" => "Y",
			"DISPLAY_NAME" => "Y",
			"DISPLAY_PICTURE" => "Y",
			"DISPLAY_PREVIEW_TEXT" => "Y",
			"DISPLAY_TOP_PAGER" => "N",
			"FIELD_CODE" => array(
				0 => "",
				1 => "",
			),
			"FILTER_NAME" => "",
			"HIDE_LINK_WHEN_NO_DETAIL" => "N",
			"IBLOCK_ID" => "6",
			"IBLOCK_TYPE" => "-",
			"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
			"INCLUDE_SUBSECTIONS" => "Y",
			"MESSAGE_404" => "",
			"NEWS_COUNT" => "3",
			"PAGER_BASE_LINK_ENABLE" => "N",
			"PAGER_DESC_NUMBERING" => "N",
			"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
			"PAGER_SHOW_ALL" => "N",
			"PAGER_SHOW_ALWAYS" => "N",
			"PAGER_TEMPLATE" => ".default",
			"PAGER_TITLE" => "Новости",
			"PARENT_SECTION" => "",
			"PARENT_SECTION_CODE" => "",
			"PREVIEW_TRUNCATE_LEN" => "",
			"PROPERTY_CODE" => array(
				0 => "",
				1 => "",
			),
			"SET_BROWSER_TITLE" => "N",
			"SET_LAST_MODIFIED" => "N",
			"SET_META_DESCRIPTION" => "N",
			"SET_META_KEYWORDS" => "N",
			"SET_STATUS_404" => "N",
			"SET_TITLE" => "N",
			"SHOW_404" => "N",
			"SORT_BY1" => "ACTIVE_FROM",
			"SORT_BY2" => "SORT",
			"SORT_ORDER1" => "DESC",
			"SORT_ORDER2" => "ASC",
			"STRICT_SECTION_CHECK" => "N",
			"COMPONENT_TEMPLATE" => "index_news"
		),
		false
	);?>

</div>
<!-- END NEWS -->

<!-- SOLUTIONS -->
<section class="solutions section_solutions">
    <div class="container solutions__container">
        <div class="solutions__top">
            <div class="solutions__title">
                Подберите решение для вашего бизнеса!
            </div>
            <div class="solutions__desc">
                Здесь вы найдете материалы о том, как применяются наши весы в разных отраслей.
                Можете подобрать готовые комплекты для решения задач своего бизнеса.
                <b>17 лет опыта и практики</b>
            </div>
            <a href="" class="solutions__button button button_rounded">
                Все решения
            </a>
        </div>
        <div class="solutions__cards">
            <a href="" class="solutions__card">
                <div class="solutions__card-image" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/img/catalog/solutions_1.png)"></div>
                <span class="solutions__card-name">Мясная промышленность</span>
                <span class="solutions__card-dark"></span>
            </a>
            <a href="" class="solutions__card">
                <div class="solutions__card-image" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/img/catalog/solutions_2.png)"></div>
                <span class="solutions__card-name">Железнодорожные терминалы</span>
                <span class="solutions__card-dark"></span>
            </a>
            <a href="" class="solutions__card">
                <div class="solutions__card-image" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/img/catalog/solutions_3.png)"></div>
                <span class="solutions__card-name">Дорожный контроль</span>
                <span class="solutions__card-dark"></span>
            </a>
            <a href="" class="solutions__card">
                <div class="solutions__card-image" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/img/catalog/solutions_4.png)"></div>
                <span class="solutions__card-name">Сельское хозяйство</span>
                <span class="solutions__card-dark"></span>
            </a>
        </div>
    </div>
    <div class="solutions__back-text back-text container">
        <span class="solutions__bright-word">Опыт.</span> Репутация. Надежность
    </div>
    <span class="solutions__big-letter">
      О
  </span>
</section>
<!-- END SOLUTIONS -->

<!-- OUR PRODUCTION -->
<section class="our-production">
    <div class="our-production__container">
        <div class="our-production__content">
            <h2 class="our-production__title">Нашу продукцию используют</h2>
            <p class="our-production__desc">более 8000 компаний в России, Белоруссии, Казахстане, Узбекистане, Украине, а
                также Европе используют продукцию Вектор-ПМ</p>
            <div class="our-production-pagination"></div>
            <div class="our-production-nav">
                <button class="our-production-nav__prev our-production-nav__button">
                    <svg width="22" height="17" viewBox="0 0 22 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                                d="M9.28625 15.0523C9.67965 15.4409 9.68159 16.0754 9.29058 16.4664C8.90125 16.8558 8.27002 16.8558 7.88069 16.4664L-0.000122821 8.5856L7.88069 0.704845C8.27002 0.315519 8.90125 0.315519 9.29057 0.704847C9.68159 1.09586 9.67965 1.73042 9.28624 2.11904L3.7523 7.5856L21 7.5856C21.5523 7.5856 22 8.03331 22 8.5856C22 9.13788 21.5523 9.5856 21 9.5856L3.7523 9.5856L9.28625 15.0523Z"
                                fill="#025BFF" />
                    </svg>
                </button>
                <button class="our-production-nav__next our-production-nav__button">
                    <svg width="22" height="17" viewBox="0 0 22 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                                d="M9.28625 15.0523C9.67965 15.4409 9.68159 16.0754 9.29058 16.4664C8.90125 16.8558 8.27002 16.8558 7.88069 16.4664L-0.000122821 8.5856L7.88069 0.704845C8.27002 0.315519 8.90125 0.315519 9.29057 0.704847C9.68159 1.09586 9.67965 1.73042 9.28624 2.11904L3.7523 7.5856L21 7.5856C21.5523 7.5856 22 8.03331 22 8.5856C22 9.13788 21.5523 9.5856 21 9.5856L3.7523 9.5856L9.28625 15.0523Z"
                                fill="#025BFF" />
                    </svg>
                </button>
            </div>
        </div>
        <div class="our-production__slider swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide our-production-item">
                    <a href="" class="our-production-item__link">
                        <img src="<?=SITE_TEMPLATE_PATH?>/img/clients-1.png" alt="" class="our-production-item__img">
                    </a>
                </div>
                <div class="swiper-slide our-production-item">
                    <a href="" class="our-production-item__link">
                        <img src="<?=SITE_TEMPLATE_PATH?>/img/clients-1.png" alt="" class="our-production-item__img">
                    </a>
                </div>
                <div class="swiper-slide our-production-item">
                    <a href="" class="our-production-item__link">
                        <img src="<?=SITE_TEMPLATE_PATH?>/img/clients-1.png" alt="" class="our-production-item__img">
                    </a>
                </div>
                <div class="swiper-slide our-production-item">
                    <a href="" class="our-production-item__link">
                        <img src="<?=SITE_TEMPLATE_PATH?>/img/clients-1.png" alt="" class="our-production-item__img">
                    </a>
                </div>
                <div class="swiper-slide our-production-item">
                    <a href="" class="our-production-item__link">
                        <img src="<?=SITE_TEMPLATE_PATH?>/img/clients-1.png" alt="" class="our-production-item__img">
                    </a>
                </div>
                <div class="swiper-slide our-production-item">
                    <a href="" class="our-production-item__link">
                        <img src="<?=SITE_TEMPLATE_PATH?>/img/clients-1.png" alt="" class="our-production-item__img">
                    </a>
                </div>
            </div>
        </div>
    </div>

</section>
    <!-- END OUR PRODUCTION -->


    </section>
    <!-- END OUR PRODUCTION -->

    <!-- .video-block -->
    <section class="section video-block">

        <div class="video-block__preview">
            <div class="video-block__bg" style="background-image: url('<?=SITE_TEMPLATE_PATH?>/img/video-block-bg.png');"></div>
            <div class="video-block__info">
                <div class="video-block__mini-title">Посмотреть видео</div>
                <h4 class="video-block__title">
                    сделано в Перми <b>«Вектор-ПМ»</b>
                </h4>
            </div>

            <div class="video-block__icon-wrap">
                <svg class="video-block__icon" width="80" height="101" viewBox="0 0 80 101" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1L78.3809 50.4048L1 99.8095V1Z" stroke="white" stroke-opacity="0.35" stroke-width="2"
                          stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </div>

            <div class="video-block__line"></div>
        </div>
        <div class="video-block__player youtube-video" data-video-id="M7lc1UVf-VE" id="player1"></div>

    </section>
    <!-- /.video-block -->


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>

