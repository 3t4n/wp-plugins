<?php
/**
 * This miniOrange Embed SharePoint OneDrive Documents allows you to connect with SharePoint and embed documents on WordPress site pages and posts.
 * Copyright (C) 2015 miniOrange
 *
 * @package     embed-sharepoint-onedrive-documents
 * @license     MIT
 */

namespace MoSharePointObjectSync\API;

use MoSharePointObjectSync\Wrappers\PluginConstants;
use MoSharePointObjectSync\Wrappers\WpWrapper;

/**
 * This library is miniOrange Authentication Service.
 *
 * Contains request calls to customer service.
 */
class CustomerMOSPS {
	/**
	 * The user's email address.
	 *
	 * @var string User's email address
	 */
	public $email;

	/**
	 * The user's phone number.
	 *
	 * @var string User's phone number
	 */
	public $phone;

	/**
	 * The default customer key for API authentication.
	 *
	 * @var string Default customer key for API authentication
	 */
	private $default_customer_key = '16555';

	/**
	 * The default API key for API authentication.
	 *
	 * @var string Default API key for API authentication
	 */
	private $default_api_key = 'fFd2XcvTGDemZvbw1bcUesNJWEqKbbUq';


	/**
	 * Creates a new customer by sending a request to the API.
	 *
	 * @return mixed API response
	 */
	public function mo_sps_create_customer() {
		$url         = PluginConstants::HOSTNAME . '/moas/rest/customer/add';
		$this->email = get_option( 'mo_sps_admin_email' );
		$password    = get_option( 'mo_sps_admin_password' );

		$fields       = array(
			'areaOfInterest' => 'WP Embed SharePoint OneDrive Library',
			'email'          => $this->email,
			'password'       => $password,
		);
		$field_string = wp_json_encode( $fields );

		$headers = array(
			'Content-Type'  => 'application/json',
			'charset'       => 'UTF-8',
			'Authorization' => 'Basic',
		);

		$args = array(
			'method'      => 'POST',
			'body'        => $field_string,
			'timeout'     => '5',
			'redirection' => '5',
			'httpversion' => '1.0',
			'blocking'    => true,
			'headers'     => $headers,
		);

		$response = WpWrapper::mo_azure_sync_wp_remote_call( $url, $args );
		return $response;
	}

	/**
	 * Retrieves the customer key by sending a request to the API.
	 *
	 * @return mixed API response
	 */
	public function mo_sps_get_customer_key() {
		$url      = PluginConstants::HOSTNAME . '/moas/rest/customer/key';
		$email    = get_option( 'mo_sps_admin_email' );
		$password = get_option( 'mo_sps_admin_password' );

		$fields       = array(
			'email'    => $email,
			'password' => $password,
		);
		$field_string = wp_json_encode( $fields );

		$headers = array(
			'Content-Type'  => 'application/json',
			'charset'       => 'UTF-8',
			'Authorization' => 'Basic',
		);

		$args = array(
			'method'      => 'POST',
			'body'        => $field_string,
			'timeout'     => '10',
			'redirection' => '5',
			'httpversion' => '1.0',
			'blocking'    => true,
			'headers'     => $headers,
		);

		$response = WpWrapper::mo_azure_sync_wp_remote_call( $url, $args );
		return $response;
	}

	/**
	 * Checks if a customer exists by sending a request to the API.
	 *
	 * @return mixed API response
	 */
	public function mo_sps_check_customer() {
		$url   = PluginConstants::HOSTNAME . '/moas/rest/customer/check-if-exists';
		$email = get_option( 'mo_sps_admin_email' );

		$fields       = array(
			'email' => $email,
		);
		$field_string = wp_json_encode( $fields );

		$headers = array(
			'Content-Type'  => 'application/json',
			'charset'       => 'UTF-8',
			'Authorization' => 'Basic',
		);

		$args = array(
			'method'      => 'POST',
			'body'        => $field_string,
			'timeout'     => '10',
			'redirection' => '5',
			'httpversion' => '1.0',
			'blocking'    => true,
			'headers'     => $headers,
		);

		$response = WpWrapper::mo_azure_sync_wp_remote_call( $url, $args );
		return $response;
	}

