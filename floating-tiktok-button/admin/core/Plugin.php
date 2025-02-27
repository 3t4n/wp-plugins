<?php

namespace Pagup\TikTokButton\Core;

class Plugin
{

    public static function view(string $file, array $data = [], array $safe)
    {
        extract($data);
        if ( in_array($file, $safe) ) {
            require  realpath(plugin_dir_path( __DIR__ ) . "views/{$file}.view.php");
        }
    }

    public static function dd()
    {
        array_map(function($x) { 
            var_dump($x); 
        }, func_get_args());
        die;
    }

    public static function dump($data)
    {
        echo "<pre>"; 
        var_dump($data); //print_r($data);
        echo "</pre>";
    }
}