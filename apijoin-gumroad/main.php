<?php
/*
Plugin Name: Apijoin Gumroad
Plugin URI:  https://cerobits.com/
Description: Display, manage and stylize gumroad products in WordPress.
Version:     1.0.0
Author:      Miguras
Author URI:  https://apijoin.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: apijoin-gumroad-plugin
Domain Path: /languages

 */

 if(!defined('ABSPATH')) exit;


 /*========================================== REQUIRED FILES ===========================================*/ 
    
    if(file_exists(plugin_dir_path(__FILE__). 'options/redux-framework.php')){
       require_once(plugin_dir_path(__FILE__). 'options/redux-framework.php');
    }


    if(file_exists(plugin_dir_path(__FILE__). 'options/apijoin-gumroad/apijoin-gumroad.php')){
        require_once(plugin_dir_path(__FILE__). 'options/apijoin-gumroad/apijoin-gumroad.php');
    }


    if(file_exists(plugin_dir_path(__FILE__). 'functions/functions.php')){
        require_once(plugin_dir_path(__FILE__). 'functions/functions.php');
    }

    if(file_exists(plugin_dir_path(__FILE__). 'development/development-functions.php')){
        require_once(plugin_dir_path(__FILE__). 'development/development-functions.php');
    }

  

 function mig_register_apijoin_gumroad_category($categories, $post){
    return array_merge($categories, array(
        array(
            'slug' => 'apijoin-gumroad',
            'title' => 'Apijoin Gumroad',
            'icon' => 'store',
        )
    ));

    
 }

 add_filter('block_categories', 'mig_register_apijoin_gumroad_category', 10, 2);

 




?>