<?php

/**
 * Plugin Name: Audius Block
 * Plugin URI: https://github.com/audius/wordpress
 * Description: Easily embed your favorite tracks from Audius, a brand-new streaming platform built for all musicians.
 * Version: 1.1.0
 * Author: Audius
 * Author URI: https://audius.co/
 *
 * @package audius-wp
 */

defined( 'ABSPATH' ) || exit;

function register_audius_block() {

	// automatically load dependencies and version
	$asset_file = include( plugin_dir_path( __FILE__ ) . 'build/index.asset.php');

	wp_register_script(
		'audius-block',
		plugins_url( 'build/index.js', __FILE__ ),
		$asset_file['dependencies'],
		$asset_file['version']
	);

	wp_register_style(
		'audius-block',
		plugins_url( 'style.css', __FILE__ ),
		array( ),
		filemtime( plugin_dir_path( __FILE__ ) . 'style.css' )
	);

	register_block_type( 'audius/embed-block', array(
		'style' => 'audius-block',
		'editor_script' => 'audius-block',
	) );

}
add_action( 'init', 'register_audius_block' );