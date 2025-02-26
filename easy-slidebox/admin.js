jQuery(document).ready(function ($) {

    var image_custom_uploader;

    function open(inputText) {
        //Extend the wp.media object
        image_custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });

        //When a file is selected, grab the URL and set it as the text field's value
        image_custom_uploader.on('select', function () {
            attachment = image_custom_uploader.state().get('selection').first().toJSON();
            var url = '';
            url = attachment['url'];
            jQuery('#' + inputText).val(url);
        });

        //Open the uploader dialog
        image_custom_uploader.open();
    }

    jQuery('#upload_image_more_button').click(function (e) {
        e.preventDefault();
        open("upload_image_more");
    });

    jQuery('#upload_image_less_button').click(function (e) {
        e.preventDefault();
        open("upload_image_less");
    });

});