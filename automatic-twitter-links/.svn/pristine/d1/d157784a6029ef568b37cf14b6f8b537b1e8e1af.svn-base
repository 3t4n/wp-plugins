<?php
/*
Plugin Name: Automatic Twitter Links
Plugin URI: http://www.marijnrongen.com/wordpress-plugins/automatic_twitter_links/
Description: Automatically convert Twitter usernames and hashtags to Twitter profile- and searchlinks in pages, posts and comments.
Version: 1.0
Author: Marijn Rongen
Author URI: http://www.marijnrongen.com
*/

class MR_Automatic_Twitter_Links {
	function MR_Automatic_Twitter_Links() {
		
	}
	
	function linkify($content) {
		$content = preg_replace("/(^|\s)*(@([a-zA-Z0-9-_]{1,15}))(\.*[\n|\r|\t|\s|\<|\&]+?)/i", "$1<a href=\"http://twitter.com/$3\">$2</a>$4", $content);
		$content = preg_replace("/(^|\s)*(#([a-zA-Z0-9]+))([\n|\r|\t|\s|\.|\<|\&]+)/i", "$1<a href=\"http://twitter.com/search/$3\">$2</a>$4", $content);
		return $content;
	}
}
add_filter('the_content', array('MR_Automatic_Twitter_Links', 'linkify'));
add_filter('comment_text', array('MR_Automatic_Twitter_Links', 'linkify'));
?>