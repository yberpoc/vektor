document.addEventListener('DOMContentLoaded', function () {
	function playVideo(elem) {
		elem.contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*')
	}

	function pauseVideo(elem) {
		elem.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*')
	}

	if (document.querySelector('.product-card')) {
		const sliderThumbs = new Swiper('.product-card-thumbs', {
			spaceBetween: 5,
			loop: true,
			slidesPerView: 4,
			watchSlidesVisibility: true,
			watchSlidesProgress: true,
			navigation: {
				nextEl: '.product-card-thumbs__next',
				prevEl: '.product-card-thumbs__prev',
			},
			breakpoints: {
				0: {
					direction: 'horizontal',
				},
				640: {
					direction: 'vertical'
				}
			}
		})

		const slider = new Swiper('.product-card-slider', {
			loop: true,
			spaceBetween: 20,
			navigation: {
				nextEl: '.product-card-slider__next',
				prevEl: '.product-card-slider__prev',
			},
			thumbs: {
				swiper: sliderThumbs
			}
		});

		slider.on('slideChangeTransitionStart', function() {
			const previosSlide = slider.slides[slider.previousIndex];

			if (previosSlide.querySelector('iframe')) {
				pauseVideo(previosSlide.querySelector('iframe'));
			}
		})

		if (document.querySelector('.popup-slider')) {
			const popupThumbs = new Swiper('.popup-slider__thumbs', {
				spaceBetween: 10,
				slidesPerView: 'auto',
				watchSlidesVisibility: true,
				watchSlidesProgress: true,
				observer: true,
				observeParents: true,
				navigation: {
					nextEl: '.popup-slider__thumbs-next',
					prevEl: '.popup-slider__thumbs-prev',
				},
			})
	
			const popupSlider = new Swiper('.popup-slider__main', {
				spaceBetween: 0,
				slidesPerView: 1,
				observer: true,
				observeParents: true,
				allowTouchMove: true,
				zoom: true,
				loop: true,
				navigation: {
					nextEl: '.popup-slider__main-next',
					prevEl: '.popup-slider__main-prev',
					disabledClass: 'popup-slider__main-arrow_disabled'
				},
				thumbs: {
					swiper: popupThumbs
				}
			});

			popupSlider.on('slideChangeTransitionStart', function() {
				const previosSlide = popupSlider.slides[popupSlider.previousIndex];
	
				if (previosSlide.querySelector('iframe')) {
					pauseVideo(previosSlide.querySelector('iframe'));
				}
			})

			document.querySelectorAll('.product-card-slider__item').forEach(item => {
				item.addEventListener('click', function() {
					try {
						const slideIndex = slider.activeIndex;
						popupSlider.update();
						popupSlider.slideTo(slideIndex - 1, 0);
					} catch (error) {
					}
				})
			})
		}

		if (document.querySelector('.specific-complect')) {
			window.onload = function () {
				if (window.innerWidth <= 560) {
					const items = document.querySelectorAll('.specific-complect__item');
					let height = 0;

					items.forEach(item => {
						const itemHeight = item.querySelector('img').offsetHeight;
						height = height < itemHeight ? itemHeight : height;
					})

					items.forEach(item => {
						item.querySelector('.specific-complect__wrap').style.height = `${height}px`
					})
				}
			}
		}

		if (document.querySelector('.documents-slider')) {
			const docsSlider = new Swiper('.documents-slider__container', {
				slidesPerView: 4,
				spaceBetween: 30,
				observer: true,
				observeParents: true,
				pagination: {
					el: '.documents-slider__pagination',
					clickable: true,
					bulletClass: 'pagination__bullet',
					bulletActiveClass: 'pagination__bullet_active',
				},
				navigation: {
					nextEl: '.documents-slider__next',
					prevEl: '.documents-slider__prev',
				},
				breakpoints: {
					0: {
						slidesPerView: 1,
					},
					480: {
						slidesPerView: 2,
					},
					560: {
						slidesPerView: 3,
					},
					991: {
						slidesPerView: 4,
					},
				}
			});

			let timeout;
			window.addEventListener('resize', function() {
				clearTimeout(timeout);
				timeout = setTimeout(() => {
					docsSlider.update();
				}, 50)
			})
		}

		if (document.querySelector('.product-card__title')) {
			const title = document.querySelector('.product-card__title');
			const leftContainer = document.querySelector('.product-card__top');
			const rightContainer = document.querySelector('.product-card__right');
			let isTitleRight = true;

			function changeTitlePosOnResize() {
				if (window.innerWidth < 992 && isTitleRight) {
					leftContainer.prepend(title);
					isTitleRight = false;
				} else if (window.innerWidth >= 992 && !isTitleRight) {
					rightContainer.prepend(title);
					isTitleRight = true;
				}
			}

			changeTitlePosOnResize();

			let timeout;
			window.addEventListener('resize', () => {
				clearTimeout(timeout);
				timeout = setTimeout(() => {
					changeTitlePosOnResize();
				}, 100);
			})
		}
	}
})