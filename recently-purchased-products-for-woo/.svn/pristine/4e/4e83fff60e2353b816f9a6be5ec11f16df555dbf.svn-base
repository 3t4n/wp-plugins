(function ($) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */
	jQuery(document).ready(function ($) {
		

		$(document).on('change', '.show_in_slider', function (e) {
			e.preventDefault();

			var $this = jQuery(this);
			var show_in_slider = $(this).find('option:selected').val();
			console.log('show_in_slider '+show_in_slider);
			if (show_in_slider == "Yes") {
				jQuery('.show_item').fadeIn();
			} else {
				jQuery('.show_item').fadeOut();
			}
		});

		$(window).load(function() {

		 	setTimeout(function() {
			 	var check_slider = jQuery('.show_in_slider').find('option:selected').val();
				if (check_slider == "Yes") {
					jQuery('.show_item').fadeIn();
				} else {
					jQuery('.show_item').fadeOut();
				}

		 	}, 2000);
		});


	});


})(jQuery);