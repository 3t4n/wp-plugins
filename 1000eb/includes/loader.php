<?php
header("Content-Type: text/html; charset=utf-8");
define('SITE_ROOT',$_SERVER['DOCUMENT_ROOT']);
define('DR',DIRECTORY_SEPARATOR);
require_once( SITE_ROOT.DR.'wp-load.php');
//require_once( SITE_ROOT.DR.'wp-admin/admin.php' );
//if(is_admin()==false){die();}
//echo is_admin();
//echo $user_ID;
//echo wp_get_current_user()->ID;
//auth_redirect();

$ws_cs = strtolower($_REQUEST['action']);
$ws_callback = array();

$ws_no_auth_codition =  (
	current_user_can('subscriber') ||
	!is_user_logged_in()
);

$ws_allow_fields = array(
	'ws_3721up_file_list',
	'ws_3721up_api_setting',
	'ws_3721up_api_setting_ori',
	'ws_3721up_api_setting_api_src',
	'ws_3721up_api_setting_global_name'
);
$ws_allow_fields_admin = array(
	'ws_3721up_api_setting',
	'ws_3721up_api_setting_ori',
	'ws_3721up_api_setting_api_src',
	'ws_3721up_api_setting_global_name'
);

$_REQUEST =  array_diff_key($_REQUEST,array('action'=>''));
//Filter the guys without permission
if ($ws_no_auth_codition){ header('location: http://' . $_SERVER['HTTP_HOST']); }
//Opps! no actions!
if (count($_REQUEST) == 0){ die('Welcome! dear. some help?'); }
//Check if the fileds of the request are allowed or not
foreach ($_REQUEST as $key => $value) {
	if (!in_array($key, $ws_allow_fields)){
		// die ('Sorry! you are bad guy.');
		$ws_callback['msg']='Sorry! you are bad guy.';
		die (json_encode($ws_callback));
	}
	if(!current_user_can('administrator')){
		if (!in_array($key, $ws_allow_fields_admin)){
			 $ws_callback['msg']='Sorry! you are not the adminnistrator.';
			 die (json_encode($ws_callback));
		}
	}
}
//$field_keys = array_keys($_REQUEST);


//  $ws_referer = $_SERVER['HTTP_REFERER'];
//	if($_SERVER['HTTP_REFERER']){$ws_callback['referer']=$_SERVER['HTTP_REFERER'];}
//	else{die('-1');};

switch ($ws_cs){
case '':	
	$ws_callback['msg'] = 'no action (get/set/update)';
	$ws_callback['success'] = 'false';
	break;
case 'get':	
	foreach($_REQUEST as $key => $value){
			$ws_callback[$key] = get_option($key);
	}
	$ws_callback['msg'] = 'fine get!';
	$ws_callback['success'] = 'true';
break;
case ($ws_cs == 'set' || $ws_cs == 'update'):	
	foreach($_REQUEST as $key => $value){
			ws_update_option($key, $value);	
	}
	$ws_callback['msg'] = 'fine set!';
	$ws_callback['success'] = 'true';
break;
case 'delete':
	foreach($_REQUEST as $key => $value){
			delete_option($key, $value);
	}
	$ws_callback['msg'] = 'fine delete!';
	$ws_callback['success'] = 'true';
break;	
default:
	$ws_callback['msg'] = 'wrong action value (get/set/update/delete)';
	$ws_callback['success'] = 'false';

}//switch end


echo $ws_callback = stripslashes(json_encode($ws_callback));



function ws_update_option($key, $value){
	
	update_option($key, $value);
	
};
	
?>