<?php
/**
 * Class WC_Payeezy_Gateway file.
 *
 * @package First Data Payeezy for WooCommerce
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * WC_Payeezy_Gateway
 *
 * @extends WC_Payment_Gateway_CC
 */
class WC_Payeezy_Gateway extends WC_Payment_Gateway_CC {

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->id           = 'payeezy';
		$this->has_fields   = true;
		$this->method_title = 'First Data Payeezy';

		// Load the form fields.
		$this->init_form_fields();

		// Load the settings.
		$this->init_settings();

		// Define the supported features.
		$this->supports = array(
			'products',
			'refunds',
			'subscriptions',
			'subscription_cancellation',
			'subscription_suspension',
			'subscription_reactivation',
			'subscription_amount_changes',
			'subscription_date_changes',
			'subscription_payment_method_change',
			'subscription_payment_method_change_customer',
			'subscription_payment_method_change_admin',
			'multiple_subscriptions',
			'pre-orders',
			'tokenization',
			'add_payment_method',
			'default_credit_card_form',
		);

		// Define user set variables.
		$this->enabled            = $this->get_option( 'enabled' );
		$this->title              = $this->get_option( 'title' );
		$this->sandbox            = $this->get_option( 'sandbox' );
		$this->merchant_token     = $this->get_option( 'merchant_token' );
		$this->transaction_type   = $this->get_option( 'transaction_type' );
		$this->auto_capture       = $this->get_option( 'auto_capture' );
		$this->transarmor_enabled = $this->get_option( 'transarmor_enabled' );
		$this->cardtypes          = $this->get_option( 'cardtypes' );

		// Add test mode warning if sandbox.
		if ( 'yes' === $this->sandbox ) {
			$this->description = __( 'TEST MODE ENABLED. Use test card number 4111111111111111 with any 3-digit CVC and a future expiration date.', 'woocommerce-payeezy' );
		}

