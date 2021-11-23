var bigBannerLeft = new Swiper('.big-banner__left', {
    speed: 400,
    simulateTouch: false,
    loop: true,
    loopAdditionalSlides: 3,
    slideActiveClass: 'big-banner__item_active',
    effect: 'fade',
    autoplay: {
        delay: 3000,
    },
    navigation: {
        nextEl: '.big-banner__next',
        prevEl: '.big-banner__prev',
    },
    pagination: {
        el: '.big-banner__pagination',
        type: 'bullets',
        clickable: true,
        bulletClass: 'banner-pagination__bullet',
        bulletActiveClass: 'banner-pagination__bullet_active',
        modifierClass: 'banner-pagination__'
    },
});

var bigBannerRight = new Swiper('.big-banner__right', {
    speed: 600,
    slidesPerView: 3,
    loop: true,
    simulateTouch: false,
    loopAdditionalSlides: 3,
    followFinger: false,
    slidePrevClass: 'big-banner__item_prev',
    slideActiveClass: 'big-banner__item_active',
    slideDuplicateNextClass: 'big-banner__duplicate-next',
    autoplay: {
        delay: 3000,
    },
    navigation: {
        nextEl: '.big-banner__next',
        prevEl: '.big-banner__prev',
    },
    pagination: {
        el: '.big-banner__pagination',
        type: 'bullets',
        clickable: true,
        bulletClass: 'banner-pagination__bullet',
        bulletActiveClass: 'banner-pagination__bullet_active',
        modifierClass: 'banner-pagination__'
    },
    breakpoints: {
        0: {

        },
        781: {
            spaceBetween: 0,
        },
        1600: {
            spaceBetween: 26,
        }
    }
});