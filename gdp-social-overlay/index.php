<?php
/*
Plugin Name: #GDP-SocialOverlay
Version: 0.1.3
Plugin URI: http://www.giovannidepadova.com/?p=21
Description: The plugin show html overlay with facebook, twitter or google plus button.
Author: Giovanni De Padova
Author URI: https://www.giovannidepadova.com/
Text Domain: gdp-socialoverlay
License: #PluginTerrone

Puoi farci quel che vuoi! Ma se ci guadagnerai qualcosa non fare il tirchio!  

Offri una birra cliccando qui: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=9TPCUGWY66LQW

*/

require_once('so-functions.php');

if(!is_admin()){
	require_once('so-front.php');
}
if(is_admin()){
	require_once('so-admin.php');
}
