<?php

/**
 * The plugin bootstrap file
 *
 * Just a Map plugin
 *
 * @link              https://www.giuliani.studio/wordpress/
 * @since             1.0.0
 * @package           GSWPGMAP
 *
 * @wordpress-plugin
 * Plugin Name:       GS Simple Map
 * Plugin URI:        https://www.giuliani.studio/wordpress/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Giuliani Studio
 * Author URI:        https://www.giuliani.studio
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       gswpgmap
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'SETTINGS_PAGE_VERSION', '1.0.0' );

/**
 * This action is documented in includes/class-settings-page-activator.php
 */
function activate_settings_page() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-gswpgmap-page-activator.php';
	GSWPGMAP_Page_Activator::activate();
}

/**
 * This action is documented in includes/class-settings-page-deactivator.php
 */
function deactivate_settings_page() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-gswpgmap-page-deactivator.php';
	GSWPGMAP_Page_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_settings_page' );
register_deactivation_hook( __FILE__, 'deactivate_settings_page' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-gswpgmap-page.php';

/**
 * Begins execution of the plugin.
 * @since    1.0.0
 */
function run_settings_page() {

	$plugin = new GSWPGMAP_Page();
	$plugin->run();

}
run_settings_page();
