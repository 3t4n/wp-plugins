<?php

use Mollie\Api\Types\PaymentMethod;

class Mollie_EDD_Gateway_Paysafecard extends Mollie_EDD_Gateway_Mollie_Abstract
{
	/**
	 * @return string
	 */
	public function getMollieMethodId() {
		return PaymentMethod::PAYSAFECARD;
	}

	/**
	 * @return string
	 */
	public function getDefaultTitle() {
		return __( 'paysafecard', 'edd-mollie-gateway' );
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
}
