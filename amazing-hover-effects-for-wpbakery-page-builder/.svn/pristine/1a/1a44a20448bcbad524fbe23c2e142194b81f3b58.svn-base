<?php
/*
Plugin Name: Amazing Hover Effects for WPBakery Page Builder
Plugin URI: https://codenpy.com/item/amazing-hover-effects-for-wpbakery-page-builder/
Description: A collection of over 50 beautiful Hover effects that helps you to easily create magnificent interactive IMAGES in your website. 
Author: themebon
Author URI: http://codenpy.com/
License: GPLv2 or later
Text Domain: ahevc
Version: 1.0.7
*/

// Don't load directly
if (!defined('ABSPATH')){die('-1');}


include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'js_composer/js_composer.php' ) ){
    
    /* Constants */
    define( 'ASVC_URL', rtrim( plugin_dir_url( __FILE__ ), '/' ) );
    define( 'ASVC_DIR', rtrim( plugin_dir_path( __FILE__ ), '/' ) );
    if ( ! function_exists( 'ahevc_WordPressCheckup' ) ) {
        function ahevc_WordPressCheckup( $version = '3.8' ) {
            global $wp_version;
            if ( version_compare( $wp_version, $version, '>=' ) ) {
                return "true";
            } else {
                return "false";
            }
        }
    }

    // Admin Style CSS
    function ahevc_admin_enqeue() {
        
        wp_enqueue_style( 'ahevc_admin_css', plugins_url( 'admin/admin.css', __FILE__ ) );
    }
    add_action( 'admin_enqueue_scripts', 'ahevc_admin_enqeue' );

    // Initialize hover effects addon
    add_action( 'vc_before_init', 'init_ahevc_addon' );
    function init_ahevc_addon() {
        //params
        require_once 'admin/params/index.php';
        
        // hover effects shortcode
        require_once( 'hover-effects/hover-effects.php' );
         
    }
}
// Check If VC is activate
else {
    function ahevc_required_plugin() {
        if ( is_admin() && current_user_can( 'activate_plugins' ) &&  !is_plugin_active( 'js_composer/js_composer.php' ) ) {
            add_action( 'admin_notices', 'ahevc_required_plugin_notice' );

            deactivate_plugins( plugin_basename( __FILE__ ) ); 

            if ( isset( $_GET['activate'] ) ) {
                unset( $_GET['activate'] );
            }
        }

    }
    add_action( 'admin_init', 'ahevc_required_plugin' );

    function ahevc_required_plugin_notice(){
        ?><div class="error"><p>Error! you need to install or activate the <a target="_blank" href="https://codecanyon.net/item/visual-composer-page-builder-for-wordpress/242431?ref=themebonwp">WPBakery Page Builder for WordPress (formerly Visual Composer)</a> plugin to run "<span style="font-weight: bold;">Amazing Hover Effects for WPBakery Page Builder</span>" plugin.</p></div><?php
    }
}
?>