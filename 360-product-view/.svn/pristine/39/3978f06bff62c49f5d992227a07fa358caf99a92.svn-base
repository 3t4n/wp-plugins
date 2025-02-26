<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.linkedin.com/in/minhtuan2086/
 * @since             1.0.0
 * @package           Yup_360_Product
 *
 * @wordpress-plugin
 * Plugin Name:       YUP 360 product view
 * Plugin URI:        https://www.linkedin.com/in/minhtuan2086/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            MINH TUAN NGUYEN
 * Author URI:        https://www.linkedin.com/in/minhtuan2086/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       yup-360-product
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-yup-360-product-activator.php
 */
function activate_yup_360_product() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-yup-360-product-activator.php';
	Yup_360_Product_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-yup-360-product-deactivator.php
 */
function deactivate_yup_360_product() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-yup-360-product-deactivator.php';
	Yup_360_Product_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_yup_360_product' );
register_deactivation_hook( __FILE__, 'deactivate_yup_360_product' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-yup-360-product.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_yup_360_product() {

	$plugin = new Yup_360_Product();
	$plugin->run();

}
run_yup_360_product();
