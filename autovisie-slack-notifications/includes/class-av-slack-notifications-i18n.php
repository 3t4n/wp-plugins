<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://www.autovisie.nl
 * @since      1.0.0
 *
 * @package    Av_Slack_Notifications
 * @subpackage Av_Slack_Notifications/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Av_Slack_Notifications
 * @subpackage Av_Slack_Notifications/includes
 * @author     Melvr
 */
class Av_Slack_Notifications_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'av-slack-notifications',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
