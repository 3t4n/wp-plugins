<?php

namespace Codemanas\CmBlocks\Rest;

use Codemanas\CmBlocks\Enhancement\BlockVisibility\MediaQuery;
use WP_Error;
use WP_REST_Response;
use WP_REST_Server;

/**
 * The Visibility class handles the registration and management of custom REST API routes for managing
 * the screen size visibility settings of the cm-blocks plugin.
 */
class Visibility {
	private static ?Visibility $instance = null;

	public static function get_instance(): ?Visibility {
		return ( self::$instance == null ) ? self::$instance = new self() : self::$instance;
	}

	protected function __construct() {
		add_action( 'rest_api_init', [ $this, 'register_routes' ] );
	}

	/**
	 * Registers custom REST API routes for the cm-blocks/v1 namespace.
	 *
	 * @return void
	 */
	public function register_routes() {
		register_rest_route( 'cm-blocks/v1', '/visibility/screen-sizes', [
			[
				'methods'             => WP_REST_Server::READABLE,
				'callback'            => [ $this, 'handle_get_screen_sizes' ],
				'permission_callback' => [ $this, 'permissions_check' ],
			],
			[
				'methods'             => WP_REST_Server::EDITABLE,
				'callback'            => [ $this, 'handle_update_screen_sizes' ],
				'permission_callback' => [ $this, 'permissions_check' ],
				'args'                => [
					'screen_sizes' => [ 'required' => true ],
				],
			],
		] );

		register_rest_route( 'cm-blocks/v1', '/visibility/preview', [
			[
				'methods'             => WP_REST_Server::READABLE,
				'callback'            => [ $this, 'handle_get_preview_css' ],
				'permission_callback' => [ $this, 'permissions_check' ],
				'args'                => [
					'screen_sizes' => [ 'required' => true ],
				],
			],
		] );
	}

	/**
	 * Removes all tab characters and sequences of 12 spaces from the input string.
	 *
	 * @param  string  $input  The input string from which tabs and spaces will be stripped.
	 *
	 * @return string The input string with all tab characters and sequences of 12 spaces removed.
	 */
	function stripTabs( string $input ): string {
		// Replace all tab characters with an empty string
		$tabs_removed = str_replace( "\t", '', $input );

		return str_replace( "            ", '', $tabs_removed );
	}

	/**
	 * Handles the REST API request to get screen sizes.
	 *
	 * @return WP_REST_Response The response object containing tablet and desktop screen sizes.
	 */
	public function handle_get_screen_sizes(): WP_REST_Response {
		// Retrieve screen sizes from the database or settings
		$sizes = MediaQuery::get_instance()->get_screen_sizes();

		return rest_ensure_response( $sizes );
	}

	public function handle_update_screen_sizes( $request ) {
		$sizes = $request['screen_sizes'] ?? null;
		if ( is_array( $sizes ) ) {
			// Sanitize each screen size
			foreach ( $sizes as $key => $size ) {
				$sizes[ $key ] = sanitize_text_field( $size );
				if ( ! is_numeric( $sizes[ $key ] ) ) {
					return rest_ensure_response( new WP_Error( '500', 'Invalid Format' ) );
				}
			}
		} else {
			return rest_ensure_response( new WP_Error( '500', 'Invalid Format' ) );
		}

		$status = MediaQuery::get_instance()->update_screen_sizes( $sizes );
		if ( $status === false ) {
			return rest_ensure_response( new WP_Error( '500', 'Invalid Format' ) );
		}
		$data = [
			'sizes'  => $sizes,
			'status' => $status ? 'success' : 'error',
		];

		return rest_ensure_response( $data );
	}

	/**
	 * Generates and retrieves the preview CSS for different screen sizes based on the provided request parameters.
	 *
	 * @param  $request
	 *
	 */
	public function handle_get_preview_css( $request ) {
		$output = MediaQuery::get_instance()->generate_style( $request['screen_sizes'] );
		$data   = [ 'output' => $this->stripTabs( strip_tags( $output ) ) ];

		return rest_ensure_response( $data );
	}

	/**
	 * Checks if the current user has the required permissions to manage options.
	 *
	 * @return true|WP_Error True if the user has permissions, or a WP_Error if the user does not.
	 */
	public function permissions_check() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return new WP_Error( 'rest_forbidden', __( 'Insufficient permissions.', 'cm-blocks' ), [ 'status' => 401 ] );
		}

		return true;
	}
}