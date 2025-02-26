<?php
/*
Plugin Name: AI Disable Comments
Plugin URI: http://coffebreak.info
Author: Andon Ivanov
Author URI: http://coffebreak.info
Description: A quick way to disable or delete all approved, pending or spam comments and pings only with one click.
Version: 0.1
*/

function aidc_init() {
	if(is_admin()){
		require_once('libs/functions.php');
		add_action('admin_menu', 'aidc_link_menu');
	}
}

aidc_init();
?>