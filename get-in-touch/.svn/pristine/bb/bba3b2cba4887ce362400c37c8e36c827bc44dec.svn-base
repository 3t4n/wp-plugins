<?php
namespace git;

//Create a Object of Class to call method to insert data		
$PostClass = new PostData();	

//Post Initial Form Data
if(isset($_POST["form_submit"]))
{
	if($_POST["form_submit"] === "initial")
	{		
		$formId = $_POST['form_id'];
		//Calling Function to Post Initial Form
		$PostClass->post_initial_form_db($formId);
	}
}

//Reset Auto Increment Id
if(isset($_POST["reset_id"]))
{
	if($_POST["reset_id"] === "reset_id")
	{		
		//Calling Function to Reset Auto Increment Id to 1
		$PostClass->reset_auto_increment();

	}	
}

//Process to delete all form data
if(isset($_POST["delete_all_form_data"]))
{
	if($_POST["delete_all_form_data"] === "true")
	{		
		//Calling Function to Delete all For Data
		$PostClass->delete_all_contact_form_data();
	}
}

if(isset($_POST["type"]))
{
	if($_POST['type'] === 'map')
	{
		//Get the value to insert
		$latitude 		= $_POST['latitude'];
		$longitude 		= $_POST['longitude'];		
		$height 		= $_POST['height'];
		$width 			= $_POST['width'];
		$title 			= $_POST['title'];
		$zoom 			= $_POST['zoom'];
		$scrollwheel 	= $_POST['scrollwheel'];
		$clickable 		= $_POST['clickable'];
		$form_id 		= $_POST['form_id'];
		$input_type		= $_POST['type'];
		$inserted_Id	= $_POST['inserted_Id'];

		$UnseriliazedData = array(
			'latitude' 		=> 	$latitude,
			'longitude' 	=> 	$longitude,			
			'height' 		=> 	$height,
			'width' 		=> 	$width,
			'title' 		=> 	$title,
			'zoom' 			=> 	$zoom,
			'scrollwheel' 	=> 	$scrollwheel,
			'clickable' 	=> 	$clickable
			);			
	}
	else if($_POST['type'] === 'captcha')
	{
		//Get the value to insert
		$publickey 			= $_POST['publickey'];
		$privatekey 		= $_POST['privatekey'];		
		$theme 				= $_POST['theme'];
		$language 			= $_POST['language'];		
		$form_id 			= $_POST['form_id'];
		$input_type			= $_POST['type'];
		$inserted_Id		= $_POST['inserted_Id'];

		$UnseriliazedData = array(
			'publickey' 		=> 	$publickey,
			'privatekey' 		=> 	$privatekey,			
			'theme' 			=> 	$theme,
			'language' 			=> 	$language
			);			
	}
	else
	{
		//Get the value to insert
		$name 			= $_POST['name'];
		$id 			= $_POST['id'];
		$class 			= $_POST['cls'];
		$size 			= $_POST['size'];
		$maxlen 		= $_POST['maxlen'];
		$label 			= $_POST['label'];
		$check 			= $_POST['check'];
		$placeholder    = $_POST['placeholder'];
		$form_id 		= $_POST['form_id'];
		$input_type		= $_POST['type'];
		$inserted_Id	= $_POST['inserted_Id'];

		$UnseriliazedData = array(
			'name' 			=> 	$name,
			'id' 			=> 	$id,
			'class' 		=> 	$class,
			'size' 			=> 	$size,
			'maxlen' 		=> 	$maxlen,
			'label' 		=> 	$label,
			'check' 		=> 	$check,
			'placeholder' 	=> 	$placeholder
			);					
	}

	if(!empty($UnseriliazedData))
	{						
		$SeriliazedData = serialize($UnseriliazedData);	

		//Calling Function Submit Input Fields
		$PostClass->insert_input_field_to_db($SeriliazedData, $form_id, $input_type, $inserted_Id);				
	}
}		

