<?php

use Mollie\Api\Types\PaymentMethod;

class Mollie_EDD_Gateway_BankTransfer extends Mollie_EDD_Gateway_Mollie_Abstract
{
	const EXPIRY_DEFAULT_DAYS = 12;
	const EXPIRY_MIN_DAYS     = 1;
	const EXPIRY_MAX_DAYS     = 100;

	/**
	 *
	 */
	public function __construct ()
	{

		$this->supports = array(
			'products',
			'refunds',
		);

		parent::__construct();
	}


	public function add_actions() {
		parent::add_actions();

		add_filter( 'edd_mollie_' . $this->id . '_args', array( $this, 'addPaymentArguments' ), 10, 3 );
	}

	/**
	 * Initialise Gateway Settings Form Fields
	 */
	public function init_form_fields()
	{
		parent::init_form_fields();

		$this->form_fields = array_merge($this->form_fields, array(
			'expiry_days' => array(
				'title'             => __('Expiry date', 'edd-mollie-gateway'),
				'type'              => 'number',
				'description'       => sprintf(
					/* translators: default expiry days */
					__( 'Number of days after the payment will expire. Default <code>%d</code> days', 'edd-mollie-gateway' ),
					self::EXPIRY_DEFAULT_DAYS
				),
				'default'           => self::EXPIRY_DEFAULT_DAYS,
				'css'               => 'width:50px;',
				'custom_attributes' => array(
					'min'  => self::EXPIRY_MIN_DAYS,
					'max'  => self::EXPIRY_MAX_DAYS,
					'step' => 1,
				),
			),
			'skip_mollie_payment_screen' => array(
				'title'             => __('Skip Mollie payment screen', 'edd-mollie-gateway'),
				'label'             => __('Skip Mollie payment screen when Bank Transfer is selected', 'edd-mollie-gateway'),
				'description'       => __('Enable this option if you want to skip redirecting your user to the Mollie payment screen, instead this will redirect your user directly to the EDD order received page displaying instructions how to complete the Bank Transfer payment.', 'edd-mollie-gateway'),
				'type'              => 'checkbox',
				'default'           => 'no',
			),
		));
	}

	/**
	 * @param array                     $args
	 * @param EDD_Payment               $order
	 * @param EDD Mollie Gateway class  $gateway
	 *
	 * @return array
	 */
	public function addPaymentArguments( $args, $order, $gateway ) {
		// Expiry date
		$expiry_days = (int) $this->get_option( 'expiry_days', self::EXPIRY_DEFAULT_DAYS );

		if ( $expiry_days >= self::EXPIRY_MIN_DAYS && $expiry_days <= self::EXPIRY_MAX_DAYS ) {
			$args['dueDate']      = gmdate( "Y-m-d", strtotime( "+$expiry_days days" ) );
			$args['billingEmail'] = $order->email;
		}

		return $args;
	}

	/**
	 * @return string
	 */
	public function getMollieMethodId ()
	{
		return PaymentMethod::BANKTRANSFER;
	}

	/**
	 * @return string
	 */
	public function getDefaultTitle ()
	{
		return __('Bank Transfer', 'edd-mollie-gateway');
	}

	/**
	 * @return string
	 */
	protected function getSettingsDescription() {
		return '';
	}

	/**
	 * @return string
	 */
	protected function getDefaultDescription ()
	{
		return '';
	}

	/**
	 * {@inheritdoc}
	 *
	 * @return bool
	 */
	protected function paymentConfirmationAfterCoupleOfDays ()
	{
		return true;
	}

