<?php

class DyDo_Payment
{
    /**
     * @param string $type
     *
     * @return DyDo_Stripe_Payment|null
     */
    public static function method( $type )
    {
        switch ( $type ) {
            case 'stripe':
                return new DyDo_Stripe_Payment();
            default:
                return null;
        }
    }
}
