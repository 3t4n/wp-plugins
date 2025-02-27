<?php
/*
* Plugin Name: HA Font Color Customizer
* Plugin URI: https://hiraansari.dev/wordpress-plugin/ha-font-color-customizer-wp-plugin/
* Author: Hira Ansari
* Author URI: https://HiraAnsari.dev
* Description: Customize Font Colors of body text, h1, h2, h3, h4, h5, h6, nav link, nav hover; dropdown menu link and hover; footer text, footer headings, button text, button hover.
* Version: 1.1.0
* License: GPLv2
* Licence URI: https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain: ha-font-color-customizer
*/

// If this file is called directly, abort.

if ( !defined( 'WPINC' ) ) {
	die;
}

// Check and Define Plugin Version

if ( ! defined( 'HFC_PLUGIN_VERSION' ) ) {
	
	define( 'HFC_PLUGIN_VERSION', '1.1.0' );
}

// Check and Define Directory Path

if ( ! defined( 'HFC_PLUGIN_DIR' ) ) {
	
	define( 'HFC_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}

// Enqueue Admin CSS File

if ( !function_exists( 'hfc_admin_enqueue_scripts' )) {

    function hfc_admin_enqueue_scripts() {
        wp_enqueue_style('hfc-style', plugin_dir_url( __FILE__ ) . '/css/hfc-main.css' );
}

add_action( 'admin_enqueue_scripts', 'hfc_admin_enqueue_scripts');
}

add_action( 'admin_notices', 'hfc_admin_notice' );
function hfc_admin_notice() {
$user_id = get_current_user_id();
if ( !get_user_meta( $user_id, 'true' ) && current_user_can( 'manage_options' ) )
echo  '<div class="notice notice-info is-dismissible"><p><big><strong>'.esc_html__('HA Font Color Customizer').'</strong>:</big> <a href="'.esc_html__('https://wordpress.org/support/plugin/ha-font-color-customizer/reviews/').'" class="button-info button button-secondary" target="_blank">'.esc_html__('Write a Review').'</a></p></div>';
}
  require HFC_PLUGIN_DIR.'/inc/hfc_css.php';
  require HFC_PLUGIN_DIR.'/inc/hfc_font-color_customizer.php';

?>