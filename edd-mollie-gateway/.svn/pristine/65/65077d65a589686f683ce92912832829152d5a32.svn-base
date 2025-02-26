<?php

use Mollie\Api\Types\PaymentMethod;

class Mollie_EDD_Gateway_Belfius extends Mollie_EDD_Gateway_Mollie_Abstract
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
		return PaymentMethod::BELFIUS;
	}

	/**
	 * @return string
	 */
	public function getDefaultTitle() {
		return __( 'Belfius Direct Net', 'edd-mollie-gateway' );
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
