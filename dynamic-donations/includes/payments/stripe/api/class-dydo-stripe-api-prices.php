<?php

use Stripe\Collection;
use Stripe\Price;
use Stripe\ErrorObject;
use Stripe\Exception\ApiErrorException;

class DyDo_StripeAPI_Prices extends DyDo_StripeAPI_Connect {

	/**
	 * @param Array $params
	 * @return Customer|ErrorObject|null
	 */
	public function create( array $params ) {
		try {
			return $this->stripe->prices->create( $params );
		} catch ( ApiErrorException $e ) {
			return $e->getError();
		}
	}

	/**
	 * @param string $price_id
	 *
	 * @return Customer|ErrorObject|null
	 */
	public function retrieve( $price_id ) {
		try {
			return $this->stripe->prices->retrieve( $price_id );
		} catch ( ApiErrorException $e ) {
			return $e->getError();
		}
	}

}
