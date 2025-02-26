<?php
/**
 * Loads and defines the internationalization files for this plugin
 *
 * @since      1.0.0
 * @package    Static_Maps_Editor
 * @author     Printmaps
 */

/**
 * The i18n class textdomain loader
 */
class Static_Maps_Editor_I18n {

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {
		load_plugin_textdomain(
			'static-maps-editor',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);
	}
}
