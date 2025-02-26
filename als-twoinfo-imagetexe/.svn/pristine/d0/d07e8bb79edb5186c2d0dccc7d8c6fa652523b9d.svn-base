<?php
/**
 * Plugin Name:     Als Twoinfo ImageTexe
 * Plugin URI:      https://altessoft.com/2021/02/20/als-twoinfo-imagetexe/
 * Description:     A custom block that displays side-by-side images and text.There is a left-right reversal function. In the case of smartphone display, it will be arranged vertically.。
 * Version:         0.1.0
 * Author:          Kazuaki Uchi [AltesSoft]
 * Author URI:      https://altessoft.com
 * License:         GPL-2.0-or-later
 * License URI:     https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:     als-twoinfo
 *
 * @package         wdl
 */

/**
 * Registers all block assets so that they can be enqueued through the block editor
 * in the corresponding context.
 *
 * @see https://developer.wordpress.org/block-editor/tutorials/block-tutorial/applying-styles-with-stylesheets/
 */
function wdl_als_twoinfo_block_init() {
	$dir = __DIR__;

	$script_asset_path = "$dir/build/index.asset.php";
	if ( ! file_exists( $script_asset_path ) ) {
		throw new Error(
			'You need to run `npm start` or `npm run build` for the "wdl/als-twoinfo" block first.'
		);
	}
	$index_js     = 'build/index.js';
	$script_asset = require( $script_asset_path );
	wp_register_script(
		'wdl-als-twoinfo-block-editor',
		plugins_url( $index_js, __FILE__ ),
		$script_asset['dependencies'],
		$script_asset['version']
	);
	wp_set_script_translations( 'wdl-als-twoinfo-block-editor', 'als-twoinfo' );

	$editor_css = 'build/index.css';
	wp_register_style(
		'wdl-als-twoinfo-block-editor',
		plugins_url( $editor_css, __FILE__ ),
		array(),
		filemtime( "$dir/$editor_css" )
	);

	$style_css = 'build/style-index.css';
	wp_register_style(
		'wdl-als-twoinfo-block',
		plugins_url( $style_css, __FILE__ ),
		array(),
		filemtime( "$dir/$style_css" )
	);

	register_block_type(
		'wdl/als-twoinfo',
		array(
			'editor_script' => 'wdl-als-twoinfo-block-editor',
			'editor_style'  => 'wdl-als-twoinfo-block-editor',
			'style'         => 'wdl-als-twoinfo-block',
		)
	);
}
add_action( 'init', 'wdl_als_twoinfo_block_init' );
