<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://peprojects.nl
 * @since      1.0.0
 *
 * @package    Apostle_Social_Wall
 * @subpackage Apostle_Social_Wall/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Apostle_Social_Wall
 * @subpackage Apostle_Social_Wall/includes
 * @author     Door PE Projects <info@peprojects.nl>
 */
class Apostle_Social_Wall_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'apostle-social-wall',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
