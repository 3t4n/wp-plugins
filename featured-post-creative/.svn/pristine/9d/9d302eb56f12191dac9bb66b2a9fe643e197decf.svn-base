<?php
/**
 * Blocks Initializer
 * 
 * @package Featured Post Creative
 * @since 1.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function wpfp_register_guten_block() {

	wp_register_script( 'wpfp-block-js', WPFP_URL.'assets/js/blocks.build.js', array( 'wp-blocks', 'wp-block-editor', 'wp-i18n', 'wp-element', 'wp-components' ), WPFP_VERSION, true );
	wp_localize_script( 'wpfp-block-js', 'Wpfp_Block', array(
															'pro_demo_link'		=> 'https://demo.essentialplugin.com/prodemo/pro-featured-and-trending-post/',
															'free_demo_link'	=> 'https://demo.essentialplugin.com/featured-post-creative-demo/',
															'pro_link'			=> WPFP_PLUGIN_LINK_UNLOCK,
														));

	// Register block and explicit attributes for grid
	register_block_type( 'wpfp/wpfp-grid', array(
		'attributes' => array(
			'design' => array(
							'type'		=> 'string',
							'default'	=> 'design-1',
						),
			'grid' => array(
							'type'		=> 'number',
							'default'	=> 3,
						),
			'show_author' => array(
							'type'		=> 'boolean',
							'default'	=> true,
						),
			'show_date' => array(
							'type'		=> 'boolean',
							'default'	=> true,
						),
			'show_category_name' => array(
							'type'		=> 'boolean',
							'default'	=> true,
						),
			'image_height' => array(
							'type'		=> 'number',
							'default'	=> 300,
						),
			'limit' => array(
							'type'		=> 'number',
							'default'	=> 5,
						),
			'order' => array(
							'type'		=> 'string',
							'default'	=> 'desc',
						),
			'orderby' => array(
							'type'		=> 'string',
							'default'	=> 'date',
						),
			'category' => array(
							'type'		=> 'string',
							'default'	=> '',
						),
			'align' => array(
							'type'		=> 'string',
							'default'	=> '',
						),
			'className' => array(
							'type'		=> 'string',
							'default'	=> '',
						),
		),
		'render_callback' => 'wpfp_featured_post_grid',
	));


	// Register block, and explicitly define the attributes for Gridblock
	register_block_type( 'wpfp/wpfp-gridbox', array(
		'attributes' => array(
			'design' => array(
							'type'		=> 'string',
							'default'	=> 'design-1',
						),
			'show_author' => array(
							'type'		=> 'boolean',
							'default'	=> true,
						),
			'show_date' => array(
							'type'		=> 'boolean',
							'default'	=> true,
						),
			'show_category_name' => array(
							'type'		=> 'boolean',
							'default'	=> true,
						),
			'image_height' => array(
							'type'		=> 'number',
							'default'	=> 500,
						),
			'limit' => array(
							'type'		=> 'number',
							'default'	=> 5,
						),
			'order' => array(
							'type'		=> 'string',
							'default'	=> 'desc',
						),
			'orderby' => array(
							'type'		=> 'string',
							'default'	=> 'date',
						),
			'category' => array(
							'type'		=> 'string',
							'default'	=> '',
						),
			'align' => array(
							'type'		=> 'string',
							'default'	=> '',
						),
			'className' => array(
							'type'		=> 'string',
							'default'	=> '',
						),
		),
		'render_callback' => 'wpfp_featured_post',
	));

	if ( function_exists( 'wp_set_script_translations' ) ) {
		wp_set_script_translations( 'wpfp-block-js', 'featured-post-creative', WPFP_DIR . '/languages' );
	}

}
add_action( 'init', 'wpfp_register_guten_block' );

/**
 * Enqueue Gutenberg block assets for backend editor.
 *
 * @uses {wp-blocks} for block type registration & related functions.
 * @uses {wp-element} for WP Element abstraction — structure of blocks.
 * @uses {wp-i18n} to internationalize the block's text.
 * @uses {wp-editor} for WP editor styles.
 * 
 * @since 1.2
 */
function wpfp_editor_assets() {	

	// Block Editor CSS
	if( ! wp_style_is( 'wpos-guten-block-css', 'registered' ) ) {
		wp_register_style( 'wpos-guten-block-css', WPFP_URL.'assets/css/blocks.editor.build.css', array( 'wp-edit-blocks' ), WPFP_VERSION );
	}

	// Block Editor Script
	wp_enqueue_style( 'wpos-guten-block-css' );
	wp_enqueue_script( 'wpfp-block-js' );
}
add_action( 'enqueue_block_editor_assets', 'wpfp_editor_assets' );

/**
 * Adds an extra category to the block inserter
 *
 * @since 1.2
 */
function wpfp_add_block_category( $categories ) {

	$guten_cats = wp_list_pluck( $categories, 'slug' );

	if( ! in_array( 'essp_guten_block', $guten_cats ) ) {
		$categories[] = array(
							'slug'	=> 'essp_guten_block',
							'title'	=> esc_html__('Essential Plugin Blocks', 'featured-post-creative'),
							'icon'	=> null,
						);
	}

	return $categories;
}
add_filter( 'block_categories_all', 'wpfp_add_block_category' );