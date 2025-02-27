	jQuery(document).ready(function(){
		
		var fileFrame;
		jQuery('.upload_image_button').on('click', function(e){
			e.preventDefault();
			
			element = jQuery(this);
			id = jQuery(element).attr('data-id');
			
			if(fileFrame){
				fileFrame.open();
				return;
			}
			
			fileFrame = wp.media.frames.file_frame = wp.media({
				tile: jQuery(this).data('uploader_title'),
				button: {
					text: jQuery(this).data('uploader_button_text')
				},
				multiple: false,
				library: { type: 'image' }
			});
			
			fileFrame.on('select', function(){
				attachment = fileFrame.state().get('selection').first().toJSON();
				
				if(attachment.url){					
					jQuery('input[name="logo_invoice' + id + '"]').val(attachment.url);
					jQuery('#preview_img' + id).attr('src', attachment.url).fadeIn();
					jQuery(element).parent().find('.remove_img').show();
				}
			});
			
			fileFrame.open();
		});
		
		jQuery('.remove_img').on('click',function(e){
			e.preventDefault();
			
			element = jQuery(this);
			id = jQuery(element).attr('data-id');
			image = jQuery('#preview_img' + id);
			
			jQuery('input[name="logo_invoice' + id + '"]').val('');
			jQuery(image).fadeOut();
			jQuery(element).hide();
			
		});		
	});



