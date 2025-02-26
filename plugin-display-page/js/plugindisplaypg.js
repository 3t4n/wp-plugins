jQuery( document ).ready( function( $ ) {
    // Select From media library files
    var file_frame;

    jQuery('.upload_image_button').on('click', function( event ){
        event.preventDefault();
        // If the media frame already exists, reopen it.
        if ( file_frame ) {
          file_frame.open();
          return;
        }
        
        // Create a new media frame
        file_frame = wp.media({
          title: 'Select or Upload Media Of Your Chosen Persuasion',
          button: {
            text: 'Use this media'
          },
          multiple: true  // Set to true to allow multiple files to be selected
        });
        // When an image is selected, run a callback.
        file_frame.on( 'select', function() {
            // Only get one image from the uploader
            attachments = file_frame.state().get('selection').toJSON();
            var imageIds = '';
            var imageUrls = '';
            for (key in attachments) {
                imageIds += attachments[key].id + ' ';
                imageUrls += attachments[key].url + ' ';
            }
            
            imageIds = jQuery.trim(imageIds);
            var imageUrlArray = jQuery.trim(imageUrls).split(" ")
            var imageString = '';
            console.log(imageIds);
            jQuery("#pdpg_plugin_images_ids").val( imageIds );
            for (var i = 0; i < imageUrlArray.length; i++) {
                imageString += '<img src="'+imageUrlArray[i]+'" width=150 height=150 alt="Plugin Screenshot" />';
            }
            jQuery('#pdpg_plugin_images_container').html(imageString);
        });
            // Finally, open the modal
            file_frame.open();
    });
    
    if (jQuery("body").hasClass("single-pdpg_page")) {
        jQuery('.owl-carousel').owlCarousel({
                loop:true,
                margin:25,
                nav:false,
                dots:true,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:2
                    },
                    1000:{
                        items:3
                    }
                }
        })
    }
});