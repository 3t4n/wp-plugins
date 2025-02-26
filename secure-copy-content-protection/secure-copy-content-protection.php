<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://ays-pro.com/
 * @since             1.0.0
 * @package           Secure_Copy_Content_Protection
 *
 * @wordpress-plugin
 * Plugin Name:       Secure Copy Content Protection
 * Plugin URI:        https://ays-pro.com/index.php/wordpress/secure-copy-content-protection/
 * Description:       Copy Protection plugin is activated it disables the right click, copy paste, content selection and copy shortcut keys
 * Version:           1.0.0
 * Author:            Copy Content Protection Team
 * Author URI:        https://ays-pro.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       secure-copy-content-protection
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
define( 'SCCP_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-secure-copy-content-protection-activator.php
 */
function activate_secure_copy_content_protection() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-secure-copy-content-protection-activator.php';
	Secure_Copy_Content_Protection_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-secure-copy-content-protection-deactivator.php
 */
function deactivate_secure_copy_content_protection() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-secure-copy-content-protection-deactivator.php';
	Secure_Copy_Content_Protection_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_secure_copy_content_protection' );
register_deactivation_hook( __FILE__, 'deactivate_secure_copy_content_protection' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-secure-copy-content-protection.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_secure_copy_content_protection() {

	$plugin = new Secure_Copy_Content_Protection();
	$plugin->run();

}
run_secure_copy_content_protection();
