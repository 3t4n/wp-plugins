<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once __DIR__ . '/class-wc-gateway-acima-credit-order-parser.php';

/**
 * Acima Digital Payment Gateway
 *
 * Provides the Acima Payment Gateway
 *
 * @class   WC_Gateway_Acima_Credit
 * @extends WC_Payment_Gateway
 * @package WooCommerce/Classes/Payment
 * @author  Acima Digital, Inc
 */
function acima_leasing_init_payment_gateway() {
	if ( ! class_exists( WC_Gateway_Acima_Credit::class ) ) {
		class WC_Gateway_Acima_Credit extends WC_Payment_Gateway {

			private string $api_key;
			private string $api_url;
			private string $merchant_id;

			const PAYMENT_METHOD_CODE = 'acima_credit';

			/**
			 * Constructor method
			 */
			public function __construct() {
				/**
				* Unique ID for the gateway.
				*/
				$this->id = self::PAYMENT_METHOD_CODE;

				/**
				* If you want to show an image next to the gateway’s name on the frontend, enter a URL to an image.
				*/
				$this->icon = '';

				/**
				* Bool. Can be set to true if you want payment fields to show on the checkout (if doing a direct integration).
				*/
				$this->has_fields = false;

				/**
				* Button label to replace the default "Place order"
				*/
				$this->order_button_text = __( 'PROCEED WITH ACIMA LEASING', 'acima-leasing-payment-gateway' );

				/**
				* Title of the payment method shown on the admin page.
				*/
				$this->method_title = __( 'Acima Leasing', 'acima-leasing-payment-gateway' );

				/**
				* Description for the payment method shown on the admin page.
				*/
				$this->method_description = __( 'This plugin adds the Acima Digital payment option to your WooCommerce store.', 'acima-leasing-payment-gateway' );

				/**
				* Load default settings
				*/
				$this->init_form_fields();

				/**
				* Set gateway variables
				*/
				$this->title       = $this->get_option( 'title' );
				$this->description = $this->get_option( 'description' );
				$this->api_key     = $this->get_option( 'api_key' );
				$this->api_url     = $this->get_option( 'api_url' );
				$this->merchant_id = $this->get_option( 'merchant_id' );

				/**
				* Add a save hook for the settings
				*/
				add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array( $this, 'process_admin_options' ) );

				add_action( 'woocommerce_admin_field_acima_download_button', array( $this, 'generate_acima_download_button_html' ) );

				add_action( 'wp_ajax_download_acima_config', array( $this, 'process_config_download' ) );

				add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );
			}

			public function enqueue_admin_scripts() {
				wp_register_script(
					'acima-config-download',
					plugins_url( '/public/js/admin-config-download.js', ACIMA_CREDIT_MAIN_FILE ),
					array( 'jquery' ),
					WC_ACIMA_VERSION,
					true
				);
				wp_enqueue_script( 'acima-config-download' );

				wp_register_style(
					'acima-admin-styles',
					plugins_url( '/public/css/acima-admin.css', ACIMA_CREDIT_MAIN_FILE ),
					array(),
					WC_ACIMA_VERSION
				);
				wp_enqueue_style( 'acima-admin-styles' );
			}

			/**
			 * These are the options that will be shown in admin on the gateway settings page
			 */
			public function init_form_fields() {
				$this->form_fields = array(
					'enabled'                   => array(
						'title'       => __( 'Enable/Disable', 'acima-leasing-payment-gateway' ),
						'type'        => 'checkbox',
						'label'       => __( 'Enable Acima Leasing', 'acima-leasing-payment-gateway' ),
						'description' => __( 'Enables or disables the Acima plugin.', 'acima-leasing-payment-gateway' ),
						'default'     => 'yes',
						'desc_tip'    => true,
					),
					'login_section'             => array(
						'title' => __( 'Login Configuration', 'acima-leasing-payment-gateway' ),
						'type'  => 'title',
						'class' => 'acima-login-section',
					),
					'base_url'                  => array(
						'title'       => __( 'Public Api (Ecom Base Url)', 'acima-leasing-payment-gateway' ),
						'type'        => 'text',
						'description' => __( 'The base URL for the Acima API.', 'acima-leasing-payment-gateway' ),
						'desc_tip'    => true,
						'class'       => 'acima-login-field',
					),
					'location_id'               => array(
						'title'       => __( 'Location ID', 'acima-leasing-payment-gateway' ),
						'type'        => 'text',
						'description' => __( 'Your Acima location ID.', 'acima-leasing-payment-gateway' ),
						'desc_tip'    => true,
						'class'       => 'acima-login-field',
					),
					'acima_login_client_id'     => array(
						'title'       => __( 'Client ID', 'acima-leasing-payment-gateway' ),
						'type'        => 'password',
						'description' => __( 'Aperture Client ID for configuration download.', 'acima-leasing-payment-gateway' ),
						'desc_tip'    => true,
						'class'       => 'acima-login-field',
					),
					'acima_login_client_secret' => array(
						'title'       => __( 'Client Secret', 'acima-leasing-payment-gateway' ),
						'type'        => 'password',
						'description' => __( 'Aperture Client Secret for configuration download.', 'acima-leasing-payment-gateway' ),
						'desc_tip'    => true,
						'class'       => 'acima-login-field',
					),
					'download_config'           => array(
						'type'  => 'acima_download_button',
						'class' => 'acima-login-field',
					),
					'config_url'                => array(
						'title'             => __( 'Configuration URL', 'acima-leasing-payment-gateway' ),
						'type'              => 'config_url_field',
						'description'       => __( 'The configuration URL for your Acima integration.', 'acima-leasing-payment-gateway' ),
						'desc_tip'          => true,
						'custom_attributes' => array( 'readonly' => 'readonly' ),
						'class'             => 'acima-config-field',
					),
					'title'                     => array(
						'title'             => __( 'Title', 'acima-leasing-payment-gateway' ),
						'type'              => 'text',
						'description'       => __( 'This controls the title which the user sees during checkout.', 'acima-leasing-payment-gateway' ),
						'default'           => __( 'Acima Leasing', 'acima-leasing-payment-gateway' ),
						'desc_tip'          => true,
						'custom_attributes' => array( 'readonly' => 'readonly' ),
						'class'             => 'acima-config-field',
					),
					'api_url'                   => array(
						'title'             => __( 'Public Api (Ecom)', 'acima-leasing-payment-gateway' ),
						'type'              => 'text',
						'description'       => __( 'The base URL for the Acima Ecom API.', 'acima-leasing-payment-gateway' ),
						'desc_tip'          => true,
						'custom_attributes' => array( 'readonly' => 'readonly' ),
						'class'             => 'acima-config-field',
					),
					'sdk_url'                   => array(
						'title'             => __( 'Public SDK (Ecom)', 'acima-leasing-payment-gateway' ),
						'type'              => 'text',
						'description'       => __( 'Built automatically on Ecom Portal.', 'acima-leasing-payment-gateway' ),
						'default'           => '',
						'desc_tip'          => true,
						'custom_attributes' => array( 'readonly' => 'readonly' ),
						'class'             => 'acima-config-field',
					),
					'acima_api_url'             => array(
						'title'             => __( 'Public Api (Aperture)', 'acima-leasing-payment-gateway' ),
						'type'              => 'text',
						'description'       => __( 'The base URL for the Aperture API.', 'acima-leasing-payment-gateway' ),
						'desc_tip'          => true,
						'custom_attributes' => array( 'readonly' => 'readonly' ),
						'class'             => 'acima-config-field',
					),
					'acima_audience'            => array(
						'title'             => __( 'Api Audience', 'acima-leasing-payment-gateway' ),
						'type'              => 'text',
						'description'       => __( 'Leave audience empty if you want to authenticate with Cognito.', 'acima-leasing-payment-gateway' ),
						'default'           => 'https://aperture.acimacredit.com',
						'desc_tip'          => true,
						'custom_attributes' => array( 'readonly' => 'readonly' ),
						'class'             => 'acima-config-field',
					),
					'acima_client_id'           => array(
						'title'             => __( 'Aperture Client ID', 'acima-leasing-payment-gateway' ),
						'type'              => 'password',
						'description'       => __( 'Your Acima API Client ID.', 'acima-leasing-payment-gateway' ),
						'custom_attributes' => array( 'readonly' => 'readonly' ),
						'class'             => 'acima-config-field',
					),
					'acima_client_secret'       => array(
						'title'             => __( 'Aperture Client Secret', 'acima-leasing-payment-gateway' ),
						'type'              => 'password',
						'description'       => __( 'Your Acima API Client Secret.', 'acima-leasing-payment-gateway' ),
						'custom_attributes' => array( 'readonly' => 'readonly' ),
						'class'             => 'acima-config-field',
					),
					'merchant_id'               => array(
						'title'             => __( 'LocationId/MerchantId', 'acima-leasing-payment-gateway' ),
						'type'              => 'text',
						'description'       => __( 'Your Acima Merchant ID.', 'acima-leasing-payment-gateway' ),
						'desc_tip'          => true,
						'custom_attributes' => array( 'readonly' => 'readonly' ),
						'class'             => 'acima-config-field',
					),
					'acima_webhook_enable'      => array(
						'title'             => __( 'Enable Webhook', 'acima-leasing-payment-gateway' ),
						'type'              => 'checkbox',
						'label'             => __( 'Enable webhook for transaction updates.', 'acima-leasing-payment-gateway' ),
						'default'           => 'no',
						'custom_attributes' => array( 'disabled' => 'disabled' ),
						'class'             => 'acima-config-field',
					),
					'acima_webhook_secret'      => array(
						'title'             => __( 'Webhook Secret', 'acima-leasing-payment-gateway' ),
						'type'              => 'password',
						'description'       => __( 'Secret key for webhook validation.', 'acima-leasing-payment-gateway' ),
						'custom_attributes' => array( 'readonly' => 'readonly' ),
						'class'             => 'acima-config-field',
					),
					'acima_debug'               => array(
						'title'       => __( 'Debug Log', 'acima-leasing-payment-gateway' ),
						'type'        => 'checkbox',
						'label'       => __( 'Enable logging', 'acima-leasing-payment-gateway' ),
						'default'     => 'no',
						'description' => __( 'Log Acima events inside <code>wp-content/uploads/wc-logs/</code>', 'acima-leasing-payment-gateway' ),
					),
				);
			}

			public function generate_config_url_field_html( $key, $data ) {
				$field_key = $this->get_field_key( $key );

				ob_start();
				?>
				<tr valign="top">
					<th scope="row" class="titledesc">
						<label for="<?php echo esc_attr( $field_key ); ?>">
							<?php echo wp_kses_post( $data['title'] ); ?>
							<?php echo wp_kses_post( $this->get_tooltip_html( $data ) ); ?>
						</label>
					</th>
					<td class="forminp">
						<div style="display: flex; align-items: center;">
							<input
									class="input-text regular-input <?php echo esc_attr( $data['class'] ); ?>"
									type="text"
									name="<?php echo esc_attr( $field_key ); ?>"
									id="<?php echo esc_attr( $field_key ); ?>"
									value="<?php echo esc_attr( $this->get_option( $key ) ); ?>"
									readonly="readonly"
							/>
							<button type="button"
									class="button-secondary sync-config"
									onclick="window.acimaConfig.showLoginForm()"
									style="margin-left: 10px;">
					<span class="sync-icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
							<path d="M21.5 2v6h-6M2.5 22v-6h6M2 11.5a10 10 0 0 1 18.8-4.3M22 12.5a10 10 0 0 1-18.8 4.3"/>
						</svg>
					</span>
							</button>
						</div>
						<?php echo wp_kses_post( $this->get_description_html( $data ) ); ?>
					</td>
				</tr>
				<?php
				return ob_get_clean();
			}

			/**
			 * Generate Button HTML
			 */
			public function generate_acima_download_button_html( $key, $data ) {
				$nonce = wp_create_nonce( 'download_acima_config_nonce' );

				ob_start();
				?>
				<tr valign="top">
					<th scope="row" class="titledesc">
						<div style="display: flex; gap: 10px; align-items: center;">
							<button type="button" class="button-primary download-config"
									onclick="window.acimaConfig.downloadConfig('<?php echo esc_js( $nonce ); ?>')"
									value="<?php echo esc_attr( __( 'Download Configuration', 'acima-leasing-payment-gateway' ) ); ?>">
								<?php echo esc_html( __( 'Download Configuration', 'acima-leasing-payment-gateway' ) ); ?>
							</button>
						</div>
					</th>
					<td class="forminp">
						<div id="acima-config-error" class="error-message" style="display:none; color: #dc3232; margin-top: 5px;"></div>
						<div id="acima-config-success" class="message-success" style="display:none; color: #008000; margin-top: 5px;"></div>
					</td>
				</tr>
				<?php
				return ob_get_clean();
			}

			public function generate_text_html( $key, $data ) {
				$field_key = $this->get_field_key( $key );
				$defaults  = array(
					'title'             => '',
					'disabled'          => false,
					'class'             => '',
					'css'               => '',
					'placeholder'       => '',
					'type'              => 'text',
					'desc_tip'          => false,
					'description'       => '',
					'custom_attributes' => array(),
				);

				$data = wp_parse_args( $data, $defaults );

				// Add sync button for config_url field
				$sync_button = '';
				if ( $key === 'config_url' ) {
					$sync_button = sprintf(
						'<button type="button" class="button-secondary sync-config" onclick="%s" style="margin-left: 10px;">
                                 <span class="sync-icon">%s</span>
                               </button>',
						'window.acimaConfig.showLoginForm()',
						wp_kses(
							'<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                     <path d="M21.5 2v6h-6M2.5 22v-6h6M2 11.5a10 10 0 0 1 18.8-4.3M22 12.5a10 10 0 0 1-18.8 4.3"/>
                                    </svg>',
							array(
								'svg'  => array(
									'xmlns'           => array(),
									'width'           => array(),
									'height'          => array(),
									'viewBox'         => array(),
									'fill'            => array(),
									'stroke'          => array(),
									'stroke-width'    => array(),
									'stroke-linecap'  => array(),
									'stroke-linejoin' => array(),
								),
								'path' => array(
									'd' => array(),
								),
							)
						)
					);
				}

				ob_start();
				?>
				<tr valign="top">
					<th scope="row" class="titledesc">
						<label for="<?php echo esc_attr( $field_key ); ?>">
							<?php echo wp_kses_post( $data['title'] ); ?>
							<?php echo wp_kses_post( $this->get_tooltip_html( $data ) ); ?>
						</label>
					</th>
					<td class="forminp">
						<div style="display: flex; align-items: center;">
							<input
									class="input-text regular-input <?php echo esc_attr( $data['class'] ); ?>"
									type="<?php echo esc_attr( $data['type'] ); ?>"
									name="<?php echo esc_attr( $field_key ); ?>"
									id="<?php echo esc_attr( $field_key ); ?>"
									style="<?php echo esc_attr( $data['css'] ); ?>"
									value="<?php echo esc_attr( $this->get_option( $key ) ); ?>"
									placeholder="<?php echo esc_attr( $data['placeholder'] ); ?>"
								<?php disabled( $data['disabled'], true ); ?>
								<?php echo wp_kses_post( $this->get_custom_attribute_html( $data ) ); ?>
							/>
							<?php echo wp_kses_post( $sync_button ); ?>
						</div>
						<?php echo wp_kses_post( $this->get_description_html( $data ) ); ?>
					</td>
				</tr>
				<?php
				return ob_get_clean();
			}

			/**
			 * Process the configuration download request
			 */
			/**
			 * Process the configuration download request
			 */
			/**
			 * Process the configuration download request
			 */
			public function process_config_download() {
				try {
					// Verify nonce
					if ( ! check_ajax_referer( 'download_acima_config_nonce', 'nonce', false ) ) {
						throw new Exception( 'Invalid security token' );
					}

					// Get required fields from settings
					$base_url      = isset( $_POST['base_url'] ) ? sanitize_text_field( wp_unslash( $_POST['base_url'] ) ) : '';
					$location_id   = isset( $_POST['location_id'] ) ? sanitize_text_field( wp_unslash( $_POST['location_id'] ) ) : '';
					$client_id     = isset( $_POST['client_id'] ) ? sanitize_text_field( wp_unslash( $_POST['client_id'] ) ) : '';
					$client_secret = isset( $_POST['client_secret'] ) ? sanitize_text_field( wp_unslash( $_POST['client_secret'] ) ) : '';

					// Validate required fields
					if ( empty( $base_url ) ) {
						throw new Exception( 'Base URL is required' );
					}
					if ( empty( $location_id ) ) {
						throw new Exception( 'Location ID is required' );
					}
					if ( empty( $client_id ) ) {
						throw new Exception( 'Client ID is required' );
					}
					if ( empty( $client_secret ) ) {
						throw new Exception( 'Client Secret is required' );
					}

					// Build configuration URL
					$config_url = rtrim( $base_url, '/' ) . '/api/merchant-integration/' . $location_id . '/woo_commerce/configuration';

					WC_Gateway_Acima_Credit_Logger::debug(
						'Requesting configuration',
						array(
							'url'         => $config_url,
							'location_id' => $location_id,
						)
					);

					// Set up authentication
					$auth_string = base64_encode( $client_id . ':' . $client_secret );

					// Make request to get configuration
					$response = wp_remote_get(
						$config_url,
						array(
							'timeout' => 30,
							'headers' => array(
								'Authorization' => "Basic {$auth_string}",
								'Accept'        => 'application/json',
							),
						)
					);

					if ( is_wp_error( $response ) ) {
						WC_Gateway_Acima_Credit_Logger::error(
							'API request failed',
							array(
								'error'       => $response->get_error_message(),
								'location_id' => $location_id,
							)
						);
						throw new Exception( $response->get_error_message() );
					}

					$response_code = wp_remote_retrieve_response_code( $response );
					if ( $response_code !== 200 ) {
						$response_body  = wp_remote_retrieve_body( $response );
						$error_response = json_decode( $response_body, true );

						// Check for error message in details first, then fall back to message field
						$error_message = $error_response['details']['error_message'] ??
										( $error_response['message'] ?? 'Unknown error occurred' );

						WC_Gateway_Acima_Credit_Logger::error(
							'API request returned non-200 status',
							array(
								'status_code' => $response_code,
								'error'       => $error_message,
								'location_id' => $location_id,
							)
						);

						throw new Exception( $error_message );
					}

					$response_body = wp_remote_retrieve_body( $response );
					$config        = json_decode( $response_body, true );

					if ( json_last_error() !== JSON_ERROR_NONE ) {
						WC_Gateway_Acima_Credit_Logger::error(
							'Failed to parse configuration JSON',
							array(
								'json_error'  => json_last_error_msg(),
								'location_id' => $location_id,
							)
						);
						throw new Exception( 'Invalid configuration response format' );
					}

					// Validate required configuration fields
					if ( ! isset( $config['sdkUrl'] ) ) {
						WC_Gateway_Acima_Credit_Logger::error(
							'Invalid configuration',
							array(
								'error'       => 'Missing SDK URL',
								'location_id' => $location_id,
							)
						);
						throw new Exception( 'Invalid configuration: missing SDK URL' );
					}

					// Map API configuration to WooCommerce field names
					$field_values = array(
						'woocommerce_acima_credit_enabled' => isset( $config['active'] ) && $config['active'] ? 'yes' : 'no',
						'woocommerce_acima_credit_title'   => $config['title'] ?? 'Acima Leasing',
						'woocommerce_acima_credit_api_url' => $base_url,
						'woocommerce_acima_credit_sdk_url' => $config['sdkUrl'],
						'woocommerce_acima_credit_acima_api_url' => $config['publicApi']['url'] ?? '',
						'woocommerce_acima_credit_acima_client_id' => $config['publicApi']['clientId'] ?? '',
						'woocommerce_acima_credit_acima_client_secret' => $config['publicApi']['clientSecret'] ?? '',
						'woocommerce_acima_credit_acima_audience' => $config['publicApi']['apiAudience'] ?? '',
						'woocommerce_acima_credit_acima_webhook_enable' => isset( $config['webhook']['enable'] ) && $config['webhook']['enable'] ? 'yes' : 'no',
						'woocommerce_acima_credit_acima_webhook_secret' => $config['webhook']['secret'] ?? '',
						'woocommerce_acima_credit_config_url' => $config_url,
						'woocommerce_acima_credit_base_url' => $base_url,
						'woocommerce_acima_credit_merchant_id' => $location_id,
						'woocommerce_acima_credit_acima_login_client_id' => $client_id,
						'woocommerce_acima_credit_acima_login_client_secret' => $client_secret,
						'woocommerce_acima_credit_environment' => $config['environment'] ?? '',
					);

					WC_Gateway_Acima_Credit_Logger::info(
						'Configuration downloaded successfully',
						array(
							'location_id' => $location_id,
							'environment' => $config['environment'] ?? '',
						)
					);

					wp_send_json_success(
						array(
							'message' => 'Configuration downloaded successfully',
							'fields'  => $field_values,
						)
					);

				} catch ( Exception $e ) {
					WC_Gateway_Acima_Credit_Logger::error(
						$e->getMessage(),
						array(
							'location_id' => $location_id ?? '',
							'trace'       => $e->getTraceAsString(),
						)
					);
					wp_send_json_error( array( 'message' => $e->getMessage() ) );
				}
			}

			private function debug_enabled() {
				return $this->get_option( 'acima_debug' ) === 'yes';
			}

			public function get_icon() {
				return '<small>The No Credit Option.&nbsp;&nbsp;<a href="https://www.acima.com/en/how-it-works" target="_blank">Learn More</a></small>';
			}

			public function get_description() {
				if ( is_admin() ) {
					return $this->description;
				} else {
					$image_url = plugin_dir_url( __DIR__ ) . 'public/images/AcimaLogo.png';
					return wp_get_attachment_image( attachment_url_to_postid( $image_url ), 'full', false, array( 'style' => 'float:left' ) ) . $this->description;
				}
			}

			/**
			 * Handling payment and processing the order
			 */
			public function process_payment( $order_id ) {
				include_once __DIR__ . '/class-wc-gateway-acima-credit-request.php';

				$order = new WC_Order( $order_id );

				$acima_credit_request = new WC_Gateway_Acima_Credit_Request();

				/**
				* Return success page redirect
				*/
				$thank_you_url = $this->get_return_url( $order );
				return array(
					'result'   => 'success',
					'redirect' => $acima_credit_request->get_checkout_url( $order_id, $thank_you_url ),
				);
			}
		}
	}
}
add_action( 'plugins_loaded', 'acima_leasing_init_payment_gateway' );

