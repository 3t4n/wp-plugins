<?php
/**
 * Plugin Name: Awesome Guten Text
 * Plugin URI: https://pluginic.com/plugins/awesome-guten-text
 * Description: Custom Blocks for Bloggers and Marketers. Create Better Content With Gutenberg.
 * Author: Forhad
 * Author URI: https://pluginic.com/
 * Version: 2.0.1
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: awe-guten-text
 * Domain Path: /languages
 *
 * @package AWGB
 */

/**
 * Defining file names.
 */
define( 'AWGT_DIR_PATH', plugin_dir_path( __FILE__ ) );
define( 'AWGT_DIR_URL', plugin_dir_url( __FILE__ ) );

/**
 * Block registration.
 *
 * @return void
 */
function awgt_register_block() {

	// automatically load dependencies and version.
	$asset_file = include AWGT_DIR_PATH . 'build/index.asset.php';

	/**
	 * Block - Fancy Quote.
	 * Initialization.
	 */
	// Enqueue script.
	wp_register_script(
		'awgt-esnext',
		plugins_url( 'build/index.js', __FILE__ ),
		$asset_file['dependencies'],
		$asset_file['version'],
		true,
	);

	// Enqueue style on editor.
	wp_register_style(
		'awgt-editor',
		plugins_url( 'src/editor.css', __FILE__ ),
		array( 'wp-edit-blocks' ),
		filemtime( AWGT_DIR_PATH . 'src/editor.css' ), // filemtime() returns the last time of when its content was modified.
	);

	// Enqueue style on display.
	wp_register_style(
		'awgt-style',
		plugins_url( 'src/style.css', __FILE__ ),
		array(),
		filemtime( AWGT_DIR_PATH . 'src/style.css' ), // filemtime() returns the last time of when its content was modified.
	);

	// Register the block.
	register_block_type(
		'awgt-block/fancy-quote',
		array(
			'api_version'   => 2,
			'editor_style'  => 'awgt-editor',
			'editor_script' => 'awgt-esnext',
			'style'         => 'awgt-style',
			'attributes'    => array(
				'id'              => array(
					'type' => 'string',
				),
				'content'         => array(
					'type' => 'string',
				),
				'fontSize'        => array(
					'type'    => 'number',
					'default' => 58,
				),
				'lineHeight'      => array(
					'type'    => 'number',
					'default' => 72,
				),
				'bgSize'          => array(
					'type'    => 'number',
					'default' => 300,
				),
				'contWidth'       => array(
					'type'    => 'number',
					'default' => 400,
				),
				'contentPos'      => array(
					'type'    => 'number',
					'default' => 300,
				),
				'bgColor'         => array(
					'type'    => 'string',
					'default' => '#4E8953',
				),
				'fontColor'       => array(
					'type'    => 'string',
					'default' => '#D5E2D6',
				),
				'shadowColor'     => array(
					'type'    => 'string',
					'default' => '#4a744d',
				),
				'shadowColorEdge' => array(
					'type'    => 'string',
					'default' => '#06520c',
				),
				'contRotate'      => array(
					'type'    => 'number',
					'default' => 355,
				),
				'layoutSet'       => array(
					'type'    => 'string',
					'default' => 'lay-one',
				),
			),
		)
	);

	/**
	 * Block - Alert Box.
	 * Initialization.
	 */
	include_once AWGT_DIR_PATH . 'src/block-alert-box/index.php';

}
add_action( 'init', 'awgt_register_block' );

// Enqueue Conditionally.
function awgt_enqueue_if_block_is_present() {

	$id = get_the_ID();
	if ( has_block( 'awgt-block/alert-box', $id ) ) {
		wp_enqueue_script( 'my-awesome-script', AWGT_DIR_URL . 'src/block-alert-box/script.js', array( 'jquery' ), '1.0.0', false );
	}
}
add_action( 'wp_enqueue_scripts', 'awgt_enqueue_if_block_is_present' );
