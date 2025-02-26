<?php 
/*
Plugin Name: Ami-Link Hide WP
Plugin URI: http://www.amigura.co.uk/hide_file.php
Description: Hide your rapidshare files, megaupload links, ect by protecting the link numbers with a scrambled code
Version: 0.2
Author: Amigura
Author URI: http://www.amigura.co.uk
License: GPL2

  Copyright 2011  http://www.amigura.co.uk

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA


*/

$act=esc_html($_POST['act']); 

switch ($act){
case o: ami_link_opt_upd();break;
default:break;
}

add_action('admin_menu', 'amigura_link_hide_menu');
add_action('admin_print_styles', 'ami_link_hide_css_script');
add_action('admin_notices' , 'amigura_link_hide_api_status' );

/* Runs when plugin is activated */
register_activation_hook(__FILE__,'ami_link_hide_opt_add'); 

function ami_link_hide_css_script() {
/* Free style */
wp_register_style('ami_link_hide_css', WP_PLUGIN_URL . '/ami-link-hide-wp/ami.css');
wp_enqueue_style( 'ami_link_hide_css');
wp_register_script('ami_link_hide_script', WP_PLUGIN_URL.'/ami-link-hide-wp/ami.js');
wp_enqueue_script('ami_link_hide_script');
}

function amigura_link_hide_menu() {
/* Set Menus */
$ami_link_hide_res = ami_link_hide_opt_get(); 
if($ami_link_hide_res['useracc']=='2'){$userperm='read';}else{$userperm='manage_options';}

add_menu_page('Ami-Link Hide WP', 'Ami-Link Hide', $userperm, 'ami_link_hide_wp', 'ami_link_hide_wp');

add_submenu_page('ami_link_hide_wp', 'Ami-Link Hide Options', 'options',  'manage_options', 'ami_link_hide_option', 'ami_hidelink_option');

}


function ami_link_hide_wp() { global $infout;
/* Menus main */
$ami_link_hide_res = ami_link_hide_opt_get(); 
if($ami_link_hide_res['useracc']=='2'){$userperm='read';}else{$userperm='manage_options';}

  if (!current_user_can($userperm))  {
    wp_die( __('You do not have sufficient permissions to access this page.') );
  }

$act=esc_html($_POST['act']); if($act=='m'){ami_encode_url();}

  include 'ami_form.php';
}

function ami_hidelink_option() {
/* Menus opt */
  if (!current_user_can('manage_options'))  {
    wp_die( __('You do not have sufficient permissions to access this page.') );
  }
include 'ami_options.php';

}

function ami_encode_url() { 
/* Contact server */
global $infout;

$url=esc_html($_POST['amiurl']);
$ami_link_hide_res = ami_link_hide_opt_get();
$apikey=$ami_link_hide_res['apikey'];

if(empty($url) or strlen($url)<10){ $infout='<p class="sm">Check url field is not blank</p>'; }
elseif(strlen($apikey)!=96 and strlen($apikey)!=100){ $infout='<p class="sm">Check api key in options</p>'; }
else{
$ch = curl_init();
$data = array('fn' => esc_html($_POST['amifn']), 'pwd' => esc_html($_POST['amipwd']), 'url' => $url, 'act' => 'm', 'apikey' => $apikey, 'scrt' => '2');

curl_setopt($ch, CURLOPT_URL, 'http://www.amigura.co.uk/hide_file_api.php');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$infout='<div class="wrap">'.curl_exec($ch).'</div>'; 
curl_close($ch); 
}

}

function ami_link_hide_opt_add() {
/* Creates new database field */
$ami_options = array(
		'apikey' => 'enter api key',
		'dbstore' => '',
		'useracc' => '1',
		'vers' => '0.2'
	);
	
add_option("amigura_link_hide_wp", $ami_options, '', 'yes');

}

function ami_link_hide_opt_del() {
/* Deletes the database field */
delete_option('amigura_link_hide_wp');
}

function ami_link_hide_opt_get() {
/* get the database field */
return get_option( 'amigura_link_hide_wp' );
}

function ami_link_opt_upd() {
/* update the database field */

$ami_options = ami_link_hide_opt_get();
	
$apikey=esc_html($_POST['amiapikey']);
$dbstore=$_POST['amidbstore'];
$useracc=$_POST['amiuseracc'];

if(empty($apikey)){$apikey='enter api key';}
if($dbstore!=1 or empty($dbstore)){$dbstore='';}
if($useracc!=1 and $useracc!=2){$useracc=1;}

$ami_options = array(
		'apikey' => trim($apikey),
		'dbstore' => $dbstore,
		'useracc' => $useracc
	);

update_option( 'amigura_link_hide_wp', $ami_options );

}

function amigura_link_hide_api_status() {
$ami_link_hide_res = ami_link_hide_opt_get(); $apikey=$ami_link_hide_res['apikey'];
if ( current_user_can( 'manage_options' ) ) {
if(strlen($apikey)!=96 and strlen($apikey)!=100){ echo "<div class='updated' style='background-color:#f66;'><p> <a href=\"".admin_url() ."admin.php?page=ami_link_hide_option\">Ami-Link Hide WP</a>: please enter an API key or disable the plugin.</p></div>"; }
}
}

?>