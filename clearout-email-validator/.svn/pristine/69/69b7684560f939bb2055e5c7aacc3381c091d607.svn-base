<?php
// helper.php
// taken code from => https://florianbrinkmann.com/en/wordpress-backend-request-3815/
/**
 * Check if this is a request at the backend.
 *
 * @return bool true if it's an admin request, otherwise false.
 */
function is_admin_request() {
    // Get the current URL, trimmed (if any space )and formatted.
    $current_url = trim( home_url( add_query_arg( '', null ) ) );
    // Get the admin URL, converted to lowercase for case-insensitive comparison.
    $admin_url = strtolower( admin_url() );
    // Get the referrer URL, converted to lowercase for case-insensitive comparison.
    $referrer  = strtolower( wp_get_referer() );

    // Check if the current URL begins with the admin URL (current url is requested url it may be ajay or direct request)
    //( example, current_url: /wp-admin/string and admin_url: /wp-admin) if wp-admin presents then enter into if
    if ( 0 === strpos( $current_url, $admin_url ) ) {
        
        // If the current URL is an admin URL, check if the referrer is also an admin URL ( reffer_url is page url, Not ajax request url )
        //( example, reffer_url: /wp-admin/string and admin_url: /wp-admin) if wp-admin presents then enter into if
        if ( 0 === strpos( $referrer, $admin_url ) ) {
            // If both current URL and referrer start with the admin URL, return true (admin request)
            return true;
        } else {
            // If current URL is an admin URL, but referrer is not, check for AJAX
            if ( function_exists( 'wp_doing_ajax' ) ) {
                // If 'wp_doing_ajax' exists, return true if this is NOT an AJAX request
                return ! wp_doing_ajax();
            } else {
                // Fallback: Check if 'DOING_AJAX' constant is not defined or not true (i.e., not an AJAX request)
                return ! ( defined( 'DOING_AJAX' ) && DOING_AJAX );
            }
        }
    } else { // refer else case example, current_url: /wp-json/string and admin_url: /wp-admin
        
        // If the current URL is an admin URL, check if the referrer is also an admin URL ( reffer_url is page url, Not ajax request url )
        //( example, reffer_url: /wp-admin/string and admin_url: /wp-admin) if wp-admin presents then enter into if
        if ( 0 === strpos( $referrer, $admin_url ) ) {
            // If referrer starts with the admin URL, return true (admin request)
            return true;
        }
        // Otherwise, return false, indicating this is not an admin request
        return false;
    }
}