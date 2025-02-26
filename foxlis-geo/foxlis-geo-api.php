<?php

add_action('rest_api_init', function () {
    register_rest_route(
        'foxlis-geo/v1',
        '/redirect/',
        [
            'methods' => 'GET',
            'callback' => 'foxlis_geo_redirect_api',
            'permission_callback' => '__return_true',
        ]
    );

    register_rest_route(
        'foxlis-geo/v1',
        '/data/',
        [
            'methods' => 'GET',
            'callback' => 'foxlis_geo_api',
            'permission_callback' => '__return_true',
        ]
    );
});

if (!function_exists('foxlis_geo_redirect_api')) {
    function foxlis_geo_redirect_api()
    {
        return foxlis_geo_sevice()->getFoxlisGeoRedirectData();
    }
}

if (!function_exists('foxlis_geo_api')) {
    function foxlis_geo_api()
    {
        return foxlis_geo_sevice()->getFoxlisGeo()->getData();
    }
}

if (!function_exists('foxlis_geo')) {
    function foxlis_geo()
    {
        return foxlis_geo_sevice()->getFoxlisGeo();
    }
}
