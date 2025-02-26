<?php
/*
Plugin Name: Custom Forms For 1ShoppingCart.com Accounts
Version: 1.0.2	12/21/2009
Plugin URI: http://1shoppingcart.com/
Description: Add a <a href='http://www.1shoppingcart.com' target='_new'>1ShoppingCart.com</a> Custom Form to your blog. Usage: Goto 'Appearance >> Widgets' and add the '1SC Custom Forms' widget to the sidebar. Then goto 'Signup Form' in the Admin sidbar to setup the form.
Author: 1shoppingcart.com
Author URI: http://1shoppingcart.com
Copyright 2009 1shoppingcart.com  (email : support@1shoppingcart.com)
*/
/*
* Set up options if they do not exist
*/


add_option('oneshop_merchantid', '00000');
add_option('oneshop_ARThankyouURL');
add_option('oneshop_ARThankyouURL_wp', 1);
add_option('oneshop_copyarresponse');
add_option('oneshop_ar1');
add_option('oneshop_ar2');
add_option('oneshop_ar3');
add_option('oneshop_ar4');
add_option('oneshop_ar5');
add_option('oneshop_ar1_check');
add_option('oneshop_ar2_check');
add_option('oneshop_ar3_check');
add_option('oneshop_ar4_check');
add_option('oneshop_ar5_check');
add_option('oneshop_width', '15');
add_option('oneshop_submit_type', 'button'); // button, text, image
add_option('oneshop_submit_button_text', 'Submit');
add_option('oneshop_submit_image_url', '');
add_option('oneshop_submit_text', 'Submit');
add_option('oneshop_field_name_Name_required', '2');
add_option('oneshop_field_name_Email_required', '2');
add_option('oneshop_field_name_Company_required', '0');
add_option('oneshop_field_name_HomePhone_required', '0');
add_option('oneshop_field_name_WorkPhone_required', '0');
add_option('oneshop_field_name_Address1_required', '0');
add_option('oneshop_field_name_Address2_required', '0');
add_option('oneshop_field_name_City_required', '0');
add_option('oneshop_field_name_State_required', '0');
add_option('oneshop_field_name_Zip_required', '0');
add_option('oneshop_field_name_Country_required', '0');
add_option('oneshop_field_name_Fax_required', '0');
add_option('oneshop_field_name_Custom1_required', '0');
add_option('oneshop_field_name_Custom2_required', '0');
add_option('oneshop_field_name_Custom3_required', '0');
add_option('oneshop_field_name_Custom4_required', '0');
add_option('oneshop_field_name_Custom5_required', '0');
add_option('oneshop_field_name_Custom6_required', '0');
add_option('oneshop_field_name_Custom7_required', '0');
add_option('oneshop_field_name_Custom8_required', '0');
add_option('oneshop_field_name_Custom9_required', '0');
add_option('oneshop_field_name_Custom10_required', '0');
add_option('oneshop_field_name_Custom10_rows', '3');
add_option('oneshop_field_name_Custom10_cols', '25');
add_option('oneshop_field_name_Custom10_text', 'Enter Your Comments Here.');
add_option('oneshop_field_name_Name_label', 'Name');
add_option('oneshop_field_name_Email_label', 'Email');
add_option('oneshop_field_name_Company_label', 'Company');
add_option('oneshop_field_name_HomePhone_label', 'Home Phone');
add_option('oneshop_field_name_WorkPhone_label', 'Work Phone');
add_option('oneshop_field_name_Address1_label', 'Address');
add_option('oneshop_field_name_Address2_label', 'Address 2');
add_option('oneshop_field_name_City_label', 'City');
add_option('oneshop_field_name_State_label', 'State');
add_option('oneshop_field_name_Zip_label', 'Zip');
add_option('oneshop_field_name_Country_label', 'Country');
add_option('oneshop_field_name_Fax_label', 'Fax');

add_option('oneshop_field_name_Custom1_label');
add_option('oneshop_field_name_Custom2_label');
add_option('oneshop_field_name_Custom3_label');
add_option('oneshop_field_name_Custom4_label');
add_option('oneshop_field_name_Custom5_label');
add_option('oneshop_field_name_Custom6_label');
add_option('oneshop_field_name_Custom7_label');
add_option('oneshop_field_name_Custom8_label');
add_option('oneshop_field_name_Custom9_label');
add_option('oneshop_field_name_Custom10_label');

add_option('oneshop_sidebar_install_type', 'widget');
add_option('oneshop_sidebar_tag_outer', 'li');
add_option('oneshop_sidebar_tag_inner', 'h2');
add_option('oneshop_sidebar_tag_outer_attributes_name', '');
add_option('oneshop_sidebar_tag_outer_attributes_value', '');
add_option('oneshop_sidebar_tag_inner_attributes_name', '');
add_option('oneshop_sidebar_tag_inner_attributes_value', '');
add_option('oneshop_sidebar_tag_inner_label', 'Newsletter');
add_option('oneshop_sidebar_tag_inner_label_align', 'right');
add_option('oneshop_sidebar_custom_text_1', '');
add_option('oneshop_sidebar_custom_text_1_check');
add_option('oneshop_sidebar_custom_text_1_align', 'none');
add_option('oneshop_sidebar_custom_text_2', '');
add_option('oneshop_sidebar_custom_text_2_check');
add_option('oneshop_sidebar_custom_text_2_align', 'none');

//validation text
add_option('oneshop_field_name_Name_missing_field_color', 		'#f99');
add_option('oneshop_field_name_Name_missing_field_text_color', 		'#f00');
add_option('oneshop_field_name_Name_missing_field_validate_message', 		'Please fill in required fields.');
add_option('oneshop_field_name_Name_validate_message', 		'Please Enter Your Name');
add_option('oneshop_field_name_Email_invalid_message', 	'Please enter a valid email address, example: you@yourdomain.com');
add_option('oneshop_field_name_Email_validate_message', 	'Please Enter an Email Address');
add_option('oneshop_field_name_Company_validate_message', 	'Please Enter Your Company Name');
add_option('oneshop_field_name_HomePhone_validate_message', 'Please Enter Your Home Phone Number');
add_option('oneshop_field_name_WorkPhone_validate_message', 'Please Enter Your Work Phone Number');
add_option('oneshop_field_name_Address1_validate_message', 	'Please Enter Your Address');
add_option('oneshop_field_name_Address2_validate_message', 	'Please Enter Your Address2');
add_option('oneshop_field_name_City_validate_message', 		'Please Enter Your City');
add_option('oneshop_field_name_State_validate_message', 	'Please Enter Your State');
add_option('oneshop_field_name_Zip_validate_message', 		'Please Enter Your Zip Code');
add_option('oneshop_field_name_Country_validate_message', 	'Please Enter Your Country');
add_option('oneshop_field_name_Fax_validate_message', 		'Please Enter Your Fax Number');
add_option('oneshop_field_name_Custom1_validate_message', 	'Field is required');
add_option('oneshop_field_name_Custom2_validate_message', 	'Field is required');
add_option('oneshop_field_name_Custom3_validate_message', 	'Field is required');
add_option('oneshop_field_name_Custom4_validate_message', 	'Field is required');
add_option('oneshop_field_name_Custom5_validate_message', 	'Field is required');
add_option('oneshop_field_name_Custom6_validate_message', 	'Field is required');
add_option('oneshop_field_name_Custom7_validate_message', 	'Field is required');
add_option('oneshop_field_name_Custom8_validate_message', 	'Field is required');
add_option('oneshop_field_name_Custom9_validate_message', 	'Field is required');
add_option('oneshop_field_name_Custom10_validate_message', 	'Field is required');

	// Pre-2.6 compatibility
