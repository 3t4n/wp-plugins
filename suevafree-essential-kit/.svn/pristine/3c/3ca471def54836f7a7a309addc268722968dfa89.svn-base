jQuery.noConflict()(function($){

	"use strict";

/* ===============================================
   ColorPicker
   =============================================== */

	var parent = $('body');

	if ($('body').hasClass('widgets-php')){

		parent = $('.widget-liquid-right');

	}

	$(document).ready(function() {
		parent.find('.sueva_color_picker').wpColorPicker();
	});

	$(document).on('widget-added', function(e, widget){
		widget.find('.sueva_color_picker').wpColorPicker();
	});

	$(document).on('widget-updated', function(e, widget){
		widget.find('.sueva_color_picker').wpColorPicker();
	});

/* ===============================================
   On off
   =============================================== */

	$('.on-off').on("change",function() {

		if ($(this).val() === "on" ) {
			$('.hidden-element').css({'display':'none'});
		}
		else {
			$('.hidden-element').slideDown("slow");
		}

	});

	$('input[type="checkbox"].on_off').on("change",function() {

		if (!this.checked) {
			$(this).parent('.iPhoneCheckContainer').parent('.sueva_inputbox').next('.hidden-element').slideUp("slow");
		} else {
			$(this).parent('.iPhoneCheckContainer').parent('.sueva_inputbox').next('.hidden-element').slideDown("slow");
		}

	});

/* ===============================================
   Upload media
   =============================================== */

	$('.sueva_widget_upload input.upload_button').on("click", function(e) {

		var custom_uploader;
		var attachmentId = "";

		attachmentId = $(this).prev('.upload_attachment').attr("id");

		e.preventDefault();

		if (custom_uploader) {
			custom_uploader.open(this);
			return;
		}

		custom_uploader = wp.media.frames.file_frame = wp.media({
			title: 'Choose Image',
			button: {
				text: 'Choose Image'
			},
			multiple: false
		});

		custom_uploader.on('select', function() {

			var attachment = custom_uploader.state().get('selection').first().toJSON();
			$('input#' + attachmentId ).val(attachment.url);

		});

		custom_uploader.open();

	});

});
