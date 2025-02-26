<?php	
/**
 * @package Internals
 */

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

class PostData
{
	//Post Initial Form to DB
	public function post_initial_form_db($formId)
	{
		// Sanity Check
		if(empty($formId))
		{
			return false;
		}

		global $wpdb;
		$table_prefix = $wpdb->prefix;
		$git_form_data = $table_prefix.'git_formdata';

		$FormQuery = "SELECT * FROM $git_form_data WHERE " . "Form_Type = "."'initial'";
		
		$IniFormData = $wpdb->get_row($FormQuery);	
		
		if(empty($IniFormData))
		{
			$wpdb->insert($git_form_data,
				array(
					'Form_Name'     	=> 'GIT Form1',
					'Form_Label'     	=> '',
					'Form_Data'     	=> $formId,
					'Form_Options'     	=> '',
					'Mail_Subject'     	=> '',
					'Mail_Sender_Name' 	=> '',
					'Mail_Sender_Email'	=> '',
					'User_IP' 			=> $_SERVER['REMOTE_ADDR'], 
					'Form_Time'     	=> date('Y-m-d H:i:s'),
					'Form_Type' 		=> 'initial',
					'Input_Ids' 		=> '',
					'Form_MailData'     => '',
					'Form_Recipient'    => '',
					'Function_Name'    => '',
					'Shortcode_Name'    => '',
					'Form_Status'     	=> 'pending'
					),
				array('%s', '%s', '%s',	'%s', '%s',	'%s', '%s',	'%s', '%s',	'%s', '%s',	'%s', '%s',	'%s', '%s',	'%s')  
				); 	

				$formId = $wpdb->insert_id;	
				echo $formId;	
				die;		
		}		
	}

