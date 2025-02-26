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

	jQuery(document).ready(function() {
		
		let ajaxurl = socialmediaajaxurl.ajaxurl;

        jQuery('#insert_links_form').submit(function(){
               
             let links_data = "action=admin_ajax_request&param=add_links&" + jQuery('#insert_links_form').serialize();
             jQuery.post(ajaxurl, links_data, function(response){
				let success = jQuery.parseJSON(response);

				if (success.status == 1) {					
					//show initially
					$("#succ-msg").show();
										
					setTimeout(function() {
						$("#succ-msg").hide('slow');
					}, 2000); //hide is 2 seconds
				}
				
            });
        })
});

})( jQuery );
