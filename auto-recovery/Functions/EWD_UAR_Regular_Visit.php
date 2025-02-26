<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function EWD_UAR_Register_Visit(){
	if (get_option("EWD_UAR_Enable_Recovery") != "Yes") {return;}

	$Cache_Interval = get_option("EWD_UAR_Cache_Interval");	
	$Cache_Unit = get_option("EWD_UAR_Cache_Unit");

	if ($Cache_Unit == "Hours") {$Cache_Multiplier = 60*60;}
	elseif ($Cache_Unit == "Days") {$Cache_Multiplier = 60*60*24;}
	else {$Cache_Multiplier = 60*60*24*7;}

	$Cache_Time = $Cache_Unit * $Cache_Interval;
	
	if (get_option("EWD_UAR_Last_Visit_Time") + $Cache_Time < time()) {
		EWD_UAR_Potential_Recovery_Check();
		update_option("EWD_UAR_Last_Visit_Time", time());
	}
}

add_action("wp_loaded", "EWD_UAR_Register_Visit");

?>