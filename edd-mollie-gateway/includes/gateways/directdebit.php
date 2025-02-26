<?php

use Mollie\Api\Types\PaymentMethod;

class Mollie_EDD_Gateway_DirectDebit extends Mollie_EDD_Gateway_Mollie_Abstract
{
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

	/**
	 * Initialise Gateway Settings Form Fields
	 */
	public function init_form_fields() {
		parent::init_form_fields();

		unset( $this->form_fields['display_logo'] );
		unset( $this->form_fields['description'] );

		if ( class_exists( 'EDD_Mollie_Recurring' ) ) {
			$this->form_fields = array_merge($this->form_fields, array(
				'startdate_offset' => array(
					'title'       => __('Start renewal', 'edd-mollie-gateway'),
					'label'       => __('days in advance', 'edd-mollie-gateway'),
					'type'        => 'number',
					'size'        => 2,
					'description' => sprintf(__('Mollie reports a minimum processing time of 1-2 work days, and the average processing time is around 4 days. To avoid gaps between the expiration date and the renewal, this setting allows initiating the transaction a few days in advance.', 'edd-mollie-gateway'), $this->getDefaultTitle()),
					'default'     => 4,
					'desc_tip'    => false,
				),
			));
		}
	}

	/**
	 * @return string
	 */
	public function getDefaultTitle() {
		return __( 'SEPA Direct Debit', 'edd-mollie-gateway' );
	}

	/**
	 * @return string
	 */
	protected function getSettingsDescription() {
		return __( 'SEPA Direct Debit is used for Recurring Payments, and will not be shown in the EDD checkout for regular payments! You also need to enable iDEAL and/or other "first" payment methods if you want to use SEPA Direct Debit.', 'edd-mollie-gateway' );
	}

	/**
	 * @return string
	 */
	protected function getDefaultDescription() {
		return '';
	}

	/**
	 * {@inheritdoc}
	 *
	 * @return bool
	 */
	protected function paymentConfirmationAfterCoupleOfDays() {
		return true;
	}

	/**
	 * @param WC_Order                  $order
	 * @param Mollie\Api\Resources\Payment $payment
	 * @param bool                      $admin_instructions
	 * @param bool                      $plain_text
	 *
	 * @return string|null
	 */
	protected function getInstructions( $order, $payment, $admin_instructions, $plain_text ) {
		if ( $payment->isPaid() && $payment->details ) {
			return sprintf(
				/* translators: Placeholder 1: consumer name, placeholder 2: consumer IBAN, placeholder 3: consumer BIC */
				__( 'Payment completed by <strong>%1$s</strong> (IBAN (last 4 digits): %2$s, BIC: %3$s)', 'edd-mollie-gateway' ),
				$payment->details->consumerName,
				substr($payment->details->consumerAccount, -4),
				$payment->details->consumerBic
			);
		}

		return parent::getInstructions( $order, $payment, $admin_instructions, $plain_text );
	}
}