if ( ! defined( 'WP_CONTENT_URL' ) )
define( 'WP_CONTENT_URL', get_option( 'siteurl' ) . '/wp-content' );
if ( ! defined( 'WP_CONTENT_DIR' ) )
define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );
if ( ! defined( 'WP_PLUGIN_URL' ) )
define( 'WP_PLUGIN_URL', WP_CONTENT_URL. '/plugins' );
if ( ! defined( 'WP_PLUGIN_DIR' ) )
define( 'WP_PLUGIN_DIR', WP_CONTENT_DIR . '/plugins' );
// Guess the location
$oneshop_path = WP_PLUGIN_DIR.'/'.plugin_basename(dirname(__FILE__));
$oneshop_url =  WP_PLUGIN_URL.'/'.plugin_basename(dirname(__FILE__));

function widget_oneshop_form($args) {
  extract($args);
  echo $before_widget;
  echo $before_title.get_option('oneshop_sidebar_tag_inner_label').$after_title;
  oneshop_form(TRUE);
  echo $after_widget;
}

function oneshop_form_init()
{
	wp_enqueue_script('jquery-validate', WP_PLUGIN_URL.'/'.plugin_basename(dirname(__FILE__)).'/jquery.validate.js',array('jquery'),'1.5.5');
	wp_enqueue_script('oneshop-validate', WP_PLUGIN_URL.'/'.plugin_basename(dirname(__FILE__)).'/oneshop-validation.js.php',array('jquery-validate'),'1.0');
	register_sidebar_widget(__('1SC Custom Forms'), 'widget_oneshop_form');
}
add_action("plugins_loaded", "oneshop_form_init");


function oneshop_form($oneshop_is_widget = FALSE)
{



echo "<!-- Start of Custom Forms Plugin -->";
?>
<style>
#oneshop_custom_form input.error, #oneshop_custom_form textarea.error {
	background-color: <?php echo get_option('oneshop_field_name_Name_missing_field_color'); ?>;
}
#oneshop_custom_form div.error, #oneshop_custom_form label.error {
	text-align:center;
	color: <?php echo get_option('oneshop_field_name_Name_missing_field_text_color'); ?>;
}
#oneshop_custom_form div.errorlabels label {
	display: block;
}
#oneshop_custom_form textarea {
	width: 95%;
}
#oneshop_custom_form table,tr,td,th{
	border: none;
}
</style>

<?php
if(get_option('oneshop_sidebar_install_type') == "advanced" && $oneshop_is_widget == FALSE)
{
	echo "\n<".get_option('oneshop_sidebar_tag_outer');
	if (get_option('oneshop_sidebar_tag_outer_attributes_name') != "" && get_option('oneshop_sidebar_tag_outer_attributes_value') != "")
	{
		echo"  ".get_option('oneshop_sidebar_tag_outer_attributes_name')."='".get_option('oneshop_sidebar_tag_outer_attributes_value')."'";
	}
	echo ">";
	echo "\n<".get_option('oneshop_sidebar_tag_inner');
	if (get_option('oneshop_sidebar_tag_inner_attributes_name') != "" && get_option('oneshop_sidebar_tag_inner_attributes_value') != "")
	{
		echo"  ".get_option('oneshop_sidebar_tag_inner_attributes_name')."='".get_option('oneshop_sidebar_tag_inner_attributes_value')."'";
	}
	echo ">".get_option('oneshop_sidebar_tag_inner_label')."</".get_option('oneshop_sidebar_tag_inner').">";
}
echo "\n
<form name='oneshop_custom_form' id='oneshop_custom_form' method='post' action='https://www.mcssl.com/app/contactsave.asp'>
<input name='merchantid' type='hidden' id='merchantid' value='".get_option('oneshop_merchantid')."'>";

echo "<input name='ARThankyouURL' type='hidden' id='ARThankyouURL' value='";

if(get_option('oneshop_ARThankyouURL') == "" || get_option('oneshop_ARThankyouURL') == NULL)
{
	echo get_bloginfo('url').'/'.get_page_uri(get_option('oneshop_ARThankyouURL_wp'))."/";
}
elseif(get_option('oneshop_ARThankyouURL') != "" || get_option('oneshop_ARThankyouURL') != NULL)
{
	echo get_option('oneshop_ARThankyouURL');
}
echo "'>
<input name='copyarresponse' type='hidden' id='copyarresponse' value='".get_option('oneshop_copyarresponse')."'>
<input name='custom' type='hidden' id='custom' value='1'>";
if(get_option('oneshop_ar1_check') != "true" && get_option('oneshop_ar2_check') != "true" && get_option('oneshop_ar3_check') != "true" && get_option('oneshop_ar4_check') != "true" && get_option('oneshop_ar5_check') != "true")
{
	echo "\n\t<input name='ar' type='hidden' id='ar' value='0'>";
}
if(get_option('oneshop_ar1_check') == "true")
{
	echo "\n<input name='ar' type='hidden' id='ar' value='".get_option('oneshop_ar1')."'>";
}
if(get_option('oneshop_ar2_check') == "true")
{
	echo "\n<input name='ar' type='hidden' id='ar' value='".get_option('oneshop_ar2')."'>";
}
if(get_option('oneshop_ar3_check') == "true")
{
	echo "\n<input name='ar' type='hidden' id='ar' value='".get_option('oneshop_ar3')."'>";
}
if(get_option('oneshop_ar4_check') == "true")
{
	echo "\n<input name='ar' type='hidden' id='ar' value='".get_option('oneshop_ar4')."'>";
}
if(get_option('oneshop_ar5_check') == "true")
{
	echo "\n<input name='ar' type='hidden' id='ar' value='".get_option('oneshop_ar5')."'>";
}
echo "\n<input name='allowmulti' type='hidden' id='allowmulti' value='0'>";
echo "\n<div id='oneshop_sidebar_form' style='display:inline;'>";
echo "\n<table>";
// Custom text at top
if(get_option('oneshop_sidebar_custom_text_1_check') == 'true')
{
echo "\n\t<tr>";
echo "\n\t\t<td colspan='2'";
if (get_option('oneshop_sidebar_custom_text_1_align') != 'none'){echo " align='".get_option('oneshop_sidebar_custom_text_1_align')."'";}
echo ">".get_option('oneshop_sidebar_custom_text_1');
echo "\n\t\t</td>";
echo "\n\t</tr>";
}
$oneshop_visible_fields = "\n\t<input name='visiblefields' type='hidden' id='visiblefields' value='";
$oneshop_required_fields = "\n\t<input name='requiredfields' type='hidden' id='requiredfields' value='";
$oneshop_basic_fields_array = array(
								array(	"Name",			'oneshop_field_name_Name_label', 			'oneshop_field_name_Name_required'				),
							  	array(	"Email1",		'oneshop_field_name_Email_label', 			'oneshop_field_name_Email_required'				),
							  	array(	"Company",		'oneshop_field_name_Company_label', 		'oneshop_field_name_Company_required'			),
							  	array(	"HomePhone",	'oneshop_field_name_HomePhone_label', 		'oneshop_field_name_HomePhone_required'			),
							  	array(	"WorkPhone",	'oneshop_field_name_WorkPhone_label', 		'oneshop_field_name_WorkPhone_required'			),
							  	array(	"Address1",		'oneshop_field_name_Address1_label', 		'oneshop_field_name_Address1_required'			),
							  	array(	"Address2",		'oneshop_field_name_Address2_label', 		'oneshop_field_name_Address2_required'			),
							  	array(	"City",			'oneshop_field_name_City_label', 			'oneshop_field_name_City_required'				),
							  	array(	"State",		'oneshop_field_name_State_label', 			'oneshop_field_name_State_required'				),
							  	array(	"Zip",			'oneshop_field_name_Zip_label', 			'oneshop_field_name_Zip_required'				),
							  	array(	"Country",		'oneshop_field_name_Country_label', 		'oneshop_field_name_Country_required'			),
							  	array(	"Fax",			'oneshop_field_name_Fax_label', 			'oneshop_field_name_Fax_required'				));
