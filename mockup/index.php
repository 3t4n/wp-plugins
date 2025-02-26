<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://mockupplugin.com
 * @since             1.6.3
 * @package           MockUp
 *
 * @wordpress-plugin
 * Plugin Name:       MockUp
 * Plugin URI:        https://mockupplugin.com
 * Description:       MockUp helps you to present your designs professionally.
 * Version:           1.6.3
 * Author:            Eelco Tjallema
 * Author URI:        http://estjallema.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       MockUp
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	exit;
}

/**
 * Define custom post type, custom taxonomy and the slug for the options page.
 *
 */
define('MOCKUP_POSTTYPE', 'pt_mockup_plugin');
define('MOCKUP_TAXONOMY', 'relate_mockup');
define('MOCKUP_OPTIONSPAGE_SLUG', 'mockup_options');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-mockup-activator.php
 *
 */
function activate_plugin_name() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-mockup-activator.php';
	MockUp_Activator::activate();
}

register_activation_hook( __FILE__, 'activate_plugin_name' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-mockup.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since 1.6.3
 */
function run_mockup() {

	$plugin = new MockUp();
	$plugin->run();

}
run_mockup();