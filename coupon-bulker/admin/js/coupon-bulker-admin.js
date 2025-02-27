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
        
        //where this need to be? add_thickbox();
        
        $(function() {
            //for generate ajax 
            $("#coupon_bulk_generate").on("click", null, function(){

                var num_of_coupons = $("#bulker_num").val();
                var num_of_random_chars = Math.ceil(Math.log(num_of_coupons)/Math.log(26)) + 2;
                console.log("Will use: "+ num_of_random_chars + " random chars...");//minimum 26^x options

                var data = {
                    'action': 'coupon_bulker_ajax_endpoint',
                    'fn': 'bulk_coupon_generate',
                    'coupon_id': $(this).data("id"),
                    'code_prefix' : $("#code_prefix").val(),
                    'num_of_coupons' : $("#bulker_num").val(),
                    'num_of_random_chars' : num_of_random_chars
                };
                // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
		        jQuery.post(ajaxurl, data, {})
                    .done(function(response) {
                        var response_obj = JSON.parse(response);
                        alert(response_obj.message);
                        $("#coupon_bulker_csv").html(response_obj.data.csv_link);
                        //parent.tb_remove();
                    })
                    .fail(function (error){
                        alert("Error: "+error);       
                    });;
                
            });
            
            //for delete ajax
            $("#coupon_bulk_delete").on("click", null, function(){
                var data = {
                    'action': 'coupon_bulker_ajax_endpoint',
                    'fn': 'bulk_coupon_delete',
                    'coupon_id': $(this).data("id"),
                    'code_prefix' : $("#code_prefix").val()
                };
                // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
		jQuery.post(ajaxurl, data, {})
                    .done(function(response) {
                        //alert(JSON.stringify(response));
                        var response_obj = JSON.parse(response);
                        alert(response_obj.message);
                        $("#coupon_bulker_csv").html(response_obj.data.csv_link);
                        //parent.tb_remove();
                    })
                    .fail(function (error){
                        alert("Error: "+error);       
                    });

            });
	});
         
         

})( jQuery );
