<?php
/**
 * Plugin Name: Simple Facebook Google Twitter Share Buttons
 * Description: This plugin adds facebook, google, twitter share button on your WordPress site
 * Version: 1.0.0
 * Author: Cenk YAĞMUR
 * Author URI: https://www.wprudder.com
 * License: GPL2
 */

function sfgtsb_current_url()
{
    global $wp;
    $current_url = home_url(add_query_arg(array(), $wp->request));
    return $current_url;
}

function sfgtsb_share_button()
{
    echo "<div class=\"sfgtsb-social-share\"><a href=\"#\" onClick=\"window.open('http://www.facebook.com/sharer.php?u=" . sfgtsb_current_url() . "','facebook-pop','height=350,width=600')\"><i class=\"dashicons dashicons-facebook-alt\" aria-hidden=\"true\"></i></a><a href=\"#\" onClick=\"window.open('https://twitter.com/share?url=" . sfgtsb_current_url() . "','twitter-pop','height=350,width=600')\"><i class=\"dashicons dashicons-twitter\" aria-hidden=\"true\"></i></a><a href=\"#\" onClick=\"window.open('https://plus.google.com/share?url=" . sfgtsb_current_url() . "','google-pop','height=400,width=600')\"><i class=\"dashicons dashicons-googleplus\" aria-hidden=\"true\"></i></a></div>";
}