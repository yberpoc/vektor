document.addEventListener('DOMContentLoaded', function() {
	if (document.querySelector('.card-slider')) {
		const cardSlider = new Swiper('.card-slider__container', {
			slidesPerView: 4,
			spaceBetween: 30,
			speed: 400,
			breakpoints: {
				0: {
					slidesPerView: 'auto'
				},
				780: {
					slidesPerView: 3
				},
				1280: {
					slidesPerView: 4
				}
			}
		})
	}
})