<?php
/**
 * Handles Customer APIs.
 *
 * @package embed-power-bi-reports/API
 */

namespace MoEmbedPowerBI\API;

use MoEmbedPowerBI\Wrappers\pluginConstants;
use MoEmbedPowerBI\Wrappers\wpWrapper;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * This library is miniOrange Authentication Service.
 *
 * Contains Request Calls to Customer service.
 */
class CustomerEPBR {

	/**
	 * Stores the email of the customer.
	 *
	 * @var CustomerEPBR
	 */
	public $email;

	/**
	 * Stores the phone number of customer.
	 *
	 * @var [type]
	 */
	public $phone;

	/*
	 * * Initial values are hardcoded to support the miniOrange framework to generate OTP for email.
	 * * We need the default value for creating the first time,
	 * * As we don't have the Default keys available before registering the user to our server.
	 * * This default values are only required for sending an One Time Passcode at the user provided email address.
	 */
	/**
	 * Holds the default customer key.
	 *
	 * @var string
	 */
	private $default_customer_key = '16555';

	/**
	 * Holds the default api key.
	 *
	 * @var string
	 */
	private $default_api_key = 'fFd2XcvTGDemZvbw1bcUesNJWEqKbbUq';

	/**
	 * Function to send the email alert as demo request.
	 *
	 * @param string  $email This contains email of the customer.
	 * @param string  $phone This contains phone number of the customer.
	 * @param string  $message This contains the message written by the customer.
	 * @param boolean $demo_request This is the boolean value of whether this is a demo request or not.
	 * @return string
	 */
	public function mo_epbr_send_email_alert( $email, $phone, $message, $demo_request = false ) {

		$url = pluginConstants::HOSTNAME . '/moas/api/notify/send';

		$customer_key = $this->default_customer_key;
		$api_key      = $this->default_api_key;

		$current_time_in_millis = $this->mo_epbr_get_timestamp();
		$current_time_in_millis = number_format( $current_time_in_millis, 0, '', '' );
		$string_to_hash         = $customer_key . $current_time_in_millis . $api_key;
		$hash_value             = hash( 'sha512', $string_to_hash );
		$from_email             = 'no-reply@xecurify.com';
		$subject                = 'Feedback: Embed Power BI reports';
		if ( $demo_request ) {
			$subject = 'DEMO REQUEST: Embed Power BI reports';
		}

		global $user;
		$user = wp_get_current_user();

		$query = '[Embed Power BI Reports]: ' . $message;

		if ( isset( $_SERVER['SERVER_NAME'] ) ) {
			$server_name = sanitize_text_field( wp_unslash( $_SERVER['SERVER_NAME'] ) );
		} else {
			$server_name = '';
		}

		$content = '<div >Hello, <br><br>First Name :' . $user->user_firstname . '<br><br>Last  Name :' . $user->user_lastname . '   <br><br>Company :<a href="' . $server_name . '" target="_blank" >' . $server_name . '</a><br><br>Phone Number :' . $phone . '<br><br>Email :<a href="mailto:' . $email . '" target="_blank">' . $email . '</a><br><br>Query :' . $query . '</div>';

		$fields       = array(
			'customerKey' => $customer_key,
			'sendEmail'   => true,
			'email'       => array(
				'customerKey' => $customer_key,
				'fromEmail'   => $from_email,
				'bccEmail'    => $from_email,
				'fromName'    => 'Xecurify',
				'toEmail'     => 'office365support@xecurify.com',
				'toName'      => 'office365support@xecurify.com',
				'subject'     => $subject,
				'content'     => $content,
			),
		);
		$field_string = wp_json_encode( $fields );

		$headers  = array(
			'Content-Type'  => 'application/json',
			'Customer-Key'  => $customer_key,
			'Timestamp'     => $current_time_in_millis,
			'Authorization' => $hash_value,
		);
		$args     = array(
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
			wpWrapper::mo_epbr__show_error_notice( 'Unable to connect to the Internet. Please try again.' );
			return null;
		}
	}

