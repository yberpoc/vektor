document.addEventListener('DOMContentLoaded', function () {
	if (document.querySelector('.order')) {
		document.querySelectorAll('.header-basket').forEach(button => {
			button.addEventListener('click', function () {
				document.querySelector('.header-mobile').classList.remove('header-mobile_open');
				document.querySelector('.dark').classList.remove('dark_visible');
				let window_scroll = window.pageYOffset;
				if (document.querySelector('.order_open')) {


					document.querySelector('.order').classList.remove('order_open');
					document.querySelector('.order').classList.remove('order_open__fixed-header');
					document.body.classList.remove('no-scroll');
					document.querySelectorAll('.header-basket__wrap').forEach(item => {
						item.classList.remove('header-basket__wrap_active');
					});
				} else {
					document.querySelector('.order').classList.add('order_open');
					if(window_scroll >= 140){
						document.querySelector('.order').classList.add('order_open__fixed-header');
					}
					document.body.classList.add('no-scroll');
					document.querySelectorAll('.header-basket__wrap').forEach(item => {
						item.classList.add('header-basket__wrap_active');
					});
				}

				if (document.querySelector('.header-dark_visible')) {
					document.querySelector('.header-dark').classList.remove('header-dark_visible');
				}
			})
		})

		document.querySelector('.order__close').addEventListener('click', function () {
			this.closest('.order').classList.remove('order_open');
			this.closest('.order').classList.remove('order_open__fixed-header');
			document.body.classList.remove('no-scroll');
			document.querySelectorAll('.header-basket__wrap').forEach(item => {
				item.classList.remove('header-basket__wrap_active');
			})
		})
		// document.querySelector('.order-items__list').addEventListener('click', function (e) {
		//   if (e.target.closest('.order-items__count')) {
		//     var counterElem = e.target.closest('.order-items__count');
		//     var count = counterElem.querySelector('.order-items__value');
		//     var countValue = Number(count.innerHTML);
		//
		//     if (e.target.closest('.order-items__minus')) {
		//       countValue--;
		//       count.innerHTML = countValue < 1 ? 1 : countValue;
		//     } else if (e.target.closest('.order-items__plus')) {
		//       countValue++;
		//       count.innerHTML = countValue;
		//     }
		//   }
		// });
		document.body.addEventListener('click', function (e) {
			if (e.target && e.target.closest('.order-items__count')) {
				var counterElem = e.target.closest('.order-items__count');
				var count = counterElem.querySelector('.order-items__value');
				var countValue = Number(count.innerHTML);

				if (e.target && e.target.closest('.order-items__minus')) {
					countValue--;
					count.innerHTML = countValue < 1 ? 1 : countValue;
				} else if (e.target && e.target.closest('.order-items__plus')) {
					countValue++;
					count.innerHTML = countValue;
				}
			}
		});

		document.querySelectorAll('.order-items__delete').forEach(button => {
			button.addEventListener('click', function () {
				this.closest('.order-items__item').classList.add('order-items__item_deleted');
				setTimeout(() => {
					this.closest('.order-items__item').remove();
				}, 250);
			})
		});

		document.addEventListener('click', function (e) {
			if (document.querySelector('.order_open') && !e.target.closest('.order') && !e.target.closest('.header-basket')) {
				// document.querySelector('.order').classList.remove('order_open');
				// document.body.classList.remove('no-scroll');
				document.querySelectorAll('.header-basket__wrap').forEach(item => {
					item.classList.remove('header-basket__wrap_active');
				})
			}
		})
	}
})