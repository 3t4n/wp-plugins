<?php
/**
 * Plugin Name:       SQL Chart Builder
 * Plugin URI:        http://guaven.com/updatepusher
 * Description:       Turn Your SQL Queries into Beautiful Dynamic Charts- Pie, Line, Area, Donut, Bar, Polar Charts with date/input filters.
 * Version:           2.3.7.2
 * Author:            Guaven Labs
 * Author URI:        http://guaven.com/
 * Text Domain:       guaven_sqlcharts
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define('GVNSQLCHARTS_VERSION','2.3.7.2');


require_once(dirname(__FILE__)."/functions.php");
