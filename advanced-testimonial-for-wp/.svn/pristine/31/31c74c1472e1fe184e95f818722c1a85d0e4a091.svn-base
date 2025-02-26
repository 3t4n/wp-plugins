jQuery(function(jQuery) {
	
	//UPLOAD SINGLE IMAGE
	
	if ( ! jQuery('.custom_upload_image').val() )
	{
		jQuery('.itt_testimonial_remove_image_button').hide();
	}

	// Uploading files
	var file_frame;

	jQuery(document).on( 'click', '.itt_testimonial_upload_image_button', function( event ){

		event.preventDefault();
		
		formfield = jQuery(this).siblings('.custom_upload_image');
		preview = jQuery(this).siblings('.custom_preview_image');
		
		// If the media frame already exists, reopen it.
		if ( file_frame ) {
			file_frame.open();
			return;
		}

		// Create the media frame.
		file_frame = wp.media.frames.downloadable_file = wp.media({
			title: 'Choose image',
			button: {
				text: 'Use image'
			},
			multiple: false
		});

		file_frame.on('open', function() {
			
			var selection = file_frame_gallery.state().get('selection');
			
			
			ids = formfield.val().split(',');
				ids.forEach(function(id) {
					attachment = wp.media.attachment(id);
					attachment.fetch();
					selection.add( attachment ? [ attachment ] : [] );
				});
			//}
			
		});
		
		// When an image is selected, run a callback.
		file_frame.on( 'select', function() {
			attachment = file_frame.state().get('selection').first().toJSON();
			formfield.val( attachment.id );
            preview.attr('src' ,attachment.url);
			jQuery('.itt_testimonial_remove_image_button').show();
            itt_testimonial_shortcode_builder();
            itt_testimonial_shortcode_preview();
		});

		// Finally, open the modal.
		file_frame.open();

	});

	jQuery(document).on( 'click', '.itt_testimonial_remove_image_button', function( event ){
		
		formfield = jQuery(this).siblings('.custom_upload_image');
		preview = jQuery(this).siblings('.custom_preview_image');
	
		formfield.attr('value' ,'');
        preview.attr('src' ,'');

		jQuery(this).hide();
        itt_testimonial_shortcode_builder();
        itt_testimonial_shortcode_preview();
		return false;
	});
	
	
	
	///IMAGE GALLERY
	if ( ! jQuery('.custom_upload_imagegallery').val() )
	{
		jQuery('.itt_testimonial_remove_imagegallery_button').hide();
	}

	// Uploading files
	var file_frame_gallery;

	jQuery(document).on( 'click', '.itt_testimonial_upload_imagegallery_button', function( event ){

		event.preventDefault();
		
		formfield = jQuery(this).siblings('.custom_upload_imagegallery');
		preview = jQuery(this).siblings('.custom_preview_imagegallery');
		
		// If the media frame already exists, reopen it.
		if ( file_frame_gallery ) {
			file_frame_gallery.open();
			return;
		}

		// Create the media frame.
		file_frame_gallery = wp.media.frames.downloadable_file = wp.media({
			title: 'Add Image to Gallery',
			button: {
				text: 'Insert to Gallery'
			},
			multiple : true
		});
		
		file_frame_gallery.on('open', function() {
			
			var selection = file_frame_gallery.state().get('selection');
			ids = formfield.val().split(',');
			ids.forEach(function(id) {
				attachment = wp.media.attachment(id);
				attachment.fetch();
				selection.add( attachment ? [ attachment ] : [] );
			});
		});
		

		// When an image is selected, run a callback.
		file_frame_gallery.on( 'select', function() {

			var selection_image=Array();
			var selection_items_dom='';
			var i=0;
			var selection = file_frame_gallery.state().get('selection');
			selection.map( function( attachment ) {	
		 		if(attachment.id!='' && attachment.id!=null && attachment.url!='' && attachment.url!=null )
				{
					attachment = attachment.toJSON();
					//selection_image[i++]=attachment.id+"@"+attachment.url;
					selection_image[i++]=attachment.id;
					
					selection_items_dom+="<div style='float:left'><div class='del_imagegallery'>X</div><img src='"+attachment.url+"' class='custom_preview_imagegallery' width='100' height='100' data-id='"+attachment.id+"'/></div>";
					
				}
			});
			
			formfield.val( selection_image.join(",") );
			jQuery("#itt_testimonial_upload_imagegallery_items").html(selection_items_dom);
			
			jQuery('.itt_testimonial_remove_imagegallery_button').show();
		});

		// Finally, open the modal.
		file_frame_gallery.open();
	});
	
	jQuery(document).on( 'click',".del_imagegallery",function(){
		
		var val=jQuery(".custom_upload_imagegallery").val();
		val=val.replace(jQuery(this).siblings("img").attr("data-id")+",", "");
		val=val.replace(jQuery(this).siblings("img").attr("data-id"), "");
		jQuery(".custom_upload_imagegallery").val(val);
		jQuery(this).parent().remove();
		
		if(val=='')
		{
			jQuery('.itt_testimonial_remove_imagegallery_button').hide();
		}
		
	});
	
	jQuery(document).on( 'click', '.itt_testimonial_remove_imagegallery_button', function( event ){
		
		formfield = jQuery(this).siblings('.custom_upload_imagegallery');
		preview = jQuery(this).siblings('.custom_preview_imagegallery');
	
		formfield.val('');
		preview.attr('src', '' );
		jQuery(this).siblings('.itt_testimonial_remove_imagegallery_button').hide();
		jQuery("#itt_testimonial_upload_imagegallery_items").html('');
		return false;
	});

    // shortcode builder ajax
    function itt_testimonial_shortcode_builder(){
        var data = {
            action : "itt_testimonial_shortcode_builder",
            postdata : jQuery("#itt_shortcode_generator_form").serialize()
        };
        jQuery.post(ajax_object.ajax_url, data, function(response){
            // show shortcode in box
            jQuery("#itt_shortcode_box_testi").html(response);
        });
        return true;
    }

    function itt_testimonial_shortcode_preview(){
        var data = {
            action : "itt_testimonial_preview",
            postdata : jQuery("#itt_shortcode_generator_form").serialize()
        };
        jQuery.post(ajax_object.ajax_url, data, function(response){
            // show shortcode in box
            jQuery("#itt_testimonial_preview div").html(response);

        });
        return true;
    }

    jQuery("#itt_custom_cat.itt_inputs_testi").live('change',function(){
        jQuery("[id$=cat_box] input[type=checkbox]").removeAttr('checked');
    });
    jQuery("#itt_effect.itt_inputs_testi").live('change',function(){
        jQuery("[id$=effect_box] input[type=checkbox]").removeAttr('checked');
    });
    jQuery(".itt_inputs_testi").live("change",function(){
        itt_testimonial_shortcode_builder();
        itt_testimonial_shortcode_preview();
    });
    jQuery("#itt_shortcode_box_testi").live("focus",function(){
        itt_testimonial_shortcode_builder();
        itt_testimonial_shortcode_preview();
    });
    // ajax preview
    //
    // color picker
    jQuery(".wp_ad_picker_color").wpColorPicker();
    // shortcode tabs
    jQuery("#tabsholder").tytabs({
        tabinit:"1",
        fadespeed:"fast"
    });

    jQuery("body").on( 'click' ,function (e) {
        if (!jQuery(e.target).is(".colour-picker, .iris-picker, .iris-picker-inner") && jQuery('.wp-color-result').hasClass("wp-picker-open") ) {
            itt_testimonial_shortcode_builder();
            itt_testimonial_shortcode_preview();
            return false;
        }
    });
});