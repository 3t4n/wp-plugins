<?php

/**
 * Plugin Name: ADL Pricing Table
 * Plugin URI: https://adlplugins.com/adl-pricing-table
 * Description: A very beautiful and responsive pricing table plugin to display different offers to your users. Just install and create a table very easily and copy the generated shortcode anywhere in your pages or posts and you will get a very nice pricing table. If you need help, Please visit <a href="https://adlplugins.com/support/">support</a>. This free version is although awesome and does not contain any ad, still you can check out the <a href='https://adlplugins.com/adl-pricing-table-pro'>PRO version</a> for more useful features.
 * Version: 1.4
 * Author: ADL Plugins
 * Author URI: https://adlplugins.com
 * Text Domain: adl-pricing-table
 * Domain Path: /languages/
 * License: GPL2 or later
 */

/*
This software is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This software is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this software; if not, see https://www.gnu.org/licenses/gpl-2.0.html.

Copyright  2016 ADL Plugins.
*/

/**
 * Deny direct access
 */
if (!defined('APT_ALERT_MSG')) define( 'APT_ALERT_MSG', __( 'You should not access this file directly.!', 'adl-pricing-table' ) );
if ( !defined('ABSPATH') ) die( APT_ALERT_MSG );
if ( !defined('PT_BASE') ) { define('PT_BASE', plugin_basename( __FILE__ )); }

// Load plugin config
require_once 'config.php';
require_once 'helper.php';
// main plugin class
require_once 'Main.php';



$adl_pricing_table = new PricingTableADL();


