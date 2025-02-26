<?php
/*
Plugin Name: Kony 2012 Ribbon
Plugin URI: http://www.visualmoxie.com/kony2012
Description: This plugin ads a Kony 2012 banner to the top right corner of your website.
Author: Tom McGuire
Version: 2.012
License: GPLv2
Author URI: http://www.visualmoxie.com
*/

function kony_ribbon() {
	$banner_url = plugins_url( 'kony2012-ribbon.png', __FILE__ );
	echo "<a href='http://www.kony2012.com' class='kony2012' target='_blank'><img src='{$banner_url}' alt='Catch Joseph Kony' width='120' height='120' title='Catch Joseph Kony' style='cursor:pointer; position: fixed; top: 0; right: 0; z-index: 999;' /></a>";
	}
add_action( 'wp_footer', 'kony_ribbon' );