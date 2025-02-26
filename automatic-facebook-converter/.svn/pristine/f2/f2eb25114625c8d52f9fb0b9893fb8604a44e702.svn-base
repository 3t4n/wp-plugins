<?php 
/*
Plugin Name: Automatic Wordpress Facebook Converter
Plugin URI: http://www.ProMarketingStrategy.net/wordpress-facebook-converter
Description: Automatically detects when your site is use on a Facebook Fan Page. Then it automatically converts it into a compatible format.
Version: 1.0
Author: Jean Paul
Author URI: http://www.ProMarketingStrategy.net
License: GPL2

  Copyright 2011 ProMarketingStrategy.net  (email : support@promarketingstrategy.net)

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
 
?><?php
fbac_install_check();
session_start();
$_SESSION['fbac_fb_mode']='true';

		 //Change the theme to Facebook Converter if it's dectected we're in a Facebook iFrame
function fbac_take_over(){          
            add_filter('stylesheet', 'set_stylesheet');
            add_filter('theme_root',  'set_theme_root');
			add_filter('theme_root_uri',  'set_theme_uri');
			add_filter('template', 'set_template');
             
           }

if ($_GET['fbac_take_over_permission'] == 'go_ahead'){fbac_take_over();}
           // 
//Let's receive the signed_request from facebook
 $signed_request = $_REQUEST['signed_request'];
 function fbac_sosket_() { 
global $signed_request;
    if ($_GET['fbac_done'] != 'true'){  

if ($_GET['p']!=''){

 echo'   
      <script>

if (top!=self) {
  window.location = "?p='.$_GET['p'].'&fbac_take_over_permission=go_ahead&fbac_done=true&signed_request='.$signed_request.'";
; 
 }
 </script>'; 

}elseif ($_GET['page_id']!= ''){

 echo'   
      <script>

if (top!=self) {
  window.location = "?p='.$_GET['page_id'].'&fbac_take_over_permission=go_ahead&fbac_done=true&signed_request='.$signed_request.'";
; 
 }
 </script>';

}else {
   echo'   
      <script>

if (top!=self) {
  window.location = "?fbac_take_over_permission=go_ahead&fbac_done=true&signed_request='.$signed_request.'";
; 
 }
 </script>'; 
 } 
      
     
 }
     
 }
  
 add_action('wp_head', 'fbac_sosket_');
 
 
 
 function set_stylesheet(){
   
 return 'fb_theme';
    }
            
function set_theme_uri (){
 $theme_uri =    WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));//get_bloginfo('wpurl') . "/wp-content/plugins/fbac_converter" ;
     //return 'fb_theme';
return $theme_uri ;
    }
            
function set_template(){
    
 return 'fb_theme';
    }

function set_theme_root() {
$fbtheme = WP_PLUGIN_DIR.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));//ABSPATH . "wp-content/plugins/fbac_converter" ;
return $fbtheme;
	 
}

 if ( is_admin() ){ // admin actions
  add_action( 'admin_menu', 'fbac_add_menu_page' );
  add_action( 'admin_menu', 'fbac_add_premium_submenu' );
} 

function fbac_add_menu_page() {
    add_menu_page('Automatic Facebook Converter', 'Auto Facebook', 'administrator', __FILE__, 'fbac_menu_page',plugins_url('fbac_ico.gif', __FILE__));

  

    } 

function fbac_add_premium_submenu(){
    add_submenu_page(  __FILE__, 'Premium Features', 'Premium Features', 'administrator', 'fbac_converter_premium_php', 'fbac_show_premium_now' ) ;
}

    
    function fbac_menu_page(){
 include(dirname( __FILE__ )."/fbac_options.php");

}

 function fbac_show_premium_now(){
 include(dirname( __FILE__ )."/fbac_converter_premium.php");


}

function fbac_install_check (){
    
    if(get_option('fbac_already_here') == 'true'){return true; }
    else {
        //fbac_totally_reset();
        }
    
    
    }
    
    

