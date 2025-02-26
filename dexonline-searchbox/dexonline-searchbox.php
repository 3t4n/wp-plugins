<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://dexonline.ro/unelte
 * @since             1.0
 * @package           Dexonline_Searchbox
 * @author            Alexandru Marian Grigoroiu <grigoroiualexandru@gmail.com>
 *
 * @wordpress-plugin
 * Plugin Name:       Dexonline Searchbox
 * Plugin URI:        https://dexonline.ro/unelte
 * Description:       Adds a searchbox to help easily search romanian words definitions.
 * Version:           1.0
 * Author:            Alexandru Marian Grigoroiu
 * Author URI:        http://grigoroiualex.ro/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       dexonline-searchbox
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/grigoroiualex/dexonline-searchbox-wp-plugin
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-dexonline-searchbox-activator.php
 */
function activate_dexonline_searchbox() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-dexonline-searchbox-activator.php';
	Dexonline_Searchbox_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-dexonline-searchbox-deactivator.php
 */
function deactivate_dexonline_searchbox() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-dexonline-searchbox-deactivator.php';
	Dexonline_Searchbox_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_dexonline_searchbox' );
register_deactivation_hook( __FILE__, 'deactivate_dexonline_searchbox' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-dexonline-searchbox.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0
 */
function run_dexonline_searchbox() {

	$plugin = new Dexonline_Searchbox();
	$plugin->run();

}

run_dexonline_searchbox();
