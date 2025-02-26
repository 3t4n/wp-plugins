<?php // phpcs:ignore
/**
 * Easy Replace Image parts.
 *
 * @package eri
 */

$dir  = ERI_PLUGIN_DIR . 'build/';
$url  = ERI_PLUGIN_URL . 'build/';
$deps = [
	'dependencies' => [],
	'version'      => time(),
];

if ( file_exists( $dir . 'index.asset.php' ) ) {
	$deps = require $dir . 'index.asset.php';
}

if ( file_exists( $dir . 'index.js' ) && ! wp_script_is( ERI_PLUGIN_SLUG ) ) {
	wp_register_script( ERI_PLUGIN_SLUG, $url . 'index.js', $deps['dependencies'], $deps['version'], true );
	wp_localize_script( ERI_PLUGIN_SLUG, ERI_PLUGIN_SLUG . 'Settings', [
		'ajaxUrl'       => admin_url( 'admin-ajax.php' ),
		'nonce'         => wp_create_nonce( 'eri' ),
		'defaultType'   => 'upload', // Maybe configure in a new version of the plugin.
		'emptyUrl'      => esc_html__( 'You must specify an image URL.', 'eri' ),
		'failedFetch'   => esc_html__( 'The image could not be fetched.', 'eri' ),
		'emptyFile'     => esc_html__( 'You must select an image file.', 'eri' ),
		'failedUpload'  => esc_html__( 'The image could not be uploaded.', 'eri' ),
		'noFile'        => esc_html__( 'Select a file.', 'eri' ),
		'elementAction' => self::element(),
	] );
	wp_enqueue_script( ERI_PLUGIN_SLUG );
}

if ( file_exists( $dir . 'style-index.css' ) && ! wp_style_is( ERI_PLUGIN_SLUG ) ) {
	wp_enqueue_style( ERI_PLUGIN_SLUG, $url . 'style-index.css', [], $deps['version'], false );
	wp_add_inline_style( ERI_PLUGIN_SLUG, self::make_preset_colors_tokens() );
}
