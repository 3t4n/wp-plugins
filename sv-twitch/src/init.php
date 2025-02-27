<?php
namespace sv_block_for_twitch;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class init {
	public function init() {
		add_action( 'init', array( $this, 'register_block_assets' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'load_block_assets' ) );
		add_filter( 'block_categories', array( $this, 'register_block_category' ), 10, 2 );
	}

	public function register_block_assets() {
		wp_register_style(
			'sv-block-for-twitch-style',
			plugins_url( 'dist/blocks.style.build.css', dirname( __FILE__ ) ),
			array( 'wp-editor' ),
			filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.style.build.css' )
		);
	
		wp_register_script(
			'sv-block-for-twitch-block',
			plugins_url( '/dist/blocks.build.js', dirname( __FILE__ ) ),
			array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor' ),
			filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.build.js' ),
			true
		);
	
		wp_register_style(
			'sv-block-for-twitch-block-editor',
			plugins_url( 'dist/blocks.editor.build.css', dirname( __FILE__ ) ),
			array( 'wp-edit-blocks' ),
			filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.editor.build.css' )
		);

		$this->register_blocks();
	}

	public function load_block_assets() {
		if ( ! is_admin() ) {
			wp_enqueue_style( 'sv-block-for-twitch-style' );
		}
	}
	
	private function register_blocks() {
		$dir = plugin_dir_path( __DIR__ ) . 'src';
		$dir_array = array_diff( scandir( $dir ), array( '..', '.' ) );
	
		foreach( $dir_array as $key => $value ) {
			if ( 
				is_dir( $dir . '/' . $value ) 
				&& file_exists( $dir . '/' . $value . '/index.php' ) 
			) {
				$class_name = 'sv_block_for_twitch\\' . $value;

				require_once( $dir . '/' . $value . '/index.php' );

				$this->$value = new $class_name();
				$this->$value->init();
			}
		}
	}
	
	public function register_block_category( $categories ) {
		$category_slugs = wp_list_pluck( $categories, 'slug' );

		return 
		in_array( 'straightvisions', $category_slugs, true ) 
		? $categories 
		: array_merge(
			$categories,
			array(
				array(
					'slug' 	=> 'straightvisions',
					'title' => 'straightvisions',
				),
			)
		);
	}
	
}

$plugin = new init();
$plugin->init();