jQuery(document).ready(function($){
    var mediaFrame;

    $('#select-images').on('click', function(e) {
        e.preventDefault();

        if ( mediaFrame ) {
            mediaFrame.open();
            return;
        }

        mediaFrame = wp.media({
            title: 'Select Images for Gallery',
            button: { text: 'Add to Gallery' },
            multiple: true
        });

        mediaFrame.on('select', function() {
            var selection = mediaFrame.state().get('selection');
            var image_ids = [];
            selection.each(function(attachment) {
                image_ids.push(attachment.id);
                var img_url = attachment.attributes.url;
                $('#at-gallery-images-container').append('<div class="at-gallery-image-item" data-id="' + attachment.id + '"><img src="' + img_url + '" width="100" height="100" /><button class="remove-image">Remove</button></div>');
            });
            $('#at-gallery-images').val(image_ids.join(','));
        });

        mediaFrame.open();
    });

    $('body').on('click', '.remove-image', function() {
        var image_item = $(this).closest('.at-gallery-image-item');
        var image_id = image_item.data('id');
        var current_values = $('#at-gallery-images').val().split(',');

        current_values = current_values.filter(function(val) {
            return val != image_id;
        });

        $('#at-gallery-images').val(current_values.join(','));
        image_item.remove();
    });
});