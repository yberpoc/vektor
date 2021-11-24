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

if(!$arResult["NavShowAlways"])
{
	if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
		return;
}

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");
?>

<?if($arResult['NavPageCount'] > 1):?>

    <div class="bottom-list news-page__bottom-list">
        <ul class="inner-pagination">

            <?while($arResult["nStartPage"] <= $arResult["nEndPage"]):?>
                <?if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>
                    <li class="inner-pagination__item">
                        <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"
                           class="inner-pagination__link inner-pagination__link_white active"
                        >
                            <?=$arResult['nStartPage'];?>
                        </a>
                    </li>
                <?else:?>
                    <li class="inner-pagination__item">
                        <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"
                           class="inner-pagination__link inner-pagination__link_white"
                        >
                            <?=$arResult["nStartPage"]?>
                        </a>
                    </li>
                <?endif?>

                <?$arResult["nStartPage"]++?>
            <?endwhile?>

        </ul>

	    <?if ($arResult["bShowAll"]):?>
            <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>SHOWALL_<?=$arResult["NavNum"]?>=1" class="bottom-list__button button button_blue button_transparent">
                <?=GetMessage("nav_all")?>
            </a>
	    <?endif?>
    </div>
<?endif;?>