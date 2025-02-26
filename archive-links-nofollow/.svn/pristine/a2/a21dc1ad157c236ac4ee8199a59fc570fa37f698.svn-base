<?php
/*
Plugin Name: Archives Nofollow
Plugin URI: http://www.web-articles.info
Description: Adds the "nofollow" rel attribute to archive links.
Version: 1.0
Author: Mircea Duhan
Author URI: http://www.web-articles.info

Copyright 2009  Mircea Duhan  (email : mircea@duhan.net)

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
    
*/

add_filter( 'get_archives_link', 'nofollow_archive' );

function nofollow_archive( $text ) {
	$text = stripslashes($text);
	$text = preg_replace_callback('|<a (.+?)>|i', 'wp_rel_nofollow_callback', $text);
	return $text;
}
