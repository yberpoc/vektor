document.addEventListener('DOMContentLoaded', function () {
	function playVideo(elem) {
		elem.contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*')
	}

	function pauseVideo(elem) {
		elem.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*')
	}

	if (document.querySelector('.news-detail-gallery')) {
		const sliderThumbs = new Swiper('.news-detail-gallery__thumbs', {
			spaceBetween: 10,
			// loop: true,
			slidesPerView: 'auto',
			watchSlidesVisibility: true,
			watchSlidesProgress: true,
		})

		const slider = new Swiper('.news-detail-gallery__slider', {
			// loop: true,
			spaceBetween: 0,
			navigation: {
				nextEl: '.news-detail-gallery__next',
				prevEl: '.news-detail-gallery__prev',
				disabledClass: 'news-detail-gallery__arrow_disabled'
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

			document.querySelectorAll('.news-detail-gallery__slide').forEach(item => {
				item.addEventListener('click', function() {
					try {
						const slideIndex = slider.activeIndex;
						popupSlider.update();
						popupSlider.slideTo(slideIndex + 1, 0);
					} catch (error) {
					}
				})
			})
		}
	}
})