<?php
/**
 * Handles SharePoint Graph API Requests and responses .
 *
 * @package embed-sharepoint-onedrive-documents\API
 */

namespace MoSharePointObjectSync\API;

use Error;
use MoSharePointObjectSync\Wrappers\WpWrapper;
use MoSharePointObjectSync\Wrappers\PluginConstants;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Azure
 *
 * @package MoSharePointObjectSync\API
 */
class Azure {


	/**
	 * Holds the Azure class instance.
	 *
	 * @var Azure
	 */
	private static $obj;

	/**
	 * Array of all SharePoint API's endpoints.
	 *
	 * @var array
	 */
	private $endpoints = array();

	/**
	 * 'api.onedrive.com' (for onedrive personal accounts)
	 * or 'graph.microsoft.com' (for sharepoint/onedrive accounts) based on the
	 * PluginConstants::CLOUD_CONNECTOR option.
	 *
	 * @var string
	 */
	private $api_host;

	/**
	 * Array of all azure application configurations like client ID & secret.
	 *
	 * @var array
	 */
	private $config;

	/**
	 * Scope value that should be passed while requesting for token.
	 *
	 * @var string
	 */
	private $scope = 'https://graph.microsoft.com/.default';

	/**
	 * It holds access token value.
	 *
	 * @var string
	 */
	private $access_token;

	/**
	 * Holds the Authorization class instance.
	 *
	 * @var Authorization
	 */
	private $handler;

	/**
	 * Constructor of Azure class to set app configurations and initialize authorization class.
	 *
	 * @param array $config This contains azure ad client credentials.
	 */
	private function __construct( $config ) {
		$this->config  = $config;
		$this->handler = Authorization::get_controller();
	}


	/**
	 * Object instance Azure getter method.
	 *
	 * @param array $config This contains azure ad client credentials.
	 * @return Azure
	 */
	public static function get_client( $config ) {
		if ( ! isset( self::$obj ) ) {
			self::$obj = new Azure( $config );
			self::$obj->set_api_host();
			self::$obj->set_endpoints();
		}

		return self::$obj;
	}

	/**
	 * Sets the API host based on the configured cloud connector.
	 *
	 * This method determines whether to use 'api.onedrive.com' (for personal accounts)
	 * or 'graph.microsoft.com' (for business/enterprise accounts) based on the
	 * PluginConstants::CLOUD_CONNECTOR option.
	 *
	 * @return void
	 */
	private function set_api_host() {
		$connector      = get_option( PluginConstants::CLOUD_CONNECTOR );
		$this->api_host = ( 'personal' === $connector ) ? 'api.onedrive.com' : 'graph.microsoft.com';
	}

	/**
	 * Retrieves the currently set API host.
	 *
	 * @return string The API host URL, either 'api.onedrive.com' or 'graph.microsoft.com'.
	 */
	private function get_api_host() {
		return $this->api_host;
	}

	/**
	 * Function to set the endpoints of SharePoint Graph APIs.
	 *
	 * @return void
	 */
	private function set_endpoints() {
		$tenant_id                                = isset( $this->config['tenant_id'] ) ? $this->config['tenant_id'] : '';
		$this->endpoints['token']                 = 'https://login.microsoftonline.com/' . $tenant_id . '/oauth2/v2.0/token';
		$this->endpoints['sps_common_token']      = 'https://login.microsoftonline.com/common/oauth2/v2.0/token';
		$this->endpoints['sites']                 = 'https://' . $this->get_api_host() . '/v1.0/sites?search=*&$select=id,displayName';
		$this->endpoints['default_site']          = 'https://graph.microsoft.com/v1.0/sites/root';
		$this->endpoints['default_drive']         = 'https://' . $this->get_api_host() . '/v1.0/sites/%s/drive';
		$this->endpoints['file_info']             = 'https://' . $this->get_api_host() . '/v1.0/drives/%s/items/%s';
		$this->endpoints['drives']                = 'https://' . $this->get_api_host() . '/v1.0/sites/%s/drives';
		$this->endpoints['me']                    = 'https://graph.microsoft.com/v1.0/me';
		$this->endpoints['onedrives']             = 'https://graph.microsoft.com/v1.0/me/drives';
		$this->endpoints['sps_personal_onedrive'] = 'https://login.live.com/oauth20_token.srf';
		$this->endpoints['personal_drives']       = 'https://' . $this->get_api_host() . '/v1.0/drives';
	}

	/**
	 * Sets an API endpoint URL for a given key.
	 *
	 * @param string $key The unique identifier for the API endpoint.
	 * @param string $url The API endpoint URL.
	 */
	private function set_endpoint( $key, $url ) {
		$this->endpoints[ $key ] = $url;
	}

