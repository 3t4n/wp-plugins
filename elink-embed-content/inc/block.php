<?php
/**
 * The Gutenberg block for elink embed
 *
 * @package elink-embed
 */

/**
 * Registers all block assets so that they can be enqueued through Gutenberg in
 * the corresponding context.
 *
 * @see https://wordpress.org/gutenberg/handbook/blocks/writing-your-first-block-type/#enqueuing-block-scripts
 */
function elink_block_init() {
	if ( ! function_exists( 'register_block_type' ) ) {
		// Gutenberg is not active.
		return false;
	}

	$dir = dirname( dirname( __FILE__ ) );

	$block_js = 'js/block.js';
	wp_register_script(
		'elink-block-editor',
		plugins_url( $block_js, dirname( __FILE__ ) ),
		array(
			'wp-blocks',
			'wp-i18n',
			'wp-element',
			'wp-editor',
			'wp-components',
		),
		filemtime( "$dir/$block_js" )
	);

	register_block_type( 'elink-shortcode/elink', array(
		'attributes'    => array(
			'src' => array(
				'type' => 'string',
			),
			'id' => array(
				'type' => 'string',
			),
			'align' => array(
				'type' => 'string',
			),
		),
		'editor_script'   => 'elink-block-editor',
		'style'           => 'elink-block',
		'render_callback' => 'elink_shortcode',
	) );
}
add_action( 'init', 'elink_block_init' );
