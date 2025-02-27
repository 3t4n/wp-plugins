<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://profiles.wordpress.org/thebootstrapthemes/
 * @since             1.0.0
 * @package           The_Bootstrap_Themes_Companion
 *
 * @wordpress-plugin
 * Plugin Name:       The Bootstrap Themes Companion
 * Plugin URI:        https://thebootstrapthemes.com/
 * Description:       This is a theme companion plugin. This plugin generates the required post types and options for the themes.
 * Version:           1.1.3
 * Author:            thebootstrapthemes
 * Author URI:        https://profiles.wordpress.org/thebootstrapthemes/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       tbthemes-companion
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
define( 'THE_BOOTSTRAP_THEMES_COMPANION_VERSION', '1.1.3' );
define( 'TBTC_BASE_PATH', dirname( __FILE__ ) );
define( 'TBTC_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'TBTC_FILE_URL', rtrim( plugin_dir_url( __FILE__ ), '/' ) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-tbthemes-companion-activator.php
 */
function activate_the_bootstrap_themes_companion() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-tbthemes-companion-activator.php';
	The_Bootstrap_Themes_Companion_Activator::activate();
}
register_activation_hook( __FILE__, 'activate_the_bootstrap_themes_companion' );

function redirect_the_bootstrap_themes_companion() {
  require_once plugin_dir_path( __FILE__ ) . 'includes/class-tbthemes-companion-activator.php';
  The_Bootstrap_Themes_Companion_Activator::redirect();
}
add_action('admin_init', 'redirect_the_bootstrap_themes_companion');

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-tbthemes-companion-deactivator.php
 */
function deactivate_the_bootstrap_themes_companion() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-tbthemes-companion-deactivator.php';
	The_Bootstrap_Themes_Companion_Deactivator::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_the_bootstrap_themes_companion' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-tbthemes-companion.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_the_bootstrap_themes_companion() {

	$plugin = new The_Bootstrap_Themes_Companion();
	$plugin->run();

}
run_the_bootstrap_themes_companion();
