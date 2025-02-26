<?php

/**
 * Applications API endpoint
 *
 * @package Appizy App Embed
 */
class Appizy_Api extends WP_REST_Controller {

	public function __construct() {
		$this->register_routes();
	}

	/**
	 * Grab latest post title by an author!
	 *
	 * @param array $data Options for the function.
	 *
	 * @return string|null Post title for the latest, * or null if none.
	 */
	public function get_data( $data ) {
		$posts = get_post_meta( $data['id'], $this->get_meta_storage_key() );

		return $posts[0];
	}

	/**
	 * @param $data
	 *
	 * @return string
	 */
	public function update_data( $data ) {
		$json = $data->get_body_params();

		if ( ! add_post_meta( $data['id'], $this->get_meta_storage_key(), $json, true ) ) {
			update_post_meta( $data['id'], $this->get_meta_storage_key(), $json );
		}

		return 'done';
	}

	public function register_routes() {
		add_action(
			'rest_api_init',
			function () {
				$namespace = 'appizy/v1';
				$base      = 'app';

				register_rest_route(
					$namespace,
					'/' . $base . '/(?P<id>[\d]+)',
					array(
						array(
							'methods'  => WP_REST_Server::READABLE,
							'callback' => array( $this, 'get_data' ),
							'permission_callback' => array( $this, 'permissions_check'),
							'args'     => array(
								'context' => array(
									'default' => 'view',
								),
							),
						),
						array(
							'methods'  => WP_REST_Server::EDITABLE,
							'callback' => array( $this, 'update_data' ),
							'permission_callback' => array( $this, 'permissions_check'),
						)
					)
				);
			}
		);
	}

	/**
	 * @return string
	 */
	private function get_meta_storage_key() {
		return 'APPIZY_' . get_current_user_id();
	}

	/**
	 * @return mixed
	 */
	function permissions_check() {
		// Restrict endpoint to only logged in users
		if ( ! is_user_logged_in() ) {
			return new WP_Error( 'rest_forbidden', esc_html__( 'Access restricted.', 'appizy' ), array( 'status' => 401 ) );
		}

		return true;
	}
}
