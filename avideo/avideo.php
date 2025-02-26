<?php
/*
Plugin Name: aVideo
Plugin URI: http://www.imallen.com/2006/04/09/wordpress-youtube-plugin/
Description: Allen's Wordpress Video Plugin, a filter for WordPress that displays online flash videos, based on wordpress youtube plugin. Mainly to support most Chinese mainstream online video share site. Such as Tudou.com, Video.QQ.com, Mofile.com, UUme.com, YouKu.com and so on.
Version: 0.91
Author: Allen Hsu
Author URI: http://www.imallen.com/
Original Author: Joern Zaefferer
Original URI: http://bassistance.de/

Instructions

Copy this file you unzipped into the wp-content/plugins folder of WordPress, 
then go to Administration > Plugins, it should be in the list. Activtate it 
and avery occurence of the expression [type id] (case unsensitive) will as
an embedded flash player.

*/

// YouTube code

define("YOUTUBE_WIDTH", 425);
define("YOUTUBE_HEIGHT", 350);
define("YOUTUBE_REGEXP", "/\[youtube ([[:print:]]+)\]/");
define("YOUTUBE_TARGET", "<object type=\"application/x-shockwave-flash\" data=\"http://www.youtube.com/v/###URL###\" width=\"".YOUTUBE_WIDTH."\" height=\"".YOUTUBE_HEIGHT."\"><param name=\"movie\" value=\"http://www.youtube.com/v/###URL###\" /></object>");

function youtube_plugin_callback($match)
{
	$output = YOUTUBE_TARGET;
	$output = str_replace("###URL###", $match[1], $output);
	return ($output);
}

function youtube_plugin($content)
{
	return (preg_replace_callback(YOUTUBE_REGEXP, 'youtube_plugin_callback', $content));
}

add_filter('the_content', 'youtube_plugin');
add_filter('comment_text', 'youtube_plugin');

// TuDou code

define("TUDOU_WIDTH", 400);
define("TUDOU_HEIGHT", 300);
define("TUDOU_REGEXP", "/\[tudou ([[:print:]]+)\]/");
define("TUDOU_TARGET", "<object type=\"application/x-shockwave-flash\" data=\"http://www.tudou.com/v/###URL###\" width=\"".TUDOU_WIDTH."\" height=\"".TUDOU_HEIGHT."\"><param name=\"movie\" value=\"http://www.tudou.com/v/###URL###\" /></object>");

function tudou_plugin_callback($match)
{
	$output = TUDOU_TARGET;
	$output = str_replace("###URL###", $match[1], $output);
	return ($output);
}

function tudou_plugin($content)
{
	return (preg_replace_callback(TUDOU_REGEXP, 'tudou_plugin_callback', $content));
}

add_filter('the_content', 'tudou_plugin');
add_filter('comment_text', 'tudou_plugin');

// QQ Video code

define("QQVIDEO_WIDTH", 456);
define("QQVIDEO_HEIGHT", 362);
define("QQVIDEO_REGEXP", "/\[qqvideo ([[:print:]]+)\]/");
define("QQVIDEO_TARGET", "<object type=\"application/x-shockwave-flash\" data=\"http://video.qq.com/res/qqplayerout.swf?vid=###URL###\" width=\"".QQVIDEO_WIDTH."\" height=\"".QQVIDEO_HEIGHT."\"><param name=\"movie\" value=\"http://video.qq.com/res/qqplayerout.swf?vid=###URL###\" /></object>");

function qqvideo_plugin_callback($match)
{
	$output = QQVIDEO_TARGET;
	$output = str_replace("###URL###", $match[1], $output);
	return ($output);
}

function qqvideo_plugin($content)
{
	return (preg_replace_callback(QQVIDEO_REGEXP, 'qqvideo_plugin_callback', $content));
}

add_filter('the_content', 'qqvideo_plugin');
add_filter('comment_text', 'qqvideo_plugin');


// Mofile code

define("MOFILE_WIDTH", 480);
define("MOFILE_HEIGHT", 395);
define("MOFILE_REGEXP", "/\[mofile ([[:print:]]+)\]/");
define("MOFILE_TARGET", "<object type=\"application/x-shockwave-flash\" data=\"http://tv.mofile.com/cn/xplayer.swf?v=###URL###\" width=\"".MOFILE_WIDTH."\" height=\"".MOFILE_HEIGHT."\"><param name=\"movie\" value=\"http://tv.mofile.com/cn/xplayer.swf?v=###URL###\" /></object>");

function mofile_plugin_callback($match)
{
	$output = MOFILE_TARGET;
	$output = str_replace("###URL###", $match[1], $output);
	return ($output);
}

function mofile_plugin($content)
{
	return (preg_replace_callback(MOFILE_REGEXP, 'mofile_plugin_callback', $content));
}

add_filter('the_content', 'mofile_plugin');
add_filter('comment_text', 'mofile_plugin');

// UUME code

define("UUME_WIDTH", 400);
define("UUME_HEIGHT", 342);
define("UUME_REGEXP", "/\[uume ([[:print:]]+)\]/");
define("UUME_TARGET", "<object type=\"application/x-shockwave-flash\" data=\"http://www.uume.com/v/###URL###_UUME\" width=\"".UUME_WIDTH."\" height=\"".UUME_HEIGHT."\"><param name=\"movie\" value=\"http://www.uume.com/v/###URL###_UUME\" /></object>");

function uume_plugin_callback($match)
{
	$output = UUME_TARGET;
	$output = str_replace("###URL###", $match[1], $output);
	return ($output);
}

function uume_plugin($content)
{
	return (preg_replace_callback(UUME_REGEXP, 'uume_plugin_callback', $content));
}

add_filter('the_content', 'uume_plugin');
add_filter('comment_text', 'uume_plugin');

// YouKu code

define("YOUKU_WIDTH", 400);
define("YOUKU_HEIGHT", 300);
define("YOUKU_REGEXP", "/\[youku ([[:print:]]+)\]/");
define("YOUKU_TARGET", "<object type=\"application/x-shockwave-flash\" data=\"http://player.youku.com/player.php/sid/###URL###/v.swf\" width=\"".YOUKU_WIDTH."\" height=\"".YOUKU_HEIGHT."\"><param name=\"movie\" value=\"http://player.youku.com/player.php/sid/###URL###/v.swf\" /></object>");

function youku_plugin_callback($match)
{
	$output = YOUKU_TARGET;
	$output = str_replace("###URL###", $match[1], $output);
	return ($output);
}

function youku_plugin($content)
{
	return (preg_replace_callback(YOUKU_REGEXP, 'youku_plugin_callback', $content));
}

add_filter('the_content', 'youku_plugin');
add_filter('comment_text', 'youku_plugin');


// Flash code

define("FLASH_WIDTH", 400);
define("FLASH_HEIGHT", 300);
define("FLASH_REGEXP", "/\[flash ([[:print:]]+)\]/");
define("FLASH_TARGET", "<object type=\"application/x-shockwave-flash\" data=\"###URL###\" width=\"".FLASH_WIDTH."\" height=\"".FLASH_HEIGHT."\"><param name=\"movie\" value=\"###URL###\" /></object>");

function flash_plugin_callback($match)
{
	$output = FLASH_TARGET;
	$output = str_replace("###URL###", $match[1], $output);
	return ($output);
}

function flash_plugin($content)
{
	return (preg_replace_callback(FLASH_REGEXP, 'flash_plugin_callback', $content));
}

add_filter('the_content', 'flash_plugin');
add_filter('comment_text', 'flash_plugin');

?>
