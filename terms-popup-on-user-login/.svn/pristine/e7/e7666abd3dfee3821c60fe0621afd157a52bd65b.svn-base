(function ($) {
	"use strict";

	// Create the TPUL namespace if it doesn't already exist

	/**
	 * -----------------------
	 * BEGIN Framework
	 * -----------------------
	 */

	function __getPopupType() {
		if (
			typeof tpulApiSettings !== "undefined" &&
			typeof tpulApiSettings.popup_type !== "undefined" &&
			tpulApiSettings.popup_type !== "" &&
			tpulApiSettings.popup_type !== "0"
		) {
			return tpulApiSettings.popup_type;
		}
		return "";
	}

	function __isTestMode() {
		// Check if tpulApiSettings is defined and has the popup_is_test property
		if (
			typeof tpulApiSettings !== "undefined" &&
			typeof tpulApiSettings.popup_is_test !== "undefined" &&
			tpulApiSettings.popup_is_test !== "" &&
			tpulApiSettings.popup_is_test !== "0"
		) {
			console.log("Test Mode is ON");
			return true;
		}
		return false;
	}

	function __isLoginPage() {
		if (
			typeof tpulApiSettings !== "undefined" &&
			typeof tpulApiSettings.popup_is_loginpage !== "undefined" &&
			tpulApiSettings.popup_is_loginpage !== "" &&
			tpulApiSettings.popup_is_loginpage !== "0"
		) {
			return true;
		}
		return false;
	}

	function __isUserLoggedIn() {
		if (
			typeof tpulApiSettings !== "undefined" &&
			typeof tpulApiSettings.user_is_logged_in !== "undefined" &&
			tpulApiSettings.user_is_logged_in !== "" &&
			tpulApiSettings.user_is_logged_in !== "0"
		) {
			return true;
		}
		return false;
	}

	function __isPopupSavesCookie() {
		if (
			typeof tpulApiSettings !== "undefined" &&
			typeof tpulApiSettings.popup_saves_cookie !== "undefined" &&
			tpulApiSettings.popup_saves_cookie !== "" &&
			tpulApiSettings.popup_saves_cookie !== "0"
		) {
			return true;
		}
		return false;
	}

	function __shouldPopupCheckCookie() {
		if (
			typeof tpulApiSettings !== "undefined" &&
			typeof tpulApiSettings.popup_check_cookie !== "undefined" &&
			tpulApiSettings.popup_check_cookie !== "" &&
			tpulApiSettings.popup_check_cookie !== "0"
		) {
			return true;
		}
		return false;
	}

	function __isGeoLocationTrackingEnabled() {
		if (
			typeof tpulApiSettings !== "undefined" &&
			typeof tpulApiSettings.tpul_geolocation !== "undefined" &&
			tpulApiSettings.tpul_geolocation !== "" &&
			tpulApiSettings.tpul_geolocation !== "0"
		) {
			return true;
		}
		return false;
	}

	function __determinGeoLocation() {
		let coord = {
			lat: "not Tracked",
			long: "not Tracked",
		};

		if (__isGeoLocationTrackingEnabled()) {
			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(
					function (position) {
						// Success callback
						coord = {
							lat: position.coords.latitude,
							long: position.coords.longitude,
						};
						window.tpul_GeoLocationResult = JSON.stringify(coord);
					},
					function (error) {
						// Error callback
						console.error("Error getting geolocation:", error.message);
						coord = {
							lat: "Browser or OS denied",
							long: "Browser or OS denied",
						};
						window.tpul_GeoLocationResult = JSON.stringify(coord);
					}
				);
			} else {
				// Geolocation not supported
				coord = {
					lat: "browser Denied",
					long: "browser Denied",
				};
				window.tpul_GeoLocationResult = JSON.stringify(coord);
			}
		} else {
			// GeoLocationTracking is not enabled
			window.tpul_GeoLocationResult = JSON.stringify(coord);
		}
	}

	function __setAcceptSessionCookkie() {
		Cookies.set("tpul_user_accepted", "true");
	}

	function __getAcceptSessionCookie() {
		let has_user_accepted = Cookies.get("tpul_user_accepted");
		if (
			typeof has_user_accepted !== "undefined" &&
			has_user_accepted == "true"
		) {
			return true;
		}
		return false;
	}

	function __removeAcceptSessionCookie() {
		Cookies.remove("tpul_user_accepted");
	}

	/**
	 * Generate a unique identifier
	 *
	 */
	function __generateVisitorId() {
		return "xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx".replace(
			/[xy]/g,
			function (c) {
				const r = (Math.random() * 16) | 0;
				const v = c === "x" ? r : (r & 0x3) | 0x8;
				return v.toString(16);
			}
		);
	}

	/**
	 * Get and Set current url from cookie
	 */
	function __getAcceptUrl() {
		let tpul_accept_url = Cookies.get("tpul_accept_url");
		if (!tpul_accept_url) {
			tpul_accept_url = window.location.href;
			Cookies.set("tpul_accept_url", tpul_accept_url, {
				expires: 364,
			});
		}
		return tpul_accept_url;
	}

	function __setAcceptUrl() {
		let tpul_accept_url = window.location.href;
		Cookies.set("tpul_accept_url", tpul_accept_url, {
			expires: 364,
		});
	}

	function __removeAcceptUrl() {
		Cookies.remove("tpul_accept_url");
	}

	/**
	 * Get or generate a unique visitor id
	 */
	function __getVisitorId() {
		let tpul_visitor_id = Cookies.get("tpul_visitor_id");
		if (!tpul_visitor_id) {
			tpul_visitor_id = __generateVisitorId();
			Cookies.set("tpul_visitor_id", tpul_visitor_id, {
				expires: 364,
			});
		}
		return tpul_visitor_id;
	}

	function __hasVisitorId() {
		return Cookies.get("tpul_visitor_id") ? true : false;
	}

	function __setLastAcceptedDateCookie() {
		let $currenTime = Math.floor(Date.now() / 1000);
		Cookies.set("tpul_loginpage_cookie_accepted", $currenTime, {
			expires: 364,
		});
		// console.log("cookie set");
		// console.log($currenTime);
	}

	function __getLastAcceptedDateCookie() {
		let has_user_accepted = Cookies.get("tpul_loginpage_cookie_accepted");
		if (typeof has_user_accepted !== "undefined") {
			return has_user_accepted;
		}
		return 0;
	}

	function __removeLastAcceptedDateCookie() {
		Cookies.remove("tpul_loginpage_cookie_accepted");
	}

	function __getLastResetTime() {
		if (
			typeof tpulApiSettings !== "undefined" &&
			typeof tpulApiSettings.tpul_last_reset_ran !== "undefined"
		) {
			return tpulApiSettings.tpul_last_reset_ran;
		}
		return 0;
	}

	function __getUserAccepted() {
		if (
			typeof tpulApiSettings !== "undefined" &&
			typeof tpulApiSettings.user_accepted !== "undefined"
		) {
			return tpulApiSettings.user_accepted;
		}
		return 0;
	}

	function __getUserSessionAccepted() {
		if (
			typeof tpulApiSettings !== "undefined" &&
			typeof tpulApiSettings.user_session_accepted !== "undefined"
		) {
			return tpulApiSettings.user_session_accepted;
		}
		return 0;
	}

	function __getUserTermsAcceptedTimestamp() {
		if (
			typeof tpulApiSettings !== "undefined" &&
			typeof tpulApiSettings.user_terms_accepted_timestamp !== "undefined"
		) {
			return tpulApiSettings.user_terms_accepted_timestamp;
		}
		return 0;
	}

	function __getGeolocation() {
		if (window.tpul_GeoLocationResult) {
			return window.tpul_GeoLocationResult;
		} else {
			let coord = {
				lat: "missing data",
				long: "missing data",
			};
			return JSON.stringify(coord);
		}
	}

	function __resetHappenedSinceLastAccept() {
		let lastAcceptDateInCookie = __getLastAcceptedDateCookie();
		let lastResetTimeHappened = __getLastResetTime();

		console.log("Cookie: " + lastAcceptDateInCookie);
		console.log("Last Reset: " + lastResetTimeHappened);

		if (lastAcceptDateInCookie > lastResetTimeHappened) {
			return false;
		}
		console.log("Reset Happened Since Last Accept");
		return true;
	}

	function __noResetSinceLastAccept() {
		return !__resetHappenedSinceLastAccept();
	}

	function __isVisitorIdUpdatedInDB() {
		let has_user_accepted = Cookies.get("tpul_visitor_id_updated_in_db");
		if (typeof has_user_accepted !== "undefined") {
			if (has_user_accepted == Cookies.get("tpul_visitor_id")) {
				return true;
			}
		}
		return 0;
	}

	function __setVisitorIdUpdatedInDB(visitor_id) {
		Cookies.set("tpul_visitor_id_updated_in_db", visitor_id, {
			expires: 365,
		});
	}

	function __removeVisitorIdUpdatedInDB() {
		Cookies.remove("tpul_visitor_id_updated_in_db");
	}

	/**
	 * -----------------------
	 * END Framework
	 * -----------------------
	 */

	window.TPUL = window.TPUL || {};
	// Add the public functions to the TPUL namespace

	/**
	 * -----------------------ƒ√¸
	 * TPUL Public Functions
	 */
	// Popup type
	window.TPUL.__getPopupType = __getPopupType;
	window.TPUL.__isTestMode = __isTestMode;
	window.TPUL.__isLoginPage = __isLoginPage;
	window.TPUL.__isPopupSavesCookie = __isPopupSavesCookie;
	window.TPUL.__shouldPopupCheckCookie = __shouldPopupCheckCookie;
	// User
	window.TPUL.__isUserLoggedIn = __isUserLoggedIn;
	window.TPUL.__getUserAccepted = __getUserAccepted;
	window.TPUL.__getUserSessionAccepted = __getUserSessionAccepted;
	window.TPUL.__getUserTermsAcceptedTimestamp = __getUserTermsAcceptedTimestamp;
	// GeoLocation
	window.TPUL.__isGeoLocationTrackingEnabled = __isGeoLocationTrackingEnabled;
	window.TPUL.__determinGeoLocation = __determinGeoLocation;
	window.TPUL.__getGeolocation = __getGeolocation;
	// Acceptance Cookie for session
	window.TPUL.__setAcceptSessionCookkie = __setAcceptSessionCookkie;
	window.TPUL.__getAcceptSessionCookie = __getAcceptSessionCookie;
	window.TPUL.__removeAcceptSessionCookie = __removeAcceptSessionCookie;
	// Unique Visitor ID
	window.TPUL.__generateVisitorId = __generateVisitorId;
	window.TPUL.__getVisitorId = __getVisitorId;
	window.TPUL.__hasVisitorId = __hasVisitorId;
	// Last Accepted Date Cookie
	window.TPUL.__setLastAcceptedDateCookie = __setLastAcceptedDateCookie;
	window.TPUL.__getLastAcceptedDateCookie = __getLastAcceptedDateCookie;
	window.TPUL.__removeLastAcceptedDateCookie = __removeLastAcceptedDateCookie;
	// Accept URL
	window.TPUL.__setAcceptUrl = __setAcceptUrl;
	window.TPUL.__getAcceptUrl = __getAcceptUrl;
	window.TPUL.__removeAcceptUrl = __removeAcceptUrl;
	// Reset
	window.TPUL.__getLastResetTime = __getLastResetTime;
	window.TPUL.__resetHappenedSinceLastAccept = __resetHappenedSinceLastAccept;
	window.TPUL.__noResetSinceLastAccept = __noResetSinceLastAccept;
	// Visitor ID if its in DB or not
	window.TPUL.__isVisitorIdUpdatedInDB = __isVisitorIdUpdatedInDB;
	window.TPUL.__setVisitorIdUpdatedInDB = __setVisitorIdUpdatedInDB;
	window.TPUL.__removeVisitorIdUpdatedInDB = __removeVisitorIdUpdatedInDB;
})(jQuery);
