<?php 
/*
*
* Plugin Name: Advanced Multiple Image Upload
* Description: This Plugin supports multiple file upload. 
* Author: Wings of web
* Text Domain: advanced-multiple-image-upload
* Version: 1.0
*/


// don't load directly
if (!defined('ABSPATH')) {
    die('-1');
}


/**
 * Register meta box(es).
 */
function rk_register_meta_boxes($post_type) {
	// Limit meta box to certain post types.
    $post_types = array( 'post','page' );
	
    add_meta_box( 'rk_upload_images', __( 'Upload Images', 'advanced-multiple-image-upload' ), 'rk_display_callback', $post_types,'advanced', 'high' );
	
}
add_action( 'add_meta_boxes', 'rk_register_meta_boxes' );
 
/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function rk_display_callback( $post ) {
 
	$value = esc_attr(get_post_meta( $post->ID, 'a_upload_images', true ));
	$data =array();
	if(!empty($value)){
	$data = explode(',',$value);
	}
	?>
				<div>
					<input type="text" name="a_upload" id="a_upload_images" value="<?php echo $value;?>" class="form-control regular-text"/>
					<a href="#" name="upload-btn" id="rk_images_upload" class="button"><?php _e('Upload Images');?></a>
			<div class="a_thumb_div" >
			<?php
			foreach($data as $v){
				$src = wp_get_attachment_image_src( $v );
			?>
			<span class="a_thumb_span"><img data="<?php echo $v;?>" width="100" height="80" src="<?php echo $src[0];?>"><i class="a_thumb_i">x</i></span>
			<?php } ?>
			</div>
				</div>
				
				<style>
	.a_thumb_div{margin-top:10px;display: inline-block;width: 100%;}
	.a_thumb_span{position:relative; float:left; margin-right:5px;}
	.a_thumb_i{position:absolute;right:2px;top:2px;background:#444;color:#fff;font-style:normal;height: 20px;width: 20px;text-align: center;border-radius: 50%;cursor: pointer;}
	</style>			

	<script type='text/javascript'>
	
	(function($){
    'use strict';
	$(document).ready(function(){
	 
    $('#rk_images_upload').click(function(e) {
        e.preventDefault();
		
		var frame;
		if ( frame ) {
		  frame.open();
		  return;
		}
        frame = wp.media({ 
            title: 'Upload Image',
             library : {
						type : 'image',
					  },
            multiple: 'add'
        });
		frame.on('open',function() {
		  var selection = frame.state().get('selection');
		  var ids = $('#a_upload_images').val().split(',');
		  if(ids!=''){
			ids.forEach(function(id) {	
			var attachment = wp.media.attachment(id);
			attachment.fetch();
			selection.add( attachment ? [ attachment ] : [] );
			});
		  }
		});
        frame.on('select', function(e){
            // This will return the selected image from the Media Uploader, the result is an object
            var images = frame.state().get('selection').models;
			var length = frame.state().get('selection').length;
			console.log(images);
			//var image_url
			var arr_id = new Array();
            $('.a_thumb_div').empty();
            for(var i = 0; i < length; i++)
			{

				arr_id[i]= images[i].id;
				var imgurl = images[i].attributes.url;
				$('.a_thumb_div').append('<span class="a_thumb_span"><img data="'+images[i].id+'" width="100" height="80" src="'+imgurl+'"><i class="a_thumb_i">x</i></span>');

			}
			var image_url = arr_id.toString();
				
            $('#a_upload_images').val(image_url);
			
        });
		frame.open();
    });
	
	
	//Del
	$(document).on('click', '.a_thumb_i', function(e){ 
	//$(".a_thumb_div").find(".a_thumb_i").click(function(e){
		e.preventDefault();
		var el = $(this).siblings('img').attr('data');
		var val = $('#a_upload_images').val();
	
		var explode = val.split(',');
		explode.remove(el);
		var image_url = explode.toString();
		
        $('#a_upload_images').val(image_url);
		$(this).parent().remove();
		
	});
});
})(jQuery);

Array.prototype.remove = function(el) {
    return this.splice(this.indexOf(el), 1);
    }
</script>

<?php
}
 
/**
 * Save meta box content.
 *
 * @param int $post_id Post ID
 */
function rk_save_meta_box( $post_id ) {
		
	$up = sanitize_text_field($_POST['a_upload']);
    update_post_meta( $post_id, 'a_upload_images', $up );
}
add_action( 'save_post', 'rk_save_meta_box' );

