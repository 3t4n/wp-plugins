<?php

use Stripe\Plan;

class DyDo_Stripe_Plans
{
    /**
     * @param string $product_id
     * @param array $subscription_data
     *
     * @return Plan
     */
    public static function create( $product_id, $subscription_data )
    {
        $plans     = new DyDo_StripeAPI_Plans();
        $plan_data = self::set_plan(
            $product_id,
            $subscription_data['amount'],
            $subscription_data['period']['mode'],
            $subscription_data['period']['interval'] ?? '',
            $subscription_data['period']['intervalCount'] ?? 1,
            $subscription_data['currency'] ?? 'usd',
        );

        return $plans->create( $plan_data );
    }

    /**
     * @param $product_id
     * @param $amount
     * @param $mode
     * @param string $interval
     * @param int $interval_count
     * @param $currency
     *
     * @return array
     */
    private static function set_plan( $product_id, $amount, $mode, $interval, $interval_count, $currency )
    {
        $zero_decimal = DYDO_SUPPORTED_CURRENCIES[ $currency ]['zero_decimal'];

        if ( !$zero_decimal ) {
            $amount = $amount * 100;
        }

        $config_plan = [
            'amount'   => (float) $amount,
            'currency' => $currency,
            'product'  => $product_id,
        ];

        switch ( $mode ) {
            case 'custom':
                return array_merge( $config_plan, [
                    'interval'       => $interval,
                    'interval_count' => $interval_count
                ] );
            default:
                return array_merge( $config_plan, [
                    'interval' => $mode
                ] );
        }
    }
}
