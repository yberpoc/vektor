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

<?if(!empty($arResult['SECTIONS'])):?>
	<div class="container">
		<div class="inner-top">
			<div class="inner__info">
				<h1 class="inner__title"><?=$arResult['SECTION']['NAME']?></h1>
				<div class="inner__desc">
					Общий SEO текст
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
			<img src="<?=$arResult['SECTION']['PICTURE']?>" alt="" class="inner__img">
		</div>
	</div>
	<? if (0 < $arResult["SECTIONS_COUNT"]):?>
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
									Подобрать по параметрам
								</div>

								<div class="filter__header-title-mob">Параметы</div>
							</div>

							<svg class="filter__toggle" width="16" height="10" viewBox="0 0 16 10" fill="none"
							     xmlns="http://www.w3.org/2000/svg">
								<path d="M8 0L15.7942 9.75L0.205771 9.75L8 0Z" fill="#00318A" />
							</svg>

						</div>
						<div class="filter__items">
							<div class="filter__item">
								<div class="filter__item-name">
									Минимальная нагрузка от (т):
								</div>

								<div class="filter__item-checks">
									<label class="filter-check filter__item-check">
										<input name="1" type="checkbox">
										<div class="filter-check__text">0,04</div>
									</label>

									<label class="filter-check filter__item-check">
										<input name="2" type="checkbox">
										<div class="filter-check__text">0,04</div>
									</label>

									<label class="filter-check filter__item-check">
										<input name="3" type="checkbox">
										<div class="filter-check__text">0,2</div>
									</label>

									<label class="filter-check filter__item-check">
										<input name="4" type="checkbox">
										<div class="filter-check__text">0,5</div>
									</label>
								</div>
							</div>

							<div class="filter__item">
								<div class="filter__item-name">
									Максимальная нагрузка до (т):
								</div>

								<div class="filter__item-checks">
									<label class="filter-check filter__item-check">
										<input name="5" type="checkbox">
										<div class="filter-check__text">5</div>
									</label>

									<label class="filter-check filter__item-check">
										<input name="6" type="checkbox">
										<div class="filter-check__text">10</div>
									</label>

									<label class="filter-check filter__item-check">
										<input name="7" type="checkbox">
										<div class="filter-check__text">15</div>
									</label>

									<label class="filter-check filter__item-check">
										<input name="8" type="checkbox">
										<div class="filter-check__text">20</div>
									</label>

									<label class="filter-check filter__item-check">
										<input name="9" type="checkbox">
										<div class="filter-check__text">25</div>
									</label>

									<label class="filter-check filter__item-check">
										<input name="10" type="checkbox">
										<div class="filter-check__text">30</div>
									</label>
								</div>
							</div>

							<div class="filter__item">
								<div class="filter__item-name">
									Минимальная нагрузка от (т):
								</div>

								<div class="filter__item-checks">
									<label class="filter-check filter__item-check">
										<input name="11" type="checkbox">
										<div class="filter-check__text">0,04</div>
									</label>

									<label class="filter-check filter__item-check">
										<input name="12" type="checkbox">
										<div class="filter-check__text">0,04</div>
									</label>

									<label class="filter-check filter__item-check">
										<input name="12" type="checkbox">
										<div class="filter-check__text">0,2</div>
									</label>

									<label class="filter-check filter__item-check">
										<input name="14" type="checkbox">
										<div class="filter-check__text">0,5</div>
									</label>
								</div>
							</div>

							<div class="filter__item">
								<div class="filter__item-name">
									Опции
								</div>

								<div class="filter__item-checks">
									<label class="filter-check filter-check_v2 filter__item-check">
										<input name="15" type="checkbox">
										<div class="filter-check__text">
											<svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
												<rect x="1" y="1" width="44" height="44" stroke="#025BFF" stroke-width="2" />
												<path
													d="M9.94336 17.0293H6.64453V15.6641H9.94336V17.0293ZM12.9551 14.9844H13.8574C14.2871 14.9844 14.6055 14.877 14.8125 14.6621C15.0195 14.4473 15.123 14.1621 15.123 13.8066C15.123 13.4629 15.0195 13.1953 14.8125 13.0039C14.6094 12.8125 14.3281 12.7168 13.9688 12.7168C13.6445 12.7168 13.373 12.8066 13.1543 12.9863C12.9355 13.1621 12.8262 13.3926 12.8262 13.6777H11.1328C11.1328 13.2324 11.252 12.834 11.4902 12.4824C11.7324 12.127 12.0684 11.8496 12.498 11.6504C12.9316 11.4512 13.4082 11.3516 13.9277 11.3516C14.8301 11.3516 15.5371 11.5684 16.0488 12.002C16.5605 12.4316 16.8164 13.0254 16.8164 13.7832C16.8164 14.1738 16.6973 14.5332 16.459 14.8613C16.2207 15.1895 15.9082 15.4414 15.5215 15.6172C16.002 15.7891 16.3594 16.0469 16.5938 16.3906C16.832 16.7344 16.9512 17.1406 16.9512 17.6094C16.9512 18.3672 16.6738 18.9746 16.1191 19.4316C15.5684 19.8887 14.8379 20.1172 13.9277 20.1172C13.0762 20.1172 12.3789 19.8926 11.8359 19.4434C11.2969 18.9941 11.0273 18.4004 11.0273 17.6621H12.7207C12.7207 17.9824 12.8398 18.2441 13.0781 18.4473C13.3203 18.6504 13.6172 18.752 13.9688 18.752C14.3711 18.752 14.6855 18.6465 14.9121 18.4355C15.1426 18.2207 15.2578 17.9375 15.2578 17.5859C15.2578 16.7344 14.7891 16.3086 13.8516 16.3086H12.9551V14.9844ZM23.8652 16.4727C23.8652 17.6523 23.6211 18.5547 23.1328 19.1797C22.6445 19.8047 21.9297 20.1172 20.9883 20.1172C20.0586 20.1172 19.3477 19.8105 18.8555 19.1973C18.3633 18.584 18.1113 17.7051 18.0996 16.5605V14.9902C18.0996 13.7988 18.3457 12.8945 18.8379 12.2773C19.334 11.6602 20.0469 11.3516 20.9766 11.3516C21.9062 11.3516 22.6172 11.6582 23.1094 12.2715C23.6016 12.8809 23.8535 13.7578 23.8652 14.9023V16.4727ZM22.1719 14.75C22.1719 14.043 22.0742 13.5293 21.8789 13.209C21.6875 12.8848 21.3867 12.7227 20.9766 12.7227C20.5781 12.7227 20.2832 12.877 20.0918 13.1855C19.9043 13.4902 19.8047 13.9688 19.793 14.6211V16.6953C19.793 17.3906 19.8867 17.9082 20.0742 18.248C20.2656 18.584 20.5703 18.752 20.9883 18.752C21.4023 18.752 21.7012 18.5898 21.8848 18.2656C22.0684 17.9414 22.1641 17.4453 22.1719 16.7773V14.75ZM10.0664 29.2246H12.1816V30.7539H10.0664V33.1445H8.45508V30.7539H6.33398V29.2246H8.45508V26.9336H10.0664V29.2246ZM13.3828 29.8047L13.875 25.4688H18.6562V26.8809H15.2637L15.0527 28.7148C15.4551 28.5 15.8828 28.3926 16.3359 28.3926C17.1484 28.3926 17.7852 28.6445 18.2461 29.1484C18.707 29.6523 18.9375 30.3574 18.9375 31.2637C18.9375 31.8145 18.8203 32.3086 18.5859 32.7461C18.3555 33.1797 18.0234 33.5176 17.5898 33.7598C17.1562 33.998 16.6445 34.1172 16.0547 34.1172C15.5391 34.1172 15.0605 34.0137 14.6191 33.8066C14.1777 33.5957 13.8281 33.3008 13.5703 32.9219C13.3164 32.543 13.1816 32.1113 13.166 31.627H14.8418C14.877 31.9824 15 32.2598 15.2109 32.459C15.4258 32.6543 15.7051 32.752 16.0488 32.752C16.4316 32.752 16.7266 32.6152 16.9336 32.3418C17.1406 32.0645 17.2441 31.6738 17.2441 31.1699C17.2441 30.6855 17.125 30.3145 16.8867 30.0566C16.6484 29.7988 16.3105 29.6699 15.873 29.6699C15.4707 29.6699 15.1445 29.7754 14.8945 29.9863L14.7305 30.1387L13.3828 29.8047ZM25.7637 30.4727C25.7637 31.6523 25.5195 32.5547 25.0312 33.1797C24.543 33.8047 23.8281 34.1172 22.8867 34.1172C21.957 34.1172 21.2461 33.8105 20.7539 33.1973C20.2617 32.584 20.0098 31.7051 19.998 30.5605V28.9902C19.998 27.7988 20.2441 26.8945 20.7363 26.2773C21.2324 25.6602 21.9453 25.3516 22.875 25.3516C23.8047 25.3516 24.5156 25.6582 25.0078 26.2715C25.5 26.8809 25.752 27.7578 25.7637 28.9023V30.4727ZM24.0703 28.75C24.0703 28.043 23.9727 27.5293 23.7773 27.209C23.5859 26.8848 23.2852 26.7227 22.875 26.7227C22.4766 26.7227 22.1816 26.877 21.9902 27.1855C21.8027 27.4902 21.7031 27.9688 21.6914 28.6211V30.6953C21.6914 31.3906 21.7852 31.9082 21.9727 32.248C22.1641 32.584 22.4688 32.752 22.8867 32.752C23.3008 32.752 23.5996 32.5898 23.7832 32.2656C23.9668 31.9414 24.0625 31.4453 24.0703 30.7773V28.75Z"
													fill="#2874FF" />
												<path
													d="M37 25.76V14.5C37 13.837 36.7366 13.2011 36.2678 12.7322C35.7989 12.2634 35.163 12 34.5 12C33.837 12 33.2011 12.2634 32.7322 12.7322C32.2634 13.2011 32 13.837 32 14.5V25.76C31.1973 26.2963 30.5883 27.0766 30.2631 27.9856C29.9378 28.8946 29.9135 29.8841 30.1938 30.8079C30.474 31.7317 31.0439 32.541 31.8193 33.1161C32.5948 33.6912 33.5346 34.0017 34.5 34.0017C35.4654 34.0017 36.4052 33.6912 37.1807 33.1161C37.9561 32.541 38.526 31.7317 38.8062 30.8079C39.0865 29.8841 39.0622 28.8946 38.7369 27.9856C38.4117 27.0766 37.8027 26.2963 37 25.76Z"
													stroke="#025BFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
											</svg>

										</div>
									</label>

									<label class="filter-check filter-check_v2 filter__item-check">
										<input name="16" type="checkbox">
										<div class="filter-check__text">
											<svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
												<rect x="1" y="1" width="44" height="44" stroke="#025BFF" stroke-width="2" />
												<path
													d="M23.0002 26.6668C24.4729 26.6668 25.6668 25.4729 25.6668 24.0002C25.6668 22.5274 24.4729 21.3335 23.0002 21.3335C21.5274 21.3335 20.3335 22.5274 20.3335 24.0002C20.3335 25.4729 21.5274 26.6668 23.0002 26.6668Z"
													stroke="#025BFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
												<path
													d="M28.6533 18.3466C29.3971 19.0896 29.9871 19.9719 30.3897 20.9431C30.7923 21.9142 30.9995 22.9553 30.9995 24.0066C30.9995 25.0579 30.7923 26.0989 30.3897 27.0701C29.9871 28.0413 29.3971 28.9236 28.6533 29.6666M17.3466 29.6532C16.6028 28.9103 16.0127 28.028 15.6101 27.0568C15.2075 26.0856 15.0003 25.0446 15.0003 23.9932C15.0003 22.9419 15.2075 21.9009 15.6101 20.9297C16.0127 19.9585 16.6028 19.0762 17.3466 18.3332M32.4266 14.5732C34.9262 17.0736 36.3304 20.4644 36.3304 23.9999C36.3304 27.5354 34.9262 30.9262 32.4266 33.4266M13.5733 33.4266C11.0736 30.9262 9.66943 27.5354 9.66943 23.9999C9.66943 20.4644 11.0736 17.0736 13.5733 14.5732"
													stroke="#025BFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
											</svg>
										</div>
									</label>

									<label class="filter-check filter-check_v2 filter__item-check">
										<input name="18" type="checkbox">
										<div class="filter-check__text">
											<svg width="49" height="46" viewBox="0 0 49 46" fill="none" xmlns="http://www.w3.org/2000/svg">
												<rect x="1" y="1" width="44" height="44" stroke="#025BFF" stroke-width="2" />
												<path
													d="M12.2383 13.6602L12.291 14.3691C12.7402 13.8184 13.3477 13.543 14.1133 13.543C14.9297 13.543 15.4902 13.8652 15.7949 14.5098C16.2402 13.8652 16.875 13.543 17.6992 13.543C18.3867 13.543 18.8984 13.7441 19.2344 14.1465C19.5703 14.5449 19.7383 15.1465 19.7383 15.9512V20H18.0391V15.957C18.0391 15.5977 17.9688 15.3359 17.8281 15.1719C17.6875 15.0039 17.4395 14.9199 17.084 14.9199C16.5762 14.9199 16.2246 15.1621 16.0293 15.6465L16.0352 20H14.3418V15.9629C14.3418 15.5957 14.2695 15.3301 14.125 15.166C13.9805 15.002 13.7344 14.9199 13.3867 14.9199C12.9062 14.9199 12.5586 15.1191 12.3438 15.5176V20H10.6504V13.6602H12.2383ZM24.7188 20C24.6406 19.8477 24.584 19.6582 24.5488 19.4316C24.1387 19.8887 23.6055 20.1172 22.9492 20.1172C22.3281 20.1172 21.8125 19.9375 21.4023 19.5781C20.9961 19.2188 20.793 18.7656 20.793 18.2188C20.793 17.5469 21.041 17.0312 21.5371 16.6719C22.0371 16.3125 22.7578 16.1309 23.6992 16.127H24.4785V15.7637C24.4785 15.4707 24.4023 15.2363 24.25 15.0605C24.1016 14.8848 23.8652 14.7969 23.541 14.7969C23.2559 14.7969 23.0312 14.8652 22.8672 15.002C22.707 15.1387 22.627 15.3262 22.627 15.5645H20.9336C20.9336 15.1973 21.0469 14.8574 21.2734 14.5449C21.5 14.2324 21.8203 13.9883 22.2344 13.8125C22.6484 13.6328 23.1133 13.543 23.6289 13.543C24.4102 13.543 25.0293 13.7402 25.4863 14.1348C25.9473 14.5254 26.1777 15.0762 26.1777 15.7871V18.5352C26.1816 19.1367 26.2656 19.5918 26.4297 19.9004V20H24.7188ZM23.3184 18.8223C23.5684 18.8223 23.7988 18.7676 24.0098 18.6582C24.2207 18.5449 24.377 18.3945 24.4785 18.207V17.1172H23.8457C22.998 17.1172 22.5469 17.4102 22.4922 17.9961L22.4863 18.0957C22.4863 18.3066 22.5605 18.4805 22.709 18.6172C22.8574 18.7539 23.0605 18.8223 23.3184 18.8223ZM29.8926 15.5527L30.959 13.6602H32.7695L30.9648 16.7656L32.8457 20H31.0293L29.8984 18.0078L28.7734 20H26.9512L28.832 16.7656L27.0332 13.6602H28.8496L29.8926 15.5527ZM15.4756 34H13.5V26.3848L11.1416 27.1162V25.5098L15.2637 24.0332H15.4756V34ZM25.415 29.8848C25.415 31.2611 25.1302 32.3138 24.5605 33.043C23.9909 33.7721 23.1569 34.1367 22.0586 34.1367C20.974 34.1367 20.1445 33.779 19.5703 33.0635C18.9961 32.348 18.7021 31.3226 18.6885 29.9873V28.1553C18.6885 26.7653 18.9756 25.7103 19.5498 24.9902C20.1286 24.2702 20.9603 23.9102 22.0449 23.9102C23.1296 23.9102 23.959 24.2679 24.5332 24.9834C25.1074 25.6943 25.4014 26.7174 25.415 28.0527V29.8848ZM23.4395 27.875C23.4395 27.0501 23.3255 26.4508 23.0977 26.0771C22.8743 25.6989 22.5234 25.5098 22.0449 25.5098C21.5801 25.5098 21.236 25.6898 21.0127 26.0498C20.7939 26.4053 20.6777 26.9635 20.6641 27.7246V30.1445C20.6641 30.9557 20.7734 31.5596 20.9922 31.9561C21.2155 32.348 21.571 32.5439 22.0586 32.5439C22.5417 32.5439 22.8903 32.3548 23.1045 31.9766C23.3187 31.5983 23.4303 31.0195 23.4395 30.2402V27.875ZM32.9756 28.1895H30.6035V34H28.6211V28.1895H26.29V26.6035H32.9756V28.1895Z"
													fill="#025BFF" />
											</svg>

										</div>
									</label>


								</div>
							</div>
							<div class="filter__buttons">
								<button class="filter__reset">Сбросить все <div class="filter__reset-icon">х</div></button>
								<button class="filter__show button"><span>Показать <b>(выбрано <div class="filter__show-counter">6</div>
										)</b></span></button>
							</div>
						</div>


					</div>
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
<?endif;?>