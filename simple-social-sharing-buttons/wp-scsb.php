<?php

/**
 * @link              http://www.2803media.fr/
 * @since             1.0.0
 * @package           Wp_Scsb
 *
 * @wordpress-plugin
 * Plugin Name:       simple social sharing buttons
 * Plugin URI:        http://www.2803media.fr/plugins/simple-social-sharing-buttons
 * Description:       A simple and elegant way to display social buttons with counters.
 * Version:           1.0.0
 * Author:            2803 MEDIA
 * Author URI:        http://www.2803media.fr/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-scsb
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-scsb-activator.php
 */
function activate_wp_scsb() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-scsb-activator.php';
	Wp_Scsb_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-scsb-deactivator.php
 */
function deactivate_wp_scsb() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-scsb-deactivator.php';
	Wp_Scsb_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_scsb' );
register_deactivation_hook( __FILE__, 'deactivate_wp_scsb' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-scsb.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_scsb() {

	$plugin = new Wp_Scsb();
	$plugin->run();

}
run_wp_scsb();