	/**
	 * Retrieves the API endpoint URL for a given key.
	 *
	 * @param string $key The unique identifier for the API endpoint.
	 * @return string|null The API endpoint URL if found, otherwise null.
	 */
	private function get_endpoint( $key ) {
		return $this->endpoints[ $key ] ? $this->endpoints[ $key ] : null;
	}

	/**
	 * Sets the endpoint for fetching items by folder path.
	 *
	 * @param string $folder_path The path of the folder.
	 */
	public function set_endpoint__items_by_path( $folder_path ) {
		$url = 'https://' . $this->api_host . '/v1.0/' . $folder_path . '/children?top=' . PluginConstants::SPS_DOCUMENTS_BATCH_SIZE;

		$this->set_endpoint( 'items_by_path', $url );
	}

	/**
	 * Retrieves the endpoint for fetching items by folder path.
	 *
	 * @return string|null The API endpoint URL.
	 */
	public function get_endpoint__items_by_path() {
		return $this->get_endpoint( 'items_by_path' );
	}

	/**
	 * Sets the endpoint for fetching documents in a drive.
	 *
	 * @param string $drive_id The ID of the drive.
	 */
	public function set_endpoint__docs( $drive_id ) {
		$url = 'https://' . $this->get_api_host() . '/v1.0/drives/' . $drive_id . '/root/children?top=' . PluginConstants::SPS_DOCUMENTS_BATCH_SIZE;

		$this->set_endpoint( 'docs', $url );
	}

	/**
	 * Retrieves the endpoint for fetching documents in a drive.
	 *
	 * @return string|null The API endpoint URL.
	 */
	public function get_endpoint__docs() {
		return $this->get_endpoint( 'docs' );
	}

	/**
	 * Sets the endpoint for fetching folder items.
	 *
	 * @param string $drive_id The ID of the drive.
	 * @param string $folder_id The ID of the folder.
	 */
	public function set_endpoint__folder_items( $drive_id, $folder_id ) {
		$url = 'https://' . $this->get_api_host() . '/v1.0/drives/' . $drive_id . '/items/' . $folder_id . '/children?top=' . PluginConstants::SPS_DOCUMENTS_BATCH_SIZE;

		$this->set_endpoint( 'folder_items', $url );
	}

	/**
	 * Retrieves the endpoint for fetching folder items.
	 *
	 * @return string|null The API endpoint URL.
	 */
	public function get_endpoint__folder_items() {
		return $this->get_endpoint( 'folder_items' );
	}

	/**
	 * Sets the endpoint for searching drive items.
	 *
	 * @param string $drive_id The ID of the drive.
	 * @param string $query_string The search query.
	 */
	public function set_endpoint__search_drive_items( $drive_id, $query_string ) {
		$url = 'https://' . $this->get_api_host() . '/v1.0/drives/' . $drive_id . "/root/search(q='" . $query_string . "')?top=" . PluginConstants::SPS_DOCUMENTS_BATCH_SIZE;

		$this->set_endpoint( 'search_drive_items', $url );
	}

	/**
	 * Retrieves the endpoint for searching drive items.
	 *
	 * @return string|null The API endpoint URL.
	 */
	public function get_endpoint__search_drive_items() {
		return $this->get_endpoint( 'search_drive_items' );
	}

	/**
	 * Sets the endpoint for searching items within a folder.
	 *
	 * @param string $drive_id The ID of the drive.
	 * @param string $folder_id The ID of the folder.
	 * @param string $query_string The search query.
	 */
	public function set_endpoint__search_folder_items( $drive_id, $folder_id, $query_string ) {
		$url = 'https://' . $this->get_api_host() . '/v1.0/drives/' . $drive_id . '/items/' . $folder_id . "/search(q='" . $query_string . "')?top=" . PluginConstants::SPS_DOCUMENTS_BATCH_SIZE;

		$this->set_endpoint( 'search_folder_items', $url );
	}

	/**
	 * Retrieves the endpoint for searching items within a folder.
	 *
	 * @return string|null The API endpoint URL.
	 */
	public function get_endpoint__search_folder_items() {
		return $this->get_endpoint( 'search_folder_items' );
	}

