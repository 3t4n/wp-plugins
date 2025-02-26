<?php

use Stripe\Collection;
use Stripe\Customer;
use Stripe\ErrorObject;

class DyDo_Stripe_Customers
{
    /**
     * @var string
     */
    private static string $stripe_meta_key = 'dydo_stripe_customer_id';

    /**
     * @param int $limit
     *
     * @return Collection|ErrorObject|null
     */
    public static function all( $limit = 3 )
    {
        $customers = new DyDo_StripeAPI_Customers();

        return $customers->all( $limit );
    }

    /**
     * @return mixed|Customer|ErrorObject|null
     */
    public static function retrieve_or_create()
    {
        $customer_id = self::wp_get_user_customer_id();

        if ( $customer_id == 'c0' ) {
            return self::create();
        } else {
            return self::retrieve();
        }
    }

    /**
     * @return Customer|ErrorObject|null
     */
    public static function retrieve()
    {
        $customers   = new DyDo_StripeAPI_Customers();
        $customer_id = self::wp_get_user_customer_id();

        return $customers->retrieve( $customer_id );
    }

    /**
     * @return mixed|Customer|ErrorObject|null
     */
    public static function create()
    {
        $customers  = new DyDo_StripeAPI_Customers();
        $user       = get_userdata( get_current_user_id() );
        $user_id    = $user->ID;
        $user_email = $user->user_email;
        $user_name  = "{$user->first_name} {$user->last_name}";

        $customer = $customers->create( $user_id, $user_email, $user_name );
        if ( ! ( $customer instanceof ErrorObject ) ) {
            update_user_meta( $user_id, self::$stripe_meta_key, $customer->id );
        }

        return $customer;
    }

    /**
     * @param array $data
     *
     * @return Customer|ErrorObject|null
     */
    public static function update( $data )
    {
        $customers   = new DyDo_StripeAPI_Customers();
        $customer_id = self::wp_get_user_customer_id();

        return $customers->update( $customer_id, $data );
    }

    public static function payment_method_set_as_primary ($paymentmethod)
    {
        $customers   = new DyDo_StripeAPI_Customers();
        $customer_id = self::wp_get_user_customer_id();

        // $parameters = array();
        $parameters = [
            'invoice_settings' => [
                'default_payment_method' => $paymentmethod
            ]
        ];
        return $customers->payment_method_set_as_primary( $customer_id, $parameters );
    }

    /**
     * @return mixed|string
     */
    public static function wp_get_user_customer_id($id = false)
    {
        $user_id = ($id) ? $id : get_current_user_id() ;
        return get_user_meta( $user_id , self::$stripe_meta_key, true ) ?: 'c0';

    }

}
