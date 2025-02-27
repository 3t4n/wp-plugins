<?php
/*
Plugin Name: Floating Cart for WooCommerce
Plugin URI: http://finestdevs.com/
Description: Floating Cart for WooCommerce allows your customers to view and control their cart without leaving the page. Bring more conversions and sales to your business using this interactive plugin.
Version: 1.0.4
Author: FinestWP
Author URI: http://finestdevs.com/
License: GPLv2 or later
Text Domain: finest-mini-cart
 */

if ( !defined( 'ABSPATH' ) ) {
    exit;
}

//Set plugin version constant.
define( 'FMC_VERSION', '1.0.3' );

/* Set constant path to the plugin directory. */
define( 'FMC', trailingslashit( plugin_dir_path( __FILE__ ) ) );

// Plugin Function Folder Path
define( 'FMC_INC', plugin_dir_path( __FILE__ ) . 'includes/' );
define( 'FMC_LIB', plugin_dir_path( __FILE__ ) . 'lib/' );

// Assets Folder URL
define( 'FMC_ASSETS_CSS', plugins_url( 'assets/css/', __FILE__ ) );
define( 'FMC_ASSETS_SCROLLBAR_CSS', plugins_url( 'assets/perfect-scrollbar/css/', __FILE__ ) );
define( 'FMC_ASSETS_SCROLLBAR_JS', plugins_url( 'assets/perfect-scrollbar/js/', __FILE__ ) );
define( 'FMC_ASSETS_JS', plugins_url( 'assets/js/', __FILE__ ) );

function finest_mini_cart_missing_wc_notice() {
    echo '<div class="error"><p><strong>' . sprintf( esc_html__( 'Floating Cart for WooCommerce View requires WooCommerce to be installed and active. You can download %s here.', 'finest-quickview' ), '<a href="https://woocommerce.com/" target="_blank">WooCommerce</a>' ) . '</strong></p></div>';
}

function finest_mini_cart_load_textdomain() {
    load_plugin_textdomain( 'finest-mini-cart', false, dirname( __FILE__ ) . '/languages' );

    if ( !class_exists( 'WooCommerce' ) ) {
        add_action( 'admin_notices', 'finest_mini_cart_missing_wc_notice' );
        return;
    }
}
add_action( 'plugins_loaded', 'finest_mini_cart_load_textdomain' );

// Load the library
if ( file_exists( FMC_LIB . 'settings.php' ) ) {
    require_once FMC_LIB . 'settings.php';
}

if ( file_exists( FMC_INC . 'base.php' ) ) {
    require_once FMC_INC . 'base.php';
}
