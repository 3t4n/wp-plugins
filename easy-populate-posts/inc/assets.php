<?php
/**
 * Easy Populate Posts assets.
 *
 * @package spp
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$dir  = SPP_PLUGIN_DIR . 'build/';
$url  = SPP_PLUGIN_URL . 'build/';
$deps = [
	'dependencies' => [],
	'version'      => time(),
];

if ( file_exists( $dir . 'index.asset.php' ) ) {
	$deps = require $dir . 'index.asset.php';
}

if ( file_exists( $dir . 'index.js' ) && ! wp_script_is( 'spp-custom' ) ) {
	wp_register_script( 'spp-custom', $url . 'index.js', $deps['dependencies'], $deps['version'], true );
	wp_localize_script( 'spp-custom', 'sppSettings', [
		'ajaxUrl'      => admin_url( 'admin-ajax.php' ),
		'beginImages'  => self::spp_images_mention(),
		'discardGroup' => __( 'Discard this group of settings?', 'spp' ),
		'messages'     => [
			'settings' => [
				'init'  => __( 'Saving settings…', 'spp' ),
				'done'  => __( 'Done!', 'spp' ),
				'ready' => __( 'Save Settings', 'spp' ),
			],
			'populate' => [
				'init'  => __( 'Generating posts…', 'spp' ),
				'done'  => __( 'Done!', 'spp' ),
				'ready' => __( 'Generate Posts', 'spp' ),
			],
		],
	] );
	wp_enqueue_script( 'spp-custom' );
}

if ( file_exists( $dir . 'style-index.css' ) && ! wp_style_is( 'spp-custom' ) ) {
	wp_enqueue_style( 'spp-custom', $url . 'style-index.css', [], $deps['version'], false );
}
