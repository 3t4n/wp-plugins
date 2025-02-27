jQuery(document).ready(function($) {
    var landz_agent_profile_pic;
     
    jQuery('.upload_image_agent').live('click', function( event ){
     
        event.preventDefault();
     
        // var parent = jQuery(this).closest('.tab-content').find('.thumbs-prev');
        // Create the media frame.
        landz_agent_profile_pic = wp.media.frames.landz_agent_profile_pic = wp.media({
          title: 'Select image for agent profile',
          button: {
            text: 'Add',
          },
          multiple: false  // Set to true to allow multiple files to be selected
        });
     
        // When an image is selected, run a callback.
        landz_agent_profile_pic.on( 'select', function() {
            // We set multiple to false so only get one image from the uploader
            var selection = landz_agent_profile_pic.state().get('selection');
            selection.map( function( attachment ) {
                attachment = attachment.toJSON();
                jQuery('#rem_agent_meta_image').val(attachment.url);
                jQuery('.agent_img_ph').html('<img style="max-width: 150px;" src="'+attachment.url+'">');
            });  
        });
     
        // Finally, open the modal
        landz_agent_profile_pic.open();
    });
    jQuery('.thumbs-prev').on('click', '.dashicons-dismiss', function() {
        jQuery(this).parent('div').remove();
    });
    jQuery(".thumbs-prev").sortable({
      placeholder: "ui-state-highlight"
    });
});