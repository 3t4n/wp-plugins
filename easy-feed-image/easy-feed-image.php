<?php
/*
Plugin Name: Easy Feed Image
Plugin URI: https://www.ademirdiniz.com.br
Description: Insert automatically image in your feed XML. Works with WooCommerce too.
Version: 1.0
Author: Ademir Diniz
Author URI: https://www.ademirdiniz.com.br/
Text Domain: FeedImage
*/

defined('ABSPATH') or exit;

setlocale(LC_ALL, get_locale());
date_default_timezone_set(get_option('timezone_string'));

define('ADEFI_DIR', plugin_dir_path(__FILE__));
define('ADEFI_PREFIX', 'ad_easy_feed_image');
define('ADEFI_VERSION', '1.0.0');
define('ADEFI_WP_REQUIRED_VERSION', '3');

// Call install
register_activation_hook(__FILE__, 'easyFeedImageInstall');
function easyFeedImageInstall()
{
	if (is_admin()) {
		require_once(ADEFI_DIR . '/install.php');
	}
}

// Call uninstall
register_uninstall_hook(__FILE__, 'easyFeedImageUninstall');
function easyFeedImageUninstall()
{
	if (is_admin()) {
		require_once(ADEFI_DIR . '/uninstall.php');
	}
}

// Custom feed
function easyFeedImageCustomFeed()
{
	global $post;

	$thumbnail_ID = get_post_thumbnail_id($post->ID);
	$thumbnail = wp_get_attachment_image_src($thumbnail_ID, 'thumbnail');
	$output = '<image>';
    $output .= '<url>'. $thumbnail[0] .'</url>';
    $output .= '<width>'. $thumbnail[1] .'</width>';
    $output .= '<height>'. $thumbnail[2] .'</height>';
	$output .= '</image>';
	
	echo $output;
}
add_filter('rss2_item', 'easyFeedImageCustomFeed');