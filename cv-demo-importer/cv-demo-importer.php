<?php
/**
 * Plugin Name:		CV Demo Importer
 * Plugin URI: 		https://wordpress.org/plugins/cv-demo-importer/
 * Description:		One Click Demo Importer For CodeVibrant official themes demo content, customization options, widgets and theme settings.
 * Version:			1.0.6
 * Author:			CodeVibrant
 * Author URI:		https://codevibrant.com/
 * License:			GPLv2 or later
 * License URI:		http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:		cv-demo-importer
 * Domain Path:		/languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 */
if ( ! defined( 'CVDI_VERSION' ) ) {
	define( 'CVDI_VERSION', '1.0.6' );
}

if ( ! defined( 'CVDI_TD' ) ) {
	define( 'CVDI_TD', 'cv-demo-importer' );
}

if ( ! defined( 'CVDI_PLUGIN_DIR' ) ) {
	define( 'CVDI_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}

if ( ! defined( 'CVDI_PLUGIN_URL' ) ) {
	define( 'CVDI_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}

if ( ! defined( 'CVDI_PLUGIN_FILE_DIR' ) ) {
	define( 'CVDI_PLUGIN_FILE_DIR', CVDI_PLUGIN_DIR .'cv-demo-importer.php' );
}

if ( ! defined( 'CVDI_ADMIN_DIR' ) ) {
	define( 'CVDI_ADMIN_DIR', WP_PLUGIN_DIR . '/cv-demo-importer/admin/' );
}

if ( ! defined( 'CVDI_PLUGIN_FILE' ) ) {
	define( 'CVDI_PLUGIN_FILE', __FILE__ );
}

if ( ! defined( 'CVDI_PLUGIN_BASENAME' ) ) {
	define( 'CVDI_PLUGIN_BASENAME', plugin_basename( CVDI_PLUGIN_FILE ) );
}

/**
 * The core plugin class that is used to define the demo library list.
 */
require plugin_dir_path(__FILE__) . 'includes/class-cvdi-library.php';

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-cvdi-activator.php
 */
function cvdi_activator() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-cvdi-activator.php';
	CVDI_Activator::activate();
}

register_activation_hook( __FILE__, 'cvdi_activator' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-cvdi.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function cvdi_run() {
	$plugin = new CVDI();
	$plugin->run();
}
cvdi_run();
