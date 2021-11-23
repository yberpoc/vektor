document.addEventListener('DOMContentLoaded', function() {
	if (document.querySelector('.content-slider__slider')) {
		const contentSlider = new Swiper('.content-slider__slider', {
			slidesPerView: 1,
			loop: true, 
			navigation: {
				nextEl: '.content-slider__next',
				prevEl: '.content-slider__prev',
			},
		});
	}
});