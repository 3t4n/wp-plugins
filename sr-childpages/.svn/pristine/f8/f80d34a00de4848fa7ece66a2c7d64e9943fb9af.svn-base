<?php
/*
Plugin Name: SR-ChildPages Shortcode
Plugin URI: http://scottierocket.com/wordpress-stuff/sr-childpages
Description: This plugin allows page authors to easily list any child pages of a given page by simply using a new [childpages] shortcode.  Visit the plugin homepage for usage specifics.
Version: 0.2
Author: Neil Mickelson
Author URI: http://scottierocket.com
*/

/*  Copyright 2008  Neil Mickelson  (email : wordpress-stuff@scottierocket.com)

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

/*  Version History:

    0.2 - 05 May 2008
    - First version to be hosted at wordpress.org/extend/plugins
    - Confirmed compatible with WordPress 2.5.1
    - Minor documentation updates; no functional changes
    
    0.1 - 24 Apr 2008
    - Initial release
*/

function sr_childpages_handler( $atts, $content = null ) {
	global $wpdb, $post;
	
  extract( shortcode_atts( array(
    'depth'       => 1, 
    'child_of'    => $post->ID, 
    'exclude'     => '',
    'echo'        => 0,
    'authors'     => '',
    'sort_column' => 'menu_order, post_title',
  ), $atts ) );

	$subpages = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_parent = '$child_of;'");

	if( $subpages > 0 ) {
    $html = wp_list_pages('depth='.$depth.'&title_li='.$content.'&child_of='.$child_of.'&exclude='.$exclude.'&echo='.$echo.'&authors='.$authors.'&sort_column='.$sort_column);
    return '<div class="list_subpages"><ul>'.$html.'</ul></div>';
  } else {
    return null;
  }
}

add_shortcode('childpages', 'sr_childpages_handler');
?>
