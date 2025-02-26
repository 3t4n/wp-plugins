<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://screenshot-capture-api.com
 * @since      1.0.0
 *
 * @package    Screenshot_Preview
 * @subpackage Screenshot_Preview/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Screenshot_Preview
 * @subpackage Screenshot_Preview/includes
 * @author     Roman Kobosil <r.kobosil@webseite-herunterladen.de>
 */
class Screenshot_Preview_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'screenshot-preview',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
