<?php
/*
Plugin Name: price display anywhere
Plugin URI:  https://zitengine.com
Description: Sometimes you need to display just product price with your customer design so that you can show the price at multicurrency. Our plugin will help you to display WooCommerce Product price display anywhere at your WordPress theme. if you use multicurrency plugin it will help you to display at multicurrency.
Version:     1.1
Author:      Md Zahedul Hoque
Author URI:  http://facebook.com/zitengine 
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Domain Path: /languages
Text Domain: stb
*/
defined('ABSPATH') or die('Only a foolish person try to access directly to see this white page. :-) ');
define( 'zit_display__VERSION', '1.1' );
define( 'zit_display__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
/**
 * Plugin language
 */
add_action( 'init', 'zit_display_language_setup' );
function zit_display_language_setup() {
  load_plugin_textdomain( 'stb', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
 
add_shortcode( 'zit_display_price', 'zit_woo_product_price_shortcode' );
/**
 * Shortcode WooCommerce Product Price.
 *
 */
function zit_woo_product_price_shortcode( $atts ) {
	
	$atts = shortcode_atts( array(
		'id' => null
	), $atts, 'zit_display_price' );
 
	if ( empty( $atts[ 'id' ] ) ) {
		return '';
	}
 
	$product = wc_get_product( $atts['id'] );
 
	if ( ! $product ) {
		return '';
	}
 
	return $product->get_price_html();
}