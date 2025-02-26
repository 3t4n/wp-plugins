<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://mockupplugin.com
 * @since      1.2.0
 *
 * @package    MockUp
 * @subpackage mockup/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.5.6
 * @package    MockUp
 * @subpackage mockup/includes
 * @author     Eelco Tjallema <mail@estjallema.nl>
 */
class MockUp_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.5.6
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'MockUp',
			false,
			WP_CONTENT_DIR.'/languages/plugins/MockUp-' . get_locale() . '.mo'
		);

	}

}
