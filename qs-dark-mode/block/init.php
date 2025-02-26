<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

include_once('inc/helper.php');
include_once('inc/block_render.php');
include_once('inc/block.php');

function get_js_localize_options(){

		 
	$options = [
	   
	   'active'                 => qs_dark_mode_active(),
	   'default'                => qs_dark_mode_default(),
	   'switch_enable'          => qs_dark_mode_switch_enable(),
	   'switch_preset'          => qs_dark_mode_switch_preset(),
	   'custom_element_exclude' => qs_dark_mode_custom_element_exclude(),
	   'custom_element_include' => qs_dark_mode_custom_element_include(),
	   'switch_light_image'     => function_exists('qs_dark_mode_switch_light_image')?qs_dark_mode_switch_light_image():'',
	   'switch_dark_image'      => function_exists('qs_dark_mode_switch_dark_image')? qs_dark_mode_switch_dark_image():'',
	   'switch_dark_text'       => qs_dark_mode_switch_dark_text(),
	   'switch_light_text'      => qs_dark_mode_switch_light_text(),
   

	   'theme_box_shadow'   => qs_dark_mode_theme_box_shadow(),
	   'background_color'   => qs_dark_mode_theme_background_color(),
	   'text_color'         => qs_dark_mode_theme_text_color(),
	   'image_opacity'      => qs_dark_mode_adv_image_opacity(),
	   'image_filter'       => qs_dark_mode_adv_image_filter(),
	   'image_filter_value' => qs_dark_mode_adv_image_filter_value(),
	   'adv_include_custom_element' => qs_dark_mode_adv_include_custom_element(),
	   'title_color'        => qs_dark_mode_theme_title_color(),
	   'icon_color'         => qs_dark_mode_theme_icon_color(),
	   'border_color'       => qs_dark_mode_theme_border_color(),
	   'link_color'         => qs_dark_mode_theme_link_color(),
	   'button_color'       => qs_dark_mode_theme_button_color(),
	   'switch_position'    => qs_dark_mode_switch_position(),
	  
	   'theme_custom_color' => function_exists('qs_dark_mode_theme_custom_color') ? qs_dark_mode_theme_custom_color(false):false,
	   'qs_dm_lite_version' => '1.0',
	   'qs_dark_mode_img'   => QS_DARK_MODE_IMG,
	   

   ];

   $return_options = apply_filters('qs_dm_localize_options',$options);
   
   return $return_options;
}

function qs_dark_mode_add_editor_styles() {
	
	if(qs_dark_mode_active()){
		
		wp_register_style( 'qs-dark-mode-fnd' , QS_DARK_MODE_PLUGIN_URL . 'assets/css/frontend.css' , array(),false, time());
		wp_enqueue_style('qs-dark-mode-fnd');
		wp_add_inline_style( 'qs-dark-mode-fnd', qs_dark_mode_get_front_css_content() );
		do_action( 'qs_dark_mode_fnd_custom_css', 'qs-dark-mode-fnd' );
	
	}
   
}

function qs_dark_mode_block_admin_head(){
  	
	if( !did_action( 'enqueue_block_editor_assets' ) ){
		return;
	}

  ?>
	<script>
		var qs_dm_obj = <?php echo json_encode( get_js_localize_options() ); ?>;  
		<?php echo qs_dark_mode_get_front_js_content(); ?>
	</script>
  <?php 
}
add_action( 'enqueue_block_editor_assets', 'qs_dark_mode_add_editor_styles' );
add_action( 'enqueue_block_assets', 'qs_Dark_mode_add_editor_styles' );
add_action( 'admin_head', 'qs_dark_mode_block_admin_head' );


