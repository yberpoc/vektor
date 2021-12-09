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
<?if($arResult['SECTIONS_COUNT'] > 0):?>
	<div class="container">
		<div class="inner-top">
			<div class="inner__info">
				<h1 class="inner__title"><?=$arResult['SECTION']['NAME']?></h1>
				<div class="inner__desc">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores doloremque ea earum enim eveniet id incidunt quidem? Alias provident similique unde voluptatum! Amet cumque, dolore in molestiae quibusdam repudiandae voluptate.
				</div>
				<div class="inner__info-bottom">
					<div class="button inner__info-button">Запросить цену</div>

					<div class="inner__info-load-links">
						<a href="#" target="_blank" class="load-link inner__info-load-link">
							Опросный лист
							<svg class="load-link__icon" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M19 13V17C19 17.5304 18.7893 18.0391 18.4142 18.4142C18.0391 18.7893 17.5304 19 17 19H3C2.46957 19 1.96086 18.7893 1.58579 18.4142C1.21071 18.0391 1 17.5304 1 17V13M5 8L10 13M10 13L15 8M10 13V1" stroke="#00318A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</a>

						<a href="#" target="_blank" class="load-link inner__info-load-link">
							Скачать каталог
							<svg class="load-link__icon" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M19 13V17C19 17.5304 18.7893 18.0391 18.4142 18.4142C18.0391 18.7893 17.5304 19 17 19H3C2.46957 19 1.96086 18.7893 1.58579 18.4142C1.21071 18.0391 1 17.5304 1 17V13M5 8L10 13M10 13L15 8M10 13V1" stroke="#00318A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</a>
					</div>

				</div>

			</div>
			<img src="<?=$arResult['SECTION']['RIGHT_SVG']['SRC']?>" alt="" class="inner__img">
		</div>
	</div>

		<div class="container inner <?$arResult['SECTION']['DEPTH_LEVEL'] == 1 ? 'inner_wide' : ''?>">
			<!-- CONTENT -->
			<div class="inner__content">
				<div class="inner__card-list card-list">
					<?foreach ($arResult['SECTIONS'] as $arSection):?>
						<?
						$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
						$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
						?>
						<div class="card-list__item" id="<?=$this->GetEditAreaId($arSection['ID']);?>">
							<!-- CARD -->
							<a href="<?=$arSection['SECTION_PAGE_URL']?>" class="card card_img-cover">

								<div class="card__img-wrap">
									<img src="<?=$arSection['PICTURE']['SRC']?>" alt="" class="card__img">
								</div>

								<div class="card__main-info">
									<h4 class="card__title"><?=$arSection['NAME']?></h4>

									<div class="card__icon-wrap">
										<svg class="card__icon" width="22" height="18" viewBox="0 0 22 18" fill="none"
										     xmlns="http://www.w3.org/2000/svg">
											<path
												d="M12.6712 2.12161C12.2978 1.72794 12.3059 1.10843 12.6896 0.724748C13.0871 0.327272 13.7338 0.334889 14.1218 0.741615L22.0001 9L14.1218 17.2584C13.7338 17.6651 13.0871 17.6727 12.6896 17.2753C12.3059 16.8916 12.2978 16.2721 12.6712 15.8784L18.2477 10H1C0.447715 10 0 9.55229 0 9C0 8.44771 0.447716 8 1 8H18.2477L12.6712 2.12161Z"
												fill="#025BFF" />
										</svg>
									</div>
								</div>

								<div class="card__additional-info">
									<h5 class="card__mini-title"><?=$arSection['NAME']?></h5>

									<div class="card__additional-bottom">
										<p class="card__description">
											<?=$arSection['DESCRIPTION']?>
										</p>
										<div class="card__more">
											Подробнее
											<div class="card__additional-icon-wrap">
												<svg class="card__additional-icon" width="22" height="18" viewBox="0 0 22 18" fill="none"
												     xmlns="http://www.w3.org/2000/svg">
													<path
														d="M12.6712 2.12161C12.2978 1.72794 12.3059 1.10843 12.6896 0.724748C13.0871 0.327272 13.7338 0.334889 14.1218 0.741615L22.0001 9L14.1218 17.2584C13.7338 17.6651 13.0871 17.6727 12.6896 17.2753C12.3059 16.8916 12.2978 16.2721 12.6712 15.8784L18.2477 10H1C0.447715 10 0 9.55229 0 9C0 8.44771 0.447716 8 1 8H18.2477L12.6712 2.12161Z"
														fill="#fff" />
												</svg>
											</div>
										</div>
									</div>
								</div>
							</a>
							<!-- /CARD -->
						</div>
					<?endforeach;?>
				</div>

				<div class="inner__price-buttons">
					<a href="#" class="button button_red inner__get-price" data-popup="form-popup">Запросить цену</a>
					<a href="#" class="load-link">
						Опросный лист
						<svg class="load-link__icon" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M19 13V17C19 17.5304 18.7893 18.0391 18.4142 18.4142C18.0391 18.7893 17.5304 19 17 19H3C2.46957 19 1.96086 18.7893 1.58579 18.4142C1.21071 18.0391 1 17.5304 1 17V13M5 8L10 13M10 13L15 8M10 13V1" stroke="#00318A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
					</a>
				</div>

				<?if($arResult['SECTION']['DEPTH_LEVEL'] == 2):?>
					<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.smart.filter", 
	"filter", 
	array(
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CONVERT_CURRENCY" => "Y",
		"CURRENCY_ID" => "RUB",
		"DISPLAY_ELEMENT_COUNT" => "Y",
		"FILTER_NAME" => "arrFilter",
		"FILTER_VIEW_MODE" => "vertical",
		"HIDE_NOT_AVAILABLE" => "N",
		"IBLOCK_ID" => "5",
		"IBLOCK_TYPE" => "catalog",
		"PAGER_PARAMS_NAME" => "arrPager",
		"POPUP_POSITION" => "left",
		"PREFILTER_NAME" => "smartPreFilter",
		"PRICE_CODE" => array(
			0 => "BASE",
		),
		"SAVE_IN_SESSION" => "N",
		"SECTION_CODE" => "5",
		"SECTION_CODE_PATH" => "",
		"SECTION_DESCRIPTION" => "-",
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_TITLE" => "-",
		"SEF_MODE" => "N",
		"SEF_RULE" => "",
		"SMART_FILTER_PATH" => "",
		"TEMPLATE_THEME" => "blue",
		"XML_EXPORT" => "N",
		"COMPONENT_TEMPLATE" => "filter"
	),
	false
);?>
				<?endif;?>

				<div data-content="aside-slider"></div>

				<div class="wysiwyg inner__wysiwyg">
					<?=$arResult['SECTION']['DESCRIPTION']?>
				</div>

				<div class="slider-reviews inner__slider-reviews">
					<div class="slider-reviews__slider swiper-container">
						<div class="swiper-wrapper">
							<div class="swiper-slide slider-reviews__item">
								<div class="slider-reviews__left">
									<span class="slider-reviews__count">01/<sup>5</sup></span>
									<span class="slider-reviews__category">Видеообзоры и отзывы</span>
									<span class="slider-reviews__title">Подкладные автомобильные весы УРАЛВЕС</span>
									<p class="slider-reviews__desc">Видеообзор подкладных весов, краткое описание видео...</p>
								</div>
								<div class="slider-reviews__right slider-reviews__right_img">
									<div class="slider-reviews__preview" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/img/reviews-img.jpg);"
									     data-popup="slider-reviews-popup" data-popup-img="<?=SITE_TEMPLATE_PATH?>/img/reviews-img.jpg"></div>
								</div>
							</div>
							<div class="swiper-slide slider-reviews__item">
								<div class="slider-reviews__left">
									<span class="slider-reviews__count">02/<sup>5</sup></span>
									<span class="slider-reviews__category">Видеообзоры и отзывы</span>
									<span class="slider-reviews__title">Подкладные автомобильные весы УРАЛВЕС</span>
									<p class="slider-reviews__desc">Видеообзор подкладных весов, краткое описание видео...</p>
								</div>
								<div class="slider-reviews__right slider-reviews__right_video">
									<div class="slider-reviews__preview" data-popup="slider-reviews-popup" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/img/reviews-preview.jpg);"
									     data-popup-video="https://www.youtube.com/embed/iMS4AxL8StI"></div>
								</div>
							</div>
						</div>
						<div class="slider-reviews__pagination"></div>
						<div class="slider-reviews__nav">
							<button class="slider-reviews__prev slider-reviews__button">
								<svg width="22" height="17" viewBox="0 0 22 17" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path
										d="M9.28625 15.0523C9.67965 15.4409 9.68159 16.0754 9.29058 16.4664C8.90125 16.8558 8.27002 16.8558 7.88069 16.4664L-0.000122821 8.5856L7.88069 0.704845C8.27002 0.315519 8.90125 0.315519 9.29057 0.704847C9.68159 1.09586 9.67965 1.73042 9.28624 2.11904L3.7523 7.5856L21 7.5856C21.5523 7.5856 22 8.03331 22 8.5856C22 9.13788 21.5523 9.5856 21 9.5856L3.7523 9.5856L9.28625 15.0523Z"
										fill="#025BFF" />
								</svg>
							</button>
							<button class="slider-reviews__next slider-reviews__button">
								<svg width="22" height="17" viewBox="0 0 22 17" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path
										d="M9.28625 15.0523C9.67965 15.4409 9.68159 16.0754 9.29058 16.4664C8.90125 16.8558 8.27002 16.8558 7.88069 16.4664L-0.000122821 8.5856L7.88069 0.704845C8.27002 0.315519 8.90125 0.315519 9.29057 0.704847C9.68159 1.09586 9.67965 1.73042 9.28624 2.11904L3.7523 7.5856L21 7.5856C21.5523 7.5856 22 8.03331 22 8.5856C22 9.13788 21.5523 9.5856 21 9.5856L3.7523 9.5856L9.28625 15.0523Z"
										fill="#025BFF" />
								</svg>
							</button>
						</div>
					</div>
				</div>


			</div>
			<!-- /CONTENT -->
			<?if($arResult['SECTION']['DEPTH_LEVEL'] == 2):?>
				<aside class="inner__sidebar">
					<div data-content="aside-slider">
						<div class="aside-slider">
							<div class="swiper-wrapper">
								<div class="swiper-slide aside-slider-slide">
									<span class="aside-slider-slide__title">Техническая поддержка</span>
									<div class="aside-slider-slide__content">
										<div class="aside-slider-slide__img-wrapper">
											<div class="aside-slider-slide__img" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/img/aside-1.jpg);"></div>
										</div>
										<div class="aside-slider-slide__top">
											<span class="aside-slider-slide__name">Павел бычков</span>
											<span class="aside-slider-slide__desc">Начальник отдела поддержки клиентов</span>
										</div>
										<div class="aside-slider-slide__bottom">
											<div class="aside-slider-slide__wrapper">
												<div class="aside-slider-slide__left">
													<a href="tel:+73422565924" class="aside-slider-slide__phone">+7 (342) 256 59 24</a>
													<span class="aside-slider-slide__schedule">Пн-Пт: с 9.00 до 18.00</span>
												</div>
												<div class="aside-slider-slide__right">
													<a href="tel:+73422565924" class="aside-slider-slide__call">
														<svg width="20" height="20" viewBox="0 0 20 20" fill="none"
														     xmlns="http://www.w3.org/2000/svg">
															<path
																d="M17.7059 5.86536L12.8405 5.86536M12.8405 5.86536V1M12.8405 5.86536L17.7059 1.00012M18.1054 13.8782V16.4585C18.1064 16.698 18.0573 16.9351 17.9614 17.1546C17.8654 17.3741 17.7247 17.5711 17.5482 17.733C17.3717 17.895 17.1633 18.0182 16.9364 18.095C16.7094 18.1717 16.469 18.2002 16.2304 18.1787C13.5838 17.8911 11.0416 16.9867 8.80793 15.5382C6.72982 14.2177 4.96795 12.4558 3.64744 10.3777C2.19388 8.13392 1.2893 5.5793 1.00698 2.92078C0.985488 2.68294 1.01375 2.44323 1.08998 2.21691C1.1662 1.99059 1.28872 1.78263 1.44972 1.60625C1.61073 1.42988 1.80669 1.28896 2.02514 1.19247C2.24359 1.09598 2.47974 1.04603 2.71855 1.0458H5.29879C5.7162 1.0417 6.12085 1.1895 6.43734 1.46168C6.75382 1.73386 6.96054 2.11183 7.01896 2.52515C7.12787 3.35088 7.32984 4.16165 7.62102 4.94198C7.73674 5.24982 7.76178 5.58439 7.69318 5.90603C7.62459 6.22767 7.46523 6.52291 7.23398 6.75675L6.14168 7.84906C7.36605 10.0023 9.14892 11.7852 11.3022 13.0096L12.3945 11.9173C12.6283 11.686 12.9236 11.5266 13.2452 11.458C13.5668 11.3895 13.9014 11.4145 14.2093 11.5302C14.9896 11.8214 15.8003 12.0234 16.6261 12.1323C17.0439 12.1912 17.4254 12.4017 17.6982 12.7236C17.971 13.0455 18.1159 13.4564 18.1054 13.8782Z"
																stroke="#025BFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
														</svg>
													</a>
												</div>
											</div>
											<button class="button button_rounded button_blue aside-slider-slide__button" data-popup="form-quest">Задать вопрос</button>
										</div>
									</div>
								</div>
								<div class="swiper-slide aside-slider-slide">
									<span class="aside-slider-slide__title">Техническая поддержка</span>
									<div class="aside-slider-slide__content">
										<div class="aside-slider-slide__img-wrapper">
											<div class="aside-slider-slide__img" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/img/aside-1.jpg);"></div>
										</div>
										<div class="aside-slider-slide__top">
											<span class="aside-slider-slide__name">Павел бычков</span>
											<span class="aside-slider-slide__desc">Начальник отдела поддержки клиентов</span>
										</div>
										<div class="aside-slider-slide__bottom">
											<div class="aside-slider-slide__wrapper">
												<div class="aside-slider-slide__left">
													<a href="tel:+73422565924" class="aside-slider-slide__phone">+7 (342) 256 59 24</a>
													<span class="aside-slider-slide__schedule">Пн-Пт: с 9.00 до 18.00</span>
												</div>
												<div class="aside-slider-slide__right">
													<a href="tel:+73422565924" class="aside-slider-slide__call">
														<svg width="20" height="20" viewBox="0 0 20 20" fill="none"
														     xmlns="http://www.w3.org/2000/svg">
															<path
																d="M17.7059 5.86536L12.8405 5.86536M12.8405 5.86536V1M12.8405 5.86536L17.7059 1.00012M18.1054 13.8782V16.4585C18.1064 16.698 18.0573 16.9351 17.9614 17.1546C17.8654 17.3741 17.7247 17.5711 17.5482 17.733C17.3717 17.895 17.1633 18.0182 16.9364 18.095C16.7094 18.1717 16.469 18.2002 16.2304 18.1787C13.5838 17.8911 11.0416 16.9867 8.80793 15.5382C6.72982 14.2177 4.96795 12.4558 3.64744 10.3777C2.19388 8.13392 1.2893 5.5793 1.00698 2.92078C0.985488 2.68294 1.01375 2.44323 1.08998 2.21691C1.1662 1.99059 1.28872 1.78263 1.44972 1.60625C1.61073 1.42988 1.80669 1.28896 2.02514 1.19247C2.24359 1.09598 2.47974 1.04603 2.71855 1.0458H5.29879C5.7162 1.0417 6.12085 1.1895 6.43734 1.46168C6.75382 1.73386 6.96054 2.11183 7.01896 2.52515C7.12787 3.35088 7.32984 4.16165 7.62102 4.94198C7.73674 5.24982 7.76178 5.58439 7.69318 5.90603C7.62459 6.22767 7.46523 6.52291 7.23398 6.75675L6.14168 7.84906C7.36605 10.0023 9.14892 11.7852 11.3022 13.0096L12.3945 11.9173C12.6283 11.686 12.9236 11.5266 13.2452 11.458C13.5668 11.3895 13.9014 11.4145 14.2093 11.5302C14.9896 11.8214 15.8003 12.0234 16.6261 12.1323C17.0439 12.1912 17.4254 12.4017 17.6982 12.7236C17.971 13.0455 18.1159 13.4564 18.1054 13.8782Z"
																stroke="#025BFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
														</svg>
													</a>
												</div>
											</div>
											<button class="button button_rounded button_blue aside-slider-slide__button" data-popup="form-quest">Задать вопрос</button>
										</div>
									</div>
								</div>
							</div>
							<div class="aside-slider__pagination pagination"></div>
						</div>
					</div>
				</aside>
			<?endif;?>
		</div>
<?endif;?>