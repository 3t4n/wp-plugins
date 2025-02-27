<?php
/**
 * Handles Token Authorization.
 *
 * @package embed-sharepoint-onedrive-documents\API
 */

namespace MoSharePointObjectSync\API;

use MoSharePointObjectSync\Observer\AdminObserver;
use MoSharePointObjectSync\Wrappers\PluginConstants;
use MoSharePointObjectSync\Wrappers\WpWrapper;
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
	 * Function to get access token using client credentials grant type.
	 *
	 * @param array  $endpoints This holds array of all the endpoints.
	 * @param array  $config This holds array of azure application client credentials.
	 * @param string $scope This is vaue of scope to be passed in token endpoint.
	 * @return array
	 */
	public function mo_sps_get_access_token_using_client_credentials( $endpoints, $config, $scope ) {
		if ( ! empty( $config ) && ( isset( $config['client_id'] ) && isset( $config['client_secret'] ) && isset( $config['tenant_id'] ) ) ) {
			$client_secret = WpWrapper::mo_sps_decrypt_data( $config['client_secret'], hash( 'sha256', $config['client_id'] ) );

			$args = array(
				'body'    => array(
					'grant_type'    => 'client_credentials',
					'client_secret' => $client_secret,
					'client_id'     => $config['client_id'],
					'scope'         => $scope,
				),
				'headers' => array(
					'Content-type' => 'application/x-www-form-urlencoded',
				),
			);

			$response = wp_remote_post( esc_url_raw( $endpoints['token'] ), $args );
			if ( is_wp_error( $response ) ) {
				$error_message = $response->get_error_message();
				wp_die( 'Error Occurred : ' . esc_html( $error_message ) );
			} else {
				$body = json_decode( $response['body'], true );
				if ( isset( $body['error'] ) && isset( $_REQUEST['option'] ) && ( 'mo_sps_verify_scope_permissions' === $_REQUEST['option'] ) && check_admin_referer( 'mo_sps_verify_scope_permissions' ) ) {
					$observer   = AdminObserver::get_observer();
					$error_code = array(
						'Error'       => $body['error'],
						'Description' => $body['error_description'],
					);
					$observer->mo_sps_display_error_message( $error_code );
				}
				if ( isset( $body['access_token'] ) ) {
					return array(
						'status' => true,
						'data'   => $body['access_token'],
					);
				}
			}
			return false;
		} else {
			$observer   = AdminObserver::get_observer();
			$error_code = array(
				'Error'       => 'mo_sps_error_001',
				'Description' => 'Your configuration might not get saved correctly.',
			);
			$observer->mo_sps_display_error_message( $error_code );
		}
	}
	/**
	 * Function to get access token using authorization code grant type.
	 *
	 * @param array   $endpoints This holds array of all the endpoints.
	 * @param array   $config This holds array of azure application client credentials.
	 * @param string  $scope This is vaue of scope to be passed in token endpoint.
	 * @param boolean $send_rftk optinal.This holds if we need to send the refresh token or not.
	 * @return array
	 */
	public function mo_sps_get_access_token_using_authorization_code( $endpoints, $config, $scope, $send_rftk = false ) {
		$mo_client_id     = ( PluginConstants::CID );
		$mo_client_secret = ( PluginConstants::CSEC );
		$server_url       = ( PluginConstants::CONNECT_SERVER_URI );

		$refresh_token = WpWrapper::mo_sps_get_option( PluginConstants::SPS_RFTK );
		$connector     = get_option( PluginConstants::CLOUD_CONNECTOR );

		if ( empty( $refresh_token ) ) {

			$code = WpWrapper::mo_sps_get_option( PluginConstants::SPSAUTHCODE );
			$args = array(
				'body'    => array(
					'grant_type'    => 'authorization_code',
					'client_secret' => $mo_client_secret,
					'client_id'     => $mo_client_id,
					'code'          => $code,
					'redirect_uri'  => $server_url,
				),
				'headers' => array(
					'Content-type' => 'application/x-www-form-urlencoded',
				),
			);
		} else {
			$args = array(
				'body'    => array(
					'grant_type'    => 'refresh_token',
					'client_secret' => $mo_client_secret,
					'client_id'     => $mo_client_id,
					'refresh_token' => $refresh_token,
				),
				'headers' => array(
					'Content-type' => 'application/x-www-form-urlencoded',
				),
			);
		}

		if ( 'personal' === $connector ) {
			$response = wp_remote_post( esc_url_raw( $endpoints['sps_personal_onedrive'] ), $args );
		} else {
			$response = wp_remote_post( esc_url_raw( $endpoints['sps_common_token'] ), $args );
		}

		if ( is_wp_error( $response ) ) {
			return array(
				'status' => false,
				'data'   => array(
					'error'             => 'Request timeout',
					'error_description' => 'Unexpected error occurred! Please check your internet connection and try again.',
				),
			);
		} else {
			$body = json_decode( $response['body'], true );

			if ( isset( $body['refresh_token'] ) ) {
				WpWrapper::mo_sps_set_option( PluginConstants::SPS_RFTK, $body['refresh_token'] );
				$refresh_token = $body['refresh_token'];
				if ( $send_rftk ) {
					$new_res = array(
						'status' => true,
						'data'   => array( 'refresh_token' => $refresh_token ),
					);
					if ( isset( $body['access_token'] ) ) {
						$new_res['data']['access_token'] = $body['access_token'];
					}
					if ( 'personal' === $connector && isset( $body['id_token'] ) ) {
						$new_res['data']['id_token'] = $body['id_token'];
					}
					return $new_res;
				}
			}
			if ( isset( $body['access_token'] ) ) {
				return array(
					'status' => true,
					'data'   => $body['access_token'],
				);
			} elseif ( isset( $body['error'] ) ) {
				return array(
					'status' => false,
					'data'   => $body,
				);
			}
		}

		return array(
			'status' => false,
			'data'   => array(
				'error'             => 'Unexpected Error',
				'error_description' => 'Check your configurations once again',
			),
		);
	}
	/**
	 * Function to execute API calls using GET method.
	 *
	 * @param string $url This contains api endpoint where GET method should be carried out.
	 * @param array  $headers This contains array of headers that to be passed in API call.
	 * @return array
	 */
	public function mo_sps_get_request( $url, $headers ) {
		$args = array(
			'headers' => $headers,
		);

		$response = wp_remote_get( esc_url_raw( $url ), $args );

		if ( is_array( $response ) && ! is_wp_error( $response ) ) {
			$body = json_decode( $response['body'], true );

			if ( empty( $body ) ) {
				return array(
					'status' => false,
					'data'   => array(
						'error'             => 'Unauthorized',
						'error_description' => 'Unexpected error occured',
					),
				);
			} elseif ( isset( $body['error'] ) ) {
				return array(
					'status' => false,
					'data'   => array(
						'error'             => $body['error']['code'],
						'error_description' => $body['error']['message'],
					),
				);
			}

			return array(
				'status' => true,
				'data'   => $body,
			);
		} else {
			return array(
				'status' => false,
				'data'   => array(
					'error'             => 'Request timeout',
					'error_description' => 'Unexpected error occurred! Please check your internet connection and try again.',
				),
			);
		}
	}
}