	/**
	 * Sets the endpoint for searching personal drive items.
	 *
	 * @param string $drive_id The ID of the drive.
	 * @param string $query_string The search query.
	 */
	public function set_endpoint__search_personal_drive( $drive_id, $query_string ) {
		$url = 'https://api.onedrive.com/v1.0/drives/' . $drive_id . '/view.search?q=' . $query_string . "&\$select=name,size,webUrl,@content.downloadUrl,lastModifiedDateTime,id,folder,file&\$filter=contains(name, '" . $query_string . "')&top=" . PluginConstants::SPS_DOCUMENTS_BATCH_SIZE;

		$this->set_endpoint( 'search_personal_drive', $url );
	}

	/**
	 * Retrieves the endpoint for searching personal drive items.
	 *
	 * @return string|null The API endpoint URL.
	 */
	public function get_endpoint__search_personal_drive() {
		return $this->get_endpoint( 'search_personal_drive' );
	}

	/**
	 * Sets the endpoint for searching items in a personal folder.
	 *
	 * @param string $drive_id The ID of the drive.
	 * @param string $folder_id The ID of the folder.
	 * @param string $query_string The search query.
	 */
	public function set_endpoint__search_personal_folder( $drive_id, $folder_id, $query_string ) {
		$url = 'https://api.onedrive.com/v1.0/drives/' . $drive_id . '/items/' . $folder_id . '/view.search?q=' . $query_string . "&\$select=name,size,webUrl,@content.downloadUrl,lastModifiedDateTime,id,folder,file&\$filter=contains(name, '" . $query_string . "')&top=" . PluginConstants::SPS_DOCUMENTS_BATCH_SIZE;

		$this->set_endpoint( 'search_personal_folder', $url );
	}

	/**
	 * Retrieves the endpoint for searching items in a personal folder.
	 *
	 * @return string|null The API endpoint URL.
	 */
	public function get_endpoint__search_personal_folder() {
		return $this->get_endpoint( 'search_personal_folder' );
	}


	/**
	 * Function to get new access token.
	 *
	 * @param  false $send_rftk default value.
	 * @return string|false
	 */
	public function mo_sps_send_access_token( $send_rftk = false ) {
		$config = WpWrapper::mo_sps_get_option( PluginConstants::APP_CONFIG );

		$type = isset( $config['app_type'] ) ? $config['app_type'] : null;

		if ( 'auto' === $type ) {
			$response = $this->handler->mo_sps_get_access_token_using_authorization_code( $this->endpoints, $this->config, $this->scope, $send_rftk );
		} else {
			$response = $this->handler->mo_sps_get_access_token_using_client_credentials( $this->endpoints, $this->config, $this->scope );
		}

		if ( ! empty( $response['status'] ) ) {
			if ( $send_rftk ) {
				return $response;
			} else {
				$this->access_token = $response['data'];
			}
		}

		if ( $this->access_token ) {
			return $this->access_token;
		}
	}


	/**
	 * Function to get users one drives.
	 *
	 * @return mixed
	 */
	public function mo_sps_get_onedrives() {
		$access_token = $this->mo_sps_send_access_token();
		if ( ! $access_token ) {
			return $this->access_token;
		}

		$args = array(
			'Authorization' => 'Bearer ' . $access_token,
		);

		$response = $this->handler->mo_sps_get_request( sprintf( $this->endpoints['onedrives'] ), $args );

		return $response;
	}


	/**
	 * Function to get users personal drives.
	 *
	 * @return mixed
	 */
	public function mo_sps_get_personal_onedrive() {
		$access_token = $this->mo_sps_send_access_token();
		if ( ! $access_token ) {
			return $this->access_token;
		}

		$args = array(
			'Authorization' => 'Bearer ' . $access_token,
		);

		$response = $this->handler->mo_sps_get_request( sprintf( $this->endpoints['personal_drives'] ), $args );
		return $response;
	}