	public function receipt_page_message( $order, $receipt_args ) {
		if ( $order->gateway != $this->id ) {
			return;
		}
		
		try {
			if ( is_object($order) && !empty($order->ID) ) {
				$order = EDD_Mollie_Helper()->data->getEddOrder( absint( $order->ID ) );
			}

			if ( empty( $order ) && !empty( $_GET['order-id'] ) ) {                             // phpcs:ignore WordPress.Security.NonceVerification.Recommended
				$order = EDD_Mollie_Helper()->data->getEddOrder( absint( $_GET['order-id'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			}
			if ( $order ) {
				$payment = EDD_Mollie_Helper()->api->getOrderPayment( $order );
				$instructions = nl2br( $this->getInstructions( $order, $payment, false, false ) );
				echo wp_kses_post( "<div>{$instructions}</div><br>" );
			}
		}
		catch ( Mollie\Api\Exceptions\ApiException $e ) {
			
		}
		return;
	}

	/**
	 * @param EDD_Payment                  $order
	 * @param Mollie\Api\Resources\Payment $payment
	 * @param bool                      $admin_instructions
	 * @param bool                      $plain_text
	 *
	 * @return string|null
	 */
	protected function getInstructions( $order, $payment, $admin_instructions, $plain_text ) {
		$instructions = '';

		if ( !$payment->details ) {
			return null;
		}

		$data_helper = EDD_Mollie_Helper()->data;

		if ( $payment->isPaid() ) {
			$instructions .= sprintf(
				/* translators: Placeholder 1: consumer name, placeholder 2: consumer IBAN, placeholder 3: consumer BIC */
				__( 'Payment completed by <strong>%1$s</strong> (IBAN (last 4 digits): %2$s, BIC: %3$s)', 'edd-mollie-gateway' ),
				$payment->details->consumerName,
				substr( $payment->details->consumerAccount, -4 ),
				$payment->details->consumerBic
			);
		} elseif ( $order->status == 'pending' || $order->status == 'processing' ) {
			if ( !$admin_instructions ) {
				$instructions .= __('Please complete your payment by transferring the total amount to the following bank account:', 'edd-mollie-gateway') . "\n\n";
			}

			$instructions .= sprintf(
				/* translators: Bank name */
				__( 'Beneficiary: %s', 'edd-mollie-gateway' ),
				$payment->details->bankName
			) . "\n";
			$instructions .= sprintf(
				/* translators: IBAN number */
				__( 'IBAN: <strong>%s</strong>', 'edd-mollie-gateway' ),
				implode( ' ', str_split( $payment->details->bankAccount, 4 ) )
			) . "\n";
			$instructions .= sprintf(
				/* translators: BIC number */
				__( 'BIC: %s', 'edd-mollie-gateway' ),
				$payment->details->bankBic
			) . "\n";

			if ( $admin_instructions ) {
				$instructions .= sprintf(
					/* translators: Placeholder 1: Payment reference e.g. RF49-0000-4716-6216 (SEPA) or +++513/7587/59959+++ (Belgium) */
					__( 'Payment reference: %s', 'edd-mollie-gateway' ),
					$payment->details->transferReference
				) . "\n";
			} else {
				$instructions .= sprintf(
					/* translators: Placeholder 1: Payment reference e.g. RF49-0000-4716-6216 (SEPA) or +++513/7587/59959+++ (Belgium) */
					__( 'Please provide the payment reference <strong>%s</strong>', 'edd-mollie-gateway' ),
					$payment->details->transferReference
				) . "\n";
			}

			if ( !empty( $payment->expiresAt ) ) {
				$expiry_date = date_i18n( get_option( 'date_format' ), strtotime( $payment->expiresAt ) );

				if ($admin_instructions) {
					$instructions .= "\n" . sprintf(
						/* translators: Expiry date */
						__( 'The payment will expire on <strong>%s</strong>.', 'edd-mollie-gateway' ),
						$expiry_date
					) . "\n";
				} else {
					$instructions .= "\n" . sprintf(
						/* translators: Expiry date */
						__( 'The payment will expire on <strong>%s</strong>. Please make sure you transfer the total amount before this date.', 'edd-mollie-gateway' ),
						$expiry_date
					) . "\n";
				}
			}
		}

		return $instructions;
	}
}
