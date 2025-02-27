(function( $ ) {
	'use strict';

    jQuery(document).on('click', '#validate-token-button', function (e) {
		e.preventDefault();
		
		var input_token = jQuery('#user_token').val();

        var data = {
			action: "save_user_token",
			token: input_token
		  };

		jQuery
		.post(ajaxurl, data, function () {})
		.done(function (results) {
			jQuery('.ee-field-description').html('Token was saved successfully.');
		});

	});
	
})( jQuery );
