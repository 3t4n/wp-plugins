<?php

use Mollie\Api\Types\PaymentMethod;

class Mollie_EDD_Gateway_Przelewy24 extends Mollie_EDD_Gateway_Mollie_Abstract
{
	/**
	 *
	 */
	public function __construct() {
		$this->supports = array (
			'products',
			'refunds',
		);

		parent::__construct();

	}

	/**
	 * @return string
	 */
	public function getMollieMethodId() {
		return PaymentMethod::PRZELEWY24;
	}

	/**
	 * @return string
	 */
	public function getDefaultTitle() {
		return __( 'Przelewy24', 'edd-mollie-gateway' );
	}

	/**
	 * @return string
	 */
	protected function getSettingsDescription() {
		return __('To accept payments via Przelewy24, a customer email is required for every payment.', 'edd-mollie-gateway');
	}

	/**
	 * @return string
	 */
	protected function getDefaultDescription() {
		return '';
	}
	
	/**
	 * @param EDD_Payment               $order
	 * @param Mollie\Api\Resources\Payment $payment
	 * @param bool                      $admin_instructions
	 * @param bool                      $plain_text
	 * @return string|null
	 */
	protected function getInstructions ( $order, $payment, $admin_instructions, $plain_text )
	{
		if ($payment->isPaid() && $payment->details)
		{
			return sprintf(
				/* translators: Placeholder 1: customer billing email */
				__("Payment completed by <strong>%s</strong>.", 'edd-mollie-gateway'),
				$payment->details->billingEmail
			);
		}
		return parent::getInstructions($order, $payment, $admin_instructions, $plain_text);
	}
}
