const tabSliders = [];

document.addEventListener('DOMContentLoaded', function() {
	if (document.querySelector('.tabs')) {
		let tabsSlider = false;
		let tabsWidth = 0;
		let tabsWrapperWidth = document.querySelector('.tabs__wrapper').offsetWidth;

		document.querySelectorAll('.tabs-item').forEach(item => {
			let margin = window.getComputedStyle(item, null).getPropertyValue("margin-right");
			margin = Number(margin.slice(0, -2));

			tabsWidth += item.offsetWidth + margin;

			item.addEventListener('click', function() {
				const groupItems = this.parentElement.children;
				const groupName = this.dataset.tabGroup;
				const contentId = this.dataset.tab;
				const groupContentItems = document.querySelectorAll(`.tabs__content[data-tab-group="${groupName}"]`);

				Array.from(groupItems).forEach(groupItem => {
					groupItem.classList.remove('tabs-item_active');
				});

				groupContentItems.forEach(contentItem => {
					contentItem.classList.remove('tabs__content_active');
				});

				document.querySelector(`.tabs__content[data-tab="${contentId}"]`).classList.add('tabs__content_active');
				this.classList.add('tabs-item_active');
			});
		});

		function tabsSliderInit() {
			if (tabsWidth > tabsWrapperWidth && tabsSlider === false) {
				tabsSlider = new Swiper('.tabs', {
					slidesPerView: 5,
					spaceBetween: 25,
					navigation: {
						nextEl: '.tabs-nav__next',
						prevEl: '.tabs-nav__prev',
						disabledClass: 'tabs-nav__arrow_hide'
					},
					breakpoints: {
						0: {
							spaceBetween: 15,
							slidesPerView: 2
						},
						480: {
							slidesPerView: 3
						},
						780: {
							spaceBetween: 25,
							slidesPerView: 4
						},
						991: {
							slidesPerView: 5
						},
						1280: {
							slidesPerView: 6
						},
						1600: {
							slidesPerView: 8
						}
					}
				});

				tabSliders.push(tabsSlider)
			}
		}

		tabsSliderInit();

		let timeout;
		window.addEventListener('resize', function() {
			clearTimeout(timeout);
			timeout = setTimeout(() => {
				tabsWidth = 0;
				tabsWrapperWidth = document.querySelector('.tabs__wrapper').offsetWidth;
				document.querySelectorAll('.tabs-item').forEach(item => {
					tabsWidth += item.offsetWidth + 30;
				})

				tabsSliderInit();
			}, 100)
		})
	}
})