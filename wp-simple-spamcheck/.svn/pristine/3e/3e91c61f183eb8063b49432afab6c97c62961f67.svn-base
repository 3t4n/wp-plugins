<?php
/*
Plugin Name: WP Simple SpamCheck
Plugin URI: http://desalasworks.com/wp-simple-spamcheck/
Version: 1.2
Description: This plugin allows WordPress to block over 95% of spam comments using a time-based hash. This allows for a minimum sanity check and yet should remove almost all spam comments without the need to sign up to any third party APIs.
Author: Steven de Salas
Author URI: http://desalasworks.com/
*/

/* Copyright 2012 Steven de Salas  (email : steven@desalasworks.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version. */

/**
 * Event Handler: HTTP Request
 *
 * Checks HTTP requests whenever a comment is added to a post
 * to verify wether the 'I am human' checkbox has been ticked.
 *
 */
function wp_simple_spamcheck__pre_comment_on_post() {

    $key = get_option('wp_simple_spamcheck_key');
    $timestamp = wp_simple_spamcheck__get_timestamp();
    $value = isset($_POST[$key]) ? $_POST[$key] : 'no';

    if ($value != $timestamp) {
        header('Allow: POST');
        header('HTTP/1.1 405 Method Not Allowed');
        header('Content-Type: text/plain');
        exit;
        die;
    }

}

/**
 * Event Handler: HTML Injection
 *
 * Injects a bit of HTML into the comments form with a value
 * to be included and checked in the HTTP Request handler above
 * whenever a comment is posted.
 *
 */
function wp_simple_spamcheck__comment_form() {

    $timestamp = wp_simple_spamcheck__get_timestamp();
    $key = get_option('wp_simple_spamcheck_key');
    echo('<p id="wp_ssc" style="font-size: 80%;opacity:0.2;filter:alpha(opacity=20)"><input type="hidden" id="' . $key . '" name="' . $key . '" value="MTM0MDE0Njgw=="/> (Spamcheck Enabled)</p>');
    echo('<script type="text/javascript">');
    echo('var wp_scck = ["hash", "node", "' . $timestamp . '", "MTM0MDE0Njgw==", "value", "' . $key . '", "getElementById"], wp_ssc = {};');
    echo('wp_ssc[wp_scck[1]] = document[wp_scck[6]](wp_scck[5]);');
    echo('wp_ssc[wp_scck[4]] = wp_scck[2];');
    echo('if (wp_ssc[wp_scck[1]]) { wp_ssc[wp_scck[1]][wp_scck[4]] = wp_ssc[wp_scck[4]]; }');
    echo('</script>');

}

/**
 * Event Handler: Plugin Activation
 *
 * Creates a time-based key to differentiate between instances
 * of this plugin and make it a little bit harder for spammers
 * to automatically populate the validation input.
 *
 */
function wp_simple_spamcheck__activate() {

    update_option( 'wp_simple_spamcheck_key', 'wp_ssc_' . date('d', time()) );

}

/**
 * Utility: Get Base64 Timestamp
 *
 * Creates a base64 encoded timestamp that changes every 30 minutes.
 *
 */
function wp_simple_spamcheck__get_timestamp() {
    $time = time();
    $mod_time = $time - ($time % (30 * 60));
    return base64_encode($mod_time);
}

/* ADDING EVENT HANDLERS TO LIFECYCLE */

/* 1. HTML Injection */
add_action('comment_form', 'wp_simple_spamcheck__comment_form');

/* 2. HTTP Request check */
add_action('pre_comment_on_post', 'wp_simple_spamcheck__pre_comment_on_post');

/* 3. Plugin Activation */
register_activation_hook(__FILE__, 'wp_simple_spamcheck__activate');

?>