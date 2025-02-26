<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              dcgws.com
 * @since             1.0.0
 * @package           EDD Google Customer Reviews
 *
 * @wordpress-plugin
 * Plugin Name:       EDD Google Customer Reviews
 * Plugin URI:        http://dcgws.com/
 * Description:       Allows Google Customer Reviews opt-in code to be inserted into Easy Digital Downloads.
 * Version:           1.0.0
 * Author:            DCGWS Internet Solutions
 * Author URI:        http://dcgws.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       dcgws.com
 * Domain Path:       /languages
 * EDD requires at least: 4.0.0
 * EDD tested up to: 4.9.8
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
define( 'EDD_GOOGLE_CUSTOMER_REVIEWS_VERSION', '1.0.0' );
/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-edd-google-customer-reviews-activator.php
 */
function activate_edd_google_customer_reviews() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-edd-google-customer-reviews-activator.php';
	EDD_Google_Customer_Reviews_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-edd-google-customer-reviews-deactivator.php
 */
function deactivate_edd_google_customer_reviews() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-edd-google-customer-reviews-deactivator.php';
	EDD_Google_Customer_Reviews_Deactivator::deactivate();
}
register_activation_hook( __FILE__, 'activate_edd_google_customer_reviews' );
register_deactivation_hook( __FILE__, 'deactivate_edd_google_customer_reviews' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-edd-google-customer-reviews.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */

function run_edd_google_customer_reviews() {
    $plugin = new EDD_Google_Customer_Reviews();
	$plugin->run();
}
run_edd_google_customer_reviews();
