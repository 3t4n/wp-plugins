<?php

use Mollie\Api\Types\PaymentMethod;

class Mollie_EDD_Gateway_Bancontact extends Mollie_EDD_Gateway_Mollie_Abstract
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
		return PaymentMethod::BANCONTACT;
	}

	/**
	 * @return string
	 */
	public function getDefaultTitle() {
		return __( 'Bancontact', 'edd-mollie-gateway' );
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
