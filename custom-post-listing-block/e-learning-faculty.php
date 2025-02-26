<?php
/**
 * Plugin Name: Custom Post Listing Block
 * Plugin URI: -
 * Description: Display custom post listing with thumbnail image.
 * Author: Kushal Shah
 * Author URI: https://profiles.wordpress.org/kushalshah210/
 * Version: 1.0.0
 * License: GPL2+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

defined( 'ABSPATH' ) || exit;

require_once dirname(__FILE__) . '/admin/Faculty_Activator.php';

$Faculty_Activator = new Faculty_Activator();
register_activation_hook( __FILE__, $Faculty_Activator ); //activation hook

/**
 * Enqueue the block's assets for the editor.
 *
 * wp-blocks:  The registerBlockType() function to register blocks.
 * wp-element: The wp.element.createElement() function to create elements.
 * wp-i18n:    The __() function for internationalization.
 *
 * @since 1.0.0
 */
function cpl_backend_enqueue() {
	wp_enqueue_script(
		'mdlr-block-static-jsx-example-backend-script', // Unique handle.
		plugins_url( 'js/block.build.js', __FILE__ ), // block.js: We register the block here.
		array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-components' ) // Dependencies, defined above.
	);
    wp_enqueue_style(
        'faculty-base-css', // Unique handle.
        plugins_url( 'css/base.css', __FILE__ ) // Dependencies, defined above.
    );
    wp_enqueue_style(
        'faculty-bootstrap-css', // Unique handle.
        plugins_url( 'css/bootstrap.css', __FILE__ ) // Dependencies, defined above.
    );
    wp_enqueue_style(
        'faculty-elements-css', // Unique handle.
        plugins_url( 'css/elements.css', __FILE__ ) // Dependencies, defined above.
    );
}
add_action( 'enqueue_block_editor_assets', 'cpl_backend_enqueue' );
add_action( 'init', 'cpl_backend_enqueue' );
