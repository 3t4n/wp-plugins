<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://wordpress.org/plugins/restrict-wp-upload-type/
 * @since      1.0.0
 *
 * @package    Restrict_Wp_Upload_Type
 * @subpackage Restrict_Wp_Upload_Type/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Restrict_Wp_Upload_Type
 * @subpackage Restrict_Wp_Upload_Type/includes
 * @author     Kushang Tailor <admin@gmail.com>
 */
class Restrict_Wp_Upload_Type_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'restrict-wp-upload-type',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
