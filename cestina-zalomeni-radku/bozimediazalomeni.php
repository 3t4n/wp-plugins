<?php

/**
 * The plugin bootstrap file
 *
 * @link              https://www.bozimedia.cz
 * @since             1.0.1
 * @package           Bozimediazalomeni
 *
 * @wordpress-plugin
 * Plugin Name:       Čeština: zalomení řádků
 * Plugin URI:        https://www.bozimedia.cz
 * Description:       Grammar rules for Czech language with related to word wrapping at the end of line.
 * Version:           1.0.3
 * Author:            Marek Vratil
 * Author URI:        https://www.linkedin.com/in/marekvratil/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       bozimediazalomeni
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 */
define( 'BOZIMEDIAZALOMENI_VERSION', '1.0.3' );
define( 'BOZIMEDIAZALOMENI_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
define( 'BOZIMEDIAZALOMENI_PLUGIN_PATH',  plugin_dir_url(__FILE__));

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-bozimediazalomeni-activator.php
 */
function activate_bozimediazalomeni() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bozimediazalomeni-activator.php';
	Bozimediazalomeni_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-bozimediazalomeni-deactivator.php
 */
function deactivate_bozimediazalomeni() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bozimediazalomeni-deactivator.php';
	Bozimediazalomeni_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_bozimediazalomeni' );
register_deactivation_hook( __FILE__, 'deactivate_bozimediazalomeni' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-bozimediazalomeni.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_bozimediazalomeni() {

	$plugin = new Bozimediazalomeni();
	$plugin->run();

}
run_bozimediazalomeni();
