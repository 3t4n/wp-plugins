<?php



/*

  Plugin Name: Auto Post Spinner

  Plugin URI: http://www.kamranulhassan.com

  Description: Auto Post Spinner is loaded with full features it will automatic spin the post title, post description in just few second.

  Version: 1.0

  Author: Muhammad Aamir iqbal

  Author URI: http://aamiriqbalonline.com

  License: GPL2

 */




define( 'APS__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );


/*

 * Start From Here

 * This action is use for add auto post spinner section in wp admin section  

 */

define('MR_PLUGIN_PATH', dirname(__FILE__));    


add_action('admin_menu', 'register_auto_post_spinner_plugin_page');



function register_auto_post_spinner_plugin_page() {

    add_menu_page('Auto Post Spinner', 'Auto Post Spinner', 'manage_options', APS__PLUGIN_DIR.'spinnerform.php', '', plugin_dir_url( __FILE__ ).'images/icon.jpg', 6);

}



/*

 * Auto post spinner section function and add_action end here

 */



/*

 * Start From Here

 * This action is for register the style file in the plguin.

 */



add_action('admin_enqueue_scripts', 'register_auto_post_spinner_plugin_style');





function register_auto_post_spinner_plugin_style() {

    wp_register_style( 'custom_wp_admin_css', plugin_dir_url( __FILE__ ) .'css/pluginstyle.css');

    wp_enqueue_style( 'custom_wp_admin_css' );

}



?>