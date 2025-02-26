<?php
/*
* Plugin Name: autometa's AUTUA
* Description: It reproduces author names and links and guest links in pages, posts, portfolios or products simply via: [autua] and [autualink] and [autuaguest].
* Version: 2.2
* Author: JorgeAmVF
* Author URI: https://profiles.wordpress.org/jorgeamvf/
* License: GPL2
 
autometa's AUTUA is developed by JorgeAmVF in order to improve the quality of Quaestio.org
and it is freely provided with the intent to help other developers to fulfill
their needs. 
 
autometa's AUTUA is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
autometa's AUTUA is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with autometa's AUTUA. If not, see http://www.gnu.org/licenses/old-licenses/gpl-2.0.html.
*/

// [autua] = author name
function autometa_author_name() {
	$am_autua = '<span id="autua" class="autometa">' . get_the_author() . '</span>';
	return $am_autua;
}
add_shortcode( "autua", "autometa_author_name" );

// [autualink] = author link
function autometa_author_link() {
	$am_autualink = '<span id="autualink" class="autometa">' . get_the_author_link() . '</span>';
	return $am_autualink;
}
add_shortcode( "autualink", "autometa_author_link" );

// [autuaguest] = guest link
function autometa_guest_link() {
	$am_autuaguest = '<span id="autuaguest" class="autometa">' . get_the_author_posts_link() . '</span>';
	return $am_autuaguest;
}
add_shortcode( "autuaguest", "autometa_guest_link" );
?>
