<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://aarambhathemes.com/
 * @since             1.0.0
 * @package           Aarambha_Kits
 *
 * @wordpress-plugin
 * Plugin Name:       Aarambha Kits for Elementor
 * Plugin URI:        https://aarambhathemes.com/plugins/aarambha-kits
 * Description:       Aarambha Kits is a features booster Elementor Addons plugin for your WordPress website. It allows you to create any design within a few clicks with the support of 12 free Elementor widgets and 5 free WordPress widgets.
 * Version:           1.0.3
 * Author:            Aarambha Themes
 * Author URI:        https://aarambhathemes.com/
 * Text Domain:       aarambha-kits
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Plugin path.
 * Plugin url.
 * Plugin version.
 *
 * Rename these constants for your plugin
 * Update version as you release new versions.
 */

define( 'AARAMBHA_KITS_PATH', plugin_dir_path( __FILE__ ) );
define( 'AARAMBHA_KITS_URL', plugin_dir_url( __FILE__ ) );
define( 'AARAMBHA_KITS_VERSION', '1.0.3' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-aarambha-kits.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_aarambha_kits() {

	$plugin = new Aarambha_Kits();
	$plugin->run();

}
run_aarambha_kits();
