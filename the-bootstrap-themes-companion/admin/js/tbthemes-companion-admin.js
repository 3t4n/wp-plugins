jQuery(document).ready(function($){
    //image upload for sponsor
    var mediaUploader;

    $('.upload_image_button').click(function(e) {
        
		//alert(1);
        e.preventDefault();
        var mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });
        mediaUploader.on('select', function () {
            // This will return the selected image from the Media Uploader, the result is an object
            var uploaded_image = mediaUploader.state().get('selection').first();
            // We convert uploaded_image to a JSON object to make accessing it easier
            // Output to the console uploaded_image

            var image_url = uploaded_image.toJSON().url;

            if (imageholder) {
                imageholder.attr('src', image_url);
            }
            formvar.val(image_url);
            tb_remove();
        });
        formvar = jQuery(this).prev('.upload_image');

        imageholder = jQuery(this).parent().find('.image-holder img');
        mediaUploader.open();

        return false;

    });

	var template = $('.fieldset-logo #clone-input-list > li:last-child').clone();
    var sectionsCount = 1;

	jQuery(".btn-add-logo ").on('click', function() {

		jQuery(".fieldset-logo #clone-input-list > li:last-child").clone(true).insertAfter(".fieldset-logo #clone-input-list > li:last-child");

        jQuery(".fieldset-logo #clone-input-list > li:last-child .upload_image").val('');
		jQuery(".fieldset-logo #clone-input-list > li:last-child .image-holder img").attr("src", "");
        jQuery(".fieldset-logo #clone-input-list > li:last-child .image_link").val("");

        return false;
    });

	jQuery(".btn-remove").click(function () {
		jQuery(this).parent().remove();
	});


});