<?php
require plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.gleap.io
 * @since             7.0.0
 * @package           Gleap
 *
 * @wordpress-plugin
 * Plugin Name:       Gleap
 * Description:       Gleap helps developers build the best software faster. It is your affordable in-app bug reporting tool for apps, websites and industrial applications.
 * Version:           13.0.3
 * Author:            Gleap
 * Author URI:        https://www.gleap.io
 * License:           Commercial
 * License URI:       https://github.com/Gleap/Wordpress/blob/main/README.txt
 * Text Domain:       gleap
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
define( 'GLEAP_VERSION', '13.0.3' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-gleap-activator.php
 */
function activate_gleap() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-gleap-activator.php';
	Gleap_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-gleap-deactivator.php
 */
function deactivate_gleap() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-gleap-deactivator.php';
	Gleap_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_gleap' );
register_deactivation_hook( __FILE__, 'deactivate_gleap' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-gleap.php';

add_filter('plugin_action_links_'.plugin_basename(__FILE__), 'gleap_add_plugin_page_settings_link');
function gleap_add_plugin_page_settings_link( $links ) {
	$links[] = '<a href="' .
		admin_url( 'options-general.php?page=crb_carbon_fields_container_gleap.php' ) .
		'">' . __('Settings') . '</a>';
	return $links;
}

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_gleap() {
	$plugin = new Gleap();
	$plugin->run();
}
run_gleap();
