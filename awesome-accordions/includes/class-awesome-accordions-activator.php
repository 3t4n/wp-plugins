<?php

/**
 * Fired during plugin activation
 * 
 * This class defines all code necessary to run during the plugin's activation.
 *
 *  @since      1.0.0
 */


class Awesome_Accordions_Activator {

	
	public static function activate() {
		
		//Set default option for Disable CSS Button 
		
		update_option("awesome-accordions-options", array("awesome_acc_load_css" => 1,));	

	}

}
