<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://consensu.io
 * @since      1.0.0
 *
 * @package    Consensu_IO
 * @subpackage Consensu_IO/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Consensu_IO
 * @subpackage Consensu_IO/includes
 * @author      Consensu.IO <contato@consensu.io>
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 
class Consensu_IO_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'consensu-io',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
