<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.floristone.com
 * @since             1.0.0
 * @package           Florist_One_Flower_Delivery
 *
 * @wordpress-plugin
 * Plugin Name:       Flower Delivery by Florist One
 * Plugin URI:        https://www.floristone.com/wordpress/
 * Description:       Sell flowers on any website with and earn a 20% commission on flower sales!
 * Version:           3.9.1
 * Author:            Florist One
 * Author URI:        https://www.floristone.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       florist-one-flower-delivery
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-florist-one-flower-delivery-activator.php
 */
function activate_florist_one_flower_delivery() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-florist-one-flower-delivery-activator.php';
	Florist_One_Flower_Delivery_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-florist-one-flower-delivery-deactivator.php
 */
function deactivate_florist_one_flower_delivery() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-florist-one-flower-delivery-deactivator.php';
	Florist_One_Flower_Delivery_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_florist_one_flower_delivery' );
register_deactivation_hook( __FILE__, 'deactivate_florist_one_flower_delivery' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-florist-one-flower-delivery.php';

require_once plugin_dir_path( __FILE__ ) . 'public/flower-delivery.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_florist_one_flower_delivery() {

	$plugin = new Florist_One_Flower_Delivery();
	$plugin->run();

}
run_florist_one_flower_delivery();
