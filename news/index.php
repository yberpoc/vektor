<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Новости");
<<<<<<< HEAD
?>
<section class="news-page">
    <div class="container">
         <?$APPLICATION->IncludeComponent(
	"bitrix:news", 
	"news", 
	array(
=======
?><section class="news-page">
<div class="container">
	 <?$APPLICATION->IncludeComponent(
	"bitrix:news",
	"news",
	Array(
>>>>>>> 83207927e734c4483d7cb3cb02c968b8f3527c2e
		"ADD_ELEMENT_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"BROWSER_TITLE" => "-",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "N",
		"COMPONENT_TEMPLATE" => "news",
		"DETAIL_ACTIVE_DATE_FORMAT" => "j F Y",
		"DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
		"DETAIL_DISPLAY_TOP_PAGER" => "N",
		"DETAIL_FIELD_CODE" => array(0=>"DETAIL_PICTURE",1=>"",),
		"DETAIL_PAGER_SHOW_ALL" => "Y",
		"DETAIL_PAGER_TEMPLATE" => "",
		"DETAIL_PAGER_TITLE" => "Новости",
		"DETAIL_PROPERTY_CODE" => array(0=>"",1=>"MORE_PHOTO",2=>"",),
		"DETAIL_SET_CANONICAL_URL" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "6",
		"IBLOCK_TYPE" => "content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"LIST_ACTIVE_DATE_FORMAT" => "j F Y",
		"LIST_FIELD_CODE" => array(0=>"",1=>"",),
		"LIST_PROPERTY_CODE" => array(0=>"VIDEO",1=>"DETAIL_TITLE",2=>"",),
		"MESSAGE_404" => "",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"NEWS_COUNT" => "1",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "Y",
		"PAGER_SHOW_ALWAYS" => "Y",
		"PAGER_TEMPLATE" => "pagenavigation",
		"PAGER_TITLE" => "Новости",
		"PREVIEW_TRUNCATE_LEN" => "",
		"SEF_FOLDER" => "/news/",
		"SEF_MODE" => "Y",
		"SEF_URL_TEMPLATES" => array("news"=>"","section"=>"","detail"=>"#ELEMENT_CODE#/",),
		"SET_LAST_MODIFIED" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"USE_CATEGORIES" => "N",
		"USE_FILTER" => "N",
		"USE_PERMISSIONS" => "N",
		"USE_RATING" => "N",
		"USE_REVIEW" => "N",
		"USE_RSS" => "N",
		"USE_SEARCH" => "N",
<<<<<<< HEAD
		"USE_SHARE" => "N",
		"SEF_URL_TEMPLATES" => array(
			"news" => "",
			"section" => "",
			"detail" => "#ELEMENT_CODE#/",
=======
		"USE_SHARE" => "N"
	)
);?>
</div>
 </section>
<section class="form__container form__container_gray">
    <div class="container">
        <?$APPLICATION->IncludeComponent(
	"bitrix:form", 
	"question_form", 
	array(
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CHAIN_ITEM_LINK" => "",
		"CHAIN_ITEM_TEXT" => "",
		"EDIT_ADDITIONAL" => "N",
		"EDIT_STATUS" => "N",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"NAME_TEMPLATE" => "",
		"NOT_SHOW_FILTER" => array(
			0 => "",
			1 => "",
		),
		"NOT_SHOW_TABLE" => array(
			0 => "",
			1 => "",
		),
		"RESULT_ID" => $_REQUEST[RESULT_ID],
		"SEF_MODE" => "N",
		"SHOW_ADDITIONAL" => "N",
		"SHOW_ANSWER_VALUE" => "N",
		"SHOW_EDIT_PAGE" => "N",
		"SHOW_LIST_PAGE" => "N",
		"SHOW_STATUS" => "N",
		"SHOW_VIEW_PAGE" => "N",
		"START_PAGE" => "new",
		"SUCCESS_URL" => "",
		"USE_EXTENDED_ERRORS" => "N",
		"WEB_FORM_ID" => "3",
		"COMPONENT_TEMPLATE" => "question_form",
		"VARIABLE_ALIASES" => array(
			"action" => "action",
>>>>>>> 83207927e734c4483d7cb3cb02c968b8f3527c2e
		)
	),
	false
);?>
<<<<<<< HEAD
    <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	".default",
	Array(
		"AREA_FILE_RECURSIVE" => "Y",
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"COMPONENT_TEMPLATE" => ".default",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/include/news_back-text.php"
	)
    );?>
    </div>
</section>

<section class="get-price">
    <?$APPLICATION->IncludeComponent(
        "bitrix:form",
        "consultation",
        Array(
            "AJAX_MODE" => "N",	// Включить режим AJAX
            "AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
            "AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
            "AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
            "AJAX_OPTION_STYLE" => "N",	// Включить подгрузку стилей
            "CACHE_TIME" => "3600",	// Время кеширования (сек.)
            "CACHE_TYPE" => "A",	// Тип кеширования
            "CHAIN_ITEM_LINK" => "",	// Ссылка на дополнительном пункте в навигационной цепочке
            "CHAIN_ITEM_TEXT" => "",	// Название дополнительного пункта в навигационной цепочке
            "EDIT_ADDITIONAL" => "N",	// Выводить на редактирование дополнительные поля
            "EDIT_STATUS" => "N",	// Выводить форму смены статуса
            "IGNORE_CUSTOM_TEMPLATE" => "N",	// Игнорировать свой шаблон
            "NAME_TEMPLATE" => "",
            "NOT_SHOW_FILTER" => array(	// Коды полей, которые нельзя показывать в фильтре
                0 => "",
                1 => "",
            ),
            "NOT_SHOW_TABLE" => array(	// Коды полей, которые нельзя показывать в таблице
                0 => "",
                1 => "",
            ),
            "RESULT_ID" => $_REQUEST[RESULT_ID],	// ID результата
            "SEF_MODE" => "N",	// Включить поддержку ЧПУ
            "SHOW_ADDITIONAL" => "N",	// Показать дополнительные поля веб-формы
            "SHOW_ANSWER_VALUE" => "N",	// Показать значение параметра ANSWER_VALUE
            "SHOW_EDIT_PAGE" => "N",	// Показывать страницу редактирования результата
            "SHOW_LIST_PAGE" => "N",	// Показывать страницу со списком результатов
            "SHOW_STATUS" => "N",	// Показать текущий статус результата
            "SHOW_VIEW_PAGE" => "N",	// Показывать страницу просмотра результата
            "START_PAGE" => "new",	// Начальная страница
            "SUCCESS_URL" => "",	// Страница с сообщением об успешной отправке
            "USE_EXTENDED_ERRORS" => "Y",	// Использовать расширенный вывод сообщений об ошибках
            "VARIABLE_ALIASES" => array(
                "action" => "action",
            ),
            "WEB_FORM_ID" => "1",	// ID веб-формы
        ),
        false
    );?>
</section>
=======
    </div>
 </section>
>>>>>>> 83207927e734c4483d7cb3cb02c968b8f3527c2e
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>