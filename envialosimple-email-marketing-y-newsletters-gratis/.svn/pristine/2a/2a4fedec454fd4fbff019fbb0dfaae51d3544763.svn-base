<?php

function getTemplate($dir) {
    ob_start();
    include($dir);
    $page = ob_get_contents();
    ob_end_clean();
    print $page;
}


function es_plugin_api_post_request($url,$data) {
    global $urlServerES;
    global $apiKey;

    $url_endpoint_ES = $urlServerES.$url;
    $args = array(
        'body'        => $data,
        'timeout'     => 120,
        'headers'     => array(
            'Authorization' => $apiKey
        ),
    );
    $response = wp_remote_post( $url_endpoint_ES, $args );
    return $response;
}

function es_plugin_api_get_request($url) {
    global $urlServerES;
    global $apiKey;

    $url_endpoint_ES = $urlServerES.$url;
    $args = array(
        'timeout'     => 120,
        'headers' => array(
            'Authorization' => $apiKey
        )
    );
    $response = wp_remote_get($url_endpoint_ES, $args);
    return $response;
}

function es_plugin_get_url_rest_api($url,$params = null) {
    
    $urlBase = get_rest_url(null,$url);

    if(!empty($params)) {
        $charParams = '?';
        if(strpos($urlBase,'?')) {
            $charParams = '&';
        }
        return $urlBase.$charParams;
    }

    return esc_html($urlBase);
}

function esma_check_nounce_and_user(){
    return isset($_POST['esma_nonce']) && wp_verify_nonce( $_POST['esma_nonce'], 'esma_form_nonce' ) && current_user_can('manage_options');
}