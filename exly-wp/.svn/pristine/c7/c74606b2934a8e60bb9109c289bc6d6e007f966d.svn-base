(function( $) {
	'use strict';
	// On Page Load
	$(function() {
		function validate_key_callback() {
			$('.key_validation_response').empty();
			var ajax_nonce=$('#nounceKey').val();
			var license_key=$('#wp_exly_license_key').val();
			var loadingImage=WPEXLY.loading_url;
			var $button=$('#validateKey');
			$button.addClass('disabled').after('<div class="load-spinner"><img src="'+loadingImage+'" /></div>');
			var data= {
				action: 'validate_license_key', security: ajax_nonce, licenseKey: license_key
			}
			;
			if(license_key) {
				$.ajax( {
					url: ajaxurl, data:data, type: 'post', dataType: 'json', success: function(response) {
						$button.removeClass('disabled');
						$('.load-spinner').remove();
						if(response.valid===true) {
							$('.key_validation_response').html('<p>'+response.msg+'</p>');
							$('.key_validation_response').removeClass('errorKey').addClass('success');
						}
						else {
							$('.key_validation_response').html('<p>'+response.msg+'</p>');
							$('.key_validation_response').removeClass('success').addClass('errorKey');
						}
					}
				});
			}
			else {
				$button.removeClass('disabled');
				$('.load-spinner').remove();
				$('.key_validation_response').html('<p>Please enter the license key.</p>');
				$('.key_validation_response').removeClass('success').addClass('errorKey');
			}
		}
		validate_key_callback();
		$('#validateKey').click(function() {
			validate_key_callback();
		}
		);
	}
	);
}

)( jQuery);