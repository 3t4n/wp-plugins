<?php

class Ad_Ink_Config
{

    static $cache = [];

    public static function get($resource, $key, $default = null)
    {
        $content = self::content($resource);
        if(isset($content[$key])){
            return $content[$key];
        }
        return $default;
    }

    private static function content($resource)
    {
        if (!isset(self::$cache[$resource])) {
            $path = plugin_dir_path(__FILE__) . "../admin/resources/" . $resource . ".php";
            if (file_exists($path)) {
                self::$cache[$resource] = include $path;
            }
            else{
                self::$cache[$resource] = [];
            }
        }

        return self::$cache[$resource];
    }
}
