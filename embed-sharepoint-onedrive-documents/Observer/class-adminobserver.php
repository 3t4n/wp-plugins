<?php
/**
 * Handles various administrative actions related to the plugin.
 *
 * @package embed-sharepoint-onedrive-documents/Observer
 */

namespace MoSharePointObjectSync\Observer;

use MoSharePointObjectSync\API\Azure;
use MoSharePointObjectSync\API\Sharepoint;

use MoSharePointObjectSync\Wrappers\PluginConstants;
use MoSharePointObjectSync\Wrappers\WpWrapper;
use MoSharePointObjectSync\API\CustomerMOSPS;

/**
 * Class AdminObserver
 *
 * This class handles various administrative actions related to the plugin.
 */
class AdminObserver {

	/**
	 * Integration titles array.
	 *
	 * @var array
	 */
	public static $integration_title = array(
		'WooCommerce' => 'WooCommerce',
		'BuddyPress'  => 'BuddyPress',
		'MemberPress' => 'MemberPress',
		'ACF'         => 'ACF',
		'AzureAd'     => 'AzureAd',
		'LearnDash'   => 'LearnDash',
	);

	/**
	 * Singleton instance of AdminObserver.
	 *
	 * @var AdminObserver|null
	 */
	private static $obj;

	/**
	 * Gets the singleton instance of AdminObserver.
	 *
	 * @return AdminObserver
	 */
	public static function get_observer() {
		if ( ! isset( self::$obj ) ) {
			self::$obj = new AdminObserver();
		}
		return self::$obj;
	}

