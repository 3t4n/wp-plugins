<?php
    /*
    Plugin Name: Any Custom Fields
    Plugin URI: http://dcpra.xtgem.com
    Description: Plugin for displaying options for customization of general, social, contact and any customs fields used in wordpress site.
    Author: Darshan Prajapati
    Version: 1.1
    Author URI: http://dcpra.xtgem.com
    */
 //add_action('wp_footer', 'mp_footer');

add_action('admin_menu', 'opendc_admin_actions');
$dir = plugin_dir_path( __FILE__ );

if (!defined('ANF_PLUGIN_URL'))
	define('ANF_PLUGIN_URL', untrailingslashit(plugins_url('', __FILE__)));

	
function opendc_admin_actions() {
	if (!current_user_can('manage_options')) {
		// not admin       
    } else {
		add_options_page("Any Custom Fields", "Any Custom Fields", 1, "any_custom_field", "opendc_admins");
	}
}



function opendc_admins() {
	wp_enqueue_style('acf-style',plugins_url('/style.css',__FILE__),array(),'1','','');
	wp_enqueue_script('test-ajax',plugins_url('/ajax.js',__FILE__),array(),'1','','');
	wp_enqueue_script('test',plugins_url('/anycustomfield.js',__FILE__),array(),'1','','');
	require_once('form.php');
}

/* Main Plugin File */

function my_plugin_activate() {
  add_option( 'Activated_Plugin', 'any_custom_field' );
}
register_activation_hook( __FILE__, 'my_plugin_activate' );

function load_plugin() {

    if ( is_admin() && get_option( 'Activated_Plugin' ) == 'any_custom_field' ) {
		require_once('functions-demo.php');
        delete_option( 'Activated_Plugin' );
        $func = new Ancfunction();
        $fundemo = new AncfunctionDemoData();
        $func->createTable();
        if($fundemo->checkdata() <= 0)
         $fundemo->insertDemo();
        
    }
}

add_action( 'admin_init', 'load_plugin' );

 function anc_fields($key = ""){

	global $wpdb;
	if($key !="") {
		$query = "select fields_value from ".$wpdb->prefix."anc_fields where fields_key = '".$key."' limit 1 ";
		$data = $wpdb->get_results($query);
		return $data[0]->fields_value;
		
	} else {
		return '';	
	}	
}
 function anc_labels($key = ""){

	global $wpdb;
	if($key !="") {
		$query = "select fields_name from ".$wpdb->prefix."anc_fields where fields_key = '".$key."' limit 1 ";
		$data = $wpdb->get_results($query);
		return $data[0]->fields_name;
		
	} else {
		return '';	
	}	
}



?>
