<?php
/*
Plugin Name: Auto Subscribe RSS Feed
Plugin URI: http://mr.hokya.com/auto-subscribe-rss-feed/
Description: Automatically prompt subsription message to promote and make visitor subscribe your feed every they post a new comment
Version: 1.60
Author: Julian Widya Perdana
Author URI: http://mr.hokya.com/
*/

function asrf_page () {
	add_options_page('Auto Subscribe Feed', 'Auto Subscribe Feed', 'manage_options','auto-subscribe-rss-feed/options.php');
}

function asrf () {
	$feed = get_option("feedburner_url");
	$java = "<script>document.getElementById('commentform').onsubmit = function () {window.open('http://feedburner.google.com/fb/a/mailverify?uri=$feed', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true;}</script>";
	echo $java;
}
add_action('get_footer','asrf');
add_action('admin_menu','asrf_page');

?>