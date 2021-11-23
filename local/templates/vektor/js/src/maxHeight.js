function setMaxHeight(selector, resize = true) {
	try {
		const nodeList = document.querySelectorAll(selector);
		[...nodeList].map(item => item.style.height = `auto`);
		let maxHeight = Math.max.apply(Math, [...nodeList].map(item => item.offsetHeight));
		[...nodeList].map(item => item.style.height = `${maxHeight}px`);

		if (resize) {
			let timer;
			window.addEventListener('resize', function() {
				clearTimeout(timer);
				timer = setTimeout(function() {setMaxHeight(selector, false)}, 500);
			});
		}

	} catch(e) {
	}
}

document.setMaxHeight = setMaxHeight;