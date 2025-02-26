<?php
add_action( 'init','autoketing_check_request_api',1000 );
if( !function_exists( 'autoketing_check_request_api' ) ){
    function autoketing_check_request_api(){
        if ( isset($_SERVER['HTTPS'] ) &&
            ( $_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1 ) ||
            isset( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) &&
            $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' ) {
            $protocol = 'https://';
        } else {
            $protocol = 'http://';
        }
        $api_woosetting = $protocol == 'http://' ? str_replace( 'http','https',home_url()).'/autoketing-get-config' : home_url().'/autoketing-get-config';
        $api_product = home_url().'/autoketing-product';
        $api_order = home_url().'/autoketing-order';
        //$api_woosetting = home_url().'/autoketing-get-config'; 
        $current_url  = $protocol. $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        if( $current_url == $api_woosetting ){
            require_once AUTOKETING_PLUGIN_DIRNAME. 'templates/autoketing-get-config.php';
        }
        $current_api = explode( '?',$current_url );
            switch ( $current_api[0] ) {
                case $api_product :
                    //$agr_query = isset( $_GET )? $_GET:'';
                    //require_once AUTOKETING_PLUGIN_DIRNAME. 'templates/autoketing-api-products.php';
                    break;
                case $api_order :
                   // $agr_query = isset( $_GET )? $_GET:'';
                   // require_once AUTOKETING_PLUGIN_DIRNAME. 'templates/autoketing-api-order.php';
                    break;              
                 default:
            }
    }
}

