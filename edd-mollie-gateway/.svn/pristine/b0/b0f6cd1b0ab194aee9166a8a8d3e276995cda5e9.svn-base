<?php

use Mollie\Api\Types\PaymentMethod;
use Mollie\Api\Types\PaymentStatus;

abstract class Mollie_EDD_Gateway_Mollie_Abstract extends Mollie_EDD_Gateway_Abstract
{
	/**
	 * @var string
	 */
	protected $method_prefix = 'mollie_';

	/**
	 * @var string
	 */
	protected $default_title;

	/**
	 * @var string
	 */
	protected $default_description;

	/**
	 * @var bool
	 */
	protected $display_logo;

	/**
	 * @var bool
	 */
	public $supports_sepa_directdebit = false;

	/**
	 * Recurring total, zero does not define a recurring total
	 *
	 * @var int
	 */
	public $recurring_totals = 0;

	/**
	 * @var bool
	 */
	public static $alreadyDisplayedInstructions = false;

	/**
	 *
	 */
	public function __construct ()
	{
		// Derive id from class name, e.g. mollie_ideal for Mollie_EDD_Gateway_Ideal
		$this->id           = $this->method_prefix . str_replace( 'mollie_edd_gateway_', '', strtolower( get_class( $this ) ) );
		// Set gateway title (visible in admin)
		$this->method_title = 'Mollie - ' . $this->getDefaultTitle();
		$this->method_description = $this->getSettingsDescription();

		// Load the settings.
		$this->init_form_fields();
		$this->init_settings();
		// $this->register_settings();

		$this->title        = $this->get_option('title');
		$this->display_logo = $this->get_option('display_logo') == 'yes';

		$this->_initDescription();
		$this->_initIcon();

		/* Override show issuers dropdown? */
		if ( $this->get_option( 'issuers_dropdown_shown', 'yes' ) == 'no' ) {
			$this->has_fields = false;
		}

		// this probably doesn't work because the gateways are loaded before get_current_screen() is
		if (!$this->isValidForUse()) {
			// Disable gateway if it's not valid for use
			$this->enabled = false;
		}

		add_filter( 'edd_accepted_payment_'. strtolower( str_replace( ' ', '', $this->get_method_title() ) ).'_image', array( $this, 'getIconUrl' ) );
		add_filter( 'edd_payment_details_transaction_id-'.$this->id, array( $this, 'edd_transaction_link' ), 10, 2 );
		add_action( 'init', array( $this, 'redirect_return_url' ), 11 );
		add_action( 'init', array( $this, 'onWebhookAction' ), 11 ); // because EDD logging is only possible from init 10+
	}

	public function add_actions() {
		add_filter( 'edd_enabled_payment_gateways', array( $this, 'frontend_availability' ), 20 );

		add_action( 'edd_gateway_' . $this->id, array( $this, 'process_checkout' ) );
		add_action( 'edd_' . $this->id . '_cc_form', array( $this, 'gateway_checkout_fields' ) );
		add_filter( 'edd_payment_confirm_' . $this->id, array( $this, 'success_page_content' ) );
		add_action( 'edd_payment_receipt_before', array( $this, 'receipt_page_message' ), 10, 2 );
		add_action( 'edd_payment_receipt_after_table', array( $this, 'receipt_ajax_status' ), 10, 2 );

		add_action( 'edd_update_payment_status', array( $this, 'order_status_changed' ), 200, 3 );

		if ($this->paymentConfirmationAfterCoupleOfDays()) {
			add_action( 'edd_daily_scheduled_events', array( $this, 'auto_expire_orders' ) );
		}
	}

	/**
	 * Initialise Gateway Settings Form Fields
	 */
	public function init_form_fields()
	{
		$this->form_fields = array(
			'enabled' => array(
				'title'       => __('Enable/Disable', 'edd-mollie-gateway'),
				'type'        => 'checkbox',
				'label'       => sprintf(
					/* translators: %s: payment method title */
					__( 'Enable %s', 'edd-mollie-gateway' ),
					$this->getDefaultTitle()
				),
				'description' => sprintf(
					/* translators: %s: general settings link */
					__( 'When enabled, your store can receive/process payments for this method, even when it is not activated for your checkout. You can activate the method for the checkout in the %s settings section', 'edd-mollie-gateway' ),
					sprintf( '<a href="%s">%s</a>',
						admin_url( 'edit.php?post_type=download&page=edd-settings&tab=gateways' ),
						__( 'General', 'edd-mollie-gateway' )
					)
				),
				'default'     => 'no'
			),
			'title' => array(
				'title'       => __('Title', 'edd-mollie-gateway'),
				'type'        => 'text',
				'description' => sprintf(
					/* translators: %s: payment method title */
					__( 'This controls the title which the user sees during checkout. Default <code>%s</code>', 'edd-mollie-gateway' ),
					$this->getDefaultTitle()
				),
				'default'     => $this->getDefaultTitle(),
				'desc_tip'    => true,
			),
			// // disabled in favor of EDD native settings
			// 'display_logo' => array(
			// 	'title'       => __('Display logo', 'edd-mollie-gateway'),
			// 	'type'        => 'checkbox',
			// 	'label'       => __('Display logo on checkout page. Default <code>enabled</code>', 'edd-mollie-gateway'),
			// 	'default'     => 'yes'
			// ),
			'description' => array(
				'title'       => __('Description', 'edd-mollie-gateway'),
				'type'        => 'textarea',
				'description' => sprintf(
					/* translators: %s: payment method default description */
					__( 'Payment method description that the customer will see on your checkout. Default <code>%s</code>', 'edd-mollie-gateway' ),
					$this->getDefaultDescription()
				),
				'default'     => $this->getDefaultDescription(),
				'desc_tip'    => true,
			),
		);

		if ($this->paymentConfirmationAfterCoupleOfDays())
		{
			$this->form_fields['initial_order_status'] = array(
				'title'       => __('Initial order status', 'edd-mollie-gateway'),
				'type'        => 'select',
				'options'     => array(
					'processing' => edd_get_payment_status_label('processing') . ' (' . __('default', 'edd-mollie-gateway') . ')',
					'pending'    => edd_get_payment_status_label('pending'),
				),
				'default'     => 'processing',
				'description' => __('Some payment methods take longer than a few hours to complete. The initial order state is then set to this status to signify payment has been initiated.', 'edd-mollie-gateway'),
			);
		}
	}

	/**
	 * @return string
	 */
	public function getIconUrl ()
	{
		// In checkout, show the creditcards.svg with multiple logo's
		if ( $this->getMollieMethodId() == 'creditcard'  && !is_admin() ) {
			return EDD_MOLLIE_PLUGIN_URL . 'assets/images/' . $this->getMollieMethodId() . 's.svg';
		}

		return EDD_MOLLIE_PLUGIN_URL . 'assets/images/' . $this->getMollieMethodId() . '.svg';
	}

	/**
	 * @return string
	 */
	public function getIssuerIconUrl( $issuer_id ) {
		return EDD_MOLLIE_PLUGIN_URL . 'assets/images/' . $issuer_id . '.svg';
	}

