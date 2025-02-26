jQuery(document).ready(function($){

	$('.form-horizontal legend').click(function(){
		$(this).parent('.control-group').next('.block').fadeToggle();
	
	if( $('.slide_sign', this).html() == '-' ){
		console.log( $('.slide_sign', this).html() );
		$('.slide_sign', this).html('+');
	}else{
		console.log( $('.slide_sign', this).html() );
		$('.slide_sign', this).html('-');
		}
	})


	 $('#convert').iconpicker({
        iconset: 'glyphicon',
        icon: $('.icon_input_field').val(),
        rows: 5,
        cols: 5,
        placement: 'top'
    });
$('#convert').on('change', function(e) { 
    $('.tip_icon i').attr('class', ''); 
	$('.tip_icon i').addClass( e.icon );	
	$('.icon_input_field').val( e.icon );
	$('.tip_icon i').addClass( 'feat_icon' );
	$('.tip_icon i').addClass( 'glyphicon' );
});

	

// Uploading files
var file_frame;
 
  jQuery('.upl_button').live('click', function( event ){
 
    event.preventDefault();
 
    // If the media frame already exists, reopen it.
    if ( file_frame ) {
      file_frame.open();
      return;
    }
 
    // Create the media frame.
    file_frame = wp.media.frames.file_frame = wp.media({
      title: jQuery( this ).data( 'uploader_title' ),
      button: {
        text: jQuery( this ).data( 'uploader_button_text' ),
      },
      multiple: false  // Set to true to allow multiple files to be selected
    });
 
    // When an image is selected, run a callback.
    file_frame.on( 'select', function() {
      // We set multiple to false so only get one image from the uploader
      attachment = file_frame.state().get('selection').first().toJSON();
		$('.upl_url').val( attachment.url );
      // Do something with attachment.id and/or attachment.url here
    });
 
    // Finally, open the modal
    file_frame.open();
  });
	
	$('.trace').change(function(){		
		process_tip_data();
	})
	$('.trace').keyup(function(){		
		process_tip_data();
	})
	
	// initialize data
	/*
	$('.cont_margin_field').val('10px');
	$('.cont_padding_field').val('10px');
	$('.blocks_margin_field').val('10px');
	
	$('.title_size_field').val('30px');
	$('.title_align_field').val('center');
	
	$('.content_size_field').val('20px');
	$('.content_align_field').val('center');
	*/
	
	process_tip_data();
	
function process_tip_data(){
	
	$('.tip_container').css( 'padding', $('.cont_padding_field ').val() );
	$('.tip_container').css( 'margin', $('.cont_margin_field ').val() );
	
	$('.tip_container').css( 'border', $('.border_width_filed').val()+'px solid #'+$('.border_color_filed').val() );
	$('.tip_container').css( 'border-radius', $('.border_radius_filed').val()+'px' );
	$('.tip_container').css( '-webkit-border-radius', $('.border_radius_filed').val()+'px' );
	$('.tip_container').css( '-moz-border-radius', $('.border_radius_filed').val()+'px' );

	
	if( $('.icon_pos_field').val() == 'none' ){
		$('.tip_icon').css('display', 'none' );
	}else{
		$('.tip_icon').css('float', $('.icon_pos_field').val() );
		$('.tip_icon').css('display', 'block' );
	}
	
	
	$('.feat_icon').css( 'font-size', $('.icon_size_field').val() );

	$('.feat_icon').css( 'color', '#'+$('.icon_color_filed').val() );
	$('.feat_icon').css( 'margin', $('.icon_margin_field').val() );
	
	
	
	$('.tip_title, .tip_content').css( 'margin', $('.blocks_margin_field').val() );
	
	
	
	$('.tip_title').html( $('.tip_title_filed').val() );
	$('.tip_title').css( 'color', '#'+$('.title_color_filed').val() );
	$('.tip_title').css( 'font-size', $('.title_size_field').val() );
	$('.tip_title').css( 'line-height', $('.title_line_height_field').val() );
	$('.tip_title').css( 'text-align', $('.title_align_field').val() );
	
	$('.tip_content').html( $('.tip_content_filed').val() );
	$('.tip_content').css( 'color', '#'+$('.content_color_filed').val() );
	$('.tip_content').css( 'font-size', $('.content_size_field').val() );
	$('.tip_content').css( 'line-height', $('.content_line_height_field').val() );
	$('.tip_content').css( 'text-align', $('.content_align_field').val() );
	
	
	if( $('.bg_type_field').val() == 'image' ){
		$('.tip_preview').css( 'background', 'url( '+$('.upl_url').val()+' )' );
		$('.tip_preview').css( 'background-size', 'cover' );
	}
	if( $('.bg_type_field').val() == 'color' ){
		$('.tip_preview').css( 'background', '#'+$('.bg_color_filed').val() );
	}
}
	
}); // main jquery container
