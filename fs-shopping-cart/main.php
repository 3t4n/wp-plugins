<?php
/*

Plugin Name: FireStorm Professional E-Commerce Plugin
Plugin URI: http://www.firestormplugins.com/plugins/ecommerce/
Description: This is a WordPress e-commerce plugin created by Wes Fernley @ FireStorm Interactive Inc..
Author: FireStorm Plugins
Version: 2.07.02
Author URI: http://www.firestormplugins.com/

Copyright (C) 2013 FireStorm Interactive Inc., www.firestorminteractive.com, info@firestorminteractive.com

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.

*/

session_start();
ini_set("memory_limit","80M");
set_time_limit(999);
remove_action('wp_head', 'rel_canonical');
require_once(ABSPATH.'/wp-includes/pluggable.php');

// ASSIGN VERSION
global $fssc_version,$wpdb,$user_ID;
$fssc_version = "2.07.02";

require_once("fssc_install.php");
require_once("common_functions.php");
require_once("extensions.php");

// ADMIN PAGES
require_once("includes/admin_categories.php");
require_once("includes/admin_brands.php");
require_once("includes/admin_users.php");
require_once("includes/admin_products.php");
require_once("includes/admin_orders.php");
require_once("includes/admin_config.php");
require_once("includes/admin_home.php");
require_once("includes/admin_taxes.php");
require_once("includes/admin_distributors.php");

// WIDGETS
require_once("widget_brands.php");
require_once("widget_categories.php");
require_once("widget_prodsearch.php");
require_once("widget_viewcart.php");

add_action('generate_rewrite_rules', 'fssc_add_rewrite_rules');


// INSTALL / UPGRADE
register_activation_hook(__FILE__,'fssc_install');

require_once("define.php");
require_once("hooks.php");
require_once("filters.php");

?>
