<?php
class Formataway_Util {
    private static $formats;
    
    /**
     * Returns an associative array of post formats and their display names
     * such that they can be looped through and displayed in lists (i.e.
     * for Formataway settings).
     */
    public static function get_formats() {
        if( $formats == null ) {
            // TODO: Get the post formats supported by the theme instead of
            // all post formats. I couldn't find a function for this but I
            // should be able to look through WordPress source to find out
            // how it's done on the post edit page (where you can select
            // a post's format only from what's available).
            $formats = array(
                'aside'     => _x( 'Aside',      'Post format', 'formataway' ),
                'gallery'   => _x( 'Gallery',    'Post format', 'formataway' ),
                'link'      => _x( 'Link',       'Post format', 'formataway' ),
                'image'     => _x( 'Image',      'Post format', 'formataway' ),
                'quote'     => _x( 'Quote',      'Post format', 'formataway' ),
                'status'    => _x( 'Status',     'Post format', 'formataway' ),
                'video'     => _x( 'Video',      'Post format', 'formataway' ),
                'audio'     => _x( 'Audio',      'Post format', 'formataway' ),
                'chat'      => _x( 'Chat',       'Post format', 'formataway' )
            );
        }
        
        return $formats;
    }
    
    /**
     * Ensures the provided input is an array and then sanitises the string values.
     * 
     * If it's not an array then null is returned (assuming a hacker, we don't need
     * to worry about providing a clean response if it wasn't an array).
     */
    public static function sanitise_string_array( $input ) {
        if( !is_array( $input ) ) {
            return null;
        }
        
        for( $i = count( $input ) - 1; $i >= 0; --$i ) {
            $input[$i] = esc_attr( $input[$i] );
        }
        
        return $input;
    }
}
