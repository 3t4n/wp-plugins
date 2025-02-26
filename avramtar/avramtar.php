<?php

/*
Plugin Name: AVrAmTAR
Plugin URI: http://www.avramtar.com/
Description: Adds AVrAmTAR.com avatar next to users' comments on your WP-powered blog.
Author: Nemanja Avramovic
Version: 0.1.6
Author URI: http://www.avramovic.info/
*/

/*  Copyright 2008  Avram  (email : avramyu@gmail.com)

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

ob_start();
bloginfo('url');
$avramtar_blogurl = ob_get_clean();

function avramtar_wp($default = 'http://www.avramovic.info/images/default.jpg') {
	global $comment;
	$output = "http://avatars.avramtar.com/avatar.php?email=".md5($comment->comment_author_email);
	if ($default != '') {
		$output .= "&amp;default=".urlencode($default);
	}
	return $output;
}

function avramtar_addcss() {
	global $avramtar_blogurl;
	echo '<link rel="stylesheet" href="' . $avramtar_blogurl . '/wp-content/plugins/avramtar/avramtar_wp.css" type="text/css" media="screen" />';
}

function avramtar_addjs() {
	global $avramtar_blogurl;
	echo '<script type="text/javascript" src="' . $avramtar_blogurl . '/wp-content/plugins/avramtar/avramtar_wp.js"> </script>';
}

function avramtarize_comment($comment = '') {
     return '<p id="avramtarized_comment"><a href="http://www.avramtar.com/" title="AVrAmTAR avatar"><img src="' . avramtar_wp() . '" class="avramtar" alt="AVrAmTAR avatar" /></a>' . $comment . '</p>';
}

add_action("wp_head", "avramtar_addcss");
add_action("wp_head", "avramtar_addjs");

add_filter('comment_text', 'avramtarize_comment');

?>