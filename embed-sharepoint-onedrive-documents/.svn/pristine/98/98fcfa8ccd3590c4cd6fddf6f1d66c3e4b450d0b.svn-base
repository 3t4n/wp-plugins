<?php
/**
 * Holds the DocumentObserver class instance.
 *
 * @package embed-sharepoint-onedrive-documents\Observer
 */

namespace MoSharePointObjectSync\Observer;

use Error;
use MoSharePointObjectSync\API\Authorization;
use MoSharePointObjectSync\API\Azure;
use MoSharePointObjectSync\Wrappers\PluginConstants;
use MoSharePointObjectSync\Wrappers\WpWrapper;
/**
 * Class to handle DocumentObserver functionalities.
 */
class DocumentObserver {

	/**
	 * Holds the singleton instance of the DocumentObserver.
	 *
	 * @var DocumentObserver
	 */
	private static $obj;
	/**
	 * Returns the singleton instance of the DocumentObserver.
	 * If the instance does not exist, it creates a new one.
	 *
	 * @return DocumentObserver The singleton instance of the DocumentObserver.
	 */
	public static function get_observer() {
		if ( ! isset( self::$obj ) ) {
			self::$obj = new DocumentObserver();
		}
		return self::$obj;
	}
	/**
	 * Function to embed documents
	 *
	 * @return void
	 */
	public function mo_sps_doc_embed() {
		if ( ! check_ajax_referer( 'mo_doc_embed__nonce', 'nonce', false ) ) {
			wp_send_json_error(
				array(
					'err' => 'Permission denied.',
				)
			);
			exit;
		}

		if ( ! is_user_logged_in() ) {
			wp_send_json_error(
				array(
					'err' => 'Permission denied.',
				)
			);
			exit;
		}


		$task = isset( $_POST['task'] ) ? sanitize_text_field( wp_unslash( $_POST['task'] ) ) : '';

		  // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized -- it is an nested array so for the sanitization we are using our custom method.
		$payload = isset( $_POST['payload'] ) ? WpWrapper::mo_sps_sanitize_array_map( wp_unslash( $_POST['payload'] ) ) : '';

		switch ( $task ) {
			case 'mo_sps_load_drives':
				$this->mo_sps_load_all_drives( $payload );
				break;

			case 'mo_sps_load_drive_docs':
				$this->mo_sps_load_drive_docs( $payload );
				break;

			case 'mo_sps_load_folder_docs':
				$this->mo_sps_load_folder_docs( $payload );
				break;

			case 'mo_sps_document_search_observer':
				$this->mo_sps_document_search_observer( $payload );
				break;

			case 'mo_sps_get_file_download_url':
				$this->mo_sps_get_file_download_url( $payload );
				break;

			case 'mo_sps_get_folder_items_using_path':
				$this->mo_sps_get_folder_items_using_path( $payload );
				break;

			case 'mo_sps_get_documents_using_next_link':
				$this->mo_sps_get_documents_using_next_link( $payload );
				break;
		}
	}

	/**
	 * Fetch documents using @odata.nextlink
	 *
	 * @param array $payload contains nextlink to get documents from.
	 * @return void
	 */
	private function mo_sps_get_documents_using_next_link( $payload ) {
		$config    = WpWrapper::mo_sps_get_option( PluginConstants::APP_CONFIG );
		$next_link = ! empty( $payload['nextLink'] ) ? $payload['nextLink'] : '';

		if ( '' === $next_link ) {
			wp_send_json_error( 'Next link not found.', 404 );
		}

		$client   = Azure::get_client( $config );
		$response = $client->mo_sps_get_docs_using_next_link( $next_link );

		$this->process_docs( $response, 'document_sync' );
	}

