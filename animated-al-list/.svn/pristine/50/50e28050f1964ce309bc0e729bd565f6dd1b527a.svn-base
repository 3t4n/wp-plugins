<?php
/*
Plugin Name: Animated AL List
Description: A list of elements (text or image) with animations.
Version: 1.0.6
Author: alexdtn (<a href="http://al-plugins.biz/">homesite</a>)
*/

namespace animated_al;

defined('ABSPATH') or die("No script hack please!");

if (is_admin())
 {
  if(!function_exists('wp_get_current_user')) {
    include(ABSPATH . "wp-includes/pluggable.php"); 
  }
  if (is_user_logged_in())
   {
      if ( current_user_can('edit_plugins') || current_user_can('install_plugins') || current_user_can('activate_plugins') ||
   current_user_can('delete_plugins') || current_user_can('update_plugins') ) {


    require_once dirname(__FILE__).'/inc/inclusion.php';

    
    require_once dirname(__FILE__).'/admin_animated_al_list.php';
    try
    {
      $admin = new AnimatedAl_Admin(__FILE__);
    } catch (Exception $e){
      echo $e->getMessage();
    }
   }
  }
 }
  else
  {
  
  require_once dirname(__FILE__).'/inc/inclusion_front.php';

    require_once dirname(__FILE__).'/users_animated_al_list.php';

      //Main slider output
    add_shortcode('animated_al_list', array('\animated_al\AnimatedAl_Users', 'animated_al_list'));
    
  }
