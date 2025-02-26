<?php

use Stripe\ErrorObject;
use Stripe\Exception\ApiErrorException;
use Stripe\PaymentIntent;
use Stripe\SetupIntent;

class DyDo_StripeAPI_Resources extends DyDo_StripeAPI_Connect
{
    /**
     * @param array $data
     *
     * @return ErrorObject|SetupIntent|null
     */
    public function setup_intent( $data )
    {
        try {
            return $this->stripe->setupIntents->create( $data );
        } catch ( ApiErrorException $e ) {
            return $e->getError();
        }
    }

    /**
     * @param array $data
     *
     * @return ErrorObject|PaymentIntent|null
     */
    public function payment_intent( $data )
    {
        try {
            return $this->stripe->paymentIntents->create( $data );
        } catch ( ApiErrorException $e ) {
            return $e->getError();
        }
    }

    /**
     * @param string $payment_intent_id
     *
     * @return ErrorObject|PaymentIntent|null
     */
    public function retrive_payment_intent( $payment_intent_id )
    {
        try {
            return $this->stripe->paymentIntents->retrieve( $payment_intent_id );
        } catch ( ApiErrorException $e ) {
            return $e->getError();
        }
    }

    /**
     * @param string $payment_intent_id
     * @param array $data
     *
     * @return ErrorObject|PaymentIntent|null
     */
    public function confirm_payment_intent( $payment_intent_id, $data )
    {
        try {
            return $this->stripe->paymentIntents->confirm( $payment_intent_id, $data );
        } catch ( ApiErrorException $e ) {
            return $e->getError();
        }
    }


    /**
     * @param array $data
     *
     * @return ErrorObject|PaymentIntent|null
     */
    public function list_all_payments( array $data )
    {
        try {
            return $this->stripe->paymentIntents->all( $data );
        } catch ( ApiErrorException $e ) {
            return $e->getError();
        }
    }

}
