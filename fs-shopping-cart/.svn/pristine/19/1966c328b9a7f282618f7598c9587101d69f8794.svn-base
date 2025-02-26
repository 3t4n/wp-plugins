<?php
	global $post,$_SESSION,$fscartconfig;

//  SPAM CHECK
if (isset($_POST)) { if (fssc_spam_check($_POST) == TRUE) { unset($_POST); } }
if (isset($_GET)) { if (fssc_spam_check($_GET) == TRUE) { unset($_GET); } }
	
$ToolBarLinkStyle = ''; if (function_exists(fssc_textcolor_styling)) { $ToolBarLinkStyle = fssc_textcolor_styling($fscartstyle, 'ProductToolBarLinkColor'); }
$ToolBarTextStyle = ''; if (function_exists(fssc_text_styling)) { $ToolBarTextStyle = fssc_text_styling($fscartstyle['ProductToolBarFontSize'], $fscartstyle['ProductToolBarFontColor']); }
$ToolBarStyle = 'style="background: url('.get_option('home').'/wp-content/plugins/fs-shopping-cart/images/pnavg.png) repeat-x; background-color: #d0d0d0; border: 1px solid #d0d0d0; "'; if (function_exists(fssc_toolbar_styling)) { $ToolBarStyle = fssc_toolbar_styling($fscartstyle); }
	
