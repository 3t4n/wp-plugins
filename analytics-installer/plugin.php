<?php
/*
Plugin Name: Analytics Installer
Plugin URI: http://mr.hokya.com/analytics-installer/
Description: Allow you to install and access full feature of Google Analytics inside your WP Admin Page. It is really simple but powerful
Version: 1.4
Author: Julian Widya Perdana
Author URI: http://mr.hokya.com/
*/

function analytics_page () {
	add_options_page('Analytics', 'Analytics Installer', 'manage_options','analytics-installer/options.php');
	add_dashboard_page('Analytics', 'My Analytics', 'manage_options','analytics-installer/dashboard.php');
	$link = get_option("home")."/wp-admin/options-general.php?page=analytics-installer/options.php";
	if (trim(get_option("analytics"))=="") echo "<div class='updated fade'>You haven't install Google Analytics code, please install it <a href='$link'>here</a></div>";
}

function analytics_code () {
	$code = get_option("analytics");
	echo $code;
}
add_action('wp_head','analytics_code');
add_action('admin_menu','analytics_page');

?>