<?php
/**
 * Hide all shipping methods in WooCommerce if free shipping is available
 *
 * @package   Hide shipping methods
 * @author    Joan Boluda <joan@boluda.com>
 * @license   GPL-2.0+
 * @link      http://boluda.com
 * @copyright 2013 boluda.com
 *
 * Plugin Name: Hide shipping methods
 * Plugin URI:  http://boluda.com/
 * Description: Hide all shipping methods in WooCommerce if free shipping is available
 * Version:     0.6
 * Author:      Joan Boluda
 * Author URI:  http://boluda.com
 * Text Domain: hide-shipping-methods
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path: /languages
 */


add_filter( 'woocommerce_available_shipping_methods', 'jb_hide_all_shipping_when_free_is_available' , 10, 1 );
 
function jb_hide_all_shipping_when_free_is_available( $available_methods ) {
 
  	if( isset( $available_methods['free_shipping'] ) ) :
		
		// Get free shipping array into a new array
		$freeshipping = array();
		$freeshipping = $available_methods['free_shipping'];
 
		// Empty the $available_methods array
		unset( $available_methods );
 
		// Add free shipping back into $avaialble_methods
		$available_methods = array();
		$available_methods[] = $freeshipping;
 
	endif;
 
	return $available_methods;
}