		add_action( 'admin_notices', array( $this, 'admin_notices' ) );
		add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array( $this, 'process_admin_options' ) );
	}

	/**
	 * Admin notices
	 */
	public function admin_notices() {
		if ( 'no' === $this->enabled ) {
			return;
		}

		// Show message if merchant token is empty in live mode.
		if ( ! $this->merchant_token && 'no' === $this->sandbox ) {
			$message1 = __( 'Payeezy error: The Merchant Token is required. Please check your Pyayeezy settings', 'woocommerce-payeezy' );
			/* translators: %s: missing merchant token message */
			printf( '<div class="notice notice-warning is-dismissable"><p>%s</p></div>', esc_html( $message1 ) );
		}
	}

	/**
	 * Administrator area options
	 */
	public function admin_options() {
		?>
		<div class="payeezy-description" style="width:50%;">
			<p>
				Payeezy is no longer boarding new clients. We recommend our <a href="https://wordpress.org/plugins/authnet-cim-for-woo/" target="_blank">Authorize.Net</a> plugin 
				as an alternative. Accept all major credit cards including Visa, MasterCard, American Express, Discover, JCB, and Diners Club. Our plugin allows your logged in 
				customers to securely store and re-use credit card profiles to speed up the checkout process. We also support Subscription and Pre-Order features.
			</p>
		</div>
		<p><a href="https://www.cardpaysolutions.com/woocommerce?pid=83cf9aa647bc5b4e" target="_blank" class="button-primary">Click Here To Sign Up!</a></p>
		<hr>
		<table class="form-table">
			<?php $this->generate_settings_html(); ?>
		</table><!--/.form-table-->
		<?php
	}

	/**
	 * Init payment gateway settings form fields
	 */
	public function init_form_fields() {
		$this->form_fields = array(
			'enabled'            => array(
				'title'       => __( 'Enable/Disable', 'woocommerce-payeezy' ),
				'label'       => __( 'Enable Payeezy', 'woocommerce-payeezy' ),
				'type'        => 'checkbox',
				'description' => '',
				'default'     => 'no',
			),
			'title'              => array(
				'title'       => __( 'Title', 'woocommerce-payeezy' ),
				'type'        => 'text',
				'description' => __( 'This controls the title which the user sees during checkout.', 'woocommerce-payeezy' ),
				'default'     => __( 'Credit Card', 'woocommerce-payeezy' ),
				'desc_tip'    => true,
			),
			'sandbox'            => array(
				'title'       => __( 'Use Sandbox', 'woocommerce-payeezy' ),
				'label'       => __( 'Enable sandbox mode - live payments will not be taken if enabled.', 'woocommerce-payeezy' ),
				'type'        => 'checkbox',
				'description' => '',
				'default'     => 'no',
			),
			'merchant_token'     => array(
				'title'       => __( 'Merchant Token', 'woocommerce-payeezy' ),
				'type'        => 'text',
				'description' => __( 'Contact sales at (866) 913-3220 if you have not received your merchant token. Not required for Sandbox mode.', 'woocommerce-payeezy' ),
				'default'     => '',
			),
			'transaction_type'   => array(
				'title'       => __( 'Transaction Type', 'woocommerce-payeezy' ),
				'type'        => 'select',
				'description' => '',
				'default'     => 'purchase',
				'options'     => array(
					'purchase'  => 'Authorize & Capture',
					'authorize' => 'Authorize Only',
				),
			),
			'auto_capture'       => array(
				'title'       => __( 'Auto Capture', 'woocommerce-payeezy' ),
				'label'       => __( 'Automatically attempt to capture transactions that are processed as Authorize Only when order is marked complete.', 'woocommerce-payeezy' ),
				'type'        => 'checkbox',
				'description' => '',
				'default'     => 'no',
			),
			'transarmor_enabled' => array(
				'title'       => __( 'Allow Stored Cards', 'woocommerce-payeezy' ),
				'label'       => __( 'Allow logged in customers to save credit card profiles to use for future purchases', 'woocommerce-payeezy' ),
				'type'        => 'checkbox',
				'description' => '',
				'default'     => 'yes',
			),
			'cardtypes'          => array(
				'title'    => __( 'Accepted Cards', 'woocommerce-payeezy' ),
				'type'     => 'multiselect',
				'class'    => 'chosen_select',
				'css'      => 'width: 350px;',
				'desc_tip' => __( 'Select the card types to accept.', 'woocommerce-payeezy' ),
				'options'  => array(
					'visa'       => 'Visa',
					'mastercard' => 'MasterCard',
					'amex'       => 'American Express',
					'discover'   => 'Discover',
					'jcb'        => 'JCB',
					'diners'     => 'Diners Club',
				),
				'default'  => array( 'visa', 'mastercard', 'amex', 'discover' ),
			),
		);
	}

	/**
	 * Get_icon function.
	 *
	 * @access public
	 * @return string
	 */
	public function get_icon() {
		$icon = '';
		if ( is_array( $this->cardtypes ) ) {
			$card_types = $this->cardtypes;
			foreach ( $card_types as $card_type ) {
				$icon .= '<img src="' . WC_HTTPS::force_https_url( WC()->plugin_url() . '/assets/images/icons/credit-cards/' . $card_type . '.png' ) . '" alt="' . $card_type . '" />';
			}
		}
		return apply_filters( 'woocommerce_gateway_icon', $icon, $this->id );
	}

	/**
	 * Process_payment function.
	 *
	 * @access public
	 * @param mixed $order_id Order ID.
	 * @throws Exception If gateway response is an error.
	 * @return void
	 */
	public function process_payment( $order_id ) {
		try {
			global $woocommerce;
			$order  = wc_get_order( $order_id );
			$amount = $order->get_total();
			$card   = '';
			if ( isset( $_POST['wc-payeezy-payment-token'] ) && 'new' !== $_POST['wc-payeezy-payment-token'] ) {
				$token_id = sanitize_text_field( wp_unslash( $_POST['wc-payeezy-payment-token'] ) );
				$card     = WC_Payment_Tokens::get( $token_id );
				// Return if card does not belong to current user.
				if ( $card->get_user_id() !== get_current_user_id() ) {
					return;
				}
			}

			$payeezy = new WC_Payeezy_API();
			if ( 'authorize' === $this->transaction_type ) {
				$response = $payeezy->authorize( $this, $order, $amount, $card );
			} else {
				$response = $payeezy->purchase( $this, $order, $amount, $card );
			}

			if ( is_wp_error( $response ) ) {
				$order->add_order_note( $response->get_error_message() );
				throw new Exception( $response->get_error_message() );
			}

			if ( isset( $response->transaction_status ) && 'approved' === $response->transaction_status ) {
				$trans_id = $response->transaction_id;
				$order->payment_complete( $trans_id );
				$woocommerce->cart->empty_cart();
				$amount_approved = number_format( $response->amount / 100, '2', '.', '' );
				$message         = 'authorize' === $this->transaction_type ? 'authorized' : 'completed';
				if ( isset( $response->avs ) ) {
					$avs_code = $response->avs;
				} else {
					$avs_code = '';
				}
				if ( isset( $response->cvv2 ) ) {
					$cvv_code = $response->cvv2;
				} else {
					$cvv_code = '';
				}
				$order->add_order_note(
					sprintf(
						__( "Payeezy payment %1\$s for %2\$s. Transaction ID: %3\$s.\n\n <strong>AVS Response:</strong> %4\$s.\n\n <strong>CVV2 Response:</strong> %5\$s.", 'woocommerce-payeezy' ),
						$message,
						$amount_approved,
						$response->transaction_id,
						$this->get_avs_message( $avs_code ),
						$this->get_cvv_message( $cvv_code )
					)
				);
				$tran_meta = array(
					'transaction_id'   => $response->transaction_id,
					'transaction_tag'  => $response->transaction_tag,
					'transaction_type' => $this->transaction_type,
				);
				$order->add_meta_data( '_payeezy_transaction', $tran_meta );
				$order->save();
				// Maybe save card.
				if ( isset( $_POST['wc-payeezy-new-payment-method'] ) && is_user_logged_in() && 'yes' === $this->transarmor_enabled ) {
					$this->save_card( $response );
				}
				// Return thank you redirect.
				return array(
					'result'   => 'success',
					'redirect' => $this->get_return_url( $order ),
				);
			} else {
				$order->add_order_note( $response->bank_message );

				throw new Exception( $response->bank_message );
			}
		} catch ( Exception $e ) {
			wc_add_notice( $e->getMessage(), 'error' );

			return array(
				'result'   => 'fail',
				'redirect' => '',
			);
		}
	}

	/**
	 * Process_refund function.
	 *
	 * @access public
	 * @param int    $order_id Order ID.
	 * @param float  $amount Order amount.
	 * @param string $reason Refund reason.
	 * @throws Exception If refund fails or is an error.
	 * @return bool|WP_Error
	 */
	public function process_refund( $order_id, $amount = null, $reason = '' ) {
		$order = wc_get_order( $order_id );

		if ( $amount > 0 ) {
			try {
				$payeezy  = new WC_Payeezy_API();
				$response = $payeezy->refund( $this, $order, $amount );

				if ( is_wp_error( $response ) ) {
					throw new Exception( $response->get_error_message() );
				}

				if ( isset( $response->transaction_status ) && 'approved' === $response->transaction_status ) {
					$refunded_amount = number_format( $response->amount / 100, '2', '.', '' );
					/* translators: 1: refund amount, 2: transaction ID */
					$order->add_order_note( sprintf( __( 'Payeezy refund completed for %1$s. Refund ID: %2$s', 'woocommerce-payeezy' ), $refunded_amount, $response->transaction_id ) );
					return true;
				} else {
					if ( isset( $response->bank_message ) ) {
						throw new Exception( __( 'Refund error: ', 'woocommerce-payeezy' ) . $response->bank_message );
					} else {
						throw new Exception( __( 'Refund error: ', 'woocommerce-payeezy' ) . $response->Error->messages[0]->description );
					}
				}
			} catch ( Exception $e ) {
				$order->add_order_note( $e->getMessage() );
				return new WP_Error( 'payeezy_error', $e->getMessage() );
			}
		} else {
			return false;
		}
	}

	/**
	 * Process_capture function.
	 *
	 * @access public
	 * @param int $order_id Order ID.
	 * @throws Exception If response is an error.
	 * @return bool
	 */
	public function process_capture( $order_id ) {
		$order = wc_get_order( $order_id );

		// Return if another payment method was used.
		$payment_method = version_compare( WC_VERSION, '3.0.0', '<' ) ? $order->payment_method : $order->get_payment_method();
		if ( $payment_method !== $this->id ) {
			return;
		}

		// Attempt to process the capture.
		$tran_meta      = $order->get_meta( '_payeezy_transaction', true );
		$orig_tran_type = isset( $tran_meta['transaction_type'] ) ? $tran_meta['transaction_type'] : '';
		$amount         = $order->get_total();

		if ( 'authorize' === $orig_tran_type && 'yes' === $this->auto_capture ) {
			try {
				$payeezy  = new WC_Payeezy_API();
				$response = $payeezy->capture( $this, $order, $amount );

				if ( is_wp_error( $response ) ) {
					throw new Exception( $response->get_error_message() );
				}

				if ( isset( $response->transaction_status ) && 'approved' === $response->transaction_status ) {
					$captured_amount = number_format( $response->amount / 100, '2', '.', '' );
					/* translators: 1: captured amount, 2: transaction ID */
					$order->add_order_note( sprintf( __( 'Payeezy auto capture completed for %1$s. Capture ID: %2$s', 'woocommerce-payeezy' ), $captured_amount, $response->transaction_id ) );
					$tran_meta = array(
						'transaction_id'   => $response->transaction_id,
						'transaction_tag'  => $response->transaction_tag,
						'transaction_type' => 'capture',
					);
					$order->update_meta_data( '_payeezy_transaction', $tran_meta );
					$order->save();
					return true;
				} else {
					throw new Exception( __( 'Payeezy auto capture failed. Log into your gateway to manually process the capture.', 'woocommerce-payeezy' ) );
				}
			} catch ( Exception $e ) {
				$order->add_order_note( $e->getMessage() );
				return true;
			}
		}
	}

	/**
	 * Add payment method via account screen.
	 */
	public function add_payment_method() {
		$payeezy  = new WC_Payeezy_API();
		$response = $payeezy->verify( $this );
		if ( isset( $response->transaction_status ) && 'approved' === $response->transaction_status ) {
			$token = new WC_Payment_Token_CC();
			$token->set_token( $response->token->token_data->value );
			$token->set_gateway_id( 'payeezy' );
			$token->set_card_type( strtolower( $response->card->type ) );
			$token->set_last4( substr( $response->token->token_data->value, -4 ) );
			$token->set_expiry_month( substr( $response->card->exp_date, 0, 2 ) );
			$token->set_expiry_year( '20' . substr( $response->card->exp_date, -2 ) );
			$token->set_user_id( get_current_user_id() );
			$token->save();

			return array(
				'result'   => 'success',
				'redirect' => wc_get_endpoint_url( 'payment-methods' ),
			);
		} else {
			if ( isset( $response->bank_message ) ) {
				$error_msg = __( 'Error adding card: ', 'woocommerce-payeezy' ) . $response->bank_message;
			} else {
				if ( 'Access denied' === $response->Error->messages[0]->description ) {
					$error_msg = __( 'Invalid Merchant Token: Call merchant support at (866) 913-3220 to obtain a new token', 'woocommerce-payeezy' );
				} else {
					$error_msg = __( 'Error adding card: ', 'woocommerce-payeezy' ) . $response->Error->messages[0]->description;
				}
			}
			wc_add_notice( $error_msg, 'error' );
			return;
		}
	}

	/**
	 * Save_card function.
	 *
	 * @access public
	 * @param Object $response Gateway response object.
	 * @return void
	 */
	public function save_card( $response ) {
		$token = new WC_Payment_Token_CC();
		$token->set_token( $response->token->token_data->value );
		$token->set_gateway_id( 'payeezy' );
		$token->set_card_type( strtolower( $response->card->type ) );
		$token->set_last4( substr( $response->token->token_data->value, -4 ) );
		$token->set_expiry_month( substr( $response->card->exp_date, 0, 2 ) );
		$token->set_expiry_year( '20' . substr( $response->card->exp_date, -2 ) );
		$token->set_user_id( get_current_user_id() );
		$token->save();
	}

	/**
	 * Builds our payment fields area - including tokenization fields for logged
	 * in users, and the actual payment fields.
	 */
	public function payment_fields() {
		if ( $this->description ) {
			$description = apply_filters( 'wc_payeezy_description', wpautop( $this->description ) );
			echo wp_kses_post( $description );
		}

		if ( $this->supports( 'tokenization' ) && is_checkout() && 'yes' === $this->transarmor_enabled ) {
			$this->tokenization_script();
			$this->saved_payment_methods();
			$this->form();
			$this->save_payment_method_checkbox();
		} else {
			$this->form();
		}
	}

	/**
	 * Output field name HTML
	 *
	 * Gateways which support tokenization do not require names - we don't want the data to post to the server.
	 *
	 * @param  string $name Field name.
	 * @return string
	 */
	public function field_name( $name ) {
		return ' name="' . esc_attr( $this->id . '-' . $name ) . '" ';
	}

	/**
	 * Get_avs_message function.
	 *
	 * @access public
	 * @param string $code AVS response code.
	 * @return string
	 */
	public function get_avs_message( $code ) {
		$avs_messages = array(
			'X' => __( 'Exact match, 9 digit zip - Street Address, and 9 digit ZIP Code match', 'woocommerce-payeezy' ),
			'Y' => __( 'Exact match, 5 digit zip - Street Address, and 5 digit ZIP Code match', 'woocommerce-payeezy' ),
			'A' => __( 'Partial match - Street Address matches, ZIP Code does not', 'woocommerce-payeezy' ),
			'W' => __( 'Partial match - ZIP Code matches, Street Address does not', 'woocommerce-payeezy' ),
			'Z' => __( 'Partial match - 5 digit ZIP Code match only', 'woocommerce-payeezy' ),
			'N' => __( 'No match - No Address or ZIP Code match', 'woocommerce-payeezy' ),
			'U' => __( 'Unavailable - Address information is unavailable for that account number, or the card issuer does not support', 'woocommerce-payeezy' ),
			'G' => __( 'Service Not supported, non-US Issuer does not participate', 'woocommerce-payeezy' ),
			'R' => __( 'Retry - Issuer system unavailable, retry later', 'woocommerce-payeezy' ),
			'E' => __( 'Not a mail or phone order', 'woocommerce-payeezy' ),
			'S' => __( 'Service not supported', 'woocommerce-payeezy' ),
			'Q' => __( 'Bill to address did not pass edit checks', 'woocommerce-payeezy' ),
			'D' => __( 'International street address and postal code match', 'woocommerce-payeezy' ),
			'B' => __( 'International street address match', 'woocommerce-payeezy' ),
			'C' => __( 'International street address and postal code not verified due to incompatable formats', 'woocommerce-payeezy' ),
			'P' => __( 'International postal code match, street address not verified due to incompatable format', 'woocommerce-payeezy' ),
			'1' => __( 'Cardholder name matches', 'woocommerce-payeezy' ),
			'2' => __( 'Cardholder name, billing address, and postal code match', 'woocommerce-payeezy' ),
			'3' => __( 'Cardholder name and billing postal code match', 'woocommerce-payeezy' ),
			'4' => __( 'Cardholder name and billing address match', 'woocommerce-payeezy' ),
			'5' => __( 'Cardholder name incorrect, billing address and postal code match', 'woocommerce-payeezy' ),
			'6' => __( 'Cardholder name incorrect, billing postal code matches', 'woocommerce-payeezy' ),
			'7' => __( 'Cardholder name incorrect, billing address matches', 'woocommerce-payeezy' ),
			'8' => __( 'Cardholder name, billing address, and postal code are all incorrect', 'woocommerce-payeezy' ),
		);
		if ( array_key_exists( $code, $avs_messages ) ) {
			return $avs_messages[ $code ];
		} else {
			return '';
		}
	}

	/**
	 * Get_cvv_message function.
	 *
	 * @access public
	 * @param string $code CVV response code.
	 * @return string
	 */
	public function get_cvv_message( $code ) {
		$cvv_messages = array(
			'M' => __( 'CVV2/CVC2 Match', 'woocommerce-payeezy' ),
			'N' => __( 'CVV2 / CVC2 No Match', 'woocommerce-payeezy' ),
			'P' => __( 'Not Processed', 'woocommerce-payeezy' ),
			'S' => __( 'Merchant Has Indicated that CVV2 / CVC2 is not present on card', 'woocommerce-payeezy' ),
			'U' => __( 'Issuer is not certified and/or has not provided visa encryption keys', 'woocommerce-payeezy' ),
			'I' => __( 'CVV2 code is invalid or empty', 'woocommerce-payeezy' ),
		);
		if ( array_key_exists( $code, $cvv_messages ) ) {
			return $cvv_messages[ $code ];
		} else {
			return '';
		}
	}
}
