<?php

use Stripe\StripeClient;

class DyDo_StripeAPI_Connect
{
    protected StripeClient $stripe;

    public function __construct()
    {
        $this->set_credentials();
    }

    private function set_credentials()
    {
        $stripe_sk = dydo_get_options_array()['payment']['stripe_sk'] ?: 'sk_xxxx_xxxxxxxxxxxxxxxxxxxxxxxx';

        $this->stripe = new StripeClient( $stripe_sk );
    }
}
