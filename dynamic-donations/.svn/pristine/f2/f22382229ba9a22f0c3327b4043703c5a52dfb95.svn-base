<?php

use Stripe\Collection;
use Stripe\ErrorObject;
use Stripe\PaymentMethod;

class DyDo_Stripe_PaymentMethods
{
    /**
     * @param int $limit
     *
     * @return Collection|ErrorObject|null
     */
    public static function all( $limit = 100, $id = false )
    {
        $paymentmethods = new DyDo_StripeAPI_PaymentMethods();

        // Get customer
        $customer = DyDo_Stripe_Customers::retrieve_or_create();
        if ( $customer instanceof ErrorObject ) {
            return $customer;
        }

        $customer_id = ($id) ? $id :$customer->id ;

        // Get Payment Methods
        $params = [
            'customer' => $customer_id,
            'type'     => 'card',
            'limit'    => $limit
        ];

        return $paymentmethods->all( $params );
    }

    /**
     * @param string $payment_method_id
     *
     * @return ErrorObject|PaymentMethod|null
     */
    public static function attach( $payment_method_id )
    {
        $paymentmethods = new DyDo_StripeAPI_PaymentMethods();

        // Get customer
        $customer = DyDo_Stripe_Customers::retrieve();
        if ( $customer instanceof ErrorObject ) {
            return $customer;
        }

        // Get Payment Methods
        $params = [
            'customer' => $customer->id,
        ];

        return $paymentmethods->attach( $payment_method_id, $params );
    }

        /**
      *@param array  $payment_methods
     * @param string $default_payment_method_id
     *
     * @return ErrorObject|array|null
     */
    public static function detach_payment_methods( $payment_methods, $default_payment_method_id )
    {
        $customer = DyDo_Stripe_Customers::update( [
            'invoice_settings' => [
                'default_payment_method' => $default_payment_method_id ,
            ]
        ] );
        if ($customer instanceof ErrorObject) {
			throw new Exception($customer->message);
        }
        $detachment_result= [];
        $Payment_Methods = new DyDo_StripeAPI_PaymentMethods();
        foreach ($payment_methods as $pm) {
            $detached = $Payment_Methods->detach( $pm );
            if ($detached instanceof ErrorObject) {
                throw new Exception($detached->message);
            }
            array_push($detachment_result, $detached);
        }
        return ["detached"=>$detachment_result, "default_method"=>$customer];
    }

    public static function update_payment_method ( $payment_method_id, $exp_month, $exp_year ) {
        
        $paymentmethods = new DyDo_StripeAPI_PaymentMethods();
        $paymentmethods->card = [
            'exp_month' => $exp_month,
            'exp_year' => $exp_year,
          ];
        return $paymentmethods->update($payment_method_id, $paymentmethods);
    }

    public static function get_payment_methods_by_customer ($customer_id) 
    {

        $payments_methods = self::all( 100, $customer_id);

        // $users = get_users();
        // $array_payments_methods_all_customers = [];
        // foreach ($users as $user) {
        //     $item_user = DyDo_Stripe_Customers::wp_get_user_customer_id($user->ID);
        //     $payments_methods = self::all( 100, $item_user);
        //     array_push($array_payments_methods_all_customers, $payments_methods);
        // }

        return $payments_methods;
    }
}
