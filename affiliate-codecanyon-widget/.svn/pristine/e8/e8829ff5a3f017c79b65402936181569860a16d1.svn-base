<?php
/*
Plugin Name: Affiliate CodeCanyon Widget
Plugin URI: https://wpxss.com/wordpress-plugins/codecanyon-widget
Description: Display CodeCanyon items as a WordPress widget with your affiliate links.
Author: StefanPejcic
Version: 1.1
Author URI: https://wpxss.com
Text Domain: affiliate-codecanyon-widget
Domain Path: /languages
License: GPL3
*/

define( 'PB_CC_PLUGIN_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );
define( 'PB_CC_PLUGIN_URI', trailingslashit( plugin_dir_url( __FILE__ ) ) );
define( 'PB_CC_WIDGET_VER', '1.1' );

/* Initialize Widget */
if ( !function_exists( 'pb_cc_widget_init' ) ):
    function pb_cc_widget_init() {
        require_once PB_CC_PLUGIN_DIR.'inc/class-codecanyon-widget.php';
        register_widget( 'PB_CodeCanyon_Widget' );
    }
endif;

add_action( 'widgets_init', 'pb_cc_widget_init' );

/* Load text domain */
function pb_load_cc_widget_text_domain() {
    load_plugin_textdomain( 'affiliate-codecanyon-widget', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}

add_action( 'plugins_loaded', 'pb_load_cc_widget_text_domain' );

?>