	/**
	 * Handles various administrative actions based on request parameters.
	 */
	public function mo_sps_admin_observer() {
		if ( isset( $_REQUEST['mo_shp_code'] ) ) {
			$this->mo_sps_get_auth_code();
		}
		if ( isset( $_REQUEST['option'] ) && 'testSPSApp' === $_REQUEST['option'] ) {
			if ( ! is_user_logged_in() || ! current_user_can( 'manage_options' ) ) {
				return;
			}
			$config              = WpWrapper::mo_sps_get_option( PluginConstants::APP_CONFIG );
			$config              = ! empty( $config ) ? $config : array();
			$connector           = WpWrapper::mo_sps_get_option( PluginConstants::CLOUD_CONNECTOR );
			$config['app_type']  = isset( $_REQUEST['type'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['type'] ) ) : 'manual';
			$config['connector'] = $connector;
			WpWrapper::mo_sps_set_option( PluginConstants::APP_CONFIG, $config );
			$this->mo_sps_scope_verification_prompt( $config['app_type'], $config['connector'] );
		}

		if ( isset( $_REQUEST['option'] ) && 'mo_sps_verify_scope_permissions' === $_REQUEST['option'] ) {
			check_admin_referer( 'mo_sps_verify_scope_permissions' );
			$config    = WpWrapper::mo_sps_get_option( PluginConstants::APP_CONFIG );
			$type      = ! empty( $config['app_type'] ) ? $config['app_type'] : 'manual';
			$connector = ! empty( $config['connector'] ) ? $config['connector'] : 'manual';

			WpWrapper::mo_sps_set_option( PluginConstants::APP_CONFIG, $config );
			WpWrapper::mo_sps_delete_option( PluginConstants::SPS_SEL_SITE );
			WpWrapper::mo_sps_delete_option( PluginConstants::SPS_DRIVES );
			WpWrapper::mo_sps_delete_option( PluginConstants::SPS_SEL_DRIVE );
			WpWrapper::mo_sps_delete_option( PluginConstants::SPS_SEL_DRIVE_NAME );
			WpWrapper::mo_sps_delete_option( PluginConstants::SPS_SEL_FOLDER );
			WpWrapper::mo_sps_delete_option( PluginConstants::SPS_SEL_FOLDER_PATH );
			WpWrapper::mo_sps_delete_option( PluginConstants::BREADCRUMBS );

			if ( 'auto' === $type ) {
				if ( isset( $connector ) && 'personal' === $connector ) {
					$this->mo_sps_connect_to_onedrive_personal();
				} else {
					$this->mo_sps_connect_to_sharepoint_and_onedrive();
				}
			} else {
				WpWrapper::mo_sps_delete_option( PluginConstants::SPS_RFTK );
				$client       = Azure::get_client( $config );
				$access_token = $client->mo_sps_send_access_token();

				if ( ! empty( $access_token ) ) {
					// Parsing access token to check for permission.
					$access_token_array = explode( '.', $access_token );
					$payload            = $access_token_array[1];
					$jwt_object         = json_decode( base64_decode( str_replace( '_', '/', str_replace( '-', '+', $payload ) ) ), true );

					$have_permission = false;
					// All permissions assigned in the access token.
					if ( array_key_exists( 'roles', $jwt_object ) ) {
						$token_permissions = $jwt_object['roles'];

						// Required permissions.
						$required_permissions = array( 'Sites.Read.All', 'Sites.ReadWrite.All' );

						foreach ( $required_permissions as $permission ) {
							if ( in_array( $permission, $token_permissions, true ) ) {
								$have_permission = true;
								break;
							}
						}
					}

					if ( ! $have_permission ) {
						$error_code = array(
							'Error'       => 'Access Denied',
							'Description' => 'Insufficient permissions to fetch the SharePoint sites',
							'Resolution'  => 'Generally this issue occurs if you have not granted <b>Sites.Read.All</b> or permission to your configured application in Microsoft Azure AD/Entra ID. To resolve please add the required permission. Refer to the provided <a href="https://plugins.miniorange.com/microsoft-sharepoint-integration-for-wordpress?type=manual#step1" target="_blank"><b>Link</b></a> for detailed steps.',
						);

						if ( in_array( 'Sites.Selected', $token_permissions, true ) ) {
							$error_code = array(
								'Error'       => 'Access Denied',
								'Description' => 'Limited access (Sites.Selected)',
								'Resolution'  => 'Generally this issue occurs if you have granted <b>Sites.Selected</b> permission to your configured application in Microsoft Azure AD/Entra ID. To resolve this you need to configure the URL of that specific site in plugin. Please contact our support to resolve this issue.',
							);
						}
						$this->mo_sps_display_error_message( $error_code );
					}
				}

				$feedback_config                       = WpWrapper::mo_sps_get_option( PluginConstants::FEEDBACK_CONFIG );
				$feedback_config['test_configuration'] = 'success';
				WpWrapper::mo_sps_set_option( 'mo_sps_feedback_config', $feedback_config );

				$response = $client->mo_sps_get_all_sites();

				if ( ! empty( $response['status'] ) ) {
					$this->mo_sps_load_default_site_and_drive( $response );
					WpWrapper::mo_sps_set_option( PluginConstants::SPS_SITES, $response['data']['value'] );
					$this->mo_sps_display_test_attributes();
				} else {
					$error_code = array(
						'Error'       => empty( $response['data']['error'] ) ? '' : $response['data']['error'],
						'Description' => empty( $response['data']['error_description'] ) ? 'Error occured while fetching SharePoint sites.' : $response['data']['error_description'],
					);
					$this->mo_sps_display_error_message( $error_code );
				}
			}
		}

		if ( isset( $_REQUEST['option'] ) && 'mo_sps_site_refresh' === $_REQUEST['option'] ) {
			$config = WpWrapper::mo_sps_get_option( PluginConstants::APP_CONFIG );

			WpWrapper::mo_sps_delete_option( PluginConstants::SPS_DRIVES );
			WpWrapper::mo_sps_delete_option( PluginConstants::SPS_SEL_DRIVE );
			WpWrapper::mo_sps_delete_option( PluginConstants::SPS_SEL_DRIVE_NAME );
			WpWrapper::mo_sps_delete_option( PluginConstants::SPS_SEL_FOLDER );
			WpWrapper::mo_sps_delete_option( PluginConstants::SPS_SEL_SITE );
			WpWrapper::mo_sps_delete_option( PluginConstants::BREADCRUMBS );

			$client   = Azure::get_client( $config );
			$response = $client->mo_sps_get_all_sites();

			if ( ! empty( $response['status'] ) ) {
				$this->mo_sps_load_default_site_and_drive( $response );
			}
		}

		if ( isset( $_REQUEST['option'] ) && 'sps_automatic_app_status' === $_REQUEST['option'] ) {
			$this->mo_sps_automatic_connection();
		}

		if ( isset( $_REQUEST['option'] ) && 'mo_sps_contact_us_query_option' === $_REQUEST['option'] ) {
			$submited = $this->mo_sps_send_support_query();
			if ( ! is_null( $submited ) ) {
				if ( false === $submited ) {
					WpWrapper::mo_sps__show_error_notice( esc_html__( 'Your query could not be submitted. Please try again.', 'embed-sharepoint-onedrive-documents' ) );
				} else {
					WpWrapper::mo_sps__show_success_notice( esc_html__( 'Thanks for getting in touch! We shall get back to you shortly.', 'embed-sharepoint-onedrive-documents' ) );
				}
			}
		}



		if ( isset( $_REQUEST['option'] ) && 'mo_sps_feedback' === $_REQUEST['option'] ) {
			$sent     = isset( $_REQUEST['miniorange_feedback_submit'] );
			$skip     = isset( $_REQUEST['miniorange_skip_feedback'] );
			$submited = $this->mo_sps_send_email_alert( $skip, $sent );
			if ( json_last_error() === JSON_ERROR_NONE ) {
				if ( is_array( $submited ) && array_key_exists( 'status', $submited ) && 'ERROR' === $submited['status'] ) {
					WpWrapper::mo_sps__show_error_notice( esc_html( $submited['message'] ) );

				} elseif ( false === $submited ) {
						WpWrapper::mo_sps__show_error_notice( esc_html__( 'Error while submitting the query.', 'embed-sharepoint-onedrive-documents' ) );
				}
			}

			include_once ABSPATH . 'wp-admin/includes/plugin.php';

			deactivate_plugins( MO_SPS_PLUGIN_FILE );
			wp_safe_redirect( self_admin_url( 'plugins.php?deactivate=true' ) );
		}
	}

