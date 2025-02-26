<?php

use Stripe\ErrorObject;
use Stripe\PaymentIntent;
use Stripe\SetupIntent;


class DyDo_Stripe_Resources
{
    /**
     * @return ErrorObject|SetupIntent|null
     */
    public static function setup_intent()
    {
        $resources = new DyDo_StripeAPI_Resources();

        // Get customer
        $customer = DyDo_Stripe_Customers::retrieve_or_create();
        if ( $customer instanceof ErrorObject ) {
            return $customer;
        }

        // Setup
        $data = [
            'payment_method_types' => [ 'card' ],
            'customer'             => $customer->id,
            'description'          => 'Recurring Donation'
        ];

        return $resources->setup_intent( $data );
    }

    /**
     * @param int $amount
     * @param string $currency
     *
     * @return ErrorObject|PaymentIntent|null
     */
    public static function payment_intent( $amount, $currency )
    {
        $resources = new DyDo_StripeAPI_Resources();

        // Get customer
        $customer = DyDo_Stripe_Customers::retrieve_or_create();
        if ( $customer instanceof ErrorObject ) {
            return $customer;
        }

        $index        = array_search( $currency, array_column( DYDO_SUPPORTED_CURRENCIES, 'iso' ) );
        $zero_decimal = DYDO_SUPPORTED_CURRENCIES[ $currency ]['zero_decimal'];

        if ( $zero_decimal == false ) {
            $amount = $amount * 100;
        }

        $user = get_user_by( 'id', get_current_user_id() );

        // Payment
        $data = [
            'amount'               => $amount,
            'currency'             => $currency,
            'payment_method_types' => [ 'card' ],
            'customer'             => $customer->id,
            'description'          => 'One time Donation',
            'setup_future_usage'   => 'off_session',
            'receipt_email'        => $customer->email,
            'metadata'             => [
                'wp_user_id'    => $user->ID,
                'wp_user_email' => $user->user_email,
            ]
        ];

        return $resources->payment_intent( $data );
    }

    /**
     * @param string $payment_intent_id
     * @param string $payment_method_id
     *
     * @return ErrorObject|PaymentIntent|null
     */
    public static function confirm_payment_intent( $payment_intent_id, $payment_method_id )
    {
        $resources = new DyDo_StripeAPI_Resources();
        $data      = [
            'payment_method' => $payment_method_id
        ];

        return $resources->confirm_payment_intent( $payment_intent_id, $data );
    }

    public static function list_payment_intent($customer_id, $limit = 3)
    {
        $resources = new DyDo_StripeAPI_Resources();
        $data      = [
            'customer' => $customer_id,
            'limit' => $limit,
        ];
        $payments = $resources->list_all_payments($data);
        if ($payments instanceof ErrorObject) {
            if ( strpos(strtolower($payments->message), 'api') !== false) {
                throw new Exception("Api key missing or invalid", 1);
            }
            return false;
        }
        return $payments;
    }
}
