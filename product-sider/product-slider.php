<?php
/*
* Plugin Name: Woo Product Slider
* Version: 1.0.5
* Description: The best slider for prodcuts! Display your products using sliders.
* Author: DevTarik
* Author URI: http://devtarik.beztshop.com/
* Slug: devtarik-ps
* Text Domain: devtarik-ps
*
*
*
* Product Slider is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 2 of the License, or
* any later version.
* 
* Product Slider is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU General Public License for more details.
* 
* You should have received a copy of the GNU General Public License
* along with Product Slider. If not, see https://www.gnu.org/licenses/gpl-3.0.en.html
*/


/*-------------------------------------------
*  Exit if accessed directly
*-------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/*-------------------------------------------
* Plugin Absolute Path
*-------------------------------------------*/
if ( ! defined('PLSLIDER_PLUGIN_DIR') ) {
    define('PLSLIDER_PLUGIN_DIR', plugin_dir_url( __FILE__ ));
}


/*-------------------------------------------
* Including Function File
*-------------------------------------------*/
require plugin_dir_path( __FILE__ ) . 'functions.php';


/*-------------------------------------------
* The Slider File
*-------------------------------------------*/
require plugin_dir_path( __FILE__ ) . 'includes/sliders.php';


/*-------------------------------------------
* WP Admin Menu
*-------------------------------------------*/
require plugin_dir_path( __FILE__ ) . 'includes/settings/settings.php';


?>