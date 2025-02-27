<?php 
/**
 * Plugin Name: Shrinkwrap Images
 * Plugin URI: https://wordpress.org/plugins/shrinkwrap-images
 * Description: This plugin will help prevent image downloads.
 * Author: Ben Dunkle
 * Version: 1.3.2
 * Author URI: https://bendunkle.com/
 */

// Define version.
if ( ! defined( 'SHRINKWRAP_IMAGES_VERSION' ) ) {
	define( 'SHRINKWRAP_IMAGES_VERSION', implode( get_file_data( __FILE__, array( 'Version' ), 'plugin' ) ) );
}

/**
 * Enqueue items.
 *
 * @since 1.0.0
 */
function eol_si_enqueue_script() {
	wp_enqueue_style( 'swimgcss', plugin_dir_url( __FILE__ ) . 'shrinkwrap_images.css', array(), SHRINKWRAP_IMAGES_VERSION );

	wp_enqueue_script( 'arrive', plugin_dir_url( __FILE__ ) . 'arrive.min.js', array(), SHRINKWRAP_IMAGES_VERSION, true );

	wp_register_script( 'swimgjs', plugin_dir_url( __FILE__ ) . 'shrinkwrap_images.js', array( 'jquery' ), SHRINKWRAP_IMAGES_VERSION, true );

	wp_localize_script(
		'swimgjs',
		'php_vars',
		array(
			'plugindir' => plugin_dir_url( __FILE__ ) . 'clear.gif',
		)
	);

	wp_enqueue_script( 'swimgjs' );
}

add_action( 'wp_enqueue_scripts', 'eol_si_enqueue_script' );
