/**
 * File only get loaded after login
 * the pourpose of this file is to save the anon acceptance token to the user object
 */

(function ($) {
	"use strict";

	/**
	 * Get or generate a unique visitor id
	 */
	function ç() {
		Cookies.remove("tpul_visitor_id");
	}

	/**
	 * Save Anonymous acceptance token onto the user
	 */
	function saveAnonAcceptanceTokenToUserRecord() {
		let tpul_loginpage_cookie_accepted_date =
			window.TPUL.__getLastAcceptedDateCookie();

		let clicktype = "Button Click";

		if (!window.TPUL.__hasVisitorId()) {
			return;
		}
		if (window.TPUL.__isVisitorIdUpdatedInDB()) {
			return;
		}
		let tpul_visitor_id = window.TPUL.__getVisitorId();

		tpul_visitor_id = tpul_visitor_id ? tpul_visitor_id : "0";
		console.log("tpul_visitor_id", tpul_visitor_id);

		$.ajax({
			url:
				tpulApiSettings.root +
				"terms-popup-on-user-login/v1/action/save-anon-acceptance-token",
			type: "POST",
			contentType: "application/json",
			beforeSend: function (xhr) {
				xhr.setRequestHeader("X-WP-Nonce", tpulApiSettings.tpul_nonce);
			},
			data: JSON.stringify({
				tpul_loginpage_cookie_accepted_date:
					tpul_loginpage_cookie_accepted_date,
				useragent: navigator.userAgent,
				locationCoordinates: window.TPUL.__getGeolocation(),
				tpul_visitor_id: tpul_visitor_id,
				currentURL: window.TPUL.__getAcceptUrl(),
				user_action_method: clicktype,
				user_device_info: JSON.stringify({
					cookieEnabled: navigator.cookieEnabled,
					viewport: {
						width: window.innerWidth,
						height: window.innerHeight,
					},
					screen: {
						colorDepth: window.screen.colorDepth,
						pixelDepth: window.screen.pixelDepth,
					},
				}),
				user_language_preference: navigator.language,
				user_action_log: '["' + clicktype + '"]',
			}),
			success: function (response) {},
		})
			.done(function (results) {
				console.log("SUCCESS");
				console.log(results);
				window.TPUL.__setVisitorIdUpdatedInDB(tpul_visitor_id);
			})
			.fail(function (jqXHR, textStatus, errorThrown) {
				console.log("ERROR");
				console.log(jqXHR);
				console.log(textStatus);
				console.log(errorThrown);
			});
		// }
	}

	$(function () {
		saveAnonAcceptanceTokenToUserRecord();
	});
})(jQuery);
