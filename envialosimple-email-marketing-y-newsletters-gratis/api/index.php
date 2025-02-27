<?php
    //vars
    $urlServerES = (getenv('URL_API'))?getenv('URL_API'):'https://api.esmsv.com';
    $apiKey = get_option('es_config_apikey');

    add_action('init','register_api_es');
    function register_api_es() {
        if( in_array("administrator", wp_get_current_user()->roles) ) {
            //endpoints
            include_once(dirname(__FILE__).'/contacts.php');
            include_once(dirname(__FILE__).'/contactform7.php');
            include_once(dirname(__FILE__).'/lists.php');
            include_once(dirname(__FILE__).'/campaigns.php');
            include_once(dirname(__FILE__).'/segments.php');
            include_once(dirname(__FILE__).'/customfields.php');
            include_once(dirname(__FILE__).'/posts.php');
            include_once(dirname(__FILE__).'/gallery.php');
        }
    }
    