	/**
	 * Function to load the drive documents
	 *
	 * @param array $payload contains drive details.
	 * @return void
	 */
	private function mo_sps_load_drive_docs( $payload ) {
		$config      = WpWrapper::mo_sps_get_option( PluginConstants::APP_CONFIG );
		$drive_id    = $payload['drive_id'];
		$drive_name  = $payload['drive_name'];
		$breadcrumbs = $payload['breadcrumbs'];
		$is_plugin   = $payload['is_plugin'];

		if ( 'y' === $is_plugin ) {
			WpWrapper::mo_sps_set_option( PluginConstants::BREADCRUMBS, $breadcrumbs );
			WpWrapper::mo_sps_delete_option( PluginConstants::SPS_SEL_FOLDER );
			WpWrapper::mo_sps_delete_option( PluginConstants::SPS_SEL_FOLDER_PATH );
			WpWrapper::mo_sps_set_option( PluginConstants::SPS_SEL_DRIVE_NAME, $drive_name );
			WpWrapper::mo_sps_set_option( PluginConstants::SPS_SEL_DRIVE, $drive_id );
		}

		$client   = Azure::get_client( $config );

		$client->set_endpoint__docs( $drive_id );
		$response = $client->mo_sps_get_drive_docs();

		$this->process_docs( $response, 'document_sync' );
	}
	/**
	 * Function to load the folder documents
	 *
	 * @param array $payload contains folder and drive details.
	 * @return void
	 */
	private function mo_sps_load_folder_docs( $payload ) {
		$config      = WpWrapper::mo_sps_get_option( PluginConstants::APP_CONFIG );
		$drive_id    = $payload['drive_id'];
		$folder_id   = $payload['folder_id'];
		$breadcrumbs = $payload['breadcrumbs'];
		$is_plugin   = $payload['is_plugin'];

		if ( 'y' === $is_plugin ) {
			WpWrapper::mo_sps_set_option( PluginConstants::BREADCRUMBS, $breadcrumbs );
			WpWrapper::mo_sps_set_option( PluginConstants::SPS_SEL_FOLDER, $folder_id );
		}

		$client   = Azure::get_client( $config );

		$client->set_endpoint__folder_items( $drive_id, $folder_id );
		$response = $client->mo_sps_get_all_folder_items();
		$this->process_docs( $response, 'document_sync' );
	}
	/**
	 * Function to get folder items
	 *
	 * @param array $payload contains folder details.
	 * @return void
	 */
	private function mo_sps_get_folder_items_using_path( $payload ) {
		$config      = WpWrapper::mo_sps_get_option( PluginConstants::APP_CONFIG );
		$folder_path = $payload['folder_path'];
		$folder_id   = $payload['folder_id'];
		$breadcrumbs = $payload['breadcrumbs'];
		$is_plugin   = $payload['is_plugin'];

		if ( 'y' === $is_plugin ) {
			WpWrapper::mo_sps_set_option( PluginConstants::BREADCRUMBS, $breadcrumbs );
			WpWrapper::mo_sps_set_option( PluginConstants::SPS_SEL_FOLDER, $folder_id );
			WpWrapper::mo_sps_set_option( PluginConstants::SPS_SEL_FOLDER_PATH, $folder_path );
		}

		$client = Azure::get_client( $config );

		$client->set_endpoint__items_by_path( $folder_path );
		$response = $client->mo_sps_get_folder_items_using_path();

		$this->process_docs( $response, 'document_sync' );
	}
	/**
	 * Function to load the drives
	 *
	 * @param array $payload contains site_id and site_name.
	 * @return void
	 */
	private function mo_sps_load_all_drives( $payload ) {
		$config    = WpWrapper::mo_sps_get_option( PluginConstants::APP_CONFIG );
		$site_id   = $payload['site_id'];
		$site_name = $payload['site_name'];
		WpWrapper::mo_sps_set_option( PluginConstants::SPS_SEL_SITE, $site_name );
		WpWrapper::mo_sps_delete_option( PluginConstants::SPS_SEL_DRIVE );
		WpWrapper::mo_sps_delete_option( PluginConstants::SPS_SEL_FOLDER );
		WpWrapper::mo_sps_delete_option( PluginConstants::SPS_SEL_FOLDER_PATH );
		WpWrapper::mo_sps_delete_option( PluginConstants::SPS_SEL_DRIVE_NAME );
		WpWrapper::mo_sps_delete_option( PluginConstants::BREADCRUMBS );

		$client                 = Azure::get_client( $config );
		$default_drive_response = $client->mo_sps_get_default_drive( $site_id );
		$response               = $client->mo_sps_get_all_drives( $site_id );
		$this->process_docs( $response, 'drive_sync', $default_drive_response );
	}

