<?php
namespace Pagup\TikTokButton\Core;

class Option
{
    public static function all()
    {
        return get_option( 'floating-tiktok-button' );
    }

    public static function get($key)
    {
        $option = static::all();

            return $option[$key];
    }

    public static function check($key)
    {
        $option = static::all();
        return isset($option[$key]) && !empty($option[$key]);
    }

    public static function valid($option, $val)
    {
        return static::check($option) && static::get($option) == $val;
    }

    public static function post_meta($key)
    {
        global $post;
        return get_post_meta($post->ID, $key, true);
    }

    public static function sanitize_array( $array ) {
        foreach ( $array as $k => $v ) {
           if ( is_array( $v ) ) {
               $array[$k] =  self::sanitize_array( $v );
           } else {
               $array[$k] = sanitize_text_field( $v );
           }
        }
     
       return $array;                                                       
    }

    public function val($key, $else = "")
    {
        return self::check($key) ? self::get($key) : $else;
    }

    public function css($check, $key, $value = "", $unit = "", $altValue = "")
    {
        if ( self::check($check) ) {
            return $key . ":" . $value . $unit . ";";
        }
        
        elseif ( isset($altValue) && !empty($altValue) ) {
            return $key . ":" . $altValue . $unit . ";";
        }
    }

}