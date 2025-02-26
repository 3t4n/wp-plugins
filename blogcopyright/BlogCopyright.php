<?php
/*
Plugin Name: Blog Copyright - by BTE
Plugin URI: http://www.blogtrafficexchange.com/
Author: Blog Traffic Exchange
Author URI: http://www.blogtrafficexchange.com
Version: 2.0.0
Description: Simple plugin to inject copyright statement into blog footer.
License: GPLv2
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Copyright 2015 - 2016  Blog Traffic Exchange
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the 
GNU General Public License for more details.

You should have received a copy of the GNU General Public License 
along with this program; if not, see  {License URI}
*/

define("BTEBCPLUGINPATH", realpath(dirname(__FILE__) ));
define("BTEBCPLUGINURL", plugin_dir_url(__FILE__));
define("BTEBCICONURL",BTEBCPLUGINURL."images/icon.png");
define("BTEBCCSS",BTEBCPLUGINURL."css/blogcopyright.css");

define ("BTEBLK","");
define ("BTEARR","All Rights Reserved");

require_once(BTEBCPLUGINPATH."/inc/bte_bc_register_hook.php");
require_once(BTEBCPLUGINPATH."/inc/bte_bc_core.php");
require_once(BTEBCPLUGINPATH."/admin/bte_bc_admin.php");

register_activation_hook(__FILE__, 'bte_bc_activate');
register_deactivation_hook(__FILE__, 'bte_bc_deactivate');

add_action('wp_footer', 'bte_bc_footer');
add_action('admin_menu', 'bte_bc_options_setup');
add_action('admin_head', 'bte_bc_head_admin');
add_filter('plugin_action_links', 'bte_bc_action_links', 10, 2);

function bte_bc_action_links($links, $file) {
	$plugin_file = basename(__FILE__);
	if (basename($file) == $plugin_file) {
		$settings_link = '<a href="admin.php?page=blogcopyright">'.__('Configure', 'RelatedTweets').'</a>';
		array_unshift($links, $settings_link);
	}
	return $links;
}

function bte_bc_tag() {
	echo bte_bc_get_html();
} ?>
