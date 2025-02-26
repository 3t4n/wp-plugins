<?php

/**
 * Super-simple, minimum abstraction MailChimp API v2 wrapper
 * Modified for WordPress by 69signals.
 * 
 * @author Drew McLellan <drew.mclellan@gmail.com>, 69signals
 * @version 1.0
 *
 *
 * Create a new instance
 * @param string $api_key Your MailChimp API key
 */

if ( ! function_exists( 'signals_mailchimp_init' ) ) :
function signals_mailchimp_init( $api_key ) {

    $api_endpoint = 'https://<dc>.api.mailchimp.com/2.0/';

    list(, $datacentre) = explode( '-', $api_key );
    $api_endpoint = str_replace( '<dc>', $datacentre, $api_endpoint );

    return $api_endpoint;

}
endif;



/**
 * Call an API method. Every request needs the API key, so that is added automatically -- you don't need to pass it in.
 * @param  string $method The API method to call, e.g. 'lists/list'
 * @param  array  $args   An array of arguments to pass to the method. Will be json-encoded for you.
 * @return array          Associative array of json decoded API response.
 */

if ( ! function_exists( 'signals_mailchimp_call' ) ) :
function signals_mailchimp_call( $method, $args = array() ) {

    // Getting the API endpoint
    $api_endpoint   = signals_mailchimp_init( $args['apikey'] );
    $url            = $api_endpoint . '/' . $method . '.json';

    // Sending it as per WordPress specifications
    $response       = wp_remote_post( $url, array(
        'method'        => 'POST',
        'timeout'       => 15,
        'blocking'      => true,
        'headers'       => array( 'Content-Type: application/json' ),
        'body'          => json_encode( $args ),
        'user-agent'    => 'PHP-MCAPI/2.0',
        'sslverify'     => false
    ) );

    // Retrieve the content body
    return json_decode( wp_remote_retrieve_body( $response ), true );

}
endif;