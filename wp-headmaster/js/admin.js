 jQuery(document).ready(function($) {

    ///// Tabs

    $('.wrap .group').hide();
    $('.wrap .group:first').show();
    $('.wrap .nav-tab-wrapper a:first').addClass('nav-tab-active');
     
    $('.wrap .nav-tab-wrapper a').click(function(){
        $('.wrap .nav-tab-wrapper a').removeClass('nav-tab-active');
        $(this).addClass('nav-tab-active');
        var currentTab = $(this).attr('href');
        $('.wrap .group').hide();
        $(currentTab).show();
        return false;
    });

    ///// jQuery Version Detector

    $(".jqueryversion").text($().jquery);


    ///// Icon Media Uploaders

    var custom_uploader;
 
    $('#upload_image_button').click(function(e) {
 
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
            $('#upload_image').val(attachment.url);
        });
 
        //Open the uploader dialog
        custom_uploader.open();
 
    });

    $('#uploadtouchicon').click(function(e) {
 
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
            $('#wp_headmaster_touch_icon').val(attachment.url);
        });
 
        //Open the uploader dialog
        custom_uploader.open();
 
    });
});
