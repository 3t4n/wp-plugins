(function( $ ) {
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
	 $( window ).load(function() {
	  // Quantity updater on product single page
	  $("form.cart").on("click", "button.plus, button.minus", function () {
		// Get current quantity values
		var qty = $(this).parent().find(".qty");
		var val = parseFloat(qty.val());
		var max = parseFloat(qty.attr("max"));
		var min = parseFloat(qty.attr("min"));
		var step = parseFloat(qty.attr("step"));

		// Change the value if plus or minus
		if ($(this).is(".plus")) {
		  if (max && max <= val) {
			qty.val(max);
		  } else {
			qty.val(val + step);
		  }
		} else {
		  if (min && min >= val) {
			qty.val(min);
		  } else if (val > 1) {
			qty.val(val - step);
		  }
		}
	  });
	 });

})( jQuery );
