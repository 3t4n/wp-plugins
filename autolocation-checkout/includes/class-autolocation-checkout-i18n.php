<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://besyn.digital
 * @since      1.0.0
 *
 * @package    Autolocation_Checkout
 * @subpackage Autolocation_Checkout/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Autolocation_Checkout
 * @subpackage Autolocation_Checkout/includes
 * @author     Besyn<support@besyn.digital>
 */
class Autolocation_Checkout_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'autolocation-checkout',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
