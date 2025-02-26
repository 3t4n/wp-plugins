(function($) {
	"use strict";
	$(function() {
		jQuery('.paradiso-bottom-sso, .paradiso-top-sso').click(function() {
		    var nonce = ai_media_studio_ajax_object.nonce;
		    jQuery.ajax({
		        url: ai_media_studio_ajax_object.ajax_url,
		        type: 'POST',
		        data: {
		            action: 'paradiso_ai_redirect_ajax',
		            nonce: nonce
		        },
		        success: function(response) {
	                if ( response.success ) {
	                	window.open(response.data.redirect_url, '_blank');
	                } else {
	                    alert( response.data );
	                }
	            },
	            error: function(xhr, status, error) {
	                alert( 'Error: ' + error );
	            }
		    });
		});
	});
})(jQuery);