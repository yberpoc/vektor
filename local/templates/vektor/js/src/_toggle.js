document.addEventListener('DOMContentLoaded', function() {
	if (document.querySelector('.toggle')) {
		document.querySelectorAll('.toggle').forEach(button => {
			button.addEventListener('click', () => button.classList.toggle('toggle_active'));
		});
	}

	if (document.querySelector('.toggle-inner')) {
		document.querySelectorAll('.toggle-inner').forEach(button => {
			button.addEventListener('click', () => {
				let label = button.parentNode.querySelector('.compare-item__check-text');
				label.innerText = button.classList.contains('toggle_active') ? 'В сравнении' : 'Сравнить';
			});
		});
	}

	if (document.querySelector('.form__toggler')) {
		const formBodies = document.querySelectorAll('.form__toggle-body');

		let timeout;
		
		window.addEventListener('resize', function(e) {
			clearTimeout(timeout);
			timeout = setTimeout(() => {
				formBodies.forEach(formBody => {
					if (window.innerWidth > 1279) {
						formBody.classList.remove('form__toggle-body_hidden');
					}
				});
					
			}, 100);
		});

		document.querySelectorAll('.form__toggler').forEach(toggler => {
			toggler.addEventListener('click', () => {
				if (window.innerWidth > 1279)
					return false;

				const formBody = toggler.closest('.form').querySelector('.form__toggle-body');
				const arrow = toggler.closest('.form').querySelector('.form__arrow');
				
				if (arrow)
					arrow.classList.toggle('form__arrow_active');

				if (formBody)
					formBody.classList.toggle('form__toggle-body_hidden');
			});
		});
	}
})