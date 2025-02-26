jQuery(document).ready(function ($) {

	$('.update_notify').hide();

	var gifed_info = getParameterByName('gifed_info');

	switch (gifed_info) {

		case 'missing_token':

			$(".gifeed_generate_token_button").notify("Please Generate your Instagram Access Token first.", {
				position: "right-middle",
				arrowSize: 5,
			});

			break;

		case 'get_token':

			var user_data = fil_base64_decode(decodeURIComponent(getParameterByName('user_data')));

			gifeed_save_instagram_userdata(JSON.parse(user_data));

			break;

		default:
			break;

	}

	function gifeed_save_instagram_userdata(user_data) {

		var uid = user_data.id;

		var data = {
			action: 'gifeed_ajax_access_token',
			task: 'add',
			security: gifeed_settings_script_opt.insta_nonce,
			user_data: user_data
		};

		$.post(ajaxurl, data, function (response) {

			response = JSON.parse(response);

			if (response.hasOwnProperty('error')) {

				$('.gifeed-class').append('<div id="dialog-confirm" title="Instagram Info"><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>' + response.error + '</div>');

				$("#dialog-confirm").dialog({
					resizable: false,
					height: "auto",
					width: 400,
					modal: true,
					dialogClass: 'no-close',
					closeOnEscape: false,
					open: function (event, ui) {
						$(event.target).dialog('widget')
							.css({
								position: 'fixed'
							})
							.position({
								my: 'center',
								at: 'center',
								of: window
							});
					},
					buttons: {
						"Logout Instagram": function () {
							window.open('https://www.instagram.com/accounts/logout/', '_blank');
							$(this).dialog("close");
						},
						Cancel: function () {
							window.history.pushState(null, '', gifeed_settings_script_opt.redirect_uri);
							$(this).dialog("close");
						}
					}
				});

				return false;

			}

			if (response.hasOwnProperty('ok')) {

				$('.gifeed-notify.notify-overlay').remove();
				$('.fil_no_token').hide();
				$('.fil-each-token-list').append($(response.ok));

				setTimeout(function () {
					$('html, body').animate({
						scrollTop: parseInt($('[data-token-id="' + uid + '"]').offset().top - 80)
					}, 1000);
					$('[data-token-id="' + uid + '"]').effect("highlight", {
						color: "#f0d377"
					}, 3000);
					window.history.pushState(null, '', gifeed_settings_script_opt.client_redirect_uri);
				}, 500);

			} else {
				alert(gifeed_settings_script_opt.i18n.ajax_failed);
			}

		});

	}

	// Validate username(s)
	$(document).on("keyup contextmenu input", '#gifeed_google_fonts_api_key', function () {

		$(this).val($.trim($(this).val()));

	});

	/* General Settings */
	$('.gifeed-opt-cont input').not('#gifeed_google_fonts_api_key').bind('click', function () {

		loadingOverlay();
		gifeed_ajax_options($(this));

	});

	function getParameterByName(name, url) {

		name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
		var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
			results = regex.exec((url ? url : location.search));
		return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));

	}

	function gifeed_ajax_options(el) {

		var data = {
			action: 'gifeed_ajax_update_settings',
			security: $(el).attr('data-nonce'),
			cmd: [$(el).attr('data-opt'), $(el).val()],
		};

		$.post(ajaxurl, data, function (response) {

			var notify = $(el).parent().find('.update_notify');
			notify.hide();
			notify.removeClass('notifyupdated notifyerror');

			if (response == 1) {
				$('#overlay').remove();
				notify.removeClass('notifyupdated notifyerror').addClass('notifyupdated').fadeIn(500, function () {
					notify.fadeOut(2000);
				});

			} else {
				$('#overlay').remove();
				notify.removeClass('notifyupdated notifyerror').addClass('notifyerror').fadeIn(500, function () {
					notify.fadeOut(2000);
				});
				alert('Ajax request failed, please refresh your browser window.');
			}

		});

	}

	function loadingOverlay() {

		var over = '<div id="overlay">' +
			'<div id="loading"></div>' +
			'</div>';
		$(over).appendTo('#wpcontent');

	}

	function fil_base64_decode(input) {

		if (input === undefined || input === '') {
			return '';
		}

		try {
			return decodeURIComponent(escape(window.atob(input)));
		} catch (ex) {
			return input;
		}

	}

	// Token Generator
	$('.gifeed-class').on('click', '.gifeed_generate_token_button', function () {

		window.location = gifeed_settings_script_opt.token_gen_link;

	});

	// Delete Token
	$('.gifeed-class').on('click', '.fil_token_delete', function (e) {

		var result = confirm('Are you sure?');

		if (result) {

			var token_id = $(this).closest('.fil_each_token').data('token-id'),
				data = {
					action: 'gifeed_ajax_access_token',
					task: 'remove',
					security: $('.fil-generate-now').data('nonce'),
					token_id: token_id
				};

			$.post(ajaxurl, data, function (response) {

				if (response == 'deleted') {

					$('[data-token-id="' + token_id + '"]').fadeOut(100, function () {
						this.remove();
						fil_recount_token();
					});

				} else {
					alert('Ajax request failed, please refresh your browser window.');
				}

			});

		}

		e.preventDefault();
	});
	
	// Add Profile Picture
	$('.gifeed-class').on('click', '.fil_user_img_picker', function (e) {

		e.preventDefault();

		var user_img_picker, that = $(this);

		//If the uploader object has already been created, reopen the dialog
		if (user_img_picker) {
			user_img_picker.open();
			return;
		}

		//Extend the wp.media object
		user_img_picker = wp.media.frames.file_frame = wp.media({
			title: 'Choose Image',
			button: {
				text: 'Choose Image'
			},
			multiple: false
		});

		//When a file is selected, grab the URL and set it as the text field's value
		user_img_picker.on('select', function () {

			var attachment = user_img_picker.state().get('selection').first().toJSON(), picked;

			if (attachment.sizes !== undefined && attachment.sizes.thumbnail !== undefined) {

				picked = attachment.sizes.thumbnail.url;

			}
			else if (attachment.sizes !== undefined && attachment.sizes.medium !== undefined) {

				picked = attachment.sizes.medium.url;

			}
			else {

				picked = attachment.url;

			}

			var dat = {
				action: 'gifeed_ajax_update_user_info',
				security: gifeed_settings_script_opt.insta_nonce,
				userPic: {uid: that.closest('.fil_each_token').data('token-id'), pic: picked}
			};

			$.ajax({
				url: ajaxurl,
				type: 'POST',
				dataType: 'json',
				data: dat,

				success: function (response) {

					if (response.status == 'updated') {

						$('[data-token-id="' + dat.userPic.uid + '"]').find('.fil_pp_img').attr('src', picked);

					}

				}
			});

		});

		//Open the uploader dialog
		user_img_picker.open();

	});

	function fil_recount_token() {

		if ($('.gifeed-class').length) {
			setTimeout(function () {
				if ($('.fil_each_token').length == 0) $('.fil_no_token').css('display', 'block');
			}, 500);
		}

	}

	fil_recount_token();

});