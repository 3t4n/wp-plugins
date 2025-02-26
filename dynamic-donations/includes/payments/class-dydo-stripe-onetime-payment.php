<?php

use Stripe\ErrorObject;
use Stripe\PaymentIntent;
use Stripe\PaymentMethod;

class DyDo_Stripe_Onetime_Payment implements DyDo_Interface_Onetime_Payment
{
    /**
     * @var float
     */
    private $amount;

    /**
     * @var string
     */
    private $payment_method_id;

    /**
     * @var string
     */
    private $currency;

    /**
     * @param float $amount
     * @param string $payment_method_id
     * @param string $currency
     */
    public function __construct( $amount, $payment_method_id, $currency )
    {
        $this->amount            = $amount;
        $this->payment_method_id = $payment_method_id;
        $this->currency          = $currency;
    }

    /**
     * @return ErrorObject|PaymentIntent|null
     */
    public function pay()
    {
        $payment_intent = DyDo_Stripe_Resources::payment_intent( $this->amount, $this->currency );
        if ( $payment_intent instanceof ErrorObject ) {
            return $payment_intent;
        }

        if ( $this->payment_method_id ) {
            return $this->confirmation_method( $payment_intent->id, $this->payment_method_id );
        }

        return $payment_intent;
    }

    /**
     * @param string $payment_intent_id
     * @param string $payment_method_id
     *
     * @return ErrorObject|PaymentIntent|null
     */
    private function confirmation_method( $payment_intent_id, $payment_method_id )
    {
        return DyDo_Stripe_Resources::confirm_payment_intent( $payment_intent_id, $payment_method_id );
    }

    /**
     * @param string $payment_intent_id
     *
     * @return ErrorObject|PaymentMethod|null
     */
    private function attach_payment_method( $payment_intent_id )
    {
        return DyDo_Stripe_PaymentMethods::attach( $payment_intent_id );
    }
}
