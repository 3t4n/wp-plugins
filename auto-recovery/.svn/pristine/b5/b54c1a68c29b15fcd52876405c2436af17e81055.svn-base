<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function EWD_UAR_Send_Test_Email() {
	if (!is_email($_POST['email'])) {return;}
	
	$Email_Address = $_POST['email'];
	$Admin_Email = get_option('admin_email');
	$Headers = array('From: ' . $Admin_Email);
	$Subject = "Test Recovery Email";
	$Message = "An administrator of " . get_bloginfo('wpurl') . " has put in your address to test out the Auto-Recovery system of the site.\n\n";
	$Message .= "If this email has reached you, please let them know!";

	wp_mail($Email_Address, $Subject, $Message, $Headers);
}

function EWD_UAR_Send_Email($Email_Address, $Email_ID, $Inactivity_Unit, $Inactivity_Interval) {
	$Email_Messages_Array = get_option("EWD_UAR_Email_Messages_Array");
	if (!is_array($Email_Messages_Array)) {$Email_Messages_Array = array();}

	$Admin_Email = get_option('admin_email');
	$Headers = array('From: ' . $Admin_Email);

	foreach ($Email_Messages_Array as $Email_Message_Item) {
		if ($Email_Message_Item['ID'] == "$Email_ID") {
			$Subject = $Email_Message_Item['Name'];
			$Message = $Email_Message_Item['Message'];

			$Subject = str_replace("[inactivity-unit]", $Inactivity_Unit, $Subject);
			$Subject = str_replace("[inactivity-interval]", $Inactivity_Interval, $Subject);
			$Subject = str_replace("[last-activity-date]", get_option("EWD_UAR_Last_Activity"), $Subject);
			$Subject = str_replace("[site-name]", get_bloginfo('name'), $Subject);

			$Message = str_replace("[inactivity-unit]", $Inactivity_Unit, $Message);
			$Message = str_replace("[inactivity-interval]", $Inactivity_Interval, $Message);
			$Message = str_replace("[last-activity-date]", get_option("EWD_UAR_Last_Activity"), $Message);
			$Message = str_replace("[site-name]", get_bloginfo('name'), $Message);
		}
	}

	if ($Subject != "" or $Message != "") {
		wp_mail($Email_Address, $Subject, $Message, $Headers);
	}
}

?>