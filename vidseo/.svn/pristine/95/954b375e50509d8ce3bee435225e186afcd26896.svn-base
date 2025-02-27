<?php
namespace Pagup\Vidseo\Core;

class Request
{
    public static function checkbox($key, $safe)
    {

        if ( isset( $_POST[$key] ) && in_array( $_POST[$key], $safe ) ) 
        { 
            $request = sanitize_text_field( $_POST[$key] ); 
        }
        
        return $request ?? '';
    }

    public static function input($key)
    {
        if( isset( $_POST[$key] ) && !empty( $_POST[$key] ) )
        {
            $request = sanitize_text_field( $_POST[$key] );

            return $request;
        } 
        
    }
}