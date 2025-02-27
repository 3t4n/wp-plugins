<?php
/*
Plugin Name: Disable Feeds And Hide Usernames
Description: This tiny and lightweight plugin removes all the rss feeds  and hides usernames making it harder for attacker to guess the username.
Author: Laxman Thapa
Version: 1.1
*/

remove_all_actions('do_feed');
remove_all_actions('do_feed_rdf');
remove_all_actions('do_feed_rss');
remove_all_actions('do_feed_rss2');
remove_all_actions('do_feed_atom');
remove_all_actions('do_feed_rss2_comments');
remove_all_actions('do_feed_atom_comments');



if (!is_admin()) {
    if (preg_match('/author=([0-9]*)/i', $_SERVER['QUERY_STRING'])) {
        header('Location: '.home_url().'', false, 301);
        die();
    }
    add_filter('redirect_canonical', function($redirect, $request){
        if (preg_match('/\?author=([0-9]*)(\/*)/i', $request)) {
            header('Location: '.home_url().'', false, 301);
            die();
        }
        else return $redirect;
    }, 10, 2);
}

add_filter('login_errors', function($error){
    return "Incorrect login information";
});

add_action('template_redirect', function(){
    if ( is_author() ) {
        wp_safe_redirect( home_url(), 302 );
        exit;
    }
});

