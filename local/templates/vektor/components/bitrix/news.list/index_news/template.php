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
?>





<div class="tab-content">
    <div class="tab-content__item tab-content__item_active">
        <ul class="news__list">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>

    <li class="news__item wow fadeInUp" data-wow-delay="0.2s" style="visibility: hidden;">
        <div class="new" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
			<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
            <div class="new__image" style="background-image: url('<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>')">
                    <div class="new__image-substrate"></div>
                </div>
			<?else:?>
                    <div class="new__image">
                        <img
                        class="preview_picture"
                        border="0"
                        src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
                        width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
                        height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
                        alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
                        title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
                        style="float:left"
                        />
                        <div class="new__image-substrate"></div>
                    </div>
			<?endif;?>
		<?endif?>
        <div class="new__body">
            <?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
                <span><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></span>
            <?endif?>

            <?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
                <?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult[    "USER_HAVE_ACCESS"])):?>
                    <a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><p><?echo $arItem["NAME"]?></p></a><br />
                <?else:?>
                    <p><?echo $arResult["NAME"]?></p>
                <?endif;?>
            <?endif;?>

            <a href="<?echo $arItem["DETAIL_PAGE_URL"]?>">
                <svg width="26" height="20" viewBox="0 0 26 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect y="9" width="24" height="2" fill="#025BFF" />
                    <path d="M14.5859 1.41421L16.0002 0L26.0001 10L23.2577 10L14.5859 1.41421Z" fill="#025BFF" />
                    <path d="M14.5859 18.5858L16.0002 20L26.0001 10L23.2577 9.99997L14.5859 18.5858Z"
                          fill="#025BFF" />
                </svg>
            </a>
        </div>
        </div>
<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
        </ul>
        <a href="/news/" class="button button_rounded button_white news__button">Все новости</a>
    </div>
</div>