	/**
	 * Submits a contact us query to the API
	 *
	 * @param string $email User's email address.
	 * @param string $phone User's phone number.
	 * @param string $query Query message.
	 * @return mixed API response or null on error.
	 */
	public function mo_sps_submit_contact_us( $email, $phone, $query ) {
		$url          = PluginConstants::HOSTNAME . '/moas/rest/customer/contact-us';
		$current_user = wp_get_current_user();

		// Check if the 'SERVER_NAME' index exists and is not empty.
		if ( isset( $_SERVER['SERVER_NAME'] ) && ! empty( $_SERVER['SERVER_NAME'] ) ) {
			// Unslash and sanitize the 'SERVER_NAME' value.
			$server_name = sanitize_text_field( wp_unslash( $_SERVER['SERVER_NAME'] ) );
		} else {
			$server_name = ''; // Or handle the case where the index doesn't exist or is empty.
		}

		$fields = array(
			'firstName' => $current_user->user_firstname,
			'lastName'  => $current_user->user_lastname,
			'company'   => $server_name,
			'email'     => $email,
			'ccEmail'   => 'office365support@xecurify.com',
			'phone'     => $phone,
			'query'     => $query,
		);

		$field_string = wp_json_encode( $fields );

		$headers = array(
			'Content-Type'  => 'application/json',
			'charset'       => 'UTF-8',
			'Authorization' => 'Basic',
		);

		$args = array(
			'method'      => 'POST',
			'body'        => $field_string,
			'timeout'     => '10',
			'redirection' => '6',
			'httpversion' => '1.0',
			'blocking'    => true,
			'headers'     => $headers,
		);

		$response = wp_remote_post( esc_url_raw( $url ), $args );

		if ( ! is_wp_error( $response ) ) {
			return $response['body'];
		} else {
			WpWrapper::mo_sps__show_error_notice( 'Unable to connect to the Internet. Please try again.' );
			return null;
		}
	}

	/**
	 * Submits a demo query to the API.
	 *
	 * @param string $email User's email address.
	 * @param string $phone User's phone number.
	 * @param string $query Query message.
	 * @param string $call_setup Call setup information.
	 * @param bool   $demo_request Indicates if this is a demo request.
	 * @param string $integration_selected Selected integration.
	 * @return mixed API response or null on error.
	 */
	public function mo_sps_submit_demo_query( $email, $phone, $query, $call_setup, $demo_request = false, $integration_selected = '' ) {
		$url          = PluginConstants::HOSTNAME . '/moas/rest/customer/contact-us';
		$current_user = wp_get_current_user();

		// Check if the 'SERVER_NAME' index exists and is not empty.
		if ( isset( $_SERVER['SERVER_NAME'] ) && ! empty( $_SERVER['SERVER_NAME'] ) ) {
			// Unslash and sanitize the 'SERVER_NAME' value.
			$server_name = sanitize_text_field( wp_unslash( $_SERVER['SERVER_NAME'] ) );
		} else {
			$server_name = ''; // Or handle the case where the index doesn't exist or is empty.
		}
		$query .= ' <br><br>Requested Integration : ' . $integration_selected;
		$fields = array(
			'firstName' => $current_user->user_firstname,
			'lastName'  => $current_user->user_lastname,
			'company'   => $server_name,
			'email'     => $email,
			'ccEmail'   => 'office365support@xecurify.com',
			'query'     => $query,
		);

		$field_string = wp_json_encode( $fields );

		$headers = array(
			'Content-Type'  => 'application/json',
			'charset'       => 'UTF-8',
			'Authorization' => 'Basic',
		);

		$args = array(
			'method'      => 'POST',
			'body'        => $field_string,
			'timeout'     => '10',
			'redirection' => '6',
			'httpversion' => '1.0',
			'blocking'    => true,
			'headers'     => $headers,
		);

		$response = wp_remote_post( esc_url_raw( $url ), $args );

		if ( ! is_wp_error( $response ) ) {
			return $response['body'];
		} else {
			WpWrapper::mo_sps__show_error_notice( 'Unable to connect to the Internet. Please try again.' );
			return null;
		}
	}

