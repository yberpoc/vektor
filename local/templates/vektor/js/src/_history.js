document.addEventListener('DOMContentLoaded', function () {
	if (document.querySelector('.history')) {
		const inBrowser = typeof window !== 'undefined'
		const UA = inBrowser && window.navigator.userAgent.toLowerCase()
		const isIE = UA && /msie|trident/.test(UA)
		const arrow = document.querySelector('.history-arrow')
		const coords = getCoords(arrow)

		if (isIE) {
			document.querySelector('.history-arrow__svg').style.display = 'none'
			document.querySelector('.history-arrow__svg_ie').style.display = 'block'
		}

		function getCoords(elem) {
			let box = elem.getBoundingClientRect();

			return {
				top: box.top + pageYOffset,
				bottom: box.bottom + pageYOffset,
				left: box.left + pageXOffset,
				right: box.right + pageXOffset
			};
		}

		function checkArrow() {
			if (pageYOffset + window.innerHeight / 2 > coords.top && pageYOffset + window.innerHeight / 2 < coords.bottom) {
				arrow.classList.add('history-arrow_visible')
				window.removeEventListener('scroll', checkArrow)
			}
		}

		checkArrow()

		window.addEventListener('scroll', checkArrow)
	}
})