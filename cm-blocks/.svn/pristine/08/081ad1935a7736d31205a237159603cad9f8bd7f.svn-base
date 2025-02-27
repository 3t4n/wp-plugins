<?php

namespace Codemanas\CmBlocks\Rest;

use WP_Error;
use WP_REST_Request;
use WP_REST_Server;

class ScrollToTop {
// Hold the class instance.
	private static ?ScrollToTop $instance = null;
	private string $option_name = 'cmblocks-scroll-to-top';

	// Singleton instance access method
	public static function get_instance(): ?ScrollToTop {
		if ( self::$instance === null ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	// Private constructor to prevent multiple instances
	private function __construct() {
		add_action( 'rest_api_init', [ $this, 'register_routes' ] );
	}

	// Register the routes
	public function register_routes() {
		register_rest_route( 'cm-blocks/v1', '/scroll-to-top', [
			'methods'             => WP_REST_Server::READABLE,
			'callback'            => [ $this, 'get_settings' ],
			'permission_callback' => [ $this, 'permissions_check' ]
		] );

		register_rest_route( 'cm-blocks/v1', '/scroll-to-top', [
			'methods'             => WP_REST_Server::CREATABLE,
			'callback'            => [ $this, 'update_settings' ],
			'permission_callback' => [ $this, 'permissions_check' ],
			'args'                => $this->get_endpoint_args()
		] );
	}

	// Permissions check
	public function permissions_check(): bool {
		return current_user_can( 'manage_options' ); // Adjust capability as needed
	}

	// Get endpoint arguments for validation and sanitization
	private function get_endpoint_args(): array {
		return [
			'enabled'         => [
				'required'          => true,
				'validate_callback' => 'rest_validate_request_arg',
				'sanitize_callback' => 'rest_sanitize_boolean'
			],
			'scroll_offset'   => [
				'required'          => true,
				'validate_callback' => 'rest_is_integer',
				'sanitize_callback' => 'absint'
			],
			'scroll_duration' => [
				'required'          => true,
				'validate_callback' => 'rest_is_integer',
				'sanitize_callback' => 'absint'
			],
			'selected_icon'   => [
				'required'          => true,
				'sanitize_callback' => 'sanitize_text_field'
			],
			'icon_height'     => [
				'required'          => false,
				'validate_callback' => 'rest_validate_request_arg',
				'sanitize_callback' => 'absint'
			],
			'icon_width'      => [
				'required'          => false,
				'validate_callback' => 'rest_validate_request_arg',
				'sanitize_callback' => 'absint'
			],
			'icon_color'      => [
				'required'          => false,
				'validate_callback' => 'rest_validate_request_arg',
				'sanitize_callback' => 'sanitize_text_field'
			],
			'svg_data'        => [
				'required' => false
			],
			'location'        => [
				'required'          => false,
				'validate_callback' => 'rest_validate_request_arg',
				'sanitize_callback' => 'sanitize_text_field'
			]
		];
	}

	// Retrieve site settings
	public function get_settings() {
		$settings = get_option( $this->option_name, [] );

		$settings = array_merge( [
			'enabled'         => false,
			'scroll_offset'   => 100,
			'scroll_duration' => 400,
			'selected_icon'   => 'keyboard-arrow-up',
			'icon_width'      => 50,
			'icon_height'     => 50,
			'icon_color'      => '#e24a01',
			'location'        => 'bottom-right'
		], $settings );

		return rest_ensure_response( $settings );
	}

	// Update site settings
	public function update_settings( WP_REST_Request $request ) {
		// Retrieve and sanitize parameters
		$params = [
			'enabled'         => filter_var( $request['enabled'], FILTER_VALIDATE_BOOLEAN ),
			'scroll_duration' => absint( $request['scroll_duration'] ),
			'scroll_offset'   => absint( $request['scroll_offset'] ),
			'selected_icon'   => sanitize_text_field( $request['selected_icon'] ),
			'svg_data'        => $request['svg_data'],
			'icon_width'      => $request['icon_width'],
			'icon_height'     => $request['icon_height'],
			'icon_color'      => $request['icon_color'] ?? '#e24a01',
			'location'        => $request['location'] ?? 'bottom-right'
		];

		if (
			$params['enabled'] === null ||
			$params['scroll_offset'] === null ||
			$params['scroll_duration'] === null ||
			$params['selected_icon'] === null
		) {
			rest_ensure_response( new WP_Error( 'invalid_data', 'Invalid input data', [ 'status' => 501 ] ) );
		}

		// Update the settings
		update_option( $this->option_name, $params );

		return rest_ensure_response( $params );
	}
}