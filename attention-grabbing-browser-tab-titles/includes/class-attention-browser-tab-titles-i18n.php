<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://https://profiles.wordpress.org/thechetanvaghela/
 * @since      1.0.0
 *
 * @package    Attention_Browser_Tab_Titles
 * @subpackage Attention_Browser_Tab_Titles/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Attention_Browser_Tab_Titles
 * @subpackage Attention_Browser_Tab_Titles/includes
 * @author     Chetan Vaghela <ckvaghela92@gmail.com>
 */
class Attention_Browser_Tab_Titles_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'attention-browser-tab-titles',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
