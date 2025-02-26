<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://#
 * @since      1.0.0
 *
 * @package    Autocomplete_Woocommerce_Order_Status
 * @subpackage Autocomplete_Woocommerce_Order_Status/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Autocomplete_Woocommerce_Order_Status
 * @subpackage Autocomplete_Woocommerce_Order_Status/includes
 * @author     MD Noruzzaman <noruzzaman19@gmail.com>
 */
class Autocomplete_Woocommerce_Order_Status_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'autocomplete-woocommerce-order-status',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
