<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://github.com/boele/custom-dashboard-background/tree/master/includes/class-custom-dashboard-background-i18n.php
 * @since      1.0.0
 *
 * @package    Custom_Dashboard_Background
 * @subpackage Custom_Dashboard_Background/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Custom_Dashboard_Background
 * @subpackage Custom_Dashboard_Background/includes
 * @author     Boele Boom <boele.boom@hotmail.com>
 */
class Custom_Dashboard_Background_i18n {

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {
		load_plugin_textdomain(
			'custom-dashboard-background',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);
    }
}
