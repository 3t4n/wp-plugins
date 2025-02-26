(function( $ ) {
	'use strict';

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

	$(function() {
		$( ".select-all" ).click(function(e) {
	        $('.container-checkbox input[type="checkbox"]').prop('checked', true);
	    });

	    $( ".clear-all" ).click(function(e) {
	        $('.container-checkbox input[type="checkbox"]').prop('checked', false);
	    });
		
		$("#rwut_message .notice-dismiss").click(function(e){
	    	$("#rwut_message").slideDown();
	    });
	    setTimeout(function(){
	    	$("#rwut_message").slideUp();
	    }, 8000);

	    $( "#restrict_wp_form button.btn-submit" ).click(function(e) {
		    var fields = $("input[type='checkbox']").serializeArray(); 
		    if (fields.length === 0) {
		        alert('Please select any one Mime type!');
		        return false;
		    }
			$(this).next().css({"visibility": "visible", "opacity": "1"});
		});
	});

})( jQuery );
