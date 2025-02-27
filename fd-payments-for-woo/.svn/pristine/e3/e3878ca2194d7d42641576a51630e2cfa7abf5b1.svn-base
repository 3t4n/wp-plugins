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
 * @extends WC_Payment_Gateway
 */
class WC_Payeezy_Gateway extends WC_Payment_Gateway {

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

		// Show message when in live mode and no SSL on the checkout page.
		if ( 'no' === $this->sandbox && get_option( 'woocommerce_force_ssl_checkout' ) === 'no' && ! class_exists( 'WordPressHTTPS' ) ) {
			$message2 = __( 'Payeezy is enabled, but the force SSL option is disabled; your checkout may not be secure! Please enable SSL and ensure your server has a valid SSL certificate.', 'woocommerce-payeezy' );
			/* translators: %s: missing SSL message */
			printf( '<div class="notice notice-warning is-dismissable"><p>%s</p></div>', esc_html( $message2 ) );
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
			$card_types = array_reverse( $this->cardtypes );
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
	 * @return array
	 */
	public function process_payment( $order_id ) {
		try {
			global $woocommerce;
			$order  = wc_get_order( $order_id );
			$amount = $order->get_total();
			$card   = '';
			if ( isset( $_POST['payeezy-token'] ) && ! empty( $_POST['payeezy-token'] ) ) {
				$post_id = sanitize_text_field( wp_unslash( $_POST['payeezy-token'] ) );
				$post    = get_post( $post_id );
				$card    = get_post_meta( $post->ID, '_payeezy_card', true );
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
				$order->payment_complete();
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
				// Save the card if possible.
				if ( isset( $_POST['payeezy-save-card'] ) && is_user_logged_in() && 'yes' === $this->transarmor_enabled ) {
					$this->save_card( $response );
				}
				// Return thankyou redirect.
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
	 * @throws Exception If gateway response is an error.
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
	 * @throws Exception If gateway response is an error.
	 * @return bool
	 */
	public function process_capture( $order_id ) {
		$order = wc_get_order( $order_id );

		// Return if another payment method was used.
		if ( $order->payment_method !== $this->id ) {
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
	 * Save_card function.
	 *
	 * @access public
	 * @param Object $response Gateway response.
	 * @return void
	 */
	public function save_card( $response ) {
		$current_cards = count( $this->get_saved_cards() );
		$card          = array(
			'post_type'     => 'payeezy_credit_card',
			/* translators: 1: token value, 2: expiration date */
			'post_title'    => sprintf( __( 'Token %1$s &ndash; %2$s', 'woocommerce-payeezy' ), $response->token->token_data->value, strftime( _x( '%1$b %2$d, %Y @ %I:%M %p', 'Token date parsed by strftime', 'woocommerce-payeezy' ) ) ),
			'post_content'  => '',
			'post_status'   => 'publish',
			'ping_status'   => 'closed',
			'post_author'   => get_current_user_id(),
			'post_password' => uniqid( 'card_' ),
			'post_category' => '',
		);
		$post_id       = wp_insert_post( $card );
		$card_meta     = array(
			'token'      => $response->token->token_data->value,
			'expiry'     => $response->card->exp_date,
			'cardtype'   => $response->card->type,
			'is_default' => $current_cards ? 'no' : 'yes',
		);
		add_post_meta( $post_id, '_payeezy_card', $card_meta );
	}

	/**
	 * Credit card form.
	 *
	 * @param  array $args Args array.
	 * @param  array $fields Form fields array.
	 */
	public function credit_card_form( $args = array(), $fields = array() ) {

		wp_enqueue_script( 'wc-credit-card-form' );
		wp_enqueue_script( 'payeezy-credit-card-form', WC_PAYEEZY_PLUGIN_URL . '/assets/js/payeezy-credit-card-form.js', array(), '1.0', true );

		$default_args = array(
			'fields_have_names' => true,
		);

		$args = wp_parse_args( $args, apply_filters( 'woocommerce_credit_card_form_args', $default_args, $this->id ) );

		$default_fields = array(
			'card-number-field' => '<p class="form-row form-row-wide hide-if-token">
				<label for="' . esc_attr( $this->id ) . '-card-number">' . __( 'Card Number', 'woocommerce' ) . ' <span class="required">*</span></label>
				<input id="' . esc_attr( $this->id ) . '-card-number" class="input-text wc-credit-card-form-card-number" type="text" maxlength="20" autocomplete="off" placeholder="•••• •••• •••• ••••" name="' . ( $args['fields_have_names'] ? $this->id . '-card-number' : '' ) . '" />
			</p>',
			'card-expiry-field' => '<p class="form-row form-row-first hide-if-token">
				<label for="' . esc_attr( $this->id ) . '-card-expiry">' . __( 'Expiry (MM/YY)', 'woocommerce' ) . ' <span class="required">*</span></label>
				<input id="' . esc_attr( $this->id ) . '-card-expiry" class="input-text wc-credit-card-form-card-expiry" type="text" autocomplete="off" placeholder="' . esc_attr__( 'MM / YY', 'woocommerce' ) . '" name="' . ( $args['fields_have_names'] ? $this->id . '-card-expiry' : '' ) . '" />
			</p>',
			'card-cvc-field'    => '<p class="form-row form-row-last hide-if-token">
				<label for="' . esc_attr( $this->id ) . '-card-cvc">' . __( 'Card Code', 'woocommerce' ) . ' <span class="required">*</span></label>
				<input id="' . esc_attr( $this->id ) . '-card-cvc" class="input-text wc-credit-card-form-card-cvc" type="text" autocomplete="off" placeholder="' . esc_attr__( 'CVC', 'woocommerce' ) . '" name="' . ( $args['fields_have_names'] ? $this->id . '-card-cvc' : '' ) . '" />
			</p>',
		);

		if ( 'yes' === $this->transarmor_enabled && is_user_logged_in() ) {
			$saved_cards = $this->get_saved_cards();

			array_push(
				$default_fields,
				'<p class="form-row form-row-wide hide-if-token">
					<label for="' . esc_attr( $this->id ) . '-save-card"><input id="' . esc_attr( $this->id ) . '-save-card" class="input-checkbox wc-credit-card-form-save-card" type="checkbox" name="' . ( $args['fields_have_names'] ? $this->id . '-save-card' : '' ) . '" /><span>' . __( 'Save card for future use?', 'woocommerce-payeezy' ) . ' </span></label>
				</p>'
			);
			if ( count( $saved_cards ) ) {
				$option_values = '';
				foreach ( $saved_cards as $card ) {
					$card_meta      = get_post_meta( $card->ID, '_payeezy_card', true );
					$card_desc      = '************' . substr( $card_meta['token'], -4 ) . ' - ' . $card_meta['cardtype'] . ' - Exp: ' . $card_meta['expiry'];
					$option_values .= '<option value="' . esc_attr( $card->ID ) . '"' . ( 'yes' === $card_meta['is_default'] ? 'selected="selected"' : '' ) . '>' . esc_html( $card_desc ) . '</option>';
				}
				$option_values .= '<option value="">' . __( 'Add new card', 'woocommerce-payeezy' ) . '</option>';
				array_unshift(
					$default_fields,
					'<p class="form-row form-row-wide">
						<label for="' . esc_attr( $this->id ) . '-token">' . __( 'Payment Information', 'woocommerce-payeezy' ) . ' <span class="required">*</span></label>
						<select id="' . esc_attr( $this->id ) . '-token" class="wc-credit-card-form-token" name="' . ( $args['fields_have_names'] ? $this->id . '-token' : '' ) . '" >' .
						$option_values . '</select>
					</p>'
				);
			}
		}

		$fields = wp_parse_args( $fields, apply_filters( 'woocommerce_credit_card_form_fields', $default_fields, $this->id ) );
		$allowed_html = array(
			'fieldset' => array(
				'id' => array(),
			),
			'p'        => array(
				'class' => array(),
			),
			'label'    => array(
				'for' => array(),
			),
			'span'     => array(
				'class' => array(),
			),
			'input'    => array(
				'id'           => array(),
				'class'        => array(),
				'type'         => array(),
				'maxlength'    => array(),
				'autocomplete' => array(),
				'placeholder'  => array(),
				'name'         => array(),
			),
			'select'   => array(
				'id'    =>    array(),
				'class' => array(),
				'name'  =>  array(),
			),
			'option'   => array(
				'value'    => array(),
				'selected' => array(),
			),
			'div'      => array(
				'class' => array(),
			),
		);
		?>
		<fieldset id="<?php echo esc_attr( $this->id ); ?>-cc-form">
			<?php do_action( 'woocommerce_credit_card_form_start', $this->id ); ?>
			<?php
			foreach ( $fields as $field ) {
				echo wp_kses( $field, $allowed_html );
			}
			?>
			<?php do_action( 'woocommerce_credit_card_form_end', $this->id ); ?>
			<div class="clear"></div>
		</fieldset>
		<?php
	}

	/**
	 * Get_saved_cards function.
	 *
	 * @access private
	 * @return array
	 */
	private function get_saved_cards() {
		$args  = array(
			'post_type' => 'payeezy_credit_card',
			'author'    => get_current_user_id(),
			'orderby'   => 'post_date',
			'order'     => 'ASC',
		);
		$cards = get_posts( $args );
		return $cards;
	}

	/**
	 * Get_avs_message function.
	 *
	 * @access public
	 * @param string $code AVS code.
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
	 * @param string $code CVV code.
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
