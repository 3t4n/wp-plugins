<?php
/*
Plugin Name: WooCommerce Quick View
Plugin URI: https://github.com/masumskaib396/finest-quickview
Description: WooCommerce Quick View plugin is a simple and clean design.
Version: 1.1.0
Author: FinestWP
Author URI: http://finestdevs.com
License: GPLv2
Text Domain: finest-quickview
Domain Path: /languages/
*/



if ( ! defined( 'ABSPATH' ) ) {
	die;
}

//Set plugin version constant.
define( 'FINEST_QUICKVIEW_VERSION', '1.1.0');

define( 'FINEST_QUICKVIEW_INC', plugin_dir_path( __FILE__ ) . 'inc/' );
define( 'FINEST_QUICKVIEW_MAIN', trailingslashit( plugin_dir_path( __FILE__ ) ) );
define( 'FINEST_QUICKVIEW_ASSETS_CSS', plugins_url( 'assets/css/', __FILE__ ));
define( 'FINEST_QUICKVIEW_ASSETS_JS',  plugins_url( 'assets/js/', __FILE__ ));


function finest_quickview_view_missing_wc_notice() {
	echo '<div class="error"><p><strong>' . sprintf( esc_html__( 'Quick View requires WooCommerce to be installed and active. You can download %s here.', 'finest-quickview' ), '<a href="https://woocommerce.com/" target="_blank">WooCommerce</a>' ) . '</strong></p></div>';
}


function finest_quickview_load_textdomain() {
    load_plugin_textdomain( 'finest-quickview', false, dirname( __FILE__ ) . '/languages' );

    if ( ! class_exists( 'WooCommerce' ) ) {
		add_action( 'admin_notices', 'finest_quickview_view_missing_wc_notice' );
		return;
	}
}
add_action( 'plugins_loaded', 'finest_quickview_load_textdomain' );



// Load the library
if ( file_exists( FINEST_QUICKVIEW_MAIN . 'lib/settings.php' ) ) {
	require_once  FINEST_QUICKVIEW_MAIN . 'lib/settings.php';
}

// Let's Initialize Everything
if ( file_exists(  FINEST_QUICKVIEW_MAIN . 'init.php' ) ) {
	require_once(  FINEST_QUICKVIEW_MAIN . 'init.php' );
}




/**
 * Initialize the plugin tracker
 *
 * @return void
 */
function appsero_init_tracker_finest_quickview() {

  if ( ! class_exists( 'Appsero\Client' ) ) {
    require_once FINEST_QUICKVIEW_MAIN . '/inc/appsero/src/Client.php';
  }

  $client = new Appsero\Client( '9f6127b5-4e3f-4571-8fe5-db6b1628006c', 'WooCommerce Quick View', __FILE__ );

  // Active insights
  $client->insights()->init();

}
appsero_init_tracker_finest_quickview();


