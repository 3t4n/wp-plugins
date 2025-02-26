<?php
/**
 * Manages all of the shortcodes for the RD Contact Info plugin
 */
 
 /**
  * Base shortcode that displays the contact information according 
  * to the globla contact info settings.
  *
  * @param 		name-label		The label displayed in front of the contact name
  * @param		phone-label		The label displayed in front of the phone number
  * @param		mobile-label		The label displayed in front of the mobile number
  * @param		fax-label			The label displayed in front of the fac number
  * @param		email-label		The label displayed in front of the email address
  * @param		email-link			true to add a 'mailto:' link to the email address, false to show the email without a link (default = true)
  * @param		address-label	The label displayed *above* the address.
  */
 if ( !function_exists( 'rd_contact_base_shortcode' ) ):
 function rd_contact_base_shortcode( $attr, $content )
 {
	 $atts = shortcode_atts(array(
								   'name_label'			=> '',
								   'phone_label'		=> '',
								   'mobile_label'		=> '',
								   'fax_label'				=> '',
								   'email_label'			=> '',
								   'email_link'			=> 'true'),
							 $attr);
	 $contact_info = '';
	 if ( get_option( 'rdContactName' ) != '' && get_option( 'rdShowContactName' ) == '1' )
	 {
		$contact_info .= ( $atts['name_label'] == '' )? '' : '<strong>'.$atts['name_label'].' </strong>';
		$contact_info .= get_option( 'rdContactName' ).'<br />';
	 }
	 
	 if ( get_option( 'rdContactPhone' ) != '' && get_option( 'rdShowContactPhone' ) == '1' )
	 {
			$contact_info .= ( $atts['phone_label'] == '' )? '' : '<strong>'.$atts['phone_label'].' </strong>';
			$contact_info .= get_option('rdContactPhone').'<br />';
	 }
	 
	 if ( get_option( 'rdContactMobile' ) != '' && get_option( 'rdShowContactMobile' ) == '1' )
	 {
		 $contact_info .= ( $atts['mobile_label'] == '' )? '' : '<strong>'.$atts['mobile_label'].' </strong>';
		 $contact_info .= get_option('rdContactMobile').'<br />';
	 }
	 
	 if ( get_option( 'rdContactFax' ) != '' && get_option( 'rdShowContactFax' ) == '1' )
	 {
		 $contact_info .= ($atts['fax_label'] == '')? '' : '<strong>'.$atts['fax_label'].' </strong>';
		 $contact_info .= get_option('rdContactFax').'<br />';
	 }
	 
	 if ( get_option( 'rdContactEmail' ) != '' && get_option( 'rdShowContactEmail' ) == '1' )
	 {
		 $contact_info .= ( $atts['email_label'] == '' )? '' : '<strong>'.$atts['email_label'].' </strong>';
		 if ( $atts['email_link'] == 'true' )
		 {
			 $contact_info .= '<a href="mailto:'.get_option( 'rdContactEmail' ).'">'.get_option( 'rdContactEmail' ).'</a><br />';
		 }
		 else
		 {
			 $contact_info .= get_option( 'rdContactEmail' ).'<br />';
		 }
	 }
	 
	 return $contact_info;
 }
 endif; // END FUNCTION rd_contact_base_shortcode
 
 /*****************************************************************************
  *The following shortcodes override the "Show" option in the main settings panel. *
  *****************************************************************************/
 
 /**
  * Displays the contact name if a contact name was provided in the settings panel.
  *
  * @param		label		The label displayed in front of the contact name
  */
if ( !function_exists( 'rd_contact_name_shortcode' ) ):
function rd_contact_name_shortcode( $attr, $content )
{
	$atts = shortcode_atts( array( 'label' => '' ), $attr );
	$contact_info = '';
	if ( get_option( 'rdContactOverride' ) == '1' || get_option( 'rdShowContactName' ) == '1')
	{
		  if ( get_option( 'rdContactName' ) != '' )
		  {
			  $contact_info .= ( $atts['label'] == '' )? '' : '<strong>'.$atts['label'].' </strong>';
			  $contact_info .= get_option( 'rdContactName' ).'<br />';
		  }
	}  
	  
	  return $contact_info;
}
endif; // END FUNCTION rd_contact_name_shortcode


/********************************************************************************************/


/**
 * Displays the phone number if one is provided in the settings panel.
 *
 * @param 		label		The label displayed in front of the phone number.
 */
if ( !function_exists( 'rd_contact_phone_shortcode' ) ):
function rd_contact_phone_shortcode( $attr, $content )
{
	 $atts = shortcode_atts( array( 'label' => '' ), $attr );
	  $contact_info = '';
	if ( get_option( 'rdContactOverride' ) == '1' || get_option( 'rdShowContactName' ) == '1' )
	{
		  if (get_option( 'rdContactPhone' ) != '' )
		  {
			  $contact_info .= ( $atts['label'] == '' )? '' : '<strong>'.$atts['label'].' </strong>';
			  $contact_info .= get_option( 'rdContactPhone' ).'<br />';
		  }
	}  
	  
	  return $contact_info;
}
endif; // END FUNCTION rd_contact_phone_shortcode


