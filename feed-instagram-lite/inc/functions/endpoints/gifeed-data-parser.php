<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function gifeed_modify_json_output( $json, $uid, $callback )
{

    if ( isset( $json['error'] ) ) {

        $json['meta'] = array( 'code' => 400 );
        $json['meta'] = array( 'error_message' => $json['error']['message'] );
        unset( $json['error'] );

        return $json;

    }

    if ( ! isset( $json['data'] ) ) {

        $json['data'] = array();

        $json['meta'] = array( 'code' => 400 );
        $json['meta'] = array( 'error_message' => __( 'Please go to Settings page, delete your current Instagram account and try again to generate new access token', 'feed-instagram-lite' ) );

        return $json;

    }

    // Set status
    $json['meta'] = array( 'code' => 200 );

    // Pagination
    if ( isset( $json['paging'] ) && isset( $json['paging']['next'] ) ) {

        $json['pagination'] = array(
            'next_url' => admin_url( 'admin-ajax.php' ).'?action=gifeed_get_feeds&security='.wp_create_nonce( 'gifeed_authentication' ).'&next_url='.rawurlencode( $json['paging']['next'] ).'&callback='.$callback,
            'cursors'  => array( 'after' => $json['paging']['cursors']['after'] ) );
        unset( $json['paging'] );

    }

    // Modify each item
    foreach ( $json['data'] as $key => $val ) {

        // Media Type
        $json['data'][$key]['type'] = strtolower( $json['data'][$key]['media_type'] );
        unset( $json['data'][$key]['media_type'] );

        // Image properties
        $json['data'][$key]['images'] = ( isset( $json['data'][$key]['media_url'] ) ? $json['data'][$key]['media_url'] : '' );
        unset( $json['data'][$key]['media_url'] );

        $image_res = array(
            'low_resolution'      => array( 'width' => '320', 'height' => '400', 'url' => $json['data'][$key]['images'] ),
            'standard_resolution' => array( 'width' => '800', 'height' => '640', 'url' => $json['data'][$key]['images'] ),
            'thumbnail'           => array( 'width' => '150', 'height' => '150', 'url' => $json['data'][$key]['images'],
            ) );

        $json['data'][$key]['images'] = $image_res;

        if ( $json['data'][$key]['type'] == 'video' ) {

            $videos = $json['data'][$key]['images'];

            $json['data'][$key]['videos'] = array(
                'low_resolution'      => array( 'width' => '320', 'height' => '400', 'url' => $videos['low_resolution']['url'], 'poster' => $json['data'][$key]['permalink'].'media?size=m' ),
                'standard_resolution' => array( 'width' => '800', 'height' => '640', 'url' => $videos['standard_resolution']['url'], 'poster' => $json['data'][$key]['permalink'].'media?size=l' ),
                'low_bandwidth'       => array( 'width' => '150', 'height' => '150', 'url' => $videos['thumbnail']['url'], 'poster' => $json['data'][$key]['permalink'].'media?size=t',
                ) );

            unset( $json['data'][$key]['images'] );

        }

        // Image Caption
        $json['data'][$key]['caption'] = array( 'text' => ( isset( $json['data'][$key]['caption'] ) ? $json['data'][$key]['caption'] : '' ) );
        // Image Likes
        $json['data'][$key]['likes']['count'] = ( isset( $json['data'][$key]['like_count'] ) ? $json['data'][$key]['like_count'] : '' );
        unset( $json['data'][$key]['like_count'] );
        // Image Comments
        $json['data'][$key]['comments']['count'] = ( isset( $json['data'][$key]['comments_count'] ) ? $json['data'][$key]['comments_count'] : '' );
        unset( $json['data'][$key]['comments_count'] );
        // Permalink
        $json['data'][$key]['link'] = $json['data'][$key]['permalink'];
        unset( $json['data'][$key]['permalink'] );
        // User Info
        if ( ( isset( $_GET['type'] ) && $_GET['type'] == 'user' ) && $uid != '' ) $json['data'][$key]['user'] = gfeed_get_user_data( $uid );

    }

    return $json;

}