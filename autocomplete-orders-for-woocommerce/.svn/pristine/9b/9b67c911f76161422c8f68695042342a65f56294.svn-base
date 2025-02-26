<?php
/**
 * Plugin Name:          Autocomplete Orders for WooCommerce
 * Plugin URI:           https://pluginever.com/
 * Description:          The plugin enables the store orders to be automatically completed depending on various conditions.
 * Version:              1.1.4
 * Author:               PluginEver
 * Author URI:           https://pluginever.com/
 * License:              GPL v2 or later
 * License URI:          https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:          autocomplete-orders-for-woocommerce
 * Domain Path:          /languages
 * Requires at least:    5.2
 * Requires PHP:         7.4
 * Tested up to:         6.7
 * WC requires at least: 3.0.0
 * WC tested up to:      9.6
 * Requires Plugins:     woocommerce
 *
 * @package AutocompleteOrdersForWooCommerce
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
 */

use AutocompleteOrdersForWooCommerce\Plugin;

// don't call the file directly.
defined( 'ABSPATH' ) || exit();

// Require the autoloader.
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/vendor-prefixed/autoload.php';

/**
 * Get the plugin instance.
 *
 * @since 1.0.0
 * @return Plugin
 */
function autocomplete_orders_for_woocommerce() {
	$data = array(
		'file'         => __FILE__,
		'settings_url' => admin_url( 'admin.php?page=wc-settings' ),
		'support_url'  => 'https://pluginever.com/support/',
		'docs_url'     => 'https://pluginever.com/docs/autocomplete-orders-for-woocommerce/',
	);

	return Plugin::create( $data );
}

// Initialize the plugin.
autocomplete_orders_for_woocommerce();
