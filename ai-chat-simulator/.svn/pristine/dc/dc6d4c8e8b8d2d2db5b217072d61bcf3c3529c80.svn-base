<?php
/*
Plugin Name: AI Chat Simulator
Description: AI Chat Simulator brings the power of OpenAI's ChatGPT directly to your website, allowing users to engage & explore with AI. Host interactive chat sessions, bypassing the need for external access to OpenAI's platform. 
Version: 1.0.0
Author: Baris Ozdogan
Requires PHP: 7.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Define plugin paths and URLs.
define('BOAI_CHAT_SIMULATOR_PATH', plugin_dir_path(__FILE__));
define('BOAI_CHAT_SIMULATOR_URL', plugin_dir_url(__FILE__));

// Autoload classes.
require_once BOAI_CHAT_SIMULATOR_PATH . 'includes/init.php';

function boai_initialize()
{
    $plugin = new BOAI_Chat_Simulator();
    $plugin->run();
}
boai_initialize();
