jQuery(document).ready(function($) {
	if ($('#lookup-result').length) {
		$('html, body').animate({
			scrollTop: $('#ip-lookup').offset().top - 50
		}, 100);
	}

	$('#btn-get-started').on('click', function(e) {
		e.preventDefault();

		$('#modal-get-started').css('display', 'none');
		$('#modal-step-1').css('display', 'block');
	});

	$('#setup_token').on('input', function() {
		$('#btn-to-step-2').prop('disabled', !($(this).val().length == 64));
	});

	$('#btn-to-step-2').on('click', function(e) {
		e.preventDefault();

		var $btn = $(this);

		$('#token_status').html('<span class="dashicons dashicons-update spin"></span> Validating download token...');
		$btn.prop('disabled', true);

		$.post(ajaxurl, { action: 'ip2location_tags_validate_token', token: $('#setup_token').val() }, function(response) {
			if (response == 'SUCCESS') {
				$('#token_status').html('<span class="dashicons dashicons-yes-alt"></span> Download token is valid.</div>');

				$('#modal-step-1').css('display', 'none');
				$('#modal-step-2').css('display', 'block');
				$('#btn-to-step-3').prop('disabled', true);

				$('#ip2location_download_status').html('<span class="dashicons dashicons-update spin"></span> Downloading IP2Location database...');

				$.post(ajaxurl, { action: 'ip2location_tags_download_database', database: 'DB1' }, function(response) {
					if (response == 'SUCCESS') {
						$('#ip2location_download_status').html('<span class="dashicons dashicons-yes-alt"></span> IP2Location database successfully downloaded.</p></div>');

						$('#btn-to-step-3').prop('disabled', false);
					} else {
						$('#ip2location_download_status').html('<span class="dashicons dashicons-warning"></span>' + response);
					}
				}).always(function() {
					$('#btn-to-step-1').prop('disabled', false);
				});
			}
			else {
				$('#token_status').html('<span class="dashicons dashicons-warning"></span>' + response);
			}
		}).always(function() {
		});
	});

	$('#btn-to-step-1').on('click', function(e) {
		e.preventDefault();

		$('#modal-step-1').css('display', 'block');
		$('#modal-step-2').css('display', 'none');
		$('#btn-to-step-2').prop('disabled', false);
	});

	$('#btn-back-to-step-2').on('click', function(e) {
		e.preventDefault();

		$('#modal-step-2').css('display', 'block');
		$('#modal-step-3').css('display', 'none');
	});

	$('#btn-to-step-3').on('click', function(e) {
		e.preventDefault();

		$('#modal-step-3').css('display', 'block');
		$('#modal-step-2').css('display', 'none');
	});
});