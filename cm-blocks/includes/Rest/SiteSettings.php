<?php

namespace Codemanas\CmBlocks\Rest;
use WP_Error;
use WP_REST_Request;
use WP_REST_Server;

class SiteSettings {
	// Hold the class instance.
	private static ?SiteSettings $instance = null;
	private string $option_name = 'cmblocks-site-settings';

	// Singleton instance access method
	public static function get_instance(): ?SiteSettings {
		if (self::$instance === null) {
			self::$instance = new self;
		}
		return self::$instance;
	}

	// Private constructor to prevent multiple instances
	private function __construct() {
		add_action('rest_api_init', [$this, 'register_routes']);
	}

	// Register the routes
	public function register_routes() {
		register_rest_route('cm-blocks/v1', '/site-settings', [
			'methods' => WP_REST_Server::READABLE,
			'callback' => [$this, 'get_site_settings'],
			'permission_callback' => [$this, 'permissions_check']
		]);

		register_rest_route('cm-blocks/v1', '/site-settings', [
			'methods' => WP_REST_Server::CREATABLE,
			'callback' => [$this, 'update_site_settings'],
			'permission_callback' => [$this, 'permissions_check'],
			'args' => $this->get_endpoint_args()
		]);
	}

	// Permissions check
	public function permissions_check(): bool {
		return current_user_can('manage_options'); // Adjust capability as needed
	}

	// Get endpoint arguments for validation and sanitization
	private function get_endpoint_args(): array {
		return [
			'enable_coming_soon' => [
				'required' => true,
				'validate_callback' => 'rest_validate_request_arg',
				'sanitize_callback' => 'rest_sanitize_boolean'
			],
			'enable_maintenance_mode' => [
				'required' => true,
				'validate_callback' => 'rest_validate_request_arg',
				'sanitize_callback' => 'rest_sanitize_boolean'
			],
			'coming_soon_page' => [
				'required' => true,
				'validate_callback' => 'rest_is_integer',
				'sanitize_callback' => 'absint'
			],
			'maintenance_mode_page' => [
				'required' => true,
				'validate_callback' => 'rest_is_integer',
				'sanitize_callback' => 'absint'
			]
		];
	}

	// Retrieve site settings
	public function get_site_settings() {
		$settings = get_option($this->option_name, [
			'enable_coming_soon' => false,
			'enable_maintenance_mode' => false,
			'coming_soon_page' => 0,
			'maintenance_mode_page' => 0
		]);
		return rest_ensure_response($settings);
	}

	// Update site settings
	public function update_site_settings(WP_REST_Request $request) {
		// Retrieve and sanitize parameters
		$params = [
			'enable_coming_soon' => filter_var($request['enable_coming_soon'], FILTER_VALIDATE_BOOLEAN),
			'enable_maintenance_mode' => filter_var($request['enable_maintenance_mode'], FILTER_VALIDATE_BOOLEAN),
			'coming_soon_page' => absint($request['coming_soon_page']),
			'maintenance_mode_page' => absint($request['maintenance_mode_page'])
		];

		if (
			$params['enable_coming_soon'] === null ||
			$params['enable_maintenance_mode'] === null ||
			$params['coming_soon_page'] === null ||
			$params['maintenance_mode_page'] === null
		) {
			rest_ensure_response( new WP_Error('invalid_data', 'Invalid input data', ['status' => 501]));
		}

		// Update the settings
		update_option($this->option_name, $params);

		return rest_ensure_response($params);
	}
}

// Initiate the singleton instance