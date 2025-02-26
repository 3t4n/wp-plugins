<?php

namespace FeatherLoginPagePro;

class Config {

    private static $instance = null;
    

    private function __construct() {}

    public static function getName() {
    
        return "Feather Login Page Pro";
    
    }
    
    public static function getVersion() {

        return "1.0.0";
    
    }

    public static function getAssetsURL() {
        return self::getURL() . "assets/";
    }

    public static function getURL() {
        
        return plugins_url() . "/" . dirname( plugin_basename( __FILE__ ) ) . "/";

    }

    public static function getPath() {

        return plugin_dir_path( __FILE__ );

    }

    public static function getIncPath() {

        return plugin_dir_path( __FILE__ ) . "inc" . DIRECTORY_SEPARATOR;
    
    }

    public static function getAdminPath() {

        return plugin_dir_path( __FILE__ ) . "inc" . DIRECTORY_SEPARATOR . "admin" . DIRECTORY_SEPARATOR;
    
    }

    public static function getViewsPath() {

        return plugin_dir_path( __FILE__ ) . "inc" . DIRECTORY_SEPARATOR . "admin" . DIRECTORY_SEPARATOR . "views" . DIRECTORY_SEPARATOR;;

    }

    public static function getCoreOptions() {
        $options = get_option( "plbp__login_builder_options_data" );

        if ( ! isset( $options["customloginurl"] ) )
            $options["customloginurl"] = array( 
                "enable" => false,
                "url" => "",
                "redirecturl" => ""
            );

        return $options;
    }

}