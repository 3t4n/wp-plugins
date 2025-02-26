<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/**
 * Plugin Name: Slick slider all
 * Plugin URI:  https://conic-solutions.com/product/wordpress-slick-slider-all/
 * Description: Build a beautiful slider. Custom post types are supported, everything is customized and very easy to use with shortcode.
 * Version:     1.0
 * Author:      Conic Solutions
 * Author URI:  https://conic-solutions.com/
 * Text Domain: cs-ssa
 */

include_once 'config/constants.php';
include_once 'classes/cs-slick-all-bootstrap.php';

$mf_tribe_content = new cs_slick_all_bootstrap();

// include the main class
$mf_tribe_content->init();

// Plugin delete hook
register_uninstall_hook(__FILE__, array( 'cs_slick_all_bootstrap', 'plugin_delete' ) );