	//Post Form Data
	public function insert_form_data_to_db($f_l, $f_ti, $f_data, $FormMiscSeriliazedData, $map_check, $m_sub, $m_sen_n, $m_sen_e, $i_f_m_msg, $m_c_t_u, $m_reci, $f_i, $l_f_i_i)
	{		
		// Sanity Check
		if(empty($f_data))
		{
			return false;
		}

		global $wpdb;
		$table_prefix = $wpdb->prefix;
		$git_form_data = $table_prefix.'git_formdata';		
		$git_input_data = $table_prefix.'git_inputdata';

		$FormQuery = $wpdb->prepare( "SELECT * FROM $git_form_data WHERE Form_Id = %d;", 1);		
		$IniFormData = $wpdb->get_row($FormQuery);	

		if($f_ti === 'GIT Form1')
		{
			//ShortCode Value Generation				
			$shortcode_form = "["."git_form id=".'"'.$l_f_i_i.'"'."]";			
			$shortcode_map = "["."git_map id=".'"'.$l_f_i_i.'"'."]";

			$SortcodeData = array();			
			if(strlen($f_data) > 6 && $map_check === 'has')
			{
				$SortcodeData['FormSortcode'] = $shortcode_form;	
				$SortcodeData['MapSortcode'] = $shortcode_map;		
			}
			else if(strlen($f_data) > 6 && $map_check !== 'has')
			{
				$SortcodeData['FormSortcode'] = $shortcode_form;	
			}
			else if($map_check === 'has' && strlen($f_data) < 7)
			{								
				$SortcodeData['MapSortcode'] = $shortcode_map;
			}			

			$SerializeSortcodeData = serialize($SortcodeData);

			//Function Value Generation				
			$form_function = "if( function_exists (".' "'."git_form".'" '.") ) git_form(".' "'.$l_f_i_i.'" '.")";				
			$map_function = "if( function_exists (".' "'."git_map".'" '.") ) git_map(".' "'.$l_f_i_i.'" '.")";

			$FunctionData = array();		
			if(strlen($f_data) > 6 && $map_check === 'has')
			{				
				$FunctionData['FormFunction'] = $form_function;
				$FunctionData['MapFunction'] = $map_function;
			}
			else if(strlen($f_data) > 6 && $map_check !== 'has')
			{
				$FunctionData['FormFunction'] = $form_function;
			}			
			else if($map_check === 'has' && strlen($f_data) < 7)
			{				
				$FunctionData['MapFunction'] = $map_function;
			}
			$SerializeFunData = serialize($FunctionData);
				
			$wpdb->update($git_form_data,
					array(
						'Form_Name'     	=> $f_ti,
						'Form_Label'     	=> $f_l,
						'Form_Data'     	=> $f_data,
						'Form_Options'     	=> $FormMiscSeriliazedData,
						'Mail_Subject'     	=> $m_sub,
						'Mail_Sender_Name' 	=> $m_sen_n,
						'Mail_Sender_Email'	=> $m_sen_e,
						'User_IP' 			=> $_SERVER['REMOTE_ADDR'], 
						'Form_Time'     	=> date('Y-m-d H:i:s'),
						'Form_Type' 		=> 'default',
						'Input_Ids' 		=> '',
						'Form_MailData'     => $i_f_m_msg,
						'Mail_Copy_To_User' => $m_c_t_u,
						'Form_Recipient'    => $m_reci,
						'Function_Name'    	=> $SerializeFunData,
						'Shortcode_Name'    => $SerializeSortcodeData,
						'Form_Status'     	=> 'active'
						),
					array(
						'Form_Type'      	=> 'initial'
						),
					$format = null, $where_format = null );																						
		}
		else
		{
			//ShortCode Insert				
			$shortcode_form = "["."git_form id=".'"'.$l_f_i_i.'"'."]";			
			$shortcode_map = "["."git_map id=".'"'.$l_f_i_i.'"'."]";

			$SortcodeData = array();			
			if(strlen($f_data) > 6 && $map_check === 'has')
			{
				$SortcodeData['FormSortcode'] = $shortcode_form;	
				$SortcodeData['MapSortcode'] = $shortcode_map;		
			}
			else if(strlen($f_data) > 6 && $map_check !== 'has')
			{
				$SortcodeData['FormSortcode'] = $shortcode_form;	
			}
			else if($map_check === 'has' && strlen($f_data) < 7)
			{								
				$SortcodeData['MapSortcode'] = $shortcode_map;
			}			

			$SerializeSortcodeData = serialize($SortcodeData);

			$form_function = "if( function_exists (".' "'. "git_form" .'" '.") ) git_form(".' "'.$l_f_i_i.'" '.")";				
			$map_function = "if( function_exists (".' "'."git_map".'" '.") ) git_map(".' "'.$l_f_i_i.'" '.")";

			$FunctionData = array();		
			if(strlen($f_data) > 6 && $map_check === 'has')
			{				
				$FunctionData['FormFunction'] = $form_function;
				$FunctionData['MapFunction'] = $map_function;
			}
			else if(strlen($f_data) > 6 && $map_check !== 'has')
			{
				$FunctionData['FormFunction'] = $form_function;
			}			
			else if($map_check === 'has' && strlen($f_data) < 7)
			{				
				$FunctionData['MapFunction'] = $map_function;
			}
			$SerializeFunData = serialize($FunctionData);		

			$wpdb->update($git_form_data,
					array(
						'Form_Name'     	=> $f_ti,
						'Form_Label'     	=> $f_l,
						'Form_Data'     	=> $f_data,
						'Form_Options'     	=> $FormMiscSeriliazedData,
						'Mail_Subject'     	=> $m_sub,
						'Mail_Sender_Name' 	=> $m_sen_n,
						'Mail_Sender_Email'	=> $m_sen_e,
						'User_IP' 			=> $_SERVER['REMOTE_ADDR'], 
						'Form_Time'     	=> date('Y-m-d H:i:s'),
						'Form_Type' 		=> 'default',
						'Input_Ids' 		=> '',
						'Form_MailData'     => $i_f_m_msg,
						'Mail_Copy_To_User' => $m_c_t_u,
						'Form_Recipient'    => $m_reci,
						'Function_Name'    	=> $SerializeFunData,
						'Shortcode_Name'    => $SerializeSortcodeData,
						'Form_Status'     	=> 'active'
						),
					array(
						'Form_Data'      	=> $f_i
						),
					$format = null, $where_format = null );		
		}				
		//Update Pending Input Data to Active
		$wpdb->update($git_input_data,
					array(						
						'Input_Status'     	=> 'active'
						),
					array(
						'Form_Id'      	=> $l_f_i_i
						),
					$format = null, $where_format = null );	
		die;		
	}

