<?php
/**
* Plugin Name: Hide update popup
* Plugin URI: https://keksus.com/wordpress-hide-update-popup.html
* Description: This plugin hide update popup text into administration part of WordPress 
* Version: 1.0.1
* Author: Keksus
* Author URI: http://keksus.com
* License: GNU General Public License version 2.0
*/
add_action('admin_head', 'hide_update_popup');

function hide_update_popup() {
	echo '<style>
	#update-nag,
	.update-nag {
		display:none;
	} 
	</style>';
}