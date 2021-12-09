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

            <?if (!empty($arResult['PROPERTIES']['MORE_PHOTO']['VALUE'])): /* галерея изображений к статье блога */ ?>
                <div class="news-detail-gallery">
                    <div class="news-detail-gallery__slider swiper-container">
                        <div class="swiper-wrapper">
                                <?
                                foreach ($arResult["DISPLAY_PROPERTIES"]["MORE_PHOTO"]["FILE_VALUE"] as $key => $photo)
                                {
                                    $resized= CFile::ResizeImageGet($photo['ID'], array('width'=>900, 'height'=>900), BX_RESIZE_IMAGE_PROPORTIONAL, true);

                                ?>

                                <div class="swiper-slide news-detail-gallery__slide"  data-popup="gallery-popup"
                                    data-popup-slider="gallery">
                                        <div class="news-detail-gallery__img-wrap">
                                            <img class="news-detail-gallery__img" src="<?=$resized["src"]?>">
                                        </div>

                                    </div>
                            <? } ?>
                        </div>
                        <div class="news-detail-gallery__nav">
                            <button class="news-detail-gallery__arrow news-detail-gallery__prev">
                                <svg width="22" height="17" viewBox="0 0 22 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.28625 15.0523C9.67965 15.4409 9.68159 16.0754 9.29058 16.4664C8.90125 16.8558 8.27002 16.8558 7.88069 16.4664L-0.000122821 8.5856L7.88069 0.704845C8.27002 0.315519 8.90125 0.315519 9.29057 0.704847C9.68159 1.09586 9.67965 1.73042 9.28624 2.11904L3.7523 7.5856L21 7.5856C21.5523 7.5856 22 8.03331 22 8.5856C22 9.13788 21.5523 9.5856 21 9.5856L3.7523 9.5856L9.28625 15.0523Z" fill="#025BFF"></path>
                                </svg>
                            </button>
                            <button class="news-detail-gallery__arrow news-detail-gallery__next">
                                <svg width="22" height="17" viewBox="0 0 22 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.28625 15.0523C9.67965 15.4409 9.68159 16.0754 9.29058 16.4664C8.90125 16.8558 8.27002 16.8558 7.88069 16.4664L-0.000122821 8.5856L7.88069 0.704845C8.27002 0.315519 8.90125 0.315519 9.29057 0.704847C9.68159 1.09586 9.67965 1.73042 9.28624 2.11904L3.7523 7.5856L21 7.5856C21.5523 7.5856 22 8.03331 22 8.5856C22 9.13788 21.5523 9.5856 21 9.5856L3.7523 9.5856L9.28625 15.0523Z" fill="#025BFF"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="news-detail-gallery__thumbs swiper-container">
                        <div class="swiper-wrapper">
                            <?
                                foreach ($arResult["DISPLAY_PROPERTIES"]["MORE_PHOTO"]["FILE_VALUE"] as $key => $photo)
                                {
                                    $resized= CFile::ResizeImageGet($photo['ID'], array('width'=>900, 'height'=>900), BX_RESIZE_IMAGE_PROPORTIONAL, true);

                                ?>

                                <div class="swiper-slide news-detail-gallery__thumb" style="background-image: url(<?=$resized["src"];?>);"></div>
                            <? } ?>

                            <?foreach($arResult["PROPERTIES"]["VIDEO"]["VALUE"] as $arVideo):?>
                                <div class="swiper-slide news-detail-gallery__thumb swiper-slide news-detail-gallery__thumb_video" style="background-image: url(<?=($arVideo["SRC"]);?>);"></div>
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
<?$this->SetViewTarget('mycontent');?>
    <div class="popup popup_white popup_scrolled" id="gallery-popup">
        <div class="popup__close"></div>
        <div class="popup__content">
            <div class="popup-slider">
                <h2 class="popup-slider__title">Подкладные автомобильные весы до 5 тонн</h2>
                <div class="popup-slider__content">
                    <div class="popup-slider__main swiper-container">
                        <div class="swiper-wrapper">
                            <?
                                foreach ($arResult["DISPLAY_PROPERTIES"]["MORE_PHOTO"]["FILE_VALUE"] as $key => $photo)
                                {
                                    $resized= CFile::ResizeImageGet($photo['ID'], array('width'=>'600', 'height'=>'600'), BX_RESIZE_IMAGE_PROPORTIONAL, true);

                                ?>
                            <div class="popup-slider__slide swiper-slide">
                                <div class="swiper-zoom-container">

                                    <img class="popup-slider__img" src="<?=$resized["src"];?>" alt="">
                                </div>
                            </div>
                        <? } ?>

                        </div>
                        <div class="popup-slider__main-nav">
                            <button class="popup-slider__main-arrow popup-slider__main-prev">
                                <svg width="22" height="17" viewBox="0 0 22 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                            d="M9.2865 14.8809C9.6799 15.2695 9.68184 15.904 9.29082 16.2951C8.90149 16.6844 8.27027 16.6844 7.88094 16.2951L0.00012132 8.41422L7.88094 0.533458C8.27027 0.144132 8.90149 0.144132 9.29082 0.53346C9.68183 0.924478 9.67989 1.55904 9.28649 1.94765L3.75254 7.41421L21.0002 7.41421C21.5525 7.41421 22.0002 7.86193 22.0002 8.41421C22.0002 8.9665 21.5525 9.41421 21.0002 9.41421L3.75254 9.41421L9.2865 14.8809Z"
                                            fill="#A9BAD8" />
                                </svg>
                            </button>
                            <button class="popup-slider__main-arrow popup-slider__main-next">
                                <svg width="22" height="17" viewBox="0 0 22 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                            d="M9.2865 14.8809C9.6799 15.2695 9.68184 15.904 9.29082 16.2951C8.90149 16.6844 8.27027 16.6844 7.88094 16.2951L0.00012132 8.41422L7.88094 0.533458C8.27027 0.144132 8.90149 0.144132 9.29082 0.53346C9.68183 0.924478 9.67989 1.55904 9.28649 1.94765L3.75254 7.41421L21.0002 7.41421C21.5525 7.41421 22.0002 7.86193 22.0002 8.41421C22.0002 8.9665 21.5525 9.41421 21.0002 9.41421L3.75254 9.41421L9.2865 14.8809Z"
                                            fill="#A9BAD8" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="popup-slider__thumbs swiper-container">
                        <div class="swiper-wrapper">
                            <?foreach($arResult["DISPLAY_PROPERTIES"]["MORE_PHOTO"]["FILE_VALUE"] as $arPhoto):?>
                                <div class="popup-slider__thumb swiper-slide" style="background-image: url(<?=$arPhoto["SRC"];?>);"></div>
                            <?endforeach;?>
                        </div>
                        <button class="popup-slider__thumbs-prev popup-slider__thumbs-arrow">
                            <svg width="22" height="17" viewBox="0 0 22 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M9.2865 14.8809C9.6799 15.2695 9.68184 15.904 9.29082 16.2951C8.90149 16.6844 8.27027 16.6844 7.88094 16.2951L0.00012132 8.41422L7.88094 0.533458C8.27027 0.144132 8.90149 0.144132 9.29082 0.53346C9.68183 0.924478 9.67989 1.55904 9.28649 1.94765L3.75254 7.41421L21.0002 7.41421C21.5525 7.41421 22.0002 7.86193 22.0002 8.41421C22.0002 8.9665 21.5525 9.41421 21.0002 9.41421L3.75254 9.41421L9.2865 14.8809Z"
                                        fill="#A9BAD8" />
                            </svg>
                        </button>
                        <button class="popup-slider__thumbs-next popup-slider__thumbs-arrow">
                            <svg width="22" height="17" viewBox="0 0 22 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M9.2865 14.8809C9.6799 15.2695 9.68184 15.904 9.29082 16.2951C8.90149 16.6844 8.27027 16.6844 7.88094 16.2951L0.00012132 8.41422L7.88094 0.533458C8.27027 0.144132 8.90149 0.144132 9.29082 0.53346C9.68183 0.924478 9.67989 1.55904 9.28649 1.94765L3.75254 7.41421L21.0002 7.41421C21.5525 7.41421 22.0002 7.86193 22.0002 8.41421C22.0002 8.9665 21.5525 9.41421 21.0002 9.41421L3.75254 9.41421L9.2865 14.8809Z"
                                        fill="#A9BAD8" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?$this->EndViewTarget();?>
