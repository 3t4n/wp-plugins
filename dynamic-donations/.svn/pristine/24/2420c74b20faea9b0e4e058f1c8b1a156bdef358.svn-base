<?php

abstract class DyDo_Abstract_Stripe_Payment {
    /**
     * @param float $amount
     * @param string $payment_method_id
     * @param string $currency
     *
     * @return DyDo_Stripe_Onetime_Payment
     */
    abstract public function onetime( $amount, $payment_method_id, $currency );

    /**
     * @param string $payment_method_id
     * @param array $subscription_data
     *
     * @return DyDo_Stripe_Recurring_Payment
     */
    abstract public function recurring( $payment_method_id, $subscription_data );
}
