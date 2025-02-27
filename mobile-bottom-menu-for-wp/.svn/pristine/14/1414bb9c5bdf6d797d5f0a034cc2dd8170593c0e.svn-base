(function ($) {
	'use strict';

	$(document).ready(function () {

		setTimeout(function() {
			// Prevent Codestar image click for skins.
			$('.premade_skins').find('.csf--sibling').unbind( 'click' );

			// Import skin.
			$('.premade_skins .csf--image').click(function (event) {
				event.preventDefault();

				if (confirm(wp_bnav_messages.skin_change_confirmation_alert) === true) {
					var skin = $(this).find('input').val();
				
					$.ajax({
						type: 'POST',
						url: wp_bnav.ajaxurl,
						data: {
							'action': wp_bnav.action,
							'nonce': wp_bnav.nonce,
							'skin': skin,
						},
						success: function (data) {
							if (data['status'] === 'success') {
								alert(wp_bnav_messages.skin_change_alert);
								window.location.reload();
							} else {
								alert(data['message']);
							}
						}
					});
				}
			});
		}, 1000);

		// Attach click event handler to the install Plugin
		$('.wp-bnav-custom-landing-install-btn').on('click', function(e) {
			e.preventDefault();
	
			let $button = $(this);
			$button.prop('disabled', true);
			$button.find('.wp-bnav-custom-landing-install-btn-txt').text('Installing...');
			let targetUrl = $button.data('target-url');
	
			$.ajax({
				url: Wp_Bnav_custom_plugin_install_obj.ajax_url,
				type: 'POST',
				data: {
					action: 'Wp_Bnav_custom_plugin_install',
					nonce: Wp_Bnav_custom_plugin_install_obj.nonce
				},
				success: function(response) {
					$button.prop('disabled', false);
					$button.find('.wp-bnav-custom-landing-install-btn-txt').text('Plugin Activated');
					// Redirect to the specified URL after a short delay
					setTimeout(function() {
						window.location.href = targetUrl;
					}, 1000);
				},
				error: function() {
					alert('An error occurred during the installation process.');
					$button.prop('disabled', false);
					$button.find('.wp-bnav-custom-landing-install-btn-txt').text('Install Ai Alt Text - Free');
				}
			});
		});

	});

})(jQuery);