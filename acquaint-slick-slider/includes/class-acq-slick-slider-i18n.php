<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://acquaintsoft.com
 * @since      1.0.0
 *
 * @package    Acq_Slick_Slider
 * @subpackage Acq_Slick_Slider/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Acq_Slick_Slider
 * @subpackage Acq_Slick_Slider/includes
 * @author     Acquaintsoft <info@acquaintsoft.com>
 */
class Acq_Slick_Slider_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'acq-slick-slider',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
