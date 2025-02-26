<?php

use Stripe\Collection;
use Stripe\ErrorObject;
use Stripe\Exception\ApiErrorException;
use Stripe\PaymentMethod;

class DyDo_StripeAPI_PaymentMethods extends DyDo_StripeAPI_Connect
{
    /**
     * @param array $params
     *
     * @return Collection|ErrorObject|null
     */
    public function all( $params )
    {
        try {
            return $this->stripe->paymentMethods->all( $params );
        } catch ( ApiErrorException $e ) {
            return $e->getError();
        }
    }

    /**
     * @param string $payment_method_id
     * @param array $params
     *
     * @return ErrorObject|PaymentMethod|null
     */
    public function attach( $payment_method_id, $params )
    {
        try {
            return $this->stripe->paymentMethods->attach( $payment_method_id, $params );
        } catch ( ApiErrorException $e ) {
            return $e->getError();
        }
    }

        /**
     * @param string $payment_method_id
     * @return ErrorObject|PaymentMethod|null
     */
    public function detach( $payment_method_id )
    {
        try {
            return $this->stripe->paymentMethods->detach( $payment_method_id );
        } catch ( ApiErrorException $e ) {
            return $e->getError();
        }
    }

    public function update( $payment_method_id, $card ) {
        try {
            return $this->stripe->paymentMethods->update( $payment_method_id, $card );
        } catch ( ApiErrorException $e ) {
            return $e->getError();
        }
    }
}
