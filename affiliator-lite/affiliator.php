<?php

/*
Plugin Name: Affiliator
Plugin URI: http://www.anastasia-app.com
Description: Affiliate plugin that allows you to create a fully powered affiliate site. This is the full version. No need to buy anything.
Author: Vasilis Kerasiotis
Version: 2.1.3
Author URI: http://www.anastasia-app.com
*/

require_once __DIR__.'/lib/wp_settings.php';
require_once __DIR__.'/lib/affiliator.php';

$affiliator = new affiliator();

register_activation_hook(__FILE__, array($affiliator,'activate'));
register_deactivation_hook( __FILE__, array($affiliator,'deactivate') );

add_action('admin_menu', array($affiliator,'plugin_menu'));


add_action( 'pre_get_posts', array($affiliator,'pre_get_posts') );
// parse the generated links

add_action('plugins_loaded', array($affiliator,'plugins_check'));


add_action('init', array($affiliator,'check_is_post'));
add_action('init', array($affiliator,'create_post_types'));
add_action('wp_footer', array($affiliator,'check_post'));
add_filter( 'template_include', array($affiliator,'custom_template'));