<?php
/*
Plugin Name: 2-4 comment fix
Plugin URI: http://varhol.sk./download/#2-4-comment-fix
Description: This fix replace your comment count to go with most of central european languages. Thare was a gapwhen word "Commments" was the same for counts greater than 1. But for example in Slovak and Czech there is different word when count is from 2 to 4. So there was gramatical error. This will fix it.
Version: 1.0
Author: Ján Varhol
Author URI: http://varhol.sk/
*/

function comments_number_2_4( $zero = false, $one = false, $more = false, $twotofour = false, $deprecated = '' ) {
	global $id;
	$number = get_comments_number($id);

	if ( $number > 4)
		$output = str_replace('%', $number, ( false === $more) ? __('% Comments') : $more);
	elseif ( ( $number > 1 ) and ( $number < 5 ) )
		$output = str_replace('%', $number, ( false === $twotofour ) ? __('% Comments') : $twotofour);
	elseif ( $number == 0 )
		$output = ( false === $zero ) ? __('No Comments') : $zero;
	else // must be one
		$output = ( false === $one ) ? __('1 Comment') : $one;

	echo apply_filters('comments_number_2_4', $output, $number);
}
add_filter('comments_number','comments_number_2_4');

function comments_popup_link_2_4($zero='No Comments', $one='1 Comment', $more='% Comments', $twotofour='% Comments', $CSSclass='', $none='Comments Off') {
	global $id, $wpcommentspopupfile, $wpcommentsjavascript, $post, $wpdb;

	if ( is_single() || is_page() )
		return;

	$number = get_comments_number($id);

	if ( 0 == $number && 'closed' == $post->comment_status && 'closed' == $post->ping_status ) {
		echo '<span' . ((!empty($CSSclass)) ? ' class="' . $CSSclass . '"' : '') . '>' . $none . '</span>';
		return;
	}

	if ( !empty($post->post_password) ) { // if there's a password
		if ($_COOKIE['wp-postpass_'.COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			echo(__('Enter your password to view comments'));
			return;
		}
	}

	echo '<a href="';
	if ($wpcommentsjavascript) {
		if ( empty($wpcommentspopupfile) )
			$home = get_option('home');
		else
			$home = get_option('siteurl');
		echo $home . '/' . $wpcommentspopupfile.'?comments_popup='.$id;
		echo '" onclick="wpopen(this.href); return false"';
	} else { // if comments_popup_script() is not in the template, display simple comment link
		if ( 0 == $number )
			echo get_permalink() . '#respond';
		else
			comments_link();
		echo '"';
	}

	if (!empty($CSSclass)) {
		echo ' class="'.$CSSclass.'"';
	}
	$title = attribute_escape(get_the_title());
	echo ' title="' . sprintf( ('Comment on %s'), $title ) .'">';
	comments_number_2_4($zero, $one, $more,$twotofour, $number);
	echo '</a>';
}
add_filter('comments_popup_link','comments_popup_link_2_4');

?>
