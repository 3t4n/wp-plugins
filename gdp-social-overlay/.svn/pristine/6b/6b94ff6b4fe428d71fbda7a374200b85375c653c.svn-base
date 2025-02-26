<?php


add_action( 'admin_menu', 'registerGdpGeneralMENU' );

function registerGdpGeneralMENU(){
	add_menu_page( 'GDP Plugins', 'GDP Plugins', 10, 'gdp-plugins', 'gdpGeneralShow', plugin_dir_url( __FILE__ ).'assets/image/gdp-ico.png' ); 
	add_submenu_page( 'gdp-plugins', 'GDP Social Overlay', 'Social Overlay', 10, 'gdp-social-overlay', 'gdpSocialOverlay'); 
}

if(!function_exists(gdpGeneralShow)){
	function gdpGeneralShow(){
	}
}

function gdpSocialOverlay() {
	include_once('so-admin-view.php');
}
