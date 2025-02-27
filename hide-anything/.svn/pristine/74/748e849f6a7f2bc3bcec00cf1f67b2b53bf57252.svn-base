<?php

defined( 'ABSPATH' ) || exit;

class Hide_Anything_Rest_Api extends WP_REST_Controller {
	/** @var null */
	private static $instance = null;

	/**
	 * Hide_Anything_Rest_Api constructor.
	 *
	 */
	public function __construct() {
		$this->namespace = 'hide-anything/v1';

		add_action( 'rest_api_init', [ $this, 'register_routes' ] );
	}

	public function register_routes() {

		//update settings
		register_rest_route( $this->namespace, '/settings/', array(
			array(
				'methods'             => WP_REST_Server::EDITABLE,
				'callback'            => array( $this, 'update_settings' ),
				'permission_callback' => array( $this, 'check_permission' ),
			),
		) );

		//update selectors
		register_rest_route( $this->namespace, '/update-selectors/', array(
			array(
				'methods'             => WP_REST_Server::EDITABLE,
				'callback'            => array( $this, 'update_selectors' ),
				'permission_callback' => array( $this, 'check_permission' ),
			),
		) );

	}

	public function update_settings( $request ) {
		$posted = json_decode( $request->get_body() );

		update_option( 'hide_anything_settings', $posted );

		wp_send_json_success();
	}

	public function update_selectors( $request ) {
		$posted = json_decode( $request->get_body(), true );

		$current_page = ! empty( $posted['current_page'] ) ? sanitize_text_field( $posted['current_page'] ) : '';
		$is_admin     = ! empty( $posted['is_admin'] ) ? rest_sanitize_boolean( $posted['is_admin'] ) : false;

		$option_key = ! $is_admin ? 'hide_anything_selectors' : 'hide_anything_admin_selectors';
		$selectors  = (array) get_option( $option_key );

		$activeItems = ! empty( $posted['activeItems'] ) ? $posted['activeItems'] : array();

		error_log(print_r($activeItems, true));

		if ( ! empty( $activeItems ) ) {
			foreach ( $activeItems as $item ) {
				$selector = $item['selector'];
				if ( ! empty( $item['visible'] ) ) {
					unset( $selectors[ $current_page ][ $selector ] );
				} else {
					$selectors[ $current_page ][ $selector ] = $item['devices'];
				}
			}
		}

		update_option( $option_key, array_filter( $selectors ) );

		wp_send_json_success();
	}

	/**
	 * @return bool
	 */
	public function check_permission() {
		return current_user_can( 'manage_options' );
	}

	/**
	 * Register rest API
	 *
	 * @since 1.0.0
	 */

	/**
	 * @return Hide_Anything_Rest_Api|null
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}
}


Hide_Anything_Rest_Api::instance();