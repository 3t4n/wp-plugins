jQuery(document).ready(function ($) {
    var frame;
    /*
     * Upload button click event, which builds the choose-from-library frame.
     *
     */
    $('#wpwrap').on('click', '.simple-image-slider-upload-button', function (event) {
        var $el = $(this);
        
        event.preventDefault();

        // Create the media frame.
        frame = wp.media.frames.customHeader = wp.media({
            title: $el.data('uploader_title'),
            
            button: {
                text: $el.data('uploader_button_text'), // button text
                close: true // whether click closes 
            }
        });

        // When an image is selected, run a callback.
        frame.on('select', function () {
            // Grab the selected attachment.
            var attachment = frame.state().get('selection').first(), link = $el.data('updateLink');                    

            $el.prev('input').val(attachment.attributes.url); /*grab the specific input*/
        });

        frame.open();
    });
});