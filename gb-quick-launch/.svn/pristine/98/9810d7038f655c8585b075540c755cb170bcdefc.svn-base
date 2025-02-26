jQuery(document).ready(function(){
    //every type change
    jQuery("#gbql-button-type").on("change",gbqlTypechange);
    jQuery("select[name='gbql_main_position']").on("change",function(){gbqlPositionChange(jQuery(this).find('option:selected').val());});
    jQuery(".gbql-show-in button").on("click",function(){gbqlShowInChange(jQuery(this))});

    jQuery('.gbql-color-picker').each(function(){
        jQuery(this).wpColorPicker();
    });
});

//every type change activate the right fieldset
function gbqlTypechange(){
    var type = jQuery("#gbql-button-type").val();
    if(type != '' && jQuery(".gbql-code").length && jQuery(".gbql-code").find(".gbql-type-"+type).length){
        jQuery(".gbql-code").find(".active").removeClass("active");
        jQuery(".gbql-code").find(".gbql-type-"+type).addClass("active");
        jQuery('.gbql-code').attr('data-type',type);
    }
}

//check if Position Change on admin page & open custom css to page
function gbqlPositionChange(position){
    if(position != 'custom'){
        jQuery(document).find('.gbql-custom-css').remove();
    }else{
        let custom_css_wrap = jQuery('<div class="gbql-custom-css"></div>');
        let custom_top = jQuery('<span class="custom-top-wrap"></span>');
        let custom_left = jQuery('<span class="custom-left-wrap"></span>');
        custom_css_wrap.append(jQuery('<div class="custom-css-top"></div>'));
        custom_css_wrap.append(jQuery('<div class="custom-css-left"></div>'));
        custom_top.append(jQuery('<input type="number" name="custom-css-top">'));
        custom_left.append(jQuery('<input type="number" name="custom-css-left">'));
        custom_css_wrap.find(".custom-css-top").append(custom_top);
        custom_css_wrap.find(".custom-css-left").append(custom_left);
        jQuery(document).find('select[name="gbql_main_position"]').after(custom_css_wrap);
    }
}

//set the GBQuickLaunch button view
function gbqlShowInChange(button){
    button.toggleClass('active');
    var view = 0;
    if(button.closest('.gbql-show-in').find('.gbql-desktop').is('.active') && button.closest('.gbql-show-in').find('.gbql-mobile').is('.active')){
        view = 3;
    }
    if(button.closest('.gbql-show-in').find('.gbql-desktop').is(':not(.active)') && button.closest('.gbql-show-in').find('.gbql-mobile').is('.active')){
        view = 2;
    }
    if(button.closest('.gbql-show-in').find('.gbql-desktop').is('.active') && button.closest('.gbql-show-in').find('.gbql-mobile').is(':not(.active)')){
        view = 1;
    }

    button.closest('.gbql-show-in').find('input[name="gbql_view_on"]').val(view);
}

jQuery(function($){

    // Set all variables to be used in scope
    var frame,
        metaBox = $('.gb-media'), // Your meta box id here
        addImgLink = metaBox.find('.gb-media-upload-img'),
        delImgLink = metaBox.find( '.gb-media-delete-img'),
        imgContainer = metaBox.find( 'figure'),
        imgIdInput = metaBox.find( '.gb-media-img-id' );

    // ADD IMAGE LINK
    addImgLink.on( 'click', function( event ){

        event.preventDefault();

        // If the media frame already exists, reopen it.
        if ( frame ) {
            frame.open();
            return;
        }

        // Create a new media frame
        frame = wp.media({
            title: 'Select or Upload Media Of Your Chosen Persuasion',
            button: {
                text: 'Use this media'
            },
            multiple: false  // Set to true to allow multiple files to be selected
        });


        // When an image is selected in the media frame...
        frame.on( 'select', function() {

            // Get media attachment details from the frame state
            var attachment = frame.state().get('selection').first().toJSON();

            // Send the attachment URL to our custom image input field.
            imgContainer.append( '<img src="'+attachment.url+'" alt="" style="max-width:100%;"/>' );

            // Send the attachment id to our hidden input
            imgIdInput.val( attachment.id );

            // Hide the add image link
            addImgLink.addClass( 'hidden' );

            // Unhide the remove image link
            delImgLink.removeClass( 'hidden' );
        });

        // Finally, open the modal on click
        frame.open();
    });


    // DELETE IMAGE LINK
    delImgLink.on( 'click', function( event ){

        event.preventDefault();

        // Clear out the preview image
        imgContainer.html( '' );

        // Un-hide the add image link
        addImgLink.removeClass( 'hidden' );

        // Hide the delete image link
        delImgLink.addClass( 'hidden' );

        // Delete the image id from the hidden input
        imgIdInput.val( '' );

    });

});