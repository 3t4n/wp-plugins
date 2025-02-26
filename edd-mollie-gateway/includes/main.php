<?php
defined( 'ABSPATH' ) || exit;

class EDD_Mollie_Main {
	
	/**
	 * @var array
	 */
	private $gateways = array();

	/**
	 * @var EDD_Mollie_Main The single instance of the class
	 */
	protected static $_instance = null;

	/**
	 * Main Plugin Instance
	 *
	 * Ensures only one instance of plugin is loaded or can be loaded.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->gateways = EDD_Mollie()->gateways();
		
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts_styles' ) );

		add_filter( 'edd_payment_gateways', array( $this, 'register_gateway' ) );
		add_filter( 'edd_accepted_payment_icons', array( $this, 'mollie_payment_icon' ) );

		// handle legacy labels & links
		add_filter( 'edd_gateway_admin_label', array( $this, 'legacy_gateway_label' ), 10, 2 );
		add_filter( 'edd_gateway_checkout_label', array( $this, 'legacy_gateway_label_frontend' ), 10, 2 );
		add_filter( 'edd_payment_details_transaction_id-mollie_gateway', array( $this, 'legacy_transaction_link' ), 10, 2 );

		add_action( 'admin_init', array( $this, 'register_settings' ) );
		add_filter( 'edd_settings_sections_gateways', array( $this, 'settings_section_header' ) );
		add_action( 'edd_settings_tab_bottom_gateways_mollie', array( $this, 'settings_section_content' ) );
		add_action( 'wp_ajax_edd_mollie_toggle_gateway_enabled', array( $this, 'toggle_gateway_enabled' ) );
		
		add_action( 'edd_view_order_details_before', array( $this, 'refund_script' ), 100 );

		add_action( 'wp_ajax_edd_mollie_receipt_ajax_status', array( $this, 'check_order_status' ) );
		add_action( 'wp_ajax_nopriv_edd_mollie_receipt_ajax_status', array( $this, 'check_order_status' ) );

		add_action( 'admin_notices', array( $this, 'showChargebackNotices') );
		add_action( 'admin_init', array( $this, 'dismissChargebackNotices') );
		add_action( 'wp_ajax_wpo_edd_mollie_dismiss_single_chargeback', array( $this, 'dismissSingleChargebackNotice' ) );
	}

	public function register_gateway( $gateways ) {
		foreach ($this->gateways as $id => $gateway) {
			if ( $gateway->is_enabled() ) {
				$gateway->add_actions();

				// SEPA directdebit is not a frontend gateway
				if ($gateway->getMollieMethodId() == 'directdebit') {
					continue;
				}

				$gateways[$id] = array(
					'admin_label'    => $gateway->get_method_title(),
					'checkout_label' => $gateway->get_title(),
					'supports'       => $gateway->supports,
					'icons'          => array( $id ),
				);
			}
		}

		return array_merge($gateways);
	}

	/**
	 * Removes inactive gateways
	 *
	 * @param array $enabled_gateways Enabled gateways that allow purchasing.
	 * @return array
	 */
	public function disable_inactive_gateways( $enabled_gateways ) {
		return $enabled_gateways;
	}


	/**
	 * Registers settings in WP Settings API
	 */
	public function register_settings() {
		foreach ($this->gateways as $id => $gateway) {
			$gateway->register_settings();
		}
		EDD_Mollie()->settings()->register_settings();
	}

	/**
	* Add mollie section to EDD gateways tab
	*
	* @return array
	*/
	public function settings_section_header( $sections ) {
		$sections['mollie'] = __( 'Mollie', 'edd-mollie-gateway' );

		return $sections;
	}

