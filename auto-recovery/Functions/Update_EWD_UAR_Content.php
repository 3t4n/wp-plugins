<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/* This file is the action handler. The appropriate function is then called based 
*  on the action that's been selected by the user. The functions themselves are all
* stored either in Prepare_Data_For_Insertion.php or Update_Admin_Databases.php */

function EWD_UAR_Action() {
	global $ewd_uar_message;

	if (isset($_GET['UARAction'])) {
		switch ($_GET['UARAction']) {
			case "EWD_UAR_UpdateOptions":
	       		$ewd_uar_message = Update_EWD_UAR_Options();
				break;
			case "EWD_UAR_TestEmail":
	       		$ewd_uar_message = EWD_UAR_Send_Test_Email();
				break;
			default:
				$ewd_otp_message = __("The form has not worked correctly. Please contact the plugin developer.", 'EWD_OTP');
				break;
		}
	}
}

?>