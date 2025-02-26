<?php
/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 *
 * @package    Ananta_Sites
 * @subpackage Ananta_Sites/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @package    Ananta_Sites
 * @subpackage Ananta_Sites/includes
 * @author     Anantsites <https://anantsites.com/>
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly     
class Ananta_Sites_i18n {

	/**
	 * Load the plugin text domain for translation.
	 *
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'ananta-sites',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}
}