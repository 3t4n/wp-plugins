<?php
    if ( ! class_exists( 'Autoketing_Ajax' ) ) {
        class  Autoketing_Ajax{
            public static function register_action(){
                $ajax_actions = ['add_key_login'];
                foreach ( $ajax_actions as $action ) {
                    add_action( 'wp_ajax_'.$action, array( __CLASS__,$action ) );
                    add_action( 'wp_ajax_nopriv_'.$action, array( __CLASS__,$action  ) );
                }
            }
            public static function add_key_login(){              
                if( isset( $_POST['keyLogin'] ) ){
                   $keyLogin = autoketingHelper::sanitize_params_submitted( $_POST['keyLogin'] );
                   $domain = $_SERVER['HTTP_HOST'];
                   $decimal_separator = get_option( 'woocommerce_price_decimal_sep' );
                   $thousand_separator = get_option( 'woocommerce_price_thousand_sep' ); 
                   $woocommerce_currency =  get_option( 'woocommerce_currency' ); 
                   $body = [ 'shop-domain' => $domain, 'decimal_separator' => $decimal_separator, 'thousand_separator' => $thousand_separator,
                    'woo_currency' => $woocommerce_currency, 'client_secret' =>  $keyLogin ];     
                    wp_remote_post( AUTOKETING_API_CURRENCY ,  array('body' => $body) );
                    delete_option( 'autoketing_key_login' );
                    add_option( 'autoketing_key_login',$keyLogin , '', 'false' ); 
                    $sessionname = 'autoketing_login'.$keyLogin;
                    setcookie($sessionname, true, 0 , "/");
                    setcookie('keyLogin', $keyLogin , 0 , "/");
                    wp_send_json( ['status' => true] );
                }
            }
        }
    }
