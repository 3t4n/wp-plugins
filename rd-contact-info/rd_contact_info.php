<?php
/*
Plugin Name: RD Contact Info
Plugin URI: http://www.reitzdesigns.com/2010/06/rd-contact-info-plugin/
Description: Provides an easy method for adding dynamic contact information to a page or post. Includes shortcodes, and functions that can be incorporated into a theme.
Version: 1.2
Author: Paul Reitz
Author URI: http://reitzdesigns.com
*/

include_once( 'php/rd_contact_shortcode.php' );
include_once( 'php/rd_contact_theme_functions.php' );

/********************************************************************************************/

/************************
 * Set up the admin page *
 ************************/

/**
 * Includes the form for the settings page.
 */
if ( !function_exists( 'rd_contact_info_admin' ) ):
function rd_contact_info_admin()
{
	include( 'php/rd_contact_admin.php' );
}
endif; // END FUNCTION rd_contact_info_admin


/** 
 * Adds the option to the settings menu.
 */
if ( !function_exists( 'rd_contact_info_admin_action' ) ):
function rd_contact_info_admin_action()
{
	add_options_page('Edit Contact Information', 'Edit Contact Information', 9, basename(__FILE__), 'rd_contact_info_admin');
}
endif; // END FUNCTION rd_contact_info_admin_action
add_action('admin_menu', 'rd_contact_info_admin_action');

/********************************************************************************************/

/*******************
 * Add Short Codes *
 *******************/

add_shortcode( 'rd-contact-info', 			'rd_contact_base_shortcode' );
add_shortcode( 'rd-contact-name', 		'rd_contact_name_shortcode' );
add_shortcode( 'rd-contact-phone', 		'rd_contact_phone_shortcode' );
add_shortcode( 'rd-contact-mobile', 		'rd_contact_mobile_shortcode' );
add_shortcode( 'rd-contact-fax', 			'rd_contact_fax_shortcode' );
add_shortcode( 'rd-contact-email', 		'rd_contact_email_shortcode' );
add_shortcode( 'rd-contact-address', 	'rd_contact_address_shortcode' );

/********************************************************************************************/

/****************************************************
 * Clean up the databse when the plugin is deactivated *
 ****************************************************/
 
if ( !function_exists( 'rd_contact_clean' ) ):
function rd_contact_clean()
{
	delete_option( 'rdContactOverride' );
	
	delete_option( 'rdContactName' );
	delete_option( 'rdContactPhone' );
	delete_option( 'rdContactMobile' );
	delete_option( 'rdContactFax' );
	delete_option( 'rdContactEmail' );
	delete_option( 'rdContactStreet' );
	delete_option( 'rdContactCity' );
	delete_option( 'rdContactState' );
	delete_option( 'rdContactZip' );
	
	delete_option( 'rdShowContactName' );
	delete_option( 'rdShowContactPhone' );
	delete_option( 'rdShowContactMobile' );
	delete_option( 'rdShowContactFax' );
	delete_option( 'rdShowContactEmail' );
	delete_option( 'rdShowContactAddress' );
}
endif; // END FUNCTION rd_contact_clean
register_deactivation_hook(__FILE__, 'rd_contact_clean');
?>