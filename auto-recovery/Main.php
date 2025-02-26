<?php
/*
Plugin Name: Auto-Recovery Plugin
Plugin URI: http://www.EtoileWebDesign.com/plugins/
Description: Automatically create a new admin account sent to a specific email address if the admin area of your site hasn't been accessed for a certain amount of time.
Author: Etoile Web Design
Author URI: http://www.EtoileWebDesign.com/
Terms and Conditions: http://www.etoilewebdesign.com/plugin-terms-and-conditions/
Text Domain: EWD_UAR
Version: 0.1
*/

global $EWD_UAR_db_version;
global $ewd_uar_message;
global $EWD_UAR_Full_Version;

$EWD_UAR_db_version = "0.1a";

define( 'EWD_UAR_CD_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'EWD_UAR_CD_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

/*define('WP_DEBUG', true);
error_reporting(E_ALL);
$wpdb->show_errors(); */

/* When plugin is activated */
register_activation_hook(__FILE__,'Set_EWD_UAR_Options');

/* When plugin is deactivation*/
register_deactivation_hook( __FILE__, 'Remove_EWD_UAR' );

/* Creates the admin menu for the contests plugin */
if ( is_admin() ){
	add_action('admin_menu', 'EWD_UAR_Plugin_Menu');
	add_action('admin_head', 'EWD_UAR_Admin_Options');
	add_action('admin_head', 'EWD_UAR_Output_Message');
	add_action('admin_init', 'Add_EWD_UAR_Scripts');
	add_action('widgets_init', 'EWD_UAR_Action');
	add_action('admin_notices', 'EWD_UAR_Error_Notices');
}


function Remove_EWD_UAR() {
  	/* Deletes the database field */
	delete_option('EWD_UAR_db_version');
}


/* Admin Page setup */
function EWD_UAR_Plugin_Menu() {
	$Access_Role = get_option("EWD_UAR_Access_Role");

	if ($Access_Role == "") {$Access_Role = "administrator";}
	if (current_user_can($Access_Role)) {
		add_menu_page('Auto Recovery Plugin', 'Auto Recovery', $Access_Role, 'EWD-UAR-options', 'EWD_UAR_Output_Options',null , '50.8');
		add_submenu_page('EWD-UAR-options', 'UAR Options', 'Options', $Access_Role, 'EWD-UAR-options&DisplayPage=Options', 'EWD_UAR_Output_Options');
	}
}


/* Add localization support */
function EWD_UAR_localization_setup() {
		load_plugin_textdomain('EWD_UAR', false, dirname(plugin_basename(__FILE__)) . '/lang/');
}
add_action('after_setup_theme', 'EWD_UAR_localization_setup');

// Add settings link on plugin page
function EWD_UAR_plugin_settings_link($links) { 
  $settings_link = '<a href="admin.php?page=EWD-UAR-options">Settings</a>'; 
  array_unshift($links, $settings_link); 
  return $links; 
}
 
$plugin = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", 'EWD_UAR_plugin_settings_link' );

function Add_EWD_UAR_Scripts() {
	if (isset($_GET['page']) && $_GET['page'] == 'EWD-UAR-options') {
		$url_one = plugins_url("/js/Admin.js", __FILE__);
		wp_enqueue_script('PageSwitch', $url_one, array('jquery'));
		$url_two = plugins_url("/js/spectrum.js", __FILE__);
		wp_enqueue_script('specttrum', $url_two, array('jquery'));
	}
}


add_action( 'wp_enqueue_scripts', 'Add_EWD_UAR_FrontEnd_Scripts' );
function Add_EWD_UAR_FrontEnd_Scripts() {
	wp_enqueue_script('ewd-uar-js', plugins_url( '/js/ewd-uar-js.js' , __FILE__ ), array( 'jquery' ));
}

function EWD_UAR_Output_Message() {
	global $EWD_UAR_Full_Version;
	
	$Email_Messages_Array = get_option("EWD_UAR_Email_Messages_Array");
	if (!is_array($Email_Messages_Array)) {$Email_Messages_Array = array();}

	echo "<script type='text/javascript'>";
	echo "var uar_messages = " . json_encode($Email_Messages_Array) . ";\n";
	echo "</script>";
}


add_action( 'wp_enqueue_scripts', 'EWD_UAR_Add_Stylesheet' );
function EWD_UAR_Add_Stylesheet() {
    wp_register_style( 'ewd-uar-style', plugins_url('css/uar-styles.css', __FILE__) );
    wp_enqueue_style( 'ewd-uar-style' );
}


function EWD_UAR_Admin_Options() {
	wp_enqueue_style( 'ewd-uar-admin', plugins_url("/css/Admin.css", __FILE__));
	wp_enqueue_style( 'ewd-uar-spectrum', plugins_url("/css/spectrum.css", __FILE__));
}

function Set_EWD_UAR_Options() {
	if (get_option("EWD_UAR_Enable_Recovery") == "") {update_option("EWD_UAR_Enable_Recovery", "No");}
	if (get_option("EWD_UAR_Activity_Type") == "") {update_option("EWD_UAR_Activity_Type", "Any");}
	if (get_option("EWD_UAR_User_Type") == "") {update_option("EWD_UAR_User_Type", "Admin");}
	if (get_option("EWD_UAR_Cache_Interval") == "") {update_option("EWD_UAR_Cache_Interval", 1);}
	if (get_option("EWD_UAR_Cache_Unit") == "") {update_option("EWD_UAR_Cache_Unit", "Days");}
	if (get_option("EWD_UAR_Recovery_Actions_Array") == "") {update_option("EWD_UAR_Recovery_Actions_Array", array());}
	if (get_option("EWD_UAR_Email_Messages_Array") == "") {update_option("EWD_UAR_Email_Messages_Array", array());}

	if (get_option("EWD_UAR_Full_Version") == "") {update_option("EWD_UAR_Full_Version", "Yes");}

	if (get_option("EWD_URP_Install_Flag") == "") {update_option("EWD_URP_Install_Flag", "Yes");}
	if (get_option("EWD_URP_Install_Flag") == "") {update_option("EWD_URP_Install_Flag", "Yes");}
}

$EWD_UAR_Full_Version = get_option("EWD_UAR_Full_Version");

include "Functions/Error_Notices.php";
include "Functions/EWD_UAR_Admin_Area_Activities.php";
include "Functions/EWD_UAR_Create_Admin_Account.php";
include "Functions/EWD_UAR_Output_Options.php";
include "Functions/EWD_UAR_Potential_Recovery_Check.php";
include "Functions/EWD_UAR_Regular_Visit.php";
include "Functions/EWD_UAR_Send_Emails.php";
include "Functions/EWD_UAR_Take_Recovery_Action.php";
include "Functions/Process_Ajax.php";
include "Functions/Update_Admin_Databases.php";
include "Functions/Update_EWD_UAR_Content.php";

// Updates the OTP database when required
if (get_option('EWD_UAR_db_version') != $EWD_UAR_db_version) {
	Set_EWD_UAR_Options();
	update_option('EWD_UAR_db_version', $EWD_UAR_db_version);
}

?>