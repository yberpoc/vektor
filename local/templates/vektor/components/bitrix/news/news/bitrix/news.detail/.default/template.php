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
<section class="news-detail">
    <div class="container">
        <div class="news-detail__content">
            <?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
                <h1 class="inner__title"><?=$arResult["NAME"]?></h1>
            <?endif;?>
            <?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arResult["FIELDS"]["PREVIEW_TEXT"]):?>
                <p><?=$arResult["FIELDS"]["PREVIEW_TEXT"];unset($arResult["FIELDS"]["PREVIEW_TEXT"]);?></p>
            <?endif;?>
            <?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
                <div class="news-detail__date"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></div>
            <?endif;?>
            <?if($arResult["NAV_RESULT"]):?>
                <?if($arParams["DISPLAY_TOP_PAGER"]):?><?=$arResult["NAV_STRING"]?><br /><?endif;?>
                <p><?echo $arResult["NAV_TEXT"];?></p>
                <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?><br /><?=$arResult["NAV_STRING"]?><?endif;?>
            <?endif?>
            <?if($arResult["PREVIEW_TEXT"]):?>
                <p><?echo $arResult["PREVIEW_TEXT"];?></p>
            <?endif?>

            <img src="<?=$arResult['DETAIL_PICTURE']['SRC'];?>" class="img-responsive" alt="<?=$arResult['DETAIL_PICTURE']['ALT'];?>">

            <?if (!empty($arResult['PROPERTIES']['MORE_PHOTO']['VALUE'])): /* галерея изображений к статье блога */ ?>
                <div class="news-detail-gallery">
                    <div class="news-detail-gallery__slider swiper-container">
                        <div class="swiper-wrapper">
                            <?php foreach ($arResult['PROPERTIES']['MORE_PHOTO']['VALUE'] as $item): ?>
                                <div class="swiper-slide news-detail-gallery__slide"  data-popup="gallery-popup"
                                    data-popup-slider="gallery">
                                        <div class="news-detail-gallery__img-wrap">
                                            <?php
                                                // путь к изображению от корня сайта
                                                $image = CFile::GetPath($item);
                                                // создаем превьюшку изображения
                                                $thumb = CFile::ResizeImageGet(
                                                    $item,
                                                    array('width' => 800, 'height' => 700)
                                                );
                                            ?>
                                        </div>
                                    </div>

                                <a href="<?= $image; ?>"><img src="<?= $thumb['src']; ?>" alt="" /></a>
                            <?endforeach;?>
                        </div>
                    </div>
                </div>
            <?endif;?>

            <?if($arParams["DETAIL_TEXT"]!="N" && $arResult["DETAIL_TEXT"]):?>
                <?=$arResult["DETAIL_TEXT"]?>
            <?endif;?>

        </div>
</div>
    <div class="news-detail__bottom">
        <div class="container">

            <div class="news-detail__links">
                <?if($arResult['NEAR_ELEMENTS']['LEFT'][0]):?>
                <a href="<?=$arResult['NEAR_ELEMENTS']['LEFT'][0]['DETAIL_PAGE_URL']?>" class="news-detail__link">
                    <svg class="news-detail__link-arrow" width="23" height="19" viewBox="0 0 23 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.3288 16.8784C10.7022 17.2721 10.6941 17.8916 10.3104 18.2753C9.91291 18.6727 9.26616 18.6651 8.87816 18.2584L0.999877 10L8.87816 1.74161C9.26616 1.33489 9.91291 1.32727 10.3104 1.72475C10.6941 2.10843 10.7022 2.72794 10.3288 3.12161L4.7523 9L22 9C22.5523 9 23 9.44771 23 10C23 10.5523 22.5523 11 22 11L4.7523 11L10.3288 16.8784Z" fill="#025BFF"/>
                    </svg>
                    <span class="news-detail__link-text">
                        <?=$arResult['NEAR_ELEMENTS']['LEFT'][0]['NAME']?>
                    </span>
                </a>
                <?endif;?>
                <a href="<?=$arResult['NEAR_ELEMENTS']['RIGHT'][0]['DETAIL_PAGE_URL']?>" class="news-detail__link">
              <span class="news-detail__link-text">
                <?=$arResult['NEAR_ELEMENTS']['RIGHT'][0]['NAME']?>
              </span>
                    <svg class="news-detail__link-arrow" width="23" height="19" viewBox="0 0 23 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.3288 16.8784C10.7022 17.2721 10.6941 17.8916 10.3104 18.2753C9.91291 18.6727 9.26616 18.6651 8.87816 18.2584L0.999877 10L8.87816 1.74161C9.26616 1.33489 9.91291 1.32727 10.3104 1.72475C10.6941 2.10843 10.7022 2.72794 10.3288 3.12161L4.7523 9L22 9C22.5523 9 23 9.44771 23 10C23 10.5523 22.5523 11 22 11L4.7523 11L10.3288 16.8784Z" fill="#025BFF"/>
                    </svg>
                </a>
            </div>

        </div>
    </div>
</section>