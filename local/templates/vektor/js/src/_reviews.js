document.addEventListener('DOMContentLoaded', function() {
	if (document.querySelector('.reviews')) {
		const reviewsSlider = new Swiper('.reviews__slider', {
			effect: 'fade',
			speed: 400,
			simulateTouch: false,
			pagination: {
				el: '.reviews-pagination',
				clickable: true,
				bulletClass: 'reviews-pagination__bullet',
				bulletActiveClass: 'reviews-pagination__bullet_active',
				renderBullet: function (index, className) {
					return '<span class="' + className + '">' + (index + 1 < 10 ? '0' + (index + 1) : index + 1) + '</span>';
				}
			}
		})
	}
})