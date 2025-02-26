<?php	
/**
 * @package Internals
 */

if(isset($_POST['dataobj']) && isset($_POST['form_id']) && isset($_POST['usermail']))
{	
	if(isset($_POST['captchadata']))
	{		
		$captchadata = $_POST['captchadata'];
		
		if(!empty($captchadata))
		{
			$CaptchaData = array();

			foreach($captchadata as $captchadetail)
			{
				if($captchadetail['name'] === 'recaptcha_challenge_field')
				{
					$CaptchaData['recaptcha_challenge_field'] = $captchadetail['value'];
				}
				if($captchadetail['name'] === 'recaptcha_response_field')
				{
					$CaptchaData['recaptcha_response_field'] = $captchadetail['value'];
				}
				if($captchadetail['name'] === 'git_captcha_privatekey')
				{
					$CaptchaData['git_captcha_privatekey'] = $captchadetail['value'];
				}
			}				
			$Res = ValidateCaptcha($CaptchaData);
			if($Res != true)
			{			
				return false;
				die;
			}
		}		
	}

	$Data = $_POST['dataobj'];
	$form_id = $_POST['form_id'];
	$UsermailId = $_POST['usermail'];
	$db_check = $_POST['db_check'];	
	if(!empty($Data))
	{	
		$StorKey = array();
		$StorValue = array();
		$i = 0;

		foreach($Data as $key => $value)
		{
			$StorKey[$i] = $key;
			$StorValue[$i] = $value;
			$i++;
		}
		if($StorValue[0] != '' && $StorValue[0] != ' ')
		{
			if($db_check === 'true')
			{
				// Calling function to Insert Data
				insert_contactform_data_to_db($Data, $form_id);
			}			

			// Call Function to Send Mail
			SendMail($Data, $form_id, $UsermailId);			
			die;
		}
	}
}

if(isset($_POST['form_data_deletion_id']))
{
	$DeletionId = $_POST['form_data_deletion_id'];
	$RetVal = DeleteContactFormData($DeletionId);
	if($RetVal === true) 
	{
		return true;
		die;
	}
	else
	{
		return false;
		die;
	}
}

if(isset($_POST['form_data_important_id']) && isset($_POST['value']))
{
	$FormDataId = $_POST['form_data_important_id'];
	$Value 		= $_POST['value'];

	$RetVal = SetImportantFormData($FormDataId, $Value);
	if($RetVal === true) 
	{
		return true;
		die;
	}
	else
	{
		return false;
		die;
	}
}

// Validate Captcha
function ValidateCaptcha($CaptchaData)
{	
	require_once('recaptchalib.php');  

	$resp = null;
	$error = null;
	
	if ($CaptchaData["recaptcha_response_field"]) 
	{
        $resp = recaptcha_check_answer ($CaptchaData["git_captcha_privatekey"],
                                        $_SERVER["REMOTE_ADDR"],
                                        $CaptchaData["recaptcha_challenge_field"],
                                        $CaptchaData["recaptcha_response_field"]);

        if ($resp->is_valid) 
        {
            return true;
            die;
        } 
        else 
        {            
            $error = $resp->error;
            echo $error;
            die;
        }
	}

}

