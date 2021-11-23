document.addEventListener('DOMContentLoaded', function() {
	if (document.querySelector('.simple-slider')) {
		const slider = new Swiper('.simple-slider', {
			spaceBetween: 30,
			slidesPerView: 3,
			navigation: {
				nextEl: '.simple-slider__next',
				prevEl: '.simple-slider__prev',
			},
			pagination: {
				el: '.simple-slider__pagination',
				type: 'bullets',
				clickable: true,
				bulletActiveClass: 'pagination__bullet_active',
				bulletClass: 'pagination__bullet'
			},
			breakpoints: {
				0: {
					slidesPerView: 1
				},
				640: {
					slidesPerView: 2
				},
				992: {
					slidesPerView: 3
				}
			}
		})
	}
})