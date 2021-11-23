document.addEventListener('DOMContentLoaded', function() {

	if (document.querySelector('.slider-reviews')) {
		const slider = new Swiper('.slider-reviews__slider', {
			effect: 'fade',
			speed: 400,
			simulateTouch: false,
			observer: true,
			observeParents: true,
			pagination: {
				el: '.slider-reviews__pagination',
				type: 'bullets',
				bulletClass: 'slider-reviews__bullet',
				bulletActiveClass: 'slider-reviews__bullet_active',
				clickable: true
			},
			navigation: {
				nextEl: '.slider-reviews__next',
				prevEl: '.slider-reviews__prev',
			},
		})
	}
})