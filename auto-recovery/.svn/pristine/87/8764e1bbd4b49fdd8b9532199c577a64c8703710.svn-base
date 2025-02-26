<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function EWD_UAR_Potential_Recovery_Check() {
	if (get_option("EWD_UAR_Enable_Recovery") != "Yes") {return;}

	$Last_Activity = get_option("EWD_UAR_Last_Activity");
	$Recovery_Actions_Array = get_option("EWD_UAR_Recovery_Actions_Array");
	if (!is_array($Recovery_Actions_Array)) {$Recovery_Actions_Array = array();}
	
	if ($Last_Activity + (60*60*24) > time()) {return;}

	foreach ($Recovery_Actions_Array as $Recovery_Action_Item) {
		if ($Recovery_Action_Item['Inactivity_Unit'] == "Days") {$Multiplier = 60*60*24;}
		elseif ($Recovery_Action_Item['Inactivity_Unit'] == "Weeks") {$Multiplier = 60*60*24*7;}
		else {$Multiplier = 60*60*24*30;}

		$Inactivity_Time = $Multiplier * $Recovery_Action_Item['Inactivity_Interval'];

		if ($Last_Activity + $Inactivity_Time < time()) {
			EWD_UAR_Take_Recovery_Action($Recovery_Action_Item['Email_Address'], $Recovery_Action_Item['Action_Type'], $Recovery_Action_Item['Email_To_Send'], $Recovery_Action_Item['Inactivity_Unit'], $Recovery_Action_Item['Inactivity_Interval']);
		}
	}
}

?>