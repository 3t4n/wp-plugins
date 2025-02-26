<?php
/**
 * Plugin Name: Auto Twitter Handle
 * Plugin URI: danielsantoro.com/contact
 * Description: Automaticlaly links to a user's Twitter profile when you enter their username, i.e. @Danny_Santoro
 * Version: 1.0.0
 * Author: Daniel Santoro
 * Author URI: danielsantoro.com
 */
/*  Copyright 2014  danielsantoro.com  (email : contact@danielsantoro.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function auto_twitter_handle($content) {
	return preg_replace('/([^a-zA-Z0-9-_&])@([0-9a-zA-Z_]+)/', "$1<a href=\"http://twitter.com/$2\" target=\"_blank\" rel=\"nofollow\">@$2</a>", $content);
}

add_filter('the_content', 'auto_twitter_handle');   
add_filter('comment_text', 'auto_twitter_handle');