	protected function _initIcon ()
	{
		if ($this->display_logo)
		{
			$default_icon = $this->getIconUrl();
			$this->icon   = apply_filters($this->id . '_icon_url', $default_icon);
		}
	}

	protected function _initDescription ()
	{
		$description = $this->get_option('description', '');

		$this->description = $description;
	}

	public function admin_options ()
	{
		if ( ! $this->enabled && count( $this->errors ) ) {
			$message = '<div class="inline error"><p><strong>' . esc_html__( 'Gateway Disabled', 'edd-mollie-gateway' ) . '</strong>: ' . implode( '<br/>', $this->errors ) . '</p></div>';
			echo wp_kses_post( $message );
		}

		parent::admin_options();
	}

	/**
	 * Check if this gateway can be used
	 *
	 * @return bool
	 */
	public function isValidForUse()
	{
		// Return if function get_current_screen() is not defined
		if ( ! function_exists( 'get_current_screen' ) ) {
			return true;
		}

		// Try getting get_current_screen()
		$current_screen = get_current_screen();
		if ( !is_admin() || ! $current_screen || empty( $current_screen->base ) ) {
			return true;
		}


		// Abort if this is not the EDD settings page
		if( 'download_page_edd-settings' !== $current_screen->base || !isset($_GET['section']) || $_GET['section'] !== 'mollie' ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			return true;
		}

		$settings = EDD_Mollie_Helper()->settings;

		if ( ! $this->isValidApiKeyProvided() ) {
			$test_mode = $settings->isTestModeEnabled();

			$this->errors[] = ( $test_mode ? __( 'Test mode enabled.', 'edd-mollie-gateway' ) . ' ' : '' ) . sprintf(
				/* translators: The surrounding %s's Will be replaced by a link to the global setting page */
					__( 'No API key provided. Please %1$sset you Mollie API key%2$s first.', 'edd-mollie-gateway' ),
					'<a href="' . $settings->getGlobalSettingsUrl() . '">',
					'</a>'
				);

			return false;
		}

		// This should be simpler, check for specific payment method in settings, not on all pages
		if ( 'null' === $this->getMollieMethod() ) {
			$this->errors[] = sprintf(
				/* translators: 1. Payment method title, 2,3. anchor tags */
				__( '%1$s not enabled in your Mollie profile. You can enabled it by editing your %2$sMollie profile%3$s.', 'edd-mollie-gateway' ),
				$this->getDefaultTitle(),
				'<a href="https://my.mollie.com/dashboard/settings/profiles" target="_blank">',
				'</a>'
			);

			return false;
		}

		if ( ! $this->isCurrencySupported() ) {
			$this->errors[] = sprintf(
			/* translators: Placeholder 1: WooCommerce currency, placeholder 2: Supported Mollie currencies */
				__( 'Current shop currency %1$s not supported by Mollie. Read more about %2$ssupported currencies and payment methods.%3$s ', 'edd-mollie-gateway' ),
				edd_get_currency(),
				'<a href="https://help.mollie.com/hc/en-us/articles/360003980013-Which-currencies-are-supported-and-what-is-the-settlement-currency-" target="_blank">',
				'</a>'
			);

			return false;
		}

		return true;
	}

	public function frontend_availability( $gateways ) {
		if ( isset( $gateways[ $this->id ] ) && ! $this->is_available() ) {
			unset( $gateways[ $this->id ] );
		}
		return $gateways;
	}

	/**
	 * Check if the gateway is available for use
	 *
	 * @return bool
	 */
	public function is_available() {

		// In EDD check if the gateway is available for use (EDD settings)
		if ( $this->enabled != 'yes' ) {
			return false;
		}

		// Only in checkout
		if ( empty( $GLOBALS['wp_query'] ) || edd_is_checkout() == false ) {
			return true;
		}

		// edd_get_cart_total() triggers multiple (unnecessary) db calls
		// (primarily heavy with EDD Software Licensing)
		// so once set, we read the property directly instead
		if ( !empty( EDD()->cart ) && !empty( EDD()->cart->total ) ) {
			$cart_total = EDD()->cart->total;
		} else {
			$cart_total = edd_get_cart_total();	
		}

		// check currency and min/max amounts
		if ( $cart_total > 0 ) {
			$currency = edd_get_currency();

			// Get current locale for this user
			$payment_locale     = EDD_Mollie_Helper()->settings->getPaymentLocale();

			$filters = array (
				'amount'         => array (
					'currency' => $currency,
					'value'    => EDD_Mollie_Helper()->data->formatCurrencyValue( $cart_total, $currency )
				),
				'resource'       => 'orders',
				'locale'         => $payment_locale,
				'sequenceType'   => \Mollie\Api\Types\SequenceType::SEQUENCETYPE_ONEOFF
			);

			// For regular payments, check available payment methods, but ignore SSD gateway (not shown in checkout)
			$status = ( $this->getMollieMethodId() !== 'directdebit' ) ? $this->isAvailableMethodInCheckout( $filters ) : false;

			// Do extra checks if EDD Recurring is installed
			if ( function_exists( 'edd_recurring' ) && edd_recurring()->cart_contains_recurring() ) {
				// TODO: Check recurring totals against recurring payment methods for future renewal payments
				// $recurring_totals = $this->get_recurring_total();

				if ( ! $this->supports( 'subscriptions' ) ) {
					return false;
				}
			}

			return $status;

		}

		return true;
	}

	/**
	 * Will the payment confirmation be delivered after a couple of days.
	 *
	 * Overwrite this method for payment gateways where the payment confirmation takes a couple of days.
	 * When this method return true, a new setting will be available where the merchant can set the initial
	 * payment state: on-hold or pending
	 *
	 * @return bool
	 */
	protected function paymentConfirmationAfterCoupleOfDays ()
	{
		return false;
	}

	public function auto_expire_orders() {
		$expire_status = $this->get_option( 'initial_order_status', 'processing' );
		$expiry_days   = $this->get_option( 'expiry_days' );
		if ( !empty( $expiry_days ) && absint( $expiry_days ) > 0 ) {
			$orders = edd_get_payments( array(
				'gateway'  => $this->id,
				'end_date' => gmdate( 'Y-m-d', strtotime( "- {$expiry_days} weekdays" ) ),
				'status'   => $expire_status,
				'fields'   => 'ids',
			));
			if (!empty($orders)) {
				foreach ($orders as $order_id) {
					edd_update_payment_status( $order_id, 'abandoned' );
					edd_mollie_debug_log( 'Order expired', $order_id );
				}
			}
		}

	}

	/**
	 * Remove creditcard from from checkout screen since
	 * we're redirecting to Mollie checkout screen
	 *
	 * @since 1.0
	 * @return void
	 */
	public function gateway_checkout_fields() {
		return;
	}

