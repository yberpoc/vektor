function playVideo(elem) {
	elem.contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*')
}

function pauseVideo(elem) {
	elem.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*')
}

function getYoutubeVideoIdFromHref(href) {
	let id;
	const hrefSplitted = href.split('/')
	const notClearId = hrefSplitted[hrefSplitted.length - 1]

	if (notClearId.includes('?v=')) {
		id = notClearId.split('?v=')[1].split('&')[0]
	} else {
		id = notClearId.split('?')[0]
	}

	return id
}

window.addPopupListener = function () {
	document.querySelectorAll('.popup').forEach(item => {
		item.addEventListener('click', function (e) {
			if (!e.target.closest('.popup__content') && !e.target.closest('.file-input__file')) {
				this.classList.remove('popup_open');
				document.body.classList.remove('no-scroll');

				if (this.querySelector('iframe')) {
					this.querySelectorAll('iframe').forEach(iframe => {
						pauseVideo(iframe)
						console.log(iframe)
					})
				}
			}
		})
	})
}


document.addEventListener('DOMContentLoaded', function () {
	if (document.querySelector('.popup')) {
		document.body.addEventListener('click', function (e) {
			if (e.target.closest('[data-popup]')) {
				try {
					e.preventDefault();

					const thisElem = e.target.closest('[data-popup]');
					const id = thisElem.dataset.popup;
					const popup = document.querySelector(`#${id}`);
					const content = popup.querySelector('.popup__content');

					if (thisElem.dataset.popupImg) {
						const href = thisElem.dataset.popupImg

						if (!(popup.querySelector('img') && popup.querySelector('img').src == href)) {
							const elem = `<img src="${href}" alt="">`

							content.innerHTML = ''
							content.insertAdjacentHTML('beforeend', elem)
						}
					}

					if (thisElem.dataset.popupVideo) {
						let href = thisElem.dataset.popupVideo
						const id = getYoutubeVideoIdFromHref(href)

						if (!(popup.querySelector('iframe') && getYoutubeVideoIdFromHref(popup.querySelector('iframe').src) === id)) {
							if (!href.includes('youtube.com') && !href.includes('youtu.be')) {
								href = `https://www.youtube.com/embed/${href}`
							}

							const elem = `<iframe width="1120" height="630" src="${href}?autoplay=1&rel=0&enablejsapi=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>`

							content.innerHTML = '';
							content.insertAdjacentHTML('beforeend', elem);
						} else {
							playVideo(popup.querySelector('iframe'))
						}
					}

					popup.classList.add('popup_open')
					document.body.classList.add('no-scroll')
				} catch (e) {
				}
			}
		})

		window.addPopupListener();
	}
})