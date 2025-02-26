<?php
/*
Plugin Name: AIO Cache - STANDARD
Plugin URI: http://wordpress.org/extend/plugins/aio-cache/
Description: AIO Cache is a Very Simple and Fast Cache & Performance Plugin.
Version: 2.5
Author: The AIO Cache Team
Author URI: http://www.adamsassets.com/
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ECVJZ2MJMJTB6&currency_code=USD
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/
/*  Copyright (C) 2013  Adam Zendarski  (email : copyright@adamsassets.com)

		Based on the GNU GPL-licensed works of:
		 Copyright 2005 Ricardo Galli Granada  (email : gallir@uib.es)
*/

add_action("admin_menu", "aio_add_main_pages");

function aio_add_main_pages() {
	$icon_url = plugins_url('resources/icon.gif', __FILE__);
	add_menu_page('AIO Cache', 'AIO Cache', 'administrator', 'aio-cache-menu', 'aio_cache_main', $icon_url);
	add_submenu_page('aio-cache-menu', 'PRO VERSION', 'PRO VERSION', 'administrator', 'aio-cache-go-pro', 'aio_cache_go_pro');
}

function aio_cache_main() {
	echo '<div class="wrap">';
	echo '<div id="icon-options-general" class="icon32"></div><h2>AIO Cache: Support Us</h2>';
	echo "<h1>THANK YOU for installing AIO Cache!</h1><br />\n";
	echo "<h1>DONORS OF $5 USD or more will receive the PROFESSIONAL EDITION of this plugin.</h1><br /><h2>To see what you get with the PROFESSIONAL EDITION, go to the \"AIO Cache\" menu, then to \"PRO VERSION\".</h2><br /><form action=\"https://www.paypal.com/cgi-bin/webscr\" method=\"post\"><input type=\"hidden\" name=\"cmd\" value=\"_s-xclick\"><input type=\"hidden\" name=\"hosted_button_id\" value=\"ECVJZ2MJMJTB6\"><input type=\"hidden\" name=\"currency_code\" value=\"USD\"><input type=\"image\" src=\"http://www.adamsassets.com/paypal-donate.jpg\" border=\"0\" name=\"submit\" alt=\"PayPal - The safer, easier way to pay online!\"><img alt=\"\" border=\"0\" src=\"https://www.paypalobjects.com/en_US/i/scr/pixel.gif\" width=\"1\" height=\"1\"></form>\n";
	echo "<div><br /><br /><br /><h1>Please post the following information to the Wordpress.org AIO Cache Support Forum:</h1><br /><h2>&emsp;&emsp;>&emsp; Please report issues with other scripts as well as bugs.</h2><h2>&emsp;&emsp;>&emsp; Please report compatibility with alternative web servers such as IIS, Nginx, and others.</h2><h2>&emsp;&emsp;>&emsp; Please request new features for upcoming releases.</h2><h2>&emsp;&emsp;>&emsp; Instead of rating this plugin badly, please give us some insight as to how we can make this plugin suit your performance needs in a better way.</h2></div>\n";
	echo "</div>\n";
}

function aio_cache_go_pro() {
	echo '<div class="wrap">';
	echo '<div id="icon-options-general" class="icon32"></div><h2>AIO Cache: PROFESSIONAL Edition</h2>';
	echo "<h1>DONORS OF $5 USD or more will receive the PROFESSIONAL EDITION of this plugin.</h1><br /><h1>Professional Edition Features</h1><h2>&emsp;&emsp;>&emsp;Donation Link Removal.</h2><h2>&emsp;&emsp;>&emsp;Alternative Caching Method Which Enables Content to Always Stay Fresh</h2><h2>&emsp;&emsp;>&emsp;Top Ranking Google PageSpeed Insights and YSlow Reports (Great for SEO)</h2><h2>&emsp;&emsp;>&emsp;Up to 5x Speed Increase</h2><h2>&emsp;&emsp;>&emsp;HTML, CSS and JavaScript Optimization and Minification Into Two Static Files</h2><h2>&emsp;&emsp;>&emsp;Better Admin Panel</h2><h2>&emsp;&emsp;>&emsp;DIRECT AND DEDICATED SUPPORT</h2><br /><h1>ONLY for donors of $5 USD or more.</h1><br /><form action=\"https://www.paypal.com/cgi-bin/webscr\" method=\"post\"><input type=\"hidden\" name=\"cmd\" value=\"_s-xclick\"><input type=\"hidden\" name=\"hosted_button_id\" value=\"ECVJZ2MJMJTB6\"><input type=\"hidden\" name=\"currency_code\" value=\"USD\"><input type=\"image\" src=\"http://www.adamsassets.com/paypal-donate.jpg\" border=\"0\" name=\"submit\" alt=\"PayPal - The safer, easier way to pay online!\"><img alt=\"\" border=\"0\" src=\"https://www.paypalobjects.com/en_US/i/scr/pixel.gif\" width=\"1\" height=\"1\"></form><br /><br />Should you need to contact us about the PRO version, please click the following link: <a href=\"http://www.adamsassets.com/contact/\">Click Here to Contact Us</a>\n";
	echo "</div>\n";
}

function aio_cache_make_resources_static( $src ){
	$parts = explode( '?', $src );
	return $parts[0];
}
add_filter( 'script_loader_src', 'aio_cache_make_resources_static', 15, 1 );
add_filter( 'style_loader_src', 'aio_cache_make_resources_static', 15, 1 );

require('resources/cachehead/aio-cachehead.php');
require('resources/compression/aio-compression.php');
require('resources/footscripts/aio-footscripts.php');
?>
