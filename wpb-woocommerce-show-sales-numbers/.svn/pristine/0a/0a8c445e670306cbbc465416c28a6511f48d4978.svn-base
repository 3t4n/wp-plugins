<?php 
/**
 * Plugin Name: WPB Show Product Sales Number for WooCommerce
 * Plugin URI: https://wpbean.com/plugins/
 * Description: This plugin will show number of sales of WooCommerce products.
 * Author: wpbean
 * Version: 1.0.2
 * Author URI: https://wpbean.com
 * text-domain: wpb_wssn
 *
 * WC requires at least: 3.0
 * WC tested up to: 4.0.0
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


/**
 * Define TextDomain
 */

if ( !defined( 'WPB_WSSN_TEXTDOMAIN' ) ) {
	define( 'WPB_WSSN_TEXTDOMAIN','wpb_wssn' );
}



/**
 * Internationalization
 */

if( !function_exists('wpb_wssn_textdomain') ):
	function wpb_wssn_textdomain() {
		load_plugin_textdomain( WPB_WSSN_TEXTDOMAIN, false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}
endif;
add_action( 'init', 'wpb_wssn_textdomain' );



/**
 * Requred files
 */

require_once dirname( __FILE__ ) . '/admin/class.settings-api.php';
require_once dirname( __FILE__ ) . '/admin/settings-config.php';
require_once dirname( __FILE__ ) . '/inc/wpb-hooks.php';
require_once dirname( __FILE__ ) . '/inc/wpb-functions.php';
require_once dirname( __FILE__ ) . '/inc/wpb-scripts.php';