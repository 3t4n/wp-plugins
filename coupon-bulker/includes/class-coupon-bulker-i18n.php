<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://ilook.co.il
 * @since      1.0.0
 *
 * @package    Coupon_Bulker
 * @subpackage Coupon_Bulker/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Coupon_Bulker
 * @subpackage Coupon_Bulker/includes
 * @author     Nir Louk <looknear@gmail.com>
 */
class Coupon_Bulker_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'coupon-bulker',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
