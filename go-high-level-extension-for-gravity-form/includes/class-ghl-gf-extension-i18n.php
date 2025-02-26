<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.ibsofts.com
 * @since      5.0.7
 *
 * @package    Ghl_Gf_Extension
 * @subpackage Ghl_Gf_Extension/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      5.0.7
 * @package    Ghl_Gf_Extension
 * @subpackage Ghl_Gf_Extension/includes
 * @author     iB Softs <https://www.ibsofts.com>
 */
class Ghl_Gf_Extension_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    5.0.7
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'ghl-gf-extension',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
