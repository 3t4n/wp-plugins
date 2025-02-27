<?php

namespace DCL\Includes;
/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    DCL\Includes
 * @author     antwerpes ag <opensource@antwerpes.com>
 */
class DCL_I18n {

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since   1.0.0
	 * @access  public
	 */
	public function load_plugin_textdomain() {
		load_plugin_textdomain(
			'doccheck-login',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);
	}
}