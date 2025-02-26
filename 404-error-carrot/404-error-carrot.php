<?php
/*
Plugin Name: 404 error - carrot
Plugin URI: http://404-carrot.org
Description: Custom <strong>404 error carrot</strong> page is an Internet <strong>art project</strong>. It puts an image of bunch carrots on your 404 error page which is only seen when someone reaches nonexistent page anyway. The goal of this project is light weight advertisement for vegetables ;), more about this project on <a href="http://404-carrot.org">http://404-carrot.org</a>.<br /> Even though the plug-in is easily installable you have to touch your template folder as well.<br />
Version: 0.9
Author: 2046
Author URI: http://o----o.info

  Copyright 2009 - "404 error - carrot" by 2046 

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
// define the picture size
define("SIZE", '1'); // 1 - 584px × 360px, 2 - 250×150px, 3 - 200×63px, 4 - 100×42px / default = 1
/* --- */
// Pre-2.6 compatibility for wp-content folder location
if (!defined("WP_CONTENT_URL")) {
	define("WP_CONTENT_URL", get_option("siteurl") . "/wp-content");
}
if (!defined("WP_CONTENT_DIR")) {
	define("WP_CONTENT_DIR", ABSPATH . "wp-content");
}

function funct_404_error_carrot(){
	if (SIZE == 1){
		$pict = "404-carrot-584x360.jpg";
	}
	elseif(SIZE == 2){
		$pict = "404-carrot-250x150.jpg";
	}
	elseif(SIZE == 3){
		$pict = "404-carrot-200x63.jpg";
	}
	elseif(SIZE == 4){
		$pict = "404-carrot-100x42.jpg";
	}
	echo '<div align="center">';
		echo '<p>';
			echo '<img src="'.WP_CONTENT_URL.'/plugins/404-error-carrot/'.$pict.'" alt="440 - carrot" />';
			echo '<br />';
			echo '<a href="http://404-carrot.org">more information about <strong>404 carrot project</strong></a></p>';
			echo '<p>You are on <a href="'.get_option('home').'">';
			echo bloginfo('name');
			echo ' domain.</a><br />';
			echo 'I\'m sorry, the page you are looking for something that doesn\'t exist, or is no longer available.<br />';
			echo 'Don\'t wary you can start over from the top of this domain <a href="'.get_option('home').'">here</a>';
		echo '</p>';
	echo '</div>';
}
?>

