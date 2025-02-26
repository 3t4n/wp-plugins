<?php

use Stripe\ErrorObject;
use Stripe\Product;

class DyDo_Stripe_Products
{
    /**
     * @param string $amount
     *
     * @return ErrorObject|Product|null
     */
    public static function create( $amount )
    {
        $products     = new DyDo_StripeAPI_Products();
        $product_name = 'Dynamic Donation - Plan $' . $amount;

        return $products->create( $product_name );
    }
}
