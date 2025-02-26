jQuery(document).ready(function($) {
    jQuery("#apg-tabs").tabs();
    jQuery('.apg-color-field').wpColorPicker();

    jQuery('.nav-tab', '#apg-tabs').click(function() {
        jQuery( '.nav-tab', '#apg-tabs').removeClass('nav-tab-active');
        jQuery( this ).addClass('nav-tab-active');
    });

    $('#apg-media-add-album-overview').click(function() {
        wp.media.editor.insert('[apg_list_albums]');
    });

    // Uploading files
    var file_frame;
    var wp_media_post_id;
    //var wp_media_post_id = wp.media.model.settings.post.id; // Store the old id
    var set_to_post_id = $('#apg-photoalbum').val(); // Set this

    jQuery('#apg_image_upload').live('click', function( event ){
        event.preventDefault();
        // Overwrite the post id
        var set_to_post_id = $('#apg-photoalbum').val();

        // If the media frame already exists, reopen it.
        if ( file_frame ) {
            // Set the post ID to what we want
            file_frame.uploader.uploader.param( 'post_id', set_to_post_id );
            // Open frame
            file_frame.open();
            return;
        } else {
            // Set the wp.media post id so the uploader grabs the ID we want when initialised
            wp.media.model.settings.post.id = set_to_post_id;
        }

        // Create the media frame.
        file_frame = wp.media.frames.file_frame = wp.media({
            title: jQuery( this ).data( 'uploader_title' ),
            button: {
                text: jQuery( this ).data( 'uploader_button_text' ),
            },
            multiple: true  // Set to true to allow multiple files to be selected
        });

        // When an image is selected, run a callback.
        file_frame.on( 'select', function() {
            // We set multiple to false so only get one image from the uploader
            attachment = file_frame.state().get('selection').toJSON();
            jQuery('#apg_image_names').val( JSON.stringify( attachment ) );

            jQuery('#apg-upload-selection').html('');
            jQuery.each( attachment, function( key, image ){
                jQuery('#apg-upload-selection').append( '<img src="' + image.url + '" height="50" align="left" />' );
            } );

            // Restore the main post ID
            wp.media.model.settings.post.id = wp_media_post_id;
        });

        // Finally, open the modal
        file_frame.open();
    });

    // Restore the main ID when the add media button is pressed
    jQuery('a.add_media').on('click', function() {
        wp.media.model.settings.post.id = wp_media_post_id;
    });


    jQuery(function() {
        jQuery( "#apg-sortable" ).sortable({
            scroll: true,
            placeholder: 'placeholder',
            start: function(event, ui) { ui.placeholder.html('<div style="float: left;width: 80px; height: 80px; margin-right: 10px; margin-bottom: 10px; display: block;">&nbsp;</div>') },
            update: function( event, ui ) {
                var apg_photos = [];
                jQuery( "li", "#apg-sortable" ).each(function() {
                    apg_photos.push( $(this).data("apgid") );
                });

                jQuery('#apg_photo_order').val( apg_photos.join(",") );
            }
        });
        jQuery( "#apg-sortable" ).disableSelection();

        jQuery( ".apg-delete-photo" ).click(function(){
            var apgid = $(this).data("apgid");
            jQuery('#apg-photo-' + apgid).remove();

            var apg_photos = [];
            jQuery( "li", "#apg-sortable" ).each(function() {
                apg_photos.push( $(this).data("apgid") );
            });

            jQuery('#apg_photo_order').val( apg_photos.join(",") );
        });

        jQuery( "#apg-photoalbum" ).change(function() {
            // Reset the image value input
            jQuery('#apg_image_names').val('');
            jQuery( 'img', '#apg-upload-selection').remove();

            if( jQuery(this).val() != '0' ) {
                jQuery('#apg-upload-button').show();
            }
            else{
                jQuery('#apg-upload-button').hide();
            }
        });
        jQuery('#apg-upload-button').hide();
    });
});