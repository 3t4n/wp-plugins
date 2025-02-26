<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://michalrobak.pl
 * @since      1.0.0
 *
 * @package    Admin_Plugins_Description
 * @subpackage Admin_Plugins_Description/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Admin_Plugins_Description
 * @subpackage Admin_Plugins_Description/includes
 * @author     Michał Robak <hello@michalrobak.pl>
 */
class Admin_Plugins_Description_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'admin-plugins-description',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