	/**
	 * Sends an email alert to the specified address.
	 *
	 * @param string $email Recipient's email address.
	 * @param string $phone User's phone number.
	 * @param string $message Email message.
	 * @param bool   $get_config Indicates if configuration should be included.
	 * @param bool   $demo_request Indicates if this is a demo request.
	 * @return mixed API response or null on error
	 */
	public function mo_sps_send_email_alert( $email, $phone, $message, $get_config, $demo_request = false ) {
		$url = PluginConstants::HOSTNAME . '/moas/api/notify/send';
		// Check if the 'SERVER_NAME' index exists and is not empty.
		if ( isset( $_SERVER['SERVER_NAME'] ) && ! empty( $_SERVER['SERVER_NAME'] ) ) {
			// Unslash and sanitize the 'SERVER_NAME' value.
			$server_name = sanitize_text_field( wp_unslash( $_SERVER['SERVER_NAME'] ) );
		} else {
			$server_name = ''; // Or handle the case where the index doesn't exist or is empty.
		}
		$customer_key = $this->default_customer_key;
		$api_key      = $this->default_api_key;

		$current_time_in_millis = $this->mo_sps_get_timestamp();
		$current_time_in_millis = number_format( $current_time_in_millis, 0, '', '' );
		$string_to_hash         = $customer_key . $current_time_in_millis . $api_key;
		$hash_value             = hash( 'sha512', $string_to_hash );
		$from_email             = 'no-reply@xecurify.com';
		$subject                = 'Feedback: Embed SharePoint OneDrive Documents Plugin';
		if ( $demo_request ) {
			$subject = 'DEMO REQUEST: Embed SharePoint OneDrive Documents Plugin';
		}

		global $user;
		$user = wp_get_current_user();

		$query = '[Embed SharePoint OneDrive Documents Plugin]: ' . $message;

		$feedback_config                   = WpWrapper::mo_sps_get_option( PluginConstants::FEEDBACK_CONFIG );
		$config                            = WpWrapper::mo_sps_get_option( PluginConstants::APP_CONFIG );
		$feedback_config['conn']           = isset( $config ) && ! empty( $config ) && isset( $config['app_type'] ) ? $config['app_type'] : '';
		$feedback_config['plugin_version'] = MO_SPS_PLUGIN_VERSION;
		WpWrapper::mo_sps_set_option( 'mo_sps_feedback_config', $feedback_config );

		$configuration = '<br>Configuration : ' . str_replace( '\\', '', wp_json_encode( $feedback_config ) ) . '<br>';
		$content       = '<div >Hello, <br><br>First Name :' . $user->user_firstname . '<br><br>Last Name :' . $user->user_lastname . '   <br><br>Company :<a href="' . $server_name . '" target="_blank" >' . $server_name . '</a><br><br>Phone Number :' . $phone . '<br><br>Email :<a href="mailto:' . $email . '" target="_blank">' . $email . '</a><br><br>Query :' . $query . ( $get_config ? $configuration : '' ) . '</div>';

		WpWrapper::mo_sps_delete_option( PluginConstants::FEEDBACK_CONFIG );
		WpWrapper::mo_sps_delete_option( PluginConstants::USER_CONFIG );

		$fields       = array(
			'customerKey' => $customer_key,
			'sendEmail'   => true,
			'email'       => array(
				'customerKey' => $customer_key,
				'fromEmail'  => $from_email,
				'fromName'    => 'Xecurify',
				'toEmail'     => 'info@xecurify.com',
				'toName'      => 'office365support@xecurify.com',
				'bccEmail'    => 'office365support@xecurify.com',
				'subject'     => $subject,
				'content'     => $content,
			),
		);
		$field_string = wp_json_encode( $fields );

		$headers = array(
			'Content-Type'  => 'application/json',
			'Customer-Key'  => $customer_key,
			'Timestamp'     => $current_time_in_millis,
			'Authorization' => $hash_value,
		);

		$args = array(
			'method'      => 'POST',
			'body'        => $field_string,
			'timeout'     => '5',
			'redirection' => '5',
			'httpversion' => '1.0',
			'blocking'    => true,
			'headers'     => $headers,
		);

		$response = wp_remote_post( esc_url_raw( $url ), $args );

		if ( ! is_wp_error( $response ) ) {
			return $response['body'];
		} else {
			WpWrapper::mo_sps__show_error_notice( 'Unable to connect to the Internet. Please try again.' );
			return null;
		}
	}

	/**
	 * Sends a password reset request for the given email address.
	 *
	 * @param string $email User's email address.
	 * @return mixed API response
	 */
	public function mo_saml_forgot_password( $email ) {
		$url = PluginConstants::HOSTNAME . '/moas/rest/customer/password-reset';

		$customer_key = get_option( 'mo_sps_admin_customer_key' );
		$api_key      = get_option( 'mo_sps_admin_api_key' );

		$current_time_in_millis = round( microtime( true ) * 1000 );
		$string_to_hash         = $customer_key . number_format( $current_time_in_millis, 0, '', '' ) . $api_key;
		$hash_value             = hash( 'sha512', $string_to_hash );

		$fields       = array(
			'email' => $email,
		);
		$field_string = wp_json_encode( $fields );

		$headers = array(
			'Content-Type'  => 'application/json',
			'Customer-Key'  => $customer_key,
			'Timestamp'     => $current_time_in_millis,
			'Authorization' => $hash_value,
		);

		$args = array(
			'method'      => 'POST',
			'body'        => $field_string,
			'timeout'     => '5',
			'redirection' => '5',
			'httpversion' => '1.0',
			'blocking'    => true,
			'headers'     => $headers,
		);

		$response = wp_remote_post( esc_url_raw( $url ), $args );
		return $response['body'];
	}

	/**
	 * Retrieves the current timestamp from the API.
	 *
	 * @return mixed API response
	 */
	public function mo_sps_get_timestamp() {
		$url      = PluginConstants::HOSTNAME . '/moas/rest/mobile/get-timestamp';
		$response = wp_remote_post( esc_url_raw( $url ) );
		return $response['body'];
	}
}
