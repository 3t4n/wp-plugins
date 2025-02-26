<?php
/**
 * Custom Dashboard Background
 *
 * @link              https://github.com/boele/custom-dashboard-background
 * @since             1.0.0
 * @package           Custom_Dashboard_Background
 *
 * @wordpress-plugin
 * Plugin Name:       Custom Dashboard Background
 * Plugin URI:        https://wordpress.org/plugins/custom-dashboard-background/
 * Description:       Custom dashboard background control for WordPress admin back-end backgrounds.
 * Version:           1.0.0
 * Author:            Boele Boom
 * License:           GPL v3.0
 * License URI:       https://www.gnu.org/licenses/gpl-3.0
 * Text Domain:       custom-dashboard-background
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'CUSTOM_DASHBOARD_BACKGROUND_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-custom-dashboard-background-activator.php
 */
function activate_custom_dashboard_background() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-custom-dashboard-background-activator.php';
	Custom_Dashboard_Background_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-custom-dashboard-background-deactivator.php
 */
function deactivate_custom_dashboard_background() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-custom-dashboard-background-deactivator.php';
	Custom_Dashboard_Background_Deactivator::deactivate();
}
register_activation_hook( __FILE__, 'activate_custom_dashboard_background' );
register_deactivation_hook( __FILE__, 'deactivate_custom_dashboard_background' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-custom-dashboard-background.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_custom_dashboard_background() {
	$plugin = new Custom_Dashboard_Background();
    $plugin->run();
}
run_custom_dashboard_background();