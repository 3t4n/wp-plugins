<?php
/**
 * Provides a set of functions for including contact information directly in a theme.
 */


/**
 * Displays all contact information except the address. Only entrys with the "Show" option checked are displayed.
 *
 * @param	$before	Any markup to be written before each entry.
 * @param	$mid		Any markup to be written between the label and the value.
 * @param 	$after		Any markup to be written at the end of each entry.
 */
 if ( !function_exists('rd_contact_info' ) ):
function rd_contact_info( $before='', $mid='', $after='' )
{
	if ( get_option( 'rdShowContactName' ) == '1' )
		echo $before.__( 'Name: ' ).$mid.get_option( 'rdContactName' ).$after;
		
	if ( get_option( 'rdShowContactPhone' ) == '1' )
		echo $before.__( 'Phone: ' ).$mid.get_option( 'rdContactPhone' ).$after;
		
	if ( get_option( 'rdShowContactMobile' ) == '1' )
		echo $before.__( 'Mobile: ' ).$mid.get_option( 'rdContactMobile' ).$after;
		
	if ( get_option( 'rdShowContactFax' ) == '1' )
		echo $before.__( 'Fax: ' ).$mid.get_option( 'rdContactFax' ).$after;
		
	if( get_option( 'rdShowContactEmail' ) == '1' )
		echo $before.__( 'Email: ' ).$mid.get_option( 'rdContactEmail' ).$after;
}
endif; // END FUNCTION rd_contact_info


/********************************************************************************************/


/**
 * Displays the address if "Show Address" has been selected.
 *
 * @param		$before		Any markup to be displayed before each line.
 * @param		$after			Any markup to be displayed at the end of each line.
 */
if ( !function_exists( 'rd_contact_address' ) ):
function rd_contact_address( $before='', $after='' )
{
	if ( get_option( 'rdShowContactAddress' ) == '1' )
	{
		echo $before.get_option( 'rdContactStreet' ).$after;
		echo $before.get_option( 'rdContactCity' ).', ';
		echo get_option( 'rdContactState' ).' ';
		echo get_option( 'rdContactZip' ).$after;
	}
}
endif; // END FUNCTION rd_contact_address


/********************************************************************************************/


/**
 * Returns whether or not "Show Contact Name" has been selected.
 *
 * @returns		boolean
 */
if ( !function_exists( 'rd_show_contact_name' ) ):
function rd_show_contact_name()
{
	return ( get_option( 'rdShowContactName' ) == '1' );
}
endif; // END FUNCTION rd_show_contact_name


/********************************************************************************************/


/**
 * Returns whether or not "Show Phone Number" has been selected.
 *
 * @returns		boolean
 */
if ( !function_exists( 'rd_show_contact_phone' ) ):
function rd_show_contact_phone()
{
	return ( get_option( 'rdShowContactPhone' ) == '1' );
}
endif; // END FUNCTION rd_show_contact_phone


/********************************************************************************************/


/**
 * Returns whether or not "Show Mobile Number" has been selected.
 *
 * @returns		boolean
 */
if ( !function_exists( 'rd_show_contact_mobile' ) ):
function rd_show_contact_mobile()
{
	return ( get_option( 'rdShowContactMobile' ) == '1' );
}
endif; // END FUNCTION rd_show_contact_mobile


/********************************************************************************************/


/**
 * Returns whether or not "Show Fax Number" has been selected.
 *
 * @returns		boolean
 */
if ( !function_exists( 'rd_show_contact_fax' ) ):
function rd_show_contact_fax()
{
	return ( get_option( 'rdShowContactFax' ) == '1' );
}
endif; // END FUNCTION rd_show_contact_fax


/********************************************************************************************/


/**
 * Returns whether or not "Show Email Address" has been selected.
 *
 * @returns		boolean
 */
if ( !function_exists( 'rd_show_contact_email' ) ):
function rd_show_contact_email()
{
	return ( get_option( 'rdShowContactEmail' ) == '1' );
}
endif; // END FUNCTION rd_show_contact_email


/********************************************************************************************/


/**
 * Returns whether or not "Show Address" has been selected.
 *
 * @returns		boolean
 */
if ( !function_exists('rd_show_contact_address' ) ):
function rd_show_contact_address()
{
	return ( get_option( 'rdShowContactAddress' ) == '1' );
}
endif; // END FUNCTION rd_show_contact_address


/********************************************************************************************/

/**
 * Gets the contact name.
 */
if ( !function_exists('rd_contact_name' ) ):
function rd_contact_name()
{
	return get_option( 'rdContactName' );
}
endif; // END FUNCTION rd_contact_name


/********************************************************************************************/


/**
 * Returns the phone number.
 */
if ( !function_exists( 'rd_contact_phone' ) ):
function rd_contact_phone()
{
	return get_option('rdContactPhone');
}
endif; // END FUNCTION rd_contact_phone


/********************************************************************************************/


/**
 * Returns the mobile phone number.
 */
if ( !function_exists( 'rd_contact_mobile' ) ):
function rd_contact_mobile()
{
	return get_option( 'rdContactMobile' );
}
endif; // END FUNCTION rd_contact_mobile


/********************************************************************************************/


/**
 * Returns the fax number.
 */
if ( !function_exists( 'rd_contact_fax' ) ):
function rd_contact_fax()
{
	return get_option('rdContactFax');
}
endif; // END FUNCTION rd_contact_fax


/********************************************************************************************/


/**
 * Returns the email address.
 */
if ( !function_exists( 'rd_contact_email' ) ):
function rd_contact_email()
{
	return get_option( 'rdContactEmail' );
}
endif; // END FUNCTION rd_contact_email


/********************************************************************************************/


/**
 * Returns the email address wrapped in a "mailto:" link.
 */
if ( !function_exists( 'rd_contact_email_link' ) ):
function rd_contact_email_link()
{
	$email = get_option( 'rdContactEmail' );
	return '<a href="mailto:'.$email.'" class="rd_contact_email">'.$email.'</a>';
}
endif; // END FUNCTION rd_contact_email_link


/********************************************************************************************/


/**
 * Returns the street address.
 */
if ( !function_exists( 'rd_contact_street' ) ):
function rd_contact_street()
{
	return get_option( 'rdContactStreet' );
}
endif; // END FUNCTION rd_contact_street


/********************************************************************************************/


/**
 * Returns the city name from the address.
 */
if ( !function_exists( 'rd_contact_city' ) ):
function rd_contact_city()
{
	return get_option( 'rdContactCity' );
}
endif; // END FUNCTION rd_contact_city


/********************************************************************************************/


/**
 * Returns the state from the address.
 */
if ( !function_exists( 'rd_contact_state' ) ):
function rd_contact_state()
{
	return get_option( 'rdContactState' );
}
endif; // END FUNCTION rd_contact_state


/********************************************************************************************/


/**
 * Returns the zip code from the address.
 */
if ( !function_exists( 'rd_contact_zip' ) ):
function rd_contact_zip()
{
	return get_option( 'rdContactZip' );
}
endif; // END FUNCTION rd_contact_zip
?>