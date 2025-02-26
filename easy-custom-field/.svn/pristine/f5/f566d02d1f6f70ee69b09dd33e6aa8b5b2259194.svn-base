<?php
/* 
 * Plugin Name:   Easy Custom Fields
 * Version:       3.0
 * Plugin URI:    http://wordpress.org/extend/plugins/easy-custom-fields/
 * Description:   Automatically adds form element(s) in Write Post panel, which act as a Post's custom field(s). Adjust your settings <a href="options-general.php?page=easy-custom-fields\easy-custom-fields.class.php">here</a>.
 * Author:        MaxBlogPress
 * Author URI:    http://www.maxblogpress.com
 *
 * License:       GNU General Public License
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 * 
 * Copyright (C) 2007 www.maxblogpress.com
 *
 * This is the improved version of "rc:custom_field_gui" plugin by Joshua Sigar 
 *
 */
 
$rc_path = preg_replace('/^.*wp-content[\\\\\/]plugins[\\\\\/]/', '', __FILE__);
$rc_path = str_replace('\\','/',$rc_path);
$rc_dir  = substr($rc_path,0,strrpos($rc_path,'/'));
 
$rc_realpath = str_replace('\\','/',dirname(__FILE__));
$rc_siteurl  = get_bloginfo('wpurl');
$rc_siteurl  = (strpos($rc_siteurl,'http://') === false) ? get_bloginfo('siteurl') : $rc_siteurl;
$rc_fullpath = $rc_siteurl.'/wp-content/plugins/'.$rc_dir.'/'; 

define('RC_FULLPATH', $rc_fullpath);
define('RC_NAME', 'Easy Custom Fields');
define('RC_VERSION', '3.0');

include_once( 'easy-custom-fields.class.php' );

add_action('admin_menu', array(  'easy_custom_fields', 'easy_custom_fields_options' ) ); // menu under settings.
add_action('admin_head', array( 'easy_custom_fields', 'ecf_add_meta_box' ) );  // menu support 
add_action( 'edit_post', array( 'easy_custom_fields', 'edit_meta_value' ) );  // save the post data.
add_action( 'save_post', array( 'easy_custom_fields', 'edit_meta_value' ) );  // save the post data. 
add_action( 'publish_post', array( 'easy_custom_fields', 'edit_meta_value' ) );
add_action('activate_'.$rc_path, array( 'easy_custom_fields', 'cfgCreateControlTable'));

global $table_prefix;
$ctrl_tbl = $table_prefix.'easy_custom_fields';
define('RC_CTRL_TBL', $ctrl_tbl);
?>