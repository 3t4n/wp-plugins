<?php
/**
 * Defines the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin.
 *
 * @since      1.0.0
 * @package    Woocommerce_NZ_Shipping_Zones
 * @subpackage Woocommerce_NZ_Shipping_Zones/includes
 */

/**
 * Defines the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin.
 *
 * @since      1.0.0
 * @package    Woocommerce_NZ_Shipping_Zones
 * @subpackage Woocommerce_NZ_Shipping_Zones/includes
 */
class Woocommerce_NZ_Shipping_Zones_Translation {

	/**
	 * Loads the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {
		load_plugin_textdomain(
			'woocommerce-nz-shipping-zones',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);
	}

}
