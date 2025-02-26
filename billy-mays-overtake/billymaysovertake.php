<?php
/*
Plugin Name: Billy Mays Overtake
Plugin URI: http://kennedysgarage.com/billy-mays-plugin
Description: Do you wish you could have Billy Mays pitch your blog? Now you can!
Version: 1.0
Author: Kennedy's Garage
Author URI: http://kennedysgarage.com
*/
/*  Copyright 2009  Kennedy's Garage  (email : kennedy@kennedysgarage.com)

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
/* R.I.P. Bill Mays July 20, 1958 – June 28, 2009 */

function billymays($string)
    {
return strtoupper($string);
    } 
	
add_filter('the_content', 'billymays');
add_filter('the_title', 'billymays');
add_filter('wp_title', 'billymays');
add_filter('comment_text', 'billymays');
add_filter('wp_tag_cloud', 'billymays');
add_filter('comment_post', 'billymays');
add_filter('admin_menu', 'billymays');
add_filter('get_option', 'billymays');
add_filter('get_categories', 'billymays');
add_filter('get_category', 'billymays');
add_filter('the_date', 'billymays');
add_filter('bloginfo', 'billymays');
add_filter('the_author', 'billymays');
add_filter('the_time', 'billymays');
add_filter('the_tags', 'billymays');
add_filter('next_posts_link', 'billymays');
add_filter('previous_posts_link', 'billymays');
add_filter('wp_list_pages', 'billymays');
add_filter('wp_get_archives', 'billymays');
add_filter('wp_list_bookmarks', 'billymays');
add_filter('wp_register', 'billymays');
add_filter('wp_loginout', 'billymays');
add_filter('wp_meta', 'billymays');
add_filter('the_excerpt ', 'billymays');
?>