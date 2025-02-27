<?php

namespace osom\Osom_Blocks;

add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\enqueue_block_editor_assets' );

/**
 * Enqueue block editor only JavaScript and CSS.
 */
function enqueue_block_editor_assets() {
	// Make paths variables so we don't write em twice ;)
	$block_path = '/assets/js/editor.blocks.js';
	$style_path = '/assets/css/blocks.editor.css';

	// Enqueue the bundled block JS file
	wp_enqueue_script(
		'osomblocks-js',
		_get_plugin_url() . $block_path,
		array(
			'wp-i18n',
			'wp-element',
			'wp-blocks',
			'wp-components',
			'wp-editor',
		),
		filemtime( _get_plugin_directory() . $block_path ),
		true
	);

	// Enqueue optional editor only styles
	wp_enqueue_style(
		'osomblocks-editor-css',
		_get_plugin_url() . $style_path,
		array(),
		filemtime( _get_plugin_directory() . $style_path )
	);
}

add_action( 'enqueue_block_assets', __NAMESPACE__ . '\enqueue_assets' );

/**
 * Enqueue front end and editor JavaScript and CSS assets.
 */
function enqueue_assets() {
	$style_path = '/assets/css/blocks.style.css';

	wp_enqueue_style(
		'osomblocks',
		_get_plugin_url() . $style_path,
		null,
		filemtime( _get_plugin_directory() . $style_path )
	);
}

add_action( 'enqueue_block_assets', __NAMESPACE__ . '\enqueue_frontend_assets' );
/**
 * Enqueue frontend JavaScript and CSS assets.
 */
function enqueue_frontend_assets() {

	if ( is_admin() ) {
		return;
	}

	$block_path = '/assets/js/frontend.blocks.js';
	wp_enqueue_script(
		'osomblocks-frontend',
		_get_plugin_url() . $block_path,
		array(),
		filemtime( _get_plugin_directory() . $block_path ),
		true
	);
}

function osom_block_categories( $categories ) {

	$osom_blocks = array_merge(
		$categories,
		array(
			array(
				'slug'  => 'osomblocks',
				'title' => __( 'Osom Blocks', 'osomblocks' ),
			),
		)
	);

	return $osom_blocks;
}

add_filter( 'block_categories', __NAMESPACE__ . '\osom_block_categories', 10 );
