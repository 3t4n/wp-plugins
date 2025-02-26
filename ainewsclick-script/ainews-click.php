<?php
/*
Plugin Name:  Ainews Click Script
Plugin URI:   https://b2b.ainews.kz/click
Description:  Плагин для подключения скрипта Ainews Click.
Version:      1.0
Author:       Aitu Dala
Author URI:   https://www.aitudala.kz
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  wordpress
Domain Path:  /wordpress
*/

include(dirname(__FILE__) . '/includes/settings.php');
include(dirname(__FILE__) . '/includes/head.php');
include(dirname(__FILE__) . '/includes/meta.php');

add_action('admin_init', 'ainews_click_settings_init');
add_action('wp_head', 'ainews_click_head_script_init');
add_action('wp_head', 'ainews_click_required_meta_init');
