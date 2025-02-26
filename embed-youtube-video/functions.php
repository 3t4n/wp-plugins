<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) )
	exit;
// Success message
function  evygk_success_option_msg_add($msg)
{	
	echo ' <div class="notice eyv_notice-success eyv_embed-success-msg is-dismissible"><p>'. $msg . '</p></div>';		
}

// Error message
function  evygk_failure_option_msg_add($msg)
{

	return '<div class="notice eyv_notice-error eyv_embed-error-msg is-dismissible"><p>' . $msg . '</p></div>';		
	
}
 ?>