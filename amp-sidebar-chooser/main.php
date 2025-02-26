<?php
/*

Plugin Name: AMP Sidebar Chooser
Plugin URI: http://www.andrewmpeters.com
Description: Associate a sidebar with a post, page, or custom post type

Version: 0.2.1
Author: Andrew M. Peters
Author URI: http://www.andrewmpeters.com
License: GPL2

*/

require('functions/functions.php');

$plugin_dir['plugin'] = plugins_url('', __FILE__);
$plugin_dir['css'] = $plugin_dir['plugin'].'/css/';
$plugin_dir['js'] = $plugin_dir['plugin'].'/js/';
$plugin_dir['images'] = $plugin_dir['plugin'].'/images/';

add_action('loop_start', 'amp_sidebar_chooser_get_sidebar_before');
add_action('loop_end', 'amp_sidebar_chooser_get_sidebar_after');
add_action( 'admin_init', 'amp_sidebar_chooser_add_meta_box' );

if(isset($_POST['save'])){
	amp_sidebar_chooser_save_options($_REQUEST['post_ID']);
}

?>