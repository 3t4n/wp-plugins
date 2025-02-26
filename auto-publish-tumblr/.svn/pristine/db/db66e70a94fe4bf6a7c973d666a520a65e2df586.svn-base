<?php
if( !defined('ABSPATH') ){ exit();}
add_action('admin_menu', 'xyz_tbap_menu');

function xyz_tbap_add_admin_scripts()
{
	wp_enqueue_script('jquery');
	wp_register_script( 'xyz_notice_script_tbap', plugins_url("js/notice.js",XYZ_TBAP_PLUGIN_FILE) );
	wp_enqueue_script( 'xyz_notice_script_tbap' );
	$tbap_smapsolution_var="SMAPSolutions";
	wp_localize_script('xyz_notice_script_tbap','xyz_script_tbap_var',array(
	    'alert1' => __('Please check whether the email is correct.','auto-publish-tumblr'),
	    'alert2' => __('Select atleast one list.','auto-publish-tumblr'),
	    'alert3' => __('You do not have sufficient permissions','auto-publish-tumblr'),
	    'html1' => __('Thank you for enabling backlink !','auto-publish-tumblr')
	    	    
	));
	wp_register_style('xyz_tbap_style', plugins_url("css/style.css",XYZ_TBAP_PLUGIN_FILE));
	wp_enqueue_style('xyz_tbap_style');
}

add_action("admin_enqueue_scripts","xyz_tbap_add_admin_scripts");

function xyz_tbap_menu()
{
	add_menu_page('Tumblr Auto Publish - Manage settings', 'WP Tumblr Auto Publish', 'manage_options', 'tumblr-auto-publish-settings', 'xyz_tbap_settings',plugin_dir_url( XYZ_TBAP_PLUGIN_FILE ) . 'images/tb.png');
	$page=add_submenu_page('tumblr-auto-publish-settings', 'Tumblr Auto Publish - Manage settings', __('Settings','auto-publish-tumblr'), 'manage_options', 'tumblr-auto-publish-settings' ,'xyz_tbap_settings'); // 8 for admin
	add_submenu_page('tumblr-auto-publish-settings', 'Tumblr Auto Publish - Logs', __('Logs','auto-publish-tumblr'), 'manage_options', 'tumblr-auto-publish-log' ,'xyz_tbap_logs');
	add_submenu_page('tumblr-auto-publish-settings', 'Tumblr Auto Publish - About', __('About','auto-publish-tumblr'), 'manage_options', 'tumblr-auto-publish-about' ,'xyz_tbap_about');
	add_submenu_page('tumblr-auto-publish-settings', 'Tumblr Auto Publish - Suggest Feature', __('Suggest a Feature','auto-publish-tumblr'), 'manage_options', 'tumblr-auto-publish-suggest-features' ,'xyz_tbap_suggest_feature');// 8 for admin
}


function xyz_tbap_settings()
{
	$_POST = stripslashes_deep($_POST);
	$_GET = stripslashes_deep($_GET);	
	$_POST = xyz_tbap_trim_deep($_POST);
	$_GET = xyz_tbap_trim_deep($_GET);
	
	require( dirname( __FILE__ ) . '/header.php' );
	require( dirname( __FILE__ ) . '/settings.php' );
	require( dirname( __FILE__ ) . '/footer.php' );
}



function xyz_tbap_about()
{
	require( dirname( __FILE__ ) . '/header.php' );
	require( dirname( __FILE__ ) . '/about.php' );
	require( dirname( __FILE__ ) . '/footer.php' );
}


function xyz_tbap_suggest_feature()
{
	require( dirname( __FILE__ ) . '/header.php' );
	require( dirname( __FILE__ ) . '/suggest_feature.php' );
	require( dirname( __FILE__ ) . '/footer.php' );
}
function xyz_tbap_logs()
{
	$_POST = stripslashes_deep($_POST);
	$_GET = stripslashes_deep($_GET);
	$_POST = xyz_tbap_trim_deep($_POST);
	$_GET = xyz_tbap_trim_deep($_GET);

	require( dirname( __FILE__ ) . '/header.php' );
	require( dirname( __FILE__ ) . '/logs.php' );
	require( dirname( __FILE__ ) . '/footer.php' );
}

?>