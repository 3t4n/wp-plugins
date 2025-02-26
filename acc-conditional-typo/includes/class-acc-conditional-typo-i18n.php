<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://grandplugin.com
 * @since      1.0.0
 *
 * @package    ACC_Conditional_Typo
 * @subpackage ACC_Conditional_Typo/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    ACC_Conditional_Typo
 * @subpackage ACC_Conditional_Typo/includes
 * @author     GrandPlugin <help@grandplugin.com>
 */
class ACC_Conditional_Typo_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'acc-conditional-typo',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
