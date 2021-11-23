document.addEventListener('DOMContentLoaded', function() {
	if (document.querySelector('.our-production')) {
		const productionSlider = new Swiper('.our-production__slider', {
			slidesPerView: 'auto',
			spaceBetween: 20,
			loop: true,
			pagination: {
				el: '.our-production-pagination',
				type: 'bullets',
				bulletClass: 'our-production-pagination__bullet',
				bulletActiveClass: 'our-production-pagination__bullet_active',
				clickable: true
			},
			navigation: {
				nextEl: '.our-production-nav__next',
				prevEl: '.our-production-nav__prev',
			},
			autoplay: {
				delay: 3000,
				disableOnInteraction: false
			},
		})
	}
})