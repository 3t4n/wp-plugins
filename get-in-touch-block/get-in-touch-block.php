<?php
/**
 * Plugin Name:       Get in Touch Block
 * Description:       Create get in touch form
 * Requires at least: 5.0
 * Requires PHP:      7.2
 * Version:           0.1.0
 * Author:            baroliyamayur
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       get-in-touch
 *
 * @package           get-in-touch
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/block-editor/tutorials/block-tutorial/writing-your-first-block-type/
 */

function get_in_touch_block_category( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug' => 'get-in-touch-blocks',
				'title' => __( 'Get in touch', 'get-in-touch' ),
			),
		)
	);
}
add_filter( 'block_categories', 'get_in_touch_block_category', 10, 2);

function get_in_touch_block_admin_enqueue_script() {

	wp_enqueue_script(
	    'get-in-touch-build',
	    plugins_url( 'index.js', __FILE__ ),
	    array('wp-element', 'wp-polyfill'),
	    '08f14019aad255050f9a362436910277'
	);	
}
add_action( 'admin_enqueue_scripts', 'get_in_touch_block_admin_enqueue_script' );

