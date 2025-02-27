<?php

/**
 * @since             1.0.0
 * @package           Wp_Smoother
 *
 * @wordpress-plugin
 * Plugin Name:       WP Smoother - Smooth Scroll, Anchor Scroll, Fade Animations
 * Description:       Make your site super smooth, WP Smoother has features such as: smooth mouse wheel scrolling, smooth anchor scrolling and page load fading animations!
 * Version:           1.1.0
 * Author:            Harry Robinson
 * Plugin URI: https://www.linkedin.com/in/harry-robinson-0660a6126/
 * Author URI: https://www.linkedin.com/in/harry-robinson-0660a6126/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-smoother
 * Domain Path:       /languages
 */







// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-smoother-activator.php
 */
function activate_wp_smoother() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-smoother-activator.php';
	Wp_Smoother_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-smoother-deactivator.php
 */
function deactivate_wp_smoother() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-smoother-deactivator.php';
	Wp_Smoother_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_smoother' );
register_deactivation_hook( __FILE__, 'deactivate_wp_smoother' );

function uninstall_wp_smoother() {
	require_once plugin_dir_path( __FILE__ ) . 'uninstall.php';
	Wp_Smoother_Deactivator::deactivate();
}










/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-smoother.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_smoother() {

	$plugin = new Wp_Smoother();
	$plugin->run();

}
run_wp_smoother();
