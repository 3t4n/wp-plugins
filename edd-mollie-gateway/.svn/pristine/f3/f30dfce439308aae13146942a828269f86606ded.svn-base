<?php

use Mollie\Api\Types\PaymentMethod;

class Mollie_EDD_Gateway_Sofort extends Mollie_EDD_Gateway_Mollie_Abstract
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

		$this->supports_sepa_directdebit = true;
	}

	/**
	 * @return string
	 */
	public function getMollieMethodId ()
	{
		return PaymentMethod::SOFORT;
	}

	/**
	 * @return string
	 */
	public function getDefaultTitle ()
	{
		return __('SOFORT Banking', 'edd-mollie-gateway');
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
	 * @param WC_Order                  $order
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
				/* translators: Placeholder 1: consumer name, placeholder 2: consumer IBAN, placeholder 3: consumer BIC */
				__('Payment completed by <strong>%1$s</strong> (IBAN (last 4 digits): %2$s, BIC: %3$s)', 'edd-mollie-gateway'),
				$payment->details->consumerName,
				substr($payment->details->consumerAccount, -4),
				$payment->details->consumerBic
			);
		}

		return parent::getInstructions($order, $payment, $admin_instructions, $plain_text);
	}
}