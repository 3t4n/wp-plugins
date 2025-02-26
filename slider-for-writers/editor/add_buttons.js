(function() {
    tinymce.create('tinymce.plugins.SliderForWriters', {
        /**
         * Initializes the plugin, this will be executed after the plugin has been created.
         * This call is done before the editor instance has finished it's initialization so use the onInit event
         * of the editor instance to intercept that event.
         *
         * @param {tinymce.Editor} ed Editor instance that the plugin is initialized in.
         * @param {string} url Absolute URL to where the plugin is located.
         */
        init : function(ed, url) {

            ed.addCommand('writer_slider', function() {

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
            });

            ed.addButton('writer_slider', {
                title : 'Добавляет шорткод для слайдера',
                cmd : 'writer_slider',
                image : url + '/writer_slider.png'
            });

        },

        /**
         * Creates control instances based in the incomming name. This method is normally not
         * needed since the addButton method of the tinymce.Editor class is a more easy way of adding buttons
         * but you sometimes need to create more complex controls like listboxes, split buttons etc then this
         * method can be used to create those.
         *
         * @param {String} n Name of the control to create.
         * @param {tinymce.ControlManager} cm Control manager to use inorder to create new control.
         * @return {tinymce.ui.Control} New control instance or null if no control was created.
         */
        createControl : function(n, cm) {
            return null;
        },

        /**
         * Returns information about the plugin as a name/value array.
         * The current keys are longname, author, authorurl, infourl and version.
         *
         * @return {Object} Name/value array containing information about the plugin.
         */
        getInfo : function() {
            return {
                    longname : 'Slider for Writers',
                    author : 'Artanik',
                    authorurl : 'http://artanik.ru/',
                    infourl : 'http://wiki.moxiecode.com/index.php/TinyMCE:Plugins/example',
                    version : "0.1"
            };
        }
    });

    // Register plugin
    tinymce.PluginManager.add('writer_slider', tinymce.plugins.SliderForWriters);
})();