<?php

/*
  Plugin Name: A+ Testimonial Builder
  Plugin URI: https://www.vocalreferences.com/
  Description: A simple and easy to use testimonial plugin for your website.  Manage, display and collect more testimonials with our easy to use testimonial and reviews plugin.
  Version: 1.0.0
  Author: VocalReferences
  Author URI: https://www.vocalreferences.com/about-us
  License: GPLv2 or later
  Requires at least: 5.0
  Requires PHP: 7.0
 */

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

    
// Define constants
define('ATBS_DIR', plugin_dir_path(__FILE__));
define('ATBS_URL', plugin_dir_url(__FILE__));

// Check if Composer autoloader exists.
if (!file_exists(ATBS_DIR . 'vendor/autoload.php')) {

    function atbs_plugin_autoload_notice()
    {
        echo '<div class="notice notice-error"><p><strong>A+ Testimonial Builder:</strong> The Composer autoloader is missing. Please run <code>composer install</code> inside the plugin folder.</p></div>';
    }

    add_action('admin_notices', 'atbs_plugin_autoload_notice');
    return;
}

// Load Composer autoloader.
require_once ATBS_DIR . 'vendor/autoload.php';

// Use the correct namespace
use DavidWenner\ATestimonialBuilder\ATBS_Hooks;
use DavidWenner\ATestimonialBuilder\ATBS_Main;

$hooks = new ATBS_Hooks();

// Register activation and deactivation hooks
register_activation_hook(__FILE__, [$hooks, 'atbs_activation_hook']);
register_deactivation_hook(__FILE__, [$hooks, 'atbs_deactivation_hook']);
register_uninstall_hook(__FILE__, [$hooks, 'atbs_deactivation_hook']);

// Initialize the plugin
new ATBS_Main();
