<?php

/*
Plugin Name: Add to Head
Plugin URI: http://samuelhcohen.com/addtohead
Description: Adds any content (CSS, Javascript, meta, etc...) to the head section of every page of your WordPress site. You control the content by editing a text file, "headContent.php", located at the root level of this plugin's directory. The easiest way to edit the contents of that file is to go to the Editor in the Plugins menu, select the "Add to Head" plugin, and then click to edit the "headContent.php" file. Yep. That should do it.
Version: 1
Author: Samuel H. Cohen
Author URI: http://samuelhcohen.com
License: GPL2 (sure, why not?)
*/

function addToHead() {
	include('headContent.php');
}

add_action('wp_head','addToHead');

?>
