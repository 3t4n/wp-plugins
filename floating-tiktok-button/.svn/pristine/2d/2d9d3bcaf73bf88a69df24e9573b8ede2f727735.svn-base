<?php
namespace Pagup\TikTokButton\Core;
use Pagup\TikTokButton\Core\Plugin;

class Asset 
{

    public static function style( String $name, String $file, Array $safe )
    {
        wp_register_style( $name, plugins_url('', __DIR__ ) . "/{$file}", array(), filemtime( plugin_dir_path( __DIR__ ) . $file ) );

        wp_enqueue_style( $name );

    }

    public static function style_remote( $name, $file )
    {
        wp_register_style( $name, "{$file}" );

        wp_enqueue_style( $name );

    }

    public static function script( String $name, String $file, Array $array = [], $footer = false )
    {
        wp_register_script( $name, plugins_url('', __DIR__ ) . "/{$file}", $array, filemtime( plugin_dir_path( __DIR__ ) . $file ), $footer );

        wp_enqueue_script( $name );

    }
    
    public static function script_remote( $name, $file, $array = [], $ver = false, $footer = false )
    {
        wp_register_script( $name, $file, $array, $ver, $footer );

        wp_enqueue_script( $name );

    }

}