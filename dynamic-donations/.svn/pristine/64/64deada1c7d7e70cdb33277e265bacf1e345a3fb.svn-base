<?php

use Stripe\Collection;
use Stripe\Customer;
use Stripe\ErrorObject;

class DyDo_Stripe_Prices {

	/**
	 * @param array $price_id
	 *
	 * @return Price|ErrorObject|null
	 */
	public static function retrieve( $price_id ) {
		$prices_api = new DyDo_StripeAPI_Prices();
		return $prices_api->retrieve( $price_id );
	}

	/**
	 * @param array $params
	 *
	 * @return Price|ErrorObject|null
	 */
	public static function create( $params ) {
		$prices = new DyDo_StripeAPI_Prices();
		return $prices->create( $params );
	}

}
