<?php
/**
* Plugin Name: WordPress Fail2Ban
* Plugin URI: http://wireflare.com
* Description: Plugin creates a syslog facility to log invalid login attempts in a custom file for use with Fail2Ban
* Version: 1.0.0
* Author: WireFlare
* Author URI: http://wireflare.com
* License: GPL2
*/ 

const SYSLOG_FACILITY = LOG_LOCAL1;
 
add_action('wp_login_failed', 'log_failed_attempt'); 
 
function log_failed_attempt( $username ) {
	openlog( 'wordpress('.$_SERVER['HTTP_HOST'].')', LOG_NDELAY|LOG_PID, SYSLOG_FACILITY);
	syslog( LOG_NOTICE, "Wordpress authentication failure for $username from {$_SERVER['REMOTE_ADDR']}" );
}