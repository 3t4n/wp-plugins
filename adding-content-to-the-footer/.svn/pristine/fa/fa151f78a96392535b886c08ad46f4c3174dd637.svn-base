<?php 

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) )
	exit;

// Get top code option
function get_option_acttf_code_top()
{
	return $acttf_top_code=wp_unslash(get_option('acttf_content_top'));
}

// Get bottom code option
function get_option_acttf_code_bottom()
{
	return $acttf_bottom_code=wp_unslash(get_option('acttf_content_bottom'));
}

// Success message
function  success_option_msg_acttf($msg)
{
	
	return ' <div class="notice notice-success acttf-success-msg is-dismissible"><p>'. $msg . '</p></div>';		
	
}

// Error message
function  failure_option_msg_acttf($msg)
{

	return '<div class="notice notice-error acttf-error-msg is-dismissible"><p>' . $msg . '</p></div>';		
	
}

?>