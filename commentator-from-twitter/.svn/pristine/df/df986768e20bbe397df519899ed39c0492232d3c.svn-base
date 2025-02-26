<?php
/*
Plugin Name: Commentator from Twitter
Plugin URI: http://absolvo.ru/commentator-from-twitter-cft/
Description: The plugin helps to allocate visually commentators who have specified in the field “Web site” the link to Twitter.
Version: 1.03
Author: Dimitry Wolotko
Author URI: http://absolvo.ru

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

*/


function comment_author_link_twitter() {
	global $comment;
	
	$url = $comment->comment_author_url;
	$url = mb_strtolower($url);
	$author = $comment->comment_author;
	
	if (!$author) 
	{
		$author = 'Anonymous';
	}
	
	$pattern = "#http://twitter.com/(\w+)#";
	if (preg_match($pattern, $url)) 
	{
		$nickname = $comment->comment_author_url;
		preg_match_all('#http://twitter.com/(\w+)#is',$nickname,$matches);
		
		echo "<a href='{$url}' class='twitter-nickname'>@{$matches[1][0]}</a>";
	} 
	else 
	{
		if (empty($url)) 
		{
			echo $author;
		}
		else
		{
			echo "<a href='{$url}'>{$author}</a>";
		}
	}
}

add_action('get_comment_author_link','comment_author_link_twitter');

?>