<?php
/**
 * @package AnyChat
 */
/*
Plugin Name: AnyChat widget
Description: Display contact us button with menu on every page. Callback request, reCaptcha V3 protection and many customizations!
Version: 1.0.3
Author: AnyChat
Author URI: https://anychat.one/
License: GPLv2 or later
Text Domain: anychat
*/

// Make sure we don't expose any info if called directly
if (!function_exists('add_action')) {
    die("Hi there!  I'm just a plugin, not much I can do when called directly.");
}

define('ANYCHAT_MINIMUM_WP_VERSION', '3.7');
define('ANYCHAT_PLUGIN_FILE', __FILE__);
define('ANYCHAT_PLUGIN_NAME', 'anychat');
define('ANYCHAT_VERSION', '1.0.3');
define('ANYCHAT_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('ANYCHAT_PLUGIN_URL', plugin_dir_url(__FILE__));
define('ANYCHAT_PLUGIN_DIR_CLASSES', plugin_dir_path(__FILE__) . 'classes/');
define('ANYCHAT_PLUGIN_DIR_MODELS', plugin_dir_path(__FILE__) . 'models/');
define('ANYCHAT_PLUGIN_DIR_CONTROLLERS', plugin_dir_path(__FILE__) . 'controllers/');

require_once(realpath(ANYCHAT_PLUGIN_DIR_CLASSES . 'AnyChatLoader.php'));
require_once(realpath(ANYCHAT_PLUGIN_DIR . 'functions.php'));

AnyChatLoader::loadClass('AnyChat');
AnyChatLoader::loadClass('AnyChatTools');
$anyChat = new AnyChat();

register_activation_hook(__FILE__, array($anyChat, 'activate'));
register_deactivation_hook(__FILE__, array($anyChat, 'deactivate'));
register_uninstall_hook(__FILE__, 'AnyChatUninstall');

add_action('plugins_loaded', array($anyChat, 'init'));

if (is_admin() || (defined('WP_CLI') && WP_CLI)){
    AnyChatLoader::loadClass('AnyChatAdmin');
    $anyChatAdmin = new AnyChatAdmin();
    add_action('init', array($anyChatAdmin, 'init'));
}

function AnyChatUninstall()
{
    AnyChatLoader::loadModel('AnyChatConfigGeneral');
    $generalConfig = new AnyChatConfigGeneral('anychat_');
    $generalConfig->clearConfig();
    delete_option('anychat_installed');
}