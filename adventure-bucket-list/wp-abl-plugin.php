<?php
define('ABL_ENV_URL_WIDGET', 'https://widget.adventurebucketlist.com/');
define('ABL_ENV_URL_REDIRECT', 'https://booking.adventurebucketlist.com/');
define('ABL_ENV_URL_LOADER', 'https://loader.adventurebucketlist.com/');
define('ABL_ENV_URL_ABLWIDGET', 'https://adventurebucketlist.com/abl-widget/');
define('ABL_ENV_URL_EGIFTCARDS', 'https://adventurebucketlist.com/booking/giftcards/');


/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/bucket-list/WP-ABL-Plugin
 * @since             1.0.0
 * @package           WP_ABL_Plugin
 *
 * @wordpress-plugin
 * Plugin Name:       Agenda Plugin by Adventure Bucket List
 * Plugin URI:        https://github.com/bucket-list/WP-ABL-Plugin
 * Description:       The best bookings & reservation plugin for Wordpress. This plugin allows you to connect your Agenda dashboard to your Wordpress website. Follow the instructions to add shortcodes to any page or post. This plugin will allow customers to purchase entered offerings via “Book now” buttons, redirect links, calendar widgets & more. Click here to learn more about Agenda.
 * Version:           1.0.9
 * Author:            Gonzalo Geraldo
 * Author URI:        https://www.adventurebucketlist.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       WP_ABL_Plugin
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-abl-plugin-activator.php
 */
function activate_WP_ABL_Plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-abl-plugin-activator.php';
	WP_ABL_Plugin_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-abl-plugin-deactivator.php
 */
function deactivate_WP_ABL_Plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-abl-plugin-deactivator.php';
	WP_ABL_Plugin_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_WP_ABL_Plugin' );
register_deactivation_hook( __FILE__, 'deactivate_WP_ABL_Plugin' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-abl-plugin.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_WP_ABL_Plugin() {

	$plugin = new WP_ABL_Plugin();
	$plugin->run();

}
run_WP_ABL_Plugin();
