<?php
/*
Plugin Name: Easy Woocommerce Customizer
Plugin URI: http://themebon.com/
Description: easily customize your woocommerce store with tons of options without writing a single code.
Author: Noor-E-Alam
Author URI: http://themebon.com/
Version: 1.0.2
*/


if ( ! defined( 'ABSPATH' ) ) { die; }

if(!function_exists('is_plugin_active')){
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}

if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ){
    require_once ( 'options/cs-framework.php' );
    require_once ( 'hooks.php' );
    require_once ( 'admin-contact.php' );
    
} 


add_action( 'admin_init', 'ewc_required_plugin' );
function ewc_required_plugin() {
    if ( is_admin() && current_user_can( 'activate_plugins' ) &&  !is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
        add_action( 'admin_notices', 'ewc_required_plugin_notice' );

        deactivate_plugins( plugin_basename( __FILE__ ) ); 

        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }
    }

}

function ewc_required_plugin_notice(){
    ?><div class="error"><p>WooCommerce plugin is inactive.</p></div><?php
}