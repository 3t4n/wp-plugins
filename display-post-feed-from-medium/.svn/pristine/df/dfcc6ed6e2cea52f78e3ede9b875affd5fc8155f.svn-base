jQuery(document).ready(function($){
  var custom_uploader;

  $('#upload_image_button').click(function(e) {
    e.preventDefault();
    /*If the uploader object has already been created, reopen the dialog*/
  if (custom_uploader) {
    custom_uploader.open();
    return;
  }
  
  /*Extend the wp.media object*/
  custom_uploader = wp.media.frames.file_frame = wp.media({
    title: 'Choose Image',
    button: {
      text: 'Choose Image'
    },
    multiple: false
  });
  
  /*When a file is selected, grab the URL and set it as the text field's value*/
  custom_uploader.on('select', function() {
    attachment = custom_uploader.state().get('selection').first().toJSON();
    $('#upload_image').val(attachment.url);
  });

    /* Open the uploader dialog*/
    custom_uploader.open();
  });

  if ($('.dpffm_subtitle').val() == 'true'){
    $('.readmore_text').hide();
  } else {
    $('.readmore_text').show();
  }

  /* Added the JS on hide subtitle change */
  $(".dpffm_subtitle").on('change', function() {
    if ($(this).val() == 'true'){
      $('.readmore_text').hide();
    } else {
      $('.readmore_text').show();
    }
  });

  /* Added JS to manage list/grid view */
  if ($('.dpffm-post-view').val() == 'List'){
     $('.dpffm-grid-view').hide();
  } else {
     $('.dpffm-grid-view').show();
  }

  /* Added the JS to manage the view */
  $(".dpffm-post-view").on('change', function() {
    if ($(this).val() == 'List'){
       $('.dpffm-grid-view').hide();
    } else {
       $('.dpffm-grid-view').show();
    }
  });

  /* Added the JS to validate the handle */
  jQuery("#post-feed-medium-form").validate({
    rules: {
        dpffm_handle: 'required',
    }
  });
});