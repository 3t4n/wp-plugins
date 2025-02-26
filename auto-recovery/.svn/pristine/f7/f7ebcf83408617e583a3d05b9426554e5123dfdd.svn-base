<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function EWD_UAR_Admin_Area_Page_Load() {
	$Activity_Type = get_option("EWD_UAR_Activity_Type");
	$User_Type = get_option("EWD_UAR_User_Type");

	if ((is_super_admin() or $User_Type == "All") and $Activity_Type == "Any") {
		update_option("EWD_UAR_Last_Activity", time());
	}
}
add_action("admin_init", "EWD_UAR_Admin_Area_Page_Load");

function EWD_UAR_Admin_Login($User_Login, $WP_User) {
	$User_Type = get_option("EWD_UAR_User_Type");

	if ($User_Type == "All" or is_super_admin($WP_User->ID)) {
		update_option("EWD_UAR_Last_Activity", time());
	}
}
add_action('wp_login', 'EWD_UAR_Admin_Login', 10, 2)

?>