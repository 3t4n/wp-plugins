/**
 *
 * Save Global Settings
 *
 */

jQuery(document).ready(function(){
    jQuery('#global-settings').click(function(e){
        e.preventDefault();
        var optiondata = jQuery('#global-settings-form').serialize();
        var data = {
            action: 'save_global_settings',
            stringdata: optiondata,

        };

        // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
        jQuery.post(ajaxurl, data, function(response) {
           jQuery("#successMessage").show();
           //alert(response);
        });
     });

})

/**
 *
 * Save Slider settings
 *
 */

jQuery(document).ready(function($) {

    $('.save-options').click(function(e){
        e.preventDefault();
        var optiondata = $('#optionsettingsform').serialize();
        var sliderID = jQuery('#slider_id').val();
        var data = {
            action: 'save_slider_settings',
            stringdata: optiondata,
            sliderID: sliderID

        };

        // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
        $.post(ajaxurl, data, function(response) {
             
			 var redirect_url = $('button.save-options').attr('redirect-url');
			 window.location.href = redirect_url+'&success=true';
			 // $("#successMessage").show();
			  
        });
    });



/**
 *
 * Save Single Slide settings
 *
 */

    $('#cs-singleslide-option').click(function(e){
        e.preventDefault();
       
        var singleslideoption = $('#cs-single-slide-form').serialize();
        var status = $('#status').val();
        var slideid = $('#sliderid').val();
        var redirectURL = jQuery(this).attr("redirect-url");
        var data = {
            action: 'single_slide',
            stringdata: singleslideoption,
            status: status,
            slideid: slideid
        };

        // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
        $.post(ajaxurl, data, function(response) {
            //$("#singlesuccessMessage").show();
            window.location.href = redirectURL+'&status=savesettings';
        });
    });

});

/**
 *
 * upload images for slider and thumbnails
 *
 */

jQuery(document).ready(function($){
    var next_uploader;
    var prev_uploader;
    var slide_image;
    var slide_thumbnail;
    var next_arrow_thumbnail;
    var prev_arrow_thumbnail;
    $('#next_arrow_button').click(function(e) {
        e.preventDefault();
        //If the uploader object has already been created, reopen the dialog
        if (next_uploader) {
            next_uploader.open();
            return;
        }

        //Extend the wp.media object
        next_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: true
        });

        //When a file is selected, grab the URL and set it as the text field's value
        next_uploader.on('select', function() {
            console.log(next_uploader.state().get('selection').toJSON());
            attachment = next_uploader.state().get('selection').first().toJSON();
            $('#upload_next_arrow').val(attachment.url);
            $("#imgnext").attr('src', attachment.url);
        });

        //Open the next_uploader dialog
        next_uploader.open();

    });

     $('#prev_arrow_button').click(function(e) {
        e.preventDefault();
        //If the uploader object has already been created, reopen the dialog
        if (prev_uploader) {
            prev_uploader.open();
            return;
        }

        //Extend the wp.media object
        prev_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: true
        });

        //When a file is selected, grab the URL and set it as the text field's value
        prev_uploader.on('select', function() {
            console.log(prev_uploader.state().get('selection').toJSON());
            attachment = prev_uploader.state().get('selection').first().toJSON();
            $('#upload_prev_arrow').val(attachment.url);
            $("#imgprev").attr('src', attachment.url);
        });

        //Open the prev_uploader dialog
        prev_uploader.open();

    });


     // This script for slide image.
         $('#slide_image_upload_button').click(function(e) {
        e.preventDefault();
        //If the uploader object has already been created, reopen the dialog
        if (slide_image) {
            slide_image.open();
            return;
        }

        //Extend the wp.media object
        slide_image = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: true
        });

        //When a file is selected, grab the URL and set it as the text field's value
        slide_image.on('select', function() {
            console.log(slide_image.state().get('selection').toJSON());
            attachment = slide_image.state().get('selection').first().toJSON();
            $('#slide_image').val(attachment.url);
            //alert(attachment.url);
            $("#slideimage").attr('src', attachment.url);
        });

        //Open the slide_image dialog
        slide_image.open();

    });
// Script for upload thumnail image slide_thumbnail_upload_button

         $('#slide_thumbnail_upload_button').click(function(e) {
        e.preventDefault();
        //If the uploader object has already been created, reopen the dialog
        if (slide_thumbnail) {
            slide_thumbnail.open();
            return;
        }

        //Extend the wp.media object
        slide_thumbnail = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: true
        });

        //When a file is selected, grab the URL and set it as the text field's value
        slide_thumbnail.on('select', function() {
            console.log(slide_thumbnail.state().get('selection').toJSON());
            attachment = slide_thumbnail.state().get('selection').first().toJSON();
            $('#slide_thumbnail').val(attachment.url);
            //alert(attachment.url);
            $("#slideimage").attr('src', attachment.url);
        });

        //Open the slide_thumbnail dialog
        slide_thumbnail.open();

    });


    $('#next_arrow_button_thunmbnail').click(function(e) {
        e.preventDefault();
        //If the uploader object has already been created, reopen the dialog
        if (next_arrow_thumbnail) {
            next_arrow_thumbnail.open();
            return;
        }

        //Extend the wp.media object
        next_arrow_thumbnail = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: true
        });

        //When a file is selected, grab the URL and set it as the text field's value
        next_arrow_thumbnail.on('select', function() {
            console.log(next_arrow_thumbnail.state().get('selection').toJSON());
            attachment = next_arrow_thumbnail.state().get('selection').first().toJSON();
            $('#upload_next_arrow_thunmbnail').val(attachment.url);
            //alert(attachment.url);
            $("#imgnextthumbnail").attr('src', attachment.url);
        });

        //Open the slide_thumbnail dialog
        next_arrow_thumbnail.open();

    });

