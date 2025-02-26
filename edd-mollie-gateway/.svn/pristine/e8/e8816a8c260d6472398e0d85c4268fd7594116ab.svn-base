<?php

use Mollie\Api\Types\PaymentMethod;

class Mollie_EDD_Gateway_PayPal extends Mollie_EDD_Gateway_Mollie_Abstract
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
		return PaymentMethod::PAYPAL;
	}

	/**
	 * @return string
	 */
	public function getDefaultTitle() {
		return __( 'PayPal', 'edd-mollie-gateway' );
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
				/* translators: Placeholder 1: PayPal consumer name, placeholder 2: PayPal email, placeholder 3: PayPal transaction ID */
				__( 'Payment completed by <strong>%1$s</strong> - %2$s (PayPal transaction ID: %3$s)', 'edd-mollie-gateway' ),
				$payment->details->consumerName,
				$payment->details->consumerAccount,
				$payment->details->paypalReference
			);
		}
		return parent::getInstructions($order, $payment, $admin_instructions, $plain_text);
	}
}