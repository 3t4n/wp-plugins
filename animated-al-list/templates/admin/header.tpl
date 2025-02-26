<?php	
defined('ABSPATH') or die("No script hack please!");

if(function_exists('current_user_can'))
if(!current_user_can('manage_options')) {
die('Access Denied');
}
if(!function_exists('current_user_can')){
  die('Access Denied');
}
?>