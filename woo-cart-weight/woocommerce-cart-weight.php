<?php
/**
 * Plugin Name: Cart Weight
 * Plugin URI: https://wordpress.org/plugins/woo-cart-weight/
 * Description: Displays total order weight in cart.
 * Version: 1.9.4
 * Author: Octolize
 * Author URI: https://octol.io/cart-weight-author
 * Text Domain: woo-cart-weight
 * Domain Path: /lang/
 * Requires at least: 6.4
 * Tested up to: 6.7
 * WC requires at least: 9.3
 * WC tested up to: 9.7
 * Requires PHP: 7.4
 *
 * Copyright 2019 WP Desk Ltd.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 * @package WPDesk\WooCommerceCartWeight
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

/* THIS VARIABLE CAN BE CHANGED AUTOMATICALLY */
$plugin_version = '1.9.4';
define( 'WC_CART_WEIGHT_VERSION', $plugin_version );

$plugin_name        = 'WooCommerce Cart Weight';
$plugin_class_name  = '\WPDesk\WooCommerceCartWeight\Plugin';
$plugin_text_domain = 'woo-cart-weight';
$product_id         = 'WooCommerce Cart Weight';
$plugin_file        = __FILE__;
$plugin_dir         = __DIR__;

$requirements = [
	'php'     => '7.4',
	'wp'      => '4.5',
	'plugins' => [
		[
			'name'      => 'woocommerce/woocommerce.php',
			'nice_name' => 'WooCommerce',
		],
	],
];

add_action( 'before_woocommerce_init', function() {
	if ( class_exists( '\Automattic\WooCommerce\Utilities\FeaturesUtil' ) ) {
		\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'cart_checkout_blocks', __FILE__, true );
	}
} );

require __DIR__ . '/vendor_prefixed/wpdesk/wp-plugin-flow-common/src/plugin-init-php52-free.php';
