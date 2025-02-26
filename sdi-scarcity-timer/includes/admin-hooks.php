<?php
/**
 * @package sdi-scarcity
 * @version 0.1
 */

/* Add new menu items in wp-admin */
add_action('admin_menu', function(){

	$menuId = 'sdi-scarcity';

	add_menu_page(__( SDI_PLUGIN_NAME, SDI_TEXT_DOMAIN ),  SDI_PLUGIN_NAME, 'manage_options', $menuId,  function(){ 
		(new SdiAdmin())->admin(); 
	}, '', 6 );

	add_submenu_page( $menuId, 'New Campaign', 'New Campaign', 'manage_options', 'sdi-scarcity-new', function(){ 
		(new SdiCampaign())->newCampaign(); 
	});

	

	add_submenu_page( $menuId, 'Settings', 'Settings', 'manage_options', 'sdi-scarcity-settings', function(){ 
		(new SdiAdmin())->settings(); 
	});
});


add_action( 'admin_enqueue_scripts', function(){
	(new SdiAdmin())->assets();
} );