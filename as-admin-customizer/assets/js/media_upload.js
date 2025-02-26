// Logo Media upload
jQuery(document).ready(function($) {
	var custom_uploader;

	$( '#andola_image_button' ).click(function(e) {

		e.preventDefault();

		// If the uploader object has already been created, reopen the dialog
		if (custom_uploader) {
			custom_uploader.open();
			return;
		}

		// Extend the wp.media object
		custom_uploader = wp.media.frames.file_frame = wp.media({
			title: 'Choose Image',
			button: {
				text: 'Choose Image'
			},
			multiple: false
		});

		// When a file is selected, grab the URL and set it as the text field's value
		custom_uploader.on( 'select', function() {
			attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
			$( '#andola_image' ).val(attachment.url);

		});

		// Open the uploader dialog
		custom_uploader.open();

	});

});

// Background Media upload
jQuery(document).ready(function($) {
	var custom_uploader;

	$( '#andola_image_button_bck ' ).click(function(e) {

		e.preventDefault();

		// If the uploader object has already been created, reopen the dialog
		if (custom_uploader) {
			custom_uploader.open();
			return;
		}

		// Extend the wp.media object
		custom_uploader = wp.media.frames.file_frame = wp.media({
			title: 'Choose Image',
			button: {
				text: 'Choose Image'
			},
			multiple: false
		});

		// When a file is selected, grab the URL and set it as the text field's value
		custom_uploader.on( 'select', function() {
			attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
			$( '#andola_image_bck' ).val(attachment.url);
			
		});

		// Open the uploader dialog
		custom_uploader.open();

	});

});


//Dashboard Logo Media upload
jQuery(document).ready(function($) {
	var custom_uploader;

	$( '#andola_dash_image_button' ).click(function(e) {

		e.preventDefault();

		// If the uploader object has already been created, reopen the dialog
		if (custom_uploader) {
			custom_uploader.open();
			return;
		}                                                                                                                                                                                                                                                                                                                                                                                                                                                                       

		// Extend the wp.media object
		custom_uploader = wp.media.frames.file_frame = wp.media({
			title: 'Choose Image',
			button: {
				text: 'Choose Image'
			},
			multiple: false
		});

		// When a file is selected, grab the URL and set it as the text field's value
		custom_uploader.on( 'select', function() {
			attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
			$( '#andola_dash_image' ).val(attachment.url);

		});

		// Open the uploader dialog
		custom_uploader.open();

	});

});