<?php
namespace Pagup\Vidseo\Core;
use Pagup\Vidseo\Core\Plugin;

class Asset 
{

    public static function style( $name, $file )
    {
        wp_register_style( $name, Plugin::url($file), array(), filemtime( Plugin::path($file) ) );

        wp_enqueue_style( $name );

    }

    public static function style_remote( $name, $file )
    {
        wp_register_style( $name, "{$file}" );

        wp_enqueue_style( $name );

    }

    public static function script( $name, $file, $footer = false )
    {
        wp_register_script( $name, Plugin::url($file), array(), filemtime( Plugin::path($file) ), $footer );

        wp_enqueue_script( $name );

    }

    public static function script_remote( $name, $file )
    {
        wp_register_script( $name, "{$file}" );

        wp_enqueue_script( $name );

    }

}