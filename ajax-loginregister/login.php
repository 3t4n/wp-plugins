<?php
/*
Plugin Name: Ajax login-register
Version: 0.1
Author: jesox
Author URI: jesox.com
Description: Login-Register to wordpress using Ajax
*/

add_action('init', 'WPWall_Init');
add_action('wp_head', 'ADD_HeadAction' );
add_action('wp_print_scripts', 'ADD_ScriptsAction');


//$dir = ABSPATH . 'wp-content/plugins/login';
$wp_wall_plugin_url = trailingslashit( WP_PLUGIN_URL.'/'.dirname( plugin_basename(__FILE__) ));
//echo WP_PLUGIN_URL;
//print $wp_wall_plugin_url.'thickbox.js';
//$path = 'var tb_pathToImage ="'. $wp_wall_plugin_url.'loading.gif';
//wp_register_script('thickbox',$wp_wall_plugin_url.'thickbox.js');

function WPWall_Init()
{
  // register widget
 // global $wp_wall_plugin_url;
  register_sidebar_widget('Ajax Login/Register', 'WPWall_Widget');
  //wp_register_script('Thickbox_j',$wp_wall_plugin_url.'/thickbox.js');
}

function ADD_ScriptsAction()
{
  //wp_enqueue_script('jquery');
 echo '<script type="text/javascript" src="'.WP_PLUGIN_URL.'/../../wp-includes/js/jquery/jquery.js"></script>';
 echo '<script type="text/javascript" src="'.WP_PLUGIN_URL.'/../../wp-includes/js/thickbox/thickbox.js"></script>';
  echo '<script type="text/javascript" src="'.WP_PLUGIN_URL.'/../../wp-includes/js/jquery/jquery.form.js"></script>';
 //wp_enqueue_script('thickboxjs',WP_PLUGIN_URL.'/../../wp-includes/js/thickbox/thickbox.js');
  //wp_enqueue_style('thickboxst',WP_PLUGIN_URL.'/../../wp-includes/js/thickbox/thickbox.css');
 //wp_enqueue_script('jqueryform',WP_PLUGIN_URL.'/../../wp-includes/js/jquery/jquery.form.js');
 //wp_enqueue_script('ajaxfo',WP_PLUGIN_URL.'/login/login.js');
 //echo '<script type="text/javascript" src="'.WP_PLUGIN_URL.'/login/login.js"></script>';

}

function ADD_HeadAction()
{
  //global $wp_wall_plugin_url;
  echo '<link rel="stylesheet" href="'.WP_PLUGIN_URL.'/../../wp-includes/js/thickbox/thickbox.css" type="text/css" />';
  echo '<link rel="stylesheet" href="'.WP_PLUGIN_URL.'/login/login.css" />';
  //echo '<script language="javascript" src="'.WP_PLUGIN_URL.'/../../wp-includes/js/thickbox/thickbox.css"></script>';
}
function WPWall_Widget()
{
  echo $before_title . '<h3 style="color:#222222;font-weight:bold">Ajax Login-Register</h3>'. $after_title.'</br>';
require_once(ABSPATH . WPINC . '/pluggable.php');
$current_user = wp_get_current_user();
include_once 'WP_PLUGIN_URL/../wp-includes/general-template.php';
$fpath = WP_PLUGIN_URL.'/../wp-includes/general-template.php';

$pathx = "WP_PLUGIN_URL/../wp-login.php";
global $loginformhtml;
$loginformhtml = wp_login_form( array('echo' => false) );
$logged = false;
if ( 0 == $current_user->ID ) {
  //not logged , view the login action
  echo '<ul>';
  echo '<li id="login"><a href = "'.WP_PLUGIN_URL.'/login/login_form.php?height=400&width=600&modal=false" class="thickbox" title = "Login to the site" >Login</a></li>';
  //echo '<li><a href="'.$pathx.'"class="thickbox">login</a></li>';
  echo '<li id="register"><a href ="'.WP_PLUGIN_URL.'/login/register_form.php?height=400&width=600&modal=false" class="thickbox" title = "Register with us" >Register </a></li>';
  echo '</ul>';
} else {
    $logged = true;
   echo '<ul>';
   echo '<li>welcome: '.$current_user->user_login .'</li>';
   echo '<li id="logout"><a href ="'.WP_PLUGIN_URL.'/login/logout_form.php">Logout</a></li>';
   echo '</ul>';
}
}
function thickbox_image_paths() {
	
    wp_reset_query();
		$thickbox_path = get_option('siteurl') . '/wp-includes/js/thickbox/';
		echo "<script type=\"text/javascript\">\n";
		echo "	var tb_pathToImage = \"${thickbox_path}loadingAnimation.gif\";\n";
		echo "	var tb_closeImage = \"${thickbox_path}tb-close.png\";\n";
		echo "</script>\n";
}
add_action('wp_footer', 'thickbox_image_paths');
?>
