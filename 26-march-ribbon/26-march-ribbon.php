<?php
/*
Plugin Name: 26 March Ribbon
Description: When activated, this plugin will put a  ribbon on the top right corner of your website. 
Author: Bub Rupam JCB 
Version: 2.0
License: GPLv2
Author URI: http://boxtwobox.com
*/


function render_26_march_ribbon() {
	$ribbon_url = plugins_url( '26-march-ribbon.png', __FILE__ );
	echo "<a target='_blank' class='26-march-ribbon' href='http://en.wikipedia.org/wiki/Bangladeshi_Independence_Day'>
	<img src='{$ribbon_url}' alt='26 march liberation day of Bangladesh' style='position: fixed; top: 0; right: 0; z-index: 100000; cursor: pointer;' /></a>";
}
add_action( 'wp_footer', 'render_26_march_ribbon' );
