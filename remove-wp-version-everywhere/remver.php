<?php
/*
PLUGIN NAME: Remove WP version everywhere
PLUGIN URI: http://wordpress.org/extend/plugins/remove-wp-version-everywhere/
DESCRIPTION: Removes Wordpress and version from post, pages and RSS
AUTHOR: frisno
AUTHOR URI: http://www.frisno.com/
VERSION: 1.0.3
*/

/*  Remove WordPress & version from pages, blog and RSS.

    Upload the folder to your plugins folder.
    Activate or network activate and you are done.

    If you have similar tweaks to your files like
         <?php remove_action('wp_head', 'wp_generator'); ?>
         in your header
    or
         remove_action('wp_head', 'wp_generator');'
         in your functions.php
    you can temporarily remove them to test that this plugin works.

    There is no harm in leaving the mentioned code in the header or function file.
    If the version are not instantly removed, wait a moment and reload the page,
    it may take a moment before the RSS is updated.


    ============================================================

    Copyright 2011  Frisno  (email : wordpress-plugin@frisno.com)

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


// If file is opened directly, return 403 error
if (!function_exists ('add_action')) {
	header('Status: 403 Forbidden');
	header('HTTP/1.1 403 Forbidden');
	exit();
}

// Create a function to remove from RSS feed
function remove_feed_generator() {
	return '';
}

// Tell to not display WP version 
add_filter( 'the_generator', 'remove_feed_generator');

?>