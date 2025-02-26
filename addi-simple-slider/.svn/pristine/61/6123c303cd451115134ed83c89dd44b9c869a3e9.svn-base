// JavaScript Document

jQuery(document).ready(function($){
 
 
    var custom_uploader;
	var custom_uploader1;
	var custom_uploader2;
	var custom_uploader3;
	var custom_uploader4;

 
    $('#upload_image_button1').click(function(e) {
 
        e.preventDefault();
 
        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader) {
            custom_uploader.open();
            return;
        }
 
        //Extend the wp.media object
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });
 
        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader.on('select', function() {
            attachment = custom_uploader.state().get('selection').first().toJSON();
            $('#ssd_slider_upload1').val(attachment.url);
			$('#ssd_img_upload1').attr('src', attachment.url);
        });
 
        //Open the uploader dialog
        custom_uploader.open();
 
    });
 
 
 
 	$('#upload_image_button2').click(function(e) {
 
        e.preventDefault();
 
        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader1) {
            custom_uploader1.open();
            return;
        }
 
        //Extend the wp.media object
        custom_uploader1 = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });
 
        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader1.on('select', function() {
            attachment = custom_uploader1.state().get('selection').first().toJSON();
            $('#ssd_slider_upload2').val(attachment.url);
			$('#ssd_img_upload2').attr('src', attachment.url);
        });
 
        //Open the uploader dialog
        custom_uploader1.open();
 
    });
	
	
	$('#upload_image_button3').click(function(e) {
 
        e.preventDefault();
 
        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader2) {
            custom_uploader2.open();
            return;
        }
 
        //Extend the wp.media object
        custom_uploader2 = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });
 
        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader2.on('select', function() {
            attachment = custom_uploader2.state().get('selection').first().toJSON();
            $('#ssd_slider_upload3').val(attachment.url);
			$('#ssd_img_upload3').attr('src', attachment.url);
        });
 
        //Open the uploader dialog
        custom_uploader2.open();
 
    });
	
	
	$('#upload_image_button4').click(function(e) {
 
        e.preventDefault();
 
        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader3) {
            custom_uploader3.open();
            return;
        }
 
        //Extend the wp.media object
        custom_uploader3 = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });
 
        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader3.on('select', function() {
            attachment = custom_uploader3.state().get('selection').first().toJSON();
            $('#ssd_slider_upload4').val(attachment.url);
			$('#ssd_img_upload4').attr('src', attachment.url);
        });
 
        //Open the uploader dialog
        custom_uploader3.open();
 
    });
	
	
	$('#upload_image_button5').click(function(e) {
 
        e.preventDefault();
 
        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader4) {
            custom_uploader4.open();
            return;
        }
 
        //Extend the wp.media object
        custom_uploader4 = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });
 
        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader4.on('select', function() {
            attachment = custom_uploader4.state().get('selection').first().toJSON();
            $('#ssd_slider_upload5').val(attachment.url);
			$('#ssd_img_upload5').attr('src', attachment.url);
        });
 
        //Open the uploader dialog
        custom_uploader4.open();
 
    });
	
 
});