foreach($oneshop_basic_fields_array as $oneshop_fields_array_item)
{

	if(get_option($oneshop_fields_array_item[2]) == 1 || get_option($oneshop_fields_array_item[2]) == 2)
	{
		echo"\n\t<tr>";
		echo "\n\t\t<td align='".get_option('oneshop_sidebar_tag_inner_label_align')."'>";
		$this_class = NULL;
		if (get_option($oneshop_fields_array_item[2]) == 2)
		{
			echo "\n\t\t\t<label for='".$oneshop_fields_array_item[0]."'>";
			echo "\n\t\t\t\t<strong>".get_option($oneshop_fields_array_item[1])."</strong>";
			echo "\n\t\t\t</label>";
			$this_class = "required";
		}
		else
		{
			echo "\n\t\t\t<label for='".$oneshop_fields_array_item[0]."'>";
			echo "\n\t\t\t\t".get_option($oneshop_fields_array_item[1]);
			echo "\n\t\t\t</label>";
		}
		if($oneshop_fields_array_item[0] == "Email1")
		{
			$this_class .= " email";
		}

		echo "\n\t\t</td>";
		echo "\n\t\t<td>";
		echo "\n\t\t\t<input name='".$oneshop_fields_array_item[0]."' id='".$oneshop_fields_array_item[1]."' type='text' size='".get_option('oneshop_width')."' ";
		echo "class='".$this_class."'";
		echo ">";
		echo "\n\t\t</td>";
		echo "\n\t</tr>";
		$oneshop_visible_fields .= ",".$oneshop_fields_array_item[0]."";
		if(get_option($oneshop_fields_array_item[2]) == 2)
		{
			$oneshop_required_fields .= ",".$oneshop_fields_array_item[0]."";
		}
	}
}

$oneshop_custom_fields_array = array(
								array(	"Custom1",		'oneshop_field_name_Custom1_label',			'oneshop_field_name_Custom1_required',	'1',	),
								array(	"Custom2",		'oneshop_field_name_Custom2_label',			'oneshop_field_name_Custom2_required',	'2',	),
								array(	"Custom3",		'oneshop_field_name_Custom3_label',			'oneshop_field_name_Custom3_required',	'3',	),
								array(	"Custom4",		'oneshop_field_name_Custom4_label',			'oneshop_field_name_Custom4_required',	'4',	),
								array(	"Custom5",		'oneshop_field_name_Custom5_label',			'oneshop_field_name_Custom5_required',	'5',	),
								array(	"Custom6",		'oneshop_field_name_Custom6_label',			'oneshop_field_name_Custom6_required',	'6',	),
								array(	"Custom7",		'oneshop_field_name_Custom7_label',			'oneshop_field_name_Custom7_required',	'7',	),
								array(	"Custom8",		'oneshop_field_name_Custom8_label',			'oneshop_field_name_Custom8_required',	'8',	),
								array(	"Custom9",		'oneshop_field_name_Custom9_label',			'oneshop_field_name_Custom9_required',	'9'		));

foreach($oneshop_custom_fields_array as $oneshop_fields_custom_array_item)
{
// Custom fields 1-9 0.5.8
	if(get_option($oneshop_fields_custom_array_item[2]) == 1 || get_option($oneshop_fields_custom_array_item[2]) == 2)
	{
		echo"\n\t<tr>";
		echo"	\n\t\t<input type='hidden' name='fieldname".$oneshop_fields_custom_array_item[3]."' value='field".$oneshop_fields_custom_array_item[3]."'>";
		echo"	\n\t\t<td align='".get_option('oneshop_sidebar_tag_inner_label_align')."'>";
		if (get_option($oneshop_fields_custom_array_item[2]) == 2)
		{
			echo "\n\t\t\t<strong>".get_option($oneshop_fields_custom_array_item[1])."</strong>";
			$onshop_this_required = "1";
			$this_class = "required";
		}
		else
		{
			echo "\n\t\t\t".get_option($oneshop_fields_custom_array_item[1]);
			echo "\n\t\t\t<input type='hidden' name='fieldname".$oneshop_fields_custom_array_item[3]."' value='".get_option($oneshop_fields_custom_array_item[1])."'>";
			echo $onshop_this_required = "";
			$this_class = "";
		}
		echo "\n\t\t</td>";
		echo "\n\t\t<td>";
		echo "\n\t\t\t<input type='hidden' name='required".$oneshop_fields_custom_array_item[3]."' value='".$onshop_this_required."'>";
		echo "\n\t\t\t<input name='field".$oneshop_fields_custom_array_item[3]."' type='text' size='".get_option('oneshop_width')."' ";
		echo "class='".$this_class."'";
		echo ">";
		echo "\n\t\t</td>";
		echo "\n\t</tr>";
	}
}

// Custom 10
if(get_option('oneshop_field_name_Custom10_required') == 1 || get_option('oneshop_field_name_Custom10_required') == 2)
{
	echo"<tr><input type='hidden' name='fieldname10' value='".get_option('oneshop_field_name_Custom10_label')."'>\n";
	if(trim(get_option('oneshop_field_name_Custom10_label')) != "")
	{
		echo "<td align='".get_option('oneshop_sidebar_tag_inner_label_align')."' >";
		if (get_option('oneshop_field_name_Custom10_required') == 2)
		{
			echo "<strong>".get_option('oneshop_field_name_Custom10_label')."</strong>";
			$this_class = "required";
		}
		else
		{
			echo get_option('oneshop_field_name_Custom10_label');
			$this_class = "";
		}
		echo "</td><td>";
	}
	else
	{
		echo "<td colspan='2'>";
	}
	echo "<input type='hidden' name='fieldname10' value='".get_option('oneshop_field_name_Custom10_label')."'>\n";
	echo "<textarea name='field10' cols='".get_option('oneshop_field_name_Custom10_cols')."' class='".$this_class."' rows='".get_option('oneshop_field_name_Custom10_rows')."' onclick=\"document.oneshop_custom_form.field10.value='';\">".get_option('oneshop_field_name_Custom10_text')."</textarea></td></tr>";
}
$oneshop_visible_fields .= "'>";
$oneshop_required_fields .= "'>";
echo $oneshop_visible_fields;
echo $oneshop_required_fields;
echo"\n\t<tr align='center'>";
echo "\n\t\t<td colspan='2'>";
if(get_option('oneshop_submit_type') == "button")
{
	echo "\n\t\t\t<input type='Submit' name='cmdSubmit' value='".get_option('oneshop_submit_button_text')."' />";
}
elseif(get_option('oneshop_submit_type') == "text")
{
	echo "\n\t\t\t<a onclick='document.oneshop_custom_form.submit' name='cmdSubmit' >".get_option('oneshop_submit_text')."</a>";
}
elseif(get_option('oneshop_submit_type') == "image")
{
	echo "\n\t\t\t<input type='image' name='cmdSubmit' src='".get_option('oneshop_submit_image_url')."' />";
}
echo "\n\t\t</td>";
echo "\n\t</tr>";
// Custom text at bottom
if(get_option('oneshop_sidebar_custom_text_2_check') == 'true')
{
	echo"\n\t<tr>";
	echo "\n\t\t<td colspan='2'";
	if (get_option('oneshop_sidebar_custom_text_2_align') != 'none')
	{
		echo " align='".get_option('oneshop_sidebar_custom_text_2_align')."'";
	}
	echo ">";
	echo "\n\t\t\t".get_option('oneshop_sidebar_custom_text_2');
	echo "\n\t\t</td>";
	echo "\n\t</tr>";
}
echo "\n</table>";
echo "\n</div>";
echo "\n</form>";

