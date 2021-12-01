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


$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));

?>

<div class="text-before-catalog">
    <div class="container">
        <div class="text-before-catalog__text">
            Общий SEO текст про продукцию предприятия.
            Весы автомобильные пользуются высоким спросом на всех предприятиях,
            осуществляющих перемещение и учет груза, преимущественно сырья,
            с помощью автомобильного транспорта.
        </div>
        <div class="text-before-catalog__buttons" data-popup="form-popup">
            <a href="" class="button text-before-catalog__button">Запросить цену</a>
            <a href="" class="button button_icon text-before-catalog__button">
                Опросный лист
                <svg class="button__icon" width="20" height="20" viewBox="0 0 20 20" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path
                            d="M19 13V17C19 17.5304 18.7893 18.0391 18.4142 18.4142C18.0391 18.7893 17.5304 19 17 19H3C2.46957 19 1.96086 18.7893 1.58579 18.4142C1.21071 18.0391 1 17.5304 1 17V13M5 8L10 13M10 13L15 8M10 13V1"
                            stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>
        </div>
    </div>
</div>

<?if($arResult['SECTIONS_COUNT'] > 0):?>
        <?foreach ($arResult['SECTIONS'] as &$arSection):?>
            <?
            $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
            $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

            $dbSection = CIBlockSection::GetList(
                    array(),
                    array(
                        'ID' => $arSection['ID'],
                        'IBLOCK_ID' => 5
                    ),
                    false,
                    array(
                        'UF_SLIDER_IMAGE',
                        'UF_SECTION_COLOR'
                    ),
                    false
            );
            $arSections = $dbSection->Fetch();

            $dbImage = CIBlockElement::GetList(
                    array(),
                    array(
                        'IBLOCK_ID' => 7,
                        'ID' => $arSections['UF_SLIDER_IMAGE']),
                    false,
                    false,
                    array(
                        'ID',
                        'NAME',
                        'PROPERTY_MORE_PHOTO',
                    )
            );

            while ($resImg = $dbImage->GetNextElement()) {
                $arFields = $resImg->GetFields();
	            $srcFile = CFile::GetPath($arFields['PROPERTY_MORE_PHOTO_VALUE']);

	            $arSection['MORE_PHOTO'][$arSections['UF_SLIDER_IMAGE']][] = $srcFile;
            }

            if ($arSections["UF_SECTION_COLOR"] == 1){
                $classColor = "red";
            } elseif ($arSections["UF_SECTION_COLOR"] == 2) {
                $classColor = "blue";
            } elseif ($arSections["UF_SECTION_COLOR"] == 3) {
                $classColor = "purple";
            }
            ?>
            <section class="section slider slider_catalog-<?=$classColor?> slider_<?=$classColor?> slider_catalog" id="<?=$this->GetEditAreaId($arSection['ID']);?>">
                <div class="slider__container container">
                    <div class="slider__inner">
                        <div class="slider__text">
                            <div class="slider__nav">
                                <div class="slider__pagination slider__pagination_catalog-<?=$classColor?> banner-pagination"></div>
                                <div class="slider__arrows">
                                    <div class="slider__prev slider__prev_catalog-<?=$classColor?> slider__arrow">
                                        <svg width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                    d="M9.32879 16.0499C9.70223 16.4436 9.69407 17.0631 9.31038 17.4468C8.91291 17.8442 8.26616 17.8366 7.87816 17.4299L-0.000122857 9.17151L7.87816 0.913123C8.26616 0.506398 8.91291 0.49878 9.31038 0.896257C9.69407 1.27994 9.70223 1.89945 9.32879 2.29311L3.7523 8.17151L21 8.17151C21.5523 8.17151 22 8.61922 22 9.17151C22 9.72379 21.5523 10.1715 21 10.1715L3.7523 10.1715L9.32879 16.0499Z"
                                                    fill="#00318A" />
                                        </svg>
                                    </div>
                                    <div class="slider__next slider__next_catalog-<?=$classColor?> slider__arrow">
                                        <svg width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                    d="M12.6712 2.12161C12.2978 1.72794 12.3059 1.10843 12.6896 0.724748C13.0871 0.327272 13.7338 0.334889 14.1218 0.741615L22.0001 9L14.1218 17.2584C13.7338 17.6651 13.0871 17.6727 12.6896 17.2753C12.3059 16.8916 12.2978 16.2721 12.6712 15.8784L18.2477 10H1C0.447715 10 0 9.55229 0 9C0 8.44771 0.447716 8 1 8H18.2477L12.6712 2.12161Z"
                                                    fill="#00318A" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-wrapper">
                                <div class="swiper-slide slider__item slider__item_text">
                                    <div class="slider__text-inner slider__text-inner_<?=$classColor?>">
                                        <div class="slider__quantity">
                                            <span class="slider__number slider__number_big">01/</span>
                                            <sup class="sldier__number slider__number_small">0<?=count($arSection['MORE_PHOTO'][$arSections['UF_SLIDER_IMAGE']]) + 1?></sup>
                                        </div>
                                        <div class="slider__title">
                                            <b><?=$arSection["NAME"]?></b>
                                        </div>
                                        <div class="slider__subtitle"><?=$arSection["DESCRIPTION"]?></div>
                                        <div class="slider__buttons">
                                            <a href="<?=$arSection["SECTION_PAGE_URL"]?>" class="slider__button slider__button_first button button_transparent">
                                                Перейти в каталог
                                            </a>
                                            <a href="#" class="slider__button slider__button_second button button_icon">
                                                Скачать каталог
                                                <svg class="button__icon" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                            d="M19 13V17C19 17.5304 18.7893 18.0391 18.4142 18.4142C18.0391 18.7893 17.5304 19 17 19H3C2.46957 19 1.96086 18.7893 1.58579 18.4142C1.21071 18.0391 1 17.5304 1 17V13M5 8L10 13M10 13L15 8M10 13V1"
                                                            stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slider__image">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide slider__item slider__item_image">
                                    <div class="slider__image-outer">
                                        <div class="slider__image-block slider__image-block_<?=$classColor?>" style="background-image: url(<?=$arSection["PICTURE"]["SRC"]?>)"></div>
                                    </div>
                                </div>

                                <?if(count($arSection['MORE_PHOTO']) > 0):?>
                                    <?foreach ($arSection['MORE_PHOTO'][$arSections['UF_SLIDER_IMAGE']] as $item):?>
                                        <div class="swiper-slide slider__item slider__item_image">
                                            <div class="slider__image-outer">
                                                <div class="slider__image-block slider__image-block_<?=$classColor?>" style="background-image: url(<?=$item?>)"></div>
                                            </div>
                                        </div>
                                    <?endforeach;?>
                                <?endif;?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?endforeach;?>
        <? unset($arSection);?>
<?endif;?>
