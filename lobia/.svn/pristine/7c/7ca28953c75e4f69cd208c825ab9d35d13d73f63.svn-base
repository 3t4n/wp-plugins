<?php
/**
 * @package Lobia
 */
/*
/**
 * Plugin Name: Lobia 
 * Plugin URI: https://wordpress.org/plugins/lobia/
 * Description: Lobia Persian Fonts Package (Shabnam, Vazir, Sahel, Tanha, Parastoo, Samim, Gandom, Estedad )
 * Version: 1.0.2
 * Author: Lobia
 * Author URI: https://lobia.ir/
 * License: GPLv2 or later
 * Text Domain: lobia
 */

 /*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
*/

if ( !defined('ABSPATH') ) {
  exit;
}

require_once('Lobia.class.php');
$lobia = new Lobia ;

////////////////////////////////////////////////////////////////////
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'tinymce-advanced/tinymce-advanced.php' ) ) {
// add fonts to Advanced Editor Tools

function lobia_load_custom_fonts($init) {

   	global $lobia;
    $stylesheet_url = $lobia->masir('style.css');  

    if(empty($init['content_css'])) {
        $init['content_css'] = $stylesheet_url;
    } else {
        $init['content_css'] = $init['content_css'].','.$stylesheet_url;
    }

$font_formats = isset($init['font_formats']) ? $init['font_formats'] : 'شبنم=Shabnam;وزیر=Vazir;ساحل=Sahel;تنها=Tanha;پرستو=Parastoo;صمیم=Samim;گندم=Gandom;استعداد=Estedad';
   

    $init['font_formats'] = $font_formats;

    return $init;
}
add_filter('tiny_mce_before_init', 'lobia_load_custom_fonts');

} //if active
else {
	function lobia_admin_notice_1() {
		?>
		<div class="notice notice-success is-dismissible">
			<p><?php _e( 'برای استفاده کامل و بهینه از فونت های  فارسی نصب شده توسط بسته فونت لوبیا در ویرایشگر وردپرس افزونه Advanced Editor Tools  نصب و فعال کنید.', 'sample-text-domain' ); ?></p>
		</div>
		<?php
	}
	add_action( 'admin_notices', 'lobia_admin_notice_1' );

}
////////////////////////////////////////////////////////////////////

// Add menu
function lobia_menu() {
  global $lobia;

  add_menu_page("lobia Plugin", "بسته فونت لوبیا","manage_options", "lobia", "lobia_menu_info", $lobia->masir('img/icon.png'));
   
}

add_action("admin_menu", "lobia_menu");

function lobia_menu_info(){
include_once "info.php";
}

////////////////////////////////////////////////////////////////////

// style.css 

function lobia_plugin_style() {
  global $lobia;
  wp_enqueue_style('lobia', $lobia->masir('style.css'));


}
add_action( 'wp_enqueue_scripts', 'lobia_plugin_style' );

////////////////////////////////////////////////////////////////////

// WordPress Custom Font @ Admin
function lobia_custom_admin_style(){
  global $lobia;

  wp_enqueue_style('lobia-css', $lobia->masir('style.css'));
  wp_enqueue_style('lobia-admin', $lobia->masir('admin_custom_font.css'));


}
add_action( 'admin_enqueue_scripts' , 'lobia_custom_admin_style' );

// WordPress Custom Font @ Admin Frontend Toolbar
function lobia_admin_custom_font_frontend_toolbar() {
  global $lobia;
  if(current_user_can('administrator')) {
  
    wp_enqueue_style('lobia-admin', $lobia->masir('admin_frontend_toolbar.css'));
  
    }
  }
  add_action( 'wp_head', 'lobia_admin_custom_font_frontend_toolbar' );

  // WordPress Custom Font @ Admin Login
  function lobia_admin_custom_font_login_page() {
    global $lobia;
    if(stripos($_SERVER["SCRIPT_NAME"], strrchr(wp_login_url(), '/')) !== false) {
  
      wp_enqueue_style('lobia-css', $lobia->masir('style.css'));
      wp_enqueue_style('lobia-admin', $lobia->masir('admin_custom_font.css'));


    }
  }
  add_action( 'login_head', 'lobia_admin_custom_font_login_page' );

?>