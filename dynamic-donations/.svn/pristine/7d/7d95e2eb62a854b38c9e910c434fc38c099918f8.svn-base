<?php

use Stripe\Collection;
use Stripe\Customer;
use Stripe\ErrorObject;
use Stripe\Exception\ApiErrorException;

class DyDo_StripeAPI_Customers extends DyDo_StripeAPI_Connect
{
    /**
     * @param int $limit
     *
     * @return Collection|ErrorObject|null
     */
    public function all( $limit )
    {
        try {
            return $this->stripe->customers->all( [ 'limit' => $limit ] );
        } catch ( ApiErrorException $e ) {
            return $e->getError();
        }
    }

    /**
     * @param string $customer_id
     * @param array $data
     *
     * @return Customer|ErrorObject|null
     */
    public function update( $customer_id, $data )
    {
        try {
            return $this->stripe->customers->update( $customer_id, $data );
        } catch ( ApiErrorException $e ) {
            return $e->getError();
        }
    }

    /**
     * @param string|int $user_id
     * @param string $user_email
     * @param string $user_name
     *
     * @return Customer|ErrorObject|null
     */
    public function create( $user_id, $user_email, $user_name )
    {
        try {
            return $this->stripe->customers->create( [
                'name'     => $user_name,
                'email'    => $user_email,
                'metadata' => [
                    'wp_user_id' => $user_id
                ]
            ] );
        } catch ( ApiErrorException $e ) {
            return $e->getError();
        }
    }

    /**
     * @param string $customer_id
     *
     * @return Customer|ErrorObject|null
     */
    public function retrieve( $customer_id )
    {
        try {
            return $this->stripe->customers->retrieve( $customer_id );
        } catch ( ApiErrorException $e ) {
            return $e->getError();
        }
    }

    public function payment_method_set_as_primary ($customer_id, $parameters) 
    {
        try {
            return $this->stripe->customers->update( $customer_id, $parameters );
        } catch (\Throwable $th) {
            return $e->getError();
        }
    }

}
