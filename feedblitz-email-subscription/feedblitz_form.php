<?php
/*
Plugin Name: Widget & Shortcode Subscription Form for Feedblitz
Plugin URI: http://www.wptaskforce.com/feedblitz-email-subscription/
Description: The best way to keep up with your content feed by placing a feedblitz subscription form widget or shortcode on your site.
Author: Arni Cinco
Version: 1.0.9
Author URI: http://www.wptaskforce.com
*/

define( 'FEEDBLITZ_EMAIL_SUBSCRIPTION_URL', plugin_dir_url( __FILE__ ) );
	
$lib_file_format = "lib/%s.php";
$lib_files = array(
  "feedblitz_email_widget", 
  "feedblitz_email_subscription_shortcode",
  "settings"
);

foreach($lib_files as $lib_file) {
  $file = sprintf($lib_file_format, $lib_file);
  require($file);
}

?>