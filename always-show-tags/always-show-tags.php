<?php
/*
Plugin Name: Always Show Tags
Plugin URI: https://github.com/Vusys/Always-Show-Tags
Description: A really simple plugin to click the 'Choose from the most used tags' link for you.
Version: 0.3
Author: Bryan Channon
Author URI: http://vuii.co.uk
*/

add_action('admin_enqueue_scripts', function(){

	wp_enqueue_script(
		'fix',
		plugins_url( '/fix.js', __FILE__ ),
		['jquery'],
		false,
		true
	);

}, 99);