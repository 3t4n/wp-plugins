<?php
/*
Plugin Name: Follow My Links
Plugin URI: http://www.everfluxx.com/follow-my-links/
Description: Do not automatically add the rel=nofollow attribute to links in comments by the post author, strip nofollow from links to the post author's web page.
Version: 1.3
Author: Everfluxx
Author URI: http://www.everfluxx.com/
Min WP Version: 2.8
Max WP Version: 3.1
Update Server: http://wordpress.org/extend/plugins/follow-my-links/ 

Copyright (c) 2009-2011 Everfluxx
Released under the GNU General Public License (GPL) Version 2
http://www.gnu.org/licenses/gpl-2.0.txt
*/

/**
 * Callback to convert URI match to HTML A element.
 *
 * Modified from _make_url_clickable_cb()
 *
 * @access private
 *
 * @param array $matches Single Regex Match.
 * @return string HTML A element with URI address.
 */
function _followmylinks_make_url_clickable_cb($matches) {
	$url = $matches[2];
	$suffix = '';

	/** Include parentheses in the URL only if paired **/
	while ( substr_count( $url, '(' ) < substr_count( $url, ')' ) ) {
		$suffix = strrchr( $url, ')' ) . $suffix;
		$url = substr( $url, 0, strrpos( $url, ')' ) );
	}

	$url = esc_url($url);
	if ( empty($url) )
		return $matches[0];

	return $matches[1] . "<a href=\"$url\">$url</a>" . $suffix;
}

/**
 * Callback to convert URL match to HTML A element.
 *
 * Modified from _make_web_ftp_clickable_cb()
 *
 * @access private
 *
 * @param array $matches Single Regex Match.
 * @return string HTML A element with URL address.
 */
function _followmylinks_make_web_ftp_clickable_cb($matches) {
	$ret = '';
	$dest = $matches[2];
	$dest = 'http://' . $dest;
	$dest = esc_url($dest);
	if ( empty($dest) )
		return $matches[0];

	// removed trailing [.,;:)] from URL
	if ( in_array( substr($dest, -1), array('.', ',', ';', ':', ')') ) === true ) {
		$ret = substr($dest, -1);
		$dest = substr($dest, 0, strlen($dest)-1);
	}
	return $matches[1] . "<a href=\"$dest\">$dest</a>$ret";
}

/**
 * Convert plaintext URI to HTML links.
 *
 * Converts URI, www and ftp, and email addresses. Finishes by fixing links
 * within links.
 *
 * Modified from make_clickable()
 *
 * @param string $ret Content to convert URIs.
 * @return string Content with converted URIs.
 */
function followmylinks_make_clickable($ret) {
	$ret = ' ' . $ret;
	// in testing, using arrays here was found to be faster
	if ( $comment->user_id === $post->post_author ) // Do not add nofollow to links in comments by the post author
		{
		$ret = preg_replace_callback('#(?<!=[\'"])(?<=[*\')+.,;:!&$\s>])(\()?([\w]+?://(?:[\w\\x80-\\xff\#%~/?@\[\]-]|[\'*(+.,;:!=&$](?![\b\)]|(\))?([\s]|$))|(?(1)\)(?![\s<.,;:]|$)|\)))+)#is', '_followmylinks_make_url_clickable_cb', $ret);
		$ret = preg_replace_callback('#([\s>])((www|ftp)\.[\w\\x80-\\xff\#$%&~/.\-;:=,?@\[\]+]+)#is', '_followmylinks_make_web_ftp_clickable_cb', $ret);
		}
	else // proceed normally
		{
		$ret = preg_replace_callback('#(?<!=[\'"])(?<=[*\')+.,;:!&$\s>])(\()?([\w]+?://(?:[\w\\x80-\\xff\#%~/?@\[\]-]|[\'*(+.,;:!=&$](?![\b\)]|(\))?([\s]|$))|(?(1)\)(?![\s<.,;:]|$)|\)))+)#is', '_make_url_clickable_cb', $ret);
		$ret = preg_replace_callback('#([\s>])((www|ftp)\.[\w\\x80-\\xff\#$%&~/.\-;:=,?@\[\]+]+)#is', '_make_web_ftp_clickable_cb', $ret);
		}
	$ret = preg_replace_callback('#([\s>])([.0-9a-z_+-]+)@(([0-9a-z-]+\.)+[0-9a-z]{2,})#i', '_make_email_clickable_cb', $ret);
	// this one is not in an array because we need it to run last, for cleanup of accidental links within links
	$ret = preg_replace("#(<a( [^>]+?>|>))<a [^>]+?>([^>]+?)</a></a>#i", "$1$3</a>", $ret);
	$ret = trim($ret);
	return $ret;
}

/**
 * Adds rel nofollow string to all HTML A elements in content, except authorial comments.
 *
 * Modified from wp_rel_nofollow()
 *
 * @param string $text Content that may contain HTML A elements.
 * @return string Converted content.
 */
 function followmylinks_wp_rel_nofollow($ret) {
	global $comment_post_ID, $wpdb, $_POST;

	if ( !isset ($comment_post_ID) ) $comment_post_ID = (int) $_POST['comment_post_ID'];

	if ( is_user_logged_in() )
		{
		$user = wp_get_current_user();
		$user_id = $user->id;

		$post_data = $wpdb->get_row( $wpdb->prepare("SELECT post_author FROM $wpdb->posts WHERE ID = %d", $comment_post_ID) );

		if ( !empty($post_data->post_author) )
			{
			$post_author = $post_data->post_author;
			if ( $user_id == $post_author ) return $ret;   // Do not add nofollow to links in comments by the post author
			}
		}
	$ret = wp_rel_nofollow($ret);
	return $ret;
}

/**
 * Strip nofollow from the comment author link in authorial comments.
 *
 * @param string $ret Content that may contain HTML A elements.
 * @return string Converted content.
 */
 function followmylinks_strip_post_author_nofollow($ret) { 
	global $comment, $post;
	if ( $comment->user_id === $post->post_author ) // Strip nofollow from links to the post author's URL
		{
		$ret = preg_replace("/ rel='external nofollow'/","",$ret); 
		$ret = preg_replace("/ rel=\"external nofollow\"/","",$ret); 
		$ret = preg_replace("/ rel='nofollow'/","",$ret); 
		$ret = preg_replace("/ rel=\"nofollow\"/","",$ret);
		} 
	return $ret;
} 

/**
 * Replace/add filters
 */
remove_filter('pre_comment_content', 'wp_rel_nofollow', 15); 
remove_filter('comment_text', 'make_clickable', 9);
add_filter('pre_comment_content', 'followmylinks_wp_rel_nofollow', 15);
add_filter('comment_text', 'followmylinks_make_clickable', 9); 
add_filter('get_comment_author_link', 'followmylinks_strip_post_author_nofollow');

?>