document.addEventListener('DOMContentLoaded', function () {
	if (document.querySelector('.header')) {
		// Фиксированная шапка
		if (document.querySelector('.header-fixed')) {
			const height = document.querySelector('.header').offsetHeight
			const fixedHeader = document.querySelector('.header-fixed')

			window.addEventListener('scroll', function(e) {
				if(window.scrollY > height) {
					fixedHeader.classList.add('header-fixed_visible')
				} else {
					fixedHeader.classList.remove('header-fixed_visible')
				}
			})
		}

		// Меню
		if (document.querySelector('.header-menu__item_big')) {
			document.querySelectorAll('.header-menu__item_big').forEach(item => {
				try {
					item.querySelector('ul li').classList.add('header-menu__subitem_open')
	
					const items = Array.from(item.querySelector('ul').children)
	
					items.forEach(subitem => {
						subitem.addEventListener('mouseover', function () {
							items.forEach(elem => elem.classList.remove('header-menu__subitem_open'))
							subitem.classList.add('header-menu__subitem_open')
						})
					})
	
					item.addEventListener('mouseover', function () {
						clearTimeout(item.timeout)
						this.querySelector('ul').classList.add('header-menu__sublist_open')
					})
	
					item.addEventListener('mouseout', function () {
						item.timeout = setTimeout(() => {
							this.querySelector('ul').classList.remove('header-menu__sublist_open')
						}, 100)
					})
				} catch (error) {
				}
			})
		}

		// Поиск
		if (document.querySelector('.header-search__button')) {
			document.querySelectorAll('.header-search__button').forEach(button => {
				button.addEventListener('click', function (e) {
					if (window.innerWidth > 991) {
						e.preventDefault()
						this.nextElementSibling.classList.add('header-search__container_open')
					}
				})
			})
		}

		if (document.querySelector('.header-search__close')) {
			document.querySelectorAll('.header-search__close').forEach(button => {
				button.addEventListener('click', function () {
					this.parentElement.classList.remove('header-search__container_open')
				})
			})
		}

		document.addEventListener('click', function (e) {
			if (document.querySelector('.header-search__container_open') && !e.target.closest('.header-search')) {
				document.querySelector('.header-search__container_open').classList.remove('header-search__container_open')
			}
			if (document.querySelector('.header-mobile_open') && !e.target.closest('.header-mobile') && !e.target.closest('.header-burger')) {
				document.querySelector('.header-mobile_open').classList.remove('header-mobile_open')
				document.querySelector('.header-dark').classList.remove('header-dark_visible')
				document.body.classList.remove('no-scroll')
			}
		})

		// Мобильное меню
		if (document.querySelector('.header-mobile')) {
			const headerMobile = document.querySelector('.header-mobile');
			document.querySelectorAll('.header-burger').forEach(burger => {
				burger.addEventListener('click', function () {
					headerMobile.classList.add('header-mobile_open');
					document.querySelector('.header-dark').classList.add('header-dark_visible');
					document.body.classList.add('no-scroll');
				})
			})

			document.querySelectorAll('.header-mobile__close').forEach(burger => {
				burger.addEventListener('click', function () {
					headerMobile.classList.remove('header-mobile_open');
					document.querySelector('.header-dark').classList.remove('header-dark_visible');
					document.body.classList.remove('no-scroll');
				})
			})

			const contactsBlock = document.querySelector('.header-mobile__contacts');

			Array.from(document.querySelector('.header-mobile__list').children).forEach(item => {
				if (item.querySelector('ul')) {
					item.querySelector('.header-mobile__link').addEventListener('click', function(e) {
						e.preventDefault()
						item.querySelector('.header-mobile__inner').classList.add('header-mobile__inner_open')
						item.querySelector('.header-mobile__inner').append(contactsBlock)
						headerMobile.classList.add('no-scroll')
					})
				}
			})

			document.querySelectorAll('.header-mobile__back-button').forEach(item => {
				item.addEventListener('click', function() {
					this.closest('.header-mobile__inner').classList.remove('header-mobile__inner_open')
					headerMobile.classList.remove('no-scroll')
					document.querySelector('.header-mobile__menu').append(contactsBlock)
				})
			})
		}
	}
})