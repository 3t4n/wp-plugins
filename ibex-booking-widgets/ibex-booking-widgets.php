<?php
/*
Plugin Name: iBex Widgets
Plugin URI: http://ibexplus.com/cms-plugins/wordpress/
Description: Add/manage iBex widgets (ibexplus.com) to your WordPress website.
Version: 1.0.5
Author: Seekom
Author URI: http://web.seekom.com
License: GPL2
*/
/*  Copyright 2012  Seekom Limited  (email : support@seekom.com)

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

define('IBEX_BW_PLUGIN_URL', plugins_url('ibex-booking-widgets' , dirname(__FILE__)));
define('IBEX_BW_PLUGIN_DIR', dirname(__FILE__));

require IBEX_BW_PLUGIN_DIR . '/manager.php';

// Handle Activation/Deactivation first
register_activation_hook(__FILE__, array('iBex_Manager', 'ibwActivationHook'));
register_deactivation_hook(__FILE__, array('iBex_Manager', 'ibwDeactivationHook'));

// Run the plugin
$manager = iBex_Manager::getInstance();
$manager->execute();