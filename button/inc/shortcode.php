<?php 
if ( ! defined( 'ABSPATH' ) ) exit;

add_action('wp_head','button_custom_css');
function button_custom_css(){

}

// shortcode
add_shortcode( 'WD_Button', 'button_shortcode' );

function button_shortcode( $post ){
	ob_start();

	$post_id 	=	$post['id'];
	$button_ids 	= 	explode( ",", $post_id );

	foreach( $button_ids as $id ){

		if(isset($id)){

			$custom_data = get_post_meta($id,'button_custom_setting_'.$id, true);
				
			$custom_data = json_decode($custom_data);


			$button_bg_color_start 			= button_rgba_color( $custom_data->button_bg_color_start, $custom_data->opacity_start);

			$button_bg_color_end 			= button_rgba_color( $custom_data->button_bg_color_end, $custom_data->opacity_end);

			$button_bg_hover_color_start 	= button_rgba_color( $custom_data->button_bg_hover_color_start, $custom_data->hover_opacity_start);

			$button_bg_hover_color_end 		= button_rgba_color( $custom_data->button_bg_hover_color_end, $custom_data->hover_opacity_end);

			if( $custom_data->button_layout == "simple_button" ){

				require( BUTTON_PATH.'inc/button-layouts/simple-button/simple-button.php' );

			}			
		}
	}

	return ob_get_clean();
}