<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://bitbucket.org/luchomatic
 * @since      1.0.0
 *
 * @package    Anchor_Highlighter
 * @subpackage Anchor_Highlighter/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Anchor_Highlighter
 * @subpackage Anchor_Highlighter/includes
 * @author     Luciano Castro <luciano.castro@outlook.com>
 */
class Anchor_Highlighter_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'anchor-highlighter',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
