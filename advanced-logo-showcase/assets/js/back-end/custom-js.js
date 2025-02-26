jQuery(function(jQuery) {
	
	//UPLOAD SINGLE IMAGE
	
	if ( ! jQuery('.custom_upload_image').val() )
	{
		jQuery('.itls_logo_showcase_remove_image_button').hide();
	}

	// Uploading files
	var file_frame;

	jQuery(document).on( 'click', '.itls_logo_showcase_upload_image_button', function( event ){

		event.preventDefault();
		
		formfield = jQuery(this).siblings('.custom_upload_image');
		preview = jQuery(this).siblings('.custom_preview_video');
		
		// If the media frame already exists, reopen it.
		if ( file_frame ) {
			file_frame.open();
			return;
		}

		// Create the media frame.
		file_frame = wp.media.frames.downloadable_file = wp.media({
			title: 'Choose Video',
			button: {
				text: 'Use Video'
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
			preview.html(attachment.name);
			jQuery('.itls_logo_showcase_remove_image_button').show();
		});

		// Finally, open the modal.
		file_frame.open();

	});

	jQuery(document).on( 'click', '.itls_logo_showcase_remove_image_button', function( event ){
		
		formfield = jQuery(this).siblings('.custom_upload_image');
		preview = jQuery(this).siblings('.custom_preview_video');
	
		formfield.val('');
		preview.html('');

		jQuery(this).hide();
		return false;
	});
	
	
	
	///IMAGE GALLERY
	if ( ! jQuery('.custom_upload_imagegallery').val() )
	{
		jQuery('.itls_logo_showcase_remove_imagegallery_button').hide();
	}

	// Uploading files
	var file_frame_gallery;

	jQuery(document).on( 'click', '.itls_logo_showcase_upload_imagegallery_button', function( event ){

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
			jQuery("#itls_logo_showcase_upload_imagegallery_items").html(selection_items_dom);
			
			jQuery('.itls_logo_showcase_remove_imagegallery_button').show();
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
			jQuery('.itls_logo_showcase_remove_imagegallery_button').hide();
		}
		
	});
	
	jQuery(document).on( 'click', '.itls_logo_showcase_remove_imagegallery_button', function( event ){
		
		formfield = jQuery(this).siblings('.custom_upload_imagegallery');
		preview = jQuery(this).siblings('.custom_preview_imagegallery');
	
		formfield.val('');
		preview.attr('src', '' );
		jQuery(this).siblings('.itls_logo_showcase_remove_imagegallery_button').hide();
		jQuery("#itls_logo_showcase_upload_imagegallery_items").html('');
		return false;
	});

    // shortcode builder ajax
    function itls_logo_showcase_shortcode_builder(){
        var data = {
            action : "itls_shortcode_builder",
            postdata : jQuery("#itls_shortcode_generator_form").serialize()
        };
        jQuery.post(ajax_object.ajax_url, data, function(response){
            // show shortcode in box
            jQuery("#itls_shortcode_box").html(response);
        });
        return true;
    }

    jQuery("#itls_custom_cat.itls_inputs").live('change',function(){
        jQuery("[id$=cat_box] input[type=checkbox]").removeAttr('checked');
    });
    jQuery("#itls_effect.itls_inputs").live('change',function(){
        jQuery("[id$=effect_box] input[type=checkbox]").removeAttr('checked');
    });
    jQuery("#itls_shortcode_box").focus(function(){
        itls_logo_showcase_shortcode_builder();
    });
    jQuery(".itls_inputs").live("change",function(){
        itls_logo_showcase_shortcode_builder();
    });
    itls_logo_showcase_shortcode_builder();
    //
    // color picker
    jQuery(".wp_ad_picker_color").wpColorPicker();
    // ajax preview
    function itls_logo_showcase_shortcode_preview(){
        var data = {
            action : "itls_preview",
            postdata : jQuery("#itls_shortcode_generator_form").serialize()
        };
        jQuery.post(ajax_object.ajax_url, data, function(response){
            // show shortcode in box
            jQuery("#itls_preview div").html(response);
        });
        return true;
    }
    jQuery(".itls_inputs").live("change",function(){
        itls_logo_showcase_shortcode_preview();
    });
    itls_logo_showcase_shortcode_preview();

    // shortcode tabs
    jQuery("#tabsholder").tytabs({
        tabinit:"1",
        fadespeed:"fast"
    });
});

