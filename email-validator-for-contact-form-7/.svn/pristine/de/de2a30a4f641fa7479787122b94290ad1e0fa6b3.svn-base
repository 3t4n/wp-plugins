jQuery(document).ready(function($) {
	$('#email-validator-for-contact-form-7-feedback-modal').dialog({
		title: 'Quick Feedback',
		dialogClass: 'wp-dialog',
		autoOpen: false,
		draggable: false,
		width: 'auto',
		modal: true,
		resizable: false,
		closeOnEscape: false,
		position: {
			my: 'center',
			at: 'center',
			of: window
		},
				
		open: function() {
			$('.ui-widget-overlay').bind('click', function() {
				$('#email-validator-for-contact-form-7-feedback-modal').dialog('close');
			});
		},
			
		create: function() {
			$('.ui-dialog-titlebar-close').addClass('ui-button');
		},
	});

	$('.deactivate a').each(function(i, ele) {
		if ($(ele).attr('href').indexOf('email-validator-for-contact-form-7') > -1) {
			$('#email-validator-for-contact-form-7-feedback-modal').find('a').attr('href', $(ele).attr('href'));

			$(ele).on('click', function(e) {
				e.preventDefault();

				$('#email-validator-for-contact-form-7-feedback-response').html('');
				$('#email-validator-for-contact-form-7-feedback-modal').dialog('open');
			});

			$('input[name="email-validator-for-contact-form-7-feedback"]').on('change', function(e) {
				if($(this).val() == 4) {
					$('#email-validator-for-contact-form-7-feedback-other').show();
				} else {
					$('#email-validator-for-contact-form-7-feedback-other').hide();
				}
			});

			$('#email-validator-for-contact-form-7-submit-feedback-button').on('click', function(e) {
				e.preventDefault();

				$('#email-validator-for-contact-form-7-feedback-response').html('');

				if (!$('input[name="email-validator-for-contact-form-7-feedback"]:checked').length) {
					$('#email-validator-for-contact-form-7-feedback-response').html('<div style="color:#cc0033;font-weight:800">Please select your feedback.</div>');
				} else {
					$(this).val('Loading...');
					$.post(ajaxurl, {
						action: 'email_validator_for_contact_form_7_submit_feedback',
						feedback: $('input[name="email-validator-for-contact-form-7-feedback"]:checked').val(),
						others: $('#email-validator-for-contact-form-7-feedback-other').val(),
					}, function(response) {
						window.location = $(ele).attr('href');
					}).always(function() {
						window.location = $(ele).attr('href');
					});
				}
			});
		}
	});
});