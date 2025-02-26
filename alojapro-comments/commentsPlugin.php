<?php
/**
* Plugin Name: Alojapro Comments
* Description: This plugin provides the discussion experience and features to your website.
* Version: 1.0.0
* Author: Alojapro
* Author URI: http://alojapro.com
* Requires at least: 5.8
* Tested up to: 6.1
*
* Text Domain: alojapro-comments
* Domain path: /languages/
*/

require_once __DIR__ . "/src/CommentsShortcode.php";
require_once __DIR__ . "/src/AdminComments.php";

if (is_admin()) {
    AACWP_Comments_Config_Page::instance();
}

AACWP_Comments_Shortcode::instance();

