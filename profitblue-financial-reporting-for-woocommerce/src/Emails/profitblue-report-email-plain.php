<?php
/**
 * Template file to render plain text email
 * 
 */
use ProfitBlue\Emails\EmailNotification;
use ProfitBlue\Helpers\Helper;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

echo wp_kses( "= " . $email_heading . " =\n\n", Helper::get_allowed_tags() );

$email->render_plain();

echo wp_kses( apply_filters( 'woocommerce_email_footer_text', get_option( 'woocommerce_email_footer_text' ) ), Helper::get_allowed_tags() );