	public function settings_section_content() {
		$gateways = $this->gateways;
		$request  = stripslashes_deep( $_GET ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended, WordPress.Security.NonceVerification.Missing
		
		if ( isset( $request['mollie_gateway'] ) && isset( $gateways[ $request['mollie_gateway'] ] ) ) {
			$gateways[ $request['mollie_gateway'] ]->admin_options();
			return;
		}
		
		$general = new Mollie_EDD_Settings_General();
		$general->admin_options();
		
		if ( function_exists( 'EDD_Recurring' ) && ! class_exists( 'EDD_Mollie_Recurring' ) ) {
			include_once EDD_MOLLIE_PLUGIN_DIR . '/includes/admin/views/pro-ad.php';
		}
		
		$general->show_method_list();
	}

	public function toggle_gateway_enabled() {
		if ( check_ajax_referer( "edd-mollie-admin", 'security', false ) === false ) {
			wp_send_json_error( 'bad_nonce' );
		}
		
		$request = stripslashes_deep( $_POST ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended, WordPress.Security.NonceVerification.Missing
		$gateway = EDD_Mollie()->get_gateway( $request['gateway_id'] );
		$enabled = $gateway->get_option( 'enabled', 'no' ) == 'yes';

		if ( $enabled === false ) {
			if ( $gateway->needs_setup() ) {
				wp_send_json_error( 'needs_setup' );
				wp_die();
			} else {
				$gateway->update_option( 'enabled', 'yes' );
				$enabled = true;
			}
		} else {
			// Disable the gateway.
			$gateway->update_option( 'enabled', 'no' );
			$enabled = false;
		}
		wp_send_json_success( $enabled );
		wp_die();
	}

	/**
	 * Make mollie payment icons for the checkout
	 *
	 * @since 1.0
	 * @param $icons Array Icon array for the EDD payment icons
	 * @return $icons Array updated icons array
	 */
	public function mollie_payment_icon( $icons )
	{
		foreach ( $this->gateways as $gateway) {
			// SEPA directdebit is not a frontend gateway
			if ($gateway->getMollieMethodId() == 'directdebit') {
				continue;
			}
			$icons[$gateway->id] = $gateway->get_method_title();
		}

		return $icons;
	}

	public function legacy_gateway_label( $label, $gateway ) {
		if ($gateway == 'mollie_gateway') {
			$label = __( 'Mollie', 'edd-mollie-gateway' );
		}
		return $label;
	}

	public function legacy_gateway_label_frontend( $label, $gateway ) {
		if ($gateway == 'mollie_gateway') {
			$label = __( 'Online payment', 'edd-mollie-gateway' );
		}
		return $label;
	}

	public function legacy_transaction_link( $transaction_id, $order_id ) {
		$url = sprintf( 'https://my.mollie.com/dashboard/payments/%s',$transaction_id );
		$link = sprintf( '<a href="%s" target="_blank">%s</a>' ,$url , $transaction_id );
		return $link;
	}

	/**
	 * Loads the JS & CSS in the settings page.
	 *
	 * @param string $hook The current admin page.
	 */
	public function admin_scripts_styles( $hook ) {
		wp_enqueue_style( 'edd-mollie-admin-styles', EDD_MOLLIE_PLUGIN_URL . 'assets/css/admin.css', array(), EDD_MOLLIE_VERSION );

		wp_enqueue_script( 'edd-mollie-admin-scripts', EDD_MOLLIE_PLUGIN_URL . 'assets/js/admin.js', array( 'jquery' ), EDD_MOLLIE_VERSION );

		wp_localize_script(
			'edd-mollie-admin-scripts',
			'edd_mollie_admin',
			array(
				'ajax_url' => esc_url( admin_url( 'admin-ajax.php' ) ),
				'nonce'    => wp_create_nonce( 'edd-mollie-admin' ),
			)
		);

	}
	
	/**
	 * Load our admin javascript for refunds.
	 *
	 * @access public
	 * @since  1.0
	 * @param  int $payment_id Payment ID.
	 * @return void
	 */
	public function refund_script( int $payment_id = 0 ): void {
		if ( empty( $payment_id ) ) {
			return;
		}

		$gateway_id = edd_get_payment_gateway( $payment_id );
		if ( empty( $gateway_id ) ) {
			return;
		}

		$gateway = EDD_Mollie()->get_gateway( $gateway_id );
		if ( ! $gateway ) {
			return;
		}

		// Don't show refund checkbox if there are chargebacks to avoid overpaying.
		$mollie_chargebacks = edd_get_payment_meta( $payment_id, '_mollie_processed_chargeback_ids', true );
		$script_handle      = 'edd-mollie-refund-scripts';

		if ( ! apply_filters( 'edd_mollie_admin_show_refund_checkbox', empty( $mollie_chargebacks ) ) ) {
			wp_dequeue_script( $script_handle );
			return;
		}

		wp_register_script(
			$script_handle,
			EDD_MOLLIE_PLUGIN_URL . 'assets/js/refund.js',
			array( 'jquery' ),
			EDD_MOLLIE_VERSION,
			true
		);

		wp_enqueue_script( $script_handle );

		wp_localize_script(
			$script_handle,
			'edd_mollie_refund',
			array(
				'refund_charge_label' => __( 'Refund Charge in Mollie', 'edd-mollie-gateway' ),
			)
		);
	}

	public function check_order_status() {
		check_ajax_referer( 'edd_mollie_receipt', 'security' );
		$status = isset( $_POST['order_id'] ) ? edd_get_payment_status( absint( $_POST['order_id'] ), true ) : false;
		if ( $status ) {
			wp_send_json_success( $status );
		} else {
			wp_send_json_error();
		}
	}

	public function dismissChargebackNotices() {
		if ( isset( $_GET['edd_mollie_dismiss_chargeback_notice'] ) && isset( $_GET['_wpnonce'] ) && wp_verify_nonce( sanitize_text_field( wp_unslash( $_GET['_wpnonce'] ) ), 'edd_mollie_dismiss_chargeback_notice_action' ) ) {
			update_option( 'edd_mollie_chargeback_notices', array() ); // clean notices
			wp_safe_redirect( esc_url_raw( remove_query_arg( 'edd_mollie_dismiss_chargeback_notice' ) ) );
			return;
		}
	}

	public function dismissSingleChargebackNotice() {
		if ( ! check_ajax_referer( 'edd-mollie-admin', 'security', false ) ) {
			wp_send_json_error( 'bad_nonce' );
		}
		
		$success = ! empty( $_POST['chargeback_id'] ) ? $this->removeChargebackNotice( sanitize_text_field( wp_unslash( $_POST['chargeback_id'] ) ) ) : false;
		if ( $success ) {
			wp_send_json_success( $success );
		} else {
			wp_send_json_error();
		}
	}

	public function showChargebackNotices() {
		$chargeback_notices = $this->getChargebackNotices();
		
		if ( ! empty( $chargeback_notices ) ) {
			$html  = '<div class="edd-mollie-chargeback-notice notice notice-error is-dismissible">';
			$html .= sprintf( '<p>%s</p>', esc_html__( 'A chargeback for the following payment(s) has been registered in Mollie:', 'edd-mollie-gateway' ) );
			$html .='<ul class="ul-square">';
			
			foreach ( $chargeback_notices as $chargeback_id => $data ) {
				$date             = date_i18n( get_option( 'date_format', 'Y-m-d' ) . ' ' . get_option( 'time_format', 'H:i' ), $data['date'] );
				$order_url        = admin_url( "edit.php?post_type=download&page=edd-payment-history&view=view-order-details&id={$data['order_id']}" );
				$order_link       = sprintf( '<a href="%s">#%s</a>', $order_url, $data['order_id'] );
				$is_current_order = isset( $_GET['id'] ) && $_GET['id'] == $data['order_id']; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
				$chargeback_link  = sprintf( '<a href="https://my.mollie.com/dashboard/payments/%s" target="_blank">%s</a>', $data['transaction'], $chargeback_id );
				$reason           = $this->getChargebackReason( $data );
				
				if ( $reason ) {
					$chargeback_notice = sprintf(
						/* translators: 1: date, 2: order link, 3: chargeback link, 4: reason */
						__( '%1$s Order %2$s, chargeback %3$s (%4$s)', 'edd-mollie-gateway' ),
						$date,
						$order_link,
						$chargeback_link,
						$reason
					);
					
				} else {
					$chargeback_notice = sprintf(
						/* translators: 1: date, 2: order link, 3: chargeback link */
						__( '%1$s Order %2$s, chargeback %3$s', 'edd-mollie-gateway' ),
						$date,
						$order_link,
						$chargeback_link
					);
				}
				
				if ( apply_filters( 'edd_mollie_enable_single_chargeback_notice_dismissal', true ) ) {
					$remove_single      = sprintf( ( '<span class="dashicons dashicons-dismiss dismiss-single-chargeback-notice" alt="%1%s" title="%1$s"></span>' ), esc_html__( 'remove from notice', 'edd-mollie-gateway' ) );
					$chargeback_notice .= $remove_single;
				}
				
				$html .= sprintf( '<li data-chargeback_id="%s" class="%s">%s</li>', $chargeback_id, $is_current_order ? 'current-order' : '', $chargeback_notice );
			}
			
			$html .= '</ul>';
			$html .= sprintf( '<p><a href="%s" class="edd-mollie-chargeback-notice-dismiss">%s</a></p>', esc_url( wp_nonce_url( add_query_arg( 'edd_mollie_dismiss_chargeback_notice', true ), 'edd_mollie_dismiss_chargeback_notice_action' ) ), esc_html__( 'Hide this message', 'edd-mollie-gateway' ) );
			$html .= '</div>';
			echo wp_kses_post( $html );
		}
	}

	public function getChargebackReason( $data ) {
		if ( empty( $data['reason'] ) || ( empty( $data['reason']['code'] && $data['reason']['description'] ) ) ) {
			return false;
		}

		// https://help.mollie.com/hc/en-us/articles/115000309865-Why-did-my-SEPA-direct-debit-payment-fail-
		$code_descriptions = array(
			'AC01' => __( 'The IBAN is incorrect or unknown', 'edd-mollie-gateway' ),
			'AC04' => __( 'Account closed', 'edd-mollie-gateway' ),
			'AC06' => __( 'Account blocked', 'edd-mollie-gateway' ),
			'AC13' => __( 'Debtor account is a consumer account', 'edd-mollie-gateway' ),
			'AG01' => __( 'Direct Debit forbidden on this account for regulatory reasons', 'edd-mollie-gateway' ),
			'AG02' => __( 'Transaction information is incorrect', 'edd-mollie-gateway' ),
			'AM04' => __( 'Insufficient funds', 'edd-mollie-gateway' ),
			'AM05' => __( 'Duplication', 'edd-mollie-gateway' ),
			'BE05' => __( 'Identifier of the Creditor incorrect', 'edd-mollie-gateway' ),
			'CNOR' => __( 'Creditor PSP is not registered under this BIC in the CSM', 'edd-mollie-gateway' ),
			'DNOR' => __( 'Debtor PSP is not registered under this BIC in the CSM', 'edd-mollie-gateway' ),
			'ED05' => __( 'Settlement of the collection failed', 'edd-mollie-gateway' ),
			'FF01' => __( 'Invalid file format', 'edd-mollie-gateway' ),
			'MD01' => __( 'Invalid mandate', 'edd-mollie-gateway' ),
			'MD02' => __( 'Mandate data missing or incorrect', 'edd-mollie-gateway' ),
			'MD06' => __( 'Disputed authorized transaction', 'edd-mollie-gateway' ),
			'MD07' => __( 'Debtor deceased', 'edd-mollie-gateway' ),
			'MS02' => __( 'Refusal by the Debtor', 'edd-mollie-gateway' ),
			'MS03' => __( 'Reason not specified', 'edd-mollie-gateway' ),
			'RC01' => __( 'PSP identifier (BIC) incorrect', 'edd-mollie-gateway' ),
			'RR01' => __( 'Regulatory reason', 'edd-mollie-gateway' ),
			'RR02' => __( 'Regulatory reason', 'edd-mollie-gateway' ),
			'RR03' => __( 'Regulatory reason', 'edd-mollie-gateway' ),
			'RR04' => __( 'Regulatory reason', 'edd-mollie-gateway' ),
			'SL01' => __( 'Bank refused direct debit', 'edd-mollie-gateway' ),
		);

		$code = ! empty( $data['reason']['code'] ) ? $data['reason']['code'] : '';
		if ( ! empty( $code_descriptions[$code] ) ) {
			$description = $code_descriptions[$code];
		} elseif ( ! empty( $data['reason']['description'] ) ) {
			$description = $data['reason']['description'];
		} else {
			$description = '';
		}

		return "{$code}: {$description}";
	}

	public function getChargebackNotices() {
		return get_option( 'edd_mollie_chargeback_notices', array() );
	}

	public function addChargebackNotice( $chargeback, $order ) {
		$chargeback_notices = $this->getChargebackNotices();
		if ( empty( $chargeback_notices[$chargeback->id] ) ) {
			$data = array(
				'order_id'    => $order->ID,
				'date'        => strtotime( $chargeback->createdAt ),
				'transaction' => $chargeback->paymentId,
			);

			if ( ! empty( $chargeback->reason ) ) {
				$data['reason'] = (array) $chargeback->reason;
			}

			$chargeback_notices[$chargeback->id] = $data;
			update_option( 'edd_mollie_chargeback_notices', $chargeback_notices );
		}
	}

	public function removeChargebackNotice( $chargeback_id ) {
		$chargeback_notices = $this->getChargebackNotices();
		if ( isset( $chargeback_notices[$chargeback_id] ) ) {
			unset( $chargeback_notices[$chargeback_id] );
			update_option( 'edd_mollie_chargeback_notices', $chargeback_notices );
			return true;
		} else {
			return false;
		}
	}

}
