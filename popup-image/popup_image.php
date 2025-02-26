<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              fb.com/hussam7ussien
 * @since             1.0.0
 * @package           Popup_image
 *
 * @wordpress-plugin
 * Plugin Name:       Popup Images
 * Plugin URI:        uri
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.1
 * Author:            Hussam Hussien
 * Author URI:        fb.com/hussam7ussien
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       popup_image
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-popup_image-activator.php
 */
function activate_popup_image() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-popup_image-activator.php';
	Popup_image_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-popup_image-deactivator.php
 */
function deactivate_popup_image() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-popup_image-deactivator.php';
	Popup_image_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_popup_image' );
register_deactivation_hook( __FILE__, 'deactivate_popup_image' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-popup_image.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_popup_image() {

	$plugin = new Popup_image();
	$plugin->run();

}
run_popup_image();
