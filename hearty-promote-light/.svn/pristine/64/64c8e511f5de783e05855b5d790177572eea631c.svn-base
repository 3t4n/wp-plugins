/*
=== Plugin Name: Hearty Promote Light
admin js - js for the admin interface settings.
*/

function hrty_imageuploader() {

	window.hrty_image_uploader;
	jQuery('input[id$="_image_upload_button"]').click(function(e) {

		e.preventDefault();
		if (window.hrty_image_uploader) {
			window.hrty_image_uploader.open();
			return false;
		}

		window.hrty_image_uploader = wp.media.frames.file_frame = wp.media({

			title: 'Choose Image',
			button: {
				text: 'Choose Image'
			},
			multiple: false

		});

		window.hrty_image_uploader.on('select', function() {

			var cattachment = window.hrty_image_uploader.state().get('selection').first().toJSON();
			var ctextid = e.currentTarget.id.replace('_image_upload_button','');
            jQuery('#'+ctextid).val(cattachment.url);

        });

		window.hrty_image_uploader.open();

	});

}

function hrty_settinginstance() {

	var msvalue = jQuery('#modify_settings_instance').val();
	var cbackground = jQuery('a[data-ivalue="'+msvalue+'"]').css('background-color');
	jQuery('.form-table tr').hide();

	var cnt = 1;

	jQuery('.hearty-admin-form h2 a').each(function(k, v) {

		if (cnt > 1) {
			jQuery(this).css('background-color', cbackground);
		}

		cnt = cnt + 1;

	});

	jQuery('.hearty-admin-badge').css('background-color', cbackground);

	var cnt = 1;

	jQuery('.form-table tr').each(function() {

		if (cnt > window.hrtyadmstep) {

			var ctext = jQuery(this).find('th').text();
			var ctextarr = ctext.split(' ');
			var cnumber = ctextarr[(ctextarr.length - 1)];
			if (cnumber == msvalue) {
				jQuery(this).show();
			}

		} else {

			jQuery(this).show();

		}

		cnt = cnt + 1;

	});

}

function hrty_settinginstance_val(elem) {

	var ivalue = jQuery(elem).attr('data-ivalue');
	jQuery('#modify_settings_instance').val(ivalue);

}

function hrty_expand_settings(elem) {

	var cstate = jQuery(elem).find('span').text();

	if (cstate == '[+]') {

		var nelem = jQuery(elem).parent('h2').next();
		jQuery(elem).find('span').text('[-]');
		jQuery(nelem).css('display','block');

	} else {

		var nelem = jQuery(elem).parent('h2').next();
		jQuery(elem).find('span').text('[+]');
		jQuery(nelem).css('display','none');

	}

}

jQuery(document).ready(function() {

	window.hrtyadmstep = 3;

	jQuery('.hearty-admin-form h2 a').click(function(e) {

		hrty_expand_settings(this);
		e.preventDefault();

	});

	jQuery('.hrty-nav-pills li a').click(function() {

		hrty_settinginstance_val(this);
		hrty_settinginstance();

	});

	hrty_imageuploader();
	hrty_settinginstance();

});

