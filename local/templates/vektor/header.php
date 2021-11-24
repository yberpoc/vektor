<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
    use \Bitrix\Main\Page\Asset;
    use \Bitrix\Main\Localization\Loc;
?>
<!DOCTYPE html>
<html lang="<?=LANGUAGE_ID?>">

<head>
  <title><?$APPLICATION->ShowTitle();?></title>
    <?$APPLICATION->ShowHead();?>
    <?
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/styles.min.css');
        Asset::getInstance()->addString('<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">')
    ?>
</head>

<body>
    <div id="panel"><?$APPLICATION->ShowPanel();?></div>
  	<!-- HEADER -->
	<header class="header">
		<div class="header-top">
			<div class="container header-top__container">
				<div class="header-dark"></div>
				<a href="/" class="header-logo">
					<svg width="339" height="36" class="header-logo__img" viewBox="0 0 339 36" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M0 36H36.2956C36.2956 25.1443 36.2956 11.2268 36.2956 0H0C0 10.6701 0 25.9794 0 36ZM12.5351 8.16495H28.0636V23.567L23.1057 18.6495L12.0674 29.5979L6.54818 24.0309L17.5865 13.0825L12.5351 8.16495Z" fill="#025BFF"/>
						<path d="M12.535 8.16504H28.0635V23.5671L23.1056 18.6496L12.0673 29.598L6.5481 24.031L17.4929 13.0826L12.535 8.16504Z" fill="white"/>
						<path class="header-logo__text" d="M250.416 17.2917H257.68V24.5521H250.416V17.2917ZM339 34.4687V1.70833H325.358L319.689 17.2917L314.019 1.70833H300.377V34.4687H310.299V14.8125L317.563 34.4687H321.992L329.256 14.8125V34.4687H339ZM294.885 34.4687V1.70833H263.349V34.4687H273.271V10.3854H284.964V34.4687H294.885ZM233.231 15.5208H226.853V10.3854H233.231C234.825 10.3854 236.243 11.2708 236.243 12.8646C236.243 14.4583 235.003 15.5208 233.231 15.5208ZM227.03 34.4687V24.1979H234.648C242.266 24.1979 246.341 19.0625 246.341 13.0417C246.341 7.02083 242.266 1.88542 234.648 1.88542H217.109V34.6458H227.03V34.4687ZM195.671 26.3229C190.888 26.3229 187.876 22.7812 187.876 18.1771C187.876 13.5729 190.888 10.0312 195.671 10.0312C200.455 10.0312 203.644 13.5729 203.644 18.1771C203.644 22.7812 200.455 26.3229 195.671 26.3229ZM195.671 35C205.77 35 213.565 28.0938 213.565 18C213.565 7.90625 205.77 1 195.671 1C185.573 1 177.777 7.90625 177.777 18C177.777 28.0938 185.573 35 195.671 35ZM168.21 34.4687V10.3854H176.891V1.70833H149.43V10.3854H158.289V34.4687H168.21ZM149.608 34.4687L136.674 16.9375L149.076 1.70833H137.029L128.525 13.9271V1.70833H118.603V34.4687H128.525V25.4375L130.296 22.9583L137.737 34.4687H149.608ZM113.997 34.4687V25.7917H99.1148V22.25H113.643V13.5729H99.1148V10.3854H113.997V1.70833H89.1934V34.4687H113.997ZM72.8939 26.1458H64.9214V21.8958H72.8939C74.3113 21.8958 75.1971 22.7812 75.1971 24.0208C75.1971 25.2604 74.1341 26.1458 72.8939 26.1458ZM72.5396 13.75H64.9214V9.85417H72.5396C73.6026 9.85417 74.4885 10.5625 74.4885 11.625C74.4885 12.8646 73.6026 13.75 72.5396 13.75ZM75.5515 34.4687C82.1067 34.4687 85.1185 30.2187 85.1185 25.6146C85.1185 21.3646 82.461 18.1771 78.9177 17.6458C82.1067 16.9375 84.4099 14.2812 84.4099 10.2083C84.4099 6.3125 81.5752 1.88542 74.6656 1.88542H55V34.6458H75.5515V34.4687Z" fill="#151616"/>
					</svg>
				</a>
				<span class="header__adv">Опыт. <br>Репутация. <br>Надежность</span>
				<div class="header__contacts">
					<a href="mailto:mail@vektorpm.ru" class="header__email">mail@vektorpm.ru</a>
					<a href="+78001002489" class="header__phone">8 800 100 24 89</a>
				</div>
				<a href="#" data-popup="form-popup" class="header__call">
					<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path
							d="M17.7059 6.67982L12.8405 6.67982M12.8405 6.67982V1.81445M12.8405 6.67982L17.7059 1.81458M18.1054 14.6927V17.2729C18.1064 17.5125 18.0573 17.7496 17.9614 17.969C17.8654 18.1885 17.7247 18.3855 17.5482 18.5475C17.3717 18.7094 17.1633 18.8327 16.9364 18.9094C16.7094 18.9862 16.469 19.0147 16.2304 18.9931C13.5838 18.7055 11.0416 17.8012 8.80793 16.3527C6.72982 15.0321 4.96795 13.2703 3.64744 11.1922C2.19388 8.94838 1.2893 6.39375 1.00698 3.73524C0.985488 3.4974 1.01375 3.25769 1.08998 3.03137C1.1662 2.80505 1.28872 2.59708 1.44972 2.4207C1.61073 2.24433 1.80669 2.10341 2.02514 2.00692C2.24359 1.91043 2.47974 1.86048 2.71855 1.86026H5.29879C5.7162 1.85615 6.12085 2.00396 6.43734 2.27613C6.75382 2.54831 6.96054 2.92628 7.01896 3.3396C7.12787 4.16534 7.32984 4.9761 7.62102 5.75643C7.73674 6.06428 7.76178 6.39884 7.69318 6.72048C7.62459 7.04212 7.46523 7.33736 7.23398 7.57121L6.14168 8.66351C7.36605 10.8168 9.14892 12.5996 11.3022 13.824L12.3945 12.7317C12.6283 12.5005 12.9236 12.3411 13.2452 12.2725C13.5668 12.2039 13.9014 12.2289 14.2093 12.3447C14.9896 12.6358 15.8003 12.8378 16.6261 12.9467C17.0439 13.0057 17.4254 13.2161 17.6982 13.538C17.971 13.8599 18.1159 14.2709 18.1054 14.6927Z"
							stroke="#025BFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
					</svg>
				</a>
				<button class="header__button button button_rounded">Кабинет дилера</button>
				<div class="header-basket__wrap">
					<button class="header-basket">
						<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path
								d="M0 1H3.80952L6.3619 13.7524C6.44899 14.1909 6.68753 14.5847 7.03576 14.865C7.38398 15.1454 7.81971 15.2943 8.26667 15.2857H17.5238C17.9708 15.2943 18.4065 15.1454 18.7547 14.865C19.1029 14.5847 19.3415 14.1909 19.4286 13.7524L20.9524 5.7619H4.7619M8.57145 20.0476C8.57145 20.5736 8.14505 21 7.61906 21C7.09308 21 6.66668 20.5736 6.66668 20.0476C6.66668 19.5217 7.09308 19.0953 7.61906 19.0953C8.14505 19.0953 8.57145 19.5217 8.57145 20.0476ZM19.0476 20.0476C19.0476 20.5736 18.6212 21 18.0953 21C17.5693 21 17.1429 20.5736 17.1429 20.0476C17.1429 19.5217 17.5693 19.0953 18.0953 19.0953C18.6212 19.0953 19.0476 19.5217 19.0476 20.0476Z"
								stroke="#025BFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
						<span class="header-basket__count">0</span>
					</button>
				</div>
				<button class="header-burger">
					<span class="header-burger__lines"></span>
				</button>
			</div>
		</div>
		<div class="header-bottom">
			<div class="container header-bottom__container">
				<nav class="header-menu">
					<ul class="header-menu__list">
						<li class="header-menu__item header-menu__item_big">
							<a href="" class="header-menu__link">Продукция</a>
							<ul class="header-menu__sublist">
								<li class="header-menu__subitem">
									<a href="" class="header-menu__sublink">
										<img src="<?=SITE_TEMPLATE_PATH?>/img/menu-logo-1.svg" alt="" class="header-menu__logo">
										Весы и весовая электроника
									</a>
									<div class="header-menu__catalog">
										<ul class="header-menu__catalog-list">
											<li class="header-menu__catalog-item">
												<a href="" class="header-menu__catalog-link">Крановые весы</a>
											</li>
											<li class="header-menu__catalog-item">
												<a href="" class="header-menu__catalog-link">Выгонные весы</a>
											</li>
											<li class="header-menu__catalog-item">
												<a href="" class="header-menu__catalog-link">Тензометрические датчики</a>
											</li>
											<li class="header-menu__catalog-item">
												<a href="" class="header-menu__catalog-link">Напольные весы</a>
											</li>
											<li class="header-menu__catalog-item">
												<a href="" class="header-menu__catalog-link">Крановые весы</a>
											</li>
											<li class="header-menu__catalog-item">
												<a href="" class="header-menu__catalog-link">Выгонные весы</a>
											</li>
											<li class="header-menu__catalog-item">
												<a href="" class="header-menu__catalog-link">Тензометрические датчики</a>
											</li>
									
											<li class="header-menu__catalog-item">
												<a href="" class="header-menu__catalog-link">Тензометрические датчики</a>
											</li>
											<li class="header-menu__catalog-item">
												<a href="" class="header-menu__catalog-link">Напольные весы</a>
											</li>
											<li class="header-menu__catalog-item">
												<a href="" class="header-menu__catalog-link">Автомобильные весы</a>
											</li>
											<li class="header-menu__catalog-item">
												<a href="" class="header-menu__catalog-link">Весоизмерительные приборы</a>
											</li>
											<li class="header-menu__catalog-item">
												<a href="" class="header-menu__catalog-link">Автоматизация взвешивания</a>
											</li>
											<li class="header-menu__catalog-item">
												<a href="" class="header-menu__catalog-link">Модернизация механических весов</a>
											</li>
											<li class="header-menu__catalog-item">
												<a href="" class="header-menu__catalog-link">Дополнительное оборудование</a>
											</li>
											<li class="header-menu__catalog-item">
												<a href="" class="header-menu__catalog-link">Программное обеспечение</a>
											</li>
											<li class="header-menu__catalog-item">
												<a href="" class="header-menu__catalog-link">Сервисные услуги</a>
											</li>
										</ul>
										<a href="" class="header-menu__news" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/img/header-news.jpg);">
											<div class="header-menu__news-info">
												<span class="header-menu__news-title">Итоги выставки "Нефть и газ. Химия-2019"</span>
												<svg class="header-menu__news-arrow" width="22" height="18" viewBox="0 0 22 18" fill="none"
													xmlns="http://www.w3.org/2000/svg">
													<path
														d="M12.6712 2.12161C12.2978 1.72794 12.3059 1.10843 12.6896 0.724748C13.0871 0.327272 13.7338 0.334889 14.1218 0.741615L22.0001 9L14.1218 17.2584C13.7338 17.6651 13.0871 17.6727 12.6896 17.2753C12.3059 16.8916 12.2978 16.2721 12.6712 15.8784L18.2477 10H1C0.447715 10 0 9.55229 0 9C0 8.44771 0.447716 8 1 8H18.2477L12.6712 2.12161Z"
														fill="white" />
												</svg>
											</div>
										</a>
									</div>
								</li>
								<li class="header-menu__subitem">
									<a href="" class="header-menu__sublink">
										<img src="<?=SITE_TEMPLATE_PATH?>/img/menu-logo-2.svg" alt="" class="header-menu__logo">
										Приборостроение
									</a>
									<div class="header-menu__catalog">
										<ul class="header-menu__catalog-list">
											<li class="header-menu__catalog-item">
												<a href="" class="header-menu__catalog-link">Крановые весы</a>
											</li>
											<li class="header-menu__catalog-item">
												<a href="" class="header-menu__catalog-link">Выгонные весы</a>
											</li>
											<li class="header-menu__catalog-item">
												<a href="" class="header-menu__catalog-link">Тензометрические датчики</a>
											</li>
											<li class="header-menu__catalog-item">
												<a href="" class="header-menu__catalog-link">Напольные весы</a>
											</li>
											<li class="header-menu__catalog-item">
												<a href="" class="header-menu__catalog-link">Автомобильные весы</a>
											</li>
											<li class="header-menu__catalog-item">
												<a href="" class="header-menu__catalog-link">Весоизмерительные приборы</a>
											</li>
											<li class="header-menu__catalog-item">
												<a href="" class="header-menu__catalog-link">Автоматизация взвешивания</a>
											</li>
											<li class="header-menu__catalog-item">
												<a href="" class="header-menu__catalog-link">Модернизация механических весов</a>
											</li>
											<li class="header-menu__catalog-item">
												<a href="" class="header-menu__catalog-link">Дополнительное оборудование</a>
											</li>
											<li class="header-menu__catalog-item">
												<a href="" class="header-menu__catalog-link">Программное обеспечение</a>
											</li>
											<li class="header-menu__catalog-item">
												<a href="" class="header-menu__catalog-link">Сервисные услуги</a>
											</li>
										</ul>
										<a href="" class="header-menu__news" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/img/header-news.jpg);">
											<div class="header-menu__news-info">
												<span class="header-menu__news-title">Итоги выставки "Нефть и газ. Химия-2019"</span>
												<svg class="header-menu__news-arrow" width="22" height="18" viewBox="0 0 22 18" fill="none"
													xmlns="http://www.w3.org/2000/svg">
													<path
														d="M12.6712 2.12161C12.2978 1.72794 12.3059 1.10843 12.6896 0.724748C13.0871 0.327272 13.7338 0.334889 14.1218 0.741615L22.0001 9L14.1218 17.2584C13.7338 17.6651 13.0871 17.6727 12.6896 17.2753C12.3059 16.8916 12.2978 16.2721 12.6712 15.8784L18.2477 10H1C0.447715 10 0 9.55229 0 9C0 8.44771 0.447716 8 1 8H18.2477L12.6712 2.12161Z"
														fill="white" />
												</svg>
											</div>
										</a>
									</div>
								<li class="header-menu__subitem">
									<a href="" class="header-menu__sublink">
										<img src="<?=SITE_TEMPLATE_PATH?>/img/menu-logo-3.svg" alt="" class="header-menu__logo">
										Гидроцилиндры
									</a>
									<div class="header-menu__catalog">
										<ul class="header-menu__catalog-list">
											<li class="header-menu__catalog-item">
												<a href="" class="header-menu__catalog-link">Крановые весы</a>
											</li>
											<li class="header-menu__catalog-item">
												<a href="" class="header-menu__catalog-link">Выгонные весы</a>
											</li>
											<li class="header-menu__catalog-item">
												<a href="" class="header-menu__catalog-link">Тензометрические датчики</a>
											</li>
											<li class="header-menu__catalog-item">
												<a href="" class="header-menu__catalog-link">Напольные весы</a>
											</li>
											<li class="header-menu__catalog-item">
												<a href="" class="header-menu__catalog-link">Автомобильные весы</a>
											</li>
											<li class="header-menu__catalog-item">
												<a href="" class="header-menu__catalog-link">Весоизмерительные приборы</a>
											</li>
											<li class="header-menu__catalog-item">
												<a href="" class="header-menu__catalog-link">Автоматизация взвешивания</a>
											</li>
											<li class="header-menu__catalog-item">
												<a href="" class="header-menu__catalog-link">Модернизация механических весов</a>
											</li>
											<li class="header-menu__catalog-item">
												<a href="" class="header-menu__catalog-link">Дополнительное оборудование</a>
											</li>
											<li class="header-menu__catalog-item">
												<a href="" class="header-menu__catalog-link">Программное обеспечение</a>
											</li>
											<li class="header-menu__catalog-item">
												<a href="" class="header-menu__catalog-link">Сервисные услуги</a>
											</li>
										</ul>
										<a href="" class="header-menu__news" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/img/header-news.jpg);">
											<div class="header-menu__news-info">
												<span class="header-menu__news-title">Итоги выставки "Нефть и газ. Химия-2019"</span>
												<svg class="header-menu__news-arrow" width="22" height="18" viewBox="0 0 22 18" fill="none"
													xmlns="http://www.w3.org/2000/svg">
													<path
														d="M12.6712 2.12161C12.2978 1.72794 12.3059 1.10843 12.6896 0.724748C13.0871 0.327272 13.7338 0.334889 14.1218 0.741615L22.0001 9L14.1218 17.2584C13.7338 17.6651 13.0871 17.6727 12.6896 17.2753C12.3059 16.8916 12.2978 16.2721 12.6712 15.8784L18.2477 10H1C0.447715 10 0 9.55229 0 9C0 8.44771 0.447716 8 1 8H18.2477L12.6712 2.12161Z"
														fill="white" />
												</svg>
											</div>
										</a>
									</div>
								</li>
								<li class="header-menu__subitem">
									<a href="" class="header-menu__sublink">
										<img src="<?=SITE_TEMPLATE_PATH?>/img/menu-logo-4.svg" alt="" class="header-menu__logo">
										Вся Продукция <br> от а до я
									</a>
									<div class="header-menu__catalog">
										<ul class="header-menu__catalog-list">
											<li class="header-menu__catalog-item">
												<a href="" class="header-menu__catalog-link">Крановые весы</a>
											</li>
											<li class="header-menu__catalog-item">
												<a href="" class="header-menu__catalog-link">Выгонные весы</a>
											</li>
											<li class="header-menu__catalog-item">
												<a href="" class="header-menu__catalog-link">Тензометрические датчики</a>
											</li>
											<li class="header-menu__catalog-item">
												<a href="" class="header-menu__catalog-link">Напольные весы</a>
											</li>
											<li class="header-menu__catalog-item">
												<a href="" class="header-menu__catalog-link">Автомобильные весы</a>
											</li>
											<li class="header-menu__catalog-item">
												<a href="" class="header-menu__catalog-link">Весоизмерительные приборы</a>
											</li>
											<li class="header-menu__catalog-item">
												<a href="" class="header-menu__catalog-link">Автоматизация взвешивания</a>
											</li>
											<li class="header-menu__catalog-item">
												<a href="" class="header-menu__catalog-link">Модернизация механических весов</a>
											</li>
											<li class="header-menu__catalog-item">
												<a href="" class="header-menu__catalog-link">Дополнительное оборудование</a>
											</li>
											<li class="header-menu__catalog-item">
												<a href="" class="header-menu__catalog-link">Программное обеспечение</a>
											</li>
											<li class="header-menu__catalog-item">
												<a href="" class="header-menu__catalog-link">Сервисные услуги</a>
											</li>
										</ul>
										<a href="" class="header-menu__news" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/img/header-news.jpg);">
											<div class="header-menu__news-info">
												<span class="header-menu__news-title">Итоги выставки "Нефть и газ. Химия-2019"</span>
												<svg class="header-menu__news-arrow" width="22" height="18" viewBox="0 0 22 18" fill="none"
													xmlns="http://www.w3.org/2000/svg">
													<path
														d="M12.6712 2.12161C12.2978 1.72794 12.3059 1.10843 12.6896 0.724748C13.0871 0.327272 13.7338 0.334889 14.1218 0.741615L22.0001 9L14.1218 17.2584C13.7338 17.6651 13.0871 17.6727 12.6896 17.2753C12.3059 16.8916 12.2978 16.2721 12.6712 15.8784L18.2477 10H1C0.447715 10 0 9.55229 0 9C0 8.44771 0.447716 8 1 8H18.2477L12.6712 2.12161Z"
														fill="white" />
												</svg>
											</div>
										</a>
									</div>
								</li>
							</ul>
						</li>
						<li class="header-menu__item header-menu__item_active">
							<a href="" class="header-menu__link">О заводе</a>
							<ul class="header-menu__sublist">
								<li class="header-menu__subitem">
									<a href="" class="header-menu__sublink">Клиенты и партнеры</a>
									<ul class="header-menu__sublist">
										<li class="header-menu__subitem">
											<a href="" class="header-menu__sublink">Клиенты и партнеры</a>
										</li>
										<li class="header-menu__subitem">
											<a href="" class="header-menu__sublink">Отзывы</a>
										</li>
									</ul>
								</li>
								<li class="header-menu__subitem">
									<a href="" class="header-menu__sublink">Отзывы</a>
								</li>
								<li class="header-menu__subitem">
									<a href="" class="header-menu__sublink">Сертификаты</a>
								</li>
								<li class="header-menu__subitem">
									<a href="" class="header-menu__sublink">Работа у нас</a>
								</li>
							</ul>
						</li>
						<li class="header-menu__item">
							<a href="" class="header-menu__link">Готовые решения</a>
						</li>
						<li class="header-menu__item">
							<a href="" class="header-menu__link">Пресс-центр</a>
						</li>
						<li class="header-menu__item">
							<a href="" class="header-menu__link">Медиатека</a>
						</li>
						<li class="header-menu__item">
							<a href="" class="header-menu__link">Акции</a>
						</li>
						<li class="header-menu__item">
							<a href="" class="header-menu__link">Услуги</a>
						</li>
						<li class="header-menu__item">
							<a href="" class="header-menu__link">Представители</a>
						</li>
						<li class="header-menu__item">
							<a href="" class="header-menu__link">Контакты</a>
						</li>
					</ul>
				</nav>
				<div class="header-search">
					<a href="" class="header-search__button">
						<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path
								d="M17 16.9999L13.1333 13.1332M15.2222 8.1111C15.2222 12.0385 12.0385 15.2222 8.1111 15.2222C4.18375 15.2222 1 12.0385 1 8.1111C1 4.18375 4.18375 1 8.1111 1C12.0385 1 15.2222 4.18375 15.2222 8.1111Z"
								stroke="#00318A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
					</a>
					<div class="header-search__container">
						<button class="header-search__close"></button>
						<form action="" class="header-search__form">
							<input type="text" class="header-search__input input" placeholder="Начните вводить слово">
							<button class="header-search__submit" type="submit">
								<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path
										d="M17 16.9999L13.1333 13.1332M15.2222 8.1111C15.2222 12.0385 12.0385 15.2222 8.1111 15.2222C4.18375 15.2222 1 12.0385 1 8.1111C1 4.18375 4.18375 1 8.1111 1C12.0385 1 15.2222 4.18375 15.2222 8.1111Z"
										stroke="#00318A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
								</svg>
							</button>
						</form>
						<div class="header-search__lists">
							<ul class="header-search__list">
								<li class="header-search__item">
									<a href="" class="header-search__link">О заводе</a>
									<ul class="header-search__sublist">
										<li class="header-search__subitem">
											<a href="" class="header-search__sublink">О нас</a>
										</li>
										<li class="header-search__subitem">
											<a href="" class="header-search__sublink">Клиенты и партнеры</a>
										</li>
										<li class="header-search__subitem">
											<a href="" class="header-search__sublink">Отзывы</a>
										</li>
										<li class="header-search__subitem">
											<a href="" class="header-search__sublink">Сертификаты</a>
										</li>
										<li class="header-search__subitem">
											<a href="" class="header-search__sublink">Работа у нас</a>
										</li>
									</ul>
								</li>
								<li class="header-search__item"><a href="" class="header-search__link">Готовые решения</a></li>
								<li class="header-search__item"><a href="" class="header-search__link">Пресс-центр</a></li>
								<li class="header-search__item"><a href="" class="header-search__link">Медиатека</a></li>
								<li class="header-search__item"><a href="" class="header-search__link">Акции</a></li>
								<li class="header-search__item"><a href="" class="header-search__link">Представители</a></li>
								<li class="header-search__item"><a href="" class="header-search__link">Контакты</a></li>
							</ul>
							<ul class="header-search__list">
								<li class="header-search__item">
									<a href="" class="header-search__link">Услуги</a>
									<ul class="header-search__sublist">
										<li class="header-search__subitem">
											<a href="" class="header-search__sublink">Доставка и оплата</a>
										</li>
										<li class="header-search__subitem">
											<a href="" class="header-search__sublink">Консультации специалистов по подбору и монтажу</a>
										</li>
										<li class="header-search__subitem">
											<a href="" class="header-search__sublink">Дигностика и ремонт</a>
										</li>
										<li class="header-search__subitem">
											<a href="" class="header-search__sublink">Монтаж весового оборудования</a>
										</li>
										<li class="header-search__subitem">
											<a href="" class="header-search__sublink">Доставка и оплата</a>
										</li>
										<li class="header-search__subitem">
											<a href="" class="header-search__sublink">Консультации специалистов по подбору и монтажу</a>
										</li>
										<li class="header-search__subitem">
											<a href="" class="header-search__sublink">Дигностика и ремонт</a>
										</li>
										<li class="header-search__subitem">
											<a href="" class="header-search__sublink">Монтаж весового оборудования</a>
										</li>
									</ul>
								</li>
							</ul>
							<ul class="header-search__list">
								<li class="header-search__item">
									<a href="" class="header-search__link">Весы и весовая электроника</a>
									<ul class="header-search__sublist">
										<li class="header-search__subitem">
											<a href="" class="header-search__sublink">Крановые весы</a>
										</li>
										<li class="header-search__subitem">
											<a href="" class="header-search__sublink">Вагонные весы</a>
										</li>
										<li class="header-search__subitem">
											<a href="" class="header-search__sublink">Тензометрические датчики</a>
										</li>
										<li class="header-search__subitem">
											<a href="" class="header-search__sublink">Напольные весы</a>
										</li>
										<li class="header-search__subitem">
											<a href="" class="header-search__sublink">Автомобильные весы</a>
										</li>
										<li class="header-search__subitem">
											<a href="" class="header-search__sublink">Весоизмерительные приборы</a>
										</li>
										<li class="header-search__subitem">
											<a href="" class="header-search__sublink">Автоматизация взвешивания</a>
										</li>
										<li class="header-search__subitem">
											<a href="" class="header-search__sublink">Модернизация механических весов</a>
										</li>
										<li class="header-search__subitem">
											<a href="" class="header-search__sublink">Дополнительное оборудование</a>
										</li>
										<li class="header-search__subitem">
											<a href="" class="header-search__sublink">Программное обеспечение</a>
										</li>
										<li class="header-search__subitem">
											<a href="" class="header-search__sublink">Сервисные услуги</a>
										</li>
									</ul>
								</li>
							</ul>
							<ul class="header-search__list">
								<li class="header-search__item">
									<a href="" class="header-search__link">Приборостроение</a>
									<ul class="header-search__sublist">
										<li class="header-search__subitem">
											<a href="" class="header-search__sublink">Датчики давления</a>
										</li>
										<li class="header-search__subitem">
											<a href="" class="header-search__sublink">Датчики температуры</a>
										</li>
										<li class="header-search__subitem">
											<a href="" class="header-search__sublink">Измерители-сигнализаторы давления</a>
										</li>
										<li class="header-search__subitem">
											<a href="" class="header-search__sublink">Измерители-регуляторы универсальные</a>
										</li>
										<li class="header-search__subitem">
											<a href="" class="header-search__sublink">Блок универсальный для измерения физических величин</a>
										</li>
										<li class="header-search__subitem">
											<a href="" class="header-search__sublink">Бриз-КС</a>
										</li>
										<li class="header-search__subitem">
											<a href="" class="header-search__sublink">Тахометры-сигнализаторы</a>
										</li>
										<li class="header-search__subitem">
											<a href="" class="header-search__sublink">Полупроводниковые контакторы</a>
										</li>
										<li class="header-search__subitem">
											<a href="" class="header-search__sublink">Твердотельные реле</a>
										</li>
										<li class="header-search__subitem">
											<a href="" class="header-search__sublink">Пирометры Трид РП</a>
										</li>
									</ul>
								</li>
							</ul>
							<ul class="header-search__list">
								<li class="header-search__item">
									<a href="" class="header-search__link">Гидроцилиндры</a>
									<ul class="header-search__sublist">
										<li class="header-search__subitem">
											<a href="" class="header-search__sublink">Гидроцилиндры для импортной и отечественной техники</a>
										</li>
										<li class="header-search__subitem">
											<a href="" class="header-search__sublink">Гидроцилиндры к манипуляторам «Атлант», «Велмаш»,
												«Соломбалец»</a>
										</li>
										<li class="header-search__subitem">
											<a href="" class="header-search__sublink">Ремкомплекты для гидроцилиндров «Атлант», «Велмаш»,
												«Соломбалец»</a>
										</li>
										<li class="header-search__subitem">
											<a href="" class="header-search__sublink">Металлоконструкции</a>
										</li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</div>
                <!-- ВЫБОР САЙТА (ЯЗЫКА) -->
				<?$APPLICATION->IncludeComponent(
					"bitrix:main.site.selector",
					"lang",
					Array(
						"CACHE_TIME" => "3600",
						"CACHE_TYPE" => "A",
						"COMPONENT_TEMPLATE" => ".default",
						"SITE_LIST" => ""
					)
				);?>
                <!-- END ВЫБОР САЙТА (ЯЗЫКА) -->
			</div>
		</div>
		<!-- mobile -->
		<div class="header-mobile">
			<div class="header-mobile__top">
                <!-- ВЫБОР САЙТА (ЯЗЫКА) МОБИЛЬНАЯ ВЕРСИЯ -->
				<?$APPLICATION->IncludeComponent(
					"bitrix:main.site.selector",
					"lang_mobile",
					Array(
						"CACHE_TIME" => "3600",
						"CACHE_TYPE" => "A",
						"COMPONENT_TEMPLATE" => ".default",
						"SITE_LIST" => ""
					)
				);?>
                <!-- END ВЫБОР САЙТА (ЯЗЫКА) МОБИЛЬНАЯ ВЕРСИЯ -->
				<a href="" class="header-mobile__call">
					<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path
							d="M17.7059 6.67982L12.8405 6.67982M12.8405 6.67982V1.81445M12.8405 6.67982L17.7059 1.81458M18.1054 14.6927V17.2729C18.1064 17.5125 18.0573 17.7496 17.9614 17.969C17.8654 18.1885 17.7247 18.3855 17.5482 18.5475C17.3717 18.7094 17.1633 18.8327 16.9364 18.9094C16.7094 18.9862 16.469 19.0147 16.2304 18.9931C13.5838 18.7055 11.0416 17.8012 8.80793 16.3527C6.72982 15.0321 4.96795 13.2703 3.64744 11.1922C2.19388 8.94838 1.2893 6.39375 1.00698 3.73524C0.985488 3.4974 1.01375 3.25769 1.08998 3.03137C1.1662 2.80505 1.28872 2.59708 1.44972 2.4207C1.61073 2.24433 1.80669 2.10341 2.02514 2.00692C2.24359 1.91043 2.47974 1.86048 2.71855 1.86026H5.29879C5.7162 1.85615 6.12085 2.00396 6.43734 2.27613C6.75382 2.54831 6.96054 2.92628 7.01896 3.3396C7.12787 4.16534 7.32984 4.9761 7.62102 5.75643C7.73674 6.06428 7.76178 6.39884 7.69318 6.72048C7.62459 7.04212 7.46523 7.33736 7.23398 7.57121L6.14168 8.66351C7.36605 10.8168 9.14892 12.5996 11.3022 13.824L12.3945 12.7317C12.6283 12.5005 12.9236 12.3411 13.2452 12.2725C13.5668 12.2039 13.9014 12.2289 14.2093 12.3447C14.9896 12.6358 15.8003 12.8378 16.6261 12.9467C17.0439 13.0057 17.4254 13.2161 17.6982 13.538C17.971 13.8599 18.1159 14.2709 18.1054 14.6927Z"
							stroke="#025BFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
					</svg>
				</a>
				<button class="header-basket header-mobile__basket">
					<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path
							d="M0 1H3.80952L6.3619 13.7524C6.44899 14.1909 6.68753 14.5847 7.03576 14.865C7.38398 15.1454 7.81971 15.2943 8.26667 15.2857H17.5238C17.9708 15.2943 18.4065 15.1454 18.7547 14.865C19.1029 14.5847 19.3415 14.1909 19.4286 13.7524L20.9524 5.7619H4.7619M8.57145 20.0476C8.57145 20.5736 8.14505 21 7.61906 21C7.09308 21 6.66668 20.5736 6.66668 20.0476C6.66668 19.5217 7.09308 19.0953 7.61906 19.0953C8.14505 19.0953 8.57145 19.5217 8.57145 20.0476ZM19.0476 20.0476C19.0476 20.5736 18.6212 21 18.0953 21C17.5693 21 17.1429 20.5736 17.1429 20.0476C17.1429 19.5217 17.5693 19.0953 18.0953 19.0953C18.6212 19.0953 19.0476 19.5217 19.0476 20.0476Z"
							stroke="#025BFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
					</svg>
					<span class="header-basket__count">0</span>
				</button>
				<button class="header-mobile__close"></button>
			</div>
			<div class="header-mobile__menu">
				<ul class="header-mobile__list">
					<li class="header-mobile__item">
						<a href="" class="header-mobile__link">Продукция</a>
						<a href="" class="header-mobile__search">
							<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path
									d="M17 16.9999L13.1333 13.1332M15.2222 8.1111C15.2222 12.0385 12.0385 15.2222 8.1111 15.2222C4.18375 15.2222 1 12.0385 1 8.1111C1 4.18375 4.18375 1 8.1111 1C12.0385 1 15.2222 4.18375 15.2222 8.1111Z"
									stroke="#00318A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							</svg>
						</a>
						<div class="header-mobile__inner">
							<div class="header-mobile__back">
								<button class="header-mobile__back-button">
									<svg class="header-mobile__back-arrow" width="26" height="20" viewBox="0 0 26 20" fill="none"
										xmlns="http://www.w3.org/2000/svg">
										<rect y="9" width="24" height="2" fill="#025BFF" />
										<path d="M14.5859 1.41421L16.0002 0L26.0001 10L23.2577 10L14.5859 1.41421Z" fill="#025BFF" />
										<path d="M14.5859 18.5858L16.0002 20L26.0001 10L23.2577 9.99997L14.5859 18.5858Z" fill="#025BFF" />
									</svg>
								</button>
								<span class="header-mobile__back-text">Продукция</span>
								<a href="" class="header-mobile__back-search">
									<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path
											d="M17 16.9999L13.1333 13.1332M15.2222 8.1111C15.2222 12.0385 12.0385 15.2222 8.1111 15.2222C4.18375 15.2222 1 12.0385 1 8.1111C1 4.18375 4.18375 1 8.1111 1C12.0385 1 15.2222 4.18375 15.2222 8.1111Z"
											stroke="#00318A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
									</svg>
								</a>
							</div>
							<ul class="header-mobile__list header-mobile__list_inner">
								<li class="header-mobile__item">
									<a href="" class="header-mobile__link">
										<svg class="header-mobile__logo" width="42" height="42" viewBox="0 0 42 42" fill="none"
											xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" clip-rule="evenodd"
												d="M0 0H42V41.9355H0V0ZM26.2592 17.8551L16.8148 27.2903H9.41496V24.0804H15.4516L24.9935 14.5479H32.2959V17.7578H26.2592V17.8551ZM14.1859 18.0496C14.1859 17.1742 13.5043 16.4933 12.628 16.4933C11.7517 16.4933 11.0702 17.1742 11.0702 18.0496C11.0702 18.9251 11.7517 19.606 12.628 19.606C13.5043 19.606 14.1859 18.9251 14.1859 18.0496ZM32.3933 11.5325H23.7277L14.9648 20.2868C14.3806 20.8705 13.5043 21.3568 12.628 21.3568C10.8754 21.3568 9.51233 19.8978 9.51233 18.1469C9.51233 16.396 11.0702 14.937 12.628 14.937C14.2832 14.937 15.3543 15.9097 15.6464 17.2715L23.0462 9.87891H32.3933V11.5325ZM27.6223 23.8859C27.6223 24.7613 28.3039 25.4422 29.1802 25.4422C30.0565 25.4422 30.738 24.7613 30.738 23.8859C30.738 23.0104 30.0565 22.3295 29.1802 22.3295C28.3039 22.2323 27.6223 23.0104 27.6223 23.8859ZM9.41496 30.5002H18.0805L26.8434 21.7459C27.4276 21.1623 28.2065 20.6759 29.1802 20.6759C30.9328 20.6759 32.3933 22.0377 32.3933 23.8859C32.3933 25.6367 30.8354 26.9985 29.1802 26.9985C27.525 26.9985 26.5513 26.0258 26.1619 24.664L18.7621 32.0566H9.41496V30.5002Z"
												fill="#025BFF" />
										</svg>
										Приборостроение
									</a>
									<ul class="header-mobile__sublist">
										<li class="header-mobile__subitem">
											<a href="" class="header-mobile__sublink">Крановые весы</a>
										</li>
										<li class="header-mobile__subitem">
											<a href="" class="header-mobile__sublink">Вагонные весы</a>
										</li>
										<li class="header-mobile__subitem">
											<a href="" class="header-mobile__sublink">Тензометрические датчики</a>
										</li>
										<li class="header-mobile__subitem">
											<a href="" class="header-mobile__sublink">Напольные весы</a>
										</li>
										<li class="header-mobile__subitem">
											<a href="" class="header-mobile__sublink">Автомобильные весы</a>
										</li>
										<li class="header-mobile__subitem">
											<a href="" class="header-mobile__sublink">Весоизмерительные приборы</a>
										</li>
										<li class="header-mobile__subitem">
											<a href="" class="header-mobile__sublink">Автоматизация взвешивания</a>
										</li>
										<li class="header-mobile__subitem">
											<a href="" class="header-mobile__sublink">Модернизация механических весов</a>
										</li>
										<li class="header-mobile__subitem">
											<a href="" class="header-mobile__sublink">Дополнительное оборудование</a>
										</li>
										<li class="header-mobile__subitem">
											<a href="" class="header-mobile__sublink">Программное обеспечение</a>
										</li>
										<li class="header-mobile__subitem">
											<a href="" class="header-mobile__sublink">Сервисные услуги</a>
										</li>
									</ul>
								</li>
								<li class="header-mobile__item">
									<a href="" class="header-mobile__link">
										<svg class="header-mobile__logo" width="42" height="42" viewBox="0 0 42 42" fill="none"
											xmlns="http://www.w3.org/2000/svg">
											<path
												d="M0 41.632H42C42 30.2842 42 11.7358 42 0H0C0 12.544 0 29.088 0 41.632ZM15.2887 10.5351H31.3304V26.6354L26.2086 21.4949L14.8055 32.9397L9.10397 27.1203L20.5071 15.6755L15.2887 10.5351Z"
												fill="#8D37E3" />
										</svg>
										Гидроцилиндры
									</a>
									<ul class="header-mobile__sublist">
										<li class="header-mobile__subitem">
											<a href="" class="header-mobile__sublink">Крановые весы</a>
										</li>
										<li class="header-mobile__subitem">
											<a href="" class="header-mobile__sublink">Вагонные весы</a>
										</li>
										<li class="header-mobile__subitem">
											<a href="" class="header-mobile__sublink">Тензометрические датчики</a>
										</li>
										<li class="header-mobile__subitem">
											<a href="" class="header-mobile__sublink">Напольные весы</a>
										</li>
										<li class="header-mobile__subitem">
											<a href="" class="header-mobile__sublink">Автомобильные весы</a>
										</li>
										<li class="header-mobile__subitem">
											<a href="" class="header-mobile__sublink">Весоизмерительные приборы</a>
										</li>
										<li class="header-mobile__subitem">
											<a href="" class="header-mobile__sublink">Автоматизация взвешивания</a>
										</li>
										<li class="header-mobile__subitem">
											<a href="" class="header-mobile__sublink">Модернизация механических весов</a>
										</li>
										<li class="header-mobile__subitem">
											<a href="" class="header-mobile__sublink">Дополнительное оборудование</a>
										</li>
										<li class="header-mobile__subitem">
											<a href="" class="header-mobile__sublink">Программное обеспечение</a>
										</li>
										<li class="header-mobile__subitem">
											<a href="" class="header-mobile__sublink">Сервисные услуги</a>
										</li>
									</ul>
								</li>
								<li class="header-mobile__item">
									<a href="" class="header-mobile__link">
										<svg class="header-mobile__logo" width="47" height="46" viewBox="0 0 47 46" fill="none"
											xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" clip-rule="evenodd"
												d="M0 0H47V46H0C0 35.5005 0 10.4995 0 0ZM30.4968 19.3337L29.6176 20.3079L32.415 23.2304L30.337 25.3412L27.5396 22.4186C25.7813 24.2046 25.4616 24.4482 25.1419 24.8541C26.2609 25.9906 27.9393 27.6955 31.5358 31.4298L29.5377 33.4594C25.6215 29.5626 23.9431 27.7766 23.0639 26.9648L16.5901 33.5406L14.592 31.511C17.789 28.1825 19.7071 26.3154 20.9859 24.9353C20.3465 24.0423 18.9878 22.7434 16.5901 20.3079L13.7928 23.1493L10.7557 20.1455L16.4303 14.3816H20.5863L21.5454 15.3558L18.7481 18.1972C21.1458 20.6326 22.3446 21.8504 23.2238 22.7434L25.6215 20.3079L22.8241 17.3853L24.9022 15.2746L27.7794 18.116L28.6586 17.223L25.8612 14.3816H30.0173L35.6918 20.1455L33.6138 22.2563L30.4968 19.3337Z"
												fill="#F1F5F9" />
										</svg>
										Весы и весовая электроника
									</a>
									<ul class="header-mobile__sublist">
										<li class="header-mobile__subitem">
											<a href="" class="header-mobile__sublink">Крановые весы</a>
										</li>
										<li class="header-mobile__subitem">
											<a href="" class="header-mobile__sublink">Вагонные весы</a>
										</li>
										<li class="header-mobile__subitem">
											<a href="" class="header-mobile__sublink">Тензометрические датчики</a>
										</li>
										<li class="header-mobile__subitem">
											<a href="" class="header-mobile__sublink">Напольные весы</a>
										</li>
										<li class="header-mobile__subitem">
											<a href="" class="header-mobile__sublink">Автомобильные весы</a>
										</li>
										<li class="header-mobile__subitem">
											<a href="" class="header-mobile__sublink">Весоизмерительные приборы</a>
										</li>
										<li class="header-mobile__subitem">
											<a href="" class="header-mobile__sublink">Автоматизация взвешивания</a>
										</li>
										<li class="header-mobile__subitem">
											<a href="" class="header-mobile__sublink">Модернизация механических весов</a>
										</li>
										<li class="header-mobile__subitem">
											<a href="" class="header-mobile__sublink">Дополнительное оборудование</a>
										</li>
										<li class="header-mobile__subitem">
											<a href="" class="header-mobile__sublink">Программное обеспечение</a>
										</li>
										<li class="header-mobile__subitem">
											<a href="" class="header-mobile__sublink">Сервисные услуги</a>
										</li>
									</ul>
								</li>
							</ul>
						</div>
					</li>
					<li class="header-mobile__item">
						<a href="" class="header-mobile__link">О заводе</a>
						<div class="header-mobile__inner">
							<div class="header-mobile__back">
								<button class="header-mobile__back-button">
									<svg class="header-mobile__back-arrow" width="26" height="20" viewBox="0 0 26 20" fill="none"
										xmlns="http://www.w3.org/2000/svg">
										<rect y="9" width="24" height="2" fill="#025BFF" />
										<path d="M14.5859 1.41421L16.0002 0L26.0001 10L23.2577 10L14.5859 1.41421Z" fill="#025BFF" />
										<path d="M14.5859 18.5858L16.0002 20L26.0001 10L23.2577 9.99997L14.5859 18.5858Z" fill="#025BFF" />
									</svg>
								</button>
								<span class="header-mobile__back-text">О заводе</span>
							</div>
							<ul class="header-mobile__list">
								<li class="header-mobile__item">
									<a href="" class="header-mobile__link">Клиенты и партнеры</a>
									<ul class="header-mobile__sublist">
										<li class="header-mobile__subitem">
											<a href="" class="header-mobile__sublink">Клиенты и партнеры</a>
										</li>
										<li class="header-mobile__subitem">
											<a href="" class="header-mobile__sublink">Отзывы</a>
										</li>
									</ul>
								</li>
								<li class="header-mobile__item">
									<a href="" class="header-mobile__link">Отзывы</a>
								</li>
								<li class="header-mobile__item">
									<a href="" class="header-mobile__link">Сертификаты</a>
								</li>
								<li class="header-mobile__item">
									<a href="" class="header-mobile__link">Работа у нас</a>
								</li>
							</ul>
						</div>
					</li>
					<li class="header-mobile__item">
						<a href="" class="header-mobile__link">Готовые решения</a>
					</li>
					<li class="header-mobile__item">
						<a href="" class="header-mobile__link">Пресс-центр</a>
					</li>
					<li class="header-mobile__item">
						<a href="" class="header-mobile__link">Медиатека</a>
					</li>
					<li class="header-mobile__item">
						<a href="" class="header-mobile__link">Акции</a>
					</li>
					<li class="header-mobile__item">
						<a href="" class="header-mobile__link">Услуги</a>
					</li>
					<li class="header-mobile__item">
						<a href="" class="header-mobile__link">Представители</a>
					</li>
					<li class="header-mobile__item">
						<a href="" class="header-mobile__link">Контакты</a>
					</li>
				</ul>
				<div class="header-mobile__contacts">
					<a href="" class="header-mobile__cabinet button button_rounded">Личный кабинет</a>
					<a href="tel:+78001002489" class="header-mobile__phone">8 800 100 24 89</a>
					<a href="mailto:mail@vektorpm.ru" class="header-mobile__email">mail@vektorpm.ru</a>
				</div>
			</div>
		</div>
		<!-- end mobile -->
	</header>
	<!-- END HEADER -->

	<!-- FIXED HEADER -->
  <header class="header header-fixed">
    <div class="header-top">
      <div class="container header-top__container">
        <a href="/" class="header-logo">
          <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg"
            class="header-logo__img">
            <path
              d="M0 36H36.2956C36.2956 25.1443 36.2956 11.2268 36.2956 0H0C0 10.6701 0 25.9794 0 36ZM12.5351 8.16495H28.0636V23.567L23.1057 18.6495L12.0674 29.5979L6.54818 24.0309L17.5865 13.0825L12.5351 8.16495Z"
              fill="#025BFF" />
            <path
              d="M12.5348 8.16492H28.0633V23.567L23.1054 18.6495L12.067 29.5979L6.54785 24.0309L17.4927 13.0824L12.5348 8.16492Z"
              fill="white" />
          </svg>
        </a>
        <nav class="header-menu">
          <ul class="header-menu__list">
            <li class="header-menu__item header-menu__item_big">
              <a href="/catalog.html" class="header-menu__link">Продукция</a>
              <ul class="header-menu__sublist">
                <li class="header-menu__subitem">
                  <a href="" class="header-menu__sublink">
                    <img src="<?=SITE_TEMPLATE_PATH?>/img/menu-logo-1.svg" alt="" class="header-menu__logo">
                    Весы и весовая электроника
                  </a>
                  <div class="header-menu__catalog">
                    <ul class="header-menu__catalog-list">
                      <li class="header-menu__catalog-item">
                        <a href="" class="header-menu__catalog-link">Крановые весы</a>
                      </li>
                      <li class="header-menu__catalog-item">
                        <a href="" class="header-menu__catalog-link">Выгонные весы</a>
                      </li>
                      <li class="header-menu__catalog-item">
                        <a href="" class="header-menu__catalog-link">Тензометрические датчики</a>
                      </li>
                      <li class="header-menu__catalog-item">
                        <a href="" class="header-menu__catalog-link">Напольные весы</a>
                      </li>
                      <li class="header-menu__catalog-item">
                        <a href="" class="header-menu__catalog-link">Автомобильные весы</a>
                      </li>
                      <li class="header-menu__catalog-item">
                        <a href="" class="header-menu__catalog-link">Весоизмерительные приборы</a>
                      </li>
                      <li class="header-menu__catalog-item">
                        <a href="" class="header-menu__catalog-link">Автоматизация взвешивания</a>
                      </li>
                      <li class="header-menu__catalog-item">
                        <a href="" class="header-menu__catalog-link">Модернизация механических весов</a>
                      </li>
                      <li class="header-menu__catalog-item">
                        <a href="" class="header-menu__catalog-link">Дополнительное оборудование</a>
                      </li>
                      <li class="header-menu__catalog-item">
                        <a href="" class="header-menu__catalog-link">Программное обеспечение</a>
                      </li>
                      <li class="header-menu__catalog-item">
                        <a href="" class="header-menu__catalog-link">Сервисные услуги</a>
                      </li>
                    </ul>
                    <a href="" class="header-menu__news" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/img/header-news.jpg);">
                      <div class="header-menu__news-info">
                        <span class="header-menu__news-title">Итоги выставки "Нефть и газ. Химия-2019"</span>
                        <svg class="header-menu__news-arrow" width="22" height="18" viewBox="0 0 22 18" fill="none"
                          xmlns="http://www.w3.org/2000/svg">
                          <path
                            d="M12.6712 2.12161C12.2978 1.72794 12.3059 1.10843 12.6896 0.724748C13.0871 0.327272 13.7338 0.334889 14.1218 0.741615L22.0001 9L14.1218 17.2584C13.7338 17.6651 13.0871 17.6727 12.6896 17.2753C12.3059 16.8916 12.2978 16.2721 12.6712 15.8784L18.2477 10H1C0.447715 10 0 9.55229 0 9C0 8.44771 0.447716 8 1 8H18.2477L12.6712 2.12161Z"
                            fill="white" />
                        </svg>
                      </div>
                    </a>
                  </div>
                </li>
                <li class="header-menu__subitem">
                  <a href="" class="header-menu__sublink">
                    <img src="<?=SITE_TEMPLATE_PATH?>/img/menu-logo-2.svg" alt="" class="header-menu__logo">
                    Приборостроение
                  </a>
                  <div class="header-menu__catalog">
                    <ul class="header-menu__catalog-list">
                      <li class="header-menu__catalog-item">
                        <a href="" class="header-menu__catalog-link">Крановые весы</a>
                      </li>
                      <li class="header-menu__catalog-item">
                        <a href="" class="header-menu__catalog-link">Выгонные весы</a>
                      </li>
                      <li class="header-menu__catalog-item">
                        <a href="" class="header-menu__catalog-link">Тензометрические датчики</a>
                      </li>
                      <li class="header-menu__catalog-item">
                        <a href="" class="header-menu__catalog-link">Напольные весы</a>
                      </li>
                      <li class="header-menu__catalog-item">
                        <a href="" class="header-menu__catalog-link">Автомобильные весы</a>
                      </li>
                      <li class="header-menu__catalog-item">
                        <a href="" class="header-menu__catalog-link">Весоизмерительные приборы</a>
                      </li>
                      <li class="header-menu__catalog-item">
                        <a href="" class="header-menu__catalog-link">Автоматизация взвешивания</a>
                      </li>
                      <li class="header-menu__catalog-item">
                        <a href="" class="header-menu__catalog-link">Модернизация механических весов</a>
                      </li>
                      <li class="header-menu__catalog-item">
                        <a href="" class="header-menu__catalog-link">Дополнительное оборудование</a>
                      </li>
                      <li class="header-menu__catalog-item">
                        <a href="" class="header-menu__catalog-link">Программное обеспечение</a>
                      </li>
                      <li class="header-menu__catalog-item">
                        <a href="" class="header-menu__catalog-link">Сервисные услуги</a>
                      </li>
                    </ul>
                    <a href="" class="header-menu__news" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/img/header-news.jpg);">
                      <div class="header-menu__news-info">
                        <span class="header-menu__news-title">Итоги выставки "Нефть и газ. Химия-2019"</span>
                        <svg class="header-menu__news-arrow" width="22" height="18" viewBox="0 0 22 18" fill="none"
                          xmlns="http://www.w3.org/2000/svg">
                          <path
                            d="M12.6712 2.12161C12.2978 1.72794 12.3059 1.10843 12.6896 0.724748C13.0871 0.327272 13.7338 0.334889 14.1218 0.741615L22.0001 9L14.1218 17.2584C13.7338 17.6651 13.0871 17.6727 12.6896 17.2753C12.3059 16.8916 12.2978 16.2721 12.6712 15.8784L18.2477 10H1C0.447715 10 0 9.55229 0 9C0 8.44771 0.447716 8 1 8H18.2477L12.6712 2.12161Z"
                            fill="white" />
                        </svg>
                      </div>
                    </a>
                  </div>
                <li class="header-menu__subitem">
                  <a href="" class="header-menu__sublink">
                    <img src="<?=SITE_TEMPLATE_PATH?>/img/menu-logo-3.svg" alt="" class="header-menu__logo">
                    Гидроцилиндры
                  </a>
                  <div class="header-menu__catalog">
                    <ul class="header-menu__catalog-list">
                      <li class="header-menu__catalog-item">
                        <a href="" class="header-menu__catalog-link">Крановые весы</a>
                      </li>
                      <li class="header-menu__catalog-item">
                        <a href="" class="header-menu__catalog-link">Выгонные весы</a>
                      </li>
                      <li class="header-menu__catalog-item">
                        <a href="" class="header-menu__catalog-link">Тензометрические датчики</a>
                      </li>
                      <li class="header-menu__catalog-item">
                        <a href="" class="header-menu__catalog-link">Напольные весы</a>
                      </li>
                      <li class="header-menu__catalog-item">
                        <a href="" class="header-menu__catalog-link">Автомобильные весы</a>
                      </li>
                      <li class="header-menu__catalog-item">
                        <a href="" class="header-menu__catalog-link">Весоизмерительные приборы</a>
                      </li>
                      <li class="header-menu__catalog-item">
                        <a href="" class="header-menu__catalog-link">Автоматизация взвешивания</a>
                      </li>
                      <li class="header-menu__catalog-item">
                        <a href="" class="header-menu__catalog-link">Модернизация механических весов</a>
                      </li>
                      <li class="header-menu__catalog-item">
                        <a href="" class="header-menu__catalog-link">Дополнительное оборудование</a>
                      </li>
                      <li class="header-menu__catalog-item">
                        <a href="" class="header-menu__catalog-link">Программное обеспечение</a>
                      </li>
                      <li class="header-menu__catalog-item">
                        <a href="" class="header-menu__catalog-link">Сервисные услуги</a>
                      </li>
                    </ul>
                    <a href="" class="header-menu__news" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/img/header-news.jpg);">
                      <div class="header-menu__news-info">
                        <span class="header-menu__news-title">Итоги выставки "Нефть и газ. Химия-2019"</span>
                        <svg class="header-menu__news-arrow" width="22" height="18" viewBox="0 0 22 18" fill="none"
                          xmlns="http://www.w3.org/2000/svg">
                          <path
                            d="M12.6712 2.12161C12.2978 1.72794 12.3059 1.10843 12.6896 0.724748C13.0871 0.327272 13.7338 0.334889 14.1218 0.741615L22.0001 9L14.1218 17.2584C13.7338 17.6651 13.0871 17.6727 12.6896 17.2753C12.3059 16.8916 12.2978 16.2721 12.6712 15.8784L18.2477 10H1C0.447715 10 0 9.55229 0 9C0 8.44771 0.447716 8 1 8H18.2477L12.6712 2.12161Z"
                            fill="white" />
                        </svg>
                      </div>
                    </a>
                  </div>
                </li>
                <li class="header-menu__subitem">
                  <a href="" class="header-menu__sublink">
                    <img src="<?=SITE_TEMPLATE_PATH?>/img/menu-logo-4.svg" alt="" class="header-menu__logo">
                    Вся Продукция <br> от а до я
                  </a>
                  <div class="header-menu__catalog">
                    <ul class="header-menu__catalog-list">
                      <li class="header-menu__catalog-item">
                        <a href="" class="header-menu__catalog-link">Крановые весы</a>
                      </li>
                      <li class="header-menu__catalog-item">
                        <a href="" class="header-menu__catalog-link">Выгонные весы</a>
                      </li>
                      <li class="header-menu__catalog-item">
                        <a href="" class="header-menu__catalog-link">Тензометрические датчики</a>
                      </li>
                      <li class="header-menu__catalog-item">
                        <a href="" class="header-menu__catalog-link">Напольные весы</a>
                      </li>
                      <li class="header-menu__catalog-item">
                        <a href="" class="header-menu__catalog-link">Автомобильные весы</a>
                      </li>
                      <li class="header-menu__catalog-item">
                        <a href="" class="header-menu__catalog-link">Весоизмерительные приборы</a>
                      </li>
                      <li class="header-menu__catalog-item">
                        <a href="" class="header-menu__catalog-link">Автоматизация взвешивания</a>
                      </li>
                      <li class="header-menu__catalog-item">
                        <a href="" class="header-menu__catalog-link">Модернизация механических весов</a>
                      </li>
                      <li class="header-menu__catalog-item">
                        <a href="" class="header-menu__catalog-link">Дополнительное оборудование</a>
                      </li>
                      <li class="header-menu__catalog-item">
                        <a href="" class="header-menu__catalog-link">Программное обеспечение</a>
                      </li>
                      <li class="header-menu__catalog-item">
                        <a href="" class="header-menu__catalog-link">Сервисные услуги</a>
                      </li>
                    </ul>
                    <a href="" class="header-menu__news" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/img/header-news.jpg);">
                      <div class="header-menu__news-info">
                        <span class="header-menu__news-title">Итоги выставки "Нефть и газ. Химия-2019"</span>
                        <svg class="header-menu__news-arrow" width="22" height="18" viewBox="0 0 22 18" fill="none"
                          xmlns="http://www.w3.org/2000/svg">
                          <path
                            d="M12.6712 2.12161C12.2978 1.72794 12.3059 1.10843 12.6896 0.724748C13.0871 0.327272 13.7338 0.334889 14.1218 0.741615L22.0001 9L14.1218 17.2584C13.7338 17.6651 13.0871 17.6727 12.6896 17.2753C12.3059 16.8916 12.2978 16.2721 12.6712 15.8784L18.2477 10H1C0.447715 10 0 9.55229 0 9C0 8.44771 0.447716 8 1 8H18.2477L12.6712 2.12161Z"
                            fill="white" />
                        </svg>
                      </div>
                    </a>
                  </div>
                </li>
              </ul>
            </li>
            <li class="header-menu__item header-menu__item_active">
              <a href="" class="header-menu__link">О заводе</a>
              <ul class="header-menu__sublist">
                <li class="header-menu__subitem">
                  <a href="" class="header-menu__sublink">Клиенты и партнеры</a>
                  <ul class="header-menu__sublist">
                    <li class="header-menu__subitem">
                      <a href="" class="header-menu__sublink">Клиенты и партнеры</a>
                    </li>
                    <li class="header-menu__subitem">
                      <a href="" class="header-menu__sublink">Отзывы</a>
                    </li>
                  </ul>
                </li>
                <li class="header-menu__subitem">
                  <a href="" class="header-menu__sublink">Отзывы</a>
                </li>
                <li class="header-menu__subitem">
                  <a href="" class="header-menu__sublink">Сертификаты</a>
                </li>
                <li class="header-menu__subitem">
                  <a href="" class="header-menu__sublink">Работа у нас</a>
                </li>
              </ul>
            </li>
            <li class="header-menu__item">
              <a href="" class="header-menu__link">Готовые решения</a>
            </li>
            <li class="header-menu__item">
              <a href="" class="header-menu__link">Пресс-центр</a>
            </li>
            <li class="header-menu__item">
              <a href="" class="header-menu__link">Медиатека</a>
            </li>
            <li class="header-menu__item">
              <a href="" class="header-menu__link">Акции</a>
            </li>
            <li class="header-menu__item">
              <a href="" class="header-menu__link">Услуги</a>
            </li>
            <li class="header-menu__item">
              <a href="" class="header-menu__link">Представители</a>
            </li>
            <li class="header-menu__item">
              <a href="" class="header-menu__link">Контакты</a>
            </li>
          </ul>
        </nav>
        <div class="header-search">
          <a href="" class="header-search__button">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M17 16.9999L13.1333 13.1332M15.2222 8.1111C15.2222 12.0385 12.0385 15.2222 8.1111 15.2222C4.18375 15.2222 1 12.0385 1 8.1111C1 4.18375 4.18375 1 8.1111 1C12.0385 1 15.2222 4.18375 15.2222 8.1111Z"
                stroke="#00318A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </a>
          <div class="header-search__container">
            <button class="header-search__close"></button>
            <form action="" class="header-search__form">
              <input type="text" class="header-search__input input" placeholder="Начните вводить слово">
              <button class="header-search__submit" type="submit">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M17 16.9999L13.1333 13.1332M15.2222 8.1111C15.2222 12.0385 12.0385 15.2222 8.1111 15.2222C4.18375 15.2222 1 12.0385 1 8.1111C1 4.18375 4.18375 1 8.1111 1C12.0385 1 15.2222 4.18375 15.2222 8.1111Z"
                    stroke="#00318A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </button>
            </form>
            <div class="header-search__lists">
              <ul class="header-search__list">
                <li class="header-search__item">
                  <a href="" class="header-search__link">О заводе</a>
                  <ul class="header-search__sublist">
                    <li class="header-search__subitem">
                      <a href="" class="header-search__sublink">О нас</a>
                    </li>
                    <li class="header-search__subitem">
                      <a href="" class="header-search__sublink">Клиенты и партнеры</a>
                    </li>
                    <li class="header-search__subitem">
                      <a href="" class="header-search__sublink">Отзывы</a>
                    </li>
                    <li class="header-search__subitem">
                      <a href="" class="header-search__sublink">Сертификаты</a>
                    </li>
                    <li class="header-search__subitem">
                      <a href="" class="header-search__sublink">Работа у нас</a>
                    </li>
                  </ul>
                </li>
                <li class="header-search__item"><a href="" class="header-search__link">Готовые решения</a></li>
                <li class="header-search__item"><a href="" class="header-search__link">Пресс-центр</a></li>
                <li class="header-search__item"><a href="" class="header-search__link">Медиатека</a></li>
                <li class="header-search__item"><a href="" class="header-search__link">Акции</a></li>
                <li class="header-search__item"><a href="" class="header-search__link">Представители</a></li>
                <li class="header-search__item"><a href="" class="header-search__link">Контакты</a></li>
              </ul>
              <ul class="header-search__list">
                <li class="header-search__item">
                  <a href="" class="header-search__link">Услуги</a>
                  <ul class="header-search__sublist">
                    <li class="header-search__subitem">
                      <a href="" class="header-search__sublink">Доставка и оплата</a>
                    </li>
                    <li class="header-search__subitem">
                      <a href="" class="header-search__sublink">Консультации специалистов по подбору и монтажу</a>
                    </li>
                    <li class="header-search__subitem">
                      <a href="" class="header-search__sublink">Дигностика и ремонт</a>
                    </li>
                    <li class="header-search__subitem">
                      <a href="" class="header-search__sublink">Монтаж весового оборудования</a>
                    </li>
                    <li class="header-search__subitem">
                      <a href="" class="header-search__sublink">Доставка и оплата</a>
                    </li>
                    <li class="header-search__subitem">
                      <a href="" class="header-search__sublink">Консультации специалистов по подбору и монтажу</a>
                    </li>
                    <li class="header-search__subitem">
                      <a href="" class="header-search__sublink">Дигностика и ремонт</a>
                    </li>
                    <li class="header-search__subitem">
                      <a href="" class="header-search__sublink">Монтаж весового оборудования</a>
                    </li>
                  </ul>
                </li>
              </ul>
              <ul class="header-search__list">
                <li class="header-search__item">
                  <a href="" class="header-search__link">Весы и весовая электроника</a>
                  <ul class="header-search__sublist">
                    <li class="header-search__subitem">
                      <a href="" class="header-search__sublink">Крановые весы</a>
                    </li>
                    <li class="header-search__subitem">
                      <a href="" class="header-search__sublink">Вагонные весы</a>
                    </li>
                    <li class="header-search__subitem">
                      <a href="" class="header-search__sublink">Тензометрические датчики</a>
                    </li>
                    <li class="header-search__subitem">
                      <a href="" class="header-search__sublink">Напольные весы</a>
                    </li>
                    <li class="header-search__subitem">
                      <a href="" class="header-search__sublink">Автомобильные весы</a>
                    </li>
                    <li class="header-search__subitem">
                      <a href="" class="header-search__sublink">Весоизмерительные приборы</a>
                    </li>
                    <li class="header-search__subitem">
                      <a href="" class="header-search__sublink">Автоматизация взвешивания</a>
                    </li>
                    <li class="header-search__subitem">
                      <a href="" class="header-search__sublink">Модернизация механических весов</a>
                    </li>
                    <li class="header-search__subitem">
                      <a href="" class="header-search__sublink">Дополнительное оборудование</a>
                    </li>
                    <li class="header-search__subitem">
                      <a href="" class="header-search__sublink">Программное обеспечение</a>
                    </li>
                    <li class="header-search__subitem">
                      <a href="" class="header-search__sublink">Сервисные услуги</a>
                    </li>
                  </ul>
                </li>
              </ul>
              <ul class="header-search__list">
                <li class="header-search__item">
                  <a href="" class="header-search__link">Приборостроение</a>
                  <ul class="header-search__sublist">
                    <li class="header-search__subitem">
                      <a href="" class="header-search__sublink">Датчики давления</a>
                    </li>
                    <li class="header-search__subitem">
                      <a href="" class="header-search__sublink">Датчики температуры</a>
                    </li>
                    <li class="header-search__subitem">
                      <a href="" class="header-search__sublink">Измерители-сигнализаторы давления</a>
                    </li>
                    <li class="header-search__subitem">
                      <a href="" class="header-search__sublink">Измерители-регуляторы универсальные</a>
                    </li>
                    <li class="header-search__subitem">
                      <a href="" class="header-search__sublink">Блок универсальный для измерения физических величин</a>
                    </li>
                    <li class="header-search__subitem">
                      <a href="" class="header-search__sublink">Бриз-КС</a>
                    </li>
                    <li class="header-search__subitem">
                      <a href="" class="header-search__sublink">Тахометры-сигнализаторы</a>
                    </li>
                    <li class="header-search__subitem">
                      <a href="" class="header-search__sublink">Полупроводниковые контакторы</a>
                    </li>
                    <li class="header-search__subitem">
                      <a href="" class="header-search__sublink">Твердотельные реле</a>
                    </li>
                    <li class="header-search__subitem">
                      <a href="" class="header-search__sublink">Пирометры Трид РП</a>
                    </li>
                  </ul>
                </li>
              </ul>
              <ul class="header-search__list">
                <li class="header-search__item">
                  <a href="" class="header-search__link">Гидроцилиндры</a>
                  <ul class="header-search__sublist">
                    <li class="header-search__subitem">
                      <a href="" class="header-search__sublink">Гидроцилиндры для импортной и отечественной техники</a>
                    </li>
                    <li class="header-search__subitem">
                      <a href="" class="header-search__sublink">Гидроцилиндры к манипуляторам «Атлант», «Велмаш»,
                        «Соломбалец»</a>
                    </li>
                    <li class="header-search__subitem">
                      <a href="" class="header-search__sublink">Ремкомплекты для гидроцилиндров «Атлант», «Велмаш»,
                        «Соломбалец»</a>
                    </li>
                    <li class="header-search__subitem">
                      <a href="" class="header-search__sublink">Металлоконструкции</a>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="header__contacts">
          <a href="mailto:mail@vektorpm.ru" class="header__email">mail@vektorpm.ru</a>
          <a href="+78001002489" class="header__phone">8 800 100 24 89</a>
        </div>
        <button class="header__button button button_rounded">Кабинет дилера</button>
        <div class="header-basket__wrap">
        <button class="header-basket">
          <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M0 1H3.80952L6.3619 13.7524C6.44899 14.1909 6.68753 14.5847 7.03576 14.865C7.38398 15.1454 7.81971 15.2943 8.26667 15.2857H17.5238C17.9708 15.2943 18.4065 15.1454 18.7547 14.865C19.1029 14.5847 19.3415 14.1909 19.4286 13.7524L20.9524 5.7619H4.7619M8.57145 20.0476C8.57145 20.5736 8.14505 21 7.61906 21C7.09308 21 6.66668 20.5736 6.66668 20.0476C6.66668 19.5217 7.09308 19.0953 7.61906 19.0953C8.14505 19.0953 8.57145 19.5217 8.57145 20.0476ZM19.0476 20.0476C19.0476 20.5736 18.6212 21 18.0953 21C17.5693 21 17.1429 20.5736 17.1429 20.0476C17.1429 19.5217 17.5693 19.0953 18.0953 19.0953C18.6212 19.0953 19.0476 19.5217 19.0476 20.0476Z"
              stroke="#025BFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          <span class="header-basket__count">0</span>
        </button>
        </div>
        <button class="header-burger">
          <span class="header-burger__lines"></span>
        </button>
      </div>
    </div>
  </header>
	<!-- END FIXED HEADER -->
	

	<div class="order">
    <div class="container order__container">
      <div class="order__close"></div>
      <div class="order-items">
        <h2 class="order-items__title">Ваш заказ</h2>
        <ul class="order-items__list">
          <li class="order-items__item">
            <button class="order-items__delete">
              <svg class="order-items__delete-icon" width="17" height="21" viewBox="0 0 17 21" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <rect x="0.5" y="3" width="16" height="4" rx="2" stroke="#999999" />
                <path d="M2.5 7H14.5V18.5C14.5 19.3284 13.8284 20 13 20H4C3.17157 20 2.5 19.3284 2.5 18.5V7Z"
                  stroke="#999999" />
                <path
                  d="M5.5 17.2429C5.77619 17.2429 6 17.0296 6 16.7665V11.4265C6 11.1633 5.77619 10.9501 5.5 10.9501C5.22381 10.9501 5 11.1633 5 11.4265V16.7665C5 17.0296 5.22381 17.2429 5.5 17.2429Z"
                  fill="#999999" />
                <path
                  d="M8.5 17.2429C8.77619 17.2429 9 17.0296 9 16.7665V11.4265C9 11.1633 8.77619 10.9501 8.5 10.9501C8.22381 10.9501 8 11.1633 8 11.4265V16.7665C8.00476 17.0296 8.22857 17.2429 8.5 17.2429Z"
                  fill="#999999" />
                <path
                  d="M11.5 17.2429C11.7762 17.2429 12 17.0296 12 16.7665V11.4265C12 11.1633 11.7762 10.9501 11.5 10.9501C11.2238 10.9501 11 11.1633 11 11.4265V16.7665C11 17.0296 11.2238 17.2429 11.5 17.2429Z"
                  fill="#999999" />
                <path
                  d="M11.2716 2.35195C11.3581 2.56077 11.4205 2.77819 11.458 3H8.5L5.54196 3C5.57945 2.77819 5.64187 2.56077 5.72836 2.35195C5.87913 1.98797 6.1001 1.65726 6.37868 1.37868C6.65726 1.1001 6.98797 0.879125 7.35195 0.728361C7.71593 0.577597 8.10603 0.5 8.5 0.5C8.89397 0.5 9.28407 0.577597 9.64805 0.728361C10.012 0.879125 10.3427 1.1001 10.6213 1.37868C10.8999 1.65726 11.1209 1.98797 11.2716 2.35195Z"
                  stroke="#999999" />
              </svg>
              <span class="order-items__delete-text">удалить из корзины</span>
            </button>
            <a href="#" class="order-items__img" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/img/order-1.jpg);"></a>
            <a href="#" class="order-items__name">Автомобильные весы до 15 тонн</a>
            <div class="order-items__price"></div>
            <div class="order-items__count">
              <button class="order-items__minus">-</button>
              <span class="order-items__value">1</span>
              <button class="order-items__plus">+</button>
            </div>
          </li>
          <li class="order-items__item">
            <button class="order-items__delete">
              <svg class="order-items__delete-icon" width="17" height="21" viewBox="0 0 17 21" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <rect x="0.5" y="3" width="16" height="4" rx="2" stroke="#999999" />
                <path d="M2.5 7H14.5V18.5C14.5 19.3284 13.8284 20 13 20H4C3.17157 20 2.5 19.3284 2.5 18.5V7Z"
                  stroke="#999999" />
                <path
                  d="M5.5 17.2429C5.77619 17.2429 6 17.0296 6 16.7665V11.4265C6 11.1633 5.77619 10.9501 5.5 10.9501C5.22381 10.9501 5 11.1633 5 11.4265V16.7665C5 17.0296 5.22381 17.2429 5.5 17.2429Z"
                  fill="#999999" />
                <path
                  d="M8.5 17.2429C8.77619 17.2429 9 17.0296 9 16.7665V11.4265C9 11.1633 8.77619 10.9501 8.5 10.9501C8.22381 10.9501 8 11.1633 8 11.4265V16.7665C8.00476 17.0296 8.22857 17.2429 8.5 17.2429Z"
                  fill="#999999" />
                <path
                  d="M11.5 17.2429C11.7762 17.2429 12 17.0296 12 16.7665V11.4265C12 11.1633 11.7762 10.9501 11.5 10.9501C11.2238 10.9501 11 11.1633 11 11.4265V16.7665C11 17.0296 11.2238 17.2429 11.5 17.2429Z"
                  fill="#999999" />
                <path
                  d="M11.2716 2.35195C11.3581 2.56077 11.4205 2.77819 11.458 3H8.5L5.54196 3C5.57945 2.77819 5.64187 2.56077 5.72836 2.35195C5.87913 1.98797 6.1001 1.65726 6.37868 1.37868C6.65726 1.1001 6.98797 0.879125 7.35195 0.728361C7.71593 0.577597 8.10603 0.5 8.5 0.5C8.89397 0.5 9.28407 0.577597 9.64805 0.728361C10.012 0.879125 10.3427 1.1001 10.6213 1.37868C10.8999 1.65726 11.1209 1.98797 11.2716 2.35195Z"
                  stroke="#999999" />
              </svg>
              <span class="order-items__delete-text">удалить из корзины</span>
            </button>
            <a href="#" class="order-items__img" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/img/order-2.jpg);"></a>
            <a href="" class="order-items__name">Автомобильные весы до 15 тонн</a>
            <div class="order-items__price">1 999 999 ₽</div>
            <div class="order-items__count">
              <button class="order-items__minus">-</button>
              <span class="order-items__value">1</span>
              <button class="order-items__plus">+</button>
            </div>
          </li>
          <li class="order-items__item">
            <button class="order-items__delete">
              <svg class="order-items__delete-icon" width="17" height="21" viewBox="0 0 17 21" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <rect x="0.5" y="3" width="16" height="4" rx="2" stroke="#999999" />
                <path d="M2.5 7H14.5V18.5C14.5 19.3284 13.8284 20 13 20H4C3.17157 20 2.5 19.3284 2.5 18.5V7Z"
                  stroke="#999999" />
                <path
                  d="M5.5 17.2429C5.77619 17.2429 6 17.0296 6 16.7665V11.4265C6 11.1633 5.77619 10.9501 5.5 10.9501C5.22381 10.9501 5 11.1633 5 11.4265V16.7665C5 17.0296 5.22381 17.2429 5.5 17.2429Z"
                  fill="#999999" />
                <path
                  d="M8.5 17.2429C8.77619 17.2429 9 17.0296 9 16.7665V11.4265C9 11.1633 8.77619 10.9501 8.5 10.9501C8.22381 10.9501 8 11.1633 8 11.4265V16.7665C8.00476 17.0296 8.22857 17.2429 8.5 17.2429Z"
                  fill="#999999" />
                <path
                  d="M11.5 17.2429C11.7762 17.2429 12 17.0296 12 16.7665V11.4265C12 11.1633 11.7762 10.9501 11.5 10.9501C11.2238 10.9501 11 11.1633 11 11.4265V16.7665C11 17.0296 11.2238 17.2429 11.5 17.2429Z"
                  fill="#999999" />
                <path
                  d="M11.2716 2.35195C11.3581 2.56077 11.4205 2.77819 11.458 3H8.5L5.54196 3C5.57945 2.77819 5.64187 2.56077 5.72836 2.35195C5.87913 1.98797 6.1001 1.65726 6.37868 1.37868C6.65726 1.1001 6.98797 0.879125 7.35195 0.728361C7.71593 0.577597 8.10603 0.5 8.5 0.5C8.89397 0.5 9.28407 0.577597 9.64805 0.728361C10.012 0.879125 10.3427 1.1001 10.6213 1.37868C10.8999 1.65726 11.1209 1.98797 11.2716 2.35195Z"
                  stroke="#999999" />
              </svg>
              <span class="order-items__delete-text">удалить из корзины</span>
            </button>
            <a href="#" class="order-items__img" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/img/order-1.jpg);"></a>
            <a href="" class="order-items__name">Автомобильные весы до 15 тонн</a>
            <div class="order-items__price"></div>
            <div class="order-items__count">
              <button class="order-items__minus">-</button>
              <span class="order-items__value">1</span>
              <button class="order-items__plus">+</button>
            </div>
          </li>
          <li class="order-items__item">
            <button class="order-items__delete">
              <svg class="order-items__delete-icon" width="17" height="21" viewBox="0 0 17 21" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <rect x="0.5" y="3" width="16" height="4" rx="2" stroke="#999999" />
                <path d="M2.5 7H14.5V18.5C14.5 19.3284 13.8284 20 13 20H4C3.17157 20 2.5 19.3284 2.5 18.5V7Z"
                  stroke="#999999" />
                <path
                  d="M5.5 17.2429C5.77619 17.2429 6 17.0296 6 16.7665V11.4265C6 11.1633 5.77619 10.9501 5.5 10.9501C5.22381 10.9501 5 11.1633 5 11.4265V16.7665C5 17.0296 5.22381 17.2429 5.5 17.2429Z"
                  fill="#999999" />
                <path
                  d="M8.5 17.2429C8.77619 17.2429 9 17.0296 9 16.7665V11.4265C9 11.1633 8.77619 10.9501 8.5 10.9501C8.22381 10.9501 8 11.1633 8 11.4265V16.7665C8.00476 17.0296 8.22857 17.2429 8.5 17.2429Z"
                  fill="#999999" />
                <path
                  d="M11.5 17.2429C11.7762 17.2429 12 17.0296 12 16.7665V11.4265C12 11.1633 11.7762 10.9501 11.5 10.9501C11.2238 10.9501 11 11.1633 11 11.4265V16.7665C11 17.0296 11.2238 17.2429 11.5 17.2429Z"
                  fill="#999999" />
                <path
                  d="M11.2716 2.35195C11.3581 2.56077 11.4205 2.77819 11.458 3H8.5L5.54196 3C5.57945 2.77819 5.64187 2.56077 5.72836 2.35195C5.87913 1.98797 6.1001 1.65726 6.37868 1.37868C6.65726 1.1001 6.98797 0.879125 7.35195 0.728361C7.71593 0.577597 8.10603 0.5 8.5 0.5C8.89397 0.5 9.28407 0.577597 9.64805 0.728361C10.012 0.879125 10.3427 1.1001 10.6213 1.37868C10.8999 1.65726 11.1209 1.98797 11.2716 2.35195Z"
                  stroke="#999999" />
              </svg>
              <span class="order-items__delete-text">удалить из корзины</span>
            </button>
            <a href="#" class="order-items__img" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/img/order-2.jpg);"></a>
            <a href="" class="order-items__name">Автомобильные весы до 15 тонн</a>
            <div class="order-items__price"></div>
            <div class="order-items__count">
              <button class="order-items__minus">-</button>
              <span class="order-items__value">1</span>
              <button class="order-items__plus">+</button>
            </div>
          </li>
        </ul>
        <a href="" class="order-items__button button button_transparent button_blue">Добавить еще товары в заказ</a>
      </div>
      <form class="order-form" novalidate>
        <h2 class="order-form__title">Рассчитать цену на весь заказ</h2>
        <div class="order-form__desc">
          <p>Для запроса стоимости или заказа заполните форму.</p>
          <p>Чем больше информации мы получим, тем точнее и быстрее будет наш ответ.</p>
          <p>Поля, отмеченные * - обязательны для заполнения</p>
        </div>
        <div class="order-form__inputs">
          <div class="form__input order-form__input">
            <input type="text" name="name" class="input" required>
            <label>Введите ваше имя*:</label>
            <div class="form__input-status"></div>
						<div class="message form__input-message">Это поле обязательно для заполнения, пример заполнения: Добрыня</div>
          </div>
          <div class="form__input order-form__input">
            <input type="text" name="phone" class="input" required>
            <label>Телефон*:</label>
            <div class="form__input-status"></div>
						<div class="message form__input-message">Это поле обязательно для заполнения, пример заполнения: +7 (922) 333-33-33</div>
          </div>
          <div class="form__input order-form__input">
            <input type="text" name="email" class="input" required>
            <label>E-mail*:</label>
            <div class="form__input-status"></div>
						<div class="message form__input-message">Это поле обязательно для заполнения, пример заполнения: ivan_ivanov@ex.ru</div>
          </div>
        </div>
        <div class="form__textarea order-form__textarea form__input">
          <textarea class="order-form__textarea" type="text" name="message" autocomplete="on" required></textarea>
          <label for="email">Ваша компания, или комментарий по заказу*:</label>
          <div class="form__input-status"></div>
        </div>
        <button type="submit" class="button order-form__submit">Отправить</button>
        <p class="order-form__personal"><a class="order-form__personal-link" href="#">Нажимая на кнопку «Отправить», я даю согласие на обработку персональных данных</a></p>
      </form>
    </div>
  </div>

  <main class="main">
    <?if($APPLICATION->GetCurPage() != '/'):?>
        <!-- BREADCRUMBS -->
        <?$APPLICATION->IncludeComponent(
            "bitrix:breadcrumb",
            "bread",
            Array(
                "PATH" => "",
                "SITE_ID" => "s1",
                "START_FROM" => "0"
            )
        );?>
        <!-- END BREADCRUMBS -->


        <div class="container">
            <h1 class="inner__title"><?$APPLICATION->ShowTitle(true);?></h1>
        </div>
    <?endif;?>