	/**
	 * Function to process documents
	 *
	 * @param array  $response contains all the drives.
	 * @param string $fc_key it contains feedback key.
	 * @param array  $default_response contains all the drives.
	 * @return void
	 */
	private function process_docs( $response, $fc_key, $default_response = null ) {
		if ( ! empty( $response['status'] ) ) {
			WpWrapper::mo_sps_set_feedback_config( $fc_key, 'success' );
			if ( 'drive_sync' === $fc_key ) {
				$drives = array();
				if ( $default_response && ! empty( $default_response['status'] ) && isset( $default_response['data'] ) ) {
					$drives = $default_response['data'];
				} else {
					if ( isset( $response['data'] ) && isset( $response['data']['value'] ) ) {
						$drives = $response['data']['value'];
						if ( isset( $drives[0] ) ) {
							$drives = $drives[0];
						}
					}
				}
				
				if ( ! empty( $drives ) && isset( $drives['id'] ) ) {
					WpWrapper::mo_sps_set_option( PluginConstants::SPS_SEL_DRIVE, $drives['id'] );
					WpWrapper::mo_sps_set_option( PluginConstants::SPS_SEL_DRIVE_NAME, $drives['name'] );
					$response['data']['default_drive'] = $drives['id'];
				}

				WpWrapper::mo_sps_set_option( PluginConstants::SPS_DRIVES, $response['data']['value'] );
			}
			wp_send_json_success( $response['data'] );
		} else {
			WpWrapper::mo_sps_set_option( 'error', $response );
			if ( 'Forbidden' === $response ) {
				WpWrapper::mo_sps_set_feedback_config( $fc_key, $response );
				wp_send_json_error( 'Forbidden' );
			} elseif ( isset( $response['error'] ) ) {

				if ( $response['error'] ) {
					WpWrapper::mo_sps_set_feedback_config( $fc_key, $response['error'] );
					WpWrapper::mo_sps_set_option( 'error', $response['error'] );
					wp_send_json_error( $response['error'] );
				} else {
					WpWrapper::mo_sps_set_feedback_config( $fc_key, $response['error_description'] );
					WpWrapper::mo_sps_set_option( 'error', $response['error_description'] );
					wp_send_json_error( $response['error_description'] );
				}
			} else {
				wp_send_json_error( $response );
			}
		}
	}
	/**
	 * This function is for the search functionality.
	 *
	 * @param array $payload contains file_id, drive_id and query_text.
	 * @return void
	 */
	private function mo_sps_document_search_observer( $payload ) {

		$query_text = $payload['query_text'];
		$drive_id   = $payload['drive_id'];
		$folder_id  = $payload['folder_id'];

		$config = WpWrapper::mo_sps_get_option( PluginConstants::APP_CONFIG );

		$client    = Azure::get_client( $config );
		$connector = WpWrapper::mo_sps_get_option( PluginConstants::CLOUD_CONNECTOR );

		if ( ! empty( $connector ) ) {

			if ( '' === $folder_id ) {
				if ( ( 'personal' === $connector ) ) {
					$client->set_endpoint__search_personal_drive( $drive_id, $query_text );
					$response = $client->mo_sps_search_through_personal_drive_items();
				} else {
					$client->set_endpoint__search_drive_items( $drive_id, $query_text );
					$response = $client->mo_sps_search_through_drive_items();
				}
			} else {
				if ( ( 'personal' === $connector ) ) {
					$client->set_endpoint__search_personal_folder( $drive_id, $folder_id, $query_text );
					$response = $client->mo_sps_search_through_personal_folder_items();
				} else {
					$client->set_endpoint__search_folder_items( $drive_id, $folder_id, $query_text );
					$response = $client->mo_sps_search_through_folder_items();
				}
			}

			if ( ! empty( $response['status'] ) ) {
				wp_send_json_success( $response['data'] );
			} else {
				$error_code = array(
					'Error'       => empty( $response['data']['error'] ) ? 'Something went wrong.' : $response['data']['error'],
					'Description' => empty( $response['data']['error_description'] ) ? 'Please check your network connection or try again after sometime.' : $response['data']['error_description'],
				);
				wp_send_json_error( $error_code );
			}
		} else {
			$error_code = array(
				'error'             => 'Connection Error',
				'error_description' => 'It seems like there is an error while connecting with your SharePoint/OneDrive Server. Please check your configuration and try to reconnet. ',
			);
			wp_send_json_error( $error_code );
		}
	}
	/**
	 * Function to get an file download url
	 *
	 * @param array $payload contains file_id and drive_id.
	 * @return void
	 */
	private function mo_sps_get_file_download_url( $payload ) {
		$file_id  = $payload['file_id'];
		$drive_id = $payload['drive_id'];

		$config   = WpWrapper::mo_sps_get_option( PluginConstants::APP_CONFIG );
		$client   = Azure::get_client( $config );
		$response = $client->mo_sps_get_file_file_info( $drive_id, $file_id );

		if ( ! empty( $response['status'] ) ) {
			wp_send_json_success( $response['data'] );
		} else {
			$error_code = array(
				'Error'       => $response['data']['error'],
				'Description' => empty( $response['data']['error'] ) ? '' : $response['data']['error_description'],
			);

			wp_send_json_error( $error_code );
		}
	}
	/**
	 * Function to get an file web url
	 *
	 * @return void
	 */
	public function mo_sps_get_file_web_url() {
		if ( ! check_ajax_referer( 'mo_doc_embed__nonce', 'nonce', false ) ) {
			wp_send_json_error(
				array(
					'err' => 'Permission denied.',
				)
			);
			exit;
		}

		if ( ! is_user_logged_in() ) {
			wp_send_json_error(
				array(
					'err' => 'Permission denied.',
				)
			);
			exit;
		}

		$config      = WpWrapper::mo_sps_get_option( PluginConstants::APP_CONFIG );
		$api_handler = Azure::get_client( $config );
		$file_id     = ! empty( $_GET['file_id'] ) ? sanitize_text_field( wp_unslash( $_GET['file_id'] ) ) : '';
		$drive_id    = ! empty( $_GET['drive_id'] ) ? sanitize_text_field( wp_unslash( $_GET['drive_id'] ) ) : '';

		if ( '' !== $file_id && '' !== $drive_id ) {
			$response = $api_handler->mo_sps_get_file_file_info( $drive_id, $file_id );

			if ( ! empty( $response['status'] && ! empty( $response['data'] ) ) ) {
				$web_url = $response['data']['webUrl'];
				// phpcs:ignore WordPress.Security.SafeRedirect.wp_redirect_wp_redirect -- Need to redirect to sharepoint site
				wp_redirect( $web_url );
				exit();
			} else {
					$error_code = array(
						'Error'       => $response['data']['error'],
						'Description' => empty( $response['data']['error'] ) ? '' : $response['data']['error_description'],
					);

					wp_send_json_error( $error_code );
			}
		} else {
			$error_code = array(
				'Error'       => 'Invalid URL...!',
				'Description' => 'Missing drive or file id in URL.',
			);
			wp_send_json_error( $error_code );
		}
	}

}
