<?php
/**
 * Blocks Initializer
 *
 * Enqueue CSS/JS of all the blocks.
 *
 * @since   1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// include files
require_once(HTBLOCKS_PLG_DIR. 'src/accordion/index.php');
require_once(HTBLOCKS_PLG_DIR. 'src/testimonial/index.php');


/**
 * Enqueue Gutenberg block assets for backend editor.
 */
function htblocks_editor_assets() {
	wp_enqueue_script( 'htblocks-blocks-js', HTBLOCKS_PLG_URI . 'dist/blocks.build.js', array( 'wp-blocks', 'wp-i18n', 'wp-element' ), true );
	wp_enqueue_style( 'htblocks-blocks-editor-css', plugins_url( 'dist/blocks.editor.build.css', dirname( __FILE__ ) ), array( 'wp-edit-blocks' ));
}

/**
 * Enqueue Gutenberg block assets for both frontend + backend.
 */
function htblocks_block_assets() {
	// Styles.
	wp_enqueue_style( 'htblocks-blocks-style-css', HTBLOCKS_PLG_URI . 'dist/blocks.style.build.css', array( 'wp-blocks' ) );
	if(!is_admin()){
		wp_enqueue_style( 'htblocks-helper-style', HTBLOCKS_PLG_URI . 'dist/assets/css/helper-style.css');
	}
	wp_register_style( 'font-awesome', HTBLOCKS_PLG_URI . 'dist/assets/font-awesome/css/font-awesome.min.css', '', '4.7.0' );

	// js
	wp_enqueue_script( 'htblocks-countdown-js', HTBLOCKS_PLG_URI . 'src/countdown/jQuery.countdown.js', array('jquery'), '', '' );
	wp_enqueue_script( 'htblocks-main-js', HTBLOCKS_PLG_URI . 'dist/assets/js//main.js',  '', '', true);
} 

// Hook: Frontend assets.
add_action( 'enqueue_block_assets', 'htblocks_block_assets' );


add_action( 'wp_enqueue_scripts', 'htblocks_header_specific_js');
function htblocks_header_specific_js() {
	wp_enqueue_script( 'slick', HTBLOCKS_PLG_URI . 'src/testimonial/assets/js/slick.min.js', array('jquery'), '',  false  );
}


// Hook: Editor assets.
add_action( 'enqueue_block_editor_assets', 'htblocks_editor_assets' );

// custom image size
function htblocks_image_sizes(){
	add_image_size('550x382-crop', 550, 382, true);
}
add_action('after_setup_theme', 'htblocks_image_sizes');