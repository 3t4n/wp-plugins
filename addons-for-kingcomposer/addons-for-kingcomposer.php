<?php

/*
Plugin Name: Addons for KingComposer
Plugin URI: https://themebon.com/addons-for-kingcomposer/
Description: Impressive modern yet powerful shortcode collections for KingComposer page builder. 
Author: themebon
Author URI: https://themebon.com
Version: 1.0.0
*/

if ( ! defined( 'ABSPATH' ) ) exit;


if(!function_exists('is_plugin_active')){
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}


// Admin Style CSS
function akc_admin_enqeue() {
    
    wp_enqueue_style( 'akc_admin_css', plugins_url( 'admin/admin.css', __FILE__ ) );
}
add_action( 'admin_enqueue_scripts', 'akc_admin_enqeue' );


if ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) ){
    //loading shortcodes
    require_once ( 'shortcodes/index.php' );
    
} 


add_action( 'admin_init', 'akc_required_plugin' );
function akc_required_plugin() {
    if ( is_admin() && current_user_can( 'activate_plugins' ) &&  !is_plugin_active( 'kingcomposer/kingcomposer.php' ) ) {
        add_action( 'admin_notices', 'akc_required_plugin_notice' );

        deactivate_plugins( plugin_basename( __FILE__ ) ); 

        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }
    }
}

function akc_required_plugin_notice(){
    ?><div class="error"><p>Error! you need to install or activate the <a href="https://wordpress.org/plugins/kingcomposer/">King Composer</a> plugin to run this plugin.</p></div><?php
}
?>