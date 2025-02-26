<?php

use Stripe\Exception\ApiErrorException;
use Stripe\Plan;

class DyDo_StripeAPI_Plans extends DyDo_StripeAPI_Connect
{
    /**
     * @param array $plan_data
     *
     * @return Plan
     */
    public function create( $plan_data )
    {
        try {
            return $this->stripe->plans->create( $plan_data );
        } catch ( ApiErrorException $e ) {
            return $e->getError();
        }
    }
}