if(get_option('oneshop_sidebar_install_type') == "advanced" && $oneshop_is_widget == FALSE)
	{
		echo "\n</".get_option('oneshop_sidebar_tag_outer').">";

	}
echo "<!-- End of Custom Forms Plugin -->";
}




// Hook for adding admin menus
add_action('admin_menu', 'oneshop_admin');


// action function for above hook
function oneshop_admin()
{
	// Add a new submenu under Options:
	add_menu_page('Custom Forms For 1ShoppingCart.com', 'Signup Form', 7, '1shop_custom_forms', 'oneshop_custom_forms_settings');
}
function oneshop_custom_forms_settings() {
// Pre-2.6 compatibility
if ( ! defined( 'WP_CONTENT_URL' ) )
define( 'WP_CONTENT_URL', get_option( 'siteurl' ) . '/wp-content' );
if ( ! defined( 'WP_CONTENT_DIR' ) )
define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );
if ( ! defined( 'WP_PLUGIN_URL' ) )
define( 'WP_PLUGIN_URL', WP_CONTENT_URL. '/plugins' );
if ( ! defined( 'WP_PLUGIN_DIR' ) )
define( 'WP_PLUGIN_DIR', WP_CONTENT_DIR . '/plugins' );
// Guess the location
$oneshop_path = WP_PLUGIN_DIR.'/'.plugin_basename(dirname(__FILE__));
$oneshop_url =  WP_PLUGIN_URL.'/'.plugin_basename(dirname(__FILE__));
echo "<div class='wrap'>";
echo "<h2 style='text-align:right;'><strong>Custom Forms For 1ShoppingCart.com</strong></h2>"; ?>

<form id="oneshop_settings_form" method="post" action="options.php">
  <input type="hidden" name="action" value="update" />
  <input type="hidden" name="page_options" value="
oneshop_sidebar_tag_outer,
oneshop_sidebar_tag_inner,
oneshop_sidebar_tag_outer_attributes_name,
oneshop_sidebar_tag_outer_attributes_value,
oneshop_sidebar_tag_inner_attributes_name,
oneshop_sidebar_tag_inner_attributes_value,
oneshop_sidebar_tag_outer_attributes,
oneshop_sidebar_tag_inner_attributes,
oneshop_sidebar_tag_inner_label,
oneshop_sidebar_tag_inner_label_align,
oneshop_width,
oneshop_submit_type,
oneshop_submit_button_text,
oneshop_submit_image_url,
oneshop_submit_text,
oneshop_field_name_Name_required,
oneshop_field_name_Name_label,
oneshop_field_name_Email_label,
oneshop_field_name_Company_required,
oneshop_field_name_HomePhone_required,
oneshop_field_name_WorkPhone_required,
oneshop_field_name_Address1_required,
oneshop_field_name_Address2_required,
oneshop_field_name_City_required,
oneshop_field_name_State_required,
oneshop_field_name_Zip_required,
oneshop_field_name_Country_required,
oneshop_field_name_Fax_required,
oneshop_field_name_Company_label,
oneshop_field_name_HomePhone_label,
oneshop_field_name_WorkPhone_label,
oneshop_field_name_Address1_label,
oneshop_field_name_Address2_label,
oneshop_field_name_City_label,
oneshop_field_name_State_label,
oneshop_field_name_Zip_label,
oneshop_field_name_Country_label,
oneshop_field_name_Fax_label,
oneshop_sidebar_tag_padding,
oneshop_field_name_Custom1_required,
oneshop_field_name_Custom2_required,
oneshop_field_name_Custom3_required,
oneshop_field_name_Custom4_required,
oneshop_field_name_Custom5_required,
oneshop_field_name_Custom6_required,
oneshop_field_name_Custom7_required,
oneshop_field_name_Custom8_required,
oneshop_field_name_Custom9_required,
oneshop_field_name_Custom10_required,
oneshop_field_name_Custom10_rows,
oneshop_field_name_Custom10_cols,
oneshop_field_name_Custom10_text,
oneshop_field_name_Custom1_label,
oneshop_field_name_Custom2_label,

oneshop_field_name_Custom3_label,
oneshop_field_name_Custom4_label,
oneshop_field_name_Custom5_label,
oneshop_field_name_Custom6_label,
oneshop_field_name_Custom7_label,
oneshop_field_name_Custom8_label,
oneshop_field_name_Custom9_label,
oneshop_field_name_Custom10_label,
oneshop_sidebar_custom_text_1,
oneshop_sidebar_custom_text_1_check,
oneshop_sidebar_custom_text_1_align,
oneshop_sidebar_custom_text_2,
oneshop_sidebar_custom_text_2_check,
oneshop_sidebar_custom_text_2_align,


oneshop_sidebar_install_type,
oneshop_sidebar_tag_outer,
oneshop_sidebar_tag_inner,
oneshop_sidebar_tag_outer_attributes_name,
oneshop_sidebar_tag_outer_attributes_value,
oneshop_sidebar_tag_inner_attributes_name,
oneshop_sidebar_tag_inner_attributes_value,

oneshop_field_name_Name_missing_field_validate_message,
oneshop_field_name_Name_missing_field_text_color,
oneshop_field_name_Name_missing_field_color,
oneshop_field_name_Name_validate_message,
oneshop_field_name_Email_validate_message,
oneshop_field_name_Email_invalid_message,
oneshop_field_name_Company_validate_message,
oneshop_field_name_HomePhone_validate_message,
oneshop_field_name_WorkPhone_validate_message,
oneshop_field_name_Address1_validate_message,
oneshop_field_name_Address2_validate_message,
oneshop_field_name_City_validate_message,
oneshop_field_name_State_validate_message,
oneshop_field_name_Zip_validate_message,
oneshop_field_name_Country_validate_message,
oneshop_field_name_Fax_validate_message,
oneshop_field_name_Custom1_validate_message,
oneshop_field_name_Custom2_validate_message,
oneshop_field_name_Custom3_validate_message,
oneshop_field_name_Custom4_validate_message,
oneshop_field_name_Custom5_validate_message,
oneshop_field_name_Custom6_validate_message,
oneshop_field_name_Custom7_validate_message,
oneshop_field_name_Custom8_validate_message,
oneshop_field_name_Custom9_validate_message,
oneshop_field_name_Custom10_validate_message,

