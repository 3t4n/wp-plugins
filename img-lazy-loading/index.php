<?php
/*
 _    _                       _   _   _   _                                      _   
| |  | |                     (_) | | | | (_)                                    | |  
| |  | |  _ __    _ __ ___    _  | | | |  _    ___    _ __        _ __     ___  | |_ 
| |  | | | '_ \  | '_ ` _ \  | | | | | | | |  / _ \  | '_ \      | '_ \   / _ \ | __|
| |__| | | | | | | | | | | | | | | | | | | | | (_) | | | | |  _  | | | | |  __/ | |_ 
 \____/  |_| |_| |_| |_| |_| |_| |_| |_| |_|  \___/  |_| |_| (_) |_| |_|  \___|  \__|

Plugin Name: IMG Lazy Loading
Plugin URI: http://unmillion.net/plugin-wordpress-img-lazy-loading/
Description: Plugin to load images lazyloading without JS library.
Version: 1.1
Author: Art Uro
Author URI: http://unmillion.net/author/art
License: GPL2

*/

define('IMG_LAZY_LOADING_PLUGIN_URL', plugin_dir_url( __FILE__ ));

$hooks = array();
$hooks[] = 'the_content';
$hooks[] = 'post_thumbnail_html';
$hooks[] = 'get_avatar';
$hooks[] = 'widget_text';
$hooks[] = 'wp_get_attachment_link';

add_action('wp_footer', 'addLazyLoaderJs');

foreach($hooks as $hook)
{
	add_filter($hook, 'imgLazyLoading', 99 ); 
}

function imgLazyLoading($content)
{
	$string = $content;
	$pattern = '/<img(.+)src=[\'"](.[^\'"]+)[\'"](.+)\/>/';
	$replacement = '<img${1}data-src="${2}" src="'.IMG_LAZY_LOADING_PLUGIN_URL.'default.gif" ${3} /><noscript>${0}</noscript>';
	$content =  preg_replace($pattern, $replacement, $string);
	return $content;
}

function addLazyLoaderJs()
{
	echo '<script src="'.IMG_LAZY_LOADING_PLUGIN_URL.'lazyloader.js"></script>';
}