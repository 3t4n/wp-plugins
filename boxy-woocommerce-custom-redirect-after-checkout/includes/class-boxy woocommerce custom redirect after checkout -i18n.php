<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://appiesoftwebsolutions.com/
 * @since      1.0.0
 *
 * @package    Boxy_Woocommerce_Custom_Redirect_After_Checkout
 * @subpackage Boxy_Woocommerce_Custom_Redirect_After_Checkout/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Boxy_Woocommerce_Custom_Redirect_After_Checkout
 * @subpackage Boxy_Woocommerce_Custom_Redirect_After_Checkout/includes
 * @author     Mandep singh Maan <mandeep9infotech@gmail.com>
 */
class Boxy_Woocommerce_Custom_Redirect_After_Checkout_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'boxy woocommerce custom redirect after checkout ',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
