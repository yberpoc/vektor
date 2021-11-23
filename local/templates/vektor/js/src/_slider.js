document.setMaxHeight('.slider__inner.slider__inner_company .slider__text-inner');
document.setMaxHeight('.slider_catalog .slider__text-inner');

function includeSwiper(a, b, c, d, e, f, g, h) {
  var slider = [
    'slider',
  ];

  slider[0] += a;

  slider[0] = new Swiper(b, {
    speed: 500,
    spaceBetween: g,
    slidesPerView: h,
    loop: true,
    effect: c,
    simulateTouch: false,
    observer: true,
		observeParents: true,
    slideActiveClass: 'slider__item_active',
    pagination: {
      el: d,
      clickable: true,
      type: 'bullets',
      bulletClass: 'banner-pagination__bullet',
      bulletActiveClass: 'banner-pagination__bullet_active',
      modifierClass: 'slider__'
    },
    navigation: {
      nextEl: e,
      prevEl: f,
    },
  });
}

// Main
includeSwiper(
  'topMainText',
  '.slider_main-top .slider__text',
  'fade',
  '.slider__pagination_main-top',
  '.slider__next_main-top',
  '.slider__prev_main-top',
  0,
  1
)

includeSwiper(
  'topMainImage',
  '.slider_main-top .slider__image',
  'slide',
  '.slider__pagination_main-top',
  '.slider__next_main-top',
  '.slider__prev_main-top',
  30,
  1
)

includeSwiper(
  'bottomMainText',
  '.slider_main-bottom .slider__text',
  'fade',
  '.slider__pagination_main-bottom',
  '.slider__next_main-bottom',
  '.slider__prev_main-bottom',
  0,
  1
)

includeSwiper(
  'bottomMainImage',
  '.slider_main-bottom .slider__image',
  'slide',
  '.slider__pagination_main-bottom',
  '.slider__next_main-bottom',
  '.slider__prev_main-bottom',
  30,
  1
)

//Company
includeSwiper(
  'topCompanyText',
  '.slider_company-top .slider__text',
  'fade',
  '.slider__pagination_company-top',
  '.slider__next_company-top',
  '.slider__prev_company-top',
  0,
  1
)

includeSwiper(
  'topCompanyImage',
  '.slider_company-top .slider__image',
  'slide',
  '.slider__pagination_company-top',
  '.slider__next_company-top',
  '.slider__prev_company-top',
  30,
  1
)

includeSwiper(
  'bottomCompanyText',
  '.slider_company-bottom .slider__text',
  'fade',
  '.slider__pagination_company-bottom',
  '.slider__next_company-bottom',
  '.slider__prev_company-bottom',
  0,
  1
)

includeSwiper(
  'bottomCompanyImage',
  '.slider_company-bottom .slider__image',
  'slide',
  '.slider__pagination_company-bottom',
  '.slider__next_company-bottom',
  '.slider__prev_company-bottom',
  30,
  1
)

//Catalog
includeSwiper(
  'redCatalogText',
  '.slider_catalog-red .slider__text',
  'fade',
  '.slider__pagination_catalog-red',
  '.slider__next_catalog-red',
  '.slider__prev_catalog-red',
  0,
  1
)

includeSwiper(
  'redCatalogImage',
  '.slider_catalog-red .slider__image',
  'slide',
  '.slider__pagination_catalog-red',
  '.slider__next_catalog-red',
  '.slider__prev_catalog-red',
  30,
  1
)

includeSwiper(
  'blueCatalogText',
  '.slider_catalog-blue .slider__text',
  'fade',
  '.slider__pagination_catalog-blue',
  '.slider__next_catalog-blue',
  '.slider__prev_catalog-blue',
  0,
  1
)

includeSwiper(
  'blueCatalogImage',
  '.slider_catalog-blue .slider__image',
  'slide',
  '.slider__pagination_catalog-blue',
  '.slider__next_catalog-blue',
  '.slider__prev_catalog-blue',
  30,
  1
)

includeSwiper(
  'purpleCatalogText',
  '.slider_catalog-purple .slider__text',
  'fade',
  '.slider__pagination_catalog-purple',
  '.slider__next_catalog-purple',
  '.slider__prev_catalog-purple',
  0,
  1
)

includeSwiper(
  'purpleCatalogImage',
  '.slider_catalog-purple .slider__image',
  'slide',
  '.slider__pagination_catalog-purple',
  '.slider__next_catalog-purple',
  '.slider__prev_catalog-purple',
  30,
  1
)

