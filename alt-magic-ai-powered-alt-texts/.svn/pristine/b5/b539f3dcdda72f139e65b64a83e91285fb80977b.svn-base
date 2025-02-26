<?php
/*
Plugin Name: Alt Magic: AI Powered Alt Texts
Plugin URI: https://altmagic.pro/
Description: Alt Magic Pro is an innovative WordPress plugin designed to automatically generate alt texts for images using advanced AI models. This plugin enhances accessibility and SEO optimization by ensuring that every image on your website has contextually relevant alt text.
Version: 0.2.4
Author: altmagic
License: GPL-2.0-or-later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

// Ensure this file is not accessed directly
if (!defined('ABSPATH')) {
    exit;
}


// Define a base URL for API calls
define('ALT_MAGIC_API_BASE_URL', 'https://alt-magic-api-eabaa2c8506a.herokuapp.com');
//define('ALT_MAGIC_API_BASE_URL', 'http://192.168.1.5:3000');

require_once plugin_dir_path( __FILE__ ) . '/admin-functions/altm-initialize-all-settings-values.php';
require_once plugin_dir_path( __FILE__ ) . '/admin-functions/altm-supported-languages.php';
require_once plugin_dir_path( __FILE__ ) . '/admin-functions/altm-plugin-activation-flow.php';   


require_once plugin_dir_path( __FILE__ ) . '/admin-settings-pages/altm-admin-menu-generator.php';
require_once plugin_dir_path( __FILE__ ) . '/admin-settings-pages/altm-account-settings-page.php';
require_once plugin_dir_path( __FILE__ ) . '/admin-settings-pages/altm-ai-settings-page.php';
require_once plugin_dir_path( __FILE__ ) . '/admin-settings-pages/altm-bulk-generation-page.php';
require_once plugin_dir_path( __FILE__ ) . '/admin-settings-pages/altm-help-page.php';


require_once plugin_dir_path( __FILE__ ) . '/common-functions/altm-alt-text-generator-ajax.php';
require_once plugin_dir_path( __FILE__ ) . '/common-functions/altm-alt-text-generator.php';
require_once plugin_dir_path( __FILE__ ) . '/common-functions/altm-attachment-add-handler.php';
require_once plugin_dir_path( __FILE__ ) . '/media-library-page-functions/altm-media-library-button.php';
require_once plugin_dir_path( __FILE__ ) . '/common-functions/altm-update-post-metadata.php';
require_once plugin_dir_path( __FILE__ ) . '/common-functions/altm-image-data-functions.php';
require_once plugin_dir_path( __FILE__ ) . '/common-functions/altm-bulk-image-alt-handler.php';
require_once plugin_dir_path( __FILE__ ) . '/common-functions/altm-loggers.php';

require_once plugin_dir_path( __FILE__ ) . '/integrations-functions/altm-fetch-yoast-keywords.php';








