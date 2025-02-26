jQuery(document).ready(function ($) {
    $('#upload_image_button').click(function (e) {
        e.preventDefault();
        var image = wp.media({
            title: wp.i18n.__('Select Image', 'communication-icon'),
            multiple: false
        }).open().on('select', function () {
            var uploaded_image = image.state().get('selection').first();
            var image_url = uploaded_image.toJSON().url;
            $('#communication_icon_image').val(image_url);
        });
    });
});
