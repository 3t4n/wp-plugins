<?php
/*
Plugin Name: Advanced Author Exposed
Plugin URI: http://www.jungeroemer.net/2010/05/24/wordpress-plugin-advanced-author-exposed/
Description: Simple and elegant way to get more information about author. Extended version of the original Author Exposed plugin.
Version: 1.1
Author: David Ortner
Author URI: http://www.jungeroemer.net/
*/

/* 
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

function rand_str($length = 5, $chars = 'abcdefghijklmnopqrstuvwxyz1234567890')
{
    // Length of character list
    $chars_length = (strlen($chars) - 1);

    // Start our string
    $string = $chars{rand(0, $chars_length)};
   
    // Generate random string
    for ($i = 1; $i < $length; $i = strlen($string))
    {
        // Grab a random character from our list
        $r = $chars{rand(0, $chars_length)};
       
        // Make sure the same two characters don't appear next to each other
        if ($r != $string{$i - 1}) $string .=  $r;
    }
   
    // Return the string
    return $string;
}

function author_exposed($the_link_item) {
	global $authordata;
	

// Gravatar Photo

	$mail = get_the_author_email();
	$gravatar = 'http://www.gravatar.com/avatar.php?gravatar_id=' .md5($mail);

// Get ID for hidden DIV

	$div_id = 'a'.rand_str();

// Hidden DIV output

	$author_posts_link = get_author_posts_url($authordata->ID, $authordata->user_nicename );

	$hidden_div = '<span id="'.$div_id.'" class="mydiv" style="display:none;"><img src="'.$gravatar.'" alt="gravatar" /><span class="ae_close"><a href="javascript:;" onmousedown="toggleDiv(\''.$div_id.'\');">X</a></span><span class="ae_top"><b>'.get_the_author_firstname().' '.get_the_author_lastname().'</b></span>
		<span class="ae_body"><b>E-mail:</b><br /> '.get_the_author_email().'<br /></span><span class="ae_body"><b>Info:</b><br /> '.get_the_author_description().'</span><span class="ae_body"><a href="'.$author_posts_link.'">Posts by the author </a> ('.get_the_author_posts().')</span></span>';
	
// Show it

	echo ('<span class="ae_authorhighlight"><a href="javascript:;" onmousedown="toggleDiv(\''.$div_id.'\');">'.$the_link_item.'</a></span>'.$hidden_div);

}

// Add JavaScript and Styles to header

	add_action('wp_head', 'add_head');
	function add_head() {
	echo '<script type="text/javascript" src="'.get_option(siteurl).'/wp-content/plugins/advanced-author-exposed/javascript/skripta.js"></script><link rel="stylesheet" href="'.get_option(siteurl).'/wp-content/plugins/advanced-author-exposed/css/ae_style.css" type="text/css" />';
}

?>