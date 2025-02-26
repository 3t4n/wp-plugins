<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://hikeorders.com/accessibility_enabler/home/
 * @since      1.0.0
 *
 * @package    A11y_Enabler
 * @subpackage A11y_Enabler/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    A11y_Enabler
 * @subpackage A11y_Enabler/includes
 * @author     Your Name <email@example.com>
 */
class A11y_Enabler_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'a11y-enabler',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