oneshop_merchantid,
oneshop_ARThankyouURL,
oneshop_ARThankyouURL_wp,
oneshop_copyarresponse,
oneshop_ar1,
oneshop_ar2,
oneshop_ar3,
oneshop_ar4,
oneshop_ar5,
oneshop_ar1_check,
oneshop_ar2_check,
oneshop_ar3_check,
oneshop_ar4_check,
oneshop_ar5_check" />
  <?php wp_nonce_field('update-options'); ?>
  <script>

<!--
function toggle_field(sender,id)
{
var target = document.getElementById(id);
target.disabled = !sender.checked;
}
function HideContent(id) {
document.getElementById(id).style.display = "none";
}
function ShowContent(id) {
document.getElementById(id).style.display = "block";
}
function ReverseDisplay(id) {
if(document.getElementById(id).style.display == "none") { document.getElementById(id).style.display = "block"; }
else { document.getElementById(id).style.display = "none"; }
}
/*-----------------------------------------------------------
    Toggles element's display value
    Input: any number of element id's
    Output: none
    ---------------------------------------------------------*/
function toggleDisp() {
    for (var i=0;i<arguments.length;i++){
        var d = $(arguments[i]);

        if (d.style.display == 'none')

            Effect.SlideDown(d);
        else
			Effect.SlideUp(d);
    }
}

// Example: obj = findObj("image1");
function findObj(theObj, theDoc)
{
var p, i, foundObj;
if(!theDoc) theDoc = document;
if( (p = theObj.indexOf("?")) > 0 && parent.frames.length)
{
theDoc = parent.frames[theObj.substring(p+1)].document;
theObj = theObj.substring(0,p);
}
if(!(foundObj = theDoc[theObj]) && theDoc.all) foundObj = theDoc.all[theObj];
for (i=0; !foundObj && i < theDoc.forms.length; i++)
foundObj = theDoc.forms[i][theObj];
for(i=0; !foundObj && theDoc.layers && i < theDoc.layers.length; i++)
foundObj = findObj(theObj,theDoc.layers[i].document);
if(!foundObj && document.getElementById) foundObj = document.getElementById(theObj);
return foundObj;
}
// Example: showHideLayers(Layer1,'','show',Layer2,'','hide');
function showHideLayers()
{
var i, visStr, obj, args = showHideLayers.arguments;
for (i=0; i<(args.length-2); i+=3)
{
if ((obj = findObj(args[i])) != null)
{
visStr = args[i+2];
if (obj.style)
{
obj = obj.style;
if(visStr == 'show') visStr = 'table-row';
else if(visStr == 'hide') visStr = 'none';
}
obj.display = visStr;
}
}
}
-->
</script>
 <style>
.wrap,.updated,.error{max-width: none !important;}/* This style tag will force WP 2.5-2.6 to the max available screen width instead of 980px. 2.7 has changed the admin layout. */

</style>
  <div class="icon32" id="icon-options-general"><br/>
  </div>
  <h2>General Settings <a href="#" onclick="ReverseDisplay('oneshop_general');" style="font-size:0.4em;">Show/Hide</a></h2>
  <div id="oneshop_general" style="display:none;">
    <table cellspacing="0" class="widefat fixed">
      <thead>
        <tr>
          <th style="width:150px;" class="manage-column" scope="col">&nbsp;</th>
          <th style="width:315px;" class="manage-column" scope="col">&nbsp;</th>
          <th style="width:*;" class="manage-column" scope="col">&nbsp;</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th scope="col" colspan="3">&nbsp;</th>
        </tr>
      </tfoot>
      <tbody class="" >
        <tr>
          <td><strong>Merchant ID</strong></td>
          <td><input type="text" name="oneshop_merchantid" value="<?php echo get_option('oneshop_merchantid'); ?>" /></td>
          <td>Your 1shoppingcart Merchant Id. This can be found in your 1shoppingcart account in the upper right corner.</td>
        </tr>
        <tr>
          <td><strong>Thank You URL</strong></td>
          <td><input name="oneshop_ARThankyouURL" type="text" value="<?php echo get_option('oneshop_ARThankyouURL'); ?>" size="40" />
            <br/>
            <?php

function oneshop_pages_list($current) {
	global $wpdb;
	$query = "SELECT * FROM $wpdb->posts WHERE (post_type = 'page' AND post_status = 'publish') ORDER BY menu_order";
	$pages = $wpdb->get_results($query, ARRAY_A);

	$page_list = array();
	foreach ($pages as $page) {
		if($page['ID'] == $current)
		{
			$selected = " selected";
		}else{
			$selected = "";
		}
		$this_page = "<option value='".$page['ID']."' ".$selected.">".$page['post_title']."&nbsp;&nbsp;&nbsp;&nbsp;</option>";
		$page_list[] = $this_page;
	}
	echo implode($page_list);
}
echo "<select id='oneshop_ARThankyouURL_wp' name='oneshop_ARThankyouURL_wp'>";
oneshop_pages_list(get_option('oneshop_ARThankyouURL_wp'));
echo "</select>";
?></td>
         <td>Set this to the page you want subscribers to be redirected to after submitting the form. If the field is blank, it will take them to the selected wordpress page.</td>
        </tr>
        <tr>
          <td><strong>Subscriber Notification</strong></td>
          <td><input name="oneshop_copyarresponse" type="radio" value="0" <?php if(get_option('oneshop_copyarresponse') == '0'){echo 'checked';}?>/>
            No
            <input name="oneshop_copyarresponse" type="radio" value="1" <?php if(get_option('oneshop_copyarresponse') == '1'){echo 'checked';}?>/>
            Yes </td>
          <td>If set to yes, you will be sent an email containing any information submitted by the subscriber. This is sent to the "<em>My Account >> Contact Profile</em>" email address.</td>
        </tr>
        <tr>
          <td><strong>Autoresponders</strong></td>
          <td><input type="checkbox" id="oneshop_ar1_check" name="oneshop_ar1_check" value="true" <?php if(get_option('oneshop_ar1_check') == 'true'){echo 'checked';}?> onchange="toggle_field(this,'oneshop_ar1')"/>
            <input type="text" name="oneshop_ar1" <?php if(get_option('oneshop_ar1_check') != 'true'){echo 'disabled';}?> id="oneshop_ar1" value="<?php echo get_option('oneshop_ar1'); ?>" size="10" maxlength="10" />
            <input name="oneshop_ar2_check" type="checkbox" id="oneshop_ar2_check" value="true" <?php if(get_option('oneshop_ar2_check') == 'true'){echo 'checked';}?> onchange="toggle_field(this,'oneshop_ar2')"/>
            <input name="oneshop_ar2" type="text" <?php if(get_option('oneshop_ar2_check') != 'true'){echo 'disabled';}?> id="oneshop_ar2" value="<?php echo get_option('oneshop_ar2'); ?>" size="10" maxlength="10" />
            <br />
            <input id="oneshop_ar3_check" type="checkbox" name="oneshop_ar3_check" value="true" <?php if(get_option('oneshop_ar3_check') == 'true'){echo 'checked';}?> onchange="toggle_field(this,'oneshop_ar3')"/>
            <input type="text" name="oneshop_ar3"  <?php if(get_option('oneshop_ar3_check') != 'true'){echo 'disabled';}?> id="oneshop_ar3" value="<?php echo get_option('oneshop_ar3'); ?>" size="10" maxlength="10" />
            <input id="oneshop_ar4_check" type="checkbox" name="oneshop_ar4_check" value="true" <?php if(get_option('oneshop_ar4_check') == 'true'){echo 'checked';}?> onchange="toggle_field(this,'oneshop_ar4')"/>
            <input type="text" name="oneshop_ar4"  <?php if(get_option('oneshop_ar4_check') != 'true'){echo 'disabled';}?> id="oneshop_ar4" value="<?php echo get_option('oneshop_ar4'); ?>" size="10" maxlength="10" />
            <br />
            <input id="oneshop_ar5_check" type="checkbox" name="oneshop_ar5_check" value="true" <?php if(get_option('oneshop_ar5_check') == 'true'){echo 'checked';}?> onchange="toggle_field(this,'oneshop_ar5')"/>
            <input type="text" name="oneshop_ar5"  <?php if(get_option('oneshop_ar5_check') != 'true'){echo 'disabled';}?> id="oneshop_ar5" value="<?php echo get_option('oneshop_ar5'); ?>" size="10" maxlength="10" /></td>
          <td>To add clients to a specific autoresponder, simply check one of the check boxes and enter the autoresponder Id. You can enter up to 5. If more than one is entered or no autoresponder is entered, the system will send out the "System Opt-In Message". If opt in is turned on the system will also send the "System Opt-In Message". Both these settings can be found in you 1shoppingcart account under: <em>"Email & Marketing >> Opt-In Preferences"</em>. </td>
        </tr>
      </tbody>
    </table>
    <p class="submit">
      <input type="submit" name="Submit" value="<?php _e('Save Changes') ?>" />
    </p>
  </div>
  <div class="icon32" id="icon-options-general"><br/>
  </div>
  <h2>Sidebar Layout <a href="#" onclick="ReverseDisplay('oneshop_layout');" style="font-size:0.4em;">Show/Hide</a></h2>
  <div id="oneshop_layout" style="display:none;">
    <table cellspacing="0" class="widefat fixed">
      <thead>
        <tr>
          <th style="width:150px;" class="manage-column" scope="col">&nbsp;</th>
          <th style="width:315px;" class="manage-column" scope="col">&nbsp;</th>
          <th style="width:*;" class="manage-column" scope="col">&nbsp;</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th scope="col" colspan="3">&nbsp;</th>
        </tr>
      </tfoot>
      <tbody class="" >
        <tr>
          <td><strong>Install Type</strong></td>
          <td><select name="oneshop_sidebar_install_type" size="1" onchange="showHideLayers('oneshop_row_advanced','','hide','oneshop_row_' + this.value,'','show')">
              <option value="widget" <?php if(get_option('oneshop_sidebar_install_type') == 'widget'){echo 'selected';}?>/>
