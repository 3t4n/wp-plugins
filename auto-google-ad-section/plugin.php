<?php
/*
Plugin Name: Auto Google Ad Section
Plugin URI: http://mr.hokya.com/automated-keywords-generator
Description: Automatically implement section targeting ad to improve your AdSense relevancy and boost your earning with the relevant ads. Completely not against Google Adsense TOS.
Version: 1.01
Author: Julian Widya Perdana
Author URI: http://mr.hokya.com/
*/

function agas_notify () {
	echo '<p>You are using <strong><a href="http://mr.hokya.com/auto-google-ad-section" target="_blank">Auto Google Ad Section</a></strong> to implement AdSense Section Targeting Ad</p>';
}
function agas_start () {
	echo "<!-- google_ad_section_start -->";
}
function agas_end () {
	echo "<!-- google_ad_section_end -->";
}
add_action('wp_head','agas_start');
add_action('get_footer','agas_end');
add_action('rightnow_end','agas_notify');

?>