<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/*-------------------------------------------------------------------------------*/
/*  Ajax get Feeds
/*-------------------------------------------------------------------------------*/
add_action( 'wp_ajax_nopriv_gifeed_get_feeds', 'gifeed_get_feeds' );
add_action( 'wp_ajax_gifeed_get_feeds', 'gifeed_get_feeds' );

function gifeed_get_feeds()
{

    if ( ! check_ajax_referer( 'gifeed_authentication', 'security' ) ) {
        die();
    }

    $content_type = ( isset( $_GET['callback'] ) || isset( $_GET['next_url'] ) ? 'text/javascript' : 'application/json' );
    $url          = $uid          = $owner_id          = $owner_access_token          = '';
    $callback     = ( isset( $_GET['callback'] ) ? sanitize_text_field( wp_unslash( $_GET['callback'] ) ) : '' );
    
    // required headers
    header( 'Content-Type: '.$content_type.'; charset=UTF-8' );

    if ( ! isset( $_GET['next_url'] ) ) {

        $tagData   = base64_decode( urldecode( gifeed_sanitize_text_or_array_field( wp_unslash( $_GET['opt'] ) ) ) );
        $tagData   = json_decode( $tagData, true );
        $limit     = ( isset( $_GET['limit'] ) ? '&limit='.sanitize_text_field( wp_unslash( $_GET['limit'] ) ) : '' );
        $uid       = $tagData['feedData'];
        $graphInfo = gfeed_is_graph_ready( $uid, true );

        $url = 'https://graph.instagram.com/'.$graphInfo->id.'/media?fields=caption,id,media_type,media_url,permalink,thumbnail_url,timestamp,username,children{fields=caption,id,media_type,media_url,permalink,thumbnail_url,timestamp,username}'.$limit.'&access_token='.$graphInfo->access_token.'';

    } else {

        $url = rawurldecode( $_GET['next_url'] );

    }

    try {

        /* $result = array(); */
        $feed = wp_remote_get( $url, array( 'sslverify' => false ) );
        
		if ( ! is_wp_error( $feed ) ) {
			if ( isset( $feed['body'] ) && strlen( $feed['body'] ) > 0 ) {
				$result = wp_remote_retrieve_body( $feed );
                
                $result = json_decode( $result, true );
                $result      = gifeed_modify_json_output( $result, $uid, $callback );
                $json_string = json_encode( $result, JSON_PRETTY_PRINT );

                echo '/**/ '.$callback.'('.$json_string.')';
        
                wp_die();

			}
		} else {
			wp_die();
		}

    } catch ( Exception $e ) {
        return $e->getMessage();
    }

    wp_die();

}

/*-------------------------------------------------------------------------------*/
/*  Ajax get User Info
/*-------------------------------------------------------------------------------*/
add_action( 'wp_ajax_nopriv_gifeed_get_user_info', 'gifeed_get_user_info' );
add_action( 'wp_ajax_gifeed_get_user_info', 'gifeed_get_user_info' );

function gifeed_get_user_info()
{

    if ( ! check_ajax_referer( 'gifeed_authentication', 'security' ) ) {
        die();
    }

    $graphInfo = gfeed_is_graph_ready( $_GET['id'], true );
    $url       = '';

    header( 'Content-type: application/json; charset=utf-8' );

    switch ( $_GET['type'] ) {

        case 'header':

            // First check user access_token
            if ( $graphInfo->access_token === '' ) {

                echo json_encode( array( 'data' => null, 'meta' => array( 'code' => 403 ) ) );
                die();

            }

            $result = array();

            $result['data']                          = gfeed_get_user_data( $_GET['id'] );
            $result['data']['bio']                   = '';
            $result['data']['counts']['followed_by'] = 0;
            $result['data']['counts']['media']       = 0;

            if ( isset( $result['data']['access_token'] ) ) {
                unset( $result['data']['access_token'] );
            }

            echo json_encode( $result );

            break;

        default:
            break;

    }

    die();

}