<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/* Creates the admin page, and fills it in based on whether the user is looking at
*  the overview page or an individual item is being edited */
function EWD_UAR_Output_Options() {
	global $EWD_OTP_Full_Version;
	
	if (isset($_GET['DisplayPage'])) {
		  $Display_Page = $_GET['DisplayPage'];
	}
	else { 
		$Display_Page = null;
	}
	if (!isset($_GET['UARAction'])) {
		$_GET['UARAction'] = null;
	}

	include( plugin_dir_path( __FILE__ ) . '../html/AdminHeader.php');
	if ($_GET['OTPAction'] == "EWD_UAR_Recovery_Details") {include( plugin_dir_path( __FILE__ ) . '../html/EWD_UAR_Recovery_Details.php');}
	else {include( plugin_dir_path( __FILE__ ) . '../html/MainScreen.php');}
	include( plugin_dir_path( __FILE__ ) . '../html/AdminFooter.php');
}

?>