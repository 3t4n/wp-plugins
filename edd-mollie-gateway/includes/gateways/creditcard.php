<?php

use Mollie\Api\Types\PaymentMethod;

class Mollie_EDD_Gateway_Creditcard extends Mollie_EDD_Gateway_Mollie_Abstract
{
	/**
	 *
	 */
	public function __construct ()
	{
		$this->supports = array(
			'products',
			'refunds'
		);

		parent::__construct();
	}

	/**
	 * @return string
	 */
	public function getMollieMethodId ()
	{
		return PaymentMethod::CREDITCARD;
	}

	/**
	 * @return string
	 */
	public function getDefaultTitle ()
	{
		return __('Credit card', 'edd-mollie-gateway');
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
	 * @param EDD_Payment                  $order
	 * @param Mollie\Api\Resources\Payment $payment
	 * @param bool                         $admin_instructions
	 * @param bool                         $plain_text
	 * @return string|null
	 */
	protected function getInstructions ( $order, $payment, $admin_instructions, $plain_text )
	{
		if ($payment->isPaid() && $payment->details)
		{
			return sprintf(
				/* translators: Placeholder 1: card holder */
				__('Payment completed by <strong>%s</strong>', 'edd-mollie-gateway'),
				$payment->details->cardHolder
			);
		}

		return parent::getInstructions($order, $payment, $admin_instructions, $plain_text);

	}
}
