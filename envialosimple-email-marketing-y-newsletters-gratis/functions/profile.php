<?php

function getDataProfile($apiKey) {
    global $urlServerES;
    $url_endpoint_ES = $urlServerES.'/v1/administrator/profile';
    $args = array(
        'headers' => array(
            'Authorization' => $apiKey
        )
    );
    $response = wp_remote_get($url_endpoint_ES, $args);
    $httpcode = $response['response']['code'];
    return new WP_REST_Response(json_decode($response['body']), $httpcode);
}