	/**
	 * AJAX update status on receipt page when order hasn't been completed but was expected to be
	 *
	 * @param object $order        download WP Post object
	 * @param array  $receipt_args receipt shortcode args
	 *
	 * @return void
	 */
	public function receipt_ajax_status( $order, $receipt_args ) {
		$order = EDD_Mollie_Helper()->data->getEddOrder( $order->ID );
		if ( $order->gateway == $this->id && !$this->paymentConfirmationAfterCoupleOfDays() && $this->orderNeedsPayment( $order ) ) {
			$script_data = array(
				'status'   => edd_get_payment_status( absint( $order->ID ), true ),
				'order_id' => $order->ID,
				'ajax_url' => esc_url( admin_url( 'admin-ajax.php' ) ),
				'nonce'    => wp_create_nonce( 'edd_mollie_receipt' ),
			);
			wp_add_inline_script( 'edd-mollie-inline-script', 'var edd_mollie_receipt = ' . wp_json_encode( $script_data ) . ';' );
			wp_enqueue_script( 'edd-mollie-receipt-ajax-status', EDD_MOLLIE_PLUGIN_URL . 'assets/js/receipt-ajax-status.js', array(), EDD_MOLLIE_VERSION, true );
		}
	}

	public function receipt_page_message( $order, $receipt_args ) {
		return;
	}

	public function success_page_content( $content ) {
		return $content;
	}


	/**
	 * @param int $order_id
	 *
	 * @throws \Mollie\Api\Exceptions\ApiException
	 * @return array
	 */
	public function process_checkout( $purchase_data, $verify_nonce = true ) {
		if( $verify_nonce && ! wp_verify_nonce( $purchase_data['gateway_nonce'], 'edd-gateway' ) ) {
			wp_die( esc_html__( 'Nonce verification has failed', 'edd-mollie-gateway' ), esc_html__( 'Error', 'edd-mollie-gateway' ), array( 'response' => 403 ) );
		}

		/*
		* Purchase data comes in like this
		*
		$purchase_data = array(
			'downloads' => array of download IDs,
			'price' => total price of cart contents,
			'purchase_key' =>  // Random key
			'user_email' => $user_email,
			'date' => date('Y-m-d H:i:s'),
			'user_id' => $user_id,
			'post_data' => $_POST,
			'user_info' => array of user's information and used discount code
			'cart_details' => array of cart details,
		);
		*/

		$order_data = array(
			'price'        => $purchase_data['price'],
			'date'         => $purchase_data['date'],
			'user_email'   => $purchase_data['user_email'],
			'purchase_key' => $purchase_data['purchase_key'],
			'currency'     => edd_get_currency(),
			'downloads'    => $purchase_data['downloads'],
			'user_info'    => $purchase_data['user_info'],
			'cart_details' => $purchase_data['cart_details'],
			'status'       => 'pending',
		);
		// Record the pending payment
		$order_id = edd_insert_payment( $order_data );
		$this->process_payment( $order_id );
	}

	/**
	 * @param int $order_id
	 *
	 * @throws \Mollie\Api\Exceptions\ApiException
	 * @return array
	 */
	public function process_payment( $order_id ) {
		// Check payment
		if ( ! $order_id ) {
			// Record the error
			edd_record_gateway_error( __( 'Payment Error', 'edd-mollie-gateway' ), __( 'Payment creation failed before sending buyer to Mollie', 'edd-mollie-gateway' ), $order_id );
			// Problems? send back
			edd_send_back_to_checkout();
		} else {
			$order = new \EDD_Payment( $order_id );
			// Only send to Mollie if the pending payment is created successfully
			// Set the session data to recover this payment in the event of abandonment or error.
			EDD()->session->set( 'edd_resume_payment', $order_id );

			try {
				$test_mode       = EDD_Mollie_Helper()->settings->isTestModeEnabled();
				$settings_helper = EDD_Mollie_Helper()->settings;
				$total           = apply_filters( 'edd_mollie_payment_total', floatval( $order->total ), $order, $this );

				$paymentRequestData = array (
					'amount'      => array (
						'currency' => EDD_Mollie_Helper()->data->getOrderCurrency( $order ),
						'value'    => EDD_Mollie_Helper()->data->formatCurrencyValue( $total, EDD_Mollie_Helper()->data->getOrderCurrency( $order ) )
					),
					'description' => __( 'Order', 'edd-mollie-gateway' ) . ' ' . $order->ID,
					'redirectUrl' => $this->getReturnUrl( $order ),
					'webhookUrl'  => $this->getWebhookUrl( $order ),
					'method'      => $this->getMollieMethodId(),
					'issuer'      => $this->getSelectedIssuer(),
					'locale'      => $settings_helper->getPaymentLocale(),
					'metadata'    => array (
						'order_id' => $order->ID,
					),
				);
				if ( $settings_helper->shouldStoreCustomer() ) {
					$customer_id = $this->getUserMollieCustomerId( $order, $test_mode );
					$paymentRequestData['customerId'] = $customer_id;
				}

				$paymentRequestData = apply_filters( 'edd_mollie_' . $this->id . '_args', $paymentRequestData, $order, $this );

				try {
					// Only enable this for hardcore debugging!
					//edd_mollie_debug_log( $paymentRequestData, $order_id );

					// Try as simple payment
					$payment_object = EDD_Mollie_Helper()->api->getApiClient( $test_mode )->payments->create( $paymentRequestData );
				}
				catch ( Mollie\Api\Exceptions\ApiException $e ) {
					throw $e;
				}


				edd_set_payment_transaction_id( $order_id, $payment_object->id );

				$this->saveMollieInfo( $order, $payment_object );

				if ( $this->paymentConfirmationAfterCoupleOfDays() ) {
					$initial_order_status = $this->get_option( 'initial_order_status', 'processing' );
					$order->status = $initial_order_status;
					$order->save();
				}
				
				$this->edd_mailchimp_checkout_subscription( $order );

				do_action( 'edd_mollie_payment_created', $payment_object, $order );

				edd_mollie_debug_log( 'Mollie payment object ' . $payment_object->id . ' (' . $payment_object->mode . ') created', $order_id );

				$payment_method_title = $this->getPaymentMethodTitle($payment_object);

				$order->add_note( sprintf(
				/* translators: Placeholder 1: Payment method title, placeholder 2: payment ID */
					__( '%1$s payment started (%2$s).', 'edd-mollie-gateway' ),
					$payment_method_title,
					$payment_object->id . ( $payment_object->mode == 'test' ? ( ' - ' . __( 'test mode', 'edd-mollie-gateway' ) ) : '' )
				) );

				edd_mollie_debug_log( "Redirect user to Mollie Checkout URL: " . $payment_object->getCheckoutUrl(), $order_id );

				// Get payment URL to process payment
				try {
					$payment_redirect = $this->getProcessPaymentRedirect( $order, $payment_object );
				} catch ( \Mollie\Api\Exceptions\ApiException $e ) {
					echo "API call failed: " . esc_html( $e->getMessage() );
				}

				if ( $this->get_option('skip_mollie_payment_screen') == 'yes' ) {
					// send directly to purchase receipt page
					$this->send_to_success_page( array( 'gateway' => $this->id, 'payment_key' => $order->key ) );
				} else {
					// Redirect to Mollie
					wp_redirect($payment_redirect);
				}
				exit;
			}
			catch ( Mollie\Api\Exceptions\ApiException $e ) {
				edd_mollie_debug_log( 'Failed to create Mollie payment object: ' . $e->getMessage(), $order_id );

				wp_die();
			}

			return array ( 'result' => 'failure' );
		}

	}

