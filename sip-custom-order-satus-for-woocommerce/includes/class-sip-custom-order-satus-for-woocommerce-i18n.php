<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://shopitpress.com/
 * @since      1.0.0
 *
 * @package    Sip_Custom_Order_Satus_For_Woocommerce
 * @subpackage Sip_Custom_Order_Satus_For_Woocommerce/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Sip_Custom_Order_Satus_For_Woocommerce
 * @subpackage Sip_Custom_Order_Satus_For_Woocommerce/includes
 * @author     ShopItPress <hello@shopitpress.com>
 */
class Sip_Custom_Order_Satus_For_Woocommerce_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'sip-custom-order-satus-for-woocommerce',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
