<?php
/*
Plugin Name: marble wordpress
Plugin URI: http://www.stonz.co.il
Description:marble your wordpress is a widget display in the admin area and constantly remind you the power of marble and stons.
Author: stonz
Version: 1.1
Author URI: http://www.stonz.co.il
*/

// this is your marble power
$lyrics = "Butterfly 
Butterfly Agate (the most valuable) 
Cats eye (the most common) 
Commies- marbles made of clay 
Ghost 
Peanut Butter and Jelly 
Purie - clear and different colored; truly prized! 
Shooters 
Steelies (all steel of course) 
limestone
";

// Here we split it into lines
$lyrics = explode("\n", $lyrics);
// And then randomly choose a line
$chosen = wptexturize( $lyrics[ mt_rand(0, count($lyrics) - 1) ] );

// This just echoes the chosen line, we'll position it later
function marble_power() {
	global $chosen;
	echo "<p id='power'>$chosen</p>";
}

// Now we set that function up to execute when the admin_footer action is called
add_action('admin_footer', 'marble_power');

// We need some CSS to position the paragraph
function power_css() {
	echo "
	<style type='text/css'>
	#power {
		position: absolute;
		top: 2.3em;
		margin: 0;
		padding: 0;
		right: 50px;
		font-size: 13px;
		color: #ffffff;
	}
	</style>
	";
}

add_action('admin_head', 'power_css');

?>