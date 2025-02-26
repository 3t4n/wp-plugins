<?php
/**
 * Handles demo request Configurations.
 *
 * @package embed-power-bi-reports\Controller
 */

namespace MoEmbedPowerBI\Controller;

use MoEmbedPowerBI\Wrappers\pluginConstants;
use MoEmbedPowerBI\Wrappers\wpWrapper;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class to handle demo request form configurations.
 */
class demorequestConfig {
	/**
	 * Holds the Demo Request Config class instance.
	 *
	 * @var Demo_Request_Config
	 */
	private static $instance;

	/**
	 * Holds the status of demo request form submission.
	 *
	 * @var string
	 */
	public static $status = 'Demo Request Successful';

	/**
	 * Object instance(Demo Request Controller) getter method.
	 *
	 * @return Demo_Request
	 */
	public static function get_controller() {
		if ( ! isset( self::$instance ) ) {
			$class          = __CLASS__;
			self::$instance = new $class();
		}
		return self::$instance;
	}

	/**
	 * Function to save the settings specific to forms.
	 *
	 * @param string $option Option value passed so as to call specific function.
	 * @return void
	 */
	public function mo_epbr_save_settings( $option ) {
		// $option = sanitize_text_field($_POST['option']);
		switch ( $option ) {
			case 'mo_epbr_demo_request_option':
				$this->mo_epbr_request_demo();
				break;
		}
	}

	/**
	 * Function to handle the demo request.
	 *
	 * @return void
	 */
	private function mo_epbr_request_demo() {
		check_admin_referer( 'mo_epbr_demo_request_option' );
		$demo_request                       = array();
		$features_selected                  = array();
		$integration_selected               = array();
		$demo_request['mo_epbr_demo_email'] = isset( $_POST['mo_epbr_demo_email'] ) ? sanitize_email( wp_unslash( $_POST['mo_epbr_demo_email'] ) ) : get_option( 'mo_epbr_admin_email' );
		$demo_request['mo_epbr_demo_plan']  = 'Premium Plan';

		if ( ! self::mo_epbr_validate_demo_request_fields( $demo_request ) ) {
			return;
		}

		$demo_request['mo_epbr_demo_description'] = sanitize_text_field( wp_unslash( isset( $_POST['mo_epbr_demo_description'] ) ? $_POST['mo_epbr_demo_description'] : '' ) );
		foreach ( pluginConstants::FEATURES_ADVERTISE as $key => $value ) {
			if ( isset( $_POST[ $key ] ) && 'true' === $_POST[ $key ] ) {
				$features_selected[ $key ] = $value;
			}
		}
		$demo_request['mo_epbr_features_request'] = $features_selected;
		foreach ( pluginConstants::INTEGRATIONS as $key => $value ) {
			if ( isset( $_POST[ $key ] ) && 'true' === $_POST[ $key ] ) {
				$integration_selected[ $key ] = $value;
			}
		}
		$demo_request['mo_epbr_demo_integrations_request'] = $integration_selected;
		$query = self::set_demo_query( $demo_request );
		self::send_demo_request( $query );
		wpWrapper::mo_epbr__show_success_notice( 'Thank you for contacting us.We will get back to you shortly via email.' );
	}

	/**
	 * Function to validate the fields of demo request form.
	 *
	 * @param string $demo_request This contains the demo request fields filled by the user.
	 * @return bool
	 */
	private function mo_epbr_validate_demo_request_fields( $demo_request ) {
		$validate_fields_array = array( $demo_request['mo_epbr_demo_email'], $demo_request['mo_epbr_demo_plan'] );
		if ( self::mo_epbr_check_empty_or_null( $validate_fields_array ) ) {
			$post_save    = wpWrapper::mo_epbr__show_error_notice( 'CONTACT_EMAIL_EMPTY' );
			self::$status = __( 'Error: Email address or Demo plan is Empty', 'embed-power-bi-reports' );
		}
		if ( ! filter_var( $demo_request['mo_epbr_demo_email'], FILTER_VALIDATE_EMAIL ) ) {
			$post_save = wpWrapper::mo_epbr__show_error_notice( 'CONTACT_EMAIL_INVALID' );
		}
		if ( isset( $post_save ) ) {
			return false;
		}
		return true;
	}

	/**
	 * Function to check whether the input fields are empty or null.
	 *
	 * @param iterable|object $validate_fields_array Arrsy with all the demo request fields.
	 * @return boolean
	 */
	public static function mo_epbr_check_empty_or_null( $validate_fields_array ) {
		foreach ( $validate_fields_array as $fields ) {
			if ( ! isset( $fields ) || empty( $fields ) ) {
				return true;
			}
		}
		return false;
	}

