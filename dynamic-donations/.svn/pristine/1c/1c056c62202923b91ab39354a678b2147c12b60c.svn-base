(function ($) {
	$(function () {
		function DyDo_Public_WC() {
			const _self = this;
			_self.WC_AJAX_URL = dydo_wc_ajax.ajax_url;

			_self.handleSubmitOneTimeDonation();
		}

		DyDo_Public_WC.prototype.handleSubmitOneTimeDonation = function () {
			const _self = this;
			const forms = $('form.dydo_submit-one-time-donation');

			forms.each(function () {
				$(this).submit((e) => {
					e.preventDefault();

					// Form data
					const formData = $(this).serialize();

					// Request
					const request = $.ajax({
						type: 'POST',
						url: _self.WC_AJAX_URL,
						dataType: 'json',
						data: formData,
					});
					request.done((res) => {
						if (res.success) {
							const data = res.data;

							_self.setCookie('dydo_donation_amount', data.amount, {path: '/'});
							location.href = data.url_woo_cart
						}
					});
				});
			});
		}

		DyDo_Public_WC.prototype.setCookie = function (cookieName, cookieValue, exdays = 1) {
			const d = new Date();
			d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
			const expires = 'expires=' + d.toUTCString();
			document.cookie = cookieName + '=' + cookieValue + ';' + expires + ';path=/';
		}

		DyDo_Public_WC.prototype.getCookie = function (cookie, cookieName = this.cookieName) {
			let name = cookieName + '=';
			let ca = cookie ? cookie.split(';') : document.cookie.split(';');

			for (let i = 0; i < ca.length; i++) {
				let c = ca[i];

				while (c.charAt(0) === ' ') {
					c = c.substring(1);
				}

				if (c.indexOf(name) === 0) {
					return true;
				}
			}

			return false;
		}

		new DyDo_Public_WC();
	});
})(jQuery);
