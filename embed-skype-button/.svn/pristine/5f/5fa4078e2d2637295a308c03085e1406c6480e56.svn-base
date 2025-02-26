<?php
/**
 * Plugin Name: Embed Skype Button
 * Description: Interactive skype button fo call/chat in webpage.
 * Version: 1.0.3
 * Author: bPlugins
 * Author URI: https://bplugins.com
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain: skype-button
 */

// ABS PATH
if ( !defined( 'ABSPATH' ) ) { exit; }

// Constant
define( 'SBB_PLUGIN_VERSION', isset( $_SERVER['HTTP_HOST'] ) && 'localhost' === $_SERVER['HTTP_HOST'] ? time() : '1.0.3' );
define( 'SBB_ASSETS_DIR', plugin_dir_url( __FILE__ ) . 'assets/' );

// Icon List
class SBBSkypeButton{
	function __construct(){
		add_action( 'enqueue_block_assets', [$this, 'enqueueBlockAssets'] );
		add_action( 'wp_enqueue_scripts', [$this, 'enqueueScripts'] );
		add_action( 'init', [$this, 'onInit'] );
	}

	function has_reusable_block( $block_name ){
		if( get_the_ID() ){
			if ( has_block( 'block', get_the_ID() ) ){
				// Check reusable blocks
				$content = get_post_field( 'post_content', get_the_ID() );
				$blocks = parse_blocks( $content );
	
				if ( !is_array( $blocks ) || empty( $blocks ) ) {
					return false;
				}
	
				foreach ( $blocks as $block ) {
					if ( $block['blockName'] === 'core/block' && ! empty( $block['attrs']['ref'] ) ) {
						if( has_block( $block_name, $block['attrs']['ref'] ) ){
						 	return true;
						}
					}
				}
			}
		}
		return false;
	}

	function enqueueBlockAssets(){
		wp_register_style( 'sbb-skype-button-style', plugins_url( 'dist/style.css', __FILE__ ), [], SBB_PLUGIN_VERSION ); // Both Style

		if( $this->has_reusable_block( 'sbb/skype-button' ) || has_block( 'sbb/skype-button', get_the_ID() ) ){
			wp_enqueue_style( 'sbb-skype-button-style' );
		}
	}

	function enqueueScripts(){
		wp_register_script( 'sbb-skype-button-script', plugins_url( 'dist/script.js', __FILE__ ), [ 'react', 'react-dom'], SBB_PLUGIN_VERSION, true ); // Frontend Script

		if( $this->has_reusable_block( 'sbb/skype-button' ) || has_block( 'sbb/skype-button', get_the_ID() ) ){
			wp_enqueue_script( 'sbb-skype-button-script' );
		}
	}

	function onInit() {
		wp_register_style( 'sbb-skype-button-editor-style', plugins_url( 'dist/editor.css', __FILE__ ), [ 'wp-edit-blocks' ], SBB_PLUGIN_VERSION ); // Backend Style

		register_block_type( __DIR__, [
			'editor_style'		=> 'sbb-skype-button-editor-style',
			'render_callback'	=> [$this, 'render']
		] ); // Register Block

		wp_set_script_translations( 'sbb-skype-button-editor-script', 'skype-button', plugin_dir_path( __FILE__ ) . 'languages' ); // Translate
	}

	function render( $attributes ){
		extract( $attributes );

		$className = $className ?? '';
		$blockClassName = 'wp-block-sbb-skype-button ' . $className . ' align' . $align;

		ob_start(); ?>
<div class='<?php echo esc_attr( $blockClassName ); ?>' id='sbbSkypeButton-<?php echo esc_attr( $cId ) ?>'
    data-attributes='<?php echo esc_attr( wp_json_encode( $attributes ) ); ?>'></div>

<?php return ob_get_clean();
	} // Render
}
new SBBSkypeButton();