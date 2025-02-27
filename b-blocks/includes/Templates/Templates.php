<?php
namespace BBlocks\Inc\Templates;

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

require_once B_BLOCKS_DIR_PATH . '/includes/Templates/Image.php';

class Templates {
	public function __construct() {
		add_action( 'wp_ajax_bblocks_templates_main', [$this, 'bblocks_templates_main'] );
		add_action( 'wp_ajax_bblocks_templates', [$this, 'bblocks_templates'] );
		add_action( 'wp_ajax_bblocks_template_import', [$this, 'bblocks_template_import'] );
	}

	public function bblocks_templates_main(){
		$nonce = $_POST['_wpnonce'] ?? null;
		
		if( !wp_verify_nonce( $nonce, 'wp_ajax' )){
			wp_send_json_error( 'Invalid Request' );
		}
		
		$response =  wp_remote_get('https://templates.bplugins.com/wp-json/gutenberg-templates/v1/taxonomy/taxonomies/plugin,type,patterns-category');

		$body = json_decode( wp_remote_retrieve_body( $response ) );
		wp_send_json_success( $body );
	}

	public function bblocks_templates(){
		$nonce = $_POST['_wpnonce'] ?? null;

		if( !wp_verify_nonce( $nonce, 'wp_ajax' )){
			wp_send_json_error( 'Invalid Request' );
		}

		$type = $_POST['type'] ?? 'patterns';
		$category = $_POST['category'] ?? 'all';
		$pageNumber = $_POST['pageNumber'] ?? 1;
		$start = $pageNumber - 1;
		$search = $_POST['search'] ?? '';

		$typeFilter = 'patterns' === $type ? 'blocks': '';

		try {
			$response = wp_remote_get( "https://templates.bplugins.com/wp-json/gutenberg-templates/v1/$typeFilter?start=$start&end=$pageNumber&category=$category&keywords=$search" );

			$body = json_decode( wp_remote_retrieve_body( $response ) );
			wp_send_json_success( $body );
		} catch (\Throwable $th) {
			wp_send_json_error( $th->getMessage() );
		}
	}

	public function bblocks_template_import(){
		$nonce = $_POST['_wpnonce'] ?? null;

		if( !wp_verify_nonce( $nonce, 'wp_ajax' )){
			wp_send_json_error( 'Invalid Request' );
		}
		
		try {
			$data = Image::instance()->maybe_import_images( $_POST['original_content'] ?? '' );
			wp_send_json_success( $data );
		} catch ( \Throwable $th ) {
			wp_send_json_error( $th->getMessage() );
		}
	}
}
new Templates();