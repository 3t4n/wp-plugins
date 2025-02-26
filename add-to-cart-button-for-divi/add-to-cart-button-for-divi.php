<?php 
/*
Plugin Name: Add to Cart Button for Divi
Description: Enable Add to Cart button to WooCommerce products in Divi Theme
Version: 1.0.0
Author: Gerardo Dario Morales Caballero
Text Domain: atcbfd
*/

// If this file is called directly, abort. //
if ( ! defined( 'WPINC' ) ) {die;} // end if

// If Divi is installed and selected as current theme and Woocommerce is installed and activated then executes the action to include "Add to Cart" button
$theme = wp_get_theme();
if ( ('Divi' == $theme->name || 'Divi' == $theme->parent_theme) && in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 20 );
}
