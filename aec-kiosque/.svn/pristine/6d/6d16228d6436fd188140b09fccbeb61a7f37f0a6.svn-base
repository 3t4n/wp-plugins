<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://atl-software.net/
 * @since             1.0.0
 * @package           Aec
 *
 * @wordpress-plugin
 * Plugin Name:       AEC Kiosque
 * Plugin URI:        https://atl-software.net/en/nos_solutions/kiosque/
 * Description:       This plugin allows you to connect your website to your AEC application. You can then display components such as the lists of courses open to registration on your web pages. For more information on how to use this plugin, email us at <a href="mailto:support@atl-software.net">support@atl-software.net</a>
 * Version:           1.8.2
 * Author:            ATL Software
 * Author URI:        https://atl-software.net/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       aec
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if( !defined( 'WPINC' ) )
{
	die;
}

define( 'AEC_VERSION', '1.8.2' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-aec-activator.php
 */
function activate_aec()
{
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-aec-activator.php';
	Aec_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-aec-deactivator.php
 */
function deactivate_aec()
{
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-aec-deactivator.php';
	Aec_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_aec' );
register_deactivation_hook( __FILE__, 'deactivate_aec' );

/**
 * Include the main Aec class.
 *
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
if( !class_exists( 'Aec' ) )
{
	include_once plugin_dir_path( __FILE__ ) . 'includes/class-aec.php';
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


function AEC()
{
	return Aec::instance();
}
add_action('init', 'AEC');
