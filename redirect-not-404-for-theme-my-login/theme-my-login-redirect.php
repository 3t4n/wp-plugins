<?PHP
/*
Plugin Name: Redirect not 404 for Theme My Login
Description: Makes wp-login.php redirect to the TML page isntead of giving a 404 error.
Version: 1.1
Author: Ben Konyn
Author URI: http://www.speakdigital.co.uk
License: GPL2
*/
function tml404_redirect_wp_login() {
    global $pagenow;

    if ( 'wp-login.php' == $pagenow ) {
        $action = isset( $_REQUEST['action'] ) ? $_REQUEST['action'] : 'login';
        $link = Theme_My_Login::get_object()->get_page_link( $action );
        wp_redirect( $link );
        exit;
    }
}
add_action( 'init', 'tml404_redirect_wp_login' );
