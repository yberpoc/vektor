
document.addEventListener('DOMContentLoaded', () => {
	if (document.querySelector('form')) {
		const myform = new Form(document.querySelectorAll('form'), {
			focusValidate: true,
			classes: {
				empty: 'input_empty',
				error: 'input_error',
				correct: 'input_correct'
			},
			fields: [
				{
					selector: '.am-name',
					maxLength: 32,
					realTimeRegExp: 'text',
					realTime: true,
					required: true,
				},
				{
					selector: '.am-count',
					maxLength: 32,
					realTimeRegExp: 'num',
					realTime: true,
				},
				{
					selector: '.am-company',
					maxLength: 32,
					realTimeRegExp: 'text',
					realTime: true,
				},
				{
					selector: '.am-city',
					maxLength: 32,
					realTimeRegExp: 'text',
					realTime: true,
				},
				{
					selector: '.am-message',
					realTimeRegExp: 'text',
					realTime: true,
				},
				{
					selector: '.am-phone',
					maxLength: 32,
					realTimeRegExp: 'phone',
					realTime: true,
					required: true,
					regExp: 'phone',
					mask: '+7 (***) ***-**-**'
				},
				{
					selector: '.am-email',
					maxLength: 32,
					realTimeRegExp: 'email',
					realTime: true,
					required: true,
					regExp: 'email'
				},
				{
					selector: '.am-contact',
					maxLength: 32,
					realTimeRegExp: 'text',
					realTime: true,
					required: true,
				},
				{
					selector: '.am-login',
					maxLength: 32,
					realTimeRegExp: 'text',
					realTime: true,
					required: true,
				},
				{
					selector: '.am-pass',
					maxLength: 32,
					required: true,
				},
				{
					selector: '.form_dropdown_select',
					maxLength: 32,
				},
			]
		});

		myform.on('error', function (input) {
			try {
				const parent = input.parentNode;
				const message = parent.querySelector('.message');

				message.classList.add('active');
				setTimeout(() => message.classList.remove('active'), 2000);
			} catch (error) {
			}
		});

		myform.on('empty', function (input) {
			try {
				const parent = input.parentNode;
				const message = parent.querySelector('.message');

				message.classList.add('active');
				setTimeout(() => message.classList.remove('active'), 2000);
			} catch (error) {

			}
		});

		// myform.on('submit', function (e) {
		// 	const form = e.target;
		// 	if (!form.classList.contains('form_subscribe') && (!form.classList.contains('header-search__form') && !form.classList.contains('search-form')) && form.name != 'form_auth') {
		// 		e.preventDefault();

		// 		const url = '/ajax/forms.php';
		// 		const type = form.getAttribute('method') || 'POST';
		// 		const data = new FormData(e.target);

		// 		if (form.querySelector('input[type="file"]')) {
		// 			let inputs = [...form.querySelectorAll('input[name*="file"]')].map(input => input.name);
		// 			const inputNames = []

		// 			inputs = inputs.filter((input) => {
		// 				const isInclude = inputNames.includes(input.name)
		// 				inputNames.push(input.name)
		// 				return isInclude
		// 			})

		// 			if (form.querySelector('.filepond')) {
		// 				const pond = FilePond.find(form.querySelector('.filepond'));
		// 				const files = pond.getFiles();
		// 				if (files)
		// 					files.forEach((elem, i) => {
		// 						data.set(inputs[i], elem.file);
		// 					})
		// 			}
		// 		}

		// 		$.ajax({
		// 			url,
		// 			type,
		// 			data: data,
		// 			processData: false,
		// 			contentType: false,
		// 		})
		// 		.done(function () {
		// 			const message = `<div class='refresh-page'>
		// 				<div class="refresh-page__title"><h3>Форма успешно отправлена!</h3></div>
		// 					<button style='width:310px' onclick="window.location.reload();" class='button form__button refresh-page'>Перезагрузить страницу</button>
		// 				</div>`
		// 			form.innerHTML = message
		// 		})
		// 		.fail(function (error) {
		// 			console.error('ошибка');
		// 		});
		// 	}
		// })
	}
})
