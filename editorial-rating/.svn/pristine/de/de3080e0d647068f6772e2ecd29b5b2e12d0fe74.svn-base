<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://wpqode.com/
 * @package           WPAS_Editorial_Rating
 *
 * @wordpress-plugin
 * Plugin Name:       Editorial Rating
 * Plugin URI:        https://wpqode.com/plugins/editorial_rating
 * Description:       This plugin allows you to show review scores, pros and cons on individual single page's after content, and sidebar with sticky mode.
 * Version:           4.0.2
 * Author:            PLUGINIC
 * Author URI:        https://wpqode.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wpas_editorial_rating
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
define( 'WPAS_Editorial_Rating_VERSION', '4.0.2' );
define( 'WPASER_DIR_PATH_FILE', plugin_dir_path( __FILE__ ) );
define( 'WPASER_DIR_URL_FILE', plugin_dir_url( __FILE__ ) );
define( 'WPASER_BASE_FILE', plugin_basename( __FILE__ ) );
if ( defined( 'WPAS_Editorial_Rating_VERSION' ) ) {

	$frhd_pro = file_exists( __DIR__ . '/admin/class-average-score-pro-base.php' );

	if ( ! $frhd_pro ) {

		define( 'WPASER_COPY', 'ESSENTIAL' );
	} else {

		define( 'WPASER_COPY', 'PRESTIGE' );
	}
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-average-score-activator.php
 */
function activate_WPAS_Editorial_Rating() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-average-score-activator.php';
	WPAS_Editorial_Rating_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-average-score-deactivator.php
 */
function deactivate_WPAS_Editorial_Rating() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-average-score-deactivator.php';
	WPAS_Editorial_Rating_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_WPAS_Editorial_Rating' );
register_deactivation_hook( __FILE__, 'deactivate_WPAS_Editorial_Rating' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-average-score.php';

/**
 * Calling The Framework.
 */
require_once plugin_dir_path( __FILE__ ) . 'admin/wpas-framework/classes/setup.class.php';
require_once plugin_dir_path( __FILE__ ) . 'admin/wpas-framework/options/metabox-options.php';
require_once plugin_dir_path( __FILE__ ) . 'admin/wpas-framework/options/metabox-er-opt.php';
require_once plugin_dir_path( __FILE__ ) . 'admin/wpas-framework/options/metabox-cross-rating.php';
require_once plugin_dir_path( __FILE__ ) . 'admin/wpas-framework/options/widget-options.php';
require_once plugin_dir_path( __FILE__ ) . 'admin/wpas-framework/options/global-options.php';
require_once plugin_dir_path( __FILE__ ) . 'admin/wpas-framework/options/admin-recommended.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_WPAS_Editorial_Rating() {

	$plugin = new WPAS_Editorial_Rating();
	$plugin->run();

}
run_WPAS_Editorial_Rating();
