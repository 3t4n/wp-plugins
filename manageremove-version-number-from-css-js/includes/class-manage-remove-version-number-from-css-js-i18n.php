<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://https://github.com/thechetanvaghela
 * @since      1.0.0
 *
 * @package    Manage_Remove_Version_Number_From_Css_Js
 * @subpackage Manage_Remove_Version_Number_From_Css_Js/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Manage_Remove_Version_Number_From_Css_Js
 * @subpackage Manage_Remove_Version_Number_From_Css_Js/includes
 * @author     Chetan Vaghela <ckvaghela92@gmail.com>
 */
class Manage_Remove_Version_Number_From_Css_Js_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'manage-remove-version-number-from-css-js',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
