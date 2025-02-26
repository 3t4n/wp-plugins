<?php
/**
 * Blocks Initializer
 *
 * Enqueue CSS/JS of all the blocks.
 *
 * @since   1.0.0
 * @package WPLook Resume Gutenberg Block
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function resume_cv_block_block_assets() {
	// Register block styles for both frontend + backend.
	wp_register_style(
		'resume_cv_block-style-css',
		plugins_url( 'dist/blocks.style.build.css', dirname( __FILE__ ) ),
		array( 'wp-editor' ),
		null
	);

	// Register block editor script for backend.
	wp_register_script(
		'resume_cv_block-block-js', // Handle.
		plugins_url( '/dist/blocks.build.js', dirname( __FILE__ ) ),
		array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor' ),
		null,
		true
	);

	// Register block editor styles for backend.
	wp_register_style(
		'resume_cv_block-block-editor-css', // Handle.
		plugins_url( 'dist/blocks.editor.build.css', dirname( __FILE__ ) ), // Block editor CSS.
		array( 'wp-edit-blocks' ),
		null
	);

	// WP Localized globals. Use dynamic PHP stuff in JavaScript via `wplGlobal` object.
	wp_localize_script(
		'resume_cv_block-block-js',
		'wplGlobal',
		[
			'pluginDirPath' => plugin_dir_path( __DIR__ ),
			'pluginDirUrl'  => plugin_dir_url( __DIR__ ),
		]
	);

	register_block_type(
		'wpl/block-resume-cv-block', array(
			// Enqueue blocks.style.build.css on both frontend & backend.
			'style'         => 'resume_cv_block-style-css',
			// Enqueue blocks.build.js in the editor only.
			'editor_script' => 'resume_cv_block-block-js',
			// Enqueue blocks.editor.build.css in the editor only.
			'editor_style'  => 'resume_cv_block-block-editor-css',
		)
	);
}

// Hook: Block assets.
add_action( 'init', 'resume_cv_block_block_assets' );

// Add Gutenberg Blocks Category
add_filter( 'block_categories', function( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug' => 'resume-cv-blocks-category',
				'title' => __( 'Resume Blocks', 'resume-cv-block' ),
			),
		)
	);
}, 10, 2 );
