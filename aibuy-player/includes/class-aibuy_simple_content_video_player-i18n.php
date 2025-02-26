<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://github.com/billizzard
 * @since      1.0.0
 *
 * @package    Aibuy_simple_content_video_player
 * @subpackage Aibuy_simple_content_video_player/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Aibuy_simple_content_video_player
 * @subpackage Aibuy_simple_content_video_player/includes
 * @author     Hmylko Vladimir <billizzard@mail.ru>
 */
class Aibuy_simple_content_video_player_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'aibuy_simple_content_video_player',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
