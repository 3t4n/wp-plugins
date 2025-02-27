<?php

namespace Codemanas\CmBlocks\Rest;

use Codemanas\CmBlocks\Helper;
use WP_Error;
use WP_REST_Server;

class Header {
	private static ?Header $instance = null;

	public static function get_instance(): ?Header {
		return ( self::$instance == null ) ? self::$instance = new self() : self::$instance;
	}

	protected function __construct() {
		add_action( 'rest_api_init', [ $this, 'register_routes' ] );
	}

	public function register_routes() {
		register_rest_route( 'cm-blocks/v1', '/header', [
			[
				'methods'             => WP_REST_Server::READABLE,
				'callback'            => [ $this, 'handle_get_request' ],
				'permission_callback' => [ $this, 'permissions_check' ],
				'args'                => [
					'slug'  => [ 'required' => true ],
					'theme' => [ 'required' => true ]
				],
			],
			[
				'methods'             => WP_REST_Server::EDITABLE,
				'callback'            => [ $this, 'handle_update_request' ],
				'permission_callback' => [ $this, 'permissions_check' ],
				'args'                => [
					'slug'   => [ 'required' => true ],
					'theme'  => [ 'required' => true ],
					'option' => [ 'required' => true ],
				],
			],
			'schema' => null,
		] );
	}

	public function handle_get_request( $request ) {
		$slug    = $request['slug'];
		$theme   = $request['theme'];
		$post_id = Helper::get_template_part_id( $slug, $theme );
		$option  = get_post_meta( $post_id, 'cm_blocks_setting_header_sticky', true );
		$data    = [ 'option' => $option ];

		return rest_ensure_response( $data );
	}

	public function handle_update_request( $request ) {
		$slug   = $request['slug'];
		$theme  = $request['theme'];
		$option = $request['option'];;
		$post_id = Helper::get_template_part_id( $slug, $theme );
		//file_put_contents( CM_BLOCKS_DIR_PATH . '/cm-log.txt', var_export( $post_id, true ) );
		update_post_meta( $post_id, 'cm_blocks_setting_header_sticky', $option );
		$data = array(
			'option' => $option,
			'status' => 'success'
		);

		return rest_ensure_response( $data );
	}

	public function permissions_check() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return new WP_Error( 'rest_forbidden', __( 'Insufficient permissions.', 'cm-blocks' ), [ 'status' => 401 ] );
		}

		return true;
	}
}