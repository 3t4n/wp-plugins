jQuery( document ).ready(function( $ ) {

	// Media Uploader
	$( document ).on( 'click', '.wp-amc-img-uploader', function() {
		
		var imgfield, showfield;
		imgfield			= jQuery(this).prev('input').attr('id');
		showfield 			= jQuery(this).parents('td').find('.wp-amc-imgs-preview');
		var multiple_img	= jQuery(this).attr('data-multiple');
		multiple_img 		= (typeof(multiple_img) != 'undefined' && multiple_img == 'true') ? true : false;
		
		if( typeof wp == "undefined" || WpAmcAdmin.new_ui != '1' ) { // check for media uploader
			
			tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
	    	
			window.original_send_to_editor = window.send_to_editor;
			window.send_to_editor = function(html) {
				
				if(imgfield)  {
					
					var mediaurl = $('img',html).attr('src');
					$('#'+imgfield).val(mediaurl);
					showfield.html('<img src="'+mediaurl+'" />');
					tb_remove();
					imgfield = '';
					
				} else {
					window.original_send_to_editor(html);
				}
			};
	    		return false;
		      
		} else {
			
			var file_frame;
			//window.formfield = '';
			
			//new media uploader
			var button = jQuery(this);
		
			// If the media frame already exists, reopen it.
			if ( file_frame ) {
				file_frame.open();
			  return;
			}

			if( multiple_img == true ) {
				
				// Create the media frame.
				file_frame = wp.media.frames.file_frame = wp.media({
					title: button.data( 'title' ),
					button: {
						text: button.data( 'button-text' ),
					},
					multiple: true  // Set to true to allow multiple files to be selected
				});
				
			} else {
				
				// Create the media frame.
				file_frame = wp.media.frames.file_frame = wp.media({
					frame: 'post',
					state: 'insert',
					title: button.data( 'title' ),
					button: {
						text: button.data( 'button-text' ),
					},
					multiple: false  // Set to true to allow multiple files to be selected
				});
			}
			
			file_frame.on( 'menu:render:default', function(view) {
		        // Store our views in an object.
		        var views = {};
				
		        // Unset default menu items
		        view.unset('library-separator');
		        view.unset('gallery');
		        view.unset('featured-image');
		        view.unset('embed');
				
		        // Initialize the views in our view object.
		        view.set(views);
		    });

			// When an image is selected, run a callback.
			file_frame.on( 'select', function() {
				
				// Get selected size from media uploader
				var selected_size = $('.attachment-display-settings .size').val();
				var selection = file_frame.state().get('selection');
				
				selection.each( function( attachment, index ) {
					
					attachment = attachment.toJSON();

					// Selected attachment url from media uploader
					var attachment_id = attachment.id ? attachment.id : '';
					if( attachment_id && attachment.sizes && multiple_img == true ) {
						
						var attachment_url 			= attachment.sizes.thumbnail ? attachment.sizes.thumbnail.url : attachment.url;
						var attachment_edit_link	= attachment.editLink ? attachment.editLink : '';

						showfield.append('\
							<div class="wp-amc-img-wrp">\
								<div class="wp-amc-img-tools wp-amc-hide">\
									<span class="wp-amc-tool-icon wp-amc-edit-img dashicons dashicons-edit" title="'+WpAmcAdmin.img_edit_popup_text+'"></span>\
									<a href="'+attachment_edit_link+'" target="_blank" title="'+WpAmcAdmin.attachment_edit_text+'"><span class="wp-amc-tool-icon wp-amc-edit-attachment dashicons dashicons-visibility"></span></a>\
									<span class="wp-amc-tool-icon wp-amc-del-tool wp-amc-del-img dashicons dashicons-no" title="'+WpAmcAdmin.img_delete_text+'"></span>\
								</div>\
								<img class="wp-amc-img" src="'+attachment_url+'" alt="" />\
								<input type="hidden" class="wp-amc-attachment-no" name="wp_amc_img[]" value="'+attachment_id+'" />\
							</div>\
								');
						showfield.find('.wp-amc-img-placeholder').hide();
					}
				});
			});
			
			// When an image is selected, run a callback.
			file_frame.on( 'insert', function() {
				
				// Get selected size from media uploader
				var selected_size = $('.attachment-display-settings .size').val();
				
				var selection = file_frame.state().get('selection');
				selection.each( function( attachment, index ) {
					attachment = attachment.toJSON();
					
					// Selected attachment url from media uploader
					var attachment_url = attachment.sizes[selected_size].url;
					
					// place first attachment in field
					$('#'+imgfield).val(attachment_url);
					showfield.html('<img src="'+attachment_url+'" />');
				});
			});
			
			// Finally, open the modal
			file_frame.open();
		}
	});
	
	
	// Remove Single Gallery Image
	$(document).on('click', '.wp-amc-del-img', function(){
		
		$(this).closest('.wp-amc-img-wrp').fadeOut(300, function(){ 
			$(this).remove();
			
			if( $('.wp-amc-img-wrp').length == 0 ){
				$('.wp-amc-img-placeholder').show();
			}
		});
	});

	// Remove All Gallery Image
	$(document).on('click', '.wp-amc-del-gallery-imgs', function() {

		var ans = confirm('Are you sure to remove all images from this gallery!');

		if(ans){
			$('.wp-amc-gallery-imgs-wrp .wp-amc-img-wrp').remove();
			$('.wp-amc-img-placeholder').fadeIn();
		}
	});

	// Image ordering (Drag and Drop)
	$('.wp-amc-gallery-imgs-wrp').sortable({
		items: '.wp-amc-img-wrp',
		cursor: 'move',
		scrollSensitivity:40,
		forcePlaceholderSize: true,
		forceHelperSize: false,
		helper: 'clone',
		opacity: 0.8,
		placeholder: 'wp-amc-gallery-placeholder',
		containment: '.wp-amc-post-sett-table',
		start:function(event,ui){
			ui.item.css('background-color','#f6f6f6');
		},
		stop:function(event,ui){
			ui.item.removeAttr('style');
		}
	});

	// Open Attachment Data Popup
	$(document).on('click', '.wp-amc-img-wrp .wp-amc-edit-img', function(){
		
		$('.wp-amc-img-data-wrp').show();
		$('.wp-amc-popup-overlay').show();
		$('body').addClass('wp-amc-no-overflow');
		$('.wp-amc-img-loader').show();

		var current_obj 	= $(this);
		var attachment_id 	= current_obj.closest('.wp-amc-img-wrp').find('.wp-amc-attachment-no').val();

		var data = {
                        action      	: 'wp_amc_get_attachment_edit_form',
                        attachment_id   : attachment_id
                    };
        $.post(ajaxurl,data,function(response) {
			var result = $.parseJSON(response);
			
			if( result.success == 1 ) {
				$('.wp-amc-img-data-wrp  .wp-amc-popup-body-wrp').html( result.data );
				$('.wp-amc-img-loader').hide();
			}
        });
	});

	// Close Popup
	$(document).on('click', '.wp-amc-popup-close', function(){
		wp_amc_hide_popup();
	});

	// `Esc` key is pressed
	$(document).keyup(function(e) {
		if (e.keyCode == 27) {
			wp_amc_hide_popup();
		}
	});

	// Save Attachment Data
	$(document).on('click', '.wp-amc-save-attachment-data', function(){
		var current_obj = $(this);
		current_obj.attr('disabled','disabled');
		current_obj.parent().find('.spinner').css('visibility', 'visible');

		var data = {
                        action      	: 'wp_amc_save_attachment_data',
                        attachment_id   : current_obj.attr('data-id'),
                        form_data		: current_obj.closest('form.wp-amc-attachment-form').serialize()
                    };
        $.post(ajaxurl,data,function(response) {
			var result = $.parseJSON(response);
			
			if( result.success == 1 ) {
				current_obj.closest('form').find('.wp-amc-success').html(result.msg).fadeIn().delay(3000).fadeOut();
			} else if( result.success == 0 ) {
				current_obj.closest('form').find('.wp-amc-error').html(result.msg).fadeIn().delay(3000).fadeOut();
			}
			current_obj.removeAttr('disabled','disabled');
			current_obj.parent().find('.spinner').css('visibility', '');
        });
	});


});

// Function to hide popup
function wp_amc_hide_popup() {
	jQuery('.wp-amc-img-data-wrp').hide();
	jQuery('.wp-amc-popup-overlay').hide();
	jQuery('body').removeClass('wp-amc-no-overflow');
	jQuery('.wp-amc-img-data-wrp  .wp-amc-popup-body-wrp').html('');
}