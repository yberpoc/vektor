document.addEventListener('DOMContentLoaded', function() {
  if (document.querySelector('.career-slider')) {
    const slider = new Swiper('.career-slider', {
      effect: 'fade',
      fadeEffect: {
        crossFade: true
      },
      navigation: {
        nextEl: '.career-slider-nav__next',
        prevEl: '.career-slider-nav__prev',
        disabledClass: 'career-slider-nav__arrow_disabled'
      },
    })

    document.querySelectorAll('.card[data-popup="career"]').forEach((item, index) => {
      item.addEventListener('click', function() {
        slider.slideTo(index, 0);
      })
    })
  }
})