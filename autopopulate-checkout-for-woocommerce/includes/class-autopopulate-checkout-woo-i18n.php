<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.wpconcierges.com/plugins
 * @since      1.0.0
 *
 * @package    autopopulate_checkout_woo
 * @subpackage autopopulate_checkout_woo/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    autopopulate_checkout_woo
 * @subpackage autopopulate_checkout_woo/includes
 * @author     Your Name <email@example.com>
 */
class autopopulate_checkout_woo_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'autopopulate-checkout-woo',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