	/**
	 * Function to process the access token from automatic connection.
	 *
	 * @return array
	 */
	public function mo_sps_process_tokens_for_auto_connection() {
		$response = $this->mo_sps_send_access_token( true );
		if ( $response['status'] ) {
			if ( isset( $response['data']['refresh_token'] ) ) {
				$this->config['refresh_token'] = $response['data']['refresh_token'];
			}

			if ( 'personal' === $this->config['connector'] ) {
				if ( isset( $response['data']['id_token'] ) ) {
					$jwt_object = json_decode( base64_decode( str_replace( '_', '/', str_replace( '-', '+', explode( '.', $response['data']['id_token'] )[1] ) ) ), true );  //phpcs:ignore WordPress.PHP.DiscouragedPHPFunctions.obfuscation_base64_decode -- base64 decoded the encoded access token value.
					update_option( 'mo_sps_user_email_automatic_connection', $jwt_object['email'] );
					$this->config['upn'] = isset( $jwt_object['email'] ) ? $jwt_object['email'] : '';
				}
			} else {
				if ( isset( $response['data']['access_token'] ) ) {
					$this->access_token = $response['data']['access_token'];
				} elseif ( isset( $response['data'] ) ) {
					$this->access_token = $response['data'];
				}

				$access_token_array = explode( '.', $this->access_token );
				$access_token_1     = isset( $access_token_array[1] ) ? $access_token_array[1] : '';
				$jwt_object         = json_decode( base64_decode( str_replace( '_', '/', str_replace( '-', '+', $access_token_1 ) ) ), true ); //phpcs:ignore WordPress.PHP.DiscouragedPHPFunctions.obfuscation_base64_decode -- base64 decoded the encoded access token value.
				update_option( 'mo_sps_user_upn_automatic_connection', $jwt_object['upn'] );
				$given_name  = isset( $jwt_object['given_name'] ) ? $jwt_object['given_name'] : '';
				$family_name = isset( $jwt_object['family_name'] ) ? $jwt_object['family_name'] : '';
				$name        = $given_name . ' ' . $family_name;
				update_option( 'mo_sps_user_name_automatic_connection', $name );
				$this->config['upn'] = isset( $jwt_object['upn'] ) ? $jwt_object['upn'] : '';
			}
		}

		return $this->config;
	}

	/**
	 * Function to get all SharePoint sites.
	 *
	 * @return array|boolean
	 */
	public function mo_sps_get_all_sites() {
		$access_token = $this->mo_sps_send_access_token();
		if ( ! $access_token ) {
			return $this->access_token;
		}

		$args = array(
			'Authorization' => 'Bearer ' . $access_token,
		);

		$response = $this->handler->mo_sps_get_request( $this->endpoints['sites'], $args );
		return $response;
	}


	/**
	 * Function to get default SharePoint site.
	 *
	 * @return mixed
	 */
	public function mo_sps_get_default_site() {
		$access_token = $this->mo_sps_send_access_token();
		if ( ! $access_token ) {
			return $this->access_token;
		}

		$args = array(
			'Authorization' => 'Bearer ' . $access_token,
		);

		$response = $this->handler->mo_sps_get_request( $this->endpoints['default_site'], $args );
		return $response;
	}


	/**
	 * Function to get all drives
	 *
	 * @param string $site_id SharePoint site ID.
	 *
	 * @return mixed
	 */
	public function mo_sps_get_all_drives( $site_id ) {
		$access_token = $this->mo_sps_send_access_token();
		if ( ! $access_token ) {
			return $this->access_token;
		}

		$args = array(
			'Authorization' => 'Bearer ' . $access_token,
		);

		$response = $this->handler->mo_sps_get_request( sprintf( $this->endpoints['drives'], $site_id ), $args );

		return $response;
	}


	/**
	 * Function to get default drive
	 *
	 * @param string $site_id SharePoint site ID.
	 *
	 * @return mixed
	 */
	public function mo_sps_get_default_drive( $site_id ) {
		$access_token = $this->mo_sps_send_access_token();
		if ( ! $access_token ) {
			return $this->access_token;
		}

		$args = array(
			'Authorization' => 'Bearer ' . $access_token,
		);

		$response = $this->handler->mo_sps_get_request( sprintf( $this->endpoints['default_drive'], $site_id ), $args );

		return $response;
	}


	/**
	 * Function to get the documents in the drive
	 *
	 * @return mixed
	 */
	public function mo_sps_get_drive_docs() {
		$access_token = $this->mo_sps_send_access_token();
		if ( ! $access_token ) {
			return $this->access_token;
		}

		$args = array(
			'Authorization' => 'Bearer ' . $access_token,
		);

		$response = $this->handler->mo_sps_get_request( $this->get_endpoint__docs(), $args );

		return $response;
	}


	/**
	 * Function to get the items in specific drive and folder.
	 *
	 * @return mixed
	 */
	public function mo_sps_get_all_folder_items() {
		$access_token = $this->mo_sps_send_access_token();
		if ( ! $access_token ) {
			return $this->access_token;
		}

		$args     = array(
			'Authorization' => 'Bearer ' . $access_token,
		);
		$response = $this->handler->mo_sps_get_request( $this->get_endpoint__folder_items(), $args );
		return $response;
	}

	/**
	 * Function to call onedrive personal's search api and return the api response.
	 *
	 * @return mixed $response onedrive personal's search api response.
	 */
	public function mo_sps_search_through_personal_drive_items() {
		$access_token = $this->mo_sps_send_access_token();

		if ( ! $access_token ) {
			return $this->access_token;
		}

		$args = array(
			'Authorization' => 'Bearer ' . $access_token,
		);

		$response = $this->handler->mo_sps_get_request( $this->get_endpoint__search_personal_drive(), $args );

		return $response;
	}

