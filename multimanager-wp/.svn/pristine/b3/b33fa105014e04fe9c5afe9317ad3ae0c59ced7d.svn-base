<?php

/**
 * Plugin Name:       MultiManager WP
 * Plugin URI:        https://www.icdsoft.com/en/hosting/wordpress-manager
 * Description:       This plugin helps you connect your site to the ICDSoft WordPress MultiManager toolkit, which allows you to manage multiple WordPress sites.
 * Version:           1.1.3
 * Author:            ICDSoft Hosting
 * Author URI:        https://icdsoft.com
 * Text Domain:       multimanager-wp
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Don't access directly.
};

/**
 * Plugin version.
 */
const MULTIMANAGER_WP_VERSION = '1.1.3';

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-multi-manager-wp-activator.php
 */
function multimanager_wp_activate_MultiManager_WP() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-multi-manager-wp-activator.php';
	MultiManager_WP_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-multi-manager-wp-deactivator.php
 */
function multimanager_wp_deactivate_MultiManager_WP() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-multi-manager-wp-deactivator.php';
	MultiManager_WP_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'multimanager_wp_activate_MultiManager_WP' );
register_deactivation_hook( __FILE__, 'multimanager_wp_deactivate_MultiManager_WP' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-multi-manager-wp.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function multimanager_wp_run_MultiManager_WP() {

	$plugin = new MultiManager_WP();
	$plugin->run();

}
multimanager_wp_run_MultiManager_WP();
