<?php
/*
Plugin Name: FAQ Block
Plugin URI: https://meowapps.com
Description: Very simple and clean Gutenberg Block for FAQ (Frequently Asked Questions).
Version: 1.0.8
Author: Jordy Meow
Author URI: https://jordymeow.com
Text Domain: faq-block

Dual licensed under the MIT and GPL licenses:
http://www.opensource.org/licenses/mit-license.php
http://www.gnu.org/licenses/gpl.html
*/

if ( !class_exists( 'MeowApps_FAQ_Block' ) ) {

	class MeowApps_FAQ_Block {

		public $counter = 0;

		public function __construct() {
			if ( is_admin() ) {
				add_action( 'admin_init', array( $this, 'admin_init' ) );
			}
			else {
				// ONLY LOAD THIS IF THE CURRENT PAGE HAS
				add_action( 'init', array( $this, 'init' ) );
			}
		}

		public function init() {
			wp_enqueue_style(
				'meow-faq-block-css', plugin_dir_url( __FILE__ ) . 'faq-block.min.css',
				null, filemtime( plugin_dir_path( __FILE__ ) . 'faq-block.min.css' )
			);
		}

		public function admin_init() {
			if ( function_exists( 'register_block_type' ) ) {
				wp_register_script(
					'meow-faq-block-js', plugin_dir_url( __FILE__ ) . 'block/dist/index.js',
					array( 'wp-editor', 'wp-i18n', 'wp-element' ), filemtime( plugin_dir_path( __FILE__ ) . 'block/dist/index.js' )
				);
				wp_register_style(
					'meow-faq-block-css', plugin_dir_url( __FILE__ ) . 'block/editor.min.css',
					array( 'wp-edit-blocks' ), filemtime( plugin_dir_path( __FILE__ ) . 'block/editor.min.css' )
				);
				register_block_type( 'meow/faq-block', array(
					'editor_script' => 'meow-faq-block-js',
					'editor_style'  => 'meow-faq-block-css'
				));
				// wp_add_inline_script(
				// 	'meow-faq-block-js',
				// 	'wp.i18n.setLocaleData( ' . json_encode( gutenberg_get_jed_locale_data( 'faq-block' ) ) . ', "faq-block" );',
				// 	'before'
				// );

				// Params
				wp_localize_script( 'meow-faq-block-js', 'meow_faq_block_params', array(
					'logo' => trailingslashit( plugin_dir_url( __FILE__ ) ) . 'img/meowapps.png'
				) );
				load_plugin_textdomain( 'faq-block', false, basename( __DIR__ ) . '/languages' );
			}
		}

	}

}

new MeowApps_FAQ_Block();

?>
