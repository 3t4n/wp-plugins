<?php
/*
Plugin Name: DealAds
Plugin URI:  https://wordpress.org/plugins/dealads/
Description: Advertise Amazon's Deals of the Day as an affiliate
Version:     1.0
Author:      DealAds developer(s)
License:     GPLv3
Domain Path: /languages
Text Domain: wpda

	DealAds - Advertise Amazon's Deals of the Day as an affiliate
	Copyright (C) 2016  DealAds developer(s)

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

defined('ABSPATH') or die('Incorrect call.');

define('WPDA_DIR', dirname(__FILE__));
define('WPDA_URI', plugins_url('dealads'));
define('WPDA_FILE', basename(__FILE__));
define('WPDA_DIRFILE', plugin_basename(WPDA_DIR).'/'.WPDA_FILE);

define('WPDA_SLUG', 'dealads');
define('WPDA_NAME', 'DealAds');
define('WPDA_URL', '#');

define('WPDA_VER', 1.0);

function wpda_debug($msg) {
	/* Uncomment for Debugging
	file_put_contents(WPDA_DIR.'/wpda.log', '['.date('Y-m-d H:i:s').'] '.$msg."\n", FILE_APPEND); */
}

require_once(WPDA_DIR.'/includes/functions.php');
require_once(WPDA_DIR.'/includes/widget.php');
require_once(WPDA_DIR.'/includes/class.amazon.php');

if (is_admin()) {
	require_once(WPDA_DIR.'/admin/settings.php');
	add_action('admin_enqueue_scripts', 'wpda_enqueue');
}

function wpda_languages() {
    load_plugin_textdomain('wpda', false, 'dealads/languages/');
}
add_action('plugins_loaded', 'wpda_languages');

function wpda_activation() {
	update_option('wpda_region', __('us', 'wpda'));
	update_option('wpda_legal', __('<b>Ad</b> | <i>FREE Shipping on orders over $49</i>', 'wpda'));
	update_option('wpda_window', 'blank');
}

function wpda_uninstall() {
	delete_option('wpda_region');
	delete_option('wpda_legal');
	delete_option('wpda_window');

	$ts = wp_next_scheduled('wpda_cron_hook');
	wp_unschedule_event($ts, 'wpda_cron_hook');
}
register_activation_hook(__FILE__, 'wpda_activation');
register_uninstall_hook (__FILE__, 'wpda_uninstall');

function wpda_enqueue() {
	wp_enqueue_style('wpda_style_default', WPDA_URI.'/css/default.css', false);
	wp_enqueue_script('wpda_js_default', WPDA_URI.'/js/default.js', false);
}
add_action('wp_enqueue_scripts', 'wpda_enqueue');

add_action('wpda_cron_hook', 'wpda_cron_exec');
add_filter('cron_schedules', 'wpda_update');

function wpda_update($schedules) {
	$schedules['wpda_update'] = array(
		'interval' => 1800,
		'display'  => __('DealAds cron (fetch new deals every 30 minutes)', 'wpda'),
	);
	return $schedules;
}

if(!wp_next_scheduled('wpda_cron_hook')) {
	wp_schedule_event(time(), 'wpda_update', 'wpda_cron_hook');
}

function wpda_cron_exec() {
	$region = get_option('wpda_region');

	try {
		$amz = new wpdaAmazon($region);
		$amz->update();
		update_option('wpda_updated', time());
	} catch (Exception $e) {
		$err = '['.date('Y-m-d H:i:s').'] Exception: '.$e->getMessage().' ('.$e->getCode().') in '.$e->getFile().' on '.$e->getLine()."\n";
		wpda_debug($err);
	}
}

?>
