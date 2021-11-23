document.addEventListener('DOMContentLoaded', function () {
	if (document.querySelector('.compare')) {
		const slider = new Swiper('.compare__slider', {
			slidesPerView: 3,
			spaceBetween: 30,
			speed: 400,
			freeMode: true,
			freeModeMinimumVelocity: 0.4,
			breakpoints: {
				0: {
					slidesPerView: 2,
					spaceBetween: 0,
					freeMode: false,
				},
				780: {
					spaceBetween: 12,
					slidesPerView: 2,
					freeMode: true,
				},
				992: {
					slidesPerView: 2.6
				},
				1280: {
					slidesPerView: 2.8,
					spaceBetween: 30,
				},
				1600: {
					slidesPerView: 3
				}
			},
			navigation: {
				nextEl: '.compare-nav__next',
				prevEl: '.compare-nav__prev',
			},
			scrollbar: {
				el: '.swiper-scrollbar',
				draggable: true,
			},
		})

		function rowEqualHeight() {
			const list = document.querySelector('.compare-sidebar__options');
			const compareItems = document.querySelectorAll('.compare-item');

			for (let x = 0; x < list.children.length; x++) {
				// Формируем массив из элементов нужного ряда
				const rowItems = []

				rowItems.push(list.children[x])

				compareItems.forEach(item => {
					rowItems.push(item.querySelector('.compare-item__options').children[x])
				})

				// Ищем наибольшую высоту и назначаем ее всем элементам ряда
				let height = 0

				rowItems.forEach(item => {
					item.style.height = 'auto'
					height = item.offsetHeight > height ? item.offsetHeight : height
				})

				rowItems.forEach(item => {
					item.style.height = `${height}px`
				})
			}
		}

		window.onload = () => rowEqualHeight();

		let timeout;
		window.addEventListener('resize', function () {
			clearTimeout(timeout)
			timeout = setTimeout(rowEqualHeight, 100)
		})

		const delay = ms => {
			return new Promise(func => setTimeout(() => func(), ms))
		}

		const countElem = document.querySelector('.compare-nav__count span')
		let count = document.querySelectorAll('.compare-item').length
		countElem.innerHTML = count

		if (count < 2) {
			slider.params.slidesPerView = 1
			slider.update()
		}

		document.querySelectorAll('.compare-item__check-button').forEach(button => {
			button.addEventListener('click', function () {
				delay(300).then(() => {
					button.closest('.compare-item').remove()
					$.ajax({
						url: '/ajax/compare.php',
						data: {
							compare: true,
							elem_id: this.dataset.id,
							iblock_id: this.dataset.iblockId,
							compare_name: this.dataset.compareName,
						},
						method: 'post',
						dataType: 'json',
					});
					slider.update()

					count = document.querySelectorAll('.compare-item').length
					countElem.innerHTML = count

					if (count < 2) {
						slider.params.slidesPerView = 1
						slider.update()
					}
				})
			})
		})
	}
})