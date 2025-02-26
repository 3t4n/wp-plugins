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
	$deps = require_once $dir . 'index.asset.php';
}

if ( file_exists( $dir . 'block.js' ) && ! wp_script_is( ERI_PLUGIN_SLUG . '-block' ) ) {
	wp_register_script( ERI_PLUGIN_SLUG . '-block', $url . 'block.js',
		[
			'wp-blocks',
			'wp-editor',
			'wp-i18n',
			'wp-element',
		],
		$deps['version'],
		true
	);
}

register_block_type( 'eri/eri-block', [ 'editor_script' => ERI_PLUGIN_SLUG . '-block' ] );
