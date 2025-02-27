<?php
/**
 * Plugin Name: PayPal Express Checkout WC4JP
 * Plugin URI: https://ja.wordpress.org/plugins/pp-express-wc4jp/
 * Description: Accept all major credit and debit cards, presenting options in a customizable stack of payment buttons. Fast, seamless, and flexible.
 * Version: 2.0.3
 * Author: ArtisanWorkshop
 * Core Author: WooCommerce
 * Author URI: https://wc.artws.info
 * Copyright: © 2019 WooCommerce / PayPal.
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain: pp-express-wc4jp woocommerce-gateway-paypal-express-checkout
 * Domain Path: /languages
 * WC tested up to: 4.3
 * WC requires at least: 2.6
 */
/**
 * Copyright (c) 2019 PayPal, Inc.
 *
 * The name of the PayPal may not be used to endorse or promote products derived from this
 * software without specific prior written permission. THIS SOFTWARE IS PROVIDED ``AS IS'' AND
 * WITHOUT ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, WITHOUT LIMITATION, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE.
 */
/**
 * Following file customized for Japanese Market by Shohei Tanaka
 * includes/class-wc-gateway-ppec-cart-handler.php : row 256
 * includes/class-wc-gateway-ppec-client.php : row 916 and 1028
*/
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

define( 'WC_GATEWAY_PPEC_WC4JP_VERSION', '2.0.3' );

/**
 * Return instance of WC_Gateway_PPEC_Plugin.
 *
 * @return WC_Gateway_PPEC_Plugin
 */
function wc_gateway_ppec() {
	static $plugin;

	if ( ! isset( $plugin ) ) {
		require_once 'includes/class-wc-gateway-ppec-plugin.php';

		$plugin = new WC_Gateway_PPEC_Plugin( __FILE__, WC_GATEWAY_PPEC_WC4JP_VERSION );
	}

	return $plugin;
}

wc_gateway_ppec()->maybe_run();
