<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.

 * @since      1.0.0
 */


class Awesome_Accordions_i18n {


	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'awesome-accordions',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
