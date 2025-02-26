<?php 
/*
   Plugin Name: Advanced EU Cookie Law Consent 
   Plugin URI:  http://www.widget.gr 
   Description:  Advanced Customizable EU Cookie Law Consent Plugin. Create your Cookie Law Window and adjust the look and feel of the text and buttons.
   Version: 1.0
   Author: Widget Athens
   Author URI: http://apps.widget.gr/
   Copyright: 2016, Widget Athens
*/


include dirname(__FILE__) .'/class-activate.php';
include dirname(__FILE__) .'/plugin.php';

register_activation_hook(__FILE__, array('euLawActivate', 'on_activate') );
register_deactivation_hook(__FILE__, array('euLawActivate', 'on_deactivate') );

if (is_admin() ){
	include dirname(__FILE__) .'/admin.php';
	$cookieLawAdmin 		= new cookieLawAdmin();

} else {
  $cookieLawFront = new cookieLawFront();
}


 


 ?>