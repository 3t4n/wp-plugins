<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function EWD_UAR_Take_Recovery_Action($Email_Address, $Notification_Type, $Email_ID, $Inactivity_Unit, $Inactivity_Interval) {
	EWD_UAR_Send_Email($Email_Address, $Email_ID, $Inactivity_Unit, $Inactivity_Interval);

	if ($Notification_Type == "New_Admin") {EWD_UAR_Create_Admin_Account($Email_Address);}
}

?>