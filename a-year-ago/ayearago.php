<?php
/*
Plugin Name: A Year Ago
Description: Creates a link to the post from exactly one year ago, if there was one a year ago. Works only with one-post-per-day blogs and is designed primarily for photoblogs.
Version: 0.1
Author: Robert Jones
Author URI: http://www.blindedbytheflash.com/
Plugin URI: http://www.blindedbytheflash.com/
License: GPL2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.txt
*/

// Copyright (C) 2011 Robert Jones (rjones@blindedbytheflash.com)

// Based on A Year Ago Image Addon v0.7 for Pixelpost (based on One Year Ago 1.0 by Marco Martinelli - lightopinion@gmail.com), written by Claus Hajberg (Softly), claus@hojbergnet.dk.

function ayearago() {

	global $wpdb, $post, $ayalnk, $cur, $ayaID;

	if (is_single()) {

		$postID = $post->ID;
		$cur = $wpdb->get_col("SELECT DATE_SUB(DATE(post_date),INTERVAL 1 YEAR) FROM wp_posts WHERE id=$postID");

		if ($cur[0] !='') {
			$ayaID = $wpdb->get_col("SELECT ID FROM wp_posts WHERE DATE(post_date) like '$cur[0]' ORDER BY post_date DESC limit 0,1");

			$ayasiteurl = get_settings('siteurl');

			$ayalnk='';

			if ($ayaID[0] !='') {
				$ayalnk = '<a class="ayearago" href="' . $ayasiteurl . '/?p=' . $ayaID[0] . '">a year ago</a> &nbsp; | &nbsp; ';
				print $ayalnk;
			} //  if ($ayaID !='')

		} // if ($cur !='')

	} // is_single()

} ; // ayearago

add_action('init', 'ayearago');

?>