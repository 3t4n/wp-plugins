<?php

use Stripe\ErrorObject;
use Stripe\Subscription;

class DyDo_Stripe_Recurring_Payment implements DyDo_Interface_Recurring_Payment
{
    /**
     * @var string
     */
    private $payment_method_id;

    /**
     * @var array
     */
    private $subscription_data;

    /**
     * @param string $payment_method_id
     * @param array $subscription_data
     */
    public function __construct( $payment_method_id, $subscription_data )
    {
        $this->payment_method_id = $payment_method_id;
        $this->subscription_data = $subscription_data;
    }

    /**
     * @return ErrorObject|Subscription|null
     */
    public function pay()
    {
        // 1. Update invoice customer
        $customer = DyDo_Stripe_Customers::update( [
            'invoice_settings' => [
                'default_payment_method' => $this->payment_method_id,
            ]
        ] );
        if ( $customer instanceof ErrorObject ) {
            return $customer;
        }

        // 2. Create product
        $product = DyDo_Stripe_Products::create( $this->subscription_data['amount'] );
        if ( $product instanceof ErrorObject ) {
            return $product;
        }

        // 3. Create plan
        $plan = DyDo_Stripe_Plans::create( $product->id, $this->subscription_data );
        if ( $plan instanceof ErrorObject ) {
            return $plan;
        }

        // 4. Create Subscription
        return DyDo_Stripe_Subscriptions::create( $plan->id,  $this->subscription_data['period']['startDate']);
    }

    public function update()
    {
    }
}
