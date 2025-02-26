<?php
/*
Plugin Name: G-Оbligatory-Featured-Image
Plugin URI: 
Description: Make Featured Image Оbligatory.
Version: 1.0
Author: Georgi Kotsev
Author URI: 
License: GPL2
*/

/*  Copyright 2013  Georgi Kotsev  (email : george.kocev@gmail.com)

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

/******************************************************************************
GLOBALS
******************************************************************************/
/*Plugin name*/
$gofi_plugin_name = 'G-Оbligatory-Featured-Image';
/*Retvire data from admin options table*/
$gofi_options = get_option('gofi_settings');
/*Get current file location*/
$gofi_current_file_path =  plugin_dir_url( __FILE__ );
//Plugins dir
$gofi_plugin_dir = plugins_url() . "/G-Оbligatory-Featured-Image";

/******************************************************************************
* INCLUDES                                                                    *
******************************************************************************/
require_once ('php/gofi_admin_page.php'); /* Admin page */
require_once ('php/gofi_functions.php'); /* Plugin functions */
require_once ('php/gofi_scripts_css_loader.php'); /* Plugin functions */
?>
