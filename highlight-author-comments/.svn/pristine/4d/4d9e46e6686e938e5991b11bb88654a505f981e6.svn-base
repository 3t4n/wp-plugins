<?php
/*
Plugin Name: Highlight Author Comments
Plugin URI: http://rmarsh.com/plugins/highlight-comments/
Description: Automatically applies a distinctive style to comments by the post's author.
Author: Rob Marsh, SJ
Version: 1.0.3
Author URI: http://rmarsh.com/
*/ 

/*
Copyright 2008  Rob Marsh, SJ  (http://rmarsh.com)

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

function hac_highlight_comment($content){
	global $comment;
	if (strtolower($comment->comment_author_email) !== strtolower(get_the_author_email())) 
		return $content;
	else {
		$options = get_option('hac_highlight_author_comments');
		return '<div style="'.$options['highlight_style'].'"><p>'.$content.'</div>';
	}	
}

function hac_highlight_author($link){
	global $comment;
	if (strtolower($comment->comment_author_email) !== strtolower(get_the_author_email())) 
		return $link;
	else {
		$options = get_option('hac_highlight_author_comments');
		return '<span style="'.$options['highlight_author_style'].'">'.$link.'</span>';
	}	
}

add_filter('comment_text', 'hac_highlight_comment');
add_filter('get_comment_author_link', 'hac_highlight_author');

if ( is_admin() ) {
	require(dirname(__FILE__).'/highlight_author_comments_admin.php');
}

?>