	/**
	 * Function to call sharepoint/onedrive search api and return the api response.
	 *
	 * @return mixed $response sharepoint/onedrive search api response.
	 */
	public function mo_sps_search_through_drive_items() {
		$access_token = $this->mo_sps_send_access_token();

		if ( ! $access_token ) {
			return $this->access_token;
		}

		$args = array(
			'Authorization' => 'Bearer ' . $access_token,
		);

		$response = $this->handler->mo_sps_get_request( $this->get_endpoint__search_drive_items(), $args );

		return $response;
	}


	/**
	 * Function to call onedrive personal's folder search api and return the api response.
	 *
	 * @return mixed
	 */
	public function mo_sps_search_through_personal_folder_items() {
		$access_token = $this->mo_sps_send_access_token();

		if ( ! $access_token ) {
			return $this->access_token;
		}

		$args = array(
			'Authorization' => 'Bearer ' . $access_token,
		);

		$response = $this->handler->mo_sps_get_request( $this->get_endpoint__search_personal_folder(), $args );

		return $response;
	}

	/**
	 * Function to call sharepoint/onedrive search api and return the api response.
	 *
	 * @return mixed
	 */
	public function mo_sps_search_through_folder_items() {
		$access_token = $this->mo_sps_send_access_token();

		if ( ! $access_token ) {
			return $this->access_token;
		}

		$args = array(
			'Authorization' => 'Bearer ' . $access_token,
		);

		$response = $this->handler->mo_sps_get_request( $this->get_endpoint__search_folder_items(), $args );

		return $response;
	}


	/**
	 * Function to get SharePoint file url
	 *
	 * @param string $drive_id Drive ID of the site.
	 * @param string $file_id File ID of the file.
	 *
	 * @return mixed
	 */
	public function mo_sps_get_file_file_info( $drive_id, $file_id ) {
		$access_token = $this->mo_sps_send_access_token();
		if ( ! $access_token ) {
			return $this->access_token;
		}

		$args = array(
			'Authorization' => 'Bearer ' . $access_token,
		);

		$response = $this->handler->mo_sps_get_request( sprintf( $this->endpoints['file_info'], $drive_id, $file_id ), $args );

		return $response;
	}


	/**
	 * Function to get the user
	 *
	 * @return mixed
	 */

	public function mo_sps_get_my_user() {
		$access_token = $this->mo_sps_send_access_token();
		if ( ! $access_token ) {
			return $this->access_token;
		}

		$args = array(
			'Authorization' => 'Bearer ' . $access_token,
		);

		$response = $this->handler->mo_sps_get_request( sprintf( $this->endpoints['me'] ), $args );

		return $response;
	}


	/**
	 * Function to get folder items from path
	 *
	 * @return mixed
	 */
	public function mo_sps_get_folder_items_using_path() {
		$access_token = $this->mo_sps_send_access_token();
		if ( ! $access_token ) {
			return $this->access_token;
		}

		$args     = array(
			'Authorization' => 'Bearer ' . $access_token,
		);
		$endpoint = $this->get_endpoint__items_by_path();

		$this->manual_escape_url( $endpoint );
		$response = $this->handler->mo_sps_get_request( $endpoint, $args );
		return $response;
	}

	/**
	 * Call next link to get the documents.
	 *
	 * @param String $next_link url to get next documents.
	 * @return mixed response fetced from the next link
	 */
	public function mo_sps_get_docs_using_next_link( $next_link ) {
		$access_token = $this->mo_sps_send_access_token();
		if ( ! $access_token ) {
			return $this->access_token;
		}

		$args = array(
			'Authorization' => 'Bearer ' . $access_token,
		);

		$response = $this->handler->mo_sps_get_request( $next_link, $args );

		return $response;
	}

	/**
	 * Function to escabe special characters from URL without default functions
	 *
	 * @param string $url url endpoint to fetch folder content.
	 */
	private function manual_escape_url( &$url ) {
		$characters_to_be_replaced = array(
			'{' => '%7B',
			' ' => '%20',
			'[' => '%5B',
			'}' => '%7D',
			']' => '%5D',
			'`' => '%60',
			'&' => '%26',
			"'" => '%27',
			'^' => '%5E',
		);
		foreach ( $characters_to_be_replaced as $char => $value ) {
			$url = str_replace( $char, $value, $url );
		}
	}
}
