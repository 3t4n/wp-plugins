<?php
/**
 * Blocks Initializer
 *
 * Enqueue CSS/JS of all the blocks.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue Gutenberg block assets for both frontend + backend.
 *
 * Assets enqueued:
 * 1. blocks.style.build.css - Frontend + Backend.
 * 2. blocks.build.js - Backend.
 * 3. blocks.editor.build.css - Backend.
 *
 * @uses {wp-blocks} for block type registration & related functions.
 * @uses {wp-element} for WP Element abstraction — structure of blocks.
 * @uses {wp-i18n} to internationalize the block's text.
 * @uses {wp-editor} for WP editor styles.
 * @since 1.0.0
 */
function mbg_faq_page_block_assets() { // phpcs:ignore
	// Register block styles for both frontend + backend.
	wp_register_style(
		'mbg_faq_page-cgb-style-css', // Handle.
		plugins_url( 'dist/blocks.style.build.css', dirname( __FILE__ ) ), // Block style CSS.
		array( 'wp-editor' ), // Dependency to include the CSS after it.
		null // filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.style.build.css' ) // Version: File modification time.
	);

	// Register block editor script for backend.
	wp_register_script(
		'mbg_faq_page-cgb-block-js', // Handle.
		plugins_url( '/dist/blocks.build.js', dirname( __FILE__ ) ), // Block.build.js: We register the block here. Built with Webpack.
		array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor' ), // Dependencies, defined above.
		null, // filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.build.js' ), // Version: filemtime — Gets file modification time.
		true // Enqueue the script in the footer.
	);

	// Register block editor styles for backend.
	wp_register_style(
		'mbg_faq_page-cgb-block-editor-css', // Handle.
		plugins_url( 'dist/blocks.editor.build.css', dirname( __FILE__ ) ), // Block editor CSS.
		array( 'wp-edit-blocks' ), // Dependency to include the CSS after it.
		null // filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.editor.build.css' ) // Version: File modification time.
	);

	// WP Localized globals. Use dynamic PHP stuff in JavaScript via `cgbGlobal` object.
	wp_localize_script(
		'mbg_faq_page-cgb-block-js',
		'cgbGlobal', // Array containing dynamic data for a JS Global.
		[
			'pluginDirPath' => plugin_dir_path( __DIR__ ),
			'pluginDirUrl'  => plugin_dir_url( __DIR__ ),
			// Add more data here that you want to access from `cgbGlobal` object.
		]
	);

	register_block_type(
		'cgb/block-test-block', array(
			// Enqueue blocks.style.build.css on both frontend & backend.
			'style'         => 'mbg_faq_page-cgb-style-css',
			// Enqueue blocks.build.js in the editor only.
			'editor_script' => 'mbg_faq_page-cgb-block-js',
			// Enqueue blocks.editor.build.css in the editor only.
			'editor_style'  => 'mbg_faq_page-cgb-block-editor-css',
		)
	);
}

// Hook: Block assets.
add_action( 'init', 'mbg_faq_page_block_assets' );


function mbg_faq_page_language_attributes_filter( $output, $doctype ){
    // filter...

    global $post, $wp_query;

    if(
		stripos($post->post_content, 'mbg-faq-block') !== FALSE
		&& stripos($output, 'schema.org/FAQPage') === FALSE
		&& $wp_query->is_single
    ){
		$output .= '  itemscope itemtype="https://schema.org/FAQPage" ';
    }
    

    return $output;
}

add_filter( 'language_attributes', 'mbg_faq_page_language_attributes_filter', 10, 2 );

