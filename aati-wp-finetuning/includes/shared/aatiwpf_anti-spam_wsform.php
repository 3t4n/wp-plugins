<?php
// Check if the ABSPATH constant is defined
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
// Add action to process form data
// you need to use this name in the wordpress action hook =  wsf_action_tag
add_action('wsf_action_tag', 'aatiwpf_action_function', 10, 2);
// My function for action
function aatiwpf_action_function($form, $submit) {
    // Get submit value (Change '123' to your field ID)
    //$submit_value = wsf_submit_get_value($submit, 'field_123');
  openlog('wpwsflog', LOG_PID, LOG_DAEMON);
  syslog(LOG_NOTICE, "WS Form submission from ".AATIWPF_REMOTE_ADDR." on ".AATIWPF_HTTP_HOST);
  closelog();
    // ...
}