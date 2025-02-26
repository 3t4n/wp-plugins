<?php
/*
Plugin Name: Rally Foundation Ribbon
Plugin URI: http://scottkappler.com/wp-plugins-and-more
Description: When activated, this plugin will put a Rally Foundation ribbon on the top right corner of your website that links to http://rallyfoundation.org.
Author: Scott Kappler
Version: 1.0
License: GPLv2
Author URI: http://scottkappler.com/wp-plugins-and-more
*/

function render_rally_ribbon() {
	$ribbon_url = plugins_url( 'rally-ribbon.png', __FILE__ );
	echo "<a target='_blank' class='rally_ribbon' href='http://rallyfoundation.org/'><img src='{$ribbon_url}' alt='Rally Foundation' style='position: fixed; top: 0; right: 0; z-index: 100000; cursor: pointer;' /></a>";
}
add_action( 'wp_footer', 'render_rally_ribbon' );