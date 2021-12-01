<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

$templateData = array(
	'TEMPLATE_THEME' => $this->GetFolder().'/themes/'.$arParams['TEMPLATE_THEME'].'/colors.css',
	'TEMPLATE_CLASS' => 'bx-'.$arParams['TEMPLATE_THEME']
);

if (isset($templateData['TEMPLATE_THEME']))
{
	$this->addExternalCss($templateData['TEMPLATE_THEME']);
}
$this->addExternalCss("/bitrix/css/main/bootstrap.css");
$this->addExternalCss("/bitrix/css/main/font-awesome.css");
?>
<div class="inner__filter filter">
		<div class="filter__header">
            <div class="filter__header-title">
                <svg class="filter__header-icon" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path
                            d="M19 8.4C19.4971 8.4 19.9 7.99706 19.9 7.5C19.9 7.00294 19.4971 6.6 19 6.6V8.4ZM10 6.6C9.50294 6.6 9.1 7.00294 9.1 7.5C9.1 7.99706 9.50294 8.4 10 8.4V6.6ZM19 6.6H10V8.4H19V6.6Z"
                            fill="#025BFF" />
                    <path
                            d="M14 17.4C14.4971 17.4 14.9 16.9971 14.9 16.5C14.9 16.0029 14.4971 15.6 14 15.6V17.4ZM5 15.6C4.50294 15.6 4.1 16.0029 4.1 16.5C4.1 16.9971 4.50294 17.4 5 17.4V15.6ZM14 15.6H5V17.4H14V15.6Z"
                            fill="#025BFF" />
                    <circle cx="6.5" cy="7.5" r="3.5" stroke="#025BFF" stroke-width="1.8" />
                    <circle cx="17.5" cy="16.5" r="3.5" stroke="#025BFF" stroke-width="1.8" />
                </svg>

                <div class="filter__header-title-desk">
	                <?echo GetMessage("CT_BCSF_FILTER_TITLE")?>
                    Подобрать по параметрам
                </div>

                <div class="filter__header-title-mob">Параметы</div>
            </div>
            <svg class="filter__toggle" width="16" height="10" viewBox="0 0 16 10" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
                <path d="M8 0L15.7942 9.75L0.205771 9.75L8 0Z" fill="#00318A" />
            </svg>
        </div>
		<form name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?echo $arResult["FORM_ACTION"]?>" method="get" class="smartfilter">
			<?foreach($arResult["HIDDEN"] as $arItem):?>
			<input type="hidden" name="<?echo $arItem["CONTROL_NAME"]?>" id="<?echo $arItem["CONTROL_ID"]?>" value="<?echo $arItem["HTML_VALUE"]?>" />
			<?endforeach;?>
			<div class="filter__items">
				<?foreach($arResult["ITEMS"] as $key=>$arItem)
				{
					if(
						empty($arItem["VALUES"])
						|| isset($arItem["PRICE"])
					)
						continue;

					if (
						$arItem["DISPLAY_TYPE"] == "A"
						&& (
							$arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"] <= 0
						)
					)
						continue;
					?>
					<div class="filter__item">
						<div class="filter__item-name">
							<?=$arItem["NAME"]?>
						</div>

						<div class="filter__item-checks" data-role="bx_filter_block">
                            <?if($arItem['USER_TYPE'] == 'HTML'):?>
                                <?foreach($arItem["VALUES"] as $val => $ar):?>
                                    <div class="checkbox">
                                        <label data-role="label_<?=$ar["CONTROL_ID"]?>" class="filter-check filter__item-check" for="<? echo $ar["CONTROL_ID"] ?>">

                                            <input
                                                    type="checkbox"
                                                    value="<? echo $ar["HTML_VALUE"] ?>"
                                                    name="<? echo $ar["CONTROL_NAME"] ?>"
                                                    id="<? echo $ar["CONTROL_ID"] ?>"
					                            <? echo $ar["CHECKED"]? 'checked="checked"': '' ?>
                                                    onclick="smartFilter.click(this)"
                                            />
                                            <div class="filter-check__text" title="<?=$ar["VALUE"];?>"><?=$ar["VALUE"];?>
                                                СВГ
                                            </div>
                                        </label>
                                    </div>
	                            <?endforeach;?>
                            <?else:?>
                                <?foreach($arItem["VALUES"] as $val => $ar):?>
                                    <div class="checkbox">
                                        <label data-role="label_<?=$ar["CONTROL_ID"]?>" class="filter-check filter__item-check" for="<? echo $ar["CONTROL_ID"] ?>">

                                                <input
                                                    type="checkbox"
                                                    value="<? echo $ar["HTML_VALUE"] ?>"
                                                    name="<? echo $ar["CONTROL_NAME"] ?>"
                                                    id="<? echo $ar["CONTROL_ID"] ?>"
                                                    <? echo $ar["CHECKED"]? 'checked="checked"': '' ?>
                                                    onclick="smartFilter.click(this)"
                                                />
                                                <span class="filter-check__text" title="<?=$ar["VALUE"];?>">
                                                    <?=$ar["VALUE"];?>
                                                </span>
                                        </label>
                                    </div>
                                <?endforeach;?>
                            <?endif;?>
							<div style="clear: both"></div>
						</div>
					</div>
				<?
				}
				?>
			</div>

			<div class="filter__buttons">
                <button
                    class="filter__reset"
                    type="submit"
                    id="del_filter"
                    name="del_filter"
                    value="<?=GetMessage("CT_BCSF_DEL_FILTER")?>"
                >
	                <?=GetMessage("CT_BCSF_DEL_FILTER")?>
                    <div class="filter__reset-icon">х</div>
                </button>
                <a href="<?echo $arResult["FILTER_URL"]?>" target="">
                    <button class="filter__show button" id="modef">
                        <span>
                            Показать
                            <b>(
                                <?=GetMessage(
                                    "CT_BCSF_FILTER_COUNT",
                                    array(
                                        "#ELEMENT_COUNT#" => '<div class="filter__show-counter" id="modef_num">'.
                                            intval($arResult["ELEMENT_COUNT"]).
                                            '</div>'
                                    )
                                );?>
                            )</b>
                        </span>
                    </button>
                </a>
			</div>
			<div class="clb"></div>
		</form>
</div>
<script type="text/javascript">
	var smartFilter = new JCSmartFilter('<?echo CUtil::JSEscape($arResult["FORM_ACTION"])?>', '<?=CUtil::JSEscape($arParams["FILTER_VIEW_MODE"])?>', <?=CUtil::PhpToJSObject($arResult["JS_FILTER_PARAMS"])?>);
</script>