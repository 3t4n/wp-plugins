/**
 * Accommodation Multi Property Booking Page
 */
var iBexBookingFrameController = {	
	/*jshint forin: true, noarg: true, noempty: true, eqeqeq: true, bitwise: true, strict: true, undef: true, unused: true, curly: true, camelcase: true, plusplus: true, regexp: true, asi: false, multistr: false, maxerr: 50, white: false, smarttabs: false, browser: true, devel: false, jquery: true */
	
	/*global ibOperatorID: false, ibPropID: false, ibMsgAgentURL: false */

	/**
	 * Get a parameter from the URL, or the entire query string (sans-?) if no key is passed in
	 * @param string key
	 * @return string
	 */
	getURLParam: function(key){
		"use strict";
	
		if(typeof key === 'undefined'){
			var param = window.location.href.indexOf('?');
			return param < 0 ? '' : window.location.href.substr(param);
		}
		else {
			key = key.replace(/[\[]/,"\\[").replace(/[\]]/,"\\]");
			var regexS = "[\\?&]" + key + "=([^&#]*)",
				regex = new RegExp( regexS ),
				results = regex.exec( window.location.href );
				
			return (typeof results === 'undefined' || results === null || results.length === 0) ? '' : results[1];
		}
	},
	
	/**
	 * Check if the browser is a Safari browser
	 * @return boolean
	 */
	isSafariBrowser: function(){
		"use strict";
		
		var isSafari = (navigator.userAgent.indexOf("Safari") > -1),
			isChrome = (navigator.userAgent.indexOf("Chrome") > -1);
		
		if (isChrome && isSafari){
			isSafari = false;
		}
		
		if(!isSafari){
			// Check for firefox
			if(navigator.userAgent.indexOf("Firefox") > -1){
				// Check for >= 22
				var version = navigator.userAgent.match(/Firefox\/(\d+)/i);
				if(version[1] !== undefined && parseFloat(version[1]) >= 22){
					return true;
				}
			}
		}
		
		return isSafari;
	},
	
	/**
	 * Execute Function, this loads the booking page source
	 */
	run: function(bookingFrameId, ibOperatorID, ibRU, ibMsgAgentURL){
		"use strict";

		var queryString = this.getURLParam(),
			bookURL;
		
		// Build the booking page URL based on the query string
		if(queryString.length > 0 && this.getURLParam('op').length > 0){
			bookURL = 'http://ibex.seekom.com/accommodation/PropertySearch.php' + queryString;
		}
		else {
			bookURL = 'http://ibex.seekom.com/accommodation/PropertySearch.php?reset=true&op=' + ibOperatorID;
			if(ibRU != undefined){
				bookURL += '&ru=' + ibRU;
			}
			
			bookURL += '&' + queryString;
		}
		
		bookURL +=  '&hostma=' + window.escape(ibMsgAgentURL);
		
		// Load the booking page
		bookingFrameId = (bookingFrameId.length === 0) ? "multiBookingPage" : bookingFrameId;
		
		// Safari iframe fixed
		if(this.isSafariBrowser() && this.getURLParam('redirect').length === 0){
			
			var safariFixURL = 'http://ibex.seekom.com/accommodation/distributions/safari_cookie_fix.php',
				redirectUrl = encodeURIComponent(location.href);
			
			window.location = safariFixURL + '?url=' + redirectUrl;
		}
		else if(typeof _gaq !== 'undefined' && typeof _gat !== 'undefined'){
			// Allow for GA support
			var pageTracker = _gat._getTrackerByName();
			bookURL = pageTracker._getLinkerUrl(bookURL);
		}
		
		document.getElementById(bookingFrameId).src = bookURL;
	}
};

// Actual execution function
jQuery(document).ready(function($) {
	
	// Make sure the JS is up to date works
	if(typeof $().data != 'function'){
		alert('The jQuery version used in your website is out of date.');
		return;
	}
	
    // $() will work as an alias for jQuery() inside of this function
	$('.ibw-shortcode.ibw-multi-bookingpage').each(function(i,v){
		var bookingPageDiv = $(this),
			globalConfig = $('meta#ibw-config').data('config'),
			thisConfig = bookingPageDiv.data('ibexparams'),
			iFrameID = 'ibw-multibooking-' + (i + 1);
		
		$(this).append('<iframe id="' + iFrameID + '" class="multiBookingPage" onload="iBexFrame.SetHeight(this)" src="" width="' + thisConfig.width + '" height="' + thisConfig.height + '" scrolling="auto" style="border: none; overflow-y: auto;"></iframe>');
		
		iBexBookingFrameController.run(iFrameID, globalConfig.operator, thisConfig.ru, globalConfig.msgagent);
	});
});