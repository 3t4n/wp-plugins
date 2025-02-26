<?php

//Get Action Value and ID to be action performed
if(isset($_GET['action']) && isset($_GET['id']))
{
	$action = $_GET['action'];
	$form_id = $_GET['id'];
	if($action === 'edit' && wp_verify_nonce( $_GET['_wpnonce'], 'edit_link' ))
	{
		//get_all_forms_data_for_update($form_id);
		// Create Object of Get Data Class
		$GetClass = new git\GetData();

		$GetAllFormData = $GetClass->get_form_details_by_id($form_id);
		$GetAllInputData = $GetClass->get_input_details_by_id($form_id);


		$FormOptions = unserialize($GetAllFormData->Form_Options);
	}
	else {
		die( 'Security check' );
	}
}
else {
	die( 'Security check' );
}
?>

<div class="wrap t201plugin">
	<h2>Update Form</h2>

</div>



<div class="git-container">
	<div class="git-row">
		<div class="box">
			<div class="box-header well">
				<p style="color:#606060;">
					Update Form
					<a href="http://labs.think201.com/plugin/get-in-touch/" target="_blank" class="git-need-help">Need help?</a>
				</p>

			</div>
			<div class="box-content">
				<p id="form-submit-success" style="display: none;">Your form has been updated.</p>

				<div style="display: none;" id="update_form_content">
					<div class="form-group">
						<form name="ini_form_content_form" id="ini_form_content_form" action="#" method="post">
							<div class="git-form-box">
								<h2>Form Details</h2>
								<div class="git-fields-container" class="from-title">
									<input type="hidden" readonly="readonly" name="update_form_title" id="update_form_title" class="contact-form-title" value="<?php echo $GetAllFormData->Form_Name; ?>">
									<input type="text" name="update_form_label" id="update_form_label" value="<?php echo $GetAllFormData->Form_Label; ?>">
								</div>
								<div class="git-fields-container">
									<label for="ini_form_content_area">Form Content:</label>
									<textarea class="form-control" readonly="readonly" rows="10" name="ini_form_content_area" id="ini_form_content_area" placeholder="Please select input fields from top panel"><?php echo $GetAllFormData->Form_Data; ?></textarea>
								</div>
							</div>
							<div class="git-form-box">
								<h2>Mail Template</h2>
								<div class="git-fields-container">
									<label for="update-mail-subject">Subject Field:</label>
									<input type="text" value="Inquiry Request" id="update-mail-subject" name="update-mail-subject" value="<?php echo $GetAllFormData->Mail_Subject; ?>" placeholder="Input Subject">
								</div>
								<div class="git-fields-container">
									<label for="update-sender-name">Sender Name:</label>
									<input type="text" value="<?php echo $GetAllFormData->Mail_Sender_Name; ?>" id="update-sender-name" name="update-sender-name" placeholder="Your Name">
								</div>
								<div class="git-fields-container">
									<label for="update-sender-mail">Sender MailId:</label>
									<input type="text" value="<?php echo $GetAllFormData->Mail_Sender_Email; ?>" id="update-sender-mail" name="update-sender-mail" placeholder="Your MailId">
								</div>
								<div class="git-fields-container">
									<label for="update_form_mail_message">Email Message to user:</label>
									<textarea rows="5" placeholder="Enter Message" name="update_form_mail_message" id="update_form_mail_message"><?php echo $GetAllFormData->Form_MailData; ?></textarea>
								</div>
							</div>
							<div class="git-form-box">
								<h2>Options</h2>
								<div class="git-fields-container">
									<label for="user_form_width">Contact Form Width:</label>
									<input value="<?php echo $FormOptions['form_width']; ?>" name="user_form_width" id="user_form_width">
									<span class="git-tip">Ex: 450px or 50% (accepts both in pixels &amp; percentage)</span>
								</div>
								<div class="git-fields-container">
									<?php
									if($FormOptions['form_loader'] ==='true')
									{
										?>
										<input type="checkbox" checked id="user_form_loader" name="user_form_loader">
										<?php
									}
									else
									{
										?>
										<input type="checkbox" id="user_form_loader" name="user_form_loader">
										<?php
									}
									?>
									Contact Form Loader
								</div>
								<div class="git-fields-container">
									<?php
									if($FormOptions['form_hide'] ==='true')
									{
										?>
										<input type="checkbox" checked id="user_form_hide" name="user_form_hide">
										<?php
									}
									else
									{
										?>
										<input type="checkbox" id="user_form_hide" name="user_form_hide">
										<?php
									}
									?>
									Contact Form Hide After Success
								</div>

								<div class="git-fields-container">
									<?php
									if($FormOptions['form_labels'] ==='true')
									{
										?>
										<input type="checkbox" checked id="user_form_lebels" name="user_form_lebels">
										<?php
									}
									else
									{
										?>
										<input type="checkbox" id="user_form_lebels" name="user_form_lebels">
										<?php
									}
									?>
									Show Contact Form Labels
								</div>

								<div class="git-fields-container">
									<?php
									if($FormOptions['form_placeholder'] ==='true')
									{
										?>
										<input type="checkbox" checked id="user_form_placeholder" name="user_form_placeholder">
										<?php
									}
									else
									{
										?>
										<input type="checkbox" id="user_form_placeholder" name="user_form_placeholder">
										<?php
									}
									?>
									Show Placeholder
								</div>
								<div class="git-fields-container">
									<?php
									if($FormOptions['form_captcha'] ==='true')
									{
										?>
										<input type="checkbox" checked id="user_form_captcha" name="user_form_captcha">
										<?php
									}
									else
									{
										?>
										<input type="checkbox" id="user_form_captcha" name="user_form_captcha">
										<?php
									}
									?>
									Enable Google Captcha
								</div>
								<div class="git-fields-container">
									<label for="user_button_text">Submit Button Text:</label>
									<input type="text" value="<?php echo $FormOptions['button_text']; ?>" name="user_button_text" id="user_button_text">
								</div>
								<div class="git-fields-container">
									<label for="user_button_color">Submit Button Color:</label>
									<input type="hidden" class="form-control" value="<?php echo $FormOptions['button_color']; ?>" name="user_button_color" id="user_button_color">
								</div>
								<div class="git-fields-container">
									<label for="user_success_text">Contact Form Success Message:</label>
									<input type="text" value="<?php echo $FormOptions['user_success_text']; ?>" name="user_success_text" id="user_success_text">
								</div>
								<div class="git-fields-container">
									<label for="user_error_validation_text">Contact Form Validation Error Message:</label>
									<input type="text" value="<?php echo $FormOptions['user_error_validation_text']; ?>" name="user_error_validation_text" id="user_error_validation_text">
								</div>
								<div class="git-fields-container">
									<label for="user_error_email_validation_text">Contact Form Mail Validation Error Message:</label>
									<input type="text" value="<?php echo $FormOptions['user_error_email_validation_text']; ?>" name="user_error_email_validation_text" id="user_error_email_validation_text">
								</div>

								<div class="git-fields-container">
									<?php if($FormOptions['git_mail_form_required_fields_text'] === 'true')
									{
										?>
										<input type="checkbox" checked id="git_mail_form_required_fields_text" name="git_mail_form_required_fields_text">
										<?php
									}
									else
									{
										?>
										<input type="checkbox" id="git_mail_form_required_fields_text" name="git_mail_form_required_fields_text">
										<?php
									}
									?>
									Display Text this is Required Fields
								</div>

								<div class="git-fields-container">
									<?php if($GetAllFormData->Mail_Copy_To_User === 'true')
									{
										?>
										<input type="checkbox" id="update_mail_copy_to_user_check" name="update_mail_copy_to_user_check" checked>
										<?php
									}
									else
									{
										?>
										<input type="checkbox" id="update_mail_copy_to_user_check" name="update_mail_copy_to_user_check">
										<?php
									}
									?>
									Send mail to user
								</div>

								<div class="git-fields-container">
									<?php if($FormOptions['git_check_for_stor_contact_form_data'] === 'true')
									{
										?>
										<input type="checkbox" checked id="git_check_for_stor_contact_form_data" name="git_check_for_stor_contact_form_data">
										<?php
									}
									else
									{
										?>
										<input type="checkbox" id="git_check_for_stor_contact_form_data" name="git_check_for_stor_contact_form_data">
										<?php
									}
									?>
									I want to store the contact form data of user who contacted me
								</div>

								<div class="git-fields-container">
									<label for="update-mail-recipient">Recipient MailId:</label>
									<input type="text" id="update-mail-recipient" name="update-mail-recipient" value="<?php echo $GetAllFormData->Form_Recipient; ?>" placeholder="Inter Recipient Mailing Address">
								</div>
								<input type="hidden" name="form-shown" id="form-shown" value="true">

								<button onClick="SubmitUpdatedForm('<?php echo $form_id; ?>')" class="git-btn" type="button" id="submit-form">Update Form</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
