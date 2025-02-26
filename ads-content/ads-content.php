<?php

/*
  Plugin Name: Ads Content
  Plugin URI: http://www.devtech.cz/
  Description: Help users to put advertisment content as a widget also head tail of page or head and tail of post.
  Version: 1.0.9
  License: GNU v3 \
  This program comes with ABSOLUTELY NO WARRANTY. \
  This is free software, and you are welcome to redistribute it \
  under certain conditions; type `show c' for details. \
  Author: Copyright (C) <2012> Juraj Puchký
  Author URI: http://www.devtech.cz/

 */

if (!isset($ADSCONTENT_locale))
    $ADSCONTENT_locale = '';

// Pre-2.6 compatibility
if (!defined('WP_CONTENT_URL'))
    define('WP_CONTENT_URL', get_option('siteurl') . '/wp-content');
if (!defined('WP_PLUGIN_URL'))
    define('WP_PLUGIN_URL', WP_CONTENT_URL . '/plugins');

$ADSCONTENT_plugin_basename = plugin_basename(dirname(__FILE__));


if (basename(dirname(__FILE__)) == "mu-plugins") {
    $ADSCONTENT_plugin_url_path = WPMU_PLUGIN_URL . '/ads-content';
    $ADSCONTENT_plugin_dir = WPMU_PLUGIN_DIR . '/ads-content';
} else {
    $ADSCONTENT_plugin_url_path = WP_PLUGIN_URL . '/' . $ADSCONTENT_plugin_basename;
    $ADSCONTENT_plugin_dir = WP_PLUGIN_DIR . '/' . $ADSCONTENT_plugin_basename;
}


load_plugin_textdomain('ads-content', false, $ADSCONTENT_plugin_basename . '/languages');

// Fix SSL
if (is_ssl())
    $ADSCONTENT_plugin_url_path = str_replace('http:', 'https:', $ADSCONTENT_plugin_url_path);


global $ADSCONTENT_page, $ADSCONTENT_post;

$ADSCONTENT_page = get_option("ADSCONTENT_page");
$ADSCONTENT_post = get_option("ADSCONTENT_post");

function ADSCONTENT_post() {
    global $ADSCONTENT_plugin_dir;

    require_once($ADSCONTENT_plugin_dir . '/include/admin-ui/post-head-tail.php');
}

function ADSCONTENT_page() {
    global $ADSCONTENT_plugin_dir;

    require_once($ADSCONTENT_plugin_dir . '/include/admin-ui/page-head-tail.php');
}

function ADSCONTENT_dashboard() {
    global $ADSCONTENT_plugin_dir;

    require_once($ADSCONTENT_plugin_dir . '/include/admin-ui/dashboard.php');
}

function ADSCONTENT_create_menu() {
    global $ADSCONTENT_plugin_url_path;

    add_menu_page(
            __('Ads Content', "ads-content"), __('Ads Content', "ads-content"), 'manage_options', 'ADSCONTENT_dashboard', 'ADSCONTENT_dashboard', $ADSCONTENT_plugin_url_path . '/images/ads-content.png');

    add_submenu_page(
            'ADSCONTENT_dashboard', __("Post", "ads-content"), __("Post", "ads-content"), 'manage_options', 'ADSCONTENT_post', 'ADSCONTENT_post'
    );

    add_submenu_page(
            'ADSCONTENT_dashboard', __("Page", "ads-content"), __("Page", "ads-content"), 'manage_options', 'ADSCONTENT_page', 'ADSCONTENT_page'
    );

    global $submenu;
    if (isset($submenu['ADSCONTENT_dashboard']))
        $submenu['ADSCONTENT_dashboard'][0][0] = __('Dashboard', 'ads-content');
}

function ADSCONTENT_widget_init() {
    global $ADSCONTENT_plugin_dir;

    include_once($ADSCONTENT_plugin_dir . '/include/ads-contentWidget.php');
    register_widget('AdsContent_Widget');
}

function ADSCONTENT_head_tail_post_filter($content) {
    global $ADSCONTENT_post;

    if ($ADSCONTENT_post["enableHead"]) {
        $content = ($ADSCONTENT_post["headCenter"] ? "<div id='ads-post-head' style='text-align:center'>" : "") . stripslashes($ADSCONTENT_post["head"]) . ($ADSCONTENT_post["headCenter"] ? "</div>" : "") . "\n<br>\n" . $content;
    }

    if ($ADSCONTENT_post["enableTail"]) {
        $content .= "\n<br>\n" . ($ADSCONTENT_post["tailCenter"] ? "<div id='ads-post-tail' style='text-align:center'>" : "") . stripslashes($ADSCONTENT_post["tail"]) . ($ADSCONTENT_post["tailCenter"] ? "</div>" : "");
    }

    return $content;
}

function ADSCONTENT_tail_page_action() {
    global $ADSCONTENT_page;
    if ($ADSCONTENT_page["enableTail"]) {
        echo ($ADSCONTENT_page["tailCenter"] ? "<div id='ads-page-head' style='text-align:center'>" : "") . stripslashes($ADSCONTENT_page["tail"]) . ($ADSCONTENT_page["tailCenter"] ? "</div>" : "");
    }
}

function ADSCONTENT_head_page_action() {
    global $ADSCONTENT_page;
    if ($ADSCONTENT_page["enableHead"]) {
        echo ($ADSCONTENT_page["headCenter"] ? "<div id='ads-page-tail' style='text-align:center'>" : "") . stripslashes($ADSCONTENT_page["head"]) . ($ADSCONTENT_page["headCenter"] ? "</div>" : "");
    }
}

function ADSCONTENT_init() {

    // Post content filter
    add_filter('the_content', 'ADSCONTENT_head_tail_post_filter');

    // Page content action
    add_action('wp_footer', 'ADSCONTENT_tail_page_action');
    add_action('wp_head', 'ADSCONTENT_head_page_action');

    // create custom plugin settings menu
    add_action('admin_menu', 'ADSCONTENT_create_menu');
}

add_action('init', 'ADSCONTENT_init');

// Register widgets    
add_action('widgets_init', 'ADSCONTENT_widget_init');
?>