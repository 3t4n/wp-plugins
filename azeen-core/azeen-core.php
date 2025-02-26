<?php
/*
Plugin Name: Azeen Core
Plugin URI:
Description: Adds front page sections and other extensions to Azeen WordPress theme.
Version: 1.0.0
Author: imonthemes
Author URI:
Text Domain: azeen-core
Domain Path: /languages
License: GPLv2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'AZEEN_CORE_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in inc/class-azeen-core-activator.php
 */
function activate_azeen_core() {
	require_once plugin_dir_path( __FILE__ ) . 'inc/class-azeen-core-activator.php';
	Azeen_Core_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in inc/class-azeen-core-deactivator.php
 */
function deactivate_azeen_core() {
	require_once plugin_dir_path( __FILE__ ) . 'inc/class-azeen-core-deactivator.php';
	Azeen_Core_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_azeen_core' );
register_deactivation_hook( __FILE__, 'deactivate_azeen_core' );

require_once plugin_dir_path( __FILE__ ) . 'inc/class-azeen-core.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_azeen_core() {

	$plugin = new Azeen_Core();

}
run_azeen_core();
