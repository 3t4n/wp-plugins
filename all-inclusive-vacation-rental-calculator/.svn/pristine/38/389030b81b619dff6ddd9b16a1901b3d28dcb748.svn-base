<?php
/*
 Plugin Name: All-Inclusive Vacation Rental Calculator
 Description: This Plugin calculates the total out-of-pocket rental coast for a visitor including all applicable taxes and fees.Use the shortcode [pp-code-vacation].
 Version: 1.0
 Plugin URI: http://www.personplacecode.com/
 Author: Qasim Jan
 Author URI: http://www.personplacecode.com/
 License: GNU General Public License v3 or later
*/
define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH .'wp-includes/pluggable.php');
function ppcde_scripts() {	
	if(!is_admin())
	{ 
        wp_register_style('ppcde_style', plugins_url('css/ppcde_style.css',__FILE__));
        wp_enqueue_style('ppcde_style');
        wp_register_style('ppcde_bootstrap', plugins_url('css/bootstrap.min.css',__FILE__));
        wp_enqueue_style('ppcde_bootstrap');
       	wp_register_script('ppcde_script', plugins_url('js/ppcde_script.js', __FILE__ ),array('jquery'));
        wp_enqueue_script('ppcde_script');
        wp_register_script('ppcde_bootstrapjs', plugins_url('js/bootstrap.min.js', __FILE__ ));
        wp_enqueue_script('ppcde_bootstrapjs');    
	}
}
add_action('wp_enqueue_scripts', 'ppcde_scripts');
// Create Tables 
register_activation_hook(__FILE__,'ppcde_create_table');
function ppcde_create_table()
{
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();
    $ppcdelocation=$wpdb->prefix.'ppcdelocation';
    if($wpdb->get_var("SHOW TABLES LIKE '$ppcdelocation'")!=$ppcdelocation)
    {
            $sql = "CREATE TABLE $ppcdelocation(
            lc_id INT(20) NOT NULL AUTO_INCREMENT,
                    address VARCHAR(150) NOT NULL,nightr TEXT,weekr TEXT,monthr TEXT,
                    start1 VARCHAR(100),end1 VARCHAR(100),night1 TEXT,week1 TEXT,month1 TEXT,
                    start2 VARCHAR(100),end2 VARCHAR(100),night2 TEXT,week2 TEXT,month2 TEXT,
                    start3 VARCHAR(100),end3 VARCHAR(100),night3 TEXT,week3 TEXT,month3 TEXT,
                    saltax TEXT,toutax TEXT,othertax TEXT,
                    poolheatd TEXT,poolheatw TEXT,poolheatm TEXT,parkf TEXT,parkrate TEXT,othf TEXT,othrate TEXT,
                    wifif TEXT,wifirate TEXT,clnf TEXT,clndys TEXT,discount TEXT,disrate TEXT,                    
                    damgp TEXT,curr TEXT,
                    PRIMARY  KEY (lc_id))$charset_collate;";  
            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($sql);            
    }    
}
function getspecificrecord_process()
{
    global $wpdb;
    $id=sanitize_text_field($_POST['address']); 
    $table_name = $wpdb->prefix."ppcdelocation";    
    $locations = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE lc_id=%d",$id),ARRAY_A);
}
function ppcode_locationdata_process()
{
    global $wpdb;
    $id=sanitize_text_field($_POST['id']);
    $table_name = $wpdb->prefix."ppcdelocation";
    $data = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE lc_id=%d",$id),ARRAY_A);
    $locationsrecord="";
    $arr = $data[0];
    foreach($arr as $value)
    {
        $locationsrecord.=$value."|";
    }
    echo $locationsrecord;
    exit;
}
function asi_map_deletecar_process()
{
    global $wpdb;
    $id=sanitize_text_field($_POST['id']);
    $table_name = $wpdb->prefix."cartypes";
    $wpdb->query($wpdb->prepare("DELETE FROM $table_name WHERE c_id=%d",$id));     
    exit;
}
add_action('wp_ajax_getspecificrecord','getspecificrecord_process');
add_action( 'wp_ajax_nopriv_getspecificrecord', 'getspecificrecord_process');
add_action('wp_ajax_ppcode_locationdata','ppcode_locationdata_process');
include 'ppcde_main.php';
include 'ppcde_admin.php';
?>