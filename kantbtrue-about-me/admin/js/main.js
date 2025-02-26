(function($){
    'use strict';
    const mediaFrame = wp.media({
            title: 'Select image',
            button: {
                text: 'Insert image'
            },
            multiple: false
        });
    $(document).on('click', '.kbtam-media-add', (e) => {
        e.preventDefault();
        mediaFrame.on('select', () => {
            let attachment = mediaFrame.state().get('selection').first().toJSON();
            $('.kbtam-media-img').attr('src', attachment.url)
                .removeClass('hidden');
            $('.kbtam-media-add').addClass('hidden');
            $('.kbtam-media-del').removeClass('hidden');
            $('.kbtam-media-id').val(attachment.id)
                .trigger('change');
        });
        if ( mediaFrame ) {
            mediaFrame.open();
            return;
        }
        mediaFrame.open();
    });
    $(document).on('click', '.kbtam-media-del', (e) => {
        e.preventDefault();
        $('.kbtam-media-img').attr('src', '')
            .addClass('hidden');
        $('.kbtam-media-id').val('')
            .trigger('change');
        $('.kbtam-media-del').addClass('hidden');
        $('.kbtam-media-add').removeClass('hidden');
    });

    /**
     * @since 1.2.1
     */
    $(document).on('click', '.kbtam-feedback-btn', function (e) {
        e.preventDefault();
        var kbtam_show_rating = $(e.currentTarget).data('rating');
        $.ajax({
            type: 'post',
            url: KBTAM_admin_vars.ajax_url,
            data: 'action=kbtam_feedback' + '&show_rating=' + kbtam_show_rating + '&nonce=' + KBTAM_admin_vars.nonce,
            success: function ( response ) {
                $('.kbtam-feedback-notice').remove();
            },
            error: function ( err ) {
                console.log('Error: ' + err.responseText);
            }
        });
    })
}(jQuery));
