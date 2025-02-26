<?php
/**
 * @package Self_Important
 * @version 1.0
 */
/*
Plugin Name: Self Important
Plugin URI: http://seoserpent.com/self-important
Description: This is not just a plugin, it symbolizes the hope and enthusiasm of all WordPress programmers, developers and designers everywhere. When activated you will become one of the three most important people in WordPress.
Author: Marty Martin
Version: 0.1
Author URI: http://seoserpent.com/
Credits: Fork of Matt Mullenweg's famous "Hello Dolly" plug-in.  Thanks @photomatt!
*/

//function hello_dolly_get_lyric() {
function self_important_proclamation() {
	$proclamation = "Congratulations! You are now one of the three most important people in WordPress!";
	return wptexturize( $proclamation );
}

// This just echoes the chosen line, we'll position it later
function proclamation() {
	$chosen = self_important_proclamation();
	echo "<p id='proclamation'>$chosen</p>";
}

// Now we set that function up to execute when the admin_footer action is called
add_action('admin_footer', 'proclamation');

// We need some CSS to position the paragraph
function proclamation_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = ( is_rtl() ) ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#proclamation {
		position: absolute;
		top: 4.5em;
		margin: 0;
		padding: 0;
		$x: 215px;
		font-size: 11px;
	}
	</style>
	";
}

add_action('admin_head', 'proclamation_css');

?>
