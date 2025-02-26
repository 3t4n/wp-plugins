<?php
/*
Plugin Name: asciiplayer
Version: 0.3.1
Plugin URI: https://wordpress.org/plugins/asciiplayer
Author: Jorge Maldonado Ventura
Author URI: https://www.freakspot.net/
Description: asciinema-player for Wordpress.
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
*/

defined('ABSPATH') or die('No script kiddies please!');

function asciiplayer_enqueue_scripts() {
    wp_register_script('asciinema-player-js', plugins_url('asciinema-player.js', __FILE__), array(), '2.4.1', true);
    wp_register_style('asciinema-player-css', plugins_url('asciinema-player.css', __FILE__), array(), '2.4.1');

    wp_enqueue_script('asciinema-player-js');
    wp_enqueue_style('asciinema-player-css');
}

add_action('wp_enqueue_scripts', 'asciiplayer_enqueue_scripts');
