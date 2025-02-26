<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://ascendmarketingnow.com/mo-alsaedi/
 * @since      1.0.0
 *
 * @package    Ascend_Marketing
 * @subpackage Ascend_Marketing/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Ascend_Marketing
 * @subpackage Ascend_Marketing/includes
 * @author     Mo Alsaedi <mo@ascendmarketingnow.com>
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
class Ascend_Marketing_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'ascend-marketing',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
