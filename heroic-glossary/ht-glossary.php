<?php
/*
*	Plugin Name: Heroic Glossary
*	Plugin URI:  https://herothemes.com/heroic-glossary
*	Description: Glossary plugin for WordPress - add a Glossary block to the WordPress editor
*	Author: HeroThemes
*	Version: 2.0.0
*	Build: 443
*   Build Date: 2025-02-24 2:55:22PM
*   Tested up to: 6.7.2
*	Author URI: https://www.herothemes.com/
*	Text Domain: ht-glossary
*/

// Exit if accessed directly.
if (! defined('ABSPATH')) {
	exit;
}

// ht glossary plugin version number.
if (! defined('HT_GLOSSARY_VERSION_NUMBER')) {
	define('HT_GLOSSARY_VERSION_NUMBER', '2.0.0');
}

// ht glossary build number.
if (! defined('HT_GLOSSARY_BUILD_NUMBER')) {
	define('HT_GLOSSARY_BUILD_NUMBER', 443 );
}

// ht glossary main file.
if (! defined('HT_GLOSSARY_MAIN_FILE')) {
	define('HT_GLOSSARY_MAIN_FILE', __FILE__);
}

/**
 * Block Initializer.
 */
require_once plugin_dir_path(__FILE__) . 'dist/ht-glossary-init.php';

/**
 * Admin.
 */
require_once plugin_dir_path(__FILE__) . 'dist/ht-glossary-admin.php';

//nb: load_plugin_textdomain not required for Gutenberg only text calls
