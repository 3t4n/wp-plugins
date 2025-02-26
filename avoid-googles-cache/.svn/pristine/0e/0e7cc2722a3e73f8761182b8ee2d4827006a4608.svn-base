<?php
/*
Plugin Name: Avoid Google's Cache
Plugin URI: http://wordpress.org/extend/plugins/avoid-googles-cache/
Description: Avoid getting your blog cached by e.g. Google and Internet Archive.
Author: Kristian Risager Larsen
Version: 1.2.1
Author URI: http://kezze.dk
*/

add_action("wp_head", "avoid_cache_google");

function avoid_cache_google()
{
	echo "\n\n<!-- Google and other search engines should not cache this page. Plugin by Kristian Risager Larsen, http://kezze.dk . Download the plugin at http://wordpress.org/extend/plugins/avoid-googles-cache/ -->\n";
    echo "<meta name=\"robots\" content=\"noarchive\" />\n\n";
}

// http://www.archive.org/about/exclude.php

add_action("do_robotstxt","avoid_cache_internet_archive");

function avoid_cache_internet_archive()
{
    echo "\n\n";
    echo "# The Internet Archive (at http://web.archive.org/ ) should not cache this page.\n";
	echo "# Plugin by Kristian Risager Larsen, http://kezze.dk . Download the plugin at http://wordpress.org/extend/plugins/avoid-googles-cache/\n";
    echo "User-agent: ia_archiver\n";
    echo "Disallow: /";
    echo "\n\n";
}

?>