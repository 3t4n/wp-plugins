<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://munishdhiman.vercel.app/
 * @since      1.0.0
 *
 * @package    Auto_Slug_Translate
 * @subpackage Auto_Slug_Translate/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Auto_Slug_Translate
 * @subpackage Auto_Slug_Translate/includes
 * @author     Munish Dhiman <munishd12@gmail.com>
 */
class Auto_Slug_Translate_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'auto-slug-translate',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