	/**
	 * Function to submit contact us.
	 *
	 * @param string $email This contains email of the customer.
	 * @param string $phone This contains phone number of the customer.
	 * @param string $query This contains the query to be sent in the email.
	 * @return array
	 */
	public function mo_epbr_submit_contact_us( $email, $phone, $query ) {
		$url          = pluginConstants::HOSTNAME . '/moas/rest/customer/contact-us';
		$current_user = wp_get_current_user();

		$fields = array(
			'firstName' => $current_user->user_firstname,
			'lastName'  => $current_user->user_lastname,
			'company'   => sanitize_text_field( wp_unslash( isset( $_SERVER ['SERVER_NAME'] ) ? $_SERVER ['SERVER_NAME'] : '' ) ),
			'email'     => $email,
			'ccEmail'   => 'office365support@xecurify.com',
			'phone'     => $phone,
			'query'     => $query,
		);

		$field_string = wp_json_encode( $fields );

		$headers  = array(
			'Content-Type'  => 'application/json',
			'charset'       => 'UTF-8',
			'Authorization' => 'Basic',
		);
		$args     = array(
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
			wpWrapper::mo_epbr__show_error_notice( 'Unable to connect to the Internet. Please try again.' );
			return null;
		}
	}

	/**
	 * Method to get the timestamp.
	 *
	 * @return array
	 */
	public function mo_epbr_get_timestamp() {
		$url      = pluginConstants::HOSTNAME . '/moas/rest/mobile/get-timestamp';
		$response = wp_remote_post( esc_url_raw( $url ) );
		return $response['body'];
	}

	/**
	 * Method to check and verify the customer.
	 *
	 * @return array
	 */
	public function mo_epbr_check_customer() {
		$url = pluginConstants::HOSTNAME . '/moas/rest/customer/check-if-exists';

		$email = get_option( 'mo_epbr_admin_email' );

		$fields       = array(
			'email' => $email,
		);
		$field_string = wp_json_encode( $fields );

		$headers  = array(
			'Content-Type'  => 'application/json',
			'charset'       => 'UTF-8',
			'Authorization' => 'Basic',
		);
		$args     = array(
			'method'      => 'POST',
			'body'        => $field_string,
			'timeout'     => '10',
			'redirection' => '5',
			'httpversion' => '1.0',
			'blocking'    => true,
			'headers'     => $headers,
		);
		$response = wpWrapper::mo_epbr_sync_wp_remote_call( $url, $args );
		return $response;
	}

	/**
	 * Method to get the customer.
	 *
	 * @return array
	 */
	public function mo_epbr_get_customer_key() {
		$url = pluginConstants::HOSTNAME . '/moas/rest/customer/key';

		$email = get_option( 'mo_epbr_admin_email' );

		$password = get_option( 'mo_epbr_admin_password' );

		$fields       = array(
			'email'    => $email,
			'password' => $password,
		);
		$field_string = wp_json_encode( $fields );

		$headers  = array(
			'Content-Type'  => 'application/json',
			'charset'       => 'UTF-8',
			'Authorization' => 'Basic',
		);
		$args     = array(
			'method'      => 'POST',
			'body'        => $field_string,
			'timeout'     => '10',
			'redirection' => '5',
			'httpversion' => '1.0',
			'blocking'    => true,
			'headers'     => $headers,
		);
		$response = wpWrapper::mo_epbr_sync_wp_remote_call( $url, $args );
		return $response;
	}

	/**
	 * Method to create the customer.
	 *
	 * @return array
	 */
	public function mo_epbr_create_customer() {
		$url = pluginConstants::HOSTNAME . '/moas/rest/customer/add';

		$this->email = get_option( 'mo_epbr_admin_email' );
		$password    = get_option( 'mo_epbr_admin_password' );

		$fields       = array(
			'areaOfInterest' => 'WP Embed Power BI Content',
			'email'          => $this->email,
			'password'       => $password,
		);
		$field_string = wp_json_encode( $fields );

		$headers = array(
			'Content-Type'  => 'application/json',
			'charset'       => 'UTF-8',
			'Authorization' => 'Basic',
		);

		$args     = array(
			'method'      => 'POST',
			'body'        => $field_string,
			'timeout'     => '10',
			'redirection' => '5',
			'httpversion' => '1.0',
			'blocking'    => true,
			'headers'     => $headers,
		);
		$response = wpWrapper::mo_epbr_sync_wp_remote_call( $url, $args );
		return $response;
	}
}
