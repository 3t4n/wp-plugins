<?php

namespace Codemanas\CmBlocks;

final class License {
	private static $_instance = null;
	private $menu_page = '';

	public static function get_instance() {
		return ( self::$_instance == null ) ? self::$_instance = new self() : self::$_instance;
	}

	private function __construct() {
		add_action( 'wp_ajax_license_check', [ $this, 'license_check'] );
		add_action( 'init', [ $this,  'register_license_key_settings'] );
		add_action('init', [$this, 'cm_blocks_schedule_license_check']);
		add_action( 'cm_license_check_hook', [ $this, 'license_check_handler' ] );
	}


	function license_api_call( $edd_action, $license ) {
		$api_url    = 'https://cmblocks.com';
		// Data to send to the API
		$api_params = array(
			'edd_action' => $edd_action,
			'license'    => $license,
			'item_name'  => esc_html__('CM Blocks Suite', 'cm-blocks'),
			'item_id'    => 2583,
			'url'        => home_url()
		);

		// Call the API
		$response = wp_remote_post(
			$api_url,
			array(
				'timeout'   => 15,
				'sslverify' => false,
				'body'      => $api_params
			)
		);
		// Make sure there are no errors
		if (
			is_wp_error( $response ) ||
			200 !== intval( wp_remote_retrieve_response_code( $response ) )
		){
			wp_die( __( 'There has been an error retrieving the license information from the server, perhaps you are no longer connected to the internet. Please contact support.', 'cm-blocks' ) );
		}
		return $response;
	}

	function license_check() {

		check_ajax_referer( 'cm-blocks-license-nonce' );

		$edd_action = sanitize_text_field( $_POST['edd_action'] );
		$license    = sanitize_text_field( $_POST['license'] );

		$response = $this->license_api_call( $edd_action, $license );
		// Make sure there are no errors
		if (
			is_wp_error( $response ) ||
			200 !== intval( wp_remote_retrieve_response_code( $response ) )
		){
			wp_die( __( 'There has been an error retrieving the license information from the server, perhaps you are no longer connected to the internet. Please contact support.', 'cm-blocks' ) );
		}

		$json_response = wp_remote_retrieve_body($response);



		// There are no errors, so retrieve the response
		echo $json_response;

		wp_die();
	}

	function cron_job_cb_function() {
		$cm_blocks_license_data = get_option('cm_blocks_license_data');
		$license_key = $cm_blocks_license_data['key'];

		$response = $this->license_api_call( 'check_license', $license_key );
		$json_response = wp_remote_retrieve_body($response);
		// Decode the JSON string
		$data = json_decode($json_response, true); // true to get an associative array
		if ($data !== null) {
			// Extract the value of the 'license' field
			$license_status = $data['license'];

		} else {
			$license_status = '';
		}

		$license_data = ['key' => $license_key, 'status' =>  $license_status ];
		update_option( 'cm_blocks_license_data', $license_data );
	}

	function register_license_key_settings() {
		$default = array(
			'key' => '',
			'status' => '',
		);
		$schema  = array(
			'type'       => 'object',
			'properties' => array(
				'key' => array(
					'type' => 'string',
				),
				'status' => array(
					'type' => 'string',
				),
			),
		);

		register_setting(
			'options',
			'cm_blocks_license_data',
			array(
				'type'         => 'object',
				'default'      => $default,
				'show_in_rest' => array(
					'schema' => $schema,
				),
			)
		);
	}

	// Schedule the cron event on activation

	function cm_blocks_schedule_license_check() {
		// Schedule event to run daily
		if (!wp_next_scheduled('cm_license_check_hook')) {
			wp_schedule_event(time(), 'daily', 'cm_license_check_hook');
		}
	}

	// Define the callback function for the scheduled event

	function license_check_handler() {
		$this->cron_job_cb_function();
	}
}
