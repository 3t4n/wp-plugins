<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://bitbucket.org/allouise/easy-hide-form/
 * @since      1.0.0
 *
 * @package    Alf_Easy_Hide_Form
 * @subpackage Alf_Easy_Hide_Form/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Alf_Easy_Hide_Form
 * @subpackage Alf_Easy_Hide_Form/includes
 * @author     Allyson Flores <elixirlouise@gmail.com>
 */
class Alf_Easy_Hide_Form_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'easy-hide-form',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
