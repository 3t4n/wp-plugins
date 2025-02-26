<?php 
/*
* Plugin Name: Aspearl RRPA
* Plugin URI: http://aspearl.com
* Description: Aspearl rrpa widget to show Recent Posts, Recent Comments on post , Popular post by view and Acrhives post month wise. It can be said all in one widget which willl show different data in tabing format. It saves space on your website as well as provide most useful feature in block.
* Version: 1.0
* Author: Aspearl
* Author URI: http://www.aspearl.com
*/
//Security check 
defined('ABSPATH') or die("No script kiddies please!");
if(!defined('DS')) {
	define('DS', DIRECTORY_SEPARATOR);
}
require_once dirname(__FILE__).'/aspearl-rrpa-widget.php';

/* Widget registration */
function register_aspearl_rrpa_widget() {
    register_widget( 'Aspearl_RRPA_Widget' );
}
add_action( 'widgets_init', 'register_aspearl_rrpa_widget' );
