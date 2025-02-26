<?php

namespace Finest\Blocks;

class Assets {


	function __construct() {
		add_action( 'enqueue_block_editor_assets', [ $this, 'enqueue_block_editor_assets' ] );
		add_action( 'enqueue_block_assets', [ $this, 'enqueue_frontend_assets' ] );
	}

	/**
	 * Enqueue block editor only JavaScript and CSS.
	 */
	public function enqueue_block_editor_assets() {

		// Enqueue the bundled block JS file
		wp_enqueue_script( 'finest-blocks-js', FINEST_BLOCKS_ASSETS . '/js/blocks.editor.js', [ 'wp-i18n', 'wp-element', 'wp-blocks', 'wp-components', 'wp-editor' ], filemtime( FINEST_BLOCKS_PATH . '/assets/js/blocks.editor.js' ) );

	}

	/**
	 * Enqueue frontend JavaScript and CSS assets.
	 */
	public function enqueue_frontend_assets() {

		// Enqueue optional editor only styles
		wp_enqueue_style('finest-blocks-style',FINEST_BLOCKS_ASSETS . '/css/blocks.editor.css',[],filemtime( FINEST_BLOCKS_PATH . '/assets/css/blocks.editor.css' ) );
	}

}

