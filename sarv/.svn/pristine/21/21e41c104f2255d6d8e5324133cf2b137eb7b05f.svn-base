<?php

function sarv_menu()
{

$loginChecked = Sarv_getDataFromDb("options");
      
   	add_menu_page(  'Email Marketing', 'Email Marketing' , 'manage_options' , 'manage_options' , 'sarv_display_setting', SARV_PLUGIN_URL . '/assets/images/sarv.png');

   	add_submenu_page(  'manage_options', 'Options', 'Options' , 'manage_options' , 'manage_options' , 'sarv_display_setting', SARV_PLUGIN_URL . '/assets/images/sarv.png');

if(!empty($loginChecked)):
	$connectCheck = Sarv_checkApiConnection();
	$connectCheck = (array)json_decode($connectCheck);
    $result = $connectCheck['msg'];
    if($result=="success"):
   		add_submenu_page(  'manage_options', 'Forms List', 'Forms List' , 'manage_options' , 'manage_setting' , 'sarv_setting_function');
   	endif;
endif;
}


?>