	//Update Form Data
	public function update_form_data_to_db($u_f_l, $u_f_t, $u_f_d, $f_m_u_s_d, $u_m_s, $u_m_s_n, $u_m_s_e, $u_i_f_m_m, $u_m_c_t_u_c, $u_m_r, $f_i_f_u)
	{		
		// Sanity Check
		if(empty($u_f_d))
		{
			return false;
		}

		global $wpdb;
		$table_prefix = $wpdb->prefix;
		$git_form_data = $table_prefix.'git_formdata';		
		$git_input_data = $table_prefix.'git_inputdata';		
		
		$wpdb->update($git_form_data,
					array(
						'Form_Name'     	=> $u_f_t,
						'Form_Label'     	=> $u_f_l,
						'Form_Data'     	=> $u_f_d,
						'Form_Options'     	=> $f_m_u_s_d,
						'Mail_Subject'     	=> $u_m_s,
						'Mail_Sender_Name' 	=> $u_m_s_n,
						'Mail_Sender_Email'	=> $u_m_s_e,
						'User_IP' 			=> $_SERVER['REMOTE_ADDR'], 
						'Form_Time'     	=> date('Y-m-d H:i:s'),
						'Form_Type' 		=> 'default',
						'Input_Ids' 		=> '',
						'Form_MailData'     => $u_i_f_m_m,
						'Mail_Copy_To_User' => $u_m_c_t_u_c,
						'Form_Recipient'    => $u_m_r,
						'Form_Status'     	=> 'active'
						),
					array(
						'Form_Id'      	=> $f_i_f_u
						),
					$format = null, $where_format = null );								

		//Update Pending Input Data to Active
		$wpdb->update($git_input_data,
					array(						
						'Input_Status'     	=> 'active'
						),
					array(
						'Form_Id'      	=> $f_i_f_u
						),
					$format = null, $where_format = null );	
		die;		
	}

	// Insert Input Data to DB
	public function insert_input_field_to_db($SeriliazedData, $form_id, $input_type, $inserted_Id)
	{		
		// Sanity Check
		if(empty($form_id))
		{
			return false;
		}	

		global $wpdb;
		$table_prefix = $wpdb->prefix;
		$git_input_data = $table_prefix.'git_inputdata';

		$wpdb->insert($git_input_data,
					array(
						'Input_Data'     	=> $SeriliazedData,
						'User_IP' 			=> $_SERVER['REMOTE_ADDR'], 
						'Input_Time'     	=> date('Y-m-d H:i:s'),
						'Form_Id' 			=> $inserted_Id,
						'Input_Type' 		=> $input_type,
						'Input_Status'     	=> 'pending'
						),
					array('%s',	'%s', '%s', '%s', '%s')   
					); 	
					die;				
	}	

	//Get all input Field from DB
	public function get_input_field_from_db($input_type)
	{
		// Sanity Check
		if(empty($input_type))
		{
			return false;
		}	

		global $wpdb;

		$type = "'". $input_type . "'";

		$git_input_data = $wpdb->prefix.'git_inputdata';
		
		$Query = "SELECT * FROM $git_input_data WHERE " . "Input_Type = " . $type;

		$InpuData = $wpdb->get_row($Query);	

		return $InpuData;	
	}

	//Get all input Data from DB
	public function get_all_input_field_from_db()
	{
		global $wpdb;

		$git_input_data = $wpdb->prefix.'git_inputdata';
		
		$Query = "SELECT * FROM $git_input_data";

		$InpuData = $wpdb->get_results($Query);	

		return $InpuData;	
		die;
	}

	//Count all input Data from DB
	public function count_input_fields_from_db($input_type, $form_id_counter)
	{	
		// Sanity Check
		if(empty($input_type))
		{
			return false;
		}	

		global $wpdb;

		$active = "'active'";

		$type = "'". $input_type . "'";		

		$git_input_data = $wpdb->prefix.'git_inputdata';		

		$CountInputId = $wpdb->get_var("SELECT COUNT(Input_Id) FROM $git_input_data  WHERE " . "Input_Type = " . $type . " AND " . "Form_Id = " . $form_id_counter . " AND " . "Input_Status = " . $active);
		
		echo $CountInputId;	
		die;			
	}

	//Count Unique Form ID from Input Table in DB
	public function count_form_id_for_input()
	{			
		global $wpdb;

		$active = 'active';

		$git_input_data = $wpdb->prefix.'git_inputdata';	
		$git_form_data = $wpdb->prefix.'git_formdata';		

		$wpdb->delete( $git_form_data, array('Form_Status' => 'pending'), array( '%s'));

		$wpdb->delete( $git_input_data, array('Input_Status' => 'pending'), array( '%s'));	

		$Query = $wpdb->prepare( "SELECT DISTINCT(Form_Id) FROM $git_form_data WHERE Form_Status = %s;", $active);

		$UniqueFormId = $wpdb->get_results($Query);	

		echo count($UniqueFormId);
		die;	
	}

