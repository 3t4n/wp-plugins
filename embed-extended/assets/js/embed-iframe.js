(function () {
	// Skip if the page is not opened in an iframe.
	if (window.self === window.top) {
		return;
	}

	// Skip if secret data is not available.
	var matches = window.location.hash.match(/.*secret=([0-9a-f]{13}).*/);
	if (!matches) {
		return;
	}

	var secret = matches[1];

	var loaded = false;
	function onLoad() {
		if (!loaded) {
			loaded = true;
			document.querySelectorAll('a[href]').forEach(link => {
				link.addEventListener('click', onClick, false);
			});
		}

		onResize();
	}

	var timerResize, lastHeight;
	function onResize() {
		clearTimeout(timerResize);
		timerResize = setTimeout(function () {
			var height = Math.ceil(document.body.getBoundingClientRect().height);
			if (lastHeight !== height) {
				lastHeight = height;
				window.parent.postMessage({ height: height, secret: secret }, '*');
			}
		}, 100);
	}

	function onClick(e) {
		e.preventDefault();
		e.stopPropagation();

		var link = e.currentTarget;

		window.parent.postMessage({ href: link.href, target: link.target, secret: secret }, '*');
	}

	document.addEventListener('DOMContentLoaded', onLoad, false);
	window.addEventListener('load', onLoad, false);
	window.addEventListener('resize', onResize, false);
})();