/**
 * Include Acima Digital in the available gateways
 *
 * @param  array $gateways All available WC gateways
 *
 * @return array $gateways All WC gateways + Acima Digital Gateway
 * @since  1.0.0
 */
function wc_acima_credit_add_to_gateways( array $gateways ): array {
	$gateways[] = 'WC_Gateway_Acima_Credit';
	return $gateways;
}
add_filter( 'woocommerce_payment_gateways', 'wc_acima_credit_add_to_gateways' );

/**
 * Handle delivery confirmation when order is completed in admin
 */
function wc_acima_credit_handle_status_change( $order_id, $old_status, $new_status ) {
	if ( $new_status !== 'completed' ) {
		WC_Gateway_Acima_Credit_Logger::debug( "Order {$order_id} and status $new_status cannot confirm delivery" );
		return;
	}

	$order = wc_get_order( $order_id );
	if ( ! $order ) {
		WC_Gateway_Acima_Credit_Logger::debug( "Order {$order_id} not found" );
		return;
	}

	$payment_method = $order->get_payment_method();
	WC_Gateway_Acima_Credit_Logger::debug( "Processing order {$order_id} status change to completed. Payment method: {$payment_method}" );

	if ( $payment_method !== 'acima_credit' ) {
		WC_Gateway_Acima_Credit_Logger::debug( "Order {$order_id} is not an Acima Credit order (payment method: {$payment_method}), skipping delivery confirmation" );
		return;
	}

	$lease_id = get_post_meta( $order_id, '_acima_credit_lease_id', true );
	if ( empty( $lease_id ) ) {
		WC_Gateway_Acima_Credit_Logger::debug( "No lease ID found for Acima Credit order {$order_id}, skipping delivery confirmation" );
		return;
	}

	try {
		$api              = new WC_Acima_API();
		$current_utc_date = ( new DateTime( 'now', new DateTimeZone( 'UTC' ) ) )->format( 'Y-m-d' );

		WC_Gateway_Acima_Credit_Logger::debug( "Attempting delivery confirmation for order {$order_id} with lease ID: {$lease_id}" );
		$response = $api->create_delivery_confirmation(
			$lease_id,
			array(
				'selected_delivery_date' => $current_utc_date,
			)
		);

		$response_body = is_string( $response['body'] ) ? json_decode( $response['body'], true ) : $response['body'];

		if ( isset( $response['response']['code'] ) && $response['response']['code'] !== 200 ) {
			$error_message = isset( $response_body['message'] ) ? $response_body['message'] : 'Unknown error';
			throw new Exception( "API returned error: {$response['response']['code']} - {$error_message}" );
		}

		$order->add_order_note( __( 'Acima Digital delivery confirmed.', 'acima-leasing-payment-gateway' ) );
		WC_Gateway_Acima_Credit_Logger::debug( "Delivery confirmation successful for order {$order_id} with lease ID: {$lease_id}" );
		WC_Gateway_Acima_Credit_Logger::debug( wp_json_encode( $response_body ) );
	} catch ( Exception $e ) {
		$message = $e->getMessage();
		WC_Gateway_Acima_Credit_Logger::debug( "Error confirming delivery for order {$order_id}: " . $message );
		WC_Gateway_Acima_Credit_Logger::debug( $e->getTraceAsString() );
		/* translators: %s: error message returned by the API */
		$order->add_order_note( sprintf( __( 'Acima Digital delivery confirmation failed: %s', 'acima-leasing-payment-gateway' ), $message ) );
	}
}
add_action( 'woocommerce_order_status_changed', 'wc_acima_credit_handle_status_change', 10, 3 );

