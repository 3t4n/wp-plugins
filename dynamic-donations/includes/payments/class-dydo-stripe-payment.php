<?php

class DyDo_Stripe_Payment extends DyDo_Abstract_Stripe_Payment
{
    /**
     * @param float $amount
     * @param string $payment_method_id
     * @param string $currency
     *
     * @return DyDo_Stripe_Onetime_Payment
     */
    public function onetime( $amount, $payment_method_id, $currency )
    {
        return new DyDo_Stripe_Onetime_Payment( $amount, $payment_method_id, $currency );
    }

    /**
     * @param string $payment_method_id
     * @param array $subscription_data
     *
     * @return DyDo_Stripe_Recurring_Payment
     */
    public function recurring( $payment_method_id, $subscription_data )
    {
        return new DyDo_Stripe_Recurring_Payment( $payment_method_id, $subscription_data );
    }
}
