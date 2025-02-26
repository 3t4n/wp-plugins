<?php
// Check if the ABSPATH constant is defined
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
//login failure
add_action('wp_login_failed', 'log_failed_attempt',1); 
function log_failed_attempt( $username ) {
	if (!username_exists($username)) {
		openlog('wordpress-login-unknown('.AATIWPF_HTTP_HOST.')', LOG_NDELAY|LOG_PID, LOG_DAEMON);
		syslog(LOG_NOTICE, "WordPress authentication failure for unknown $username ".AATIWPF_HTTP_HOST." from ".AATIWPF_REMOTE_ADDR);
    closelog();
	} else {
		openlog('wordpress-wp-login('.AATIWPF_HTTP_HOST.')', LOG_NDELAY|LOG_PID, LOG_DAEMON);
		syslog(LOG_NOTICE, "Wordpress authentication failure for $username ".AATIWPF_HTTP_HOST." from ".AATIWPF_REMOTE_ADDR);
		closelog();
	}	
}