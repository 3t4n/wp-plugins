<?php
/*
* Plugin Name: Very Simple PayPal Donation Form
* Description: Pick donation amount, defaults, and one-time vs repeating. Include on any page with the shortcode <code>[vsdf_donation_form]</code>
* Author: Aaron Hodge Silver
* Author URI: http://springthistle.com/
* Version: 1.3

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.

*/

// If this file is called directly, then abort execution.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Define global constants
if (!defined('VSDF_VERSION')) define('VSDF_VERSION', '1.2'); // set current version
if (!defined('VSDF_PLUGINDIR')) define('VSDF_PLUGINDIR', plugin_dir_url(__FILE__));
if (!defined('VSDF_PLUGINPATH')) define('VSDF_PLUGINPATH', plugin_dir_path(__FILE__));
if (!defined('VSDF_BASENAME')) define('VSDF_BASENAME', plugin_basename(__FILE__));

// Include required sub-files
require_once VSDF_PLUGINPATH.'lib/class.vsdf-main.php';
require_once VSDF_PLUGINPATH.'lib/class.vsdf-settings.php';

// Instantiate the classes
$vsdf = new VSDonationForm();
$vsds = new VSDonationFormSettings();
