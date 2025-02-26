/**
 * Logic for behavior inside PD_Main_Iframe; this includes:
 * - Creating an instance of AdQuireLoader within the iframe
 * - Retrieving PDregData from sessionStorage
 * - Merging seperate DOB (month/day/year) fields into one DOB field
 * - If PDregData does not exist; create it as an object
 */
window.AdQuireConfigs = parent.AdQuireConfigs;
window.PDregData = {};

(function() {
	function getRegData() {
		var data = {};
		try {
			var sessionRegData = window.sessionStorage.getItem('PD_RegData');

			if (sessionRegData) {
				data = JSON.parse(sessionRegData);
				if (typeof data !== 'object') {
					data = {};
				}
				if (!data.dob && data.dob_day && data.dob_month && data.dob_year) {
					data.dob = data.dob_month + '-' + data.dob_day + '-' + data.dob_year;
				}
			}
		} catch (e) {
			data = {};
		}
		return data;
	}
	window.PDregData = getRegData();
})();

PD_AdQuireLoader(window.AdQuireConfigs);

/**
 * Prevent redirection in iframe, redirect at parent page
 */
setInterval(function() {
	if (oAdQuireLoader.objGlobal.isTerminated &&
		typeof objConfigs.General.RedirectUrl === 'string' &&
		objConfigs.General.RedirectUrl !== ''
	) {
		window.top.location.href = objConfigs.general.RedirectUrl;
		objConfigs.general.RedirectUrl = false;
	}
}, 200);

/**
 * PD Logo redirects users to the AdQuire Plugin page on Wordpress.org
 */
setTimeout(function() {
	document.getElementById("PD_PoweredBy").onclick = function() {
		window.top.location.href = 'https://wordpress.org/plugins/adquire/';
	}
}, 1000);
