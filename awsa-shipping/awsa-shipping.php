<?php
/**
 * AWSA Shipping
 *
 * @package           AWSA_Shipping
 * @author            Sajjad Aslani
 * @copyright         2020 Sajjad Aslani
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:         awsa-shipping
 * Plugin URI:          http://sajjadaslani.ir/awsa-shipping/
 * Description:         This plugin adds Pishtaz post, Sefareshi Post, Express Delivery and Air delivery methods to the list of shipping methods in WooCommerce and Dokan with different settings in each method
 * Version:             1.3.0
 * Requires at least:   5.3.0
 * Requires PHP:        7.2
 * Author:              Sajjad Aslani
 * Author URI:          http://sajjadaslani.ir
 * License:             GPL v2 or later
 * License URI:         https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:         awsa-shipping
 * Domain Path:         /languages
 * Developer Contact:   +989100844292
 */

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

if ( !defined( 'AWSA_SHIPPING_FILE' ) ) {
	define( 'AWSA_SHIPPING_FILE', __FILE__ );
}

/**
 * Include Primary Class Plugin
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-shipping.php';

AWSA_Shipping\AWSA_Shipping::instance()->init();
