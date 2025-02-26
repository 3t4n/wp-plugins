<?php
/**
 * Static Maps Editor
 *
 * @link              https://www.printmaps.net
 * @since             1.0.0
 * @package           Static Maps Editor
 *
 * @wordpress-plugin
 * Plugin Name:       Static Maps Editor
 * Plugin URI:        https://printmaps.net/wordpress-plugin-static-maps-editor
 * Description:       Static Maps Editor to create custom map images and add them to your media library.
 * Version:           1.0.1
 * Author:            Printmaps.net
 * Author URI:        http://www.printmaps.net/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       static-maps-editor
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'STATIC_MAPS_EDITOR_VERSION', '1.0.1' );
define( 'STATIC_MAPS_EDITOR_NAME', 'static-maps-editor' );

require_once plugin_dir_path( __FILE__ ) . 'class-static-maps-editor-init.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
$static_maps_editor_init = new Static_Maps_Editor_Init( STATIC_MAPS_EDITOR_VERSION, STATIC_MAPS_EDITOR_NAME );
$static_maps_editor_init->init();
