/* global appizyApi */

(function ($) {
	var apps = document.getElementsByClassName('appizy-app');

	for (var i = 0; i < apps.length; i++) {
		var app = apps[i];

		var frame = app.querySelector('iframe');
		var saveButton = app.querySelector('.appizy-app-toolbar .button-save');
		var isSaveEnabled = !!saveButton;
		var printButton = app.querySelector('.appizy-app-toolbar .button-print');
		var resetButton = app.querySelector('.appizy-app-toolbar .button-reset');

		if (!frame.height) {
			frame.addEventListener('load', _resizeFrame);
		}

		if (isSaveEnabled) {
			frame.addEventListener('load', _loadUserData);
			saveButton.addEventListener('click', _saveUserData.bind(frame));
		}

		if (printButton) {
			printButton.addEventListener('click', _print.bind(frame));
		}

		if (resetButton) {
			resetButton.addEventListener('click', _reset.bind(frame));
		}
	}

	function _resizeFrame() {
		this.style.height = this.contentWindow.document.body.scrollHeight + 16 + 'px';
	}

	function _loadUserData() {
		var app_id = this.getAttribute('data-app-id');

		var _this = this;
		$.ajax({
			url: appizyApi.root + 'appizy/v1/app/' + app_id,
			method: 'GET',
			beforeSend: function (xhr) {
				xhr.setRequestHeader('X-WP-Nonce', appizyApi.nonce);
			}
		}).done(
			function (data) {
				if (!data) {
					data = {};
				}

				_this.contentWindow.APY.setInputs(data);
				_this.contentWindow.APY.calculate();
			}
		);
	}

	function _saveUserData() {
		var inputs = this.contentWindow.APY.getInputs();
		var app_id = this.getAttribute('data-app-id');

		$.ajax({
			url: appizyApi.root + 'appizy/v1/app/' + app_id,
			data: inputs,
			method: 'POST',
			beforeSend: function (xhr) {
				xhr.setRequestHeader('X-WP-Nonce', appizyApi.nonce);
			}
		}).done(
			function () {
				// Not much yet
			}, 'json'
		);
	}

	function _print() {
		this.contentWindow.print();
	}

	function _reset() {
		this.contentWindow.APY.onResetButtonClicked();
	}
})(jQuery);