if (!is_user_logged_in()) {
	global $wpdb;
	// CHECK IF REGISTRATION
	$DisplayForm = TRUE;
	$RegisterFormError = '';
	if (isset($_POST['submit'])) {
		
		if ($_SERVER['HTTP_REFERER'] != get_option('home').'/my-account/') {
			$RegisterFormError = 'Registration Error. Please contact us for more details.';
		}
		if (!preg_match('/@/i', $_POST['fssc-register-email']) || !preg_match('/./i', $_POST['fssc-register-email'])) {
			$RegisterFormError = 'Please enter a valid email address.';
		}
		if ($_POST['fssc-register-password'] != $_POST['fssc-register-password2']) {
			$RegisterFormError = 'Your passwords do not match.';
		}
		if ($_POST['fssc-register-first-name'] == $_POST['fssc-register-last-name']) {
			$RegisterFormError = 'Your first and last name cannot match.';
		}
		if ($wpdb->get_var("SELECT COUNT(*) FROM $wpdb->users WHERE user_login ='".$_POST['fssc-register-username']."'") > 0) {
			$RegisterFormError = 'Your username is already taken.';
		}
		if ($wpdb->get_var("SELECT COUNT(*) FROM $wpdb->users WHERE user_email ='".$_POST['fssc-register-email']."'") > 0) {
			$RegisterFormError = 'Your emaill address is already in our database.';
		}
		if ($_POST['fssc-register-username'] == '' || $_POST['fssc-register-first-name'] == '' || $_POST['fssc-register-last-name'] == '' || $_POST['fssc-register-email'] == '' || $_POST['fssc-register-password'] == '' || $_POST['fssc-register-password2'] == '' ) {
			$RegisterFormError = 'Please complete required fields.';
		}
		if ($fscartconfig['RequireTaxId'] == 'Show / Required' && $_POST['fssc-register-company-tax-id'] == '') {
			$RegisterFormError = 'Please enter your company Tax ID.';
		}
		if ($fscartconfig['RequireResaleCertificate'] == 'Show / Required' && $_POST['fssc-register-company-resalecert'] == '') {
			$RegisterFormError = 'Please enter your company Resale Certificate.';
		}
		if (!$_POST['fssc-registration-terms']) {
			$RegisterFormError = 'You must agree to our privacy policy and terms and conditions.';
		}
		if (preg_match('/@163.com/i', $_POST['fssc-register-email']) || preg_match('/@eyou.com/i', $_POST['fssc-register-email']) || preg_match('/@sohu.com/i', $_POST['fssc-register-email']) || preg_match('/@21cn.com/i', $_POST['fssc-register-email'])) {
			$RegisterFormError = 'Please enter a valid email address.';
		}

		
		if ($RegisterFormError == '') {
			// ENCRYPT PASSWORD
			require_once( 'wp-includes/class-phpass.php');
			$wp_hasher = new PasswordHash(8, TRUE);
			$_POST['fssc-register-password'] = $wp_hasher->HashPassword($_POST['fssc-register-password']);
			$CountryName = $wpdb->get_var("SELECT country_name FROM ".$wpdb->prefix."fssc_countries WHERE country_id = ".$_POST['fssc-register-country']);
			
			// ADD USER TO DB
			$wpdb->query("INSERT INTO $wpdb->users (
														user_login, 
														user_pass, 
														user_nicename, 
														user_email, 
														user_registered, 
														user_status, 
														display_name, 
														phone_number, 
														first_name, 
														last_name, 
														company_name, 
														company_tax_id, 
														resalecert, 
														address, 
														city, 
														stateprov, 
														zippostal, 
														country, 
														fax_number,
														fssc_users_type
													) VALUES (
														'".$_POST['fssc-register-username']."', 
														'".$_POST['fssc-register-password']."', 
														'".$_POST['fssc-register-username']."', 
														'".$_POST['fssc-register-email']."', 
														NOW(), 
														'0', 
														'".$_POST['fssc-register-username']."', 
														'".$_POST['fssc-register-phone-number']."', 
														'".$_POST['fssc-register-first-name']."', 
														'".$_POST['fssc-register-last-name']."', 
														'".$_POST['fssc-register-company-name']."', 
														'".$_POST['fssc-register-company-tax-id']."', 
														'".$_POST['fssc-register-company-resalecert']."', 
														'".$_POST['fssc-register-address']."', 
														'".$_POST['fssc-register-city']."', 
														'".$_POST['fssc-register-stateprov']."', 
														'".$_POST['fssc-register-zippostal']."', 
														'".$CountryName."', 
														'".$_POST['fssc-register-fax-number']."', 
														'".$_POST['fssc-register-type']."'
													)");



			
			// ADD USER NAME TO METADATA
			$RegUserID = $wpdb->get_var("SELECT ID FROM $wpdb->users WHERE user_login = '".$_POST['fssc-register-username']."'");
			$wpdb->query("INSERT INTO ".$wpdb->prefix."usermeta (user_id, meta_key, meta_value) VALUES (".$RegUserID.", 'first_name', '".$_POST['fssc-register-first-name']."') ");
			$wpdb->query("INSERT INTO ".$wpdb->prefix."usermeta (user_id, meta_key, meta_value) VALUES (".$RegUserID.", 'last_name', '".$_POST['fssc-register-last-name']."') ");
			
			// ADD USER TO NEWSLETTER
			if ($fscartconfig['ContactManagement'] != '') {
				if ($fscartconfig['ContactManagement'] == 'mailchimp' && $fscartconfig['MailChimpAPI'] != '' && $fscartconfig['MailChimpListID'] != '') { MailChimpMyAccount($UserInfo); }
			}
			
			// CREATE LOGIN LINK
			echo '<h1>Account Registration Confirmation</h1>';
			echo '<div style="text-align: center;">';
			echo 'Your account has been created.';
			echo '<form name="fssc-login" id="fssc-login" action="'.get_option('home').'/wp-login.php" method="post" onsubmit="pageTracker._trackPageview(\'/fssc/member-signup/\')">';
			echo '<input type="hidden" name="log" id="log" value="'.$_POST['fssc-register-username'].'" size="20" tabindex="1" />';
			echo '<input type="hidden" name="pwd" id="pwd" value="'.$_POST['fssc-register-password2'].'" size="20" tabindex="2" />';
			echo '<input type="submit" name="submit" id="submitform" value="Go to Your Account" tabindex="4" onClick="pageTracker._trackEvent(\'Members\', \'New Account\', \''.$_POST['fssc-register-username'].'\');" />';
			echo '<input type="hidden" name="redirect_to" value="'.get_permalink($post->ID).'" />';
			echo '</form></div>';
			
			// EMAIL ADMIN
			$Message = '';
			
			$Message .= $_POST['fssc-register-first-name'].' '.$_POST['fssc-register-last-name'].'<br>';
			$Message .= $_POST['fssc-register-company-name'].'<br>';
			$Message .= $_POST['fssc-register-address'].'<br>';
			$Message .= $_POST['fssc-register-city'].' '.$_POST['fssc-register-stateprov'].'<br>';
			$Message .= $_POST['fssc-register-zippostal'].'<br><br>';
			$Message .= 'Phone: '.$_POST['fssc-register-phone-number'].'<br>';
			$Message .= 'Email: '.$_POST['fssc-register-email'].'<br>';
			$Message .= 'Type: '.$_POST['fssc-register-type'].'<br><br>';
			$Message .= 'IP: '.$_SERVER['REMOTE_ADDR'].'<br>';
			$Message .= 'Referrer: '.$_SERVER['HTTP_REFERER'].'<br>';
			

			
			$EmailOrderRecipients = explode(',', $fscartconfig['OrderRecipient']);
			$headers = "MIME-Version: 1.0\n";
			$headers .= "From: \"".$fscartconfig['OrderSenderName']."\" <".$fscartconfig['OrderSenderEmail'].">\r\n"; 
			$headers .= "Reply-To: ".$fscartconfig['OrderSenderEmail']."\r\n"; 
			$headers .= "Content-Type: text/HTML; charset=ISO-8859-1\r\n";
			$headers .= "\r\n"; 
			for ($i=0;$i<=sizeof($EmailOrderRecipients);$i++) {
				mail($EmailOrderRecipients[$i], 'User Registration', $Message, $headers);
			}
			
			// DONT DISPLAY LOGIN/REGISTER FORMS
			$DisplayForm = FALSE;
		} else {
			$DisplayForm = TRUE;
		}
	}
	
	if ($DisplayForm == TRUE) {
		// LOGIN BOX
		echo '<div id="fssc-account-main-box">';
		echo '<h2>Login</h2>';
		echo '<form name="fssc-login" id="fssc-login" action="'.get_option('home').'/wp-login.php" method="post">';
		echo '<table width="100%" border="0">';
		echo '<tr><td width="100">Username:</td><td><input type="text" name="log" id="log" value="" /></td></tr>';
		echo '<tr><td>Password:</td><td><input type="password" name="pwd" id="pwd" value="" /></td></tr>';
		echo '<tr><td>&nbsp;</td><td><input name="rememberme" type="checkbox" id="rememberme" value="forever" style="width: 15px;" /> Remember me</td></tr>';
		echo '<tr><td>&nbsp;</td><td><a href="'.get_option('home').'/wp-login.php?action=lostpassword">Lost your password?</a></td></tr>';
		echo '</table><br />';
		echo '<input type="submit" name="submit" id="submitform" value="Login &raquo;" tabindex="4" onClick="pageTracker._trackEvent(\'Members\', \'Login\', \'\');" />';
		echo '<input type="hidden" name="redirect_to" value="'.get_permalink($post->ID).'" />';
		echo '</form>';
		echo '<div id="fssc-account-main-box-text">';
		echo str_replace("\n","<br />",get_post_meta($post->ID, 'FSSC My Account Text', TRUE)); 
		echo '</div>';
		echo '</div>';
	
		// REGISTER BOX
		echo '<div id="fssc-account-main-box">';
		echo '<h2>New Users Register Here</h2>';
		if ($RegisterFormError != '') {
			echo '<div style="color: #B80000; padding-top: 12px; font-size: 11px; font-weight: bold;">'.$RegisterFormError.'</div>';
		}
		echo '<form name="fssc-register" action="" method="POST">';
		echo '<table width="100%" border="0">';
		echo '<tr><td>Username*:</td><td><input type="text" name="fssc-register-username" value="'; if (isset($_POST['fssc-register-username'])) { echo $_POST['fssc-register-username'];} echo '"></td></tr>';
		//echo '<tr><td>Account Type*:</td><td><select name="fssc-register-type"><option value="Consumer">Consumer</option><option value="Installer">Installer</option><option value="Dealer">Dealer</option><option value="Software Developer">Software Developer</option><option value="Manufacturer">Manufacturer</option></select></td></tr>';
		echo '<tr><td>Email Address*:</td><td><input type="text" name="fssc-register-email" value="'; if (isset($_POST['fssc-register-email'])) { echo $_POST['fssc-register-email'];} echo '"></td></tr>';
		echo '<tr><td>First Name*:</div></td><td><input type="text" name="fssc-register-first-name" value="'; if (isset($_POST['fssc-register-first-name'])) { echo $_POST['fssc-register-first-name'];} echo '"></td></tr>';
		echo '<tr><td>Last Name*:</div></td><td><input type="text" name="fssc-register-last-name" value="'; if (isset($_POST['fssc-register-last-name'])) { echo $_POST['fssc-register-last-name'];} echo '"></td></tr>';

		echo '<tr><td>Company Name:</div></td><td><input type="text" name="fssc-register-company-name" value="'; if (isset($_POST['fssc-register-company-name'])) { echo $_POST['fssc-register-company-name'];} echo '"></td></tr>';
		
		if ($fscartconfig['RequireTaxId'] == 'Show / Required') {
			echo '<tr><td>Company Tax ID*:</div></td><td><input type="text" name="fssc-register-company-tax-id" value="'; if (isset($_POST['fssc-register-company-tax-id'])) { echo $_POST['fssc-register-company-tax-id'];} echo '"></td></tr>';
		} elseif ($fscartconfig['RequireTaxId'] == 'Show / Not Required') {
			echo '<tr><td>Company Tax ID:</div></td><td><input type="text" name="fssc-register-company-tax-id" value="'; if (isset($_POST['fssc-register-company-tax-id'])) { echo $_POST['fssc-register-company-tax-id'];} echo '"></td></tr>';
		}
		
		if ($fscartconfig['RequireResaleCertificate'] == 'Show / Required') {
			echo '<tr><td>Company Resale Certificate*:</div></td><td><input type="text" name="fssc-register-company-resalecert" value="'; if (isset($_POST['fssc-register-company-resalecert'])) { echo $_POST['fssc-register-company-resalecert'];} echo '"></td></tr>';
		} elseif ($fscartconfig['RequireResaleCertificate'] == 'Show / Not Required') {
			echo '<tr><td>Company Resale Certificate:</div></td><td><input type="text" name="fssc-register-company-resalecert" value="'; if (isset($_POST['fssc-register-company-resalecert'])) { echo $_POST['fssc-register-company-resalecert'];} echo '"></td></tr>';
		}

		echo '<tr><td>Password*:</div></td><td><input type="password" name="fssc-register-password" value="'; if (isset($_POST['fssc-register-password'])) { echo $_POST['fssc-register-password'];} echo '"></td></tr>';
		echo '<tr><td>Password Again*:</div></td><td><input type="password" name="fssc-register-password2" value="'; if (isset($_POST['fssc-register-password2'])) { echo $_POST['fssc-register-password2'];} echo '"></td></tr>';

		echo '<tr><td>Address:</div></td><td><input type="text" name="fssc-register-address" value="'; if (isset($_POST['fssc-register-address'])) { echo $_POST['fssc-register-address'];} echo '"></td></tr>';
		echo '<tr><td>City*:</div></td><td><input type="text" name="fssc-register-city" value="'; if (isset($_POST['fssc-register-city'])) { echo $_POST['fssc-register-city'];} echo '"></td></tr>';









		echo '<tr><td>Country*:</td><td><select name="fssc-register-country" onchange="getFSSClist(this, \'fssc-register-stateprov\', \'CountryID\', \'\', \'http\');">';
					$FSSCCountries = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_countries WHERE country_visibility = 1");
					foreach ($FSSCCountries as $FSSCCountries) {
						$selected = '';
						if (isset($_POST['fssc-register-country'])) {
							if ($_POST['fssc-register-country'] == $FSSCCountries->country_id) {
								$selected = ' selected';
							}
						}
						echo '<option value="'.$FSSCCountries->country_id.'"'.$selected.'>'.$FSSCCountries->country_name.'</option>';
					}
					echo '</select></td></tr>';
		echo '<tr><td>State/Prov.*:</td><td><select id="fssc-register-stateprov" name="fssc-register-stateprov"><option value="">Loading...</option></select></td></tr>';








		echo '<tr><td>Zip/Postal Code*:</div></td><td><input type="text" name="fssc-register-zippostal" value="'; if (isset($_POST['fssc-register-zippostal'])) { echo $_POST['fssc-register-zippostal'];} echo '"></td></tr>';
		echo '<tr><td>Phone Number*:</div></td><td><input type="text" name="fssc-register-phone-number" value="'; if (isset($_POST['fssc-register-phone-number'])) { echo $_POST['fssc-register-phone-number'];} echo '"></td></tr>';
		echo '<tr><td>Fax Number:</div></td><td><input type="text" name="fssc-register-fax-number" value="'; if (isset($_POST['fssc-register-fax-number'])) { echo $_POST['fssc-register-fax-number'];} echo '"></td></tr>';
		
		
		
		if ($fscartconfig['RequireTaxId'] == 'Show / Required' && $fscartconfig['RequireResaleCertificate'] == 'Show / Required') {
			echo '<tr><td colspan="2">If you are a business please provide Company Name, Company Tax ID and Resale Certificate.</td></tr>';
		}
		echo '<tr><td colspan="2"><br />I agree to:</td></tr>';
		echo '<tr><td colspan="2"><input name="fssc-registration-terms" type="checkbox" id="fssc-register-terms" value="yes" style="width: 15px;" /> Website Terms/Conditions and Privacy Policy</td></tr>';
		echo '<tr><td colspan="2"><input name="fssc-register-contact-me" type="checkbox" id="fssc-register-contact-me" value="contactme" style="width: 15px;" /> Contact me about news, tips and specials that may be of interest to me</td></tr>';
		echo '</table><br />';
		echo '<input type="submit" name="submit" id="submitform" value="Register &raquo;" tabindex="4" />';
		echo '</form>';
		echo '<p>* indicates required field.</p>';
		echo '</div>';
		echo '<script type="text/javascript">
												function preloadForm() {';
												$JavaScripRun = 'getFSSClist(\'1\', \'fssc-register-stateprov\', \'CountryID\', \'\', \'http\');';
												$SelectedStateProv = '';
												if (isset($_POST['fssc-register-stateprov'])) {
													$SelectedStateProv = $_POST['fssc-register-stateprov'];
												}
												if (isset($_POST['fssc-register-country'])) {
													$JavaScripRun = 'getFSSClist(\''.$_POST['fssc-register-country'].'\', \'fssc-register-stateprov\', \'CountryID\', \''.$SelectedStateProv.'\', \'http\');';
												}
												echo $JavaScripRun;
												echo ' }
												window.onload = preloadForm;';
											echo '</script>';
	}
	echo '<div style="clear: left;"></div>';
} else {
	global $user_ID,$wpdb,$fsscconfig;
	$PLFCountry = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."fssc_countries WHERE currency_code = '".$_SESSION['currency']."'");
	if ($_POST['billshipdetails']) {
		$CountryName = $wpdb->get_var("SELECT country_name FROM ".$wpdb->prefix."fssc_countries WHERE country_id = ".$_POST['customer_country']);
		$SCountryName = $wpdb->get_var("SELECT country_name FROM ".$wpdb->prefix."fssc_countries WHERE country_id = ".$_POST['customer_ship_country']);
		$wpdb->query("UPDATE ".$wpdb->prefix."users SET 
									first_name = '".$_POST['customer_first_name']."', 
									last_name = '".$_POST['customer_last_name']."', 
									company_name = '".$_POST['customer_company']."', 
									company_tax_id = '".$_POST['customer_taxid']."', 
									resalecert = '".$_POST['customer_resalecert']."', 
									address = '".$_POST['customer_address1']."', 
									city = '".$_POST['customer_city']."', 
									country = '".$CountryName."', 
									stateprov = '".$_POST['customer_state_prov']."', 
									zippostal = '".$_POST['customer_zip']."', 
									phone_number = '".$_POST['customer_phone']."', 
									fax_number = '".$_POST['customer_fax']."', 
									user_email = '".$_POST['customer_email']."', 
									user_url = '".$_POST['customer_website']."', 
									item_shipping_location = '".$_POST['item_shipping_location']."', 
									sfirst_name = '".$_POST['customer_ship_first_name']."', 
									slast_name = '".$_POST['customer_ship_last_name']."', 
									scompany = '".$_POST['customer_ship_company']."', 
									saddress = '".$_POST['customer_ship_address1']."', 
									scity = '".$_POST['customer_ship_city']."', 
									scountry = '".$SCountryName."', 
									sstateprov = '".$_POST['customer_ship_stateprov']."', 
									szippostal = '".$_POST['customer_ship_zippostal']."', 
									sphone = '".$_POST['customer_ship_phone']."'
									WHERE ID = ".$user_ID);
									
									echo '<p>Your Billing and Shipping information has been updated.</p>';
	}

// GET LATEST USER INFO
$UserInfo = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."users WHERE ID = ".$user_ID);
$_POST['customer_first_name'] = $UserInfo->first_name;
$_POST['customer_last_name'] = $UserInfo->last_name;
$_POST['customer_company'] = $UserInfo->company_name;
$_POST['customer_taxid'] = $UserInfo->company_tax_id;
$_POST['customer_resalecert'] = $UserInfo->resalecert;
$_POST['customer_address1'] = $UserInfo->address;
$_POST['customer_city'] = $UserInfo->city;
$_POST['customer_country'] = $wpdb->get_var("SELECT country_id FROM ".$wpdb->prefix."fssc_countries WHERE country_name = '".$UserInfo->country."'");
$_POST['customer_stateprov'] = $UserInfo->stateprov;
$_POST['customer_zip'] = $UserInfo->zippostal;
$_POST['customer_phone'] = $UserInfo->phone_number;
$_POST['customer_fax'] = $UserInfo->fax_number;
$_POST['customer_email'] = $UserInfo->user_email;
$_POST['customer_website'] = $UserInfo->user_url;
$_POST['item_shipping_location'] = $UserInfo->item_shipping_location;
$_POST['customer_ship_first_name'] = $UserInfo->sfirst_name;
$_POST['customer_ship_last_name'] = $UserInfo->slast_name;
$_POST['customer_ship_company'] = $UserInfo->scompany;
$_POST['customer_ship_address1'] = $UserInfo->saddress;
$_POST['customer_ship_city'] = $UserInfo->scity;
$_POST['customer_ship_country'] = $wpdb->get_var("SELECT country_id FROM ".$wpdb->prefix."fssc_countries WHERE country_name = '".$UserInfo->scountry."'");
$_POST['customer_ship_stateprov'] = $UserInfo->sstateprov;
$_POST['customer_ship_zippostal'] = $UserInfo->szippostal;
$_POST['customer_ship_phone'] = $UserInfo->sphone;

$HTTPCall = 'http';
	
	$page_content = '<ul id="fs-product-nav" '.$ToolBarStyle.'>';
	$page_content .= '<li '.$ToolBarTextStyle.' onClick="document.getElementById(\'fs-billing\').className=\'\';document.getElementById(\'fs-downloads\').className=\'hide\';document.getElementById(\'fs-licenses\').className=\'hide\';">Billing Details</li>';	
	$page_content .= '<li '.$ToolBarTextStyle.' onClick="document.getElementById(\'fs-billing\').className=\'hide\';document.getElementById(\'fs-downloads\').className=\'\';document.getElementById(\'fs-licenses\').className=\'hide\';">Downloads</li>';	
	if (function_exists('fssc_licenses_myaccount')) { $page_content .= '<li '.$ToolBarTextStyle.' onClick="document.getElementById(\'fs-billing\').className=\'hide\';document.getElementById(\'fs-downloads\').className=\'hide\';document.getElementById(\'fs-licenses\').className=\'\';">Licenses</li>'; }
	$page_content .= '<li '.$ToolBarTextStyle.'><a href="'.wp_logout_url(get_bloginfo('url')).'"'.$ToolBarLinkStyle.'>Logout</a></li>';	
	$page_content .= '</ul>';
	
	$page_content .= '<p><br /></p>';
	
	$page_content .= '<div id="fs-billing">';
	$page_content .='<form name="updatedetails" action="" method="POST">
<div style="float: left; width: 49%;">
<h3>Billing Address</h3>
<div class="fssc-checkout-input">'.fssc_form_input("First Name", "customer_first_name", $_POST['customer_first_name'], "15").'</div>
<div class="fssc-checkout-input">'.fssc_form_input("Last Name", "customer_last_name", $_POST['customer_last_name'], "15").'</div>
<div class="fssc-checkout-input">'.fssc_form_input("Company", "customer_company", $_POST['customer_company'], "15").'</div>
<div class="fssc-checkout-input">'.fssc_form_input("Address", "customer_address1", $_POST['customer_address1'], "15").'</div>
<div class="fssc-checkout-input">'.fssc_form_input("Apt./Suite", "customer_address2", $_POST['customer_address2'], "15").'</div>
<div class="fssc-checkout-input">'.fssc_form_input("City", "customer_city", $_POST['customer_city'], "15").'</div>
<div class="fssc-checkout-input"><label for="customer_country">Country</label><select id="customer_country" name="customer_country" onchange="getFSSClist(this, \'customer_province\', \'CountryID\', \'\', \''.$HTTPCall.'\');">';
					if ($fscartconfig['CountryLock'] == 1) {
						$FSSCCountries = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_countries WHERE country_visibility = 1 AND country_id = ".$fscartconfig['DefaultCountry']);
					} else {
						$FSSCCountries = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_countries WHERE country_visibility = 1");
					}
					foreach ($FSSCCountries as $FSSCCountries) {
						$selected = '';
						if (isset($_POST['customer_country'])) {
							if ($_POST['customer_country'] == $FSSCCountries->country_id) {
								$selected = ' selected';
							}
						}
						$page_content .= '<option value="'.$FSSCCountries->country_id.'"'.$selected.'>'.$FSSCCountries->country_name.'</option>';
					}
					$page_content .= '</select></div>
<div class="fssc-checkout-input"><label for="customer_province">State/Prov.</label><select id="customer_province" name="customer_province" onchange="getFSSClist(this, \'\', \'ProvinceID\', \'\', \''.$HTTPCall.'\')"><option value="">Loading...</option></select></div>
<div class="fssc-checkout-input">'.fssc_form_input("Zip/Postal", "customer_zip", $_POST['customer_zip'], "15").'</div>
<div class="fssc-checkout-input">'.fssc_form_input("Phone", "customer_phone", $_POST['customer_phone'], "15").'</div>
<div class="fssc-checkout-input">'.fssc_form_input("Email", "customer_email", $_POST['customer_email'], "15").'</div>
<div class="fssc-checkout-input">'.fssc_form_input("Website", "customer_website", $_POST['customer_website'], "15").'</div>';
if ($fscartconfig['RequireTaxId'] != "Hide") { $page_content .= '<div class="fssc-checkout-input">'.fssc_form_input("Company Tax ID", "customer_taxid", $_POST['customer_taxid'], "15").'</div>'; }
if ($fscartconfig['RequireResaleCertificate'] != "Hide") { $page_content .= '<div class="fssc-checkout-input">'.fssc_form_input("Resale Certificate", "customer_resalecert", $_POST['customer_resalecert'], "15").'</div>'; }
$page_content .='</div>



<div style="float: left; width: 49%;">
<h3>Shipping Address</h3>
<div class="fssc-checkout-input"><label for="order_shipping_address">Ship To</label>';
$order_shipping_address_sel1 = "selected";
$order_shipping_address_sel2 = "";
if ($_POST['order_shipping_address'] == 'different-address') {
	$order_shipping_address_sel1 = "";
	$order_shipping_address_sel2 = "selected";
}
$page_content .= '<select name="order_shipping_address" onchange="document.getElementById(\'shipping-address\').className=this.value;">
<option value="my-billing-address" '.$order_shipping_address_sel1.'>My Billing Address</option>
<option value="different-address" '.$order_shipping_address_sel2.'>A Different Address</option>
</select></div>
<div id="shipping-address">
<div class="fssc-checkout-input">'.fssc_form_input("First Name", "customer_ship_first_name", $_POST['customer_ship_first_name'], "15").'</div>
<div class="fssc-checkout-input">'.fssc_form_input("Last Name", "customer_ship_last_name", $_POST['customer_ship_last_name'], "15").'</div>
<div class="fssc-checkout-input">'.fssc_form_input("Company", "customer_ship_company", $_POST['customer_ship_company'], "15").'</div>
<div class="fssc-checkout-input">'.fssc_form_input("Address", "customer_ship_address1", $_POST['customer_ship_address1'], "15").'</div>
<div class="fssc-checkout-input">'.fssc_form_input("Apt./Suite", "customer_ship_address2", $_POST['customer_ship_address2'], "15").'</div>
<div class="fssc-checkout-input">'.fssc_form_input("City", "customer_ship_city", $_POST['customer_ship_city'], "15").'</div>
<div class="fssc-checkout-input"><label for="customer_ship_country">Country</label><select name="customer_ship_country" onchange="getFSSClist(this, \'customer_ship_stateprov\', \'CountryID\', \'\', \''.$HTTPCall.'\');">';
if ($fscartconfig['CountryLock'] == 1) {
	$FSSCCountries = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_countries WHERE country_visibility = 1 AND country_id = ".$fscartconfig['DefaultCountry']);
} else {
	$FSSCCountries = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_countries WHERE country_visibility = 1");
}
foreach ($FSSCCountries as $FSSCCountries) {
	$selected = '';
	if (isset($_POST['customer_ship_country'])) {
		if ($_POST['customer_ship_country'] == $FSSCCountries->country_id) {
			$selected = ' selected';
		}
	}
	$page_content .= '<option value="'.$FSSCCountries->country_id.'"'.$selected.'>'.$FSSCCountries->country_name.'</option>';
}
$page_content .= '</select></div>
<div class="fssc-checkout-input"><label for="customer_ship_province">State/Prov.</label><select id="customer_ship_stateprov" name="customer_ship_stateprov"><option value="">Loading...</option></select></div>
<div class="fssc-checkout-input">'.fssc_form_input("Zip/Postal", "customer_ship_zip", $_POST['customer_ship_zip'], "15").'</div>
<div class="fssc-checkout-input">'.fssc_form_input("Phone", "customer_ship_phone", $_POST['customer_ship_phone'], "15").'</div>';
if ($_POST['order_shipping_address'] == 'different-address') {
	$page_content .= '<SCRIPT TYPE="text/javascript">
	<!--
	document.getElementById(\'shipping-address\').className=\'different-address\';
	//-->
	</SCRIPT>';
} else {
	$page_content .= '<SCRIPT TYPE="text/javascript">
	<!--
	document.getElementById(\'shipping-address\').className=\'hide\';
	//-->
	</SCRIPT>';
}
$page_content .= '</div>
</div>
<div style="clear: both;"></div><br /><br />';
$page_content .= '<div style="text-align: center;"><input type="submit" name="billshipdetails" value="Update Account"></div></form>';
	$page_content .= '</div>';

	$page_content .= '<div id="fs-downloads">';
	$page_content .= '<h3>Available Downloads</h3><p>';
	$Downloads = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_downloads WHERE user_id = ".$user_ID." GROUP BY products_id");
	$DownloadCount = count($Downloads);
	if ($DownloadCount > 0) {
		foreach ($Downloads as $Downloads) {
			$ProductName = $wpdb->get_var("SELECT products_name FROM ".$wpdb->prefix."fssc_products WHERE products_id = ".$Downloads->products_id);
			$page_content .= '<a href="'.get_option('home').'/wp-content/plugins/fs-shopping-cart/download.php?pid='.$Downloads->products_id.'">'.$ProductName.'</a><br />';
		}
		$page_content .= '</p>';
	} else {
		$page_content .= '<p>You currently do not have any downloads.</p>';
	}
	$page_content .= '</div>';

	$page_content .= '<div id="fs-licenses">';
	$page_content .= '<h3>Your Licenses</h3><p>';
	if (function_exists('fssc_licenses_myaccount')) { $page_content .= '<p>'.fssc_licenses_myaccount().'</p>'; }
	$page_content .= '</div>';
				
	$page_content .= '<SCRIPT TYPE="text/javascript">
	<!--
	document.getElementById(\'fs-billing\').className=\'\';
	document.getElementById(\'fs-downloads\').className=\'hide\';
	document.getElementById(\'fs-licenses\').className=\'hide\';
	//-->
	</SCRIPT>';
				
				if ($_POST['item_shipping_location'] == 0) {
						$page_content .= '<SCRIPT TYPE="text/javascript"> document.getElementById(\'fssccheckouttaxes\').className=\'css-hide\';	</SCRIPT>'; 
				}
				$page_content .= '<script type="text/javascript"> 
														function preloadForm() { ';
														$JavaScripRun = 'getFSSClist(\''.$_SESSION['fssccountry'].'\', \'customer_province\', \'CountryID\', \'\', \''.$HTTPCall.'\'); ';
														if (isset($_POST['customer_country'])) {
															if ($_POST['customer_country'] != '') {
																$CountryID = $wpdb->get_var("SELECT country_id FROM ".$wpdb->prefix."fssc_countries WHERE country_id = '".$_POST['customer_country']."'");
																$JavaScripRun = 'getFSSClist(\''.$CountryID.'\', \'customer_province\', \'CountryID\', \''.$_POST['customer_stateprov'].'\', \''.$HTTPCall.'\'); '. "\n";
																$JavaScripRun .= 'getFSSClist(\''.$_POST['customer_stateprov'].'\', \'\', \'ProvinceID\', \'\', \''.$HTTPCall.'\'); '. "\n";
															}
														}
														$page_content .= $JavaScripRun;
														$JavaScripRun = 'getFSSClist(\''.$_SESSION['fssccountry'].'\', \'customer_ship_stateprov\', \'CountryID\', \'\', \''.$HTTPCall.'\'); ';
														if (isset($_POST['customer_ship_country'])) {
															if ($_POST['customer_ship_country'] != '') {
																$CountryID = $wpdb->get_var("SELECT country_id FROM ".$wpdb->prefix."fssc_countries WHERE country_id = '".$_POST['customer_ship_country']."'");
																$JavaScripRun = 'getFSSClist(\''.$CountryID.'\', \'customer_ship_stateprov\', \'CountryID\', \''.$_POST['customer_ship_stateprov'].'\', \''.$HTTPCall.'\'); '. "\n";
															}
														}
														$page_content .= $JavaScripRun;
														$page_content .= '}
														window.onload = preloadForm;
													</script>';
	
}
?>