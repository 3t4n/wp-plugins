<?php
/**
 * Plugin Name: Toggle box
 * Plugin URI: http://wordpress.org/extend/plugins/toggle-box/
 * Description: This is an awesome custom plugin which adds toggle box functionality in to your theme themes.
 * Author: phantom.omaga
 * Author URI: http://profiles.wordpress.org/users/phantom.omaga/
 * Version: 1.6
**/

//*************************** Toggle Boxes Short Code ***************************//

function togglebox($atts, $content = null) {
	extract(shortcode_atts(array(
        'title'      => '',
    ), $atts));

	$out .= '<h3 class="toggle"><strong><a href="#">' .$title. '</a></strong></h3>';
	$out .= '<div class="toggle-box" style="display: none;"><p>';
	$out .= do_shortcode($content);
	$out .= '</p></div>';

   return $out;
}

add_shortcode('toggle', 'togglebox');


//*************************** Tiny Mce Button Code  ***************************//

add_action('init', 'add_button');  

function add_button() {  
   if ( current_user_can('edit_posts') &&  current_user_can('edit_pages') )  
   {  
	 add_filter('mce_external_plugins', 'add_plugin');  
	 add_filter('mce_buttons', 'register_button');  
   }  
}  
	
function register_button($buttons) {  
   array_push($buttons, "toggle");  
   return $buttons;  
}  

function add_plugin($plugin_array) {  
   $plugin_array['toggle'] = plugins_url('js/mce.js', __FILE__);
   return $plugin_array;  
}  
//*************************** Get Plugin URL  ***************************//

function get_pluginurl() {
// WP < 2.6
if ( !function_exists('plugins_url') )
	return get_option('siteurl') . '/wp-content/plugins/' . plugin_basename(dirname(__FILE__));
	return plugins_url(plugin_basename(dirname(__FILE__)));
}

//*************************** Calls Toggle Box css and js***************************//

add_action( 'init', 'toggle_box_init' );
function toggle_box_init() {
    if ( ! is_admin() ) {
        wp_enqueue_script( 'toggle-box', plugins_url( 'toggle-box' ) . '/js/toggle-box.js', array( 'jquery' ) );
		wp_enqueue_style( 'toggle-box', plugins_url( 'toggle-box' ) . '/toggle-box.css' );
    }
}

//add_action('wp_head', 'add_togglebox');
?>