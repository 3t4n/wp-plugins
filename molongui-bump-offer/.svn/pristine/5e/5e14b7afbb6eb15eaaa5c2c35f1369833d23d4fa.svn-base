<?php
defined( 'ABSPATH' ) or exit;
function mbo_get_bump( $bump_id = 0, $status = 'any', $schedule = 'active', $output = 'OBJECT' )
{
    if ( !$bump_id ) return false;

    return mbo_get_bumps( $bump_id, $status, $schedule, $output );
}
function mbo_get_bumps( $bump_id = 'all', $status = 'publish', $schedule = 'active', $output = 'OBJECT' )
{
    $data = array();
    $meta = array();
    if ( $bump_id === 'all' )
    {
        $posts = get_posts( array( 'post_type' => MOLONGUI_BUMP_OFFER_CPT, 'post_status' => $status, 'posts_per_page' => -1 ) );
        foreach ( $posts as $post )
        {
            foreach ( get_post_meta( (int) $post->ID ) as $key => $value )
            {
                if ( is_serialized( $value[0] ) ) $meta[$key] = unserialize( $value[0] );
                else $meta[$key] = $value[0];
            }
            $data[] = (object) array_merge( (array) $post, $meta );
        }
        $data = apply_filters( 'mbo/bump/get_all', $data, $schedule );
    }
    elseif ( is_numeric( $bump_id ) and get_post_type( $bump_id ) === MOLONGUI_BUMP_OFFER_CPT )
    {
        $post = get_post( (int) $bump_id );
        foreach ( get_post_meta( (int) $bump_id ) as $key => $value )
        {
            if ( is_serialized( $value[0] ) ) $meta[$key] = unserialize( $value[0] );
            else $meta[$key] = $value[0];
        }
        $data = (object) array_merge( (array) $post, $meta );
        $data = apply_filters( 'mbo/bump/get_single', $data, $bump_id );
    }
    else
    {
        return false;
    }
    if ( $output == ARRAY_A )
    {
        return $data->to_array();
    }
    elseif ( $output == ARRAY_N )
    {
        return array_values( $data->to_array() );
    }
    return $data;
}
function mbo_get_deal_price( $product_id, $criteria, $price )
{
    if ( empty( $product_id ) or empty( $criteria ) ) return '';

    switch ( $criteria )
    {
        case 'custom':
            $price = $price;
        break;

        case 'discount':
            if ( $price > 100 ) $price = wc_format_decimal( 100 );
            elseif ( $price < 0 ) $price = wc_format_decimal( 0 );

            $product = wc_get_product( $product_id );
            $regular = $product->get_regular_price();
            $price   = $regular * ( 1 - $price/100 );
        break;

        case 'sale':
            $product = wc_get_product( $product_id );
            $price   = $product->is_on_sale() ? $product->get_sale_price() : $product->get_regular_price();
        break;

        case 'regular':
        default:
            $product = wc_get_product( $product_id );
            $price   = $product->get_regular_price();
        break;
    }

    return $price;
}
function mbo_get_setting_value( $deal, $setting, $options, $defaults, $preview = false )
{
    if ( empty( $options ) )
    {
        $options = mbo_get_options();
    }
    if ( empty( $defaults ) )
    {
        $defaults = \mbo_get_defaults();
        $defaults = $defaults['default'];
    }
    if ( isset( $deal->{'_molongui_bump_'.$setting} ) )
    {
        return $deal->{'_molongui_bump_'.$setting};
    }
    if ( isset( $deal->{'_molongui_deal_'.$setting} ) )
    {
        return $deal->{'_molongui_deal_'.$setting};
    }
    elseif ( $preview )
    {
        if ( isset($options[$setting] ) )
        {
            return $options[$setting];
        }
        else
        {
            if ( isset( $defaults[$setting] ) )
            {
                return $defaults[$setting];
            }
        }
    }
    else
    {
        if ( isset( $defaults[$setting] ) )
        {
            return $defaults[$setting];
        }
    }
    return '';
}