<?php
/**
 * Template file to render html email
 * 
 */
use ProfitBlue\Emails\EmailNotification;
use ProfitBlue\Helpers\Helper;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

	do_action('woocommerce_email_header', $email_heading); 

	echo wp_kses( $email->email_content, Helper::get_allowed_tags() );
	
	do_action( 'woocommerce_email_footer' ); 

?>
