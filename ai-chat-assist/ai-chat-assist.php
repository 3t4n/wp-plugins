<?php
/**
 * Plugin Name: AI Chat Assist
 * Plugin URI: https://aichatassist.com/
 * Description: Integrate an API key for a seamless AI chatbot experience.
 * Version: 1.0.0
 * Stable tag: 1.0.0
 * Author: Open Infotech
 * Requires at least: 5.0
 * Tested up to: 6.7
 * Requires PHP: 7.4
 * Stable tag: 1.0.0
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Website link: https://aichatassist.com/
 */

// Prevent direct access to the file
if (!defined('ABSPATH')) {
    exit;
}

// api url for validating the chat assist api key
define('ACACHAT_CHAT_ASSIST_API_URL' ,'https://api.aichatassist.com/webbot/init/');

// plugin dir path
define( 'ACACHAT_CHAT_ASSIST_DIR_PATH' , plugin_dir_path(__FILE__) );

// chat assist site url
define( 'ACACHAT_CHAT_ASSIST_SITE_URL' , 'https://aichatassist.com' );

// Include the main class file
include_once ACACHAT_CHAT_ASSIST_DIR_PATH . 'includes/class-ai-chat-assist.php';

if (!function_exists('acachat_add_settings_link')) {
    /**
     * Add settings link to the plugin's action links
     *
     * @param array $links The current list of links
     * @return array The updated list of links
     */
    function acachat_add_settings_link($links) {
        $settings_link = '<a href="' . esc_url(admin_url('admin.php?page=chatassist-settings')) . '">' . esc_html__('Settings', 'ai-chat-assist') . '</a>';
        array_unshift($links, $settings_link);
        return $links;
    }

    // Add settings link to plugin action links
    add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'acachat_add_settings_link');
}