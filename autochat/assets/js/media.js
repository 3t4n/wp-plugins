jQuery(document).ready(function($) {
    $('#upload_image_button').on('click', function(e) {
        e.preventDefault();
        var mediaLibrary = wp.media({
            title: custom_media_uploader_vars.title, // Use the localized title
            button: {
                text: custom_media_uploader_vars.button_text // Use the localized button text
            },
            multiple: false
        });
        mediaLibrary.on('select', function() {
            var attachment = mediaLibrary.state().get('selection').first().toJSON();
            $('#custom_image').val(attachment.url); // Set the selected image URL to the input field
        });
        mediaLibrary.open();
    });
});