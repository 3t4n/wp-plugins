<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.aotomot.com
 * @since             1.0.0
 * @package           Aotomot_Gallery
 *
 * @wordpress-plugin
 * Plugin Name:       Aotomot Gallery
 * Plugin URI:        https://www.aotomot.com/aotomot-gallery-demo
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Aotomot Pty Ltd.
 * Author URI:        https://www.aotomot.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       aotomot-gallery
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'AOTOMOT_GALLERY_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-aotomot-gallery-activator.php
 */
function activate_aotomot_gallery() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-aotomot-gallery-activator.php';
	Aotomot_Gallery_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-aotomot-gallery-deactivator.php
 */
function deactivate_aotomot_gallery() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-aotomot-gallery-deactivator.php';
	Aotomot_Gallery_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_aotomot_gallery' );
register_deactivation_hook( __FILE__, 'deactivate_aotomot_gallery' );

/**
 * Aotomot Gallery API
 */
require plugin_dir_path( __FILE__ ) . 'public/partials/aotomot-gallery-public-api.php';

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-aotomot-gallery.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_aotomot_gallery() {

	$plugin = new Aotomot_Gallery();
	$plugin->run();
}
run_aotomot_gallery();
