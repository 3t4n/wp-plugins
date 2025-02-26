<?php
/**
 * @package firefoxos-app-downloader
 * @version 1.1
 */
/*
Plugin Name: firefoxos-app-downloader
Plugin URI: http://wordpress.org/plugins/firefoxos-app-downloader/
Description: This app can use shortcode that firefoxOS application download link.
Author: Hidetaka Okamoto
Version: 1.1
Author URI: http://wp-kyoto.net/
*/

/*  Copyright 2015 Hidetaka OKamoto

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

add_shortcode('ffapp-dl', 'ffap_echo_dlBtn');
add_action( 'wp_enqueue_scripts', 'ffap_set_script' );

function ffap_echo_dlBtn($attr){
    $html = ffap_get_download_btn($attr);
    return $html;
}

function ffap_set_script(){
    wp_enqueue_script( 'script-name', plugin_dir_url( __FILE__ ) . '/firefoxos-app-downloader.js', array(), '1.0.0', true );
}

function ffap_get_download_btn($attr){
var_dump($attr);
    extract(shortcode_atts(array(
        'class' => 'default-class',
        'text' => 'Download',
        'dl' => 'http://example.com/manifest.webapp',
    ), $attr));

    $html = "<div id='ffapp-dl-btn' class='{$class}' data-ffapp-dllink='{$dl}'>{$text}</div>";

    return $html;
}