Widget&nbsp;&nbsp;
              </option>
              <option value="advanced" <?php if(get_option('oneshop_sidebar_install_type') == 'advanced'){echo 'selected';}?>/>
Advanced&nbsp;&nbsp;
              </option>
            </select></td>
          <td>Selects the install type. If using the widgeted sidebar you should NOT change this. </td>
        </tr>
        <tr id="oneshop_row_advanced" style="display:<?php if(get_option('oneshop_sidebar_install_type') == 'advanced'){echo 'table-row';}else{echo "none";}?>;">
          <td><strong> Outer HTML Tag</strong><br />
            <br />
            <strong>Inner HTML Tag</strong></td>
          <td><
            <input name='oneshop_sidebar_tag_outer' type='text' id='oneshop_sidebar_tag_outer' value='<?php echo get_option('oneshop_sidebar_tag_outer')?>' size='5' maxlength='10' />
            <select name="oneshop_sidebar_tag_outer_attributes_name" size="1">
              <option value="" <?php if(get_option('oneshop_sidebar_tag_outer_attributes_name') == ''){echo 'selected';}?>/>
None
              </option>
              <option value="class" <?php if(get_option('oneshop_sidebar_tag_outer_attributes_name') == 'class'){echo 'selected';}?>/>
Class
              </option>
              <option value="id" <?php if(get_option('oneshop_sidebar_tag_outer_attributes_name') == 'id'){echo 'selected';}?>/>
ID
              </option>
            </select>
            ="
            <input name='oneshop_sidebar_tag_outer_attributes_value' type='text' id='oneshop_sidebar_tag_outer_attributes_value' value='<?php echo get_option('oneshop_sidebar_tag_outer_attributes_value')?>' size='12' maxlength='250' />
            " ><br />
            <
            <input name='oneshop_sidebar_tag_inner' type='text' id='oneshop_sidebar_tag_inner' value='<?php echo get_option('oneshop_sidebar_tag_inner')?>' size='5' maxlength='10' />
            <select name="oneshop_sidebar_tag_inner_attributes_name" size="1">
              <option value="" <?php if(get_option('oneshop_sidebar_tag_inner_attributes_name') == ''){echo 'selected';}?>/>
None
              </option>
              <option value="class" <?php if(get_option('oneshop_sidebar_tag_inner_attributes_name') == 'class'){echo 'selected';}?>/>
Class
              </option>
              <option value="id" <?php if(get_option('oneshop_sidebar_tag_inner_attributes_name') == 'id'){echo 'selected';}?>/>
ID
              </option>
            </select>
            ="
            <input name='oneshop_sidebar_tag_inner_attributes_value' type='text' id='oneshop_sidebar_tag_inner_attributes_value' value='<?php echo get_option('oneshop_sidebar_tag_inner_attributes_value')?>' size='12' maxlength='250' />
            " > </td>
          <td>Use Attribute Field To Set &quot;Class&quot; or &quot;id&quot; (Usually &quot;li&quot;)<br />
            <br />
            Use Attribute Field To Set &quot;Class&quot; or &quot;id&quot; (Usually &quot;h2&quot;)</td>
        </tr>
        <tr>
          <td><strong>Field Width</strong></td>
          <td><input type="text" name="oneshop_width" value="<?php echo get_option('oneshop_width'); ?>" /></td>
          <td>This adjusts the with of the text input fields.</td>
        </tr>
        <tr>
          <td><strong>Sidebar Title</strong></td>
          <td><input type="text" name="oneshop_sidebar_tag_inner_label" value="<?php echo get_option('oneshop_sidebar_tag_inner_label'); ?>" /></td>
          <td>Title Displayed in sidebar of your site.</td>
        </tr>
        <tr>
          <td><strong>Label Align</strong></td>
          <td><select name="oneshop_sidebar_tag_inner_label_align" size="1">
              <option value="left" <?php if(get_option('oneshop_sidebar_tag_inner_label_align') == 'left'){echo 'selected';}?>/>
Left
              </option>
              <option value="center" <?php if(get_option('oneshop_sidebar_tag_inner_label_align') == 'center'){echo 'selected';}?>/>
Center
              </option>
              <option value="right" <?php if(get_option('oneshop_sidebar_tag_inner_label_align') == 'right'){echo 'selected';}?>/>
