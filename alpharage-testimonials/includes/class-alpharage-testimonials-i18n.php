<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://#
 * @since      1.0.0
 *
 * @package    ALPRT_testimonials
 * @subpackage ALPRT_testimonials/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    ALPRT_testimonials
 * @subpackage ALPRT_testimonials/includes
 * @author     Alpha Rages <alpha@hotmail.com>
 */
class ALPRT_testimonials_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'alpharage-testimonials',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
