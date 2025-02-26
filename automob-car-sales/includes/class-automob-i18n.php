<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       automob.co.za
 * @since      1.0.0
 *
 * @package    Automob
 * @subpackage Automob/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Automob
 * @subpackage Automob/includes
 * @author     Luke Madzedze <lukemadzedze@gmail.com>
 */
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class Automob_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'automob',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
