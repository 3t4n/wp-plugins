<?php
/**
 * Wallet payment gateway
 *
 */

defined( 'ABSPATH' ) || exit;

/**
 * Wallet Payment Gateway class.
 *
 */
class WPInv_Wallet_Gateway extends GetPaid_Payment_Gateway {

	/**
	 * Payment method id.
	 *
	 * @var string
	 */
	public $id = 'wallet';

	/**
	 * An array of features that this gateway supports.
	 *
	 * @var array
	 */
	protected $supports = array( 'subscription', 'addons' );

	/**
	 * Payment method order.
	 *
	 * @var int
	 */
	public $order = 1;

	/**
	 * Class constructor.
	 */
	public function __construct() {
		parent::__construct();

		$this->title        = __( 'Account Funds', 'getpaid-wallet' );
		$this->method_title = __( 'Wallet', 'getpaid-wallet' );

		add_filter( 'getpaid_daily_maintenance_should_expire_subscription', array( $this, 'maybe_renew_subscription' ), 10, 2 );
		add_filter( 'getpaid_submission_gateways', array( $this, 'filter_gateways' ), 10, 2 );
		add_filter( 'wpinv_gateway_description', array( $this, 'gateway_description' ), 10, 2 );
	}

	/**
	 * Include the account balance with the gateway description
	 *
	 *
	 * @since      1.0.0-beta
	 */
	public function gateway_description( $description, $gateway ) {

		$user_id = get_current_user_id();
		if ( ! empty( $user_id ) && 'wallet' == $gateway ) {
			$balance       = wp_kses_post( wpinv_wallet_get_user_balance( $user_id ) );
			$balance       = sprintf(
				esc_html__( 'Available balance: %s', 'getpaid-wallet' ),
				$balance
			);
			$description  = "<p>$balance</p>$description";
		}

		return $description;
	}

	/**
	 * Do not include this gateway on account topups.
	 *
	 * @param array $gateways
	 * @param GetPaid_Payment_Form_Submission $submission
	 * @since      1.0.0-beta
	 * @return array
	 */
	public function filter_gateways( $gateways, $submission ) {

		$topup_form = (int) get_option( 'wpinv_wallet_default_topup_form', 0 );
		if ( $submission->get_payment_form()->get_id() == $topup_form ) {

			foreach ( $gateways as $i => $gateway ) {

				if ( 'wallet' == $gateway ) {
					unset( $gateways[ $i ] );
				}

			}

		}

		return $gateways;
	}

	/**
	 * Process Payment.
	 *
	 *
	 * @param WPInv_Invoice $invoice Invoice.
	 * @param array $submission_data Posted checkout fields.
	 * @param GetPaid_Payment_Form_Submission $submission Checkout submission.
	 * @return array
	 */
	public function process_payment( $invoice, $submission_data, $submission ) {

		// Get the invoice total.
		$total         = $invoice->get_total();

		//... then retrieve their account balance
		$account_funds = wpinv_wallet_get_user_balance(  $invoice->get_user_id(), false, $invoice->get_currency() );

		// Next, ensure that there is enough money to pay this invoice.
		if ( $account_funds < $total ) {
			wpinv_set_error( 'insufficient_funds', __( 'Insufficient funds', 'getpaid-wallet' ) );
			wpinv_send_back_to_checkout();
		}

		// Log the transaction.
		$args = array(
			'amount'   => 0 - $total,
			'balance'  => $account_funds - $total,
			'type'     => 'invoice',
			'currency' => $invoice->get_currency(),
			'details'  => sanitize_text_field(
				sprintf(
					esc_html__( 'Payment for Invoice #%s', 'getpaid-wallet' ),
					$invoice->get_number()
				)
			),
		);

		wpinv_wallet_add_new_transaction( $invoice->get_user_id(), $args );

		// Mark it as paid.
		$invoice->mark_paid();

		// (Maybe) activate subscription.
		getpaid_activate_invoice_subscription( $invoice );

		// Send to the success page.
		wpinv_send_to_success_page( array( 'invoice_key' => $invoice->get_key() ) );

	}

	/**
	 * (Maybe) renews a manual subscription profile.
	 *
	 *
	 * @param bool $should_expire
	 * @param WPInv_Subscription $subscription
	 */
	public function maybe_renew_subscription( $should_expire, $subscription ) {

		// Ensure its our subscription && it's active.
		if ( 'wallet' != $subscription->get_gateway() || ! $subscription->has_status( 'active trialling' ) ) {
			return $should_expire;
		}

		// If this is the last renewal, complete the subscription.
		if ( $subscription->is_last_renewal() ) {
			$subscription->complete();
			return false;
		}

		// Generate the renewal invoice.
		$new_invoice = $subscription->create_payment();
		$old_invoice = $subscription->get_parent_payment();

		if ( empty( $new_invoice ) ) {
			$old_invoice->add_note( __( 'Error generating a renewal invoice.', 'getpaid-wallet' ), false, false, true );
			$subscription->failing();
			return false;
		}

		// Get the invoice total.
		$total         = $new_invoice->get_total();

		//... then retrieve their account balance
		$account_funds = wpinv_wallet_get_user_balance(  $new_invoice->get_user_id(), false );

		// Next, ensure that there is enough money to pay this invoice.
		if ( $account_funds < $total ) {
			$old_invoice->add_note( __( 'Insufficient funds.', 'getpaid-wallet' ), false, false, true );
			$subscription->failing();
			return false;
		}

		// Log the transaction.
		$args = array(
			'amount'   => 0 - $total,
			'balance'  => $account_funds - $total,
			'type'     => 'invoice',
			'currency' => $new_invoice->get_currency(),
			'details'  => sanitize_text_field(
				sprintf(
					esc_html__( 'Renewal for Invoice #%s', 'getpaid-wallet' ),
					$new_invoice->get_number()
				)
			),
		);

		wpinv_wallet_add_new_transaction( $new_invoice->get_user_id(), $args );

		$subscription->add_payment( array(), $new_invoice );
		$subscription->renew();

		return false;

	}

	/**
	 * Processes invoice addons.
	 *
	 * @param WPInv_Invoice $invoice
	 * @param GetPaid_Form_Item[] $items
	 */
	public function process_addons( $invoice, $items ) {

		$previous_total = $invoice->get_total();

		foreach ( $items as $item ) {
			$error = $invoice->add_item( $item );

			if ( is_wp_error( $error ) ) {
				$this->show_error( $error->get_error_code(), $error->get_error_message(), 'error' );
			}

		}

		// Calculate added amount.
		$invoice->recalculate_total();
		$added_amount = $invoice->get_total() - $previous_total;

		// Abort if no amount was added.
		if ( $added_amount == 0 ) {
			return $invoice->save();
		}

		// Retrieve their account balance.
		$account_funds = wpinv_wallet_get_user_balance(  $invoice->get_user_id(), false );

		// Next, ensure that there is enough money to pay this invoice.
		if ( $account_funds < $added_amount ) {
			return $this->show_error( 'insufficient_funds', __( 'Insufficient account funds.', 'getpaid-wallet' ), 'error' );
		}

		// Log the transaction.
		$args = array(
			'amount'   => 0 - $added_amount,
			'balance'  => $account_funds - $added_amount,
			'type'     => 'invoice',
			'currency' => $invoice->get_currency(),
			'details'  => sanitize_text_field(
				sprintf(
					esc_html__( 'Addons for Invoice #%s', 'getpaid-wallet' ),
					$invoice->get_number()
				)
			),
		);

		wpinv_wallet_add_new_transaction( $invoice->get_user_id(), $args );

		$invoice->save();
	}

}
