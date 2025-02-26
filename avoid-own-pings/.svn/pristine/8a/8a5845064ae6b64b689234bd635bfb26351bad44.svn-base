<?php
/*
Plugin Name: Avoid own pings
Plugin URI: http://online-source.net/2011/12/16/avoid-pings-from-your-own-wordpress-blog
Description: Avoid pings from your own Wordpress blog 
Version: 1.0
Author: MrXHellboy - Laurens ten Ham
Author URI: http://www.online-source.net
*/

function avoid_pings_from_own_blog($urls){
	$blog = get_bloginfo('home' );
    if (strlen($blog) == 0){
        return;
    }
	foreach ($urls as $count => $url)
		if (strpos($url, $blog) === 0){
            unset($urls[$count]);
		}
}

add_action('pre_ping', 'avoid_pings_from_own_blog');
?>