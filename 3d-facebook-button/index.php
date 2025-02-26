<?php
/*
Plugin Name: 3D Facebook Button
Plugin URI: http://liljosh.com/3d-facebook-button
Description: Adds a 3D Facebook Button inside your post. Just add [FACEBOOKBUTTON]http://liljosh.com[/FACEBOOKBUTTON] inside your post.
Version: 1.0
Author: Lil Josh
Author URI: http://liljosh.com/
Min WP Version: 2.5.0
Max WP Version: 3.4.1
*/

add_shortcode('FACEBOOKBUTTON', 'facebookbutton_func');

function facebookbutton_func($Attributes, $Content = null)
{
	
	$ReturnValue = '<iframe src="http://liljosh.com/facebook.php?url='.do_shortcode($Content).'" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:150px; height:85px; margin-bottom:-40px; margin-left:-15px; margin-right:-20px;" allowTransparency="true"></iframe>';
	
	return $ReturnValue;
}

?>