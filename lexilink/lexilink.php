<?php
/**
 * @wordpress-plugin
 * Plugin Name:       Lexilink
 * Plugin URI:        https://webdeclic.com/lexilink
 * Description:       Generate a glossary with a shortcode and a custom post type.
 * Version:           1.0.0
 * Author:            Webdeclic
 * Author URI:        https://webdeclic.com
 * License:           GPL-2.0+
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       lexilink
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) die;

/**
 * Check if your are in local or production environment
 */
$is_local = isset($_SERVER['REMOTE_ADDR']) && ($_SERVER['REMOTE_ADDR'] == '127.0.0.1' || $_SERVER['REMOTE_ADDR'] == '::1');

/**
 * If you are in local environment, you can use the version number as a timestamp for better cache management in your browser
 */
$version  = get_file_data( __FILE__, array( 'Version' => 'Version' ), false )['Version'];

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'LEXILINK_VERSION', $version );

/**
 * You can use this const for check if you are in local environment
 */
define( 'LEXILINK_DEV_MOD', $is_local );

/**
 * Plugin Name Path for plugin includes.
 */
define( 'LEXILINK_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

/**
 * Plugin Name URL for plugin sources (css, js, images etc...).
 */
define( 'LEXILINK_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-lexilink-activator.php
 */
register_activation_hook( __FILE__, function(){
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-lexilink-activator.php';
	Lexilink_Activator::activate();
} );

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-lexilink-deactivator.php
 */
register_deactivation_hook( __FILE__, function(){
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-lexilink-deactivator.php';
	Lexilink_Deactivator::deactivate();
} );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-lexilink.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function lexilink_run() {

	$plugin = new Lexilink();
	$plugin->run();

}
lexilink_run();