// Script for upload prev arrow for thumnail 

         $('#prev_arrow_button_thunmbnail').click(function(e) {
        e.preventDefault();
        //If the uploader object has already been created, reopen the dialog
        if (prev_arrow_thumbnail) {
            prev_arrow_thumbnail.open();
            return;
        }

        //Extend the wp.media object
        prev_arrow_thumbnail = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: true
        });

        //When a file is selected, grab the URL and set it as the text field's value
        prev_arrow_thumbnail.on('select', function() {
            console.log(prev_arrow_thumbnail.state().get('selection').toJSON());
            attachment = prev_arrow_thumbnail.state().get('selection').first().toJSON();
            $('#upload_prev_arrow_thunmbnail').val(attachment.url);
            //alert(attachment.url);
            $("#imgprevthumbnail").attr('src', attachment.url);
        });

        //Open the slide_thumbnail dialog
        prev_arrow_thumbnail.open();

    });
});

/**
*
* Switching b/w Select Image and External URL When adding new slide
*
*/
    jQuery(document).ready(function($){
        $(".slideradio").change(function (e) {
            e.preventDefault();
            if ($("#slideimage").is(":checked")) {
                $("#dvslideimage").show();
                $("#dvslidelink").hide();
                $('#slide_image').attr('name', 'slide_image');
                $('#slide_ext_link').attr('name', '');
            } else {
                $("#dvslideimage").hide();
                $("#dvslidelink").show();
                $('#slide_image').attr('name', '');
                $('#slide_ext_link').attr('name', 'slide_image');
            }
        });
        $(".slide-thumbnail").change(function (e) {
            e.preventDefault();
            if ($("#slidethumbnailimage").is(":checked")) {
                $("#dvslidethumbnailimage").show();
                $("#dvslidethumbnaillink").hide();
                 $('#slide_thumbnail').attr('name', 'slide_thumbnail');
                $('#slide_thumbnail_link').attr('name', '');
            } else {
                $("#dvslidethumbnailimage").hide();
                $("#dvslidethumbnaillink").show();
                 $('#slide_thumbnail_link').attr('name', 'slide_thumbnail');
                $('#slide_thumbnail').attr('name', '');
            }
        });
    });


/**
*
* Import Slider Settings
*
*/

jQuery(document).ready(function(){
    jQuery('#import-settings-btn').click(function(e){
        e.preventDefault();

        var sliderID = jQuery('#slider_id').val();
        var settingsText = jQuery('#import-settings').val();
         
        var data = {
            action: 'import_slider_settings',
            sliderID: sliderID,
            settingsText: settingsText,
        };

        jQuery.post(ajaxurl, data, function(response) {
              jQuery("#singlesuccessMessage").show();
              alert('Settings imported successfully...');
              location.reload();
        });


    })
})


/****
*
*
* Delete Slider 
*
*
*/

  jQuery(document).ready(function( $ ) {
    jQuery("#dialog").dialog({
      autoOpen: false,
      modal: true
    });
    jQuery(".btn-danger, .delete-slide").click(function(e) {
    e.preventDefault();
    var sliderid = jQuery(this).attr("slider-id");
    var redirectURL = jQuery(this).attr("redirect-url");
    jQuery("#dialog").dialog({
      buttons : {
        "Delete" : function() {
          var data = {
            action: 'delete_slider_and_slide',
            sliderid: sliderid,
        };
        
        // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
        jQuery.post(ajaxurl, data, function(response) {
           $("#dialog").dialog("close");
            window.location.href = redirectURL+'&status=success';
        });
        },
        "Cancel" : function() {
          jQuery(this).dialog("close");
        }
      }
    });

    $("#dialog").dialog("open");
  });


/**
*
* Delete Single Slide
*
*/

jQuery(".delete-slide").click(function(e) 
    {
    e.preventDefault();
    var slideid = jQuery(this).attr("slide-id");
    //alert(slideid);
    jQuery("#dialog").dialog({
      buttons : {
        "Delete" : function() {
          var data = {
            action: 'delete_slide',
            slideid: slideid,
        };
        
        // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
        jQuery.post(ajaxurl, data, function(response) {
           $("#dialog").dialog("close");
            window.location.href += "&status=success";
        });
        },
        "Cancel" : function() {
          jQuery(this).dialog("close");
        }
      }
    });

    $("#dialog").dialog("open");
  });


jQuery("input#caption-color").ColorPickerSliders({
    placement: 'top',
    order: {
      hsl: 1,
      opacity: 2
    }
  });


});