	/**
	 * Prompts the user to verify the required scopes and permissions.
	 *
	 * @param string $type      The application type.
	 * @param string $connector The connector type.
	 */
	private function mo_sps_scope_verification_prompt( $type, $connector ) {
		$resource_server = 'SharePoint Online';
		if ( 'onedrive' === $connector ) {
			$resource_server = 'OneDrive Business';
		} elseif ( 'personal' === $connector ) {
			$resource_server = 'OneDrive Personal';
		}

		$scopes         = array();
		$justifications = array();

		if ( 'sharepoint' === $connector || 'onedrive' === $connector ) {
			array_push( $scopes, 'sites.read.all' );
			array_push( $justifications, 'Allow the plugin to fetch all of your files from ' . $resource_server . '.' );
		}

		if ( 'auto' === $type ) {
			if ( 'personal' === $connector ) {
				array_push( $scopes, 'onedrive.readwrite' );
				array_push( $justifications, 'Allow the plugin to fetch, and edit files from your ' . $resource_server . '.' );

				array_push( $scopes, 'openid' );
				array_push( $justifications, 'Allow the plugin to get id_token to view your public information, such as your name and email. Your name and email will be displayed for easy account identification.' );
			}

			array_push( $scopes, 'offline_access' );
			array_push( $justifications, 'Allow the plugin to fetch the content on the behalf of user without authenticating them every time while previewing.' );

			if ( 'sharepoint' === $connector || 'onedrive' === $connector ) {
				array_push( $scopes, 'user.read' );
				array_push( $justifications, 'Allow the plugin to view your public information such as your name and email. This information will be used in the plugin settings for easy account identification and categorization of files.' );
			}
		}
		?>
		<form class="mo_sps_ajax_submit_form mo-ms-scope-verification-form" action="" method="post">
			<input type="hidden" name="option" value="mo_sps_verify_scope_permissions">
			<?php wp_nonce_field( 'mo_sps_verify_scope_permissions' ); ?>
			<div style="display:flex; flex-direction:column; height: -webkit-fill-available; justify-content:space-between;">
				<div class="mo-ms-information-container-div">
					<div style="display:flex; align-items:center;gap:8px;justify-content:center;">
						<img width="24px" height="24px" src="<?php echo esc_url( MO_SPS_PLUGIN_URL . '/images/miniorange_logo.png' ); ?>"/>
						<div class="mo-ms-about-data-security-div">Data Security with miniOrange</div>
					</div>
					<div style="color: #232424;padding: 8px 0px;text-align:center;font-family:sans-serif;">Our plugin is designed to be compliant with relevant data <a href="https://faq.miniorange.com/knowledgebase/does-the-plugin-comply-with-relevant-data-security-standards" target="_blank">security standards</a>, such as GDPR and HIPAA. All communication occurs solely between your server and the <?php echo esc_html( $resource_server ); ?> server. This communication is encrypted and does not pass through miniorange's server. We neither collect nor have access to your personal data.</div>
					<div class="mo-ms-scope-verification-divider"></div>
				</div>

				<div class="mo-ms-information-main-container-div">
					<div class="mo-ms-information-container-div">
						<div style="font-size:20px;font-weight:600;font-family:sans-serif;color: #414141;">Required Permissions</div>
						<div style="color: #232424;padding: 10px 0;text-align:center;">To showcase your content saved on <?php echo esc_html( $resource_server ); ?>, you need to authorize it using your Microsoft account. This process will prompt you to give the permission for scopes listed below.</div>
					</div>
					<?php
					$iteration_size = count( $scopes );
					for ( $i = 0; $i < $iteration_size; $i++ ) {
						$this->mo_sps_show_scope_and_justification( $scopes[ $i ], $justifications[ $i ] );
					}
					?>
				</div>
				<div style="display:flex;align-items:center;justify-content:center;margin-top:20px;">
					<input type="button" class="mo-ms-tab-content-button" value="Close" onclick="close_window();">
					<input type="submit" style="margin-left:8px;" class="mo-ms-tab-content-button" value="Proceed">
				</div>
			</div>
		</form>
		<style>
			.mo-ms-scope-verification-divider{
				width: 40%;
				margin: 0 auto;
				border: 2px solid #ccc;
			}
			.mo-ms-information-main-container-div{
				display: flex;
				flex-direction: column;
				gap: 15px;
				padding: 4px 10px;
				padding-top: 15px;
				background: white;
			}
			.mo-ms-scope-verification-form{
				background: #fff;
				padding: 10px 10px;
			}
			.mo-ms-information-container-div{
				display: flex;
				flex-direction: column;
				justify-content: center;
				align-items: center;
				gap: 3px;
			}
			.mo-ms-about-data-security-div{
				font-size: 22px;
				font-weight: 600;
				font-family: sans-serif;
				display: flex;
				align-items: center;
			}
			.mo-ms-tab-content-button{
				box-sizing: border-box;
				height: 28px;
				font-size: 15px;
				line-height: 20px;
				font-weight: 600;
				cursor: pointer;
				border-width: 1px;
				border-style: solid;
				margin: 0;
				background-color: #1B9BA1;
				border-color: #1B9BA1;
				color: white;
				fill: white;
				padding: 0px 20px 0px 20px;
				border-radius: 4px;
			}
			.mo-ms-tab-content-button:hover{
				background-color: #048387 ;
				border-color: #048387;
			}
		</style>
		<script>
			function close_window() {self.close();}  
		</script>
		<?php
		exit();
	}