Right
              </option>
            </select></td>
          <td>Sets the alignment of the field labels.</td>
        </tr>
        <tr>
          <td><strong>Submit Button Type</strong></td>
          <td><select name="oneshop_submit_type" size="1" onchange="showHideLayers('oneshop_row_text','','hide','oneshop_row_image','','hide','oneshop_row_button','','hide','oneshop_row_' + this.value,'','show')">
              <option value="button" <?php if(get_option('oneshop_submit_type') == 'button'){echo 'selected';}?>/>
Button&nbsp;&nbsp;
              </option>
              <!--<option value="text" <?php if(get_option('oneshop_submit_type') == 'text'){echo 'selected';}?>/>Text&nbsp;&nbsp; </option>

-->
              <option value="image" <?php if(get_option('oneshop_submit_type') == 'image'){echo 'selected';}?>/>
Image&nbsp;&nbsp;
              </option>
            </select></td>
          <td>Select a standard button (which may be styled by your template)
            <!--, a text link-->
            or an image to submit the form.</td>
        </tr>
        <tr id="oneshop_row_button" style="display:<?php if(get_option('oneshop_submit_type') == 'button'){echo 'table-row';}else{echo "none";}?>;">
          <td><strong>Submit Button Text</strong></td>
          <td><input type="text" name="oneshop_submit_button_text" value="<?php echo get_option('oneshop_submit_button_text'); ?>" /></td>
          <td>Text on the submit button.</td>
        </tr>
        <tr id="oneshop_row_image" style="display:<?php if(get_option('oneshop_submit_type') == 'image'){echo 'table-row';}else{echo "none";}?>;">
          <td><strong>Submit Button Image</strong></td>
          <td><input type="text" name="oneshop_submit_image_url" value="<?php echo get_option('oneshop_submit_image_url'); ?>" size="40" /></td>
          <td>The URL of the submit button image.</td>
        </tr>
        <tr id="oneshop_row_text" style="display:<?php if(get_option('oneshop_submit_type') == 'text'){echo 'table-row';}else{echo "none";}?>;">
          <td><strong>Submit Link Text</strong></td>
          <td><input type="text" name="oneshop_submit_text" value="<?php echo get_option('oneshop_submit_text'); ?>" /></td>
          <td>Sets the clickable text that will submit the form. No styling yet.</td>
        </tr>
        <tr>
          <td><strong>Top Custom Text</strong>&nbsp;
            <input name="oneshop_sidebar_custom_text_1_check" type="checkbox" id="oneshop_sidebar_custom_text_1_check" value="true" <?php if(get_option('oneshop_sidebar_custom_text_1_check') == 'true'){echo 'checked';}?> onchange="toggle_field(this,'oneshop_sidebar_custom_text_1')"/></td>
          <td> Align&nbsp;
            <select name="oneshop_sidebar_custom_text_1_align" size="1">
              <option value="none" <?php if(get_option('oneshop_sidebar_custom_text_1_align') == 'none'){echo 'selected';}?>/>
None
              </option>
              <option value="left" <?php if(get_option('oneshop_sidebar_custom_text_1_align') == 'left'){echo 'selected';}?>/>
Left
              </option>
              <option value="center" <?php if(get_option('oneshop_sidebar_custom_text_1_align') == 'center'){echo 'selected';}?>/>
Center
              </option>
              <option value="justify" <?php if(get_option('oneshop_sidebar_custom_text_1_align') == 'justify'){echo 'selected';}?>/>
Justify
              </option>
              <option value="right" <?php if(get_option('oneshop_sidebar_custom_text_1_align') == 'right'){echo 'selected';}?>/>
Right
              </option>
            </select>
            <br />
            <textarea name="oneshop_sidebar_custom_text_1" id="oneshop_sidebar_custom_text_1" cols="38" rows="3" <?php if(get_option('oneshop_sidebar_custom_text_1_check') != 'true'){echo 'disabled';}?>><?php echo get_option('oneshop_sidebar_custom_text_1'); ?></textarea></td>
          <td> This text will appear above the form fields.</td>
        </tr>
        <tr>
          <td><strong>Bottom Custom Text</strong>&nbsp;
            <input name="oneshop_sidebar_custom_text_2_check" type="checkbox" id="oneshop_sidebar_custom_text_2_check" value="true" <?php if(get_option('oneshop_sidebar_custom_text_2_check') == 'true'){echo 'checked';}?> onchange="toggle_field(this,'oneshop_sidebar_custom_text_2')"/></td>
          <td> Align&nbsp;
            <select name="oneshop_sidebar_custom_text_2_align" size="1">
              <option value="none" <?php if(get_option('oneshop_sidebar_custom_text_2_align') == 'none'){echo 'selected';}?>/>
None
              </option>
              <option value="left" <?php if(get_option('oneshop_sidebar_custom_text_2_align') == 'left'){echo 'selected';}?>/>
Left
              </option>
              <option value="center" <?php if(get_option('oneshop_sidebar_custom_text_2_align') == 'center'){echo 'selected';}?>/>
Center
              </option>
              <option value="justify" <?php if(get_option('oneshop_sidebar_custom_text_2_align') == 'justify'){echo 'selected';}?>/>
Justify
              </option>
              <option value="right" <?php if(get_option('oneshop_sidebar_custom_text_2_align') == 'right'){echo 'selected';}?>/>
Right
              </option>
            </select>
            <br />
            <textarea name="oneshop_sidebar_custom_text_2" id="oneshop_sidebar_custom_text_2" cols="38" rows="3" <?php if(get_option('oneshop_sidebar_custom_text_2_check') != 'true'){echo 'disabled';}?>><?php echo get_option('oneshop_sidebar_custom_text_2'); ?></textarea></td>
          <td> This text will appear below the form fields.</td>
        </tr>
        <tr>
          <td><strong>Validation Missing Field Text</strong></td>
          <td><input type="text" name="oneshop_field_name_Name_missing_field_validate_message" value="<?php echo get_option('oneshop_field_name_Name_missing_field_validate_message'); ?>" /></td>
          <td>Text Displayed When Required Fields are not filled in.</td>
        </tr>
        <tr>
          <td><strong>Validation Error Field Color</strong></td>
          <td><input type="text" name="oneshop_field_name_Name_missing_field_color" value="<?php echo get_option('oneshop_field_name_Name_missing_field_color'); ?>" style='background-color: <?php echo get_option('oneshop_field_name_Name_missing_field_color'); ?>;'/></td>
          <td>Background color of the field when validation fails.</td>
        </tr>
        <tr>
          <td><strong>Validation Error Text Color</strong></td>
          <td><input type="text" name="oneshop_field_name_Name_missing_field_text_color" value="<?php echo get_option('oneshop_field_name_Name_missing_field_text_color'); ?>" style='color: <?php echo get_option('oneshop_field_name_Name_missing_field_text_color'); ?>;'/></td>
          <td>Text color of the error text when validation fails.</td>
        </tr>
      </tbody>
    </table>
    <p class="submit">
      <input type="submit" name="Submit" value="<?php _e('Save Changes') ?>" />
    </p>
  </div>
  <div class="icon32" id="icon-themes"><br/>
  </div>
  <h2>Form Fields <a href="#" onclick="ReverseDisplay('oneshop_fields');" style="font-size:0.4em;">Show/Hide</a></h2>
  <div id="oneshop_fields" style="display:none;">
    <table style="width:100%; vertical-align:top;">
      <tr style="vertical-align:top;">
        <td><table cellspacing="0" class="widefat fixed">
            <thead>
              <tr>
                <th style="width:100px;" class="manage-column" scope="col">Field Name</th>
                <th style="width:150px;" class="manage-column" scope="col">Field Label</th>
                <th style="width:200px;" class="manage-column" scope="col">Field Visibility</th>
                <th style="width:*;" class="manage-column" scope="col">Required Field Validation Text</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th scope="col">&nbsp;</th>
                <th scope="col">&nbsp;</th>
                <th scope="col">&nbsp;</th>
                <th scope="col">&nbsp;</th>
              </tr>
            </tfoot>
            <tbody class="" >
              <?php
