<?php

use Stripe\Exception\ApiErrorException;
use Stripe\Invoice;

class DyDo_StripeAPI_Invoices extends DyDo_StripeAPI_Connect {

	/**
	 * @param array $params
	 *
	 * @return Invoice
	 */
	public function upcoming( $params ) {
		try {
			return $this->stripe->invoices->upcoming( $params );
		} catch ( ApiErrorException $e ) {
			return $e->getError();
		}
	}

	/**
	 * @param string $invoice_id
	 *
	 * @return Invoice
	 */
	public function retrieve( $invoice_id ) {
		try {
			return $this->stripe->invoices->retrieve( $invoice_id );
		} catch ( ApiErrorException $e ) {
			return $e->getError();
		}
	}

		/**
	 * @param array $optional_parameters
	 *
	 * @return Invoice
	 */
	public function list_all_invoices( array $optional_parameters = [] ) {
		try {
			return $this->stripe->invoices->all( $optional_parameters );
		} catch ( ApiErrorException $e ) {
			return $e->getError();
		}
	}
}
