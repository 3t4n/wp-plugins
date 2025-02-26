<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              www.ausmed.com
 * @since             2.2.0
 * @package           Ausmed_Document_Button
 *
 * @wordpress-plugin
 * Plugin Name:       Ausmed Document CPD Button
 * Plugin URI:        https://www.ausmed.com/button
 * Description:       This is a WordPress plugin from Ausmed to enable you to document CPD activities from your content by clicking a single button.
 * Version:           2.2.0
 * Author:            Ausmed
 * Author URI:        www.ausmed.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ausmed-document-button
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ausmed-document-button-activator.php
 */
function activate_ausmed_document_button() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ausmed-document-button-activator.php';
	Ausmed_Document_Button_Activator::activate();
}


/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ausmed-document-button-deactivator.php
 */
function deactivate_ausmed_document_button() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ausmed-document-button-deactivator.php';
	Ausmed_Document_Button_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_ausmed_document_button' );
register_deactivation_hook( __FILE__, 'deactivate_ausmed_document_button' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-ausmed-document-button.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    2.2.0
 */
function run_ausmed_document_button() {

	$plugin = new Ausmed_Document_Button();
	$plugin->run();

}
run_ausmed_document_button();