$oneshop_fields_array = array(
								array(	'Name', 		false),
								array(	'Email',		false),
								array(	'Company',		false),
								array(	'HomePhone', 	false),
								array(	'WorkPhone', 	false),
								array(	'Address1', 	false),
								array(	'Address2', 	false),
								array(	'City', 		false),
								array(	'State', 		false),
								array(	'Zip', 			false),
								array(	'Country', 		false),
								array(	'Fax', 			false),
								array(	'Custom1', 		true),
								array(	'Custom2',		true),
								array(	'Custom3',		true),
								array(	'Custom4',		true),
								array(	'Custom5',		true),
								array(	'Custom6',		true),
								array(	'Custom7',		true),
								array(	'Custom8',		true),
								array(	'Custom9',		true)

							);
$oneshop_row_counter = 1;
foreach($oneshop_fields_array as $oneshop_fields_array_item)
{
	echo "\n\t<tr";
	if($oneshop_row_counter%2 == 1){echo " class='alternate'";}
	echo ">";
	echo "\n\t\t<td><strong>".$oneshop_fields_array_item[0]."</strong></td>";
	echo "\n\t\t<td><input type='text' size='15' maxlength='20' name='oneshop_field_name_".$oneshop_fields_array_item[0]."_label' value='".get_option('oneshop_field_name_'.$oneshop_fields_array_item[0].'_label')."' /></td>";
	if($oneshop_fields_array_item[0] == "Email")
	{
		echo "\n\t\t<td><strong>Always Visible and Required.</strong>";
	}
	else
	{
		echo "\n\t\t<td><input name='oneshop_field_name_".$oneshop_fields_array_item[0]."_required' type='radio' value='0' ";
		if(get_option('oneshop_field_name_'.$oneshop_fields_array_item[0].'_required') == '0'){echo 'checked';}
		echo "/>";
		echo "&nbsp;Not Visible<br/>";
		echo "<input name='oneshop_field_name_".$oneshop_fields_array_item[0]."_required' type='radio' value='1' ";
		if(get_option('oneshop_field_name_'.$oneshop_fields_array_item[0].'_required') == '1'){echo 'checked';}
		echo "/>";
		echo "&nbsp;Visible<br/>";
		echo "<input name='oneshop_field_name_".$oneshop_fields_array_item[0]."_required' type='radio' value='2' ";
		if(get_option('oneshop_field_name_'.$oneshop_fields_array_item[0].'_required') == '2'){echo 'checked';}
		echo "/>";
		echo "&nbsp;Required<br/></td>";
	}
	echo "\n\t\t<td><input type='text' size='25' maxlength='40' name='oneshop_field_name_".$oneshop_fields_array_item[0]."_validate_message' value='".get_option('oneshop_field_name_'.$oneshop_fields_array_item[0].'_validate_message')."' />";
	if($oneshop_fields_array_item[0] == "Email")
	{
		echo "\n\t\t<br/><input type='text' size='25' maxlength='40' name='oneshop_field_name_Email_invalid_message' value='".get_option('oneshop_field_name_Email_invalid_message')."' />";
	}

	echo "</td>";
	echo "\n\t</tr>";

	$oneshop_row_counter++;
	//this is what will split the fields section into 2 columns. Uncomment
	/* 	if($oneshop_fields_array_item[0] == "Fax")
		{
			$oneshop_row_counter++;
			echo "\n</tbody>";
			echo "\n</table></td>";
			echo "\n\t\t<td><table cellspacing='0' class='widefat fixed'>";
			echo "\n<thead>";
			echo "\n\t<tr>";
			echo "\n\t\t<th style='width:100px;' class='manage-column' scope='col'>Field Name</th>";
			echo "\n\t\t<th style='width:120px;' class='manage-column' scope='col'>Field Label</th>";
			echo "\n\t\t<th style='width:100px;' class='manage-column' scope='col'>Field Visibility</th>";
			echo "\n\t\t<th style='width:*;' class='manage-column' scope='col'>Required Text</th>";
			echo "\n\t</tr>";
			echo "\n</thead>";
			echo "\n<tfoot>";
			echo "\n\t<tr>";
			echo "\n\t\t<th scope='col'>&nbsp;</th>";
			echo "\n\t\t<th scope='col'>&nbsp;</th>";
			echo "\n\t\t<th scope='col'>&nbsp;</th>";
			echo "\n\t\t<th scope='col'>&nbsp;</th>";
			echo "\n\t</tr>";
			echo "\n</tfoot>";
			echo "\n<tbody>";
		}
		*/
}
?>
              <tr>
                <td><strong>Custom 10</strong><br />
                  <br />
                  <strong>Default Text</strong></td>
                <td><input type="text" size="15" maxlength="20" name="oneshop_field_name_Custom10_label" value="<?php echo get_option('oneshop_field_name_Custom10_label'); ?>" />
                  <br />
                  <textarea name="oneshop_field_name_Custom10_text" cols="13" rows="3"><?php echo get_option('oneshop_field_name_Custom10_text'); ?></textarea></td>
                <td><input name="oneshop_field_name_Custom10_required" type="radio" value="0" <?php if(get_option('oneshop_field_name_Custom10_required') == '0'){echo 'checked';}?>/>
                  Not Visible&nbsp;&nbsp;<br/>
                  <input name="oneshop_field_name_Custom10_required" type="radio" value="1" <?php if(get_option('oneshop_field_name_Custom10_required') == '1'){echo 'checked';}?>/>
                  Visible&nbsp;&nbsp;<br/>
                  <input name="oneshop_field_name_Custom10_required" type="radio" value="2" <?php if(get_option('oneshop_field_name_Custom10_required') == '2'){echo 'checked';}?>/>
                  Required&nbsp;&nbsp;<br/>
                  <br />
                  <br />
                  Rows
                  <input type="text" size="2" maxlength="2" name="oneshop_field_name_Custom10_rows" value="<?php echo get_option('oneshop_field_name_Custom10_rows'); ?>" />
                  &nbsp;Cols
                  <input type="text" size="2" maxlength="2" name="oneshop_field_name_Custom10_cols" value="<?php echo get_option('oneshop_field_name_Custom10_cols'); ?>" /></td>
                  <td><input type='text' size='25' maxlength='40' name='oneshop_field_name_Custom10_validate_message' value='<?php echo get_option('oneshop_field_name_Custom10_validate_message'); ?>' /></td>
              </tr>
            </tbody>
          </table></td>

      </tr>
    </table>
    <p class="submit">
      <input type="submit" name="Submit" value="<?php _e('Save Changes') ?>" />
    </p>
  </div>
</form>
<div class='clear'> </div>
<div class='footer'>&copy; 2009-<?php echo date("Y"); ?> <a href="http://1shoppingcart.com">1shoppingcart.com</a><br />
  Version 1.0.2 December 21st, 2009</div>
</div>
<?php
}
?>