if(isset($_POST['form_title']) && isset($_POST['form_data']) && isset($_POST['map_check']) && isset($_POST['mail_subject']) && 
	isset($_POST['mail_sender_name']) && isset($_POST['mail_sender_email']) && isset($_POST['ini_form_mail_message']) && isset($_POST['mail_copy_to_user_check']) && 
	isset($_POST['mail_recipient']) && isset($_POST['form_id_counter']) && isset($_POST['last_form_inserted_id']) && isset($_POST['user_form_width']) && isset($_POST['user_form_loader'])
	&& isset($_POST['user_form_hide']) && isset($_POST['user_form_lebels']) && isset($_POST['user_form_placeholder']) && isset($_POST['user_form_captcha']))
{
	// Post Form Data to DB	
	$form_label 			= $_POST['form_label'];
	$form_title 			= $_POST['form_title'];
	$form_data 				= $_POST['form_data'];
	$map_check              = $_POST['map_check'];
	$mail_subject 			= $_POST['mail_subject'];
	$mail_sender_name 		= $_POST['mail_sender_name'];
	$mail_sender_email 		= $_POST['mail_sender_email'];
	$ini_form_mail_message  = $_POST['ini_form_mail_message'];
	$mail_copy_to_user_check= $_POST['mail_copy_to_user_check'];
	$mail_recipient 		= $_POST['mail_recipient'];
	$FormIDForInputFields   = $_POST['form_id_counter'];
	$last_form_inserted_id  = $_POST['last_form_inserted_id'];

	$user_form_width  		= $_POST['user_form_width'];
	$user_form_loader  		= $_POST['user_form_loader'];
	$user_form_hide  		= $_POST['user_form_hide'];		
	$user_form_lebels 		= $_POST['user_form_lebels'];
	$user_form_placeholder	= $_POST['user_form_placeholder'];
	$user_form_captcha		= $_POST['user_form_captcha'];
	
	$user_button_text  					= $_POST['user_button_text'];
	$user_button_color  				= $_POST['user_button_color'];
	$user_success_text  				= $_POST['user_success_text'];
	$user_error_validation_text  		= $_POST['user_error_validation_text'];
	$user_error_email_validation_text  	= $_POST['user_error_email_validation_text'];
	$git_mail_form_required_fields_text = $_POST['git_mail_form_required_fields_text'];
	$git_check_for_stor_contact_form_data = $_POST['git_check_for_stor_contact_form_data'];
				
	$FormMiscUnseriliazedData = array(
									'form_width' 							=> $user_form_width,
		 							'form_loader' 							=> $user_form_loader,
		 							'form_hide' 							=> $user_form_hide,		 									 							
		 							'form_labels' 							=> $user_form_lebels,
		 							'form_placeholder' 						=> $user_form_placeholder,	
		 							'form_captcha' 							=> $user_form_captcha,			 								 							
									'button_text' 							=> $user_button_text,
		 							'button_color' 							=> $user_button_color,
		 							'user_success_text' 					=> $user_success_text,
		 							'user_error_validation_text' 			=> $user_error_validation_text,
		 							'user_error_email_validation_text' 		=> $user_error_email_validation_text,
		 							'git_mail_form_required_fields_text' 	=> $git_mail_form_required_fields_text,
		 							'git_check_for_stor_contact_form_data' 	=> $git_check_for_stor_contact_form_data
		 								);	

	if(!is_null($form_data))
	{						
		$FormMiscSeriliazedData = serialize($FormMiscUnseriliazedData);	

		//Calling Function Submit Form Data
		$PostClass->insert_form_data_to_db($form_label, $form_title, $form_data, $FormMiscSeriliazedData, $map_check, $mail_subject, $mail_sender_name,
		$mail_sender_email, $ini_form_mail_message, $mail_copy_to_user_check, $mail_recipient, $FormIDForInputFields, $last_form_inserted_id);					
	}
}

