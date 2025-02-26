<?php
/**
 * @since             1.4
 * @package           ADSMania
 *
 * @wordpress-plugin
 * Plugin Name:       ADS Mania
 * Description:       A plugin for managing the advertisements.
 * Version:           1.4
 * Author:            DevDose
 * Author URI:        http://facebook.com/bakrianoo
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ads-mania
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The core plugin class that is used to define internationalization,
 * dashboard-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-adsmania.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_adsmania() {

	$plugin = new ADSMANIA();
	$plugin->run();

}
run_adsmania();
