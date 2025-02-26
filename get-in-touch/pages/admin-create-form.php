<div class="wrap t201plugin">
	<h2>
	Create Form
	<a href="<?php print admin_url('admin.php?page=get-in-touch'); ?>" class="add-new-h2">All Forms</a>
	</h2>
</div>


<div class="git-container">
	<img class="git-loader" alt="Get In Touch" style="display: none;" src="<?php echo plugins_url('get-in-touch/public/img/loader.gif' ) ?>">
	<p class="StatusShow"></p>

	<div class="git-row">
		<div class="box">
			<div class="box-header well">
				<p style="color:#606060;">
					Add Form
					<span class="git-input-field-status">Input Field has been added!</span>
					<a href="http://labs.think201.com/plugin/get-in-touch/" target="_blank" class="git-need-help">Need help?</a>
				</p>
			</div>
			<div class="box-content">
				<p id="form-submit-success" style="display: none;">Your form has been created.</p>
				<div id="input-options">
					<ul>
						<li id="text-field">
							Text Field
						</li>
						<li id="email">
							Email
						</li>
						<li id="phone">
							Phone
						</li>
						<li id="textarea">
							Textarea
						</li>
						<li id="captcha">
							Captcha
						</li>
						<li id="map">
							Map
						</li>
					</ul>
				</div>
				<?php require_once('quick_panel.php'); ?>
				<div style="display: none;" id="ini_form_content">
					<form name="ini_form_content_form" id="ini_form_content_form" action="#" method="post">
						<div class="git-form-box">
							<h2>Form Details</h2>
							<div class="git-fields-container" style="display: none;" id="from-title"></div>
							<div class="git-fields-container">
								<label for="update_form_label">Form Title:</label>
								<input type="text" name="update_form_label" value="Contact Form" id="update_form_label" class="">
							</div>
							<div class="git-fields-container">
								<label for="ini_form_content_area">Form Content:</label>
								<textarea readonly="readonly" class="git-disable" rows="5" name="ini_form_content_area" id="ini_form_content_area" placeholder="Please select input fields from top panel"></textarea>
							</div>
						</div>
						<div class="git-form-box">
							<h2>Mail Template</h2>
							<div class="git-fields-container">
								<label for="mail-subject">Subject Field:</label>
								<input type="text" value="Inquiry Request" id="mail-subject" name="mail-subject" placeholder="Input Subject">
							</div>
							<div class="git-fields-container">
								<label for="mail-sender-name">Sender Name:</label>
								<input type="text" value="Administrator" id="mail-sender-name" name="mail-sender-name" placeholder="Your Name">
							</div>
							<div class="git-fields-container">
								<label for="mail-sender-mail">Sender MailId:</label>
								<input type="text" value="<?php echo get_option('admin_email'); ?>" id="mail-sender-mail" name="mail-sender-mail" placeholder="Your MailId">
							</div>
							<div class="git-fields-container">
								<label for="ini_form_mail_message">Email Message to User:</label>
								<input placeholder="Enter Message" name="ini_form_mail_message" id="ini_form_mail_message" value="Thank You! We Would Get In Touch with you soon !!">
							</div>
						</div>
						<div class="git-form-box">
							<h2>Options</h2>
							<div class="git-fields-container">
								<label for="user_form_width">Contact Form Width:</label>
								<input value="450px" name="user_form_width" id="user_form_width">
								<span class="git-tip">Ex: 450px or 50% (accepts both in pixels &amp; percentage)</span>
							</div>
							<div class="git-fields-container">
								<input type="checkbox" checked id="user_form_loader" name="user_form_loader">
								Contact Form Loader
							</div>
							<div class="git-fields-container">
								<input type="checkbox" id="user_form_hide" name="user_form_hide">
								Contact Form Hide After Success
							</div>
							<div class="git-fields-container">
								<input type="checkbox" id="user_form_lebels" name="user_form_lebels">
								Show Contact Form Labels
							</div>
							<div class="git-fields-container">
								<input type="checkbox" checked id="user_form_placeholder" name="user_form_placeholder">
								Show Placeholder
							</div>
							<div class="git-fields-container">
								<input type="checkbox" checked id="user_form_captcha" name="user_form_captcha">
								Enable Google Captcha
							</div>
							<div class="git-fields-container">
								<label for="user_button_text">Submit Button Text:</label>
								<input value="Get In Touch" name="user_button_text" id="user_button_text">
							</div>
							<div class="git-fields-container">
								<label for="user_button_color">Submit Button Color:</label>
								<input type="hidden" value="#ffffff" name="user_button_color" id="user_button_color">
							</div>
							<div class="git-fields-container">
								<label for="user_success_text">Contact Form Success Message:</label>
								<input value="Thanks, We would get in touch with you soon." name="user_success_text" id="user_success_text">
							</div>
							<div class="git-fields-container">
								<label for="user_error_validation_text">Contact Form Validation Error Message:</label>
								<input value="Please provide us valid details." name="user_error_validation_text" id="user_error_validation_text">
							</div>
							<div class="git-fields-container">
								<label for="user_error_email_validation_text">Contact Form Mail Validation Error Message:</label>
								<input value="Please provide us valid mail address." name="user_error_email_validation_text" id="user_error_email_validation_text">
							</div>
							<div class="git-fields-container">
								<input type="checkbox" id="git_mail_form_required_fields_text" name="git_mail_form_required_fields_text">
								Display Required Fields
							</div>
							<div class="git-fields-container">
								<input type="checkbox" checked id="git_mail_copy_to_user_check" name="git_mail_copy_to_user_check">
								Send mail to User
							</div>
							<div class="git-fields-container">
								<input type="checkbox" checked id="git_check_for_stor_contact_form_data" name="git_check_for_stor_contact_form_data">
								I want to store the contact form data of user who contacted me
							</div>
							<div class="git-fields-container">
								<label for="mail-recipient">Recipient MailId:</label>
								<input type="text" id="mail-recipient" name="mail-recipient" value="<?php echo get_option('admin_email'); ?>" placeholder="Inter Recipient Mailing Address">
							</div>
							<input type="hidden" name="last-form-inserted-id" id="last-form-inserted-id">
							<input type="hidden" name="form-shown" id="form-shown" value="true">
							<button onClick="ValidateForm()" class="git-btn" type="button" id="submit-form">Create Form</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
