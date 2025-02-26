<?php
namespace QSDarkMode\Utilities\Inc;

class Helpers
{
	
   public static function Google_fonts_url($font_families	 = []) {
       
        $fonts_url		 = '';
        /*
        Translators: If there are characters in your language that are not supported
        by chosen font(s), translate this to 'off'. Do not translate into your own language.
        */
        if ( $font_families && 'off' !== _x( 'on', 'Google font: on or off', 'qs-dark-mode' ) ) { 
            $query_args = array(
                'family' => urlencode( implode( '|', $font_families ) )
            );
    
            $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
        }
    
        return esc_url_raw( $fonts_url );
    } 
          
}

