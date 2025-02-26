<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * and defines a function that starts the plugin.
 *
 * @link              https://codealtdel.com/
 * @since             1.0.0
 * @package           Age_Okay
 *
 * @wordpress-plugin
 * Plugin Name:       Age Okay
 * Plugin URI:        https://codealtdel.com/age-okay
 * Description:       Age Verification Plugin
 * Version:           1.0.3
 * Author:            Code Alt Del
 * Author URI:        https://codealtdel.com/
 * Text Domain:       age-okay
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) || defined( 'AGE_OKAY_VERSION' ) ) {
	die;
}

// Current plugin version.
define( 'AGE_OKAY_VERSION', '1.0.3-F' );

// Debugging js and css files, when true use non minified versions. Can omit.
define( 'AGE_OKAY_DEBUG', false );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-age-okay.php';

/**
 * Begins execution of the plugin.
 *
 * @since    1.0.0
 */
function run_age_okay() {

	$age_okay_plugin = new Age_Okay();
	$age_okay_plugin->run();

}
run_age_okay();
