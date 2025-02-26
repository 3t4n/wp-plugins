<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://codetides.com
 * @since      1.0.0
 *
 * @package    Advanced_Floating_Sliding_Panel
 * @subpackage Advanced_Floating_Sliding_Panel/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Advanced_Floating_Sliding_Panel
 * @subpackage Advanced_Floating_Sliding_Panel/includes
 * @author     CodeTides <contact@codetides.com>
 */
class Advanced_Floating_Sliding_Panel_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'advanced-floating-sliding-panel',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
