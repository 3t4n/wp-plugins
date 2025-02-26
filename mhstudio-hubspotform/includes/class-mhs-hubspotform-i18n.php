<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       mhstudio.org
 * @since      1.0.0
 *
 * @package    MHS_Hubspotform
 * @subpackage MHS_Hubspotform/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    MHS_Hubspotform
 * @subpackage MHS_Hubspotform/includes
 * @author     Mayank Kapahi <mayank.capricon@gmail.com>
 */
class MHS_Hubspotform_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'hubspotform',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