	//Count Form Id from Form Data table in DB
	public function count_form_id()
	{
		global $wpdb;

		$git_form_data = $wpdb->prefix.'git_formdata';		

		$CountFormId = $wpdb->get_var("SELECT COUNT(Form_Id) FROM $git_form_data");
		
		return $CountFormId;	
		die;
	}

	//Delete Form from DB based on ID
	public function delete_form_from_db($id)
	{
		// Sanity Check
		if(empty($id))
		{
			return false;
		}	

		global $wpdb;

		$git_form_data = $wpdb->prefix.'git_formdata';		
		$git_input_data = $wpdb->prefix.'git_inputdata';			

		$wpdb->delete( $git_form_data, array('Form_Id' => $id), array( '%d'));

		$wpdb->delete( $git_input_data, array('Form_Id' => $id), array( '%d'));
		
		return true;
	}

	// Create a copy of this form
	public function create_copy_of_this_form($form_id)
	{
		// Sanity Check
		if(empty($form_id))
		{
			return false;
		}	
		
		global $wpdb;
		$git_form_data = $wpdb->prefix.'git_formdata';		
		$git_input_data = $wpdb->prefix.'git_inputdata';			

		$QueryforFormData = $wpdb->prepare( "SELECT * FROM $git_form_data WHERE Form_Id = %d", $form_id);
		$formdata = $wpdb->get_row($QueryforFormData);	

		$QueryforInputData = $wpdb->prepare( "SELECT * FROM $git_input_data WHERE Form_Id = %d", $form_id);
		$inputdata = $wpdb->get_results($QueryforInputData);

		if($formdata->Form_Type === 'default')
		{
			$wpdb->insert($git_form_data,
				array(
					'Form_Name'     	=> $formdata->Form_Name.'_copy',
					'Form_Label'     	=> $formdata->Form_Label.'_copy',
					'Form_Data'     	=> $formdata->Form_Data,
					'Form_Options'     	=> $formdata->Form_Options,
					'Mail_Subject'     	=> $formdata->Mail_Subject,
					'Mail_Sender_Name' 	=> $formdata->Mail_Sender_Name,
					'Mail_Sender_Email'	=> $formdata->Mail_Sender_Email,
					'User_IP' 			=> $formdata->User_IP, 
					'Form_Time'     	=> $formdata->Form_Time,
					'Form_Type' 		=> 'copy',
					'Input_Ids' 		=> $formdata->Input_Ids,
					'Form_MailData'     => $formdata->Form_MailData,
					'Mail_Copy_To_User' => $formdata->Mail_Copy_To_User,
					'Form_Recipient'    => $formdata->Form_Recipient,
					'Function_Name'    	=> 'test',
					'Shortcode_Name'    => 'test',
					'Form_Status'     	=> $formdata->Form_Status
					),
				array('%s', '%s', '%s',	'%s', '%s',	'%s', '%s',	'%s', '%s',	'%s', '%s',	'%s', '%s', '%s', '%s', '%s', '%s' )  
				); 	

				$form_id = $wpdb->insert_id;	
		}
		
		for($i = 0; $i <= (count($inputdata)-1); $i++)
		{
			$wpdb->insert($git_input_data,
				array(
					'Input_Data'     	=> $inputdata[$i]->Input_Data,
					'User_IP'     		=> $inputdata[$i]->User_IP,
					'Input_Time'     	=> $inputdata[$i]->Input_Time,
					'Form_Id'     		=> $form_id,
					'Input_Type'     	=> $inputdata[$i]->Input_Type,					
					'Input_Status'     	=> $inputdata[$i]->Input_Status
					),
				array('%s', '%s', '%s',	'%s', '%s',	'%s')  
				); 	
		}

		$FuncData = unserialize($formdata->Function_Name);
		if(!empty($FuncData['FormFunction']) && !empty($FuncData['MapFunction']))
		{
			$FormF = $FuncData['FormFunction'];		
			$form_function = "if( function_exists (".' "'. "git_form" .'" '.") ) git_form(".' "'.$form_id.'" '.")";							

			$MapF = $FuncData['MapFunction'];
			$map_function = "if( function_exists (".' "'. "git_map" .'" '.") ) git_map(".' "'.$form_id.'" '.")";

			$FormF = str_replace($FormF, $FormF, $form_function);
			$MapF = str_replace($MapF, $MapF, $map_function);

			$FunctionData = array();		
				
			$FunctionData['FormFunction'] = $FormF;
			$FunctionData['MapFunction'] = $MapF;

			$NewSerializeFData = serialize($FunctionData);
		}
		else if(empty($FuncData['FormFunction']) && !empty($FuncData['MapFunction']))
		{	
			$MapF = $FuncData['MapFunction'];
			$map_function = "if( function_exists (".' "'. "git_map" .'" '.") ) git_map(".' "'.$form_id.'" '.")";

			$MapF = str_replace($MapF, $MapF, $map_function);

			$FunctionData = array();		

			$FunctionData['MapFunction'] = $MapF;

			$NewSerializeFData = serialize($FunctionData);
		}
		else if(!empty($FuncData['FormFunction']) && empty($FuncData['MapFunction']))
		{
			$FormF = $FuncData['FormFunction'];		
			$form_function = "if( function_exists (".' "'. "git_form" .'" '.") ) git_form(".' "'.$form_id.'" '.")";							
		
			$FormF = str_replace($FormF, $FormF, $form_function);

			$FunctionData = array();		
				
			$FunctionData['FormFunction'] = $FormF;

			$NewSerializeFData = serialize($FunctionData);	
		}		

		$ShortcodeData = unserialize($formdata->Shortcode_Name);
		if(!empty($ShortcodeData['FormSortcode']) && !empty($ShortcodeData['MapSortcode']))
		{
			$FormM = $ShortcodeData['FormSortcode'];		
			$shortcode_form = "["."git_form id=".'"'.$form_id.'"'."]";			

			$MapM = $ShortcodeData['MapSortcode'];
			$shortcode_map = "["."git_map id=".'"'.$form_id.'"'."]";

			$FormM = str_replace($FormM, $FormM, $shortcode_form);
			$MapM = str_replace($MapM, $MapM, $shortcode_map);

			$SortcodeData = array();		
				
			$SortcodeData['FormSortcode'] = $FormM;
			$SortcodeData['MapSortcode'] = $MapM;

			$NewSerializeMData = serialize($SortcodeData);
		}
		else if(empty($ShortcodeData['FormSortcode']) && !empty($ShortcodeData['MapSortcode']))
		{			
			$MapM = $ShortcodeData['MapSortcode'];
			$shortcode_map = "["."git_map id=".'"'.$form_id.'"'."]";
	
			$MapM = str_replace($MapM, $MapM, $shortcode_map);

			$SortcodeData = array();		
		
			$SortcodeData['MapSortcode'] = $MapM;

			$NewSerializeMData = serialize($SortcodeData);
		}
		else if(!empty($ShortcodeData['FormSortcode']) && empty($ShortcodeData['MapSortcode']))
		{
			$FormM = $ShortcodeData['FormSortcode'];		
			$shortcode_form = "["."git_form id=".'"'.$form_id.'"'."]";			
		
			$FormM = str_replace($FormM, $FormM, $shortcode_form);

			$SortcodeData = array();		
				
			$SortcodeData['FormSortcode'] = $FormM;

			$NewSerializeMData = serialize($SortcodeData);
		}		

		//Update Form for function and shortcode
		$wpdb->update($git_form_data,
					array(						
						'Function_Name'     	=> $NewSerializeFData,
						'Shortcode_Name'     	=> $NewSerializeMData
						),
					array(
						'Form_Id'      			=> $form_id
						),
					$format = null, $where_format = null );	

		return true;
	}

	//Reset Auto Increment Id
	public function reset_auto_increment()
	{
		global $wpdb;

		$git_form_data = $wpdb->prefix.'git_formdata';		
		$git_input_data = $wpdb->prefix.'git_inputdata';			

		$ResetAutoIncrementFormTable = "ALTER TABLE $git_form_data AUTO_INCREMENT = 1";
		$ResetAutoIncrementInputTable = "ALTER TABLE $git_input_data AUTO_INCREMENT = 1";

		$wpdb->query($ResetAutoIncrementFormTable);
		$wpdb->query($ResetAutoIncrementInputTable);
	}
}
?>