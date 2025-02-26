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

class Geolocation {

    public static function get_geolocation() {

        $geoInfo = self::ipInfo();

        if( !empty( $geoInfo['status'] ) && $geoInfo['status'] == 'success' ) {
            return $geoInfo;
        } else {
            return [];
        }
    }


    private static function ipInfo() {
        return IP_API::get_ip_info();
    }

}