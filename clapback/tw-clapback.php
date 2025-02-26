<?php
/**
 * Plugin Name:     Clapback
 * Description:     The👏Clapback👏Block👏puts👏an👏emoji👏between👏your👏words.
 * Version:         0.3.3
 * Author:          tellyworth
 * License:         GPL-2.0-or-later
 * License URI:     https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:     tw-clapback
 *
 * @package         tw-clapback
 */

/**
 * Registers all block assets so that they can be enqueued through the block editor
 * in the corresponding context.
 *
 * @see https://developer.wordpress.org/block-editor/tutorials/block-tutorial/applying-styles-with-stylesheets/
 */
function create_block_tw_clapback_block_init() {
	$dir = dirname( __FILE__ );

	$script_asset_path = "$dir/build/index.asset.php";
	if ( ! file_exists( $script_asset_path ) ) {
		throw new Error(
			'You need to run `npm start` or `npm run build` for the "create-block/tw-clapback" block first.'
		);
	}
	$index_js     = 'build/index.js';
	$script_asset = require( $script_asset_path );
	wp_register_script(
		'create-block-tw-clapback-block-editor',
		plugins_url( $index_js, __FILE__ ),
		$script_asset['dependencies'],
		$script_asset['version']
	);

	$editor_css = 'build/index.css';
	wp_register_style(
		'create-block-tw-clapback-block-editor',
		plugins_url( $editor_css, __FILE__ ),
		array(),
		filemtime( "$dir/$editor_css" )
	);

	$style_css = 'build/style-index.css';
	wp_register_style(
		'create-block-tw-clapback-block',
		plugins_url( $style_css, __FILE__ ),
		array(),
		filemtime( "$dir/$style_css" )
	);

	register_block_type( 'tw-clapback/clapback', array(
		'editor_script' => 'create-block-tw-clapback-block-editor',
		'editor_style'  => 'create-block-tw-clapback-block-editor',
		'style'         => 'create-block-tw-clapback-block',
	) );
}
add_action( 'init', 'create_block_tw_clapback_block_init' );
