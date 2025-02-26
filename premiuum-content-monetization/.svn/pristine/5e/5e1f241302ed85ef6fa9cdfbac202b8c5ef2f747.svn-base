<?php
/*
* Plugin Name: PREMIUUM Content Monetization
* Plugin URI: https://www.premiuum.net/
* Version: 1.0.0
* Author: Premiuum Network
* Author URI: https://support.premiuum.net/
* Description: Revenue-per-Link™ content monetization, across your website.
* Requires at least: 3.6
* Tested up to: 6.0.1
* Requires PHP: 5.2
* License: Apache-2.0
* License URI: http://www.apache.org/licenses/LICENSE-2.0.txt
*/




////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
//// SET SOME WORDPRESS VARIABLES:

$premiuum_plugin_dir = plugin_dir_url(__FILE__);
//premiuum_test_display_value("000-premiuum_plugin_dir",$premiuum_plugin_dir);

$premiuum_plugins_url = plugins_url(__FILE__);
//premiuum_test_display_value("000-premiuum_plugins_url",$premiuum_plugins_url);

$premiuum_plugin_path = $premiuum_plugin_dir; // "/wp-content/plugins/Premiuum/";
//premiuum_test_display_value("000-premiuum_plugin_path",$premiuum_plugin_path);










###############################################################
###############################################################
###############################################################
###############################################################
###############################################################
###############################################################
###############################################################
###############################################################
###############################################################
###############################################################
###############################################################
###############################################################
###############################################################
###############################################################
###############################################################
###############################################################
###############################################################
###############################################################
###############################################################
###############################################################
###############################################################
###  START: ORIGINAL PHP



function premiuum_test_display_value($name="",$variable="",$return="") {
	
	//return true;
	
	global $premiuum_wordpress_escape_allowed_html;
	
	if(
		(is_array($variable)) 
		||	(is_object($variable))) 
	{
		if($return != 1) 
		{
			$premiuum_temporary_text = "";
			$premiuum_temporary_text = "<pre>". $name . ":"; 
			$premiuum_temporary_text .= print_r($variable); 
			$premiuum_temporary_text .= "</pre>";
			$premiuum_temporary_text .= "<br>";
			$premiuum_temporary_text .= "\n";
			echo wp_kses($premiuum_temporary_text,$premiuum_wordpress_escape_allowed_html);
		
		} else {
			$premiuum_temporary_text = "";
			$premiuum_temporary_text = "<pre>". $name . ":"; 
			$premiuum_temporary_text .= print_r($variable); 
			$premiuum_temporary_text .= "</pre>";
			$premiuum_temporary_text .= str_repeat("-", 150);
			$premiuum_temporary_text .= "<br>";
			$premiuum_temporary_text .= "\n";
			echo wp_kses($premiuum_temporary_text,$premiuum_wordpress_escape_allowed_html);
		}
		
	} else {
		
		if($return != 1) 
		{
			$premiuum_temporary_text = "";
			$premiuum_temporary_text = "<pre>". $name . ":"; 
			$premiuum_temporary_text .= print_r($variable); 
			$premiuum_temporary_text .= "</pre>";
			$premiuum_temporary_text .= "<br>";
			$premiuum_temporary_text .= "\n";
			echo wp_kses($premiuum_temporary_text,$premiuum_wordpress_escape_allowed_html);
		
		} else {
			$premiuum_temporary_text = "";
			$premiuum_temporary_text = "<pre>". $name . ":"; 
			$premiuum_temporary_text .= print_r($variable); 
			$premiuum_temporary_text .= "</pre>";
			$premiuum_temporary_text .= str_repeat("-", 150);
			$premiuum_temporary_text .= "<br>";
			$premiuum_temporary_text .= "\n";
			echo wp_kses($premiuum_temporary_text,$premiuum_wordpress_escape_allowed_html);
		}
	}
}

function premiuum_local_logger($log_name,$log_value,$action_code="",$log_filename="") 
{
	
	if(!$log_name) return false;
	if(!$log_value) $log_value = "";
	
	$vriable = $log_name;
	$value = $log_value;
	
	if ( WP_DEBUG === true ) {
		if ( is_array($value) || is_object($value) ) {
			
			//$array = json_decode(json_encode($value), true);
			//$array = json_decode(json_encode(print_r($value, true)),true);
			$value_display = print_r($value, true);
			error_log( $vriable . ": ". $value_display );
			//echo "<p>" . $vriable . ": ". $value_display . "</p>";
		} else {
			error_log(  $vriable . ": ". $value);
			//echo "<p>" . $vriable . ": ". $value . "</p>";
		}
	}
	
}




function premiuum_language_translator($translate_this_text,$translation_timestamp_id)
{
	/////////////////////////////////////////
	/// placeholder for future functionality
	return $translate_this_text;
}

function premiuum_get_preference_value($parameter_name,$partner_account_hash)
{
	return true;
}



function premiuum_convert_object_to_array($object)
{
	return json_decode(json_encode($object), true);
}





function premiuum_wordpress_installer(
	$premiuum_wp_name
	,$premiuum_wp_description
	,$premiuum_wp_wpurl
	,$premiuum_wp_url
	,$premiuum_wp_admin_email
	,$premiuum_wp_language
) {


	////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////
	/// this installer runs once per page load
	/// it sends known wordpress data to premiuum
	/// premiuum responds with a new or returning member + account credentials.
	////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////
	
	
	
	

	
	$userid = get_current_user_id();
	//premiuum_test_display_value("userid",$userid);
	
	
	$premiuum_site_data = WP_User::get_data_by( 'id', $userid );
	//premiuum_test_display_value("001 premiuum_site_data",$premiuum_site_data);
	
	$premiuum_site_data = WP_User::get_data_by( 'id', $userid );
	//premiuum_test_display_value("002 premiuum_site_data",$premiuum_site_data);
	//premiuum_test_display_value("premiuum_site_data",$premiuum_site_data);
	//premiuum_test_display_value("data->ID",$premiuum_site_data->ID);
	//premiuum_test_display_value("data->user_login",$premiuum_site_data->user_login);
	//premiuum_test_display_value("data->user_pass",$premiuum_site_data->user_pass);
	//premiuum_test_display_value("data->user_nicename",$premiuum_site_data->user_nicename);
	//premiuum_test_display_value("data->user_email",$premiuum_site_data->user_email);
	//premiuum_test_display_value("data->user_url",$premiuum_site_data->user_url);
	//premiuum_test_display_value("data->user_registered",$premiuum_site_data->user_registered);
	//premiuum_test_display_value("data->user_activation_key",$premiuum_site_data->user_activation_key);
	//premiuum_test_display_value("data->user_status",$premiuum_site_data->user_status);
	//premiuum_test_display_value("data->display_name",$premiuum_site_data->display_name);
	//premiuum_test_display_value("data->user_activation_key",$premiuum_site_data->user_activation_key);
	//premiuum_test_display_value("premiuum_wp_name",$premiuum_wp_name);
	//premiuum_test_display_value("premiuum_wp_description",$premiuum_wp_description);
	//premiuum_test_display_value("premiuum_wp_wpurl",$premiuum_wp_wpurl);
	//premiuum_test_display_value("premiuum_wp_url",$premiuum_wp_url);
	//premiuum_test_display_value("premiuum_wp_admin_email",$premiuum_wp_admin_email);
	//premiuum_test_display_value("premiuum_wp_language",$premiuum_wp_language);
	
	
	//return $translate_this_text;
	if(isset($translate_this_text))
	{
		//premiuum_local_logger("translate_this_text",$translate_this_text);
	} 
	
	if(isset($translation_timestamp_id)) 
	{
		//premiuum_local_logger("translation_timestamp_id",$translation_timestamp_id);
	}
	
	$curl_url = "";
	$curl_url .= "https://gateway.premiuum.net/premiuum_wordpress_installer.api";
	$curl_url .= "?";
	if(!isset($premiuum_action)) $premiuum_action = "";
	$curl_url .= "premiuum_wordpress_installer_action=". urlencode($premiuum_action);
	$curl_url .= "&";
	if(!isset($premiuum_wp_name)) $premiuum_wp_name = "";
	$curl_url .= "premiuum_wordpress_installer_site_title=". urlencode($premiuum_wp_name);
	$curl_url .= "&";
	if(!isset($premiuum_wp_description)) $premiuum_wp_description = "";
	$curl_url .= "premiuum_wordpress_installer_tagline=". urlencode($premiuum_wp_description);
	$curl_url .= "&";
	if(!isset($premiuum_wp_wpurl)) $premiuum_wp_wpurl = "";
	$curl_url .= "premiuum_wordpress_installer_wordpress_address_url=". urlencode($premiuum_wp_wpurl);
	$curl_url .= "&";
	if(!isset($premiuum_wp_url)) $premiuum_wp_url = "";
	$curl_url .= "premiuum_wordpress_installer_site_address_url=". urlencode($premiuum_wp_url);
	$curl_url .= "&";
	if(!isset($premiuum_wp_admin_email)) $premiuum_wp_admin_email = "";
	$curl_url .= "premiuum_wordpress_installer_administration_email_address=". urlencode($premiuum_wp_admin_email);
	$curl_url .= "&";
	if(!isset($premiuum_wp_language)) $premiuum_wp_language = "";
	$curl_url .= "premiuum_wordpress_installer_site_language=". urlencode($premiuum_wp_language);
	
	
	$curl_url .= "&";
	$premiuum_site_data_user_nicename = "";
	if(isset($premiuum_site_data->user_nicename)) $premiuum_site_data_user_nicename = "";
	$curl_url .= "premiuum_wordpress_installer_user_nicename=". urlencode($premiuum_site_data_user_nicename);
	
	$curl_url .= "&";
	$premiuum_site_data_user_email = "";
	if(isset($premiuum_site_data->user_email)) $premiuum_site_data_user_email = "";
	$curl_url .= "premiuum_wordpress_installer_user_email=". urlencode($premiuum_site_data_user_email);
	
	$curl_url .= "&";
	$premiuum_site_data_display_name = "";
	if(isset($premiuum_site_data->display_name)) $premiuum_site_data_display_name = "";
	$curl_url .= "premiuum_wordpress_installer_display_name=". urlencode($premiuum_site_data_display_name);
	
	
	
	$response_raw = wp_remote_get( $curl_url );
	$response_body = wp_remote_retrieve_body( $response_raw );
	
	//premiuum_test_display_value("000-response_raw",$response_raw);
	
	//premiuum_local_logger("000-response_raw",$response_raw);
	
	$response = json_decode($response_body);
	
	//premiuum_test_display_value("001-json_decode",$response);
	//premiuum_local_logger("001-json_decode",$response);
	
	
	if($response)
	{
		$response_array = premiuum_convert_object_to_array($response);
		//premiuum_test_display_value("1. response_array",$response_array);
		//premiuum_local_logger("1. response_array",$response_array);
	} else {
		$response_array = premiuum_convert_object_to_array($response_raw);
		//premiuum_test_display_value("2. response_array",$response_array);
		//premiuum_test_display_value("222. response_raw",$response_raw);
		//premiuum_local_logger("555. response_raw",$response_raw);
	}
	
	//premiuum_test_display_value("333. response_array",$response_array);
	//premiuum_local_logger("333. response_array",$response_array);

	$response_array = premiuum_convert_object_to_array($response_array);
	
	//premiuum_local_logger("3333. response_array",$response_array);
	
	//premiuum_local_logger("444. response_array['response']",$response_array['response']);
	//premiuum_local_logger("4. response_array['response']",$response_array['response']);
	
	
	return $response_array;
	
}





###############################################################
###############################################################
###############################################################
###############################################################
###############################################################
###############################################################
###############################################################
###############################################################
###############################################################
###############################################################
###############################################################
###############################################################
###############################################################
###############################################################
###############################################################
###############################################################
###  START: PHP CURL "INSTALLER"
### RUN ONCE PER PAGE LOAD
### SENDS WORDPRESS CREDENTIALS TO PREMIUUM
### PREMIUUM SEND NEW (or RETURNING) MEMBER + ACCOUNT DETAILS

$premiuum_wp_name = get_bloginfo("name");
$premiuum_wp_description = get_bloginfo("description");
$premiuum_wp_wpurl = get_bloginfo("wpurl");
$premiuum_wp_url= get_bloginfo("url");
$premiuum_wp_admin_email = get_bloginfo("admin_email");
$premiuum_wp_language = get_bloginfo("language");

### TESTING:
### $premiuum_wp_name = get_bloginfo("name");
### $premiuum_wp_description = get_bloginfo("description");
### $premiuum_wp_wpurl = get_bloginfo("https://wp.example.com");
### $premiuum_wp_url= get_bloginfo("https://site.example.com");
### $premiuum_wp_admin_email = get_bloginfo("20220705.001@corp.nsdb.com");
### $premiuum_wp_language = get_bloginfo("en");
	

$premiuum_wordpress_installer_response_array = premiuum_wordpress_installer(
	$premiuum_wp_name
	,$premiuum_wp_description
	,$premiuum_wp_wpurl
	,$premiuum_wp_url
	,$premiuum_wp_admin_email
	,$premiuum_wp_language
);

$premiuum_wordpress_installer_response_array = premiuum_convert_object_to_array($premiuum_wordpress_installer_response_array);

//premiuum_local_logger("0000-premiuum_wordpress_installer_response_array",$premiuum_wordpress_installer_response_array);



$premiuum_wordpress_escape_allowed_html = array(
	'a'      => array(
		'href'  => array(),
		'title' => array(),
	),
	'br'     => array(),
	'em'     => array(),
	'strong' => array(),
	'div' => array(
		'id' => array(),
		'style' => array(),
		'name' => array(),
	),
	'u'     => array(),
	'i'     => array(),
	'p'     => array(
		'class'     => array(),
	),
	'sup'     => array(),
	'ul'     => array(
		'class'     => array(),
		'style'     => array(),
	),
	'ul'     => array(
		'class'     => array(),
		'style'     => array(),
	),
);
	




###############################################################
###############################################################
###############################################################
###############################################################
###############################################################
###############################################################
###############################################################
###  $PREMIUUM

$premiuum = array();
if(stristr($premiuum_wordpress_installer_response_array['partner_service_status'],"LIVE")) $premiuum['partner_service_status'] = "LIVE";
if(stristr($premiuum_wordpress_installer_response_array['partner_service_status'],"OFF")) $premiuum['partner_service_status'] = "OFF";
if(stristr($premiuum_wordpress_installer_response_array['partner_service_status'],"DEV")) $premiuum['partner_service_status'] = "DEVELOPMENT";

