<?php
namespace Pagup\TikTokButton\Core;

class Request
{
    public static function safe(string $val, array $safe)
    {

        if ( isset( $_POST[$val] ) && in_array( $_POST[$val], $safe ) ) 
        { 
            
            return sanitize_text_field( $_POST[$val] );

        } else {

            return "";

        }
        
    }

    public static function text(string $key)
    {
        if ( isset( $_POST[$key] ) && !empty( $_POST[$key] ) ) {

            return sanitize_text_field( $_POST[$key] );

        } else {

            return "";

        }
    }

    public function array( $array ) {
        foreach ( (array) $array as $k => $v ) {
           if ( is_array( $v ) ) {
               $array[$k] =  array( $v );
           } else {
               $array[$k] = sanitize_text_field( $v );
           }
        }
     
       return $array;                                                       
     }
}