<?php
/**
 * Plugin Name:       Simple Quiz Block
 * Description:       Ajoutez un encadré dédié avec une question issue de l'API Simple Quiz Fr via l'éditeur de bloc
 * Author URI: https://jomoreschi.fr/
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           0.2.0
 * Author:            Jonathan Moreschi
 * License:           GPL-2.0-or-later
 * Text Domain:       simple-quiz-block
 *
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */


require_once __DIR__.'/public/show_quiz_response.php';


function simplequizblock_create_block_init() {
	register_block_type( __DIR__ . '/build' );
}
add_action( 'init', 'simplequizblock_create_block_init' );

/**
 * JS script import for interactive display in the front end
 */
function simplequizblock_js_script()
{
	wp_enqueue_script('simplequizblock-interact', plugins_url('/public/js/simplequizblock-interact.js', __FILE__), array(), '0.1.0', true);
}

add_action('wp_enqueue_scripts','simplequizblock_js_script');