<?php

/*
* Plugin Name: Epeken JExpress
* Plugin URI: https://wordpress.org/plugins/epeken-jexpress
* Description: Integrated woocommerce shipping plugin with JExpress courier in Indonesia. <a href="https://wordpress.org/plugins/epeken-all-kurir/">Epeken All Kurir</a> is a mandatory to be installed with Epeken JExpress.
* Version: 1.0.0
* Author: www.epeken.com
* Author URI: https://www.epeken.com
*/

if(!defined('ABSPATH')) exit;
add_action('admin_notices', 'epeken_jexpress_admin_warning');
function epeken_jexpress_admin_warning() {
 if(!is_admin())
	 return;
  if(!is_plugin_active('epeken-all-kurir/epeken_courier.php')) {
	  echo '<div class="notice notice-warning">
		   <p><strong>Warning!!! </strong>
		    Plugin <strong>Epeken All Kurir</strong> belum terinstal di 
 		    website Kakak sehingga <strong>Plugin JExpress tidak berfungsi</strong>. 
		    Plugin <a href="https://wordpress.org/plugins/epeken-all-kurir/" target="_blank">Epeken All Kurir</a> wajib diinstal bersama dengan plugin JExpress. 
		    Terima kasih.</p></div>';
  }
}

function epeken_jexpress_all_kurir_active() {
    return in_array('epeken-all-kurir/epeken_courier.php', 
          apply_filters( 'active_plugins', get_option( 'active_plugins'))); # || 
    
}

if(epeken_jexpress_all_kurir_active()){
    //This plugin will only work if Epeken All Kurir is active. 
    //Epeken All Kurir plugin can be downloaded from https://wordpress.org/plugins/epeken-all-kurir/
    function epeken_jexpress_data_server() {
        $server = sanitize_text_field(get_option('epeken_data_server'));
        if(empty($server))
                $server = 'http://103.252.101.131';
        return $server;
    }

    add_filter('woocommerce_shipping_methods', 'epeken_jexpress_shipping_add');
    function epeken_jexpress_shipping_add($methods){
	    $methods[] = 'EpekenJexpress'; 
	    return $methods;
    }


    add_action('woocommerce_shipping_init', 'epeken_jexpress_init');
    function epeken_jexpress_init(){
     if(!class_exists('EpekenJexpress')){
	  include_once('class/shipping.php');
     }
    }

    $epeken_jexpress_data_server = epeken_jexpress_data_server();
    define('EPEKEN_JEXPRESS_SERVER_URL', $epeken_jexpress_data_server);	
    
    $epeken_jexpress_plugin = plugin_basename( __FILE__ );
    $epeken_jexpress_api_end_point = 'jexpress.php';
    $epeken_jexpress_rate_url = EPEKEN_JEXPRESS_SERVER_URL.'/api/'.$epeken_jexpress_api_end_point.'/price/';
    $epeken_jexpress_api_setuser = EPEKEN_JEXPRESS_SERVER_URL.'/api/'.$epeken_jexpress_api_end_point.'/setuser';
    define('EPEKEN_JEXPRESS_API_RATE_URL', $epeken_jexpress_rate_url);
    define('EPEKEN_JEXPRESS_API_CREDENTIAL', $epeken_jexpress_api_setuser);
    $epeken_jexpress_plugin_dir = plugin_dir_path(__FILE__);
    define('EPEKEN_JEXPRESS_DIR_PATH',$epeken_jexpress_plugin_dir);
    include_once('includes/services.php');


    function epeken_jexpress_add_settings_link( $links ) {
        $settings_link = '<a href="admin.php?page=wc-settings&tab=shipping&section=jexpress">' . __( 'Settings' ) . '</a>';
        array_push( $links, $settings_link );
        $lic_link = '<a href="options-general.php?page=epeken-all-kurir%2Fepeken_courier.php">'.__('License').'</a>';
        array_push($links,$lic_link);
        return $links;
      }
    add_filter( "plugin_action_links_$epeken_jexpress_plugin", 'epeken_jexpress_add_settings_link' );
}
?>
