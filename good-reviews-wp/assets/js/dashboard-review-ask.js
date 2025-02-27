jQuery(document).ready(function($) {
	jQuery('.grfwp-main-dashboard-review-ask').css('display', 'block');

  jQuery(document).on('click', '.grfwp-main-dashboard-review-ask .notice-dismiss', function(event) {

  	var params = {
			ask_review_time: '7',
			nonce: grfwp_review_ask.nonce,
			action: 'grfwp_hide_review_ask'
		};

		var data = jQuery.param( params );

    jQuery.post(ajaxurl, data, function() {});
  });

	jQuery('.grfwp-review-ask-yes').on('click', function() {

		jQuery('.grfwp-review-ask-feedback-text').removeClass('grfwp-hidden');
		jQuery('.grfwp-review-ask-starting-text').addClass('grfwp-hidden');

		jQuery('.grfwp-review-ask-no-thanks').removeClass('grfwp-hidden');
		jQuery('.grfwp-review-ask-review').removeClass('grfwp-hidden');

		jQuery('.grfwp-review-ask-not-really').addClass('grfwp-hidden');
		jQuery('.grfwp-review-ask-yes').addClass('grfwp-hidden');

		var params = {
			ask_review_time: '7',
			nonce: grfwp_review_ask.nonce,
			action: 'grfwp_hide_review_ask'
		};

		var data = jQuery.param( params );

		jQuery.post(ajaxurl, data, function() {});
	});

	jQuery('.grfwp-review-ask-not-really').on('click', function() {

		jQuery('.grfwp-review-ask-review-text').removeClass('grfwp-hidden');
		jQuery('.grfwp-review-ask-starting-text').addClass('grfwp-hidden');

		jQuery('.grfwp-review-ask-feedback-form').removeClass('grfwp-hidden');
		jQuery('.grfwp-review-ask-actions').addClass('grfwp-hidden');

		var params = {
			ask_review_time: '1000',
			nonce: grfwp_review_ask.nonce,
			action: 'grfwp_hide_review_ask'
		};

		var data = jQuery.param( params );

		jQuery.post(ajaxurl, data, function() {});
	});

	jQuery('.grfwp-review-ask-no-thanks').on('click', function() {

		var params = {
			ask_review_time: '1000',
			nonce: grfwp_review_ask.nonce,
			action: 'grfwp_hide_review_ask'
		};

		var data = jQuery.param( params );

		jQuery.post(ajaxurl, data, function() {});

    jQuery('.grfwp-main-dashboard-review-ask').css('display', 'none');
	});

	jQuery('.grfwp-review-ask-review').on('click', function() {

		jQuery('.grfwp-review-ask-feedback-text').addClass('grfwp-hidden');
		jQuery('.grfwp-review-ask-thank-you-text').removeClass('grfwp-hidden');

		var params = {
			ask_review_time: '1000',
			nonce: grfwp_review_ask.nonce,
			action: 'grfwp_hide_review_ask'
		};

		var data = jQuery.param( params );

		jQuery.post(ajaxurl, data, function() {});
	});

	jQuery('.grfwp-review-ask-send-feedback').on('click', function() {

		var feedback = jQuery('.grfwp-review-ask-feedback-explanation textarea').val();
		var email_address = jQuery('.grfwp-review-ask-feedback-explanation input[name="feedback_email_address"]').val();

		var params = {
			feedback: feedback,
			email_address: email_address,
			nonce: grfwp_review_ask.nonce,
			action: 'grfwp_send_feedback'
		};

		var data = jQuery.param( params );

		jQuery.post(ajaxurl, data, function() {});

    var params = {
			ask_review_time: '1000',
			nonce: grfwp_review_ask.nonce,
			action: 'grfwp_hide_review_ask'
		};

		var data = jQuery.param( params );

		jQuery.post(ajaxurl, data, function() {});

    jQuery('.grfwp-review-ask-feedback-form').addClass('grfwp-hidden');
    jQuery('.grfwp-review-ask-review-text').addClass('grfwp-hidden');
    jQuery('.grfwp-review-ask-thank-you-text').removeClass('grfwp-hidden');
	});
});