<?php

use Stripe\ErrorObject;
use Stripe\Exception\ApiErrorException;
use Stripe\Product;

class DyDo_StripeAPI_Products extends DyDo_StripeAPI_Connect
{
    /**
     * @param string $product_name
     *
     * @return ErrorObject|Product|null
     */
    public function create( $product_name )
    {
        try {
            return $this->stripe->products->create( [
                'name' => $product_name,
            ] );
        } catch ( ApiErrorException $e ) {
            return $e->getError();
        }
    }
}
