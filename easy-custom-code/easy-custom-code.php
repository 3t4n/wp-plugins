<?php
/**
 * Plugin Name:       Easy Custom Code (LESS/CSS/JS) - Live editing
 * Plugin URI:        https://www.web357.com/product/easy-custom-code-wordpress-plugin
 * Description:       Easily add custom LESS/CSS/JAVASCRIPT code and external resources (stylesheets and scripts) into your website via the WP customizer.
 * Version:           1.1.2
 * Author:            Web357
 * Author URI:        https://www.web357.com/
 * License:           GPL-3.0
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       easy-custom-code
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 */
if ( !defined( 'EASYCUSTOMCODE_VERSION' ) ) {
	define( 'EASYCUSTOMCODE_VERSION', '1.1.2' );
}



/**
 * The code that runs during plugin activation.
 */
function activate_EasyCustomCode() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-activator.php';
	EasyCustomCode_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 */
function deactivate_EasyCustomCode() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-deactivator.php';
	EasyCustomCode_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_EasyCustomCode' );
register_deactivation_hook( __FILE__, 'deactivate_EasyCustomCode' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-main.php';

/**
 * Begins execution of the plugin.
 */
function run_EasyCustomCode() 
{
	$plugin = new EasyCustomCode();
	$plugin->run();
}
run_EasyCustomCode();



// Load the main functionality of plugin
require_once (plugin_dir_path( __FILE__ ) . 'includes/class-w357-easy-custom-code.php');