	/**
	 * Display the scope and justification.
	 *
	 * @param string $scope The scope to display.
	 * @param string $justification The justification to display.
	 */
	private function mo_sps_show_scope_and_justification( $scope, $justification ) {
		?>
	<div class="mo-ms-scope-main-container-div">
		<div class="mo-ms-scope-div"><?php echo esc_html( $scope ); ?></div>
		<div class="mo-ms-justification-div"><?php echo esc_html( $justification ); ?></div>
	</div>
	<style>
		.mo-ms-scope-main-container-div {
			display: flex;
			flex-direction: column;
			justify-content: center;
			border: 2px solid #ccc;
			width: 98%;
			padding: 8px;
			align-items: center;
			border-radius: 8px;
		}
		.mo-ms-scope-div {
			padding: 4px;
			color: #e20000;
			background-color: #eee;
			width: fit-content;
			font-family: sans-serif;
		}
		.mo-ms-justification-div {
			color: #232424;
			padding: 10px 0;
			text-align: center;
		}
	</style>
		<?php
	}

	/**
	 * Automatically connect to the service.
	 */
	private function mo_sps_automatic_connection() {
		$config = WpWrapper::mo_sps_get_option( PluginConstants::APP_CONFIG );

		$api_handler = Azure::get_client( $config );
		$config      = $api_handler->mo_sps_process_tokens_for_auto_connection();

		if ( 'personal' !== $config['connector'] ) {
			$user = $api_handler->mo_sps_get_my_user();
			if ( $user['status'] ) {
				$config['name']  = isset( $user['data']['displayName'] ) ? $user['data']['displayName'] : '';
				$config['upn']   = isset( $user['data']['userPrincipalName'] ) ? $user['data']['userPrincipalName'] : '';
				$config['email'] = isset( $user['data']['mail'] ) ? $user['data']['mail'] : '';
			}
		}

		$config = $api_handler->mo_sps_process_tokens_for_auto_connection();
		WpWrapper::mo_sps_set_option( PluginConstants::APP_CONFIG, $config );

		$api_handler = Azure::get_client( $config );

		switch ( $config['connector'] ) {
			case 'personal':
				$this->mo_sps_onedrive_personal_response( $api_handler->mo_sps_get_personal_onedrive() );
				break;
			case 'onedrive':
				$this->mo_sps_process_onedrive_response( $api_handler->mo_sps_get_onedrives() );
				break;
			default:
				$this->mo_sps_process_sharepoint_response( $api_handler->mo_sps_get_all_sites() );
				break;
		}
	}

	/**
	 * Process the SharePoint response.
	 *
	 * @param array $response The response from SharePoint.
	 */
	private function mo_sps_process_sharepoint_response( $response ) {
		$this->mo_sps_load_default_site_and_drive( $response );
		if ( ! empty( $response['status'] ) ) {
			WpWrapper::mo_sps_set_option( PluginConstants::SPS_SITES, $response['data']['value'] );
			$this->mo_sps_show_success_message_for_test_connection( $response['data']['value'] );
		} else {
			$error_code = array(
				'Error'       => $response['data']['error'],
				'Description' => empty( $response['data']['error'] ) ? '' : $response['data']['error_description'],
			);
			$this->mo_sps_display_error_message( $error_code );
		}
	}

	/**
	 * Process the OneDrive response.
	 *
	 * @param array $response The response from OneDrive.
	 */
	private function mo_sps_process_onedrive_response( $response ) {
		$this->mo_sps_load_default_onedrive( $response );
		if ( ! empty( $response['status'] ) ) {
			WpWrapper::mo_sps_set_option( PluginConstants::SPS_DRIVES, $response['data']['value'] );
			$this->mo_sps_show_success_message_for_test_connection( $response['data']['value'] );
		} else {
			$error_code = array(
				'Error'       => $response['data']['error'],
				'Description' => empty( $response['data']['error'] ) ? '' : $response['data']['error_description'],
			);
			$this->mo_sps_display_error_message( $error_code );
		}
	}

	/**
	 * Process the OneDrive personal response.
	 *
	 * @param array $response The response from OneDrive personal.
	 */
	private function mo_sps_onedrive_personal_response( $response ) {
		$this->mo_sps_load_default_onedrive( $response );
		if ( ! empty( $response['status'] ) ) {
			$drive_name = array(
				'name' => 'Personal Onedrive',
			);
			foreach ( $response['data']['value'] as &$subarray ) {
				$id_index = array_search( 'id', array_keys( $subarray ), true );
				$subarray = array_merge(
					array_slice( $subarray, 0, $id_index + 1 ),
					$drive_name,
					array_slice( $subarray, $id_index + 1 )
				);
			}
			if ( ! empty( $response['status'] ) ) {
				$all_drives = $this->mo_sps_process_drives( $response['data'] );
				WpWrapper::mo_sps_set_option( PluginConstants::SPS_DRIVES, $all_drives );
			} else {
				$error_code = array(
					'Error'       => $response['data']['error'],
					'Description' => empty( $response['data']['error'] ) ? '' : $response['data']['error_description'],
				);

				wp_send_json_error( $error_code );
			}
			WpWrapper::mo_sps_set_option( PluginConstants::SPS_DRIVES, $response['data']['value'] );
			$this->mo_sps_show_success_message_for_test_connection( $response['data']['value'] );
		} else {
			$error_code = array(
				'Error'       => $response['data']['error'],
				'Description' => empty( $response['data']['error'] ) ? '' : $response['data']['error_description'],
			);
			$this->mo_sps_display_error_message( $error_code );
		}
	}