/********************************************************************************************/

  
/**
 * Displays the mobile number if one is provided in the settings panel.
 *
 * @param		label		The label displayed in front of the phone number.
 */
if ( !function_exists( 'rd_contact_mobile_shortcode' ) ):
function rd_contact_mobile_shortcode( $attr, $content )
{
	$atts = shortcode_atts( array( 'label' => '' ), $attr );
	$contact_info = '';
	if ( get_option( 'rdContactOverride' ) == '1' || get_option( 'rdShowContactMobile' ) == '1' )
	{
		  if (get_option( 'rdContactMobile' ) != '' )
		  {
			  $contact_info .= ( $atts['label'] == '' )? '' : '<strong>'.$atts['label'].' </strong>';
			  $contact_info .= get_option( 'rdContactMobile' ).'<br />';
		  }
	}  
	  
	  return $contact_info;
}
endif; // END FUNCTION rd_contact_mobile_shortcode


/********************************************************************************************/


/**
 * Displays the fax number if one is provided in the settings panel.
 *
 * @param		label		The label to display in front of the fax number.
 */
if ( !function_exists( 'rd_contact_fax_shortcode' ) ):
function rd_contact_fax_shortcode( $attr, $content )
{
	$atts = shortcode_atts( array( 'label' => '' ), $attr );
	$contact_info = '';
	if ( get_option( 'rdContactOverride' ) == '1' || get_option( 'rdShowContactFax' ) == '1' )
	{
		  if ( get_option( 'rdContactFax' ) != '' )
		  {
			  $contact_info .= ( $atts['label'] == '' )? '' : '<strong>'.$atts['label'].' </strong>';
			  $contact_info .= get_option( 'rdContactFax' ).'<br />';
		  }
	}  
	  
	  return $contact_info;
}
endif; // END FUNCTION rd_contact_fax_shortcode


/********************************************************************************************/


/**
 * Displays the email address if one is provided in the settings panel
 *
 * @param		label		The label to display in front of the email address.
 * @param		link		true to add a "mailto:" link to the email, false to just show the address (default = true).
 */
if ( !function_exists( 'rd_contact_email_shortcode' ) ):
function rd_contact_email_shortcode($attr, $content)
{
	$atts = shortcode_atts( array( 'label' => '', 'link' => 'true' ), $attr );
	$contact_info = '';
	if ( get_option( 'rdContactOverride' ) == '1' || get_option( 'rdShowContactEmail' ) == '1' )
	{
	  if ( get_option( 'rdContactEmail' ) != '' )
	  {
		  $contact_info .= ( $atts['label'] == '' )? '' : '<strong>'.$atts['label'].' </strong>';
		  if ($atts['link'] == 'true')
		  {
			  $contact_info .= '<a href="mailto:'.get_option( 'rdContactEmail' ).'">'.get_option( 'rdContactEmail' ).'</a>'.'<br />';
		  }
		  else
		  {
		  	 $contact_info .= get_option( 'rdContactEmail' ).'<br />';
		  }
	  }
	}  
	  
	  return $contact_info;
}
endif; // END FUNCTION rd_contact_email_shortcode


/********************************************************************************************/


/**
 * Displays the address provided in the settings panel.
 *
 * @param		label		The label displayed *above* the address.
 */
if ( !function_exists( 'rd_contact_address_shortcode' ) ):
function rd_contact_address_shortcode( $attr, $content )
{
	$atts = shortcode_atts( array( 'label' => '' ), $attr);
	$contact_info = '';
	if ( get_option( 'rdContactOverride' ) == '1' || get_option( 'rdShowContactAddress' ) == '1' )
	{
		if (		get_option( 'rdContactStreet' ) != '' ||
				get_option( 'rdContactCity' ) != '' ||
				get_option( 'rdContactState' ) != '' ||
				get_option( 'rdContactZip' ) != '' )
		{
			$contact_info .= ( $atts['label'] == '' )? '' : '<strong>'.$atts['label'].'</strong><br />';
			$contact_info .= ( get_option( 'rdContactStreet' ) == '' )? '' : get_option( 'rdContactStreet' ).'<br />';
			if ( get_option( 'rdContactCity' ) != '' && get_option( 'rdContactState' ) != '' )
			{
				$contact_info .= get_option( 'rdContactCity' ).', '.get_option( 'rdContactState' ).' ';
			}
			else
			{
				$contact_info .= ( get_option( 'rdContactCity' ) == '' )? '' : get_option( 'rdContactCity' ).' ';
				$contact_info .= ( get_option( 'rdContactState' ) == '' )? '' : get_option( 'rdContactState' ).' ';
			}
			$contact_info .= ( get_option( 'rdContactZip' ) == '' )? '' : get_option( 'rdContactZip' );
		}
	}
	
	return $contact_info.'<br />';
}
endif; // END FUNCTION rd_contact_address_shortcode
?>