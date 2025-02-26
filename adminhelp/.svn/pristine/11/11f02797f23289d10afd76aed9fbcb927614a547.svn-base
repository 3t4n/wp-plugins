<?php
/*
Plugin Name: Admin Help Menu
Plugin URI: http://consulting.dynamisart.com
Description: Admin help menu creates an admin help menu where you can post html to provide help for your clients.
Version: 1.0
Author: Sean Ham, Dynamis Consulting
Author URI: http://consulting.dynamisart.com
Disclaimer: Use at your own risk. No warranty expressed or implied is provided.
*/

/*	Copyright 2008-2010  Dynamis  (email : sean@dynamisart.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/
$ahelpmenu_options = get_option('ahelpmenu');

add_action('admin_menu', 'ahelpmenu_admin_menu');
function ahelpmenu_admin_menu()
{
    add_options_page('Help Menu Settings', 'Help Menu Settings', 'manage_options', 'adminhelp/options.php');
}



$ahelpmenuuser_options = get_option('ahelpmenuuser');

add_action('admin_menu', 'ahelpmenuuser_admin_menu');
function ahelpmenuuser_admin_menu()
{
    add_menu_page('User Help', 'User Help','level_7', 'adminhelp/userhelp.php' );

}



?>
