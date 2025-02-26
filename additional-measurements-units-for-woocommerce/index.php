<?php 
/*
Plugin Name: additional measurements units for WooCommerce
Plugin URI : webtoptemplate.com
Description: Show products Extra WooCommerce Measurements units
Version:1.0
Author: kardi
Author URI : https://github.com/ikardi420
License : GPL v or later
Text Domain: wtt-woo-measure
Domain Path : /languages/
WC requires at least: 4.2.0
WC tested up to: 4.9

*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    


/**
 * This adds the new unit to the WooCommerce admin
 */
function add_woocommerce_dimension_unit_league( $settings ) {

	foreach ( $settings as &$setting ) {

		if ( 'woocommerce_dimension_unit' == $setting['id'] ) {
			$setting['options']['feet'] = __( 'feet' );  // new unit
			$setting['options']['league'] = __( 'league' );  // new unit
			$setting['options']['hand'] = __( 'hand' );  // new unit
		}
	}

	return $settings;
}
add_filter( 'woocommerce_products_general_settings', 'add_woocommerce_dimension_unit_league' );

function add_woocommerce_weight_unit_league( $settings ) {

	foreach ( $settings as &$setting ) {

		if ( 'woocommerce_weight_unit' == $setting['id'] ) {
			$setting['options']['ton'] = __( 'ton' );
			$setting['options']['gram'] = __( 'gram' );  // new unit
			$setting['options']['milligram'] = __( 'mg' );  // new unit
			$setting['options']['centigram'] = __( 'cg' );  // new unit
			$setting['options']['decigram'] = __( 'dg' );  // new unit
			$setting['options']['pound'] = __( 'pound' );  // new unit
			$setting['options']['pound'] = __( 'pound' );  // new unit
		}
	}

	return $settings;
}
add_filter( 'woocommerce_products_general_settings', 'add_woocommerce_weight_unit_league' );

}