	/**
	 * Process the Mollie Payment notification
	 * Use the transaction ID to retrieve the payment
	 * Update the EDD order payment status
	 *
	 * @since 1.0
	 * @global $edd_options array of all the EDD Options
	 * @return array
	 */

	public function redirect_return_url()
	{
		$request = stripslashes_deep( $_GET ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		
		if ( $this->enabled && isset( $request['payment-confirmation'] ) && $this->id == $request['payment-confirmation'] ) {

			if (empty($request['order-id'])) {
				return;
			}
			$order    = new \EDD_Payment( absint($request["order-id"]) );

			$mollie_trans_id = $order->transaction_id;

			$test_mode       = EDD_Mollie_Helper()->data->getActiveMolliePaymentMode( $order->ID ) == 'test';
			$payment_object  = EDD_Mollie_Helper()->api->getApiClient( $test_mode )->payments->get( $mollie_trans_id );

			$params = array(
				'payment-status'        => $payment_object->status,
				'mollie-id'             => $payment_object->id,
				'gateway'               => $this->getMollieMethodId(),
				'order-id'              => $order->ID,
				'payment_key'           => $order->key,
			);

			edd_mollie_debug_log( "Customer returned from Mollie, payment status: " . $payment_object->status, $order->ID );

			// By default, we're not updating the order status here to prevent a race condition,
			// so normally this is handled only by the webhook (probably before we got here)
			// UNLESS the confirm_on_return override is enabled
			if ( EDD_Mollie()->settings()->get_option( 'confirm_on_return' ) === 'yes' ) {
				$this->processOrderPaymentStatus( $order, $payment_object, 'redirect' );
			}

			switch ($payment_object->status) {
				case PaymentStatus::STATUS_CANCELED :
					wp_redirect( edd_get_checkout_uri() );
					edd_die();
					break;
				case PaymentStatus::STATUS_FAILED :
				case PaymentStatus::STATUS_EXPIRED :
					$this->send_to_failed_page(array_slice($params, 2));
					break;
				default :
				case PaymentStatus::STATUS_PAID :
				case PaymentStatus::STATUS_PENDING :
				case PaymentStatus::STATUS_OPEN :
					edd_empty_cart();
					$this->send_to_success_page(array_slice($params, 2));
					break;
			}
		}
	}

	public function send_to_failed_page( $args = array() ) {
		$redirect = add_query_arg( wp_parse_args( $args ), edd_get_failed_transaction_uri() );
		wp_redirect( apply_filters( 'edd_mollie_send_to_failed_page', esc_url_raw( $redirect ), $args ) );
		edd_die();
	}

	public function send_to_success_page( $args = array() ) {
		$redirect = add_query_arg( wp_parse_args( $args ), edd_get_success_page_uri() );
		wp_redirect( apply_filters( 'edd_mollie_send_to_success_page', esc_url_raw( $redirect ), $args ) );
		edd_die();
	}

	public function onWebhookAction() {
		$request = stripslashes_deep( $_REQUEST ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		
		if ( ! $this->enabled ) {
			return;
		}
		
		if( empty( $request['edd-listener'] ) || $this->id !== $request['edd-listener'] ) {
			return;
		}

		if ( ! isset($request['id']) || strpos( $request['id'], 'tr_' ) === false ) {
			return;
		}

		// Webhook test by Mollie
		if ( isset( $request['testByMollie'] ) ) {
			edd_mollie_debug_log( $this->getMollieMethodId() . ': Webhook tested by Mollie.', null, null, true);
			return;
		}

		if (empty($request['order-id']) || empty($request['order-key'])) {
			edd_mollie_debug_log( $this->getMollieMethodId() . ":  No order ID or order key provided." );
			return;
		}

		$order_id = !empty($request['order-id']) ? absint($request["order-id"]) : 0;
		$order = new \EDD_Payment( $order_id );

		if (!$order) {
			edd_mollie_debug_log( $this->getMollieMethodId() . ":  Could not find order $order_id.", $order_id );
			return;
		}

		$transaction_id = $order->transaction_id;
		try {
			$test_mode       = EDD_Mollie_Helper()->data->getActiveMolliePaymentMode($order_id) == 'test';
			$payment_object  = EDD_Mollie_Helper()->api->getApiClient( $test_mode )->payments->get( $transaction_id );
		} catch ( \Mollie\Api\Exceptions\ApiException $e ) {
			edd_mollie_debug_log( sprintf( "Error %s processing payment %s: %s", $e->getCode(), $transaction_id, $e->getMessage() ), $order_id );
			http_response_code(500);
			die();
			return;
		}

		$this->processOrderPaymentStatus( $order, $payment_object, 'webhook' );
	}

	public function processOrderPaymentStatus( $order, $payment_object, $context ) {
		$order_id       = $order->ID;
		$transaction_id = $order->transaction_id;

		if ( $order_id != $payment_object->metadata->order_id ) {
			edd_mollie_debug_log( $this->getMollieMethodId() . ": EDD Payment ID does not match order_id in payment metadata. Mollie: {$payment_object->metadata->order_id}, EDD: {$order_id}", $order_id );
			return;
		}

		// TODO: maybe check payment ID with mollie meta $payment_object->metadata->order_id
		// $posted_trans_id = sanitize_text_field($_POST['id']);

		edd_mollie_debug_log( "Processing payment status:\n".$payment_object->status, $order_id );

		switch ($payment_object->status) {
			case PaymentStatus::STATUS_PAID :
				if ( ! $this->orderNeedsPayment( $order ) ) {
					// Check and process a possible refund or chargeback
					$refunds = $this->processRefunds( $order, $payment_object );
					$chargebacks = $this->processChargebacks( $order, $payment_object );
					
					// possible duplicate webhook
					if (empty($refunds) && empty($chargebacks)) {
						edd_mollie_debug_log( "Payment already processed (tried with {$transaction_id})", $order_id );
					} else {
						$order->save();
					}
					return;
				}
				do_action( 'edd_mollie_order_paid', $payment_object, $order );
				$order->status = 'complete';
				break;
			case PaymentStatus::STATUS_FAILED :
				$this->onWebhookFailed( $order, $payment_object );
				break;
			case PaymentStatus::STATUS_EXPIRED :
				$this->onWebhookExpired( $order, $payment_object );
				break;
			case PaymentStatus::STATUS_CANCELED :
				$this->onWebhookCanceled( $order, $payment_object );
				break;
		}

		$order->save();
	}

	/**
	 * @param $order
	 * @param $payment
	 */
	protected function saveMollieInfo( $order, $payment ) {
		$order->update_meta( '_mollie_payment_mode', $payment->mode );
		// // Get correct Mollie Payment Object
		// $payment_object = EDD_Mollie_Helper()->paymentfactory->getPaymentObject( $payment );

		// // Set active Mollie payment
		// $payment_object->setActiveMolliePayment( $order->id );

		// // Get Mollie Customer ID
		// $mollie_customer_id = $payment_object->getMollieCustomerIdFromPaymentObject( $payment_object->data->id );

		// // Set Mollie customer
		// EDD_Mollie_Helper()->data->setUserMollieCustomerId( $order->customer_user, $mollie_customer_id );
	}

	/**
	 * @param $order
	 * @param $test_mode
	 * @return null|string
	 */
	protected function getUserMollieCustomerId( $order, $test_mode )
	{
		// EDD Customer ID = $order->customer_id
		// WP User ID = $order->user_id
		return  EDD_Mollie_Helper()->data->getUserMollieCustomerId($order->user_id, $test_mode);
	}

	/**
	 * Redirect location after successfully completing process_payment
	 *
	 * @param WC_Order                                            $order
	 * @param \Mollie_EDD_Payment_Order|\Mollie_EDD_Payment_Payment $payment_object
	 *
	 * @return string
	 */
	protected function getProcessPaymentRedirect( $order, $payment_object )
	{
		/*
		 * Redirect to payment URL
		 */
		return $payment_object->getCheckoutUrl();
	}

	/**
	 * @param EDD_Payment $order
	 * @param string $new_status
	 * @param string $note
	 */
	public function updateOrderStatus ( $order, $new_status, $note = '' )
	{
		$order->update_status($new_status);
		if (!empty($note)) {
			$order->add_note($note);
		}
	}

	/**
	 * @param EDD_Payment                  $order
	 * @param Mollie\Api\Resources\Payment $payment
	 */
	public function onWebhookCanceled( $order, $payment ) {
		// Add messages to log
		edd_mollie_debug_log( $this->getMollieMethodId() . " Payment {$payment->id} canceled ", $order->ID );

		// User cancelled payment on Mollie or issuer page, add a cancel note.. do not cancel order.
		$order->add_note( sprintf(
		/* translators: Placeholder 1: payment method title, placeholder 2: payment ID */
			__( '%1$s payment (%2$s) cancelled .', 'edd-mollie-gateway' ),
			$this->get_title(),
			$payment->id . ( $payment->mode == 'test' ? ( ' - ' . __( 'test mode', 'edd-mollie-gateway' ) ) : '' )
		) );

		// should we update the order status?
		// $order->status = 'revoked';
	}

	/**
	 * @param EDD_Payment                  $order
	 * @param Mollie\Api\Resources\Payment $payment
	 */
	public function onWebhookFailed( $order, $payment ) {

		if ( empty( $payment ) || empty( $order ) ) {
			return;
		}

		// Add messages to log
		edd_mollie_debug_log( $this->getMollieMethodId() . " Payment {$payment->id} failed ", $order->ID );

		$bankPayments = array(
			'directdebit',
			'banktransfer',
		);

		if( in_array( $payment->method, $bankPayments ) ) {
			$note = 'Payment failed with reason: ' . $payment->details->bankReasonCode . '. Please contact the customer. Explanations of reasoncodes can be found in the Mollie API Docs';
		} else {
			$payment_method_title = $this->getPaymentMethodTitle( $payment );
			$note = sprintf(
			/* translators: Placeholder 1: payment method title, placeholder 2: payment ID */
				__( '%1$s payment failed via Mollie (%2$s).', 'edd-mollie-gateway' ),
				$payment_method_title,
				$payment->id . ( $payment->mode == 'test' ? ( ' - ' . __( 'test mode', 'edd-mollie-gateway' ) ) : '' )
			);
		}
	}

	/**
	 * @param EDD_Payment                  $order
	 * @param Mollie\Api\Resources\Payment $payment
	 */
	public function onWebhookExpired( $order, $payment ) {

		// Check that this payment is the most recent, based on Mollie Payment ID from post meta, do not cancel the order if it isn't
		if ( $order->transaction_id != $payment->id ) {
			$message = sprintf(
			/* translators: 1. payment method title, 2. payment ID, 3. transaction ID */
				__( '%1$s payment expired (%2$s) but order not cancelled because of another pending payment (%3$s).', 'edd-mollie-gateway' ),
				$this->get_title(),
				$payment->id . ( $payment->mode == 'test' ? ( ' - ' . __( 'test mode', 'edd-mollie-gateway' ) ) : '' ),
				$order->transaction_id
			);

			edd_mollie_debug_log( $message, $order->ID );
			$order->add_note( $message );
			return;
		}

		// Update order status, but only if there is no payment started by another gateway
		if ( $order->gateway == $this->id ) {
			$order->status = 'abandoned';
		} else {
			$message = sprintf(
			/* translators: Placeholder 1: old method title, placeholder 2: new method */
				__( 'Mollie webhook for %1$s called, but payment also started via %2$s, so the order status is not updated.', 'edd-mollie-gateway' ),
				$this->get_title(),
				edd_get_gateway_admin_label( $order->gateway )
			);

			edd_mollie_debug_log( $message, $order->ID );
			$order->add_note( $message );
		}

		$order->add_note( sprintf(
		/* translators: Placeholder 1: payment method title, placeholder 2: payment ID */
			__( '%1$s payment expired (%2$s).', 'edd-mollie-gateway' ),
			$this->get_title(),
			$payment->id . ( $payment->mode == 'test' ? ( ' - ' . __( 'test mode', 'edd-mollie-gateway' ) ) : '' )
		) );

	}

	/**
	 * @param EDD_Payment                                             $order
	 * @param Mollie\Api\Resources\Payment|Mollie\Api\Resources\Order $payment
	 */
	public function processRefunds( $order, $payment ) {
		// Make sure there are refunds to process at all
		if ( false === $payment->hasRefunds() ) {
			return;
		}

		try {
			// Get all refunds for this payment
			$refunds = $payment->refunds();

			// Collect all refund IDs in one array
			$refund_ids = array ();
			foreach ( $refunds as $refund ) {
				$refund_ids[] = $refund->id;
			}

			edd_mollie_debug_log( $this->getMollieMethodId() . ': All refund IDs: ' . wp_json_encode( $refund_ids ), $order->ID );

			// Get possibly already processed refunds
			$processed_refund_ids = $order->get_meta( '_mollie_processed_refund_ids', true );
			if ( empty($processed_refund_ids) ) {
				$processed_refund_ids = array ();
			} else {
				$processed_refund_ids = array_filter($processed_refund_ids);
				edd_mollie_debug_log( $this->getMollieMethodId() . ': Already processed refunds: ' . wp_json_encode( $processed_refund_ids ), $order->ID );
			}

			$new_refund_ids = array_diff( $refund_ids, $processed_refund_ids );
			if (empty($new_refund_ids)) {
				// no new refunds to process
				edd_mollie_debug_log( $this->getMollieMethodId() . ': No new refunds to process', $order->ID );
				return;
			}

			// update list of processed refund ids
			$order->update_meta( '_mollie_processed_refund_ids', $refund_ids );

			$total_refunded_amount = 0.0;
			foreach ( $refunds as $refund ) {
				$refunded_amount = floatval($refund->amount->value);
				$total_refunded_amount += $refunded_amount;
				if (in_array($refund->id, $new_refund_ids) ) {
					// check if we need to change anything to the EDD order status
					if ($order->status == 'refunded') {
						edd_mollie_debug_log( $this->getMollieMethodId() . ': Order already set to refunded', $order->ID );
					} else {
						// check if this is the full order amount
						if ( round( $refunded_amount, 2 ) == round( $order->total, 2 ) ) {
							$order->status = 'refunded';
							$order->add_note( sprintf(
								/* translators: refund ID */
								__( 'New refund %s created in Mollie Dashboard, order refunded!', 'edd-mollie-gateway' ),
								$refund->i
							) );
						} else {
							$order->add_note( sprintf(
								/* translators: refund ID */
								__( 'Partial refund %s created in Mollie Dashboard!', 'edd-mollie-gateway' ),
								$refund->id
							) );
						}
					}
				}
			}

			// if we haven't set the order refunded yet, but the total of refunds adds up to a full refund make combined full refund
			if ( $order->status !== 'refunded' && ( round( $total_refunded_amount, 2 ) == round( $order->total, 2 ) ) ) {
				$order->status = 'refunded';
				$order->add_note( sprintf(
					/* translators: refund IDs */
					__( 'Multiple refunds %s created in Mollie Dashboard, order fully refunded!', 'edd-mollie-gateway' ),
					wp_json_encode( $refund_ids )
				) );
			}

			edd_mollie_debug_log( $this->getMollieMethodId() . ': Updated, all processed refunds:' . wp_json_encode( $new_refund_ids ), $order->ID );

			do_action( 'edd_mollie_refunds_processed', $payment, $order );

			return $new_refund_ids;
		}
		catch ( \Mollie\Api\Exceptions\ApiException $e ) {
			edd_mollie_debug_log( $this->getMollieMethodId() . ": Could not load refunds for $payment->id: " . $e->getMessage() . ' (' . get_class( $e ) . ')' );
		}
	}

	/**
	 * @param EDD_Payment                                             $order
	 * @param Mollie\Api\Resources\Payment|Mollie\Api\Resources\Order $payment
	 */
	public function processChargebacks( $order, $payment ) {
		// Make sure there are refunds to process at all
		if ( false === $payment->hasChargebacks() ) {
			return;
		}

		try {
			// Get all chargebacks for this payment
			$chargebacks = $payment->chargebacks();

			// Collect all chargeback IDs in one array
			$chargeback_ids = array ();
			foreach ( $chargebacks as $chargeback ) {
				$chargeback_ids[] = $chargeback->id;
			}

			edd_mollie_debug_log( $this->getMollieMethodId() . ': All chargeback IDs: ' . wp_json_encode( $chargeback_ids ), $order->ID );

			// Get possibly already processed chargebacks
			$processed_chargeback_ids = $order->get_meta( '_mollie_processed_chargeback_ids', true );
			if ( empty($processed_chargeback_ids) ) {
				$processed_chargeback_ids = array();
			} else {
				$processed_chargeback_ids = array_filter($processed_chargeback_ids);
				edd_mollie_debug_log( $this->getMollieMethodId() . ': Already processed chargebacks: ' . wp_json_encode( $processed_chargeback_ids ), $order->ID );
			}

			$new_chargeback_ids = array_diff( $chargeback_ids, $processed_chargeback_ids );
			if (empty($new_chargeback_ids)) {
				// no new chargebacks to process
				edd_mollie_debug_log( $this->getMollieMethodId() . ': No new chargebacks to process', $order->ID );
				return;
			}

			// update list of processed chargeback ids
			$order->update_meta( '_mollie_processed_chargeback_ids', $chargeback_ids );

			$total_chargeback_amount = 0.0;
			foreach ( $chargebacks as $chargeback ) {
				// add admin notice
				EDD_Mollie_Main::instance()->addChargebackNotice( $chargeback, $order );
				$chargeback_amount = floatval($chargeback->amount->value);
				$total_chargeback_amount += $chargeback_amount;
				if (in_array($chargeback->id, $new_chargeback_ids) ) {
					// check if this is the full order amount
					if ( round( $chargeback_amount, 2 ) == round( $order->total, 2 ) ) {
						$order->add_note( sprintf(
							/* translators: chargeback ID */
							__( 'Full chargeback %s reported by Mollie', 'edd-mollie-gateway' ),
							$chargeback->id
						) );
					} else {
						$order->add_note( sprintf(
							/* translators: chargeback ID */
							__( 'Partial chargeback %s reported by Mollie', 'edd-mollie-gateway' ),
							$chargeback->id
						) );
					}
				}
			}

			edd_mollie_debug_log( $this->getMollieMethodId() . ': Updated, all processed chargebacks:' . wp_json_encode( $new_chargeback_ids ), $order->ID );

			do_action( 'edd_mollie_chargebacks_processed', $payment, $order );

			return $new_chargeback_ids;
		}
		catch ( \Mollie\Api\Exceptions\ApiException $e ) {
			edd_mollie_debug_log( $this->getMollieMethodId() . ": Could not process chargebacks for $payment->id: " . $e->getMessage() . ' (' . get_class( $e ) . ')' );
		}

	}

	public function order_status_changed( $order_id, $new_status, $old_status ) {
		$request    = stripslashes_deep( $_POST ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended, WordPress.Security.NonceVerification.Missing
		$order_id = absint( $order_id );

		// order attributes sidebar refund
		if ( 'refunded' == $new_status && in_array( $old_status, $this->get_paid_statuses() ) && ! empty( $request['edd_refund_in_mollie'] ) ) {
			$this->process_refund( $order_id );
		
		// EDD3 initialize refund modal
		} elseif ( ! empty( $request['action'] ) && $request['action'] == 'edd_process_refund_form' && ! empty( $request['data'] ) ) {
			parse_str( $request['data'], $refund_data );
			if ( ! empty( $refund_data['edd_refund_in_mollie'] ) && ! empty( $refund_data['refund_order_item'] ) && is_array( $refund_data['refund_order_item'] ) ) {
				$refund_amount = 0;
				foreach ( $refund_data['refund_order_item'] as $refund_item ) {
					if ( is_array( $refund_item ) ) {
						$quantity       = ! empty( $refund_item['quantity'] ) ? intval( $refund_item['quantity'] ) : 0;
						$subtotal       = ! empty( $refund_item['subtotal'] ) ? floatval( $refund_item['subtotal'] ) : 0;
						$refund_amount += floatval( $subtotal * $quantity );
					}
				}
				if ( $refund_amount > 0 ) {
					$this->process_refund( $order_id, (float) $refund_amount );
				}
			}
		}
		
		return;
	}

	/**
	 * @param $payment
	 * @return string
	 */
	protected function getPaymentMethodTitle( $payment )
	{
		// TODO David: this needs to be updated, doesn't work in all cases?
		$payment_method_title = '';
		
		if ( is_object( $payment ) && $payment->method == $this->getMollieMethodId() ) {
			$payment_method_title = $this->get_title();
		}
		return $payment_method_title;
	}

	/**
	 * Process a refund if supported
	 *
	 * @param int    $order_id
	 * @param float  $amount
	 * @param string $reason
	 *
	 * @return bool|wp_error True or false based on success, or a WP_Error object
	 * @since WooCommerce 2.2
	 */
	public function process_refund( $order_id, $amount = null, $reason = '' ) {
		$order = EDD_Mollie_Helper()->data->getEddOrder( $order_id );

		// EDD order not found
		if ( ! $order ) {
			$error_message = "Could not find EDD order $order_id.";

			edd_mollie_debug_log( $this->getMollieMethodId() . ': ' . $error_message);

			return new WP_Error( '1', $error_message );
		}

		if ( $order->gateway != $this->id ) {
			return; // no business here
		}

		try {
			$test_mode        = EDD_Mollie_Helper()->data->getActiveMolliePaymentMode( $order_id ) == 'test';
			$payment_object   = EDD_Mollie_Helper()->api->getApiClient( $test_mode )->payments->get( $order->transaction_id );

			if ( ! $payment_object ) {
				$error_message = "Can\'t process refund. Could not find Mollie Payment object data for order $order_id.";
				edd_mollie_debug_log( $this->getMollieMethodId() . ': ' . $error_message, $order->ID );

				return new WP_Error( '1', $error_message);
			}

			if ( ! $payment_object->isPaid() ) {
				$error_message = "Can not refund payment $payment_object->id for WooCommerce order $order_id as it is not paid.";
				edd_mollie_debug_log( $this->getMollieMethodId() . ': ' . $error_message, $order->ID );

				return new WP_Error( '1', $error_message );
			}

			if (empty($amount)) {
				$amount_data = (array) $payment_object->amount;
				$amount = $amount_data['value'];
			} else {
				$amount_data = array (
					'currency' => EDD_Mollie_Helper()->data->getOrderCurrency( $order ),
					'value'    => EDD_Mollie_Helper()->data->formatCurrencyValue( $amount, EDD_Mollie_Helper()->data->getOrderCurrency( $order ) )
				);		
			}

			edd_mollie_debug_log( sprintf(
				'%s: Create refund - payment: %s, amount: %s, reason: %s',
				$this->getMollieMethodId(),
				$payment_object->id,
				$amount,
				$reason
			), $order->ID );

			do_action( 'edd_mollie_create_refund', $payment_object, $order );

			// Send refund to Mollie
			$refund = EDD_Mollie_Helper()->api->getApiClient( $test_mode )->payments->refund( $payment_object, array (
				'amount'      => $amount_data,
				'description' => $reason
			) );

			edd_mollie_debug_log( $this->getMollieMethodId() . ': Refund created', $order->ID );

			$order->add_note( sprintf(
			/* translators: Placeholder 1: currency, placeholder 2: refunded amount, placeholder 3: optional refund reason, placeholder 4: payment ID, placeholder 5: refund ID */
				__( 'Refunded %1$s%2$s%3$s - Payment: %4$s, Refund: %5$s', 'edd-mollie-gateway' ),
				EDD_Mollie_Helper()->data->getOrderCurrency( $order ),
				$amount,
				( ! empty( $reason ) ? ' (reason: ' . $reason . ')' : '' ),
				$refund->paymentId,
				$refund->id
			) );

			$refund_ids = $order->get_meta( '_mollie_processed_refund_ids', true );
			if ( empty($refund_ids) ) {
				$refund_ids = array();
			} else {
				$refund_ids = array_filter( $refund_ids );
			}

			$refund_ids[] = $refund->id;

			// update list of processed refund ids
			$order->update_meta( '_mollie_processed_refund_ids', $refund_ids );

			do_action( 'edd_mollie_refund_created', $payment_object, $refund, $order );

			return true;
		}
		catch ( \Mollie\Api\Exceptions\ApiException $e ) {
			edd_mollie_debug_log( 'Error refunding: ' . $e->getMessage(), $order->ID );
			return new WP_Error( 1, $e->getMessage() );
		}
	}

	/**
	 * Output for the order received page.
	 */
	public function thankyou_page ( $order_id ) {
		$order = EDD_Mollie_Helper()->data->getEddOrder( $order_id );

		// Order not found
		if (!$order) {
			return;
		}

		// Same as email instructions, just run that
		$this->displayInstructions( $order, $admin_instructions = false, $plain_text = false );
	}

	/**
	 * Add content to the EDD emails.
	 *
	 * @param EDD_Payment $order
	 * @param bool        $admin_instructions (default: false)
	 * @param bool        $plain_text         (default: false)
	 *
	 * @return void
	 */
	public function displayInstructions( $order, $admin_instructions = false, $plain_text = false ) {

		// Invalid gateway
		if ( $this->id !== $order->gateway ) {
			return;
		}

		$test_mode = EDD_Mollie_Helper()->data->getActiveMolliePaymentMode( $order->ID ) == 'test';
		$payment   = EDD_Mollie_Helper()->api->getApiClient( $test_mode )->payments->get( $order->transaction_id );

		// Mollie payment not found or invalid gateway
		if ( ! $payment || $payment->method != $this->getMollieMethodId() ) {
			return;
		}

		$instructions = $this->getInstructions( $order, $payment, $admin_instructions, $plain_text );

		if ( ! empty( $instructions ) ) {
			$instructions = wptexturize( $instructions );

			if ( $plain_text ) {
				echo wp_kses_post( $instructions . PHP_EOL );
			} else {
				$html  = '<section class="mollie-instructions" >';
				$html .= wpautop( $instructions ) . PHP_EOL;
				$html .= '</section>';
				echo wp_kses_post( $html );
			}
		}
	}

	/**
	 * @param EDD_Payment                  $order
	 * @param Mollie\Api\Resources\Payment $payment
	 * @param bool                         $admin_instructions
	 * @param bool                         $plain_text
	 * @return string|null
	 */
	protected function getInstructions ( $order, $payment, $admin_instructions, $plain_text )
	{
		// No definite payment status
		if ($payment->isOpen() || $payment->isPending())
		{
			if ($admin_instructions)
			{
				// Message to admin
				return __('We have not received a definite payment status.', 'edd-mollie-gateway');
			}
			else
			{
				// Message to customer
				return __('We have not received a definite payment status. You will receive an email as soon as we receive a confirmation of the bank/merchant.', 'edd-mollie-gateway');
			}
		}
		elseif ($payment->isPaid())
		{
			return sprintf(
			/* translators: Placeholder 1: payment method */
				__('Payment completed with <strong>%s</strong>', 'edd-mollie-gateway'),
				$this->get_title()
			);
		}

		return null;
	}


	/**
	 * @param EDD_Payment $order
	 */
	public function onOrderReceivedText( $text, $order ) {
		if ( empty( $order ) ) {
			return $text;
		}

		// Invalid gateway
		if ( $this->id !== $order->gateway ) {
			return $text;
		}

		if ( $order->status == 'cancelled' ) {
			$text = __( 'Your order has been cancelled.', 'edd-mollie-gateway' );
		}

		return $text;

	}

	/**
	 * @param EDD_Payment $order
	 *
	 * @return bool
	 */
	protected function orderNeedsPayment( $order ) {
		return !in_array( $order->status, $this->get_paid_statuses() ) && $order->status != 'refunded';
	}

	public function get_paid_statuses() {
		return array( 'edd_subscription', 'publish', 'complete', 'revoked' );
	}

	/**
	 * @return \Mollie\Api\Resources\Method|null
	 */
	public function getMollieMethod() {

		$test_mode = EDD_Mollie_Helper()->settings->isTestModeEnabled();

		return EDD_Mollie_Helper()->data->getPaymentMethod(
			$test_mode,
			$this->getMollieMethodId()
		);

	}

	/**
	 * @return string
	 */
	protected function getInitialOrderStatus ()
	{
		if ($this->paymentConfirmationAfterCoupleOfDays())
		{
			return 'pending';
		}

		return 'pending';
	}

	/**
	 * @param WC_Order $order
	 * @return string
	 */
	public function getReturnUrl ($order)
	{
		$return_url = get_permalink( edd_get_option( 'success_page', false ) );
		$return_url = EDD_Mollie_Helper()->url->addQueryArgsWithoutSlash( array(
			'payment-confirmation' => $this->id,
			'order-id'   => $order->ID,
			'order-key'  => $order->key,
		), $return_url );
		$return_url = EDD_Mollie_Helper()->url->cleanUrl( $return_url );

		edd_mollie_debug_log( 'Order ' . $order->ID . ' returnUrl: ' . $return_url, $order->ID );

		return apply_filters( 'edd_mollie_return_url', $return_url, $order);
	}

	/**
	 * @param WC_Order $order
	 * @return string
	 */
	public function getWebhookUrl ( $order )
	{
		$webhook_base = get_home_url();
		$webhook_url = EDD_Mollie_Helper()->url->addQueryArgsWithoutSlash( array(
			'edd-listener' => $this->id,
			'order-id'   => $order->ID,
			'order-key'  => $order->key,
		), $webhook_base );
		$webhook_url = EDD_Mollie_Helper()->url->cleanUrl( $webhook_url );

		edd_mollie_debug_log( 'Order ' . $order->ID . ' webhookUrl: ' . $webhook_url, $order->ID );

		return apply_filters( 'edd_mollie_webhook_url', $webhook_url, $order);
	}

	/**
	 * @return string|NULL
	 */
	public function getSelectedIssuer ()
	{
		$issuer_id = 'mollie_edd_issuer_' . $this->getMollieMethodId();

		return !empty($_POST[$issuer_id]) ? sanitize_text_field( wp_unslash( $_POST[$issuer_id] ) ) : null; // phpcs:ignore WordPress.Security.NonceVerification.Recommended, WordPress.Security.NonceVerification.Missing
	}

	/**
	 * @return array
	 */
	protected function getSupportedCurrencies ()
	{
		$default = array(
			'AUD',
			'BGN',
			'BRL',
			'CAD',
			'CHF',
			'CZK',
			'DKK',
			'EUR',
			'GBP',
			'HKD',
			'HRK',
			'HUF',
			'ILS',
			'ISK',
			'JPY',
			'MXN',
			'MYR',
			'NOK',
			'NZD',
			'PHP',
			'PLN',
			'RON',
			'RUB',
			'SEK',
			'SGD',
			'THB',
			'TWD',
			'USD',
			);

		return apply_filters('edd_' . $this->id . '_supported_currencies', $default);
	}

	/**
	 * @return bool
	 */
	protected function isCurrencySupported ()
	{
		return in_array( edd_get_currency(), $this->getSupportedCurrencies() );
	}

	/**
	 * @return bool
	 */
	protected function isValidApiKeyProvided ()
	{
		$settings  = EDD_Mollie_Helper()->settings;
		$test_mode = $settings->isTestModeEnabled();
		$api_key   = $settings->getApiKey($test_mode);

		return !empty($api_key) && preg_match('/^(live|test)_\w{30,}$/', $api_key);
	}

	/**
	 * @return bool
	 */
	protected function isOrderPaidAndProcessed( $order ) {
		$paid_and_processed = $order->get_meta( '_mollie_paid_and_processed' );

		return $paid_and_processed;
	}

	/**
	 * @return bool
	 */
	protected function isOrderPaidByOtherGateway( $order ) {
		$paid_by_other_gateway = $order->get_meta( '_mollie_paid_by_other_gateway' );

		return $paid_by_other_gateway;
	}

	/**
	 * @return string
	 */
	public function getMollieMethodId () {
		// strip prefix if present
		return $this->method_prefix === substr( $this->id, 0, strlen($this->method_prefix) ) ? substr( $this->id, strlen($this->method_prefix) ) : $this->id;
	}

	/**
	 * @return string
	 */
	abstract public function getDefaultTitle ();

	/**
	 * @return string
	 */
	abstract protected function getSettingsDescription ();

	/**
	 * @return string
	 */
	abstract protected function getDefaultDescription ();

	/**
	 * @return mixed
	 */
	protected function get_recurring_total() {
		$this->recurring_totals = array (); // Reset for cached carts

		foreach ( EDD()->cart->get_contents_details() as $cart_item ) {
			# TODO
		}

		return $this->recurring_totals;
	}

	/**
	 * Check if payment method is available in checkout based on amount, currency and sequenceType
	 *
	 * @param $filters
	 *
	 * @return bool
	 */
	protected function isAvailableMethodInCheckout( $filters ) {
		$test_mode   = EDD_Mollie_Helper()->settings->isTestModeEnabled();
		$methods     = EDD_Mollie_Helper()->data->getApiPaymentMethods( $test_mode, $use_cache = true, $filters);

		// Set all other payment methods to false, so they can be updated if available
		foreach ( $methods as $method ) {
			if ( $method['id'] == $this->getMollieMethodId() ) {
				return true;
			}
		}

		return false;
	}

	public function edd_transaction_link( $transaction_id, $order_id ) {
		$order = EDD_Mollie_Helper()->data->getEddOrder( $order_id );
		$url = $this->get_transaction_url( $order );
		return '<a href="' . esc_url( $url ) . '" target="_blank">' . $transaction_id . '</a>';
	}

	/**
	 * Get the transaction URL.
	 *
	 * @param  WC_Order $order
	 *
	 * @return string
	 */
	public function get_transaction_url( $order ) {
		$resource = ( $order->get_meta( '_mollie_order_id' ) ) ? 'orders' : 'payments';

		$this->view_transaction_url = 'https://my.mollie.com/dashboard/' . $resource . '/%s';

		return parent::get_transaction_url( $order );
	}
	
	/**
	 * EDD Mailchimp Addon: Capture Subscriptions at Checkout
	 * 
	 * @param \EDD_Payment $order
	 * @return void
	 */
	public function edd_mailchimp_checkout_subscription( \EDD_Payment $order ): void {
		if ( class_exists( 'EDD_MailChimp_Checkout' ) ) {
			$edd_mailchimp_checkout = new \EDD_MailChimp_Checkout();
			$edd_mailchimp_checkout->store_payment_meta( $order->ID );
			$edd_mailchimp_checkout->completed_purchase_signup( $order->ID, $order, edd_get_customer( absint( $order->customer_id ) ) );
		}
	}

}