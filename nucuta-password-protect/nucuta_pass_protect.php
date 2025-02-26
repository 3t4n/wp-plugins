<?php
    /*
    Plugin Name: Nucuta Password Protect
    Plugin URI: https://nucuta.com
    Description: Restrict accessing to wordpress site with a custom password
    Author: Liyanage at NUCUTA
    Version: 1.0
    Author URI: http://t.me/dilanga
    */

if ( ! defined( 'ABSPATH' ) ) exit; // make sure index.php is called and ABSPATH is set
	
function nucuta_adminmenu() {
    add_options_page("Nucuta Password Protect", "Nucuta Password Protect", "manage_options", "Nucuta Password Protect", "nucuta_admin_configuration"); //Draw admin area menu
}

add_action('admin_menu', 'nucuta_adminmenu');
function nucuta_admin_configuration()
{
	update_option('nucuta_pp_url',esc_url(plugins_url('become_a_patron_button_nucuta.com.png',__FILE__))); //Get plugin directory
	require('admin_page_html.php'); //Draw the admin area
}

require('generate_hash.php'); //Hash the Password
require('allowed_html_tags.php'); //Allowed html tags for custom message
require('save_admin_area.php'); //Submit the changes to database
require('front_page_login_process.php'); //Front page login process
require('logout.php'); //Logout
require('plugin_backend.php'); // Pluginbackend

function nucuta_password_drawpasswordprompt(){
	require('front_page_login_html.php'); // front page login area
}

