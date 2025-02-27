
jQuery(document).ready(function($) {
	
	jQuery('#hbagency_registration_button').click(function(event) {
		event.preventDefault();
		var data = {
			'action': 'hb_register',
			'website_id': jQuery('#hbagency_website_id').val(),
			'hb_nonce': $('#hb_nonce').val()
		};

		jQuery.post(ajaxurl, data, function(jsonResponse) {
			if(jsonResponse.status_code === 'KO') {
				jQuery('#hbagency_registration_message').text(jsonResponse.payload);
				return;
			} 
			
			jQuery('#hbagency_registration_message').text(jsonResponse.payload);
			location.reload();
			
		}, "json");
	});
});

