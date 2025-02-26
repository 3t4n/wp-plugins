<?php
/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.theritesites.com
 * @since      1.0.0
 * @package    TRS\AR
 * @subpackage TRS\AR\includes
 * @author     TheRiteSites <contact@theritesites.com>
 */
class Action_Runner_By_TRS_i18n {

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'action-runner-by-trs',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);
	}
}
