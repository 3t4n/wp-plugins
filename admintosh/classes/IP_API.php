<?php
namespace Admintosh\Classes;
 /**
  * 
  * @package    Admintosh
  * @version    1.0.0
  * @author     wpmobo
  * @Websites: http://wpmobo.com
  *
  */

class IP_API {


    private static $apiBaseUrl = 'http://ip-api.com/json/%s';

    public static function get_ip_info() {
        return self::ip_info_via_api();
    }

    private static function ip_info_via_api() {

        $response = wp_safe_remote_get(
            sprintf( self::$apiBaseUrl, \Admintosh\Inc\Helper::get_user_ip_address() ),
            [
                'timeout'    => 2,
                'user-agent' => 'admintosh/1.0.8'
            ]
        );

        if( !is_wp_error( $response ) && $response['body'] ) {
            return json_decode( $response['body'], true );
        }

    }


}