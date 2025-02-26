<?php
/**
 * Plugin Name:       Astrolabe
 * Description:       Astrolabe adds a bottom fixed menu that follows the user as they scroll, in the bottom area of the screen.
 * Version:           1.0.0
 * Author:            Matt Bonacini
 * Author URI:        https://takeoff.design/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       astrolabe
 *
 * @package Astrolabe
 * @since   1.0.0
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'ASTR_PLUGIN_VERSION', '1.0.03' );

define( 'ASTR_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

define( 'ASTR_PLUGIN_URL', plugins_url( '', __FILE__ ) );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-astrolabe-core.php';

/**
 * The main function responsible for returning the instance of this plugin.
 *
 * @since 1.0.0
 *
 * @return ASTR_Astrolabe_Dock
 */
function astr_dock_init() {
	// Instantiate only once
	if ( ! isset( $core_class ) ) {
		$core_class = new ASTR_Astrolabe_Dock();
		$core_class->initialize();
	}
	return $core_class;
}

// Instantiate
astr_dock_init();
