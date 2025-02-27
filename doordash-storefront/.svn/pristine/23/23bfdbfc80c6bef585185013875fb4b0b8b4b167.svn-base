<?php
/*
Plugin Name: Storefront Online Ordering by DoorDash
Description: Add commission-free online ordering for pickup and delivery to your own website.
Version: 1.0.5
Author: doordashstorefront
Author URI: https://get.doordash.com/
 */
 
//Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

define("DDSOO_version", '1.0.5');
define("DDSOO_plugin", plugin_basename(__FILE__));
define("DDSOO_plugin_path", plugin_dir_path( __FILE__));
define("DDSOO_IMG", plugins_url("/img/", __FILE__) );
//echo DDSOO_plugin_path;


// Load Class

require_once plugin_dir_path(__FILE__) . '/dd-options.php';
require_once plugin_dir_path(__FILE__) . '/dd-class.php';

// Register widget
function register_ddsoo()
{
    register_widget('DDSOO_Widget');
    register_sidebar(
        array(
            'name' => __('Storefront Sidebar', 'ddsoo'),
            'id' => 'doordash-sidebar',
            'description' => __(' ', 'ddsoo'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
}

// Hook in function
add_action('widgets_init', 'register_ddsoo');

function DDSOO_footer_widget()
{
    dynamic_sidebar('doordash-sidebar');
}
add_action('get_footer', 'DDSOO_footer_widget');