// Function to Send Mail
function SendMail($Data, $form_id, $UsermailId)
{
	global $wpdb;
	$table_prefix = $wpdb->prefix;
	$git_form_data = $table_prefix.'git_formdata';	
	$git_input_data = $table_prefix.'git_inputdata';	

	$active = 'active';	

	$QueryforFormData = $wpdb->prepare( "SELECT * FROM $git_form_data WHERE Form_Id = %d AND Form_Status = %s", $form_id, $active);	
	$FormData = $wpdb->get_row($QueryforFormData);		

	$QueryforInputData = $wpdb->prepare( "SELECT * FROM $git_input_data WHERE Form_Id = %d AND Input_Status = %s", $form_id, $active);	
	$InputData = $wpdb->get_results($QueryforInputData);		
	
	$git_mail = new PHPMailer();	
		
	$BodyAdmin = 'Below are the details of contact enquiry '.'<br/><br/>';
	$DataLen = count($Data);	
	
	$i = 0;
	foreach($InputData as $input)
	{
		$UnserializedVal = unserialize($input->Input_Data);		
		if(isset($UnserializedVal['label']))
		{
			$BodyAdmin .= $UnserializedVal['label'].': '.$Data[$i].'<br/><br/>';
			$i++;
		}				
	}
	$BodyAdmin .= 'Thanks<br/>';	
	$BodyAdmin .= $FormData->Mail_Sender_Name;	
	
	$subject = $FormData->Mail_Subject;
	$body = $BodyAdmin;		
	
	if($FormData->Mail_Copy_To_User === 'true')
	{
		//$header = 'Content-type: text/html; charset: utf8\r\n'.'MIME-Version: 1.0\r\n'.'From: Get In Touch <'.$FormData->Form_Recipient.'>'."\r\n".'Reply-To: '.$FormData->Form_Recipient."\r\n" .'X-Mailer: PHP/' . phpversion();
		$header  = 'MIME-Version: 1.0' . "\r\n";
		$header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		// Additional header
		$header .= 'To: <'.$UsermailId.'> '."\r\n";
		$header .= 'From: '.$FormData->Mail_Sender_Name.' <'.$FormData->Mail_Sender_Email.'>' . "\r\n";

		$BodyUser = $FormData->Form_MailData.'<br/><br/>';				
		$BodyUser .= 'Thanks<br/>';	
		$BodyUser .= $FormData->Mail_Sender_Name;			
		
		//Admin Mail
		@mail($UsermailId, $subject, $BodyUser, $header);
	}

	$git_mail->AddAddress($FormData->Form_Recipient);

	$git_mail->IsMail();

	$git_mail->CharSet = "UTF-8";

	$git_mail->From = $FormData->Mail_Sender_Email;
	
	$git_mail->FromName = $FormData->Mail_Sender_Name;	

	$git_mail->IsHTML(true);

	$git_mail->Subject  =  $subject;

	$git_mail->Body     =  $body;

	if(!$git_mail->Send())
	{
	   return false;
	   exit;
	}
	return true;
}

// Insert Contact Form Data to DB
function insert_contactform_data_to_db($Data, $form_id)
{	
	global $wpdb;
	$table_prefix = $wpdb->prefix;
	$git_form_data = $table_prefix.'git_formdata';	
	$git_input_data = $table_prefix.'git_inputdata';	
	$git_contact_form_data = $wpdb->prefix.'git_contact_form_data';
	$FinalData = '';

	$active = 'active';	

	$QueryforFormData = $wpdb->prepare( "SELECT * FROM $git_form_data WHERE Form_Id = %d AND Form_Status = %s", $form_id, $active);	
	$FormData = $wpdb->get_row($QueryforFormData);		

	$QueryforInputData = $wpdb->prepare( "SELECT * FROM $git_input_data WHERE Form_Id = %d AND Input_Status = %s", $form_id, $active);	
	$InputData = $wpdb->get_results($QueryforInputData);

	$DataLen = count($Data);	
	
	$i = 0;
	foreach($InputData as $input)
	{
		$UnserializedVal = unserialize($input->Input_Data);		
		if(isset($UnserializedVal['label']))
		{
			$FinalData .= $UnserializedVal['label'].'  :     '.$Data[$i].'<br/>';
			$i++;
		}				
	}

	$SerializeContactFormData = serialize($FinalData);
	
	$wpdb->insert($git_contact_form_data,
				array(
					'ContactForm_Data'     	=> $SerializeContactFormData,
					'User_IP' 				=> $_SERVER['REMOTE_ADDR'], 
					'ContactForm_Time'      => date('Y-m-d H:i:s'),
					'Form_Id' 				=> $form_id,
					'ContactForm_Type' 		=> 'default',
					'Form_RatingData'		=> 'Average',
					'ContactForm_Status'    => 'active'
					),
				array('%s',	'%s', '%s', '%s', '%s')   
				); 					
}

// Set Important to Form Data
// Delete Form Data By ID
function SetImportantFormData($FormDataId, $Value)
{
	global $wpdb;

	$git_contact_form_data = $wpdb->prefix.'git_contact_form_data';		
	$wpdb->update($git_contact_form_data,
					array(
						'Form_RatingData'     	=> $Value,
						),
					array(
						'ContactForm_Id'        => $FormDataId
						),
					$format = null, $where_format = null );		
	die;
}

// Delete Form Data By ID
function DeleteContactFormData($DeletionId)
{
	global $wpdb;

	$git_contact_form_data = $wpdb->prefix.'git_contact_form_data';		

	$DeleteContactFormData = "DELETE FROM $git_contact_form_data";
	$DeleteContactFormData = $wpdb->prepare( "DELETE FROM $git_contact_form_data WHERE ContactForm_Id = %d", $DeletionId);

	$wpdb->query($DeleteContactFormData);
	die;
}
?>