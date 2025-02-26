<?php

namespace SixStorageOnline\Api\Callbacks;

use SixStorageOnline\Base\Six_Storage_BaseController;
use SixStorageOnline\Base\Six_Storage_ManagePages;

class Six_Storage_AdminCallbacks extends Six_Storage_BaseController {
	public function tenantPortalConfiguration(): string {
		return require_once $this->six_storage_plugin_path . '/template/admin-menu/index.php';
	}

	public function six_storage_storage_pages() {
		
		 wp_enqueue_style('admin-settings-style', $this->six_storage_plugin_url . 'assets/css/admin-settings-style.css' ,array(), $this->six_storage_plugin_version);
         wp_enqueue_style('materialize', $this->six_storage_plugin_url . 'assets/css/materialize/materialize.css',array(), $this->six_storage_plugin_version);
         wp_enqueue_style('icon', $this->six_storage_plugin_url . 'assets/fonts/icon.css');

		return require_once $this->six_storage_plugin_path . '/template/admin-menu/storage.php';
	}

	public function tenantPortalSettings(): string {
		return require_once $this->six_storage_plugin_path . '/template/admin-menu/settings.php';
	}
	
	public function optionGroup( string $input ) {

		$managePages = new Six_Storage_ManagePages();

		if ( ! isset( $input ) || $input == '' ) {
			return null;
		} else if ( $this->requestPluginActivation( $input ) ) {
			$managePages->Six_Storage_Manage_Pages_register();
		} else {
			//$managePages->six_storage_removePages();
		}

		return $input;
	}

	public function adminSection() {
		echo( '' );
	}

	public function adminConfiguration() {
		$adminEmail = esc_attr( get_option( 'six_storage_online_email_id' ) );
		echo '<input class="six-storage-cc-text-box" required type="email" id="six_storage_online_email_id" name="six_storage_online_email_id" aria-describedby="emailHelp" value="' . esc_attr($adminEmail) . '" placeholder="Enter your Login Email Id">';
	}

	private function requestPluginActivation( string $emailId ) {
		$url = $this->six_storage_api_base_url . 'plugin/register';

		$response = wp_remote_post( esc_url_raw($url), array(
			'method'  => 'POST',
			'timeout' => 45,
			'headers' => array(
				'Authorization' => 'Basic ' . base64_encode( 'sixstorage' . ':' . 'admin' ),
				'Content-Type'  => 'application/json',
				'accept'        => 'application/json'
			),
			'body'    => json_encode( [
				'userName'           => esc_attr( $emailId ),
				'plugInVersion'      => $this->six_storage_plugin_version,
				'requesterIPAddress' => $this->six_storage_client_ip
			] )
		) );

		update_option( 'six_storage_online_api_error', $response, true );

		if ( is_wp_error( $response ) ) {

		} else {
			$response = json_decode( $response['body'], true );
			if ( isset( $response ) && array_key_exists( 'isSuccess', $response ) && $response['isSuccess'] ) {

				if ( array_key_exists( 'result', $response ) && array_key_exists( 'tokenId', $response['result'] )
				     && array_key_exists( 'accessToken', $response['result'] )
				     && $response['result']['tokenId'] != '' && $response['result']['accessToken'] != null ) {
					update_option( 'six_storage_online_api_auth_sid', $response['result']['tokenId'], true );
					update_option( 'six_storage_online_api_auth_access_token', $response['result']['accessToken'], true );
					update_option( 'six_storage_online_api_culture', json_encode( $response['result']['cultureInfo'] ), true );

					return true;
				} else {
					$message = array_key_exists( 'returnMessage', $response ) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Auth token generation failed. Please contact support team.';
				}
			} else {
				$message = array_key_exists( 'returnMessage', $response ) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #3 - Something went wrong. Please contact support team.';
			}
		}

		update_option( 'six_storage_online_api_key', $response->result, true );
		update_option( 'six_storage_online_api_key', $response->result, true );

		return false;
	}


}