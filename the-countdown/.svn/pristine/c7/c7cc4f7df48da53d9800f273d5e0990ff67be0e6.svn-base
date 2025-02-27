<?php
/**
 * Plugin Name: The Countdown Block
 * Plugin URI: https://www.codechars.com/plugins/the-countdown/
 * Description: A block to create countdown or countup timers.
 * Version: 2.0.1
 * Requires at least: 6.4
 * Requires PHP: 7.2
 * Author: zourbuth
 * Author URI: https://profiles.wordpress.org/zourbuth/
 * License: GPL-2.0-or-later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: the-countdown
 *
 * @package the-countdown
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 *
 * @since 2.0.0
 */
function the_countdown_block_init() {
	register_block_type( __DIR__ . '/build' );
}

add_action( 'init', 'the_countdown_block_init' );

/**
 * Get the server date time via AJAX
 * Date time format: M j, Y H:i:s O ( May 11, 2014 05:56:53 +0000 )
 * Don't use current_time() for retrieving a Unix (UTC) timestamp. Use time() instead.
 *
 * @since 2.0.0
 */
function the_countdown_get_server_datetime() {
	$datetime = gmdate( 'M j, Y H:i:s O', time() );
	return rest_ensure_response( $datetime );
}

/**
 * Get the server date time via AJAX
 * Date time format: M j, Y H:i:s O ( May 11, 2014 05:56:53 +0000 )
 * Don't use current_time() for retrieving a Unix (UTC) timestamp. Use time() instead.
 *
 * @since 2.0.0
 */
function the_countdown_rest_api() {
	register_rest_route(
		'the-countdown/v1',
		'/get-datetime',
		array(
			'methods'             => 'GET',
			'callback'            => 'the_countdown_get_server_datetime',
			'permission_callback' => '__return_true',
		)
	);
}

add_action( 'rest_api_init', 'the_countdown_rest_api' );

/**
 * Example JavaScript function called for every ticking
 *
 * @since 2.0.0
 */
function the_countdown_ticking_example() {
	$script = 'function tickMe() { console.log( "On tick example function is called." ) }';
	wp_add_inline_script( 'wp-api-fetch', $script );
}

add_action( 'wp_enqueue_scripts', 'the_countdown_ticking_example' );


/**
 * Print localize script before block rendering
 *
 * @param string $block_content The block content.
 * @param array  $block         The full block, including name and attributes.
 *
 * @since 2.0.0
 */
function the_countdown_render_block( $block_content, $block ) {

	if ( 'the-countdown/countdown' === $block['blockName'] ) {
		$varname = str_replace( '-', '', $block['attrs']['clientId'] );
		$script = 'var tc_' . $varname . ' = ' . wp_json_encode( $block['attrs'] );
		wp_add_inline_script( 'wp-api-fetch', $script );
	}

	return $block_content;
}

add_filter( 'render_block', 'the_countdown_render_block', 10, 2 );
