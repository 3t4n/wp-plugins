<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://codexinfra.com/afiliado
 * @since             1.0.0
 * @package           Ciwcamp_Affliate_Manager
 *
 * @wordpress-plugin
 * Plugin Name:          Afiliado - Affiliate Manager Program with MLM for WooCommerce
 * Plugin URI:           https://codexinfra.com/afiliado
 * Description:          Affiliate Manager Prime for WooCommerce is the modern and most powerful innovation of CodexInfra Team. Using this plugin you can boost your woocommerce store. We have provided advance features that will be increase your selling. Plugin functionalities are simple that hence you and your affiliates can easily operate dashboard. This plugin is more convenient plugins then other affiliates plugins. .
 * Version:              1.2.2
 * WC requires at least: 3.0
 * WC tested up to: 	 5.0.0
 * Author:               CodexInfra
 * Author URI:           https://codexinfra.com/afiliado
 * License:              GPL-2.0+
 * License URI:          http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:          ciwcamp-affliate-manager
 * Domain Path:          /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if(!defined("CIWCAMP_PLUGIN_DIR"))
{
	define("CIWCAMP_PLUGIN_DIR",plugin_dir_path(__FILE__));
}
if(!defined("CIWCAMP_PLUGIN_URL"))
{
	define("CIWCAMP_PLUGIN_URL",plugin_dir_url(__FILE__));
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'CIWCAMP_AFFLIATE_MANAGER_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/ciwcamp-class-affliate-manager-activator.php
 */
function ciwcamp_activate_affliate_manager() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/ciwcamp-class-affliate-manager-activator.php';
	$ciwcamp_affliate_manager_Activator = new Ciwcamp_Affliate_Manager_Activator();
	$ciwcamp_affliate_manager_Activator->ciwcamp_activate();
}

register_activation_hook( __FILE__, 'ciwcamp_activate_affliate_manager' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/ciwcamp-class-affliate-manager.php';

//Plugin Constant
define('CIWCAMP_DIR', plugin_dir_path( __FILE__ ) );
define('CIWCAMP_URL', plugin_dir_url( __FILE__ ) );
define('CIWCAMP_HOME', home_url() );
if( ! defined('CIWCAMP_ASSETS_COMMON')){
	define('CIWCAMP_ASSETS_COMMON', plugin_dir_url( __FILE__ ).'assets/' );
}

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function ciwcamp_run_affliate_manager() {

	$plugin = new Ciwcamp_Affliate_Manager();
	$plugin->ciwcamp_run();

}

ciwcamp_run_affliate_manager();
