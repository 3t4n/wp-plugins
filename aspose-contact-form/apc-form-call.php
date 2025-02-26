<?php
/*
 * User input processing...
 */

$post_params = $_POST;

$admin_email = get_option( 'admin_email' );

$emailSubject = "[Aspose Contact Form Notification]";

$emailMessage = "<h3>The Form</h3>";
  foreach($post_params as $key => $value) {
       if (!empty($key) && $key != "apc-submit") {
		   $emailMessage .= "<strong>". esc_attr($key) . "</strong>:" . esc_attr($value) . "<br>";
        }
  }

$emailHeaders = array('Content-Type: text/html; charset=UTF-8');

$allowedHtml = array( 'h3' => array(), 'br' => array(), 'p' => array(), 'strong' => array() );
if(wp_mail( $admin_email, $emailSubject, $emailMessage, $emailHeaders)){
	echo sprintf(
		'<div class="notice notice-error"><p>Email Sent to the admin </p></div><p>%s</p>',
		wp_kses($emailMessage,$allowedHtml)
	);	
	
}else{
	echo sprintf(
		'<div class="notice notice-error"><p>Email not sent, please try again later!</p></div><p>%s</p>',
		wp_kses($emailMessage, allowedHtml )
	);	
}

