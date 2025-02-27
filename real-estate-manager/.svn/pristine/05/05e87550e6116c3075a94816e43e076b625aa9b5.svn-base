jQuery(document).ready(function($) {
    var landz_property_images;
     
    jQuery('.upload_image_button').live('click', function( event ){
     
        event.preventDefault();
     
        // var parent = jQuery(this).closest('.tab-content').find('.thumbs-prev');
        // Create the media frame.
        landz_property_images = wp.media.frames.landz_property_images = wp.media({
          title: 'Select images for property gallery',
          button: {
            text: 'Add',
          },
          multiple: true  // Set to true to allow multiple files to be selected
        });
     
        // When an image is selected, run a callback.
        landz_property_images.on( 'select', function() {
            // We set multiple to false so only get one image from the uploader
            var selection = landz_property_images.state().get('selection');
            selection.map( function( attachment ) {
                attachment = attachment.toJSON();
                jQuery('.thumbs-prev').append('<div><input type="hidden" name="rem_property_data[property_images]['+attachment.id+']" value="'+attachment.id+'"><img src="'+attachment.url+'"><span class="dashicons dashicons-dismiss"></span></div>');

            });  
        });
     
        // Finally, open the modal
        landz_property_images.open();
    });
    jQuery('.thumbs-prev').on('click', '.dashicons-dismiss', function() {
        jQuery(this).parent('div').remove();
    });
    jQuery(".thumbs-prev").sortable({
      placeholder: "ui-state-highlight"
    });
});