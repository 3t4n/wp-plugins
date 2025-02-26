<?php
/**
 * Handles Token Authorization.
 *
 * @package embed-outlook-teams-calendar-events/API
 */

namespace MoEmbedPowerBI\API;

use MoEmbedPowerBI\Wrappers\wpWrapper;
use MoEmbedPowerBI\Wrappers\pluginConstants;
use MoEmbedPowerBI\API\Azure;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class to handle token authorization and API endpoints' requests.
 */
class Authorization {
	/**
	 * Holds the Authorization class instance.
	 *
	 * @var Authorization
	 */
	private static $instance;

	/**
	 * Object instance(Authorization) getter method.
	 *
	 * @return Authorization
	 */
	public static function get_controller() {
		if ( ! isset( self::$instance ) ) {
			$class          = __CLASS__;
			self::$instance = new $class();
		}
		return self::$instance;
	}

	/**
	 * Function to get access token using different grant types.
	 *
	 * @param array  $endpoints This holds array of all the endpoints of Outlook REST APIs.
	 * @param array  $config This holds array of azure application client credentials.
	 * @param string $scope This is vaue of scope to be passed in token endpoint.
	 * @return array
	 */
	public function mo_epbr_get_access_token( $endpoints, $config, $scope ) {
		$args = array();
		if ( pluginConstants::SCOPE_DEFAULT_OFFLINE_ACCESS !== $scope ) {
			$args = $this->mo_epbr_get_access_token_using_client_credentials( $config, $scope );
		} else {
			$refresh_token = wpWrapper::mo_epbr_get_session_value( 'mo_epbr_refresh_token' );
			if ( empty( $refresh_token ) ) {
				$args = $this->mo_epbr_get_token_using_authorization_code( $config, $scope );
			} elseif ( isset( $_COOKIE['Oauth_User_Cookie'] ) && 'SSOUser' === $_COOKIE['Oauth_User_Cookie'] ) {
				$args = $this->mo_epbr_get_token_using_refresh_token( $config, $scope );
			}
		}
		$client      = Azure::get_client( $config );
		$args_header = isset( $args['headers'] ) ? $args['headers'] : '';
		$args_body   = isset( $args['body'] ) ? $args['body'] : '';
		$body        = $this->mo_epbr_post_request( esc_url_raw( $client->get_endpoints( 'token' ) ), $args_header, $args_body );
		//phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( isset( $body['error'] ) && isset( $_REQUEST['option'] ) && 'testUser' === $_REQUEST['option'] ) {
			return $body;
		}
		if ( isset( $body['refresh_token'] ) ) {
			wpWrapper::mo_epbr_set_session_value( 'mo_epbr_refresh_token', $body['refresh_token'] );
		}
		if ( isset( $body['access_token'] ) ) {
			return $body['access_token'];
		}
		return false;
	}

	/**
	 * Function to get access token using client credentials grant type.
	 *
	 * @param array  $config This holds array of azure application client credentials.
	 * @param string $scope This is vaue of scope to be passed in token endpoint.
	 * @return array
	 */
	public function mo_epbr_get_access_token_using_client_credentials( $config, $scope ) {
		$client_secret = wpWrapper::mo_epbr_decrypt_data( $config['client_secret'], hash( 'sha256', $config['client_id'] ) );
		$args          = array(
			'body'    => array(
				'grant_type'    => pluginConstants::GRANT_TYPE_CLIENTCRED,
				'client_secret' => $client_secret,
				'client_id'     => $config['client_id'],
				'scope'         => $scope,
			),
			'headers' => array(
				'Content-type' => pluginConstants::CONTENT_TYPE_VAL,
			),
		);
		return $args;
	}

	/**
	 * Function to get access token using authorization code grant type.
	 *
	 * @param array  $config This holds array of azure application client credentials.
	 * @param string $scope This is vaue of scope to be passed in token endpoint.
	 * @return array
	 */
	public function mo_epbr_get_token_using_authorization_code( $config, $scope ) {
		$client_secret = wpWrapper::mo_epbr_decrypt_data( $config['client_secret'], hash( 'sha256', $config['client_id'] ) );
		$code          = wpWrapper::mo_epbr_get_option( 'mo_epbr_code' );
		$args          = array(
			'body'    => array(
				'grant_type'    => pluginConstants::GRANT_TYPE_AUTHCODE,
				'client_secret' => $client_secret,
				'client_id'     => $config['client_id'],
				'scope'         => $scope,
				'code'          => $code,
				'redirect_uri'  => $config['redirect_uri'],
			),
			'headers' => array(
				'Content-type' => pluginConstants::CONTENT_TYPE_VAL,
			),
		);
		return $args;
	}

	/**
	 * Function to get access token using refresh token grant type.
	 *
	 * @param array  $config This holds array of azure application client credentials.
	 * @param string $scope This is vaue of scope to be passed in token endpoint.
	 * @return array
	 */
	public function mo_epbr_get_token_using_refresh_token( $config, $scope ) {
		$client_secret = wpWrapper::mo_epbr_decrypt_data( $config['client_secret'], hash( 'sha256', $config['client_id'] ) );
		$refresh_token = wpWrapper::mo_epbr_get_session_value( 'mo_epbr_refresh_token' );
		$args          = array(
			'body'    => array(
				'grant_type'    => pluginConstants::GRANT_TYPE_REFTOKEN,
				'client_secret' => $client_secret,
				'client_id'     => $config['client_id'],
				'scope'         => $scope,
				'refresh_token' => $refresh_token,
				'redirect_uri'  => $config['redirect_uri'],
			),
			'headers' => array(
				'Content-type' => pluginConstants::CONTENT_TYPE_VAL,
			),
		);
		return $args;
	}

	/**
	 * Function to execute API calls using GET method.
	 *
	 * @param string $url This contains api endpoint where GET method should be carried out.
	 * @param array  $headers This contains array of headers that to be passed in API call.
	 * @return array
	 */
	public function mo_epbr_get_request( $url, $headers ) {
		$args     = array(
			'headers' => $headers,
		);
		$response = wp_remote_get( esc_url_raw( $url ), $args );
		if ( is_array( $response ) && ! is_wp_error( $response ) ) {
			return json_decode( $response['body'], true );
		} else {
			return pluginConstants::PROCESS_FAILED;
		}
	}

	/**
	 * Function to execute API calls using POST method.
	 *
	 * @param string $url This contains api endpoint where GET method should be carried out.
	 * @param array  $headers This contains array of headers that to be passed in API call.
	 * @param array  $body This contains array of body that to be passed in API call.
	 * @return array
	 */
	public function mo_epbr_post_request( $url, $headers, $body ) {
		$args     = array(
			'body'    => $body,
			'headers' => $headers,
		);
		$response = wp_remote_post( esc_url_raw( $url ), $args );
		if ( is_wp_error( $response ) ) {
			$error_message = $response->get_error_message();
			return pluginConstants::PROCESS_FAILED;
		} else {
			$body = json_decode( $response['body'], true );
			return $body;
		}
		return false;
	}
}
