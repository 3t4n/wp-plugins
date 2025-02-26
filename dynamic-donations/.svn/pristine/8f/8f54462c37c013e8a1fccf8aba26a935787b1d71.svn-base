<?php

use Stripe\Exception\ApiErrorException;
use Stripe\Webhook;

class DyDo_StripeAPI_Webhooks extends DyDo_StripeAPI_Connect {

	/**
	 * @param array $params
	 *
	 * @return Webhook
	 */
	public function create( $params ) {
		try {
			return $this->stripe->webhookEndpoints->create( $params );
		} catch ( ApiErrorException $e ) {
			return $e->getError();
		}
	}

	/**
	 * @param array $webhook_id
	 *
	 * @return Webhook
	*/
	public function retrieve( $webhook_id ) {
		try {
			return $this->stripe->webhookEndpoints->retrieve( $webhook_id );
		} catch ( ApiErrorException $e ) {
			return $e->getError();
		}
	}

	
	/**
	 * @param array $webhook_id
	 *
	 * @return Webhook
	*/
	public function delete( $webhook_id ) {
		try {
			return $this->stripe->webhookEndpoints->delete( $webhook_id );
		} catch ( ApiErrorException $e ) {
			return $e->getError();
		}
	}
}
