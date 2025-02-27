<?php

/*
Plugin Name: Dark Visitors
Description: Get realtime analytics on the AI agents, crawlers, scrapers, and other bots visiting your website. Generate a robots.txt to opt out of AI training.
Version: 1.18.0
Author URI: https://darkvisitors.com/
Author: Dark Visitors
Requires at least: 5.0
Tested up to: 6.7
Requires PHP: 7.0
Stable tag: 1.18.0
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl.html
*/

if (!defined('ABSPATH')) {
    exit;
}

define('DARK_VISITORS_PLUGIN_FILE', __FILE__);

require_once plugin_dir_path(__FILE__) . 'includes/constants.php';
require_once plugin_dir_path(__FILE__) . 'includes/cron.php';
require_once plugin_dir_path(__FILE__) . 'includes/variables.php';
require_once plugin_dir_path(__FILE__) . 'includes/settings.php';
require_once plugin_dir_path(__FILE__) . 'includes/robots-txt.php';
require_once plugin_dir_path(__FILE__) . 'includes/analytics.php';