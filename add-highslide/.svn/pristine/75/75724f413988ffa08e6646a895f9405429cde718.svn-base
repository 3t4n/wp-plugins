<?php
/*
Plugin Name: Add Highslide
Plugin URI: http://showfom.com/add-hishslide-wordpress-plugin/
Description: This plugin automatically add the class="highslide-image" onclick="return hs.expand(this);" to images linked in a post. Doesn't add the the files required for Highslide4WP!
Author: Showfom 
Author URI: http://showfom.com
Version: 1.1
Put in /wp-content/plugins/ of your Wordpress installation
*/
add_filter('the_content', 'addhighslideclass_replace');
function addhighslideclass_replace ($content)
{   global $post;
	$pattern = "/<a(.*?)href=('|\")([^>]*).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>(.*?)<\/a>/i";
    $replacement = '<a$1href=$2$3.$4$5 class="highslide-image" onclick="return hs.expand(this);"$6>$7</a>';
    $content = preg_replace($pattern, $replacement, $content);
    return $content;
}
?>