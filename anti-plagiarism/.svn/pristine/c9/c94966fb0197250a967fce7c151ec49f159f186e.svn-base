<?php
/*
Plugin Name: Anti Plagiarism
Plugin URI: http://mr.hokya.com/anti-plagiarism
Description: Protects your contents from copy-paster by disablng copy commands from shortcut + mouse and disallow users to make a selection over the text on your content.
Version: 3.60
Author: Julian Widya Perdana
Author URI: http://mr.hokya.com/
*/

if(!get_option("ap_message")) update_option("ap_message","Sorry for any inconvenience, some feature were disabled to prevent plagiarism");

function anti_plagiarism () {
	$msg = urlencode(get_option("ap_message"));
	$url = get_option("home")."/wp-content/plugins/anti-plagiarism/js.php?m=$msg";
	echo '<script src="'.$url.'" ></script>';
}

function anti_plagiarism_notice () {
	echo "<p>You are protected with <strong><a href='http://mr.hokya.com/anti-plagiarism/' target='_blank'>Anti Plagiarism</a></strong></p>";
}

function anti_plagiarism_menu () {
	add_options_page('Anti Plagiarism', 'Anti Plagiarism', 'manage_options','anti-plagiarism/options.php');
}

add_action('get_footer', 'anti_plagiarism');
add_action('rightnow_end','anti_plagiarism_notice');
add_action('admin_menu', 'anti_plagiarism_menu');

?>