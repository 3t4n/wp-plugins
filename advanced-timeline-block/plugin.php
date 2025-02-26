<?php
/**
 * Plugin Name:       Advanced Timeline Block
 * Description:       Advanced Timeline Block is a custom <strong>Gutenberg Block</strong> built with <strong>Gutenberg Native Components</strong> to create timeline in Gutenberg editor.
 * Requires at least: 6.0
 * Requires PHP:      7.4
 * Version:           2.1.2
 * Author:            Zakaria Binsaifullah
 * Author URI:        https://makegutenblock.com
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       advanced-timeline-block
 *
 */
// Stop Direct Access 
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// require admin page
require_once plugin_dir_path( __FILE__ ) . 'admin/class-admin.php';

/**
 * Blocks Final Class
 */

final class ATLB_BLOCKS_CLASS {
	public function __construct() {

		// define constants
		$this->atlb_define_constants();

		// block initialization
		add_action( 'init', [ $this, 'atlb_blocks_init' ] );

		// blocks category
		if( version_compare( $GLOBALS['wp_version'], '5.7', '<' ) ) {
			add_filter( 'block_categories', [ $this, 'atlb_register_block_category' ], 10, 2 );
		} else {
			add_filter( 'block_categories_all', [ $this, 'atlb_register_block_category' ], 10, 2 );
		}

		// enqueue block assets
		add_action( 'enqueue_block_assets', [ $this, 'atlb_external_libraries' ] );

		// redirect to admin page after activation
		add_action( 'activated_plugin', [ $this, 'atlb_redirect_to_admin_page' ] );
	}

	/**
	 * Redirect to admin page after activation
	 */
	public function atlb_redirect_to_admin_page( $plugin ) {
		if( $plugin == plugin_basename( __FILE__ ) ) {
			exit( wp_redirect( admin_url( 'options-general.php?page=atlb-block' ) ) );
		}
	}


	/**
	 * Initialize the plugin
	 */

	public static function init(){
		static $instance = false; 
		if( ! $instance ) {
			$instance = new self();
		}
		return $instance;
	}

	/**
	 * Define the plugin constants
	 */
	private function atlb_define_constants() {
		define( 'ATLB_VERSION', '2.1.2' );
		define( 'ATLB_URL', plugin_dir_url( __FILE__ ) );
		define( 'ATLB_INC_URL', ATLB_URL . 'includes/' );		
	}

	public function atlb_inline_css($handle, $css){
		// register inline style
		wp_register_style( $handle, false );
		// enqueue inline style
		wp_enqueue_style( $handle );
		// add inline style at head
		wp_add_inline_style( $handle, $css );
	}

	/**
	 * Blocks Registration 
	 */

	public function atlb_register_block( $name, $options = array() ) {
		register_block_type( __DIR__ . '/build/blocks/' . $name, $options );
	 }

	/**
	 * Blocks Initialization
	*/
	public function atlb_blocks_init() {
		// register single block
		$this->atlb_register_block( 'timeline-block', array(
			'render_callback' => [ $this, 'atlb_render_timeline_block' ],
		) );
	}

	// render timeline block
	public function atlb_render_timeline_block($attributes, $content){
		require_once __DIR__ . '/templates/timeline.php';
		$handle = $attributes['id'];
		$this->atlb_inline_css( $handle, timeline_callback($attributes));
		return $content;
	}

	/**
	 * Register Block Category
	 */

	public function atlb_register_block_category( $categories, $post ) {
		return array_merge(
			array(
				array(
					'slug'  => 'atlb-block',
					'title' => __( 'Timeline Block', 'advanced-timeline-block' ),
				),
			),
			$categories,
		);
	}

	/**
	 * Enqueue Block Assets
	 */
	public function atlb_external_libraries() {
		if( is_admin(  ) ) {
			wp_enqueue_style( 'atlb-block-editor-css', ATLB_INC_URL . 'css/editor.css', array(), ATLB_VERSION );
		}
		wp_enqueue_style( 'atlb-block-icons', ATLB_INC_URL . 'css/all.min.css', array(), ATLB_VERSION );
	}

}

/**
 * Kickoff
*/

ATLB_BLOCKS_CLASS::init();