if(isset($_POST['up_form_title']) && isset($_POST['up_form_data']) && isset($_POST['up_mail_subject']) && isset($_POST['up_mail_sender_name']) && 
	isset($_POST['up_mail_sender_email']) && isset($_POST['up_ini_form_mail_message']) && isset($_POST['up_mail_copy_to_user_check']) && 
	isset($_POST['up_mail_recipient']) && isset($_POST['Form_Id_For_Updation'])&& isset($_POST['user_form_width']) && isset($_POST['user_form_loader'])
	&& isset($_POST['user_form_hide']) && isset($_POST['user_form_lebels']) && isset($_POST['user_form_placeholder']) && isset($_POST['user_form_captcha']))
{
	// Get the Update Data from Form to Update
	$up_form_label 				= $_POST['up_form_label'];
	$up_form_title 				= $_POST['up_form_title'];
	$up_form_data 				= $_POST['up_form_data'];
	$up_mail_subject 			= $_POST['up_mail_subject'];
	$up_mail_sender_name 		= $_POST['up_mail_sender_name'];
	$up_mail_sender_email 		= $_POST['up_mail_sender_email'];
	$up_ini_form_mail_message   = $_POST['up_ini_form_mail_message'];
	$up_mail_copy_to_user_check = $_POST['up_mail_copy_to_user_check'];
	$up_mail_recipient 		    = $_POST['up_mail_recipient'];
	$Form_Id_For_Updation       = $_POST['Form_Id_For_Updation'];

	$user_form_width  		= $_POST['user_form_width'];
	$user_form_loader  		= $_POST['user_form_loader'];
	$user_form_hide  		= $_POST['user_form_hide'];		
	$user_form_lebels 		= $_POST['user_form_lebels'];
	$user_form_placeholder	= $_POST['user_form_placeholder'];
	$user_form_captcha		= $_POST['user_form_captcha'];

	$user_button_text  					= $_POST['user_button_text'];
	$user_button_color  				= $_POST['user_button_color'];
	$user_success_text  				= $_POST['user_success_text'];
	$user_error_validation_text  		= $_POST['user_error_validation_text'];
	$user_error_email_validation_text  	= $_POST['user_error_email_validation_text'];
	$git_mail_form_required_fields_text = $_POST['git_mail_form_required_fields_text'];
	$git_check_for_stor_contact_form_data = $_POST['git_check_for_stor_contact_form_data'];

	$FormMiscUpdateUnseriliazedData = array(
									'form_width' 							=> $user_form_width,
		 							'form_loader' 							=> $user_form_loader,
		 							'form_hide' 							=> $user_form_hide,		 									 							
		 							'form_labels' 							=> $user_form_lebels,
		 							'form_placeholder' 						=> $user_form_placeholder,		 							
									'form_captcha' 							=> $user_form_captcha,	
									'button_text' 							=> $user_button_text,
		 							'button_color' 							=> $user_button_color,
		 							'user_success_text' 					=> $user_success_text,
		 							'user_error_validation_text' 			=> $user_error_validation_text,
		 							'user_error_email_validation_text' 		=> $user_error_email_validation_text,
		 							'git_mail_form_required_fields_text' 	=> $git_mail_form_required_fields_text,
		 							'git_check_for_stor_contact_form_data' 	=> $git_check_for_stor_contact_form_data
		 								);	

	if(!is_null($up_form_data))
	{					
		$FormMiscUpdateSeriliazedData = serialize($FormMiscUpdateUnseriliazedData);			

		//Calling Function Upadte Form Data
		$PostClass->update_form_data_to_db($up_form_label, $up_form_title, $up_form_data, $FormMiscUpdateSeriliazedData, $up_mail_subject, $up_mail_sender_name,
		$up_mail_sender_email, $up_ini_form_mail_message, $up_mail_copy_to_user_check, $up_mail_recipient, $Form_Id_For_Updation);					
	}
}

if(isset($_GET["count_input"]))
{
	if($_GET["count_input"] == "count_input_id")
	{			
		$input_type 		= $_GET["input_type"];
		$form_id_counter    = $_GET["form_id_counter"];

		//Calling Function Get All Input Fields
		$PostClass->count_input_fields_from_db($input_type, $form_id_counter);
	}
}

if(isset($_GET["count_form"]))
{
	if($_GET["count_form"] == "count_form_id")
	{							
		//Calling Function Get All Input Fields
		$Value = $PostClass->count_form_id_for_input();
	}
}


