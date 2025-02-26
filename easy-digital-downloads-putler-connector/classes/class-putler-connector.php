<?php
/**
 * Class for Putler connector.
 *
 * @package     easy-digital-downloads-putler-connector/classes/
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

if ( ! class_exists( 'Putler_Connector' ) ) {

	/**
	 * Putler Connector class.
	 */
	class Putler_Connector {

		/**
		 * Email address.
		 *
		 * @var string $email_address
		 */
		private $email_address = '';

		/**
		 * The API token.
		 *
		 * @var string $api_token
		 */
		private $api_token = '';

		/**
		 * The version number.
		 *
		 * @var float $version
		 */
		private $version;

		/**
		 * API URL.
		 *
		 * @var string $api_url
		 */
		private $api_url;

		/**
		 * Setting URL.
		 *
		 * @var string $settings_url
		 */
		public $settings_url;

		/**
		 * Variable to hold instance of Putler_Connector
		 *
		 * @var $instance
		 */
		protected static $instance = null;

		/**
		 * Call this method to get singleton
		 *
		 * @return Putler_Connector
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Putler_Connector Constructor.
		 *
		 * @return void
		 */
		private function __construct() {

			$this->api_url = 'https://web.putler.com/connectorAPI';
			$this->version = EPC_VERSION;
			$settings      = get_option( 'putler_connector_settings', null );
			if ( ! empty( $settings ) ) {
				$api_token           = ( ! empty( $settings['api_token'] ) ) ? explode( ',', $settings['api_token'] ) : null;
				$this->email_address = ( ! empty( $settings['email_address'] ) ) ? $settings['email_address'] : null;

				if ( ! empty( $api_token ) ) {
					foreach ( $api_token as $token ) {
						if ( strpos( $token, 'web-' ) !== false ) {
							$this->api_token = $token;
							break;
						}
					}
				}
			}

			// Show a message when no web tokens found.
			if ( empty( $this->api_token ) && ! empty( $settings ) ) {
				add_action( 'admin_notices', array( $this, 'putler_desktop_deprecated' ) );
			}

			if ( is_admin() ) {
				$this->settings_url = admin_url( 'tools.php?page=putler_connector' );
				add_action( 'admin_menu', array( $this, 'add_admin_menu_page' ) );
				add_action( 'wp_ajax_putler_connector_connection_heartbeat', array( $this, 'connection_heartbeat' ) );
			}

			add_action( 'init', array( $this, 'request_handler' ) );
		}

		/**
		 * Get plugin info
		 */
		public function get_plugin_info() {
			wp_send_json(
				array(
					'epc_version' => EPC_VERSION,
					'edd_version' => EDD_VERSION,
				)
			);
		}

		/**
		 * Handle the request from Putler API
		 */
		public function request_handler() {
			$url_path = basename( trim( wp_parse_url( add_query_arg( array() ), PHP_URL_PATH ), '/' ) );

			if ( 'ptwp-putler-connector' === $url_path ) {
				$method_name = ( ! empty( $_REQUEST['action'] ) ) ? trim( sanitize_text_field( wp_unslash( $_REQUEST['action'] ) ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification

				if ( ! empty( $method_name ) && is_callable( array( $this, $method_name ) ) ) {
					$this->$method_name();
				}
			}
		}

		/**
		 * Show deprecated notice to the admin
		 */
		public function putler_desktop_deprecated() {
			if ( empty( $this->api_token ) || empty( $this->email_address ) ) {
				/* translators: Putler URL */
				echo wp_kses_post( '<div id="putler_configure_message" class="updated fade error"><p>' . sprintf( __( 'Putler Connector for Putler desktop has deprecated. Please upgrade to <strong><a href="%s" target="_blank">Putler Web</a></strong>.', 'easy-digital-downloads-putler-connector' ), 'https://web.putler.com/' ) . '</p></div>' );
			}
		}

		/**
		 * Generate random string for given length
		 *
		 * @param int    $str_length string length.
		 * @param string $type type.
		 *
		 * @return string
		 */
		public function generate_random_string( $str_length = 15, $type = 'Alphanumeric' ) {
			$str_length = intval( $str_length );

			$str_alphanumeric = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
			$str_alphabet     = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$str_random       = '';

			switch ( $type ) {
				case 'Alphanumeric':
					for ( $i = 0; $i < $str_length; $i ++ ) {
						$str_random .= $str_alphanumeric[ wp_rand( 0, strlen( $str_alphanumeric ) - 1 ) ];
					}
					break;
				case 'Alphabets':
					for ( $i = 0; $i < $str_length; $i ++ ) {
						$str_random .= $str_alphabet[ wp_rand( 0, strlen( $str_alphabet ) - 1 ) ];
					}
					break;
			}

			return $str_random;
		}

		/**
		 * Add menu page under tools section
		 */
		public function add_admin_menu_page() {
			add_management_page(
				__( 'Putler Connector', 'easy-digital-downloads-putler-connector' ),
				__( 'Putler Connector', 'easy-digital-downloads-putler-connector' ),
				'manage_options',
				'putler_connector',
				array(
					$this,
					'display_page',
				)
			);
		}

		/**
		 * Display the page to the admin
		 */
		public function display_page() {

			$authenticate = 0;

			$last_synced_date = get_option( 'sa_' . PUTLER_GATEWAY_PREFIX . '_last_updated' );
			$authenticated    = get_option( 'putler_connector_authenticated' );
			if ( empty( $authenticated ) ) {
				$authenticate = 1;

				if ( ( ! empty( $this->api_token ) && empty( $this->email_address ) ) || ( empty( $this->api_token ) && ! empty( $this->email_address ) ) ) { // code to delete both the email & token if only one of them is present.
					delete_option( 'putler_connector_settings' );
					$this->api_token     = '';
					$this->email_address = '';
				}
			}

			$display_msg = '<span class="dashicons dashicons-yes" style="color:#0CCC0C;font-size: 2em;width: 1em;height: 1em;line-height: 0.7;"></span>' . __( 'Putler is connected', 'easy-digital-downloads-putler-connector' );

			if ( ! empty( $last_synced_date ) ) {
				$display_msg .= __( ' & last sync date was ', 'easy-digital-downloads-putler-connector' ) . $last_synced_date . '.';
			} else {
				$display_msg .= __( ' & No orders have been synced yet.', 'easy-digital-downloads-putler-connector' );
			}

			if ( ( ! empty( $_REQUEST['action'] ) && PUTLER_GATEWAY_PREFIX . '_activate' === sanitize_text_field( wp_unslash( $_REQUEST['action'] ) ) ) || ( empty( $this->api_token ) || empty( $this->email_address ) ) ) { // phpcs:ignore WordPress.Security.NonceVerification
				$authenticate = 1;
			}

			if ( 1 === $authenticate ) {
				$display_msg = __( 'Trying to Connect to Putler...', 'easy-digital-downloads-putler-connector' );
			} else {
				if ( ! empty( sanitize_text_field( wp_unslash( $_REQUEST['post_activation'] ) ) ) ) {  // phpcs:ignore WordPress.Security.NonceVerification
					$display_msg = __( 'Your transactions are getting synced with Putler. Please check after some time.', 'easy-digital-downloads-putler-connector' );
				}
			}

			echo wp_kses_post(
				'<div class="wrap" id="putler_connector_settings_page" style="font-size: 1.1em;">
                    <h1>' . __( 'Putler Connector', 'weasy-digital-downloads-putler-connector' ) . '</h1> <br/>
                    <div>' . $display_msg . '</div>
                  </div>'
			);

			if ( 1 === $authenticate ) {
				$this->authenticate();
			}
		}

		/**
		 * Authenticate the site
		 */
		public function authenticate() {

			$authenticate = 1;
			if ( ! empty( $this->api_token ) && ! empty( $this->email_address ) ) { // for existing users.

				$result = $this->validate_api_info( $this->api_token, $this->email_address, 'validate', array( 'Site-URL' => site_url() ) );

				if ( ! is_wp_error( $result ) ) {

					$res_body = ( ! empty( $result['body'] ) ) ? json_decode( $result['body'], true ) : array();

					if ( ( ! empty( $result['response']['code'] ) && 200 === $result['response']['code'] ) &&
						( ! empty( $res_body['ack'] ) && 'Success' === $res_body['ack'] ) ) {
						$authenticate = 0;

						update_option( 'putler_connector_authenticated', 1 );

						$msg = '<span>' . __( 'Successfully Authenticated!!!', 'easy-digital-downloads-putler-connector' ) . ' </span> <span class="dashicons dashicons-yes" style="color:#0CCC0C;font-size: 2em;width: 1em;height: 1em;line-height: 0.7;"></span>';
						$this->show_message( $msg );

						?>
						<script type="text/javascript">
							setTimeout(function () {
								window.location.href = "<?php echo esc_url_raw( $this->settings_url ); ?>";
							}, 3000);
						</script>
						<?php

					} else {
						delete_option( 'putler_connector_authenticated' );
						delete_option( 'putler_connector_settings' );

						?>

						<script type="text/javascript">
							setTimeout(function () {
								window.location.href = "<?php echo esc_url_raw( $this->settings_url ); ?>";
							}, 3000);
						</script>

						<?php
						exit;
					}
				} else {
					delete_option( 'putler_connector_authenticated' );
					delete_option( 'putler_connector_settings' );

					?>

					<script type="text/javascript">
						setTimeout(function () {
							window.location.href = "<?php echo esc_url_raw( $this->settings_url ); ?>";
						}, 3000);
					</script>

					<?php
					exit;
				}
			}

			if ( 1 === $authenticate ) { // For new users.

				$existing_user = 1;

				if ( empty( $this->api_token ) ) {
					$this->api_token = $this->generate_random_string( 15 );
					update_option( 'putler_connector_temp_token', $this->api_token );
					$existing_user = 0;
				}

				// getting temp token.
				$result = $this->validate_api_info( $this->api_token, $this->email_address, 'get_temp_token', array( 'Site-URL' => site_url() ) );

				if ( ! is_wp_error( $result ) ) {

					$res_body = ( ! empty( $result['body'] ) ) ? json_decode( $result['body'], true ) : array();

					if ( ( ! empty( $result['response']['code'] ) && 200 === $result['response']['code'] ) &&
						( ! empty( $res_body['ack'] ) && 'Success' === $res_body['ack'] ) ) {

						$msg = __( 'Authenticating...', 'easy-digital-downloads-putler-connector' );
						$this->show_message( $msg );

						?>
						<script type="text/javascript">
							var start_timestamp = Date.now();
							var pc_connection_heartbeat = function (start_timestamp) {

								jQuery.ajax({
									type: 'POST',
									url: (ajaxurl.indexOf('?') !== -1) ? ajaxurl + '&action=putler_connector_connection_heartbeat' : ajaxurl + '?action=putler_connector_connection_heartbeat',
									dataType: "text",
									action: 'putler_connector_connection_heartbeat',
									success: function (response) {
										response = JSON.parse(response);
										if (response.ack === 'Success') {
											jQuery("#putler_connector_settings_page").append('<br/> <div><span>Successfully Authenticated!!!</span> <span class="dashicons dashicons-yes" style="color:#0CCC0C;font-size: 2em;width: 1em;height: 1em;line-height: 0.7;"></span></div>');

											setTimeout(function () {
												window.location.href = "<?php echo esc_url_raw( $this->settings_url ) . '&post_activation=1'; ?>";
											}, 3000);

										} else {

											var current_timestamp = Date.now();

											if (current_timestamp - start_timestamp >= 30000) {
												jQuery("#putler_connector_settings_page").html('<h1><?php echo esc_html__( 'Putler Connector', 'easy-digital-downloads-putler-connector' ); ?></h1>' +
													'<br/>' +
													'<div style="background: lightyellow;border: 0.2em solid #c5c593;border-radius: 0.2em;padding: 0.75em 1em;">' +
													'<h2>Something went wrong while authenticating!</h2>' +
													'<div>Here\'s what to do next:' +
													'<ul>' +
													'<li style="list-style-type:disc;margin-left:1em;margin-bottom:0.5em;">' +
													'Do you have any security plugin active on your website?' +
													'<br/>' +
													'If you do, kindly go to your security plugin and whitelist this URL "<strong>https://web.putler.com/</strong>" Once whitelisted, try authenticating your store again.' +
													'</li>' +
													'<li style="list-style-type:disc;margin-left:1em;margin-bottom:0.5em;">If you still face the same issue even after white-listing OR you don\'t have any security plugin active - <a href="https://www.putler.com/contact-us/" target="_blank">send us a message</a>, we will get back to you ASAP</li>' +
													'</ul>' +
													'</div>');
											} else {
												setTimeout(function (start_timestamp) {
													pc_connection_heartbeat(start_timestamp);
												}, 3000, start_timestamp);
											}
										}
									}
								});
							}

							pc_connection_heartbeat(start_timestamp);
						</script>

						<?php

					} else {

						if ( empty( $existing_user ) ) {
							$msg = __( 'Authentication Failed.', 'easy-digital-downloads-putler-connector' ) . '<br/> <br/> <div class="notice notice-error"> ' . sprintf( /* translators: %s: Name of ecommerce gateway */ esc_html__( 'Please make sure that you have added an %s account in Putler. If you do not have a Putler account, you can create one for free and enjoy trial for 14 days.', 'easy-digital-downloads-putler-connector' ), PUTLER_GATEWAY ) . ' <strong><i><a href="https://web.putler.com/#!/signup" target="_blank">' . __( 'Try Putler for free!', 'easy-digital-downloads-putler-connector' ) . '</a></i></strong>. <br/> <br/>' . sprintf( /* translators: %s: Name of ecommerce gateway */ esc_html__( 'Once the %s account has been added successfully, please click ', 'easy-digital-downloads-putler-connector' ), PUTLER_GATEWAY ) . '<a href="">' . __( 'here', 'easy-digital-downloads-putler-connector' ) . '.</a> </div>';
						} else {
							$msg = __( 'Authentication Failed.', 'easy-digital-downloads-putler-connector' ) . ' ' . __( 'You would need to reset the account in ', 'easy-digital-downloads-putler-connector' ) . ' <strong><a href="https://web.putler.com/" target="_blank">' . __( 'Putler Web ', 'easy-digital-downloads-putler-connector' ) . '</a></strong>';
						}

						$this->show_message( $msg );
					}
				} else {
					$msg = __( 'Authentication Failed.', 'easy-digital-downloads-putler-connector' ) . ' <a href="">Try again</a>';
					$this->show_message( $msg );
				}
			}
		}

		/**
		 * Heartbeat to check the auth
		 */
		public function connection_heartbeat() {

			$response = array( 'ack' => 'Failure' );

			$authenticated = get_option( 'putler_connector_authenticated' );
			$settings      = get_option( 'putler_connector_settings', null );

			if ( ! empty( $settings ) && ! empty( $authenticated ) ) {
				$this->api_token     = ( ! empty( $settings['api_token'] ) ) ? $settings['api_token'] : null;
				$this->email_address = ( ! empty( $settings['email_address'] ) ) ? $settings['email_address'] : null;

				if ( ! empty( $this->api_token ) && ! empty( $this->email_address ) ) {
					$response = array( 'ack' => 'Success' );
				}
			}
			wp_send_json( $response );
		}

		/**
		 * Get the temp token
		 */
		public function get_temp_token() {

			$this->api_token = get_option( 'putler_connector_temp_token', false );

			$temp_pc_token     = ( ! empty( $_SERVER['HTTP_X_PC_TEMP_TOKEN'] ) ) ? sanitize_text_field( wp_unslash( $_SERVER['HTTP_X_PC_TEMP_TOKEN'] ) ) : '';
			$temp_putler_token = ( ! empty( $_SERVER['HTTP_X_PUTLER_TEMP_TOKEN'] ) ) ? sanitize_text_field( wp_unslash( $_SERVER['HTTP_X_PUTLER_TEMP_TOKEN'] ) ) : '';

			if ( ! empty( $temp_pc_token ) && $temp_pc_token === $this->api_token ) {
				$response = array(
					'ack'     => 'Success',
					'MESSAGE' => __( 'Authentication Successful', 'easy-digital-downloads-putler-connector' ),
				);

				update_option( 'putler_connector_putler_temp_token', $temp_putler_token );

				$result = $this->validate_api_info(
					$this->api_token,
					$this->email_address,
					'get_auth_token',
					array(
						'X-Putler-Temp-Token' => $temp_putler_token,
						'Site-URL'            => site_url(),
					)
				);

				if ( ! is_wp_error( $result ) ) {

					$res_body = ( ! empty( $result['body'] ) ) ? json_decode( $result['body'], true ) : array();

					if ( ! ( ( ! empty( $result['response']['code'] ) && 200 === $result['response']['code'] ) &&
							( ! empty( $res_body['ack'] ) && 'Success' === $res_body['ack'] ) ) ) {
						$msg = __( 'Authentication Failed.', 'easy-digital-downloads-putler-connector' ) . ' <a href="">Try again</a>';
						$this->show_message( $msg );
					}
				} else {
					$msg = __( 'Authentication Failed.', 'easy-digital-downloads-putler-connector' ) . ' <a href="">Try again</a>';
					$this->show_message( $msg );
				}
			} else {
				$response = array(
					'ack'     => 'Failure',
					'MESSAGE' => __( 'Authentication Failure', 'easy-digital-downloads-putler-connector' ),
				);
				$msg      = __( 'Authentication Failed.', 'easy-digital-downloads-putler-connector' ) . ' <a href="">Try again</a>';
				$this->show_message( $msg );
			}
			wp_send_json( $response );
		}

		/**
		 * Get auth token
		 */
		public function get_auth_token() {
			$this->api_token   = get_option( 'putler_connector_temp_token', false );
			$temp_putler_token = get_option( 'putler_connector_putler_temp_token', false );

			$temp_pc_token      = ( ! empty( $_SERVER['HTTP_X_PC_TEMP_TOKEN'] ) ) ? sanitize_text_field( wp_unslash( $_SERVER['HTTP_X_PC_TEMP_TOKEN'] ) ) : '';
			$temp_putler_token1 = ( ! empty( $_SERVER['HTTP_X_PUTLER_TEMP_TOKEN'] ) ) ? sanitize_text_field( wp_unslash( $_SERVER['HTTP_X_PUTLER_TEMP_TOKEN'] ) ) : '';

			if ( ( ! empty( $temp_pc_token ) && $temp_pc_token === $this->api_token ) && ( ! empty( $temp_putler_token1 ) && $temp_putler_token1 === $temp_putler_token ) ) {
				$response = array(
					'ack'     => 'Success',
					'MESSAGE' => __( 'Authentication Successful', 'easy-digital-downloads-putler-connector' ),
				);

				// save settings.
				$settings = array();

				$this->email_address       = ( ! empty( $_SERVER['HTTP_X_PUTLER_EMAIL'] ) ) ? sanitize_email( wp_unslash( $_SERVER['HTTP_X_PUTLER_EMAIL'] ) ) : '';
				$settings['email_address'] = $this->email_address;
				$this->api_token           = ( ! empty( $_SERVER['HTTP_X_PUTLER_AUTH_TOKEN'] ) ) ? sanitize_text_field( wp_unslash( $_SERVER['HTTP_X_PUTLER_AUTH_TOKEN'] ) ) : '';
				$settings['api_token']     = $this->api_token;

				$result = $this->validate_api_info(
					$this->api_token,
					$this->email_address,
					'set_auth_token',
					array(
						'X-Putler-Temp-Token' => $temp_putler_token,
						'Gateway'             => PUTLER_GATEWAY,
						'AccountName'         => get_bloginfo( 'name' ),
						'Site-URL'            => site_url(),
					)
				);
				if ( ! is_wp_error( $result ) ) {

					$res_body = ( ! empty( $result['body'] ) ) ? json_decode( $result['body'], true ) : array();

					if ( ( ! empty( $result['response']['code'] ) && 200 === $result['response']['code'] ) &&
						( ! empty( $res_body['ack'] ) && 'Success' === $res_body['ack'] ) ) {

						delete_option( 'putler_connector_temp_token' );
						delete_option( 'putler_connector_putler_temp_token' );

						update_option( 'putler_connector_settings', $settings );
						update_option( 'putler_connector_authenticated', 1 );

						?>
						<script type="text/javascript">
							jQuery("#putler_connector_settings_page").append('<br/> <br/> <div></div>');
						</script>
						<?php

					} else {
						$msg = __( 'Authentication Failed.', 'easy-digital-downloads-putler-connector' ) . ' <a href="">Try again</a>';
						$this->show_message( $msg );
					}
				} else {
					$msg = __( 'Authentication Failed.', 'easy-digital-downloads-putler-connector' ) . ' <a href="">Try again</a>';
					$this->show_message( $msg );
				}
			} else {
				$response = array(
					'ack'     => 'Failure',
					'MESSAGE' => __( 'Authentication Failure', 'easy-digital-downloads-putler-connector' ),
				);
				$msg      = __( 'Authentication Failed.', 'easy-digital-downloads-putler-connector' ) . ' <a href="">Try again</a>';
				$this->show_message( $msg );
			}
			wp_send_json( $response );
		}

		/**
		 * Function to display authentication messages
		 *
		 * @param string $message message to show.
		 */
		private function show_message( $message = '' ) {
			if ( ! empty( $message ) ) {
				?>
				<script type="text/javascript">
					jQuery("#putler_connector_settings_page").append('<br/> <div><?php echo wp_kses_post( $message ); ?></div>');
				</script>
				<?php
			}
		}

		/**
		 * Validate API info.
		 *
		 * @param string $token api token.
		 * @param string $email api email.
		 * @param string $action action to perform.
		 * @param array  $headers extra headers to send along headers.
		 *
		 * @return array|WP_Error
		 */
		private function validate_api_info( $token = '', $email = '', $action = '', $headers = array() ) {
			// Validate with API server.
			return wp_remote_post(
				$this->api_url,
				array(
					'headers' => array_merge(
						array(
							'Authorization' => 'Basic ' . base64_encode( $email . ':' . $token ), // phpcs:ignore
							'User-Agent'    => 'Putler Connector/' . $this->version,
						),
						$headers
					),
					'body'    => array( 'action' => $action ),
				)
			);
		}

		/**
		 * Generate XML from the array.
		 *
		 * @param array  $array array to be converted into XML.
		 * @param string $node_name XML node name.
		 *
		 * @return string
		 */
		public function generate_xml_from_array( $array = array(), $node_name = '' ) {
			$xml = '';
			if ( is_array( $array ) || is_object( $array ) ) {
				foreach ( $array as $key => $value ) {
					if ( is_numeric( $key ) ) {
						$key = $node_name;
					}
					$node_value = '';
					if ( ! empty( $value ) ) {
						$node_value = "\n" . $this->generate_xml_from_array( $value, $node_name );
					}
					$xml .= '<' . $key . '>' . $node_value . '</' . $key . '>' . "\n";
				}
			} else {
				/**
				 * Variable declaration
				 *
				 * @var string $array string to return in node.
				 */
				$xml = htmlspecialchars( $array, ENT_QUOTES ) . "\n";
			}

			return $xml;
		}

		/**
		 * Generate XML
		 *
		 * @param array  $array array of data.
		 * @param string $node_block node block.
		 * @param string $node_name node name.
		 *
		 * @return string
		 */
		public function generate_valid_xml_from_array( $array = array(), $node_block = PUTLER_GATEWAY, $node_name = 'node' ) {
			$xml  = '<?xml version="1.0" encoding="UTF-8" ?>' . "\n";
			$xml .= '<!--email_off--><' . $node_block . '>' . "\n";
			$xml .= $this->generate_xml_from_array( $array, $node_name );
			$xml .= '</' . $node_block . '><!--email_off-->' . "\n";

			return $xml;
		}

		/**
		 * Validate the authentication request
		 *
		 * @param string $code Authentication code.
		 *
		 * @return bool
		 */
		public function is_valid_request( $code = '' ) {
			if ( empty( $code ) ) {
				return false;
			}
			$auth        = base64_decode( $code ); // phpcs:ignore
			$credentials = array();
			if ( ! empty( $auth ) ) {
				$credentials = explode( ':', $auth );
			}
			$email = ( ! empty( $credentials[0] ) ) ? $credentials[0] : '';
			$token = ( ! empty( $credentials[1] ) ) ? $credentials[1] : '';
			if ( empty( $email ) || empty( $token ) ) {
				return false;
			}
			if ( $email !== $this->email_address || $token !== $this->api_token ) {
				return false;
			}

			return true;
		}

		/**
		 * Send back the response for the request
		 *
		 * @param array $response Response to send.
		 *
		 * @return void
		 */
		public function send_response( $response = array() ) {
			if ( empty( $response ) || ! is_array( $response ) ) {
				return;
			}
			header( 'Content-Type: text/xml' );
			while ( ob_get_contents() ) {
				ob_clean();
			}

			echo $this->generate_valid_xml_from_array( $response ); // phpcs:ignore WordPress.Security.EscapeOutput
			die;
		}

		/**
		 * Get data for API request
		 */
		public function putler_connector_get_data() {
			global $edd_putler_connector;
			/**
			 * Variable declaration
			 *
			 * @var $edd_putler_connector Putler_EDD_Connector_JSON
			 */
			$authentication_code = ( ! empty( $_REQUEST['AUTH'] ) ) ? sanitize_text_field( wp_unslash( $_REQUEST['AUTH'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification
			if ( ! $this->is_valid_request( $authentication_code ) ) {
				$this->send_response(
					array(
						'ACK'     => 'Failure',
						'MESSAGE' => __( 'Authentication Failure', 'easy-digital-downloads-putler-connector' ),
					)
				);
			}

			if ( empty( sanitize_text_field( wp_unslash( $_REQUEST['STARTDATE'] ) ) ) || empty( sanitize_text_field( wp_unslash( $_REQUEST['ENDDATE'] ) ) ) ) { // phpcs:ignore WordPress.Security.NonceVerification
				$this->send_response(
					array(
						'ACK'     => 'Failure',
						'MESSAGE' => __( 'Params Missing', 'easy-digital-downloads-putler-connector' ),
					)
				);
			}
			update_option( 'sa_' . PUTLER_GATEWAY_PREFIX . '_last_updated', current_time( 'Y-m-d H:i:s' ) ); // updating the last synced time.

			$offset     = ( ! empty( $_REQUEST['OFFSET'] ) ) ? intval( sanitize_text_field( wp_unslash( $_REQUEST['OFFSET'] ) ) ) : 0; // phpcs:ignore WordPress.Security.NonceVerification
			$sub_offset = ( ! empty( $_REQUEST['SUBOFFSET'] ) ) ? intval( sanitize_text_field( wp_unslash( $_REQUEST['SUBOFFSET'] ) ) ) : 0; // phpcs:ignore WordPress.Security.NonceVerification
			$limit      = ( ! empty( $_REQUEST['LIMIT'] ) ) ? intval( sanitize_text_field( wp_unslash( $_REQUEST['LIMIT'] ) ) ) : 100; // phpcs:ignore WordPress.Security.NonceVerification
			$type       = ( ! empty( $_REQUEST['REQUESTTYPE'] ) ) ? strtolower( sanitize_text_field( wp_unslash( $_REQUEST['REQUESTTYPE'] ) ) ) : 'history'; // phpcs:ignore WordPress.Security.NonceVerification

			// Getting the data from ecommerce plugins.
			$params = array(
				'start_date' => sanitize_text_field( wp_unslash( $_REQUEST['STARTDATE'] ) ), // phpcs:ignore WordPress.Security.NonceVerification
				'end_date'   => sanitize_text_field( wp_unslash( $_REQUEST['ENDDATE'] ) ), // phpcs:ignore WordPress.Security.NonceVerification
				'offset'     => $offset,
				'sub_offset' => $sub_offset,
				'limit'      => $limit,
				'type'       => strtolower( $type ),
			);

			$edd_putler_connector->set_params( $params );
			$json_orders = $edd_putler_connector->get_json_orders();

			$orders_count     = ! empty( $json_orders['count'] ) ? intval( $json_orders['count'] ) : 0;
			$last_start_limit = ! empty( $json_orders['offset'] ) ? intval( $json_orders['offset'] ) : 0;
			$formatted_orders = ! empty( $json_orders['orders'] ) ? $json_orders['orders'] : array();
			if ( 0 < count( $formatted_orders ) ) {
				if ( $orders_count < $limit ) {
					$ack    = 'Success';
					$offset = 0;
				} else {
					$ack    = 'SuccessWithWarning';
					$offset = $orders_count + $last_start_limit;
				}

				$response = array(
					'ACK'      => $ack,
					'DATA'     => '',
					'JSONDATA' => wp_json_encode( $formatted_orders ),
					'OFFSET'   => $offset,
				);
				update_option( 'sa_' . PUTLER_GATEWAY_PREFIX . '_last_updated', current_time( 'Y-m-d H:i:s' ) ); // updating the last synced time.
			} else {
				$response = array(
					'ACK'      => 'Success',
					'DATA'     => '',
					'JSONDATA' => '',
					'OFFSET'   => $orders_count + $last_start_limit,
				);
			}

			$this->send_response( $response );
		}
	}
}

