<?php
/*
Plugin Name: Additional Tax Options for WooCommerce
Plugin URI: https://github.com/anant1811/woo-additional-tax-options-plugin
Description: This plugin adds the following tax options: 1 - Absorb the difference in tax rates and charge the same "tax inclusive" price to all customers. 2 - When the customer selects "Local Pickup", charge them tax based on their location instead of the shop base location.
Version: 1.0.0
Contributors: wpnomad
Author: wpnomad
Author URI: https://github.com/anant1811
License: GPLv2 or later
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: additional-tax-options-for-woocommerce
Domain Path:  /languages
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
  die;
}


// Create Settings Fields
include( plugin_dir_path( __FILE__ ) . 'includes/additional-tax-settings-fields.php');

// Run the filters based on settings values

// Run filter for same inclusive cost irrespective of tax rates
$additional_tax = get_option( 'additional_tax_options' );
if(( $additional_tax) == 'yes' ) {
    add_filter( 'woocommerce_adjust_non_base_location_prices', '__return_false' );
  } 

// Run filter for diaabling local tax calculation for local pickups
$additional_tax_local = get_option( 'additional_tax_options_local' );

if(( $additional_tax_local) == 'yes' ) {
    add_filter( 'woocommerce_apply_base_tax_for_local_pickup', '__return_false' );
  } 
?>