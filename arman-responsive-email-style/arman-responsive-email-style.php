<?php defined('ABSPATH') || die;
/**
 * Arman Siahloo woocommerce email style
 *
 * Plugin Name:         woocommerce responsive email style armanplus
 * Plugin URI:          https://armansiahloo.ir/responsive-email-woocommerce/
 * Description: 		Get rid of half-baked and non-responsive emails with the lightest and simplest plugin - with this simple plugin, your emails will be fully visible on mobile phones.
 * Version:             1.0.0
 * Requires at least:   4.0.0
 * Requires PHP:        7.0
 * Author:              Arman Siahloo
 * Author URI:          https://armansiahloo.ir/
 * Text Domain:         Support
 */


add_filter( 'woocommerce_email_styles', 'mm_add_custom_woocommerce_email_styles', 10, 2 );
function mm_add_custom_woocommerce_email_styles( $css, $email ) {
	return $css . '

#template_container, #template_header_image, #template_header, #template_body, #template_footer {
width:100% !important;
max-width:600px !important;
min-width:320px !important;
}
#wrapper {
    max-width: 600px !important;
    margin: 0 auto !important;
    padding: 0 !important;
}

';
}
