<?php

namespace AOP\App;

use Illuminate\Contracts\Filesystem\Filesystem;

class File
{
    public static function filesystem()
    {
        global $wp_filesystem;

        require_once ( ABSPATH . '/wp-admin/includes/file.php' );
        WP_Filesystem();

        return $wp_filesystem;
    }

    public static function get($file)
    {
        return self::filesystem()->get_contents( $file );
     }

    public static function exists($file)
    {
        return self::filesystem()->exists($file);
    }

    public static function getJsonDecoded($file)
    {
        return json_decode(static::get($file));
    }
}
