<?php   
        /* 
        Plugin Name: Joleado Chat Plugin
        Plugin URI: https://www.joleadosystem.com/
        Description: Plugin for chat & salesforce automation(SFA) systems including CRM, online forms, calendaring and more…
        Author: JOLEADO Systems
        Version: 18.9.3 
        Author URI:https://www.joleadosystem.com/
        */ 
		





if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

register_deactivation_hook( __FILE__, 'jc_joleado_deactivate' );
 register_uninstall_hook( __FILE__, 'jc_joleado_deactivate' );

function jc_joleado_deactivate()
{
	global $wpdb;
	$del_chat_qry="Delete from ".$wpdb->prefix."usermeta where meta_key='joleado_token'";
	$wpdb->query($del_chat_qry);
	
	$del_token_qry="Delete from ".$wpdb->prefix."usermeta where meta_key='joleado_chat'";
	$wpdb->query($del_token_qry);
	
}

add_action('admin_menu', 'jc_footer_admin_actions');


function jc_footer_admin_actions()
{

add_menu_page( 'Joleado Chat Form', 'Joleado Chat Settings', 'administrator', 'subscriber_list_display_main', 'jc_subscriberlist_admin' );

}

function jc_subscriberlist_admin()
{
include('joleado_form_admin.php');
}

/*function extractString($string, $start, $end) {
    $string = " ".$string;
    $ini = strpos($string, $start);
    if ($ini == 0) return "";
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}*/

function jc_joleado_chat_footer()
{
   
	global $wpdb;
	global $current_user;
	
	
$qry="select * from ".$wpdb->prefix."usermeta where meta_key='joleado_chat' order by umeta_id desc LIMIT 0,1";


$data=$wpdb->get_row($qry);

 $get_code=$data->meta_value;


$final_code1=html_entity_decode($get_code);


$final_code=strip_tags($final_code1);


if($get_code != '')
{
	
	
	
 echo $final_code1;


}



 } 
add_action( 'wp_footer', 'jc_joleado_chat_footer', 5 );