	/**
	 * Process the drives from the result.
	 *
	 * @param array $result The result containing drives.
	 * @return array Processed drives.
	 */
	public static function mo_sps_process_drives( $result ) {
		if ( ! isset( $result['value'] ) ) {
			return array();
		}

		$res    = $result['value'];
		$filter = array( 'id', 'name', 'webUrl', 'driveType' );

		$output = array();

		foreach ( $res as $key => $drive ) {
			$temp_output = array();
			foreach ( $drive as $prop => $val ) {
				if ( in_array( $prop, $filter, true ) ) {
					$temp_output[ $prop ] = $val;
				}
			}

			$output[] = $temp_output;
		}
		return $output;
	}

	/**
	 * Connect to SharePoint and OneDrive.
	 */
	private function mo_sps_connect_to_sharepoint_and_onedrive() {
		$customer_tenant_id = 'common';
		$mo_client_id       = PluginConstants::CID;

		$scope    = 'offline_access user.read Sites.Read.All'; // offline_access to get refresh token, site.read.all to get all sites and documents.
		$host_url = 'https://login.microsoftonline.com/' . $customer_tenant_id . '/oauth2/v2.0/authorize?prompt=select_account'; // prompt=select_account will prompt every time for account selection.
		$url      = add_query_arg(
			array(
				'response_type' => 'code',
				'client_id'     => $mo_client_id,
				'scope'         => $scope,
				'redirect_uri'  => PluginConstants::CONNECT_SERVER_URI,
				'state'         => add_query_arg( array( 'conn' => 'mo_shp_auto' ), home_url() ),
			),
			$host_url
		);
		wp_safe_redirect( $url );
		exit;
	}

	/**
	 * Connect to OneDrive personal.
	 */
	private function mo_sps_connect_to_onedrive_personal() {
		$mo_client_id = PluginConstants::CID;

		$scope    = 'openid offline_access onedrive.readwrite'; // openid to get id token, offline_access to get refresh token, onedrive.readwrite to get personal drive and documents.
		$host_url = 'https://login.live.com/oauth20_authorize.srf?prompt=select_account'; // prompt=select_account will prompt every time for account selection.
		$url      = add_query_arg(
			array(
				'response_type' => 'code',
				'client_id'     => $mo_client_id,
				'scope'         => $scope,
				'redirect_uri'  => PluginConstants::CONNECT_SERVER_URI,
				'state'         => add_query_arg( array( 'conn' => 'mo_shp_auto' ), home_url() ),
			),
			$host_url
		);

		wp_safe_redirect( $url );
		exit;
	}

	/**
	 * Show success message for test connection.
	 *
	 * @param array $response The response to display.
	 */
	private function mo_sps_show_success_message_for_test_connection( $response ) {
		$response = isset( $response ) && ! empty( $response ) ? $response : array();
		update_option( 'mo_sps_test_connection_status', 'success' );
		update_option( 'mo_sps_test_connection_user_details', $response );
		$this->mo_sps_display_test_attributes();
	}


	/**
	 * Handles the retrieval of authentication code.
	 */
	private function mo_sps_get_auth_code() {
		//phpcs:ignore WordPress.Security.NonceVerification.Recommended -- GET parameter in the URL for getting the auth code sent from script and doesn't require nonce verification.
		$auth_code = ! empty( $_REQUEST['mo_shp_code'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['mo_shp_code'] ) ) : null;
		if ( $auth_code ) {
			WpWrapper::mo_sps_delete_option( PluginConstants::SPS_RFTK );
			WpWrapper::mo_sps_set_option( PluginConstants::SPSAUTHCODE, $auth_code );
		} else {
			wp_die( 'Authentication code is missing' );
		}

		wp_safe_redirect( admin_url( '?option=sps_automatic_app_status' ) );
		exit();
	}