/**
 * Custom function to declare compatibility with cart_checkout_blocks feature
 */
function wc_acima_credit_declare_cart_checkout_blocks_compatibility() {
	// Check if the required class exists
	if ( class_exists( '\Automattic\WooCommerce\Utilities\FeaturesUtil' ) ) {
		// Declare compatibility for 'cart_checkout_blocks'
		\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'cart_checkout_blocks', ACIMA_CREDIT_MAIN_FILE, true );
	}
}
add_action( 'before_woocommerce_init', 'wc_acima_credit_declare_cart_checkout_blocks_compatibility' );

/**
 *
 * Registers checkout block payment method
 *
 * @return void
 */
function wc_acima_credit_register_order_approval_payment_method_type() {
	// Check if the required class exists
	if ( ! class_exists( 'Automattic\WooCommerce\Blocks\Payments\Integrations\AbstractPaymentMethodType' ) ) {
		return;
	}

	// Include the custom Blocks Checkout class
	require_once plugin_dir_path( __FILE__ ) . 'class-wc-gateway-acima-credit-block.php';

	// Hook the registration function to the 'woocommerce_blocks_payment_method_type_registration' action
	add_action(
		'woocommerce_blocks_payment_method_type_registration',
		function ( Automattic\WooCommerce\Blocks\Payments\PaymentMethodRegistry $payment_method_registry ) {
			// Register an instance of WC_Gateway_Acima_Credit_Block
			$payment_method_registry->register( new WC_Gateway_Acima_Credit_Block() );
		}
	);
}
add_action( 'woocommerce_blocks_loaded', 'wc_acima_credit_register_order_approval_payment_method_type' );
