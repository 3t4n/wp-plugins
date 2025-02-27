(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
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
        // Quantity updater on Cart page - This will change the quantity and update the cart through ajax
		var timeout;
	    
		$(document).on("click", "button.plus, button.minus", function () {
    	    
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
        
	       	clearTimeout(timeout);
		
			var timeToWait = 500;
        
        	timeout = setTimeout(function () {
        	  $("[name=update_cart]").prop("disabled", false);
        	  $("[name=update_cart]").prop("aria-disabled", false);
        	  $("[name=update_cart]").trigger("click");
        	}, timeToWait); // 1 second delay, half a second (500) seems comfortable too
          });
      });

})( jQuery );