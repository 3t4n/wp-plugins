<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/Clayful
 * @since             1.0.0
 * @package           Clayful_Thunder
 *
 * @wordpress-plugin
 * Plugin Name:       Clayful Thunder
 * Plugin URI:        https://github.com/Clayful/clayful-thunder-wordpress
 * Description:       클레이풀 쇼핑 위젯(썬더)의 설치 및 위젯 디스플레이를 위한 워드프레스 플러그인입니다.
 * Version:           1.0.0
 * Author:            Clayful
 * Author URI:        https://clayful.io
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       clayful-thunder
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
define( 'CLAYFUL_THUNDER_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-clayful-thunder-activator.php
 */
function activate_clayful_thunder() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-clayful-thunder-activator.php';
	Clayful_Thunder_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-clayful-thunder-deactivator.php
 */
function deactivate_clayful_thunder() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-clayful-thunder-deactivator.php';
	Clayful_Thunder_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_clayful_thunder' );
register_deactivation_hook( __FILE__, 'deactivate_clayful_thunder' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-clayful-thunder.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_clayful_thunder() {

	$plugin = new Clayful_Thunder();
	$plugin->run();

}
run_clayful_thunder();
