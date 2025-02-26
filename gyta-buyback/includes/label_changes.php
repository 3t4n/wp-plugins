<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}



/**
 * Start: Modify WooCommerce's checkout system to better fit what we need
 **/

//Change the 'Billing details' checkout label to 'Contact Information'
//! Needs to check the setting first
function wcpti_billing_field_strings( $translated_text, $text, $domain ) {
	switch ( $translated_text ) {
		case 'Billing details' :
			$translated_text = __( 'Contact Information', 'wcpti' );
			break;
		case 'Billing &amp; Shipping' :
			$translated_text = __( 'Contact Information', 'wcpti' );
			break;
	}
	
	return $translated_text;
}
if(get_option( 'wcpti_settings_billing_details_display_change' )=='yes') {
	add_filter( 'gettext', 'wcpti_billing_field_strings', 20, 3 );
}


function wcpti_custom_override_checkout_fields( $fields ) {
	if(get_option( 'wcpti_settings_billing_details_remove_company_name' )=='yes') {
		unset($fields['billing']['billing_company']);
	}
	/*
	unset($fields['billing']['billing_first_name']);
	unset($fields['billing']['billing_last_name']);
	
	unset($fields['billing']['billing_address_1']);
	unset($fields['billing']['billing_address_2']);
	unset($fields['billing']['billing_city']);
	unset($fields['billing']['billing_postcode']);
	unset($fields['billing']['billing_country']);
	unset($fields['billing']['billing_state']);
	unset($fields['billing']['billing_phone']);
	unset($fields['order']['order_comments']);
	unset($fields['billing']['billing_address_2']);
	unset($fields['billing']['billing_postcode']);
	unset($fields['billing']['billing_company']);
	unset($fields['billing']['billing_last_name']);
	unset($fields['billing']['billing_email']);
	unset($fields['billing']['billing_city']);
	*/
	return $fields;
}
add_filter( 'woocommerce_checkout_fields' , 'wcpti_custom_override_checkout_fields' );

/**
 * End: Modify WooCommerce's checkout system to better fit what we need
 **/
 

/**
 * Start: Change language handling as needed
 **/

add_filter( 'gettext', 'wcpti_translate_woocommerce_strings', 999, 3 );

function wcpti_translate_woocommerce_strings( $translated, $untranslated, $domain ) {

   if ( ! is_admin() && 'woocommerce' === $domain ) {

	  switch ( $translated ) {

		 case 'Shipping to %s.':

			$translated = '';
			break;

		 case 'Billing address':

			$translated = 'Contact Information';
			break;
		
	  }

   }   

   return $translated;

}
/**
 * End: Change language handling as needed
 **/
