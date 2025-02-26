<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      2.0.7
 *
 * @package    mini-cart-for-woocommerce
 * @subpackage mini-cart-for-woocommerce/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      2.0.7
 * @package    mini-cart-for-woocommerce
 * @subpackage mini-cart-for-woocommerce/includes
 */
class WHMC_i18n_light {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    2.0.7
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'mini-cart-for-woocommerce',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
