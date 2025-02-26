<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
class adadaa_core
{
    public $ada_plugin_dir;
    public $adadaa_plugin_name;

    function __construct()
    {
    }

    function containsTamil($cont) {
        return (preg_match('/[\x{0B80}-\x{0BFF}]+/u', $cont));
    }

    function ada_nonce_url($link, $function = 'form')
    {
        if (function_exists('wp_nonce_url'))
            return wp_nonce_url($link, 'ada_' . $function);
        else 
            return $link;
    }

    function ada_nonce_email_url($uid, $link, $function = 'form')
    {
        if (function_exists('ada_create_nonce'))
            return $link . '&_wpnonce=' .  ada_create_nonce($uid, 'ada_' . $function);
        else 
            return $link;
    }

    function ada_nonce_field($function = 'form')
    {
        if (function_exists('wp_nonce_field'))
            return wp_nonce_field('ada_' . $function);
        else 
            return "";
    }

    function ada_create_nonce($uid, $action = -1) 
    {    
        if (function_exists("wp_hash"))
        {
            $i = ceil(time() / 43200);
            return substr(wp_hash($i . $action . $uid), -12, 10);
        }
        else
            return "";
    }

    function file_without_ext($file)
    {
        return str_replace('.php', '', basename($file) ?? '');
    }

    function ada_url($file)
    {
        $dir_path = dirname($file);
        $plg_path = substr($dir_path, stripos($dir_path, 'wp-content'));
        $plg_path = '/'. str_replace('\\', '/', $plg_path ?? '');
        return $plg_path;
    }

    function ada_dir($file, $is_exclude_plugin_dir = false)
    {
        $dir_path = dirname($file);
        $plg_path = substr($dir_path, stripos($dir_path, 'wp-content'));
        $plg_path = str_replace('\\', '/', $plg_path);
        if ($is_exclude_plugin_dir) {
            $plg_path = str_replace(WPMU_PLUGIN_DIR  . '/', '', str_replace(WP_PLUGIN_DIR . '/', '', $plg_path));
        }
        return $plg_path;
    }

    function ada_current_wp_plugin_dir()
    {
        if (stripos(__FILE__, WPMU_PLUGIN_DIR) > -1)
            return WPMU_PLUGIN_DIR;
        else if (stripos(__FILE__, WP_PLUGIN_DIR) > -1)
            return WP_PLUGIN_DIR;
        else
            return '';
    }
}


$adadaa_core = new adadaa_core();

?>