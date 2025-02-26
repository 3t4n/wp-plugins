<?php


/**
 * AddRibbonMenu class.
 */
class AddRibbonMenu {

	/**
	 *
	 *  Include classes essential for the plugin
	 *
	 * @return void
	 */

	public function __construct() {
		 add_action( 'admin_menu', array($this,'register_my_custom_menu_page' ));
	}
	
	function register_my_custom_menu_page(){
		add_submenu_page( 'tools.php', 'How To Use', 'Add Ribbon ', 'manage_options', 'add_ribbon_info', array($this,'add_ribbon_menu_page'), 'dashicons-images-alt2', 10 ); 
	}

	function add_ribbon_menu_page(){
		include(AddRibbon::get_plugin_uri().'templates/add_ribbon_dashboard.php');
	}

	
	
}



new AddRibbonMenu();
