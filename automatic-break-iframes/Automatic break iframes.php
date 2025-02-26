<?php
/*
Plugin Name: Automatic break iframes
Plugin URI: http://alirezanejati.ir/
Description: Automatic break iframes ban the iranian spam rss reader sites.
Author: Alireza Nejati
Version: 1.1
Tags: frame, framebreak, iframes, break iframes, iframecatcher, wordpress
Author URI: http://alirezanejati.ir/
License: GPL
*/

if(!function_exists('break_iframes')) {
	
	function break_iframes() {
		$var_sScript .= '<script type="text/javascript">' . "\n" . 'if (self != top) {' . "\n\t" . 'top.location.replace(self.location.href);' . "\n" . '}' . "\n" . '</script>' . "\n";
		$var_sScript = apply_filters('break_iframes', $var_sScript);
		echo $var_sScript;
		echo "\n<!--";
		echo "\nif (parent.frames.length > 0) { parent.location.href = location.href; }";
		echo "\n-->";
		return;
	}
}
add_action('wp_head', 'break_iframes');
/** Start */
add_action( 'admin_menu', 'break_iframes_menu' );
function break_iframes_menu() {
	add_options_page( 'break iframes Options', 'break iframes', 'manage_options', 'my-unique-identifier', 'break_iframes_options' );
}
function break_iframes_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	echo '<div class="wrap">';
	echo '<p>Upgrading ...</p>';
	echo '</div>';
}
?>