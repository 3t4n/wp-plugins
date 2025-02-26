//--------------------------------------------------------
//-- AWESOME GALLERY WIDGET ADMIN SCRIPT
//--------------------------------------------------------

// Gallery Image Upload
jQuery(function($){

	// Uploading files
	var file_frame;
 
	jQuery('body').on('click', '.agw-upload_button', function( event ){
		$this = $(this);
		$this.addClass('apple');

		event.preventDefault();

		// If the media frame already exists, reopen it.
		if ( file_frame ) {
			file_frame.open();
			return;
		}

		// Create the media frame.
		file_frame = wp.media.frames.file_frame = wp.media({
			title: 'Add Image to Widget',
			button: {
			text: 'Upload',
			},
			multiple: false  // Set to true to allow multiple files to be selected
		});

		// When an image is selected, run a callback.
		file_frame.on( 'select', function() {
			// We set multiple to false so only get one image from the uploader
			attachment = file_frame.state().get('selection').first().toJSON();
			console.log( attachment );
			$this.prev().val( attachment.url );
			$this.parent('li').css( 'background-image','url('+attachment.url+')' );
		});

		// Finally, open the modal
		file_frame.open();
	});
})

function agw_add_field(field){
	var clwID = jQuery(field).parents('.agw-container').find('input[name="clw-name"]').val();
	var indx  = jQuery(field).parents('.agw-container').find("li").size();
	var field_html = '<input type="hidden" name="'+clwID+'['+indx+']" value="" /><a class="\agw-upload_button\"></a>';
	field_html += '<a class="\agw_delimg dashicons dashicons-minus\" title="\delete\" onClick="\agw_del_field(this);\"></a><a class="\agw_addimg dashicons dashicons-plus\" title="\add\" onClick="\agw_add_field(this);\"></a>';
	jQuery(field).parent().after("<li style='display:none;'>" + field_html + "</li>");
	jQuery(field).parent().next().stop().fadeIn('100',function(){var counts = jQuery(".agw-container li").size();});
}

function agw_del_field( field ) {
	jQuery(field).parent().fadeOut('100', function(e){ jQuery(this).remove();});
}