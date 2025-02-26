<?php
/*
Plugin Name: Fix Category Count
Plugin URI: http://www.53mp.com/fix
Description: This plugin will allow you to easily repair and fix your category count for posts, pages and custom post types.
Version: 1.0
Author: Eric Lozaga
Author URI: http://53mp.com

Copyright (c) 2015 a 53 minute production

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.

*/ 

//////////////////////////////////////////////////////



require_once 'inc/fix_category_count_engine.php';


//admin menu
function fix_category_count_menu() {
	add_submenu_page('tools.php', 'Fix Category Count', '<span style="color:rgb(222,222,222)">Fix Category Count</span>', 'update_core', 'fix_category_count', 'fix_category_count_view');
}
add_action( 'admin_menu', 'fix_category_count_menu' );

function fix_category_count_view() {
	require_once 'inc/fix_category_count_admin_view.php';
}


function fix_category_count_link($links) { 
  $tools_link = '<a href="'.admin_url('tools.php?page=fix_category_count', 'admin').'" style="color:red">Fix Now</a>'; 
  array_unshift($links, $tools_link); 
  return $links; 
}
add_filter("plugin_action_links_".plugin_basename(__FILE__), 'fix_category_count_link' );   



function fix_category_nonce_message ($translation) {
	if ($translation == 'Are you sure you want to do this?'){
		return 'You do not have permission to do that.';
	}else{
		return $translation;
	}
}
add_filter('gettext', 'fix_category_nonce_message');
