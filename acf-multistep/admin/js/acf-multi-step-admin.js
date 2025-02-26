(function( $ ) {
	'use strict';

	$(document).ready( function() {

		// check current field type step
		var mask = '.field_form_mask .field_form table tbody';

		$(document).on('click', mask + ' tr.field_type td select', function() {

			var multi_steps = $('.field[data-type="multi_steps"]').length;

			$(this).find('optgroup[label="Layout"] option[value="multi_steps"]').removeAttr('disabled','disabled');
			if ( multi_steps >= 2) {
				$(this).find('optgroup[label="Layout"] option[value="multi_steps"]').attr('disabled','disabled');
			}
		});

	})

	/**
	 * All of the code for your admin-facing JavaScript source
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

})( jQuery );
