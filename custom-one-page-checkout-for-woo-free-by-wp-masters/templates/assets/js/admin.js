jQuery(document).ready(function($) {

    // Uploading files
    var file_frame;
    var set_to_post_id = 0; // Set this

    $('#upload_image_button').on('click', function( event ) {
        event.preventDefault();
        // If the media frame already exists, reopen it.
        if ( file_frame ) {
            // Set the post ID to what we want
            file_frame.uploader.uploader.param( 'post_id', set_to_post_id);
            // Open frame
            file_frame.open();
            return;
        } else {
            // Set the wp.media post id so the uploader grabs the ID we want when initialised
            wp.media.model.settings.post.id = set_to_post_id;
        }

        // Create the media frame.
        file_frame = wp.media.frames.file_frame = wp.media({
            title: 'Select a image to upload',
            button: {
                text: 'Use this image',
            },
            multiple: false // Set to true to allow multiple files to be selected
        });

        // When an image is selected, run a callback.
        file_frame.on( 'select', function() {
            // We set multiple to false so only get one image from the uploader
            attachment = file_frame.state().get('selection').first().toJSON();
            // Do something with attachment.id and/or attachment.url here
            $( '#image-preview' ).attr( 'src', attachment.url ).css( 'width', 'auto' );
            $( '#image_attachment_id' ).val( attachment.id );
        });
            // Finally, open the modal
            file_frame.open();
    });

    if($('.color-picker').length) {
        $('.color-picker').spectrum({
            type: "component",
            hideAfterPaletteSelect: true,
            showButtons: false,
            allowEmpty: false
        });
    }

    $('body').on('click', '.add-item', function() {
        var element = $(this).closest('.items-list');
        var count = element.find('.item-content').length;

        if(count === 1 && element.find('.item-content').is(':hidden')) {
            element.find('.item-content').show();
            element.closest('.section_data').find('.head_items').show();
        } else {
            $(this).before($(element).find('.item-content:last').clone());
            $(element).find('.item-content:last').find('input').val('');
            var counter = parseInt($(element).find('.item-content:last').find('.number_element').text());

            counter++;
            $(element).find('.item-content:last').find('.number_element').text(counter);
        }
    });

    $("body").on("click",".delete_item",function(){
        var element = $(this).closest('.items-list');
        var count = element.find('.item-content').length;

        if(count === 1) {
            element.closest('.section_data').find('.head_items').hide();
            element.find('.item-content').hide();
            element.find('.item-content').find('input').val('');
            element.find('select option').removeAttr('selected').filter('[value=0]').attr('selected', true);
            element.find('.ss_dib.ss_text').text('No Product');
        } else {
            $(this).closest('.item-content').remove();
        }
    });

    $("body").on("click","a.change-table",function(){
        var table = $(this).data('table');

        $('.change-table').removeClass('active');
        $(this).addClass('active');

        $('.select-table').hide();
        $('#'+table).show();
    });

    if($('.help-icon.clicktips').length) {
        (function() {
            $(function() {
                $.tips({
                    action: 'click',
                    element: '.clicktips',
                    preventDefault: true
                });
            });
        }).call(this);
    }
});