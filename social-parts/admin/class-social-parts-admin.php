<?php

class Social_Parts_Admin {

	const ERRORS
		= [
			'invalid_domain_id' => 'Domain id is invalid',
			'database_error'    => 'Saving data failed',
		];

	private $plugin_name;

	private $version;

	/**
	 *
	 * Social_Parts_Admin constructor.
	 *
	 * @param $plugin_name
	 * @param $version
	 */
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}

	public function register_menu_page() {
		add_menu_page(
			__( $this->plugin_name, 'textdomain' ),
			$this->plugin_name,
			'manage_options',
			SOCIAL_PARTS_SLUG,
			'get_admin_page',
			plugins_url( SOCIAL_PARTS_MENU_LOGO ),
			6
		);
	}

	public function insert_plugin_data() {
		if ( ! current_user_can( 'publish_posts' ) ) {
			die();
		}
		$response        = $this->response_success();
		$requestedDomain = $_POST['social_parts_domain_id'];
		if ( $requestedDomain && is_numeric( $requestedDomain ) ) {
			$domain = (int) $requestedDomain;
			try {
				$this->insert_or_update_domain_id( $domain );
			} catch ( Exception $exception ) {
				$response = $this->response_error( 'database_error',
					$this::ERRORS['database_error'] );
				wp_send_json( $response );
			}
		} else {
			$response = $this->response_error( 'invalid_domain_id',
				$this::ERRORS['invalid_domain_id'] );
			wp_send_json( $response );
		}
		wp_send_json( $response );
	}

	public function insert_or_update_domain_id( $domain ) {
		global $wpdb;
		$table_name = $wpdb->prefix . SOCIAL_PARTS_TABLE_NAME;
		$format     = [
			'%s',
			'%d',
		];

		if ( Social_Parts::get_domain_id() ) {
			$options
				= $wpdb->get_row( "SELECT `id`, `time`, `domain_id` FROM $table_name" );
			$wpdb->update(
				$table_name,
				[
					'time'      => current_time( 'mysql' ),
					'domain_id' => $domain,
				],
				[
					'id' => $options->id,
				],
				$format
			);
		} else {
			$wpdb->insert(
				$table_name,
				[
					'time'      => current_time( 'mysql' ),
					'domain_id' => $domain,
				],
				$format
			);
		}
	}

	public function response_error( $key, $value ) {
		return [
			'success' => false,
			'errors'  => [
				$key => $value,
			],
		];
	}

	public function response_success() {
		return [
			'success' => true,
		];
	}
}