<?php
/*
Plugin Name: Container Fix for WP Visual Editor
Plugin URI:
Description: Small and simple plugin that wides Wordpress Visual Editor (Gutenberg) container to 100% width. Makes content editing more simple and quick.
Version: 1.0.1
Author: alexsamohin
Author URI:
License: GPL-3.0+
License URI: http://www.gnu.org/licenses/gpl-3.0.txt
*/

if (!defined('GTNBRG_CONTAINER_FIXER_PLUGIN_DIR')){
    define('GTNBRG_CONTAINER_FIXER_PLUGIN_DIR',dirname(__FILE__));
}

add_action('admin_enqueue_scripts', 'gtbrg_fixing_add_css_fix');


function gtbrg_fixing_add_css_fix(){
    if (function_exists('get_file_data')){
        $plugin_version = get_file_data(GTNBRG_CONTAINER_FIXER_PLUGIN_DIR. '/plugin.php' , array('Version'), 'plugin')[0];
    }
    wp_enqueue_style('gtbrg_fixing_admin_css', plugins_url('css/gutenberg-fix.css?v='.$plugin_version, GTNBRG_CONTAINER_FIXER_PLUGIN_DIR. '/plugin.php' ));
}