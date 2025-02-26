<?php
/*
Plugin Name: Affiliate VideoHive Widget
Plugin URI: https://pluginsbay.com/plugin/videohive-widget
Description: Display VideoHive items as a WordPress widget with your affiliate links.
Author: StefanPejcic
Version: 1.0.2
Author URI: https://pluginsbay.com
Text Domain: affiliate-videohive-widget
Domain Path: /languages
License: GPL3
*/

define( 'PB_VH_PLUGIN_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );
define( 'PB_VH_PLUGIN_URI', trailingslashit( plugin_dir_url( __FILE__ ) ) );
define( 'PB_VH_WIDGET_VER', '1.0.2' );

/* Initialize Widget */
if ( !function_exists( 'pb_vh_widget_init' ) ):
    function pb_vh_widget_init() {
        require_once PB_VH_PLUGIN_DIR.'inc/class-videohive-widget.php';
        register_widget( 'PB_VideoHive_Widget' );
    }
endif;

add_action( 'widgets_init', 'pb_vh_widget_init' );

/* Load text domain */
function pb_load_vh_widget_text_domain() {
    load_plugin_textdomain( 'affiliate-videohive-widget', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}

add_action( 'plugins_loaded', 'pb_load_vh_widget_text_domain' );

?>