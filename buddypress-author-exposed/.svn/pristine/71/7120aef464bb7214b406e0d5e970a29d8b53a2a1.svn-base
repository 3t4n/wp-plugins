<?php
/*
Plugin Name: BuddyPress Author Exposed
Plugin URI: http://erectlocution.com
Description: Provides rich information about post author, including a link to his or her BuddyPress profile.  A refinement of Igor Penjivrag's Author Exposed plugin, released in 2008.  See http://colorlightstudio.com/2008/03/14/wordpress-plugin-author-exposed/ for that plugin.
Version: 0.1
Author: Daniel Black
Author URI: http://erectlocution.com
*/

/*  Copyright 2009  Daniel Black  (email : erectlocution@gmail.com)

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

// Function bp_author_link() provided by John James Jacoby on 09.03.2009 in #buddypress-dev, and thereafter adapted.

// Code borrowed from bp_adminbar_authors_menu()
// Takes ID of post author is its only parameter

function bp_author_link( $authorID ) {


	// Get author's data BuddyPress style
	$author = new BP_Core_User( $authorID );
	
 	// Return the author's BuddyPress profile URL
 	return $author->user_url;
}

function bp_author_exposed() {
	global $authordata;
	$nick = get_the_author();

// Gravatar Photo

	$mail = get_the_author_email();
	$gravatar = 'http://www.gravatar.com/avatar.php?gravatar_id=' .md5($mail);

// Get ID for hidden DIV

	$div_id = 'a'.get_the_ID();

// Hidden DIV output

	//$author_posts_link = get_author_posts_url($authordata->ID, $authordata->user_nicename );
	$author_posts_link = bp_author_link($authordata->ID);

	$hidden_div =
        '<span id="'.$div_id.'" class="mydiv" style="display:none;">
          <img src="'.$gravatar.'" alt="gravatar" />
          <span class="ae_close">
            <a href="javascript:;" onmousedown="toggleDiv(\''.$div_id.'\');">close</a>
          </span>
          <span class="ae_top">
            <strong>Author: '.get_the_author().'</strong>
          </span>
          <span class="ae_body">
            <strong>Name</strong>: '.get_the_author_firstname().' '.get_the_author_lastname().'<br />
            <strong>Email:</strong> '.get_the_author_email().'<br />
            <strong>Site:</strong> <a href="'.get_the_author_url().'">'.get_the_author_url().'</a><br />
          </span>
          <span class="ae_about">
            <strong>About:</strong> '.get_the_author_description().'</span>
          <span class="ae_body">
            <a href="'.$author_posts_link.'">See Author\'s Profile</a>
          </span>
        </span>';
	
// Show it

	echo ('<a href="javascript:;" onmousedown="toggleDiv(\''.$div_id.'\');">'.$nick.'</a>'.$hidden_div);

}


// Add JavaScript and Styles to header

	add_action('wp_head', 'add_head');
	function add_head() {
	 echo '<script type="text/javascript" src="'.get_option(siteurl).'/wp-content/plugins/bp_author_exposed/javascript/skripta.js"></script><link rel="stylesheet" href="'.get_option('siteurl').'/wp-content/plugins/bp_author_exposed/css/ae_style.css" type="text/css" />';
}

?>