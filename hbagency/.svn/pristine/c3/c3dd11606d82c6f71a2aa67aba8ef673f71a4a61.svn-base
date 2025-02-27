
function hbagency_showSection(section) {
	jQuery('.navbar-nav').find('.active').removeClass('active');
	jQuery(section).parent().addClass('active');
	jQuery('#SECTION-TITLE').text(jQuery(section).text());
	
	jQuery('.content').hide();
	jQuery(jQuery(section).attr('href')).show();
	
}

function hbagency_refreshStatus() {
	var data = {
		'action': 'hb_refresh',
	};
	
	jQuery.post(ajaxurl, data, function(jsonResponse) {
		if(jsonResponse.status_code === 'KO') {
			return;
		} 
		
		location.reload();	
	}, "json");

	return false;
}

jQuery(document).ready(function($) {
	jQuery(".menuLink").on('click', function (e) {
		 e.preventDefault();
	  	hbagency_showSection(this);
	});
	
	if(window.location.href.endsWith("#placements")) {
	  hbagency_showSection('#placements-menu');
	}
	
	$('#additionalAdsTxtLines').prop( "disabled", !$('#hb_enable_ads_txt').prop('checked'));
	jQuery('#hb_enable_ads_txt').change(function() {
		$('#additionalAdsTxtLines').prop( "disabled", !this.checked);
	});

	jQuery('#hbagency_save_settings_button').click(function(event) {
		event.preventDefault();
		var data = {
			'action': 'hb_save_settings',
			'additionalAdsTxtLines': jQuery('#additionalAdsTxtLines').val(),
			'hb_enable_cmp': jQuery('#hb_enable_cmp').prop('checked'),
			'hb_enable_ads_txt': jQuery('#hb_enable_ads_txt').prop('checked'),
			'hb_enable_cls': jQuery('#hb_enable_cls').prop('checked'),
			'hb_nonce': jQuery('#hb_nonce').val()
		};

		jQuery.post(ajaxurl, data, function(jsonResponse) {
			if(jsonResponse.status_code === 'KO') {
				jQuery('#hbagency_save_settings_message').removeClass('text-success');
				jQuery('#hbagency_save_settings_message').addClass('text-danger');
				if(jsonResponse.payload.startsWith('ADS_TXT_VALIDATION_ERROR')) {
					jQuery('#hbagency_save_settings_message').text(strings_messages.ads_txt_not_valid + jsonResponse.payload.substr(jsonResponse.payload.indexOf('-') + 1));
				} else {
					jQuery('#hbagency_save_settings_message').text(strings_messages.operation_response_fail);
				}
				return;
			} 
			
			jQuery('#hbagency_save_settings_message').removeClass('text-danger');
			jQuery('#hbagency_save_settings_message').addClass('text-success');
				
			jQuery('#hbagency_save_settings_message').text(strings_messages.operation_response_success);
		}, "json");
	});
	
	jQuery('#hbagency_reload_placements').click(function(event) {
		event.preventDefault();
		var data = {
			'action': 'hb_reload_placements',
			'hb_reload_nonce': jQuery('#hb_reload_nonce').val()
		};

		jQuery.post(ajaxurl, data, function(jsonResponse) {
			if(jsonResponse.status_code === 'KO') {
				jQuery('#hbagency_reload_placements_message').removeClass('text-success');
				jQuery('#hbagency_reload_placements_message').addClass('text-danger');
				jQuery('#hbagency_reload_placements_message').text(strings_messages.operation_response_fail);
				return;
			}
			if(!window.location.href.endsWith("#placements")) {
				window.location.href += "#placements";
			}
			location.reload();
			
		}, "json");
	});
	
	jQuery('#hbagency_save_placements_settings').click(function(event) {
		event.preventDefault();
		var data = {
			'action': 'hb_save_placements',
			'data': JSON.stringify(jQuery('#hb_placements_form').serializeArray()),
			'hb_placement_nonce': jQuery('#hb_placement_nonce').val()
		};

		jQuery.post(ajaxurl, data, function(jsonResponse) {
			if(jsonResponse.status_code === 'KO') {
				jQuery('#hbagency_save_settings_message').removeClass('text-success');
				jQuery('#hbagency_save_settings_message').addClass('text-danger');

				jQuery('#hbagency_placements_message').text(strings_messages.operation_response_fail);
				return;
			} 

			jQuery('#hbagency_placements_message').removeClass('text-danger');
			jQuery('#hbagency_placements_message').addClass('text-success');

			jQuery('#hbagency_placements_message').text(strings_messages.operation_response_success);
		}, "json");
	});
	
});