//premiuum_local_logger("premiuum['partner_service_status']",$premiuum['partner_service_status']);




$premiuum['system_message'] = $premiuum_wordpress_installer_response_array['system_message'];
$premiuum['member_hash'] = $premiuum_wordpress_installer_response_array['member_hash'];

$premiuum['member_emailaddress'] = $premiuum_wordpress_installer_response_array['member_emailaddress'];
$premiuum['member_password'] = $premiuum_wordpress_installer_response_array['member_password'];


$premiuum['partner_account_hash'] = $premiuum_wordpress_installer_response_array['partner_account_hash'];
$premiuum['partner_account_name'] = $premiuum_wordpress_installer_response_array['partner_account_name'];


///premiuum_wordpress_installer_response_status
$premiuum['premiuum_wordpress_installer_response_status'] = $premiuum_wordpress_installer_response_array['status'];

//premiuum_test_display_value("premiuum['partner_account_name']",$premiuum['partner_account_name']);


$premiuum['partner_account_tagline'] = $premiuum_wordpress_installer_response_array['partner_account_tagline'];
//$premiuum['partner_service_status'] = $premiuum_wordpress_installer_response_array['partner_service_status'];



//$premiuum['partner_wordpress_url_master'] = $premiuum_wordpress_installer_response_array['partner_wordpress_url_master'];
if(isset($premiuum_wordpress_installer_response_array['partner_wordpress_url_master']))
{
	$premiuum['partner_wordpress_url_master'] = $premiuum_wordpress_installer_response_array['partner_wordpress_url_master'];
} else {
	$premiuum['partner_wordpress_url_master'] = "";
}




//$premiuum['partner_wordpress_url_site'] = $premiuum_wordpress_installer_response_array['partner_wordpress_url_site'];


if(isset($premiuum_wordpress_installer_response_array['partner_wordpress_url_site']))
{
	$premiuum['partner_wordpress_url_site'] = $premiuum_wordpress_installer_response_array['partner_wordpress_url_site'];
} else {
	$premiuum['partner_wordpress_url_site'] = "";
}




if(isset($premiuum_wordpress_installer_response_array['partner_wordpress_url_homepage']))
{
	$premiuum['partner_wordpress_url_homepage'] = $premiuum_wordpress_installer_response_array['partner_wordpress_url_homepage'];
} else {
	$premiuum['partner_wordpress_url_homepage'] = "";
}




if(isset($premiuum_wordpress_installer_response_array['partner_account_email_address']))
{
	$premiuum['partner_account_email_address'] = $premiuum_wordpress_installer_response_array['partner_account_email_address'];
} else {
	$premiuum['partner_account_email_address'] = "";
}










//premiuum_test_display_value("premiuum",$premiuum);

$_SESSSION['premiuum_wordpress_installer_response_array'] = $premiuum;

$_XXXXX_account_hash = $premiuum_wordpress_installer_response_array['partner_account_hash'];

/*

	($premiuum['partner_service_status'] == "SUCCESS: ALL NEW ACCOUNT")
	
	($premiuum['partner_service_status'] == "SUCCESS: NEW ADMINISTRATOR")
	
	($premiuum['partner_service_status'] == "SUCCESS: RETURNING WORDPRESS PARTNER")
	
	($premiuum['partner_service_status'] == "SUCCESS: NEW WEBSITE (ACCOUNT)")

*/



###############################################################
###############################################################
###############################################################
###  ADD PREMIUUM PLUGIN TO WORDPRESS SITE HEADER
###  WILL OVER-WRITE ANY EXISTING PREMIUUM PLUGIN:
	
//premiuum_local_logger("000_XXXXX_account_hash",$_XXXXX_account_hash);


function function_premiuum_css()
{
	wp_enqueue_style('premiuum_css','https://plugin.premiuum.net/partner.css'); // hook to add inline style
}
add_action('wp_enqueue_scripts','function_premiuum_css',1,0);


function function_premiuum_script()
{
	global $_XXXXX_account_hash;
	wp_enqueue_script( 'premiuum_script', 'https://plugin.premiuum.net/partner.js?key='.$_XXXXX_account_hash ); // hook to add inline style
}
add_action( 'wp_enqueue_scripts','function_premiuum_script',1,0);



/// MANUALLY UNINSTALL PREMIUUM
//// OTHERWISE, USERS MAY AUTOMATEDLY UNINSTALL BY DEACTIVATING THE PREMIUUM PLUGIN via WORDPRESS PLUGIN DASHBOARD
if(isset($_GET['premiuum']))
{
	$get_premiuum = sanitize_text_field($_GET['premiuum']);
	if(stristr($get_premiuum,"UNINSTALL"))
	{
	
		wp_deregister_style("premiuum_css");
		wp_deregister_script("premiuum_script");
		
	}
}






###  END: ORIGINAL PHP
###############################################################
###############################################################
###############################################################
###############################################################
###############################################################
###############################################################
###############################################################
###############################################################
###############################################################
###############################################################
###############################################################
###############################################################
###############################################################
###############################################################
###############################################################
###############################################################
###############################################################
###############################################################
###############################################################
###############################################################
###############################################################






$user_data = FALSE;


$userid = get_current_user_id();
//premiuum_test_display_value("userid",$userid);


$premiuum_site_data = WP_User::get_data_by( 'id', $userid );
//premiuum_test_display_value("001 premiuum_site_data",$premiuum_site_data);

$premiuum_site_data = WP_User::get_data_by( 'id', $userid );
//premiuum_test_display_value("002 premiuum_site_data",$premiuum_site_data);



