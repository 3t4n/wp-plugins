<?php
defined( 'ABSPATH' ) or exit;
if ( !function_exists( 'molongui_cache_get' ) )
{
    function molongui_cache_get( $key )
    {
        if ( empty( $key ) ) return false;
        return wp_cache_get( $key, MOLONGUI_BUMP_OFFER_NAME );
    }
}
if ( !function_exists( 'molongui_cache_set' ) )
{
    function molongui_cache_set( $key, $data )
    {
        if ( empty( $key ) or empty( $data ) ) return false;
        return wp_cache_set( $key, $data, MOLONGUI_BUMP_OFFER_NAME );
    }
}
if ( !function_exists( 'molongui_cache_clear' ) )
{
    function molongui_cache_clear( $key )
    {
        if ( empty( $key ) ) return;
        $hashes = get_option( MOLONGUI_BUMP_OFFER_PREFIX . '_cache_' . $key, array() );
        delete_option( MOLONGUI_BUMP_OFFER_PREFIX . '_cache_' . $key );
        foreach ( $hashes as $hash ) wp_cache_delete( $key . '_' . $hash, MOLONGUI_BUMP_OFFER_NAME );
    }
}
if ( !function_exists( 'molongui_query' ) )
{
    function molongui_query( $args, $object )
    {
        $cache = apply_filters( 'mbo/cache', true );
        if ( !$cache )
        {
            if ( 'users' === $object ) return get_users( $args );
            else return new WP_Query( $args );
        }
        else
        {
            $hash = md5( serialize( $args ) );
            $key  = $object . '_' . $hash;
            $data = molongui_cache_get( $key );
            if ( false === $data )
            {
                if ( 'users' === $object ) $data = get_users( $args );
                else $data = new WP_Query( $args );
                molongui_cache_set( $key, $data );
                $db_key = MOLONGUI_BUMP_OFFER_PREFIX . '_cache_' . $object;
                $hashes = get_option( $db_key, array() );
                $update = update_option( $db_key, !in_array( $hash, $hashes ) ? array_merge( $hashes, array( $hash ) ) : $hashes, true );
            }

            return $data;
        }
    }
}