<?php
if ( ! defined( 'ABSPATH' ) ) { die; } 
/*
Plugin Name: As Metabox
Plugin URI: http://wordpress.org/plugins/as-metabox/
Description: As Metabox Easy To Use WordPress Metabox Framework.
Author: anuislam
Version: 1.0
Author URI: https://anuishohag.xyz/
*/
//as-metabox
define('as_root_metabox', dirname(__FILE__));
//echo basename(__DIR__);
$chack_dir = explode("\\", as_root_metabox);
if (in_array("plugins", $chack_dir)) {
	define('as_root_metabox_url', plugins_url( '', __FILE__ ));
}else{
	$basename_dir = basename(__DIR__);
	define('as_root_metabox_url', get_template_directory_uri().'/'.$basename_dir);
}



require_once(as_root_metabox.'/inc/plugin_load.php');
require_once(as_root_metabox.'/inc/scripts.php');
require_once(as_root_metabox.'/inc/icons_array.php');
require_once(as_root_metabox.'/core/functions.php');
require_once(as_root_metabox.'/core/as_get_wp_data.php');
require_once(as_root_metabox.'/core/core-option.php');
require_once(as_root_metabox.'/core/core.php');
require_once(as_root_metabox.'/core/load-options.php');
require_once(as_root_metabox.'/config/metabox-config.php');

do_action('as_metabox_init');