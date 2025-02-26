<?php
/*
Plugin Name: Email Post Activation
Plugin URI: http://www.paulmc.org/whatithink/wordpress/plugins/email-post-activation/
Description: Adds an iframe to your site to automatically activate any email posts in the queue
Version: 1.0
Author: Paul McCarthy
Author URI: http://www.paulmc.org/whatithink
*/

/*  Copyright 2009  Paul McCarthy  (email : paul@paulmc.org)

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

//function to add wordpress actions when the plugin is loaded
function pmcEmailPostActivation_init() {
	add_action('wp_footer', 'pmcWriteIFrame');
}

//function to write the activation iframe to the footer
function pmcWriteIFrame() {
	
	//create a link to wp-mail.php using the WP get_bloginfo function
	echo '<iframe src="' . get_bloginfo('wpurl') . '/wp-mail.php" name="mailiframe" width="0" height="0" frameborder="0" scrolling="no" title=""></iframe>';

}



//when the plugin is loaded, we run the init function
add_action("plugins_loaded", "pmcEmailPostActivation_init"); 
?>