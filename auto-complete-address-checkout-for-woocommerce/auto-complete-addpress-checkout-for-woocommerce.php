<?php
/*
* Plugin Name: Auto Complete Address Checkout For woocommerce
* Description: Auto Complete Address Checkout For woocommerce help you to fill address in checkout page
* Version: 1.0
* Author: Gravity Master
* License: GPLv2 or later
* Text Domain: auto-complete-address-checkout-for-woocommerce
*/
if ( ! defined( 'ABSPATH' ) ) {
    die();
}

/* All constants should be defined in this file. */
if ( ! defined( 'GMACAW_PREFIX' ) ) {
    define( 'GMACAW_PREFIX', 'gmacaw' );
}
if ( ! defined( 'GMACAW_PLUGINDIR' ) ) {
    define( 'GMACAW_PLUGINDIR', plugin_dir_path( __FILE__ ) );
}
if ( ! defined( 'GMACAW_PLUGINBASENAME' ) ) {
    define( 'GMACAW_PLUGINBASENAME', plugin_basename( __FILE__ ) );
}
if ( ! defined( 'GMACAW_PLUGINURL' ) ) {
    define( 'GMACAW_PLUGINURL', plugin_dir_url( __FILE__ ) );
}

/* Auto-load all the necessary classes. */
if( ! function_exists( 'gmacaw_class_auto_loader' ) ) {
    
    function gmacaw_class_auto_loader( $class ) {
        
        $includes = GMACAW_PLUGINDIR . 'includes/' . $class . '.php';
        
        if( is_file( $includes ) && ! class_exists( $class ) ) {
            include_once( $includes );
            return;
        }
        
    }
}
spl_autoload_register('gmacaw_class_auto_loader');
new GMACAW_Cron();
new GMACAW_Admin();
new GMACAW_API();
new GMACAW_Frontend();




