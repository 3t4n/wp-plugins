<?php

use Mollie\Api\Types\PaymentMethod;

class Mollie_EDD_Gateway_MyBank extends Mollie_EDD_Gateway_Mollie_Abstract
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

		$this->supports_sepa_directdebit = true;
	}

	/**
	 * @return string
	 */
	public function getMollieMethodId() {
		return PaymentMethod::MYBANK;
	}

	/**
	 * @return string
	 */
	public function getDefaultTitle() {
		return __( 'MyBank', 'edd-mollie-gateway' );
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
				/* translators: Placeholder 1: MyBank consumer name, placeholder 2: Consumer Account number */
				__(
					'Payment completed by <strong>%1$s</strong> - %2$s',
					'edd-mollie-gateway'
				),
				$payment->details->consumerName,
				$payment->details->consumerAccount
			);
		}
		return parent::getInstructions($order, $payment, $admin_instructions, $plain_text);
	}
}
