<?php
/**
 * @package Internals
 */

class GetData
{
	//Get all form Data from DB
	public function get_all_forms_from_db()
	{
		global $wpdb;

		$active = 'active';

		$git_form_data = $wpdb->prefix.'git_formdata';
		
		$Query = $wpdb->prepare( "SELECT * FROM $git_form_data WHERE Form_Status = %s;", $active);		

		$FormData = $wpdb->get_results($Query);	

		return $FormData;	
	}

	//Function to get Form Data According to Form Id
	public function get_form_details_by_id($form_id)
	{		
		// Sanity Check
		if(empty($form_id))
		{
			return false;
		}
		global $wpdb;

		$active = 'active';	

		$git_form_data = $wpdb->prefix.'git_formdata';
		
		$QueryforFormData = $wpdb->prepare( "SELECT * FROM $git_form_data WHERE Form_Id = %d AND Form_Status = %s", $form_id, $active);

		$formdata = $wpdb->get_row($QueryforFormData);	

		return $formdata;	
	}

	//Function to get Input Data According to Form Id
	public function get_input_details_by_id($form_id)
	{	
		// Sanity Check
		if(empty($form_id))
		{
			return false;
		}	
		global $wpdb;

		$active = 'active';	

		$git_input_data = $wpdb->prefix.'git_inputdata';

		$QueryforInputData = $wpdb->prepare( "SELECT * FROM $git_input_data WHERE Form_Id = %d AND Input_Status = %s", $form_id, $active);
		
		$inputdata = $wpdb->get_results($QueryforInputData);			

		return $inputdata;
	}

	//Function to get Input Data According to Form Id for Captcha
	public function get_captcha_details_by_id($form_id)
	{	
		// Sanity Check
		if(empty($form_id))
		{
			return false;
		}	
		global $wpdb;

		$active = 'active';	
		$captcha = 'captcha';	

		$git_input_data = $wpdb->prefix.'git_inputdata';

		$QueryforCaptcha = $wpdb->prepare( "SELECT * FROM $git_input_data WHERE Form_Id = %d AND Input_Status = %s AND Input_Type = %s", $form_id, $active, $captcha);
		
		$inputdata = $wpdb->get_row($QueryforCaptcha);			

		return $inputdata;
	}

	public function get_map_details_by_id($form_id)
	{
		// Sanity Check
		if(empty($form_id))
		{
			return false;
		}

		global $wpdb;

		$data = array();

		$active = 'active';	
		$map = 'map';

		$git_input_data = $wpdb->prefix.'git_inputdata';
		
		$QueryforInputMap = $wpdb->prepare( "SELECT * FROM $git_input_data WHERE Form_Id = %d AND Input_Status = %s AND Input_Type = %s", $form_id, $active, $map);

		$inputmap = $wpdb->get_results($QueryforInputMap);			

		return $inputmap;
	}

	// Get All Contact Form Data
	public function GetAllContactFormData()
	{
		global $wpdb;

		$active = 'active';

		$git_contact_form_data = $wpdb->prefix.'git_contact_form_data';
		
		$Query = $wpdb->prepare( "SELECT * FROM $git_contact_form_data WHERE ContactForm_Status = %s ORDER BY Form_RatingData DESC", $active);	

		$ContactFormData = $wpdb->get_results($Query);	

		return $ContactFormData;	

	}
}
?>