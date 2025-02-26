<?php
/*
Plugin Name: Autism Speaks Ribbon
Plugin URI: http://scottkappler.com/wp-plugins-and-more
Description: When activated, this plugin will put a Autism Speaks ribbon on the top right corner of your website that links to http://autismspeaks.org.
Author: Scott Kappler
Version: 1.0
License: GPLv2
Author URI: http://scottkappler.com
*/

function render_autism_speaks_ribbon() {
	$ribbon_url = plugins_url( 'autism-speaks-ribbon.png', __FILE__ );
	echo "<a target='_blank' class='autism-speaks-ribbon' href='http://autismspeaks.org/'><img src='{$ribbon_url}' alt='Autism Speaks' style='position: fixed; top: 0; right: 0; z-index: 100000; cursor: pointer;' /></a>";
}
add_action( 'wp_footer', 'render_autism_speaks_ribbon' );