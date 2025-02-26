<?php
/*
Plugin Name: Advanced Hover Effects On Image WPBakery(Visual Composer)
Plugin URI: http://themescup.com/vc-hover
Description: A collection of some advanced and beautiful Hover effects that helps you to easily create magnificent interactive IMAGES in your website.
Author: themescup
Author URI: http://themescup.com
License: GPLv2 or later
Text Domain: aheiw
Version: 1.0.1
*/


include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'js_composer/js_composer.php' ) ){
    
/* Constants */
define( 'AHEIW_URL', rtrim( plugin_dir_url( __FILE__ ), '/' ) );
define( 'AHEIW_DIR', rtrim( plugin_dir_path( __FILE__ ), '/' ) );
if ( ! function_exists( 'advance_hover_WordPressCheckup' ) ) {
    function advance_hover_WordPressCheckup( $version = '3.8' ) {
        global $wp_version;
        if ( version_compare( $wp_version, $version, '>=' ) ) {
            return "true";
        } else {
            return "false";
        }
    }
}

// Admin Style CSS
function aheiw_admin_enqeue() {
    
    wp_enqueue_style( 'aheiw_admin_css', plugins_url( 'admin/admin.css', __FILE__ ) );
}
add_action( 'admin_enqueue_scripts', 'aheiw_admin_enqeue' );


// Initialize profile card addon
add_action( 'vc_before_init', 'init_cihwva_cr_addon' );
function init_cihwva_cr_addon() {
    //params
    require_once 'admin/params/indexx.php';
    
    // profile card shortcode
    require_once( 'aheiw-hover-effects-image/aheiw-hover-effects-image.php' );
     
    }
}

// Check If VC is not activate
else {
    function aheiw_required_plugin() {
        if ( is_admin() && current_user_can( 'activate_plugins' ) &&  !is_plugin_active( 'js_composer/js_composer.php' ) ) {
            add_action( 'admin_notices', 'aheiw_required_plugin_notice' );

            deactivate_plugins( plugin_basename( __FILE__ ) ); 

            if ( isset( $_GET['activate'] ) ) {
                unset( $_GET['activate'] );
            }
        }

    }
add_action( 'admin_init', 'aheiw_required_plugin' );

    function aheiw_required_plugin_notice(){
        ?><div class="error"><p>Error! you need to install or activate the <a target="_blank" href="https://codecanyon.net/item/visual-composer-page-builder-for-wordpress/242431?ref=themebonwp">WPBakery Page Builder for WordPress (formerly Visual Composer)</a> plugin to run "<span style="font-weight: bold;"> Advanced Hover Effects On Image Wpbeckary(Visual Composer)</span>" plugin.</p></div><?php
    }
}
?>