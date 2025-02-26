/**
 * Image Uploads
 *
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        https://www.tnado.com/author/prod3v3loper/
 * @package     Melabu
 * @subpackage  Author Box Pro
 * @since       1.0
 */

jQuery(document).ready(function () {

    /* WP Media Uploader */
    var _shr_media = true;
    var _orig_send_attachment = wp.media.editor.send.attachment;

    jQuery('.melibu-ab-image').click(function () {

        var button = jQuery(this),
                textbox_id = jQuery(this).attr('data-id'),
                image_id = jQuery(this).attr('data-src'),
                _shr_media = true;

        wp.media.editor.send.attachment = function (props, attachment) {

            var current_element = '';
            if (_shr_media && (attachment.type === 'image')) {

                if (image_id.indexOf(",") !== -1) {

                    image_id = image_id.split(",");
                    $image_ids = '';
                    jQuery.each(image_id, function (key, value) {
                        if ($image_ids)
                            $image_ids = $image_ids + ',#' + value;
                        else
                            $image_ids = '#' + value;
                    });

                    current_element = jQuery($image_ids);
                } else {
                    current_element = jQuery('#' + image_id);
                }

                jQuery('#' + textbox_id).val(attachment.id);
//                current_element.attr('src', attachment.url).show();
                current_element.css('backgroundImage', 'url(' + attachment.url + ')');

            } else {

                alert('Please select a valid image file');
                return false;
            }
        };

        wp.media.editor.open(button);
        return false;
    });

    jQuery('.melibu-ab-image-reset').click(function () {

        var textbox_id = jQuery(this).attr('data-id');
        jQuery('.melibu-ab-image-show').css('background-image', 'url()');
        jQuery('#' + textbox_id).val('');

        return false;
    });

});

var getnameid = '';

jQuery(document).ready(function ($) {

    var mediaUploader;

    $('.mb_upload_button').click(function (e) {

        e.preventDefault();

        getnameid = e.target.name;

//        if (mediaUploader) {
//            mediaUploader.open();
//            return;
//        }

        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });

        mediaUploader.on('select', function () {
            attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#' + getnameid).val(attachment.url);
        });

        mediaUploader.open();
    });

});