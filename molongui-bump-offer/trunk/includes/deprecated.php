<?php
defined( 'ABSPATH' ) or exit;
function mbo_merge_options( $array )
{
    $merged = array();
    foreach ( $array as $key => $value )
    {
        $defaults = mbo_get_defaults();

        $default_key = str_replace( MOLONGUI_BUMP_OFFER_PREFIX.'_', '', $key );
        if ( is_array( $value ) and !empty( $defaults[$default_key] ) )
        {
            $merged[$key] = array_merge( $defaults[$default_key], $array[$key] );
        }
        else
        {
            $merged[$key] = $value;
        }
        unset( $defaults[$default_key] );
    }
    foreach ( $defaults as $key => $value )
    {
        $merged[MOLONGUI_BUMP_OFFER_PREFIX.'_'.$key] = $value;
    }
    return $merged;
}