function premiuum_dashboard_html() 
{

	global $premiuum;
	//premiuum_test_display_value("001-premiuum",$premiuum);
		
	global $premiuum_plugin_dir;
	//premiuum_test_display_value("001-premiuum_plugin_dir",$premiuum_plugin_dir);
	
	global $premiuum_site_data;
	//premiuum_test_display_value("001-premiuum_site_data",$premiuum_site_data);
	
	global $premiuum_plugins_url;
	//premiuum_test_display_value("001-premiuum_plugins_url",$premiuum_plugins_url);
	
	//premiuum_test_display_value("001-premiuum_plugin_path",$premiuum_plugin_path);
	global $premiuum_plugin_path;
	//premiuum_test_display_value("001B-premiuum_plugin_path",$premiuum_plugin_path);
	
	
	
	
	//////////////////////////////
	/// REGISTER PREMIUUM CSS
	wp_register_style('premiuum_wordpress_plugin', $premiuum_plugin_path . 'library/premiuum_partner_wordpress_installer_and_dashboard.css');
	wp_enqueue_style('premiuum_wordpress_plugin');
	
	
	
	
	// replace the footer with empty string
	add_filter( 'admin_footer_text', '__return_empty_string' );
	
	$_XXXXX_premiuum_action = "";
	if(isset($_GET['premiuum_action']))
	{
		$_XXXXX_premiuum_action = sanitize_text_field($_GET['premiuum_action']);
	}

	
	?>
	<div class="wrap" style="font-family:roboto; font-size:14px; font-weight:300px;">
	
		  

			 
				<style>
				 .premiuum_tooltip {
				   position: relative;
				   display: inline-block;
				   border: 0px;
				   width:100%;
				 }
				 
				 .premiuum_tooltip .premiuum_tooltiptext {
				   visibility: hidden;
				   width: auto;
				   background-color: #BBBBBB;
				   color: #000000;
				   text-align: left;
				   border-radius: 6px;
				   padding: 20px;
				   position: absolute;
				   z-index: 1;
				   bottom: 150%;
				   left: 33%;
				   margin-left: -60px;
				   font-family: Roboto;
				   opacity: 0.95;
				 }
				 
				 .premiuum_tooltip .premiuum_tooltiptext::after {
				   content: "";
				   position: absolute;
				   top: 100%;
				   left: 33%;
				   margin-left: -5px;
				   border-width: 5px;
				   border-style: solid;
				  border: 0px;
				 }
				 
				 .premiuum_tooltip:hover .premiuum_tooltiptext {
				   visibility: visible;
				 }
				 
				 
				 </style>
				 
			 
			 
	 
			 <script>
			 
				 //alert("action: <?php echo $_XXXXX_premiuum_action; ?>");
				 ////////////////////////////////////////////////////////////////////////////////////////////
				////////////////////////////////////////////////////////////////////////////////////////////
				////////////////////////////////////////////////////////////////////////////////////////////
				 //// POPULATE ALL THE JAVASCRIPT VARS WITH THE "$PREMIUUM" PHP RESPONSE DATA:
				 
				 window.premiuum_partner_member_hash = "<?php if(is_array($premiuum)) echo esc_js($premiuum['member_hash']);?>";
				 console.log("PHP0. window.premiuum_partner_member_hash",window.premiuum_partner_member_hash);
				 
				 
				 window.premiuum_partner_member_emailaddress = "<?php if(is_array($premiuum)) echo esc_js($premiuum['member_emailaddress']);?>";
				 console.log("PHP0. window.premiuum_partner_member_emailaddress",window.premiuum_partner_member_emailaddress);
				 
				 window.premiuum_partner_member_password = "<?php if(is_array($premiuum)) echo esc_js($premiuum['member_password']);?>";
				 console.log("PHP0. window.premiuum_partner_member_password",window.premiuum_partner_member_password);
				 
				 
				 
				 
				 
				 
				 
				 window.premiuum_partner_account_hash = "<?php if(is_array($premiuum)) echo esc_js($premiuum['partner_account_hash']);?>";
				 console.log("PHP0. window.premiuum_partner_account_hash",window.premiuum_partner_account_hash);
				 
				 window.premiuum_wordpress_installer_status = "<?php if(is_array($premiuum)) echo esc_js($premiuum['premiuum_wordpress_installer_response_status']);?>";
				 console.log("PHP0. window.premiuum_wordpress_installer_status",window.premiuum_wordpress_installer_status);
			 
			 
				 window.premiuum_partner_service_status = "<?php if(is_array($premiuum)) echo esc_js($premiuum['partner_service_status']);?>";
				 console.log("PHP0. window.premiuum_partner_service_status",window.premiuum_partner_service_status);
			 
	 
				 /// SET WORDPRESS URL: MASTER
				 window.partner_wordpress_url_master = "<?php if(is_array($premiuum)) echo esc_js($premiuum['partner_wordpress_url_master']);?>";
				 console.log("PHP0. window.partner_wordpress_url_master",window.partner_wordpress_url_master);
				 
				 /// SET WORDPRESS URL: SITE
				 window.partner_wordpress_url_site = "<?php if(is_array($premiuum)) echo esc_js($premiuum['partner_wordpress_url_site']);?>";
				 console.log("PHP0. window.partner_wordpress_url_site",window.partner_wordpress_url_site);
				 
				 /// SET WORDPRESS HOMEPAGE: URL
				 window.partner_wordpress_url_homepage = "<?php if(is_array($premiuum)) echo esc_js($premiuum['partner_wordpress_url_homepage']);?>";
				 console.log("PHP0. window.partner_wordpress_url_homepage",window.partner_wordpress_url_homepage);
				 
				 /// SET WORDPRESS ACCOUNT: EMAIL
				 window.premiuum_partner_account_email_address = "<?php if(is_array($premiuum)) echo esc_js($premiuum['partner_account_email_address']);?>";
				 console.log("PHP0. window.premiuum_partner_account_email_address",window.premiuum_partner_account_email_address);
				 
				 /// SET PREMIUUM ACTION
				window.premiuum_action = "<?php if(isset($_XXXXX_premiuum_action)) echo esc_js($_XXXXX_premiuum_action);?>";
				console.log("PHP0. window.premiuum_action",window.premiuum_action);
				
				
				
				
				
				
				 /// NO CONFLICT
				 var $premiuum = jQuery.noConflict();
				 
				 /// MAKES AJAX FAST
				 $premiuum.ajaxSetup({
				   async: false
				 });
				 
				 /// CORS SUPPORT
				 $premiuum.support.cors = true; // force cross-site scripting (as of jQuery 1.5)
				 
			 
			 
			 /* javascript */
			 
			 function premiuum_language_translator(translate_this_text,translation_timestemp_id)
			 {
				 /////////////////////////////////////////
				 /// placeholder for future functionality
				 return translate_this_text;
			 }
			 
			 
			 
			 
			 
			 
			 function premiuum_wordpress_installer_update_and_confirm()
			 {
				 
				 //alert(2);
				 
				 
				 var XXXXX_premiuum_wordpress_installer_action = "UPDATE_WORDPRESS_PARTNER";
				 console.log("XXXXX_premiuum_wordpress_installer_action",XXXXX_premiuum_wordpress_installer_action);
				 
				 var XXXXX_premiuum_wordpress_installer_site_title = $premiuum("#premiuum_wordpress_installer_site_title_id").val()
				 console.log("XXXXX_premiuum_wordpress_installer_site_title",XXXXX_premiuum_wordpress_installer_site_title);
				 
				 var XXXXX_premiuum_wordpress_installer_tagline = $premiuum("#premiuum_wordpress_installer_tagline_id").val()
				 console.log("XXXXX_premiuum_wordpress_installer_tagline",XXXXX_premiuum_wordpress_installer_tagline);
				 
				 var XXXXX_premiuum_wordpress_installer_wordpress_address_url = $premiuum("#premiuum_wordpress_installer_wordpress_address_url_id").val()
				 console.log("XXXXX_premiuum_wordpress_installer_wordpress_address_url",XXXXX_premiuum_wordpress_installer_wordpress_address_url);
				 
				 var XXXXX_premiuum_wordpress_installer_site_address_url = $premiuum("#premiuum_wordpress_installer_site_address_url_id").val()
				 console.log("XXXXX_premiuum_wordpress_installer_site_address_url",XXXXX_premiuum_wordpress_installer_site_address_url);
				 
				 var XXXXX_premiuum_wordpress_installer_administration_email_address = $premiuum("#premiuum_wordpress_installer_administration_email_address_id").val()
				 console.log("XXXXX_premiuum_wordpress_installer_administration_email_address",XXXXX_premiuum_wordpress_installer_administration_email_address);
				 
				 var XXXXX_premiuum_wordpress_installer_site_language = $premiuum("#premiuum_wordpress_installer_site_language_id").val()
				 console.log("XXXXX_premiuum_wordpress_installer_site_language",XXXXX_premiuum_wordpress_installer_site_language);
				 

				 var XXXXX_premiuum_wordpress_installer_partner_hash = window.premiuum_partner_account_hash;
				 console.log("XXXXX_premiuum_wordpress_installer_partner_hash",XXXXX_premiuum_wordpress_installer_partner_hash);
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 console.log("premiuum_wordpress_installer_update_account()",1);
				 
				 $premiuum(".premiuum_wordpress_installer_input_class").prop("disabled", true);
				 
				 
				 var premiuum_wordpress_installer_original_submit_button_html = $premiuum("#premiuum_wordpress_installer_register_button_id").html();
				 
				 $premiuum("#premiuum_wordpress_installer_register_button_id").html('<img src="<?php echo esc_url($premiuum_plugin_path); ?>assets/images/premiuum_animated_spinner_processing.gif" style="height:28px; width:auto; vertical-align:middle;">');	
				 
				 setTimeout(function()
				 {
			 
					 $premiuum.ajax({
						 crossDomain: true,
						 xhrFields: { withCredentials: true },
						 url: "https://gateway.premiuum.net/premiuum_wordpress_installer.api",
						 type: "POST",
						 dataType: "json",
						 async: false,
						 data: {
								 premiuum_wordpress_installer_action : XXXXX_premiuum_wordpress_installer_action
								 
								 , premiuum_wordpress_installer_site_title: XXXXX_premiuum_wordpress_installer_site_title
								 
								 , premiuum_wordpress_installer_tagline: XXXXX_premiuum_wordpress_installer_tagline
								 
								 , premiuum_wordpress_installer_wordpress_address_url: XXXXX_premiuum_wordpress_installer_wordpress_address_url
								 
								 , premiuum_wordpress_installer_site_address_url: XXXXX_premiuum_wordpress_installer_site_address_url
								 
								 , premiuum_wordpress_installer_administration_email_address: XXXXX_premiuum_wordpress_installer_administration_email_address
								 
								 , premiuum_wordpress_installer_site_language: XXXXX_premiuum_wordpress_installer_site_language
								 
								 , premiuum_wordpress_installer_partner_hash: XXXXX_premiuum_wordpress_installer_partner_hash
							 
						 },
						 beforeSend: function()
						 {
							 //do nothing
						 },				
						 success: function(premiuum_gateway_response)
						 {
							 
							 
							 
							 
							 
							 /////////////////////////////////////////////////////////////////////
							 /// NEW REGISTRATION: SUCCESS
							 if(premiuum_gateway_response.status.indexOf("SUCCESS") > -1)
							 {
								 
								 window.premiuum_customer_member_hash = premiuum_gateway_response.member_hash;
								 console.log("window.premiuum_customer_member_hash",window.premiuum_customer_member_hash);
								 
								 
								 window.premiuum_partner_member_emailaddress = premiuum_gateway_response.member_emailaddress;
								 console.log("window.premiuum_partner_member_emailaddress",window.premiuum_partner_member_emailaddress);
								 
								 window.premiuum_partner_member_password = premiuum_gateway_response.member_password;
								 console.log("window.premiuum_partner_member_password",window.premiuum_partner_member_password);
								 
							 
							 
								 
								 
								 
								 
								 
								 
								 window.premiuum_partner_account_hash = premiuum_gateway_response.partner_account_hash;
								 console.log("window.premiuum_partner_account_hash",window.premiuum_partner_account_hash);
							 
								 window.partner_account_name = premiuum_gateway_response.partner_account_name;
								 console.log("window.partner_account_name",window.partner_account_name);
								 
								 
								 /// update welcome screen
								 $premiuum("#premiuum_wordpress_installer_site_title_welcome").html(window.partner_account_name );
								 
								 
								 
								 
								 
								 window.partner_account_tagline = premiuum_gateway_response.partner_account_tagline;
								 console.log("window.partner_account_tagline",window.partner_account_tagline);
								 
								 /// update welcome screen
								 $premiuum("#premiuum_wordpress_installer_tagline_welcome").html(window.partner_account_tagline);
								 
								 
								 
								 
								 window.premiuum_partner_service_status = premiuum_gateway_response.partner_service_status;
								 console.log("window.premiuum_partner_service_status",window.premiuum_partner_service_status);
								 
								 
								 /// update welcome screen
							
								 
								if(window.premiuum_partner_service_status == "DEVELOPMENT") window.premiuum_partner_service_status_display = premiuum_language_translator("Development",1654631715);
								 
								 if(window.premiuum_partner_service_status == "OFF") window.premiuum_partner_service_status_display = premiuum_language_translator("Off",1654631738);
								 if(window.premiuum_partner_service_status == "LIVE") window.premiuum_partner_service_status_display = premiuum_language_translator("Live",1654631741);
								 
								 $premiuum("#partner_service_status_display_id").html(window.premiuum_partner_service_status_display);
								 
								 
								 
								 
								 var premiuum_gateway_response_system_message = premiuum_gateway_response.system_message;
								 console.log("premiuum_gateway_response_system_message",premiuum_gateway_response_system_message);
								 
								 
								 
								 
								 
								 
								 
								 
								 
								 
								 
								 /// SET WORDPRESS MASTER URL
								 window.partner_wordpress_url_master = premiuum_gateway_response.partner_wordpress_url_master;
								 console.log("window.partner_wordpress_url_master",window.partner_wordpress_url_master);
								 
								 /// SET WORDPRESS SITE URL
								 window.partner_wordpress_url_site = premiuum_gateway_response.partner_wordpress_url_site;
								 console.log("window.partner_wordpress_url_site",window.partner_wordpress_url_site);
								 
								 /// SET WORDPRESS HOMEPAGE
								 if(window.partner_wordpress_url_master) window.partner_wordpress_url_homepage = window.partner_wordpress_url_master;
								 if(window.partner_wordpress_url_site) window.partner_wordpress_url_homepage = window.partner_wordpress_url_site;
								 console.log("window.partner_wordpress_url_homepage",window.partner_wordpress_url_homepage);
								 
								 
								 
								 /// SET ADMNIN EMAIL ADDRESS
								 window.premiuum_partner_account_email_address = premiuum_gateway_response.partner_account_email_address;
								 console.log("window.premiuum_partner_account_email_address",window.premiuum_partner_account_email_address);
								 
								 
								 
								 
								 
								 
								 
								 
								 
								 setTimeout(function()
								 {
									 
									 console.log("premiuum_gateway_response",premiuum_gateway_response);
									 
									 alert(premiuum_gateway_response.system_message);
									 
									 $premiuum("#premiuum_wordpress_installer_screen_1").fadeOut();
									 
									 
									 
									 setTimeout(function()
									 {
										 //alert(1);
										 $premiuum("#premiuum_wordpress_installer_screen_3").fadeIn();
									 },500);
									 
			 
									 return true;
								 
				 
								 },1000);
							 }
						 }
					 });
				 },500);
			 }
			 
			 
			 
			 
			 
			  function premiuum_admin_update_ip(partner_ip_address,direction) {
				 
				 var personal_account_hash = window.premiuum_partner_account_hash;
				 //alert("1-personal_account_hash: "+personal_account_hash);
				 
				 var parameter_name = "BLINGK_DEVELOPMENT_PREVIEW_IPS";
				 //alert("1-parameter_name: "+parameter_name);
				 
				 var parameter_value = partner_ip_address;
				 //alert("1-parameter_value: "+parameter_value);
				 
				 var direction = direction;
				 //alert("1-direction: "+direction);
				 
				 var premiuum_preferences_manager = null;
				 
				 
				 
				 
				 ///////////////////////////////////////////////////////////////////////
				 /// DIRECTION == BACKOFFICE (to admin.Premiuum.net)
				 if(
					 (premiuum_preferences_manager == null)
					 && (!partner_ip_address)
					 && (direction == "backoffice")
				 ) {
					 
					 var alert_text = "";
					 alert_text += "\n";
					 alert_text += premiuum_language_translator("Success!",1654631745);
					 alert_text += "\n\n";
					 alert_text += premiuum_language_translator("Your window will now reload, to display your Premiuum Backoffice.",1654631823);
					 alert_text += "\n";
					 // alert_text += premiuum_language_translator("","_XXXXX_");
					 
					 alert(alert_text);
					 
					 var partner_homepage_url = "https://admin.premiuum.net/BLI_partners.admin"
					 
					 //alert("5-partner_homepage_url: "+partner_homepage_url);
					 location.assign(partner_homepage_url+"/?referring_partner=WORDPRESS");
				
					 return true;
					 
				 }
				 ///////////////////////////////////////////////////////////////////////
				 ///////////////////////////////////////////////////////////////////////
				 
				 
				 
				 
				 
				 var ajax_url = "https://gateway.premiuum.net/BLI_preferences_mananger.gate";
				 //alert("ajax_url: "+ajax_url);
				 
				 
				 $premiuum.ajax({
					 crossDomain: true
					 , xhrFields: { withCredentials: true }
					 , url: ajax_url
					 , type: "POST"
					 , dataType: "" /* not json */
					 , data: {
						 parameter_name: parameter_name,
						 parameter_value: parameter_value,
						 personal_account_hash: personal_account_hash,
						 admin_preview_pricetags: "FALSE",
					 }					
					 , success: function(response) {
						 
						 var premiuum_preferences_manager = true;
						 //alert("success");
						 
						 if(
							 (premiuum_preferences_manager)
							 && (partner_ip_address)
							 && (direction == "homepage")
						 ) {
						 
					 
							 /// ALERT: SUCCESS!
							 var alert_text = "";
							 alert_text += "\n";
							 alert_text += premiuum_language_translator("Success!",1654631831);
							 alert_text += "\n";
							 alert_text += "\n";
							 alert_text += premiuum_language_translator("Your window will now reload, to display your Premiuum Administrative Homepage.",1654632027);
							 alert_text += "\n";
							 alert(alert_text);
							 
							 /// ALERT: NEW TAB!
							 var alert_message = "";
							 alert_message += "\n";
							 alert_message += premiuum_language_translator("Alert!",1654678000);
							 alert_message += "\n\n";
							 alert_message += premiuum_language_translator("Premium will attempt to open a new window (or tab) now.",1654678040);
							 alert_message += "\n\n";
							 alert_message += premiuum_language_translator("(You may need to authorize this event.)",1654678043);
							 alert_message += "\n\n";
							 alert(alert_message);
							 
							 /// DO IT... OPEN NEW TAB NOW:
							 window.open(window.partner_wordpress_url_homepage,"PREMIUUM_WORDPRESS_LINK_ADMINISTRATOR");
							 return false;
							 
						 }
						 
						 //alert("001");
						 /// SET NEW IP, AND RELOAD TO ADMIN HOMEPAGE:
						 if(
							 (premiuum_preferences_manager)
							 && (!partner_ip_address)
							 && (direction == "homepage")
							 
						 ) {
							 
							 
							 var alert_text = "";
							 alert_text += "\n";
							 alert_text += premiuum_language_translator("Success!",1654635836);
							 alert_text += "\n";
							 alert_text += "\n";
							 alert_text += premiuum_language_translator("Your window will now reload, to display your Premiuum Preview.",1654636212);
							 alert_text += "\n";
							 
							 // alert_text += premiuum_language_translator("","_XXXXX_");
							 // alert_text += premiuum_language_translator("","_XXXXX_");
							 
							 alert(alert_text);
							 
							 
							 var partner_homepage_url = window.partner_wordpress_url_homepage;
							 
							 //alert("partner_homepage_url: "+partner_homepage_url);
							 
							 
							 if(typeof window.referring_partner !== "undefined")
							 {
								 if(typeof window.referring_partner !== "")
								 {
									 
										 var alert_message = "";
										 alert_message += "\n";
										 alert_message += premiuum_language_translator("Alert!",1654678047);
										 alert_message += "\n\n";
										 alert_message += premiuum_language_translator("Premium will attempt to open a new window (or tab) now.",1654678098);
										 alert_message += "\n\n";
										 alert_message += premiuum_language_translator("(You may need to authorize this event.)",1654678102);
										 alert_message += "\n\n";
										 alert(alert_message);
										 
										 window.open(partner_homepage_url,"WORDPRESS_PREMIUUM_PREVIEW");
										 return false;
									 
								 }
							 }
							 return false;
						 }
						 
					 }
					 , error: function(xhr, ajaxOptions, thrownError){
						 
						 alert("failed");
						 console.log('failed');
						 console.log('ajaxOptions: '+ajaxOptions);
						 console.log('thrownError: '+thrownError);
						 
						
						 return false;			  
					 }
				 });
			 }
			 
			 
			 function premiuum_preview_pricetags(partner_ip_address) {
				 
				
				 var personal_account_hash = window.premiuum_partner_account_hash;
				 //alert("1-personal_account_hash: "+personal_account_hash);
				 
				 var parameter_name = "BLINGK_DEVELOPMENT_PREVIEW_IPS";
				 //alert("1-parameter_name: "+parameter_name);
				 
				 var parameter_value = partner_ip_address;
				 //alert("1-parameter_value: "+parameter_value);
				 
				
				 //alert("1-direction: "+direction);
				 
				 var ajax_url = "https://gateway.premiuum.net/BLI_preferences_mananger.gate";
				 //alert("ajax_url: "+ajax_url);
				 
				 
				 
				 $premiuum.ajax({
					 crossDomain: true
					 , xhrFields: { withCredentials: true }
					 , url: ajax_url
					 , type: "POST"
					 , dataType: "" /* not json */
					 , data: {
						 parameter_name: parameter_name,
						 parameter_value: parameter_value,
						 personal_account_hash: personal_account_hash,
						 admin_preview_pricetags: "TRUE",
					 }					
					 , success: function(response) {
						 
						 var premiuum_preferences_manager = true;
						 //alert("success");
						 
						 if(
							 (premiuum_preferences_manager)
							 && (partner_ip_address)
						 ) {
						 
					 
							 var alert_message = "";
							 alert_message += "\n";
							 alert_message += premiuum_language_translator("Success!",1654636220);
							 alert_message += "\n\n";
							 alert_message += premiuum_language_translator("Your window will now reload, to display your Premiuum Service Preview.",1654636324);
							 alert_message += "\n\n";
							 alert(alert_message);
							 
							 
							 
							 
							 
							 
							 var partner_homepage_url = window.partner_wordpress_url_homepage;
															 
							 //alert("4-partner_homepage_url: "+partner_homepage_url);
					
						 
								 var alert_message = "";
								 alert_message += "\n";
								 alert_message += premiuum_language_translator("Alert!",1654677861);
								 alert_message += "\n\n";
								 alert_message += premiuum_language_translator("Premiuum will attempt to open a new tab (or tab) now.",1654677864);
								 alert_message += "\n\n";
								 alert_message += premiuum_language_translator("(You may need to authorize this event.)",1654677882);
								 alert_message += "\n\n";
								 alert(alert_message);
								 
								 window.open(partner_homepage_url,"WORDPRESS_PREMIUUM_PREVIEW");
								 return true;
							 
							 
							 location.assign(partner_homepage_url);
							 return true;
							 
						 }
					 }
				 });		
			 }		
						 
			 
				 
				 
				 
			 
			 
			 function premiuum_admin_kyc() {
				 
				 var kyc_login_button = $premiuum("#display_processing_kyc_login").html();
				 $premiuum("#display_processing_kyc_login").html('<center><img src="<?php echo esc_url($premiuum_plugin_path); ?>assets/images/premiuum_processing_v10.gif" style="height:150px; width:auto;" /></center>');
				
				 
				 setTimeout(function() { 
				  
					  
					 var alert_message = "";
					 alert_message += "\n";
					 alert_message += premiuum_language_translator("Alert!",1654677885);
					 alert_message += "\n\n";
					 alert_message += premiuum_language_translator("Premiuum will attempt to open a new window (or tab) now.",1654677969);
					 alert_message += "\n\n";
					 alert_message += premiuum_language_translator("(You may need to authorize this event.)",1654677973);
					 alert_message += "\n\n";
					 alert(alert_message);
					 
					 
					 
					 <?php
						 if(!isset($_SESSION['member']['MEMBER_ID_from_intelitruth']))
						 {
					 ?> 
					  
					 if(window.intelitruth_member_id == false)
					 {
					 
					  
						 var ajax_url = "https://gateway.premiuum.net/pre_kyc_aml_login.gate";
						 //alert("ajax_url: "+ajax_url);
						 
						 var parameter_name = "new_profile";
						 var parameter_value = "true";
						 
						 $premiuum.ajax({
							 crossDomain: true
							 , xhrFields: { withCredentials: true }
							 , url: ajax_url
							 , type: "POST"
							 , dataType: "" /* not json */
							 , data: {
								 parameter_name: parameter_name,
								 parameter_value: parameter_value,
							 }					
							 , success: function(response) {
								 
								 window.intelitruth_member_id = response;
								  
								var url = "https://partner.premiuum.net";
								
								var parameters = "";
								
								parameters += "?";
								parameters += "PROFILE_EMAIL_ADDRESS="+window.premiuum_partner_account_email_address;
								parameters += "&";
								parameters += "language_iso2="+window.premiuum_partner_member_language_iso2;
								
								
								window.open(url+parameters);
								
								//location.reload();
								
								$premiuum("#display_processing_kyc_login").html(kyc_login_button);
								
								
								return true;
								 
							 }
							 , error: function(xhr, ajaxOptions, thrownError){
								 
								 alert("failed");
								 console.log('failed');
								 console.log('ajaxOptions: '+ajaxOptions);
								 console.log('thrownError: '+thrownError);
								 
								 //$premiuum("#button_register_now_id").prop("disabled",false);
								 return false;			  
							 }
						 });
			 
					 }
					 
					 
					 <?php
					 
						 } // end MEMBER_ID_from_intelitruth
					 
					 ?>
					 
					 
					 
					 var url = "https://partner.premiuum.net";
													
					 var parameters = "";
					 
					 parameters += "?";
					 parameters += "PROFILE_EMAIL_ADDRESS="+window.premiuum_partner_account_email_address;
					 parameters += "&";
					 parameters += "language_iso2="+window.premiuum_partner_member_language_iso2;
					 
					 
					 window.open(url+parameters);
					 
					 $premiuum("#display_processing_kyc_login").html(kyc_login_button);
				 
					 return true;
				 
				 }, 300);
				 
			 }
			 
				 
			 
			 
			 
			 
			 function premiuum_admin_login() {
				 
			 
				 
				 var alert_message = "";
				 alert_message += "\n";
				 alert_message += premiuum_language_translator("Alert!",1654677976);
				 alert_message += "\n\n";
				 alert_message += premiuum_language_translator("Premiuum will attempt to open a new window (or tab) now.",1654677987);
				 alert_message += "\n\n";
				 alert_message += premiuum_language_translator("(You may need to authorize this event.)",1654677996);
				 alert_message += "\n\n";
				 alert(alert_message);
				 
				 
				 var url = "https://gateway.premiuum.net/BLI_processing_login.gate";
				 
				 var parameters = "";
				 
				 parameters += "?";
				 parameters += "language_iso2="+window.premiuum_partner_member_language_iso2;
				 parameters += "&";
				 parameters += "login_emailaddress="+window.premiuum_partner_member_emailaddress;
				 parameters += "&";
				 parameters += "login_password="+window.premiuum_partner_member_password;
				 parameters += "&";
				 parameters += "referral_source=WORDPRESS_DASHBOARD";
				 
				 
				 //alert("url: "+url);
				 //alert("parameters: "+parameters);
				 //return true;
			 
				 
				 window.open(url+parameters);
				 
				 return true;
			 }
			 
			 
			
			
			
			function premiuum_set_remote_member_account()
			{
				
				
				var ajax_url = "https://gateway.premiuum.net/premiuum_set_remote_member_account.gate";
				//alert("ajax_url: "+ajax_url);
				 
				
				 
				var set_member_id_hash = "<?php echo esc_js($premiuum['member_hash']);?>";
				var set_member_password = "<?php echo esc_js($premiuum['member_password']);?>";
				var set_member_emailaddress = "<?php echo esc_js($premiuum['member_emailaddress']);?>";
				var set_account_id_hash = "<?php echo  esc_js($premiuum['partner_account_hash']);?>";
				 
				$premiuum.ajax({
					crossDomain: true
					, xhrFields: { withCredentials: true }
					, url: ajax_url
					, type: "POST"
					, dataType: "" /* not json */
					, async: true
					, data: {
						premiuum_member_id_hash: set_member_id_hash,
						premiuum_member_password: set_member_password,
						premiuum_member_emailaddress: set_member_emailaddress,
						premiuum_account_id_hash: set_account_id_hash,
					}					
					, success: function(response) 
					{
						//alert("failed");
						console.log('premiuum_set_remote_member_account: success');
						console.log('premiuum_set_remote_member_account: response: '+response);
						return true;
						 
					}
					, error: function(xhr, ajaxOptions, thrownError)
					{
						 
						 alert("failed");
						 console.log('premiuum_set_remote_member_account: failed');
						 console.log('premiuum_set_remote_member_account: ajaxOptions: '+ajaxOptions);
						 console.log('premiuum_set_remote_member_account: thrownError: '+thrownError);
						 return false;			  
					}
				 });
			}
			/// SET THE REMOTE SESSIONS:
			premiuum_set_remote_member_account();
				 
				 
			 </script>
	
		
	 
	 
			
			<!------------ start: premiuum_wordpress_installer_screen_1 ----------------- -->
			<!------------ start: premiuum_wordpress_installer_screen_1 ----------------- -->
			<!------------ start: premiuum_wordpress_installer_screen_1 ----------------- -->
			<!------------ start: premiuum_wordpress_installer_screen_1 ----------------- -->
			<!------------ start: premiuum_wordpress_installer_screen_1 ----------------- -->
			<!------------ start: premiuum_wordpress_installer_screen_1 ----------------- -->
			<!------------ start: premiuum_wordpress_installer_screen_1 ----------------- -->
			<!------------ start: premiuum_wordpress_installer_screen_1 ----------------- -->
			<!------------ start: premiuum_wordpress_installer_screen_1 ----------------- -->
			<!------------ start: premiuum_wordpress_installer_screen_1 ----------------- -->
			<!------------ start: premiuum_wordpress_installer_screen_1 ----------------- -->
			<!------------ start: premiuum_wordpress_installer_screen_1 ----------------- -->
			<!------------ start: premiuum_wordpress_installer_screen_1 ----------------- -->
			<!------------ start: premiuum_wordpress_installer_screen_1 ----------------- -->
			<!------------ start: premiuum_wordpress_installer_screen_1 ----------------- -->
			<!------------ start: premiuum_wordpress_installer_screen_1 ----------------- -->
			<!------------ start: premiuum_wordpress_installer_screen_1 ----------------- -->
			<!------------ start: premiuum_wordpress_installer_screen_1 ----------------- -->
			<!------------ start: premiuum_wordpress_installer_screen_1 ----------------- -->
			<!------------ start: premiuum_wordpress_installer_screen_1 ----------------- -->
			<!------------ start: premiuum_wordpress_installer_screen_1 ----------------- -->
			<!------------ start: premiuum_wordpress_installer_screen_1 ----------------- -->
			<!------------ start: premiuum_wordpress_installer_screen_1 ----------------- -->
			<!------------ start: premiuum_wordpress_installer_screen_1 ----------------- -->
			<!------------ start: premiuum_wordpress_installer_screen_1 ----------------- -->
			<!------------ start: premiuum_wordpress_installer_screen_1 ----------------- -->
			<!------------ start: premiuum_wordpress_installer_screen_1 ----------------- -->
			<!------------ start: premiuum_wordpress_installer_screen_1 ----------------- -->
			<!------------ start: premiuum_wordpress_installer_screen_1 ----------------- -->
			<!------------ start: premiuum_wordpress_installer_screen_1 ----------------- -->
				 
			 <div id="premiuum_wordpress_installer_screen_1" style="width:100%; text-align:center; vertical-align:top; display:none;">
			
				 <!------------ premiuum logo ----------------- -->
				 <div style="width:100%; display:inline-block; text-align:left; padding-top:40px; width:auto;">
					 <img src="<?php echo esc_url($premiuum_plugin_path); ?>assets/images/premiuum_uu_icon_600x600_v2.png" style=" width:200px; border-radius: 33%;" />
				 </div>
				 
				 
				 
				 
				 <!------------ general settings ----------------- -->
				 <div style="width:100%; display:inline-block; text-align:left;  padding-top:40px; ">
					 <span style="font-size:27px; font-weight:400;">
						 
					 </span>
				 </div>
				 <!------------ name : input ----------------- -->
				 <?php
					 $parameter_name = "general_settings_title";
					 $parameter_title = premiuum_language_translator("Wecome to Premiuum!",1654238113);
					 $parameter_subtitle = premiuum_language_translator("Please confirm your general settings:",1654366593);
					 $parameter_header = premiuum_language_translator("New WordPress Site Detected!",1654366624);
					 
					 $premiuum_site_data_display_name = "";
					 if(isset($premiuum_site_data->display_name)) $premiuum_site_data_display_name = $premiuum_site_data->display_name;
					 $paramater_value = $premiuum_site_data_display_name; //"_XXXXX_"; // collect this from partner via with wordpress api
					 $paramater_placeholder = "";
				 ?>
				 <!-- bootstrap version -->
				 <section id="" style="padding-top:20px;">
					 <div class="container">
						 <div class="row">
							 
							 <div class="col-sm-12" style="text-align:center; padding-top:0px;">
							 
								 <span style="font-size:21px; font-weight:300; color:#009688">
									 <?php if($parameter_header) echo wp_kses($parameter_header,$premiuum_wordpress_escape_allowed_html);?>
								 </span>
						 
							 </div>
						 
						 </div>
						 
						 
						 
						 <div class="row">
							 
							 <div class="col-sm-12" style="text-align:center; padding-top:10px;">
							 
						 
								 <span style="font-size:36px; font-weight:100;">
									 <?php if($parameter_title) echo esc_html($parameter_title);?>
								 </span>
						 
							 </div>
						 
						 </div>
						 
						 
						 
						 
						 <div class="row" style="padding-top:10px;">
							 
							 <div class="col-sm-12" style="text-align:center; padding-top:0px;">
							 
								 <span style="font-size:23px; font-weight:500;">
									 <?php echo wp_kses(premiuum_language_translator($parameter_subtitle,1654239412),$premiuum_wordpress_escape_allowed_html); ?>
								 </span>
						 
							 </div>
						 
						 </div>
						 
						 
						 
					 </div>
				 </section>
				 
				 
				 
				 
		 
				 
				 
				 <!------------ name : input ----------------- -->
				 <?php
					$parameter_name = "premiuum_wordpress_installer_site_title";
					$parameter_title = premiuum_language_translator("Site Title",1654237930);
					//$paramater_value = get_bloginfo("name"); // "_XXXXX_"; // collect this from partner via with wordpress api
					//$paramater_value = "Example Title"; // get_bloginfo("name"); // "_XXXXX_"; // collect this from partner via with wordpress api
					if(is_array($premiuum))
					{
						$paramater_value = $premiuum['partner_account_name'];
					}
					 
					 //premiuum_test_display_value("premiuum",$premiuum);
					 $paramater_placeholder = "";
				 ?>
				 <!-- bootstrap version -->
				 <section id="" style="padding-top:40px;">
					 <div class="container">
						 <div class="row">
							 
							 <div class="col-sm-5" style="text-align:center; padding-top:0px;">
							 
								 <span style="font-size:21px; font-weight:400;">
									 <?php if($parameter_title) echo wp_kses($parameter_title,$premiuum_wordpress_escape_allowed_html);?>
								 </span>
						 
							 </div>
							 
							 <div class="col-sm-7" style="text-align:center; padding-top:0px;">
								 
								 <div class="premiuum_tooltip">
								 <input type="text" class="premiuum_wordpress_installer_input_class" id="<?php if($parameter_name) echo esc_attr($parameter_name);?>_id" name="<?php if($parameter_name) echo esc_attr($parameter_name);?>" value="<?php if($paramater_value) echo esc_attr($paramater_value);?>" placeholder="<?php if($paramater_placeholder) echo esc_attr($paramater_placeholder);?>" style="width:100%; height:auto; border-width:1px; padding:12px; font-family:roboto; font-size:19px; font-weight:300;" /> 
								 <div class="premiuum_tooltiptext">
										 <p>
											 This will be the name of your website, that Premiuum displays to your visitors.
										 </p>
										 <p>
											 You may edit this name independently of your WordPress General Settings, but it is recommended that the Name of your website be consistent.
										 </p>
									 </div>
								 </div>
							 </div>
						 </div>
					 </div>
				 </section>
				 
				 
				 
				 
				 <!------------ name : input ----------------- -->
				 <?php
					 $parameter_name = "premiuum_wordpress_installer_tagline";
					 $parameter_title = premiuum_language_translator("Tagline",1654238062);
					 //$paramater_value = get_bloginfo("description"); // "_XXXXX_"; // collect this from partner via with wordpress api
					 //$paramater_value = "Example Slogan"; // "_XXXXX_"; // collect this from partner via with wordpress api
					 if(is_array($premiuum))
					 {
						 $paramater_value = $premiuum['partner_account_tagline'];
					 }
					 
					 $paramater_placeholder = "";
				 ?>
				 <!-- bootstrap version -->
				 <section id="" style="padding-top:20px;">
					 <div class="container">
						 <div class="row">
							 
							 <div class="col-sm-5" style="text-align:center; padding-top:0px;">
							 
								 <span id="<?php if($parameter_name) echo esc_attr($parameter_name);?>_text" style="font-size:21px; font-weight:400;">
									 <?php if($parameter_title) echo esc_html($parameter_title);?>
								 </span>
						 
							 </div>
							 
							 <div class="col-sm-7" style="text-align:center; padding-top:0px;">
								 
								 <div class="premiuum_tooltip">
									 
								 <input type="text" class="premiuum_wordpress_installer_input_class" id="<?php if($parameter_name) echo esc_attr($parameter_name);?>_id" name="<?php if($parameter_name) echo esc_attr($parameter_name);?>" value="<?php if($paramater_value) echo esc_attr($paramater_value);?>" placeholder="<?php if($paramater_placeholder) echo esc_attr($paramater_placeholder);?>" style="width:100%; height:auto; border-width:1px; padding:12px; font-family:roboto; font-size:19px; font-weight:300;" /> 
								 <div class="premiuum_tooltiptext">
										 <p>
											 This will be your website tagline, that Premiuum displays to your visitors.
										 </p>
										 <p>
											 You may edit this tagline independently of your WordPress General Settings, but it is recommended that the Name of your website be consistent.
										 </p>
									 </div>
								 </div>
							 </div>
						 </div>
					 </div>
				 </section>
				 
				 
				 
				 
	 
				 
				
				 
				 <!------------ name : input ----------------- -->
				 <?php
					 $parameter_name = "premiuum_wordpress_installer_wordpress_address_url";
					 $parameter_title = premiuum_language_translator("WordPress Address (URL)",1654238070);
					 //$paramater_value = get_bloginfo("wpurl"); // "_XXXXX_"; // collect this from partner via with wordpress api
					 $paramater_value = ""; // "_XXXXX_"; // collect this from partner via with wordpress api
					 if(is_array($premiuum))
					  {
						  $paramater_value = $premiuum['partner_wordpress_url_site'];
					  }
					  
					 $paramater_placeholder = "https://wp.example.com";
				 ?>
				 <!-- bootstrap version -->
				 
				 <section id="" style="padding-top:20px;">
					 <div class="container">
						 <div class="row">
							 <div id="<?php if($parameter_name) echo esc_attr($parameter_name);?>_title" class="col-sm-5" style="text-align:center; padding-top:0px;">
								 <span id="<?php if($parameter_name) echo esc_attr($parameter_name);?>_text" style="font-size:21px; font-weight:400;">
									 <?php if($parameter_title) echo esc_html($parameter_title);?>
								 </span>
							 </div>
							 <div class="col-sm-7" style="text-align:center; padding-top:0px;">
								 <div class="premiuum_tooltip">
									 <input disabled type="text" class="premiuum_wordpress_installer_input_class" id="<?php if($parameter_name) echo esc_attr($parameter_name);?>_id" name="<?php if($parameter_name) echo esc_attr($parameter_name);?>" value="<?php if($paramater_value) echo esc_attr($paramater_value);?>" placeholder="<?php if($paramater_placeholder) echo esc_attr($paramater_placeholder);?>" style="width:100%; height:auto; border-width:1px; padding:12px; font-family:roboto; font-size:19px; font-weight:300;" /> 
									 <div class="premiuum_tooltiptext">
										 <p>
											 The "WordPress Address" reflects the primary homepage of your WordPress Installation.  This URL may or may not be the same address as your homepage or website, because WordPress enables multiple websites per installation.
										 </p>
										 <p>
											 To edit this URL, please visit your WordPress General Settings.
										 </p>
									 </div>
								 </div>
							 </div>
						 </div>
					 </div>
				 </section>
				 
				 
				 
				 
				 
				 
				 
				 <!------------ name : input ----------------- -->
				 <?php
					 $parameter_name = "premiuum_wordpress_installer_site_address_url";
					 $parameter_title = premiuum_language_translator("Site Address (URL)",1654238078);
					 $paramater_value = get_bloginfo("url"); // "_XXXXX_"; // collect this from partner via with wordpress api
					 $paramater_value = ""; // "_XXXXX_"; // collect this from partner via with wordpress api
					 if(is_array($premiuum))
					   {
						   $paramater_value = $premiuum['partner_wordpress_url_homepage'];
					   }
					 $paramater_placeholder = "https://site.example.com";
				 ?>
				 <!-- bootstrap version -->
				 <section id="" style="padding-top:20px;">
					 <div class="container">
						 <div class="row">
							 
							 <div id="<?php if($parameter_name) echo esc_attr($parameter_name);?>_title" class="col-sm-5" style="text-align:center; padding-top:0px;">
							 
								 <span style="font-size:21px; font-weight:400;">
									 <?php if($parameter_title) echo esc_html($parameter_title);?>
								 </span>
						 
							 </div>
							 
							 <div class="col-sm-7" style="text-align:center; padding-top:0px;">
								 <div class="premiuum_tooltip">
									 <input disabled type="text" class="premiuum_wordpress_installer_input_class" id="<?php if($parameter_name) echo esc_attr($parameter_name);?>_id" name="<?php if($parameter_name) echo esc_attr($parameter_name);?>" value="<?php if($paramater_value) echo esc_attr($paramater_value);?>" placeholder="<?php if($paramater_placeholder) echo esc_attr($paramater_placeholder);?>" style="width:100%; height:auto; border-width:1px; padding:12px; font-family:roboto; font-size:19px; font-weight:300;" /> 
									 
									 <div class="premiuum_tooltiptext">
										 <p>
											 The "Site Address" reflects your website's homepage.  This URL may or may not be the same address as your primary WordPress Installation, because WordPress enables multiple websites per installation.
										 </p>
										 <p>
											 This URL may be blank, if your website homepage is the same as your primary WordPress Installation.
										 </p>
										 <p>
											 To edit this website homepage URL, please visit your WordPress General Settings.
										 </p>
									 </div>
								 </div>
								 
						 
							 </div>
						 </div>
					 </div>
				 </section>
				 
				 
				 
				 
				 
				 
				 
			
					 
				 <!------------ name : input ----------------- -->
				 <?php
						$parameter_name = "premiuum_wordpress_installer_administration_email_address";
						$parameter_title = premiuum_language_translator("Administration Email Address",1654238082);
						$paramater_value = get_bloginfo("admin_email"); //"_XXXXX_"; // collect this from partner via with wordpress api
						//$paramater_value = "20220603.".time(). "@corp.nsdb.com"; //"_XXXXX_"; // collect this from partner via with wordpress api
						//$paramater_value = "20220605.100@corp.nsdb.com"; //"_XXXXX_"; // collect this from partner via with wordpress api
						$paramater_value = "";
						if(is_array($premiuum))
						  {
							  $paramater_value = $premiuum['partner_account_email_address'];
						  }
						$paramater_placeholder = "user.name@example.com";
				 ?>
				 <!-- bootstrap version -->
				 <section id="" style="padding-top:20px;">
					 <div class="container">
						 <div class="row">
							 
							 <div  id="<?php if($parameter_name) echo esc_attr($parameter_name);?>_title" class="col-sm-5" style="text-align:center; padding-top:0px;">
							 
								 <span id="<?php if($parameter_name) echo esc_attr($parameter_name);?>_span" style="font-size:21px; font-weight:400;">
									 <?php if($parameter_title) echo esc_html($parameter_title);?>
								 </span>
						 
							 </div>
							 
							 <div class="col-sm-7" style="text-align:center; padding-top:0px;">
								 <div class="premiuum_tooltip">
										 
									 <input disabled type="text" class="premiuum_wordpress_installer_input_class" id="<?php if($parameter_name) echo esc_attr($parameter_name);?>_id" name="<?php if($parameter_name) echo esc_attr($parameter_name);?>" value="<?php if($paramater_value) echo esc_attr($paramater_value);?>" placeholder="<?php if($paramater_placeholder) echo esc_attr($paramater_placeholder);?>" style="width:100%; height:auto; border-width:1px; padding:12px; font-family:roboto; font-size:19px; font-weight:300;" /> 
									 
									 <div class="premiuum_tooltiptext">
										 <p>
											 Premiuum may contact you at this address, while resolving customer and /or remittance issues.
										 </p>
										 <p>
											 To edit this Email Address, please visit your WordPress General Settings.
										 </p>
									 </div>
								 </div>
						 
							 </div>
						 </div>
					 </div>
				 </section>
				 
				 
				 
				 
							 
				 <!------------ name : input ----------------- -->
				 <?php
					 $parameter_name = "premiuum_wordpress_installer_site_language";
					 $parameter_title = premiuum_language_translator("Site Language",1654238087);
					 $paramater_value = get_bloginfo("language"); // "_XXXXX_"; // collect this from partner via with wordpress api
					 //$paramater_value = "en"; // "_XXXXX_"; // collect this from partner via with wordpress api
					 $paramater_placeholder = "";
				 ?>
				 <!-- bootstrap version -->
				 <section id="" style="padding-top:20px; display:none;">
					 <div class="container">
						 <div class="row">
							 
							 <div class="col-sm-5" style="text-align:center; padding-top:0px;">
							 
								 <span style="font-size:21px; font-weight:400;">
									 <?php if($parameter_title) echo esc_html($parameter_title);?>
								 </span>
						 
							 </div>
							 
							 <div class="col-sm-7" style="text-align:center; padding-top:0px;">
								 
								 <div class="premiuum_tooltip">
								 <input type="text" class="premiuum_wordpress_installer_input_class" id="<?php if($parameter_name) echo esc_attr($parameter_name);?>_id" name="<?php if($parameter_name) echo esc_attr($parameter_name);?>" value="<?php if($paramater_value) echo esc_attr($paramater_value);?>" placeholder="<?php if($paramater_placeholder) echo esc_attr($paramater_placeholder);?>" style="width:100%; height:auto; border-width:1px; padding:12px; font-family:roboto; font-size:19px; font-weight:300;" /> 
								 <div class="premiuum_tooltiptext">
										 <p>
											 The "WordPress Address" reflects the primary homepage of your WordPress Installation.  This URL may or may not be the same address as your homepage or website, because WordPress enables multiple websites per installation.
										 </p>
										 <p>
											 To edit this URL, please visit your WordPress General Settings.
										 </p>
									 </div>
								 </div>
							 </div>
						 </div>
					 </div>
				 </section>
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
						 
				 <!------------ name : input ----------------- -->
				 <?php
					 $parameter_name = "premiuum_wordpress_installer_password";
					 $parameter_title = premiuum_language_translator("Verify Your Premiuum Password",16542434037);
					 $paramater_value = "_XXXXX_"; // collect this from partner via with wordpress api
					 $paramater_placeholder = "";
				 ?>
				 <!-- bootstrap version -->
				 <section id="" style="padding-top:20px; display:none;">
					 <div class="container">
						 <div class="row">
							 
							 <div class="col-sm-5" style="text-align:center; padding-top:0px;">
							 
								 <span style="font-size:21px; font-weight:400;">
									 <?php if($parameter_title) echo esc_html($parameter_title);?>
								 </span>
						 
							 </div>
							 
							 <div class="col-sm-7" style="text-align:center; padding-top:0px;">
								 
								 <div class="premiuum_tooltip">
								 <input type="text" class="premiuum_wordpress_installer_input_class" id="<?php if($parameter_name) echo esc_attr($parameter_name);?>_id" name="<?php if($parameter_name) echo esc_attr($parameter_name);?>" value="<?php if($paramater_value) echo esc_attr($paramater_value);?>" placeholder="<?php if($paramater_placeholder) echo esc_attr($paramater_placeholder);?>" style="width:100%; height:auto; border-width:1px; padding:12px; font-family:roboto; font-size:19px; font-weight:300;" /> 
								 <div class="premiuum_tooltiptext">
										 <p>
											 The "WordPress Address" reflects the primary homepage of your WordPress Installation.  This URL may or may not be the same address as your homepage or website, because WordPress enables multiple websites per installation.
										 </p>
										 <p>
											 To edit this URL, please visit your WordPress General Settings.
										 </p>
									 </div>
								 </div>
							 </div>
						 </div>
					 </div>
				 </section>
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
					 
					 
				 <!------------ button: register account ----------------- -->
				 <?php
					 $parameter_name = "premiuum_wordpress_installer_register_button";
					 $parameter_title = premiuum_language_translator("...then click to set-up and go live!",1654238092);
					 $paramater_value = "_XXXXX_"; // collect this from partner via with wordpress api
					 $paramater_placeholder = "";
				 ?>
	 
				 
				 <!-- bootstrap version -->
				 <section id="premiuum_wordpress_installer_register_button_section" style="padding-top:20px; margin-bottom:100px;">
					 <div class="container">
						 <div class="row">
							 
							 <div class="col-sm-12" style="text-align:center; padding-top:0px;">
							 
								 <button type="button" class="premiuum_button_general" id="<?php if($parameter_name) echo esc_attr($parameter_name);?>_id" name="<?php if($parameter_name) echo esc_attr($parameter_name);?>" value="<?php if($paramater_value) echo esc_attr($paramater_value);?>" style="min-width:270px; width:auto; height:auto; border-width:1px; padding:12px; font-family:roboto; font-size:19px; font-weight:300; border-radius: 20px;" onClick="return premiuum_wordpress_installer_update_and_confirm();"><?php if($parameter_title) echo esc_html($parameter_title);?></button> 
						 
							 </div>
						 
						 </div>
					 </div>
				 </section>
				 
				 
				 
				 
				 
				 <!------------ button: verify password / activate account ----------------- -->
				 <?php
					 $parameter_name = "premiuum_wordpress_installer_verify_password_activate_account";
					 $parameter_title = premiuum_language_translator("...then click to activate your Premiuum account.",1654243405);
					 $paramater_value = "_XXXXX_"; // collect this from partner via with wordpress api
					 $paramater_placeholder = "";
				 ?>
				 
				 <!-- bootstrap version -->
				 <section id="premiuum_wordpress_installer_verify_password_activate_account_section" style="padding-top:20px; margin-bottom:100px; display:none;">
					 <div class="container">
						 <div class="row">
							 
							 <div class="col-sm-12" style="text-align:center; padding-top:0px;">
							 
								 <button type="button" class="premiuum_button_general" id="<?php if($parameter_name) echo esc_attr($parameter_name);?>_id" name="<?php if($parameter_name) echo esc_attr($parameter_name);?>" value="<?php if($paramater_value) echo esc_attr($paramater_value);?>" style="min-width:270px; width:auto; height:auto; border-width:1px; padding:12px; font-family:roboto; font-size:19px; font-weight:300; border-radius: 20px;" onClick="return premiuum_wordpress_installer_verify_password_and_activate_account();"><?php if($parameter_title) echo esc_html($parameter_title);?></button> 
						 
							 </div>
						 
						 </div>
					 </div>
				 </section>
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
	 
			 </div>
			 <!------------ end: premiuum_wordpress_installer_screen_1 ----------------- -->
			 <!------------ end: premiuum_wordpress_installer_screen_1 ----------------- -->
			 <!------------ end: premiuum_wordpress_installer_screen_1 ----------------- -->
			 <!------------ end: premiuum_wordpress_installer_screen_1 ----------------- -->
			 <!------------ end: premiuum_wordpress_installer_screen_1 ----------------- -->
			 <!------------ end: premiuum_wordpress_installer_screen_1 ----------------- -->
			 <!------------ end: premiuum_wordpress_installer_screen_1 ----------------- -->
			 <!------------ end: premiuum_wordpress_installer_screen_1 ----------------- -->
			 <!------------ end: premiuum_wordpress_installer_screen_1 ----------------- -->
			 <!------------ end: premiuum_wordpress_installer_screen_1 ----------------- -->
		 
		 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 <!------------ start: premiuum_wordpress_installer_screen_2 ----------------- -->
			 <!------------ start: premiuum_wordpress_installer_screen_2 ----------------- -->
			 <!------------ start: premiuum_wordpress_installer_screen_2 ----------------- -->
			 <!------------ start: premiuum_wordpress_installer_screen_2 ----------------- -->
			 <!------------ start: premiuum_wordpress_installer_screen_2 ----------------- -->
			 <!------------ start: premiuum_wordpress_installer_screen_2 ----------------- -->
			 <!------------ start: premiuum_wordpress_installer_screen_2 ----------------- -->
			 <!------------ start: premiuum_wordpress_installer_screen_2 ----------------- -->
			 <!------------ start: premiuum_wordpress_installer_screen_2 ----------------- -->
			 <!------------ start: premiuum_wordpress_installer_screen_2 ----------------- -->
				 
			 <div id="premiuum_wordpress_installer_screen_2" style="width:100%; text-align:center; vertical-align:top; display:none;">
				 
				 
				 <!-- UNUSED AT THE MOMENT --> 
				 
				 
			 
			 </div>
			 <!------------ end: premiuum_wordpress_installer_screen_2 ----------------- -->
			 <!------------ end: premiuum_wordpress_installer_screen_2 ----------------- -->
			 <!------------ end: premiuum_wordpress_installer_screen_2 ----------------- -->
			 <!------------ end: premiuum_wordpress_installer_screen_2 ----------------- -->
			 <!------------ end: premiuum_wordpress_installer_screen_2 ----------------- -->
			 <!------------ end: premiuum_wordpress_installer_screen_2 ----------------- -->
			 <!------------ end: premiuum_wordpress_installer_screen_2 ----------------- -->
			 <!------------ end: premiuum_wordpress_installer_screen_2 ----------------- -->
			 <!------------ end: premiuum_wordpress_installer_screen_2 ----------------- -->
			 <!------------ end: premiuum_wordpress_installer_screen_2 ----------------- -->
			 
			 
			 
		 
		 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 <!------------ start: premiuum_wordpress_installer_screen_3 ----------------- -->
			 <!------------ start: premiuum_wordpress_installer_screen_3 ----------------- -->
			 <!------------ start: premiuum_wordpress_installer_screen_3 ----------------- -->
			 <!------------ start: premiuum_wordpress_installer_screen_3 ----------------- -->
			 <!------------ start: premiuum_wordpress_installer_screen_3 ----------------- -->
			 <!------------ start: premiuum_wordpress_installer_screen_3 ----------------- -->
			 <!------------ start: premiuum_wordpress_installer_screen_3 ----------------- -->
			 <!------------ start: premiuum_wordpress_installer_screen_3 ----------------- -->
			 <!------------ start: premiuum_wordpress_installer_screen_3 ----------------- -->
			 <!------------ start: premiuum_wordpress_installer_screen_3 ----------------- -->
			 <!------------ start: premiuum_wordpress_installer_screen_3 ----------------- -->
			 <div id="premiuum_wordpress_installer_screen_3" style="width:100%; text-align:center; vertical-align:top; display:none;">	
				 
			 
				 <div class="d-flex flex-column h-100">
					 <main class="flex-shrink-0">
						 
						 <!-- UNCOMMENT TO ENABLE THE "HEADER / MENU OPTIONS FAQ CONTACT BAR..."
						 <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="">
							 <div class="container px-5">
								 <a class="navbar-brand" href="index.html">Start Bootstrap</a>
								 <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
								 <div class="collapse navbar-collapse" id="navbarSupportedContent">
									 <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
										 <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
										 <li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
										 <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
										 <li class="nav-item"><a class="nav-link" href="pricing.html">Pricing</a></li>
										 <li class="nav-item"><a class="nav-link" href="faq.html">FAQ</a></li>
										 <li class="nav-item dropdown">
											 <a class="nav-link dropdown-toggle" id="navbarDropdownBlog" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Blog</a>
											 <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownBlog">
												 <li><a class="dropdown-item" href="blog-home.html">Blog Home</a></li>
												 <li><a class="dropdown-item" href="blog-post.html">Blog Post</a></li>
											 </ul>
										 </li>
										 <li class="nav-item dropdown">
											 <a class="nav-link dropdown-toggle" id="navbarDropdownPortfolio" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Portfolio</a>
											 <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPortfolio">
												 <li><a class="dropdown-item" href="portfolio-overview.html">Portfolio Overview</a></li>
												 <li><a class="dropdown-item" href="portfolio-item.html">Portfolio Item</a></li>
											 </ul>
										 </li>
									 </ul>
								 </div>
							 </div>
						 </nav>
						 -->
						
						 <!-- Header-->
						 <header class="bg-dark py-5">
							 <div class="container px-5">
								 <div class="row gx-5 align-items-center justify-content-center">
									 <div class="col-lg-8 col-xl-7 col-xxl-6">
										 <div class="my-5 text-center text-xl-start">
											 <p class="lead fw-normal text-white-50 mb-4"><?php global $premiuum_wordpress_escape_allowed_html; echo wp_kses(premiuum_language_translator("Welcome to",1635500930),$premiuum_wordpress_escape_allowed_html); ?>...</p>
											 <h1 class="display-5 fw-bolder text-white mb-2">Premiuum Network</h1>
											 <!-- <p class="lead fw-normal text-white-50 mb-4"><?php echo wp_kses(premiuum_language_translator("nanopayments",1635500933),$premiuum_wordpress_escape_allowed_html); ?> / <?php echo wp_kses(premiuum_language_translator("link",1635500935),$premiuum_wordpress_escape_allowed_html); ?><sup>&trade;</sup></p> -->
											 <!-- <p class="lead fw-normal text-white-50 mb-4"><?php echo wp_kses(premiuum_language_translator("revenue",1641103765),$premiuum_wordpress_escape_allowed_html); ?> / <?php echo wp_kses(premiuum_language_translator("link",1635500935),$premiuum_wordpress_escape_allowed_html); ?><sup>&trade;</sup></p> -->
												 <p class="lead fw-normal text-white-50 mb-4"><?php echo wp_kses(premiuum_language_translator("revenue per link",1646685533),$premiuum_wordpress_escape_allowed_html); ?><sup>&trade;</sup></p>
											 <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
												 <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#start"><?php echo wp_kses(premiuum_language_translator("Get Started",1635500938),$premiuum_wordpress_escape_allowed_html); ?></a>
												 <a class="btn btn-outline-light btn-lg px-4" href="#features"><?php echo wp_kses(premiuum_language_translator("Learn More",1635500941),$premiuum_wordpress_escape_allowed_html); ?></a>
											 </div>
										 </div>
									 </div>
							
							
									 <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center">
										 <img class="img-fluid rounded-3 my-5" src="<?php echo esc_url($premiuum_plugin_path); ?>assets/images/premiuum_view_link_price_tag_HEADER_LOGO.png" alt="micropayments per link" style="height:70%; width:70%;" />
									
									
									 </div>
					 
									
								 </div>
							 </div>
							 
						 
						 </header>
						 
						 
					 
						 <!-- Blog preview section-->
						 <section class="py-5 bg-light">
							 <div class="container px-5 my-5">
								 <div class="row gx-5 justify-content-center">
									 <div class="col-lg-8 col-xl-6">
										 <div class="text-center" style="line-height:12px;">
											
									  
										 
											 <p class="lead fw-normal text-muted mb-5">
												 
											 <?php
											 
												 //premiuum_test_display_value("premiuum",$premiuum);
												 
												 if(is_array($premiuum))
												 {
													 
													
													if(stristr($premiuum['premiuum_wordpress_installer_response_status'],"RETURNING"))
													{
													
														
														echo esc_html(premiuum_language_translator("Welcome Back!",1641546661));
													
													
													
													
													} else {
													
													
														
														echo esc_html(premiuum_language_translator("Welcome New Partner!",1641546661001));
														
													}
													
									?>
											 </p>
									
									
									
									<?php
													if($premiuum['partner_account_name'])
													{
														
														global $premiuum_wordpress_escape_allowed_html;
														echo wp_kses('<div id="premiuum_wordpress_installer_site_title_welcome" style="width:100%; display:inline-block; font-family:roboto; font-weight:300; font-size:24px; padding-top:0px;">',$premiuum_wordpress_escape_allowed_html);
														
														echo wp_kses($premiuum['partner_account_name'],$premiuum_wordpress_escape_allowed_html);
														
														echo wp_kses('</div>',$premiuum_wordpress_escape_allowed_html);
													}
													
													if($premiuum['partner_account_tagline']);
													{
													
														echo wp_kses('<div id="premiuum_wordpress_installer_tagline_welcome" style="width:100%; display:inline-block; font-family:roboto; font-weight:200; font-size:14px; padding-top:15px; padding-bottom:30px; font-style:italic;">',$premiuum_wordpress_escape_allowed_html);
														
														echo wp_kses($premiuum['partner_account_tagline'],$premiuum_wordpress_escape_allowed_html);
														
														echo wp_kses('</div>',$premiuum_wordpress_escape_allowed_html);
													}
													
													
													
													
													
													
													
													
													
													
													
													if(stristr($premiuum['partner_service_status'],"LIVE")) $service_status_display = premiuum_language_translator("Live",1654631204);
													if(stristr($premiuum['partner_service_status'],"OFF")) $service_status_display = premiuum_language_translator("Off",1654631207);
													if(stristr($premiuum['partner_service_status'],"DEV")) $service_status_display = premiuum_language_translator("Development",1654631234);

												 
											 }
											 
											 ?>
											 
											
											 
											 <p class="lead fw-normal text-muted mb-5" style="line-height:42px;">
												 <b>
													 <?php echo wp_kses(premiuum_language_translator("Premiuum Account Status",1641546656),$premiuum_wordpress_escape_allowed_html); ?>:
												</b>
												<br>
												 <i>
													<span id="partner_service_status_display_id"><?php if($service_status_display) echo wp_kses($service_status_display,$premiuum_wordpress_escape_allowed_html);?></span>
												 </i>
											 </p>
										 
								
											 
											 
											 
											 
											 
											 
										 </div>
									 </div>
								 </div>
								 
								 
								 <p>
									 <h2  id="start" class="fw-bolder">
								 <?php
									 if(is_array($premiuum))
									 {
										 if(stristr($premiuum['premiuum_wordpress_installer_response_status'],"RETURNING"))
										  {
											 
											  echo esc_html(premiuum_language_translator("Get Started",1635742214));
											  echo esc_html('...');
											  
										  } else {
											
											  echo esc_html(premiuum_language_translator("Please continue...",1654557352));
											  echo esc_html('...');
										  }
										 
									 }
									
								 ?>
								 	</h2>
								 </p>
								 
								 
								 
								 
								 
								 
								 
								 <div class="row gx-5">
									 
									 <div class="col-lg-4 mb-5">
										 <div class="card h-100 shadow border-0">
											
											 <img class="card-img-top" src="<?php echo esc_url($premiuum_plugin_path); ?>assets/images/<?php 
																															
																						echo esc_html("premiuum_dashboard_pricetag_set.png");
																						
																			?>" alt="Set Link Price"  />
											 <div class="card-body p-4">
												 <div class="badge bg-primary bg-gradient rounded-pill mb-2"><?php echo wp_kses(premiuum_language_translator("Step 1",1635500957),$premiuum_wordpress_escape_allowed_html); ?></div>
												 <a class="text-decoration-none link-dark stretched-link" href="javascript:premiuum_admin_update_ip('<?php if($_SERVER['REMOTE_ADDR']) echo esc_js($_SERVER['REMOTE_ADDR']);?>','homepage');"><h4 class="card-title mb-3"><?php echo wp_kses(premiuum_language_translator("Set Price Tags",1635500728),$premiuum_wordpress_escape_allowed_html); ?></h4></a>
												 <p class="card-text mb-0"><?php echo wp_kses(premiuum_language_translator("All of the links on your website have been upgraded to Premiuum links, and they are all currently set to a 0.00 value.",1635500739),$premiuum_wordpress_escape_allowed_html); ?></p>
												 
												 <br>
												 <p class="card-text mb-0"><?php echo wp_kses(premiuum_language_translator('Click this <b>"Set Price Tags"</b> tile to view your Premiuum-enhanced website (as an administrator).',1635500744),$premiuum_wordpress_escape_allowed_html); ?></p>
												 <br>
												 <p class="card-text mb-0"><?php echo wp_kses(premiuum_language_translator("Then hover-over any link on your website to display the Premiuum price tag editing options.",1635500752),$premiuum_wordpress_escape_allowed_html); ?></p>
												 <br>
												 <p class="card-text mb-0"><?php echo wp_kses(premiuum_language_translator("Start now by giving at least one link a value of 0.01 or more ...up to 0.99 per link.",1635500758),$premiuum_wordpress_escape_allowed_html); ?><sup>*</sup></p>
												 <br>
												 <p class="card-text mb-0"><i><?php echo wp_kses(premiuum_language_translator('Status: Your Premiuum service is currently set to "Developer" mode. Your price tags-per-link are visible for administrative preview only, and not published for public viewing until <b>Step 3: Go Live</b>',1635501134),$premiuum_wordpress_escape_allowed_html); ?>!</i></p>
											 </div>
											 <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
												 <div class="d-flex align-items-end justify-content-between">
													 <div class="d-flex align-items-center">
														 <a class="btn btn-primary btn-lg px-4 me-sm-3" href="javascript:premiuum_admin_update_ip('<?php if($_SERVER['REMOTE_ADDR']) echo esc_js($_SERVER['REMOTE_ADDR']); ?>','homepage');"><?php echo wp_kses(premiuum_language_translator("Step 1",1635500762),$premiuum_wordpress_escape_allowed_html); ?>:<br><?php echo wp_kses(premiuum_language_translator("Set Price Tags",1635501138),$premiuum_wordpress_escape_allowed_html); ?></a>
													
													 </div>
												 </div>
											 </div>
										 </div>
									 </div>
									 
									 
									 
									 <div class="col-lg-4 mb-5">
										 <div class="card h-100 shadow border-0">
											
											 <img class="card-img-top" src="<?php echo esc_url($premiuum_plugin_path); ?>assets/images/<?php
											 
																															
																					 echo esc_html("premiuum_dashboard_pricetag_view.png");
																					 ?>" alt="<?php echo esc_attr(premiuum_language_translator("View Link Price",1635500766));?>" />
											 <div class="card-body p-4">
												 <div class="badge bg-primary bg-gradient rounded-pill mb-2"><?php echo wp_kses(premiuum_language_translator("Step 2",1635500772),$premiuum_wordpress_escape_allowed_html); ?></div>
												 <a class="text-decoration-none link-dark stretched-link" href="javascript:premiuum_preview_pricetags('<?php if($_SERVER['REMOTE_ADDR']) echo esc_js($_SERVER['REMOTE_ADDR']);?>');">
													 
													 <h4 class="card-title mb-3"><?php echo wp_kses(premiuum_language_translator("Preview Price Tags",1635500777),$premiuum_wordpress_escape_allowed_html); ?></h4></a>
												 <p class="card-text mb-0"><?php echo wp_kses(premiuum_language_translator("After you have completed <b>Step 1</b> <i>(at least one of your links has been assigned a price tag value)</i>",1635500781),$premiuum_wordpress_escape_allowed_html); ?>...</p>
												 <br>
												 <p class="card-text mb-0"><?php echo wp_kses(premiuum_language_translator('Click this <b>"Preview Price Tags"</b> tile to privately preview your price tags-per-link (as a visitor).',1635500787),$premiuum_wordpress_escape_allowed_html); ?></p>
												 <br>
												 <p class="card-text mb-0"><i><?php echo wp_kses(premiuum_language_translator("Note:  Hovering-over a link will prompt a price-tag to pop-up (when values have been set).",1635500790),$premiuum_wordpress_escape_allowed_html); ?></i></p>
												 <br>
												 <p class="card-text mb-0"><i><?php echo wp_kses(premiuum_language_translator("Alert: Premiuum does not support price tags linked to 18+ material.  (Please visit our Terms, below, for additional service details.)</i>",1635500797),$premiuum_wordpress_escape_allowed_html); ?></p>
											 </div>
											 <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
												 <div class="d-flex align-items-end justify-content-between">
													 <div class="d-flex align-items-center">
														 <a class="btn btn-primary btn-lg px-4 me-sm-3" href="javascript:premiuum_preview_pricetags('<?php if($_SERVER['REMOTE_ADDR']) echo esc_js($_SERVER['REMOTE_ADDR']);?>');"><?php echo wp_kses(premiuum_language_translator("Step 2",1635500800),$premiuum_wordpress_escape_allowed_html); ?>:<br><?php echo wp_kses(premiuum_language_translator("Preview Price Tags",1635500803),$premiuum_wordpress_escape_allowed_html); ?></a>
													
													 </div>
												 </div>
											 </div>
										 </div>
									 </div>
									 
									 
									 
									 <div class="col-lg-4 mb-5">
										 <div class="card h-100 shadow border-0">
											
											 <img class="card-img-top" src="<?php echo esc_url($premiuum_plugin_path); ?>assets/images/premiuum_go_live_v1_600x350_T.png" alt="Go Live!" />
											
											 <div class="card-body p-4">
												 <div class="badge bg-primary bg-gradient rounded-pill mb-2"><?php echo wp_kses(premiuum_language_translator("Step 3",1635500806),$premiuum_wordpress_escape_allowed_html); ?></div>
												 <a class="text-decoration-none link-dark stretched-link" href="javascript:premiuum_admin_kyc();"><h2 class="card-title mb-3"><?php echo wp_kses(premiuum_language_translator("Go Live",1635500806),$premiuum_wordpress_escape_allowed_html); ?>!</h2></a>
												 <p class="card-text mb-0"><?php echo wp_kses(premiuum_language_translator("After you are satisfied with your price tags (per link), simply activate your account by uploading basic identifying credentials (to facilitate payouts to you).",1635500809),$premiuum_wordpress_escape_allowed_html); ?></p>
												 <br>
												 <p class="card-text mb-0"><?php echo wp_kses(premiuum_language_translator('Click this <b>"Go Live"</b> tile to visit our convenient profile onboarding / account activate platform.',1635500815),$premiuum_wordpress_escape_allowed_html); ?></p>                                        
												 <br>
												
												 <p class="card-text mb-0"><i><?php echo wp_kses(premiuum_language_translator('Notes: 1) After your profile has been uploaded, please allow 24 hours for your account to be activated. 2) Account activation is free, and there are no maintenance fees.  3) After your account is activated, you may turn-on/off the Premiuum service any time, at no cost.</i>',1635500818),$premiuum_wordpress_escape_allowed_html); ?></p>
												 <br>
												 <p class="card-text mb-0"><i><?php echo wp_kses(premiuum_language_translator("Alert: The account-holder must be at least 18 years of age.",1635500820),$premiuum_wordpress_escape_allowed_html); ?></i></p>
												 
												 
				 
												 
											 </div>
											 <div class="card-footer p-4 pt-0 bg-transparent border-top-0" id="display_processing_kyc_login">
												 <div class="d-flex align-items-end justify-content-between align-items-center">
													 
				 
												   
														 <div class="d-flex align-items-center">
															 <a class="btn btn-primary btn-lg px-4 me-sm-3" href="javascript:premiuum_admin_kyc();"><?php echo wp_kses(premiuum_language_translator("Step 3",1635500823),$premiuum_wordpress_escape_allowed_html); ?>:<br><?php echo wp_kses(premiuum_language_translator("Validate ID & Go Live",1635500826),$premiuum_wordpress_escape_allowed_html); ?></a>
													
														 </div>
												 
												 </div>
											 </div>
										 </div>
										 
										 
										 
									 </div>
									
								 </div>
								
									<a href="javascript:premiuum_admin_login();"><img src="<?php echo esc_attr($premiuum_plugin_path); ?>assets/images/premiuum_dashboard_icon_5_T.png" style="width:auto; height:60px; vertical-align:bottom;" /></a>
									&nbsp;<a href="javascript:premiuum_admin_login();"><?php echo wp_kses(premiuum_language_translator("Click Here",1635500828),$premiuum_wordpress_escape_allowed_html); ?></a>
									<?php echo wp_kses(premiuum_language_translator("to access advanced options (including account deletion) via Premiuum back-office.",1635500831),$premiuum_wordpress_escape_allowed_html); ?>
							 </div>
							 
						 </section>
					 
					 
						 
						 <!-- Features section-->
						 <section class="py-5" id="features">
							 <div class="container px-5 my-5">
								 <div class="row gx-5">
									 <div class="col-lg-4 mb-5 mb-lg-0"><h3 class="fw-bolder mb-0"><span  style="line-height:150%;">
										 
										 <?php 
										 
										 	$premiuum_temporary_text = premiuum_language_translator("<u>The best</u> way to monetize valuable content",1635500833);
										 
										 
										 	echo wp_kses($premiuum_temporary_text,$premiuum_wordpress_escape_allowed_html);
										 
										 ?>:</span><ul style="font-size:66%;"><br><p>&check; <?php echo wp_kses(premiuum_language_translator("most profitable",1635500836),$premiuum_wordpress_escape_allowed_html); ?></p><p>&check; <?php echo wp_kses(premiuum_language_translator("easiest to use",1635500838),$premiuum_wordpress_escape_allowed_html); ?></p></ul> </h2></div>
									 <div class="col-lg-8">
										 <div class="row gx-5 row-cols-1 row-cols-md-2">
											 
											 <div class="col mb-5 h-100">
												 <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><span class="iconify" data-icon="entypo:price-tag"></span></div>
												 <h2 class="h5"><?php echo wp_kses(premiuum_language_translator("Price Tag",1635500841),$premiuum_wordpress_escape_allowed_html); ?> / <?php echo wp_kses(premiuum_language_translator("Link",1635500843),$premiuum_wordpress_escape_allowed_html); ?><sup>&trade;</sup></h2>
												 <p class="mb-0"><?php echo wp_kses(premiuum_language_translator('Premiuum affixes a visually appealing "price tag" to <u>all the links on your website</u>.',1635500846),$premiuum_wordpress_escape_allowed_html); ?></p>
											 </div>
											 <div class="col mb-5 h-100">
												 <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-toggles2"></i></div>
												 <h2 class="h5"><span style="font-size:70%;">EUR</span> <?php echo wp_kses(premiuum_language_translator("0.00 (free) - 0.99",1635500849),$premiuum_wordpress_escape_allowed_html); ?> <span style="font-size:70%;">EUR</span></h2>
												 <p class="mb-0"><?php echo wp_kses(premiuum_language_translator("A simple administrative interface makes it easy to define the value of each link (individually, per page, or site-wide).",1635500852),$premiuum_wordpress_escape_allowed_html); ?></p>
											 </div>
											 
													 
											 <div class="col mb-5 h-100">
												   <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-clock"></i></div>
												   <h2 class="h5"><?php echo wp_kses(premiuum_language_translator("Time-based Price Tags",1635500857),$premiuum_wordpress_escape_allowed_html); ?></h2>
												   <p class="mb-0"><?php echo wp_kses(premiuum_language_translator('"Premiering" <i>(e.g., first 72 hours)</i> and "Archive" <i>(e.g., after 90 days)</i> price tag values can be set separately!<',1635500860),$premiuum_wordpress_escape_allowed_html); ?>/p>
											 </div>
											 
											 <div class="col mb-5 h-100">
												   <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><span class="iconify" data-icon="subway:exit"></span></div>
												   <h2 class="h5"><?php echo wp_kses(premiuum_language_translator('Monetize User "Exits"',1635500862),$premiuum_wordpress_escape_allowed_html); ?></h2>
												   <p class="mb-0"><?php echo wp_kses(premiuum_language_translator("Add price tags to all source and reference links (aka Exit Links), traditionally where users are handed-over / lost to 3rd parties.",1635500865),$premiuum_wordpress_escape_allowed_html); ?></p>
											 </div>
												   
												   
								   
						
											 <div class="col mb-5 mb-md-0 h-100">
												 <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><span class="iconify" data-icon="dashicons:format-video"></span></div>
												 <h2 class="h5"><?php echo wp_kses(premiuum_language_translator('Instant "Pay-per-View" (video)',1635500868),$premiuum_wordpress_escape_allowed_html); ?></h2>
												 <p class="mb-0"><?php echo wp_kses(premiuum_language_translator("Seamlessly monetize any embedded video (YouTube, etc.) - <i>does not conflict with YouTube inline advertising / content monetization services.",1635500871),$premiuum_wordpress_escape_allowed_html); ?></i></p>
											 </div>
											 <div class="col h-100">
												 <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><span class="iconify" data-icon="bi:cash-coin"></span></div>
												 <h2 class="h5"><?php echo wp_kses(premiuum_language_translator("Daily Payouts",1635500873),$premiuum_wordpress_escape_allowed_html); ?></h2>
												 <p class="mb-0"><?php echo wp_kses(premiuum_language_translator("Automated payouts via SEPA (EU) and Bank Wire or Crypto (US/EU/Int'l), after 10% processing fee.",1635500877),$premiuum_wordpress_escape_allowed_html); ?></p>
											 </div>
						
						
						
												  
										 </div>
									 </div>
								 </div>
							 </div>
						 </section>
						 
						 
						 
						 
						 <!-- Features section -->
							 <section class="py-5 bg-light" id="executive">
								 <div class="container px-5 my-5">
									 <div class="row gx-5">
										 <div class="col-lg-4 mb-5 mb-lg-0"><h3 class="fw-bolder mb-0"><span  style="line-height:100%;"><?php echo wp_kses(premiuum_language_translator('Executive Brief',1635684336),$premiuum_wordpress_escape_allowed_html); ?>:</span><ul style="font-size:66%;"></ul> </h2></div>
										 <div class="col-lg-8">
											  
												 <div class="fs-4 mb-4"">
													 <div style="line-height:180%; font-size: 21px; font-family:roboto; font-weight:300;">
													
													 <?php echo wp_kses(premiuum_language_translator('1. Premiuum affixes a price-tag to every text or video "link"',1635500879),$premiuum_wordpress_escape_allowed_html); ?>
													 <br>
													 <?php echo wp_kses(premiuum_language_translator('2. You define per-link-price tag values (0.00 - 0.99 EUR).<sup>*</sup>',1635500882),$premiuum_wordpress_escape_allowed_html); ?>
													 <br>
													 <?php echo wp_kses(premiuum_language_translator("3. Your visitors seamlessly pay to click-on / visit links.",1635500885),$premiuum_wordpress_escape_allowed_html); ?>
													
													 <br>
													<?php echo wp_kses(premiuum_language_translator("4. Monitor traffic & revenue statistics via secured back-office.",1635500888),$premiuum_wordpress_escape_allowed_html); ?> 
													 <br>
													 <?php echo wp_kses(premiuum_language_translator("5. PayPal / Stripe not required.",1635500890),$premiuum_wordpress_escape_allowed_html); ?>
													 <br>
												  
													 <?php echo wp_kses(premiuum_language_translator("6.  Premiuum is an EU-regulated payment gateway - available worldwide.",1635500893),$premiuum_wordpress_escape_allowed_html); ?>
													 
													 <br>
													 <?php echo wp_kses(premiuum_language_translator("7. 10% processing fee.  (You keep 90% of revenue.)",1635500896),$premiuum_wordpress_escape_allowed_html); ?>
													 <br>
													 <?php echo wp_kses(premiuum_language_translator("8. Daily payouts available via",1635501142),$premiuum_wordpress_escape_allowed_html); ?>:<ul style="line-height:90%;">
														 <p></p>
														 <p>&check; SEPA (EU)</p>
														 <p>&check; <?php echo wp_kses(premiuum_language_translator("Bank Wire Transfer (U.S.A. & International)",1635684377),$premiuum_wordpress_escape_allowed_html); ?></p>
														 <p>&check; <?php echo wp_kses(premiuum_language_translator("Crypto",1635684468),$premiuum_wordpress_escape_allowed_html); ?> (BTC, CloudCoin, Nano, ...)</p>
													 </ul>
													 <br>
													 <?php echo wp_kses(premiuum_language_translator("9. Premiuum is a EUR-based e-wallet as a service<sup>**</sup> - avilable worldwide, and supports 40+ languages.",1635500908),$premiuum_wordpress_escape_allowed_html); ?>
													 
													 <hr>
												   <i style="font-size:60%;">* <?php echo wp_kses(premiuum_language_translator("Please contact us if you need to set price tag values higher than 0.99 EUR",1635500912),$premiuum_wordpress_escape_allowed_html); ?></i>
													<p>
														<i style="font-size:60%;">** <?php echo wp_kses(premiuum_language_translator("Please contact us if you require e-wallet services based in another currency (not EUR).",1635500912001),$premiuum_wordpress_escape_allowed_html); ?></i>
													</p>
													 </div>
							
							
													  
											 </div>
										 </div>
									 </div>
									 
									 <!-- Call to action
										 <aside class="bg-primary bg-gradient rounded-3 p-4 p-sm-5 mt-5">
											 <div class="d-flex align-items-center justify-content-between flex-column flex-xl-row text-center text-xl-start">
												 <div class="mb-4 mb-xl-0">
													 <div class="fs-3 fw-bold text-white">Tell a Friend</div>
													 <div class="text-white-50">Earn 50% of net revenue - for the life of all referrals.</div>
												 </div>
												 <div class="ms-xl-4">
													 <div class="input-group mb-2">
														 <input class="form-control" type="text" placeholder="First Name" aria-label="First Name of Friend" aria-describedby="button-newsletter" />
									 
													 </div>
													 <div class="input-group mb-2">
														 <input class="form-control" type="text" placeholder="Last Name" aria-label="Last Name of Friend" aria-describedby="button-newsletter" />
													 </div>
													 <div class="input-group mb-2">
														 <input class="form-control" type="text" placeholder="Email Eddress" aria-label="Email Address of Friend" aria-describedby="button-newsletter" />
														 <button class="btn btn-outline-light" id="button-newsletter" type="button">Invite</button>
													 </div>
													 <div class="small text-white-50">3 invitations remaining @ 50% referral commission - make them count!</div>
												 </div>
											 </div>
										 </aside>
										 --->
										 
								 </div>
								 
								 
							 </section>
						 
							 
										 
										 
										 <!-- Features section -->
											 <section class="py-5" id="agents">
												 <div class="container px-5 my-5">
													 <div class="row gx-5">
														 <div class="col-lg-4 mb-5 mb-lg-0"><h3 class="fw-bolder mb-0"><span  style="line-height:100%;"><?php echo wp_kses(premiuum_language_translator('Developers',1635684336001),$premiuum_wordpress_escape_allowed_html); ?>:</span><ul style="font-size:66%;"><!-- <br><p>&check; most profitable</p><p>&check; easiest to use</p> --></ul> </h2></div>
														 <div class="col-lg-8">
															  
																 <div class="fs-4 mb-4" style="line-height:180%;">
																	 <b><?php echo wp_kses(premiuum_language_translator('Earn 50% Net Revenue From Your Clients:',1635684337001),$premiuum_wordpress_escape_allowed_html); ?></b>
																	 <br>
																	 <?php echo wp_kses(premiuum_language_translator('1. Register as a Premiuum Agent:',16355008790011),$premiuum_wordpress_escape_allowed_html); ?>
																	 <center>
																	 <a href="https://agents.premiuum.net" target="_PREMIUUM_AGENTS">https://agents.premiuum.net</a>
																	 </center>
																	 <?php echo wp_kses(premiuum_language_translator("2. Install Premiuum on your clients' websites.",1635500885001),$premiuum_wordpress_escape_allowed_html); ?>
																	<br>
																	<?php echo wp_kses(premiuum_language_translator("3. You earn 50% of Premiuum's net income from your clients' revenue.",1635500888),$premiuum_wordpress_escape_allowed_html); ?> 
																 
											
											
																	  
															 </div>
														 </div>
													 </div>
													 
													 <!-- Call to action
														 <aside class="bg-primary bg-gradient rounded-3 p-4 p-sm-5 mt-5">
															 <div class="d-flex align-items-center justify-content-between flex-column flex-xl-row text-center text-xl-start">
																 <div class="mb-4 mb-xl-0">
																	 <div class="fs-3 fw-bold text-white">Tell a Friend</div>
																	 <div class="text-white-50">Earn 50% of net revenue - for the life of all referrals.</div>
																 </div>
																 <div class="ms-xl-4">
																	 <div class="input-group mb-2">
																		 <input class="form-control" type="text" placeholder="First Name" aria-label="First Name of Friend" aria-describedby="button-newsletter" />
													 
																	 </div>
																	 <div class="input-group mb-2">
																		 <input class="form-control" type="text" placeholder="Last Name" aria-label="Last Name of Friend" aria-describedby="button-newsletter" />
																	 </div>
																	 <div class="input-group mb-2">
																		 <input class="form-control" type="text" placeholder="Email Eddress" aria-label="Email Address of Friend" aria-describedby="button-newsletter" />
																		 <button class="btn btn-outline-light" id="button-newsletter" type="button">Invite</button>
																	 </div>
																	 <div class="small text-white-50">3 invitations remaining @ 50% referral commission - make them count!</div>
																 </div>
															 </div>
														 </aside>
														 --->
														 
												 </div>
												 
												 
											 </section>
										 
											 
						 
							 
							 
							 
							 
							 
							 
						 <!-- Testimonial section
						 <div class="py-5 bg-light" id="info">
							
							 <div class="container px-5 my-5">
								 Executive Brief:
								 <div class="row gx-5 justify-content-center">
									<span class="iconify" data-icon="fluent:data-trending-20-filled"></span>
									 <div class="col-lg-10 col-xl-7">
										 <div class="text-left">
											 <div class="fs-4 mb-4 fst-italic">
												 <b>The Premiuum Network Plugin</b>
												 <br>
												 1. Affixes a price-tag to every "link".<sup>*</sup>
												 <br>
												 2. Link owners define price-tag values (0.00 - 0.99 EUR/USD).<sup>**</sup>
												 <br>
												 3. Visitors pay to click-on / visit the link.
												 <br>
												 4. Link owners keep 90% of the revenue.
												 <br>
												 5. Daily payouts via SEPA (EU) and
												 <br>
												 Bank Wire or Crypto (US/EU/Int'l).
												 <hr>
												* <i style="font-size:60%;">Please contact us if you need to set price tag values higher than 0.99 EUR/USD</i>
											  
											 </div>
											 <!-- signature
											 <div class="d-flex align-items-center justify-content-center">
												 <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
												 <div class="fw-bold">
													 Tom Ato
													 <span class="fw-bold text-primary mx-1">/</span>
													 CEO, Pomodoro
												 </div>
											 </div>
										   
										 </div>
									 </div>
								 </div>
					   
							 
								 
							 </div>
							 
							 
						 </div>
						
						-->
						
						
						
					 </main>
					 <!-- Footer-->
					 <footer class="bg-dark py-4 mt-auto">
						 <div class="container px-5">
							 <div class="row align-items-center justify-content-between flex-column flex-sm-row">
								 <div class="col-auto"><div class="small m-0 text-white"> Premiuum Network &copy; <?php echo wp_kses(date("Y"),$premiuum_wordpress_escape_allowed_html); ?></div></div>
								 <div class="col-auto">
								   
									 <a class="link-light small" href="https://support.premiuum.net/BLI_LEGAL.nsdb" target="_PREMIUUM_SUPPORT"><?php echo wp_kses(premiuum_language_translator("Privacy",1635500918),$premiuum_wordpress_escape_allowed_html); ?></a>
									 <span class="text-white mx-1">&middot;</span>
									 <a class="link-light small" href="https://support.premiuum.net/BLI_LEGAL.nsdb" target="_PREMIUUM_SUPPORT"><?php echo wp_kses(premiuum_language_translator("Terms",1635500923),$premiuum_wordpress_escape_allowed_html); ?></a>
									 <span class="text-white mx-1">&middot;</span>
									 <a class="link-light small" href="mailto:support@premiuum.net?subject=Installed WordPress Customer">support@premiuum.net</a>
								 </div>
								 <div class="col-auto"> <? 
								   
								   ### SELECT LANGUAGE:
								   $select_language_mode = "HTML";
								   
								   ### TO DO NOTES:
								   # supply language selection library
								   # e.g., via php @ require_once($master_config_root_path . "shared/select_language.shared"); 
								   # otherwise via jquery or local reference
								   
								 ?></div>
							 </div>
						 </div>
					 </footer>

					 
				 </div>
			 
			 
			 </div>
			 <!------------ end: premiuum_wordpress_installer_screen_3 ----------------- -->
			 <!------------ end: premiuum_wordpress_installer_screen_3 ----------------- -->
			 <!------------ end: premiuum_wordpress_installer_screen_3 ----------------- -->
			 <!------------ end: premiuum_wordpress_installer_screen_3 ----------------- -->
			 <!------------ end: premiuum_wordpress_installer_screen_3 ----------------- -->
			 <!------------ end: premiuum_wordpress_installer_screen_3 ----------------- -->
			 <!------------ end: premiuum_wordpress_installer_screen_3 ----------------- -->
			 <!------------ end: premiuum_wordpress_installer_screen_3 ----------------- -->
			 <!------------ end: premiuum_wordpress_installer_screen_3 ----------------- -->
			 <!------------ end: premiuum_wordpress_installer_screen_3 ----------------- -->
		 
		 
		 <!------------ html gutter ----------------- -->
		 <br>
		 <br>
		 <br>
		 <br>
	 
	 
	 
	</div>
	
	<script>
	
	 
	 
	 ////////////////////////////////////////////////////////////////////////////////////
	 ////////////////////////////////////////////////////////////////////////////////////
	 /// START: MANAGE OPENING SCREENS:
	 ////////////////////////////////////////////////////////////////////////////////////
	 ////////////////////////////////////////////////////////////////////////////////////
	 
	 
	 
	 
	 setTimeout(function()
	 {
		 
	 
	 
	 
		//console.log("window.premiuum_wordpress_installer_status",window.premiuum_wordpress_installer_status);
 
		//console.log("window.premiuum_partner_service_status",window.premiuum_partner_service_status);

	
		 
		 
		 /// RETURNING
		 if(window.premiuum_partner_service_status == "OFF")
		 {
			 $premiuum("#premiuum_wordpress_installer_screen_1").fadeIn();
		 
		 } else
		 
		 if(window.premiuum_wordpress_installer_status.indexOf("RETURNING")>-1)
		 {
			 $premiuum("#premiuum_wordpress_installer_screen_3").fadeIn();
		 
		 } else {
			 
			 /// NEW
			 $premiuum("#premiuum_wordpress_installer_screen_1").fadeIn();
		 }
	 },500);
	 
	 ////////////////////////////////////////////////////////////////////////////////////
	 ////////////////////////////////////////////////////////////////////////////////////
	 /// END: MANAGE OPENING SCREENS:
	 ////////////////////////////////////////////////////////////////////////////////////
	 ////////////////////////////////////////////////////////////////////////////////////
	
	</script>
	
	
	
	<?php
}


/// ADD PREMIUUM MENU ITEM:
add_action( 'admin_menu', 'premiuum_dashboard_page' );

function premiuum_dashboard_page() {
	add_menu_page(
		'Premiuum Dashboard',
		'Premiuum',
		'manage_options',
		'premiuum',
		'premiuum_dashboard_html',
		'dashicons-tag',
		null
	);
}







////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
/// START: AUTO-REDIRECTS TO PLUGIN PAGE....
	
register_activation_hook(__FILE__, 'premiuum_plugin_activate');

add_action('admin_init', 'premiuum_plugin_redirect');


function premiuum_plugin_activate() {
	add_option('premiuum_plugin_do_activation_redirect', true);
}

function premiuum_plugin_redirect() {
	if (get_option('premiuum_plugin_do_activation_redirect', false)) {
		delete_option('premiuum_plugin_do_activation_redirect');
		if(!isset($_GET['activate-multi']))
		{
			wp_redirect("/wp-admin/admin.php?page=premiuum&premiuum_action=installed");
		}
	}
}




/// END: AUTO-REDIRECTS TO PLUGIN PAGE
////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////

?>