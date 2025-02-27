<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.civicuk.com/
 * @since      1.0.0
 *
 * @package    Cookie_Control
 * @subpackage Cookie_Control/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Civic_Cookie_Control_8
 * @subpackage Civic_Cookie_Control_8/includes
 * @author     Civic Uk <info@civicuk.com>
 */
class CCC_Cookie_Control_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'civic-cookie-control-8',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
