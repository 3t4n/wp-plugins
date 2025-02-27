<?php

namespace Codemanas\CmBlocks\Importer;

use Codemanas\CmBlocks\Importer\ImageImporter;

class Importer {
	private static $_instance = null;

	public static function get_instance() {
		return ( self::$_instance == null ) ? self::$_instance = new self() : self::$_instance;
	}

	public function __construct() {
		add_action( 'wp_ajax_process_pattern_handler', [ $this, 'process_pattern_handler' ] );
		add_action( 'enqueue_block_assets', array( $this, 'enqueue_block_editor_assets' ) );

	}

	public function enqueue_block_editor_assets(): void {
		if ( ! file_exists( CM_BLOCKS_DIR_PATH . '/build/importer/index.asset.php' ) ) {
			return;
		}
		if ( is_admin() ) {
			$settings = include CM_BLOCKS_DIR_PATH . '/build/importer/index.asset.php';
			wp_register_style( 'cmblocks-importer', plugins_url( '/build/importer/index.css', CM_BLOCKS_FILE_PATH ), '', $settings['version'] );
			wp_register_script( 'cmblocks-importer', plugins_url( '/build/importer/index.js', CM_BLOCKS_FILE_PATH ), $settings['dependencies'], $settings['version'], true );

			wp_localize_script( 'cmblocks-importer', 'importerData', [
				'ajaxURL'   => esc_url( admin_url( 'admin-ajax.php' ) ),
				'ajaxNonce' => wp_create_nonce( 'cm-blocks-nonce-verify' ),
			] );

			wp_enqueue_style( 'cmblocks-importer' );
			wp_enqueue_script( 'cmblocks-importer' );
		}
	}

	public function process_pattern_handler() {
		if ( ! wp_verify_nonce( $_POST['nonce'], 'cm-blocks-nonce-verify' ) ) {
			wp_send_json_error( __( 'Invalid nonce', 'cm-blocks' ) );
		}

		if ( ! current_user_can( 'edit_posts' ) ) {
			wp_send_json_error( __( 'User don\'t have enough permission.', 'cm-blocks' ) );
		}

		$pattern_content = stripslashes( $_POST['pattern_content'] );
		preg_match_all( '#\bhttps?://(?:www\.)?patterns\.cmblocks\.com[^,\s()<>]*(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $pattern_content, $match );

		$found_urls = array_unique( $match[0] );
		if ( empty( $found_urls ) ) {
			wp_send_json( $pattern_content );
		}

		$replaced_urls = [];
		foreach ( $found_urls as $found_url ) {
			$replaced_urls[ $found_url ] = ImageImporter::get_instance()->import_image( $found_url );
		}

		// Replace images in content.
		foreach ( $replaced_urls as $old_url => $new_url ) {
			$pattern_content = str_replace( $old_url, $new_url, $pattern_content );
			// Replace the slashed URLs if any exist.
			$old_url         = str_replace( '/', '/\\', $old_url );
			$new_url         = str_replace( '/', '/\\', $new_url );
			$pattern_content = str_replace( $old_url, $new_url, $pattern_content );
		}

		wp_send_json( $pattern_content );
	}
}
