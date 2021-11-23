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
<ul class="news__list">
    <?foreach($arResult["ITEMS"] as $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <li class="news__item wow fadeInUp" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <div class="new">
                <div class="new__image" style="background-image: url(<?=$arItem['PREVIEW_PICTURE']['SRC']?>);">
                    <div class="new__image-substrate"></div>
                </div>
                <div class="new__body">
                    <span><?=$arItem['DISPLAY_ACTIVE_FROM'];?></span>
                    <p><?=$arItem['NAME']?></p>
                    <a href="<?=$arItem['DETAIL_PAGE_URL']?>">
                        <svg width="26" height="20" viewBox="0 0 26 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect y="9" width="24" height="2" fill="#025BFF" />
                            <path d="M14.5859 1.41421L16.0002 0L26.0001 10L23.2577 10L14.5859 1.41421Z" fill="#025BFF" />
                            <path d="M14.5859 18.5858L16.0002 20L26.0001 10L23.2577 9.99997L14.5859 18.5858Z"
                                  fill="#025BFF" />
                        </svg>
                    </a>
                </div>
            </div>
        </li>
    <?endforeach;?>
</ul>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
    <br /><?=$arResult["NAV_STRING"]?>
<?endif;?>

