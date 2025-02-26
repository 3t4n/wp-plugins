<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/* The file contains all of the functions which make changes to the WordPress tables */

function Update_EWD_UAR_Options() {
	global $EWD_UAR_Full_Version;

	check_admin_referer('update_options');
	
	if (isset($_POST['enable_recovery'])) {update_option('EWD_UAR_Enable_Recovery', sanitize_text_field($_POST['enable_recovery']));}
	if (isset($_POST['activity_type'])) {update_option('EWD_UAR_Activity_Type', sanitize_text_field($_POST['activity_type']));}
	if (isset($_POST['user_type'])) {update_option('EWD_UAR_User_Type', sanitize_text_field($_POST['user_type']));}
	if (isset($_POST['cache_interval'])) {update_option('EWD_UAR_Cache_Interval', sanitize_text_field($_POST['cache_interval']));}	
	if (isset($_POST['cache_unit'])) {update_option('EWD_UAR_Cache_Unit', sanitize_text_field($_POST['cache_unit']));}

	$Counter = 0;
	while ($Counter < 30) {
		if (isset($_POST['Recovery_Action_' . $Counter . '_Email_Address'])) {
			$Prefix = 'Recovery_Action_' . $Counter;
			
			$Recovery_Action['Email_Address'] = sanitize_email($_POST[$Prefix . '_Email_Address']);
			$Recovery_Action['Action_Type'] = sanitize_text_field($_POST[$Prefix . '_Action_Type']);
			$Recovery_Action['Email_To_Send'] = sanitize_text_field($_POST[$Prefix . '_Email_To_Send']);
			$Recovery_Action['Inactivity_Interval'] = sanitize_text_field($_POST[$Prefix . '_Inactivity_Interval']);
			$Recovery_Action['Inactivity_Unit'] = sanitize_text_field($_POST[$Prefix . '_Inactivity_Unit']);

			$Recovery_Actions[] = $Recovery_Action; 
			unset($Recovery_Action);
		}
		$Counter++;
	}
	if (isset($_POST['Options_Submit'])) {update_option('EWD_UAR_Recovery_Actions_Array', $Recovery_Actions);}

	$Counter = 0;
	while ($Counter < 30) {
		if (isset($_POST['Email_Message_' . $Counter . '_Name'])) {
			$Prefix = 'Email_Message_' . $Counter;
			
			$Message_Item['ID'] = sanitize_text_field($_POST[$Prefix . '_ID']);
			$Message_Item['Name'] = sanitize_text_field($_POST[$Prefix . '_Name']);
			$Message_Item['Message'] = sanitize_text_field($_POST[$Prefix . '_Body']);

			$Messages[] = $Message_Item; 
			unset($Message_Item);
		}
		$Counter++;
	}
	if (isset($_POST['Options_Submit'])) {update_option('EWD_UAR_Email_Messages_Array', $Messages);}

	if ($EWD_UAR_Full_Version == "Yes" and isset($_POST['allow_order_payments'])) {update_option("EWD_OTP_Allow_Order_Payments", $_POST['allow_order_payments']);}	
}

?>