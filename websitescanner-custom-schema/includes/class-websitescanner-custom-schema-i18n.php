<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://plugin.nl/en/
 * @since      1.0.0
 *
 * @package    Websitescanner_Custom_Schema
 * @subpackage Websitescanner_Custom_Schema/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Websitescanner_Custom_Schema
 * @subpackage Websitescanner_Custom_Schema/includes
 * @author     Tim van Iersel <tim@plugin.nl>
 */
class Websitescanner_Custom_Schema_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'websitescanner-custom-schema',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
