<?php
/*
Plugin Name: All Settings
Plugin URI: http://sethlilly.com/
Description: Adds an All Settings submenu to the Settings menu, providing one-click access to /wp-admin/options.php.
Version: 1.0
Author: Seth Lilly
Author URI: http://sethlilly.com/
License: GPL2
*/

/*
Copyright 2011 Seth Lilly (email:seth@sethlilly.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

add_action('admin_menu', 'all_settings_menu');

function all_settings_menu() {
	add_submenu_page('options-general.php', 'All Settings', 'All Settings', 'administrator', 'options.php'); 
}

?>