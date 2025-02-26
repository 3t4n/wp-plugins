<?php
/*
Plugin Name: Author Box Reloaded Youtube Contact Addon
Plugin URI: http://wordpress.org/extend/plugins/author-box-reloaded-pack/
Description: Adds a new contact field to your profile. Just need to insert your UserID. Requires Author Box Reloaded 2.0 or greater.
Version: 1.1.2
Author: Lopo Lencastre de Almeida - iPublicis.com
Author URI: http://www.ipublicis.com
Donate link: http://smsh.me/7kit
License: GNU GPL v3 or later

    Copyright (C) 2010, 2012 iPublicis!COM

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

******************************************

HOW TO:

Change the following at top:

	1. At top the the specific text portion in "Plugin Name", i.e in case of "Wordpress.Org" this is the text to change
	2. At top change the "Author", "Author URI" and "Donate Link" by your owns. 

Change the following below:

    1. The function name but keep the "_authorbox_add_sites" portion.
		a) We usually use the name text for it, i.e. for "Wordpress.Org" you'll set "wordpress_org" or something like it.
    2. The $known_sites key and the "favicon" and "url" variables: 
		a) The key is used in the profile form so use the same text you used in the Plugin Name in header area.
        b) Don't forget that the $known_site url must have the text "USERNAME" in it in order to work properly.
	3. Change the values for  "plugin->author", "plugin->url" and "plugin->donate".
    4. Change the add_filter() function to include your "_authorbox_add_sites" function.

To make it available to everyone follow the rules defined at [Wordpress.Org](http://http://wordpress.org/extend/plugins/about/).
This is just another Wordpress plugin that will made some data available for Author Box Reloaded.

Thank you for your help and contribution.

*/

/**
 * Section to modify
 */
function youtube_authorbox_add_sites( $known_sites ) {						// CHANGE the function prefix name
	$known_sites['Youtube'] = array(															// CHANGE the key name
		'favicon' => plugin_dir_url( __FILE__ ) . 'images/youtube.png',			// CHANGE the image name
		'url' => 'http://www.youtube.com/user/USERNAME',							// CHANGE the service URI 
		'plugin' => array (
			'author' => 'Lopo Lencastre de Almeida <dev@ipublicis.com>', 	// CHANGE author name
			'url' => 'http://ipublicis.com/', 														// CHANGE author uri
			'donate' => 'http://smsh.me/7kit',													// CHANGE donate link
		),
  );
  return $known_sites;
}
add_filter('authorbox_known_sites','youtube_authorbox_add_sites',10,1);		// CHANGE the function prefix name

?>
