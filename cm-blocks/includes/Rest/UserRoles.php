<?php

namespace Codemanas\CmBlocks\Rest;

use WP_Error;
use WP_REST_Response;

class UserRoles {
	private static ?UserRoles $_instance = null;

	public static function get_instance(): ?UserRoles {
		return ( self::$_instance == null ) ? self::$_instance = new self() : self::$_instance;
	}

	private function __construct() {
		add_action( 'rest_api_init', array( $this, 'register_user_roles_endpoint' ) );
	}

	/**
	 * Register custom REST API endpoint to fetch user roles.
	 */
	public function register_user_roles_endpoint() {
		register_rest_route( 'cm-blocks/v1', '/user-roles', array(
			'methods'             => 'GET',
			'callback'            => array( $this, 'get_user_roles' ),
			'permission_callback' => array( $this, 'user_roles_permission_check' )
		) );
	}

	/**
	 * Permission callback to check if the user has permission to access the endpoint.
	 *
	 * @return WP_Error|bool True if the request has access, WP_Error object otherwise.
	 */
	public function user_roles_permission_check() {
		// Only allow access to users with the 'list_users' capability.
		if ( current_user_can( 'list_users' ) ) {
			return true;
		} else {
			return new WP_Error(
				'rest_forbidden',
				esc_html__( 'You do not have permissions to access this endpoint.', 'myplugin' ),
				array( 'status' => 403 )
			);
		}
	}

	/**
	 * Callback function to handle the request and return user roles.
	 * @return WP_REST_Response|WP_Error
	 */
	public function get_user_roles() {
		// Get all roles
		global $wp_roles;
		$roles = $wp_roles->roles;

		// Prepare the response
		$response = array();
		foreach ( $roles as $role => $details ) {
			$response[] = array(
				'role' => $role,
				'name' => $details['name']
			);
		}

		return new WP_REST_Response( $response, 200 );
	}
}