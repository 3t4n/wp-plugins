<?php
/**
 * @package As Gallery
 */
/*
Plugin Name: As Gallery
Plugin URI: https://wordpress.org/plugins/as-gallery/
Description: As Gallery is a great plugin for adding image gallery for your site. There are various view options for the images
Version: 1.0
Author: https://www.facebook.com/anuislam.shohag.3
Author URI: https://www.facebook.com/anuislam.shohag.3
License: GPLv2 or later
*/

define( 'as_gallery_path', plugin_dir_path( __FILE__ ) );
define( 'as_gallery_url', plugins_url( '/', __FILE__ ) );

require_once( as_gallery_path . '/inc/as_shortcode.php' );
require_once( as_gallery_path . '/inc/asglcustompost.php' );
require_once( as_gallery_path . '/inc/as_gl_script.php' );
require_once( as_gallery_path . '/inc/as_post_column.php' );
require_once( as_gallery_path . '/inc/as_gl_options.php' );

if (function_exists('add_image_size')) {
	add_image_size( 'as_front_image', 750, 450, true );
}

if(!function_exists('as_gl_set_wd_ht')){
	function as_gl_set_wd_ht($url, $asclass = null, $asclose){   
		list($width, $height) = getimagesize($url);
		$ht = $height / 2;
		echo $asclass.'{
			width : '.$width.'px;
			height : '.$height.'px;
		}';
		if ($asclose == true) {
			echo $asclass.'{
				margin-top: -'.$ht.'px;
			}';
		}
	}
}
if(!function_exists('as_gl_hex_to_rgb')){
	function as_gl_hex_to_rgb($hex, $opacity){
		list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
		return $r.', '.$g.', '.$b.', '.$opacity;
	}
}
if (!function_exists('as_gl_all_options_resets')) {
	function as_gl_all_options_resets(){
		if (current_user_can( 'manage_options' ) === true) {
			if ($_POST['as_bool_val'] == 'yes') {
				delete_option( 'as_gl_sv_opt' ); 
				echo 'reset';
			}
		}
		die();
	}
	add_action('wp_ajax_as_gl_reset_options', 'as_gl_all_options_resets');
}
