<?php
/*
Plugin Name: Add a Separator
Plugin URI: http://www.tobias-battenberg.de/add-a-separator-wordpress-plugin/
Description: Adds a separator between the intro and extended text of the postcontent - simply change the $separator variable in the plugins php file. 
Version: 1.0
Author: Tobias Battenberg
Author URI: http://www.tobias-battenberg.de

$Revision$

Copyright (C) 2009 Tobias Battenberg

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License,
available at http://www.gnu.org/copyleft/gpl.html

Inspired by the nice Plugin "less.php" by Bennett McElwee

*/

add_filter('the_content', 'add_a_separator');

function add_a_separator($content) {

		$separator = "<div style='border-bottom:1px dotted #999999;margin-bottom:10px;'></div>";
	
		// CHANGE THE SEPARATOR HERE! 
		// Examples: 
		// $separator = "<br>";
		// $separator = "<hr>";
		// $separator = "<div style='border-bottom:1px dotted #999999;margin-bottom:10px;'></div>";
		// $separator = "<br><center>- - -</center><br>";
		// $separator = "<br><center><img src='http://yourpage.com/directory/separator.gif'></center><br>";
		// and so on...

	global $id;
	return str_replace('<span id="more-'.$id.'"></span>', ''.$separator.'', $content);
}

?>


