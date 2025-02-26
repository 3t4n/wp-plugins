<?php
  /*
  Plugin Name: Login Anywhere
  Plugin URI: http://shubhcomputing.com/
  Description: It allows to add wordpress login form anywhere in any posts, pages or custom template.
  Version: 0.1.3
  Author: Shubh Computing LLP
  Author URI: http://shubhcomputing.com/
  */

   defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

   define("ME_URL", rtrim(WP_PLUGIN_URL,'/') . '/'.basename(dirname(__FILE__)) );
   define("ME_DIR", rtrim(dirname(__FILE__), '/'));

   add_shortcode('login-form','login_form_callback');
	
   function login_form_callback($attr)
   {
       include_once(ME_DIR."/shortcodes/login_form_callback.php");
	   return Login_Form($attr);
   }