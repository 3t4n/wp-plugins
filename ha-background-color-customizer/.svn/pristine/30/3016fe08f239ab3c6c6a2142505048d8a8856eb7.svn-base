<?php
/*
* Plugin Name: HA Background Color Customizer
* Plugin URI: https://hiraansari.dev/wordpress-plugin/ha-background-color-customizer-wp-plugin/
* Author: Hira Ansari
* Author URI: https://HiraAnsari.dev
* Description: Customize Background color of page body, header, footer, nav/nav:hover, button/button:hover, dropdown menu, dropdown tab hover. 
* Version: 1.1.1
* License: GPLv2
* Licence URI: https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain: ha-background-color-customizer
*/

// If this file is called directly, abort.

if ( !defined( 'WPINC' ) ) {
	die;
}

// Check and Define Plugin Version

if ( ! defined( 'HABC_PLUGIN_VERSION' ) ) {
	
	define( 'HABC_PLUGIN_VERSION', '1.1.1' );
}

// Check and Define Directory Path

if ( ! defined( 'HABC_PLUGIN_DIR' ) ) {
	
	define( 'HABC_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}

// Enqueue Admin CSS File

if ( !function_exists( 'habc_admin_enqueue_scripts' )) {

    function habc_admin_enqueue_scripts() {
        wp_enqueue_style('habc-style', plugin_dir_url( __FILE__ ) . '/assets/css/habc-main.css' );
}

add_action( 'admin_enqueue_scripts', 'habc_admin_enqueue_scripts');

}

add_action( 'admin_notices', 'hbc_admin_notice' );

function hbc_admin_notice() {
$user_id = get_current_user_id();
if ( !get_user_meta( $user_id, 'true' ) && current_user_can( 'manage_options' ) )
echo  '<div class="notice notice-info is-dismissible"><p><big><strong>'.esc_html__('HA Background Color Customizer').'</strong>:</big> <a href="'.esc_html__('https://wordpress.org/support/plugin/ha-background-color-customizer/reviews/').'" class="button-info button button-secondary" target="_blank">'.esc_html__('Write a Review').'</a></p></div>';
}


//  require HABC_PLUGIN_DIR.'/inc/habc_customizer.php';
  require HABC_PLUGIN_DIR.'/inc/habc_css.php';
  require HABC_PLUGIN_DIR.'/inc/habc_bg_color_customizer.php';
 
?>