<?php
/**
* Plugin Name: 404 to Search
* Description: Redirect all 404 response on the search page. Powered by pxlbbq.com
* Version: 0.1.3
* Author: M01n34u
* Author URI: https://profiles.wordpress.org/m01n34u/
**/

function page_404_to_search_page() {
    global $wp;
    if ( is_404() ) {
            $s = add_query_arg( array(), $wp->request );
			$search = preg_replace("/[^a-zA-Z0-9]+/", " ", $s);

			$url_to = "/?s=" . $search;
			
            wp_safe_redirect( $url_to );
            exit;
    }
}
add_action( 'template_redirect', 'page_404_to_search_page' );