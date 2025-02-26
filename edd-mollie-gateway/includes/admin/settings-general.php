<?php
/**
 * General gateway settings gateway
 *
 * @class Mollie_EDD_Settings_General
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Mollie_EDD_Settings_General extends EDD_Mollie_Settings {

	public function __construct() {
		$this->id                = 'general';
		// Load the settings.
		$this->init_form_fields();
		$this->init_settings();
		// $this->register_settings();
	}

	/**
	 * Initialise Gateway Settings Form Fields
	 */
	public function init_form_fields() {
		$this->form_fields = array(
			'edd_mollie_general_settings' => array(
				'title'             => __( 'Mollie Settings', 'edd-mollie-gateway' ),
				'type'              => 'title',
				'id'                => 'edd_mollie_general_settings',
			),
			'live_api_key' => array(
				'title'             => __( 'Live API key', 'edd-mollie-gateway' ),
				'default'           => '',
				'type'              => 'text',
				'description'       => sprintf(
					/* translators: Placeholder 1: API key mode (live or test). The surrounding %s's Will be replaced by a link to the Mollie profile */
					__('The API key is used to connect to Mollie. You can find your <strong>%1$s</strong> API key in your %2$sMollie profile%3$s', 'edd-mollie-gateway'),
					'live',
					'<a href="https://my.mollie.com/dashboard/settings/profiles" target="_blank">',
					'</a>'
				),
				'css'               => 'width: 350px',
				'placeholder'       => $live_placeholder = __('Live API key should start with live_', 'edd-mollie-gateway'),
				'custom_attributes' => array(
					'placeholder'   => $live_placeholder,
					'pattern'       => '^live_\w{30,}$',
				),
			),
			'test_api_key' => array(
				'title'             => __( 'Test API key', 'edd-mollie-gateway' ),
				'default'           => '',
				'type'              => 'text',
				'description'       => sprintf(
					/* translators: Placeholder 1: API key mode (live or test). The surrounding %s's Will be replaced by a link to the Mollie profile */
					__('The API key is used to connect to Mollie. You can find your <strong>%1$s</strong> API key in your %2$sMollie profile%3$s', 'edd-mollie-gateway'),
					'test',
					'<a href="https://my.mollie.com/dashboard/settings/profiles" target="_blank">',
					'</a>'
				),
				'placeholder'       => $test_placeholder = __('Test API key should start with test_', 'edd-mollie-gateway'),
				'css'               => 'width: 350px',
				'placeholder'       => $test_placeholder = __('Test API key should start with test_', 'edd-mollie-gateway'),
				'custom_attributes' => array(
					'placeholder'   => $test_placeholder,
					'pattern'       => '^test_\w{30,}$',
				),
			),
			'payment_locale' => array(
				'title'   => __('Payment screen language', 'edd-mollie-gateway'),
				'type'    => 'select',
				'options' => array(
					'wp_locale' => __(
							'Automatically send WordPress language',
							'edd-mollie-gateway'
						) . ' (' . __('default', 'edd-mollie-gateway') . ')',
					'detect_by_browser' => __(
						'Detect using browser language',
						'edd-mollie-gateway'
					),
					''      => '---',
					'en_US' => __('English', 'edd-mollie-gateway'),
					'nl_NL' => __('Dutch', 'edd-mollie-gateway'),
					'nl_BE' => __('Flemish (Belgium)', 'edd-mollie-gateway'),
					'fr_FR' => __('French', 'edd-mollie-gateway'),
					'fr_BE' => __('French (Belgium)', 'edd-mollie-gateway'),
					'de_DE' => __('German', 'edd-mollie-gateway'),
					'de_AT' => __('Austrian German', 'edd-mollie-gateway'),
					'de_CH' => __('Swiss German', 'edd-mollie-gateway'),
					'es_ES' => __('Spanish', 'edd-mollie-gateway'),
					'ca_ES' => __('Catalan', 'edd-mollie-gateway'),
					'pt_PT' => __('Portuguese', 'edd-mollie-gateway'),
					'it_IT' => __('Italian', 'edd-mollie-gateway'),
					'nb_NO' => __('Norwegian', 'edd-mollie-gateway'),
					'sv_SE' => __('Swedish', 'edd-mollie-gateway'),
					'fi_FI' => __('Finnish', 'edd-mollie-gateway'),
					'da_DK' => __('Danish', 'edd-mollie-gateway'),
					'is_IS' => __('Icelandic', 'edd-mollie-gateway'),
					'hu_HU' => __('Hungarian', 'edd-mollie-gateway'),
					'pl_PL' => __('Polish', 'edd-mollie-gateway'),
					'lv_LV' => __('Latvian', 'edd-mollie-gateway'),
					'lt_LT' => __('Lithuanian', 'edd-mollie-gateway'),
				),
				'desc'    => sprintf(
					__('Sending a language (or locale) is required. The option \'Automatically send WordPress language\' will try get the customer\'s language in WordPress (and respects multilanguage plugins) and convert it to a format Mollie understands. If this fails, or if the language is not supported, it will fall back to American English. You can also select one of the locales currently supported by Mollie, that will then be used for all customers.', 'edd-mollie-gateway'),
					'<a href="https://www.mollie.com/nl/docs/reference/payments/create" target="_blank">',
					'</a>'
				),
				'default' => 'wp_locale',
			),
			'store_customer_details' => array(
				'title'             => __( 'Store customer details at Mollie', 'edd-mollie-gateway' ),
				'description'       => sprintf(
					/* translators: %s: enabled value */
					__( 'Should Mollie store customers name and email address for Single Click Payments? Default <code>%s</code>. Required if Recurring Payments is being used!', 'edd-mollie-gateway' ),
					strtolower( __( 'Enabled', 'edd-mollie-gateway' ) )
				),
				'type'              => 'checkbox',
				'default'           => 'yes',
			),
			'confirm_on_return' => array(
				'title'             => __( 'Check payment status on order confirmation page', 'edd-mollie-gateway' ),
				'description'       => __( 'By default, EDD Mollie handles payment confirmation solely via webhooks - this is the most reliable method (preventing duplicate confirmations), but in some instances these webhooks may not be processed correctly by your site. This option adds an extra check on the order confirmation page. Only recommended when you have issues with the regular confirmation (or when testing on a local site)', 'edd-mollie-gateway' ),
				'type'              => 'checkbox',
				'default'           => 'no',
			),
			'enable_debug' => array(
				'title'             => __( 'Debug Log', 'edd-mollie-gateway' ),
				'description'       => __( 'Log plugin events.', 'edd-mollie-gateway' ),
				'type'              => 'checkbox',
				'default'           => 'no',
			),
		);
	}
	/**
	 * Generate Title HTML.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	public function generate_title_html() {
		$message = '<p>' . esc_html__( 'The following options are required to use the plugin and are used by all Mollie payment methods', 'edd-mollie-gateway' ) . '</p>';
		echo wp_kses_post( $message );
	}

	public function get_api_key( $mode = 'auto' ) {
		switch ($mode) {
			case 'test':
				$key = $this->get_option('test_api_key');
				break;
			case 'live':
				$key = $this->get_option('live_api_key');
				break;
			default:
			case 'auto':
				if ( edd_is_test_mode() ) {
					$key = $this->get_option('test_api_key');
				} else {
					$key = $this->get_option('live_api_key');
				}
				break;
		}
		
		return $key;
	}

	public function show_method_list() {
		$test_mode = EDD_Mollie_Helper()->settings->isTestModeEnabled();
		$mollie_enabled_methods = array();
		$all_methods = EDD_Mollie_Helper()->data->getAllPaymentMethods( $test_mode, $use_cache = false);
		foreach ( $all_methods as $mollie_method ) {
			$mollie_enabled_methods[] = $mollie_method['id'];
		}
		?>
		<table class="form-table"><tr><td>
					
		<table class="edd_mollie_gateways widefat" cellspacing="0">
			<thead>
				<tr>
					<?php
					$default_columns = array(
						'name'        => __( 'Method', 'edd-mollie-gateway' ),
						'status'      => __( 'Enabled', 'edd-mollie-gateway' ),
						'description' => __( 'Description', 'edd-mollie-gateway' ),
						'action'      => '',
					);
					$columns = apply_filters( 'edd_mollie_payment_gateways_setting_columns', $default_columns );
					foreach ( $columns as $key => $column ) {
						echo '<th class="' . esc_attr( $key ) . '">' . esc_html( $column ) . '</th>';
					}
					?>
					</tr>
			</thead>
			<tbody>
				<?php
				foreach (EDD_Mollie()->gateways() as $id => $gateway) {
					$gateway_settings_url = add_query_arg( 'mollie_gateway', $gateway->id );
					$mollie_enabled = in_array($gateway->getMollieMethodId(), $mollie_enabled_methods);
					$row_class = ! $mollie_enabled ? 'mollie-disabled' : '';
					echo '<tr data-gateway_id="' . esc_attr( $gateway->id ) . '" class="' . esc_attr( $row_class ) . '">';
					foreach ( $columns as $key => $column ) {
						if ( ! array_key_exists( $key, $default_columns ) ) {
							do_action( 'edd_mollie_payment_gateways_setting_column_' . $key, $gateway );
							continue;
						}
						$width = '';
						if ( in_array( $key, array( 'sort', 'status', 'action' ), true ) ) {
							$width = '1%';
						}
						$method_title = $gateway->getDefaultTitle() ? $gateway->getDefaultTitle() : $gateway->get_title();
						$custom_title = $gateway->get_title();
						echo '<td class="' . esc_attr( $key ) . '" width="' . esc_attr( $width ) . '">';
						switch ( $key ) {
							case 'name':
								echo '<a href="' . esc_url( $gateway_settings_url ) . '" class="edd-mollie-payment-gateway-method-title">' . wp_kses_post( $method_title ) . '</a>';
								if ( $method_title !== $custom_title ) {
									echo '<span class="edd-mollie-payment-gateway-method-name">&nbsp;&ndash;&nbsp;' . wp_kses_post( $custom_title ) . '</span>';
								}
								break;
							case 'description':
								if (!$mollie_enabled) {
									printf(
										/* Translators: %1$s and %2$s are anchor tags. */
										esc_html__( 'Disabled - Enable in your %1$sMollie profile%2$s first.', 'edd-mollie-gateway' ),
										'<a href="https://my.mollie.com/dashboard/settings/profiles" target="_blank">',
										'</a>'
									);
								} else {
									echo wp_kses_post( $gateway->get_method_description() );
								}
								break;
							case 'action':
								if ( $gateway->is_enabled() ) {
									/* Translators: %s Payment gateway name. */
									echo '<a class="button alignright" aria-label="' . sprintf( esc_html__( 'Manage the "%s" payment method', 'edd-mollie-gateway' ), $method_title ) . '" href="' . esc_url( $gateway_settings_url ) . '">' . esc_html__( 'Manage', 'edd-mollie-gateway' ) . '</a>';
								} else {
									/* Translators: %s Payment gateway name. */
									echo '<a class="button alignright" aria-label="' . sprintf( esc_html__( 'Set up the "%s" payment method', 'edd-mollie-gateway' ), $method_title ) . '" href="' . esc_url( $gateway_settings_url ) . '">' . esc_html__( 'Set up', 'edd-mollie-gateway' ) . '</a>';
								}
								break;
							case 'status':
								echo '<a class="mollie-payment-gateway-method-toggle-enabled" href="' . esc_url( $gateway_settings_url ) . '">';
								if ( $gateway->is_enabled() ) {
									$class = 'mollie-settings-input-toggle mollie-settings-input-toggle--enabled';
									$frontend_enabled = edd_get_enabled_payment_gateways();
									if (empty($frontend_enabled[$gateway->id])) {
										$class .= ' mollie-settings-input-toggle--frontend-disabled';
									}
									/* Translators: %s Payment gateway name. */
									echo '<span class="' . esc_attr( $class ) . '" aria-label="' . sprintf( esc_html__( 'The "%s" payment method is currently enabled', 'edd-mollie-gateway' ), esc_html( $method_title ) ) . '">' . esc_html__( 'Yes', 'edd-mollie-gateway' ) . '</span>';
								} else {
									/* Translators: %s Payment gateway name. */
									echo '<span class="mollie-settings-input-toggle mollie-settings-input-toggle--disabled" aria-label="' . sprintf( esc_html__( 'The "%s" payment method is currently disabled', 'edd-mollie-gateway' ), esc_html( $method_title ) ) . '">' . esc_attr__( 'No', 'edd-mollie-gateway' ) . '</span>';
								}
								echo '</a>';
								break;
						}
						echo '</td>';
					}
					echo '</tr>';
				}
				?>
			</tbody>
		</table>
		<ul class="status-table-legend">
			<li class="enabled"><?php esc_html_e('Fully enabled', 'edd-mollie-gateway'); ?></li>
			<li class="enabled frontend-disabled"><?php esc_html_e('Only webooks enabled (not available in checkout)', 'edd-mollie-gateway'); ?></li>
			<li class="disabled"><?php esc_html_e('Disabled', 'edd-mollie-gateway'); ?></li>
			<li class="disabled frontend-disabled"><?php esc_html_e('Unavailable for checkout', 'edd-mollie-gateway'); ?></li>
		</ul>
		</td></tr></table>
		<?php
	}
}