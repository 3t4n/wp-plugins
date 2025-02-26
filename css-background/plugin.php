<?php
/*
Plugin Name: CSS BackGround
Plugin URI: http://mr.hokya.com/css-background/
Description: Let you change the look of your blog by changing the Background Image from your gallery
Version: 2.10
Author: Julian Widya Perdana
Author URI: http://mr.hokya.com/
*/

function cb_menu () {
	add_theme_page('CSS BackGround', 'CSS BackGround', 'manage_options','css-background/options.php');
}

function css_background () {
	$bg = get_option("cssbackground");
	$opt = "";
	if (get_option("bgfill")=="axis") $opt .= " repeat-x ";
	if (get_option("bgfill")=="ordinate") $opt .= " repeat-y ";
	echo "\n<!-- CSS BackGround for changing and managing your backgrounds, for the documentation see http://mr.hokya.com/css-background/ -->\n";
	echo "<style>body {background:url($bg) $opt fixed}</style>";
	echo "<noscript>The background has been modified using <a href='http://mr.hokya.com/css-background/' target='_blank'>CSS BackGround</a> plugin</noscript>";
	echo "\n<!-- End of CSS BackGround Snippets -->\n";
}

add_action('get_footer', 'css_background');
add_action('admin_menu', 'cb_menu');

?>