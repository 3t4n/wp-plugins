<?php
/*
Plugin Name: Expire Password Protected Pages
Plugin URI: https://github.com/troyglancy/Expire-Password-Protected-Pages
Description: This plugin will require visitors to type in the password each time they are visiting a password protected page. This will also prevent the page from being accessible if someone types in the password on a public computer.
Version: 0.1.0
Author: Troy Glancy 
Author URI: http://troyglancy.com
Text Domain: troyglancy
Domain Path: 
*/

add_action( 'wp', 'post_expire_password_protected_pages' );
    function post_expire_password_protected_pages() {
        if ( isset( $_COOKIE['wp-postpass_' . COOKIEHASH] ) ) {
            setcookie('wp-postpass_' . COOKIEHASH, '', 0, COOKIEPATH);
        }
}

?>
