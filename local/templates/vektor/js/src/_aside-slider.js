document.addEventListener('DOMContentLoaded', function () {
	
	if (document.querySelector('.aside-slider')) {
		const slider = new Swiper('.aside-slider', {
			loop: true,
			autoHeight: true,
			autoplay: {
				delay: 4000,
			},
			pagination: {
				el: '.aside-slider__pagination',
				type: 'bullets',
				clickable: true,
				bulletClass: 'pagination__bullet',
				bulletActiveClass: 'pagination__bullet_active'
			},
		})

		function resizeChangeContent() {
			try {
				const sidebarWrap = document.querySelector(`.inner__sidebar [data-content="aside-slider"]`)
				const contentWrap = document.querySelector(`.inner__content [data-content="aside-slider"]`)
				if (window.innerWidth < 1280 && !contentWrap.children.length) {
					contentWrap.append(...sidebarWrap.children)
					slider.update()
				} else if (window.innerWidth >= 1280 && !sidebarWrap.children.length) {
					sidebarWrap.append(...contentWrap.children)
					slider.update()
				}
			} catch (e) {
			}
		}

		resizeChangeContent()

		let timeout;
		window.addEventListener('resize', function () {
			clearTimeout(timeout)
			timeout = setTimeout(resizeChangeContent, 50)
		})
	}
})