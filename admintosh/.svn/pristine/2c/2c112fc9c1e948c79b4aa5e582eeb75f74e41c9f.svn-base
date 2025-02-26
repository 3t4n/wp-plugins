<?php
namespace Admintosh\Inc;
 /**
  * 
  * @package    Admintosh
  * @version    1.0.0
  * @author     wpmobo
  * @Websites: http://wpmobo.com
  *
  */
 
 class Helper {

    public static function get_user_ip_address() {

        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            //ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            //ip pass from proxy
            $ip = rest_is_ip_address( $_SERVER['HTTP_X_FORWARDED_FOR'] );
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        return wp_unslash( $ip );
    }

}