	/**
	 * Function to set the demo query.
	 *
	 * @param iterable|object $demo_request Content of the demo request which will be sent.
	 * @return string
	 */
	private function set_demo_query( $demo_request ) {
		$plan_name = 'Premium Plan';
		$message   = '[Demo For Customer] : ' . $demo_request['mo_epbr_demo_email'];
		$message  .= ' <br>[Selected Plan] : ' . $plan_name;

		if ( ! empty( $demo_request['mo_epbr_demo_description'] ) ) {
			$message .= ' <br>[Requirements] : ' . $demo_request['mo_epbr_demo_description'];
		}

		$message .= ' <br>[Status] : ' . self::$status;

		if ( ! empty( $demo_request['mo_epbr_demo_integrations_request'] ) ) {
			$message .= ' <br>[Integrations Requested] : ';
			foreach ( $demo_request['mo_epbr_demo_integrations_request'] as $key => $value ) {
				$message .= $value;
				if ( next( $demo_request['mo_epbr_demo_integrations_request'] ) ) {
					$message .= ', ';
				}
			}
		}
		if ( ! empty( $demo_request['mo_epbr_features_request'] ) ) {
			$message .= ' <br>[Features Requested] : ';
			foreach ( $demo_request['mo_epbr_features_request'] as $key => $value ) {
				$message .= $value;
				if ( next( $demo_request['mo_epbr_features_request'] ) ) {
					$message .= ', ';
				}
			}
		}

		return $message;
	}

	/**
	 * Function to send demo request query.
	 *
	 * @param iterable|object $query Query set with all the demo request fields.
	 * @return void
	 */
	private function send_demo_request( $query ) {
		check_admin_referer( 'mo_epbr_demo_request_option' );
		$user        = wp_get_current_user();
		$email       = ! empty( $_POST['mo_epbr_demo_email'] ) ? sanitize_text_field( wp_unslash( $_POST['mo_epbr_demo_email'] ) ) : get_option( 'mo_epbr_admin_email' );
		$phone       = ! empty( get_option( 'mo_epbr_admin_phone' ) ) ? get_option( 'mo_epbr_admin_phone' ) : '';
		$demo_status = strpos( self::$status, 'Error' );

		$response = $this->send_email_alert( $email, $phone, $query, true );

		if ( is_array( $response ) && array_key_exists( 'status', $response ) && 'ERROR' === $response['status'] ) {
			wpWrapper::mo_epbr__show_error_notice( $response['message'] );
		} elseif ( false === $response || false !== $demo_status ) {
			wpWrapper::mo_epbr__show_error_notice( self::$status );
		} elseif ( json_last_error() === JSON_ERROR_NONE ) {
			wpWrapper::mo_epbr__show_success_notice( 'Query Submitted' );
		}
	}

	/**
	 * Function to send email alert.
	 *
	 * @param string  $email Contains the user email to be sent in the demo request form.
	 * @param string  $phone Contains the phone number of the customer.
	 * @param string  $message Conatins the message or query of the customer.
	 * @param boolean $demo_request Contains the bool value saying whether this is demo request or not.
	 * @return array
	 */
	public function send_email_alert( $email, $phone, $message, $demo_request = false ) {
		$url = pluginConstants::HOSTNAME . '/moas/rest/customer/contact-us';
		global $user;
		$user         = wp_get_current_user();
		$query        = '[Embed Power BI Reports ]: ' . $message;
		$fields       = array(
			'firstName' => $user->user_firstname,
			'lastName'  => $user->user_lastname,
			'company'   => sanitize_text_field( wp_unslash( isset( $_SERVER ['SERVER_NAME'] ) ? $_SERVER ['SERVER_NAME'] : '' ) ),
			'email'     => $email,
			'ccEmail'   => 'office365support@xecurify.com',
			'phone'     => $phone,
			'query'     => $query,
		);
		$field_string = wp_json_encode( $fields );
		$headers      = array(
			'Content-Type'  => 'application/json',
			'charset'       => 'UTF-8',
			'Authorization' => 'Basic',
		);
		$args         = array(
			'method'      => 'POST',
			'body'        => $field_string,
			'timeout'     => '10',
			'redirection' => '5',
			'httpversion' => '1.0',
			'blocking'    => true,
			'headers'     => $headers,
		);
		$response     = wp_remote_post( $url, $args );
		return $response;
	}

	/**
	 * Function to get the cuurent timestamp.
	 *
	 * @return array
	 */
	public function get_timestamp() {
		$url      = pluginConstants::HOSTNAME . '/moas/rest/mobile/get-timestamp';
		$response = wp_remote_post( $url );
		return $response;
	}
}
