<?php

/**
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              mhstudio.org
 * @since             1.0.0
 * @package           MHS_Hubspotform
 *
 * @wordpress-plugin
 * Plugin Name:       Mhstudio Hubspot Form Popup
 * Description:       HubSpot's WordPress plugin allows us to add script code in wordpress admin area, You can easily implement hubspot form in popup
 * Version:           1.0.0
 * Author:            Mayank Kapahi
 * Author URI:        mhstudio.org
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       MHS_Hubspotform
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'MHS_HUBSPOT_PLUGIN_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-mhs-hubspotform-activator.php
 */
function mhs_activate_hubspotform() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-mhs-hubspotform-activator.php';
	MHS_Hubspotform_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-mhs-hubspotform-deactivator.php
 */
function mhs_deactivate_hubspotform() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-mhs-hubspotform-deactivator.php';
	MHS_Hubspotform_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'mhs_activate_hubspotform' );
register_deactivation_hook( __FILE__, 'mhs_deactivate_hubspotform' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-mhs-hubspotform.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_mhs_hubspotform() {

	$plugin = new MHS_Hubspotform();
	$plugin->run();

}
run_mhs_hubspotform();
