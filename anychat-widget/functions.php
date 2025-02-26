<?php
if (!function_exists('add_action' )) {
    die('Hi there!  I\'m just a plugin, not much I can do when called directly.');
}

if (!function_exists('wp_removable_query_args')){
    /**
    * Returns an array of single-use query variable names that can be removed from a URL.
    *
    * @since 4.4.0
    *
    * @return array An array of parameters to remove from the URL.
    */
   function wp_removable_query_args() {
        $removable_query_args = array(
                'activate',
                'activated',
                'approved',
                'deactivate',
                'deleted',
                'disabled',
                'enabled',
                'error',
                'hotkeys_highlight_first',
                'hotkeys_highlight_last',
                'locked',
                'message',
                'same',
                'saved',
                'settings-updated',
                'skipped',
                'spammed',
                'trashed',
                'unspammed',
                'untrashed',
                'update',
                'updated',
                'wp-post-new-reload',
        );

        /**
         * Filters the list of query variables to remove.
         *
         * @since 4.2.0
         *
         * @param array $removable_query_args An array of query variables to remove from a URL.
         */
        return apply_filters( 'removable_query_args', $removable_query_args );
    }
}
if (!function_exists('sanitize_textarea_field')) {
    function sanitize_textarea_field($str)
    {
        $filtered = _sanitize_text_fields( $str, true );
        
	return apply_filters( 'sanitize_textarea_field', $filtered, $str );
    }
}

if (!function_exists('_sanitize_text_fields')) {
    function _sanitize_text_fields( $str, $keep_newlines = false ) {
        if ( is_object( $str ) || is_array( $str ) ) {
            return '';
        }

        $str = (string) $str;

        $filtered = wp_check_invalid_utf8( $str );

        if ( strpos( $filtered, '<' ) !== false ) {
            $filtered = wp_pre_kses_less_than( $filtered );
            // This will strip extra whitespace for us.
            $filtered = wp_strip_all_tags( $filtered, false );

            // Use HTML entities in a special case to make sure no later
            // newline stripping stage could lead to a functional tag.
            $filtered = str_replace( "<\n", "&lt;\n", $filtered );
        }

        if ( ! $keep_newlines ) {
            $filtered = preg_replace( '/[\r\n\t ]+/', ' ', $filtered );
        }
        $filtered = trim( $filtered );

        $found = false;
        while ( preg_match( '/%[a-f0-9]{2}/i', $filtered, $match ) ) {
            $filtered = str_replace( $match[0], '', $filtered );
            $found    = true;
        }

        if ( $found ) {
            // Strip out the whitespace that may now exist after removing the octets.
            $filtered = trim( preg_replace( '/ +/', ' ', $filtered ) );
        }

        return $filtered;
    }
}