<?php
/**
* Plugin Name: Sarv Email Marketing
* Description: Sarv Email Marketing platform allows you to experience how easy it's to create beautiful and personalized email campaigns.
* Plugin URI: 
* Author: Sarv
* Author URI: http://sarv.com/
* Version: 1.0.5
**/
 
define('SARV_PLUGIN_URL', plugins_url('', __FILE__));
define('SARV_PLUGIN_DIR', plugin_dir_path(__FILE__));


function sarv_load_css_jquery_admin()
{
    wp_enqueue_script('jquery-ui-sortable'); 
    wp_enqueue_script('ajax-script', SARV_PLUGIN_URL . '/assets/js/ajax.js', array('jquery'), null, true);
    wp_enqueue_style('design', SARV_PLUGIN_URL . '/assets/css/design.css', array(), null); 
    wp_localize_script( 'ajax-script', 'plugin_ajax_url',array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ));
}

function sarv_load_css_jquery_front()
{
	wp_enqueue_style('style', SARV_PLUGIN_URL . '/assets/css/front.css', array(), null); 
    wp_enqueue_script('ajax-script', SARV_PLUGIN_URL . '/assets/js/ajax.js', array('jquery'), null, true);
    wp_localize_script( 'ajax-script', 'plugin_ajax_url',array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ));
}


add_action( 'wp_ajax_formsetting', 'sarv_request_form_setting' );
add_action( 'wp_ajax_nopriv_formsetting', 'sarv_request_form_setting' );

add_action( 'wp_ajax_addcontacts', 'sarv_insert_contacts' );
add_action( 'wp_ajax_nopriv_addcontacts', 'sarv_insert_contacts' );

add_action( 'wp_enqueue_scripts', 'sarv_load_css_jquery_front' );
add_action( 'admin_enqueue_scripts', 'sarv_load_css_jquery_admin' );

// Action & Filter Hooks
add_action( 'admin_menu', 'sarv_menu' );


// run the install scripts upon plugin activation
register_activation_hook(__FILE__,'sarv_plugin_options_install');


// Include or Require any files
include('inc/display-options.inc.php');

include('inc/form.shortcode.php');

include('inc/form.setting.php');

include('inc/menu.inc.php');

include('inc/config.php');

?>