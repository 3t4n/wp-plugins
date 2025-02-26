<?php

/*
Plugin Name: pb-techTags
Plugin URI: http://wordpress.org/extend/plugins/pb-techtags/
Description: Enhances the_tags() by adding an little image with a link to Technorati to each tag.
Version: 0.1
Author: Pascal Berkhahn
Author URI: http://pascal-berkhahn.de/

**********************************************************************
Copyright (c) 2007 Pascal Berkhahn
Released under the terms of the GNU GPL: http://www.gnu.org/licenses/gpl.txt

This program is distributed in the hope that it will be useful, but
WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. 
**********************************************************************

Installation: Upload the folder "pb-techtags" with it's content to "wp-content/plugins/"  and activate the plugin in your admin panel.

Usage, Issues, Change log:
Visit http://wordpress.org/extend/plugins/pb-techtags/
*/

define('PB_TECHTAGS_TECHURL', 'http://technorati.com/tag/');
define('PB_TECHTAGS_TECHSPACEREPLACE', '+');
define('PB_TECHTAGS_TECHIMG', get_option('siteurl').'/wp-content/plugins/pb-techtags/images/technoratiicon.jpg');
define('PB_TECHTAGS_REGEXP', '%<a href="(.+?)" rel="tag">(.+?)</a>%i');
define('PB_TECHTAGS_TAG', '<a href="###URL###" title="" rel="tag">###TAG###</a> <a href="###TECHURL###" title="Technorati: ###TAG###" class="technoratitag"><img src="###IMG###" alt="Technorati: ###TAG###" /></a>');

function pb_techTags_plugin_callback($match)
{
	$techurl = str_replace(' ',PB_TECHTAGS_TECHSPACEREPLACE,$match[2]);
	$techurl = PB_TECHTAGS_TECHURL.$techurl;
	
	$tag = str_replace('###URL###', $match[1], PB_TECHTAGS_TAG);
	$tag = str_replace('###TAG###', $match[2], $tag);
	$tag = str_replace('###TECHURL###', $techurl, $tag);
	$tag = str_replace('###IMG###', PB_TECHTAGS_TECHIMG, $tag);
	
	return ($tag);
}

function pb_techTags_plugin($tag)
{
	$tag = preg_replace_callback(PB_TECHTAGS_REGEXP, 'pb_techTags_plugin_callback', $tag);
	return ($tag);
}

function pb_techTags_addStyle() {
        echo '<style type="text/css"><!-- .technoratitag img { border:0px; } .technoratitag img:hover { border:0px; }--></style>';
}

add_action('wp_head', 'pb_techTags_addStyle');
add_filter('the_tags', 'pb_techTags_plugin');


?>