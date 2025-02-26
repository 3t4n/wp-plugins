(function () {
	// Check if this script is already initialized.
	if (window.embed_extended) {
		return;
	}

	window.embed_extended = true;

	function onMessage(e) {
		var data = e.data || {};

		if (!data.secret) {
			return;
		}

		var iframe = document.querySelector('iframe.ee-iframe[data-secret="' + data.secret + '"]');
		if (!iframe) {
			return;
		}

		if ('number' === typeof data.height) {
			iframe.height = +data.height;
		} else if (data.href) {
			if ('_blank' === data.target) {
				window.open(data.href);
			} else {
				window.location.href = data.href;
			}
		}
	}

	window.addEventListener('message', onMessage, false);
})();
