<?php

/**
 * @package Datapocket
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Encodes the given string with base64, URL safe.
 *
 * @since 1.0.0
 *
 * @param  string $string
 * @return string
 */
function datapocket_urlsafe_base64_encode( $string ) {
    return str_replace( '=', '', strtr( base64_encode( $string ), '+/', '-_' ) );
}

/**
 * Get all registered webhooks.
 *
 * @since 1.0.0
 *
 * @return array
 */
function datapocket_get_webhooks() {
    $webhooks = get_posts( array( 'post_type' => 'webhook', 'numberposts' => -1, ) );
    $webhooks = array_map( function( $webhook ) {
        return array(
            'id'  => $webhook->ID,
            'url' => get_post_meta( $webhook->ID, '_url', true ),
        );
    }, $webhooks );

    return $webhooks;
}

/**
 * Send the webhook requests based to all registered webhooks.
 *
 * @since 1.0.0
 *
 * @param  string  $method
 * @param  string  $entity a post type of taxonomy. E.g. 'posts' or 'tags'.
 * @param  string  $entity_id a post or taxonomy ID.
 * @return void
 */
function datapocket_send_webhook_requests( $method, $entity, $entity_id ) {
    $request  = new WP_REST_Request( 'GET', "/wp/v2/$entity/$entity_id" );
    $response = rest_do_request( $request );
    $server   = rest_get_server();
    $data     = $server->response_to_data( $response, array( 'author' ) );
    $body     = wp_json_encode( $data );

    $webhooks = datapocket_get_webhooks();

    foreach ( $webhooks as $webhook ) {
        wp_remote_request( $webhook['url'] . $entity, array(
            'method'   => $method,
            'body'     => $body,
            'blocking' => false,
            'headers'  => array(
                'Content-Type' => 'application/json',
            ),
        ) );
    }
}

/**
 * Get the admin account we use for application passwords.
 * If it doesn't exist yet, we create it.
 * The username for the datapocket account is ALWAYS 'datapocket'.
 *
 * @since 1.0.0
 *
 * @return WP_User
 */
function datapocket_get_datapocket_admin() {
    $admin = get_user_by( 'login', 'datapocket' );

    // If there is no datapocket user yet, create it.
    if( ! $admin ) {
        $admin_id = wp_create_user( 'datapocket', wp_generate_password() );
        $admin    = new WP_User( $admin_id );

        $admin->set_role( 'administrator' );
    }

    return $admin;
}

/**
 * Check if DataPocket is connected.
 *
 * @return bool $is_woocommerce
 * @return bool
 */
function datapocket_is_connected( $is_woocommerce = false ) {
    $directory = $is_woocommerce ? 'woo' : 'wp' ;
    $response  = wp_remote_get( 'https://utils.ovxproxy.com/' . $directory . '/conncheck?host=' . urlencode( get_option( 'siteurl' ) ) );
    
    if ( wp_remote_retrieve_response_code( $response) !== 200 ) {
        return false;
    }

    $body = json_decode( wp_remote_retrieve_body( $response ) );

    if ( null === $body || empty( $body->connected ) ) {
       return false;
    }

    return $body->connected;
}
