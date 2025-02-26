//Reset License
jQuery(document).ready(function($) {
	$('#rankology_fno_license_reset').on('click', function() {
		$.ajax({
			method : 'GET',
			url : rankologyAjaxResetLicense.rankology_request_reset_license,
			data : {
				action: 'rankology_request_reset_license',
				_ajax_nonce: rankologyAjaxResetLicense.rankology_nonce,
			},
			success : function( data ) {
				var url_location = data.data.url;
				if ($(location).attr('href') == url_location) {
					window.location.reload(true);
				} else {
					$(location).attr('href',url_location);
				}
			},
		});
	});
	$('#rankology_fno_license_reset').on('click', function() {
		$(this).attr("disabled", "disabled");
		$( '.spinner2' ).css( "visibility", "visible" );
		$( '.spinner2' ).css( "float", "none" );
	});
});