(function ( $ ) {
	"use strict";
	$(function () {

		// open new window in popup
		$('.new_wix_window').on('click', function(e) {
			e.preventDefault();
			window.open($(this).attr('href'), '', "top=0,left=0,height=920,width=1020,scrollbars=1,resizable=1");
		});

		// setup our color picker
		$('.wp-color-picker').wpColorPicker();

		// hide message on button click
		$('.message-container button').on('click', function(e) {
			e.preventDefault();
			$(this).closest('.message-container').slideUp('fast');
		});

		// toggle form view
		$('.show-sign-in').on('click', function(e) {
			e.preventDefault();
			$('.signup-container').fadeOut(100, function() {
				$('.sign-in-container').fadeIn(100);
			});
		});
		// toggle form view
		$('.show-signup').on('click', function(e) {
			e.preventDefault();
			$('.sign-in-container').fadeOut(100, function() {
				$('.signup-container').fadeIn(100);
			});
		});

		/* handle our options form submit via ajax */
		$('.ajax-submit').on('submit', function(e) {
			e.preventDefault();
			var $this = $(this);
			var $button = $this.find('.submit-button');
			$.ajax({
				url: $this.attr('action'),
				type: 'GET',
				dataType: 'jsonp',
				jsonpCallback: 'callback',
				crossDomain: true,
				data: $this.serialize(),
				beforeSend: function() {
					$button.data('initialValue', $button.val());
					$button.val($button.attr('data-loading-text')).prop('disabled', true);
					$('.message-container').slideUp('fast');
				},
				success: function(data) {
					if ( data.status && ($this.hasClass('signup-form') || $this.hasClass('sign-in-form')) ) {
						var action = $this.hasClass('signup-form') ? 'signup' : 'sign-in';
						window.location = document.URL + '&businesses_id=' + data.businesses_id + '&business_users_id=' + data.business_users_id + '&action=' + action;
					} else {
						$button.val($button.data('initialValue')).prop('disabled', false);
						$('.message-container').removeClass('updated error').addClass(data.status ? 'updated' : 'error');
						$('.message-container strong').html(data.message);
						$('.message-container').slideDown('fast');
					}
				}
			});
			return false;
		});

		/* handle our options form submit via ajax */
		$('.disconnect').on('click', function(e) {
			e.preventDefault();
			var $this = $(this);
			$.ajax({
				url: $this.attr('href'),
				type: 'GET',
				dataType: 'jsonp',
				jsonpCallback: 'callback',
				crossDomain: true,
				data: {
					unique_id: $('#unique_id').val()
				},
				beforeSend: function() {
					$this.html('Disconnecting...').css({
						color: '#aaa',
						textDecoration: 'none'
					});
				},
				success: function(data) {
					window.location = document.URL + '&message=' + data.url_message;
				}
			});
		});


	});
}(jQuery));