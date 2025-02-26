(function() {
    tinymce.PluginManager.add('writer_slider', function( ed, url ) {
        ed.addButton( 'writer_slider', {
            title: 'Add slider shortcode',
            icon: 'icon dashicons-format-gallery',
            onclick: function() {
                // Uploading files
                var file_frame, files = [];
             
                // If the media frame already exists, reopen it.
                if ( file_frame ) {
                  file_frame.open();
                  return;
                }
             

                // Create the media frame.
                file_frame = wp.media.frames.file_frame = wp.media({
                  title: wp.media.view.l10n.editGalleryTitle,
                  multiple: true  // Set to true to allow multiple files to be selected
                });
             
                // When an image is selected, run a callback.
                file_frame.on( 'select', function() {
                 
                    var selection = file_frame.state().get('selection');
                 
                    selection.map( function( attachment ) {
                 
                      attachment = attachment.toJSON();

                      files.push(attachment);
                 
                    });
                });

                file_frame.on( 'reset', function() {
                    var shortcode, ids = [];

                    for (var i = 0; i < files.length; i++) {
                        var file = files[i];
                        ids.push(file.id);
                    };

                    ids.join(',');

                    shortcode = '[writer_slider attachment_ids="' + ids + '"]';

                    ed.execCommand('mceInsertContent', 0, shortcode);

                });
             
                // Finally, open the modal
                file_frame.open();
            }
        });
    });
})();