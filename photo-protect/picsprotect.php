<?php
/*
 Plugin Name: Photo Protect
 Plugin URI: http://wordpress.org/plugins/photo-protect/
 Description: Adds an invisible layer over your images to protect them from copying.
 Version: 1.1
 Author: Visual Watermark
 Author URI: http://www.visualwatermark.com/
 */

/*
 Copyright 2018 Visual Watermark

 This program is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with this program; if not, write to the Free Software
 Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

add_action('wp_enqueue_scripts', 'pp_register_scripts');
add_filter('the_content', 'pp_filter_content3');
add_filter('post_thumbnail_html', 'pp_filter_content3');

function pp_register_scripts() {
    wp_enqueue_script('picsprotect_js', plugins_url('picsprotect.js', __FILE__));
    wp_localize_script('picsprotect_js', 'pp_plugin', array('blank_gif' => plugins_url('blank.gif', __FILE__)));
}

function pp_filter_content3($content) {
 	$content = preg_replace('/<img(.*?)class="(.*?)"(.*?)>/i', '<img$1class="$2 pp_post_image"$3>', $content);
    return $content;
}
?>