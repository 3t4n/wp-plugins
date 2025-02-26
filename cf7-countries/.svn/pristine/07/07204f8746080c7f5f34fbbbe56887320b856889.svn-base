<?php

/**
 * The plugin bootstrap file
 *
 * @link              https://atelierlabo.com
 * @since             1.0.0
 * @package           Cf7_Countries
 *
 * @wordpress-plugin
 * Plugin Name:       Contact Form 7 Countries
 * Plugin URI:        cf7-countries
 * Description:       Add countries drop down menu to Contact Form 7.
 * Version:           1.0.0
 * Author:            Atelier Labo
 * Author URI:        https://atelierlabo.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       cf7-countries
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'ATLB_CF7_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-cf7-countries-activator.php
 */
function activate_atlb_cf7_countries() {
	
	if ( ! function_exists( 'deactivate_plugins' ) ) {
	    include_once( ABSPATH . '/wp-admin/includes/plugin.php' );
	}
	
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-atlb-cf7-countries-activator.php';
	Atlb_Cf7_Countries_Activator::activate();
	
	
	if ( current_user_can( 'activate_plugins' ) && ! class_exists( 'WPCF7' ) ) {
	
	    deactivate_plugins( plugin_basename( __FILE__ ) );

	    $error_message = '<p style="font-family:-apple-system,BlinkMacSystemFont,\'Segoe UI\',Roboto,Oxygen-Sans,Ubuntu,Cantarell,\'Helvetica Neue\',sans-serif;font-size: 13px;font-weight:bold;line-height: 1.5;color:#f00;">'.esc_html__( 'This plugin requires ', 'cf7-countries' ) . '<a href="' . esc_url( 'https://wordpress.org/plugins/contact-form-7/' ) . '">Contact Form 7</a>' . esc_html__( ' plugin to be active.', 'cf7-countries' ) . '</p>';
	    die( $error_message ); // WPCS: XSS ok.
	}
	
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-cf7-countries-deactivator.php
 */
function deactivate_atlb_cf7_countries() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-atlb-cf7-countries-deactivator.php';
	Atlb_Cf7_Countries_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_atlb_cf7_countries' );
register_deactivation_hook( __FILE__, 'deactivate_atlb_cf7_countries' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-atlb-cf7-countries.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_atlb_cf7_countries() {
	$plugin = new Atlb_Cf7_Countries();
	$plugin->run();
}

run_atlb_cf7_countries();