	/**
	 * Loads the default site and drive based on the response from the site.
	 *
	 * @param array $site_response The response from the site.
	 */
	private function mo_sps_load_default_site_and_drive( $site_response ) {
		if ( ! empty( $site_response['status'] ) && ! empty( $site_response['data']['value'] ) ) {
			$sites = $site_response['data']['value'];

			WpWrapper::mo_sps_set_option( PluginConstants::SPS_SITES, $sites );
			$config = WpWrapper::mo_sps_get_option( PluginConstants::APP_CONFIG );

			$client                = Azure::get_client( $config );
			$default_site_response = $client->mo_sps_get_default_site();

			if ( ! empty( $default_site_response['status'] ) && ! empty( $default_site_response['data'] ) ) {
				$default_site = $default_site_response['data'];
				WpWrapper::mo_sps_set_option( PluginConstants::SPS_SEL_SITE, $default_site['displayName'] );
				$drive_response = $client->mo_sps_get_all_drives( $default_site['id'] );

				$drives = array();
				if ( ! empty( $drive_response['status'] ) && ! empty( $drive_response['data']['value'] ) ) {
					$drives = $drive_response['data']['value'];
				}

				WpWrapper::mo_sps_set_option( PluginConstants::SPS_DRIVES, $drives );
				$default_drive_response = $client->mo_sps_get_default_drive( $default_site['id'] );

				if ( ! empty( $default_drive_response['status'] ) && ! empty( $default_drive_response['data'] ) ) {
					$default_drive = $default_drive_response['data'];
					WpWrapper::mo_sps_set_option( PluginConstants::SPS_SEL_DRIVE, $default_drive['id'] );
					WpWrapper::mo_sps_set_option( PluginConstants::SPS_SEL_DRIVE_NAME, $default_drive['name'] );
					WpWrapper::mo_sps_set_option( PluginConstants::SPS_QUOTA, $default_drive['quota'] );
				}
			}
		} else {
			$error_code = array(
				'Error'       => ! empty( $site_response['data']['error'] ) ? $site_response['data']['error'] : 'Something went wrong...!',
				'Description' => ! empty( $site_response['data']['error_description'] ) ? $site_response['data']['error_description'] : 'Please check your internet connection or try again after sometime.',
			);
			$this->mo_sps_display_error_message( $error_code );
		}
	}

	/**
	 * Loads the default OneDrive based on the response from the drive.
	 *
	 * @param array $drive_response The response from the drive.
	 */
	private function mo_sps_load_default_onedrive( $drive_response ) {
		$drives = array();
		if ( ! empty( $drive_response['status'] ) && isset( $drive_response['data'] ) && isset( $drive_response['data']['value'] ) ) {
			$drives = $drive_response['data']['value'];
			if ( isset( $drives[0] ) ) {
				$drives = $drives[0];
			}
			$connector = WpWrapper::mo_sps_get_option( PluginConstants::CLOUD_CONNECTOR );
			if ( ! isset( $drives['name'] ) && 'personal' === $connector ) {
				$drives['name'] = 'Personal Onedrive';
			}
			if ( ! empty( $drives ) && isset( $drives['id'] ) ) {
				WpWrapper::mo_sps_set_option( PluginConstants::SPS_SEL_DRIVE, $drives['id'] );
				WpWrapper::mo_sps_set_option( PluginConstants::SPS_SEL_DRIVE_NAME, $drives['name'] );
			}
		}
		WpWrapper::mo_sps_set_option( PluginConstants::SPS_DRIVES, $drives );
	}

	/**
	 * Sends an email alert.
	 *
	 * @param bool $is_skipped Whether the alert is skipped.
	 * @param bool $is_send Whether the alert is sent.
	 * @return array|void
	 */
	private function mo_sps_send_email_alert( $is_skipped = false, $is_send = false ) {
		// Check nonce for security.
		check_admin_referer( 'mo_sps_feedback' );

		$user = wp_get_current_user();

		$message = 'Plugin Deactivated';

		// Sanitize inputs.
		$deactivate_reasons        = array_key_exists( 'sps_reason', $_POST ) ? array_map( 'sanitize_text_field', (array) wp_unslash( $_POST['sps_reason'] ) ) : array();
		$deactivate_reason_message = array_key_exists( 'query_feedback', $_POST ) ? sanitize_textarea_field( wp_unslash( $_POST['query_feedback'] ) ) : false;

		if ( $is_skipped && false === $deactivate_reason_message ) {
			$deactivate_reason_message = 'skipped';
		}
		if ( $is_send && false === $deactivate_reason_message ) {
			$deactivate_reason_message = 'Send';
		}

		$get_config = '';
		if ( isset( $_POST['get_reply'] ) ) {
			$get_config = sanitize_text_field( wp_unslash( $_POST['get_reply'] ) );
		}

		if ( empty( $get_config ) ) {
			$get_config = false;
		} else {
			$get_config = true;
		}

		if ( is_multisite() ) {
			$multisite_enabled = 'True';
		} else {
			$multisite_enabled = 'False';
		}

		$message .= ', [Multisite enabled: ' . $multisite_enabled . ']';
		$message .= ', Feedback : ' . $deactivate_reason_message . '';

		$email   = '';
		$reasons = '';

		foreach ( $deactivate_reasons as $reason ) {
			$reasons .= sanitize_text_field( $reason );
			$reasons .= ',';
		}

		$reasons  = rtrim( $reasons, ',' );
		$message .= ', [Reasons :' . $reasons . ']';

		if ( isset( $_POST['query_mail'] ) ) {
			$email = sanitize_email( wp_unslash( $_POST['query_mail'] ) );
		}

		if ( ! filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
			$email = get_option( 'mo_sps_admin_email' );
			if ( empty( $email ) ) {
				$email = $user->user_email;
			}
		}

		$phone            = get_option( 'mo_sps_admin_phone' );
		$feedback_reasons = new CustomerMOSPS();

		if ( ! $is_skipped ) {
			$response = json_decode( $feedback_reasons->mo_sps_send_email_alert( $email, $phone, $message, $get_config ), true );
			return $response;
		}
	}


