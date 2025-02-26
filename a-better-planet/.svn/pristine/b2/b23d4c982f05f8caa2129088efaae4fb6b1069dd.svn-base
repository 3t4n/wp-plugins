<?php
/*
Plugin Name: A Better Planet
Description: All the latest WordPress News from Quality Sources
Version: 0.1
License: GPL
Author: WPLift
Author URI: http://wplift.com
*/

// Add SHC Feed Dashboard Widget
function shcfeed_setup_function() {
    add_meta_box( 'abetterplanet_widget', 'A Better Planet - Latest WordPress News', 'shcfeed_widget_function', 'dashboard', 'normal', 'high' );
}
function shcfeed_widget_function() {
    include ('feed.php'); // new file where RSS Feed will be called from
}
 
add_action( 'wp_dashboard_setup', 'shcfeed_setup_function' );

?>