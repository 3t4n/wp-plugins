<?php
$themoney_api = new themoneytizer_API();

$themoney_website = new StdClass();
$themoney_website->site_id = get_option('themoneytizer_site_id');

if (isset($_POST['submit'])){
	if (isset($_POST['formatauto'])){
		$post_format = $themoney_api->adminPanel($_POST['formatauto'],$_POST['submit']);
	}
	else{
	    $post_format = $themoney_api->adminPanel(array(),$_POST['submit']);
	}
	if (isset($_POST['formatlazy'])){
		$post_format = update_lazy_options($_POST['formatlazy']);
	}
}

$registered_format = explode("-",stripslashes(get_option('themoneytizer_autoformats')));

$themoneytizer_site_id = get_option('themoneytizer_site_id');
$themoneytizer_setting_token = get_option('themoneytizer_setting_token');

if($themoneytizer_site_id != '' && $themoneytizer_setting_token != null){
	include_once('tab/tab_menu_home.php');
} else {
	include_once('tab/tab_signup.php');
}