	/**
	 * Sends a support query.
	 *
	 * @return array
	 */
	private function mo_sps_send_support_query() {

		// Nonce verification.
		if ( ! isset( $_POST['_wpnonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['_wpnonce'] ) ), 'mo_sps_contact_us_query_option' ) ) {
			wp_die( 'Nonce verification failed' );
		}

		// Sanitize and validate input data.
		$email = isset( $_POST['mo_sps_contact_us_email'] ) ? sanitize_email( wp_unslash( $_POST['mo_sps_contact_us_email'] ) ) : '';
		$phone = isset( $_POST['mo_sps_contact_us_phone'] ) ? sanitize_text_field( wp_unslash( $_POST['mo_sps_contact_us_phone'] ) ) : '';
		$query = isset( $_POST['mo_sps_contact_us_query'] ) ? sanitize_textarea_field( wp_unslash( $_POST['mo_sps_contact_us_query'] ) ) : '';

		// Prepend message to the query.
		$query = '[Embed sharepoint onedrive documents plugin] ' . $query;

		$customer = new CustomerMOSPS();

		// Process the support query.
		$response = $customer->mo_sps_submit_contact_us( $email, $phone, $query );

		return $response;
	}

	/**
	 * Displays an error message.
	 *
	 * @param array $error_code The error code.
	 */
	public function mo_sps_display_error_message( $error_code ) {
		$feedback_config                       = WpWrapper::mo_sps_get_option( PluginConstants::FEEDBACK_CONFIG );
		$feedback_config['test_configuration'] = 'failed';
		WpWrapper::mo_sps_set_option( 'mo_sps_feedback_config', $feedback_config );
		$allowed_html = array(
			'b' => array(),
			'a' => array(
				'href'   => array(),
				'target' => array(),
			),
		);

		?>
					<div style="width:100%;display:flex;flex-direction:column;justify-content:center;align-items:center;font-size:15px;margin-top:10px;width:100%;">
				
				<div style="width:86%;padding: 15px;text-align: center;background-color:#f2dede;color:#a94442;border: 1px solid #E6B3B2;font-size: 18pt;margin-bottom:20px;">
					Error
				</div>

				<table class="mo-ms-tab-content-app-config-table" style="border-collapse:collapse;width:90%">
					<tr>
						<td style="padding: 30px 5px 30px 5px;border:1px solid #757575;" colspan="2"><h2><span>Test Configuration Failed</span></h2></td>
					</tr>
					<?php
					foreach ( $error_code as $key => $value ) {
						echo '<tr><td style="padding: 30px 5px 30px 5px;border:1px solid #757575;" class="left-div"><span style="margin-right:10px;"><b>' . esc_html( $key ) . ':</b></span></td>
                       <td style="padding: 30px 5px 30px 5px;border:1px solid #757575;" class="right-div"><span>' . wp_kses( $value, $allowed_html ) . '</span></td></tr>';
					}
					?>
				</table>
				<h3 style="margin:20px;">
					Contact us at <a style="color:#dc143c" href="mailto:office365support@xecurify.com">office365support@xecurify.com</a> for further assistance.
				</h3>
			</div>
		<?php
		exit();
	}

	/**
	 * Displays the test attributes for a successful connection.
	 *
	 * @param string|null $upn User Principal Name to display.
	 */
	private function mo_sps_display_test_attributes( $upn = null ) {
		// Update options to reflect success.
		WpWrapper::mo_sps_set_option( 'mo_sps_check_if_new_client_secret_fetched', true );
		update_option( 'mo_sps_test_connection_status', 'success' );

		?>
	<div style="width:100%;height:100%;display:flex;align-items:center;flex-direction:column;border:1px solid #eee;padding:10px;">
		<div style="width:90%;color: #3c763d;background-color: #dff0d8;padding: 2%;margin-bottom: 20px;text-align: center;border: 1px solid #AEDB9A;font-size: 18pt;">
			Success
		</div>
		<div style="display:block;text-align:center;margin-bottom:4%;">
			<svg class="animate" width="100" height="100">
				<filter id="dropshadow" height="">
					<feGaussianBlur in="SourceAlpha" stdDeviation="3" result="blur"></feGaussianBlur>
					<feFlood flood-color="rgba(76, 175, 80, 1)" flood-opacity="0.5" result="color"></feFlood>
					<feComposite in="color" in2="blur" operator="in" result="blur"></feComposite>
					<feMerge>
						<feMergeNode></feMergeNode>
						<feMergeNode in="SourceGraphic"></feMergeNode>
					</feMerge>
				</filter>
				<circle cx="50" cy="50" r="46.5" fill="none" stroke="rgba(76, 175, 80, 0.5)" stroke-width="5"></circle>
				<path d="M67,93 A46.5,46.5 0,1,0 7,32 L43,67 L88,19" fill="none" stroke="rgba(76, 175, 80, 1)" stroke-width="5" stroke-linecap="round" stroke-dasharray="80 1000" stroke-dashoffset="-220" style="filter:url(#dropshadow)"></path>
			</svg>
			<div style="margin-top:1%;margin-left:2%;color:#3c763d;background-color:#dff0d8;width:90%;">
				<div style="color: #3c763d;background-color: #dff0d8;padding: 2%;text-align: center;border: 1px solid #AEDB9A;font-size: 18pt;">
					Connected to your Azure AD/SharePoint application.
					<?php echo esc_html( $upn ? $upn : '' ); ?>
				</div>
			</div>
		</div>
		<div style="margin:4%;margin-top:0%;display:flex;text-align:center;">
			<div style="margin-right:20px;">
				<input class="mo-ms-tab-content-button" style="box-shadow:none!important;height:30px;background-color: #1B9BA1;border-color: #1B9BA1;color: #FFF;cursor: pointer;" type="button" value="Preview Documents / Files" onclick="close_and_redirect_to_document_sync()">
			</div>
		</div>
		<style>
			svg.animate path {
				animation: dash 1.5s linear both;
				animation-delay: 1s;
			}
			@keyframes dash {
				0% { stroke-dashoffset: 210; }
				75% { stroke-dashoffset: -220; }
				100% { stroke-dashoffset: -205; }
			}
		</style>
		<script>
			function close_and_redirect_to_document_sync() {
				window.opener.redirect_to_document_sync();
				setTimeout(function() {
					self.close();
				}, 1000);
			}
		</script>
	</div>
		<?php
		$this->load_css();
		exit();
	}

	/**
	 * Displays the fetched attributes.
	 *
	 * @param array $details Details to display.
	 */
	private function mo_sps_display_fetch_attributes( $details ) {
		?>
	<div style="display:flex;justify-content:center;align-items:center;flex-direction:column;border:1px solid #eee;padding:10px;">
		<div style="width:90%;color: #3c763d;background-color: #dff0d8;padding: 2%;margin-bottom: 20px;text-align: center;border: 1px solid #AEDB9A;font-size: 18pt;">
			Success
		</div>
		<div style="display:block;text-align:center;margin-bottom:4%;">
			<svg class="animate" width="100" height="100">
				<filter id="dropshadow" height="">
					<feGaussianBlur in="SourceAlpha" stdDeviation="3" result="blur"></feGaussianBlur>
					<feFlood flood-color="rgba(76, 175, 80, 1)" flood-opacity="0.5" result="color"></feFlood>
					<feComposite in="color" in2="blur" operator="in" result="blur"></feComposite>
					<feMerge>
						<feMergeNode></feMergeNode>
						<feMergeNode in="SourceGraphic"></feMergeNode>
					</feMerge>
				</filter>
				<circle cx="50" cy="50" r="46.5" fill="none" stroke="rgba(76, 175, 80, 0.5)" stroke-width="5"></circle>
				<path d="M67,93 A46.5,46.5 0,1,0 7,32 L43,67 L88,19" fill="none" stroke="rgba(76, 175, 80, 1)" stroke-width="5" stroke-linecap="round" stroke-dasharray="80 1000" stroke-dashoffset="-220" style="filter:url(#dropshadow)"></path>
			</svg>
			<script>
				window.onunload = refreshParent;
				function refreshParent() {
					window.opener.location.reload();
				}
			</script>
			<style>
				svg.animate path {
					animation: dash 1.5s linear both;
					animation-delay: 1s;
				}
				@keyframes dash {
					0% { stroke-dashoffset: 210; }
					75% { stroke-dashoffset: -220; }
					100% { stroke-dashoffset: -205; }
				}
			</style>
		</div>
		<div style="border-top:1px solid #eee;width:95%;"></div>
		<div class="test-container" style="margin-top:10px;background:#fff;">
			<table class="mo-ms-tab-content-app-config-table">
				<tr>
					<td style="text-align:center;" colspan="2">
						<span><h2>Test Attributes:</h2></span>
					</td>
				</tr>
				<?php
				foreach ( $details as $key => $value ) {
					if ( ! is_array( $value ) && ! empty( $value ) ) {
						?>
						<tr>
							<td class="left-div"><span><?php echo esc_html( $key ); ?></span></td>
							<td class="right-div"><span><?php echo esc_html( $value ); ?></span></td>
						</tr>
						<?php
					}
				}
				?>
			</table>
		</div>
	</div>
		<?php
		$this->load_css();
		exit();
	}

	/**
	 * Loads the CSS for the plugin.
	 */
	private function load_css() {
		?>
	<style>
		.test-container {
			width: 100%;
			background: #f1f1f1;
			margin-top: -30px;
		}
		.mo-ms-tab-content-app-config-table {
			max-width: 1000px;
			background: white;
			padding: 1em 2em;
			margin: 2em auto;
			border-collapse: collapse;
			border-spacing: 0;
			display: table;
			font-size: 14pt;
		}
		.mo-ms-tab-content-app-config-table td.left-div {
			width: 40%;
			word-break: break-all;
			font-weight: bold;
			border: 2px solid #949090;
			padding: 2%;
		}
		.mo-ms-tab-content-app-config-table td.right-div {
			width: 40%;
			word-break: break-all;
			padding: 2%;
			border: 2px solid #949090;
			word-wrap: break-word;
		}
	</style>
		<?php
	}
}
