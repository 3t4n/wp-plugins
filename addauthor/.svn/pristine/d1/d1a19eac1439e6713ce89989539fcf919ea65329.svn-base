<?php
/**
 * @package addauthor
 * @author Paolo Valenti
 * @version 1.3 changed readme file
 */
/*
Plugin Name: addauthor
Plugin URI: http://paolovalenti.info/2009/02/04/add-author-plugin
Description: This plugin allow you to show the description of the author of the post. Useful for multi authors blog. 
Author: Paolo Valenti
Version: 1.3
Author URI: http://paolovalenti.info
*/
/*  
	Copyright 2009  Paolo Valenti aka Wolly  (email : wolly66@gmail.com)

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
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

function wolly_addaut() {
echo '<ul class="addaut">';
echo '<li>';
echo get_avatar( get_the_author_meta('user_email'), $size = '96' );
echo 'Post by ' ;
the_author() ;
echo ' on ';
the_time('F jS, Y');
echo '<br />';
the_author_meta(description) ;
echo '<div class="clear"></div>';
echo '</li>';
echo '</ul>';
} 
?>