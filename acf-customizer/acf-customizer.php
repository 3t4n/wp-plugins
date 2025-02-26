<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://wpmobiapp.com/
 * @since             1.0.0
 * @package           Acf_Customizer
 *
 * @wordpress-plugin
 * Plugin Name:       ACF : Customizer
 * Plugin URI:        https://wpmobiapp.com/downloads/acf-customizer
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            WP Mobile Templates
 * Author URI:        https://wpmobiapp.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       acf-customizer
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
define( 'ACF_CUSTOMIZER_VERSION', '1.0.0' );
define( 'ACF_CUSTOMIZER_URL', plugin_dir_url( __FILE__ ) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-acf-customizer-activator.php
 */
function activate_acf_customizer() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-acf-customizer-activator.php';
	Acf_Customizer_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-acf-customizer-deactivator.php
 */
function deactivate_acf_customizer() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-acf-customizer-deactivator.php';
	Acf_Customizer_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_acf_customizer' );
register_deactivation_hook( __FILE__, 'deactivate_acf_customizer' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-acf-customizer.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_acf_customizer() {

	$plugin = new Acf_Customizer();
	$plugin->run();

}
run_acf_customizer();
