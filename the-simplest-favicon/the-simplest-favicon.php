<?php
/*
Plugin Name: The Simplest Favicon
Plugin URI: http://wordpress.org/extend/plugins/the-simplest-favicon/
Description: Adds a favicon link to the document head section.
Author: EPIPE Communications
Version: 1.1
Author URI: http://epipe.com/
License: GPLv2 or later
*/

function the_simplest_favicon_head_action() {
	echo "<link rel='shortcut icon' href='"
	    . get_site_url()
	    . "/favicon.ico' />\n";
}

add_action( 'wp_head', 'the_simplest_favicon_head_action' );

?>
