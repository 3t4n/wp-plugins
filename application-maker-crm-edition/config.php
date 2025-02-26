<?php
$meta_marker='';//This is used to be added behind the meta field name from the fields config names. Used to indentify precisely the meta with a specific name.
$show_help=true;//
$debug=false;
$main_config=array(
	'plugin_generic_name'=>'BLUE ORIGAMI CRM',
	'user_generic_settings'=>true,
	'show_pro_licence_tab'=>false,
	'is_crm_app'=>true,
	'lang'=>'en',
	'rootname'=>'15',
	'default_role_minimum'=>'apm_cap',
	'default_currency'=>'$', // this can be overwritten by the Application config and option
	'widget_latest_default_max'=>15,// this can be overwritten by the Application config and option
	'from_email'=>'admin@yahoo.com',// this can be overwritten by the Application config and option
	 'other_roles'=>'sales,commercial_direction,support_agent',// add new roles for user
	 'smtp_host'=>'',// SMTP HOST
	 'smtp_port'=>'',// SMTP PORT
	 'smtp_username'=>'',// SMTP Username
	 'smtp_psw'=>'',// SMTP Password
);