<?php

namespace Codemanas\CmBlocks;

class Editor {
	private static ?Editor $_instance = null;
	private string $asset_file_path = CM_BLOCKS_DIR_PATH . '/build/editor/index.asset.php';

	public static function get_instance(): ?Editor {
		return ( self::$_instance == null ) ? self::$_instance = new self() : self::$_instance;
	}

	private function __construct() {
		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
	}

	public function enqueue_scripts() {
		if ( ! file_exists( $this->asset_file_path ) ) {
			return;
		}
		$asset = require $this->asset_file_path;
		wp_register_script( 'cm-blocks-editor-script', CM_BLOCKS_DIR_PATH_URL . 'build/editor/index.js', $asset['dependencies'], $asset['version'], true );
		wp_enqueue_script( 'cm-blocks-editor-script' );

		wp_register_style( 'cm-blocks-editor-styles', CM_BLOCKS_DIR_PATH_URL . 'build/editor/index.css', [
			'wp-components', 'wp-block-editor'
		], $asset['version'] );
		wp_enqueue_style( 'cm-blocks-editor-styles' );
	}
}