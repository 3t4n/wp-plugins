(function ($) {
	'use strict';

	/**
	 * All of the code for this plugin public-facing JavaScript source
	 * should reside in this file.
	 */
	var startProductBarPos = -1;
	window.onscroll = function () {
		
		var WPASWidget = document.querySelector('[id^="wpas_editorial_rating_widget"]');
		var barTopWidth = WPASWidget.parentElement.clientHeight;
		if (startProductBarPos < 0) startProductBarPos = findPosY(WPASWidget);

		// Set media query.
		var mediaQueryY = window.matchMedia("(min-width: 922px)");

		// Match up element position and media query.
		if (pageYOffset > startProductBarPos && mediaQueryY.matches) {

			WPASWidget.style.position = 'fixed';
			WPASWidget.style.top = '20px';
			WPASWidget.style.width = barTopWidth + 'px';
		} else {

			WPASWidget.style.position = 'relative';
		}

		// Get data-stickyDisable value.
		var stickyDisable = WPASWidget.querySelector('.wpas--rating-widget-wrap').dataset.stickydisable;

		// If the scroll position at to bottom of the window + 300 px up.
		if ( (window.innerHeight + window.scrollY + 300) >= document.body.offsetHeight && 'true' == stickyDisable) {

			WPASWidget.style.display = 'none';
		} else {

			WPASWidget.style.display = 'block';
		}
	};

	// Custom method to getting position of an element.
	function findPosY(obj) {
		var curtop = 0;
		if (typeof (obj.offsetParent) != 'undefined' && obj.offsetParent) {
			while (obj.offsetParent) {
				curtop += obj.offsetTop;
				obj = obj.offsetParent;
			}
			curtop += obj.offsetTop;
		}
		else if (obj.y)
			curtop += obj.y;
		return curtop;
	}

})(jQuery);