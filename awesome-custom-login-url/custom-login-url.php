<?php
/*
Plugin Name: Awesome Custom Login URL
Description: Plugin allows to change: login, registration, lost password URLs to some custom URLs without modifying any files, simple and swift.
Version: 1.0
Author: Raihanul Islam
Author URI:http://raihanislamcse.me
*/

add_action('init', 'clu_init_urls');
add_action('init', 'clu_init_redirect');
add_action('generate_rewrite_rules', 'clu_generate_rewrite_rules');

include_once dirname(__FILE__) . '/functions.php';

if(is_admin()) {
    add_action('admin_init', 'clu_admin_init');
    register_deactivation_hook( __FILE__, 'clu_deactivate' );
    
    include_once dirname(__FILE__) . '/functions-admin.php';
}

