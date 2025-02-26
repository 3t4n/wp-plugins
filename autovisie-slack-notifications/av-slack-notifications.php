<?php

/**
 * The plugin bootstrap file
 *
 *
 * @link              http://autovisie.nl
 * @since             1.0.0
 * @package           Av_Slack_Notifications
 *
 * @wordpress-plugin
 * Plugin Name:       Autovisie Slack Notifications
 * Plugin URI:        http://autovisie.nl/devblog/
 * Description:       Plugin used for Slack notifications using the 'Incoming Webhook' integration for Slack.
 * Version:           1.0.0
 * Author:            Melvr
 * Author URI:        http://autovisie.nl/devblog/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       av-slack-notifications
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-av-slack-notifications-activator.php
 */
function activate_av_slack_notifications() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-av-slack-notifications-activator.php';
	Av_Slack_Notifications_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-av-slack-notifications-deactivator.php
 */
function deactivate_av_slack_notifications() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-av-slack-notifications-deactivator.php';
	Av_Slack_Notifications_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_av_slack_notifications' );
register_deactivation_hook( __FILE__, 'deactivate_av_slack_notifications' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-av-slack-notifications.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_av_slack_notifications() {

	$plugin = new Av_Slack_Notifications();
	$plugin->run();

}
run_av_slack_notifications();
