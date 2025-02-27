<?php

namespace Codemanas\CmBlocks\Rest;

use WP_Error;
use WP_REST_Server;

class Details {
	private static ?Details $_instance = null;

	public static function get_instance(): ?Details {
		return ( self::$_instance == null ) ? self::$_instance = new self() : self::$_instance;
	}

	private function __construct() {
		add_action( 'rest_api_init', [ $this, 'register_route' ] );
	}

	public function register_route() {
		register_rest_route( 'cm-blocks/v1', '/details', [
			[
				'methods'             => WP_REST_Server::READABLE,
				'callback'            => [ $this, 'handle_get_request' ],
				'permission_callback' => [ $this, 'permissions_check' ],
			],
			'schema' => null,
		] );
	}

	public function handle_get_request() {
		$data = [
			'version' =>CM_BLOCK_VERSION
		];
		return rest_ensure_response($data);
	}

	public function permissions_check() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return new WP_Error( 'rest_forbidden', __( 'Insufficient permissions.', 'cm-blocks' ), [ 'status' => 401 ] );
		}

		return true;
	}
}